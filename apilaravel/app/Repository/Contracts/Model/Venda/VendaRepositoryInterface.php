<?php

namespace App\Repository\Contracts\Model\Venda;

use App\Repository\Contracts\RepositoryInterface;

/**
 * @author Tiago Franco
 * Interface basica referente a abstração
 * do padrao repository de consultas
 */
interface VendaRepositoryInterface extends RepositoryInterface
{
    public function getItensVenda(int $idVenda);
    public function getTotalVenda(int $idVenda);
    public function getTotalAdiantamentos(int $idCaixa);
    public function getVendasConcluidas(int $idCliente);
    public function getVendasConcluidasNomeCliente(string $nomeCliente);
    public function getItensDaVenda(int $idVenda);
}

