<?php

namespace App\Services\Repository\Contracts\Model\Controle;

use App\Services\Repository\Contracts\RepositoryServiceInterface;

/**
 * @author Tiago Franco
 * Interface basica referente a abstração
 * do padrao repository service 
 */
interface CadastroControlesRepositoryServiceInterface extends RepositoryServiceInterface
{
    public function vincularControleFormaPagamento(int $idFormaPagamento);
    public function incrementarControleFormaPagamento(int $idFormaPagamento);
}