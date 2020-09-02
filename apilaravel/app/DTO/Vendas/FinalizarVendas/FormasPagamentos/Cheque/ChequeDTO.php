<?php

namespace App\DTO\Vendas\FinalizarVendas\FormasPagamentos\Cheque;

use App\DTO\Vendas\FinalizarVendas\FormaPagamentoVendaInterface;
use App\DTO\Vendas\FinalizarVendas\ValidarFormaPagamento;
use App\Services\Extensions\RequestBodyConverterInterface;
use App\Services\Utils\FormasPagamentos;
use App\Services\Vendas\FinalizarPagamentos\FinalizarCheques;
use JMS\Serializer\Annotation as JMS;

/** 
 * Objeto responsavel pelo processamento
 * da forma de pagamento do cheque
 * @JMS\AccessType("public_method")
 */
class ChequeDTO implements RequestBodyConverterInterface, FormaPagamentoVendaInterface
{
    use ValidarFormaPagamento;

    private $idFormaPagamento = FormasPagamentos::CHEQUE;
    /**
     * @JMS\SerializedName("cheques")
     * @JMS\Type("array<App\DTO\Vendas\FinalizarVendas\FormasPagamentos\Cheque\ItemChequeDTO>")
     * 
     * cheques
     * var array
     */
    private $cheques;

    /**
     * Get the value of idFormaPagamento
     */
    public function getIdFormaPagamento()
    {
        return $this->idFormaPagamento;
    }


    /**
     * Get the value of cheques
     */
    public function getCheques()
    {
        return $this->cheques;
    }

    /**
     * Set the value of cheques
     *
     * @return  self
     */
    public function setCheques($cheques)
    {
        $this->cheques = $cheques;

        return $this;
    }

    public function getTotalPgto()
    {
        return array_sum(array_map(function(ItemChequeDTO $cheque){
            return $cheque->getValor();
        }, $this->cheques));
    }
    
    public function getFinalizarFormaPgto()
    {
        return FinalizarCheques::class;
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
