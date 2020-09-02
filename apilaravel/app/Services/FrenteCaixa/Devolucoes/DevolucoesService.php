<?php

namespace App\Services\FrenteCaixa\Devolucoes;

use App\Model\Venda\Venda;
use App\Services\Utils\CodesApi;
use Illuminate\Support\Facades\DB;
use App\DTO\FrenteCaixa\DevolucaoDTO;
use App\Exceptions\ApiWebControlException;
use App\Repository\Contracts\Model\Venda\VendaRepositoryInterface;
use App\Repository\Contracts\Model\Cs2\CadastroRepositoryInterface;
use App\Repository\Contracts\Model\Funcionario\FuncionarioRepositoryInterface;
use App\Repository\Contracts\Model\Cliente\ClienteFrenteCaixaRepositoryInterface;
use App\Services\Repository\Contracts\Model\Produto\GradeRepositoryServiceInterface;
use App\Services\Repository\Contracts\Model\Venda\NotaCreditoRepositoryServiceInterface;
use App\Services\Repository\Contracts\Model\Venda\VendaDevolucaoRepositoryServiceInterface;

/**
 * @author Tiago Franco
 * Servico para manipulacao de dados de devolucoes
 * relacionadas a frente de caixa
 */
class DevolucoesService
{
    /**
     * @var ClienteFrenteCaixaRepositoryInterface
     */
    private $_clienteFrenteCaixaRepository;

    /**
     * @var VendaRepositoryInterface
     */
    private $_vendaRepository;

    /**
     * @var FuncionarioRepositoryInterface;
     */
    private $_funcionarioRepository;

    /**
     * @var CadastroRepositoryInterface;
     */
    private $_cadastroRepository;

    /**
     * @var VendaDevolucaoRepositoryServiceInterface
     */
    private $_vendaDevolucaoRepositoryService;

    /**
     * @var GradeRepositoryServiceInterface
     */
    private $_gradeRepositoryService;

    /**
     * @var NotaCreditoRepositoryServiceInterface
     */
    private $_notaCreditoRepositoryService;

    public function __construct(
        VendaRepositoryInterface $vendaRepository,
        FuncionarioRepositoryInterface $funcionarioRepository,
        VendaDevolucaoRepositoryServiceInterface $vendaDevolucaoRepositoryService,
        GradeRepositoryServiceInterface $gradeRepositoryService,
        NotaCreditoRepositoryServiceInterface $notaCreditoRepositoryService,
        ClienteFrenteCaixaRepositoryInterface $clienteFrenteCaixaRepository,
        CadastroRepositoryInterface $cadastroRepository
    ) {
        $this->_vendaRepository                 = $vendaRepository;
        $this->_vendaDevolucaoRepositoryService = $vendaDevolucaoRepositoryService;
        $this->_gradeRepositoryService          = $gradeRepositoryService;
        $this->_funcionarioRepository           = $funcionarioRepository;
        $this->_notaCreditoRepositoryService    = $notaCreditoRepositoryService;
        $this->_clienteFrenteCaixaRepository    = $clienteFrenteCaixaRepository;
        $this->_cadastroRepository              = $cadastroRepository;
    }

    public function devolverProduto(DevolucaoDTO $devolucaoDTO)
    {
        try {
            DB::beginTransaction();
            //salva na base_web_control.venda_devolucao
            $vendaDevolucao = $this->_vendaDevolucaoRepositoryService->devolverProdutoDB($devolucaoDTO);
            //salvar o item da devolucao base_web_control.venda_itens_devolucao
            $this->_vendaDevolucaoRepositoryService->salvarItemDevolucao($devolucaoDTO, $vendaDevolucao->id);
            //salvar a grade 
            $this->_gradeRepositoryService->salvarHistoricoGradeDevolucao($devolucaoDTO);
            //creditar o credito
            $this->_notaCreditoRepositoryService->salvarNotaCredito($devolucaoDTO, $vendaDevolucao->id);
            DB::commit();
        } catch (\Throwable $th) {
            //desfaz alteracao e relanca o erro para exibicao da mensagem
            DB::rollBack();
            throw $th;
        }
    }

    public function finalizarDevolucao(Venda $venda)
    {
        try {
            DB::beginTransaction();
            $this->_vendaDevolucaoRepositoryService->finalizarDevolucao($venda);
            $this->_vendaDevolucaoRepositoryService->finalizarItemDevolucao($venda);
            DB::commit();
        } catch (\Throwable $th) {
            //desfaz alteracao e relanca o erro para exibicao da mensagem
            DB::rollBack();
            throw $th;
        }
    }

    public function getViewDetalhes(Venda $venda)
    {
        //VALIDACAO
        if (!in_array($venda->situacao, ['C', 'E'])) {
            throw new ApiWebControlException("Situação da venda inválida", CodesApi::PARAMETROINVALIDO);
        }
        //Procura os itens da venda
        $itens  = $this->_vendaRepository->getItensVenda($venda->id);
        $valido = false;

        foreach ($itens as $item) {
            if ($item->estornado = 'N') {
                $valido = true;
                break;
            }
        }

        if (!$valido) {
            throw new ApiWebControlException("Venda inválida", CodesApi::PARAMETROINVALIDO);
        }

        //FIM VALIDACAO        
        //obtem as devolucoes sobre a venda, cria se nao tiver um registro na venda_devolucao
        $devolucao = $this->_vendaDevolucaoRepositoryService->getDevolucaoVenda($venda);
        if (!$devolucao) {
            $devolucao = $this->_vendaDevolucaoRepositoryService->devolverVendaDB($venda);
        }

        return [
            "venda"       => $venda,
            "itens_venda" => $itens,
            "cliente"     => $this->_clienteFrenteCaixaRepository->find($venda->id_cliente),
            "funcionario" => $this->_funcionarioRepository->getFuncionarioVenda($venda->id),
            "cadastro"    => $this->_cadastroRepository->getCadastroLojista(),
            "devolucao"   => $devolucao
        ];
    }
}
