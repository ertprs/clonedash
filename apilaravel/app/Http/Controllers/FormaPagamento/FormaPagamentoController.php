<?php

namespace App\Http\Controllers\FormaPagamento;

use App\Http\Controllers\Controller;
use App\Repository\Contracts\Model\FormaPagamento\ClienteFormaPagamentoRepositoryInterface;
use App\Repository\Contracts\Model\FormaPagamento\FormaPagamentoRepositoryInterface;

class FormaPagamentoController extends Controller
{
    public function getFormaPagamentoCliente(ClienteFormaPagamentoRepositoryInterface $clienteFormaPagamentoRepository)
    {
        return $this->send($clienteFormaPagamentoRepository->retornaFormasPagamentosCadastro());
    }

    public function getFormaPagamentos(FormaPagamentoRepositoryInterface $formaPagamentoRepository)
    {
        return $this->send($formaPagamentoRepository->retornaFormasPagamentos());
    }
}
