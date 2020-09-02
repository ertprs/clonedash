<?php

namespace App\Services\Repository\Eloquent\Model\FormaPagamento;

use App\Model\FormaPagamento\FormaPagamento;
use App\Repository\Eloquent\Model\FormaPagamento\FormaPagamentoEloquentRepository;
use App\Services\Repository\Contracts\Model\FormaPagamento\FormaPagamentoRepositoryServiceInterface;
use App\Services\Repository\Eloquent\WebControlEloquentRepositoryService;

/**
 * @author Tiago Franco
 * Servico de acesso ao repositorio de Model
 * Deverá possuir os metodos contendo operacoes de escrita 
 * do modelo implementando a interface do repositorio
 */
class FormaPagamentoEloquentRepositoryService extends WebControlEloquentRepositoryService implements FormaPagamentoRepositoryServiceInterface
{
    public function __construct(FormaPagamento $model, FormaPagamentoEloquentRepository $repository)
    {
        parent::__construct($model, $repository);
    }
}
