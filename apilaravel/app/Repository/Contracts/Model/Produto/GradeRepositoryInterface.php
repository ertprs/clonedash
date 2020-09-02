<?php

namespace App\Repository\Contracts\Model\Produto;

use App\Repository\Contracts\RepositoryInterface;

/**
 * @author Tiago Franco
 * Interface basica referente a abstração
 * do padrao repository de consultas
 */
interface GradeRepositoryInterface extends RepositoryInterface
{
    public function getGradeProduto(int $idProduto, string $codigoBarra);
}
