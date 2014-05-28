<?php
namespace NmdaWebApi\V1\Rest\NmdadbRawData;

use ZF\ApiProblem\ApiProblem;
use ZF\Rest\AbstractResourceListener;

class NmdadbRawDataResource extends AbstractResourceListener
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

		return $dataHs;
        //return new ApiProblem(405, 'The GET method has not been defined for collections');
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
