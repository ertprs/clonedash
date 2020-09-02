<?php

namespace App\Repository\Contracts\Model\Cs2;

use App\Repository\Contracts\RepositoryInterface;

/**
 * @author Tiago Franco
 * Interface basica referente a abstração
 * do padrao repository de consultas
 */
interface CadastroRepositoryInterface extends RepositoryInterface
{
    public function getCadastroLojista();
}
