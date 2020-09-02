<?php

namespace App\Services\Vendas\FinalizarPagamentos;

use App\Services\Vendas\SetupFinalizarVendasService;
use App\Services\Vendas\FinalizarPagamentos\FinalizarFormasPagtosAbstract;
use App\DTO\Vendas\FinalizarVendas\FormasPagamentos\ValePresente\ItemValePresenteDTO;

/**
 * @author Tiago Franco
 * Objeto responsavel por finalizar 
 * os pagamentos por pagamentos
 */
class FinalizarValePresentes extends FinalizarFormasPagtosAbstract
{
    protected function salvarVendaPagamento(SetupFinalizarVendasService $setupFinalizarVendasService, $formaPagamento)
    {
        /**
         * @var ItemValePresenteDTO[]
         */
        $pagamentos = $formaPagamento->getPagamentos();
        $qtde       = count($pagamentos);

        for ($i = 0; $i < $qtde; $i++) {
            $pagamento    = $pagamentos[$i];
            $vendaPagamento = [
                "id_venda"      => $setupFinalizarVendasService->getAtributosVenda()["finalizarVendaDTO"]->getIdVenda(),
                "id_forma_pgto" => $formaPagamento->getIdFormaPagamento(),
                "valor_pgto"    => $pagamento->getValor(),
                "qtd_pagamento" => $qtde,
                "parcela"       => sprintf("%s/%s", $i + 1, $qtde),
                "id_cadastro"   => $this->_usuarioLogadoService->getIdCadastroLogado()
            ];

            $this->_vendaPagamentoRepositoryService->create($vendaPagamento);
        }
    }

    protected function salvarContaPagar(SetupFinalizarVendasService $setupFinalizarVendasService, $formaPagamento)
    {
        return; #nao gera conta a pagar
    }
}
