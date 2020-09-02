<?php

namespace App\Repository\Eloquent;

use App\User;
use Illuminate\Support\Facades\DB;
use App\Repository\Contracts\UserRepositoryInterface;
use App\Repository\Eloquent\WebControlEloquentRepository;

/**
 * @author Tiago Franco
 * Repositorio para metodos de consultas dos clientes
 * Todas as consultas deverá ser realizadas passando
 * a conexao atraves do metodo ::connection(connection)
 */
class UserEloquentRepository extends WebControlEloquentRepository implements UserRepositoryInterface
{
    protected $model;
    /**
     * Instantiate reporitory
     * 
     * @param User $model
     */
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function getUserBySenha(string $senhaUsuario, int $master = 0)
    {
        $where = "senha = ? and id_cadastro = ?";
        if ($master)
            $where .= " and login_master = 'S'";

        return DB::connection($this->model->getConnectionName())
            ->table("base_web_control.webc_usuario")
            ->select("id", "array_permissao", "nome_usuario")
            ->whereRaw($where, [$senhaUsuario, $this->_usuarioLogadoService->getIdCadastroLogado()])
            ->first();
    }

    public function getUserBySenhaEncrypt(string $senhaUsuario, int $master = 0)
    {
        $where = "senha = AES_ENCRYPT(?,?) and id_cadastro = ?";
        if ($master)
            $where .= " and login_master = 'S'";

        return DB::connection($this->model->getConnectionName())
            ->table("base_web_control.webc_usuario")
            ->select("id", "array_permissao", "nome_usuario")
            ->whereRaw($where, [$senhaUsuario,  env('DB_ENCRYPY_KEY'), $this->_usuarioLogadoService->getIdCadastroLogado()])
            ->first();
    }

    public function getUsuarioLogin(string $login, string $senha)
    {
        return $this->model->whereRaw('login = ? and api_key = AES_ENCRYPT(?,?)', array($login, $senha, env('DB_ENCRYPY_KEY')))->first();
    }
}
