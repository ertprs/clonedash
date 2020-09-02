<?php

namespace App\Repository\Contracts\Model\Venda;

use App\Repository\Contracts\RepositoryInterface;

/**
 * @author Tiago Franco
 * Interface basica referente a abstração
 * do padrao repository de consultas
 */
interface NotaCreditoRepositoryInterface extends RepositoryInterface
{
    public function getById(int $idNotaCredito);
}
