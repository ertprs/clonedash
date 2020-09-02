<?php

namespace App\Services\Repository\Eloquent\Model\Kits;

use App\Model\Kits\PromocaoKit;
use App\Repository\Eloquent\Model\Kits\PromocaoKitEloquentRepository;
use App\Services\Repository\Contracts\Model\Kits\PromocaoKitRepositoryServiceInterface;
use App\Services\Repository\Eloquent\WebControlEloquentRepositoryService;

/**
 * @author Tiago Franco
 * Servico de acesso ao repositorio de Model
 * Deverá possuir os metodos contendo operacoes de escrita 
 * do modelo implementando a interface do repositorio
 */
class PromocaoKitEloquentRepositoryService extends WebControlEloquentRepositoryService implements PromocaoKitRepositoryServiceInterface
{
    public function __construct(PromocaoKit $model, PromocaoKitEloquentRepository $repository)
    {
        parent::__construct($model, $repository);
    }
}
