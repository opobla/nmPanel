<?php
namespace NmdaWebApi\V1\Rpc\Hola;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;

class HolaController extends AbstractActionController
{
    public function holaAction()
    {
	    $data = array(1, 2, 3, 4, array(1,2,3));
	    return new JsonModel($data);
    }
}
