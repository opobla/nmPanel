<?php
namespace NmdaWebApi\V1\Rpc\NmdbMarkNull;

class NmdbMarkNullControllerFactory
{
    public function __invoke($controllers)
    {
		$services = $controllers->getServiceLocator(); 
		$model = $services->get('NmdaWebApi\V1\Model\nmdbModel');
        	return new NmdbMarkNullController($model);
    }
}
