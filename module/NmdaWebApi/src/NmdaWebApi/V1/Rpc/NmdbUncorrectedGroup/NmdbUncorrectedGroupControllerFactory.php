<?php
namespace NmdaWebApi\V1\Rpc\NmdbUncorrectedGroup;

class NmdbUncorrectedGroupControllerFactory
{
    public function __invoke($controllers)
    {
	$services = $controllers->getServiceLocator(); 
	$model = $services->get('NmdaWebApi\V1\Model\nmdbModel');
        return new NmdbUncorrectedGroupController($model);
    }
}
