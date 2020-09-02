<?php

namespace App\Services\Produtos;

use App\DTO\ProdutoDTO;
use App\DTO\Produtos\PesquisaProdutoPorNomeDTO;
use App\Repository\Contracts\Model\Produto\ClassificacaoRepositoryInterface;
use App\Repository\Contracts\Model\Produto\ProdutoRepositoryInterface;

/**
 * @author Tiago Franco
 * Servico para pesquisa de dados
 * relacionados aos produtos
 */
class PesquisaProdutosService
{
    /**
     * @var ProdutoRepositoryInterface
     */
    private $_produtoRepository;

    /**
     * @var ClassificacaoRepositoryInterface
     */
    private $_classificacaoRepository;

    public function __construct(
        ClassificacaoRepositoryInterface $classificacaoRepository,
        ProdutoRepositoryInterface $produtoRepository
    ) {
        $this->_classificacaoRepository = $classificacaoRepository;
        $this->_produtoRepository       = $produtoRepository;
    }

    public function getProdutosDeComadas(ProdutoDTO $produtoDTO)
    {
        $categorias = $this->_classificacaoRepository->listarCategorias();

        if (empty($categorias)) {
            return [];
        }

        return  $this->_produtoRepository->getProdutosDeComandas($categorias, $produtoDTO);
    }

    public function pesquisaProdutoKitCombo(string $termoPesquisa)
    {
        return $this->_produtoRepository->pesquisaKitsCombo($termoPesquisa);
    }

    public function pesquisaDetalhada(string $termoPesquisa)
    {
        return $this->_produtoRepository->pesquisaDetalhada($termoPesquisa);
    }

    public function pesquisaByName(PesquisaProdutoPorNomeDTO $dto)
    {
        return $this->_produtoRepository->pesquisaPorNome($dto);
    }

    public function pesquisaByClassificacao(string $classificacao)
    {
        return $this->_produtoRepository->pesquisaProdutoPorClassificacao($classificacao);
    }

    public function pesquisaByIdInterna(string $idInterna)
    {
        return $this->_produtoRepository->pesquisaProdutoPorIdInterna($idInterna);
    }
}
