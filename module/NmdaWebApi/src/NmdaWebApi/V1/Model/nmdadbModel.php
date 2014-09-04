<?php 
namespace NmdaWebApi\V1\Model; 

use Zend\Db\ResultSet\ResultSet;
use Zend\Db\Sql\Expression;

use Zend\Db\Sql\Select;
use Zend\Db\Adapter\AdapterInterface; 
use Zend\Paginator\Adapter\DbSelect; 
 
class nmdadbModel {
    protected $adapter;

    public function __construct(AdapterInterface $adapter)
    {
        $this->adapter = $adapter;
    }

   public function interval($start,$finish){
	$sql = "SELECT * FROM binTable WHERE start_date_time between '".$start."' and '".$finish."';";
	$result = $this->adapter->query($sql)->execute();

	$resultSet = new ResultSet;
    	$resultSet->initialize($result);

	return $resultSet;
    }

    public function stats($start,$finish){
	$sql = 	"select 'ch01' as n1, ch01, avg(ch01) as avg_ch01, std(ch01) as std_ch01, max(ch01) as max_ch01, min(ch01) as min_ch01,
			'ch02' as n2, ch02, avg(ch02) as avg_ch02, std(ch02) as std_ch02, max(ch02) as max_ch02, min(ch02) as min_ch02,
			'ch03' as n3, ch03, avg(ch03) as avg_ch03, std(ch03) as std_ch03, max(ch03) as max_ch03, min(ch03) as min_ch03,
			'ch04' as n4, ch04, avg(ch04) as avg_ch04, std(ch04) as std_ch04, max(ch04) as max_ch04, min(ch04) as min_ch04,
			'ch05' as n5, ch05, avg(ch05) as avg_ch05, std(ch05) as std_ch05, max(ch05) as max_ch05, min(ch05) as min_ch05,
			'ch06' as n6, ch06, avg(ch06) as avg_ch06, std(ch06) as std_ch06, max(ch06) as max_ch06, min(ch06) as min_ch06,
			'ch07' as n7, ch07, avg(ch07) as avg_ch07, std(ch07) as std_ch07, max(ch07) as max_ch07, min(ch07) as min_ch07,
			'ch08' as n8, ch08, avg(ch08) as avg_ch08, std(ch08) as std_ch08, max(ch08) as max_ch08, min(ch08) as min_ch08,
			'ch09' as n9, ch09, avg(ch09) as avg_ch09, std(ch09) as std_ch09, max(ch09) as max_ch09, min(ch09) as min_ch09,
			'ch10' as n10, ch10, avg(ch10) as avg_ch10, std(ch10) as std_ch10, max(ch10) as max_ch10, min(ch10) as min_ch10,
			'ch11' as n11, ch11, avg(ch11) as avg_ch11, std(ch11) as std_ch11, max(ch11) as max_ch11, min(ch11) as min_ch11,
			'ch12' as n12, ch12, avg(ch12) as avg_ch12, std(ch12) as std_ch12, max(ch12) as max_ch12, min(ch12) as min_ch12,
			'ch13' as n13, ch13, avg(ch13) as avg_ch13, std(ch13) as std_ch13, max(ch13) as max_ch13, min(ch13) as min_ch13,
			'ch14' as n14, ch14, avg(ch14) as avg_ch14, std(ch14) as std_ch14, max(ch14) as max_ch14, min(ch14) as min_ch14,
			'ch15' as n15, ch15, avg(ch15) as avg_ch15, std(ch15) as std_ch15, max(ch15) as max_ch15, min(ch15) as min_ch15,
			'ch16' as n16, ch16, avg(ch16) as avg_ch16, std(ch16) as std_ch16, max(ch16) as max_ch16, min(ch16) as min_ch16,
			'ch17' as n17, ch17, avg(ch17) as avg_ch17, std(ch17) as std_ch17, max(ch17) as max_ch17, min(ch17) as min_ch17,
			'ch18' as n18, ch18, avg(ch18) as avg_ch18, std(ch18) as std_ch18, max(ch18) as max_ch18, min(ch18) as min_ch18
				from(select * from  binTable where start_date_time between '".$start."' and '".$finish."' order by start_date_time desc)as t1;";

	$result = $this->adapter->query($sql)->execute();

	$resultSet = new ResultSet;
    	$resultSet->initialize($result);

	return $resultSet;
    }

