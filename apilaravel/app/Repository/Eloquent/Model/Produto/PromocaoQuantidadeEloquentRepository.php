<?php

namespace App\Repository\Eloquent\Model\Produto;

use Illuminate\Support\Facades\DB;
use App\Model\Produto\PromocaoQuantidade;
use App\Repository\Eloquent\WebControlEloquentRepository;
use App\Repository\Contracts\Model\Produto\PromocaoQuantidadeRepositoryInterface;

/**
 * @author Tiago Franco
 * Repositorio para metodos de consultas dos clientes
 * Todas as consultas deverá ser realizadas passando
 * a conexao atraves do metodo ::connection(connection)
 */
class PromocaoQuantidadeEloquentRepository extends WebControlEloquentRepository implements PromocaoQuantidadeRepositoryInterface
{
    protected $model;
    /**
    * Instantiate reporitory
    * 
    * @param PromocaoQuantidade $model
    */
    public function __construct(PromocaoQuantidade $model)
    {
        parent::__construct($model);
    }

    public function getTotalDescontos(int $qtdeItens, int $idGrade)
    {
        $sql = "SELECT
                    IFNULL(SUM(aux.valor_desconto),0) AS valor_desconto
                FROM (
                SELECT
                    TRUNCATE(? / pq.qtd_promocao, 0) * valor_desconto AS valor_desconto
                FROM base_web_control.promocao_quantidade pq                    
                WHERE pq.id_cadastro = ?
                AND pq.id_grade = ? 
                AND NOW() BETWEEN data_inicio AND data_fim
                AND pq.ativo = 'A') AS aux";
        
        $total = DB::connection($this->model->getConnectionName())->selectOne($sql,  [$qtdeItens, $this->_usuarioLogadoService->getIdCadastroLogado(), $idGrade]);
        
        return $total->valor_desconto;
    }

    public function getTotalDescontosVenda(int $idVenda) 
    {
        $sql = "SELECT
                    IFNULL(SUM(aux.valor_desconto),0) AS valor_desconto
                FROM (
                    SELECT
                        TRUNCATE(SUM(vi.qtd) /pq.qtd_promocao,0) * valor_desconto AS valor_desconto
                    FROM base_web_control.promocao_quantidade pq    
                    INNER JOIN frente_caixa.fc_venda_itens vi ON pq.id_grade = vi.id_grade                
                        WHERE pq.id_cadastro = ?
                        AND vi.id_venda = ?
                        AND NOW() BETWEEN data_inicio AND data_fim
                        AND pq.ativo = 'A'
                    GROUP BY pq.id_grade 
                ) AS aux";
        
        $total = DB::connection($this->model->getConnectionName())->selectOne($sql,  [$this->_usuarioLogadoService->getIdCadastroLogado(), $idVenda]);
        
        return $total->valor_desconto;
    }
}