<?php

namespace App\Services\Repository\Contracts\Model\FrenteCaixa;

use App\DTO\FrenteCaixa\FCVendaDTO;
use App\DTO\FrenteCaixa\FCItemVendaDTO;
use App\Services\Repository\Contracts\RepositoryServiceInterface;

/**
 * @author Tiago Franco
 * Interface basica referente a abstração
 * do padrao repository service 
 */
interface FcVendaRepositoryServiceInterface extends RepositoryServiceInterface
{
    public function novaVendaFrenteCaixa(FCVendaDTO $fCVendaDTO, array $informacoesCaixa);
    public function novoItemVendaFrenteCaixa(FCItemVendaDTO $fCItemVendaDTO);
    public function salvarItensKitProduto(int $idVenda, array $itensKit);
}