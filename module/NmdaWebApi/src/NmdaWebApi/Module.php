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
