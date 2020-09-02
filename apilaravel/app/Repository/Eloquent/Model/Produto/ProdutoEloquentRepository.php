<?php

namespace App\Repository\Eloquent\Model\Produto;

use App\DTO\ProdutoDTO;
use App\Model\Produto\Produto;
use Illuminate\Support\Facades\DB;
use App\DTO\Produtos\PesquisaProdutoPorNomeDTO;
use App\Repository\Eloquent\WebControlEloquentRepository;
use App\Repository\Contracts\Model\Produto\ProdutoRepositoryInterface;

/**
 * @author Tiago Franco
 * Repositorio para metodos de consultas dos clientes
 * Todas as consultas deverá ser realizadas passando
 * a conexao atraves do metodo ::connection(connection)
 */
class ProdutoEloquentRepository extends WebControlEloquentRepository implements ProdutoRepositoryInterface
{
    protected $model;
    /**
     * Instantiate reporitory
     * 
     * @param Produto $model
     */
    public function __construct(Produto $model)
    {
        parent::__construct($model);
    }

    public function getVendasConcluidasProduto(string $codigoBarra)
    {
        $sql = "SELECT
                    g.id_grade,
                    g.codigo_barra,
                    IFNULL(CONCAT(p.descricao, ' | ', (SELECT
                        GROUP_CONCAT(
                        p.atributo,
                        '-', vpg.valor ORDER BY p.atributo ASC)
                        FROM base_web_control.grade_atributo_valor vpg
                        INNER JOIN base_web_control.grade_atributo p
                        ON p.id_grade_atributo = vpg.id_atributo
                        WHERE FIND_IN_SET(vpg.id_grade_atributo_valor,g.id_grade_atributo_valor)
                    )), p.descricao) AS descricao,
                    valor_varejo_aprazo AS valor,
                    valor_atacado_aprazo AS valor_atacado
                FROM base_web_control.grade g
                INNER JOIN base_web_control.produto p 
                ON p.id = g.id_produto
                WHERE (g.codigo_barra = :codigo_barra OR p.descricao LIKE  :descricao)
                AND g.id_cadastro = :id_cadastro
                AND g.ativo = 1";

        $params[':codigo_barra'] = $codigoBarra;
        $params[':id_cadastro']  = $this->_usuarioLogadoService->getIdCadastroLogado();
        $params[':descricao']    = '%' . $codigoBarra . '%';

        return DB::connection($this->model->getConnectionName())->select($sql, $params);
    }

    public function pesquisaKitsCombo(string $termoPesquisa)
    {
        $sql = "SELECT
                        pk.codigo_barra,
                        pk.descricao as produto,
                        FORMAT(SUM(pkg.vlr_custo_promocao),2,'de_DE') AS valor_unitario,
                        '' as identificacao_interna,
                        'Kit / Combo' as classificacao
                FROM base_web_control.promocao_kit pk
                INNER JOIN base_web_control.promocao_kit_grade pkg
                ON pkg.id_promocao_kit = pk.id
                WHERE pk.id_cadastro = :id_cadastro
                AND (pk.codigo_barra LIKE :codigo_barra OR pk.descricao LIKE :descricao)
                AND pk.ativo = 'A'
                GROUP BY pk.id";

        $params[':codigo_barra'] = $termoPesquisa;
        $params[':id_cadastro']  = $this->_usuarioLogadoService->getIdCadastroLogado();
        $params[':descricao']    = '%' . $termoPesquisa . '%';

        return DB::connection($this->model->getConnectionName())->select($sql, $params);
    }

    public function pesquisaDetalhada(string $termoPesquisa)
    {
        $sql = "SELECT
                        prod.codigo_barra as codigo_barra,
                        prod.descricao as produto,
                        prod.identificacao_interna as identificacao_interna,
                        prod.custo_medio_venda as valor_unitario,
                        g.qtd_atual as qtd_atual,
                        CONCAT(g.qtd_atual,'|',bwcu.sigla) AS qtd_atual_label,
                        bwcc.descricao AS classificacao
                FROM base_web_control.produto prod
                INNER JOIN base_web_control.grade g ON g.id_produto = prod.id 
                LEFT JOIN base_web_control.unidade AS bwcu ON bwcu.id = prod.id_unidade
                LEFT JOIN base_web_control.classificacao AS bwcc ON bwcc.id = prod.id_classificacao
                WHERE prod.id_cadastro = :id_cadastro
                AND prod.descricao_detalhada LIKE :descricao
                AND prod.ativo = 'A'";

        $params[':id_cadastro']  = $this->_usuarioLogadoService->getIdCadastroLogado();
        $params[':descricao']    = '%' . $termoPesquisa . '%';

        return DB::connection($this->model->getConnectionName())->select($sql, $params);
    }

