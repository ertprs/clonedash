<?php

namespace App\Services\Repository\Eloquent\Model\ContasPagar;

use App\Model\ContasPagar\ContasPagar;
use App\Repository\Eloquent\Model\ContasPagar\ContasPagarEloquentRepository;
use App\Services\Repository\Contracts\Model\ContasPagar\ContasPagarRepositoryServiceInterface;
use App\Services\Repository\Eloquent\WebControlEloquentRepositoryService;

/**
 * @author Tiago Franco
 * Servico de acesso ao repositorio de Model
 * Deverá possuir os metodos contendo operacoes de escrita 
 * do modelo implementando a interface do repositorio
 */
class ContasPagarEloquentRepositoryService extends WebControlEloquentRepositoryService implements ContasPagarRepositoryServiceInterface
{
    public function __construct(ContasPagar $model, ContasPagarEloquentRepository $repository)
    {
        parent::__construct($model, $repository);
    }
}
