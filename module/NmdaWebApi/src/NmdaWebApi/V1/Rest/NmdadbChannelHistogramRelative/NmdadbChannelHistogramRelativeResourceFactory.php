<?php
namespace NmdaWebApi\V1\Rest\NmdadbChannelHistogramRelative;

class NmdadbChannelHistogramRelativeResourceFactory
{
    public function __invoke($services)
    {
        return new NmdadbChannelHistogramRelativeResource();
    }
}
