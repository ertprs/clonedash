<?php

namespace App\DTO\Vendas\FinalizarVendas\FormasPagamentos\Parcelado;

use App\DTO\Vendas\FinalizarVendas\FormaPagamentoVendaInterface;
use App\DTO\Vendas\FinalizarVendas\ValidarFormaPagamento;
use App\Services\Extensions\RequestBodyConverterInterface;
use App\Services\Vendas\FinalizarPagamentos\FinalizarParcelas;
use JMS\Serializer\Annotation as JMS;

/** 
 * Objeto responsavel pelo processamento
 * das formas de pagamentos com 
 * juros e com mora
 * @JMS\AccessType("public_method")
 */
class ParceladoDTO implements RequestBodyConverterInterface, FormaPagamentoVendaInterface 
{
    use ValidarFormaPagamento;
    /**
     * @JMS\SerializedName("id_forma_pagamento")
     * @JMS\Type("integer")
     * 
     * idFormaPagamento
     * var integer
     */
    protected $idFormaPagamento;    
    /**
     * @JMS\SerializedName("parcelas")
     * @JMS\Type("array<App\DTO\Vendas\FinalizarVendas\FormasPagamentos\Parcelado\ItemParcelaDTO>")
     * 
     * parcelas
     * var float
     */
    protected $parcelas;

    /**
     * @JMS\SerializedName("chave_promissoria")
     * @JMS\Type("string")
     * 
     * chavePromissoria
     * var string
     */
    protected $chavePromissoria;

    
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
     * Get ItemParcela
     *
     * @return  array
     */ 
    public function getParcelas()
    {
        return $this->parcelas;
    }

    /**
     * Set ItemParcela
     *
     * @param  array  $parcelas  ItemParcela
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
        return array_sum(array_map(function(ItemParcelaDTO $parcela){
            return $parcela->getParcela();
        }, $this->parcelas));
    }

    public function getFinalizarFormaPgto()
    {
        return FinalizarParcelas::class;
    }

    /**
     * Get the value of chavePromissoria
     */ 
    public function getChavePromissoria()
    {
        return $this->chavePromissoria;
    }

    /**
     * Set the value of chavePromissoria
     *
     * @return  self
     */ 
    public function setChavePromissoria($chavePromissoria)
    {
        $this->chavePromissoria = $chavePromissoria;

        return $this;
    }
}
