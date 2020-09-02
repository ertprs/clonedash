<?php

namespace App\Http\Controllers\FrenteCaixa\Creditos;

use App\DTO\FrenteCaixa\MovimentacoesDTO;
use App\Http\Controllers\Controller;
use App\Services\Extensions\RequestBodyConverter;
use App\Services\FrenteCaixa\Movimentacoes\CreditosService;
use Symfony\Component\HttpFoundation\Response;

class CreditoController extends Controller
{
    /**
     * Servico para inclusao de creditos atraves de movimentacao em conta corrente
     */
    public function incluirCreditos(RequestBodyConverter $requestBodyConverter, CreditosService $creditosService){
        $movimentacaoDTO = $requestBodyConverter->deserializer(new MovimentacoesDTO());

        return $this->send($creditosService->lancarNovoCredito($movimentacaoDTO), Response::HTTP_CREATED);
        
    }

    /**
     * Servico para inclusao de valores extras no caixa (nao inclui creditos via movimentacao em conta corrente)
     */
    public function entradaValores(RequestBodyConverter $requestBodyConverter, CreditosService $creditosService){
        $movimentacaoDTO = $requestBodyConverter->deserializer(new MovimentacoesDTO());

        return $this->send($creditosService->addValorExtra($movimentacaoDTO), Response::HTTP_CREATED);
        
    }
}
