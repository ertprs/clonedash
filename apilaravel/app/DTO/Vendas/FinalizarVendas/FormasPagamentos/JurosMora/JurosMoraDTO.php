<?php

namespace App\DTO\Vendas\FinalizarVendas\FormasPagamentos\JurosMora;

use App\DTO\Vendas\FinalizarVendas\FormaPagamentoVendaInterface;
use App\DTO\Vendas\FinalizarVendas\ValidarFormaPagamento;
use App\Services\Extensions\RequestBodyConverterInterface;
use App\Services\Vendas\FinalizarPagamentos\FinalizarJurosMora;
use JMS\Serializer\Annotation as JMS;

/** 
 * Objeto responsavel pelo processamento
 * das formas de pagamentos com 
 * juros e com mora
 * @JMS\AccessType("public_method")
 */
class JurosMoraDTO implements RequestBodyConverterInterface, FormaPagamentoVendaInterface
{
    use ValidarFormaPagamento;
    /**
     * @JMS\SerializedName("juros")
     * @JMS\Type("float")
     * 
     * juros
     * var float
     */
    private $juros;
    /**
     * @JMS\SerializedName("id_forma_pagamento")
     * @JMS\Type("integer")
     * 
     * idFormaPagamento
     * var integer
     */
    private $idFormaPagamento;

    /**
     * @JMS\SerializedName("parcelas")
     * @JMS\Type("array<App\DTO\Vendas\FinalizarVendas\FormasPagamentos\JurosMora\ItemJurosMoraDTO>")
     * 
     * parcelas
     * var float
     */
    private $parcelas;
    
    /**
     * Get the value of juros
     */ 
    public function getJuros()
    {
        return $this->juros;
    }

    /**
     * Set the value of juros
     *
     * @return  self
     */ 
    public function setJuros($juros)
    {
        $this->juros = $juros;

        return $this;
    }

    /**
     * Get the value of idFormaPagamento
     */ 
    public function getIdFormaPagamento()
    {
        return $this->idFormaPagamento;
    }

    /**
     * Set the value of idFormaPagamento
     *
     * @return  self
     */ 
    public function setIdFormaPagamento($idFormaPagamento)
    {
        $this->idFormaPagamento = $idFormaPagamento;

        return $this;
    }

    /**
     * Get ItemJurosMora
     *
     * @return  array
     */ 
    public function getParcelas()
    {
        return $this->parcelas;
    }

    /**
     * Set ItemJurosMora
     *
     * @param  array  $parcelas  ItemJurosMora
     *
     * @return  self
     */ 
    public function setParcelas(array $parcelas)
    {
        $this->parcelas = $parcelas;

        return $this;
    }

    public function getTotalPgto()
    {
        return array_sum(array_map(function(ItemJurosMoraDTO $parcela){
            return $parcela->getParcela();
        }, $this->parcelas));
    }

    public function getFinalizarFormaPgto()
    {
        return FinalizarJurosMora::class;
    }
}
