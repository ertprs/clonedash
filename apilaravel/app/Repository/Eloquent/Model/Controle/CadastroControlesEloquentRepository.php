<?php

namespace App\Repository\Eloquent\Model\Controle;

use App\Model\Controle\CadastroControles;
use App\Repository\Contracts\Model\Controle\CadastroControlesRepositoryInterface;
use App\Repository\Eloquent\WebControlEloquentRepository;

/**
 * @author Tiago Franco
 * Repositorio para metodos de consultas dos clientes
 * Todas as consultas deverá ser realizadas passando
 * a conexao atraves do metodo ::connection(connection)
 */
class CadastroControlesEloquentRepository extends WebControlEloquentRepository implements CadastroControlesRepositoryInterface
{
    protected $model;
    /**
     * Instantiate reporitory
     * 
     * @param CadastroControles $model
     */
    public function __construct(CadastroControles $model)
    {
        parent::__construct($model);
    }

    public function getControleFormaPagamento(int $idFormaPagamento)
    {
        $controle = $this->findOneBy([
            ['id_cadastro', '=', $this->_usuarioLogadoService->getIdCadastroLogado()],
            ['id_forma_pagamento', "=", $idFormaPagamento]
        ]);

        return $controle;
    }
}
