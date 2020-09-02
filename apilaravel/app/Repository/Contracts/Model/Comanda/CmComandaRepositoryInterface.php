<?php

namespace App\Repository\Contracts\Model\Comanda;

use App\Repository\Contracts\RepositoryInterface;

/**
 * @author Tiago Franco
 * Interface basica referente a abstração
 * do padrao repository de consultas
 */
interface CmComandaRepositoryInterface extends RepositoryInterface
{
    public function getComandas($ativas = true);
    public function getComanda(string $numeroComanda, $ativa = true);
    public function getHistoricoComanda(string $numeroComanda);
}
