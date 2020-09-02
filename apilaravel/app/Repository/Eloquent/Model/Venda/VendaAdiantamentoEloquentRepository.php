<?php

namespace App\Repository\Eloquent\Model\Venda;

use App\Model\Venda\VendaAdiantamento;
use App\Repository\Contracts\Model\Venda\VendaAdiantamentoRepositoryInterface;
use App\Repository\Eloquent\WebControlEloquentRepository;

/**
 * @author Tiago Franco
 * Repositorio para metodos de consultas dos clientes
 * Todas as consultas deverá ser realizadas passando
 * a conexao atraves do metodo ::connection(connection)
 */
class VendaAdiantamentoEloquentRepository extends WebControlEloquentRepository implements VendaAdiantamentoRepositoryInterface
{
    protected $model;
    /**
    * Instantiate reporitory
    * 
    * @param VendaAdiantamento $model
    */
    public function __construct(VendaAdiantamento $model)
    {
        parent::__construct($model);
    }
}