<?php 

namespace App\DTO;

use App\Services\Extensions\RequestBodyConverterInterface;
use JMS\Serializer\Annotation as JMS;

/**
 * @author Tiago Franco
 * DTO para processar as exclusoes dos itens de venda das comadas
 * @JMS\AccessType("public_method")
 */
class CancelarVendaItemComandaDTO implements RequestBodyConverterInterface
{
    /**
     * @JMS\SerializedName("senha_master")
     * @JMS\Type("string")
     * 
     * senhaMaster
     * var string
     */
    private $senhaMaster;

    /**
     * @JMS\SerializedName("item_venda")
     * @JMS\Type("integer")
     * 
     * itensVenda
     * var integer
     */
    private $itemVenda;
    
    /**
     * Get the value of senhaMaster
     */ 
    public function getSenhaMaster()
    {
        return $this->senhaMaster;
    }

    /**
     * Set the value of senhaMaster
     *
     * @return  self
     */ 
    public function setSenhaMaster($senhaMaster)
    {
        $this->senhaMaster = $senhaMaster;

        return $this;
    }


    /**
     * Get the value of itemVenda
     */ 
    public function getItemVenda()
    {
        return $this->itemVenda;
    }

    /**
     * Set the value of itemVenda
     *
     * @return  self
     */ 
    public function setItemVenda($itemVenda)
    {
        $this->itemVenda = $itemVenda;

        return $this;
    }
}
