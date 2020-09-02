<?php

namespace App\Repository\Contracts\Model\Funcionario;

use App\Repository\Contracts\RepositoryInterface;

/**
 * @author Tiago Franco
 * Interface basica referente a abstração
 * do padrao repository de consultas
 */
interface FuncionarioRepositoryInterface extends RepositoryInterface
{
    public function getFuncionarioVenda(int $idVenda);

    public function buscaFuncionariosAtivos();

    public function getFuncionarios();
}
