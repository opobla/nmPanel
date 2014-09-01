<?php
namespace NmdaWebApi\V1\Rest\NmdbChannelHistogram;

use ZF\ApiProblem\ApiProblem;
use ZF\Rest\AbstractResourceListener;

class NmdbChannelHistogramResource extends AbstractResourceListener
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
	$dataExtJs2=array();

	for ($i=0; $i<18; $i++){
		$aux=str_pad($i+1, 2, "0", STR_PAD_LEFT);
		$aux='ch'.$aux;

		if($start=='default' || $finish=='default'){
			$aux2=$this->model->histogramDefault($aux);
			$low=$aux2[0];
			$mid=$aux2[1];
			$high=$aux2[2];
		}else{
			$start = date("Y-m-d H:i:s",$start);
			$finish = date("Y-m-d H:i:s",$finish);

			$aux2=$this->model->histogram($start,$finish, $aux);
			$low=$aux2[0];
			$mid=$aux2[1];
			$high=$aux2[2];
		}

		$dataExtJs[$i][0]=array(0, (int)$low->current()->val);

		foreach($mid as $row){
			$dataExtJs[$i][]=array((int)$row->num-29, (int)$row->val);
		}
		$dataExtJs[$i][]=array(61, (int)$high->current()->val);

		$the_new=array_fill(0, 62, 0);
		$the_next=0;
		for($y=0; $y<62; $y++){
			if ($dataExtJs[$i][$the_next][0]==$y){
				$the_new[$y]=$dataExtJs[$i][$the_next][1];
				$the_next++;
				if ($the_next==sizeof($dataExtJs[$i])){
					break;
				}
			}
		}

		$the_new[]=0;
		$dataExtJs2[$i]=$the_new; 

	}
	return $dataExtJs2;

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
