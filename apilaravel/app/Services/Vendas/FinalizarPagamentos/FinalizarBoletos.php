<?php

namespace App\Services\Vendas\FinalizarPagamentos;

use App\Services\Auth\UsuarioLogadoService;
use App\Services\Vendas\SetupFinalizarVendasService;
use App\Services\Vendas\FinalizarPagamentos\FinalizarFormasPagtosAbstract;
use App\DTO\Vendas\FinalizarVendas\FormasPagamentos\Parcelado\ItemBoletoDTO;
use App\Services\Repository\Contracts\Model\Venda\VendaRepositoryServiceInterface;
use App\Services\Repository\Contracts\Model\Cs2\ControlesBoletoRepositoryServiceInterface;
use App\Services\Repository\Contracts\Model\Venda\VendaPagamentoRepositoryServiceInterface;
use App\Services\Repository\Contracts\Model\ContasPagar\ContasPagarRepositoryServiceInterface;
use App\Services\Repository\Contracts\Model\Venda\VendaAdiantamentoRepositoryServiceInterface;
use App\Services\Repository\Contracts\Model\Controle\CadastroControlesRepositoryServiceInterface;
use App\Services\Repository\Contracts\Model\Boleto\BoletosTitulosRecebaFacilRepositoryServiceInterface;

/**
 * @author Tiago Franco
 * Objeto responsavel por finalizar 
 * os pagamentos por paracelas
 */
class FinalizarBoletos extends FinalizarFormasPagtosAbstract
{
    /**
     * @var ControlesBoletoRepositoryServiceInterface
     */
    protected $_controlesBoletoRepositoryService;

    /**
     * @var BoletosTitulosRecebaFacilRepositoryServiceInterface
     */
    protected $_boletosTitulosRecebaFacilRepositoryService;

    public function __construct(
        UsuarioLogadoService $usuarioLogadoService,
        VendaRepositoryServiceInterface $vendaRepositoryService,
        VendaAdiantamentoRepositoryServiceInterface $vendaAdiantamentoRepositoryService,
        VendaPagamentoRepositoryServiceInterface $vendaPagamentoRepositoryService,
        ContasPagarRepositoryServiceInterface $contasPagarRepositoryService,
        CadastroControlesRepositoryServiceInterface $cadastroControlesRepositoryService,
        ControlesBoletoRepositoryServiceInterface $controlesBoletoRepositoryService,
        BoletosTitulosRecebaFacilRepositoryServiceInterface $boletosTitulosRecebaFacilRepositoryService
    ) {

        $this->_controlesBoletoRepositoryService           = $controlesBoletoRepositoryService;
        $this->_boletosTitulosRecebaFacilRepositoryService = $boletosTitulosRecebaFacilRepositoryService;

        parent::__construct(
            $usuarioLogadoService,
            $vendaRepositoryService,
            $vendaAdiantamentoRepositoryService,
            $vendaPagamentoRepositoryService,
            $contasPagarRepositoryService,
            $cadastroControlesRepositoryService
        );
    }

    public function finalizarFormaPagamento(SetupFinalizarVendasService $setupFinalizarVendasService, $formaPagamento)
    {
        //verica persistencia do boleto
        $this->salvarBoleto($setupFinalizarVendasService, $formaPagamento);

        parent::finalizarFormaPagamento($setupFinalizarVendasService, $formaPagamento);
    }

