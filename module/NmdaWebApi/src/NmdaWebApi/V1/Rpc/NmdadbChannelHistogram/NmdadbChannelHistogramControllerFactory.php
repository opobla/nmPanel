<?php
namespace NmdaWebApi\V1\Rpc\NmdadbChannelHistogram;

class NmdadbChannelHistogramControllerFactory
{
    public function __invoke($controllers)
    {
		$services = $controllers->getServiceLocator(); 
		$model = $services->get('NmdaWebApi\V1\Model\nmdadbModel');
        	return new NmdadbChannelHistogramController($model);
    }
}
