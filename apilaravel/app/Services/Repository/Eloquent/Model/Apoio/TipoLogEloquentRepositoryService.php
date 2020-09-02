<?php

namespace App\Services\Repository\Eloquent\Model\Apoio;

use App\Model\Apoio\TipoLog;
use App\Repository\Eloquent\Model\Apoio\TipoLogEloquentRepository;
use App\Services\Repository\Contracts\Model\Apoio\TipoLogRepositoryServiceInterface;
use App\Services\Repository\Eloquent\WebControlEloquentRepositoryService;

/**
 * @author Tiago Franco
 * Servico de acesso ao repositorio de Model
 * Deverá possuir os metodos contendo operacoes de escrita 
 * do modelo implementando a interface do repositorio
 */
class TipoLogEloquentRepositoryService extends WebControlEloquentRepositoryService implements TipoLogRepositoryServiceInterface
{
    public function __construct(TipoLog $model, TipoLogEloquentRepository $repository)
    {
        parent::__construct($model, $repository);
    }
}
