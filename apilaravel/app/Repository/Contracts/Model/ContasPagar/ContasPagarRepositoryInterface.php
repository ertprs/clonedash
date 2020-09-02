<?php

namespace App\Repository\Contracts\Model\ContasPagar;

use App\Repository\Contracts\RepositoryInterface;

/**
 * @author Tiago Franco
 * Interface basica referente a abstração
 * do padrao repository de consultas
 */
interface ContasPagarRepositoryInterface extends RepositoryInterface
{
    public function getTotalContasPagar(array $informacoesCaixa);
}
