<?php

namespace App\Http\Controllers\Comanda;

use App\Model\Venda\Venda;
use App\Http\Controllers\Controller;
use App\DTO\VincularVendaProducaoDTO;
use App\Services\Comandas\ComandasService;
use App\Services\Extensions\RequestBodyConverter;

class ProducaoController extends Controller
{
    /**
     * Função resposável por enviar os itens selecionados para a produção.
     * 
     * 
     * @return Json Retorna dados do registro na tabela de producao.
     */
    public function enviaProducao(Venda $venda, RequestBodyConverter $requestBodyConverter, ComandasService $comandasService)
    {
        $vinculoItensVenda = $requestBodyConverter->deserializer(new VincularVendaProducaoDTO());
        return $this->send($comandasService->vincularVendaProducao($vinculoItensVenda));
    }
}
