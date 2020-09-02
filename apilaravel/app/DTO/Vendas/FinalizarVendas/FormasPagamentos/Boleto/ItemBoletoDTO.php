<?php

namespace App\DTO\Vendas\FinalizarVendas\FormasPagamentos\Boleto;

use App\Services\Utils\DataUtils;
use App\Services\Extensions\RequestBodyConverterInterface;
use JMS\Serializer\Annotation as JMS;

/** 
 * Objeto responsavel pelo
 * armazenamento das informacoes
 * dos pagamentos com parcelas
 * mas sem juros e mora
 * @JMS\AccessType("public_method")
 */
class ItemBoletoDTO implements RequestBodyConverterInterface
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
}
