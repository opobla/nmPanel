<?php
namespace NmdaWebApi\V1\Rest\NmdbCorrectedRaw;

class NmdbCorrectedRawResourceFactory
{
    public function __invoke($services)
    {
        return new NmdbCorrectedRawResource();
    }
}
