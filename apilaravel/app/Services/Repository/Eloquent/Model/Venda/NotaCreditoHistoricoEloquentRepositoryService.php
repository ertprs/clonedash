<?php

namespace App\Services\Repository\Eloquent\Model\Venda;

use App\Model\Venda\NotaCreditoHistorico;
use App\Services\Repository\Eloquent\WebControlEloquentRepositoryService;
use App\Repository\Eloquent\Model\Venda\NotaCreditoHistoricoEloquentRepository;
use App\Services\Repository\Contracts\Model\Venda\NotaCreditoHistoricoRepositoryServiceInterface;

/**
 * @author Tiago Franco
 * Servico de acesso ao repositorio de Model
 * Deverá possuir os metodos contendo operacoes de escrita 
 * do modelo implementando a interface do repositorio
 */
class NotaCreditoHistoricoEloquentRepositoryService extends WebControlEloquentRepositoryService implements NotaCreditoHistoricoRepositoryServiceInterface
{
    public function __construct(NotaCreditoHistorico $model, NotaCreditoHistoricoEloquentRepository $repository)
    {
        parent::__construct($model, $repository);
    }
}
