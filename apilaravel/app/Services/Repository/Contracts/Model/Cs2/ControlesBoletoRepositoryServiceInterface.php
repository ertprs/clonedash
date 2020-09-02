<?php

namespace App\Services\Repository\Contracts\Model\Cs2;

use App\Services\Repository\Contracts\RepositoryServiceInterface;

/**
 * @author Tiago Franco
 * Interface basica referente a abstração
 * do padrao repository service 
 */
interface ControlesBoletoRepositoryServiceInterface extends RepositoryServiceInterface
{
    public function updateRecebeFacil(int $contador);
}