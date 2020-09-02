<?php

namespace App\Repository\Contracts\Model\Whatsapp;

use App\Repository\Contracts\RepositoryInterface;

/**
 * @author Tiago Franco
 * Interface basica referente a abstração
 * do padrao repository de consultas
 */
interface WhatsappListaRepositoryInterface extends RepositoryInterface
{
    public function getPeloNome(string $nomeLista);
    public function getPeloFoneOrNomeLista(string $termoPesquisa, int $idLista);
}
