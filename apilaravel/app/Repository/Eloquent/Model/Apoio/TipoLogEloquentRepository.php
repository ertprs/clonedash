<?php

namespace App\Repository\Eloquent\Model\Apoio;

use App\Model\Apoio\TipoLog;
use Illuminate\Support\Facades\DB;
use App\Repository\Eloquent\WebControlEloquentRepository;
use App\Repository\Contracts\Model\Apoio\TipoLogRepositoryInterface;

/**
 * @author Tiago Franco
 * Repositorio para metodos de consultas dos clientes
 * Todas as consultas deverá ser realizadas passando
 * a conexao atraves do metodo ::connection(connection)
 */
class TipoLogEloquentRepository extends WebControlEloquentRepository implements TipoLogRepositoryInterface
{
    protected $model;
    /**
     * Instantiate reporitory
     * 
     * @param TipoLog $model
     */
    public function __construct(TipoLog $model)
    {
        parent::__construct($model);
    }

    public function getTipoLogradourosCombo()
    {
        $sql = "SELECT
                        id
                    , UPPER(descricao) AS descricao
                FROM
                    apoio.Tipo_Log";

        $tipoLogradouros = DB::connection($this->model->getConnectionName())->select($sql);

        return array_column($tipoLogradouros, "descricao", "id");
    }
}
