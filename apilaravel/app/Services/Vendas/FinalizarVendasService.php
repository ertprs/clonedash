<?php

namespace App\Services\Vendas;

use Illuminate\Support\Facades\DB;
use App\DTO\Vendas\FinalizarVendas\FinalizarVendaDTO;
use App\DTO\Vendas\FinalizarVendas\FormaPagamentoVendaInterface;
use App\Services\Vendas\FinalizarPagamentos\FinalizarFormasPgtos;
use App\Services\Repository\Contracts\Model\Venda\VendaRepositoryServiceInterface;
use App\Services\Repository\Contracts\Model\Produto\GradeRepositoryServiceInterface;
use App\Services\Repository\Contracts\Model\Produto\GradeHistoricoRepositoryServiceInterface;

/**
 * @author Tiago Franco
 * Servico responsavel pelo 
 * processo de finalizacao das vendas
 * processando os tipos de pagamentos
 * selecionados no pagamento
 */
class FinalizarVendasService
{
    /**
     * @var VendaRepositoryServiceInterface
     */
    private $_vendaRepositoryService;

    /**
     * @var GradeRepositoryServiceInterface
     */
    private $_gradeRepositoryService;

    /**
     * @var GradeHistoricoRepositoryServiceInterface
     */
    private $_gradeHistoricoRepositoryService;

    public function __construct(
        VendaRepositoryServiceInterface $vendaRepositoryService,
        GradeHistoricoRepositoryServiceInterface $gradeHistoricoRepositoryService,
        GradeRepositoryServiceInterface $gradeRepositoryService
    ) {
        $this->_vendaRepositoryService          = $vendaRepositoryService;
        $this->_gradeRepositoryService          = $gradeRepositoryService;
        $this->_gradeHistoricoRepositoryService = $gradeHistoricoRepositoryService;
    }

    //Funcao a ser chamada pelos componentes de finalizacao das vendas
    public function finalizarVenda(FinalizarVendaDTO $finalizarVendaDTO, SetupFinalizarVendasService $setupFinalizarVendasService)
    {
        try {
            DB::beginTransaction();
            $this->finalizarFormasPagamentos($finalizarVendaDTO, $setupFinalizarVendasService);
            DB::commit();
            
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    private function finalizarFormasPagamentos(FinalizarVendaDTO $finalizarVendaDTO, SetupFinalizarVendasService $setupFinalizarVendasService)
    {
        //setup para configurar os dados necessarios para o processamento da finalizacao da venda
        $setupFinalizarVendasService->setUp($finalizarVendaDTO);
        /**
         * @var FormaPagamentoVendaInterface[]
         */
        $formasPagamentos = $setupFinalizarVendasService->getFormasPagamentos();
        if ($setupFinalizarVendasService->getAtributosVenda()["partial"]) {
            //se pagamento parcial lancar o valor pago incompleto como entrada na venda
            $this->_vendaRepositoryService->addEntradaVenda(
                $setupFinalizarVendasService->getAtributosVenda()["venda"]->id,
                $setupFinalizarVendasService->getAtributosVenda()["totalPgto"]
            );
        }

        #processa e finaliza todas as formas de pagamentos da venda
        foreach ($formasPagamentos as $formaPagamento) {
            /**
             * @var FinalizarFormasPgtos
             */
            $finalizarVenda = app($formaPagamento->getFinalizarFormaPgto());
            $finalizarVenda->finalizarFormaPagamento($setupFinalizarVendasService, $formaPagamento);
        }

        $this->fechaVendaBanco($finalizarVendaDTO);
    }


    private function fechaVendaBanco(FinalizarVendaDTO $finalizarVendaDTO)
    {
        $this->venda = $this->_vendaRepositoryService->fecharVenda($finalizarVendaDTO);

        if ($this->venda->id_tipo_venda != 4) {
            $gradesHistoricos = $this->_gradeHistoricoRepositoryService->getGradeHistoricosPosVenda($finalizarVendaDTO->getIdVenda());
            foreach ($gradesHistoricos as $gradeHistorico) {
                $gradeHistorico = (array) $gradeHistorico;
                $this->_gradeRepositoryService->atualizarQtdeEstoque($gradeHistorico["id_grade"], $gradeHistorico["qtd_atual"]);
                $this->_gradeHistoricoRepositoryService->create($gradeHistorico);
            }
        }
    }
}
