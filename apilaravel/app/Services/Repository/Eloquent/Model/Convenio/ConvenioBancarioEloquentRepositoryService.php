<?php

namespace App\Services\Repository\Eloquent\Model\Convenio;

use App\Model\Convenio\ConvenioBancario;
use App\Repository\Eloquent\Model\Convenio\ConvenioBancarioEloquentRepository;
use App\Services\Repository\Contracts\Model\Convenio\ConvenioBancarioRepositoryServiceInterface;
use App\Services\Repository\Eloquent\WebControlEloquentRepositoryService;

/**
 * @author Tiago Franco
 * Servico de acesso ao repositorio de Model
 * Deverá possuir os metodos contendo operacoes de escrita 
 * do modelo implementando a interface do repositorio
 */
class ConvenioBancarioEloquentRepositoryService extends WebControlEloquentRepositoryService implements ConvenioBancarioRepositoryServiceInterface
{
    public function __construct(ConvenioBancario $model, ConvenioBancarioEloquentRepository $repository)
    {
        parent::__construct($model, $repository);
    }
}
