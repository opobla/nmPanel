<?php
namespace NmdaWebApi\V1\Rest\Hola;

class HolaResourceFactory
{
    public function __invoke($services)
    {
        return new HolaResource();
    }
}
