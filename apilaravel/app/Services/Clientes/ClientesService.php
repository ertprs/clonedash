<?php

namespace App\Services\Clientes;

use App\Services\Auth\UsuarioLogadoService;

/**
 * @author Tiago Franco
 * Servico para manipulação das
 * informacoes dos clientes
 */
class ClientesService
{
    /**
     * UsuarioLogadoService
     *
     * @var UsuarioLogadoService
     */
    protected $_usuarioLogadoService;

    public function __construct(UsuarioLogadoService $usuarioLogadoService)
    {
        $this->_usuarioLogadoService = $usuarioLogadoService;
    }

}
