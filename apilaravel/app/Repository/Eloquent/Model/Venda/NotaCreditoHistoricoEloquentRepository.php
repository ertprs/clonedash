<?php

namespace App\Repository\Eloquent\Model\Venda;

use App\Model\Venda\NotaCreditoHistorico;
use App\Repository\Contracts\Model\Venda\NotaCreditoHistoricoRepositoryInterface;
use App\Repository\Eloquent\WebControlEloquentRepository;

/**
 * @author Tiago Franco
 * Repositorio para metodos de consultas dos clientes
 * Todas as consultas deverá ser realizadas passando
 * a conexao atraves do metodo ::connection(connection)
 */
class NotaCreditoHistoricoEloquentRepository extends WebControlEloquentRepository implements NotaCreditoHistoricoRepositoryInterface
{
    protected $model;
    /**
    * Instantiate reporitory
    * 
    * @param NotaCreditoHistorico $model
    */
    public function __construct(NotaCreditoHistorico $model)
    {
        parent::__construct($model);
    }
}