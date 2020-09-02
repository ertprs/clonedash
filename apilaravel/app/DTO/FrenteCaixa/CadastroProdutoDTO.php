<?php

namespace App\DTO\FrenteCaixa;

use App\Services\Extensions\RequestBodyConverterInterface;
use JMS\Serializer\Annotation as JMS;

/**
 * @author Tiago Franco
 * DTO para manipulacao dos dados de devolucao 
 * @JMS\AccessType("public_method")
 */
class CadastroProdutoDTO implements RequestBodyConverterInterface
{

    /**
     * @JMS\SerializedName("id_fornecedor")
     * @JMS\Type("integer")
     * 
     * idFornecedor
     * var integer
     */
    private $idFornecedor;
    /**
     * @JMS\SerializedName("id_classificacao")
     * @JMS\Type("integer")
     * 
     * idClassificacao
     * var integer
     */
    private $idClassificacao;
    /**
     * @JMS\SerializedName("id_marca")
     * @JMS\Type("integer")
     * 
     * idMarca
     * var integer
     */
    private $idMarca;
    /**
     * @JMS\SerializedName("codigo_barra")
     * @JMS\Type("string")
     * 
     * codigoBarra
     * var string
     */
    private $codigoBarra;
    /**
     * @JMS\SerializedName("codigo_interno")
     * @JMS\Type("string")
     * 
     * codigoInterno
     * var string
     */
    private $codigoInterno;
    /**
     * @JMS\SerializedName("nome")
     * @JMS\Type("string")
     * 
     * nome
     * var string
     */
    private $nome;
    /**
     * @JMS\SerializedName("tipo_unidade")
     * @JMS\Type("integer")
     * 
     * tipoUnidade
     * var integer
     */
    private $tipoUnidade;
    /**
     * @JMS\SerializedName("tipo_unidade_tributaria")
     * @JMS\Type("integer")
     * 
     * tipoUnidadeTributaria
     * var integer
     */
    private $tipoUnidadeTributaria;
    /**
     * @JMS\SerializedName("estoque_minimo")
     * @JMS\Type("integer")
     * 
     * estoqueMinimo
     * var integer
     */
    private $estoqueMinimo;
    /**
     * @JMS\SerializedName("estoque_inicial")
     * @JMS\Type("integer")
     * 
     * estoqueInicial
     * var integer
     */
    private $estoqueInicial = 0;
    /**
     * @JMS\SerializedName("ncm")
     * @JMS\Type("string")
     * 
     * ncm
     * var string
     */
    private $ncm;
    /**
     * @JMS\SerializedName("id_imposto_nota")
     * @JMS\Type("integer")
     * 
     * idImpostoNota
     * var integer
     */
    private $idImpostoNota;
    /**
     * @JMS\SerializedName("cest")
     * @JMS\Type("string")
     * 
     * cest
     * var string
     */
    private $cest;
    
    /**
     * @JMS\SerializedName("tipo_margem_lucro")
     * @JMS\Type("string")
     * 
     * tipoMargemLucro
     * var string
     */
    private $tipoMargemLucro;
    /**
     * @JMS\SerializedName("percentual_margem_lucro")
     * @JMS\Type("float")
     * 
     * percentualMargemLucro
     * var float
     */
    private $percentualMargemLucro;

    /**
     * @JMS\SerializedName("preco_custo")
     * @JMS\Type("float")
     * 
     * precoCusto
     * var float
     */
    private $precoCusto;

    /**
     * @JMS\SerializedName("preco_prazo")
     * @JMS\Type("float")
     * 
     * precoVarejo
     * var float
     */
    private $precoPrazo;
    
