<?php
namespace NmdaWebApi\V1\Rpc\NmdbRevisedGroup;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;

class NmdbRevisedGroupController extends AbstractActionController
{
	protected $model;
	public function __construct($model){
		$this->model= $model;
		date_default_timezone_set("UTC");}

	public function nmdbRevisedGroupAction(){
		$start=$this->getEvent()->getRouteMatch()->getParam('start');
		$finish=$this->getEvent()->getRouteMatch()->getParam('finish');
		$points=$this->getEvent()->getRouteMatch()->getParam('points');
		if($start=='all' || $finish=='all'){
			$data=$this->model->revisedGroupedAll($points);
			$last=$this->model->getLast();
		}else{
			$interval =round(($finish-$start)/($points));
		
			$start = date("Y-m-d H:i:s",$start);
			$finish = date("Y-m-d H:i:s",$finish);
			$data=$this->model->revisedGroupedInterval($start,$finish,$interval);
		}
		$dataHs=array();
		foreach ($data as $row){
				$dataHs[0][]=array(
					strtotime($row->time)*1000,
					$this->handleFloat($row->uncorrected_open),
					$this->handleFloat($row->uncorrected_max),
					$this->handleFloat($row->uncorrected_min),
					$this->handleFloat($row->uncorrected_close),
				);
				$dataHs[1][]=array(
					strtotime($row->time)*1000,
					$this->handleFloat($row->corr_for_pressure_open),
					$this->handleFloat($row->corr_for_pressure_max),
					$this->handleFloat($row->corr_for_pressure_min),
					$this->handleFloat($row->corr_for_pressure_close),
				);
				$dataHs[2][]=array(
					strtotime($row->time)*1000,
					$this->handleFloat($row->corr_for_efficiency_open),
					$this->handleFloat($row->corr_for_efficiency_max),
					$this->handleFloat($row->corr_for_efficiency_min),
					$this->handleFloat($row->corr_for_efficiency_close),
				);
				$dataHs[3][]=array(
					strtotime($row->time)*1000,
					$this->handleFloat($row->pressure_mbar_avg),
				);
		}
		
		if($start=='all' || $finish=='all'){
			array_push($dataHs[0], array((strtotime($last)+60*60*3)*1000, null, null, null, null ));
			array_push($dataHs[1], array((strtotime($last)+60*60*3)*1000, null, null, null, null ));
			array_push($dataHs[2], array((strtotime($last)+60*60*3)*1000, null, null, null, null ));
			array_push($dataHs[3], array((strtotime($last)+60*60*3)*1000, null, null ));
		}
		return new JsonModel($dataHs);	
	}

	function handleFloat($value){
		if($value==null)return null;
		return (float)$value;
	}
}
