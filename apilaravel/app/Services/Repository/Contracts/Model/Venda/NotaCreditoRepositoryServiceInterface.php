<?php

namespace App\Services\Repository\Contracts\Model\Venda;

use App\DTO\FrenteCaixa\DevolucaoDTO;
use App\Services\Repository\Contracts\RepositoryServiceInterface;

/**
 * @author Tiago Franco
 * Interface basica referente a abstração
 * do padrao repository service 
 */
interface NotaCreditoRepositoryServiceInterface extends RepositoryServiceInterface
{
    public function salvarNotaCredito(DevolucaoDTO $devolucaoDTO, int $idVendaDevolucao);
}