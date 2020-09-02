<?php

namespace App\Services\Vendas\FinalizarPagamentos;

use App\Services\Auth\UsuarioLogadoService;
use App\Services\Vendas\SetupFinalizarVendasService;
use App\DTO\Vendas\FinalizarVendas\FormasPagamentos\Parcelado\ItemParcelaDTO;
use App\Exceptions\ApiWebControlException;
use App\Services\Repository\Contracts\Model\Venda\VendaRepositoryServiceInterface;
use App\Services\Repository\Contracts\Model\Venda\VendaPagamentoRepositoryServiceInterface;
use App\Services\Repository\Contracts\Model\ContasPagar\ContasPagarRepositoryServiceInterface;
use App\Services\Repository\Contracts\Model\Venda\VendaAdiantamentoRepositoryServiceInterface;
use App\Services\Repository\Contracts\Model\Controle\CadastroControlesRepositoryServiceInterface;
use App\Services\Repository\Contracts\Model\Venda\NotaCreditoHistoricoRepositoryServiceInterface;
use App\Services\Utils\CodesApi;

/**
 * @author Tiago Franco
 * Objeto responsavel por finalizar 
 * os pagamentos por parcelas
 */
class FinalizarCartaoCreditoSorocred extends FinalizarParcelas
{
    /**
     * @var  NotaCreditoHistoricoRepositoryServiceInterface

     */
    private $_notaCreditoHistoricoRepositoryService;

    public function __construct(
        UsuarioLogadoService $usuarioLogadoService,
        VendaRepositoryServiceInterface $vendaRepositoryService,
        VendaAdiantamentoRepositoryServiceInterface $vendaAdiantamentoRepositoryService,
        VendaPagamentoRepositoryServiceInterface $vendaPagamentoRepositoryService,
        ContasPagarRepositoryServiceInterface $contasPagarRepositoryService,
        CadastroControlesRepositoryServiceInterface $cadastroControlesRepositoryService,
        NotaCreditoHistoricoRepositoryServiceInterface $notaCreditoHistoricoRepositoryService
    ) {

        parent::__construct(
            $usuarioLogadoService,
            $vendaRepositoryService,
            $vendaAdiantamentoRepositoryService,
            $vendaPagamentoRepositoryService,
            $contasPagarRepositoryService,
            $cadastroControlesRepositoryService
        );

        $this->_notaCreditoHistoricoRepositoryService = $notaCreditoHistoricoRepositoryService;
    }

    public function finalizarFormaPagamento(SetupFinalizarVendasService $setupFinalizarVendasService, $formaPagamento)
    {
        $this->atualizarNotaCredito($setupFinalizarVendasService, $formaPagamento);
        parent::finalizarFormaPagamento($setupFinalizarVendasService, $formaPagamento);
    }

    /**
     * Função para atualizar uma nota de credito.
     *
     * @param Integer $key tras a key do loop para poder pegar os dados corretos.
     * 
     * @return void
     */
    private function atualizarNotaCredito(SetupFinalizarVendasService $setupFinalizarVendasService, $formaPagamento)
    {
        $troco = $setupFinalizarVendasService->getAtributosVenda()["totalTroco"];

        if ($troco > 0) {
            /**
             * @var ItemParcelaDTO[]
             */
            $parcelas = $formaPagamento->getParcelas();
            $qtde     = count($parcelas);

            try {
                for ($i = 0; $i < $qtde; $i++) {
                    $parcela    = $parcelas[$i];
                    $notaCredito = [
                        "id_cadastro"    => $this->_usuarioLogadoService->getIdCadastroLogado(),
                        "idnota_credito" => $formaPagamento->getIdNota(),
                        "id_venda"       => $setupFinalizarVendasService->getAtributosVenda()["finalizarVendaDTO"]->getIdVenda(),
                        "valor_inicial"  => $parcela->getParcela(),
                        "valor_abatido"  => $setupFinalizarVendasService->getAtributosVenda()["totalVenda"]
                    ];

                    $this->_notaCreditoHistoricoRepositoryService->create($notaCredito);
                }
            } catch (\Throwable $th) {
                if (preg_match("/Cannot add or update a child row/", $th->getMessage())) {
                    throw new ApiWebControlException("Identificador da nota de crédito inválida", CodesApi::PARAMETROINVALIDO);
                }
            }
        }
    }
}
