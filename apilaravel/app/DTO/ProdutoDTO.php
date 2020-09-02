<?php

namespace App\DTO;

use App\Services\Extensions\RequestBodyConverterInterface;
use JMS\Serializer\Annotation as JMS;

/**
 * @author Tiago Franco
 * DTO para manipulacao dos dados 
 * de produtos
 * @JMS\AccessType("public_method")
 */
class ProdutoDTO implements RequestBodyConverterInterface
{
     /**
     * @JMS\SerializedName("id")
     * @JMS\Type("integer")
     * 
     * qtd
     * var integer
     */
    private $id;
     /**
     * @JMS\SerializedName("descricao")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $descricao;
     /**
     * @JMS\SerializedName("id_cadastro")
     * @JMS\Type("integer")
     * 
     * qtd
     * var integer
     */
    private $idCadastro;
     /**
     * @JMS\SerializedName("id_usuario")
     * @JMS\Type("integer")
     * 
     * qtd
     * var integer
     */
    private $idUsuario;
     /**
     * @JMS\SerializedName("data_cadastro")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $dataCadastro;
     /**
     * @JMS\SerializedName("id_classificacao")
     * @JMS\Type("integer")
     * 
     * qtd
     * var integer
     */
    private $idClassificacao;
     /**
     * @JMS\SerializedName("cor")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $cor;
     /**
     * @JMS\SerializedName("id_cor")
     * @JMS\Type("integer")
     * 
     * qtd
     * var integer
     */
    private $idCor;
     /**
     * @JMS\SerializedName("tamanho")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $tamanho;
     /**
     * @JMS\SerializedName("custo")
     * @JMS\Type("float")
     * 
     * qtd
     * var float
     */
    private $custo;
     /**
     * @JMS\SerializedName("custo_medio_venda")
     * @JMS\Type("float")
     * 
     * qtd
     * var float
     */
    private $custoMedioVenda;
     /**
     * @JMS\SerializedName("custo_medio_venda_prazo")
     * @JMS\Type("float")
     * 
     * qtd
     * var float
     */
    private $custoMedioVendaPrazo;
     /**
     * @JMS\SerializedName("custo_medio_venda_varejo")
     * @JMS\Type("float")
     * 
     * qtd
     * var float
     */
    private $custoMedioVendaVarejo;
     /**
     * @JMS\SerializedName("custo_medio_venda_atacado")
     * @JMS\Type("float")
     * 
     * qtd
     * var float
     */
    private $custoMedioVendaAtacado;
     /**
     * @JMS\SerializedName("porcentagem_custo_venda")
     * @JMS\Type("float")
     * 
     * qtd
     * var float
     */
    private $porcentagemCustoVenda;
     /**
     * @JMS\SerializedName("porcentagem_venda_prazo")
     * @JMS\Type("float")
     * 
     * qtd
     * var float
     */
    private $porcentagemVendaPrazo;
     /**
     * @JMS\SerializedName("porcentagem_atacado_avista")
     * @JMS\Type("float")
     * 
     * qtd
     * var float
     */
    private $porcentagemAtacadoAvista;
     /**
     * @JMS\SerializedName("porcentagem_atacado_aprazo")
     * @JMS\Type("float")
     * 
     * qtd
     * var float
     */
    private $porcentagemAtacadoAprazo;
     /**
     * @JMS\SerializedName("qtd_atacado")
     * @JMS\Type("integer")
     * 
     * qtd
     * var integer
     */
    private $qtdAtacado;
     /**
     * @JMS\SerializedName("ativo")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $ativo;
     /**
     * @JMS\SerializedName("qtd_minima")
     * @JMS\Type("flaot")
     * 
     * qtd
     * var flaot
     */
    private $qtdMinima;
     /**
     * @JMS\SerializedName("peso")
     * @JMS\Type("flaot")
     * 
     * qtd
     * var flaot
     */
    private $peso;
     /**
     * @JMS\SerializedName("codigo_barra")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $codigoBarra;
     /**
     * @JMS\SerializedName("barra")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $barra;
     /**
     * @JMS\SerializedName("sincronizado")
     * @JMS\Type("integer")
     * 
     * qtd
     * var integer
     */
    private $sincronizado;
     /**
     * @JMS\SerializedName("iss")
     * @JMS\Type("integer")
     * 
     * qtd
     * var integer
     */
    private $iss;
     /**
     * @JMS\SerializedName("icms")
     * @JMS\Type("float")
     * 
     * qtd
     * var float
     */
    private $icms;
     /**
     * @JMS\SerializedName("id_unidade")
     * @JMS\Type("integer")
     * 
     * qtd
     * var integer
     */
    private $idUnidade;
     /**
     * @JMS\SerializedName("localizacao")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $localizacao;
     /**
     * @JMS\SerializedName("id_fornecedor")
     * @JMS\Type("integer")
     * 
     * qtd
     * var integer
     */
    private $idFornecedor;
     /**
     * @JMS\SerializedName("fabricante")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $fabricante;
     /**
     * @JMS\SerializedName("ean")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $ean;
     /**
     * @JMS\SerializedName("ex_tipi")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $exTipi;
     /**
     * @JMS\SerializedName("ncm")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $ncm;
     /**
     * @JMS\SerializedName("cest")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $cest;
     /**
     * @JMS\SerializedName("unidade_trib")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $unidadeTrib;
     /**
     * @JMS\SerializedName("qtd_trib")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $qtdTrib;
     /**
     * @JMS\SerializedName("vlr_unit_trib")
     * @JMS\Type("float")
     * 
     * qtd
     * var float
     */
    private $vlrUnitTrib;
     /**
     * @JMS\SerializedName("genero_produto")
     * @JMS\Type("integer")
     * 
     * qtd
     * var integer
     */
    private $generoProduto;
     /**
     * @JMS\SerializedName("id_tributacao")
     * @JMS\Type("integer")
     * 
     * qtd
     * var integer
     */
    private $idTributacao;
     /**
     * @JMS\SerializedName("id_origem")
     * @JMS\Type("integer")
     * 
     * qtd
     * var integer
     */
    private $idOrigem;
     /**
     * @JMS\SerializedName("id_especifico")
     * @JMS\Type("integer")
     * 
     * qtd
     * var integer
     */
    private $idEspecifico;
     /**
     * @JMS\SerializedName("id_cfop")
     * @JMS\Type("integer")
     * 
     * qtd
     * var integer
     */
    private $idCfop;
     /**
     * @JMS\SerializedName("id_cfop_itens")
     * @JMS\Type("integer")
     * 
     * qtd
     * var integer
     */
    private $idCfopItens;
     /**
     * @JMS\SerializedName("desconto")
     * @JMS\Type("integer")
     * 
     * qtd
     * var integer
     */
    private $desconto;
     /**
     * @JMS\SerializedName("vender_estoque_zerado")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $venderEstoqueZerado;
     /**
     * @JMS\SerializedName("descricao_detalhada")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $descricaoDetalhada;
     /**
     * @JMS\SerializedName("ecommerce")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $ecommerce;
     /**
     * @JMS\SerializedName("promocao_ecommerce")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $promocaoEcommerce;
     /**
     * @JMS\SerializedName("produto_destaque_ecommerce")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $produtoDestaqueEcommerce;
     /**
     * @JMS\SerializedName("altura")
     * @JMS\Type("float ")
     * 
     * qtd
     * var float 
     */
    private $altura;
     /**
     * @JMS\SerializedName("largura")
     * @JMS\Type("float ")
     * 
     * qtd
     * var float 
     */
    private $largura;
     /**
     * @JMS\SerializedName("comprimento")
     * @JMS\Type("float ")
     * 
     * qtd
     * var float 
     */
    private $comprimento;
     /**
     * @JMS\SerializedName("id_marca")
     * @JMS\Type("integer")
     * 
     * qtd
     * var integer
     */
    private $idMarca;
     /**
     * @JMS\SerializedName("destaque")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $destaque;
     /**
     * @JMS\SerializedName("valor_frete")
     * @JMS\Type("float")
     * 
     * qtd
     * var float
     */
    private $valorFrete;
     /**
     * @JMS\SerializedName("cofins")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $cofins;
     /**
     * @JMS\SerializedName("pis")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $pis;
     /**
     * @JMS\SerializedName("data_fabricacao")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $dataFabricacao;
     /**
     * @JMS\SerializedName("data_validade")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $dataValidade;
     /**
     * @JMS\SerializedName("lote_produto")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $loteProduto;
     /**
     * @JMS\SerializedName("nr_edicao")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $nrEdicao;
     /**
     * @JMS\SerializedName("peso_bruto")
     * @JMS\Type("float")
     * 
     * qtd
     * var float
     */
    private $pesoBruto;
     /**
     * @JMS\SerializedName("pis_aliquota")
     * @JMS\Type("float")
     * 
     * qtd
     * var float
     */
    private $pisAliquota;
     /**
     * @JMS\SerializedName("pis_cst")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $pisCst;
     /**
     * @JMS\SerializedName("ipi_aliquota")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $ipiAliquota;
     /**
     * @JMS\SerializedName("ipi_cst")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $ipiCst;
     /**
     * @JMS\SerializedName("cofins_aliquota")
     * @JMS\Type("float")
     * 
     * qtd
     * var float
     */
    private $cofinsAliquota;
     /**
     * @JMS\SerializedName("cofins_cst")
     * @JMS\Type("integer")
     * 
     * qtd
     * var integer
     */
    private $cofinsCst;
     /**
     * @JMS\SerializedName("icms_cst")
     * @JMS\Type("integer")
     * 
     * qtd
     * var integer
     */
    private $icmsCst;
     /**
     * @JMS\SerializedName("icms_modalidade")
     * @JMS\Type("integer")
     * 
     * qtd
     * var integer
     */
    private $icmsModalidade;
     /**
     * @JMS\SerializedName("peso_caixa")
     * @JMS\Type("float")
     * 
     * qtd
     * var float
     */
    private $pesoCaixa;
     /**
     * @JMS\SerializedName("alt_caixa")
     * @JMS\Type("float")
     * 
     * qtd
     * var float
     */
    private $altCaixa;
     /**
     * @JMS\SerializedName("larg_caixa")
     * @JMS\Type("float")
     * 
     * qtd
     * var float
     */
    private $largCaixa;
     /**
     * @JMS\SerializedName("comp_caixa")
     * @JMS\Type("float")
     * 
     * qtd
     * var float
     */
    private $compCaixa;
     /**
     * @JMS\SerializedName("margem_lucro_tipo")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $margemLucroTipo;
     /**
     * @JMS\SerializedName("margem_lucro_valor")
     * @JMS\Type("float")
     * 
     * qtd
     * var float
     */
    private $margemLucroValor;
     /**
     * @JMS\SerializedName("desconto_maximo_tipo")
     * @JMS\Type("float")
     * 
     * qtd
     * var float
     */
    private $descontoMaximoTipo;
     /**
     * @JMS\SerializedName("desconto_maximo_percentual")
     * @JMS\Type("float")
     * 
     * qtd
     * var float
     */
    private $descontoMaximoPercentual;
     /**
     * @JMS\SerializedName("desconto_maximo_valor")
     * @JMS\Type("float")
     * 
     * qtd
     * var float
     */
    private $descontoMaximoValor;
     /**
     * @JMS\SerializedName("infos_nutricionais")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $infosNutricionais;
     /**
     * @JMS\SerializedName("prod_serv")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $prodServ;
     /**
     * @JMS\SerializedName("identificacao_interna")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $identificacaoInterna;
     /**
     * @JMS\SerializedName("solicitar_vrtotal")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $solicitarVrtotal;
     /**
     * @JMS\SerializedName("casas_decimais")
     * @JMS\Type("integer")
     * 
     * qtd
     * var integer
     */
    private $casasDecimais;
     /**
     * @JMS\SerializedName("locacao_quantidade")
     * @JMS\Type("float")
     * 
     * qtd
     * var float
     */
    private $locacaoQuantidade;
     /**
     * @JMS\SerializedName("obs_preco")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $obsPreco;
     /**
     * @JMS\SerializedName("id_bomba_bico")
     * @JMS\Type("integer")
     * 
     * qtd
     * var integer
     */
    private $idBombaBico;
     /**
     * @JMS\SerializedName("id_importacao")
     * @JMS\Type("integer")
     * 
     * qtd
     * var integer
     */
    private $idImportacao;
     /**
     * @JMS\SerializedName("data_alteracao")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $dataAlteracao;
     /**
     * @JMS\SerializedName("perc_dif_uf")
     * @JMS\Type("float")
     * 
     * qtd
     * var float
     */
    private $percDifUf;
     /**
     * @JMS\SerializedName("qtd_unidade")
     * @JMS\Type("float")
     * 
     * qtd
     * var float
     */
    private $qtdUnidade;
     /**
     * @JMS\SerializedName("truncar_vlr_total")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $truncarVlrTotal;
     /**
     * @JMS\SerializedName("codigo_anp")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $codigoAnp;
     /**
     * @JMS\SerializedName("env_prod")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $envProd;
     /**
     * @JMS\SerializedName("peso_liquido")
     * @JMS\Type("float")
     * 
     * qtd
     * var float
     */
    private $pesoLiquido;
     /**
     * @JMS\SerializedName("estoque_lojavirtual")
     * @JMS\Type("integer")
     * 
     * qtd
     * var integer
     */
    private $estoqueLojavirtual;
     /**
     * @JMS\SerializedName("deletar")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $deletar;
     /**
     * @JMS\SerializedName("comissao_valor")
     * @JMS\Type("float")
     * 
     * qtd
     * var float
     */
    private $comissaoValor;
     /**
     * @JMS\SerializedName("num_parcelas")
     * @JMS\Type("integer")
     * 
     * qtd
     * var integer
     */
    private $numParcelas;
     /**
     * @JMS\SerializedName("data_sincronismo")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $dataSincronismo;
     /**
     * @JMS\SerializedName("id_off")
     * @JMS\Type("integer")
     * 
     * qtd
     * var integer
     */
    private $idOff;
     /**
     * @JMS\SerializedName("fcp")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $fcp;
     /**
     * @JMS\SerializedName("glp")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $glp;
     /**
     * @JMS\SerializedName("exibir_grafico")
     * @JMS\Type("integer")
     * 
     * qtd
     * var integer
     */
    private $exibirGrafico;
     /**
     * @JMS\SerializedName("id_ibptax")
     * @JMS\Type("integer")
     * 
     * qtd
     * var integer
     */
    private $idIbptax;

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of descricao
     */ 
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * Set the value of descricao
     *
     * @return  self
     */ 
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;

