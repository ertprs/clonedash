<?php

namespace App\DTO;

use JMS\Serializer\Annotation as JMS;
use App\Services\Extensions\RequestBodyConverterInterface;

/**
 * @author Tiago Franco
 * Servico para
 * @JMS\AccessType("public_method")
 * @JMS\AccessType("public_method")
 */
class VendaItemDTO implements RequestBodyConverterInterface
{

  /**
   * @JMS\SerializedName("id")
   * @JMS\Type("integer")
   * 
   * id
   * var integer
   */
  private $id;
  /**
   * @JMS\SerializedName("qtd")
   * @JMS\Type("string")
   * 
   * qtd
   * var string
   */
  private $qtd;
  /**
   * @JMS\SerializedName("id_venda")
   * @JMS\Type("integer")
   * 
   * id_venda
   * var integer
   */
  private $idVenda;
  /**
   * @JMS\SerializedName("id_produto")
   * @JMS\Type("integer")
   * 
   * id_produto
   * var integer
   */
  private $idProduto;
  /**
   * @JMS\SerializedName("nome_produto")
   * @JMS\Type("string")
   * 
   * nome_produto
   * var string
   */
  private $nomeProduto;
  /**
   * @JMS\SerializedName("preco_tabela")
   * @JMS\Type("float")
   * 
   * preco_tabela
   * var string
   */
  private $precoTabela;
  /**
   * @JMS\SerializedName("nome_classificacao")
   * @JMS\Type("string")
   * 
   * nome_classificacao
   * var string
   */
  private $nomeClassificacao;
  /**
   * @JMS\SerializedName("codigo_barra")
   * @JMS\Type("string")
   * 
   * codigo_barra
   * var string
   */
  private $codigoBarra;
  /**
   * @JMS\SerializedName("preco_venda")
   * @JMS\Type("string")
   * 
   * preco_venda
   * var string
   */
  private $precoVenda;
  /**
   * @JMS\SerializedName("id_autoriza_desconto")
   * @JMS\Type("integer")
   * 
   * id_autoriza_desconto
   * var integer
   */
  private $idAutorizaDesconto;
  /**
   * @JMS\SerializedName("id_autoriza_cancelamento")
   * @JMS\Type("integer")
   * 
   * id_autoriza_cancelamento
   * var integer
   */
  private $idAutorizaCancelamento;
  /**
   * @JMS\SerializedName("id_unidade")
   * @JMS\Type("integer")
   * 
   * id_unidade
   * var integer
   */
  private $idUnidade;
  /**
   * @JMS\SerializedName("estornado")
   * @JMS\Type("string")
   * 
   * estornado
   * var string
   */
  private $estornado;
  /**
   * @JMS\SerializedName("data_hora_estorno")
   * @JMS\Type("string")
   * 
   * data_hora_estorno
   * var string
   */
  private $dataHoraEstorno;
  /**
   * @JMS\SerializedName("desconto")
   * @JMS\Type("string")
   * 
   * desconto
   * var string
   */
  private $desconto;
  /**
   * @JMS\SerializedName("cfop")
   * @JMS\Type("string")
   * 
   * cfop
   * var string
   */
  private $cfop;
  /**
   * @JMS\SerializedName("percentual_desconto")
   * @JMS\Type("float")
   * 
   * percentual_desconto
   * var float
   */
  private $percentualDesconto;
  /**
   * @JMS\SerializedName("valor_preco_custo")
   * @JMS\Type("float")
   * 
   * valor_preco_custo
   * var float
   */
  private $valorPrecoCusto;
  /**
   * @JMS\SerializedName("seq_ecf")
   * @JMS\Type("string")
   * 
   * seq_ecf
   * var string
   */
  private $seqEcf;
  /**
   * @JMS\SerializedName("observacoes_cozinha")
   * @JMS\Type("string")
   * 
   * observacoes_cozinha
   * var string
   */
  private $observacoesCozinha;
  /**
   * @JMS\SerializedName("id_grade")
   * @JMS\Type("integer")
   * 
   * id_grade
   * var integer
   */
  private $idGrade;
  /**
   * @JMS\SerializedName("id_promocao")
   * @JMS\Type("integer")
   * 
   * id_promocao
   * var integer
   */
  private $idPromocao;
  /**
   * @JMS\SerializedName("id_kit")
   * @JMS\Type("integer")
   * 
   * id_kit
   * var integer
   */
  private $idKit;
  /**
   * @JMS\SerializedName("informacoes_item")
   * @JMS\Type("string")
   * 
   * informacoes_item
   * var string
   */
  private $informacoesItem;
  /**
   * @JMS\SerializedName("atacado_varejo")
   * @JMS\Type("string")
   * 
   * atacado_varejo
   * var string
   */
  private $atacadoVarejo;
  /**
   * @JMS\SerializedName("data_alteracao")
   * @JMS\Type("string")
   * 
   * data_alteracao
   * var string
   */
  private $dataAlteracao;
  /**
   * @JMS\SerializedName("data_sincronismo")
   * @JMS\Type("string")
   * 
   * data_sincronismo
   * var string
   */
  private $dataSincronismo;
  /**
   * @JMS\SerializedName("id_off")
   * @JMS\Type("integer")
   * 
   * id_off
   * var integer
   */
  private $idOff;
  /**
   * @JMS\SerializedName("id_cadastro")
   * @JMS\Type("integer")
   * 
   * id_cadastro
   * var integer
   */
  private $idCadastro;
  /**
   * @JMS\SerializedName("xped")
   * @JMS\Type("string")
   * 
   * xped
   * var string
   */
  private $xped;


