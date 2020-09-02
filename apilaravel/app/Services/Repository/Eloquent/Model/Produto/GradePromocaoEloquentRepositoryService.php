<?php

namespace App\Services\Repository\Eloquent\Model\Produto;

use App\Model\Produto\GradePromocao;
use App\Repository\Eloquent\Model\Produto\GradePromocaoEloquentRepository;
use App\Services\Repository\Contracts\Model\Produto\GradePromocaoRepositoryServiceInterface;
use App\Services\Repository\Eloquent\WebControlEloquentRepositoryService;

/**
 * @author Tiago Franco
 * Servico de acesso ao repositorio de Model
 * Deverá possuir os metodos contendo operacoes de escrita 
 * do modelo implementando a interface do repositorio
 */
class GradePromocaoEloquentRepositoryService extends WebControlEloquentRepositoryService implements GradePromocaoRepositoryServiceInterface
{
    public function __construct(GradePromocao $model, GradePromocaoEloquentRepository $repository)
    {
        parent::__construct($model, $repository);
    }
}
