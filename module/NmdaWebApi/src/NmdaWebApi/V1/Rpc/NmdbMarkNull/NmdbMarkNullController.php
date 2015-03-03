<?php
namespace NmdaWebApi\V1\Rpc\NmdbMarkNull;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;

class NmdbMarkNullController extends AbstractActionController
{
	protected $model;
	public function __construct($model){
		$this->model= $model;
		date_default_timezone_set("UTC");}

	public function nmdbMarkNullAction(){
		$data = $this->bodyParams();
		$dates=array();
		if(array_key_exists("start_date_time", $data)){
			$dates[0]=$data["start_date_time"];	
		}else{
			foreach($data as $entry){
				$dates[]=$entry['start_date_time'];
			}
		} 
		$response=$this->model->marknull($dates);
		return array('success'=>$response,'id'=>1,'messege'=>'Data successfully updated');	
	}
}
