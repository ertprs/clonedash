<?php

namespace App\DTO\Vendas\FinalizarVendas\FormasPagamentos\JurosMora;

use App\DTO\Vendas\FinalizarVendas\FormaPagamentoVendaInterface;
use App\DTO\Vendas\FinalizarVendas\ValidarFormaPagamento;
use App\Services\Extensions\RequestBodyConverterInterface;
use App\Services\Utils\FormasPagamentos;
use App\Services\Vendas\FinalizarPagamentos\FinalizarNotaPromissoria;
use JMS\Serializer\Annotation as JMS;

/** 
 * Objeto responsavel pelo processamento
 * das formas de pagamentos com 
 * juros e com mora
 * @JMS\AccessType("public_method")
 */
class NotaPromissoriaDTO implements RequestBodyConverterInterface, FormaPagamentoVendaInterface
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
   
    private $idFormaPagamento = FormasPagamentos::NOTA_PROMISSORIA;

    /**
     * @JMS\SerializedName("chave_promissoria")
     * @JMS\Type("string")
     * 
     * chavePromissoria
     * var string
     */
    private $chavePromissoria = 0;

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

    public function getTotalPgto()
    {
        return array_sum(array_map(function(ItemJurosMoraDTO $parcela){
            return $parcela->getParcela();
        }, $this->parcelas));
    }

    public function getFinalizarFormaPgto()
    {
        return FinalizarNotaPromissoria::class;
    }
}
