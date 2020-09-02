<?php

namespace App\Repository\Eloquent\Model\FrenteCaixa;

use App\Model\FrenteCaixa\FcVenda;
use App\Repository\Contracts\Model\FrenteCaixa\FcVendaRepositoryInterface;
use App\Repository\Eloquent\WebControlEloquentRepository;

/**
 * @author Tiago Franco
 * Repositorio para metodos de consultas dos clientes
 * Todas as consultas deverá ser realizadas passando
 * a conexao atraves do metodo ::connection(connection)
 */
class FcVendaEloquentRepository extends WebControlEloquentRepository implements FcVendaRepositoryInterface
{
    protected $model;
    /**
    * Instantiate reporitory
    * 
    * @param FcVenda $model
    */
    public function __construct(FcVenda $model)
    {
        parent::__construct($model);
    }
}