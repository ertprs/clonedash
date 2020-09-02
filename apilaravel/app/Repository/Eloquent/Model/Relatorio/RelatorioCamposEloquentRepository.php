<?php

namespace App\Repository\Eloquent\Model\Relatorio;

use Illuminate\Support\Facades\DB;
use App\Model\Relatorio\RelatorioCampos;
use App\Repository\Eloquent\WebControlEloquentRepository;
use App\Repository\Contracts\Model\Relatorio\RelatorioCamposRepositoryInterface;

/**
 * @author Tiago Franco
 * Repositorio para metodos de consultas dos clientes
 * Todas as consultas deverá ser realizadas passando
 * a conexao atraves do metodo ::connection(connection)
 */
class RelatorioCamposEloquentRepository extends WebControlEloquentRepository implements RelatorioCamposRepositoryInterface
{
    protected $model;
    /**
     * Instantiate reporitory
     * 
     * @param RelatorioCampos $model
     */
    public function __construct(RelatorioCampos $model)
    {
        parent::__construct($model);
    }

    public function getCamposSelecionados(array $campos)
    {
        return DB::connection($this->model->getConnectionName())
            ->table("base_web_control.relatorios_campos as rc")
            ->select('rc.*')
            ->whereIn('nome_campo', $campos)
            ->orderBy('ordemApresentacao')
            ->get();
    }
}