    /**
     * @JMS\SerializedName("preco_venda")
     * @JMS\Type("float")
     * 
     * precoVenda
     * var float
     */
    private $precoVenda;
    /**
     * @JMS\SerializedName("preco_varejo")
     * @JMS\Type("float")
     * 
     * precoVarejo
     * var float
     */
    private $precoVarejo;
    /**
     * @JMS\SerializedName("preco_atacado")
     * @JMS\Type("float")
     * 
     * precoAtacado
     * var float
     */
    private $precoAtacado;
    /**
     * @JMS\SerializedName("truncar_vlr_total")
     * @JMS\Type("string")
     * 
     * truncarVlrTotal
     * var string
     */
    private $truncarVlrTotal;
    /**
     * @JMS\SerializedName("ecommerce")
     * @JMS\Type("string")
     * 
     * ecommerce
     * var string
     */
    private $ecommerce = 'S';
    /**
     * @JMS\SerializedName("fcp")
     * @JMS\Type("string")
     * 
     * fcp
     * var string
     */
    private $fcp = 'N';
    /**
     * @JMS\SerializedName("estoque_loja_virtual")
     * @JMS\Type("integer")
     * 
     * estoqueLojaVirtual
     * var integer
     */
    private $estoqueLojaVirtual = 0;

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
     * Get the value of idClassificacao
     */
    public function getIdClassificacao()
    {
        return $this->idClassificacao;
    }

    /**
     * Set the value of idClassificacao
     *
     * @return  self
     */
    public function setIdClassificacao($idClassificacao)
    {
        $this->idClassificacao = $idClassificacao;

        return $this;
    }

    /**
     * Get the value of idMarca
     */
    public function getIdMarca()
    {
        return $this->idMarca;
    }

