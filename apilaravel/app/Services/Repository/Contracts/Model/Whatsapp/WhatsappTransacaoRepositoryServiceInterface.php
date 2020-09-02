<?php

namespace App\Services\Repository\Contracts\Model\Whatsapp;

use App\Services\Repository\Contracts\RepositoryServiceInterface;

/**
 * @author Tiago Franco
 * Interface basica referente a abstração
 * do padrao repository service 
 */
interface WhatsappTransacaoRepositoryServiceInterface extends RepositoryServiceInterface
{
    public function atualizarStatusPhoneCampanha(int $idTransmissao, string $telefone, int $status);
}