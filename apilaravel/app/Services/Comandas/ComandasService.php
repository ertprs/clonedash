<?php

namespace App\Services\Comandas;

use App\DTO\CmHistoricoDTO;
use App\Services\Utils\CodesApi;
use App\Model\Comanda\CmHistorico;
use App\DTO\VincularVendaProducaoDTO;
use App\DTO\SalvarItensVendaComandaDTO;
use App\DTO\CancelarVendaItemComandaDTO;
use App\Exceptions\ApiWebControlException;
use App\Repository\Contracts\UserRepositoryInterface;
use App\Repository\Contracts\Model\Cliente\ClienteRepositoryInterface;
use App\Repository\Contracts\Model\Produto\ProdutoRepositoryInterface;
use App\Repository\Contracts\Model\Funcionario\FuncionarioRepositoryInterface;
use App\Services\Repository\Contracts\Model\Venda\VendaRepositoryServiceInterface;
use App\Services\Repository\Contracts\Model\Venda\VendaItemRepositoryServiceInterface;
use App\Services\Repository\Contracts\Model\Comanda\CmComandaRepositoryServiceInterface;
use App\Services\Repository\Contracts\Model\Venda\VendaComandaRepositoryServiceInterface;

/**
 * @author Tiago Franco
 * Servico para
 */
class ComandasService
{
    /**
     * @var VendaRepositoryServiceInterface
     */
    private $_vendaRepositoryService;

    /**
     * @var VendaItemRepositoryServiceInterface
     */
    private $_vendaItemRepositoryService;

    /**
     * @var VendaComandaRepositoryServiceInterface
     */
    private $_vendaComandaRepositoryService;
    /**
     * @var ClienteRepositoryInterface
     */
    private $_clienteRepository;

    /**
     * @var UserRepositoryInterface
     */
    private $_userRepository;

    /**
     * @var ProdutoRepositoryInterface
     */
    private $_produtoRepository;

    /**
     * @var FuncionarioRepositoryInterface
     */
    private $_funcionarioRepository;
    /**
     * @var CmComandaRepositoryServiceInterface
     */
    private $_cmComandaRepositoryService;

    public function __construct(
        VendaRepositoryServiceInterface $vendaRepositoryService,
        VendaComandaRepositoryServiceInterface $vendaComandaRepositoryService,
        ClienteRepositoryInterface $clienteRepository,
        FuncionarioRepositoryInterface $funcionarioRepository,
        CmComandaRepositoryServiceInterface $cmComandaRepositoryService,
        UserRepositoryInterface $userRepository,
        VendaItemRepositoryServiceInterface $vendaItemRepositoryService,
        ProdutoRepositoryInterface $produtoRepository
    ) {
        $this->_vendaRepositoryService        = $vendaRepositoryService;
        $this->_vendaComandaRepositoryService = $vendaComandaRepositoryService;
        $this->_cmComandaRepositoryService    = $cmComandaRepositoryService;
        $this->_clienteRepository             = $clienteRepository;
        $this->_funcionarioRepository         = $funcionarioRepository;
        $this->_userRepository                = $userRepository;
        $this->_vendaItemRepositoryService    = $vendaItemRepositoryService;
        $this->_produtoRepository             = $produtoRepository;
    }

    public function getComandaDetalhada(string $numeroComanda)
    {
        $comanda = $this->_cmComandaRepositoryService->getComanda($numeroComanda);

        if ($comanda) {
            //Procura histórico da comanda
            $historico = $this->_cmComandaRepositoryService->getHistoricoComanda($numeroComanda);

            if ($historico) {
                $itens       = $this->_vendaRepositoryService->getItensDaVenda($historico->id_venda);
                $venda       = $this->_vendaRepositoryService->find($historico->id_venda);
                $cliente     = $this->_clienteRepository->find($venda->id_cliente);
                $funcionario = $this->_funcionarioRepository->find($venda->id_funcionario);

                return [
                    'comanda'     => $comanda,
                    'vendas'      => $itens,
                    'historico'   => $historico,
                    'venda'       => $venda,
                    'cliente'     => $cliente,
                    'funcionario' => $funcionario
                ];
            } else
                return [
                    'comanda'     => $comanda,
                    'vendas'      => [],
                    'historico'   => "",
                    'venda'       => "",
                    'cliente'     => "",
                    'funcionario' => ""
                ];
        }

        return [];
    }

