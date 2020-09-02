<?php

namespace App\Services\Vendas\FinalizarPagamentos;

use Illuminate\Support\Facades\DB;
use App\Services\Auth\UsuarioLogadoService;
use App\Services\Vendas\SetupFinalizarVendasService;
use App\Services\Vendas\FinalizarPagamentos\FinalizarFormasPagtosAbstract;
use App\Services\Repository\Contracts\Model\Venda\VendaRepositoryServiceInterface;
use App\DTO\Vendas\FinalizarVendas\FormasPagamentos\NotaCredito\ItemNotaCreditoDTO;
use App\Services\Repository\Contracts\Model\Venda\NotaCreditoRepositoryServiceInterface;
use App\Services\Repository\Contracts\Model\Venda\VendaPagamentoRepositoryServiceInterface;
use App\Services\Repository\Contracts\Model\ContasPagar\ContasPagarRepositoryServiceInterface;
use App\Services\Repository\Contracts\Model\Venda\VendaAdiantamentoRepositoryServiceInterface;
use App\Services\Repository\Contracts\Model\Controle\CadastroControlesRepositoryServiceInterface;

/**
 * @author Tiago Franco
 * Objeto responsavel por finalizar 
 * os pagamentos por parcelas
 */
class FinalizarNotasCreditos extends FinalizarFormasPagtosAbstract
{
    /**
     * @var  NotaCreditoRepositoryServiceInterface

     */
    private $_notaCreditoRepositoryService;

    public function __construct(
        UsuarioLogadoService $usuarioLogadoService,
        VendaRepositoryServiceInterface $vendaRepositoryService,
        VendaAdiantamentoRepositoryServiceInterface $vendaAdiantamentoRepositoryService,
        VendaPagamentoRepositoryServiceInterface $vendaPagamentoRepositoryService,
        ContasPagarRepositoryServiceInterface $contasPagarRepositoryService,
        CadastroControlesRepositoryServiceInterface $cadastroControlesRepositoryService,
        NotaCreditoRepositoryServiceInterface $notaCreditoRepositoryService
    ) {

        parent::__construct(
            $usuarioLogadoService,
            $vendaRepositoryService,
            $vendaAdiantamentoRepositoryService,
            $vendaPagamentoRepositoryService,
            $contasPagarRepositoryService,
            $cadastroControlesRepositoryService
        );
        $this->_notaCreditoRepositoryService = $notaCreditoRepositoryService;
    }

    public function finalizarFormaPagamento(SetupFinalizarVendasService $setupFinalizarVendasService, $formaPagamento)
    {
        $this->salvarNotasCreditos($formaPagamento);
        parent::finalizarFormaPagamento($setupFinalizarVendasService, $formaPagamento);
    }

    protected function salvarVendaPagamento(SetupFinalizarVendasService $setupFinalizarVendasService, $formaPagamento)
    {
        /**
         * @var ItemNotaCreditoDTO[]
         */
        $parcelas = $formaPagamento->getParcelas();
        $qtde     = count($parcelas);

        for ($i = 0; $i < $qtde; $i++) {
            $parcela    = $parcelas[$i];
            $vendaPagamento = [
                "id_venda"           => $setupFinalizarVendasService->getAtributosVenda()["finalizarVendaDTO"]->getIdVenda(),
                "id_forma_pgto"      => $formaPagamento->getIdFormaPagamento(),
                "valor_pgto"         => $parcela->getValor(),
                "qtd_parcela"        => $qtde,
                "parcela"            => sprintf("%s/%s", $i + 1, $qtde),
                "cod_aut_cartao"     => $formaPagamento->getCodAutCartao(),
                "id_credenciadora"   => $formaPagamento->getIdCredenciadora(),
                "cnpj_credenciadora" => $formaPagamento->getCnpjCredenciadora(),
                "id_cadastro"        => $this->_usuarioLogadoService->getIdCadastroLogado()
            ];

            $this->_vendaPagamentoRepositoryService->create($vendaPagamento);
        }
    }

    protected function salvarContaPagar(SetupFinalizarVendasService $setupFinalizarVendasService, $formaPagamento)
    {
        /**
         * @var ItemNotaCreditoDTO[]
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
                "valor"                  => $parcela->getValor(),
                "numero_documento"       => $formaPagamento->getNumeroDocumento(),
                "informacoes_adicionais" => $setupFinalizarVendasService->getAtributosVenda()["finalizarVendaDTO"]->getObservacao(),
                "qtd_parcela"            => $qtde,
                "parcela"                => sprintf("%s/%s", $i + 1, $qtde)
            ];

            $this->_contasPagarRepositoryService->create($contaPagar);
        }
    }

    /**
     * Função para salvar uma nota de credito.
     *
     * @return void
     */
    private function salvarNotasCreditos($formaPagamento)
    {
        $novoValorASerBatido = 0;
        $notas               = $formaPagamento->getNumeroNotas();

        foreach ($notas as $nota) {
            if ($novoValorASerBatido != 0) {
                $valorCreditoFinal = $formaPagamento->getValorCreditoInicial() - $novoValorASerBatido;
            } else {
                $valorCreditoFinal = $formaPagamento->getValorCreditoInicial() - $formaPagamento->getValorRecebido();
            }
            $saldoAtual = ($formaPagamento->getValorRecebido() >= $formaPagamento->getValorCreditoInicial()) ? 0.00 : $valorCreditoFinal;
            $novoValorASerBatido = $valorCreditoFinal;

            $credito = [
                "valor_credito" => $saldoAtual,
                "id_cadastro" => $this->_usuarioLogadoService->getIdUsuarioLogado(),
                "num_nota" => $nota,
                "data_resgate" => $saldoAtual == 0 ? DB::raw("NOW()") : '0000-00-00',
            ];

            $this->_notaCreditoRepositoryService->create($credito);
        }
    }
}
