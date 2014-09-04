<?php
namespace NmdaWebApi\V1\Rest\NmdadbChannelHistogramRelative;

use ZF\ApiProblem\ApiProblem;
use ZF\Rest\AbstractResourceListener;

class NmdadbChannelHistogramRelativeResource extends AbstractResourceListener
{
        protected $model;
	public function __construct($model)
	{
		$this->model= $model;
		date_default_timezone_set("UTC");
	}

    /**
     * Create a resource
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function create($data)
    {
        return new ApiProblem(405, 'The POST method has not been defined');
    }

    /**
     * Delete a resource
     *
     * @param  mixed $id
     * @return ApiProblem|mixed
     */
    public function delete($id)
    {
        return new ApiProblem(405, 'The DELETE method has not been defined for individual resources');
    }

    /**
     * Delete a collection, or members of a collection
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function deleteList($data)
    {
        return new ApiProblem(405, 'The DELETE method has not been defined for collections');
    }

    /**
     * Fetch a resource
     *
     * @param  mixed $id
     * @return ApiProblem|mixed
     */
    public function fetch($id)
    {
        return new ApiProblem(405, 'The GET method has not been defined for individual resources');
    }

    /**
     * Fetch all or a subset of resources
     *
     * @param  array $params
     * @return ApiProblem|mixed
     */
    public function fetchAll($params = array())
    {
 	$start=$this->getEvent()->getRouteMatch()->getParam('start');
	$finish=$this->getEvent()->getRouteMatch()->getParam('finish');

	$dataExtJs=array();
	for ($i=0; $i<18; $i++){
		$aux=str_pad($i+1, 2, "0", STR_PAD_LEFT);
		$aux='ch'.$aux;

		if($start=='default' || $finish=='default'){
			$avg=$this->model->average_channDefault($aux);
			$sorted_data=$this->model->sorted_channDefault($aux);	
		}else{
			$new_start = date("Y-m-d H:i:s",$start);
			$new_finish = date("Y-m-d H:i:s",$finish);

			$avg=$this->model->average_chann($new_start, $new_finish, $aux);
			$sorted_data=$this->model->sorted_chann($new_start, $new_finish, $aux);
		}


		$histo=array_fill(0, 40, 0);
		$act=0;
		$ini=0.62;
		$inc=0.02;
		$y=0;
		foreach($sorted_data as $row){
			$val=$row->chann;
			if($val<(($ini+$inc*$act)*$avg)){
				$histo[$act]+=1;
				$y++;
			}else{
				if($act<39)
					$act+=1;
				if ($act==39){
					$histo[$act]+=1;
					$y++;
				}
			}
		}

		/*
		$sorted=array();	
		foreach($sorted_data as $row){
			$sorted[]=$row->chann;
		}

		$histo=array_fill(0, 40, 0);
		$act=0;
		$ini=0.62;
		$inc=0.02;
		$y=0;
		while($y<sizeof($sorted)){
			if($sorted[$y]<(($ini+$inc*$act)*$avg)){
				$histo[$act]+=1;
				$y++;
			}else{
				$act+=1;
				if ($act==39){
					$histo[$act]=sizeof($sorted)-$y;
					break;
				}
			}

		}*/

		$the_sum=array_sum($histo);
		for($y=0; $y<sizeof($histo); $y++){
			$histo[$y]=($histo[$y]/$the_sum)*100;
		}
		$dataExtJs[]=$histo;
	}
	return $dataExtJs;
    }

    /**
     * Patch (partial in-place update) a resource
     *
     * @param  mixed $id
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function patch($id, $data)
    {
        return new ApiProblem(405, 'The PATCH method has not been defined for individual resources');
    }

    /**
     * Replace a collection or members of a collection
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function replaceList($data)
    {
        return new ApiProblem(405, 'The PUT method has not been defined for collections');
    }

    /**
     * Update a resource
     *
     * @param  mixed $id
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function update($id, $data)
    {
        return new ApiProblem(405, 'The PUT method has not been defined for individual resources');
    }
}
