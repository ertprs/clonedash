<?php

namespace App\Services\Repository\Eloquent\Model\Cs2;

use App\Model\Cs2\ControlesBoleto;
use Illuminate\Support\Facades\DB;
use App\Repository\Eloquent\Model\Cs2\ControlesBoletoEloquentRepository;
use App\Services\Repository\Eloquent\WebControlEloquentRepositoryService;
use App\Services\Repository\Contracts\Model\Cs2\ControlesBoletoRepositoryServiceInterface;

/**
 * @author Tiago Franco
 * Servico de acesso ao repositorio de Model
 * Deverá possuir os metodos contendo operacoes de escrita 
 * do modelo implementando a interface do repositorio
 */
class ControlesBoletoEloquentRepositoryService extends WebControlEloquentRepositoryService implements ControlesBoletoRepositoryServiceInterface
{
    public function __construct(ControlesBoleto $model, ControlesBoletoEloquentRepository $repository)
    {
        parent::__construct($model, $repository);
    }

    public function updateRecebeFacil(int $contador)
    {
        return DB::connection($this->model->getConnectionName())->update("update  cs2.controle_boletos set contador_recebafacil = ? where 1=1", [$contador]);
    }
}
