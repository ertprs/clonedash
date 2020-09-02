<?php

namespace App\Services\Repository\Eloquent\Model\Cs2;

use App\Model\Cs2\TitulosRecebaFacil;
use App\Repository\Eloquent\Model\Cs2\TitulosRecebaFacilEloquentRepository;
use App\Services\Repository\Contracts\Model\Cs2\TitulosRecebaFacilRepositoryServiceInterface;
use App\Services\Repository\Eloquent\WebControlEloquentRepositoryService;

/**
 * @author Tiago Franco
 * Servico de acesso ao repositorio de Model
 * Deverá possuir os metodos contendo operacoes de escrita 
 * do modelo implementando a interface do repositorio
 */
class TitulosRecebaFacilEloquentRepositoryService extends WebControlEloquentRepositoryService implements TitulosRecebaFacilRepositoryServiceInterface
{
    public function __construct(TitulosRecebaFacil $model, TitulosRecebaFacilEloquentRepository $repository)
    {
        parent::__construct($model, $repository);
    }
}
