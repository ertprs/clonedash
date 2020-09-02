<?php

namespace App\DTO\FrenteCaixa;

use App\Services\Extensions\RequestBodyConverterInterface;
use JMS\Serializer\Annotation as JMS;

/**
 * @author Tiago Franco
 * DTO para operações envolvendo movimentacoes da frente de caixa
 * @JMS\AccessType("public_method")
 */
class MovimentacoesDTO implements RequestBodyConverterInterface
{
    /**
     * @JMS\SerializedName("id_cliente")
     * @JMS\Type("integer")
     * 
     * idCliente
     * var integer
     */
    private $idCliente;
    /**
     * @JMS\SerializedName("tipo_movimentacao")
     * @JMS\Type("string")
     * 
     * tipoMovimentacao
     * var string
     */
    private $tipoMovimentacao;
    /**
     * @JMS\SerializedName("descricao")
     * @JMS\Type("string")
     * 
     * descricao
     * var string
     */
    private $descricao;
    /**
     * @JMS\SerializedName("valor_movimentacao")
     * @JMS\Type("float")
     * 
     * valorMovimentacao
     * var float
     */
    private $valorMovimentacao;
    
    /**
     * Get the value of tipoMovimentacao
     */
    public function getTipoMovimentacao()
    {
        return $this->tipoMovimentacao;
    }

    /**
     * Set the value of tipoMovimentacao
     *
     * @return  self
     */
    public function setTipoMovimentacao($tipoMovimentacao)
    {
        $this->tipoMovimentacao = $tipoMovimentacao;

        return $this;
    }

    /**
     * Get the value of idCliente
     */
    public function getIdCliente()
    {
        return $this->idCliente;
    }

    /**
     * Set the value of idCliente
     *
     * @return  self
     */
    public function setIdCliente($idCliente)
    {
        $this->idCliente = $idCliente;

        return $this;
    }

    /**
     * Get the value of descricao
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * Set the value of descricao
     *
     * @return  self
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;

        return $this;
    }

    /**
     * Get the value of valorMovimentacao
     */
    public function getValorMovimentacao()
    {
        return $this->valorMovimentacao;
    }

    /**
     * Set the value of valorMovimentacao
     *
     * @return  self
     */
    public function setValorMovimentacao($valorMovimentacao)
    {
        $this->valorMovimentacao = $valorMovimentacao;

        return $this;
    }
}
