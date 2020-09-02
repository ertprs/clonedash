<?php

namespace App\DTO\Vendas\FinalizarVendas\FormasPagamentos\Cheque;

use App\Services\Utils\DataUtils;
use JMS\Serializer\Annotation as JMS;
use App\Services\Extensions\RequestBodyConverterInterface;
/**
 * @author Tiago Franco
 * Objeto para armazenar as informacoes 
 * dos pagamentos dos cheques
 * @JMS\AccessType("public_method")
 */
class ItemChequeDTO implements RequestBodyConverterInterface
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
     * @JMS\SerializedName("vencimento")
     * @JMS\Type("string")
     * 
     * vencimento
     * var string
     */
    private $vencimento;
    
    /**
     * @JMS\SerializedName("cmc7")
     * @JMS\Type("string")
     * 
     * cmc7
     * var string
     */
    private $cmc7;

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

    /**
     * Get the value of vencimento
     */
    public function getVencimento()
    {
        return $this->vencimento;
    }

    /**
     * Set the value of vencimento
     *
     * @return  self
     */
    public function setVencimento($vencimento)
    {
        if (!empty($vencimento))
            $this->vencimento = DataUtils::getData($vencimento);

        return $this;
    }

    /**
     * Get the value of cmc7
     */ 
    public function getCmc7()
    {
        return $this->cmc7;
    }

    /**
     * Set the value of cmc7
     *
     * @return  self
     */ 
    public function setCmc7($cmc7)
    {
        $this->cmc7 = $cmc7;

        return $this;
    }
}
