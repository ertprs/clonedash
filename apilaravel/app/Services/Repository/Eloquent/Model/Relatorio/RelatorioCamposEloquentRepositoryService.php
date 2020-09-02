<?php

namespace App\Services\Repository\Eloquent\Model\Relatorio;

use App\Model\Relatorio\RelatorioCampos;
use App\Repository\Eloquent\Model\Relatorio\RelatorioCamposEloquentRepository;
use App\Services\Repository\Contracts\Model\Relatorio\RelatorioCamposRepositoryServiceInterface;
use App\Services\Repository\Eloquent\WebControlEloquentRepositoryService;

/**
 * @author Tiago Franco
 * Servico de acesso ao repositorio de Model
 * Deverá possuir os metodos contendo operacoes de escrita 
 * do modelo implementando a interface do repositorio
 */
class RelatorioCamposEloquentRepositoryService extends WebControlEloquentRepositoryService implements RelatorioCamposRepositoryServiceInterface
{
    public function __construct(RelatorioCampos $model, RelatorioCamposEloquentRepository $repository)
    {
        parent::__construct($model, $repository);
    }
}
