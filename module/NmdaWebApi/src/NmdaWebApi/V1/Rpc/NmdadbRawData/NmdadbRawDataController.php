<?php
namespace NmdaWebApi\V1\Rpc\NmdadbRawData;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;

class NmdadbRawDataController extends AbstractActionController
{
	protected $model;
	public function __construct($model){
		$this->model= $model;
		date_default_timezone_set("UTC");}

	public function nmdadbRawDataAction(){
		$start=$this->getEvent()->getRouteMatch()->getParam('start');
		$finish=$this->getEvent()->getRouteMatch()->getParam('finish');
		$start = date("Y-m-d H:i:s",$start);
		$finish = date("Y-m-d H:i:s",$finish);
		
		$data=$this->model->interval($start,$finish);
		$dataHs=array();
		
		foreach ($data as $row){
				$dataHs[0][]=array(
					strtotime($row->start_date_time)*1000,
					(int)$row->ch01,
				);
				$dataHs[1][]=array(
					strtotime($row->start_date_time)*1000,
					(int)$row->ch02,
				);
				$dataHs[2][]=array(
					strtotime($row->start_date_time)*1000,
					(int)$row->ch03,
				);
				$dataHs[3][]=array(
					strtotime($row->start_date_time)*1000,
					(int)$row->ch04,
				);
				$dataHs[4][]=array(
					strtotime($row->start_date_time)*1000,
					(int)$row->ch05,
				);
				$dataHs[5][]=array(
					strtotime($row->start_date_time)*1000,
					(int)$row->ch06,
				);
				$dataHs[6][]=array(
					strtotime($row->start_date_time)*1000,
					(int)$row->ch07,
				);
				$dataHs[7][]=array(
					strtotime($row->start_date_time)*1000,
					(int)$row->ch08,
				);
				$dataHs[8][]=array(
					strtotime($row->start_date_time)*1000,
					(int)$row->ch09,
				);
				$dataHs[9][]=array(
					strtotime($row->start_date_time)*1000,
					(int)$row->ch10,
				);
				$dataHs[10][]=array(
					strtotime($row->start_date_time)*1000,
					(int)$row->ch11,
				);
				$dataHs[11][]=array(
					strtotime($row->start_date_time)*1000,
					(int)$row->ch12,
				);
				$dataHs[12][]=array(
					strtotime($row->start_date_time)*1000,
					(int)$row->ch13,
				);
				$dataHs[13][]=array(
					strtotime($row->start_date_time)*1000,
					(int)$row->ch14,
				);
				$dataHs[14][]=array(
					strtotime($row->start_date_time)*1000,
					(int)$row->ch15,
				);
				$dataHs[15][]=array(
					strtotime($row->start_date_time)*1000,
					(int)$row->ch16,
				);
				$dataHs[16][]=array(
					strtotime($row->start_date_time)*1000,
					(int)$row->ch17,
				);
				$dataHs[17][]=array(
					strtotime($row->start_date_time)*1000,
					(int)$row->ch18,
				);
			}
		return new JsonModel($dataHs);	
	}
}
