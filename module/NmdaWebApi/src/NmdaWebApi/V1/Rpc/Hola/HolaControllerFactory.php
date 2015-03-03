<?php
namespace NmdaWebApi\V1\Rpc\Hola;

class HolaControllerFactory
{
    public function __invoke($controllers)
    {
        return new HolaController();
    }
}
