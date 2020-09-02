<?php

namespace App\Services\Vendas\FinalizarPagamentos;

use App\DTO\Vendas\FinalizarVendas\FormasPagamentos\ContaCorrenteCliente\ItemContaCorrenteClienteDTO;
use App\Services\Vendas\SetupFinalizarVendasService;
use App\Services\Vendas\FinalizarPagamentos\FinalizarFormasPagtosAbstract;

/**
 * @author Tiago Franco
 * Objeto responsavel por finalizar 
 * os pagamentos por parcelas
 */
class FinalizarContaCorrenteCliente extends FinalizarFormasPagtosAbstract
{
    protected function salvarVendaPagamento(SetupFinalizarVendasService $setupFinalizarVendasService, $formaPagamento)
    {

        /**
         * @var ItemContaCorrenteClienteDTO[]
         */
        $parcelas = $formaPagamento->getParcelas();
        $qtde     = count($parcelas);

        for ($i = 0; $i < $qtde; $i++) {
            $parcela = $parcelas[$i];
            $vendaPagamento = [
                "id_venda"           => $setupFinalizarVendasService->getAtributosVenda()["finalizarVendaDTO"]->getIdVenda(),
                "id_forma_pgto"      => $formaPagamento->getIdFormaPagamento(),
                "valor_pgto"         => $parcela->getValor(),
                "vencimento"         => $parcela->getVencimento(),
                "qtd_parcela"        => $qtde,
                "id_cadastro"        => $this->_usuarioLogadoService->getIdCadastroLogado()
            ];

            $this->_vendaPagamentoRepositoryService->create($vendaPagamento);
        }
    }

    protected function salvarContaPagar(SetupFinalizarVendasService $setupFinalizarVendasService, $formaPagamento)
    {
        /**
         * @var ItemChequeDTO[]
         */
        $parcelas = $formaPagamento->getParcelas();
        $qtde    = count($parcelas);

        for ($i = 0; $i < $qtde; $i++) {
            $parcela = $parcelas[$i];
            $contaPagar = [
                "id_cadastro"            => $this->_usuarioLogadoService->getIdCadastroLogado(),
                "id_formapgto"           => $formaPagamento->getIdFormaPagamento(),
                "id_venda"               => $setupFinalizarVendasService->getAtributosVenda()["finalizarVendaDTO"]->getIdVenda(),
                "id_cliente"             => $setupFinalizarVendasService->getAtributosVenda()["finalizarVendaDTO"]->getIdCliente(),
                "id_usuario_cadastro"    => $setupFinalizarVendasService->getAtributosVenda()["finalizarVendaDTO"]->getIdUsuarioFechaVenda(),
                "valor"                  => $parcela->getValor(),
                "informacoes_adicionais" => $setupFinalizarVendasService->getAtributosVenda()["finalizarVendaDTO"]->getObservacao(),
                "qtd_parcela"            => $qtde,
                "parcela"                => sprintf("%s/%s", $i + 1, $qtde)
            ];

            $this->_contasPagarRepositoryService->create($contaPagar);
        }
    }
}
