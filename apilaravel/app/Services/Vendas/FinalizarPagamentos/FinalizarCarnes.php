<?php

namespace App\Services\Vendas\FinalizarPagamentos;

use App\Services\Auth\UsuarioLogadoService;
use App\Services\Vendas\SetupFinalizarVendasService;
use App\DTO\Vendas\FinalizarVendas\FormasPagamentos\Carne\ItemCarneDTO;
use App\Services\Repository\Contracts\Model\Venda\CarneRepositoryServiceInterface;
use App\Services\Repository\Contracts\Model\Venda\VendaRepositoryServiceInterface;
use App\Services\Repository\Contracts\Model\Venda\VendaPagamentoRepositoryServiceInterface;
use App\Services\Repository\Contracts\Model\ContasPagar\ContasPagarRepositoryServiceInterface;
use App\Services\Repository\Contracts\Model\Venda\VendaAdiantamentoRepositoryServiceInterface;
use App\Services\Repository\Contracts\Model\Controle\CadastroControlesRepositoryServiceInterface;

/**
 * @author Tiago Franco
 * Objeto responsavel por finalizar 
 * os pagamentos por parcelas
 */
class FinalizarCarnes extends FinalizarFormasPagtosAbstract
{
    /**
     * @var  CarneRepositoryServiceInterface

     */
    private $_carneRepositoryServiceInterface;

    public function __construct(
        UsuarioLogadoService $usuarioLogadoService,
        VendaRepositoryServiceInterface $vendaRepositoryService,
        VendaAdiantamentoRepositoryServiceInterface $vendaAdiantamentoRepositoryService,
        VendaPagamentoRepositoryServiceInterface $vendaPagamentoRepositoryService,
        ContasPagarRepositoryServiceInterface $contasPagarRepositoryService,
        CadastroControlesRepositoryServiceInterface $cadastroControlesRepositoryService,
        CarneRepositoryServiceInterface $carneRepositoryServiceInterface
    ) {

        parent::__construct(
            $usuarioLogadoService,
            $vendaRepositoryService,
            $vendaAdiantamentoRepositoryService,
            $vendaPagamentoRepositoryService,
            $contasPagarRepositoryService,
            $cadastroControlesRepositoryService,
        );

        $this->_carneRepositoryServiceInterface = $carneRepositoryServiceInterface;
    }

    public function finalizarFormaPagamento(SetupFinalizarVendasService $setupFinalizarVendasService, $formaPagamento)
    {
        $this->salvarCarnes($setupFinalizarVendasService, $formaPagamento);
        parent::finalizarFormaPagamento($setupFinalizarVendasService, $formaPagamento);
    }

    protected function salvarVendaPagamento(SetupFinalizarVendasService $setupFinalizarVendasService, $formaPagamento)
    {
        /**
         * @var ItemCarneDTO[]
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
         * @var ItemCarneDTO[]
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
                "data_vencimento"        => $parcela->getVencimento(),
                "numero_documento"       => $formaPagamento->getNumeroDocumento(),
                "informacoes_adicionais" => $setupFinalizarVendasService->getAtributosVenda()["finalizarVendaDTO"]->getObservacao(),
                "qtd_parcela"            => $qtde,
                "parcela"                => sprintf("%s/%s", $i + 1, $qtde)
            ];

            $this->_contasPagarRepositoryService->create($contaPagar);
        }
    }


    private function salvarCarnes(SetupFinalizarVendasService $setupFinalizarVendasService, $formaPagamento)
    {
        /**
         * @var ItemCarneDTO[]
         */
        $parcelas = $formaPagamento->getParcelas();
        $qtde     = count($parcelas);

        for ($i = 0; $i < $qtde; $i++) {
            $parcela    = $parcelas[$i];
            $carne = [
                "id_cadastro"  => $this->_usuarioLogadoService->getIdCadastroLogado(),
                "num_contrato" => $formaPagamento->getNumeroContrato(),
                "valor"        => $parcela->getValor(),
                "vencimento"   => $parcela->getVencimento(),
                "parcela"      => $parcela->getValorAjustado(),
                "multa_atraso" => $parcela->getMulta(),
                "id_venda"     => $setupFinalizarVendasService->getAtributosVenda()["finalizarVendaDTO"]->getIdVenda(),
                "id_usuario"   => $setupFinalizarVendasService->getAtributosVenda()["finalizarVendaDTO"]->getIdUsuarioFechaVenda(),
                "id_cliente"   => $setupFinalizarVendasService->getAtributosVenda()["finalizarVendaDTO"]->getIdCliente(),
            ];

            $this->_carneRepositoryServiceInterface->create($carne);
        }
    }
}
