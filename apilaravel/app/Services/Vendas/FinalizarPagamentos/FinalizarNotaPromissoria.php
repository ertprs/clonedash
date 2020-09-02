<?php

namespace App\Services\Vendas\FinalizarPagamentos;

use App\Services\Vendas\SetupFinalizarVendasService;
use App\Services\Vendas\FinalizarPagamentos\FinalizarFormasPagtosAbstract;
use App\DTO\Vendas\FinalizarVendas\FormasPagamentos\JurosMora\ItemJurosMoraDTO;

/**
 * @author Tiago Franco
 * Objeto responsavel por finalizar 
 * os pagamentos por paracelas
 */
class FinalizarNotaPromissoria extends FinalizarFormasPagtosAbstract
{
    protected function salvarVendaPagamento(SetupFinalizarVendasService $setupFinalizarVendasService, $formaPagamento)
    {
        /**
         * @var ItemJurosMoraDTO[]
         */
        $paracelas = $formaPagamento->getParcelas();
        $qtde      = count($paracelas);

        for ($i = 0; $i < $qtde; $i++) {
            $paracela = $paracelas[$i];

            $vendaPagamento = [
                "id_venda"      => $setupFinalizarVendasService->getAtributosVenda()["finalizarVendaDTO"]->getIdVenda(),
                "id_forma_pgto" => $formaPagamento->getIdFormaPagamento(),
                "valor_pgto"    => $paracela->getParcela(),
                "vencimento"    => $paracela->getVencimento(),
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
         * @var ItemJurosMoraDTO[]
         */
        $paracelas = $formaPagamento->getParcelas();
        $qtde      = count($paracelas);

        for ($i = 0; $i < $qtde; $i++) {
            $paracela = $paracelas[$i];
            $contaPagar = [
                "id_cadastro"            => $this->_usuarioLogadoService->getIdCadastroLogado(),
                "id_formapgto"           => $formaPagamento->getIdFormaPagamento(),
                "id_venda"               => $setupFinalizarVendasService->getAtributosVenda()["finalizarVendaDTO"]->getIdVenda(),
                "id_cliente"             => $setupFinalizarVendasService->getAtributosVenda()["finalizarVendaDTO"]->getIdCliente(),
                "id_usuario_cadastro"    => $setupFinalizarVendasService->getAtributosVenda()["finalizarVendaDTO"]->getIdUsuarioFechaVenda(),
                "valor"                  => $paracela->getParcela(),
                "informacoes_adicionais" => $setupFinalizarVendasService->getAtributosVenda()["finalizarVendaDTO"]->getObservacao(),
                "chave"                  => $formaPagamento->getChavePromissoria(),
                "juros_parcelamento"     => $formaPagamento->getJuros(),
                "multa_atraso"           => $paracela->getMulta(),
                "numero_documento"       => $this->getNumeroControle($formaPagamento->getIdFormaPagamento()),
                "qtd_parcela"            => $qtde,
                "parcela"                => sprintf("%s/%s", $i + 1, $qtde),
            ];

            $this->_contasPagarRepositoryService->create($contaPagar);
        }
    }
}
