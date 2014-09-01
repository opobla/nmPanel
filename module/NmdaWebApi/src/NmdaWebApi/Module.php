<?php
namespace NmdaWebApi;

use ZF\Apigility\Provider\ApigilityProviderInterface;

class Module implements ApigilityProviderInterface
{
    public function getConfig()
    {
        return include __DIR__ . '/../../config/module.config.php';
    }

	public function getServiceConfig()
	{
		return array(
			'factories' => array(	
				'NmdaWebApi\V1\Model\nmdadbModel' => function ($sm){
					$db1adapter = $sm->get('db1');
					return new \NmdaWebApi\V1\Model\nmdadbModel($db1adapter);
				},
				'NmdaWebApi\V1\Model\nmdbModel' => function ($sm){
					$db2adapter = $sm->get('db2');
					return new \NmdaWebApi\V1\Model\nmdbModel($db2adapter);
				},
				'NmdaWebApi\V1\Rest\NmdadbRawData\NmdadbRawDataResource' => function ($sm) {
					$db1adapter = $sm->get('db1');
					$model = $sm->get('NmdaWebApi\V1\Model\nmdadbModel');
			    		return new \NmdaWebApi\V1\Rest\NmdadbRawData\NmdadbRawDataResource($model);
				},
				'NmdaWebApi\V1\Rest\NmdadbChannelStats\NmdadbChannelStatsResource' => function ($sm) {
					$db1adapter = $sm->get('db1');
					$model = $sm->get('NmdaWebApi\V1\Model\nmdadbModel');
			    		return new \NmdaWebApi\V1\Rest\NmdadbChannelStats\NmdadbChannelStatsResource($model);
				},
				'NmdaWebApi\V1\Rest\NmdbChannelHistogram\NmdbChannelHistogramResource' => function ($sm) {
					$db1adapter = $sm->get('db1');
					$model = $sm->get('NmdaWebApi\V1\Model\nmdadbModel');
			    		return new \NmdaWebApi\V1\Rest\NmdbChannelHistogram\NmdbChannelHistogramResource($model);
				},
				
				'NmdaWebApi\V1\Rest\NmdbUncorrectedRaw\NmdbUncorrectedRawResource' => function ($sm) {
					$db2adapter = $sm->get('db2');
					$model = $sm->get('NmdaWebApi\V1\Model\nmdbModel');
			    		return new \NmdaWebApi\V1\Rest\NmdbUncorrectedRaw\NmdbUncorrectedRawResource($model);
				},
				'NmdaWebApi\V1\Rest\NmdbUncorrectedGroup\NmdbUncorrectedGroupResource' => function ($sm) {
					$db2adapter = $sm->get('db2');
					$model = $sm->get('NmdaWebApi\V1\Model\nmdbModel');
			    		return new \NmdaWebApi\V1\Rest\NmdbUncorrectedGroup\NmdbUncorrectedGroupResource($model);
				},
				'NmdaWebApi\V1\Rest\NmdbCorrectedRaw\NmdbCorrectedRawResource' => function ($sm) {
					$db2adapter = $sm->get('db2');
					$model = $sm->get('NmdaWebApi\V1\Model\nmdbModel');
			    		return new \NmdaWebApi\V1\Rest\NmdbCorrectedRaw\NmdbCorrectedRawResource($model);
				},
				'NmdaWebApi\V1\Rest\NmdbCorrectedGroup\NmdbCorrectedGroupResource' => function ($sm) {
					$db2adapter = $sm->get('db2');
					$model = $sm->get('NmdaWebApi\V1\Model\nmdbModel');
			    		return new \NmdaWebApi\V1\Rest\NmdbCorrectedGroup\NmdbCorrectedGroupResource($model);
				},
				'NmdaWebApi\V1\Rest\NmdbMarkNull\NmdbMarkNullResource' => function ($sm) {
					$db2adapter = $sm->get('db2');
					$model = $sm->get('NmdaWebApi\V1\Model\nmdbModel');
			    		return new \NmdaWebApi\V1\Rest\NmdbMarkNull\NmdbMarkNullResource($model);
				},
			    	'NmdaWebApi\V1\Rest\Hola\HolaResource' => function ($sm) {
			    		return new \NmdaWebApi\V1\Rest\Hola\HolaResource();
				},
			),
		);
	}

    public function getAutoloaderConfig()
    {
        return array(
            'ZF\Apigility\Autoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__,
                ),
            ),
        );
    }
}
