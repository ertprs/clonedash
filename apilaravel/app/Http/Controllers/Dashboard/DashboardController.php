<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\Contracts\Model\Cliente\ClienteRepositoryInterface;
use App\Repository\Contracts\Model\Venda\VendaItemRepositoryInterface;

class DashboardController extends Controller
{
    
    public function totalVendasNoDia(VendaItemRepositoryInterface $vendaItemRepository){
        return $this->send($vendaItemRepository->getTotalVendaDiaCadastro());
    }

    public function totalItensVendidosNoDia(VendaItemRepositoryInterface $vendaItemRepository){
        return $this->send($vendaItemRepository->getTotalItensVendidosDiaCadastro());
    }

    public function topProdutoVendidosMes(VendaItemRepositoryInterface $vendaItemRepository){
        return $this->send($vendaItemRepository->getTopProdutosVendidosMes(5));
    }

    public function totalCadastrosDoDia(ClienteRepositoryInterface $clienteRepository){
        return $this->send($clienteRepository->getClientesCadastrosNoDia());
    }
}
