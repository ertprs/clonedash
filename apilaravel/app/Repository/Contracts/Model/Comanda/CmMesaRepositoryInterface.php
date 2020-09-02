<?php

namespace App\Repository\Contracts\Model\Comanda;

use App\Repository\Contracts\RepositoryInterface;

/**
 * @author Tiago Franco
 * Interface basica referente a abstração
 * do padrao repository de consultas
 */
interface CmMesaRepositoryInterface extends RepositoryInterface
{
    public function getMesa(string $numeroMesa);
    public function listarMesas();
    public function getHistoricoMesa(int $idMesa, $status = 1);
}
