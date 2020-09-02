<?php

namespace App\Http\Controllers\Comanda;

use App\DTO\CancelarVendaItemComandaDTO;
use App\DTO\SalvarItensVendaComandaDTO;
use App\Http\Controllers\Controller;
use App\Services\Comandas\ComandasService;
use App\Services\Comandas\MesasServices;
use App\Services\Extensions\RequestBodyConverter;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VendaComandaController extends Controller
{
    /**
     * Função para salvar um novo item no "carrinho" em venda_itens 
     * @return Json Retorna dados do registro na tabela de venda_itens.
     */
    public function salvanovoItem(RequestBodyConverter $requestBodyConverter, ComandasService $comandasService, MesasServices $mesasServices)
    {

        $dto = $requestBodyConverter->deserializer(new SalvarItensVendaComandaDTO());
        if (!empty($dto->getNumCm())) {
            $vendaItens = $comandasService->salvarItemVendaComanda($dto);
        } else {
            $vendaItens = $mesasServices->salvarItemVendaMesa($dto);
        }

        return $this->send(['venda_item' => $vendaItens], Response::HTTP_CREATED);
    }

    /**
     * Função que remove item do "carrinho" em venda_itens.
     * Verifica se o item já está em produção. Se estiver, valida a senha que o usuário digitou.
     * 
     * @return Json Retorna dados do registro na tabela de venda_itens.
     */
    public function removeItem(ComandasService $comandasService, RequestBodyConverter $requestBodyConverter) {
        $dtoCancelar = $requestBodyConverter->deserializer(new CancelarVendaItemComandaDTO());
        $comandasService->removerItemVendaComanda($dtoCancelar);

        return $this->send("", Response::HTTP_NO_CONTENT);
    }

     /**
     * Função que remove item do "carrinho" em venda_itens.
     * Verifica se o item já está em produção. Se estiver, valida a senha que o usuário digitou.
     * 
     * @param Request $request Objeto que recebe os dados do request.
     * 
     * @return Json Retorna dados do registro na tabela de venda_itens.
     */
    public function salvaTaxa(RequestBodyConverter $requestBodyConverter, ComandasService $comandasService, MesasServices $mesasServices) {
    
        $dto = $requestBodyConverter->deserializer(new SalvarItensVendaComandaDTO());
        if (!empty($dto->getNumCm())) {
            $venda = $comandasService->salvarTaxaComanda($dto);
        } else {
            $venda = $mesasServices->salvarTaxaMesa($dto);
        }
                                
        return $this->send(['gorjeta'=> $venda], Response::HTTP_CREATED);
    }
}
