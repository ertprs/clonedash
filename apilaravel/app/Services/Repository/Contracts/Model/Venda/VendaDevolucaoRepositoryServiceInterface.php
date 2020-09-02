<?php

namespace App\Services\Repository\Contracts\Model\Venda;

use App\DTO\FrenteCaixa\DevolucaoDTO;
use App\Entity\Model\Venda\VendaInterface;
use App\Services\Repository\Contracts\RepositoryServiceInterface;

/**
 * @author Tiago Franco
 * Interface basica referente a abstração
 * do padrao repository service 
 */
interface VendaDevolucaoRepositoryServiceInterface extends RepositoryServiceInterface
{
    public function devolverProdutoDB(DevolucaoDTO $devolucaoDTO);
    public function devolverVendaDB(VendaInterface $vendaInterface); 
    public function salvarItemDevolucao(DevolucaoDTO $devolucaoDTO, int $idVendaDevolucao);
}