<?php
namespace NmdaWebApi\V1\Rest\NmdadbChannelStats;

class NmdadbChannelStatsResourceFactory
{
    public function __invoke($services)
    {
        return new NmdadbChannelStatsResource();
    }
}
