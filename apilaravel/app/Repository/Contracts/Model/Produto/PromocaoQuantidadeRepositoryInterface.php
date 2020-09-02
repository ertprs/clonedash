<?php

namespace App\Repository\Contracts\Model\Produto;

use App\Repository\Contracts\RepositoryInterface;

/**
 * @author Tiago Franco
 * Interface basica referente a abstração
 * do padrao repository de consultas
 */
interface PromocaoQuantidadeRepositoryInterface extends RepositoryInterface
{
    public function getTotalDescontos(int $qtdeItens, int $idGrade);
    public function getTotalDescontosVenda(int $idVenda);
}
