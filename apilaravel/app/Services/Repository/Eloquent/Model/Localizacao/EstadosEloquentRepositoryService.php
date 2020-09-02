<?php

namespace App\Services\Repository\Eloquent\Model\Localizacao;

use App\Model\Localizacao\Estados;
use App\Repository\Eloquent\Model\Localizacao\EstadosEloquentRepository;
use App\Services\Repository\Contracts\Model\Localizacao\EstadosRepositoryServiceInterface;
use App\Services\Repository\Eloquent\WebControlEloquentRepositoryService;

/**
 * @author Tiago Franco
 * Servico de acesso ao repositorio de Model
 * Deverá possuir os metodos contendo operacoes de escrita 
 * do modelo implementando a interface do repositorio
 */
class EstadosEloquentRepositoryService extends WebControlEloquentRepositoryService implements EstadosRepositoryServiceInterface
{
    public function __construct(Estados $model, EstadosEloquentRepository $repository)
    {
        parent::__construct($model, $repository);
    }
}
