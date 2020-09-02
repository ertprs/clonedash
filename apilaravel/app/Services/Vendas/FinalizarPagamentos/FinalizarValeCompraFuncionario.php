<?php

namespace App\Services\Vendas\FinalizarPagamentos;

use App\Services\Vendas\SetupFinalizarVendasService;
use App\Services\Vendas\FinalizarPagamentos\FinalizarFormasPagtosAbstract;
use App\DTO\Vendas\FinalizarVendas\FormasPagamentos\ValeComprasFuncionario\ItemValeComprasFuncionarioDTO;

/**
 * @author Tiago Franco
 * Objeto responsavel por finalizar 
 * os pagamentos por parcelas
 */
class FinalizarValeCompraFuncionario extends FinalizarFormasPagtosAbstract
{
    protected function salvarVendaPagamento(SetupFinalizarVendasService $setupFinalizarVendasService, $formaPagamento)
    {
        /**
         * @var ItemValeComprasFuncionarioDTO[]
         */
        $parcelas = $formaPagamento->getParcelas();
        $qtde     = count($parcelas);

        for ($i = 0; $i < $qtde; $i++) {
            $parcela    = $parcelas[$i];
            $vendaPagamento = [
                "id_venda"      => $setupFinalizarVendasService->getAtributosVenda()["finalizarVendaDTO"]->getIdVenda(),
                "id_forma_pgto" => $formaPagamento->getIdFormaPagamento(),
                "valor_pgto"    => $parcela->getParcela(),
                "qtd_parcela"   => $qtde,
                "parcela"       => sprintf("%s/%s", $i+1, $qtde),
                "id_cadastro"   => $this->_usuarioLogadoService->getIdCadastroLogado()
            ];

            $this->_vendaPagamentoRepositoryService->create($vendaPagamento);
        }
    }

    protected function salvarContaPagar(SetupFinalizarVendasService $setupFinalizarVendasService, $formaPagamento)
    {
        /**
         * @var ItemValeComprasFuncionarioDTO[]
         */
        $parcelas = $formaPagamento->getParcelas();
        $qtde     = count($parcelas);

        for ($i = 0; $i < $qtde; $i++) {
            $parcela    = $parcelas[$i];
            $contaPagar = [
                "id_cadastro"            => $this->_usuarioLogadoService->getIdCadastroLogado(),
                "id_formapgto"           => $formaPagamento->getIdFormaPagamento(),
                "id_venda"               => $setupFinalizarVendasService->getAtributosVenda()["finalizarVendaDTO"]->getIdVenda(),
                "id_cliente"             => $setupFinalizarVendasService->getAtributosVenda()["finalizarVendaDTO"]->getIdCliente(),
                "id_usuario_cadastro"    => $setupFinalizarVendasService->getAtributosVenda()["finalizarVendaDTO"]->getIdUsuarioFechaVenda(),
                "valor"                  => $parcela->getParcela(),
                "data_vencimento"        => $parcela->getVencimento(),                
                "informacoes_adicionais" => $setupFinalizarVendasService->getAtributosVenda()["finalizarVendaDTO"]->getObservacao(),
                "qtd_parcela"            => $qtde,
                "parcela"                => sprintf("%s/%s", $i + 1, $qtde)
            ];

            $this->_contasPagarRepositoryService->create($contaPagar);
        }
    }
}
