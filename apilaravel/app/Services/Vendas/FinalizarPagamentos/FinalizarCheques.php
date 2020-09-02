<?php

namespace App\Services\Vendas\FinalizarPagamentos;

use App\Services\Vendas\SetupFinalizarVendasService;
use App\DTO\Vendas\FinalizarVendas\FormasPagamentos\Cheque\ItemChequeDTO;

/**
 * @author Tiago Franco
 * Objeto responsavel por finalizar 
 * os pagamentos por cheques
 */
class FinalizarCheques extends FinalizarFormasPagtosAbstract
{
    protected function salvarVendaPagamento(SetupFinalizarVendasService $setupFinalizarVendasService, $formaPagamento)
    {
        /**
         * @var ItemChequeDTO[]
         */
        $cheques = $formaPagamento->getCheques();
        $qtde    = count($cheques);

        for ($i = 0; $i < $qtde; $i++) {
            $cheque = $cheques[$i];

            $vendaPagamento = [
                "id_venda"      => $setupFinalizarVendasService->getAtributosVenda()["finalizarVendaDTO"]->getIdVenda(),
                "id_forma_pgto" => $formaPagamento->getIdFormaPagamento(),
                "valor_pgto"    => $cheque->getValor(),
                "doc_cheque"    => sprintf("%s/%s", $i + 1, $qtde),
                "cmc7"          => $cheque->getCmc7(),
                "vencimento"    => $cheque->getVencimento(),
                "qtd_parcela"   => $qtde,
                "parcela"       => sprintf("%s/%s", $i + 1, $qtde),
                "id_cadastro"   => $this->_usuarioLogadoService->getIdCadastroLogado()
            ];

            $this->_vendaPagamentoRepositoryService->create($vendaPagamento);
        }
    }

    protected function salvarContaPagar(SetupFinalizarVendasService $setupFinalizarVendasService, $formaPagamento)
    {
        /**
         * @var ItemChequeDTO[]
         */
        $cheques = $formaPagamento->getCheques();
        $qtde    = count($cheques);

        for ($i = 0; $i < $qtde; $i++) {
            $cheque = $cheques[$i];
            $contaPagar = [
                "id_cadastro"            => $this->_usuarioLogadoService->getIdCadastroLogado(),
                "id_formapgto"           => $formaPagamento->getIdFormaPagamento(),
                "id_venda"               => $setupFinalizarVendasService->getAtributosVenda()["finalizarVendaDTO"]->getIdVenda(),
                "id_cliente"             => $setupFinalizarVendasService->getAtributosVenda()["finalizarVendaDTO"]->getIdCliente(),
                "id_usuario_cadastro"    => $setupFinalizarVendasService->getAtributosVenda()["finalizarVendaDTO"]->getIdUsuarioFechaVenda(),
                "valor"                  => $cheque->getValor(),
                "informacoes_adicionais" => $setupFinalizarVendasService->getAtributosVenda()["finalizarVendaDTO"]->getObservacao(),
                "qtd_parcela"            => $qtde,
                "parcela"                => sprintf("%s/%s", $i + 1, $qtde)
            ];

            $this->_contasPagarRepositoryService->create($contaPagar);
        }
    }
}
