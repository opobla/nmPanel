<?php
namespace NmdaWebApi\V1\Rpc\NmdbUncorrectedRaw;

class NmdbUncorrectedRawControllerFactory
{
    public function __invoke($controllers)
    {
		$services = $controllers->getServiceLocator(); 
		$model = $services->get('NmdaWebApi\V1\Model\nmdbModel');
		return new NmdbUncorrectedRawController($model);
    }
}
