<?php
namespace NmdaWebApi\V1\Rest\NmdbUncorrectedGroup;

use ZF\ApiProblem\ApiProblem;
use ZF\Rest\AbstractResourceListener;

class NmdbUncorrectedGroupResource extends AbstractResourceListener
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
		$points=$this->getEvent()->getRouteMatch()->getParam('points');

		if($start=='all' || $finish=='all'){
			$aux=$this->model->uncorrectedGroupedAll($points);
			$data=$aux[0];
			$last=$aux[1];
		}else{
			$interval =round(($finish-$start)/($points-1));
		
			$start = date("Y-m-d H:i:s",$start);
			$finish = date("Y-m-d H:i:s",$finish);

			$data=$this->model->uncorrectedGroupedInterval($start,$finish,$interval);
		}

		$dataHs=array();

		foreach ($data as $row){
				$dataHs[0][]=array(
					strtotime($row->time)*1000,
					$this->handleFloat($row->measured_uncorrected_open),
					$this->handleFloat($row->measured_uncorrected_max),
					$this->handleFloat($row->measured_uncorrected_min),
					$this->handleFloat($row->measured_uncorrected_close),
				);
				$dataHs[1][]=array(
					strtotime($row->time)*1000,
					$this->handleFloat($row->measured_corr_for_pressure_open),
					$this->handleFloat($row->measured_corr_for_pressure_max),
					$this->handleFloat($row->measured_corr_for_pressure_min),
					$this->handleFloat($row->measured_corr_for_pressure_close),
				);
				$dataHs[2][]=array(
					strtotime($row->time)*1000,
					$this->handleFloat($row->measured_corr_for_efficiency_open),
					$this->handleFloat($row->measured_corr_for_efficiency_max),
					$this->handleFloat($row->measured_corr_for_efficiency_min),
					$this->handleFloat($row->measured_corr_for_efficiency_close),
				);
				$dataHs[3][]=array(
					strtotime($row->time)*1000,
					$this->handleFloat($row->measured_pressure_mbar_avg),
				);
			}

		if($start=='all' || $finish=='all'){
			array_push($dataHs[0], array((strtotime($last)+60*60*3)*1000, null, null, null, null ));
			array_push($dataHs[1], array((strtotime($last)+60*60*3)*1000, null, null, null, null ));
			array_push($dataHs[2], array((strtotime($last)+60*60*3)*1000, null, null, null, null ));
			array_push($dataHs[3], array((strtotime($last)+60*60*3)*1000, null, null ));
		}
		return $dataHs;
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

	function handleFloat($value){
		if($value==null)return null;
		return (float)$value;
	}
}