        return $this;
    }

    /**
     * Get the value of idCadastro
     */ 
    public function getIdCadastro()
    {
        return $this->idCadastro;
    }

    /**
     * Set the value of idCadastro
     *
     * @return  self
     */ 
    public function setIdCadastro($idCadastro)
    {
        $this->idCadastro = $idCadastro;

        return $this;
    }

    /**
     * Get the value of idUsuario
     */ 
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    /**
     * Set the value of idUsuario
     *
     * @return  self
     */ 
    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;

        return $this;
    }

    /**
     * Get the value of dataCadastro
     */ 
    public function getDataCadastro()
    {
        return $this->dataCadastro;
    }

    /**
     * Set the value of dataCadastro
     *
     * @return  self
     */ 
    public function setDataCadastro($dataCadastro)
    {
        $this->dataCadastro = $dataCadastro;

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
     * Get the value of cor
     */ 
    public function getCor()
    {
        return $this->cor;
    }

    /**
     * Set the value of cor
     *
     * @return  self
     */ 
    public function setCor($cor)
    {
        $this->cor = $cor;

        return $this;
    }

    /**
     * Get the value of idCor
     */ 
    public function getIdCor()
    {
        return $this->idCor;
    }

    /**
     * Set the value of idCor
     *
     * @return  self
     */ 
    public function setIdCor($idCor)
    {
        $this->idCor = $idCor;

        return $this;
    }

    /**
     * Get the value of tamanho
     */ 
    public function getTamanho()
    {
        return $this->tamanho;
    }

    /**
     * Set the value of tamanho
     *
     * @return  self
     */ 
    public function setTamanho($tamanho)
    {
        $this->tamanho = $tamanho;

        return $this;
    }

    /**
     * Get the value of custo
     */ 
    public function getCusto()
    {
        return $this->custo;
    }

    /**
     * Set the value of custo
     *
     * @return  self
     */ 
    public function setCusto($custo)
    {
        $this->custo = $custo;

        return $this;
    }

    /**
     * Get the value of custoMedioVenda
     */ 
    public function getCustoMedioVenda()
    {
        return $this->custoMedioVenda;
    }

    /**
     * Set the value of custoMedioVenda
     *
     * @return  self
     */ 
    public function setCustoMedioVenda($custoMedioVenda)
    {
        $this->custoMedioVenda = $custoMedioVenda;

        return $this;
    }

    /**
     * Get the value of custoMedioVendaPrazo
     */ 
    public function getCustoMedioVendaPrazo()
    {
        return $this->custoMedioVendaPrazo;
    }

    /**
     * Set the value of custoMedioVendaPrazo
     *
     * @return  self
     */ 
    public function setCustoMedioVendaPrazo($custoMedioVendaPrazo)
    {
        $this->custoMedioVendaPrazo = $custoMedioVendaPrazo;

        return $this;
    }

    /**
     * Get the value of custoMedioVendaVarejo
     */ 
    public function getCustoMedioVendaVarejo()
    {
        return $this->custoMedioVendaVarejo;
    }

    /**
     * Set the value of custoMedioVendaVarejo
     *
     * @return  self
     */ 
    public function setCustoMedioVendaVarejo($custoMedioVendaVarejo)
    {
        $this->custoMedioVendaVarejo = $custoMedioVendaVarejo;

        return $this;
    }

    /**
     * Get the value of custoMedioVendaAtacado
     */ 
    public function getCustoMedioVendaAtacado()
    {
        return $this->custoMedioVendaAtacado;
    }

    /**
     * Set the value of custoMedioVendaAtacado
     *
     * @return  self
     */ 
    public function setCustoMedioVendaAtacado($custoMedioVendaAtacado)
    {
        $this->custoMedioVendaAtacado = $custoMedioVendaAtacado;

        return $this;
    }

    /**
     * Get the value of porcentagemCustoVenda
     */ 
    public function getPorcentagemCustoVenda()
    {
        return $this->porcentagemCustoVenda;
    }

    /**
     * Set the value of porcentagemCustoVenda
     *
     * @return  self
     */ 
    public function setPorcentagemCustoVenda($porcentagemCustoVenda)
    {
        $this->porcentagemCustoVenda = $porcentagemCustoVenda;

        return $this;
    }

    /**
     * Get the value of porcentagemVendaPrazo
     */ 
    public function getPorcentagemVendaPrazo()
    {
        return $this->porcentagemVendaPrazo;
    }

    /**
     * Set the value of porcentagemVendaPrazo
     *
     * @return  self
     */ 
    public function setPorcentagemVendaPrazo($porcentagemVendaPrazo)
    {
        $this->porcentagemVendaPrazo = $porcentagemVendaPrazo;

        return $this;
    }

    /**
     * Get the value of porcentagemAtacadoAvista
     */ 
    public function getPorcentagemAtacadoAvista()
    {
        return $this->porcentagemAtacadoAvista;
    }

    /**
     * Set the value of porcentagemAtacadoAvista
     *
     * @return  self
     */ 
    public function setPorcentagemAtacadoAvista($porcentagemAtacadoAvista)
    {
        $this->porcentagemAtacadoAvista = $porcentagemAtacadoAvista;

        return $this;
    }

    /**
     * Get the value of porcentagemAtacadoAprazo
     */ 
    public function getPorcentagemAtacadoAprazo()
    {
        return $this->porcentagemAtacadoAprazo;
    }

    /**
     * Set the value of porcentagemAtacadoAprazo
     *
     * @return  self
     */ 
    public function setPorcentagemAtacadoAprazo($porcentagemAtacadoAprazo)
    {
        $this->porcentagemAtacadoAprazo = $porcentagemAtacadoAprazo;

        return $this;
    }

    /**
     * Get the value of qtdAtacado
     */ 
    public function getQtdAtacado()
    {
        return $this->qtdAtacado;
    }

    /**
     * Set the value of qtdAtacado
     *
     * @return  self
     */ 
    public function setQtdAtacado($qtdAtacado)
    {
        $this->qtdAtacado = $qtdAtacado;

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
     * Get the value of qtdMinima
     */ 
    public function getQtdMinima()
    {
        return $this->qtdMinima;
    }

    /**
     * Set the value of qtdMinima
     *
     * @return  self
     */ 
    public function setQtdMinima($qtdMinima)
    {
        $this->qtdMinima = $qtdMinima;

        return $this;
    }

    /**
     * Get the value of peso
     */ 
    public function getPeso()
    {
        return $this->peso;
    }

    /**
     * Set the value of peso
     *
     * @return  self
     */ 
    public function setPeso($peso)
    {
        $this->peso = $peso;

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
     * Get the value of barra
     */ 
    public function getBarra()
    {
        return $this->barra;
    }

    /**
     * Set the value of barra
     *
     * @return  self
     */ 
    public function setBarra($barra)
    {
        $this->barra = $barra;

        return $this;
    }

    /**
     * Get the value of sincronizado
     */ 
    public function getSincronizado()
    {
        return $this->sincronizado;
    }

    /**
     * Set the value of sincronizado
     *
     * @return  self
     */ 
    public function setSincronizado($sincronizado)
    {
        $this->sincronizado = $sincronizado;

        return $this;
    }

    /**
     * Get the value of iss
     */ 
    public function getIss()
    {
        return $this->iss;
    }

    /**
     * Set the value of iss
     *
     * @return  self
     */ 
    public function setIss($iss)
    {
        $this->iss = $iss;

        return $this;
    }

    /**
     * Get the value of icms
     */ 
    public function getIcms()
    {
        return $this->icms;
    }

    /**
     * Set the value of icms
     *
     * @return  self
     */ 
    public function setIcms($icms)
    {
        $this->icms = $icms;

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
     * Get the value of localizacao
     */ 
    public function getLocalizacao()
    {
        return $this->localizacao;
    }

    /**
     * Set the value of localizacao
     *
     * @return  self
     */ 
    public function setLocalizacao($localizacao)
    {
        $this->localizacao = $localizacao;

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
     * Get the value of fabricante
     */ 
    public function getFabricante()
    {
        return $this->fabricante;
    }

    /**
     * Set the value of fabricante
     *
     * @return  self
     */ 
    public function setFabricante($fabricante)
    {
        $this->fabricante = $fabricante;

        return $this;
    }

    /**
     * Get the value of ean
     */ 
    public function getEan()
    {
        return $this->ean;
    }

    /**
     * Set the value of ean
     *
     * @return  self
     */ 
    public function setEan($ean)
    {
        $this->ean = $ean;

        return $this;
    }

    /**
     * Get the value of exTipi
     */ 
    public function getExTipi()
    {
        return $this->exTipi;
    }

    /**
     * Set the value of exTipi
     *
     * @return  self
     */ 
    public function setExTipi($exTipi)
    {
        $this->exTipi = $exTipi;

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
     * Get the value of unidadeTrib
     */ 
    public function getUnidadeTrib()
    {
        return $this->unidadeTrib;
    }

    /**
     * Set the value of unidadeTrib
     *
     * @return  self
     */ 
    public function setUnidadeTrib($unidadeTrib)
    {
        $this->unidadeTrib = $unidadeTrib;

        return $this;
    }

    /**
     * Get the value of qtdTrib
     */ 
    public function getQtdTrib()
    {
        return $this->qtdTrib;
    }

    /**
     * Set the value of qtdTrib
     *
     * @return  self
     */ 
    public function setQtdTrib($qtdTrib)
    {
        $this->qtdTrib = $qtdTrib;

        return $this;
    }

    /**
     * Get the value of vlrUnitTrib
     */ 
    public function getVlrUnitTrib()
    {
        return $this->vlrUnitTrib;
    }

    /**
     * Set the value of vlrUnitTrib
     *
     * @return  self
     */ 
    public function setVlrUnitTrib($vlrUnitTrib)
    {
        $this->vlrUnitTrib = $vlrUnitTrib;

        return $this;
    }

    /**
     * Get the value of generoProduto
     */ 
    public function getGeneroProduto()
    {
        return $this->generoProduto;
    }

    /**
     * Set the value of generoProduto
     *
     * @return  self
     */ 
    public function setGeneroProduto($generoProduto)
    {
        $this->generoProduto = $generoProduto;

        return $this;
    }

    /**
     * Get the value of idTributacao
     */ 
    public function getIdTributacao()
    {
        return $this->idTributacao;
    }

    /**
     * Set the value of idTributacao
     *
     * @return  self
     */ 
    public function setIdTributacao($idTributacao)
    {
        $this->idTributacao = $idTributacao;

        return $this;
    }

    /**
     * Get the value of idOrigem
     */ 
    public function getIdOrigem()
    {
        return $this->idOrigem;
    }

    /**
     * Set the value of idOrigem
     *
     * @return  self
     */ 
    public function setIdOrigem($idOrigem)
    {
        $this->idOrigem = $idOrigem;

        return $this;
    }

    /**
     * Get the value of idEspecifico
     */ 
    public function getIdEspecifico()
    {
        return $this->idEspecifico;
    }

    /**
     * Set the value of idEspecifico
     *
     * @return  self
     */ 
    public function setIdEspecifico($idEspecifico)
    {
        $this->idEspecifico = $idEspecifico;

        return $this;
    }

    /**
     * Get the value of idCfop
     */ 
    public function getIdCfop()
    {
        return $this->idCfop;
    }

    /**
     * Set the value of idCfop
     *
     * @return  self
     */ 
    public function setIdCfop($idCfop)
    {
        $this->idCfop = $idCfop;

        return $this;
    }

    /**
     * Get the value of idCfopItens
     */ 
    public function getIdCfopItens()
    {
        return $this->idCfopItens;
    }

    /**
     * Set the value of idCfopItens
     *
     * @return  self
     */ 
    public function setIdCfopItens($idCfopItens)
    {
        $this->idCfopItens = $idCfopItens;

        return $this;
    }

    /**
     * Get the value of desconto
     */ 
    public function getDesconto()
    {
        return $this->desconto;
    }

    /**
     * Set the value of desconto
     *
     * @return  self
     */ 
    public function setDesconto($desconto)
    {
        $this->desconto = $desconto;

        return $this;
    }

    /**
     * Get the value of venderEstoqueZerado
     */ 
    public function getVenderEstoqueZerado()
    {
        return $this->venderEstoqueZerado;
    }

    /**
     * Set the value of venderEstoqueZerado
     *
     * @return  self
     */ 
    public function setVenderEstoqueZerado($venderEstoqueZerado)
    {
        $this->venderEstoqueZerado = $venderEstoqueZerado;

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
     * Get the value of promocaoEcommerce
     */ 
    public function getPromocaoEcommerce()
    {
        return $this->promocaoEcommerce;
    }

    /**
     * Set the value of promocaoEcommerce
     *
     * @return  self
     */ 
    public function setPromocaoEcommerce($promocaoEcommerce)
    {
        $this->promocaoEcommerce = $promocaoEcommerce;

        return $this;
    }

    /**
     * Get the value of produtoDestaqueEcommerce
     */ 
    public function getProdutoDestaqueEcommerce()
    {
        return $this->produtoDestaqueEcommerce;
    }

    /**
     * Set the value of produtoDestaqueEcommerce
     *
     * @return  self
     */ 
    public function setProdutoDestaqueEcommerce($produtoDestaqueEcommerce)
    {
        $this->produtoDestaqueEcommerce = $produtoDestaqueEcommerce;

        return $this;
    }

    /**
     * Get the value of altura
     */ 
    public function getAltura()
    {
        return $this->altura;
    }

    /**
     * Set the value of altura
     *
     * @return  self
     */ 
    public function setAltura($altura)
    {
        $this->altura = $altura;

        return $this;
    }

    /**
     * Get the value of largura
     */ 
    public function getLargura()
    {
        return $this->largura;
    }

    /**
     * Set the value of largura
     *
     * @return  self
     */ 
    public function setLargura($largura)
    {
        $this->largura = $largura;

        return $this;
    }

    /**
     * Get the value of comprimento
     */ 
    public function getComprimento()
    {
        return $this->comprimento;
    }

    /**
     * Set the value of comprimento
     *
     * @return  self
     */ 
    public function setComprimento($comprimento)
    {
        $this->comprimento = $comprimento;

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
     * Get the value of destaque
     */ 
    public function getDestaque()
    {
        return $this->destaque;
    }

    /**
     * Set the value of destaque
     *
     * @return  self
     */ 
    public function setDestaque($destaque)
    {
        $this->destaque = $destaque;

        return $this;
    }

    /**
     * Get the value of valorFrete
     */ 
    public function getValorFrete()
    {
        return $this->valorFrete;
    }

    /**
     * Set the value of valorFrete
     *
     * @return  self
     */ 
    public function setValorFrete($valorFrete)
    {
        $this->valorFrete = $valorFrete;

        return $this;
    }

    /**
     * Get the value of cofins
     */ 
    public function getCofins()
    {
        return $this->cofins;
    }

    /**
     * Set the value of cofins
     *
     * @return  self
     */ 
    public function setCofins($cofins)
    {
        $this->cofins = $cofins;

        return $this;
    }

    /**
     * Get the value of pis
     */ 
    public function getPis()
    {
        return $this->pis;
    }

    /**
     * Set the value of pis
     *
     * @return  self
     */ 
    public function setPis($pis)
    {
        $this->pis = $pis;

        return $this;
    }

    /**
     * Get the value of dataFabricacao
     */ 
    public function getDataFabricacao()
    {
        return $this->dataFabricacao;
    }

    /**
     * Set the value of dataFabricacao
     *
     * @return  self
     */ 
    public function setDataFabricacao($dataFabricacao)
    {
        $this->dataFabricacao = $dataFabricacao;

        return $this;
    }

    /**
     * Get the value of dataValidade
     */ 
    public function getDataValidade()
    {
        return $this->dataValidade;
    }

    /**
     * Set the value of dataValidade
     *
     * @return  self
     */ 
    public function setDataValidade($dataValidade)
    {
        $this->dataValidade = $dataValidade;

        return $this;
    }

    /**
     * Get the value of loteProduto
     */ 
    public function getLoteProduto()
    {
        return $this->loteProduto;
    }

    /**
     * Set the value of loteProduto
     *
     * @return  self
     */ 
    public function setLoteProduto($loteProduto)
    {
        $this->loteProduto = $loteProduto;

        return $this;
    }

    /**
     * Get the value of nrEdicao
     */ 
    public function getNrEdicao()
    {
        return $this->nrEdicao;
    }

    /**
     * Set the value of nrEdicao
     *
     * @return  self
     */ 
    public function setNrEdicao($nrEdicao)
    {
        $this->nrEdicao = $nrEdicao;

        return $this;
    }

    /**
     * Get the value of pesoBruto
     */ 
    public function getPesoBruto()
    {
        return $this->pesoBruto;
    }

    /**
     * Set the value of pesoBruto
     *
     * @return  self
     */ 
    public function setPesoBruto($pesoBruto)
    {
        $this->pesoBruto = $pesoBruto;

        return $this;
    }

    /**
     * Get the value of pisAliquota
     */ 
    public function getPisAliquota()
    {
        return $this->pisAliquota;
    }

    /**
     * Set the value of pisAliquota
     *
     * @return  self
     */ 
    public function setPisAliquota($pisAliquota)
    {
        $this->pisAliquota = $pisAliquota;

        return $this;
    }

    /**
     * Get the value of pisCst
     */ 
    public function getPisCst()
    {
        return $this->pisCst;
    }

    /**
     * Set the value of pisCst
     *
     * @return  self
     */ 
    public function setPisCst($pisCst)
    {
        $this->pisCst = $pisCst;

        return $this;
    }

    /**
     * Get the value of ipiAliquota
     */ 
    public function getIpiAliquota()
    {
        return $this->ipiAliquota;
    }

    /**
     * Set the value of ipiAliquota
     *
     * @return  self
     */ 
    public function setIpiAliquota($ipiAliquota)
    {
        $this->ipiAliquota = $ipiAliquota;

        return $this;
    }

    /**
     * Get the value of ipiCst
     */ 
    public function getIpiCst()
    {
        return $this->ipiCst;
    }

    /**
     * Set the value of ipiCst
     *
     * @return  self
     */ 
    public function setIpiCst($ipiCst)
    {
        $this->ipiCst = $ipiCst;

        return $this;
    }

    /**
     * Get the value of cofinsAliquota
     */ 
    public function getCofinsAliquota()
    {
        return $this->cofinsAliquota;
    }

    /**
     * Set the value of cofinsAliquota
     *
     * @return  self
     */ 
    public function setCofinsAliquota($cofinsAliquota)
    {
        $this->cofinsAliquota = $cofinsAliquota;

        return $this;
    }

    /**
     * Get the value of cofinsCst
     */ 
    public function getCofinsCst()
    {
        return $this->cofinsCst;
    }

    /**
     * Set the value of cofinsCst
     *
     * @return  self
     */ 
    public function setCofinsCst($cofinsCst)
    {
        $this->cofinsCst = $cofinsCst;

        return $this;
    }

    /**
     * Get the value of icmsCst
     */ 
    public function getIcmsCst()
    {
        return $this->icmsCst;
    }

    /**
     * Set the value of icmsCst
     *
     * @return  self
     */ 
    public function setIcmsCst($icmsCst)
    {
        $this->icmsCst = $icmsCst;

        return $this;
    }

    /**
     * Get the value of icmsModalidade
     */ 
    public function getIcmsModalidade()
    {
        return $this->icmsModalidade;
    }

    /**
     * Set the value of icmsModalidade
     *
     * @return  self
     */ 
    public function setIcmsModalidade($icmsModalidade)
    {
        $this->icmsModalidade = $icmsModalidade;

        return $this;
    }

    /**
     * Get the value of pesoCaixa
     */ 
    public function getPesoCaixa()
    {
        return $this->pesoCaixa;
    }

    /**
     * Set the value of pesoCaixa
     *
     * @return  self
     */ 
    public function setPesoCaixa($pesoCaixa)
    {
        $this->pesoCaixa = $pesoCaixa;

        return $this;
    }

    /**
     * Get the value of altCaixa
     */ 
    public function getAltCaixa()
    {
        return $this->altCaixa;
    }

    /**
     * Set the value of altCaixa
     *
     * @return  self
     */ 
    public function setAltCaixa($altCaixa)
    {
        $this->altCaixa = $altCaixa;

        return $this;
    }

    /**
     * Get the value of largCaixa
     */ 
    public function getLargCaixa()
    {
        return $this->largCaixa;
    }

    /**
     * Set the value of largCaixa
     *
     * @return  self
     */ 
    public function setLargCaixa($largCaixa)
    {
        $this->largCaixa = $largCaixa;

        return $this;
    }

    /**
     * Get the value of compCaixa
     */ 
    public function getCompCaixa()
    {
        return $this->compCaixa;
    }

    /**
     * Set the value of compCaixa
     *
     * @return  self
     */ 
    public function setCompCaixa($compCaixa)
    {
        $this->compCaixa = $compCaixa;

        return $this;
    }

    /**
     * Get the value of margemLucroTipo
     */ 
    public function getMargemLucroTipo()
    {
        return $this->margemLucroTipo;
    }

    /**
     * Set the value of margemLucroTipo
     *
     * @return  self
     */ 
    public function setMargemLucroTipo($margemLucroTipo)
    {
        $this->margemLucroTipo = $margemLucroTipo;

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
     * Get the value of descontoMaximoTipo
     */ 
    public function getDescontoMaximoTipo()
    {
        return $this->descontoMaximoTipo;
    }

    /**
     * Set the value of descontoMaximoTipo
     *
     * @return  self
     */ 
    public function setDescontoMaximoTipo($descontoMaximoTipo)
    {
        $this->descontoMaximoTipo = $descontoMaximoTipo;

        return $this;
    }

    /**
     * Get the value of descontoMaximoPercentual
     */ 
    public function getDescontoMaximoPercentual()
    {
        return $this->descontoMaximoPercentual;
    }

    /**
     * Set the value of descontoMaximoPercentual
     *
     * @return  self
     */ 
    public function setDescontoMaximoPercentual($descontoMaximoPercentual)
    {
        $this->descontoMaximoPercentual = $descontoMaximoPercentual;

        return $this;
    }

    /**
     * Get the value of descontoMaximoValor
     */ 
    public function getDescontoMaximoValor()
    {
        return $this->descontoMaximoValor;
    }

    /**
     * Set the value of descontoMaximoValor
     *
     * @return  self
     */ 
    public function setDescontoMaximoValor($descontoMaximoValor)
    {
        $this->descontoMaximoValor = $descontoMaximoValor;

        return $this;
    }

    /**
     * Get the value of infosNutricionais
     */ 
    public function getInfosNutricionais()
    {
        return $this->infosNutricionais;
    }

    /**
     * Set the value of infosNutricionais
     *
     * @return  self
     */ 
    public function setInfosNutricionais($infosNutricionais)
    {
        $this->infosNutricionais = $infosNutricionais;

        return $this;
    }

    /**
     * Get the value of prodServ
     */ 
    public function getProdServ()
    {
        return $this->prodServ;
    }

    /**
     * Set the value of prodServ
     *
     * @return  self
     */ 
    public function setProdServ($prodServ)
    {
        $this->prodServ = $prodServ;

        return $this;
    }

    /**
     * Get the value of identificacaoInterna
     */ 
    public function getIdentificacaoInterna()
    {
        return $this->identificacaoInterna;
    }

    /**
     * Set the value of identificacaoInterna
     *
     * @return  self
     */ 
    public function setIdentificacaoInterna($identificacaoInterna)
    {
        $this->identificacaoInterna = $identificacaoInterna;

        return $this;
    }

    /**
     * Get the value of solicitarVrtotal
     */ 
    public function getSolicitarVrtotal()
    {
        return $this->solicitarVrtotal;
    }

    /**
     * Set the value of solicitarVrtotal
     *
     * @return  self
     */ 
    public function setSolicitarVrtotal($solicitarVrtotal)
    {
        $this->solicitarVrtotal = $solicitarVrtotal;

        return $this;
    }

    /**
     * Get the value of casasDecimais
     */ 
    public function getCasasDecimais()
    {
        return $this->casasDecimais;
    }

    /**
     * Set the value of casasDecimais
     *
     * @return  self
     */ 
    public function setCasasDecimais($casasDecimais)
    {
        $this->casasDecimais = $casasDecimais;

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
     * Get the value of obsPreco
     */ 
    public function getObsPreco()
    {
        return $this->obsPreco;
    }

    /**
     * Set the value of obsPreco
     *
     * @return  self
     */ 
    public function setObsPreco($obsPreco)
    {
        $this->obsPreco = $obsPreco;

        return $this;
    }

    /**
     * Get the value of idBombaBico
     */ 
    public function getIdBombaBico()
    {
        return $this->idBombaBico;
    }

    /**
     * Set the value of idBombaBico
     *
     * @return  self
     */ 
    public function setIdBombaBico($idBombaBico)
    {
        $this->idBombaBico = $idBombaBico;

        return $this;
    }

    /**
     * Get the value of idImportacao
     */ 
    public function getIdImportacao()
    {
        return $this->idImportacao;
    }

    /**
     * Set the value of idImportacao
     *
     * @return  self
     */ 
    public function setIdImportacao($idImportacao)
    {
        $this->idImportacao = $idImportacao;

        return $this;
    }

    /**
     * Get the value of dataAlteracao
     */ 
    public function getDataAlteracao()
    {
        return $this->dataAlteracao;
    }

    /**
     * Set the value of dataAlteracao
     *
     * @return  self
     */ 
    public function setDataAlteracao($dataAlteracao)
    {
        $this->dataAlteracao = $dataAlteracao;

        return $this;
    }

    /**
     * Get the value of percDifUf
     */ 
    public function getPercDifUf()
    {
        return $this->percDifUf;
    }

    /**
     * Set the value of percDifUf
     *
     * @return  self
     */ 
    public function setPercDifUf($percDifUf)
    {
        $this->percDifUf = $percDifUf;

        return $this;
    }

    /**
     * Get the value of qtdUnidade
     */ 
    public function getQtdUnidade()
    {
        return $this->qtdUnidade;
    }

    /**
     * Set the value of qtdUnidade
     *
     * @return  self
     */ 
    public function setQtdUnidade($qtdUnidade)
    {
        $this->qtdUnidade = $qtdUnidade;

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
     * Get the value of codigoAnp
     */ 
    public function getCodigoAnp()
    {
        return $this->codigoAnp;
    }

    /**
     * Set the value of codigoAnp
     *
     * @return  self
     */ 
    public function setCodigoAnp($codigoAnp)
    {
        $this->codigoAnp = $codigoAnp;

        return $this;
    }

    /**
     * Get the value of envProd
     */ 
    public function getEnvProd()
    {
        return $this->envProd;
    }

    /**
     * Set the value of envProd
     *
     * @return  self
     */ 
    public function setEnvProd($envProd)
    {
        $this->envProd = $envProd;

        return $this;
    }

    /**
     * Get the value of pesoLiquido
     */ 
    public function getPesoLiquido()
    {
        return $this->pesoLiquido;
    }

    /**
     * Set the value of pesoLiquido
     *
     * @return  self
     */ 
    public function setPesoLiquido($pesoLiquido)
    {
        $this->pesoLiquido = $pesoLiquido;

        return $this;
    }

    /**
     * Get the value of estoqueLojavirtual
     */ 
    public function getEstoqueLojavirtual()
    {
        return $this->estoqueLojavirtual;
    }

    /**
     * Set the value of estoqueLojavirtual
     *
     * @return  self
     */ 
    public function setEstoqueLojavirtual($estoqueLojavirtual)
    {
        $this->estoqueLojavirtual = $estoqueLojavirtual;

        return $this;
    }

    /**
     * Get the value of deletar
     */ 
    public function getDeletar()
    {
        return $this->deletar;
    }

    /**
     * Set the value of deletar
     *
     * @return  self
     */ 
    public function setDeletar($deletar)
    {
        $this->deletar = $deletar;

        return $this;
    }

    /**
     * Get the value of comissaoValor
     */ 
    public function getComissaoValor()
    {
        return $this->comissaoValor;
    }

    /**
     * Set the value of comissaoValor
     *
     * @return  self
     */ 
    public function setComissaoValor($comissaoValor)
    {
        $this->comissaoValor = $comissaoValor;

        return $this;
    }

    /**
     * Get the value of numParcelas
     */ 
    public function getNumParcelas()
    {
        return $this->numParcelas;
    }

    /**
     * Set the value of numParcelas
     *
     * @return  self
     */ 
    public function setNumParcelas($numParcelas)
    {
        $this->numParcelas = $numParcelas;

        return $this;
    }

    /**
     * Get the value of dataSincronismo
     */ 
    public function getDataSincronismo()
    {
        return $this->dataSincronismo;
    }

    /**
     * Set the value of dataSincronismo
     *
     * @return  self
     */ 
    public function setDataSincronismo($dataSincronismo)
    {
        $this->dataSincronismo = $dataSincronismo;

        return $this;
    }

    /**
     * Get the value of idOff
     */ 
    public function getIdOff()
    {
        return $this->idOff;
    }

    /**
     * Set the value of idOff
     *
     * @return  self
     */ 
    public function setIdOff($idOff)
    {
        $this->idOff = $idOff;

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
     * Get the value of glp
     */ 
    public function getGlp()
    {
        return $this->glp;
    }

    /**
     * Set the value of glp
     *
     * @return  self
     */ 
    public function setGlp($glp)
    {
        $this->glp = $glp;

        return $this;
    }

    /**
     * Get the value of exibirGrafico
     */ 
    public function getExibirGrafico()
    {
        return $this->exibirGrafico;
    }

    /**
     * Set the value of exibirGrafico
     *
     * @return  self
     */ 
    public function setExibirGrafico($exibirGrafico)
    {
        $this->exibirGrafico = $exibirGrafico;

        return $this;
    }

    /**
     * Get the value of idIbptax
     */ 
    public function getIdIbptax()
    {
        return $this->idIbptax;
    }

    /**
     * Set the value of idIbptax
     *
     * @return  self
     */ 
    public function setIdIbptax($idIbptax)
    {
        $this->idIbptax = $idIbptax;

        return $this;
    }
}
