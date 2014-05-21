<?php
namespace NmdaWebApi\V1\Rest\NmdbUncorrectedRaw;

use ZF\ApiProblem\ApiProblem;
use ZF\Rest\AbstractResourceListener;

class NmdbUncorrectedRawResource extends AbstractResourceListener
{
    protected $db2adapter;
    public function __construct($db2adapter)
    {
	$this->db2adapter= $db2adapter;
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
     * @param  array 
     * @return ApiProblem|mixed
     */
    public function fetchAll($params = array())
    {
		$start=$this->getEvent()->getRouteMatch()->getParam('start');
		$finish=$this->getEvent()->getRouteMatch()->getParam('finish');

		$start = date("Y-m-d H:i:s",$start);
		$finish = date("Y-m-d H:i:s",$finish);

		$model=new \NmdaWebApi\V1\Model\nmdbModel($this->db2adapter);
		
		$data=$model->uncorrectedRawInterval($start,$finish);
		$dataHs=array();

		foreach ($data as $row){
				$dataHs[0][]=array(
					strtotime($row->start_date_time)*1000,
					$this->handleFloat($row->measured_uncorrected),
				);
				$dataHs[1][]=array(
					strtotime($row->start_date_time)*1000,
					$this->handleFloat($row->measured_corr_for_pressure),
				);
				$dataHs[2][]=array(
					strtotime($row->start_date_time)*1000,
					$this->handleFloat($row->measured_corr_for_efficiency),
				);
				$dataHs[3][]=array(
					strtotime($row->start_date_time)*1000,
					$this->handleFloat($row->measured_pressure_mbar),
				);
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
