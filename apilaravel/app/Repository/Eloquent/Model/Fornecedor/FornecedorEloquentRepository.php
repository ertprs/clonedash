<?php

namespace App\Repository\Eloquent\Model\Fornecedor;

use Illuminate\Support\Facades\DB;
use App\Model\Fornecedor\Fornecedor;
use App\Repository\Eloquent\WebControlEloquentRepository;
use App\Repository\Contracts\Model\Fornecedor\FornecedorRepositoryInterface;

/**
 * @author Tiago Franco
 * Repositorio para metodos de consultas dos clientes
 * Todas as consultas deverá ser realizadas passando
 * a conexao atraves do metodo ::connection(connection)
 */
class FornecedorEloquentRepository extends WebControlEloquentRepository implements FornecedorRepositoryInterface
{
    protected $model;
    /**
     * Instantiate reporitory
     * 
     * @param Fornecedor $model
     */
    public function __construct(Fornecedor $model)
    {
        parent::__construct($model);
    }

    public function getFornecedoresCombo(int $idCadastro = 0)
    {
        $sql = "SELECT
                    id
                    , IF(razao_social = '' OR razao_social is NULL,fantasia,razao_social) as razao_social
                FROM
                    base_web_control.fornecedor
                WHERE
                    id_cadastro = ? AND tipo_cadastro = 'F'
                    AND ativo = 'A'
                ORDER BY razao_social ASC";

        $fornecedores = DB::connection($this->model->getConnectionName())
            ->select($sql, [$idCadastro ? $idCadastro : $this->_usuarioLogadoService->getIdCadastroLogado()]);

        return array_column($fornecedores, "razao_social", "id");
    }
}
