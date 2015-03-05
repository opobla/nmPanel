<?php
namespace NmdaWebApi\V1\Rpc\NmdbOriginalRaw;

class NmdbOriginalRawControllerFactory
{
    public function __invoke($controllers)
    {
		$services = $controllers->getServiceLocator(); 
		$model = $services->get('NmdaWebApi\V1\Model\nmdbModel');
        	return new NmdbOriginalRawController($model);
    }
}
