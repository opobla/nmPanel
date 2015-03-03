<?php
namespace NmdaWebApi\V1\Rpc\NmdadbRawData;

class NmdadbRawDataControllerFactory
{
    public function __invoke($controllers)
    {
		$services = $controllers->getServiceLocator(); 
		$model = $services->get('NmdaWebApi\V1\Model\nmdadbModel');
        	return new NmdadbRawDataController($model);
    }
}
