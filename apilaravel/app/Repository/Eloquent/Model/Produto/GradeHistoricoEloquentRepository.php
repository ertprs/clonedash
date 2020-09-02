<?php

namespace App\Repository\Eloquent\Model\Produto;

use Illuminate\Support\Facades\DB;
use App\Model\Produto\GradeHistorico;
use App\Repository\Eloquent\WebControlEloquentRepository;
use App\Repository\Contracts\Model\Produto\GradeHistoricoRepositoryInterface;

/**
 * @author Tiago Franco
 * Repositorio para metodos de consultas dos clientes
 * Todas as consultas deverá ser realizadas passando
 * a conexao atraves do metodo ::connection(connection)
 */
class GradeHistoricoEloquentRepository extends WebControlEloquentRepository implements GradeHistoricoRepositoryInterface
{
    protected $model;
    /**
    * Instantiate reporitory
    * 
    * @param GradeHistorico $model
    */
    public function __construct(GradeHistorico $model)
    {
        parent::__construct($model);
    }

    /**
     * Método para criar novo registro no grade histórico .
     * @param GradeModel informações vindas do select populam o insert dos historico da grade
     * @return void
     */
    public function getGradeHistoricosPosVenda(int $idVenda)
    {
        $sql = "SELECT 
                    gh.id_grade,
                    gh.id_cadastro,
                    gh.id_usuario,
                    gh.qtd_atual as qtd_antigo,
                    gh.qtd_atual - SUM(vi.qtd) as qtd_atual,                    
                    gh.codigo_barra_antigo,
                    gh.codigo_barra,
                    gh.valor_custo_antigo,
                    gh.valor_custo,
                    gh.valor_varejo_aprazo_antigo,
                    gh.valor_varejo_aprazo,
                    gh.valor_atacado_aprazo_antigo,
                    gh.valor_atacado_aprazo,
                    gh.ativo_antigo,
                    gh.ativo,
                    'Venda Pedido: $idVenda' as origem_alteracao
                FROM base_web_control.grade_historico as gh
                JOIN base_web_control.venda_itens vi ON vi.id_grade = gh.id_grade
                WHERE vi.id_venda = ? AND gh.id IN
                (SELECT 
                    MAX(gh.id) as id           
                FROM base_web_control.grade_historico as gh
                JOIN base_web_control.venda_itens vi ON vi.id_grade = gh.id_grade
                WHERE vi.id_venda = ?
                GROUP BY gh.id_grade)";

        return  DB::connection($this->model->getConnectionName())->select($sql, [$idVenda, $idVenda]);
    }
}