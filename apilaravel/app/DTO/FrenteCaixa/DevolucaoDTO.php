<?php

namespace App\DTO\FrenteCaixa;

use App\Services\Extensions\RequestBodyConverterInterface;
use JMS\Serializer\Annotation as JMS;

/**
 * @author Tiago Franco
 * DTO para manipulacao dos dados de devolucao 
 * @JMS\AccessType("public_method")
 */
class DevolucaoDTO implements RequestBodyConverterInterface
{
    /**
     * @JMS\SerializedName("id_venda")
     * @JMS\Type("integer")
     * 
     * idVenda
     * var integer
     */
    private $idVenda;

    /**
     * @JMS\SerializedName("id_cliente")
     * @JMS\Type("integer")
     * 
     * idCliente
     * var integer
     */
    private $idCliente;

    /**
     * @JMS\SerializedName("quantidade")
     * @JMS\Type("integer")
     * 
     * quantidade
     * var integer
     */
    private $quantidade;

    /**
     * @JMS\SerializedName("descricao_produto")
     * @JMS\Type("string")
     * 
     * descricaoProduto
     * var string
     */
    private $descricaoProduto;

    /**
     * @JMS\SerializedName("codigo_barra")
     * @JMS\Type("string")
     * 
     * codigoBarra
     * var string
     */
    private $codigoBarra;

    /**
     * @JMS\SerializedName("valor_pagamento")
     * @JMS\Type("float")
     * 
     * valorPagamento
     * var float
     */
    private $valorPagamento;

    /**
     * @JMS\SerializedName("id_grade")
     * @JMS\Type("float")
     * 
     * idGrade
     * var float
     */
    private $idGrade;



    /**
     * Get the value of quantidade
     */
    public function getQuantidade()
    {
        return $this->quantidade;
    }

    /**
     * Set the value of quantidade
     *
     * @return  self
     */
    public function setQuantidade($quantidade)
    {
        $this->quantidade = $quantidade;

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
     * Get the value of idVenda
     */
    public function getIdVenda()
    {
        return $this->idVenda;
    }

    /**
     * Set the value of idVenda
     *
     * @return  self
     */
    public function setIdVenda($idVenda)
    {
        $this->idVenda = $idVenda;

        return $this;
    }

    /**
     * Get the value of descricaoProduto
     */
    public function getDescricaoProduto()
    {
        return $this->descricaoProduto;
    }

    /**
     * Set the value of descricaoProduto
     *
     * @return  self
     */
    public function setDescricaoProduto($descricaoProduto)
    {
        $this->descricaoProduto = $descricaoProduto;

        return $this;
    }

    /**
     * Get the value of codigoBarra
     */
    public function getCodigoBarra()
    {
        return $this->codigoBarra;
    }

    /**
     * Set the value of codigoBarra
     *
     * @return  self
     */
    public function setCodigoBarra($codigoBarra)
    {
        $this->codigoBarra = $codigoBarra;

        return $this;
    }

    /**
     * Get the value of valorPagamento
     */
    public function getValorPagamento()
    {
        return $this->valorPagamento;
    }

    /**
     * Set the value of valorPagamento
     *
     * @return  self
     */
    public function setValorPagamento($valorPagamento)
    {
        $this->valorPagamento = $valorPagamento;

        return $this;
    }

    /**
     * Get the value of idGrade
     */
    public function getIdGrade()
    {
        return $this->idGrade;
    }

    /**
     * Set the value of idGrade
     *
     * @return  self
     */
    public function setIdGrade($idGrade)
    {
        $this->idGrade = $idGrade;

        return $this;
    }
}
