<?php

namespace App\DTO\Vendas\FinalizarVendas\FormasPagamentos\Boleto;

use JMS\Serializer\Annotation as JMS;
use App\Services\Utils\FormasPagamentos;
use App\DTO\Vendas\FinalizarVendas\ValidarFormaPagamento;
use App\Services\Extensions\RequestBodyConverterInterface;
use App\Services\Vendas\FinalizarPagamentos\FinalizarBoletos;
use App\DTO\Vendas\FinalizarVendas\FormaPagamentoVendaInterface;
use App\DTO\Vendas\FinalizarVendas\FormasPagamentos\Boleto\ItemBoletoDTO;

/**
 * @author Tiago Franco
 * Objeto para processamento
 * dos pagamentos pelo valor presente
 * @JMS\AccessType("public_method")
 */
class BoletoDTO implements RequestBodyConverterInterface, FormaPagamentoVendaInterface
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
     * var interger
     */
    private $idFormaPagamento = FormasPagamentos::BOLETO;
    /**
     * @JMS\SerializedName("desconto_a_vista")
     * @JMS\Type("float")
     * 
     * descontoAVista
     * var float
     */
    private $descontoAVista = 0.00;

    /**
     * @JMS\SerializedName("desconto_a_prazo")
     * @JMS\Type("float")
     * 
     * descontoAPrazo
     * var float
     */
    private $descontoAPrazo = 0.00;

    /**
     * @JMS\SerializedName("envio_boleto")
     * @JMS\Type("string")
     * 
     * envioBoleto
     * var string
     */
    private $envioBoleto = "N";


    /**
     * @JMS\SerializedName("desconto_boleto")
     * @JMS\Type("string")
     * 
     * descontoBoleto
     * var string
     */
    private $descontoBoleto = "N";

    /**
     * @JMS\SerializedName("radio_msg_boleto")
     * @JMS\Type("string")
     * 
     * radioMsgBoleto
     * var string
     */
    private $radioMsgBoleto = "N";

    /**
     * @JMS\SerializedName("texto_msg_boleto")
     * @JMS\Type("string")
     * 
     * textoMsgBoleto
     * var string
     */
    private $textoMsgBoletoTxt  = "";

    /**
     * @JMS\SerializedName("parcelas")
     * @JMS\Type("array<App\DTO\Vendas\FinalizarVendas\FormasPagamentos\Boleto\ItemBoletoDTO>")
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
     * Get the value of descontoAVista
     */
    public function getDescontoAVista()
    {
        return $this->descontoAVista;
    }

    /**
     * Set the value of descontoAVista
     *
     * @return  self
     */
    public function setDescontoAVista($descontoAVista)
    {
        $this->descontoAVista = $descontoAVista;

        return $this;
    }

    /**
     * Get the value of descontoAPrazo
     */
    public function getDescontoAPrazo()
    {
        return $this->descontoAPrazo;
    }

    /**
     * Set the value of descontoAPrazo
     *
     * @return  self
     */
    public function setDescontoAPrazo($descontoAPrazo)
    {
        $this->descontoAPrazo = $descontoAPrazo;

        return $this;
    }

    /**
     * Get the value of envioBoleto
     */
    public function getEnvioBoleto()
    {
        return $this->envioBoleto;
    }

    /**
     * Set the value of envioBoleto
     *
     * @return  self
     */
    public function setEnvioBoleto($envioBoleto)
    {
        $this->envioBoleto = $envioBoleto;

        return $this;
    }

    /**
     * Get the value of descontoBoleto
     */
    public function getDescontoBoleto()
    {
        return $this->descontoBoleto;
    }

    /**
     * Set the value of descontoBoleto
     *
     * @return  self
     */
    public function setDescontoBoleto($descontoBoleto)
    {
        $this->descontoBoleto = $descontoBoleto;

        return $this;
    }

    /**
     * Get the value of radioMsgBoleto
     */
    public function getRadioMsgBoleto()
    {
        return $this->radioMsgBoleto;
    }

    /**
     * Set the value of radioMsgBoleto
     *
     * @return  self
     */
    public function setRadioMsgBoleto($radioMsgBoleto)
    {
        $this->radioMsgBoleto = $radioMsgBoleto;

        return $this;
    }

    /**
     * Get the value of textoMsgBoletoTxt
     */
    public function getTextoMsgBoletoTxt()
    {
        return $this->textoMsgBoletoTxt;
    }

    /**
     * Set the value of textoMsgBoletoTxt
     *
     * @return  self
     */
    public function setTextoMsgBoletoTxt($textoMsgBoletoTxt)
    {
        if ($this->radioMsgBoleto == "S")
            $this->textoMsgBoletoTxt = $textoMsgBoletoTxt;

        return $this;
    }

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

    public function getTotalPgto()
    {
        return array_sum(array_map(function(ItemBoletoDTO $parcela){
            return $parcela->getParcela();
        }, $this->parcelas));
    }

    public function getFinalizarFormaPgto()
    {
        return FinalizarBoletos::class;
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
}
