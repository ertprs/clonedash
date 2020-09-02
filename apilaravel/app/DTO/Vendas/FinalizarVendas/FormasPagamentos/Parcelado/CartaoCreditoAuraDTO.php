<?php

namespace App\DTO\Vendas\FinalizarVendas\FormasPagamentos\Parcelado;

use JMS\Serializer\Annotation as JMS;
use App\Services\Utils\FormasPagamentos;
use App\DTO\Vendas\FinalizarVendas\ValidarFormaPagamento;
use App\Services\Extensions\RequestBodyConverterInterface;
use App\Services\Vendas\FinalizarPagamentos\FinalizarParcelas;
use App\DTO\Vendas\FinalizarVendas\FormaPagamentoVendaInterface;
use App\Services\Vendas\FinalizarPagamentos\FinalizarCartaoCreditoAura;

/** 
 * Objeto responsavel pelo processamento
 * das formas de pagamentos com 
 * juros e com mora
 * @JMS\AccessType("public_method")
 */
class CartaoCreditoAuraDTO implements RequestBodyConverterInterface, FormaPagamentoVendaInterface 
{
    use ValidarFormaPagamento;
    
    private $idFormaPagamento = FormasPagamentos::CARTAO_CREDITO_AURA;    
    /**
     * @JMS\SerializedName("parcelas")
     * @JMS\Type("array<App\DTO\Vendas\FinalizarVendas\FormasPagamentos\Parcelado\ItemParcelaDTO>")
     * 
     * parcelas
     * var float
     */
    private $parcelas;

    /**
     * @JMS\SerializedName("chave_promissoria")
     * @JMS\Type("string")
     * 
     * chavePromissoria
     * var string
     */
    private $chavePromissoria;
    
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
     * Get the value of idFormaPagamento
     */ 
    public function getIdFormaPagamento()
    {
        return $this->idFormaPagamento;
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
        return FinalizarCartaoCreditoAura::class;
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
