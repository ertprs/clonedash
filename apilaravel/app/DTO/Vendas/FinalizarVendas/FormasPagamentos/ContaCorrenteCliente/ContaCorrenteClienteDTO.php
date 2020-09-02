<?php

namespace App\DTO\Vendas\FinalizarVendas\FormasPagamentos\ContaCorrenteCliente;

use JMS\Serializer\Annotation as JMS;
use App\Services\Utils\FormasPagamentos;
use App\DTO\Vendas\FinalizarVendas\ValidarFormaPagamento;
use App\Services\Extensions\RequestBodyConverterInterface;
use App\DTO\Vendas\FinalizarVendas\FormaPagamentoVendaInterface;
use App\Services\Vendas\FinalizarPagamentos\FinalizarContaCorrenteCliente;
use App\DTO\Vendas\FinalizarVendas\FormasPagamentos\ContaCorrenteCliente\ItemContaCorrenteClienteDTO;

/** 
 * Objeto responsavel pelo processamento
 * das formas de pagamentos do tipo
 * debito
 * @JMS\AccessType("public_method")
 */
class ContaCorrenteClienteDTO implements RequestBodyConverterInterface, FormaPagamentoVendaInterface
{
    use ValidarFormaPagamento;

    /**
     * @JMS\SerializedName("parcelas")
     * @JMS\Type("array<App\DTO\Vendas\FinalizarVendas\FormasPagamentos\ContaCorrenteCliente\ItemContaCorrenteClienteDTO>")
     * 
     * parcelas
     * var array
     */
    private $parcelas;
    private $idFormaPagamento = FormasPagamentos::CONTA_CORRENTE_CLIENTE;

    /**
     * Get the value of parcelas
     */
    public function getParcelas()
    {
        return $this->parcelas;
    }

    /**
     * Set the value of parcelas
     *
     * @return  self
     */
    public function setParcelas($parcelas)
    {
        $this->parcelas = $parcelas;

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

    public function getTotalPgto()
    {
        return array_sum(array_map(function (ItemContaCorrenteClienteDTO $parcela) {
            return $parcela->getValor();
        }, $this->parcelas));
    }

    public function getFinalizarFormaPgto()
    {
        return FinalizarContaCorrenteCliente::class;
    }
}
