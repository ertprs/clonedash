<?php

namespace App\DTO\Vendas\FinalizarVendas\FormasPagamentos\ValeComprasFuncionario;

use App\DTO\Vendas\FinalizarVendas\FormaPagamentoVendaInterface;
use App\DTO\Vendas\FinalizarVendas\ValidarFormaPagamento;
use App\Services\Extensions\RequestBodyConverterInterface;
use App\Services\Utils\FormasPagamentos;
use App\Services\Vendas\FinalizarPagamentos\FinalizarValeCompraFuncionario;
use JMS\Serializer\Annotation as JMS;

/** 
 * Objeto responsavel pelo processamento
 * das formas de pagamentos do tipo
 * debito
 * @JMS\AccessType("public_method")
 */
class ValeComprasFuncionarioDTO implements RequestBodyConverterInterface, FormaPagamentoVendaInterface
{
    use ValidarFormaPagamento;
    
    /**
     * @JMS\SerializedName("id_funcionario")
     * @JMS\Type("integer")
     * 
     * idFuncionario
     * var integer
     */
    private $idFuncionario;

    private $idFormaPagamento = FormasPagamentos::VALE_COMPRA_FUNCIONARIO;

    /**
     * @JMS\SerializedName("parcelas")
     * @JMS\Type("array<App\DTO\Vendas\FinalizarVendas\FormasPagamentos\ValeComprasFuncionario\ItemValeComprasFuncionarioDTO>")
     * 
     * parcelas
     * var array
     */
    private $parcelas;

    /**
     * Get the value of idFormaPagamento
     */
    public function getIdFormaPagamento()
    {
        return $this->idFormaPagamento;
    }

    /**
     * Get the value of idFuncionario
     */ 
    public function getIdFuncionario()
    {
        return $this->idFuncionario;
    }

    /**
     * Set the value of idFuncionario
     *
     * @return  self
     */ 
    public function setIdFuncionario($idFuncionario)
    {
        $this->idFuncionario = $idFuncionario;

        return $this;
    }

    public function getTotalPgto()
    {
        return array_sum(array_map(function (ItemValeComprasFuncionarioDTO $parcelas) {
            return $parcelas->getParcela();
        }, $this->parcelas));
    }

    public function getFinalizarFormaPgto()
    {
        return FinalizarValeCompraFuncionario::class;
    }

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
     * Set the value of idFormaPagamento
     *
     * @return  self
     */ 
    public function setIdFormaPagamento($idFormaPagamento)
    {
        $this->idFormaPagamento = $idFormaPagamento;

        return $this;
    }
}
