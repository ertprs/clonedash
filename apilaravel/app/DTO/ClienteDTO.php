<?php

namespace App\DTO;

use App\Services\Utils\Estados;
use JMS\Serializer\Annotation as JMS;
use App\Exceptions\ApiWebControlException;
use App\Services\Extensions\RequestBodyConverterInterface;
use App\Services\Utils\CodesApi;

/**
 * @author Tiago Franco
 * POJO para manipulação dos dados dos clientes
 * @JMS\AccessType("public_method")
 */
class ClienteDTO implements RequestBodyConverterInterface
{
    /**
     * @JMS\SerializedName("id")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $id;
    /**
     * @JMS\SerializedName("id_cadastro")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $idCadastro;
    /**
     * @JMS\SerializedName("tipo_pessoa")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $tipoPessoa;
    /**
     * @JMS\SerializedName("cnpj_cpf")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $cnpjCpf;
    /**
     * @JMS\SerializedName("rg")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $rg;
    /**
     * @JMS\SerializedName("inscricao_municipal")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $inscricaoMunicipal;
    /**
     * @JMS\SerializedName("inscricao_estadual")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $inscricaoEstadual;
    /**
     * @JMS\SerializedName("inscricao_suframa")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $inscricaoSuframa;
    /**
     * @JMS\SerializedName("nome")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $nome;
    /**
     * @JMS\SerializedName("razao_social")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $razaoSocial;
    /**
     * @JMS\SerializedName("id_tipo_log")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $idTipoLog;
    /**
     * @JMS\SerializedName("endereco")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $endereco;
    /**
     * @JMS\SerializedName("numero")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $numero;
    /**
     * @JMS\SerializedName("complemento")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $complemento;
    /**
     * @JMS\SerializedName("bairro")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $bairro;
    /**
     * @JMS\SerializedName("cidade")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $cidade;
    /**
     * @JMS\SerializedName("uf")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $uf;
    /**
     * @JMS\SerializedName("cep")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $cep;
    /**
     * @JMS\SerializedName("pais")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $pais;
    /**
     * @JMS\SerializedName("informacoes_adicionais")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $informacoesAdicionais;
    /**
     * @JMS\SerializedName("data_cadastro")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $dataCadastro;
    /**
     * @JMS\SerializedName("email")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $email;
    /**
     * @JMS\SerializedName("telefone")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $telefone;
    /**
     * @JMS\SerializedName("celular")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $celular;
    /**
     * @JMS\SerializedName("fax")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $fax;
    /**
     * @JMS\SerializedName("ativo")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $ativo;
    /**
     * @JMS\SerializedName("renda_media")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $rendaMedia;
    /**
     * @JMS\SerializedName("empresa_trabalha")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $empresaTrabalha;
    /**
     * @JMS\SerializedName("cargo")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $cargo;
    /**
     * @JMS\SerializedName("fone_empresa")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $foneEmpresa;
    /**
     * @JMS\SerializedName("endereco_empresa")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $enderecoEmpresa;
    /**
     * @JMS\SerializedName("nome_referencia_comercial")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $nomeReferenciaComercial;
    /**
     * @JMS\SerializedName("referencia_comercial")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $referenciaComercial;
    /**
     * @JMS\SerializedName("nome_referencia")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $nomeReferencia;
    /**
     * @JMS\SerializedName("referencia_pessoal")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $referenciaPessoal;
    /**
     * @JMS\SerializedName("data_nascimento")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $dataNascimento;
    /**
     * @JMS\SerializedName("nome_pai")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $nomePai;
    /**
     * @JMS\SerializedName("nome_mae")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $nomeMae;
    /**
     * @JMS\SerializedName("numero_titulo")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $numeroTitulo;
    /**
     * @JMS\SerializedName("zona")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $zona;
    /**
     * @JMS\SerializedName("secao")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $secao;
    /**
     * @JMS\SerializedName("placa")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $placa;
    /**
     * @JMS\SerializedName("fone_pai")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $fonePai;
    /**
     * @JMS\SerializedName("fone_mae")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $foneMae;
    /**
     * @JMS\SerializedName("socio1")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $socio1;
    /**
     * @JMS\SerializedName("socio2")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $socio2;
    /**
     * @JMS\SerializedName("fone_socio1")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $foneSocio1;
    /**
     * @JMS\SerializedName("fone_socio2")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $foneSocio2;
    /**
     * @JMS\SerializedName("id_usuario")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $idUsuario;
    /**
     * @JMS\SerializedName("senha_ecommerce")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $senhaEcommerce;
    /**
     * @JMS\SerializedName("isento_icms")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $isentoIcms;
    /**
     * @JMS\SerializedName("sincronizado")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $sincronizado;
    /**
     * @JMS\SerializedName("obs")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $obs;
    /**
     * @JMS\SerializedName("tabela_preco")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $tabelaPreco;
    /**
     * @JMS\SerializedName("estado_civil")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $estadoCivil;
    /**
     * @JMS\SerializedName("nome_conjuge")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $nomeConjuge;
    /**
     * @JMS\SerializedName("tipo_residencia")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $tipoResidencia;
    /**
     * @JMS\SerializedName("foto")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $foto;
    /**
     * @JMS\SerializedName("orgao_expedidor")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $orgaoExpedidor;
    /**
     * @JMS\SerializedName("naturalidade")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $naturalidade;
    /**
     * @JMS\SerializedName("id_importacao")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $idImportacao;
    /**
     * @JMS\SerializedName("id_funcionario")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $idFuncionario;
    /**
     * @JMS\SerializedName("limite_credito")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $limiteCredito;
    /**
     * @JMS\SerializedName("limite_credito_cc")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $limiteCreditoCc;
    /**
     * @JMS\SerializedName("tipo_compra")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $tipoCompra;
    /**
     * @JMS\SerializedName("origem_cadastro")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $origemCadastro;
    /**
     * @JMS\SerializedName("data_cadastro_user")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $dataCadastroUser;
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
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $idOff;
    /**
     * @JMS\SerializedName("substituto_tributario")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $substitutoTributario;
    /**
     * @JMS\SerializedName("senha")
     * @JMS\Type("string")
     * 
     * qtd
     * var string
     */
    private $senha;

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
     * Get the value of tipoPessoa
     */
    public function getTipoPessoa()
    {
        return $this->tipoPessoa;
    }

