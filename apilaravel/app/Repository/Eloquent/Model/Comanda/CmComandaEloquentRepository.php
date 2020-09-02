<?php

namespace App\Repository\Eloquent\Model\Comanda;

use App\Model\Comanda\CmComanda;
use Illuminate\Support\Facades\DB;
use App\Repository\Eloquent\WebControlEloquentRepository;
use App\Repository\Contracts\Model\Comanda\CmComandaRepositoryInterface;

/**
 * @author Tiago Franco
 * Repositorio para metodos de consultas dos clientes
 * Todas as consultas deverá ser realizadas passando
 * a conexao atraves do metodo ::connection(connection)
 */
class CmComandaEloquentRepository extends WebControlEloquentRepository implements CmComandaRepositoryInterface
{
    protected $model;
    /**
     * Instantiate reporitory
     * 
     * @param CmComanda $model
     */
    public function __construct(CmComanda $model)
    {
        parent::__construct($model);
    }

    public function getComandas($ativas = true)
    {
        $where = [['id_cadastro', $this->_usuarioLogadoService->getIdCadastroLogado()]];
        if ($ativas)
            $where[] = ['status', 1];

        return DB::connection($this->model->getConnectionName())
            ->table("base_web_control.cm_comanda")
            ->where($where)->get();
    }

    public function getComanda(string $numeroComanda, $ativa = true)
    {
        $where   = [['id_cadastro', $this->_usuarioLogadoService->getIdCadastroLogado()]];
        $where[] = ['num_comanda', $numeroComanda];

        if ($ativa)
            $where[] = ['status', 1];

        return DB::connection($this->model->getConnectionName())
            ->table("base_web_control.cm_comanda")
            ->where($where)
            ->first();
    }

    public function getHistoricoComanda(string $numeroComanda)
    {
        //Procura histórico da comanda
        return DB::connection($this->model->getConnectionName())
            ->table("base_web_control.cm_historico")
            ->where([
                ['id_cadastro', $this->_usuarioLogadoService->getIdCadastroLogado()],
                ['num_cm', $numeroComanda],
                ['status', 1]
            ])
            ->first();
    }
}
