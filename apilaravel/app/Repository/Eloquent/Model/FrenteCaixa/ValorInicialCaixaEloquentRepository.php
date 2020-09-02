<?php

namespace App\Repository\Eloquent\Model\FrenteCaixa;

use Illuminate\Support\Facades\DB;
use App\Model\FrenteCaixa\ValorInicialCaixa;
use App\Repository\Eloquent\WebControlEloquentRepository;
use App\Repository\Contracts\Model\FrenteCaixa\ValorInicialCaixaRepositoryInterface;

/**
 * @author Tiago Franco
 * Repositorio para metodos de consultas dos clientes
 * Todas as consultas deverá ser realizadas passando
 * a conexao atraves do metodo ::connection(connection)
 */
class ValorInicialCaixaEloquentRepository extends WebControlEloquentRepository implements ValorInicialCaixaRepositoryInterface
{
    protected $model;
    /**
     * Instantiate reporitory
     * 
     * @param ValorInicialCaixa $model
     */
    public function __construct(ValorInicialCaixa $model)
    {
        parent::__construct($model);
    }

    public function getLimiteSangria(array $informacoesCaixa)
    {
        $sql = "SELECT 
                    IFNULL(SUM(vp.valor_pgto - vp.vlr_troco),0) AS max_sangria,
                    vic.vlr_inicial as v_inicial,
                    vic.vr_extra_caixa as v_extra,
                    (SELECT IFNULL(SUM(vs.valor), 0) FROM base_web_control.valor_sangria vs WHERE vs.id_valor_inicial_caixa = :id_caixa1) as sangria
                FROM base_web_control.valor_inicial_caixa AS vic
                LEFT JOIN base_web_control.venda AS v
                    ON v.id_abertura_caixa = vic.id
                LEFT JOIN base_web_control.venda_pagamento AS vp
                    ON vp.id_venda = v.id
                WHERE vic.id = :id_caixa2
                      AND vic.num_caixa = :numero_caixa
                      AND v.situacao = 'C'
                      AND v.id_cadastro = :id_cadastro";

        $params[':id_caixa1']    = $informacoesCaixa["id"];
        $params[':id_caixa2']    = $informacoesCaixa["id"];
        $params[':numero_caixa'] = intval($informacoesCaixa["num-caixa"]);
        $params[':id_cadastro']  = $this->_usuarioLogadoService->getIdCadastroLogado();

        return DB::connection($this->model->getConnectionName())->select($sql, $params);
    }


    public function vericaSangria(array $informacoesCaixa)
    {
        return DB::connection($this->model->getConnectionName())
            ->table("base_web_control.valor_sangria")
            ->select("id", DB::raw("IF(NOW() - INTERVAL 3 MINUTE < data_hora,0,1) AS permitido_sangria"))
            ->whereRaw("id_cadastro = ? AND id_valor_inicial_caixa = ?", [$this->_usuarioLogadoService->getIdCadastroLogado(), $informacoesCaixa["id"]])
            ->orderBy("id", "DESC")
            ->first();
    }

    public function consultarCaixaAberto(string $numeroCaixa)
    {
        return DB::connection($this->model->getConnectionName())
        ->table("base_web_control.valor_inicial_caixa")
        ->select("id", "id_usuario","num_caixa", "vlr_inicial")
        ->whereRaw("status = 'I' AND data_hora_final IS NULL
                    AND id_cadastro = ?
                    AND num_caixa = ?" , [$this->_usuarioLogadoService->getIdCadastroLogado(), $numeroCaixa])
        ->orderBy("id", "DESC")
        ->first();
    }
}
