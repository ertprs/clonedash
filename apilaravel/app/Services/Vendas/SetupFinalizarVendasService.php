<?php

namespace App\Services\Vendas;

use App\Model\Venda\Venda;
use App\Services\Utils\CodesApi;
use App\Services\Utils\FormasPagamentos;
use App\Exceptions\ApiWebControlException;
use App\Services\Extensions\RequestBodyConverter;
use App\DTO\Vendas\FinalizarVendas\FinalizarVendaDTO;
use App\DTO\Vendas\FinalizarVendas\FormaPagamentoVendaInterface;
use App\Repository\Contracts\Model\Venda\VendaRepositoryInterface;
use App\DTO\Vendas\FinalizarVendas\FormasPagamentos\Carne\CarneDTO;
use App\DTO\Vendas\FinalizarVendas\FormasPagamentos\Boleto\BoletoDTO;
use App\DTO\Vendas\FinalizarVendas\FormasPagamentos\Cheque\ChequeDTO;
use App\DTO\Vendas\FinalizarVendas\FormasPagamentos\Debito\DebitoDTO;
use App\Repository\Contracts\Model\Cliente\ClienteRepositoryInterface;
use App\DTO\Vendas\FinalizarVendas\FormasPagamentos\JurosMora\JurosMoraDTO;
use App\DTO\Vendas\FinalizarVendas\FormasPagamentos\Parcelado\ParceladoDTO;
use App\DTO\Vendas\FinalizarVendas\FormasPagamentos\NotaCredito\NotaCreditoDTO;
use App\DTO\Vendas\FinalizarVendas\FormasPagamentos\JurosMora\NotaPromissoriaDTO;
use App\DTO\Vendas\FinalizarVendas\FormasPagamentos\ValePresente\ValePresenteDTO;
use App\DTO\Vendas\FinalizarVendas\FormasPagamentos\Parcelado\CartaoCreditoAuraDTO;
use App\Repository\Contracts\Model\FormaPagamento\FormaPagamentoRepositoryInterface;
use App\DTO\Vendas\FinalizarVendas\FormasPagamentos\Parcelado\CartaoCreditoSorocredDTO;
use App\DTO\Vendas\FinalizarVendas\FormasPagamentos\ContaCorrenteCliente\ContaCorrenteClienteDTO;
use App\DTO\Vendas\FinalizarVendas\FormasPagamentos\ValeComprasFuncionario\ValeComprasFuncionarioDTO;

/**
 * @author Tiago Franco
 * Servico para iniciliar os dados necessarios
 * para o servico de finalizacao das vendas 
 * e processamentos das formas de pagamentos
 */
class SetupFinalizarVendasService
{
    /**
     * @var FormaPagamentoRepositoryInterface
     */
    private $_formaPagamentoRepository;

    /**
     * @var VendaRepositoryInterface
     */
    private $_vendaRepository;


    /**
     * @var ClienteRepositoryInterface
     */
    private $_clienteRepository;

    /**
     * @var RequestBodyConverter
     */
    private $_requestBodyConverter;


    /**
     * @var array
     */
    private $_atributosVenda;

    /**
     * @var array
     */
    private $_formasPagamentos;

    public function __construct(
        FormaPagamentoRepositoryInterface $formaPagamentoRepository,
        RequestBodyConverter $requestBodyConverter,
        VendaRepositoryInterface $vendaRepository,
        ClienteRepositoryInterface $clienteRepository
    ) {

        $this->_vendaRepository      = $vendaRepository;
        $this->_clienteRepository    = $clienteRepository;
        $this->_requestBodyConverter = $requestBodyConverter;
        $this->_tipoPagamentos       = array_column($formaPagamentoRepository->retornaFormasPagamentos(), "id");
    }

    public function setUp(FinalizarVendaDTO $finalizarVendaDTO)
    {
        $atributosVenda = [];

        if (empty($finalizarVendaDTO->getPagamentos())) {
            throw new ApiWebControlException("É obrigatório o envio de ao menos uma forma de pagamento", CodesApi::OPERACAOINVALIDA);
        }

        /**
         * @var FormaPagamentoVendaInterface[]
         */
        $formasPagamentos = $this->buildFormasPagamentos($finalizarVendaDTO->getPagamentos());

        $totalPgto = array_sum(array_map(function (FormaPagamentoVendaInterface $formaPagamento) {
            return $formaPagamento->getTotalPgto();
        }, $formasPagamentos));

        $venda = $this->_vendaRepository->find($finalizarVendaDTO->getIdVenda());
        if (!$venda) {
            throw new ApiWebControlException("Venda inválida", CodesApi::OPERACAOINVALIDA);
        }

        if ($venda->situacao != Venda::SIT_AGUARDANDO_APROVACAO) {
            throw new ApiWebControlException("Venda já finalizada anteriormente", CodesApi::OPERACAOINVALIDA);
        }

        $cliente = $this->_clienteRepository->getCliente($finalizarVendaDTO->getIdCliente());
        if (!$cliente) {
            throw new ApiWebControlException("Cliente da venda inválido", CodesApi::OPERACAOINVALIDA);
        }

        $atributosVenda['venda']             = $venda;
        $atributosVenda['cliente']           = $cliente;
        $atributosVenda['totalPgto']         = $totalPgto;
        $atributosVenda['totalVenda']        = $this->_vendaRepository->getTotalVenda($venda->id);
        $atributosVenda['partial']           = $atributosVenda['totalPgto'] < $atributosVenda['totalVenda'];
        $atributosVenda['totalTroco']        = $atributosVenda['totalPgto'] > $atributosVenda['totalVenda'] ? $atributosVenda['totalPgto'] - $atributosVenda['totalVenda'] : 0;
        $atributosVenda['finalizarVendaDTO'] = $finalizarVendaDTO;

        $this->_atributosVenda   = $atributosVenda;
        $this->_formasPagamentos = $formasPagamentos;
    }

