<?php

namespace App\Repository\Contracts\Model\Cliente;

use App\Repository\Contracts\RepositoryInterface;

/**
 * @author Tiago Franco
 * Interface basica referente a abstração
 * do padrao repository de consultas 
 * Abstracao das consultas de clientes relacionadas as
 * operacoes da frente de caixa
 * Model nao existe, referencia o model cliente
 */
interface ClienteFrenteCaixaRepositoryInterface extends RepositoryInterface
{
    public function getClientesPreVenda(string $termoPesquisa);
    public function getQtdeNotasPromissorias(int $idCliente);
    public function getQtdeBoletos(int $idCliente);
    public function getQtdeCarnes(int $idCliente);
}
