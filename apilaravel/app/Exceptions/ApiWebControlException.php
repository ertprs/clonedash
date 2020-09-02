<?php 

namespace App\Exceptions;

use Exception;

/**
 * @author Tiago Franco
 * Servico para
 */
class ApiWebControlException extends Exception
{
    public function __construct($msg , $code = "")
    {
        $this->msg = $msg;
        $this->code = $code;

        parent::__construct($msg);
    }
}