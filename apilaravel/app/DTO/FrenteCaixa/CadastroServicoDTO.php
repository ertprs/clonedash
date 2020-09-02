<?php

namespace App\DTO\FrenteCaixa;

use App\Services\Extensions\RequestBodyConverterInterface;
use JMS\Serializer\Annotation as JMS;

/**
 * @author Tiago Franco
 * DTO para manipulacao dos dados de devolucao 
 * @JMS\AccessType("public_method")
 */
class CadastroServicoDTO implements RequestBodyConverterInterface
{
    /**
     * @JMS\SerializedName("codigo_barra")
     * @JMS\Type("integer")
     * 
     * codigoBarra
     * var integer
     */
    private $codigoBarra;
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
     * @JMS\SerializedName("tipo_unidade")
     * @JMS\Type("integer")
     * 
     * tipoUnidade
     * var integer
     */
    private $tipoUnidade = 2;
    /**
     * @JMS\SerializedName("nome")
     * @JMS\Type("string")
     * 
     * nome
     * var string
     */
    private $nome;
    /**
     * @JMS\SerializedName("ecommerce")
     * @JMS\Type("string")
     * 
     * ecommerce
     * var string
     */
    private $ecommerce;
    /**
     * @JMS\SerializedName("preco_custo")
     * @JMS\Type("float")
     * 
     * precoCusto
     * var float
     */
    private $precoCusto;
    
    /**
     * @JMS\SerializedName("preco_venda")
     * @JMS\Type("float")
     * 
     * precoVenda
     * var float
     */
    private $precoVenda;

    /**
     * @JMS\SerializedName("tipo_margem_lucro")
     * @JMS\Type("string")
     * 
     * tipoMargemLucro
     * var string
     */
    private $tipoMargemLucro = "P";
    /**
     * @JMS\SerializedName("percentual_margem_lucro")
     * @JMS\Type("float")
     * 
     * percentualMargemLucro
     * var float
     */
    private $percentualMargemLucro = 0;
    /**
     * @JMS\SerializedName("margem_lucro_valor")
     * @JMS\Type("float")
     * 
     * margemLucroValor
     * var float
     */
    private $margemLucroValor = 0;
    
    /**
     * @JMS\SerializedName("codigo_servico_issqn")
     * @JMS\Type("integer")
     * 
     * codigoServicoIssqn
     * var integer
     */
    private $codigoServicoIssqn;
    /**
     * @JMS\SerializedName("percentual_aliquota_issqn")
     * @JMS\Type("float")
     * 
     * percentualAliquotaIssqn
     * var float
     */
    private $percentualAliquotaIssqn;

    /**
     * @JMS\SerializedName("ativo")
     * @JMS\Type("string")
     * 
     * percentualAliquotaIssqn
     * var string
     */
    private $ativo = "A";

    /**
     * @JMS\SerializedName("locacao_quantidade")
     * @JMS\Type("integer")
     * 
     * locacaoQuantidade
     * var integer
     */
    private $locacaoQuantidade = 0;

    /**
     * @JMS\SerializedName("tipo_produto")
     * @JMS\Type("string")
     * 
     * locacaoQuantidade
     * var string
     */
    private $tipoProduto = "S";
    

   

    /**
     * Get the value of tipoProduto
     */ 
    public function getTipoProduto()
    {
        return $this->tipoProduto;
    }

    /**
     * Set the value of tipoProduto
     *
     * @return  self
     */ 
    public function setTipoProduto($tipoProduto)
    {
        $this->tipoProduto = $tipoProduto;

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
     * Get the value of margemLucroValor
     */ 
    public function getMargemLucroValor()
    {
        return $this->margemLucroValor;
    }

    /**
     * Set the value of margemLucroValor
     *
     * @return  self
     */ 
    public function setMargemLucroValor($margemLucroValor)
    {
        $this->margemLucroValor = $margemLucroValor;

        return $this;
    }

    /**
     * Get the value of codigoServicoIssqn
     */ 
    public function getCodigoServicoIssqn()
    {
        return $this->codigoServicoIssqn;
    }

    /**
     * Set the value of codigoServicoIssqn
     *
     * @return  self
     */ 
    public function setCodigoServicoIssqn($codigoServicoIssqn)
    {
        $this->codigoServicoIssqn = $codigoServicoIssqn;

        return $this;
    }

    /**
     * Get the value of percentualAliquotaIssqn
     */ 
    public function getPercentualAliquotaIssqn()
    {
        return $this->percentualAliquotaIssqn;
    }

    /**
     * Set the value of percentualAliquotaIssqn
     *
     * @return  self
     */ 
    public function setPercentualAliquotaIssqn($percentualAliquotaIssqn)
    {
        $this->percentualAliquotaIssqn = $percentualAliquotaIssqn;

        return $this;
    }

    /**
     * Get the value of ativo
     */ 
    public function getAtivo()
    {
        return $this->ativo;
    }

    /**
     * Set the value of ativo
     *
     * @return  self
     */ 
    public function setAtivo($ativo)
    {
        $this->ativo = $ativo;

        return $this;
    }

    /**
     * Get the value of locacaoQuantidade
     */ 
    public function getLocacaoQuantidade()
    {
        return $this->locacaoQuantidade;
    }

    /**
     * Set the value of locacaoQuantidade
     *
     * @return  self
     */ 
    public function setLocacaoQuantidade($locacaoQuantidade)
    {
        $this->locacaoQuantidade = $locacaoQuantidade;

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
}
