<?php

namespace App\Services\FrenteCaixa\Movimentacoes;

use Illuminate\Support\Facades\DB;
use App\DTO\FrenteCaixa\MovimentacoesDTO;
use App\Services\FrenteCaixa\FrenteCaixaServices;
use App\Services\Repository\Contracts\Model\FrenteCaixa\ValorInicialCaixaRepositoryServiceInterface;
use App\Services\Repository\Contracts\Model\DadosBancarios\ContaCorrenteMovimentacaoRepositoryServiceInterface;

/**
 * @author Tiago Franco
 * Servico para operações sobre lancamentos de  creditos 
 * na frente de caixa 
 */
class CreditosService
{
    /**
     * @var FrenteCaixaServices
     */
    private $_frenteCaixaServices;

    /**
     * @var ValorInicialCaixaRepositoryServiceInterface
     */
    private $_valorInicialCaixaRepositoryService;

    /**
     * @var ContaCorrenteMovimentacaoRepositoryServiceInterface
     */
    private $contaCorrenteMovimentacaoRepositoryService;

    public function __construct(
        FrenteCaixaServices $frenteCaixaServices,
        ContaCorrenteMovimentacaoRepositoryServiceInterface $contaCorrenteMovimentacaoRepositoryService,
        ValorInicialCaixaRepositoryServiceInterface $valorInicialCaixaRepositoryService
    ) {
        $this->contaCorrenteMovimentacaoRepositoryService = $contaCorrenteMovimentacaoRepositoryService;
        $this->_frenteCaixaServices                       = $frenteCaixaServices;
        $this->_valorInicialCaixaRepositoryService        = $valorInicialCaixaRepositoryService;
    }

    public function lancarNovoCredito(MovimentacoesDTO $movimentacoesDTO)
    {
        $movimentacoesDTO->setTipoMovimentacao("C");

        try {
            DB::beginTransaction();

            $frenteCaixa = $this->_frenteCaixaServices->getInicialCaixa();

            //Add o valor extra no caixa
            $this->_valorInicialCaixaRepositoryService->addValorExtraCaixa($frenteCaixa, $movimentacoesDTO);

            //salvar a entrada extra
            $this->_valorInicialCaixaRepositoryService->salvarEntradaExtraCaixa($frenteCaixa, $movimentacoesDTO);

            //busca dados da conta corrente/ se nao existir insere no banco
            $cc = $this->contaCorrenteMovimentacaoRepositoryService->getCCCliente($movimentacoesDTO->getIdCliente());
            if (!$cc) {
                $cc = $this->contaCorrenteMovimentacaoRepositoryService->cadastrarCCCliente($movimentacoesDTO->getIdCliente());
            }

            $ccMovimentacao = $this->contaCorrenteMovimentacaoRepositoryService->cadastrarCCMovimentacao($cc->id, $movimentacoesDTO);
            DB::commit();

            return $ccMovimentacao;
        } catch (\Throwable $th) {
            //desfaz alteracao e relanca o erro para exibicao da mensagem
            DB::rollBack();
            throw $th;
        }
    }

    public function addValorExtra(MovimentacoesDTO $movimentacoesDTO)
    {
        try {
            DB::beginTransaction();

            $frenteCaixa = $this->_frenteCaixaServices->getInicialCaixa();

            //Add o valor extra no caixa
            $this->_valorInicialCaixaRepositoryService->addValorExtraCaixa($frenteCaixa, $movimentacoesDTO);

            //salvar a entrada extra
            $entradaExtra = $this->_valorInicialCaixaRepositoryService->salvarEntradaExtraCaixa($frenteCaixa, $movimentacoesDTO);

            DB::commit();

            return $entradaExtra;
        } catch (\Throwable $th) {
            //desfaz alteracao e relanca o erro para exibicao da mensagem
            DB::rollBack();
            throw $th;
        }
    }
}
