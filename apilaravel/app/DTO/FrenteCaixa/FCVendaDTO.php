<?php

namespace App\DTO\FrenteCaixa;

use App\Services\Extensions\RequestBodyConverterInterface;
use JMS\Serializer\Annotation as JMS;

/**
 * @author Tiago Franco
 * DTO para manipulacao dos dados de vendas pela frente de c
 * @JMS\AccessType("public_method")
 */
class FCVendaDTO implements RequestBodyConverterInterface
{


    /**
     * @JMS\SerializedName("id_tipo_venda")
     * @JMS\Type("integer")
     * 
     * idTipoVenda
     * var integer
     */
    private $idTipoVenda = 0; #venda por default nao é de catalogo

    /**
     * @JMS\SerializedName("id_usuario_fecha_venda")
     * @JMS\Type("integer")
     * 
     * idUsuarioFechaVenda
     * var integer
     */
    private $idUsuarioFechaVenda;
    /**
     * @JMS\SerializedName("id_funcionario")
     * @JMS\Type("integer")
     * 
     * idFuncionario
     * var integer
     */
    private $idFuncionario;
    /**
     * @JMS\SerializedName("id_cliente")
     * @JMS\Type("integer")
     * 
     * idCliente
     * var integer
     */
    private $idCliente;
    /**
     * @JMS\SerializedName("situacao")
     * @JMS\Type("string")
     * 
     * situacao
     * var string
     */
    private $situacao = 'A';

    /**
     * Get the value of situacao
     */
    public function getSituacao()
    {
        return $this->situacao;
    }

    /**
     * Set the value of situacao
     *
     * @return  self
     */
    public function setSituacao($situacao)
    {
        $this->situacao = $situacao;

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

    /**
     * Get the value of idTipoVenda
     */
    public function getIdTipoVenda()
    {
        return $this->idTipoVenda;
    }

    /**
     * Set the value of idTipoVenda
     *
     * @return  self
     */
    public function setIdTipoVenda($idTipoVenda)
    {
        $this->idTipoVenda = $idTipoVenda;

        return $this;
    }
}
