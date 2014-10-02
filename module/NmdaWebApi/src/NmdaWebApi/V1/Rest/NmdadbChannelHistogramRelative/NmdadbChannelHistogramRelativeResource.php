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
			$sorted_data=$this->model->sorted_channDefault($aux, $avg);	
		}else{
			$new_start = date("Y-m-d H:i:s",$start);
			$new_finish = date("Y-m-d H:i:s",$finish);

			$avg=$this->model->average_chann($new_start, $new_finish, $aux);
			$sorted_data=$this->model->sorted_chann($new_start, $new_finish, $aux, $avg);
		}


		$dataExtJs[$i]=array_fill(0,80,0);
		foreach($sorted_data as $row){
			$slice=$row->slice; $val=$row->val;
			if ($slice <= -40){
				$dataExtJs[$i][0]+=intval($val);
				continue;
			}
			if ($slice >= 40){
				$dataExtJs[$i][79]+=intval($val);
				continue;
			}
			$dataExtJs[$i][$slice+40]=intval($val);
		}
		
		$the_sum=array_sum($dataExtJs[$i]);
		for($y=0; $y<sizeof($dataExtJs[$i]); $y++){
			$dataExtJs[$i][$y]=($dataExtJs[$i][$y]/$the_sum)*100;
		}
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
