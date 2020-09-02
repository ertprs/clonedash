<?php

namespace App\Repository\Contracts\Model\Localizacao;

use App\Repository\Contracts\RepositoryInterface;

/**
 * @author Tiago Franco
 * Interface basica referente a abstração
 * do padrao repository de consultas
 */
interface EstadosRepositoryInterface extends RepositoryInterface
{
    public function getUF();
}