    public function vincularVendaProducao(VincularVendaProducaoDTO $vincProducaoDTO)
    {
        $producoes = array();

        foreach ($vincProducaoDTO as $idItemVenda) {
            $producoes[] = $this->_cmComandaRepositoryService->salvaItemProducao($vincProducaoDTO->getId(), $idItemVenda);
        }

        $vendaStatus = $this->_vendaRepositoryService->vincularClienteFuncionario($vincProducaoDTO);

        return ['vendas_producao' => $producoes, 'vendas_status' => $vendaStatus];
    }

    public function salvarComanda(CmHistoricoDTO $cmHistoricoDTO)
    {
        //Procura comanda
        $comanda = $this->_cmComandaRepositoryService->getComanda($cmHistoricoDTO->getNumCm());
        //Caso a comanda não esteja cadastrada inicia o precesso de cadastro da comanda
        if (!$comanda) {

            $comanda   = $this->_cmComandaRepositoryService->salvaNovaComanda($cmHistoricoDTO->getNumCm());
            $venda     = $this->_vendaComandaRepositoryService->salvaNovaVendaComanda($cmHistoricoDTO->getVenda());

            //vincular o id da venda recem criada para vincular ao historico
            $cmHistoricoDTO->setIdVenda($venda->getAttributes()['id']);
            $historico = $this->_cmComandaRepositoryService->salvarHistoricoComanda($cmHistoricoDTO);

            // Retorna os dados dos novos cadastros
            return [
                'comanda'   => $comanda,
                'vendas'    => $venda,
                'historico' => $historico
            ];
        } else {
            //Envia o id para a função que busca comanda.
            return $this->getComandaDetalhada($cmHistoricoDTO->getNumCm());
        }
    }

    public function salvarItemVendaComanda(SalvarItensVendaComandaDTO $dto)
    {
        $historico = $this->_cmComandaRepositoryService->getHistoricoComanda($dto->getNumCm());
        if (!$historico) {
            throw new ApiWebControlException("Numero de comanda inválida", CodesApi::PARAMETROINVALIDO);
        }
        $dto->getVendaItens()->setIdVenda($historico->id_venda);

        return $this->_vendaComandaRepositoryService->salvarItemVenda($dto->getVendaItens());
    }

    public function removerItemVendaComanda(CancelarVendaItemComandaDTO $dtoCancelar)
    {
        $producao = $this->_vendaComandaRepositoryService->getProducaoItemVenda($dtoCancelar->getItemVenda());

        if ($producao) {
            if (empty($dtoCancelar->getSenhaMaster())) {
                throw new ApiWebControlException("Senha master é obrigatoria", CodesApi::OPERACAOINVALIDA);
            }

            $master = $this->_userRepository->getUserBySenhaEncrypt($dtoCancelar->getSenhaMaster());

            if (!$master) {
                throw new ApiWebControlException("Senha inválida", CodesApi::OPERACAOINVALIDA);
            }
        }

        $this->_vendaItemRepositoryService->delete($dtoCancelar->getItemVenda());
    }

    public function vincularClienteComanda(CmHistoricoDTO $cmHistoricoDTO)
    {
        $cmHistorico = $this->_cmComandaRepositoryService->vincularClienteComanda($cmHistoricoDTO);

        if ($cmHistorico) {
            
            return  [
                'venda' => $this->_vendaComandaRepositoryService->vincularVendaComanda($cmHistoricoDTO),
                'cm_historico' => $cmHistorico
            ];
        }

        throw new ApiWebControlException("Erro ao vincular o cliente", CodesApi::OPERACAOINVALIDA);
    }

    public function salvarTaxaComanda(SalvarItensVendaComandaDTO $salvarDto)
    {

        $historico = $this->_cmComandaRepositoryService->getHistoricoComanda($salvarDto->getNumCm());

        $gorjeta = $this->_produtoRepository->getProdutoGorjeta();

        if (!isset($gorjeta->id)) {
            throw new ApiWebControlException("Não foi encontrado um produto para vinculo da taxa", CodesApi::OPERACAOINVALIDA);
        }

        $salvarDto->getVendaItens()->setIdProduto($gorjeta->id)->setIdVenda($historico->id_venda);

        $this->_vendaComandaRepositoryService->salvaTaxaItem($salvarDto->getVendaItens());
    }
}
