<?php

namespace App\Services\Repository\Contracts\Model\Comanda;

use App\DTO\CmHistoricoDTO;
use App\Services\Repository\Contracts\RepositoryServiceInterface;

/**
 * @author Tiago Franco
 * Interface basica referente a abstração
 * do padrao repository service 
 */
interface CmComandaRepositoryServiceInterface extends RepositoryServiceInterface
{
    public function salvaItemProducao(int $idVenda, int $idItemVenda);
    public function salvarHistoricoComanda(CmHistoricoDTO $cmHistoricoDTO);
    public function salvaNovaComanda(string $numeroComanda);
    public function vincularClienteComanda(CmHistoricoDTO $cmHistoricoDTO);
    public function atualiarQtdePessoas(string $numeroComanda, int $qtdePessoa);
}