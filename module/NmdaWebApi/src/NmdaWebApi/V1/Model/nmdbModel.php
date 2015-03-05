<?php 
namespace NmdaWebApi\V1\Model; 

use Zend\Db\ResultSet\ResultSet;
use Zend\Db\Sql\Expression;

use Zend\Db\Sql\Select;
use Zend\Db\Adapter\AdapterInterface; 
use Zend\Paginator\Adapter\DbSelect; 
 
class nmdbModel {
    protected $adapter;

    public function __construct(AdapterInterface $adapter)
    {
        $this->adapter = $adapter;
    }
    public function uncorrectedRawInterval($start,$finish){
	$sql = "SELECT * FROM CALM_ori WHERE start_date_time between '".$start."' and '".$finish."';";
	$result = $this->adapter->query($sql)->execute();

	$resultSet = new ResultSet;
	$resultSet->initialize($result);

	return $resultSet;

    }

    public function uncorrectedGroupedInterval($start,$finish,$interval){

	$sql = "SELECT start_date_time as time, 
	avg(measured_uncorrected)+std(measured_uncorrected) as measured_uncorrected_open, max(measured_uncorrected) as measured_uncorrected_max, min(measured_uncorrected) as measured_uncorrected_min, avg(measured_uncorrected)-std(measured_uncorrected) as measured_uncorrected_close, 
	
	avg(measured_corr_for_pressure)+std(measured_corr_for_pressure) as measured_corr_for_pressure_open, max(measured_corr_for_pressure) as measured_corr_for_pressure_max, min(measured_corr_for_pressure) as measured_corr_for_pressure_min, avg(measured_corr_for_pressure)-std(measured_corr_for_pressure) as measured_corr_for_pressure_close,
	
	avg(measured_corr_for_efficiency)+std(measured_corr_for_efficiency) as measured_corr_for_efficiency_open, max(measured_corr_for_efficiency) as measured_corr_for_efficiency_max, min(measured_corr_for_efficiency) as measured_corr_for_efficiency_min, avg(measured_corr_for_efficiency)-std(measured_corr_for_efficiency) as measured_corr_for_efficiency_close,

	avg(measured_pressure_mbar) as measured_pressure_mbar_avg

	from (select CALM_ori.*, (UNIX_TIMESTAMP(start_date_time) DIV (".$interval.")) as timekey  from CALM_ori where start_date_time between '".$start."' and '".$finish."')as t1 group by timekey;";

	$result = $this->adapter->query($sql)->execute();

	$resultSet = new ResultSet;
	$resultSet->initialize($result);

	return $resultSet;

    }

    public function uncorrectedGroupedAll($points){
	$sqlFirst= "SELECT start_date_time FROM CALM_ori LIMIT 1";
	$sqlLast= "SELECT start_date_time FROM CALM_ori ORDER  BY start_date_time DESC LIMIT 1";

	$result= $this->adapter->query($sqlFirst)->execute();
	$resultSet = new ResultSet;
	$resultSet->initialize($result);
	$start= $resultSet->current()->start_date_time;

	$result= $this->adapter->query($sqlLast)->execute();
	$resultSet = new ResultSet;
	$resultSet->initialize($result);
	$finish= $resultSet->current()->start_date_time;

	$interval=round((strtotime($finish)-strtotime($start))/($points-1));

	return $this->uncorrectedGroupedInterval($start,$finish,$interval);
    }
    public function correctedRawInterval($start,$finish){	
	$sql = "SELECT o.start_date_time,
		CASE WHEN r.start_date_time IS NULL THEN o.measured_uncorrected ELSE r.revised_uncorrected END AS uncorrected, 
		CASE WHEN r.start_date_time IS NULL THEN o.measured_corr_for_pressure ELSE r.revised_corr_for_pressure END AS corr_for_pressure,
		CASE WHEN r.start_date_time IS NULL THEN o.measured_corr_for_efficiency ELSE r.revised_corr_for_efficiency END AS corr_for_efficiency,
		CASE WHEN r.start_date_time IS NULL THEN o.measured_pressure_mbar ELSE r.revised_pressure_mbar END AS pressure_mbar

		FROM CALM_ori o LEFT JOIN CALM_rev r ON o.start_date_time = r.start_date_time WHERE o.start_date_time >= '".$start."' AND o.start_date_time < '".$finish."' ORDER BY start_date_time ASC;";
	$result = $this->adapter->query($sql)->execute();

	$resultSet = new ResultSet;
	$resultSet->initialize($result);
	
	return $resultSet;
    }