    /**
     * Set the value of tipoPessoa
     *
     * @return  self
     */
    public function setTipoPessoa($tipoPessoa)
    {
        if (!in_array($tipoPessoa, ['F', 'J', 'B', 'E', ''])) {
            throw new ApiWebControlException("tipo_pessoa inválido", CodesApi::PARAMETROINVALIDO);
        }
        $this->tipoPessoa = $tipoPessoa;

        return $this;
    }

    /**
     * Get the value of cnpjCpf
     */
    public function getCnpjCpf()
    {
        return $this->cnpjCpf;
    }

    /**
     * Set the value of cnpjCpf
     *
     * @return  self
     */
    public function setCnpjCpf($cnpjCpf)
    {
        if ($this->tipoPessoa == "J")
            $this->cnpjCpf = str_pad(preg_replace("/\D+/", "", $cnpjCpf), 14, '0', STR_PAD_LEFT);
        else
            $this->cnpjCpf = str_pad(preg_replace("/\D+/", "", $cnpjCpf), 11, '0', STR_PAD_LEFT);

        return $this;
    }

    /**
     * Get the value of rg
     */
    public function getRg()
    {
        return $this->rg;
    }

    /**
     * Set the value of rg
     *
     * @return  self
     */
    public function setRg($rg)
    {
        $this->rg = str_pad(preg_replace("/\D+/", "", $rg), 9, '0', STR_PAD_LEFT);

        return $this;
    }

    /**
     * Get the value of inscricaoMunicipal
     */
    public function getInscricaoMunicipal()
    {
        return $this->inscricaoMunicipal;
    }

    /**
     * Set the value of inscricaoMunicipal
     *
     * @return  self
     */
    public function setInscricaoMunicipal($inscricaoMunicipal)
    {
        $this->inscricaoMunicipal = $inscricaoMunicipal;

        return $this;
    }

    /**
     * Get the value of inscricaoEstadual
     */
    public function getInscricaoEstadual()
    {
        return $this->inscricaoEstadual;
    }

    /**
     * Set the value of inscricaoEstadual
     *
     * @return  self
     */
    public function setInscricaoEstadual($inscricaoEstadual)
    {
        $this->inscricaoEstadual = $inscricaoEstadual;

        return $this;
    }

