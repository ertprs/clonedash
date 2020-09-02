<?php

namespace App\Services\Repository\Eloquent\Model\Produto;

use App\Model\Produto\GradeHistorico;
use App\Repository\Eloquent\Model\Produto\GradeHistoricoEloquentRepository;
use App\Services\Repository\Contracts\Model\Produto\GradeHistoricoRepositoryServiceInterface;
use App\Services\Repository\Eloquent\WebControlEloquentRepositoryService;

/**
 * @author Tiago Franco
 * Servico de acesso ao repositorio de Model
 * Deverá possuir os metodos contendo operacoes de escrita 
 * do modelo implementando a interface do repositorio
 */
class GradeHistoricoEloquentRepositoryService extends WebControlEloquentRepositoryService implements GradeHistoricoRepositoryServiceInterface
{
    public function __construct(GradeHistorico $model, GradeHistoricoEloquentRepository $repository)
    {
        parent::__construct($model, $repository);
    }
}
