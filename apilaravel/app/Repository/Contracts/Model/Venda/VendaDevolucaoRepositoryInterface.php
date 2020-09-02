<?php

namespace App\Repository\Contracts\Model\Venda;

use App\Entity\Model\Venda\VendaInterface;
use App\Repository\Contracts\RepositoryInterface;

/**
 * @author Tiago Franco
 * Interface basica referente a abstração
 * do padrao repository de consultas
 */
interface VendaDevolucaoRepositoryInterface extends RepositoryInterface
{
    public function getDevolucaoVenda(VendaInterface $venda);    
    public function finalizarDevolucao(VendaInterface $venda);
    public function finalizarItemDevolucao(VendaInterface $venda);

}
