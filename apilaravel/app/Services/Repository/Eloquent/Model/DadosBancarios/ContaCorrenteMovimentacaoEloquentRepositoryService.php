<?php

namespace App\Services\Repository\Eloquent\Model\DadosBancarios;

use App\DTO\FrenteCaixa\MovimentacoesDTO;
use App\Model\DadosBancarios\ContaCorrente;
use App\Model\DadosBancarios\ContaCorrenteMovimentacao;
use App\Entity\Model\DadosBancarios\ContaCorrenteInterface;
use App\Services\Repository\Eloquent\WebControlEloquentRepositoryService;
use App\Repository\Eloquent\Model\DadosBancarios\ContaCorrenteMovimentacaoEloquentRepository;
use App\Services\Repository\Contracts\Model\DadosBancarios\ContaCorrenteMovimentacaoRepositoryServiceInterface;

/**
 * @author Tiago Franco
 * Servico de acesso ao repositorio de Model
 * Deverá possuir os metodos contendo operacoes de escrita 
 * do modelo implementando a interface do repositorio
 */
class ContaCorrenteMovimentacaoEloquentRepositoryService extends WebControlEloquentRepositoryService implements ContaCorrenteMovimentacaoRepositoryServiceInterface
{
    public function __construct(ContaCorrenteMovimentacao $model, ContaCorrenteMovimentacaoEloquentRepository $repository)
    {
        parent::__construct($model, $repository);
    }

    public function cadastrarCCCliente(int $idCliente)
    {
        $cc = new ContaCorrente();
        $cc->id_cadastro         = $this->_usuarioLogadoService->getIdCadastroLogado();
        $cc->id_cliente          = $idCliente;
        $cc->id_usuario_abertura = $this->_usuarioLogadoService->getIdUsuarioLogado();
        $cc->save();

        return $cc;
    }

    public function cadastrarCCMovimentacao(int $idContaCorrente, MovimentacoesDTO $movimentacoesDTO)
    {
        $ccm = new ContaCorrenteMovimentacao();
        $ccm->id_cadastro             = $this->_usuarioLogadoService->getIdCadastroLogado();
        $ccm->id_usuario_movimentacao = $this->_usuarioLogadoService->getIdUsuarioLogado();
        $ccm->tipo_movimentacao       = $movimentacoesDTO->getTipoMovimentacao();
        $ccm->valor_movimentacao      = $movimentacoesDTO->getValorMovimentacao();
        $ccm->descricao               = $movimentacoesDTO->getDescricao();
        $ccm->id_conta_corrente       = $idContaCorrente;
        $ccm->save();

        return $ccm;
    }
}
