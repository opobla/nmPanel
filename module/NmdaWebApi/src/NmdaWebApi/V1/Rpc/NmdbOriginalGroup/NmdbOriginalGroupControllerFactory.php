<?php
namespace NmdaWebApi\V1\Rpc\NmdbOriginalGroup;

class NmdbOriginalGroupControllerFactory
{
    public function __invoke($controllers)
    {
		$services = $controllers->getServiceLocator(); 
		$model = $services->get('NmdaWebApi\V1\Model\nmdbModel');
        	return new NmdbOriginalGroupController($model);
    }
}
