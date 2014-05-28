<?php
namespace NmdaWebApi\V1\Rest\NmdbMarkNull;

class NmdbMarkNullResourceFactory
{
    public function __invoke($services)
    {
        return new NmdbMarkNullResource();
    }
}