    /**
     * Get the value of inscricaoSuframa
     */
    public function getInscricaoSuframa()
    {
        return $this->inscricaoSuframa;
    }

    /**
     * Set the value of inscricaoSuframa
     *
     * @return  self
     */
    public function setInscricaoSuframa($inscricaoSuframa)
    {
        $this->inscricaoSuframa = $inscricaoSuframa;

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
     * Get the value of razaoSocial
     */
    public function getRazaoSocial()
    {
        return $this->razaoSocial;
    }

    /**
     * Set the value of razaoSocial
     *
     * @return  self
     */
    public function setRazaoSocial($razaoSocial)
    {
        $this->razaoSocial = $razaoSocial;

        return $this;
    }

    /**
     * Get the value of idTipoLog
     */
    public function getIdTipoLog()
    {
        return $this->idTipoLog;
    }

    /**
     * Set the value of idTipoLog
     *
     * @return  self
     */
    public function setIdTipoLog($idTipoLog)
    {
        $this->idTipoLog = $idTipoLog;

        return $this;
    }

    /**
     * Get the value of endereco
     */
    public function getEndereco()
    {
        return $this->endereco;
    }

    /**
     * Set the value of endereco
     *
     * @return  self
     */
    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;

        return $this;
    }

    /**
     * Get the value of numero
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set the value of numero
     *
     * @return  self
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get the value of complemento
     */
    public function getComplemento()
    {
        return $this->complemento;
    }

    /**
     * Set the value of complemento
     *
     * @return  self
     */
    public function setComplemento($complemento)
    {
        $this->complemento = $complemento;

        return $this;
    }

    /**
     * Get the value of bairro
     */
    public function getBairro()
    {
        return $this->bairro;
    }

    /**
     * Set the value of bairro
     *
     * @return  self
     */
    public function setBairro($bairro)
    {
        $this->bairro = $bairro;

        return $this;
    }

    /**
     * Get the value of cidade
     */
    public function getCidade()
    {
        return $this->cidade;
    }

    /**
     * Set the value of cidade
     *
     * @return  self
     */
    public function setCidade($cidade)
    {
        $this->cidade = $cidade;

        return $this;
    }

    /**
     * Get the value of uf
     */
    public function getUf()
    {
        return $this->uf;
    }

    /**
     * Set the value of uf
     *
     * @return  self
     */
    public function setUf($uf)
    {
        $uf = strtoupper($uf);
        Estados::validarSigla($uf);
        $this->uf = $uf;

        return $this;
    }

    /**
     * Get the value of cep
     */
    public function getCep()
    {
        return $this->cep;
    }

    /**
     * Set the value of cep
     *
     * @return  self
     */
    public function setCep($cep)
    {
        $this->cep = str_pad(preg_replace("/\D+/", "", $cep), 8, '0', STR_PAD_LEFT);

        return $this;
    }

    /**
     * Get the value of pais
     */
    public function getPais()
    {
        return $this->pais;
    }

    /**
     * Set the value of pais
     *
     * @return  self
     */
    public function setPais($pais)
    {
        $this->pais = $pais;

        return $this;
    }

    /**
     * Get the value of informacoesAdicionais
     */
    public function getInformacoesAdicionais()
    {
        return $this->informacoesAdicionais;
    }

    /**
     * Set the value of informacoesAdicionais
     *
     * @return  self
     */
    public function setInformacoesAdicionais($informacoesAdicionais)
    {
        $this->informacoesAdicionais = $informacoesAdicionais;

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
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setEmail($email)
    {
        if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new ApiWebControlException("email inválido", CodesApi::PARAMETROINVALIDO);
        }

        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of telefone
     */
    public function getTelefone()
    {
        return $this->telefone;
    }

    /**
     * Set the value of telefone
     *
     * @return  self
     */
    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;

        return $this;
    }

    /**
     * Get the value of celular
     */
    public function getCelular()
    {
        return $this->celular;
    }

    /**
     * Set the value of celular
     *
     * @return  self
     */
    public function setCelular($celular)
    {
        $this->celular = $celular;

        return $this;
    }

    /**
     * Get the value of fax
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * Set the value of fax
     *
     * @return  self
     */
    public function setFax($fax)
    {
        $this->fax = $fax;

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
        if (!in_array($ativo, ['A', 'I', 'E',''])) {
            throw new ApiWebControlException("ativo inválido", CodesApi::PARAMETROINVALIDO);
        }
        $this->ativo = $ativo;

        return $this;
    }

