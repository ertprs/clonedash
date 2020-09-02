<?php

namespace App\Repository\Eloquent\Model\Venda;

use App\Model\Venda\Carne;
use Illuminate\Support\Facades\DB;
use App\Repository\Eloquent\WebControlEloquentRepository;
use App\Repository\Contracts\Model\Venda\CarneRepositoryInterface;

/**
 * @author Tiago Franco
 * Repositorio para metodos de consultas dos clientes
 * Todas as consultas deverá ser realizadas passando
 * a conexao atraves do metodo ::connection(connection)
 */
class CarneEloquentRepository extends WebControlEloquentRepository implements CarneRepositoryInterface
{
    protected $model;
    /**
     * Instantiate reporitory
     * 
     * @param Carne $model
     */
    public function __construct(Carne $model)
    {
        parent::__construct($model);
    }

    public function getTotalCarne(array $informacoesCaixa)
    {
        return DB::connection($this->model->getConnectionName())
            ->table('base_web_control.carne')
            ->whereRaw("id_cadastro = ? and id_abertura_caixa = ?", [$this->_usuarioLogadoService->getIdCadastroLogado(), $informacoesCaixa["id"]])
            ->sum('valor_baixa');
    }
}
