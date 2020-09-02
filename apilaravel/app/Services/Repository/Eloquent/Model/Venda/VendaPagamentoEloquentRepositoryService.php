<?php

namespace App\Services\Repository\Eloquent\Model\Venda;

use App\Model\Venda\VendaPagamento;
use App\Repository\Eloquent\Model\Venda\VendaPagamentoEloquentRepository;
use App\Services\Repository\Contracts\Model\Venda\VendaPagamentoRepositoryServiceInterface;
use App\Services\Repository\Eloquent\WebControlEloquentRepositoryService;

/**
 * @author Tiago Franco
 * Servico de acesso ao repositorio de Model
 * Deverá possuir os metodos contendo operacoes de escrita 
 * do modelo implementando a interface do repositorio
 */
class VendaPagamentoEloquentRepositoryService extends WebControlEloquentRepositoryService implements VendaPagamentoRepositoryServiceInterface
{
    public function __construct(VendaPagamento $model, VendaPagamentoEloquentRepository $repository)
    {
        parent::__construct($model, $repository);
    }
}
