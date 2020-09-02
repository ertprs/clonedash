<?php

namespace App\Http\Controllers\FrenteCaixa;

use App\Model\FrenteCaixa\FcVenda;
use App\DTO\FrenteCaixa\FCVendaDTO;
use App\Http\Controllers\Controller;
use App\DTO\FrenteCaixa\FCItemVendaDTO;
use App\DTO\FrenteCaixa\CadastroProdutoDTO;
use App\DTO\FrenteCaixa\CadastroServicoDTO;
use App\DTO\FrenteCaixa\LoginFrenteCaixaDTO;
use Symfony\Component\HttpFoundation\Response;
use App\DTO\FrenteCaixa\CalculoTotalDescontosDTO;
use App\Services\Extensions\RequestBodyConverter;
use App\Services\FrenteCaixa\FrenteCaixaServices;
use App\Services\FrenteCaixa\LoginFrenteCaixaServices;
use App\Repository\Contracts\Model\Funcionario\FuncionarioRepositoryInterface;
use App\Repository\Contracts\Model\Produto\PromocaoQuantidadeRepositoryInterface;
use App\Services\Repository\Contracts\Model\Produto\ProdutoFrenteCaixaRepositoryServiceInterface;



class FrenteCaixaController extends Controller
{
    /**
     * Passo inicial do login na frente de caixa referente a verificacao do caixa em aberto 
     * e em qual operador se encontra aberto
     */
    public function verificaCaixaAberto(string $numeroCaixa, LoginFrenteCaixaServices $loginFrenteCaixaServices)
    {
        $caixaAberto = $loginFrenteCaixaServices->consultaCaixaAberto($numeroCaixa);
        return $this->send(["num_caixa" => $caixaAberto->num_caixa, "id_operador" => $caixaAberto->id_usuario]);
    }

    /**
     * Passo seuinte para logar no caixa 
     */
    public function logarCaixaAberto(string $numeroCaixa, LoginFrenteCaixaServices $loginFrenteCaixaServices, RequestBodyConverter $requestBodyConverter)
    {
        $loginFrenteCaixaDTO = $requestBodyConverter->deserializer(new LoginFrenteCaixaDTO());
        $loginFrenteCaixaDTO->setNumeroCaixa($numeroCaixa);

        return $this->send($loginFrenteCaixaServices->getTokenCaixaAberto($loginFrenteCaixaDTO));
    }

    public function getFuncionarios(FuncionarioRepositoryInterface $funcionarioRepository)
    {
        return $this->send($funcionarioRepository->buscaFuncionariosAtivos());
    }

    public function incluirProduto(RequestBodyConverter $requestBodyConverter, ProdutoFrenteCaixaRepositoryServiceInterface $produtoFrenteCaixaRepositoryService)
    {
        $cadastroProdutoDTO = $requestBodyConverter->deserializer(new CadastroProdutoDTO());
        return $this->send($produtoFrenteCaixaRepositoryService->novoProdutoFromFrenteCaixa($cadastroProdutoDTO), Response::HTTP_CREATED);
    }

    public function incluirServico(RequestBodyConverter $requestBodyConverter, ProdutoFrenteCaixaRepositoryServiceInterface $produtoFrenteCaixaRepositoryService)
    {
        $cadastroServicoDTO = $requestBodyConverter->deserializer(new CadastroServicoDTO());
        return $this->send($produtoFrenteCaixaRepositoryService->novoServicoFromFrenteCaixa($cadastroServicoDTO), Response::HTTP_CREATED);
    }

    public function getPromocaoKitsCodBarras(FrenteCaixaServices $frenteCaixaServices, string $codigoBarras)
    {
        return $this->send($frenteCaixaServices->pesquisaKitsCodigoBarras($codigoBarras));
    }

    public function buscaTotalDescontos(RequestBodyConverter $requestBodyConverter, FrenteCaixaServices $frenteCaixaServices)
    {
        $calculoDTO = $requestBodyConverter->deserializer(new CalculoTotalDescontosDTO());
        return $this->send($frenteCaixaServices->getTotalDescontos($calculoDTO));
    }

    /**
     * Action para buscar o total de desconto do mais por menos
     */
    public function buscaTotalDescontosDaVenda(FcVenda $venda, PromocaoQuantidadeRepositoryInterface $promocaoQuantidadeRepository)
    {
        return $this->send($promocaoQuantidadeRepository->getTotalDescontosVenda($venda->id));
    }

    /**
     * Action responsavel por criar um registro de venda pela frente de caixa e devolver os dados da venda
     */
    public function novaVenda(RequestBodyConverter $requestBodyConverter, FrenteCaixaServices $frenteCaixaServices)
    {
        $fCVendaDTO = $requestBodyConverter->deserializer(new FCVendaDTO());
        return $this->send($frenteCaixaServices->salvarVenda($fCVendaDTO), Response::HTTP_CREATED);
    }

    /**
     * Action responsavel por lancar o item de venda pela frente de caixa
     */
    public function novoItemVenda(FcVenda $venda, RequestBodyConverter $requestBodyConverter, FrenteCaixaServices $frenteCaixaServices)
    {
        $fCItemVendaDTO = $requestBodyConverter->deserializer(new FCItemVendaDTO());
        $fCItemVendaDTO->setIdVenda($venda->id);
        
        return $this->send($frenteCaixaServices->salvarItemVenda($fCItemVendaDTO), Response::HTTP_CREATED);
    }
}
