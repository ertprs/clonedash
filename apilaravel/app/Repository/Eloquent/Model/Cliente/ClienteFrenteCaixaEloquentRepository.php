<?php

namespace App\Repository\Eloquent\Model\Cliente;

use App\Model\Cliente\Cliente;
use Illuminate\Support\Facades\DB;
use App\Repository\Eloquent\WebControlEloquentRepository;
use App\Repository\Contracts\Model\Cliente\ClienteFrenteCaixaRepositoryInterface;

/**
 * @author Tiago Franco
 * Repositorio para metodos de consultas dos clientes
 * Todas as consultas deverá ser realizadas passando
 * a conexao atraves do metodo ::connection(connection)
 */
class ClienteFrenteCaixaEloquentRepository extends WebControlEloquentRepository implements ClienteFrenteCaixaRepositoryInterface
{
    protected $model;
    /**
     * Instantiate reporitory
     * 
     * @param Cliente $model
     */
    public function __construct(Cliente $model)
    {
        parent::__construct($model);
    }

    public function getClientesPreVenda(string $termoPesquisa)
    {
        $termoPesquisa = "%" . $termoPesquisa . "%";

        return DB::connection($this->model->getConnectionName())
            ->table("base_web_control.cliente as c")
            ->select("c.id", "c.nome", "c.razao_social", "c.endereco", "c.numero", "c.cnpj_cpf", "c.telefone", Cliente::raw("GROUP_CONCAT(cv.placa SEPARATOR ' ') AS placa"))
            ->whereRaw(
                " c.id_cadastro = :idCadastro AND 
                c.ativo IN('A','I') AND
            (   c.nome LIKE :termoPesquisa1 OR
                c.cnpj_cpf LIKE :termoPesquisa2 OR
                cv.placa LIKE :termoPesquisa3 OR
                c.telefone LIKE :termoPesquisa4 OR
                c.celular LIKE :termoPesquisa5 OR
                c.razao_social LIKE :termoPesquisa6 OR
                c.endereco LIKE :termoPesquisa7
            )",
                [
                    "idCadastro"      => $this->_usuarioLogadoService->getIdCadastroLogado(),
                    ":termoPesquisa1" => $termoPesquisa,
                    ":termoPesquisa2" => $termoPesquisa,
                    ":termoPesquisa3" => $termoPesquisa,
                    ":termoPesquisa4" => $termoPesquisa,
                    ":termoPesquisa5" => $termoPesquisa,
                    ":termoPesquisa6" => $termoPesquisa,
                    ":termoPesquisa7" => $termoPesquisa,
                ]
            )->leftJoin('base_web_control.cliente_veiculo as cv', 'c.id', '=', 'cv.id_cliente')
            ->groupBy('c.id')
            ->orderBy('c.nome', 'ASC')
            ->get();
    }

    public function getQtdeNotasPromissorias(int $idCliente)
    {
        return DB::connection($this->model->getConnectionName())
            ->table("base_web_control.cliente as c")
            ->whereRaw(
                " c.id_cadastro = :idCadastro AND 
                  c.id = :idCliente AND 
                  cp.situacao = 'A' AND 
                  cp.data_vencimento < NOW() AND (cp.valor_baixa IS NULL || cp.valor_baixa = '') ",
                [
                    "idCadastro" => $this->_usuarioLogadoService->getIdCadastroLogado(),
                    "idCliente"  => $idCliente,
                ]
            )
            ->join('base_web_control.contas_pagar as cp', function ($join) {
                $join->on('cp.id_cadastro', '=', "c.id_cadastro")
                    ->on('cp.id_cliente', '=', 'c.id');
            })
            ->count();
    }

    public function getQtdeBoletos(int $idCliente)
    {
        return DB::connection($this->model->getConnectionName())
            ->table("base_web_control.cliente as c")
            ->whereRaw(
                " c.id_cadastro = :idCadastro AND 
                  c.id = :idCliente AND 
                  cr.vencimento < NOW() AND (cr.valorpg IS NULL || cr.valorpg = '') ",
                [
                    "idCadastro" => $this->_usuarioLogadoService->getIdCadastroLogado(),
                    "idCliente"  => $idCliente,
                ]
            )
            ->join('cs2.titulos_recebafacil as cr', function ($join) {
                $join->on('cr.codLoja', '=', "c.id_cadastro")
                    ->on('cr.cpfcnpj_devedor', '=', 'c.cnpj_cpf');
            })
            ->count();
    }

    public function getQtdeCarnes(int $idCliente)
    {
        return DB::connection($this->model->getConnectionName())
            ->table("base_web_control.cliente as c")
            ->whereRaw(
                " c.id_cadastro = :idCadastro AND 
                  c.id = :idCliente AND 
                  ca.situacao <> 'I' AND
                  ca.vencimento < NOW() AND (ca.valor_baixa IS NULL || ca.valor_baixa = '')",
                [
                    "idCadastro" => $this->_usuarioLogadoService->getIdCadastroLogado(),
                    "idCliente"  => $idCliente,
                ]
            )
            ->join('base_web_control.carne as ca', function ($join) {
                $join->on('ca.id_cadastro', '=', "c.id_cadastro")
                    ->on('ca.id_cliente', '=', 'c.id');
            })
            ->count();
    }
}