    public function buildFormasPagamentos(array $formasPagamentos)
    {
        $formas = array();

        foreach ($formasPagamentos as $formaPagamento) {

            if (!isset($formaPagamento["id_forma_pagamento"])) {
                throw new ApiWebControlException("Item de pagamento inválido. É obrigatorio o envio do id_forma_pagamento", CodesApi::OPERACAOINVALIDA);
            }
            if (!in_array($formaPagamento["id_forma_pagamento"], $this->_tipoPagamentos)) {
                throw new ApiWebControlException("id_forma_pagamento inválido.", CodesApi::PARAMETROINVALIDO);
            }

            $formaPgto = $this->fabricaFormaPagamento($formaPagamento);
            //validar se todos as informacoes requeridas foram informadas para a forma do pagmento
            $formaPgto->validar($formaPagamento);
            $formas[] = $formaPgto;
        }

        return $formas;
    }

    public function fabricaFormaPagamento(array $formaPagamento)
    {
        $json = json_encode($formaPagamento);

        switch ($formaPagamento["id_forma_pagamento"]) {
            case FormasPagamentos::CHEQUE:
                return $this->_requestBodyConverter->deserializerConteudo(new ChequeDTO(), $json);
                break;
            case FormasPagamentos::VALE_COMPRA_FUNCIONARIO:
                return $this->_requestBodyConverter->deserializerConteudo(new ValeComprasFuncionarioDTO(), $json);
                break;
            case FormasPagamentos::VALE_PRESENTE:
                return $this->_requestBodyConverter->deserializerConteudo(new ValePresenteDTO(), $json);
                break;
            case FormasPagamentos::CONTA_CORRENTE_CLIENTE:
                return $this->_requestBodyConverter->deserializerConteudo(new ContaCorrenteClienteDTO(), $json);
                break;
            case FormasPagamentos::NOTA_DE_CREDITO:
                return $this->_requestBodyConverter->deserializerConteudo(new NotaCreditoDTO(), $json);
                break;
            case FormasPagamentos::BOLETO:
            case FormasPagamentos::CREDIARIO:
                return $this->_requestBodyConverter->deserializerConteudo(new BoletoDTO(), $json);
                break;
            case FormasPagamentos::BOLETO_PROPRIO:
            case FormasPagamentos::CREDIPAR_FINANCEIRA:
            case FormasPagamentos::FINANCEIRA:
                return $this->_requestBodyConverter->deserializerConteudo(new JurosMoraDTO(), $json);
                break;
            case FormasPagamentos::NOTA_PROMISSORIA:
            case FormasPagamentos::DEP_EM_CONTA_CORRENTE:
                return $this->_requestBodyConverter->deserializerConteudo(new NotaPromissoriaDTO(), $json);
                break;
            case FormasPagamentos::CARTAO_CREDITO_AURA:
                return $this->_requestBodyConverter->deserializerConteudo(new CartaoCreditoAuraDTO(), $json);
                break;
            case FormasPagamentos::CARTAO_CREDITO_SOROCRED:
                return $this->_requestBodyConverter->deserializerConteudo(new CartaoCreditoSorocredDTO(), $json);
                break;
            case FormasPagamentos::CARNE:
                return $this->_requestBodyConverter->deserializerConteudo(new CarneDTO(), $json);
                break;
            default:

                if (FormasPagamentos::isDebito($formaPagamento["id_forma_pagamento"])) {
                    return $this->_requestBodyConverter->deserializerConteudo(new DebitoDTO(), $json);
                }

                return $this->_requestBodyConverter->deserializerConteudo(new ParceladoDTO(), $json);
        }
    }

    /**
     * Get the value of AtributosVenda
     *
     * @return  array
     */
    public function getAtributosVenda()
    {
        return $this->_atributosVenda;
    }

    /**
     * Get the value of FormasPagamentos
     *
     * @return  array
     */
    public function getFormasPagamentos()
    {
        return $this->_formasPagamentos;
    }
}
