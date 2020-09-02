<?php

namespace App\Services\Vendas\FinalizarPagamentos;

use App\Services\Utils\FormasPagamentos;
use App\Services\Vendas\SetupFinalizarVendasService;
use App\Services\Vendas\FinalizarPagamentos\FinalizarFormasPagtosAbstract;
use App\DTO\Vendas\FinalizarVendas\FormasPagamentos\Parcelado\ItemParcelaDTO;

/**
 * @author Tiago Franco
 * Objeto responsavel por finalizar 
 * os pagamentos por parcelas
 */
class FinalizarParcelas extends FinalizarFormasPagtosAbstract
{
    protected function salvarVendaPagamento(SetupFinalizarVendasService $setupFinalizarVendasService, $formaPagamento)
    {
        /**
         * @var ItemParcelaDTO[]
         */
        $parcelas = $formaPagamento->getParcelas();
        $qtde     = count($parcelas);

        for ($i = 0; $i < $qtde; $i++) {
            $parcela = $parcelas[$i];

            $vendaPagamento = [
                "id_venda"           => $setupFinalizarVendasService->getAtributosVenda()["finalizarVendaDTO"]->getIdVenda(),
                "id_forma_pgto"      => $formaPagamento->getIdFormaPagamento(),
                "valor_pgto"         => $parcela->getParcela(),
                "vencimento"         => $parcela->getVencimento(),
                "qtd_parcela"        => $qtde,
                "parcela"            => sprintf("%s/%s", $i + 1, $qtde),
                "cod_aut_cartao"     => $parcela->getCodAutCartao(),
                "id_credenciadora"   => $parcela->getIdCredenciadora(),
                "cnpj_credenciadora" => $parcela->getCnpjCredenciadora(),
                "id_cadastro"        => $this->_usuarioLogadoService->getIdCadastroLogado()
            ];

            $this->_vendaPagamentoRepositoryService->create($vendaPagamento);
        }
    }

    protected function salvarContaPagar(SetupFinalizarVendasService $setupFinalizarVendasService, $formaPagamento)
    {
        /**
         * @var ItemParcelaDTO[]
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

            if (FormasPagamentos::isUsoControle($formaPagamento->getIdFormaPagamento())) {
                $contaPagar["numero_documento"] = $this->getNumeroControle($formaPagamento->getIdFormaPagamento());
                $contaPagar["chave"]            = $formaPagamento->getChavePromissoria();
            } elseif (FormasPagamentos::CREDIARIO_SERVIPA != $formaPagamento->getIdFormaPagamento()) {
                $contaPagar["chave"] = $formaPagamento->getChavePromissoria();
            }
            $this->_contasPagarRepositoryService->create($contaPagar);
        }
    }
}
