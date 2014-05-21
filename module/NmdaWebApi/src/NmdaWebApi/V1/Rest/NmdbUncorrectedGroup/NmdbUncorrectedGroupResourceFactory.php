<?php
namespace NmdaWebApi\V1\Rest\NmdbUncorrectedGroup;

class NmdbUncorrectedGroupResourceFactory
{
    public function __invoke($services)
    {
        return new NmdbUncorrectedGroupResource();
    }
}
