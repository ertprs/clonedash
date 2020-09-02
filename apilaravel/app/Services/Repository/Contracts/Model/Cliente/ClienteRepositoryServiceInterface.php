<?php

namespace App\Services\Repository\Contracts\Model\Cliente;

use App\DTO\ClienteDTO;
use App\Services\Repository\Contracts\RepositoryServiceInterface;

/**
 * @author Tiago Franco
 * Interface basica referente a abstração
 * do padrao repository service 
 */
interface ClienteRepositoryServiceInterface extends RepositoryServiceInterface
{
    public function salvarClientes(ClienteDTO $clienteDTO);
}