  /**
   * Get the value of xped
   */
  public function getXped()
  {
    return $this->xped;
  }

  /**
   * Set the value of xped
   *
   * @return  self
   */
  public function setXped($xped)
  {
    $this->xped = $xped;

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
   * Get the value of precoTabela
   */
  public function getPrecoTabela()
  {
    return $this->precoTabela;
  }

  /**
   * Set the value of precoTabela
   *
   * @return  self
   */
  public function setPrecoTabela($precoTabela)
  {
    $this->precoTabela = $precoTabela;

    return $this;
  }

  /**
   * Get the value of nomeClassificacao
   */
  public function getNomeClassificacao()
  {
    return $this->nomeClassificacao;
  }

  /**
   * Set the value of nomeClassificacao
   *
   * @return  self
   */
  public function setNomeClassificacao($nomeClassificacao)
  {
    $this->nomeClassificacao = $nomeClassificacao;

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
   * Get the value of idAutorizaDesconto
   */
  public function getIdAutorizaDesconto()
  {
    return $this->idAutorizaDesconto;
  }

  /**
   * Set the value of idAutorizaDesconto
   *
   * @return  self
   */
  public function setIdAutorizaDesconto($idAutorizaDesconto)
  {
    $this->idAutorizaDesconto = $idAutorizaDesconto;

    return $this;
  }

  /**
   * Get the value of idAutorizaCancelamento
   */
  public function getIdAutorizaCancelamento()
  {
    return $this->idAutorizaCancelamento;
  }

  /**
   * Set the value of idAutorizaCancelamento
   *
   * @return  self
   */
  public function setIdAutorizaCancelamento($idAutorizaCancelamento)
  {
    $this->idAutorizaCancelamento = $idAutorizaCancelamento;

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
   * Get the value of estornado
   */
  public function getEstornado()
  {
    return $this->estornado;
  }

  /**
   * Set the value of estornado
   *
   * @return  self
   */
  public function setEstornado($estornado)
  {
    $this->estornado = $estornado;

    return $this;
  }

  /**
   * Get the value of dataHoraEstorno
   */
  public function getDataHoraEstorno()
  {
    return $this->dataHoraEstorno;
  }

  /**
   * Set the value of dataHoraEstorno
   *
   * @return  self
   */
  public function setDataHoraEstorno($dataHoraEstorno)
  {
    $this->dataHoraEstorno = $dataHoraEstorno;

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
   * Get the value of cfop
   */
  public function getCfop()
  {
    return $this->cfop;
  }

  /**
   * Set the value of cfop
   *
   * @return  self
   */
  public function setCfop($cfop)
  {
    $this->cfop = $cfop;

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
   * Get the value of seqEcf
   */
  public function getSeqEcf()
  {
    return $this->seqEcf;
  }

  /**
   * Set the value of seqEcf
   *
   * @return  self
   */
  public function setSeqEcf($seqEcf)
  {
    $this->seqEcf = $seqEcf;

    return $this;
  }

  /**
   * Get the value of observacoesCozinha
   */
  public function getObservacoesCozinha()
  {
    return $this->observacoesCozinha;
  }

  /**
   * Set the value of observacoesCozinha
   *
   * @return  self
   */
  public function setObservacoesCozinha($observacoesCozinha)
  {
    $this->observacoesCozinha = $observacoesCozinha;

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
   * Get the value of informacoesItem
   */
  public function getInformacoesItem()
  {
    return $this->informacoesItem;
  }

  /**
   * Set the value of informacoesItem
   *
   * @return  self
   */
  public function setInformacoesItem($informacoesItem)
  {
    $this->informacoesItem = $informacoesItem;

    return $this;
  }

  /**
   * Get the value of atacadoVarejo
   */
  public function getAtacadoVarejo()
  {
    return $this->atacadoVarejo;
  }

  /**
   * Set the value of atacadoVarejo
   *
   * @return  self
   */
  public function setAtacadoVarejo($atacadoVarejo)
  {
    $this->atacadoVarejo = $atacadoVarejo;

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
}
