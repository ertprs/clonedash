<?php

namespace App\Http\Controllers\FrenteCaixa\Cliente;

use App\Model\Cliente\Cliente;
use App\Http\Controllers\Controller;
use App\Services\FrenteCaixa\Clientes\ClientesService;
use App\Repository\Contracts\Model\Cliente\ClienteFrenteCaixaRepositoryInterface;

class ClienteController extends Controller
{
    /**
     * Servico para busca dos clientes para selecao nao tela de frente de caixa
     */
    public function buscarClientes(string $termoPesquisa, ClienteFrenteCaixaRepositoryInterface $clienteFrenteCaixaRepository){
        return $this->send($clienteFrenteCaixaRepository->getClientesPreVenda($termoPesquisa));
    }

    /**
     * Servico para buscar informacoes de qrde de 
     * inadimplencia do cliente selecionado na frente de caixa
     */
    public function buscarQtdeInadimplencia(Cliente $cliente, ClientesService $clientesService){
        return $this->send($clientesService->getInadimplencia($cliente->id));
    }
}
