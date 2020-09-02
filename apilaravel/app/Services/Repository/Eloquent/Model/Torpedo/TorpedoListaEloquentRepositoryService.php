<?php

namespace App\Services\Repository\Eloquent\Model\Torpedo;

use App\Model\Torpedos\TorpedoLista;
use App\Repository\Eloquent\Model\Torpedo\TorpedoListaEloquentRepository;
use App\Services\Repository\Eloquent\WebControlEloquentRepositoryService;
use App\Services\Repository\Contracts\Model\Torpedo\TorpedoListaRepositoryServiceInterface;

/**
 * @author Tiago Franco
 * Servico de acesso ao repositorio de Model
 * Deverá possuir os metodos contendo operacoes de escrita 
 * do modelo implementando a interface do repositorio
 */
class TorpedoListaEloquentRepositoryService extends WebControlEloquentRepositoryService implements TorpedoListaRepositoryServiceInterface
{
    public function __construct(TorpedoLista $model, TorpedoListaEloquentRepository $repository)
    {
        parent::__construct($model, $repository);
    }
}
