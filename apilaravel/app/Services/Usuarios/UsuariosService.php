<?php

namespace App\Services\Usuarios;

use App\User;
use App\Repository\Contracts\UserRepositoryInterface;

/**
 * @author Tiago Franco
 * Servico responsavel pelas operacoes envolvendo os 
 * cadastros de usuarios do sistema
 */
class UsuariosService
{
    /**
     * @var UserRepositoryInterface
     */
    private $_usuarioRepository;

    public function __construct(UserRepositoryInterface $_usuarioRepository)
    {
        $this->_usuarioRepository = $_usuarioRepository;
    }

    public function buscaUsuarioPorSenha(string $senhaUsuario)
    {
        return $this->_usuarioRepository->getUserBySenha($senhaUsuario);
    }

    public function verificarPermissao(User $usuario, int $permissao)
    {
        $permissoes = explode(',', $usuario->array_permissao);

        return in_array($permissao, $permissoes);
    }
}