    public function pesquisaPorNome(PesquisaProdutoPorNomeDTO $pesquisaProdutoPorNomeDTO)
    {
        $sql = $this->getSqlPesquisaProduto();

        $params = [$this->_usuarioLogadoService->getIdCadastroLogado()];

        //setado ao menos um termo de pesquisa ?
        $descricoes = $pesquisaProdutoPorNomeDTO->getDescricoes();

        //seta as descricoes
        foreach ($descricoes as $descricao) {
            $sql     .= " AND bwcp.descricao LIKE ? ";
            $params[] = $this->getParamsNomeLike($descricao, $pesquisaProdutoPorNomeDTO);
        }

        if (!empty($pesquisaProdutoPorNomeDTO->getDescricaoDetalhada())) {
            $sql .= " AND bwcp.descricao_detalhada LIKE ? ";
            $params[] = $this->getParamsNomeLike($pesquisaProdutoPorNomeDTO->getDescricaoDetalhada(), $pesquisaProdutoPorNomeDTO);
        }

        $sql .= " ORDER BY bwcp.descricao";

        return DB::connection($this->model->getConnectionName())->select($sql, $params);
    }

    public function pesquisaProdutoPorClassificacao(string $classificaco)
    {
        $sql    = $this->getSqlPesquisaProduto();
        $sql   .= " AND bwcc.descricao LIKE ?";
        $params = [$this->_usuarioLogadoService->getIdCadastroLogado(), "%" . $classificaco . "%"];
        $sql   .= " ORDER BY bwcp.descricao";

        return DB::connection($this->model->getConnectionName())->select($sql, $params);
    }

    public function pesquisaProdutoPorIdInterna(string $idInterna)
    {
        $sql    = $this->getSqlPesquisaProduto();
        $sql   .= " AND bwcp.identificacao_interna LIKE ?";
        $params = [$this->_usuarioLogadoService->getIdCadastroLogado(), "%" . $idInterna . "%"];
        $sql   .= " ORDER BY bwcp.descricao";

        return DB::connection($this->model->getConnectionName())->select($sql, $params);
    }

    private function getSqlPesquisaProduto()
    {
        return "SELECT
                        bwcp.id AS id_produto
                    , IFNULL(bwcp.identificacao_interna,'') AS identificacao_interna
                    , grd.codigo_barra
                    , grd.codigo_barra_pai
                    , bwcp.descricao AS produto
                    , grd.valor_custo AS valor_custo
                    , grd.valor_varejo_aprazo AS valor_unitario
                    , IF(grd.valor_atacado_aprazo IS NULL || grd.valor_atacado_aprazo = '' || grd.valor_atacado_aprazo = 0.00,grd.valor_varejo_aprazo,grd.valor_atacado_aprazo) AS valor_unitario_atacado
                    , bwcc.descricao AS classificacao
                    , bwcu.sigla
                    , bwcu.id AS id_unidade
                    , bwcp.solicitar_vrtotal
                    , bwcp.casas_decimais
                    , bwcp.locacao_quantidade
                    , bwcp.qtd_minima AS estoque_minimo
                    , bwcp.vender_estoque_zerado
                    , IF(bwcp.prod_serv = 'P',grd.qtd_atual,0) as qtd_atual
                    , CONCAT(IFNULL(IF(bwcp.prod_serv = 'P',grd.qtd_atual,0),0), '|', bwcu.sigla) AS qtd_atual_label
                    ,(

                            SELECT 
                                GROUP_CONCAT(p.atributo, '-', vpg.valor,' ')
                        FROM base_web_control.grade_atributo_valor vpg
                        INNER JOIN base_web_control.grade_atributo p
                        ON p.id_grade_atributo = vpg.id_atributo
                        WHERE 
                            FIND_IN_SET(vpg.id_grade_atributo_valor,grd.id_grade_atributo_valor)
                        ) 
                        AS caracteristicas
                    , grd.id_grade
                    , bwcp.truncar_vlr_total
                FROM base_web_control.produto AS bwcp
                    INNER JOIN base_web_control.grade AS grd ON grd.id_produto = bwcp.id AND
                        grd.codigo_barra_pai = grd.codigo_barra AND grd.id_cadastro = bwcp.id_cadastro
                    LEFT JOIN base_web_control.classificacao AS bwcc ON bwcc.id = bwcp.id_classificacao
                    LEFT JOIN base_web_control.unidade AS bwcu ON bwcu.id = bwcp.id_unidade
                WHERE
                        bwcp.id_cadastro = ?
                        AND grd.ativo = 1
                        AND bwcp.ativo = 'A'";
    }

