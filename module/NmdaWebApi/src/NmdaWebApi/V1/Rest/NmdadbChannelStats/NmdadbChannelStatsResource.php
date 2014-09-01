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

	$the_row=$data->current();

	$dataExtJs[0]['channel']=$the_row->n1;
	$dataExtJs[1]['channel']=$the_row->n2;
	$dataExtJs[2]['channel']=$the_row->n3;
	$dataExtJs[3]['channel']=$the_row->n4;
	$dataExtJs[4]['channel']=$the_row->n5;
	$dataExtJs[5]['channel']=$the_row->n6;
	$dataExtJs[6]['channel']=$the_row->n7;
	$dataExtJs[7]['channel']=$the_row->n8;
	$dataExtJs[8]['channel']=$the_row->n9;
	$dataExtJs[9]['channel']=$the_row->n10;
	$dataExtJs[10]['channel']=$the_row->n11;
	$dataExtJs[11]['channel']=$the_row->n12;
	$dataExtJs[12]['channel']=$the_row->n13;
	$dataExtJs[13]['channel']=$the_row->n14;
	$dataExtJs[14]['channel']=$the_row->n15;
	$dataExtJs[15]['channel']=$the_row->n16;
	$dataExtJs[16]['channel']=$the_row->n17;
	$dataExtJs[17]['channel']=$the_row->n18;



	$dataExtJs[0]['last']=(int)$the_row->ch01;
	$dataExtJs[1]['last']=(int)$the_row->ch02;
	$dataExtJs[2]['last']=(int)$the_row->ch03;
	$dataExtJs[3]['last']=(int)$the_row->ch04;
	$dataExtJs[4]['last']=(int)$the_row->ch05;
	$dataExtJs[5]['last']=(int)$the_row->ch06;
	$dataExtJs[6]['last']=(int)$the_row->ch07;
	$dataExtJs[7]['last']=(int)$the_row->ch08;
	$dataExtJs[8]['last']=(int)$the_row->ch09;
	$dataExtJs[9]['last']=(int)$the_row->ch10;
	$dataExtJs[10]['last']=(int)$the_row->ch11;
	$dataExtJs[11]['last']=(int)$the_row->ch12;
	$dataExtJs[12]['last']=(int)$the_row->ch13;
	$dataExtJs[13]['last']=(int)$the_row->ch14;
	$dataExtJs[14]['last']=(int)$the_row->ch15;
	$dataExtJs[15]['last']=(int)$the_row->ch16;
	$dataExtJs[16]['last']=(int)$the_row->ch17;
	$dataExtJs[17]['last']=(int)$the_row->ch18;



	$dataExtJs[0]['average']=(float)$the_row->avg_ch01;
	$dataExtJs[1]['average']=(float)$the_row->avg_ch02;
	$dataExtJs[2]['average']=(float)$the_row->avg_ch03;
	$dataExtJs[3]['average']=(float)$the_row->avg_ch04;
	$dataExtJs[4]['average']=(float)$the_row->avg_ch05;
	$dataExtJs[5]['average']=(float)$the_row->avg_ch06;
	$dataExtJs[6]['average']=(float)$the_row->avg_ch07;
	$dataExtJs[7]['average']=(float)$the_row->avg_ch08;
	$dataExtJs[8]['average']=(float)$the_row->avg_ch09;
	$dataExtJs[9]['average']=(float)$the_row->avg_ch10;
	$dataExtJs[10]['average']=(float)$the_row->avg_ch11;
	$dataExtJs[11]['average']=(float)$the_row->avg_ch12;
	$dataExtJs[12]['average']=(float)$the_row->avg_ch13;
	$dataExtJs[13]['average']=(float)$the_row->avg_ch14;
	$dataExtJs[14]['average']=(float)$the_row->avg_ch15;
	$dataExtJs[15]['average']=(float)$the_row->avg_ch16;
	$dataExtJs[16]['average']=(float)$the_row->avg_ch17;
	$dataExtJs[17]['average']=(float)$the_row->avg_ch18;



	$dataExtJs[0]['std']=(float)$the_row->std_ch01;
	$dataExtJs[1]['std']=(float)$the_row->std_ch02;
	$dataExtJs[2]['std']=(float)$the_row->std_ch03;
	$dataExtJs[3]['std']=(float)$the_row->std_ch04;
	$dataExtJs[4]['std']=(float)$the_row->std_ch05;
	$dataExtJs[5]['std']=(float)$the_row->std_ch06;
	$dataExtJs[6]['std']=(float)$the_row->std_ch07;
	$dataExtJs[7]['std']=(float)$the_row->std_ch08;
	$dataExtJs[8]['std']=(float)$the_row->std_ch09;
	$dataExtJs[9]['std']=(float)$the_row->std_ch10;
	$dataExtJs[10]['std']=(float)$the_row->std_ch11;
	$dataExtJs[11]['std']=(float)$the_row->std_ch12;
	$dataExtJs[12]['std']=(float)$the_row->std_ch13;
	$dataExtJs[13]['std']=(float)$the_row->std_ch14;
	$dataExtJs[14]['std']=(float)$the_row->std_ch15;
	$dataExtJs[15]['std']=(float)$the_row->std_ch16;
	$dataExtJs[16]['std']=(float)$the_row->std_ch17;
	$dataExtJs[17]['std']=(float)$the_row->std_ch18;



	$dataExtJs[0]['max']=(int)$the_row->max_ch01;
	$dataExtJs[1]['max']=(int)$the_row->max_ch02;
	$dataExtJs[2]['max']=(int)$the_row->max_ch03;
	$dataExtJs[3]['max']=(int)$the_row->max_ch04;
	$dataExtJs[4]['max']=(int)$the_row->max_ch05;
	$dataExtJs[5]['max']=(int)$the_row->max_ch06;
	$dataExtJs[6]['max']=(int)$the_row->max_ch07;
	$dataExtJs[7]['max']=(int)$the_row->max_ch08;
	$dataExtJs[8]['max']=(int)$the_row->max_ch09;
	$dataExtJs[9]['max']=(int)$the_row->max_ch10;
	$dataExtJs[10]['max']=(int)$the_row->max_ch11;
	$dataExtJs[11]['max']=(int)$the_row->max_ch12;
	$dataExtJs[12]['max']=(int)$the_row->max_ch13;
	$dataExtJs[13]['max']=(int)$the_row->max_ch14;
	$dataExtJs[14]['max']=(int)$the_row->max_ch15;
	$dataExtJs[15]['max']=(int)$the_row->max_ch16;
	$dataExtJs[16]['max']=(int)$the_row->max_ch17;
	$dataExtJs[17]['max']=(int)$the_row->max_ch18;



	$dataExtJs[0]['min']=(int)$the_row->min_ch01;
	$dataExtJs[1]['min']=(int)$the_row->min_ch02;
	$dataExtJs[2]['min']=(int)$the_row->min_ch03;
	$dataExtJs[3]['min']=(int)$the_row->min_ch04;
	$dataExtJs[4]['min']=(int)$the_row->min_ch05;
	$dataExtJs[5]['min']=(int)$the_row->min_ch06;
	$dataExtJs[6]['min']=(int)$the_row->min_ch07;
	$dataExtJs[7]['min']=(int)$the_row->min_ch08;
	$dataExtJs[8]['min']=(int)$the_row->min_ch09;
	$dataExtJs[9]['min']=(int)$the_row->min_ch10;
	$dataExtJs[10]['min']=(int)$the_row->min_ch11;
	$dataExtJs[11]['min']=(int)$the_row->min_ch12;
	$dataExtJs[12]['min']=(int)$the_row->min_ch13;
	$dataExtJs[13]['min']=(int)$the_row->min_ch14;
	$dataExtJs[14]['min']=(int)$the_row->min_ch15;
	$dataExtJs[15]['min']=(int)$the_row->min_ch16;
	$dataExtJs[16]['min']=(int)$the_row->min_ch17;
	$dataExtJs[17]['min']=(int)$the_row->min_ch18;

	/*foreach($data as $chan){
		$dataExtJs[]=array(
			'channel'=>$chan->channel,
			'last'=>(int)$chan->last,
			'average'=>(float)$chan->average,
			'std'=>(float)$chan->std,
			'max'=>(int)$chan->max,
			'min'=>(int)$chan->min,
		);
	}*/

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
