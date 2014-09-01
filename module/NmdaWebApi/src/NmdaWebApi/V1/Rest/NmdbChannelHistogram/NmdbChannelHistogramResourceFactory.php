<?php
namespace NmdaWebApi\V1\Rest\NmdbChannelHistogram;

class NmdbChannelHistogramResourceFactory
{
    public function __invoke($services)
    {
        return new NmdbChannelHistogramResource();
    }
}
