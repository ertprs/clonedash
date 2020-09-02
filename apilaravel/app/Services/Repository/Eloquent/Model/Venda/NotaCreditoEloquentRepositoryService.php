<?php

namespace App\Services\Repository\Eloquent\Model\Venda;

use App\Model\Venda\NotaCredito;
use App\Services\Utils\CodesApi;
use App\DTO\FrenteCaixa\DevolucaoDTO;
use App\Exceptions\ApiWebControlException;
use App\Repository\Eloquent\Model\Venda\NotaCreditoEloquentRepository;
use App\Services\Repository\Eloquent\WebControlEloquentRepositoryService;
use App\Services\Repository\Contracts\Model\Venda\NotaCreditoRepositoryServiceInterface;

/**
 * @author Tiago Franco
 * Servico de acesso ao repositorio de Model
 * Deverá possuir os metodos contendo operacoes de escrita 
 * do modelo implementando a interface do repositorio
 */
class NotaCreditoEloquentRepositoryService extends WebControlEloquentRepositoryService implements NotaCreditoRepositoryServiceInterface
{
    public function __construct(NotaCredito $model, NotaCreditoEloquentRepository $repository)
    {
        parent::__construct($model, $repository);
    }

    public function salvarNotaCredito(DevolucaoDTO $devolucaoDTO, $idVendaDevolucao)
    {
        $notaCredito                   = new NotaCredito();
        $notaCredito->id_venda_devol   = $idVendaDevolucao;
        $notaCredito->id_cliente       = $devolucaoDTO->getIdCliente();
        $notaCredito->id_cadastro      = $this->_usuarioLogadoService->getIdCadastroLogado();
        $notaCredito->data_cadastro    = date('Y-m-d');
        $notaCredito->hora_cadastro    = date('H:i:s');
        $notaCredito->id_func_cadastro = $this->_usuarioLogadoService->getIdUsuarioLogado();
        $notaCredito->valor_credito    = $devolucaoDTO->getQuantidade() * $devolucaoDTO->getValorPagamento();
        $notaCredito->save();

        if (!$notaCredito->id) {
            throw new ApiWebControlException("Erro ao salvar o crédito da devolução", CodesApi::ERROOPERACAO);
        }

        return $notaCredito;
    }
}
