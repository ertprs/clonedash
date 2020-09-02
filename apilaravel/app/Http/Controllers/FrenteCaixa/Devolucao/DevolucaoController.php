<?php

namespace App\Http\Controllers\FrenteCaixa\Devolucao;

use App\Model\Venda\Venda;
use App\Model\Cliente\Cliente;
use App\Http\Controllers\Controller;
use App\DTO\FrenteCaixa\DevolucaoDTO;
use Symfony\Component\HttpFoundation\Response;
use App\Services\Extensions\RequestBodyConverter;
use App\Services\FrenteCaixa\Devolucoes\DevolucoesService;
use App\Repository\Contracts\Model\Venda\VendaRepositoryInterface;
use App\Repository\Contracts\Model\Produto\ProdutoRepositoryInterface;

class DevolucaoController extends Controller
{
    /**
     * Servivo para busca de pedidos do cliente concluidos para a devolucao
     */
    public function getVendasConcluidasCliente(Cliente $cliente, VendaRepositoryInterface $vendaRepository)
    {
        return $this->send($vendaRepository->getVendasConcluidas($cliente->id));
    }

    /**
     * Servivo para busca de pedidos do cliente por produto
     */
    public function getVendasConcluidasClienteProduto($codigoBarra, ProdutoRepositoryInterface $produtoRepository)
    {
        return $this->send($produtoRepository->getVendasConcluidasProduto($codigoBarra));
    }

    /**
     * Servivo para devolver um produto
     */
    public function devolverProduto(RequestBodyConverter $requestBodyConverter, DevolucoesService $devolucoesService)
    {
        $devolucaoDTO = $requestBodyConverter->deserializer(new DevolucaoDTO());
        return $this->send($devolucoesService->devolverProduto($devolucaoDTO), Response::HTTP_CREATED);
    }

    /**
     * Servivo para retornar os dados necessarios para apresentacao da viw de confirmacao da
     * devolucao
     */
    public function detalharPedido(Venda $venda, DevolucoesService $devolucoesService)
    {
        return $this->send($devolucoesService->getViewDetalhes($venda));
    }

    /**
     * Servivo para finalizar as devolucoes e seus itens da venda
     */
    public function finalizarDevolucao(Venda $venda, DevolucoesService $devolucoesService)
    {
        return $this->send($devolucoesService->finalizarDevolucao($venda), Response::HTTP_CREATED);
    }
}
