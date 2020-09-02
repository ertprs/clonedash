<?php

namespace App\Http\Controllers\Comanda;

use App\DTO\MesaDTO;
use App\DTO\CmHistoricoDTO;
use App\Model\Comanda\CmMesa;
use App\Http\Controllers\Controller;
use App\Services\Comandas\MesasServices;
use Symfony\Component\HttpFoundation\Response;
use App\Services\Extensions\RequestBodyConverter;
use App\Repository\Contracts\Model\Comanda\CmMesaRepositoryInterface;
use App\Services\Repository\Contracts\Model\Comanda\CmMesaRepositoryServiceInterface;

class MesaController extends Controller
{
    /**
     * Função resposável pela listagem de todas as mesas do cliente.
     * @return Json Retorna todas as mesas do cliente
     */
    public function list(CmMesaRepositoryInterface $cmMesaRepository)
    {
        return $this->send(['mesas' => $cmMesaRepository->listarMesas()]);
    }

    /**
     * Função resposável por buscar a mesa que o cliente selecionou.
     * Verifica se já foi cadastrada uma venda e um histórico para mesa, se não, realiza o cadastro.
     * Procura os itens já vendidos para a mesa.
     * 
     * 
     * @return Json Retorna a mesa do cliente com suas vendas.
     */
    public function get(CmMesa $cmMesa, RequestBodyConverter $requestBodyConverter, MesasServices $mesasServices)
    {
        $cmHistoricoDTO = $requestBodyConverter->deserializer(new CmHistoricoDTO());
        return $this->send($mesasServices->recuperarMesa($cmMesa, $cmHistoricoDTO));
    }

    /**
     * Função resposável por salvar uma nova mesa. (NÃO UTILIZADA[por enquanto])*INCOMPLETA*
     * 
     * @param string  $numeroMesa Número da mesa a ser criada .
     * 
     * @return Json Retorna a mesa do cliente com suas vendas.
     */
    public function save($numeroMesa, RequestBodyConverter $requestBodyConverter, CmMesaRepositoryServiceInterface $cmMesaRepositoryService)
    {
        $mesaDTO = $requestBodyConverter->deserializer(new MesaDTO());
        $mesaDTO->setNumMesa($numeroMesa);
        return $this->send(['mesa' => $cmMesaRepositoryService->criarMesa($mesaDTO)], Response::HTTP_CREATED);
    }


    /**
     * Função resposável por atualizar a quantidade de pessoas na mesa
     * @return Json CmMesaModel Retorna o objeto da mesa ou comanda com a quantidade atualizada.
     */
    public function atualizaQuantidadePessoa(CmMesa $cmMesa, $numeroPessoas, CmMesaRepositoryServiceInterface $cmMesaRepositoryService)
    {
        return $this->send($cmMesaRepositoryService->atualiarQtdePessoas($cmMesa->id, $numeroPessoas), Response::HTTP_CREATED);
    }
}
