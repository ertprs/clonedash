<?php

namespace App\Repository\Contracts\Model\Kits;

use App\Repository\Contracts\RepositoryInterface;

/**
 * @author Tiago Franco
 * Interface basica referente a abstração
 * do padrao repository de consultas
 */
interface PromocaoKitRepositoryInterface extends RepositoryInterface
{
    public function getKitsCodigoBarras(string $codigoBarras);
}
