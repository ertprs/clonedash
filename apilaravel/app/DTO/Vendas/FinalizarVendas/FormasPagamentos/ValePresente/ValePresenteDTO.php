<?php

namespace App\DTO\Vendas\FinalizarVendas\FormasPagamentos\ValePresente;

use App\DTO\Vendas\FinalizarVendas\FormaPagamentoVendaInterface;
use App\DTO\Vendas\FinalizarVendas\ValidarFormaPagamento;
use App\Services\Extensions\RequestBodyConverterInterface;
use App\Services\Utils\FormasPagamentos;
use App\Services\Vendas\FinalizarPagamentos\FinalizarValePresentes;
use JMS\Serializer\Annotation as JMS;

/**
 * @author Tiago Franco
 * Objeto para processamento
 * dos pagamentos pelo valor presente
 * @JMS\AccessType("public_method")
 */
class ValePresenteDTO implements RequestBodyConverterInterface, FormaPagamentoVendaInterface
{
    use  ValidarFormaPagamento;
    /**
     * @JMS\SerializedName("id_forma_pagamento")
     * @JMS\Type("integer")
     * 
     * idFormaPagamento
     * var integer
     */
    private $idFormaPagamento = FormasPagamentos::VALE_PRESENTE;
    /**
     * @JMS\SerializedName("numero_cartao")
     * @JMS\Type("integer")
     * 
     * numeroCartao
     * var integer
     */
    private $numeroCartao;
    
    /**
     * @JMS\SerializedName("pagamentos")
     * @JMS\Type("array<App\DTO\Vendas\FinalizarVendas\FormasPagamentos\ValePresente\ItemValePresenteDTO>")
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
     * Get the value of numeroCartao
     */
    public function getNumeroCartao()
    {
        return $this->numeroCartao;
    }

    /**
     * Set the value of numeroCartao
     *
     * @return  self
     */
    public function setNumeroCartao($numeroCartao)
    {
        $this->numeroCartao = intval($numeroCartao);

        return $this;
    }

    public function getTotalPgto()
    {
        return array_sum(array_map(function (ItemValePresenteDTO $pagamentos) {
            return $pagamentos->getValor();
        }, $this->pagamentos));
    }

    public function getFinalizarFormaPgto()
    {
        return FinalizarValePresentes::class;
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
