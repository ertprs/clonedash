<?php

namespace App\Repository\Contracts\Model\DadosBancarios;

use App\Repository\Contracts\RepositoryInterface;

/**
 * @author Tiago Franco
 * Interface basica referente a abstração
 * do padrao repository de consultas
 */
interface ContaCorrenteMovimentacaoRepositoryInterface extends RepositoryInterface
{
    public function getCCCliente(int $idCliente);
}
