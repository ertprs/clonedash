<?php

namespace App\DTO\FrenteCaixa;

use App\Services\Extensions\RequestBodyConverterInterface;
use Illuminate\Support\Facades\Crypt;
use JMS\Serializer\Annotation as JMS;

/**
 * @author Tiago Franco
 * DTO para operações envolvendo movimentacoes da frente de caixa
 * @JMS\AccessType("public_method")
 */
class LoginFrenteCaixaDTO implements RequestBodyConverterInterface
{
    /**
     * @JMS\SerializedName("id_operador")
     * @JMS\Type("integer")
     * 
     * idOperador
     * var integer
     */
    private $idOperador;
    /**
     * @JMS\SerializedName("senha_operador")
     * @JMS\Type("string")
     * 
     * senhaOperador
     * var string
     */
    private $senhaOperador;
    /**
     * @JMS\SerializedName("numero_caixa")
     * @JMS\Type("string")
     * 
     * numeroCaixa
     * var string
     */
    private $numeroCaixa;


    /**
     * Get the value of idOperador
     */
    public function getIdOperador()
    {
        return $this->idOperador;
    }

    /**
     * Set the value of idOperador
     *
     * @return  self
     */
    public function setIdOperador($idOperador)
    {
        $this->idOperador = $idOperador;

        return $this;
    }

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
     * Get the value of numeroCaixa
     */
    public function getNumeroCaixa()
    {
        return $this->numeroCaixa;
    }

    /**
     * Set the value of numeroCaixa
     *
     * @return  self
     */
    public function setNumeroCaixa($numeroCaixa)
    {
        $this->numeroCaixa = $numeroCaixa;

        return $this;
    }

    /**
     * Set the value of numeroCaixa
     *
     * @return  string
     */
    public function getSenhaDecrypt()
    {        
        return Crypt::decrypt($this->senhaOperador);
    }
}
