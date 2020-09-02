<?php

namespace App\Repository\Contracts\Model\Convenio;

use App\Repository\Contracts\RepositoryInterface;

/**
 * @author Tiago Franco
 * Interface basica referente a abstração
 * do padrao repository de consultas
 */
interface ConvenioBancarioRepositoryInterface extends RepositoryInterface
{
    public function getConvenioBancario();
}
