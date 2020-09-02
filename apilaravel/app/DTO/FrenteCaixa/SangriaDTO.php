<?php

namespace App\DTO\FrenteCaixa;

use App\Services\Extensions\RequestBodyConverterInterface;
use Illuminate\Support\Facades\Crypt;
use JMS\Serializer\Annotation as JMS;

/**
 * @author Tiago Franco
 * DTO para as operacoes envolvendo a sangria da frente de caixa
 * @JMS\AccessType("public_method")
 */
class SangriaDTO implements RequestBodyConverterInterface
{
    /**
     * @JMS\SerializedName("senha_operador")
     * @JMS\Type("string")
     * 
     * senhaOperador
     * var string
     */
    private $senhaOperador;

    /**
     * @JMS\SerializedName("motivo")
     * @JMS\Type("string")
     * 
     * motivo
     * var string
     */
    private $motivo;

    /**
     * @JMS\SerializedName("valor")
     * @JMS\Type("float")
     * 
     * valor
     * var float
     */
    private $valor;


    /**
     * Get the value of senhaOperador
     */
    public function getSenhaOperador()
    {
        return $this->senhaOperador;
    }

    /**
     * Set the value of senhaOperador
     *
     * @return  self
     */
    public function setSenhaOperador($senhaOperador)
    {
        $this->senhaOperador = $senhaOperador;

        return $this;
    }

    /**
     * Get the value of motivo
     */
    public function getMotivo()
    {
        return $this->motivo;
    }

    /**
     * Set the value of motivo
     *
     * @return  self
     */
    public function setMotivo($motivo)
    {
        $this->motivo = $motivo;

        return $this;
    }

    /**
     * Get the value of valor
     */
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * Set the value of valor
     *
     * @return  self
     */
    public function setValor($valor)
    {
        $this->valor = $valor;

        return $this;
    }

    public function getSenhaDecrypt(){
        return Crypt::decrypt($this->senhaOperador);
    }
}
