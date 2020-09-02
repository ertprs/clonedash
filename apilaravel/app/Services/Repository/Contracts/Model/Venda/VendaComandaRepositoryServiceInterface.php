<?php

namespace App\Services\Repository\Contracts\Model\Venda;

use App\DTO\VendaDTO;
use App\DTO\VendaItemDTO;
use App\DTO\CmHistoricoDTO;
use App\Services\Repository\Contracts\RepositoryServiceInterface;

/**
 * @author Tiago Franco
 * Interface basica referente a abstração
 * do padrao repository service 
 * Repositorio service fake para prover as operacoes envolvendo vendas em comandas
 */
interface VendaComandaRepositoryServiceInterface extends RepositoryServiceInterface
{
    public function salvaNovaVendaComanda(VendaDTO $vendaDTO);
    public function vincularVendaComanda(CmHistoricoDTO $cmHistoricoDTO);
    public function salvarItemVenda(VendaItemDTO $vendaItemDTO);
    public function salvaTaxaItem(VendaItemDTO $vendaItemDTO);
    public function vincularAnotacao(string $anotacao, int  $idItemVenda);
}