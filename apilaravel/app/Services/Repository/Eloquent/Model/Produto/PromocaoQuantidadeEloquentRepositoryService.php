<?php

namespace App\Services\Repository\Eloquent\Model\Produto;

use App\Model\Produto\PromocaoQuantidade;
use App\Repository\Eloquent\Model\Produto\PromocaoQuantidadeEloquentRepository;
use App\Services\Repository\Contracts\Model\Produto\PromocaoQuantidadeRepositoryServiceInterface;
use App\Services\Repository\Eloquent\WebControlEloquentRepositoryService;

/**
 * @author Tiago Franco
 * Servico de acesso ao repositorio de Model
 * Deverá possuir os metodos contendo operacoes de escrita 
 * do modelo implementando a interface do repositorio
 */
class PromocaoQuantidadeEloquentRepositoryService extends WebControlEloquentRepositoryService implements PromocaoQuantidadeRepositoryServiceInterface
{
    public function __construct(PromocaoQuantidade $model, PromocaoQuantidadeEloquentRepository $repository)
    {
        parent::__construct($model, $repository);
    }
}
