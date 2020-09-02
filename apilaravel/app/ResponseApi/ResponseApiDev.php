<?php

namespace App\ResponseApi;

use Throwable;
use JsonSerializable;
use Symfony\Component\HttpFoundation\Response;

/**
 * @author Tiago Franco
 * Objeto responsável pelos retornos 
 * em ambiente de desenvolvimento
 */
class ResponseApiDev extends ResponseApi implements JsonSerializable
{
    protected $file = "";
    protected $exception = "";
    protected $line = "";
    protected $trace = "";

    public function __construct(Throwable $throwable = null, $conteudo = "", $msg = "", $code = Response::HTTP_OK)
    {
        if ($throwable) {
            parent::__construct("", $throwable->getMessage(), "");
            $this->file  = $throwable->getFile();
            $this->line  = $throwable->getLine();
            $this->trace = $throwable->getTraceAsString();
            $this->exception = get_class($throwable);
           
        } else
            parent::__construct($conteudo, $msg, $code);
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
     * Get the value of file
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * Set the value of file
     *
     * @return  self
     */
    public function setFile($file)
    {
        $this->file = $file;

        return $this;
    }

    /**
     * Get the value of line
     */
    public function getLine()
    {
        return $this->line;
    }

    /**
     * Set the value of line
     *
     * @return  self
     */
    public function setLine($line)
    {
        $this->line = $line;

        return $this;
    }

    /**
     * Get the value of trace
     */
    public function getTrace()
    {
        return $this->trace;
    }

    /**
     * Set the value of trace
     *
     * @return  self
     */
    public function setTrace($trace)
    {
        $this->trace = $trace;

        return $this;
    }

    /**
     * Get the value of exception
     */ 
    public function getException()
    {
        return $this->exception;
    }

    /**
     * Set the value of exception
     *
     * @return  self
     */ 
    public function setException($exception)
    {
        $this->exception = $exception;

        return $this;
    }
}
