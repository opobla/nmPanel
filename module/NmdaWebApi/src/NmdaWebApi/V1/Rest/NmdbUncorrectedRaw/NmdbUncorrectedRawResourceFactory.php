<?php
namespace NmdaWebApi\V1\Rest\NmdbUncorrectedRaw;

class NmdbUncorrectedRawResourceFactory
{
    public function __invoke($services)
    {
        return new NmdbUncorrectedRawResource();
    }
}
