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
	$sql = 	"select 'ch01'as channel,  ch01 as last, avg(ch01) as average, std(ch01) as std, max(ch01) as max, min(ch01) as min from(select ch01 from  binTable where start_date_time between '".$start."' and '".$finish."' order by start_date_time desc)as t1 union
                 select 'ch02'as channel,  ch02 as last, avg(ch02) as average, std(ch02) as std, max(ch02) as max, min(ch02) as min from(select ch02 from  binTable where start_date_time between '".$start."' and '".$finish."' order by start_date_time desc)as t2 union
                 select 'ch03'as channel,  ch03 as last, avg(ch03) as average, std(ch03) as std, max(ch03) as max, min(ch03) as min from(select ch03 from  binTable where start_date_time between '".$start."' and '".$finish."' order by start_date_time desc)as t3 union
                 select 'ch04'as channel,  ch04 as last, avg(ch04) as average, std(ch04) as std, max(ch04) as max, min(ch04) as min from(select ch04 from  binTable where start_date_time between '".$start."' and '".$finish."' order by start_date_time desc)as t4 union
                 select 'ch05'as channel,  ch05 as last, avg(ch05) as average, std(ch05) as std, max(ch05) as max, min(ch05) as min from(select ch05 from  binTable where start_date_time between '".$start."' and '".$finish."' order by start_date_time desc)as t5 union
                 select 'ch06'as channel,  ch06 as last, avg(ch06) as average, std(ch06) as std, max(ch06) as max, min(ch06) as min from(select ch06 from  binTable where start_date_time between '".$start."' and '".$finish."' order by start_date_time desc)as t6 union
                 select 'ch07'as channel,  ch07 as last, avg(ch07) as average, std(ch07) as std, max(ch07) as max, min(ch07) as min from(select ch07 from  binTable where start_date_time between '".$start."' and '".$finish."' order by start_date_time desc)as t7 union
                 select 'ch08'as channel,  ch08 as last, avg(ch08) as average, std(ch08) as std, max(ch08) as max, min(ch08) as min from(select ch08 from  binTable where start_date_time between '".$start."' and '".$finish."' order by start_date_time desc)as t8 union
                 select 'ch09'as channel,  ch09 as last, avg(ch09) as average, std(ch09) as std, max(ch09) as max, min(ch09) as min from(select ch09 from  binTable where start_date_time between '".$start."' and '".$finish."' order by start_date_time desc)as t9 union
                 select 'ch10'as channel,  ch10 as last, avg(ch10) as average, std(ch10) as std, max(ch10) as max, min(ch10) as min from(select ch10 from  binTable where start_date_time between '".$start."' and '".$finish."' order by start_date_time desc)as t10 union
                 select 'ch11'as channel,  ch11 as last, avg(ch11) as average, std(ch11) as std, max(ch11) as max, min(ch11) as min from(select ch11 from  binTable where start_date_time between '".$start."' and '".$finish."' order by start_date_time desc)as t11 union
                 select 'ch12'as channel,  ch12 as last, avg(ch12) as average, std(ch12) as std, max(ch12) as max, min(ch12) as min from(select ch12 from  binTable where start_date_time between '".$start."' and '".$finish."' order by start_date_time desc)as t12 union
                 select 'ch13'as channel,  ch13 as last, avg(ch13) as average, std(ch13) as std, max(ch13) as max, min(ch13) as min from(select ch13 from  binTable where start_date_time between '".$start."' and '".$finish."' order by start_date_time desc)as t13 union
                 select 'ch14'as channel,  ch14 as last, avg(ch14) as average, std(ch14) as std, max(ch14) as max, min(ch14) as min from(select ch14 from  binTable where start_date_time between '".$start."' and '".$finish."' order by start_date_time desc)as t14 union
                 select 'ch15'as channel,  ch15 as last, avg(ch15) as average, std(ch15) as std, max(ch15) as max, min(ch15) as min from(select ch15 from  binTable where start_date_time between '".$start."' and '".$finish."' order by start_date_time desc)as t15 union
                 select 'ch16'as channel,  ch16 as last, avg(ch16) as average, std(ch16) as std, max(ch16) as max, min(ch16) as min from(select ch16 from  binTable where start_date_time between '".$start."' and '".$finish."' order by start_date_time desc)as t16 union
                 select 'ch17'as channel,  ch17 as last, avg(ch17) as average, std(ch17) as std, max(ch17) as max, min(ch17) as min from(select ch17 from  binTable where start_date_time between '".$start."' and '".$finish."' order by start_date_time desc)as t17 union
                 select 'ch18'as channel,  ch18 as last, avg(ch18) as average, std(ch18) as std, max(ch18) as max, min(ch18) as min from(select ch18 from  binTable where start_date_time between '".$start."' and '".$finish."' order by start_date_time desc)as t18
;";		

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

	$start= date("Y-m-d H:i:s",strtotime($finish)-60*24*30);
	
	return $this->stats($start,$finish);
   }
}
 
