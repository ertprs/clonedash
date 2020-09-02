<?php

namespace App\Http\Controllers\Venda;

use App\Http\Controllers\Controller;
use App\Services\Vendas\FinalizarVendasService;
use App\Services\Extensions\RequestBodyConverter;
use App\DTO\Vendas\FinalizarVendas\FinalizarVendaDTO;
use App\Services\Vendas\SetupFinalizarVendasService;

class VendaController extends Controller
{

    public function finalizarVenda(
        FinalizarVendasService $finalizarVendasService,
        SetupFinalizarVendasService $setupFinalizarVendasService,
        RequestBodyConverter $requestBodyConverter
    ) {
        $finalizarVendaDTO = $requestBodyConverter->deserializer(new FinalizarVendaDTO());
        $finalizarVendasService->finalizarVenda($finalizarVendaDTO, $setupFinalizarVendasService);
    }
}
