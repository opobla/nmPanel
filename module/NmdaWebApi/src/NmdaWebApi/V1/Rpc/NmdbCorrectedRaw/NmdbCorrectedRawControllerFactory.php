<?php
namespace NmdaWebApi\V1\Rpc\NmdbCorrectedRaw;

class NmdbCorrectedRawControllerFactory
{
    public function __invoke($controllers)
    {
		$services = $controllers->getServiceLocator(); 
		$model = $services->get('NmdaWebApi\V1\Model\nmdbModel');
        	return new NmdbCorrectedRawController($model);
    }
}
