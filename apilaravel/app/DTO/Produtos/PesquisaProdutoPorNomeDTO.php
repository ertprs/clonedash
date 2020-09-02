<?php

namespace App\DTO\Produtos;

use App\Services\Extensions\RequestBodyConverterInterface;
use JMS\Serializer\Annotation as JMS;

/**
 * @author Tiago Franco
 * DTO para operações envolvendo movimentacoes da frente de caixa
 * @JMS\AccessType("public_method")
 */
class PesquisaProdutoPorNomeDTO implements RequestBodyConverterInterface
{
    /**
     * @JMS\SerializedName("descricoes")
     * @JMS\Type("array")
     * 
     * descricoes
     * var array
     */
    private $descricoes;
    /**
     * @JMS\SerializedName("descricao_detalhada")
     * @JMS\Type("string")
     * 
     * descricaoDetalhada
     * var string
     */
    private $descricaoDetalhada;

    /**
     * @JMS\SerializedName("inicio_com")
     * @JMS\Type("integer")
     * 
     * descricaoDetalhada
     * var integer
     */
    private $inicioCom = 0;

    /**
     * Get the value of descricoes
     */
    public function getDescricoes()
    {
        return $this->descricoes;
    }

    /**
     * Set the value of descricoes
     *
     * @return  self
     */
    public function setDescricoes($descricoes)
    {
        $this->descricoes = $descricoes;

        return $this;
    }

    /**
     * Get the value of descricaoDetalhada
     */
    public function getDescricaoDetalhada()
    {
        return $this->descricaoDetalhada;
    }

    /**
     * Set the value of descricaoDetalhada
     *
     * @return  self
     */
    public function setDescricaoDetalhada($descricaoDetalhada)
    {
        $this->descricaoDetalhada = $descricaoDetalhada;

        return $this;
    }

    /**
     * Get the value of inicioCom
     */
    public function getInicioCom()
    {
        return $this->inicioCom;
    }

    /**
     * Set the value of inicioCom
     *
     * @return  self
     */
    public function setInicioCom($inicioCom)
    {
        $this->inicioCom = $inicioCom;

        return $this;
    }
}
