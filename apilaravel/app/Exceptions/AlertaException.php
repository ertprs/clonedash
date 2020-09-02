<?php 

namespace App\Exceptions;

use Exception;

/**
 * @author Tiago Franco
 * Servico para
 */
class AlertaException extends Exception
{
    protected $nivel;

    public function __construct($msg , $nivel)
    {
        $this->nivel = $nivel;

        parent::__construct($msg);
    }
    
    /**
     * Get the value of nivel
     */ 
    public function getNivel()
    {
        return $this->nivel;
    }
}