    /**
     * Get the value of rendaMedia
     */
    public function getRendaMedia()
    {
        return $this->rendaMedia;
    }

    /**
     * Set the value of rendaMedia
     *
     * @return  self
     */
    public function setRendaMedia($rendaMedia)
    {
        $this->rendaMedia = $rendaMedia;

        return $this;
    }

    /**
     * Get the value of empresaTrabalha
     */
    public function getEmpresaTrabalha()
    {
        return $this->empresaTrabalha;
    }

    /**
     * Set the value of empresaTrabalha
     *
     * @return  self
     */
    public function setEmpresaTrabalha($empresaTrabalha)
    {
        $this->empresaTrabalha = $empresaTrabalha;

        return $this;
    }

    /**
     * Get the value of cargo
     */
    public function getCargo()
    {
        return $this->cargo;
    }

    /**
     * Set the value of cargo
     *
     * @return  self
     */
    public function setCargo($cargo)
    {
        $this->cargo = $cargo;

        return $this;
    }

    /**
     * Get the value of foneEmpresa
     */
    public function getFoneEmpresa()
    {
        return $this->foneEmpresa;
    }

    /**
     * Set the value of foneEmpresa
     *
     * @return  self
     */
    public function setFoneEmpresa($foneEmpresa)
    {
        $this->foneEmpresa = $foneEmpresa;

        return $this;
    }

    /**
     * Get the value of enderecoEmpresa
     */
    public function getEnderecoEmpresa()
    {
        return $this->enderecoEmpresa;
    }

    /**
     * Set the value of enderecoEmpresa
     *
     * @return  self
     */
    public function setEnderecoEmpresa($enderecoEmpresa)
    {
        if ($this->tipoPessoa == 'J')
            $this->enderecoEmpresa = sprintf("%s,%s,%s", $this->endereco, $this->numero, $this->complemento);
        else
            $this->enderecoEmpresa = $enderecoEmpresa;

        return $this;
    }

    /**
     * Get the value of nomeReferenciaComercial
     */
    public function getNomeReferenciaComercial()
    {
        return $this->nomeReferenciaComercial;
    }

    /**
     * Set the value of nomeReferenciaComercial
     *
     * @return  self
     */
    public function setNomeReferenciaComercial($nomeReferenciaComercial)
    {
        $this->nomeReferenciaComercial = $nomeReferenciaComercial;

        return $this;
    }

    /**
     * Get the value of referenciaComercial
     */
    public function getReferenciaComercial()
    {
        return $this->referenciaComercial;
    }

    /**
     * Set the value of referenciaComercial
     *
     * @return  self
     */
    public function setReferenciaComercial($referenciaComercial)
    {
        $this->referenciaComercial = $referenciaComercial;

        return $this;
    }

    /**
     * Get the value of nomeReferencia
     */
    public function getNomeReferencia()
    {
        return $this->nomeReferencia;
    }

    /**
     * Set the value of nomeReferencia
     *
     * @return  self
     */
    public function setNomeReferencia($nomeReferencia)
    {
        $this->nomeReferencia = $nomeReferencia;

        return $this;
    }

    /**
     * Get the value of referenciaPessoal
     */
    public function getReferenciaPessoal()
    {
        return $this->referenciaPessoal;
    }

    /**
     * Set the value of referenciaPessoal
     *
     * @return  self
     */
    public function setReferenciaPessoal($referenciaPessoal)
    {
        $this->referenciaPessoal = $referenciaPessoal;

        return $this;
    }

    /**
     * Get the value of dataNascimento
     */
    public function getDataNascimento()
    {
        return $this->dataNascimento;
    }

    /**
     * Set the value of dataNascimento
     *
     * @return  self
     */
    public function setDataNascimento($dataNascimento)
    {
        $this->dataNascimento = $dataNascimento;

        return $this;
    }

    /**
     * Get the value of nomePai
     */
    public function getNomePai()
    {
        return $this->nomePai;
    }

    /**
     * Set the value of nomePai
     *
     * @return  self
     */
    public function setNomePai($nomePai)
    {
        $this->nomePai = $nomePai;

        return $this;
    }

    /**
     * Get the value of nomeMae
     */
    public function getNomeMae()
    {
        return $this->nomeMae;
    }

