<?php

namespace App\DTO\Vendas\FinalizarVendas;

/**
 * @author Tiago Franco
 * Interface base para configuracao 
 * dos DTOs as formas de pagamentos
 */
interface FormaPagamentoVendaInterface
{
    public function getIdFormaPagamento();
    public function validar(array $formaPagamento);
    public function getTotalPgto();
    public function getFinalizarFormaPgto();
}
