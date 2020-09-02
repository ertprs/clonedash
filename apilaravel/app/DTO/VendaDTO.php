<?php

namespace App\DTO;

use App\Services\Utils\CodesApi;
use JMS\Serializer\Annotation as JMS;
use App\Exceptions\ApiWebControlException;
use App\Services\Extensions\RequestBodyConverterInterface;

/**
 * @author Tiago Franco
 * DTO para dados de entradas das vendas
 * @JMS\AccessType("public_method")
 */
class VendaDTO implements RequestBodyConverterInterface
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
     * @JMS\SerializedName("id_tipo_venda")
     * @JMS\Type("integer")
     * 
     * qtd
     * var integer
     */
    private $idTipoVenda;
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
     * @JMS\SerializedName("id_usuario_fecha_venda")
     * @JMS\Type("integer")
     * 
     * qtd
     * var integer
     */
    private $idUsuarioFechaVenda;
    /**
     * @JMS\SerializedName("id_usuario_orcamento")
     * @JMS\Type("integer")
     * 
     * qtd
     * var integer
     */
    private $idUsuarioOrcamento;
    /**
     * @JMS\SerializedName("id_usuario_extorno")
     * @JMS\Type("integer")
     * 
     * qtd
     * var integer
     */
    private $idUsuarioExtorno;
    /**
     * @JMS\SerializedName("id_usuario_autoriza_desconto")
     * @JMS\Type("integer")
     * 
     * qtd
     * var integer
     */
    private $idUsuarioAutorizaDesconto;
    /**
     * @JMS\SerializedName("id_usuario_exclusao")
     * @JMS\Type("integer")
     * 
     * qtd
     * var integer
     */
    private $idUsuarioExclusao;
    /**
     * @JMS\SerializedName("id_funcionario")
     * @JMS\Type("integer")
     * 
     * qtd
     * var integer
     */
    private $idFuncionario;
    /**
     * @JMS\SerializedName("id_cliente")
     * @JMS\Type("integer")
     * 
     * qtd
     * var integer
     */
    private $idCliente;
    /**
     * @JMS\SerializedName("id_venda_local")
     * @JMS\Type("integer")
     * 
     * qtd
     * var integer
     */
    private $idVendaLocal;
    /**
     * @JMS\SerializedName("id_forma_pagamento")
     * @JMS\Type("integer")
     * 
     * qtd
     * var integer
     */
    private $idFormaPagamento;
    /**
     * @JMS\SerializedName("id_parcela")
     * @JMS\Type("integer")
     * 
     * qtd
     * var integer
     */
    private $idParcela;
    /**
     * @JMS\SerializedName("id_nota_devolucao")
     * @JMS\Type("integer")
     * 
     * qtd
     * var integer
     */
    private $idNotaDevolucao;
    /**
     * @JMS\SerializedName("data_venda")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $dataVenda;
    /**
     * @JMS\SerializedName("hora_venda")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $horaVenda;
    /**
     * @JMS\SerializedName("situacao")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $situacao;
    /**
     * @JMS\SerializedName("tipo_pgto")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $tipoPgto;
    /**
     * @JMS\SerializedName("sessao_venda")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $sessaoVenda;
    /**
     * @JMS\SerializedName("data_orcamento")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $dataOrcamento;
    /**
     * @JMS\SerializedName("hora_orcamento")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $horaOrcamento;
    /**
     * @JMS\SerializedName("orcamento")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $orcamento;
    /**
     * @JMS\SerializedName("data_validade")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $dataValidade;
    /**
     * @JMS\SerializedName("data_hora_extorno")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $dataHoraExtorno;
    /**
     * @JMS\SerializedName("descricao_extorno")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $descricaoExtorno;
    /**
     * @JMS\SerializedName("descricao_venda")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $descricaoVenda;
    /**
     * @JMS\SerializedName("a_vista")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $aVista;
    /**
     * @JMS\SerializedName("origem_venda")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $origemVenda;
    /**
     * @JMS\SerializedName("pago")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $pago;
    /**
     * @JMS\SerializedName("valor_final_desconto")
     * @JMS\Type("float")
     * 
     * qtd
     * var float
     */
    private $valorFinalDesconto;
    /**
     * @JMS\SerializedName("nfe_status")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $nfeStatus;
    /**
     * @JMS\SerializedName("troco")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $troco;
    /**
     * @JMS\SerializedName("tp_nf")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $tpNf;
    /**
     * @JMS\SerializedName("ambiente_nf")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $ambienteNf;
    /**
     * @JMS\SerializedName("observacao")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $observacao;
    /**
     * @JMS\SerializedName("data_previsao_entrega")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $dataPrevisaoEntrega;
    /**
     * @JMS\SerializedName("hora_precisao_entrega")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $horaPrecisaoEntrega;
    /**
     * @JMS\SerializedName("prazo_devolucao")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $prazoDevolucao;
    /**
     * @JMS\SerializedName("valor_multa_diaria")
     * @JMS\Type("float")
     * 
     * qtd
     * var float
     */
    private $valorMultaDiaria;
    /**
     * @JMS\SerializedName("valor_comissao_percentual")
     * @JMS\Type("float")
     * 
     * qtd
     * var float
     */
    private $valorComissaoPercentual;
    /**
     * @JMS\SerializedName("valor_comissao_em_reais")
     * @JMS\Type("float")
     * 
     * qtd
     * var float
     */
    private $valorComissaoEmReais;
    /**
     * @JMS\SerializedName("qtd_garantia")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $qtdGarantia;
    /**
     * @JMS\SerializedName("tp_garantia")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $tpGarantia;
    /**
     * @JMS\SerializedName("numero_nota_sefaz")
     * @JMS\Type("integer")
     * 
     * qtd
     * var integer
     */
    private $numeroNotaSefaz;
    /**
     * @JMS\SerializedName("id_comanda")
     * @JMS\Type("integer")
     * 
     * qtd
     * var integer
     */
    private $idComanda;
    /**
     * @JMS\SerializedName("id_abertura_caixa")
     * @JMS\Type("integer")
     * 
     * qtd
     * var integer
     */
    private $idAberturaCaixa;
    /**
     * @JMS\SerializedName("data_excluido")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $dataExcluido;
    /**
     * @JMS\SerializedName("id_comandas_agrupadas")
     * @JMS\Type("integer")
     * 
     * qtd
     * var integer
     */
    private $idComandasAgrupadas;
    /**
     * @JMS\SerializedName("id_venda_destino")
     * @JMS\Type("integer")
     * 
     * qtd
     * var integer
     */
    private $idVendaDestino;
    /**
     * @JMS\SerializedName("valor_entrada")
     * @JMS\Type("float")
     * 
     * qtd
     * var float
     */
    private $valorEntrada;
    /**
     * @JMS\SerializedName("id_cupom_venda")
     * @JMS\Type("integer")
     * 
     * qtd
     * var integer
     */
    private $idCupomVenda;
    /**
     * @JMS\SerializedName("id_objeto_cliente")
     * @JMS\Type("integer")
     * 
     * qtd
     * var integer
     */
    private $idObjetoCliente;
    /**
     * @JMS\SerializedName("data_alteracao")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $dataAlteracao;
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
     * @JMS\SerializedName("id_local")
     * @JMS\Type("integer")
     * 
     * qtd
     * var integer
     */
    private $idLocal;
    /**
     * @JMS\SerializedName("situacao_anterior")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $situacaoAnterior;
    /**
     * @JMS\SerializedName("id_placa")
     * @JMS\Type("integer")
     * 
     * qtd
     * var integer
     */
    private $idPlaca;

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
     * Get the value of idTipoVenda
     */
    public function getIdTipoVenda()
    {
        return $this->idTipoVenda;
    }

    /**
     * Set the value of idTipoVenda
     *
     * @return  self
     */
    public function setIdTipoVenda($idTipoVenda)
    {
        $this->idTipoVenda = $idTipoVenda;

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
     * Get the value of idUsuarioFechaVenda
     */
    public function getIdUsuarioFechaVenda()
    {
        return $this->idUsuarioFechaVenda;
    }

    /**
     * Set the value of idUsuarioFechaVenda
     *
     * @return  self
     */
    public function setIdUsuarioFechaVenda($idUsuarioFechaVenda)
    {
        $this->idUsuarioFechaVenda = $idUsuarioFechaVenda;

        return $this;
    }

    /**
     * Get the value of idUsuarioOrcamento
     */
    public function getIdUsuarioOrcamento()
    {
        return $this->idUsuarioOrcamento;
    }

    /**
     * Set the value of idUsuarioOrcamento
     *
     * @return  self
     */
    public function setIdUsuarioOrcamento($idUsuarioOrcamento)
    {
        $this->idUsuarioOrcamento = $idUsuarioOrcamento;

        return $this;
    }

    /**
     * Get the value of idUsuarioExtorno
     */
    public function getIdUsuarioExtorno()
    {
        return $this->idUsuarioExtorno;
    }

    /**
     * Set the value of idUsuarioExtorno
     *
     * @return  self
     */
    public function setIdUsuarioExtorno($idUsuarioExtorno)
    {
        $this->idUsuarioExtorno = $idUsuarioExtorno;

        return $this;
    }

    /**
     * Get the value of idUsuarioAutorizaDesconto
     */
    public function getIdUsuarioAutorizaDesconto()
    {
        return $this->idUsuarioAutorizaDesconto;
    }

    /**
     * Set the value of idUsuarioAutorizaDesconto
     *
     * @return  self
     */
    public function setIdUsuarioAutorizaDesconto($idUsuarioAutorizaDesconto)
    {
        $this->idUsuarioAutorizaDesconto = $idUsuarioAutorizaDesconto;

        return $this;
    }

    /**
     * Get the value of idUsuarioExclusao
     */
    public function getIdUsuarioExclusao()
    {
        return $this->idUsuarioExclusao;
    }

    /**
     * Set the value of idUsuarioExclusao
     *
     * @return  self
     */
    public function setIdUsuarioExclusao($idUsuarioExclusao)
    {
        $this->idUsuarioExclusao = $idUsuarioExclusao;

        return $this;
    }

    /**
     * Get the value of idFuncionario
     */
    public function getIdFuncionario()
    {
        return $this->idFuncionario;
    }

    /**
     * Set the value of idFuncionario
     *
     * @return  self
     */
    public function setIdFuncionario($idFuncionario)
    {
        $this->idFuncionario = $idFuncionario;

        return $this;
    }

    /**
     * Get the value of idCliente
     */
    public function getIdCliente()
    {
        return $this->idCliente;
    }

    /**
     * Set the value of idCliente
     *
     * @return  self
     */
    public function setIdCliente($idCliente)
    {
        $this->idCliente = $idCliente;

        return $this;
    }

    /**
     * Get the value of idVendaLocal
     */
    public function getIdVendaLocal()
    {
        return $this->idVendaLocal;
    }

    /**
     * Set the value of idVendaLocal
     *
     * @return  self
     */
    public function setIdVendaLocal($idVendaLocal)
    {
        $this->idVendaLocal = $idVendaLocal;

        return $this;
    }

    /**
     * Get the value of idFormaPagamento
     */
    public function getIdFormaPagamento()
    {
        return $this->idFormaPagamento;
    }

    /**
     * Set the value of idFormaPagamento
     *
     * @return  self
     */
    public function setIdFormaPagamento($idFormaPagamento)
    {
        $this->idFormaPagamento = $idFormaPagamento;

        return $this;
    }

    /**
     * Get the value of idParcela
     */
    public function getIdParcela()
    {
        return $this->idParcela;
    }

    /**
     * Set the value of idParcela
     *
     * @return  self
     */
    public function setIdParcela($idParcela)
    {
        $this->idParcela = $idParcela;

        return $this;
    }

    /**
     * Get the value of idNotaDevolucao
     */
    public function getIdNotaDevolucao()
    {
        return $this->idNotaDevolucao;
    }

    /**
     * Set the value of idNotaDevolucao
     *
     * @return  self
     */
    public function setIdNotaDevolucao($idNotaDevolucao)
    {
        $this->idNotaDevolucao = $idNotaDevolucao;

        return $this;
    }

    /**
     * Get the value of dataVenda
     */
    public function getDataVenda()
    {
        return $this->dataVenda;
    }

    /**
     * Set the value of dataVenda
     *
     * @return  self
     */
    public function setDataVenda($dataVenda)
    {
        $this->dataVenda = $dataVenda;

        return $this;
    }

    /**
     * Get the value of horaVenda
     */
    public function getHoraVenda()
    {
        return $this->horaVenda;
    }

    /**
     * Set the value of horaVenda
     *
     * @return  self
     */
    public function setHoraVenda($horaVenda)
    {
        $this->horaVenda = $horaVenda;

        return $this;
    }

    /**
     * Get the value of situacao
     */
    public function getSituacao()
    {
        return $this->situacao;
    }

    /**
     * Set the value of situacao
     *
     * @return  self
     */
    public function setSituacao($situacao)
    {
        if(!in_array($situacao, ['A','C','E','X','Y','I','G','N','F'])) {
            throw new ApiWebControlException("situacao inválida", CodesApi::PARAMETROINVALIDO);
        }

        $this->situacao = $situacao;

        return $this;
    }

    /**
     * Get the value of tipoPgto
     */
    public function getTipoPgto()
    {
        return $this->tipoPgto;
    }

    /**
     * Set the value of tipoPgto
     *
     * @return  self
     */
    public function setTipoPgto($tipoPgto)
    {
        $this->tipoPgto = $tipoPgto;

        return $this;
    }

    /**
     * Get the value of sessaoVenda
     */
    public function getSessaoVenda()
    {
        return $this->sessaoVenda;
    }

    /**
     * Set the value of sessaoVenda
     *
     * @return  self
     */
    public function setSessaoVenda($sessaoVenda)
    {
        $this->sessaoVenda = $sessaoVenda;

        return $this;
    }

    /**
     * Get the value of dataOrcamento
     */
    public function getDataOrcamento()
    {
        return $this->dataOrcamento;
    }

    /**
     * Set the value of dataOrcamento
     *
     * @return  self
     */
    public function setDataOrcamento($dataOrcamento)
    {
        if(!in_array($dataOrcamento, ['S','N'])) {
            throw new ApiWebControlException("orcamento inválido", CodesApi::PARAMETROINVALIDO);
        }
        $this->dataOrcamento = $dataOrcamento;

        return $this;
    }

    /**
     * Get the value of horaOrcamento
     */
    public function getHoraOrcamento()
    {
        return $this->horaOrcamento;
    }

    /**
     * Set the value of horaOrcamento
     *
     * @return  self
     */
    public function setHoraOrcamento($horaOrcamento)
    {
        $this->horaOrcamento = $horaOrcamento;

        return $this;
    }

    /**
     * Get the value of orcamento
     */
    public function getOrcamento()
    {
        return $this->orcamento;
    }

    /**
     * Set the value of orcamento
     *
     * @return  self
     */
    public function setOrcamento($orcamento)
    {
        $this->orcamento = $orcamento;

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
     * Get the value of dataHoraExtorno
     */
    public function getDataHoraExtorno()
    {
        return $this->dataHoraExtorno;
    }

    /**
     * Set the value of dataHoraExtorno
     *
     * @return  self
     */
    public function setDataHoraExtorno($dataHoraExtorno)
    {
        $this->dataHoraExtorno = $dataHoraExtorno;

        return $this;
    }

    /**
     * Get the value of descricaoExtorno
     */
    public function getDescricaoExtorno()
    {
        return $this->descricaoExtorno;
    }

    /**
     * Set the value of descricaoExtorno
     *
     * @return  self
     */
    public function setDescricaoExtorno($descricaoExtorno)
    {
        $this->descricaoExtorno = $descricaoExtorno;

        return $this;
    }

    /**
     * Get the value of descricaoVenda
     */
    public function getDescricaoVenda()
    {
        return $this->descricaoVenda;
    }

    /**
     * Set the value of descricaoVenda
     *
     * @return  self
     */
    public function setDescricaoVenda($descricaoVenda)
    {
        $this->descricaoVenda = $descricaoVenda;

        return $this;
    }

    /**
     * Get the value of aVista
     */
    public function getAVista()
    {
        return $this->aVista;
    }

    /**
     * Set the value of aVista
     *
     * @return  self
     */
    public function setAVista($aVista)
    {
        if(!in_array($aVista, ['P','V'])) {
            throw new ApiWebControlException("a_vista inválido", CodesApi::PARAMETROINVALIDO);
        }
        $this->aVista = $aVista;

        return $this;
    }

    /**
     * Get the value of origemVenda
     */
    public function getOrigemVenda()
    {
        return $this->origemVenda;
    }

    /**
     * Set the value of origemVenda
     *
     * @return  self
     */
    public function setOrigemVenda($origemVenda)
    {
        if(!in_array($aVista, ['W','L','CF','CNF','CAT','OFF'])) {
            throw new ApiWebControlException("origem_venda inválido", CodesApi::PARAMETROINVALIDO);
        }
        $this->origemVenda = $origemVenda;

        return $this;
    }

    /**
     * Get the value of pago
     */
    public function getPago()
    {
        return $this->pago;
    }

    /**
     * Set the value of pago
     *
     * @return  self
     */
    public function setPago($pago)
    {
        if(!in_array($pago, ['S','N'])) {
            throw new ApiWebControlException("pago inválido", CodesApi::PARAMETROINVALIDO);
        }
        $this->pago = $pago;

        return $this;
    }

    /**
     * Get the value of valorFinalDesconto
     */
    public function getValorFinalDesconto()
    {
        return $this->valorFinalDesconto;
    }

    /**
     * Set the value of valorFinalDesconto
     *
     * @return  self
     */
    public function setValorFinalDesconto($valorFinalDesconto)
    {
        $this->valorFinalDesconto = $valorFinalDesconto;

        return $this;
    }

    /**
     * Get the value of nfeStatus
     */
    public function getNfeStatus()
    {
        return $this->nfeStatus;
    }

    /**
     * Set the value of nfeStatus
     *
     * @return  self
     */
    public function setNfeStatus($nfeStatus)
    {
        if(!in_array($nfeStatus, ['0','1','2','3','4','5','6','7','8'])) {
            throw new ApiWebControlException("nfe_status inválido", CodesApi::PARAMETROINVALIDO);
        }
        $this->nfeStatus = $nfeStatus;

        return $this;
    }

    /**
     * Get the value of troco
     */
    public function getTroco()
    {
        return $this->troco;
    }

    /**
     * Set the value of troco
     *
     * @return  self
     */
    public function setTroco($troco)
    {
        $this->troco = $troco;

        return $this;
    }

    /**
     * Get the value of tpNf
     */
    public function getTpNf()
    {
        return $this->tpNf;
    }

    /**
     * Set the value of tpNf
     *
     * @return  self
     */
    public function setTpNf($tpNf)
    {
        if(!in_array($tpNf, ['NFE','NFC'])) {
            throw new ApiWebControlException("tp_nf inválido", CodesApi::PARAMETROINVALIDO);
        }
        $this->tpNf = $tpNf;

        return $this;
    }

    /**
     * Get the value of ambienteNf
     */
    public function getAmbienteNf()
    {
        return $this->ambienteNf;
    }

    /**
     * Set the value of ambienteNf
     *
     * @return  self
     */
    public function setAmbienteNf($ambienteNf)
    {
        $this->ambienteNf = $ambienteNf;

        return $this;
    }

    /**
     * Get the value of observacao
     */
    public function getObservacao()
    {
        return $this->observacao;
    }

    /**
     * Set the value of observacao
     *
     * @return  self
     */
    public function setObservacao($observacao)
    {
        $this->observacao = $observacao;

        return $this;
    }

    /**
     * Get the value of dataPrevisaoEntrega
     */
    public function getDataPrevisaoEntrega()
    {
        return $this->dataPrevisaoEntrega;
    }

    /**
     * Set the value of dataPrevisaoEntrega
     *
     * @return  self
     */
    public function setDataPrevisaoEntrega($dataPrevisaoEntrega)
    {
        $this->dataPrevisaoEntrega = $dataPrevisaoEntrega;

        return $this;
    }

    /**
     * Get the value of horaPrecisaoEntrega
     */
    public function getHoraPrecisaoEntrega()
    {
        return $this->horaPrecisaoEntrega;
    }

    /**
     * Set the value of horaPrecisaoEntrega
     *
     * @return  self
     */
    public function setHoraPrecisaoEntrega($horaPrecisaoEntrega)
    {
        $this->horaPrecisaoEntrega = $horaPrecisaoEntrega;

        return $this;
    }

    /**
     * Get the value of prazoDevolucao
     */
    public function getPrazoDevolucao()
    {
        return $this->prazoDevolucao;
    }

    /**
     * Set the value of prazoDevolucao
     *
     * @return  self
     */
    public function setPrazoDevolucao($prazoDevolucao)
    {
        $this->prazoDevolucao = $prazoDevolucao;

        return $this;
    }

    /**
     * Get the value of valorMultaDiaria
     */
    public function getValorMultaDiaria()
    {
        return $this->valorMultaDiaria;
    }

    /**
     * Set the value of valorMultaDiaria
     *
     * @return  self
     */
    public function setValorMultaDiaria($valorMultaDiaria)
    {
        $this->valorMultaDiaria = $valorMultaDiaria;

        return $this;
    }

    /**
     * Get the value of valorComissaoPercentual
     */
    public function getValorComissaoPercentual()
    {
        return $this->valorComissaoPercentual;
    }

    /**
     * Set the value of valorComissaoPercentual
     *
     * @return  self
     */
    public function setValorComissaoPercentual($valorComissaoPercentual)
    {
        $this->valorComissaoPercentual = $valorComissaoPercentual;

        return $this;
    }

    /**
     * Get the value of valorComissaoEmReais
     */
    public function getValorComissaoEmReais()
    {
        return $this->valorComissaoEmReais;
    }

    /**
     * Set the value of valorComissaoEmReais
     *
     * @return  self
     */
    public function setValorComissaoEmReais($valorComissaoEmReais)
    {
        $this->valorComissaoEmReais = $valorComissaoEmReais;

        return $this;
    }

    /**
     * Get the value of qtdGarantia
     */
    public function getQtdGarantia()
    {
        return $this->qtdGarantia;
    }

    /**
     * Set the value of qtdGarantia
     *
     * @return  self
     */
    public function setQtdGarantia($qtdGarantia)
    {
        $this->qtdGarantia = $qtdGarantia;

        return $this;
    }

    /**
     * Get the value of tpGarantia
     */
    public function getTpGarantia()
    {
        return $this->tpGarantia;
    }

    /**
     * Set the value of tpGarantia
     *
     * @return  self
     */
    public function setTpGarantia($tpGarantia)
    {
        $this->tpGarantia = $tpGarantia;

        return $this;
    }

    /**
     * Get the value of numeroNotaSefaz
     */
    public function getNumeroNotaSefaz()
    {
        return $this->numeroNotaSefaz;
    }

    /**
     * Set the value of numeroNotaSefaz
     *
     * @return  self
     */
    public function setNumeroNotaSefaz($numeroNotaSefaz)
    {
        $this->numeroNotaSefaz = $numeroNotaSefaz;

        return $this;
    }

    /**
     * Get the value of idComanda
     */
    public function getIdComanda()
    {
        return $this->idComanda;
    }

    /**
     * Set the value of idComanda
     *
     * @return  self
     */
    public function setIdComanda($idComanda)
    {
        $this->idComanda = $idComanda;

        return $this;
    }

    /**
     * Get the value of idAberturaCaixa
     */
    public function getIdAberturaCaixa()
    {
        return $this->idAberturaCaixa;
    }

    /**
     * Set the value of idAberturaCaixa
     *
     * @return  self
     */
    public function setIdAberturaCaixa($idAberturaCaixa)
    {
        $this->idAberturaCaixa = $idAberturaCaixa;

        return $this;
    }

    /**
     * Get the value of dataExcluido
     */
    public function getDataExcluido()
    {
        return $this->dataExcluido;
    }

    /**
     * Set the value of dataExcluido
     *
     * @return  self
     */
    public function setDataExcluido($dataExcluido)
    {
        $this->dataExcluido = $dataExcluido;

        return $this;
    }

    /**
     * Get the value of idComandasAgrupadas
     */
    public function getIdComandasAgrupadas()
    {
        return $this->idComandasAgrupadas;
    }

    /**
     * Set the value of idComandasAgrupadas
     *
     * @return  self
     */
    public function setIdComandasAgrupadas($idComandasAgrupadas)
    {
        $this->idComandasAgrupadas = $idComandasAgrupadas;

        return $this;
    }

    /**
     * Get the value of idVendaDestino
     */
    public function getIdVendaDestino()
    {
        return $this->idVendaDestino;
    }

    /**
     * Set the value of idVendaDestino
     *
     * @return  self
     */
    public function setIdVendaDestino($idVendaDestino)
    {
        $this->idVendaDestino = $idVendaDestino;

        return $this;
    }

    /**
     * Get the value of valorEntrada
     */
    public function getValorEntrada()
    {
        return $this->valorEntrada;
    }

    /**
     * Set the value of valorEntrada
     *
     * @return  self
     */
    public function setValorEntrada($valorEntrada)
    {
        $this->valorEntrada = $valorEntrada;

        return $this;
    }

    /**
     * Get the value of idCupomVenda
     */
    public function getIdCupomVenda()
    {
        return $this->idCupomVenda;
    }

    /**
     * Set the value of idCupomVenda
     *
     * @return  self
     */
    public function setIdCupomVenda($idCupomVenda)
    {
        $this->idCupomVenda = $idCupomVenda;

        return $this;
    }

    /**
     * Get the value of idObjetoCliente
     */
    public function getIdObjetoCliente()
    {
        return $this->idObjetoCliente;
    }

    /**
     * Set the value of idObjetoCliente
     *
     * @return  self
     */
    public function setIdObjetoCliente($idObjetoCliente)
    {
        $this->idObjetoCliente = $idObjetoCliente;

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
     * Get the value of idLocal
     */
    public function getIdLocal()
    {
        return $this->idLocal;
    }

    /**
     * Set the value of idLocal
     *
     * @return  self
     */
    public function setIdLocal($idLocal)
    {
        $this->idLocal = $idLocal;

        return $this;
    }

    /**
     * Get the value of situacaoAnterior
     */
    public function getSituacaoAnterior()
    {
        return $this->situacaoAnterior;
    }

    /**
     * Set the value of situacaoAnterior
     *
     * @return  self
     */
    public function setSituacaoAnterior($situacaoAnterior)
    {
        $this->situacaoAnterior = $situacaoAnterior;

        return $this;
    }

    /**
     * Get the value of idPlaca
     */
    public function getIdPlaca()
    {
        return $this->idPlaca;
    }

    /**
     * Set the value of idPlaca
     *
     * @return  self
     */
    public function setIdPlaca($idPlaca)
    {
        $this->idPlaca = $idPlaca;

        return $this;
    }
}
