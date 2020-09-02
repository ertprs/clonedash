<?php

namespace App\Services\Repository\Eloquent\Model\FormaPagamento;

use App\Model\FormaPagamento\ClienteFormaPagamento;
use App\Repository\Eloquent\Model\FormaPagamento\ClienteFormaPagamentoEloquentRepository;
use App\Services\Repository\Contracts\Model\FormaPagamento\ClienteFormaPagamentoRepositoryServiceInterface;
use App\Services\Repository\Eloquent\WebControlEloquentRepositoryService;

/**
 * @author Tiago Franco
 * Servico de acesso ao repositorio de Model
 * Deverá possuir os metodos contendo operacoes de escrita 
 * do modelo implementando a interface do repositorio
 */
class ClienteFormaPagamentoEloquentRepositoryService extends WebControlEloquentRepositoryService implements ClienteFormaPagamentoRepositoryServiceInterface
{
    public function __construct(ClienteFormaPagamento $model, ClienteFormaPagamentoEloquentRepository $repository)
    {
        parent::__construct($model, $repository);
    }
}
