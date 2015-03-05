<?php
namespace NmdaWebApi\V1\Rpc\NmdbRevisedRaw;

class NmdbRevisedRawControllerFactory
{
    public function __invoke($controllers)
    {
		$services = $controllers->getServiceLocator(); 
		$model = $services->get('NmdaWebApi\V1\Model\nmdbModel');
        	return new NmdbRevisedRawController($model);
    }
}
