<?php

namespace App\Repository\Eloquent\Model\Funcionario;

use Illuminate\Support\Facades\DB;
use App\Model\Funcionario\Funcionario;
use App\Repository\Eloquent\WebControlEloquentRepository;
use App\Repository\Contracts\Model\Funcionario\FuncionarioRepositoryInterface;

/**
 * @author Tiago Franco
 * Repositorio para metodos de consultas dos clientes
 * Todas as consultas deverá ser realizadas passando
 * a conexao atraves do metodo ::connection(connection)
 */
class FuncionarioEloquentRepository extends WebControlEloquentRepository implements FuncionarioRepositoryInterface
{
    protected $model;
    /**
     * Instantiate reporitory
     * 
     * @param Funcionario $model
     */
    public function __construct(Funcionario $model)
    {
        parent::__construct($model);
    }

    public function getFuncionarioVenda(int $idVenda)
    {
        return DB::connection($this->model->getConnectionName())
            ->table("base_web_control.funcionario as f")
            ->select("f.id", "f.nome")
            ->join('base_web_control.webc_usuario as u', function ($join) {
                $join->on('f.id', 'u.id_funcionario');
            })
            ->join('base_web_control.venda as v', function ($join) {
                $join->on('v.id_usuario', 'u.id');
            })
            ->where(["v.id" => $idVenda])
            ->first();
    }

    public function buscaFuncionariosAtivos()
    {
        return DB::connection($this->model->getConnectionName())
            ->table("base_web_control.funcionario as f")
            ->select("id", "nome", "cpf", "tp_funcionario")
            ->whereRaw("id_cadastro = ? and ativo = ?", [$this->_usuarioLogadoService->getIdCadastroLogado(), "A"])->get();
    }

    public function getFuncionarios()
    {
        return DB::connection($this->model->getConnectionName())
            ->table("base_web_control.funcionario as f")
            ->where([
                ['f.id_cadastro', $this->_usuarioLogadoService->getUsuario()['id_cadastro']],
                ['f.nome', '<>', '']
            ])
            ->orderBy('f.nome', 'asc')
            ->get(['f.id', 'nome', 'ativo']);
    }
}