    /**
     * Set the value of nomeMae
     *
     * @return  self
     */
    public function setNomeMae($nomeMae)
    {
        $this->nomeMae = $nomeMae;

        return $this;
    }

    /**
     * Get the value of numeroTitulo
     */
    public function getNumeroTitulo()
    {
        return $this->numeroTitulo;
    }

    /**
     * Set the value of numeroTitulo
     *
     * @return  self
     */
    public function setNumeroTitulo($numeroTitulo)
    {
        $this->numeroTitulo = $numeroTitulo;

        return $this;
    }

    /**
     * Get the value of zona
     */
    public function getZona()
    {
        return $this->zona;
    }

    /**
     * Set the value of zona
     *
     * @return  self
     */
    public function setZona($zona)
    {
        $this->zona = $zona;

        return $this;
    }

    /**
     * Get the value of secao
     */
    public function getSecao()
    {
        return $this->secao;
    }

    /**
     * Set the value of secao
     *
     * @return  self
     */
    public function setSecao($secao)
    {
        $this->secao = $secao;

        return $this;
    }

    /**
     * Get the value of placa
     */
    public function getPlaca()
    {
        return $this->placa;
    }

    /**
     * Set the value of placa
     *
     * @return  self
     */
    public function setPlaca($placa)
    {
        $this->placa = $placa;

        return $this;
    }

    /**
     * Get the value of fonePai
     */
    public function getFonePai()
    {
        return $this->fonePai;
    }

    /**
     * Set the value of fonePai
     *
     * @return  self
     */
    public function setFonePai($fonePai)
    {
        $this->fonePai = $fonePai;

        return $this;
    }

    /**
     * Get the value of foneMae
     */
    public function getFoneMae()
    {
        return $this->foneMae;
    }

    /**
     * Set the value of foneMae
     *
     * @return  self
     */
    public function setFoneMae($foneMae)
    {
        $this->foneMae = $foneMae;

        return $this;
    }

    /**
     * Get the value of socio1
     */
    public function getSocio1()
    {
        return $this->socio1;
    }

    /**
     * Set the value of socio1
     *
     * @return  self
     */
    public function setSocio1($socio1)
    {
        $this->socio1 = $socio1;

        return $this;
    }

    /**
     * Get the value of socio2
     */
    public function getSocio2()
    {
        return $this->socio2;
    }

    /**
     * Set the value of socio2
     *
     * @return  self
     */
    public function setSocio2($socio2)
    {
        $this->socio2 = $socio2;

        return $this;
    }

    /**
     * Get the value of foneSocio1
     */
    public function getFoneSocio1()
    {
        return $this->foneSocio1;
    }

    /**
     * Set the value of foneSocio1
     *
     * @return  self
     */
    public function setFoneSocio1($foneSocio1)
    {
        $this->foneSocio1 = $foneSocio1;

        return $this;
    }

    /**
     * Get the value of foneSocio2
     */
    public function getFoneSocio2()
    {
        return $this->foneSocio2;
    }

