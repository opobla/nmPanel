<?php
namespace NmdaWebApi\V1\Rest\NmdadbChannelStats;

use ZF\ApiProblem\ApiProblem;
use ZF\Rest\AbstractResourceListener;

class NmdadbChannelStatsResource extends AbstractResourceListener
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

	if($start=='default' || $finish=='default'){
		$data=$this->model->statsDefault();
	}else{
		$start = date("Y-m-d H:i:s",$start);
		$finish = date("Y-m-d H:i:s",$finish);

		$data=$this->model->stats($start,$finish);
	}

	$dataExtJs=array();	

	foreach($data as $chan){
		$dataExtJs[]=array(
			'channel'=>$chan->channel,
			'last'=>(int)$chan->last,
			'average'=>(float)$chan->average,
			'std'=>(float)$chan->std,
			'max'=>(int)$chan->max,
			'min'=>(int)$chan->min,
		);
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
