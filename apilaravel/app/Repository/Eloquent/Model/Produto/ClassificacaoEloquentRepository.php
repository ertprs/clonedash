<?php

namespace App\Repository\Eloquent\Model\Produto;

use Illuminate\Support\Facades\DB;
use App\Model\Produto\Classificacao;
use App\Repository\Eloquent\WebControlEloquentRepository;
use App\Repository\Contracts\Model\Produto\ClassificacaoRepositoryInterface;

/**
 * @author Tiago Franco
 * Repositorio para metodos de consultas dos clientes
 * Todas as consultas deverá ser realizadas passando
 * a conexao atraves do metodo ::connection(connection)
 */
class ClassificacaoEloquentRepository extends WebControlEloquentRepository implements ClassificacaoRepositoryInterface
{
    protected $model;
    /**
     * Instantiate reporitory
     * 
     * @param Classificacao $model
     */
    public function __construct(Classificacao $model)
    {
        parent::__construct($model);
    }

    public function getClassificacaoCombo(int $idCadastro = 0)
    {
        $sql = "SELECT
                    c.id, 
                    if(id_pai > 0,(select concat(descricao,' -> ',c.descricao) from base_web_control.classificacao where id = c.id_pai), descricao) as descricao
                FROM
                    base_web_control.classificacao c
                        WHERE c.id_cadastro = ?
                        AND c.ativo = 'A'
                        ORDER BY descricao";

        $categorias = DB::select($sql, [$idCadastro ? $idCadastro : $this->_usuarioLogadoService->getIdCadastroLogado()]);

        return array_column($categorias, "descricao", "id");
    }

    public function listarCategorias($ativas = 'A')
    {
        $where = [
            ['id_cadastro', $this->_usuarioLogadoService->getIdCadastroLogado()], ['ativo', $ativas], ['show_comanda', 1]
        ];

        return DB::connection($this->model->getConnectionName())
            ->table("base_web_control.classificacao")
            ->where($where)->orderBy('descricao', 'asc')
            ->get()
            ->toArray();
    }
}
