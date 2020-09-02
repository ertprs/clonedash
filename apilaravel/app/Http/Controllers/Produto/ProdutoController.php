<?php

namespace App\Http\Controllers\Produto;

use Illuminate\Http\Request;
use App\Model\Produto\Produto;
use App\Http\Controllers\Controller;
use App\DTO\Produtos\PesquisaProdutoPorNomeDTO;
use App\Services\Extensions\RequestBodyConverter;
use App\Services\Produtos\PesquisaProdutosService;

class ProdutoController extends Controller
{
    /**
     * Função retornar o produto e sua categoria
     * 
     * @return Json Retorna todas categorias de produtos.
     */
    public function getProduto(Produto $produto){
        //$produto->classificacao;
        return $this->send($produto);
    }

    /**
     * Função para pesquias de produtos por kit e combos
     * 
     * @return Json Retorna todos os produtos contidos em combos ou kits
     */
    public function pesquisaProdutoKitCombo(string $termoPesquisa, PesquisaProdutosService $pesquisaProdutosService)
    {
        return $this->send($pesquisaProdutosService->pesquisaProdutoKitCombo($termoPesquisa));
    }

    /**
     * Pesquisa de produtos de forma detalhada
     * 
     * @return Json Retorna todos os produtos da esquisa de forma detalhada
     */
    public function pesquisaDetalhada(string $termoPesquisa, PesquisaProdutosService $pesquisaProdutosService)
    {
        return $this->send($pesquisaProdutosService->pesquisaProdutoKitCombo($termoPesquisa));
    }


     /**
     * Pesquisa de produtos pelo nome
     * 
     * @return Json Retorna todos os produtos pelo nome
     */
    public function pesquisaPeloNome(PesquisaProdutosService $pesquisaProdutosService, RequestBodyConverter $requestBodyConverter)
    {
        $dto = $requestBodyConverter->deserializer(new PesquisaProdutoPorNomeDTO());
        return $this->send($pesquisaProdutosService->pesquisaByName($dto));
    }

     /**
     * Pesquisa de produtos pela classfificacao
     * 
     * @return Json Retorna todos os produtos pelo nome
     */
    public function pesquisaPelaClassificacao(string $classificacao, PesquisaProdutosService $pesquisaProdutosService)
    {
        return $this->send($pesquisaProdutosService->pesquisaByClassificacao($classificacao));
    }

     /**
     * Pesquisa de produtos pela identicacao interna
     * 
     * @return Json Retorna todos os produtos pelo nome
     */
    public function pesquisaPelaIdInterna(string $idInterna, PesquisaProdutosService $pesquisaProdutosService)
    {
        return $this->send($pesquisaProdutosService->pesquisaByIdInterna($idInterna));
    }
}
