<?php
namespace NmdaWebApi\V1\Rpc\NmdbRevisedGroup;

class NmdbRevisedGroupControllerFactory
{
    public function __invoke($controllers)
    {
		$services = $controllers->getServiceLocator(); 
		$model = $services->get('NmdaWebApi\V1\Model\nmdbModel');
        	return new NmdbRevisedGroupController($model);
    }
}
