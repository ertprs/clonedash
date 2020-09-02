<?php

namespace App\Services\Cs2;

use App\Model\Cs2\Cadastro;
use App\Services\Auth\UsuarioLogadoService;

/**
 * @author Tiago Franco
 * Servico para operacoes sobre
 * dados cs2
 */
class Cs2Service
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

    public function getCadastro()
    {
        return Cadastro::select('compartilhar_comanda')->where([['codloja',$this->_usuarioLogadoService->getIdCadastroLogado()]])->get();
    }
}
