<?php
namespace NmdaWebApi\V1\Rpc\NmdadbChannelHistogram;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;

class NmdadbChannelHistogramController extends AbstractActionController
{
	protected $model;
	public function __construct($model){
		$this->model= $model;
		date_default_timezone_set("UTC");}

	public function nmdadbChannelHistogramAction(){
		$start=$this->getEvent()->getRouteMatch()->getParam('start');
		$finish=$this->getEvent()->getRouteMatch()->getParam('finish');
		$dataExtJs=array();	
		$dataExtJs2=array();
		for ($i=0; $i<18; $i++){
			$aux=str_pad($i+1, 2, "0", STR_PAD_LEFT);
			$aux='ch'.$aux;
			if($start=='default' || $finish=='default'){
				$data=$this->model->histogramDefault($aux);
			}else{
				$new_start = date("Y-m-d H:i:s",$start);
				$new_finish = date("Y-m-d H:i:s",$finish);
				$data=$this->model->histogram($new_start, $new_finish, $aux);
			}
			foreach($data as $row){
				$dataExtJs[$i][]=array((int)$row->num, (int)$row->val);
			}
			if ($dataExtJs[$i]==null){
				$dataExtJs2[$i]=array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0); 
				continue;
			}
			$the_new=array();
			$the_next=0;
			$y=0;
			while(true){
				if ($dataExtJs[$i][$the_next][0]==$y){
					$the_new[]=$dataExtJs[$i][$the_next][1];
					$the_next++;
					if ($the_next==sizeof($dataExtJs[$i])){
						$the_new[]=0;
						break;
					}
				}else{
					$the_new[]=0;
				}
				$y+=1;
			}
			$the_sum=array_sum($the_new);
			for($y=0; $y<sizeof($the_new); $y++){
				$the_new[$y]=($the_new[$y]/$the_sum)*100;
			}
			$dataExtJs2[$i]=$the_new; 
		}
		return new JsonModel($dataExtJs2);
	}
}
