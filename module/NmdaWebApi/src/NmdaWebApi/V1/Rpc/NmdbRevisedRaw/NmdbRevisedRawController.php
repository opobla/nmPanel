<?php
namespace NmdaWebApi\V1\Rpc\NmdbRevisedRaw;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;

class NmdbRevisedRawController extends AbstractActionController
{
	protected $model;
	public function __construct($model){
		$this->model= $model;
		date_default_timezone_set("UTC");}

	public function nmdbRevisedRawAction(){
		$start=$this->getEvent()->getRouteMatch()->getParam('start');
		$finish=$this->getEvent()->getRouteMatch()->getParam('finish');
		$start = date("Y-m-d H:i:s",$start);
		$finish = date("Y-m-d H:i:s",$finish);
		$data=$this->model->correctedRawInterval($start,$finish);
		$dataHs=array();
		
		foreach ($data as $row){
				$dataHs[0][]=array(
					strtotime($row->start_date_time)*1000,
					$this->handleFloat($row->uncorrected),
				);
				$dataHs[1][]=array(
					strtotime($row->start_date_time)*1000,
					$this->handleFloat($row->corr_for_pressure),
				);
				$dataHs[2][]=array(
					strtotime($row->start_date_time)*1000,
					$this->handleFloat($row->corr_for_efficiency),
				);
				$dataHs[3][]=array(
					strtotime($row->start_date_time)*1000,
					$this->handleFloat($row->pressure_mbar),
				);
			}
		
		return new JsonModel($dataHs);	
	}

	function handleFloat($value){
		if($value==null)return null;
		return (float)$value;
	}
}
