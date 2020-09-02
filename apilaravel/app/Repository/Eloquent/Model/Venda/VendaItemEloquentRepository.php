<?php

namespace App\Repository\Eloquent\Model\Venda;

use App\Model\Venda\VendaItem;
use Illuminate\Support\Facades\DB;
use App\Repository\Eloquent\WebControlEloquentRepository;
use App\Repository\Contracts\Model\Venda\VendaItemRepositoryInterface;

/**
 * @author Tiago Franco
 * Repositorio para metodos de consultas dos clientes
 * Todas as consultas deverá ser realizadas passando
 * a conexao atraves do metodo ::connection(connection)
 */
class VendaItemEloquentRepository extends WebControlEloquentRepository implements VendaItemRepositoryInterface
{
    protected $model;
    /**
     * Instantiate reporitory
     * 
     * @param VendaItem $model
     */
    public function __construct(VendaItem $model)
    {
        parent::__construct($model);
    }

    public function getTotalVendaDiaCadastro()
    {
        return DB::connection($this->model->getConnectionName())
            ->table('base_web_control.venda as v')
            ->whereRaw(
                "v.id_cadastro = ? and LEFT(v.data_venda, 10) = ? AND v.situacao = 'C' and v.id_tipo_venda = 0",
                [$this->_usuarioLogadoService->getIdCadastroLogado(), date("Y-m-d")]
            )
            ->count("id");
    }

    public function getTotalItensVendidosDiaCadastro()
    {
        return DB::connection($this->model->getConnectionName())
            ->table('base_web_control.venda_itens as vi')
            ->join("base_web_control.venda as v", 'v.id', 'vi.id_venda')
            ->whereRaw(
                "v.id_cadastro = ? and LEFT(v.data_venda, 10) = ? AND v.situacao = 'C' and v.id_tipo_venda = 0",
                [$this->_usuarioLogadoService->getIdCadastroLogado(), date("Y-m-d")]
            )
            ->sum("vi.qtd");
    }

    public function getTopProdutosVendidosMes(int $qtd = 10)
    {
        $sql = "SELECT 
                    count(1) as qtde_vendido,
                    p.descricao as produto, 
                    p.codigo_barra
                FROM base_web_control.produto as p
                JOIN base_web_control.venda_itens as vi ON p.id = vi.id_produto
                JOIN base_web_control.venda as v ON v.id = vi.id_venda
                WHERE v.id_cadastro = ? and MONTH(v.data_venda) = ? AND v.situacao = 'C' and v.id_tipo_venda = 0
                GROUP BY p.id, p.descricao, p.codigo_barra
                ORDER BY qtde_vendido DESC
                LIMIT $qtd";

            return DB::connection($this->model->getConnectionName())->select(
            $sql,
            [$this->_usuarioLogadoService->getIdCadastroLogado(), date("n")]
        );
    }
}
