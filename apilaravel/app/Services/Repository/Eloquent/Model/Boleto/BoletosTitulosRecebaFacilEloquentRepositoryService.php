<?php

namespace App\Services\Repository\Eloquent\Model\Boleto;

use App\Model\Boleto\BoletosTitulosRecebaFacil;
use App\Repository\Eloquent\Model\Boleto\BoletosTitulosRecebaFacilEloquentRepository;
use App\Services\Repository\Contracts\Model\Boleto\BoletosTitulosRecebaFacilRepositoryServiceInterface;
use App\Services\Repository\Eloquent\WebControlEloquentRepositoryService;

/**
 * @author Tiago Franco
 * Servico de acesso ao repositorio de Model
 * Deverá possuir os metodos contendo operacoes de escrita 
 * do modelo implementando a interface do repositorio
 */
class BoletosTitulosRecebaFacilEloquentRepositoryService extends WebControlEloquentRepositoryService implements BoletosTitulosRecebaFacilRepositoryServiceInterface
{
    public function __construct(BoletosTitulosRecebaFacil $model, BoletosTitulosRecebaFacilEloquentRepository $repository)
    {
        parent::__construct($model, $repository);
    }
}
