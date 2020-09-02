<?php

namespace App\DTO\Vendas\FinalizarVendas\FormasPagamentos\Debito;

use App\DTO\Vendas\FinalizarVendas\FormaPagamentoVendaInterface;
use App\DTO\Vendas\FinalizarVendas\ValidarFormaPagamento;
use App\Services\Extensions\RequestBodyConverterInterface;
use App\Services\Vendas\FinalizarPagamentos\FinalizarDebitos;
use JMS\Serializer\Annotation as JMS;

/** 
 * Objeto responsavel pelo processamento
 * das formas de pagamentos do tipo
 * debito
 * @JMS\AccessType("public_method")
 */
class DebitoDTO implements RequestBodyConverterInterface, FormaPagamentoVendaInterface
{
    use ValidarFormaPagamento;

    /**
     * @JMS\SerializedName("id_forma_pagamento")
     * @JMS\Type("integer")
     * 
     * valorPagamento
     * var integer
     */
    private $idFormaPagamento;

    /**
     * @JMS\SerializedName("pagamentos")
     * @JMS\Type("array<App\DTO\Vendas\FinalizarVendas\FormasPagamentos\Debito\ItemDebitoDTO>")
     * 
     * pagamentos
     * var array
     */
    private $pagamentos;

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


    public function getTotalPgto()
    {
        return array_sum(array_map(function (ItemDebitoDTO $pagamentos) {
            return $pagamentos->getValor();
        }, $this->pagamentos));
    }

    public function getFinalizarFormaPgto()
    {
        return FinalizarDebitos::class;
    }

    /**
     * Get the value of pagamentos
     */ 
    public function getPagamentos()
    {
        return $this->pagamentos;
    }

    /**
     * Set the value of pagamentos
     *
     * @return  self
     */ 
    public function setPagamentos($pagamentos)
    {
        $this->pagamentos = $pagamentos;

        return $this;
    }
}