    /**
     * Set the value of idMarca
     *
     * @return  self
     */
    public function setIdMarca($idMarca)
    {
        $this->idMarca = $idMarca;

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
     * Get the value of codigoInterno
     */
    public function getCodigoInterno()
    {
        return $this->codigoInterno;
    }

    /**
     * Set the value of codigoInterno
     *
     * @return  self
     */
    public function setCodigoInterno($codigoInterno)
    {
        $this->codigoInterno = $codigoInterno;

        return $this;
    }

    /**
     * Get the value of nome
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     *
     * @return  self
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of tipoUnidade
     */
    public function getTipoUnidade()
    {
        return $this->tipoUnidade;
    }

    /**
     * Set the value of tipoUnidade
     *
     * @return  self
     */
    public function setTipoUnidade($tipoUnidade)
    {
        $this->tipoUnidade = $tipoUnidade;

        return $this;
    }

    /**
     * Get the value of tipoUnidadeTributaria
     */
    public function getTipoUnidadeTributaria()
    {
        return $this->tipoUnidadeTributaria;
    }

    /**
     * Set the value of tipoUnidadeTributaria
     *
     * @return  self
     */
    public function setTipoUnidadeTributaria($tipoUnidadeTributaria)
    {
        $this->tipoUnidadeTributaria = $tipoUnidadeTributaria;

        return $this;
    }

    /**
     * Get the value of estoqueMinimo
     */
    public function getEstoqueMinimo()
    {
        return $this->estoqueMinimo;
    }

    /**
     * Set the value of estoqueMinimo
     *
     * @return  self
     */
    public function setEstoqueMinimo($estoqueMinimo)
    {
        $this->estoqueMinimo = $estoqueMinimo;

        return $this;
    }

    /**
     * Get the value of estoqueInicial
     */
    public function getEstoqueInicial()
    {
        return $this->estoqueInicial;
    }

    /**
     * Set the value of estoqueInicial
     *
     * @return  self
     */
    public function setEstoqueInicial($estoqueInicial)
    {
        $this->estoqueInicial = $estoqueInicial;

        return $this;
    }

    /**
     * Get the value of ncm
     */
    public function getNcm()
    {
        return $this->ncm;
    }

    /**
     * Set the value of ncm
     *
     * @return  self
     */
    public function setNcm($ncm)
    {
        $this->ncm = $ncm;

        return $this;
    }

    /**
     * Get the value of idImpostoNota
     */
    public function getIdImpostoNota()
    {
        return $this->idImpostoNota;
    }

    /**
     * Set the value of idImpostoNota
     *
     * @return  self
     */
    public function setIdImpostoNota($idImpostoNota)
    {
        $this->idImpostoNota = $idImpostoNota;

        return $this;
    }

    /**
     * Get the value of cest
     */
    public function getCest()
    {
        return $this->cest;
    }

    /**
     * Set the value of cest
     *
     * @return  self
     */
    public function setCest($cest)
    {
        $this->cest = $cest;

        return $this;
    }

    /**
     * Get the value of precoCusto
     */
    public function getPrecoCusto()
    {
        return $this->precoCusto;
    }

    /**
     * Set the value of precoCusto
     *
     * @return  self
     */
    public function setPrecoCusto($precoCusto)
    {
        $this->precoCusto = $precoCusto;

        return $this;
    }

    /**
     * Get the value of tipoMargemLucro
     */
    public function getTipoMargemLucro()
    {
        return $this->tipoMargemLucro;
    }

    /**
     * Set the value of tipoMargemLucro
     *
     * @return  self
     */
    public function setTipoMargemLucro($tipoMargemLucro)
    {
        $this->tipoMargemLucro = $tipoMargemLucro;

        return $this;
    }

    /**
     * Get the value of percentualMargemLucro
     */
    public function getPercentualMargemLucro()
    {
        return $this->percentualMargemLucro;
    }

    /**
     * Set the value of percentualMargemLucro
     *
     * @return  self
     */
    public function setPercentualMargemLucro($percentualMargemLucro)
    {
        $this->percentualMargemLucro = $percentualMargemLucro;

        return $this;
    }

    /**
     * Get the value of idFornecedor
     */
    public function getIdFornecedor()
    {
        return $this->idFornecedor;
    }

    /**
     * Set the value of idFornecedor
     *
     * @return  self
     */
    public function setIdFornecedor($idFornecedor)
    {
        $this->idFornecedor = $idFornecedor;

        return $this;
    }

    /**
     * Get the value of precoVarejo
     */
    public function getPrecoVarejo()
    {
        return $this->precoVarejo;
    }

    /**
     * Set the value of precoVarejo
     *
     * @return  self
     */
    public function setPrecoVarejo($precoVarejo)
    {
        $this->precoVarejo = $precoVarejo;

        return $this;
    }

    /**
     * Get the value of precoAtacado
     */
    public function getPrecoAtacado()
    {
        return $this->precoAtacado;
    }

    /**
     * Set the value of precoAtacado
     *
     * @return  self
     */
    public function setPrecoAtacado($precoAtacado)
    {
        $this->precoAtacado = $precoAtacado;

        return $this;
    }

    /**
     * Get the value of truncarVlrTotal
     */
    public function getTruncarVlrTotal()
    {
        return $this->truncarVlrTotal;
    }

    /**
     * Set the value of truncarVlrTotal
     *
     * @return  self
     */
    public function setTruncarVlrTotal($truncarVlrTotal)
    {
        $this->truncarVlrTotal = $truncarVlrTotal;

        return $this;
    }

    /**
     * Get the value of ecommerce
     */
    public function getEcommerce()
    {
        return $this->ecommerce;
    }

    /**
     * Set the value of ecommerce
     *
     * @return  self
     */
    public function setEcommerce($ecommerce)
    {
        $this->ecommerce = $ecommerce;

        return $this;
    }

    /**
     * Get the value of fcp
     */
    public function getFcp()
    {
        return $this->fcp;
    }

    /**
     * Set the value of fcp
     *
     * @return  self
     */
    public function setFcp($fcp)
    {
        $this->fcp = $fcp;

        return $this;
    }

    /**
     * Get the value of estoqueLojaVirtual
     */
    public function getEstoqueLojaVirtual()
    {
        return $this->estoqueLojaVirtual;
    }

    /**
     * Set the value of estoqueLojaVirtual
     *
     * @return  self
     */
    public function setEstoqueLojaVirtual($estoqueLojaVirtual)
    {
        $this->estoqueLojaVirtual = $estoqueLojaVirtual;

        return $this;
    }

    /**
     * Get the value of precoPrazo
     */ 
    public function getPrecoPrazo()
    {
        return $this->precoPrazo;
    }

    /**
     * Set the value of precoPrazo
     *
     * @return  self
     */ 
    public function setPrecoPrazo($precoPrazo)
    {
        $this->precoPrazo = $precoPrazo;

        return $this;
    }

    public function getMargemLucroValor() {
        if($this->tipoMargemLucro == 'P') {
            return round($this->precoCusto * $this->percentualMargemLucro, 2);
        }

        return 0;
    }
}
