<?php

namespace App\Repository\Contracts\Model\Venda;

use App\Repository\Contracts\RepositoryInterface;

/**
 * @author Tiago Franco
 * Interface basica referente a abstração
 * do padrao repository de consultas
 */
interface VendaItemRepositoryInterface extends RepositoryInterface
{
    public function getTotalVendaDiaCadastro();
    public function getTotalItensVendidosDiaCadastro();
    public function getTopProdutosVendidosMes(int $qtd = 10);
}
