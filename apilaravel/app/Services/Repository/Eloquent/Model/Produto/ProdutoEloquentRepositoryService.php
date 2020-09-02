<?php

namespace App\Services\Repository\Eloquent\Model\Produto;

use App\Model\Produto\Produto;
use App\Repository\Eloquent\Model\Produto\ProdutoEloquentRepository;
use App\Services\Repository\Contracts\Model\Produto\ProdutoRepositoryServiceInterface;
use App\Services\Repository\Eloquent\WebControlEloquentRepositoryService;

/**
 * @author Tiago Franco
 * Servico de acesso ao repositorio de Model
 * Deverá possuir os metodos contendo operacoes de escrita 
 * do modelo implementando a interface do repositorio
 */
class ProdutoEloquentRepositoryService extends WebControlEloquentRepositoryService implements ProdutoRepositoryServiceInterface
{
    public function __construct(Produto $model, ProdutoEloquentRepository $repository)
    {
        parent::__construct($model, $repository);
    }
}