    public function correctedGroupedInterval($start,$finish,$interval){

	$sql = "select start_date_time as time, 
	avg(uncorrected)+std(uncorrected) as uncorrected_open, max(uncorrected) as uncorrected_max, min(uncorrected) as uncorrected_min, avg(uncorrected)-std(uncorrected) as uncorrected_close, 
	avg(corr_for_pressure)+std(corr_for_pressure) as corr_for_pressure_open, max(corr_for_pressure) as corr_for_pressure_max, min(corr_for_pressure) as corr_for_pressure_min, avg(corr_for_pressure)-std(corr_for_pressure) as corr_for_pressure_close,
	
	avg(corr_for_efficiency)+std(corr_for_efficiency) as corr_for_efficiency_open, max(corr_for_efficiency) as corr_for_efficiency_max, min(corr_for_efficiency) as corr_for_efficiency_min, avg(corr_for_efficiency)-std(corr_for_efficiency) as corr_for_efficiency_close,

	avg(pressure_mbar) as pressure_mbar_avg

	from(select t2.*, (UNIX_TIMESTAMP(t2.start_date_time) DIV (".$interval.")) as timekey from(SELECT o.start_date_time,
	CASE WHEN r.start_date_time IS NULL THEN o.measured_uncorrected ELSE r.revised_uncorrected END AS uncorrected, 
	CASE WHEN r.start_date_time IS NULL THEN o.measured_corr_for_pressure ELSE r.revised_corr_for_pressure END AS corr_for_pressure,
	CASE WHEN r.start_date_time IS NULL THEN o.measured_corr_for_efficiency ELSE r.revised_corr_for_efficiency END AS corr_for_efficiency,
	CASE WHEN r.start_date_time IS NULL THEN o.measured_pressure_mbar ELSE r.revised_pressure_mbar END AS pressure_mbar

FROM CALM_ori o LEFT JOIN CALM_rev r ON o.start_date_time = r.start_date_time WHERE o.start_date_time >= '".$start."' AND o.start_date_time < '".$finish."' ORDER BY start_date_time ASC) as t2) as t3 group by timekey;";

	$result = $this->adapter->query($sql)->execute();

	$resultSet = new ResultSet;
	$resultSet->initialize($result);

	return $resultSet;
    }

    public function correctedGroupedAll($points){
	$sqlFirst= "SELECT start_date_time FROM CALM_ori LIMIT 1";
	$sqlLast= "SELECT start_date_time FROM CALM_ori ORDER  BY start_date_time DESC LIMIT 1";

	$result= $this->adapter->query($sqlFirst)->execute();
	$resultSet = new ResultSet;
	$resultSet->initialize($result);
	$start= $resultSet->current()->start_date_time;

	$result= $this->adapter->query($sqlLast)->execute();
	$resultSet = new ResultSet;
	$resultSet->initialize($result);
	$finish= $resultSet->current()->start_date_time;

	$interval=round((strtotime($finish)-strtotime($start))/($points-1));

	return $this->correctedGroupedInterval($start,$finish,$interval);
    }

    public function marknull($dates){
	foreach($dates as $start_date_time){
		$sql="insert into CALM_rev (start_date_time, revised_uncorrected, revised_corr_for_efficiency, revised_corr_for_pressure, revised_pressure_mbar, version, last_change ) values ('".$start_date_time."',null,null,null,null,1,now()) on duplicate key update revised_uncorrected = null, revised_corr_for_efficiency=null, revised_corr_for_pressure=null, revised_pressure_mbar=null, version=version+1, last_change=now();";
		$this->adapter->query($sql)->execute();
	}
	return true;
    }

    public function getLast(){
	$sqlLast= "SELECT start_date_time FROM CALM_ori ORDER  BY start_date_time DESC LIMIT 1";
	$result= $this->adapter->query($sqlLast)->execute();
	$resultSet = new ResultSet;
	$resultSet->initialize($result);
	$finish= $resultSet->current()->start_date_time;
	return $finish;
    }

}
