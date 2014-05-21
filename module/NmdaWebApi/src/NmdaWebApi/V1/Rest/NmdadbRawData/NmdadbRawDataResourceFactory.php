<?php
namespace NmdaWebApi\V1\Rest\NmdadbRawData;

class NmdadbRawDataResourceFactory
{
    public function __invoke($services)
    {
        return new NmdadbRawDataResource();
    }
}
