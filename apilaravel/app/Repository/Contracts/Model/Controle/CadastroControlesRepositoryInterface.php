<?php

namespace App\Repository\Contracts\Model\Controle;

use App\Repository\Contracts\RepositoryInterface;

/**
 * @author Tiago Franco
 * Interface basica referente a abstração
 * do padrao repository de consultas
 */
interface CadastroControlesRepositoryInterface extends RepositoryInterface
{
    public function getControleFormaPagamento(int $idFormaPagamento);
}
