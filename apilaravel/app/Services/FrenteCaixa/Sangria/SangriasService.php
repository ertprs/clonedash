<?php

namespace App\Services\FrenteCaixa\Sangria;

use App\Services\Utils\CodesApi;
use App\Services\Utils\Permissoes;
use App\DTO\FrenteCaixa\SangriaDTO;
use App\Exceptions\ApiWebControlException;
use App\Services\Usuarios\UsuariosService;
use App\Services\Auth\UsuarioLogadoService;
use App\Services\FrenteCaixa\FrenteCaixaServices;
use App\Repository\Contracts\Model\Venda\CarneRepositoryInterface;
use App\Repository\Contracts\Model\Venda\VendaRepositoryInterface;
use App\Repository\Contracts\Model\Cs2\TitulosRecebaFacilRepositoryInterface;
use App\Repository\Contracts\Model\ContasPagar\ContasPagarRepositoryInterface;
use App\Services\Repository\Contracts\Model\FrenteCaixa\ValorInicialCaixaRepositoryServiceInterface;

/**
 * @author Tiago Franco
 * Servico para operacoes envolvendo sangrias
 */
class SangriasService
{

    /**
     * @var UsuarioLogadoService
     */
    private $_usuarioLogadoService;

    /**
     * @var FrenteCaixaServices
     */
    private $_frenteCaixaServices;

    /**
     * @var UsuariosService
     */
    private $_usuariosService;

    /**
     * @var CarneRepositoryInterface
     */
    private $_carneRepository;

    /**
     * @var ContasPagarRepositoryInterface
     */
    private $_contasPagarRepository;

    /**
     * @var VendaRepositoryInterface
     */
    private $_vendaRepository;

    /**
     * @var ValorInicialCaixaRepositoryServiceInterface
     */
    private $_valorInicialCaixaRepositoryService;

    /**
     * @var TitulosRecebaFacilRepositoryInterface
     */
    private $_titulosRecebaFacilRepository;

    public function __construct(
        UsuarioLogadoService $usuarioLogadoService,
        UsuariosService $usuariosService,
        FrenteCaixaServices $frenteCaixaServices,
        TitulosRecebaFacilRepositoryInterface $titulosRecebaFacilRepository,
        CarneRepositoryInterface $carneRepository,
        ContasPagarRepositoryInterface $contasPagarRepository,
        VendaRepositoryInterface $vendaRepository,
        ValorInicialCaixaRepositoryServiceInterface $valorInicialCaixaRepositoryService
    ) {
        $this->_usuarioLogadoService               = $usuarioLogadoService;
        $this->_frenteCaixaServices                = $frenteCaixaServices;
        $this->_usuariosService                    = $usuariosService;
        $this->_titulosRecebaFacilRepository       = $titulosRecebaFacilRepository;
        $this->_carneRepository                    = $carneRepository;
        $this->_contasPagarRepository              = $contasPagarRepository;
        $this->_vendaRepository                    = $vendaRepository;
        $this->_valorInicialCaixaRepositoryService = $valorInicialCaixaRepositoryService;
    }

    public function consultarLimite()
    {
        $frenteCaixa        = $this->_frenteCaixaServices->getInicialCaixa();
        $totalTitulos       = $this->_titulosRecebaFacilRepository->getTotalTitulosRecebaFacil($frenteCaixa);
        $totalCarnes        = $this->_carneRepository->getTotalCarne($frenteCaixa);
        $totalPromissorias  = $this->_contasPagarRepository->getTotalContasPagar($frenteCaixa);
        $totalAdiantamentos = $this->_vendaRepository->getTotalAdiantamentos($frenteCaixa["id"]);
        $sangrias           = $this->_valorInicialCaixaRepositoryService->getLimiteSangria($frenteCaixa);

        $sangrias["recebimentos"] = $totalCarnes + $totalTitulos + $totalPromissorias + $totalAdiantamentos;

        return $sangrias;
    }


    public function addSangria(SangriaDTO $sangriaDTO)
    {
        $sacador = $this->_usuariosService->buscaUsuarioPorSenha($sangriaDTO->getSenhaDecrypt());

        if (!$sacador) {
            throw new ApiWebControlException("Não foi encontrado um cadastro de usuário pela senha informada", CodesApi::PARAMETROINVALIDO);
        }

        if (
            !$this->_usuariosService->verificarPermissao($sacador, Permissoes::SACADORSANGRIA) &&
            !$this->_usuarioLogadoService->isLoginMaster()
        ) {
            throw new ApiWebControlException("Usuário sem permissão para fazer sangria", CodesApi::OPERACAOINVALIDA);
        }

        $informacoesCaixa  = $this->_frenteCaixaServices->getInicialCaixa();
        $sangria           = $this->_valorInicialCaixaRepositoryService->vericaSangria($informacoesCaixa);

        if (!$sangria || $sangria->permitido_sangria) {
            return $this->_valorInicialCaixaRepositoryService->criarSangria($sangriaDTO, $sacador, $informacoesCaixa);
        }

        throw new ApiWebControlException("Operação não disponível para caixas com sangria recém coletada", CodesApi::OPERACAOINVALIDA);
    }
}
