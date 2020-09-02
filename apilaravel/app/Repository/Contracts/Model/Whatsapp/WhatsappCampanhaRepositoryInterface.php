<?php

namespace App\Repository\Contracts\Model\Whatsapp;

use App\Repository\Contracts\RepositoryInterface;

/**
 * @author Tiago Franco
 * Interface basica referente a abstração
 * do padrao repository de consultas
 */
interface WhatsappCampanhaRepositoryInterface extends RepositoryInterface
{
    public function getIdCampanhasComEnvioFonePendentes(int $qtdeDias = 3);

    public function getIdTransmissoesCampanhas(array $idCampanhas);

}
