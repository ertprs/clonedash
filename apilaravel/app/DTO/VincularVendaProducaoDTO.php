<?php

namespace App\DTO;

use App\Services\Extensions\RequestBodyConverterInterface;
use JMS\Serializer\Annotation as JMS;

/**
 * @author Tiago Franco
 * DTO para vincular itens de vendas 
 * com a producao
 * @JMS\AccessType("public_method")
 */
class VincularVendaProducaoDTO implements RequestBodyConverterInterface
{
    /**
     * @JMS\SerializedName("id")
     * @JMS\Type("integer")
     * 
     * id
     * var integer
     */
    private $id;

     /**
     * @JMS\SerializedName("id_cliente")
     * @JMS\Type("integer")
     * 
     * id_cliente
     * var integer
     */
    private $idCliente;

     /**
     * @JMS\SerializedName("id_funcionario")
     * @JMS\Type("integer")
     * 
     * id_funcionario
     * var integer
     */
    private $idFuncionario;

    /**
     * @JMS\SerializedName("itens_venda")
     * @JMS\Type("array")
     * 
     * id
     * var array
     */
    private $itensVenda;

    /**
     * Get the value of itensVenda
     */
    public function getItensVenda()
    {
        return $this->itensVenda;
    }

    /**
     * Set the value of itensVenda
     *
     * @return  self
     */
    public function setItensVenda($itensVenda)
    {
        $this->itensVenda = $itensVenda;

        return $this;
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

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
}
