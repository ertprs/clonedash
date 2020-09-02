<?php

namespace App\Repository\Eloquent\Model\Venda;

use App\Model\Venda\VendaPagamento;
use App\Repository\Contracts\Model\Venda\VendaPagamentoRepositoryInterface;
use App\Repository\Eloquent\WebControlEloquentRepository;

/**
 * @author Tiago Franco
 * Repositorio para metodos de consultas dos clientes
 * Todas as consultas deverá ser realizadas passando
 * a conexao atraves do metodo ::connection(connection)
 */
class VendaPagamentoEloquentRepository extends WebControlEloquentRepository implements VendaPagamentoRepositoryInterface
{
    protected $model;
    /**
    * Instantiate reporitory
    * 
    * @param VendaPagamento $model
    */
    public function __construct(VendaPagamento $model)
    {
        parent::__construct($model);
    }
}