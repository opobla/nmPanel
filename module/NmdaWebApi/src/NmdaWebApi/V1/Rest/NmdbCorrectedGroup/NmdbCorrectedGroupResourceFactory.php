<?php
namespace NmdaWebApi\V1\Rest\NmdbCorrectedGroup;

class NmdbCorrectedGroupResourceFactory
{
    public function __invoke($services)
    {
        return new NmdbCorrectedGroupResource();
    }
}
