<?php

namespace App\Services\ConveniosBancarios;

use App\Services\Auth\UsuarioLogadoService;

/**
 * @author Tiago Franco
 * Servico para minulação e psquisa de dados bancarios
 */
class ConvenioBancariosService
{
    private $_usuarioLogadoService;

    public function __construct(UsuarioLogadoService $usuarioLogadoService)
    {
        $this->_usuarioLogadoService = $usuarioLogadoService;
    }

}