    private function getParamsNomeLike(string $termoPesquisa, PesquisaProdutoPorNomeDTO $dto)
    {
        return ($dto->getInicioCom() ? "" : "%") . $termoPesquisa . "%";
    }

    public function getProdutoGorjeta()
    {
        return DB::connection($this->model->getConnectionName())
            ->table("base_web_control.produto as p")
            ->select("p.*")
            ->join('base_web_control.grade as g', 'g.id_produto', 'p.id')
            ->where([
                ['p.id_cadastro', $this->_usuarioLogadoService->getIdCadastroLogado()],
                ['deletar', 'N'],
                ['prod_serv', 'P'],
                ['descricao', 'LIKE', '%GORJETA%']
            ])
            ->first();
    }

    public function getProdutosGradesDaCategoria(int $idCategoria)
    {
        return DB::connection($this->model->getConnectionName())
            ->table("base_web_control.produto as p")
            ->select('p.id', 'p.descricao', 'p.codigo_barra', 'p.custo_medio_venda', 'g.id_grade')
            ->join('base_web_control.grade as g', function ($join) {
                $join->on('g.id_produto', 'p.id');
                $join->on('g.codigo_barra', 'p.codigo_barra');
            })
            ->where([
                ['p.id_cadastro', '=', $this->_usuarioLogadoService->getIdCadastroLogado()],
                ['id_classificacao', $idCategoria],
                ['p.ativo', 'A']
            ])
            ->orderBy('p.descricao', 'asc')
            ->get(['p.id', 'p.descricao', 'p.codigo_barra', 'p.custo_medio_venda', 'g.id_grade']);
    }

    public function getProdutosDeComandas(array $categorias = array(), ProdutoDTO $produtoDTO)
    {
         $categorias = array_map(function($classificaco) {
             return $classificaco->id;
         }, $categorias);

        return DB::connection($this->model->getConnectionName())
            ->table("base_web_control.produto as p")
            ->select('p.*', 'g.id_grade')
            ->join('base_web_control.grade as g', function ($join) {
                $join->on('id_produto', 'p.id');
                $join->on('g.codigo_barra', 'p.codigo_barra');
            })
            ->where([
                ['p.id_cadastro', $this->_usuarioLogadoService->getIdCadastroLogado()],
                ['p.descricao', 'LIKE', "%{$produtoDTO->getDescricao()}%"],
                ['p.ativo', 'A']
            ])
            ->orwhere([
                ['p.id_cadastro', $this->_usuarioLogadoService->getIdCadastroLogado()],
                ['p.codigo_barra', $produtoDTO->getDescricao()],
                ['p.ativo', 'A']
            ])
            ->whereIn('p.id_classificacao', $categorias)
            ->orderBy('p.descricao', 'asc')
            ->get();
    }

    public function getProdutosSincronizar()
    {
        return DB::connection($this->model->getConnectionName())
            ->table("base_web_control.produto as p")
            ->select('p.id')
            ->join('base_web_control.classificacao as c', function ($join) {
                $join->on('p.id_classificacao', 'c.id');
            })
            ->where([
                ['p.id_cadastro', $this->_usuarioLogadoService->getIdCadastroLogado()],
                ['p.ativo', 'A'],
                ['p.ecommerce', 'S'],
                ['c.ativo', 'A'],
                ['c.ecommerce', 'S'],
                ['c.id_cadastro', $this->_usuarioLogadoService->getIdCadastroLogado()]
            ])
            ->whereNotNull('id_mercadolivre')
            ->orderBy('p.descricao', 'asc')
            ->get();
    }

    public function getProdutoECategoria(int $idProduto)
    {
        $produto = $this->find($idProduto);
        if ($produto)
            $produto->classificacao; //forccar consultar a categoria

        return $produto;
    }

}
