<?php

namespace App\Repository\Contracts\Model\Relatorio;

use App\Repository\Contracts\RepositoryInterface;

/**
 * @author Tiago Franco
 * Interface basica referente a abstração
 * do padrao repository de consultas
 */
interface RelatorioCamposRepositoryInterface extends RepositoryInterface
{
    public function getCamposSelecionados(array $campos);
}
