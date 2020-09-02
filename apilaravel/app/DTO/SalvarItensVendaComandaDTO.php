<?php

namespace App\DTO;

use App\Services\Extensions\RequestBodyConverterInterface;
use JMS\Serializer\Annotation as JMS;

/**
 * @author Tiago Franco
 * DTO para cadatra itens de venda em uma comanda ou
 * mesa
 */
class SalvarItensVendaComandaDTO implements RequestBodyConverterInterface
{
    /**
     * @JMS\SerializedName("id_mesa")
     * @JMS\Type("integer")
     * 
     * qtd
     * var integer
     */
    private $idMesa;
    /**
     * @JMS\SerializedName("num_cm")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $numCm;
    /**
     * @JMS\SerializedName("venda_itens")
     * @JMS\Type("App\DTO\VendaItemDTO")
     * var mixed
     */
    private $vendaItens;

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
     * Get var mixed
     */ 
    public function getVendaItens()
    {
        return $this->vendaItens;
    }

    /**
     * Set var mixed
     *
     * @return  self
     */ 
    public function setVendaItens($vendaItens)
    {
        $this->vendaItens = $vendaItens;

        return $this;
    }
}
