<?php

namespace App\Repository\Eloquent\Model\Boleto;

use App\Model\Boleto\BoletosTitulosRecebaFacil;
use App\Repository\Contracts\Model\Boleto\BoletosTitulosRecebaFacilRepositoryInterface;
use App\Repository\Eloquent\WebControlEloquentRepository;

/**
 * @author Tiago Franco
 * Repositorio para metodos de consultas dos clientes
 * Todas as consultas deverá ser realizadas passando
 * a conexao atraves do metodo ::connection(connection)
 */
class BoletosTitulosRecebaFacilEloquentRepository extends WebControlEloquentRepository implements BoletosTitulosRecebaFacilRepositoryInterface
{
    protected $model;
    /**
    * Instantiate reporitory
    * 
    * @param BoletosTitulosRecebaFacil $model
    */
    public function __construct(BoletosTitulosRecebaFacil $model)
    {
        parent::__construct($model);
    }
}