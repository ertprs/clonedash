<?php

namespace App\Repository\Eloquent\Model\Localizacao;

use App\Model\Localizacao\Estados;
use Illuminate\Support\Facades\DB;
use App\Repository\Eloquent\WebControlEloquentRepository;
use App\Repository\Contracts\Model\Localizacao\EstadosRepositoryInterface;

/**
 * @author Tiago Franco
 * Repositorio para metodos de consultas dos clientes
 * Todas as consultas deverá ser realizadas passando
 * a conexao atraves do metodo ::connection(connection)
 */
class EstadosEloquentRepository extends WebControlEloquentRepository implements EstadosRepositoryInterface
{
    protected $model;
    /**
     * Instantiate reporitory
     * 
     * @param Estados $model
     */
    public function __construct(Estados $model)
    {
        parent::__construct($model);
    }

    public function getUF()
    {
        $sql = "SELECT
                    id
                    , sigla
                FROM
                    base_web_control.estados";

        $tipoLogradouros = DB::connection($this->model->getConnectionName())->select($sql);

        return array_column($tipoLogradouros, "sigla", "id");
    }
}
