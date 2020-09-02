<?php

namespace App\Repository\Eloquent\Model\Venda;

use App\Model\Venda\Venda;
use Illuminate\Support\Facades\DB;
use App\Repository\Eloquent\WebControlEloquentRepository;
use App\Repository\Contracts\Model\Venda\VendaComandaRepositoryInterface;

/**
 * @author Tiago Franco
 * Repositorio para metodos de consultas dos clientes
 * Todas as consultas deverá ser realizadas passando
 * a conexao atraves do metodo ::connection(connection)
 * 
 * Repositorio fake para operacoes envolvendo vendas em comandas
 */
class VendaComandaEloquentRepository extends WebControlEloquentRepository implements VendaComandaRepositoryInterface
{
    protected $model;
    /**
     * Instantiate reporitory
     * 
     * @param Venda $model
     */
    public function __construct(Venda $model)
    {
        parent::__construct($model);
    }

    public function getProducaoItemVenda(int  $idItemVenda)
    {
        return DB::connection($this->model->getConnectionName())
            ->table("base_web_control.cm_producao")
            ->where([['idvenda_item', $idItemVenda]])
            ->first();
    }
}
