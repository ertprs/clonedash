<?php

namespace App\Repository\Eloquent\Model\Venda;

use App\Model\Venda\Venda;
use App\Model\Venda\VendaItem;
use Illuminate\Support\Facades\DB;
use App\Repository\Eloquent\WebControlEloquentRepository;
use App\Repository\Contracts\Model\Venda\VendaRepositoryInterface;

/**
 * @author Tiago Franco
 * Repositorio para metodos de consultas dos clientes
 * Todas as consultas deverá ser realizadas passando
 * a conexao atraves do metodo ::connection(connection)
 */
class VendaEloquentRepository extends WebControlEloquentRepository implements VendaRepositoryInterface
{
    protected $model;
    /**
     * Instantiate reporitory
     * 
     * @param Venda $model
     */
    public function __construct(Venda $model)
    {
        parent::__construct($model);
    }

    public function getItensVenda(int  $idVenda)
    {
        return DB::connection($this->model->getConnectionName())
            ->table("base_web_control.venda_itens as vi")
            ->select("vi.*", "p.icms", "p.ipi_cst", "p.pis", "p.cofins")
            ->join('base_web_control.produto as p', function ($join) {
                $join->on('vi.id_produto', 'p.id');
            })
            ->where(["vi.id_venda" => $idVenda])
            ->get();
    }

    public function getTotalVenda(int $idVenda)
    {
        return DB::connection($this->model->getConnectionName())
            ->table('base_web_control.venda_itens')
            ->whereRaw("id_venda = ?", [$idVenda])
            ->sum(DB::raw("IFNULL(preco_venda,0.00)"));
    }

    public function getTotalAdiantamentos(int $idCaixa)
    {
        return DB::connection($this->model->getConnectionName())
            ->table('base_web_control.venda_adiantamento')
            ->whereRaw("id_cadastro = ? and id_abertura_caixa = ?", [$this->_usuarioLogadoService->getIdCadastroLogado(), $idCaixa])
            ->sum(DB::raw("IFNULL(valor,0.00)"));
    }

    public function getVendasConcluidas(int $idCliente)
    {
        $sql = "SELECT
                        v.id,
                        c.nome,
                        v.data_venda,                        
                        vi.nome_produto,
                        vi.codigo_barra,
                        fp.descricao AS pagamento,
                        vp.valor_pgto,
                        vp.vencimento,
                        (SELECT IF(COUNT(*)>0,1,0) FROM base_web_control.venda_notas_eletronicas 
                            WHERE id_venda = v.id AND status = '5'
                        ) AS possui_nota
                    FROM
                        base_web_control.cliente c
                INNER JOIN
                        base_web_control.venda v
                    ON c.id = v.id_cliente
                INNER JOIN
                        base_web_control.venda_itens vi
                    ON v.id = vi.id_venda
                LEFT OUTER JOIN
                        base_web_control.venda_pagamento vp
                    ON vp.id_venda = v.id
                LEFT OUTER JOIN
                        base_web_control.forma_pagamento fp
                    ON fp.id = vp.id_forma_pgto

                WHERE
                        v.id_cadastro = ?
                    AND
                        vi.estornado = 'N'
                    AND
                        v.situacao = 'C'
                    AND c.id = ?
                GROUP BY v.id , c.nome , v.data_venda , vi.nome_produto , vi.codigo_barra, fp.descricao , vp.valor_pgto , vp.vencimento
                ORDER BY v.data_venda DESC LIMIT 30";

        $params = [$this->_usuarioLogadoService->getIdCadastroLogado(), $idCliente];

        return DB::connection($this->model->getConnectionName())->select($sql, $params);
    }

    public function getVendasConcluidasNomeCliente(string $nomeCliente)
    {
        $sql = "SELECT
                        v.id,
                        c.nome,
                        v.data_venda,                        
                        vi.nome_produto,
                        vi.codigo_barra,
                        fp.descricao AS pagamento,
                        vp.valor_pgto,
                        vp.vencimento,
                        (SELECT IF(COUNT(*)>0,1,0) FROM base_web_control.venda_notas_eletronicas 
                            WHERE id_venda = v.id AND status = '5'
                        ) AS possui_nota
                    FROM
                        base_web_control.cliente c
                INNER JOIN
                        base_web_control.venda v
                    ON c.id = v.id_cliente
                INNER JOIN
                        base_web_control.venda_itens vi
                    ON v.id = vi.id_venda
                LEFT OUTER JOIN
                        base_web_control.venda_pagamento vp
                    ON vp.id_venda = v.id
                LEFT OUTER JOIN
                        base_web_control.forma_pagamento fp
                    ON fp.id = vp.id_forma_pgto

                WHERE
                        v.id_cadastro = ?
                    AND
                        vi.estornado = 'N'
                    AND
                        v.situacao = 'C'
                    AND c.nome LIKE ?
                GROUP BY v.id , c.nome , v.data_venda , vi.nome_produto , vi.codigo_barra, fp.descricao , vp.valor_pgto , vp.vencimento
                ORDER BY v.data_venda DESC LIMIT 30";

        $params = [$this->_usuarioLogadoService->getIdCadastroLogado(), "%" . $nomeCliente . "%"];

        return DB::connection($this->model->getConnectionName())->select($sql, $params);
    }

    public function getItensDaVenda(int $idVenda)
    {
        //Procura os itens da comanda
        $itens = VendaItem::where([['id_venda', $idVenda]])->get();

        foreach ($itens as $key => $value) {
            $itens[$key]['producao'] = ($value->item_producao) ? 1 : 0; //Procura item na produção
        }

        return $itens;
    }
}
