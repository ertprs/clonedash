<?php

namespace App\Repository\Eloquent\Model\Cs2;

use App\Model\Cs2\ControlesBoleto;
use App\Repository\Contracts\Model\Cs2\ControlesBoletoRepositoryInterface;
use App\Repository\Eloquent\WebControlEloquentRepository;

/**
 * @author Tiago Franco
 * Repositorio para metodos de consultas dos clientes
 * Todas as consultas deverá ser realizadas passando
 * a conexao atraves do metodo ::connection(connection)
 */
class ControlesBoletoEloquentRepository extends WebControlEloquentRepository implements ControlesBoletoRepositoryInterface
{
    protected $model;
    /**
     * Instantiate reporitory
     * 
     * @param ControlesBoleto $model
     */
    public function __construct(ControlesBoleto $model)
    {
        parent::__construct($model);
    }

    public function getConfigControlesBoleto()
    {
        return ControlesBoleto::select('*')->first();
    }
}
