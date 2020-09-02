<?php

namespace App\Services\Repository\Eloquent;

use App\Repository\Eloquent\UserEloquentRepository;
use App\Services\Repository\Contracts\UserRepositoryServiceInterface;
use App\Services\Repository\Eloquent\WebControlEloquentRepositoryService;
use App\User;

/**
 * @author Tiago Franco
 * Servico de acesso ao repositorio de Model
 * Deverá possuir os metodos contendo operacoes de escrita 
 * do modelo implementando a interface do repositorio
 */
class UserEloquentRepositoryService extends WebControlEloquentRepositoryService implements UserRepositoryServiceInterface
{
    public function __construct(User $model, UserEloquentRepository $repository)
    {
        parent::__construct($model, $repository);
    }
}
