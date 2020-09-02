<?php

namespace App\Http\Controllers\Comanda;

use App\DTO\ProdutoDTO;
use App\DTO\VendaItemDTO;
use App\DTO\CmHistoricoDTO;
use Illuminate\Http\Request;
use App\Model\Venda\VendaItem;
use App\Http\Controllers\Controller;
use App\Services\Comandas\ComandasService;
use Symfony\Component\HttpFoundation\Response;
use App\Services\Extensions\RequestBodyConverter;
use App\Services\Produtos\PesquisaProdutosService;
use App\Repository\Contracts\Model\Comanda\CmComandaRepositoryInterface;
use App\Services\Repository\Contracts\Model\Comanda\CmComandaRepositoryServiceInterface;
use App\Services\Repository\Contracts\Model\Venda\VendaComandaRepositoryServiceInterface;

class ComandaController extends Controller
{
    /**
     * Função para fazer a listagem de comandas existentes. 
     * 
     * @param Request $request Objeto que recebe os dados do request.
     * 
     * @return Json Retorna todas as mesas do cliente
     */
    public function list(CmComandaRepositoryInterface $cmComandaRepository)
    {
        return $this->send(['data' => $cmComandaRepository->getComandas()]);
    }

    /**
     * Função para buscar a comanda selecionada. 
     * Buscar vendas já feitas para esta comanda.
     * Buscar os produtos da comanda e se já foram enviados para produção.
     * 
     * @param int $numeroComanda Numero da comanda.
     * 
     * @return Json Retorna os dados da comanda
     */
    public function getComanda(ComandasService $comandasService, $numeroComanda)
    {
        return $this->send($comandasService->getComandaDetalhada($numeroComanda));
    }

    /**
     * Função para gravar anotação para o item da venda. 
     * 
     * @param Request $request Objeto que recebe os dados do request.
     * @param int $id ID da comanda.
     * 
     * @return Json Retorna os dados do item da venda.
     */
    public function salvaAnotacao(VendaItem $itemVenda, RequestBodyConverter $requestBodyConverter, VendaComandaRepositoryServiceInterface $vendaComandaRepositoryService)
    {
        $vendaItemDTO = $requestBodyConverter->deserializer(new VendaItemDTO());
        return $this->send(['venda' => $vendaComandaRepositoryService->vincularAnotacao($vendaItemDTO->getObservacoesCozinha(), $itemVenda->id), Response::HTTP_CREATED]);
    }

    /**
     * Função responsável por criar nova comanda. 
     * Gera uma nova venda.
     * Salva a venda e a comanda no histórico.
     * 
     * @param int $numeroComanda Numero da comanda.
     * 
     * @return Json Retorna os dados da nova comanda ou de uma comanda já existente.
     */
    public function saveComanda($numeroComanda, ComandasService $comandasService, RequestBodyConverter $requestBodyConverter)
    {
        $cmHistoricoDTO = $requestBodyConverter->deserializer(new CmHistoricoDTO());
        $cmHistoricoDTO->setNumCm($numeroComanda);
        return $this->send($comandasService->salvarComanda($cmHistoricoDTO, $cmHistoricoDTO), Response::HTTP_CREATED);
    }

    /**
     * Função para fazer pesquisa de produtos ativos dentro da comanda.
     * 
     * @return Json Retorna uma lista com o resultado da pesquisa de produtos;
     */
    public function pesquisaProdutoComanda(PesquisaProdutosService $pesquisaProdutosService, RequestBodyConverter $requestBodyConverter)
    {
        $produtoDTO = $requestBodyConverter->deserializer(new ProdutoDTO());
        return $this->send(["produtos" => $pesquisaProdutosService->getProdutosDeComadas($produtoDTO)]);
    }

    /**
     *  Função responsavel por realizar consulta e alterar dados da venda do cliente.
     *  @author Allan Camargo, 22/08/2019
     *  Alterado por Tiago Franco para funcionamento via injeção de servicos
     */

    public function vincularCliente(RequestBodyConverter $requestBodyConverter, ComandasService $comandasService)
    {
        $cmHistoricoDTO = $requestBodyConverter->deserializer(new CmHistoricoDTO());
        return $this->send($comandasService->vincularClienteComanda($cmHistoricoDTO), Response::HTTP_CREATED);
    }

    /**
     * Função resposável por atualizar a quantidade de pessoas na comanda
     * @return Json CmMesaModel Retorna o objeto da mesa ou comanda com a quantidade atualizada.
     */
    public function atualizaQuantidadePessoa($numeroComanda, $numeroPessoas, CmComandaRepositoryServiceInterface $cmComandaRepositoryService)
    {
        return $this->send($cmComandaRepositoryService->atualiarQtdePessoas($numeroPessoas, $numeroPessoas), Response::HTTP_CREATED);
    }
}
