<?php

namespace App\DTO;

use App\Exceptions\ApiWebControlException;
use App\Services\Extensions\RequestBodyConverterInterface;
use App\Services\Utils\CodesApi;
use JMS\Serializer\Annotation as JMS;

/**
 * @author Tiago Franco
 * DTO para enviar das informacoes 
 * para sincronizar produto com
 * o Mercado  Livre
 * @JMS\AccessType("public_method")
 */
class SincronizarMercadoLivreDTO implements RequestBodyConverterInterface
{
    /**
     * @JMS\SerializedName("expires_in")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $expiresIn;
    /**
     * @JMS\SerializedName("refresh_token")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $refreshToken;
    /**
     * @JMS\SerializedName("access_token")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $accessToken;
    /**
     * @JMS\SerializedName("id_product")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $idProduct;

    /**
     * Get the value of expiresIn
     */
    public function getExpiresIn()
    {
        return $this->expiresIn;
    }

    /**
     * Set the value of expiresIn
     *
     * @return  self
     */
    public function setExpiresIn($expiresIn)
    {
        $this->expiresIn = $expiresIn;

        return $this;
    }

    /**
     * Get the value of refreshToken
     */
    public function getRefreshToken()
    {
        return $this->refreshToken;
    }

    /**
     * Set the value of refreshToken
     *
     * @return  self
     */
    public function setRefreshToken($refreshToken)
    {
        $this->refreshToken = $refreshToken;

        return $this;
    }

    /**
     * Get the value of accessToken
     */
    public function getAccessToken()
    {
        return $this->accessToken;
    }

    /**
     * Set the value of accessToken
     *
     * @return  self
     */
    public function setAccessToken($accessToken)
    {
        $this->accessToken = $accessToken;

        return $this;
    }

    /**
     * Get the value of idProduct
     */
    public function getIdProduct()
    {
        return $this->idProduct;
    }

    /**
     * Set the value of idProduct
     *
     * @return  self
     */
    public function setIdProduct($idProduct)
    {
        if (!is_numeric($idProduct)) {
            throw new ApiWebControlException("id_produto inválido", CodesApi::PARAMETROINVALIDO);
        }
        $this->idProduct = $idProduct;

        return $this;
    }
}
