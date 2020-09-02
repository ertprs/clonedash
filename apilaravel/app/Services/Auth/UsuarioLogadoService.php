<?php

namespace App\Services\Auth;

use Illuminate\Support\Facades\Auth;

/**
 * @author Tiago Franco
 * Servico para manipulação do usuário logado 
 * pelo JWT
 */
class UsuarioLogadoService
{
    /**
     * The array
     *
     * @var User
     */
    protected $_usuario;

    public function __construct()
    {
        if ($usuario = Auth::guard('api')->user()) {
            $this->_usuario = $usuario->getAttributes();
        }
    }

    public function getUsuario()
    {
        return $this->_usuario;
    }

    public function getIdCadastroLogado()
    {
        return $this->_usuario['id_cadastro'];
    }

    public function getIdUsuarioLogado()
    {
        return $this->_usuario['id'];
    }

    public function isLoginMaster(){
        return $this->_usuario['login_master'] == "S";
    }
}