   public function statsDefault(){
	$sqlLast= "SELECT start_date_time FROM binTable ORDER  BY start_date_time DESC LIMIT 1";
	
	$result= $this->adapter->query($sqlLast)->execute();
	$resultSet = new ResultSet;
	$resultSet->initialize($result);
	$finish= $resultSet->current()->start_date_time;

	$start= date("Y-m-d H:i:s",strtotime($finish)-60*60*24*30);
	
	return $this->stats($start,$finish);
   }

   public function histogram($start, $finish, $channel){
   	$sql = "select chh as num, count(chh) as val from (select ch div 5 as chh  from (select ".$channel." as ch from binTable where start_date_time between '".$start."' and '".$finish."') as t1) as t2 group by chh order by num;";
	$result_mid = $this->adapter->query($sql)->execute();

	$resultSet_mid = new ResultSet;
    	$resultSet_mid->initialize($result_mid);

	$sql = "select count(".$channel.") as val from (select ".$channel." from binTable where (start_date_time between '".$start."' and '".$finish."') and ".$channel."<150)as t1;"; 
	$result_low = $this->adapter->query($sql)->execute();

	$resultSet_low = new ResultSet;
    	$resultSet_low->initialize($result_low);

	$sql = "select count(".$channel.") as val from (select ".$channel." from binTable where (start_date_time between '".$start."' and '".$finish."') and ".$channel.">450)as t1;";
	$result_high = $this->adapter->query($sql)->execute();

	$resultSet_high = new ResultSet;
    	$resultSet_high->initialize($result_high);

	return $resultSet_mid;
	return array($resultSet_low, $resultSet_mid, $resultSet_high);
   }
   
   public function histogramDefault($channel){
	$sqlLast= "SELECT start_date_time FROM binTable ORDER  BY start_date_time DESC LIMIT 1";
	
	$result= $this->adapter->query($sqlLast)->execute();
	$resultSet = new ResultSet;
	$resultSet->initialize($result);
	$finish= $resultSet->current()->start_date_time;

	$start= date("Y-m-d H:i:s",strtotime($finish)-60*60*24*30);
	
	return $this->histogram($start,$finish,$channel);
   }

   public function average_chann($start, $finish, $channel){
	$sql= "select avg(".$channel.") as avg_chann from binTable where start_date_time between '".$start."' and '".$finish."';";
	$result = $this->adapter->query($sql)->execute();

	$resultSet = new ResultSet;
	$resultSet->initialize($result);

	return $resultSet->current()->avg_chann;
   }

   public function average_channDefault($channel){
   	$sqlLast= "SELECT start_date_time FROM binTable ORDER  BY start_date_time DESC LIMIT 1";
	
	$result= $this->adapter->query($sqlLast)->execute();
	$resultSet = new ResultSet;
	$resultSet->initialize($result);
	$finish= $resultSet->current()->start_date_time;
	$start= date("Y-m-d H:i:s",strtotime($finish)-60*60*24*30);

	return $this->average_chann($start, $finish, $channel);
   }

   public function sorted_chann($start, $finish, $channel){
   	$sql= "select ".$channel." as chann from (select ".$channel." from binTable where start_date_time between '".$start."' and '".$finish."')as t1 order by ".$channel.";";

	$result = $this->adapter->query($sql)->execute();

	$resultSet = new ResultSet;
	$resultSet->initialize($result);

	return $resultSet;
   }

   public function sorted_channDefault($channel){
   	$sqlLast= "SELECT start_date_time FROM binTable ORDER  BY start_date_time DESC LIMIT 1";
	
	$result= $this->adapter->query($sqlLast)->execute();
	$resultSet = new ResultSet;
	$resultSet->initialize($result);
	$finish= $resultSet->current()->start_date_time;
	$start= date("Y-m-d H:i:s",strtotime($finish)-60*60*24*30);

	return $this->sorted_chann($start, $finish, $channel);
   }

}
 