    /**
     * Set the value of foneSocio2
     *
     * @return  self
     */
    public function setFoneSocio2($foneSocio2)
    {
        $this->foneSocio2 = $foneSocio2;

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
     * Get the value of senhaEcommerce
     */
    public function getSenhaEcommerce()
    {
        return $this->senhaEcommerce;
    }

    /**
     * Set the value of senhaEcommerce
     *
     * @return  self
     */
    public function setSenhaEcommerce($senhaEcommerce)
    {
        $this->senhaEcommerce = $senhaEcommerce;

        return $this;
    }

    /**
     * Get the value of isentoIcms
     */
    public function getIsentoIcms()
    {
        return $this->isentoIcms;
    }

    /**
     * Set the value of isentoIcms
     *
     * @return  self
     */
    public function setIsentoIcms($isentoIcms)
    {
        if (!in_array($isentoIcms, ['S', 'N'])) {
            throw new ApiWebControlException("isento_icms inválido", CodesApi::PARAMETROINVALIDO);
        }
        $this->isentoIcms = $isentoIcms;

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
     * Get the value of obs
     */
    public function getObs()
    {
        return $this->obs;
    }

    /**
     * Set the value of obs
     *
     * @return  self
     */
    public function setObs($obs)
    {
        $this->obs = $obs;

        return $this;
    }

    /**
     * Get the value of tabelaPreco
     */
    public function getTabelaPreco()
    {
        return $this->tabelaPreco;
    }

    /**
     * Set the value of tabelaPreco
     *
     * @return  self
     */
    public function setTabelaPreco($tabelaPreco)
    {
        $this->tabelaPreco = $tabelaPreco;

        return $this;
    }

    /**
     * Get the value of estadoCivil
     */
    public function getEstadoCivil()
    {
        return $this->estadoCivil;
    }

    /**
     * Set the value of estadoCivil
     *
     * @return  self
     */
    public function setEstadoCivil($estadoCivil)
    {
        $this->estadoCivil = $estadoCivil;

        return $this;
    }

    /**
     * Get the value of nomeConjuge
     */
    public function getNomeConjuge()
    {
        return $this->nomeConjuge;
    }

    /**
     * Set the value of nomeConjuge
     *
     * @return  self
     */
    public function setNomeConjuge($nomeConjuge)
    {
        $this->nomeConjuge = $nomeConjuge;

        return $this;
    }

    /**
     * Get the value of tipoResidencia
     */
    public function getTipoResidencia()
    {
        return $this->tipoResidencia;
    }

    /**
     * Set the value of tipoResidencia
     *
     * @return  self
     */
    public function setTipoResidencia($tipoResidencia)
    {
        $this->tipoResidencia = $tipoResidencia;

        return $this;
    }

    /**
     * Get the value of foto
     */
    public function getFoto()
    {
        return $this->foto;
    }

    /**
     * Set the value of foto
     *
     * @return  self
     */
    public function setFoto($foto)
    {
        $this->foto = $foto;

        return $this;
    }

    /**
     * Get the value of orgaoExpedidor
     */
    public function getOrgaoExpedidor()
    {
        return $this->orgaoExpedidor;
    }

    /**
     * Set the value of orgaoExpedidor
     *
     * @return  self
     */
    public function setOrgaoExpedidor($orgaoExpedidor)
    {
        $this->orgaoExpedidor = $orgaoExpedidor;

        return $this;
    }

    /**
     * Get the value of naturalidade
     */
    public function getNaturalidade()
    {
        return $this->naturalidade;
    }

    /**
     * Set the value of naturalidade
     *
     * @return  self
     */
    public function setNaturalidade($naturalidade)
    {
        $this->naturalidade = $naturalidade;

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
     * Get the value of limiteCredito
     */
    public function getLimiteCredito()
    {
        return $this->limiteCredito;
    }

    /**
     * Set the value of limiteCredito
     *
     * @return  self
     */
    public function setLimiteCredito($limiteCredito)
    {
        $this->limiteCredito = $limiteCredito;

        return $this;
    }

    /**
     * Get the value of limiteCreditoCc
     */
    public function getLimiteCreditoCc()
    {
        return $this->limiteCreditoCc;
    }

    /**
     * Set the value of limiteCreditoCc
     *
     * @return  self
     */
    public function setLimiteCreditoCc($limiteCreditoCc)
    {
        $this->limiteCreditoCc = $limiteCreditoCc;

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
     * Get the value of origemCadastro
     */
    public function getOrigemCadastro()
    {
        return $this->origemCadastro;
    }

    /**
     * Set the value of origemCadastro
     *
     * @return  self
     */
    public function setOrigemCadastro($origemCadastro)
    {
        $this->origemCadastro = $origemCadastro;

        return $this;
    }

    /**
     * Get the value of dataCadastroUser
     */
    public function getDataCadastroUser()
    {
        return $this->dataCadastroUser;
    }

    /**
     * Set the value of dataCadastroUser
     *
     * @return  self
     */
    public function setDataCadastroUser($dataCadastroUser)
    {
        $this->dataCadastroUser = $dataCadastroUser;

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
     * Get the value of substitutoTributario
     */
    public function getSubstitutoTributario()
    {
        return $this->substitutoTributario;
    }

    /**
     * Set the value of substitutoTributario
     *
     * @return  self
     */
    public function setSubstitutoTributario($substitutoTributario)
    {
        $this->substitutoTributario = $substitutoTributario;

        return $this;
    }

    /**
     * Get the value of senha
     */
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * Set the value of senha
     *
     * @return  self
     */
    public function setSenha($senha)
    {
        $this->senha = $senha;

        return $this;
    }
}
