<?php

namespace App\Services\Repository\Eloquent\Model\Venda;

use App\Model\Venda\Carne;
use App\Repository\Eloquent\Model\Venda\CarneEloquentRepository;
use App\Services\Repository\Contracts\Model\Venda\CarneRepositoryServiceInterface;
use App\Services\Repository\Eloquent\WebControlEloquentRepositoryService;

/**
 * @author Tiago Franco
 * Servico de acesso ao repositorio de Model
 * Deverá possuir os metodos contendo operacoes de escrita 
 * do modelo implementando a interface do repositorio
 */
class CarneEloquentRepositoryService extends WebControlEloquentRepositoryService implements CarneRepositoryServiceInterface
{
    public function __construct(Carne $model, CarneEloquentRepository $repository)
    {
        parent::__construct($model, $repository);
    }
}
