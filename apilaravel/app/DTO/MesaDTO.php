<?php

namespace App\DTO;

use JMS\Serializer\Annotation as JMS;
use App\Services\Extensions\RequestBodyConverterInterface;

/**
 * @author Tiago Franco
 * DTO para operacoes com as mesas da comanda
 * @JMS\AccessType("public_method")
 */
class MesaDTO implements RequestBodyConverterInterface
{
    /**
     * @JMS\SerializedName("id")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $id;
    /**
     * @JMS\SerializedName("id_cadastro")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $idCadastro;
    /**
     * @JMS\SerializedName("num_mesa")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $numMesa;
    /**
     * @JMS\SerializedName("status")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $status;
    /**
     * @JMS\SerializedName("qtde_pessoas")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $qtdePessoas;
    /**
     * @JMS\SerializedName("id_off")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $idOff;
    /**
     * @JMS\SerializedName("data_alteracao")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $dataAlteracao;
    /**
     * @JMS\SerializedName("data_sincronismo")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $dataSincronismo;
      

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
     * Get the value of idCadastro
     */ 
    public function getIdCadastro()
    {
        return $this->idCadastro;
    }

    /**
     * Set the value of idCadastro
     *
     * @return  self
     */ 
    public function setIdCadastro($idCadastro)
    {
        $this->idCadastro = $idCadastro;

        return $this;
    }

    /**
     * Get the value of numMesa
     */ 
    public function getNumMesa()
    {
        return $this->numMesa;
    }

    /**
     * Set the value of numMesa
     *
     * @return  self
     */ 
    public function setNumMesa($numMesa)
    {
        $this->numMesa = $numMesa;

        return $this;
    }

    /**
     * Get the value of status
     */ 
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */ 
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the value of qtdePessoas
     */ 
    public function getQtdePessoas()
    {
        return $this->qtdePessoas;
    }

    /**
     * Set the value of qtdePessoas
     *
     * @return  self
     */ 
    public function setQtdePessoas($qtdePessoas)
    {
        $this->qtdePessoas = $qtdePessoas;

        return $this;
    }

    /**
     * Get the value of idOff
     */ 
    public function getIdOff()
    {
        return $this->idOff;
    }

    /**
     * Set the value of idOff
     *
     * @return  self
     */ 
    public function setIdOff($idOff)
    {
        $this->idOff = $idOff;

        return $this;
    }

    /**
     * Get the value of dataAlteracao
     */ 
    public function getDataAlteracao()
    {
        return $this->dataAlteracao;
    }

    /**
     * Set the value of dataAlteracao
     *
     * @return  self
     */ 
    public function setDataAlteracao($dataAlteracao)
    {
        $this->dataAlteracao = $dataAlteracao;

        return $this;
    }

    /**
     * Get the value of dataSincronismo
     */ 
    public function getDataSincronismo()
    {
        return $this->dataSincronismo;
    }

    /**
     * Set the value of dataSincronismo
     *
     * @return  self
     */ 
    public function setDataSincronismo($dataSincronismo)
    {
        $this->dataSincronismo = $dataSincronismo;

        return $this;
    }
}
