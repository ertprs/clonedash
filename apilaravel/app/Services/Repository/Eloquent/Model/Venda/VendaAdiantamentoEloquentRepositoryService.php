<?php

namespace App\Services\Repository\Eloquent\Model\Venda;

use App\Model\Venda\VendaAdiantamento;
use App\Repository\Eloquent\Model\Venda\VendaAdiantamentoEloquentRepository;
use App\Services\Repository\Contracts\Model\Venda\VendaAdiantamentoRepositoryServiceInterface;
use App\Services\Repository\Eloquent\WebControlEloquentRepositoryService;

/**
 * @author Tiago Franco
 * Servico de acesso ao repositorio de Model
 * Deverá possuir os metodos contendo operacoes de escrita 
 * do modelo implementando a interface do repositorio
 */
class VendaAdiantamentoEloquentRepositoryService extends WebControlEloquentRepositoryService implements VendaAdiantamentoRepositoryServiceInterface
{
    public function __construct(VendaAdiantamento $model, VendaAdiantamentoEloquentRepository $repository)
    {
        parent::__construct($model, $repository);
    }
}
