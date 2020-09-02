<?php

namespace App\Services\Vendas\FinalizarPagamentos;

use App\DTO\Vendas\FinalizarVendas\FinalizarVendaDTO;
use App\Services\Auth\UsuarioLogadoService;
use App\Services\Vendas\SetupFinalizarVendasService;
use App\Services\Repository\Contracts\Model\Venda\VendaRepositoryServiceInterface;
use App\Services\Repository\Contracts\Model\Venda\VendaPagamentoRepositoryServiceInterface;
use App\Services\Repository\Contracts\Model\ContasPagar\ContasPagarRepositoryServiceInterface;
use App\Services\Repository\Contracts\Model\Venda\VendaAdiantamentoRepositoryServiceInterface;
use App\Services\Repository\Contracts\Model\Controle\CadastroControlesRepositoryServiceInterface;
use App\Services\Utils\FormasPagamentos;

/**
 * @author Tiago Franco
 * Classe abstrata para as operacoes de finalizacao 
 * das formas de pagamentos
 */
abstract class FinalizarFormasPagtosAbstract implements FinalizarFormasPgtos
{
    /**
     * @var VendaRepositoryServiceInterface
     */
    protected $_vendaRepositoryService;

    /**
     * @var UsuarioLogadoService
     */
    protected $_usuarioLogadoService;

    /**
     * @var VendaAdiantamentoRepositoryServiceInterface
     */
    protected $_vendaAdiantamentoRepositoryService;

    /**
     * @var VendaPagamentoRepositoryServiceInterface
     */
    protected $_vendaPagamentoRepositoryService;

    /**
     * @var ContasPagarRepositoryServiceInterface
     */
    protected $_contasPagarRepositoryService;

    /**
     * @var CadastroControlesRepositoryServiceInterface
     */
    private $_cadastroControlesRepositoryService;

    /**
     * @var FinalizarVendaDTO
     */
    protected $_finalizarVendaDTO;

    public function __construct(
        UsuarioLogadoService $usuarioLogadoService,
        VendaRepositoryServiceInterface $vendaRepositoryService,
        VendaAdiantamentoRepositoryServiceInterface $vendaAdiantamentoRepositoryService,
        VendaPagamentoRepositoryServiceInterface $vendaPagamentoRepositoryService,
        ContasPagarRepositoryServiceInterface $contasPagarRepositoryService,
        CadastroControlesRepositoryServiceInterface $cadastroControlesRepositoryService
    ) {
        $this->_vendaRepositoryService             = $vendaRepositoryService;
        $this->_vendaAdiantamentoRepositoryService = $vendaAdiantamentoRepositoryService;
        $this->_usuarioLogadoService               = $usuarioLogadoService;
        $this->_vendaPagamentoRepositoryService    = $vendaPagamentoRepositoryService;
        $this->_contasPagarRepositoryService       = $contasPagarRepositoryService;
        $this->_cadastroControlesRepositoryService = $cadastroControlesRepositoryService;
    }

    public function finalizarFormaPagamento(SetupFinalizarVendasService $setupFinalizarVendasService, $formaPagamento)
    {
        if ($setupFinalizarVendasService->getAtributosVenda()["partial"]) {
            $this->salvarAdiantamento($setupFinalizarVendasService, $formaPagamento);
            return;
        }
        $this->salvarVendaPagamento($setupFinalizarVendasService, $formaPagamento);        
        if(FormasPagamentos::isContaPagar($formaPagamento->getIdFormaPagamento())) {
            $this->salvarContaPagar($setupFinalizarVendasService, $formaPagamento);
        }
    }
    protected abstract function salvarVendaPagamento(SetupFinalizarVendasService $setupFinalizarVendasService, $formaPagamento);

    protected abstract function salvarContaPagar(SetupFinalizarVendasService $setupFinalizarVendasService, $formaPagamento);

    public function salvarAdiantamento(SetupFinalizarVendasService $setupFinalizarVendasService, $formaPagamento)
    {
        $totalPgto    = $formaPagamento->getTotalPgto();
        $adiantamento = [
            "id_venda"           => $setupFinalizarVendasService->getAtributosVenda()["finalizarVendaDTO"]->getIdVenda(),
            "id_cadastro"        => $this->_usuarioLogadoService->getIdCadastroLogado(),
            "id_abertura_caixa"  => $setupFinalizarVendasService->getAtributosVenda()["finalizarVendaDTO"]->getIdAberturaCaixa(),
            "id_forma_pagamento" => $formaPagamento->getIdFormaPagamento(),
            "valor"              => $totalPgto
        ];

        $this->_vendaAdiantamentoRepositoryService->create($adiantamento);
    }

    protected function getNumeroControle(int $idFormaPagamento)
    {
        $numeroControle = $this->_cadastroControlesRepositoryService->getControleFormaPagamento($idFormaPagamento);

        if (empty($numeroControle)) {
            $controle = $this->_cadastroControlesRepositoryService->vincularControleFormaPagamento($idFormaPagamento);
            return $controle->numero;
        }else {
            #incrementa o controle no banco
            $this->_cadastroControlesRepositoryService->incrementarControleFormaPagamento($idFormaPagamento);
        }

        return $numeroControle->numero+1;
    }
}
