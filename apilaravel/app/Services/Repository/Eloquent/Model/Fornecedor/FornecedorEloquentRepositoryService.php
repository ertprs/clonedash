<?php

namespace App\Services\Repository\Eloquent\Model\Fornecedor;

use App\Model\Fornecedor\Fornecedor;
use App\Repository\Eloquent\Model\Fornecedor\FornecedorEloquentRepository;
use App\Services\Repository\Contracts\Model\Fornecedor\FornecedorRepositoryServiceInterface;
use App\Services\Repository\Eloquent\WebControlEloquentRepositoryService;

/**
 * @author Tiago Franco
 * Servico de acesso ao repositorio de Model
 * Deverá possuir os metodos contendo operacoes de escrita 
 * do modelo implementando a interface do repositorio
 */
class FornecedorEloquentRepositoryService extends WebControlEloquentRepositoryService implements FornecedorRepositoryServiceInterface
{
    public function __construct(Fornecedor $model, FornecedorEloquentRepository $repository)
    {
        parent::__construct($model, $repository);
    }
}
