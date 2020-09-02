<?php

namespace App\Services\Repository\Eloquent\Model\Venda;

use App\Model\Venda\VendaItem;
use App\Repository\Eloquent\Model\Venda\VendaItemEloquentRepository;
use App\Services\Repository\Contracts\Model\Venda\VendaItemRepositoryServiceInterface;
use App\Services\Repository\Eloquent\WebControlEloquentRepositoryService;

/**
 * @author Tiago Franco
 * Servico de acesso ao repositorio de Model
 * Deverá possuir os metodos contendo operacoes de escrita 
 * do modelo implementando a interface do repositorio
 */
class VendaItemEloquentRepositoryService extends WebControlEloquentRepositoryService implements VendaItemRepositoryServiceInterface
{
    public function __construct(VendaItem $model, VendaItemEloquentRepository $repository)
    {
        parent::__construct($model, $repository);
    }
}
