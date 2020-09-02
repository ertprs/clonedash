<?php

namespace App\Services\Repository\Eloquent\Model\Venda;

use App\Services\Utils\CodesApi;
use Illuminate\Support\Facades\DB;
use App\Model\Venda\VendaDevolucao;
use App\DTO\FrenteCaixa\DevolucaoDTO;
use App\Entity\Model\Venda\VendaInterface;
use App\Exceptions\ApiWebControlException;
use App\Model\Venda\VendaItemDevolucao;
use App\Repository\Eloquent\Model\Venda\VendaDevolucaoEloquentRepository;
use App\Services\Repository\Eloquent\WebControlEloquentRepositoryService;
use App\Services\Repository\Contracts\Model\Venda\VendaDevolucaoRepositoryServiceInterface;

/**
 * @author Tiago Franco
 * Servico de acesso ao repositorio de Model
 * Deverá possuir os metodos contendo operacoes de escrita 
 * do modelo implementando a interface do repositorio
 */
class VendaDevolucaoEloquentRepositoryService extends WebControlEloquentRepositoryService implements VendaDevolucaoRepositoryServiceInterface
{
    public function __construct(VendaDevolucao $model, VendaDevolucaoEloquentRepository $repository)
    {
        parent::__construct($model, $repository);
    }

    public function devolverProdutoDB(DevolucaoDTO $devolucaoDTO)
    {
        $vendaDevolucao              = new VendaDevolucao(); 
        $vendaDevolucao->id_cadastro = $this->_usuarioLogadoService->getIdCadastroLogado();
        $vendaDevolucao->data        = date('Y-m-d');
        $vendaDevolucao->hora        = date('H:i:s');
        $vendaDevolucao->id_cliente  = $devolucaoDTO->getIdCliente();
        $vendaDevolucao->save();    
        
        if (!$vendaDevolucao->id) {
            throw new ApiWebControlException("Erro ao salvar a devolução", CodesApi::ERROOPERACAO);
        }

        return $vendaDevolucao;
    }

    public function devolverVendaDB(VendaInterface $venda)
    {
        $vendaDevolucao              = new VendaDevolucao();
        $vendaDevolucao->id_cadastro = $this->_usuarioLogadoService->getIdCadastroLogado();
        $vendaDevolucao->data        = date('Y-m-d');
        $vendaDevolucao->hora        = date('H:i:s');
        $vendaDevolucao->id_cliente  = $venda->id_cliente;
        $vendaDevolucao->id_venda    = $venda->id;
        $vendaDevolucao->save();

        return $vendaDevolucao;
    }

    public function salvarItemDevolucao(DevolucaoDTO $devolucaoDTO, int $idVendaDevolucao)
    {
        $vendaItemDevolucao                 = new VendaItemDevolucao();
        $vendaItemDevolucao->id_venda_devol = $idVendaDevolucao;
        $vendaItemDevolucao->qtd            = $devolucaoDTO->getQuantidade();
        $vendaItemDevolucao->nome_produto   = $devolucaoDTO->getDescricaoProduto();
        $vendaItemDevolucao->codigo_barra   = $devolucaoDTO->getIdCliente();
        $vendaItemDevolucao->preco_venda    = $devolucaoDTO->getValorPagamento();
        $vendaItemDevolucao->data           = date('Y-m-d');
        $vendaItemDevolucao->hora           = date('H:i:s');
        $vendaItemDevolucao->finalizados    = "S";
        $vendaItemDevolucao->id_grade       = $devolucaoDTO->getIdGrade();
        $vendaItemDevolucao->save();

        if (!$vendaItemDevolucao->id) {
            throw new ApiWebControlException("Erro ao salvar o item da devolução", CodesApi::ERROOPERACAO);
        }

        return $vendaItemDevolucao;
    }
}
