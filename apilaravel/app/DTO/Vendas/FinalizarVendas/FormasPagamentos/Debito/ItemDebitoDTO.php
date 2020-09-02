<?php

namespace App\DTO\Vendas\FinalizarVendas\FormasPagamentos\Debito;

use JMS\Serializer\Annotation as JMS;
use App\Services\Extensions\RequestBodyConverterInterface;
/**
 * @author Tiago Franco
 * Objeto para armazenar as informacoes 
 * dos pagamentos dos cheques
 * @JMS\AccessType("public_method")
 */
class ItemDebitoDTO implements RequestBodyConverterInterface
{
    /**
     * @JMS\SerializedName("valor")
     * @JMS\Type("float")
     * 
     * valor
     * var float
     */
    private $valor;
    

    /**
     * Get the value of valor
     */ 
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * Set the value of valor
     *
     * @return  self
     */ 
    public function setValor($valor)
    {
        $this->valor = $valor;

        return $this;
    }
}
