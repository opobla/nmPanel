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
 
	public function interval($start,$finish)
   {
		$sql = "SELECT * FROM binTable WHERE start_date_time between '".$start."' and '".$finish."';";
		$result = $this->adapter->query($sql)->execute();

		$resultSet = new ResultSet;
    		$resultSet->initialize($result);

		return $resultSet;
    }

}
 
