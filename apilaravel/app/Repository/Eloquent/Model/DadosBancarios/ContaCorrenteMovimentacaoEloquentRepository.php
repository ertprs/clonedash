<?php

namespace App\Repository\Eloquent\Model\DadosBancarios;

use Illuminate\Support\Facades\DB;
use App\Model\DadosBancarios\ContaCorrente;
use App\Model\DadosBancarios\ContaCorrenteMovimentacao;
use App\Repository\Eloquent\WebControlEloquentRepository;
use App\Repository\Contracts\Model\DadosBancarios\ContaCorrenteMovimentacaoRepositoryInterface;

/**
 * @author Tiago Franco
 * Repositorio para metodos de consultas dos clientes
 * Todas as consultas deverá ser realizadas passando
 * a conexao atraves do metodo ::connection(connection)
 */
class ContaCorrenteMovimentacaoEloquentRepository extends WebControlEloquentRepository implements ContaCorrenteMovimentacaoRepositoryInterface
{
    protected $model;
    /**
     * Instantiate reporitory
     * 
     * @param ContaCorrenteMovimentacao $model
     */
    public function __construct(ContaCorrenteMovimentacao $model)
    {
        parent::__construct($model);
    }

    public function getCCCliente(int $idCliente)
    {
        return DB::connection($this->model->getConnectionName())
            ->table("base_web_control.conta_corrente")
            ->whereRaw("id_cadastro = ? and id_cliente = ?", [$this->_usuarioLogadoService->getIdCadastroLogado(), $idCliente])->first();
    }
}
