<?php

namespace App\Services\Repository\Eloquent\Model\Funcionario;

use App\Model\Funcionario\Funcionario;
use App\Repository\Eloquent\Model\Funcionario\FuncionarioEloquentRepository;
use App\Services\Repository\Contracts\Model\Funcionario\FuncionarioRepositoryServiceInterface;
use App\Services\Repository\Eloquent\WebControlEloquentRepositoryService;

/**
 * @author Tiago Franco
 * Servico de acesso ao repositorio de Model
 * Deverá possuir os metodos contendo operacoes de escrita 
 * do modelo implementando a interface do repositorio
 */
class FuncionarioEloquentRepositoryService extends WebControlEloquentRepositoryService implements FuncionarioRepositoryServiceInterface
{
    public function __construct(Funcionario $model, FuncionarioEloquentRepository $repository)
    {
        parent::__construct($model, $repository);
    }
}
