<?php

namespace App\DTO\Vendas\FinalizarVendas\FormasPagamentos\JurosMora;

use App\Services\Utils\DataUtils;
use JMS\Serializer\Annotation as JMS;
use App\Services\Extensions\RequestBodyConverterInterface;

/** 
 * Objeto responsavel pelo
 * armazenamento das informacoes
 * dos pagamentos 
 * com juros e mora
 * @JMS\AccessType("public_method")
 */
class ItemJurosMoraDTO implements RequestBodyConverterInterface
{
    /**
     * @JMS\SerializedName("parcela")
     * @JMS\Type("float")
     * 
     * parcela
     * var float
     */
    private $parcela;
    /**
     * @JMS\SerializedName("vencimento")
     * @JMS\Type("string")
     * 
     * vencimento
     * var string
     */
    private $vencimento;
    /**
     * @JMS\SerializedName("multa")
     * @JMS\Type("float")
     * 
     * multa
     * var float
     */
    private $multa;

    /**
     * Get the value of parcela
     */
    public function getParcela()
    {
        return $this->parcela;
    }

    /**
     * Set the value of parcela
     *
     * @return  self
     */
    public function setParcela($parcela)
    {
        $this->parcela = $parcela;

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
