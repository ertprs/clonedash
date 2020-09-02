<?php

namespace App\Services\Repository\Eloquent\Model\Cs2;

use App\Model\Cs2\Cadastro;
use App\Repository\Eloquent\Model\Cs2\CadastroEloquentRepository;
use App\Services\Repository\Contracts\Model\Cs2\CadastroRepositoryServiceInterface;
use App\Services\Repository\Eloquent\WebControlEloquentRepositoryService;

/**
 * @author Tiago Franco
 * Servico de acesso ao repositorio de Model
 * Deverá possuir os metodos contendo operacoes de escrita 
 * do modelo implementando a interface do repositorio
 */
class CadastroEloquentRepositoryService extends WebControlEloquentRepositoryService implements CadastroRepositoryServiceInterface
{
    public function __construct(Cadastro $model, CadastroEloquentRepository $repository)
    {
        parent::__construct($model, $repository);
    }
}
