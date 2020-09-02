<?php

namespace App\Services\Vendas\FinalizarPagamentos;

use App\Services\Vendas\SetupFinalizarVendasService;
use App\Services\Vendas\FinalizarPagamentos\FinalizarFormasPagtosAbstract;

/**
 * @author Tiago Franco
 * Objeto responsavel por finalizar 
 * os pagamentos por parcelas
 */
class FinalizarDebitos extends FinalizarFormasPagtosAbstract
{
    protected function salvarVendaPagamento(SetupFinalizarVendasService $setupFinalizarVendasService, $formaPagamento)
    {
        $vendaPagamento = [
            "id_venda"      => $setupFinalizarVendasService->getAtributosVenda()["finalizarVendaDTO"]->getIdVenda(),
            "id_forma_pgto" => $formaPagamento->getIdFormaPagamento(),
            "valor_pgto"    => $formaPagamento->getTotalPgto(),
            "qtd_parcela"   => 1,
            "id_cadastro"   => $this->_usuarioLogadoService->getIdCadastroLogado()
        ];
        $this->_vendaPagamentoRepositoryService->create($vendaPagamento);
    }

    protected function salvarContaPagar(SetupFinalizarVendasService $setupFinalizarVendasService, $formaPagamento)
    {
        #pg do tipo debito nao gera contas a pagar
        return;
    }
}
