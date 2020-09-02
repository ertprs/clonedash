<?php

namespace App\Repository\Eloquent\Model\ContasPagar;

use Illuminate\Support\Facades\DB;
use App\Model\ContasPagar\ContasPagar;
use App\Repository\Eloquent\WebControlEloquentRepository;
use App\Repository\Contracts\Model\ContasPagar\ContasPagarRepositoryInterface;

/**
 * @author Tiago Franco
 * Repositorio para metodos de consultas dos clientes
 * Todas as consultas deverá ser realizadas passando
 * a conexao atraves do metodo ::connection(connection)
 */
class ContasPagarEloquentRepository extends WebControlEloquentRepository implements ContasPagarRepositoryInterface
{
    protected $model;
    /**
     * Instantiate reporitory
     * 
     * @param ContasPagar $model
     */
    public function __construct(ContasPagar $model)
    {
        parent::__construct($model);
    }

    public function getTotalContasPagar(array $informacoesCaixa)
    {
        return DB::connection($this->model->getConnectionName())
            ->table('base_web_control.contas_pagar')
            ->whereRaw(
                "id_cadastro = ? and id_abertura_caixa = ? and chave is not null and chave != ''",
                [$this->_usuarioLogadoService->getIdCadastroLogado(), $informacoesCaixa["id"]]
            )
            ->sum('valor_baixa');
    }
}
