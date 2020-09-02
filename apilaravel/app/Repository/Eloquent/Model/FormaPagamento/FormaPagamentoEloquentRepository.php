<?php

namespace App\Repository\Eloquent\Model\FormaPagamento;

use App\Model\FormaPagamento\FormaPagamento;
use App\Repository\Contracts\Model\FormaPagamento\FormaPagamentoRepositoryInterface;
use App\Repository\Eloquent\WebControlEloquentRepository;

/**
 * @author Tiago Franco
 * Repositorio para metodos de consultas dos clientes
 * Todas as consultas deverá ser realizadas passando
 * a conexao atraves do metodo ::connection(connection)
 */
class FormaPagamentoEloquentRepository extends WebControlEloquentRepository implements FormaPagamentoRepositoryInterface
{
    protected $model;
    /**
    * Instantiate reporitory
    * 
    * @param FormaPagamento $model
    */
    public function __construct(FormaPagamento $model)
    {
        parent::__construct($model);
    }

    public function retornaFormasPagamentos()
    {
        return $this->model->all()->toArray();
    }
}