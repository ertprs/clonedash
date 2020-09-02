<?php

namespace App\Repository\Eloquent\Model\Produto;

use App\Model\Produto\Produto;
use App\Repository\Contracts\Model\Produto\ProdutoFrenteCaixaRepositoryInterface;
use App\Repository\Eloquent\WebControlEloquentRepository;

/**
 * @author Tiago Franco
 * Repositorio para metodos de consultas dos clientes
 * Todas as consultas deverá ser realizadas passando
 * a conexao atraves do metodo ::connection(connection)
 * Repositorio fake para centralizacao das operacoes de produtos na frente de caixa
 */
class ProdutoFrenteCaixaEloquentRepository extends WebControlEloquentRepository implements ProdutoFrenteCaixaRepositoryInterface
{
    protected $model;
    /**
    * Instantiate reporitory
    * 
    * @param Produto $model
    */
    public function __construct(Produto $model)
    {
        parent::__construct($model);
    }
}