    protected function salvarVendaPagamento(SetupFinalizarVendasService $setupFinalizarVendasService, $formaPagamento)
    {
        /**
         * @var ItemBoletoDTO[]
         */
        $paracelas = $formaPagamento->getParcelas();
        $qtde      = count($paracelas);

        for ($i = 0; $i < $qtde; $i++) {
            $cheque = $paracelas[$i];

            $vendaPagamento = [
                "id_venda"      => $setupFinalizarVendasService->getAtributosVenda()["finalizarVendaDTO"]->getIdVenda(),
                "id_forma_pgto" => $formaPagamento->getIdFormaPagamento(),
                "valor_pgto"    => $cheque->getParcela(),
                "doc_cheque"    => sprintf("%s/%s", $i + 1, $qtde),
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
         * @var ItemBoletoDTO[]
         */
        $paracelas = $formaPagamento->getParcelas();
        $qtde    = count($paracelas);

        for ($i = 0; $i < $qtde; $i++) {
            $cheque = $paracelas[$i];
            $contaPagar = [
                "id_cadastro"            => $this->_usuarioLogadoService->getIdCadastroLogado(),
                "id_formapgto"           => $formaPagamento->getIdFormaPagamento(),
                "id_venda"               => $setupFinalizarVendasService->getAtributosVenda()["finalizarVendaDTO"]->getIdVenda(),
                "id_cliente"             => $setupFinalizarVendasService->getAtributosVenda()["finalizarVendaDTO"]->getIdCliente(),
                "id_usuario_cadastro"    => $setupFinalizarVendasService->getAtributosVenda()["finalizarVendaDTO"]->getIdUsuarioFechaVenda(),
                "valor"                  => $cheque->getParcela(),
                "informacoes_adicionais" => $setupFinalizarVendasService->getAtributosVenda()["finalizarVendaDTO"]->getObservacao(),
                "qtd_parcela"            => $qtde,
                "parcela"                => sprintf("%s/%s", $i + 1, $qtde)
            ];

            $this->_contasPagarRepositoryService->create($contaPagar);
        }
    }

    private function salvarBoleto(SetupFinalizarVendasService $setupFinalizarVendasService, $formaPagamento)
    {
        $controleBoletoConfig = $this->_controlesBoletoRepositoryService->getConfigControlesBoleto();
        $contador             = $controleBoletoConfig->contador_recebafacil;
        $totalPgto            = $formaPagamento->getTotalPgto();

        /**
         * @var ItemBoletoDTO[]
         */
        $parcelas = $formaPagamento->getParcelas();
        $qtde     = count($parcelas);
        for ($i = 0; $i < $qtde; $i++) {

            $parcela = $parcelas[$i];
            $contador++;

            $boleto = [
                "numdoc"                      => str_pad($contador, 10, '0', STR_PAD_LEFT),
                "codloja"                     => $this->_usuarioLogadoService->getIdCadastroLogado(),
                "vencimento"                  => $parcela->getVencimento(),
                "valor"                       => $parcela->getParcela(),
                "txjur"                       => $formaPagamento->getJuros(),
                "juros"                       => $formaPagamento->getJuros(),
                "numboleto"                   => str_pad($contador, 10, '0', STR_PAD_LEFT),
                "numboleto_bradesco"          => $contador,
                "numboleto_itau"              => $contador,
                "cpfcnpj_devedor"             => $setupFinalizarVendasService->getAtributosVenda()["finalizarVendaDTO"]->getIdCliente(),
                "tp_recebafacil"              => 2,
                "chavebol"                    => mt_rand(1111111111, 9999999999),
                "cbo"                         => '237',
                "tp_titulo"                   => $formaPagamento->getIdFormaPagamento() == 4 ? 3 : 2,
                "automatico"                  => $formaPagamento->getEnvioBoleto(),
                "radio_desconto"              => $formaPagamento->getRadioMsgBoleto(),
                "vr_desconto"                 => $parcela->getVencimento(),
                "radio_msg_boleto"            => $formaPagamento->getRadioMsgBoleto(),
                "texto_msg_boleto"            => $formaPagamento->getTextoMsgBoletoTxt(),
                "tipo_notificacao"            => '',
                "parcela"                     => sprintf("%s/%s", $i + 1, $qtde),
                "vr_total_divida"             => $totalPgto,
                "porcentagem_desconto_avista" => $formaPagamento->getDescontoAVista(),
                "porcentagem_desconto_aprazo" => $formaPagamento->getDescontoAPrazo(),
                "cod_pedido_web_control"      => $setupFinalizarVendasService->getAtributosVenda()["finalizarVendaDTO"]->getIdVenda()
            ];

            $this->_boletosTitulosRecebaFacilRepositoryService->create($boleto);
        }

        $this->_controlesBoletoRepositoryService->updateRecebeFacil($contador);
    }
}
