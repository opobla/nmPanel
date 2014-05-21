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
				'NmdaWebApi\V1\Rest\NmdadbRawData\NmdadbRawDataResource' => function ($sm) {
					$db1adapter = $sm->get('db1');
			    		return new \NmdaWebApi\V1\Rest\NmdadbRawData\NmdadbRawDataResource($db1adapter);
				},
				
				'NmdaWebApi\V1\Rest\NmdbUncorrectedRaw\NmdbUncorrectedRawResource' => function ($sm) {
					$db2adapter = $sm->get('db2');
			    		return new \NmdaWebApi\V1\Rest\NmdbUncorrectedRaw\NmdbUncorrectedRawResource($db2adapter);
				},
				'NmdaWebApi\V1\Rest\NmdbUncorrectedGroup\NmdbUncorrectedGroupResource' => function ($sm) {
					$db2adapter = $sm->get('db2');
			    		return new \NmdaWebApi\V1\Rest\NmdbUncorrectedGroup\NmdbUncorrectedGroupResource($db2adapter);
				},
				'NmdaWebApi\V1\Rest\NmdbCorrectedRaw\NmdbCorrectedRawResource' => function ($sm) {
					$db2adapter = $sm->get('db2');
			    		return new \NmdaWebApi\V1\Rest\NmdbCorrectedRaw\NmdbCorrectedRawResource($db2adapter);
				},
				'NmdaWebApi\V1\Rest\NmdbCorrectedGroup\NmdbCorrectedGroupResource' => function ($sm) {
					$db2adapter = $sm->get('db2');
			    		return new \NmdaWebApi\V1\Rest\NmdbCorrectedGroup\NmdbCorrectedGroupResource($db2adapter);
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