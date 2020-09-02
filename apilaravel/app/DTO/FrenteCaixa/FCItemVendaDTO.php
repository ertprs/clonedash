<?php

namespace App\DTO\FrenteCaixa;

use App\Services\Extensions\RequestBodyConverterInterface;
use JMS\Serializer\Annotation as JMS;;

/**
 * @author Tiago Franco
 * DTO para criação dos itens dos pedidos pela frente de caixa
 */
class FCItemVendaDTO implements RequestBodyConverterInterface
{

    /**
     * @JMS\SerializedName("id_venda")
     * @JMS\Type("integer")
     * 
     * idVenda
     * var integer
     */
    private $idVenda;

    /**
     * @JMS\SerializedName("qtd")
     * @JMS\Type("integer")
     * 
     * qtd
     * var integer
     */
    private $qtd = 1; #uma qtde do produto por default

    /**
     * @JMS\SerializedName("id_produto")
     * @JMS\Type("integer")
     * 
     * idProduto
     * var integer
     */
    private $idProduto;
    /**
     * @JMS\SerializedName("nome_produto")
     * @JMS\Type("string")
     * 
     * nomeProduto
     * var string
     */
    private $nomeProduto;
    /**
     * @JMS\SerializedName("valor_unitario")
     * @JMS\Type("float")
     * 
     * valorUnitario
     * var float
     */
    private $valorUnitario;
    /**
     * @JMS\SerializedName("codigo_barra")
     * @JMS\Type("string")
     * 
     * codigoBarra
     * var string
     */
    private $codigoBarra;
    /**
     * @JMS\SerializedName("preco_venda")
     * @JMS\Type("float")
     * 
     * precoVenda
     * var float
     */
    private $precoVenda;
    /**
     * @JMS\SerializedName("id_unidade")
     * @JMS\Type("integer")
     * 
     * idUnidade
     * var integer
     */
    private $idUnidade;
    /**
     * @JMS\SerializedName("valor_preco_custo")
     * @JMS\Type("float")
     * 
     * valorPrecoCusto
     * var float
     */
    private $valorPrecoCusto;
    /**
     * @JMS\SerializedName("percentual_desconto")
     * @JMS\Type("float")
     * 
     * percentualDesconto
     * var float
     */
    private $percentualDesconto;
    /**
     * @JMS\SerializedName("id_grade")
     * @JMS\Type("integer")
     * 
     * idGrade
     * var integer
     */
    private $idGrade;
    /**
     * @JMS\SerializedName("id_promocao")
     * @JMS\Type("integer")
     * 
     * idPromocao
     * var integer
     */
    private $idPromocao;
    /**
     * @JMS\SerializedName("id_kit")
     * @JMS\Type("integer")
     * 
     * idKit
     * var integer  
     */
    private $idKit;
    /**
     * @JMS\SerializedName("tipo_compra")
     * @JMS\Type("string")
     * 
     * tipoCompra
     * var string
     */
    private $tipoCompra = "V";

    /**
     * Get the value of idVenda
     */ 
    public function getIdVenda()
    {
        return $this->idVenda;
    }

    /**
     * Set the value of idVenda
     *
     * @return  self
     */ 
    public function setIdVenda($idVenda)
    {
        $this->idVenda = $idVenda;

        return $this;
    }

    /**
     * Get the value of tipoCompra
     */
    public function getTipoCompra()
    {
        return $this->tipoCompra;
    }

    /**
     * Set the value of tipoCompra
     *
     * @return  self
     */
    public function setTipoCompra($tipoCompra)
    {
        $this->tipoCompra = $tipoCompra;

        return $this;
    }

    /**
     * Get the value of idProduto
     */
    public function getIdProduto()
    {
        return $this->idProduto;
    }

    /**
     * Set the value of idProduto
     *
     * @return  self
     */
    public function setIdProduto($idProduto)
    {
        $this->idProduto = $idProduto;

        return $this;
    }

    /**
     * Get the value of nomeProduto
     */
    public function getNomeProduto()
    {
        return $this->nomeProduto;
    }

    /**
     * Set the value of nomeProduto
     *
     * @return  self
     */
    public function setNomeProduto($nomeProduto)
    {
        $this->nomeProduto = $nomeProduto;

        return $this;
    }

    /**
     * Get the value of valorUnitario
     */
    public function getValorUnitario()
    {
        return $this->valorUnitario;
    }

    /**
     * Set the value of valorUnitario
     *
     * @return  self
     */
    public function setValorUnitario($valorUnitario)
    {
        $this->valorUnitario = $valorUnitario;

        return $this;
    }

    /**
     * Get the value of codigoBarra
     */
    public function getCodigoBarra()
    {
        return $this->codigoBarra;
    }

    /**
     * Set the value of codigoBarra
     *
     * @return  self
     */
    public function setCodigoBarra($codigoBarra)
    {
        $this->codigoBarra = $codigoBarra;

        return $this;
    }

    /**
     * Get the value of precoVenda
     */
    public function getPrecoVenda()
    {
        return $this->precoVenda;
    }

    /**
     * Set the value of precoVenda
     *
     * @return  self
     */
    public function setPrecoVenda($precoVenda)
    {
        $this->precoVenda = $precoVenda;

        return $this;
    }

    /**
     * Get the value of idUnidade
     */
    public function getIdUnidade()
    {
        return $this->idUnidade;
    }

    /**
     * Set the value of idUnidade
     *
     * @return  self
     */
    public function setIdUnidade($idUnidade)
    {
        $this->idUnidade = $idUnidade;

        return $this;
    }

    /**
     * Get the value of valorPrecoCusto
     */
    public function getValorPrecoCusto()
    {
        return $this->valorPrecoCusto;
    }

    /**
     * Set the value of valorPrecoCusto
     *
     * @return  self
     */
    public function setValorPrecoCusto($valorPrecoCusto)
    {
        $this->valorPrecoCusto = $valorPrecoCusto;

        return $this;
    }

    /**
     * Get the value of percentualDesconto
     */
    public function getPercentualDesconto()
    {
        return $this->percentualDesconto;
    }

    /**
     * Set the value of percentualDesconto
     *
     * @return  self
     */
    public function setPercentualDesconto($percentualDesconto)
    {
        $this->percentualDesconto = $percentualDesconto;

        return $this;
    }

    /**
     * Get the value of idGrade
     */
    public function getIdGrade()
    {
        return $this->idGrade;
    }

    /**
     * Set the value of idGrade
     *
     * @return  self
     */
    public function setIdGrade($idGrade)
    {
        $this->idGrade = $idGrade;

        return $this;
    }

    /**
     * Get the value of idPromocao
     */
    public function getIdPromocao()
    {
        return $this->idPromocao;
    }

    /**
     * Set the value of idPromocao
     *
     * @return  self
     */
    public function setIdPromocao($idPromocao)
    {
        $this->idPromocao = $idPromocao;

        return $this;
    }

    /**
     * Get the value of idKit
     */
    public function getIdKit()
    {
        return $this->idKit;
    }

    /**
     * Set the value of idKit
     *
     * @return  self
     */
    public function setIdKit($idKit)
    {
        $this->idKit = $idKit;

        return $this;
    }

    /**
     * Get the value of qtd
     */
    public function getQtd()
    {
        return $this->qtd;
    }

    /**
     * Set the value of qtd
     *
     * @return  self
     */
    public function setQtd($qtd)
    {
        $this->qtd = $qtd;

        return $this;
    }
}
