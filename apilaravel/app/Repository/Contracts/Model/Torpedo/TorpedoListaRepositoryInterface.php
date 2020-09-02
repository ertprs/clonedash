<?php

namespace App\Repository\Contracts\Model\Torpedo;

use App\Repository\Contracts\RepositoryInterface;

/**
 * @author Tiago Franco
 * Interface basica referente a abstração
 * do padrao repository de consultas
 */
interface TorpedoListaRepositoryInterface extends RepositoryInterface
{
    public function getPeloNome(string $nomeLista);
    public function getPeloFoneOrNomeLista(string $termoPesquisa, int $idLista);
}
