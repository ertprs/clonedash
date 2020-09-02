<?php

namespace App\ResponseApi;

use JsonSerializable;
use Symfony\Component\HttpFoundation\Response;

/**
 * @author Tiago Franco
 * Servico para
 */
class ResponseApi implements JsonSerializable
{
    protected $msg;
    protected $code;
    protected $conteudo;

    public function __construct($conteudo, $msg, $code = Response::HTTP_OK)
    {
        $this->conteudo = $conteudo;
        $this->msg      = $msg;
        $this->code     = $code;
    }
    /**
     * Convert the object into something JSON serializable.
     *
     * @return array
     */
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

    /**
     * Get the value of msg
     */ 
    public function getMsg()
    {
        return $this->msg;
    }

    /**
     * Set the value of msg
     *
     * @return  self
     */ 
    public function setMsg($msg)
    {
        $this->msg = $msg;

        return $this;
    }

    /**
     * Get the value of code
     */ 
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set the value of code
     *
     * @return  self
     */ 
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get the value of conteudo
     */ 
    public function getConteudo()
    {
        return $this->conteudo;
    }

    /**
     * Set the value of conteudo
     *
     * @return  self
     */ 
    public function setConteudo($conteudo)
    {
        $this->conteudo = $conteudo;

        return $this;
    }
}
