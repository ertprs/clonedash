<?php

namespace App\DTO;

use JMS\Serializer\Annotation as JMS;
use App\Exceptions\ApiWebControlException;
use App\Services\Extensions\RequestBodyConverterInterface;
use App\Services\Utils\CodesApi;

/**
 * @author Tiago Franco
 * DTO para historicos das comandas
 * @JMS\AccessType("public_method")
 */
class CmHistoricoDTO implements RequestBodyConverterInterface
{

    /**
     * @JMS\SerializedName("id")
     * @JMS\Type("integer")
     * 
     * qtd
     * var integer
     */
    private $id;
    /**
     * @JMS\SerializedName("id_cadastro")
     * @JMS\Type("integer")
     * 
     * qtd
     * var integer
     */
    private $idCadastro;
    /**
     * @JMS\SerializedName("id_venda")
     * @JMS\Type("integer")
     * 
     * qtd
     * var integer
     */
    private $idVenda;
    /**
     * @JMS\SerializedName("id_mesa")
     * @JMS\Type("integer")
     * 
     * qtd
     * var integer
     */
    private $idMesa;
    /**
     * @JMS\SerializedName("id_cliente")
     * @JMS\Type("integer")
     * 
     * qtd
     * var integer
     */
    private $idCliente;
    /**
     * @JMS\SerializedName("num_cm")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $numCm;
    /**
     * @JMS\SerializedName("tipo_cm")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $tipoCm;
    /**
     * @JMS\SerializedName("status")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $status;
    /**
     * @JMS\SerializedName("datahora_abertura")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $datahoraAbertura;
    /**
     * @JMS\SerializedName("last_id_impresso")
     * @JMS\Type("integer")
     * 
     * qtd
     * var integer
     */
    private $lastIdImpresso;
    /**
     * @JMS\SerializedName("id_reserva")
     * @JMS\Type("integer")
     * 
     * qtd
     * var integer
     */
    private $idReserva;
    /**
     * @JMS\SerializedName("num_pessoas")
     * @JMS\Type("integer")
     * 
     * qtd
     * var integer
     */
    private $numPessoas;
    /**
     * @JMS\SerializedName("id_off")
     * @JMS\Type("integer")
     * 
     * qtd
     * var integer
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
     * @JMS\SerializedName("venda")
     * @JMS\Type("App\DTO\VendaDTO")
     * var mixed
     */
    private $venda;

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
     * Get the value of idMesa
     */
    public function getIdMesa()
    {
        return $this->idMesa;
    }

    /**
     * Set the value of idMesa
     *
     * @return  self
     */
    public function setIdMesa($idMesa)
    {
        $this->idMesa = $idMesa;

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
     * Get the value of numCm
     */
    public function getNumCm()
    {
        return $this->numCm;
    }

    /**
     * Set the value of numCm
     *
     * @return  self
     */
    public function setNumCm($numCm)
    {
        $this->numCm = $numCm;

        return $this;
    }

    /**
     * Get the value of tipoCm
     */
    public function getTipoCm()
    {
        return $this->tipoCm;
    }

    /**
     * Set the value of tipoCm
     *
     * @return  self
     */
    public function setTipoCm($tipoCm)
    {
        $this->tipoCm = $tipoCm;

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
     * Get the value of datahoraAbertura
     */
    public function getDatahoraAbertura()
    {
        return $this->datahoraAbertura;
    }

    /**
     * Set the value of datahoraAbertura
     *
     * @return  self
     */
    public function setDatahoraAbertura($datahoraAbertura)
    {
        $this->datahoraAbertura = $datahoraAbertura;

        return $this;
    }

    /**
     * Get the value of lastIdImpresso
     */
    public function getLastIdImpresso()
    {
        return $this->lastIdImpresso;
    }

    /**
     * Set the value of lastIdImpresso
     *
     * @return  self
     */
    public function setLastIdImpresso($lastIdImpresso)
    {
        $this->lastIdImpresso = $lastIdImpresso;

        return $this;
    }

    /**
     * Get the value of idReserva
     */
    public function getIdReserva()
    {
        return $this->idReserva;
    }

    /**
     * Set the value of idReserva
     *
     * @return  self
     */
    public function setIdReserva($idReserva)
    {
        $this->idReserva = $idReserva;

        return $this;
    }

    /**
     * Get the value of numPessoas
     */
    public function getNumPessoas()
    {
        return $this->numPessoas;
    }

    /**
     * Set the value of numPessoas
     *
     * @return  self
     */
    public function setNumPessoas($numPessoas)
    {
        $this->numPessoas = $numPessoas;

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

    /**
     * Get var mixed
     */
    public function getVenda()
    {
        return $this->venda;
    }

    /**
     * Set var mixed
     *
     * @return  self
     */
    public function setVenda($venda)
    {
        $this->venda = $venda;

        return $this;
    }


    public function getWhereIdMesaOrComanda() {
        if(!empty($this->numCm)) {
            return ["coluna" => "num_cm", "valor" => $this->numCm];
        } elseif(!empty($this->idVenda)) {
            return ["coluna" => "id_mesa", "valor" => $this->idMesa];
        }

        throw new ApiWebControlException("É obrigatório o envio do numero da comanda ou id da mesa", CodesApi::PARAMETROINVALIDO);

    }
}
