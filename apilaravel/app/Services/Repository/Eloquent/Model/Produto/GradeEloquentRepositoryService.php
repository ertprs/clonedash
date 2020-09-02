<?php

namespace App\Services\Repository\Eloquent\Model\Produto;

use App\Model\Produto\Grade;
use App\Services\Utils\CodesApi;
use Illuminate\Support\Facades\DB;
use App\DTO\FrenteCaixa\DevolucaoDTO;
use App\Exceptions\ApiWebControlException;
use App\Repository\Eloquent\Model\Produto\GradeEloquentRepository;
use App\Services\Repository\Eloquent\WebControlEloquentRepositoryService;
use App\Services\Repository\Contracts\Model\Produto\GradeRepositoryServiceInterface;

/**
 * @author Tiago Franco
 * Servico de acesso ao repositorio de Model
 * Deverá possuir os metodos contendo operacoes de escrita 
 * do modelo implementando a interface do repositorio
 */
class GradeEloquentRepositoryService extends WebControlEloquentRepositoryService implements GradeRepositoryServiceInterface
{
    public function __construct(Grade $model, GradeEloquentRepository $repository)
    {
        parent::__construct($model, $repository);
    }

    public function salvarHistoricoGradeDevolucao(DevolucaoDTO $devolucaoDTO)
    {
        $sql = "INSERT INTO base_web_control.grade_historico(
            id_grade,
            id_cadastro,
            id_usuario,
            qtd_antigo,
            qtd_atual,
            codigo_barra_antigo,
            codigo_barra,
            valor_custo_antigo,
            valor_custo,
            valor_varejo_aprazo_antigo,
            valor_varejo_aprazo,
            ativo_antigo,
            ativo,
            data_hora_alteracao,
            origem_alteracao
            )
        SELECT
            g.id_grade,
            g.id_cadastro,
            g.id_usuario_alterou,
            g.qtd_atual - :qtdDevolucao,
            g.qtd_atual ,
            g.codigo_barra AS codigo_barra_antigo,
            g.codigo_barra,
            g.valor_custo AS valor_custo_antigo,
            g.valor_custo,
            g.valor_varejo_aprazo AS valor_varejo_aprazo_antigo,
            g.valor_varejo_aprazo,
            g.ativo AS ativo_antigo,
            g.ativo,
            NOW(),
            'Devolução por Produto'
        FROM base_web_control.grade g
        WHERE g.id_grade = :idGrade
        LIMIT 1";

        DB::connection($this->model->getConnectionName())
            ->insert($sql, [
                "qtdDevolucao" => $devolucaoDTO->getQuantidade(),
                "idGrade"      => $devolucaoDTO->getIdGrade()
            ]);

        $hGrade = DB::getPdo()->lastInsertId();

        if (!$hGrade) {
            throw new ApiWebControlException("Erro ao salvar o historico da grade", CodesApi::ERROOPERACAO);
        }

        return $hGrade;
    }

    public function atualizarQtdeEstoque(int $idGrade, int $qtdAtual)
    {
        $sql = "UPDATE base_web_control.grade SET qtd_atual = ?
                WHERE id_grade = ?";

        DB::connection($this->model->getConnectionName())->update($sql, [$qtdAtual, $idGrade]);
    }
}
