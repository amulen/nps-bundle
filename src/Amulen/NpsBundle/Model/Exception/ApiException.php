<?php

namespace Amulen\NpsBundle\Model\Exception;

/**
 * Created by PhpStorm.
 * User: juanma
 * Date: 3/11/17
 * Time: 6:27 PM
 */
class ApiException extends \Exception
{
    function __construct($msg)
    {
        parent::__construct($msg);
    }

}