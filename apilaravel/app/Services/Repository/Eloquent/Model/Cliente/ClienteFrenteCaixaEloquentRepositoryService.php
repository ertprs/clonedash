<?php

namespace App\Services\Repository\Eloquent\Model\Cliente;

use App\Model\Cliente\Cliente;
use App\Repository\Eloquent\Model\Cliente\ClienteFrenteCaixaEloquentRepository;
use App\Services\Repository\Contracts\Model\Cliente\ClienteFrenteCaixaRepositoryServiceInterface;
use App\Services\Repository\Eloquent\WebControlEloquentRepositoryService;

/**
 * @author Tiago Franco
 * Servico de acesso ao repositorio de Model
 * Deverá possuir os metodos contendo operacoes de escrita 
 * do modelo implementando a interface do repositorio
 * Repositorio Service fake apontando para o model de clientes
 */
class ClienteFrenteCaixaEloquentRepositoryService extends WebControlEloquentRepositoryService implements ClienteFrenteCaixaRepositoryServiceInterface
{
    public function __construct(Cliente $model, ClienteFrenteCaixaEloquentRepository $repository)
    {
        parent::__construct($model, $repository);
    }
}
