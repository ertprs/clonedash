<?php

namespace App\Repository\Contracts\Model\Produto;

use App\Repository\Contracts\RepositoryInterface;

/**
 * @author Tiago Franco
 * Interface basica referente a abstração
 * do padrao repository de consultas
 */
interface GradeHistoricoRepositoryInterface extends RepositoryInterface
{
    public function getGradeHistoricosPosVenda(int $idVenda);
}
