<?php

namespace App\DTO\FrenteCaixa;

use App\Services\Extensions\RequestBodyConverterInterface;
use JMS\Serializer\Annotation as JMS;

/**
 * @author Tiago Franco
 * DTO para manipulacao dos dados de devolucao 
 * @JMS\AccessType("public_method")
 */
class CalculoTotalDescontosDTO implements RequestBodyConverterInterface
{

    /**
     * @JMS\SerializedName("itens")
     * @JMS\Type("array")
     * 
     * itens
     * var array
     */
    private $itens;
   

    /**
     * Get the value of itens
     */ 
    public function getItens()
    {
        return $this->itens;
    }

    /**
     * Set the value of itens
     *
     * @return  self
     */ 
    public function setItens($itens)
    {
        $this->itens = $itens;

        return $this;
    }
}
