<?php

namespace App\Repository\Contracts\Model\Apoio;

use App\Repository\Contracts\RepositoryInterface;

/**
 * @author Tiago Franco
 * Interface basica referente a abstração
 * do padrao repository de consultas
 */
interface TipoLogRepositoryInterface extends RepositoryInterface
{
    public function getTipoLogradourosCombo();
}
