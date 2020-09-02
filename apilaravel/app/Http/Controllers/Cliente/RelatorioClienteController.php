<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use App\DTO\Relatorios\RelatorioClienteDTO;
use App\Services\Extensions\RequestBodyConverter;
use App\Repository\Contracts\Model\Cliente\ClienteRepositoryInterface;
use App\Repository\Contracts\Model\Relatorio\RelatorioCamposRepositoryInterface;



class RelatorioClienteController extends Controller
{
    /**
     * Função responsável por fazer a pesquisa do relatorio de clientes
     */
    public function pesquisaRelatorioClientes(
        RequestBodyConverter $requestBodyConverter,
        RelatorioCamposRepositoryInterface $relatorioCamposRepositorio,
        ClienteRepositoryInterface $clienteRepository
    ) {
        $relatorioClienteDTO = $requestBodyConverter->deserializer(new RelatorioClienteDTO());

        $clientes = $clienteRepository->relatorioClientes($relatorioClienteDTO);
        $filtros  = $relatorioCamposRepositorio->getCamposSelecionados($relatorioClienteDTO->getCampos());

        return $this->send(['clientes' => $clientes, 'filtros' => $filtros]);
    }
}
