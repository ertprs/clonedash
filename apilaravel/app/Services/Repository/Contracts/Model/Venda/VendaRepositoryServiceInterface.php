<?php

namespace App\Services\Repository\Contracts\Model\Venda;

use App\DTO\VincularVendaProducaoDTO;
use App\DTO\Vendas\FinalizarVendas\FinalizarVendaDTO;
use App\Services\Repository\Contracts\RepositoryServiceInterface;

/**
 * @author Tiago Franco
 * Interface basica referente a abstração
 * do padrao repository service 
 */
interface VendaRepositoryServiceInterface extends RepositoryServiceInterface
{
    public function vincularClienteFuncionario(VincularVendaProducaoDTO $vincProducaoDTO);

    public function fecharVenda(FinalizarVendaDTO $finalizarVendaDTO);

    public function addEntradaVenda(int $idVenda, float $parcelaPagamento);
}