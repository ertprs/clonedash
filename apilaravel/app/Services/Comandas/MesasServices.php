<?php

namespace App\Services\Comandas;

use App\DTO\CmHistoricoDTO;
use App\Model\Comanda\CmMesa;
use App\Services\Utils\CodesApi;
use App\DTO\SalvarItensVendaComandaDTO;
use App\Exceptions\ApiWebControlException;
use App\Repository\Contracts\Model\Venda\VendaRepositoryInterface;
use App\Repository\Contracts\Model\Cliente\ClienteRepositoryInterface;
use App\Repository\Contracts\Model\Produto\ProdutoRepositoryInterface;
use App\Repository\Contracts\Model\Funcionario\FuncionarioRepositoryInterface;
use App\Services\Repository\Contracts\Model\Comanda\CmMesaRepositoryServiceInterface;
use App\Services\Repository\Contracts\Model\Venda\VendaComandaRepositoryServiceInterface;

/**
 * @author Tiago Franco
 * Servico para procesamento das operacoes envolvendo as mesas da comanda
 */
class MesasServices
{
    /**
     * @var VendaRepositoryInterface
     */
    private $_vendaRepository;
    /**
     * @var ClienteRepositoryInterface
     */
    private $_clienteRepository;
    /**
     * @var CmMesaRepositoryServiceInterface
     */
    private $_cmMesaRepositoryService;
    /**
     * @var VendaComandaRepositoryServiceInterface
     */
    private $_vendaComandaRepositoryService;
    /**
     * @var FuncionarioRepositoryInterface
     */
    private $_funcionarioRepository;

    /**
     * @var ProdutoRepositoryInterface
     */
    private $_produtoRepository;

    public function __construct(
        VendaRepositoryInterface $vendaRepository,
        ClienteRepositoryInterface $clienteRepository,
        CmMesaRepositoryServiceInterface $cmMesaRepositoryService,
        VendaComandaRepositoryServiceInterface $vendaComandaRepositoryService,
        FuncionarioRepositoryInterface $funcionarioRepository,
        ProdutoRepositoryInterface $produtoRepository
    ) {
        $this->_vendaRepository               = $vendaRepository;
        $this->_clienteRepository             = $clienteRepository;
        $this->_cmMesaRepositoryService       = $cmMesaRepositoryService;
        $this->_vendaComandaRepositoryService = $vendaComandaRepositoryService;
        $this->_funcionarioRepository         = $funcionarioRepository;
        $this->_produtoRepository             = $produtoRepository;
    }


    public function recuperarMesa(CmMesa $cmMesa, CmHistoricoDTO $cmHistoricoDTO)
    {
        $historico = $this->_cmMesaRepositoryService->getHistoricoMesa($cmMesa->id);

        if (!$historico) {
            $cmHistoricoDTO->setId($cmMesa->id);
            $cliente = $this->_clienteRepository->getClienteBalcao();

            $venda     = $this->_vendaComandaRepositoryService->salvaNovaVendaComanda($cmHistoricoDTO->getVenda());
            $cmHistoricoDTO->setIdVenda($venda->id);
            $cmHistoricoDTO->setIdMesa($cmMesa->id);
            $historico = $this->_cmMesaRepositoryService->salvarHistoricoMesa($cmHistoricoDTO);

            return [
                'mesa'    => $cmMesa,
                'vendas'  => [],
                'cliente' => $cliente
            ];
        } else {
            $itensVenda  = $this->_vendaRepository->getItensDaVenda($historico->id_venda);
            $venda       = $this->_vendaRepository->find($historico->id_venda);
            $cliente     = $this->_clienteRepository->find($venda->id_cliente);
            $funcionario = $this->_funcionarioRepository->find($venda->id_funcionario);

            return [
                'mesa'        => $cmMesa,
                'vendas'      => $itensVenda,
                'venda'       => $venda,
                'cliente'     => $cliente,
                'funcionario' => $funcionario
            ];
        }
    }

    public function salvarItemVendaMesa(SalvarItensVendaComandaDTO $dto)
    {
        $historico = $this->_cmMesaRepositoryService->getHistoricoMesa($dto->getIdMesa());
        if (!$historico) {
            throw new ApiWebControlException("Id da mesa inválido", CodesApi::PARAMETROINVALIDO);
        }
        $dto->getVendaItens()->setIdVenda($historico->id_venda);

        return $this->_vendaComandaRepositoryService->salvarItemVenda($dto->getVendaItens());
    }

    public function salvarTaxaMesa(SalvarItensVendaComandaDTO $salvarDto)
    {

        $historico = $this->_cmMesaRepositoryService->getHistoricoMesa($salvarDto->getIdMesa());

        $gorjeta = $this->_produtoRepository->getProdutoGorjeta();
        if (!isset($gorjeta->id)) {
            throw new ApiWebControlException("Não foi encontrado um produto para vinculo da taxa", CodesApi::OPERACAOINVALIDA);
        }

        $salvarDto->getVendaItens()->setIdProduto($gorjeta->id)->setIdVenda($historico->id_venda);
        $this->_vendaComandaRepositoryService->salvaTaxaItem($salvarDto->getVendaItens());
    }
}
