<?php

namespace App\DTO\Vendas\FinalizarVendas\FormasPagamentos\Carne;

use App\Services\Utils\DataUtils;
use JMS\Serializer\Annotation as JMS;
use App\Services\Extensions\RequestBodyConverterInterface;

/**
 * @author Tiago Franco
 * Objeto para armazenar as informacoes 
 * dos pagamentos dos cheques
 * @JMS\AccessType("public_method")
 */
class ItemCarneDTO implements RequestBodyConverterInterface
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
     * @JMS\SerializedName("valor_ajustado")
     * @JMS\Type("float")
     * 
     * valorAjustado
     * var float
     */
    private $valorAjustado;
    
    /**
     * @JMS\SerializedName("multa")
     * @JMS\Type("float")
     * 
     * multa
     * var float
     */
    private $multa;

    /**
     * @JMS\SerializedName("vencimento")
     * @JMS\Type("string")
     * 
     * vencimento
     * var string
     */
    private $vencimento;

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
     * Get the value of valorAjustado
     */ 
    public function getValorAjustado()
    {
        return $this->valorAjustado;
    }

    /**
     * Set the value of valorAjustado
     *
     * @return  self
     */ 
    public function setValorAjustado($valorAjustado)
    {
        $this->valorAjustado = $valorAjustado;

        return $this;
    }

    /**
     * Get the value of multa
     */ 
    public function getMulta()
    {
        return $this->multa;
    }

    /**
     * Set the value of multa
     *
     * @return  self
     */ 
    public function setMulta($multa)
    {
        $this->multa = $multa;

        return $this;
    }
}
