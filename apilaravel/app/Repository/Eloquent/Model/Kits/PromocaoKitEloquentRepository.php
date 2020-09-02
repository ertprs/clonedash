<?php

namespace App\Repository\Eloquent\Model\Kits;

use App\Model\Kits\PromocaoKit;
use Illuminate\Support\Facades\DB;
use App\Repository\Eloquent\WebControlEloquentRepository;
use App\Repository\Contracts\Model\Kits\PromocaoKitRepositoryInterface;

/**
 * @author Tiago Franco
 * Repositorio para metodos de consultas dos clientes
 * Todas as consultas deverá ser realizadas passando
 * a conexao atraves do metodo ::connection(connection)
 */
class PromocaoKitEloquentRepository extends WebControlEloquentRepository implements PromocaoKitRepositoryInterface
{
    protected $model;
    /**
     * Instantiate reporitory
     * 
     * @param PromocaoKit $model
     */
    public function __construct(PromocaoKit $model)
    {
        parent::__construct($model);
    }

    public function getKitsCodigoBarras(string $codigoBarras)
    {
        $sql = 'SELECT
                    pkg.qtde AS qtd,
                    p.id AS id_produto,
                    CONCAT(p.descricao, " - ", base_web_control.fn_get_descricao_grade(g.id_grade_atributo_valor)) AS nome_produto,
                    c.descricao AS classificacao,
                    g.codigo_barra,
                    IF(pkg.preco_fixo = "S", g.valor_varejo_aprazo,pkg.vlr_custo_promocao/pkg.qtde) AS preco_tabela,
                    IF(pkg.preco_fixo = "S", g.valor_varejo_aprazo,pkg.vlr_custo_promocao/pkg.qtde) AS preco_venda,
                    p.id_unidade,
                    g.valor_custo as valor_preco_custo,
                    g.id_grade,
                    pro.id AS id_kit,
                    pro.descricao as descricao_kit
                FROM base_web_control.promocao_kit pro
                INNER JOIN base_web_control.promocao_kit_grade pkg
                ON pkg.id_promocao_kit = pro.id
                INNER JOIN base_web_control.grade g
                ON pkg.id_grade = g.id_grade
                INNER JOIN base_web_control.produto p
                ON p.id = g.id_produto
                LEFT JOIN base_web_control.classificacao c
                ON c.id = p.id_classificacao
                WHERE pro.codigo_barra = ?
                AND pro.id_cadastro = ?
                AND pro.ativo = "A"
                GROUP BY g.codigo_barra
                ORDER BY pro.id, p.descricao';

        return DB::connection($this->model->getConnectionName())->select($sql, [$codigoBarras, $this->_usuarioLogadoService->getIdCadastroLogado()]);
    }
}
