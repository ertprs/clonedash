<?php

namespace App\Services\Repository\Eloquent\Model\Produto;

use App\Model\Produto\Produto;
use App\DTO\FrenteCaixa\CadastroProdutoDTO;
use App\DTO\FrenteCaixa\CadastroServicoDTO;
use App\Services\Repository\Eloquent\WebControlEloquentRepositoryService;
use App\Repository\Eloquent\Model\Produto\ProdutoFrenteCaixaEloquentRepository;
use App\Services\Repository\Contracts\Model\Produto\ProdutoFrenteCaixaRepositoryServiceInterface;

/**
 * @author Tiago Franco
 * Servico de acesso ao repositorio de Model
 * Deverá possuir os metodos contendo operacoes de escrita 
 * do modelo implementando a interface do repositorio
 * Repositorio fake para centralizacao das operacoes de produtos na frente de caixa
 */
class ProdutoFrenteCaixaEloquentRepositoryService extends WebControlEloquentRepositoryService implements ProdutoFrenteCaixaRepositoryServiceInterface
{
    public function __construct(Produto $model, ProdutoFrenteCaixaEloquentRepository $repository)
    {
        parent::__construct($model, $repository);
    }

    public function novoProdutoFromFrenteCaixa(CadastroProdutoDTO $cadastroProdutoDTO) 
    {
        $produto                            = new Produto();
        $produto->id_fornecedor             = $cadastroProdutoDTO->getIdFornecedor();
        $produto->id_classificacao          = $cadastroProdutoDTO->getIdClassificacao();
        $produto->id_marca                  = $cadastroProdutoDTO->getIdMarca() ?: null;
        $produto->codigo_barra              = $cadastroProdutoDTO->getCodigoBarra();
        $produto->identificacao_interna     = $cadastroProdutoDTO->getCodigoInterno();
        $produto->descricao                 = $cadastroProdutoDTO->getNome();
        $produto->id_unidade                = $cadastroProdutoDTO->getTipoUnidade();
        $produto->id_unidade_trib           = $cadastroProdutoDTO->getTipoUnidadeTributaria();
        $produto->qtd_minima                = $cadastroProdutoDTO->getEstoqueMinimo();
        $produto->ncm                       = $cadastroProdutoDTO->getNcm();
        $produto->id_ibptax                 = $cadastroProdutoDTO->getIdImpostoNota();
        $produto->cest                      = $cadastroProdutoDTO->getCest();
        $produto->custo                     = $cadastroProdutoDTO->getPrecoCusto();
        $produto->custo_medio_venda         = $cadastroProdutoDTO->getPrecoVenda();
        $produto->custo_medio_venda_prazo   = $cadastroProdutoDTO->getPrecoPrazo();
        $produto->custo_medio_venda_varejo  = $cadastroProdutoDTO->getPrecoVarejo();
        $produto->custo_medio_venda_atacado = $cadastroProdutoDTO->getPrecoAtacado();
        $produto->margem_lucro_tipo         = $cadastroProdutoDTO->getTipoMargemLucro();
        $produto->porcentagem_custo_venda   = $cadastroProdutoDTO->getPercentualMargemLucro();
        $produto->margem_lucro_valor        = $cadastroProdutoDTO->getMargemLucroValor();
        $produto->truncar_vlr_total         = $cadastroProdutoDTO->getTruncarVlrTotal();
        $produto->ecommerce                 = $cadastroProdutoDTO->getEcommerce();
        $produto->fcp                       = $cadastroProdutoDTO->getFcp();
        $produto->estoque_lojavirtual       = $cadastroProdutoDTO->getEstoqueLojaVirtual();
        $produto->id_cadastro               = $this->_usuarioLogadoService->getIdCadastroLogado();
        $produto->id_usuario                = $this->_usuarioLogadoService->getIdUsuarioLogado();

        return $produto;
    }
    
    public function novoServicoFromFrenteCaixa(CadastroServicoDTO $cadastroServicoDTO)
    {
        $produto                          = new Produto();
        $produto->id_fornecedor           = $cadastroServicoDTO->getIdFornecedor();
        $produto->descricao               = $cadastroServicoDTO->getNome();
        $produto->id_classificacao        = $cadastroServicoDTO->getIdClassificacao();
        $produto->custo                   = $cadastroServicoDTO->getPrecoCusto();
        $produto->custo_medio_venda       = $cadastroServicoDTO->getPrecoVenda();
        $produto->margem_lucro_tipo       = $cadastroServicoDTO->getTipoMargemLucro();
        $produto->porcentagem_custo_venda = $cadastroServicoDTO->getPercentualMargemLucro();
        $produto->ativo                   = $cadastroServicoDTO->getAtivo();
        $produto->codigo_barra            = $cadastroServicoDTO->getCodigoBarra();
        $produto->id_unidade              = $cadastroServicoDTO->getTipoUnidade();
        $produto->locacao_quantidade      = $cadastroServicoDTO->getLocacaoQuantidade();
        $produto->ecommerce               = $cadastroServicoDTO->getEcommerce();
        $produto->prod_serv               = $cadastroServicoDTO->getTipoProduto();
        $produto->margem_lucro_valor      = $cadastroServicoDTO->getMargemLucroValor();        
        $produto->id_cadastro             = $this->_usuarioLogadoService->getIdCadastroLogado();
        $produto->id_usuario              = $this->_usuarioLogadoService->getIdUsuarioLogado();
        $produto->save();

        return $produto;
    }
}
