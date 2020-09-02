<?php

namespace App\Services\Repository\Eloquent\Model\Produto;

use App\Model\Produto\Classificacao;
use App\Repository\Eloquent\Model\Produto\ClassificacaoEloquentRepository;
use App\Services\Repository\Contracts\Model\Produto\ClassificacaoRepositoryServiceInterface;
use App\Services\Repository\Eloquent\WebControlEloquentRepositoryService;

/**
 * @author Tiago Franco
 * Servico de acesso ao repositorio de Model
 * Deverá possuir os metodos contendo operacoes de escrita 
 * do modelo implementando a interface do repositorio
 */
class ClassificacaoEloquentRepositoryService extends WebControlEloquentRepositoryService implements ClassificacaoRepositoryServiceInterface
{
    public function __construct(Classificacao $model, ClassificacaoEloquentRepository $repository)
    {
        parent::__construct($model, $repository);
    }
}
