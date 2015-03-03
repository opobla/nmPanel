<?php
namespace NmdaWebApi\V1\Rpc\NmdadbChannelStats;

class NmdadbChannelStatsControllerFactory
{
    public function __invoke($controllers)
    {
		$services = $controllers->getServiceLocator(); 
		$model = $services->get('NmdaWebApi\V1\Model\nmdadbModel');
        	return new NmdadbChannelStatsController($model);
    }
}
