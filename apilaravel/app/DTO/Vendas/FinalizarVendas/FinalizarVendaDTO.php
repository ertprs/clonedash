<?php

namespace App\DTO\Vendas\FinalizarVendas;

use App\Services\Extensions\RequestBodyConverterInterface;
use JMS\Serializer\Annotation as JMS;

/**
 * @author Tiago Franco
 * DTO para arnazenamento das informacoes
 * para finalizar uma venda
 * @JMS\AccessType("public_method")
 */
class FinalizarVendaDTO implements RequestBodyConverterInterface
{
    /**
     * @JMS\SerializedName("id_venda")
     * @JMS\Type("integer")
     * 
     * idVenda
     * var integer
     */
    private $idVenda;

     /**
     * @JMS\SerializedName("id_cliente")
     * @JMS\Type("integer")
     * 
     * idCliente
     * var integer
     */
    private $idCliente;

    /**
     * @JMS\SerializedName("id_usuario_fecha_venda")
     * @JMS\Type("integer")
     * 
     * idUsuarioFechaVenda
     * var integer
     */
    private $idUsuarioFechaVenda;

    /**
     * @JMS\SerializedName("id_abertura_caixa")
     * @JMS\Type("integer")
     * 
     * idAberturaCaixa
     * var integer
     */
    private $idAberturaCaixa;

    /**
     * @JMS\SerializedName("frete")
     * @JMS\Type("float")
     * 
     * frete
     * var float
     */
    private $frete;

    /**
     * @JMS\SerializedName("pagamentos")
     * @JMS\Type("array")
     * 
     * pagamentos
     * var array
     */
    private $pagamentos;

    /**
     * @JMS\SerializedName("observacao")
     * @JMS\Type("string")
     * 
     * observacao
     * var array
     */
    private $observacao;

    /**
     * Get the value of idVenda
     */ 
    public function getIdVenda()
    {
        return $this->idVenda;
    }

    /**
     * Set the value of idVenda
     *
     * @return  self
     */ 
    public function setIdVenda($idVenda)
    {
        $this->idVenda = $idVenda;

        return $this;
    }

    /**
     * Get the value of frete
     */ 
    public function getFrete()
    {
        return $this->frete;
    }

    /**
     * Set the value of frete
     *
     * @return  self
     */ 
    public function setFrete($frete)
    {
        $this->frete = $frete;

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

    /**
     * Get the value of observacao
     */ 
    public function getObservacao()
    {
        return $this->observacao;
    }

    /**
     * Set the value of observacao
     *
     * @return  self
     */ 
    public function setObservacao($observacao)
    {
        $this->observacao = $observacao;

        return $this;
    }

    /**
     * Get the value of idUsuarioFechaVenda
     */ 
    public function getIdUsuarioFechaVenda()
    {
        return $this->idUsuarioFechaVenda;
    }

    /**
     * Set the value of idUsuarioFechaVenda
     *
     * @return  self
     */ 
    public function setIdUsuarioFechaVenda($idUsuarioFechaVenda)
    {
        $this->idUsuarioFechaVenda = $idUsuarioFechaVenda;

        return $this;
    }

    /**
     * Get the value of idAberturaCaixa
     */ 
    public function getIdAberturaCaixa()
    {
        return $this->idAberturaCaixa;
    }

    /**
     * Set the value of idAberturaCaixa
     *
     * @return  self
     */ 
    public function setIdAberturaCaixa($idAberturaCaixa)
    {
        $this->idAberturaCaixa = $idAberturaCaixa;

        return $this;
    }

    /**
     * Get the value of idCliente
     */ 
    public function getIdCliente()
    {
        return $this->idCliente;
    }

    /**
     * Set the value of idCliente
     *
     * @return  self
     */ 
    public function setIdCliente($idCliente)
    {
        $this->idCliente = $idCliente;

        return $this;
    }
}
