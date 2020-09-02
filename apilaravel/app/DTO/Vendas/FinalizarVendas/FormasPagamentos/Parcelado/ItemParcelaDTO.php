<?php

namespace App\DTO\Vendas\FinalizarVendas\FormasPagamentos\Parcelado;

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
class ItemParcelaDTO implements RequestBodyConverterInterface
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
     * @JMS\SerializedName("cod_aut_cartao")
     * @JMS\Type("string")
     * 
     * codAutCartao
     * var string
     */
    private $codAutCartao;

    /**
     * @JMS\SerializedName("id_credenciadora")
     * @JMS\Type("string")
     * 
     * idCredenciadora
     * var string
     */
    private $idCredenciadora;
    
    /**
     * @JMS\SerializedName("cnpj_credenciadora")
     * @JMS\Type("string")
     * 
     * cnpjCredenciadora
     * var string
     */
    private $cnpjCredenciadora;

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

    /**
     * Get the value of codAutCartao
     */ 
    public function getCodAutCartao()
    {
        return $this->codAutCartao;
    }

    /**
     * Set the value of codAutCartao
     *
     * @return  self
     */ 
    public function setCodAutCartao($codAutCartao)
    {
        $this->codAutCartao = $codAutCartao;

        return $this;
    }

    /**
     * Get the value of idCredenciadora
     */ 
    public function getIdCredenciadora()
    {
        return $this->idCredenciadora;
    }

    /**
     * Set the value of idCredenciadora
     *
     * @return  self
     */ 
    public function setIdCredenciadora($idCredenciadora)
    {
        $this->idCredenciadora = $idCredenciadora;

        return $this;
    }

    /**
     * Get the value of cnpjCredenciadora
     */ 
    public function getCnpjCredenciadora()
    {
        return $this->cnpjCredenciadora;
    }

    /**
     * Set the value of cnpjCredenciadora
     *
     * @return  self
     */ 
    public function setCnpjCredenciadora($cnpjCredenciadora)
    {
        if(!empty($cnpjCredenciadora))
            $this->cnpjCredenciadora = str_pad(preg_replace("/\D+/","", $cnpjCredenciadora), 14, 0, STR_PAD_LEFT);

        return $this;
    }
}
