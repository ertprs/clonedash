<?php

namespace App\Services\Repository\Eloquent\Model\FrenteCaixa;

use App\Model\FrenteCaixa\FcVenda;
use App\DTO\FrenteCaixa\FCVendaDTO;
use App\Model\FrenteCaixa\FcVendaItem;
use App\DTO\FrenteCaixa\FCItemVendaDTO;
use App\Repository\Eloquent\Model\FrenteCaixa\FcVendaEloquentRepository;
use App\Services\Repository\Eloquent\WebControlEloquentRepositoryService;
use App\Services\Repository\Contracts\Model\FrenteCaixa\FcVendaRepositoryServiceInterface;

/**
 * @author Tiago Franco
 * Servico de acesso ao repositorio de Model
 * Deverá possuir os metodos contendo operacoes de escrita 
 * do modelo implementando a interface do repositorio
 */
class FcVendaEloquentRepositoryService extends WebControlEloquentRepositoryService implements FcVendaRepositoryServiceInterface
{
    public function __construct(FcVenda $model, FcVendaEloquentRepository $repository)
    {
        parent::__construct($model, $repository);
    }

    public function novaVendaFrenteCaixa(FCVendaDTO $fCVendaDTO, array $informacoesCaixa)
    {
        $venda                         = new FcVenda();
        $venda->setConnection($this->connection);

        $venda->id_tipo_venda          = $fCVendaDTO->getIdTipoVenda();
        $venda->id_cadastro            = $this->_usuarioLogadoService->getIdCadastroLogado();
        $venda->id_usuario             = $this->_usuarioLogadoService->getIdUsuarioLogado();
        $venda->id_usuario_fecha_venda = $fCVendaDTO->getIdUsuarioFechaVenda();
        $venda->id_funcionario         = $fCVendaDTO->getIdFuncionario();
        $venda->id_cliente             = $fCVendaDTO->getIdCliente();
        $venda->situacao               = $fCVendaDTO->getSituacao();
        $venda->id_abertura_caixa      = $informacoesCaixa["id"];
        $venda->save();

        return $venda;
    }

    public function novoItemVendaFrenteCaixa(FCItemVendaDTO $fCItemVendaDTO)
    {
        $itemVenda                      = new FcVendaItem();
        $itemVenda->setConnection($this->connection);

        $itemVenda->qtd                 = $fCItemVendaDTO->getQtd();
        $itemVenda->id_produto          = $fCItemVendaDTO->getIdProduto();
        $itemVenda->nome_produto        = $fCItemVendaDTO->getNomeProduto();
        $itemVenda->preco_tabela        = $fCItemVendaDTO->getValorUnitario();
        $itemVenda->codigo_barra        = $fCItemVendaDTO->getCodigoBarra();
        $itemVenda->preco_venda         = $fCItemVendaDTO->getPrecoVenda();
        $itemVenda->id_unidade          = $fCItemVendaDTO->getIdUnidade();
        $itemVenda->valor_preco_custo   = $fCItemVendaDTO->getValorPrecoCusto();
        $itemVenda->percentual_desconto = $fCItemVendaDTO->getPercentualDesconto();
        $itemVenda->id_grade            = $fCItemVendaDTO->getIdGrade();
        $itemVenda->id_promocao         = $fCItemVendaDTO->getIdPromocao();
        $itemVenda->id_kit              = $fCItemVendaDTO->getIdKit();
        $itemVenda->atacado_varejo      = $fCItemVendaDTO->getTipoCompra();
        $itemVenda->id_venda            = $fCItemVendaDTO->getIdVenda();
        $itemVenda->id_cadastro         = $this->_usuarioLogadoService->getIdCadastroLogado();
        $itemVenda->save();

        return $itemVenda;
    }

    public function salvarItensKitProduto(int $idVenda, array $itensKit)
    {
        $itensVenda = [];
        
        $itemVenda = new FcVendaItem();
        $itemVenda->setConnection($this->connection);

        foreach($itensKit as $itemKit) {
            $dadosItem = [
                "id_venda"          => $idVenda,
                "qtd"               => $itemKit->qtd,
                "id_produto"        => $itemKit->id_produto,
                "nome_produto"      => $itemKit->nome_produto,
                "preco_tabela"      => $itemKit->preco_tabela,
                "codigo_barra"      => $itemKit->codigo_barra,
                "preco_venda"       => $itemKit->preco_venda,
                "id_unidade"        => $itemKit->id_unidade,
                "valor_preco_custo" => $itemKit->valor_preco_custo,
                "id_grade"          => $itemKit->id_grade,
                "id_kit"            => $itemKit->id_kit,
                "id_cadastro"       => $this->_usuarioLogadoService->getIdCadastroLogado()
            ];
 
            $itensVenda[] = $itemVenda->create($dadosItem);
        }

        return $itensVenda;
    }
}
