<?php

namespace App\Services\Vendas\FinalizarPagamentos;

use App\Services\Vendas\SetupFinalizarVendasService;

/**
 * @author Tiago Franco
 * Interface base para configuracao 
 * dos objetos que deverao 
 * processar o fechamdno de cada 
 * forma de pagamento da venda
 */
interface FinalizarFormasPgtos
{
    public function finalizarFormaPagamento(SetupFinalizarVendasService $setupFinalizarVendasService, $formaPagamento);
    public function salvarAdiantamento(SetupFinalizarVendasService $setupFinalizarVendasService, $formaPagamento);
}
