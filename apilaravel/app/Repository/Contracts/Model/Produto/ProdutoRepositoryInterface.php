<?php

namespace App\Repository\Contracts\Model\Produto;

use App\DTO\ProdutoDTO;
use App\DTO\Produtos\PesquisaProdutoPorNomeDTO;
use App\Repository\Contracts\RepositoryInterface;

/**
 * @author Tiago Franco
 * Interface basica referente a abstração
 * do padrao repository de consultas
 */
interface ProdutoRepositoryInterface extends RepositoryInterface
{
    public function getVendasConcluidasProduto(string $codigoBarra);
    public function pesquisaKitsCombo(string $termoPesquisa);
    public function pesquisaDetalhada(string $termoPesquisa);
    public function pesquisaPorNome(PesquisaProdutoPorNomeDTO $pesquisaProdutoPorNomeDTO);
    public function pesquisaProdutoPorClassificacao(string $classificaco);
    public function pesquisaProdutoPorIdInterna(string $idInterna);
    public function getProdutoGorjeta();
    public function getProdutosGradesDaCategoria(int $idCategoria);
    public function getProdutosDeComandas(array $categorias = array(), ProdutoDTO $produtoDTO);
    public function getProdutosSincronizar();
    public function getProdutoECategoria(int $idProduto);
}
