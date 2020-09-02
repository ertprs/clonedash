<?php

namespace App\Repository\Eloquent\Model\FormaPagamento;

use Illuminate\Support\Facades\DB;
use App\Model\FormaPagamento\ClienteFormaPagamento;
use App\Repository\Eloquent\WebControlEloquentRepository;
use App\Repository\Contracts\Model\FormaPagamento\ClienteFormaPagamentoRepositoryInterface;

/**
 * @author Tiago Franco
 * Repositorio para metodos de consultas dos clientes
 * Todas as consultas deverá ser realizadas passando
 * a conexao atraves do metodo ::connection(connection)
 */
class ClienteFormaPagamentoEloquentRepository extends WebControlEloquentRepository implements ClienteFormaPagamentoRepositoryInterface
{
    protected $model;
    /**
    * Instantiate reporitory
    * 
    * @param ClienteFormaPagamento $model
    */
    public function __construct(ClienteFormaPagamento $model)
    {
        parent::__construct($model);
    }

    public function retornaFormasPagamentosCadastro()
    {
        return DB::connection($this->model->getConnectionName())
        ->table("base_web_control.cliente_forma_pagamento as cp")
        ->select("cp.*", "fp.nome_reduzido","fp.descricao","fp.nome_reduzido2",DB::raw("fp.baixa_automatica as baixa_automatica_fp"))
        ->whereRaw("id_cadastro = ?", [$this->_usuarioLogadoService->getIdCadastroLogado()])
        ->join("base_web_control.forma_pagamento as fp", "cp.id_forma_pagamento", "fp.id")
        ->get();
    }
}