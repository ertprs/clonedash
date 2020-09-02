<?php

namespace App\DTO\Vendas\FinalizarVendas\FormasPagamentos\NotaCredito;

use JMS\Serializer\Annotation as JMS;
use App\Services\Utils\FormasPagamentos;
use App\DTO\Vendas\FinalizarVendas\ValidarFormaPagamento;
use App\Services\Extensions\RequestBodyConverterInterface;
use App\DTO\Vendas\FinalizarVendas\FormaPagamentoVendaInterface;
use App\Services\Vendas\FinalizarPagamentos\FinalizarNotasCreditos;
use App\DTO\Vendas\FinalizarVendas\FormasPagamentos\NotaCredito\ItemNotaCreditoDTO;

/**
 * @author Tiago Franco
 * Objeto para processamento
 * dos pagamentos pelo valor presente
 * @JMS\AccessType("public_method")
 */
class NotaCreditoDTO implements RequestBodyConverterInterface, FormaPagamentoVendaInterface
{
    use ValidarFormaPagamento;
    /**
     * @JMS\SerializedName("id_forma_pagamento")
     * @JMS\Type("integer")
     * 
     * idFormaPagamento
     * var interger
     */
    private $idFormaPagamento = FormasPagamentos::NOTA_DE_CREDITO;

    /**
     * @JMS\SerializedName("valor_credito_inicial")
     * @JMS\Type("float")
     * 
     * valorCreditoInicial
     * var float
     */
    private $valorCreditoInicial = 0;

    /**
     * @JMS\SerializedName("numeros_notas")
     * @JMS\Type("array")
     * 
     * numeroNotas
     * var array
     */
    private $numeroNotas = [];

    /**
     * @JMS\SerializedName("valor_recebido")
     * @JMS\Type("float")
     * 
     * valorRecebido
     * var float
     */
    private $valorRecebido;

    /**
     * @JMS\SerializedName("cod_aut_cartao")
     * @JMS\Type("string")
     * 
     * codAutCartao
     * var string
     */
    private $codAutCartao;

    /**
     * @JMS\SerializedName("id_credenciadora")
     * @JMS\Type("string")
     * 
     * idCredenciadora
     * var string
     */
    private $idCredenciadora;

    /**
     * @JMS\SerializedName("cnpj_credenciadora")
     * @JMS\Type("string")
     * 
     * cnpjCredenciadora
     * var string
     */
    private $cnpjCredenciadora;

    /**
     * @JMS\SerializedName("numero_documento")
     * @JMS\Type("string")
     * 
     * numeroDocumento
     * var string
     */
    private $numeroDocumento;

    /**
     * @JMS\SerializedName("parcelas")
     * @JMS\Type("array<App\DTO\Vendas\FinalizarVendas\FormasPagamentos\NotaCredito\ItemNotaCreditoDTO>")
     * 
     * parcelas
     * var array
     */
    private $parcelas;

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
     * Get the value of valorCreditoInicial
     */
    public function getValorCreditoInicial()
    {
        return $this->valorCreditoInicial;
    }

    /**
     * Set the value of valorCreditoInicial
     *
     * @return  self
     */
    public function setValorCreditoInicial($valorCreditoInicial)
    {
        $this->valorCreditoInicial = $valorCreditoInicial;

        return $this;
    }

    /**
     * Get the value of numeroNotas
     */
    public function getNumeroNotas()
    {
        return $this->numeroNotas;
    }

    /**
     * Set the value of numeroNotas
     *
     * @return  self
     */
    public function setNumeroNotas($numeroNotas)
    {
        $this->numeroNotas = $numeroNotas;

        return $this;
    }

    /**
     * Get the value of valorRecebido
     */
    public function getValorRecebido()
    {
        return $this->valorRecebido;
    }

    /**
     * Set the value of valorRecebido
     *
     * @return  self
     */
    public function setValorRecebido($valorRecebido)
    {
        $this->valorRecebido = $valorRecebido;

        return $this;
    }

    /**
     * Get the value of codAutCartao
     */
    public function getCodAutCartao()
    {
        return $this->codAutCartao;
    }

    /**
     * Set the value of codAutCartao
     *
     * @return  self
     */
    public function setCodAutCartao($codAutCartao)
    {
        $this->codAutCartao = $codAutCartao;

        return $this;
    }

    /**
     * Get the value of idCredenciadora
     */
    public function getIdCredenciadora()
    {
        return $this->idCredenciadora;
    }

    /**
     * Set the value of idCredenciadora
     *
     * @return  self
     */
    public function setIdCredenciadora($idCredenciadora)
    {
        $this->idCredenciadora = $idCredenciadora;

        return $this;
    }

    /**
     * Get the value of cnpjCredenciadora
     */
    public function getCnpjCredenciadora()
    {
        return $this->cnpjCredenciadora;
    }

    /**
     * Set the value of cnpjCredenciadora
     *
     * @return  self
     */
    public function setCnpjCredenciadora($cnpjCredenciadora)
    {
        if (!empty($cnpjCredenciadora))
            $this->cnpjCredenciadora = str_pad(preg_replace("/\D+/", "", $cnpjCredenciadora), 14, 0, STR_PAD_LEFT);

        return $this;
    }

    public function getTotalPgto()
    {
        return array_sum(array_map(function (ItemNotaCreditoDTO $parcela) {
            return $parcela->getValor();
        }, $this->parcelas));
    }

    public function getFinalizarFormaPgto()
    {
        return FinalizarNotasCreditos::class;
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
     * Get the value of numeroDocumento
     */ 
    public function getNumeroDocumento()
    {
        return $this->numeroDocumento;
    }

    /**
     * Set the value of numeroDocumento
     *
     * @return  self
     */ 
    public function setNumeroDocumento($numeroDocumento)
    {
        $this->numeroDocumento = $numeroDocumento;

        return $this;
    }
}
