<?php

namespace App\Services\Repository\Contracts\Model\Comanda;

use App\DTO\MesaDTO;
use App\DTO\CmHistoricoDTO;
use App\Services\Repository\Contracts\RepositoryServiceInterface;

/**
 * @author Tiago Franco
 * Interface basica referente a abstração
 * do padrao repository service 
 */
interface CmMesaRepositoryServiceInterface extends RepositoryServiceInterface
{
    public function salvarHistoricoMesa(CmHistoricoDTO $cmHistoricoDTO);
    public function criarMesa(MesaDTO $mesaDTO);
    public function atualiarQtdePessoas(int $idMesa, int $qtdePessoa);
}