<?php

namespace App\Repository\Eloquent\Model\Comanda;

use App\Model\Comanda\CmMesa;
use App\Model\Comanda\CmHistorico;
use Illuminate\Support\Facades\DB;
use App\Repository\Eloquent\WebControlEloquentRepository;
use App\Repository\Contracts\Model\Comanda\CmMesaRepositoryInterface;

/**
 * @author Tiago Franco
 * Repositorio para metodos de consultas dos clientes
 * Todas as consultas deverá ser realizadas passando
 * a conexao atraves do metodo ::connection(connection)
 */
class CmMesaEloquentRepository extends WebControlEloquentRepository implements CmMesaRepositoryInterface
{
    protected $model;
    /**
     * Instantiate reporitory
     * 
     * @param CmMesa $model
     */
    public function __construct(CmMesa $model)
    {
        parent::__construct($model);
    }

    /**
     * Funcao responsavel por retornar todas as mesas do cliente
     */
    public function getMesa(string $numeroMesa)
    {
        return DB::connection($this->model->getConnectionName())
            ->table("base_web_control.cm_mesa")
            ->where([['id_cadastro', $this->_usuarioLogadoService->getIdCadastroLogado()], ['num_mesa', $numeroMesa]])
            ->first();
    }

    /**
     * Funcao responsavel por retornar todas as mesas do cliente
     */
    public function listarMesas()
    {
        return DB::connection($this->model->getConnectionName())
            ->table("base_web_control.cm_mesa")
            ->where('id_cadastro', $this->_usuarioLogadoService->getIdCadastroLogado())
            ->get();
    }

    public function getHistoricoMesa(int $idMesa, $status = 1)
    {
        return DB::connection($this->model->getConnectionName())
            ->table("base_web_control.cm_historico")
            ->where([
                ['id_cadastro', $this->_usuarioLogadoService->getIdCadastroLogado()],
                ['id_mesa',    $idMesa],
                ['status',      $status]
            ])->orderBy('id', 'desc')
            ->first();
    }
}
