<?php

namespace App\Services\Repository\Eloquent\Model\Venda;

use App\DTO\VendaDTO;
use App\DTO\VendaItemDTO;
use App\Model\Venda\Venda;
use App\DTO\CmHistoricoDTO;
use App\Model\Produto\Produto;
use App\Model\Venda\VendaItem;
use App\Services\Utils\CodesApi;
use Illuminate\Support\Facades\DB;
use App\Exceptions\ApiWebControlException;
use App\Repository\Eloquent\Model\Venda\VendaComandaEloquentRepository;
use App\Services\Repository\Eloquent\WebControlEloquentRepositoryService;
use App\Services\Repository\Contracts\Model\Venda\VendaComandaRepositoryServiceInterface;

/**
 * @author Tiago Franco
 * Servico de acesso ao repositorio de Model
 * Deverá possuir os metodos contendo operacoes de escrita 
 * do modelo implementando a interface do repositorio
 * Repositorio service fake para prover as operacoes envolvendo vendas em comandas
 */
class VendaComandaEloquentRepositoryService extends WebControlEloquentRepositoryService implements VendaComandaRepositoryServiceInterface
{
    public function __construct(Venda $model, VendaComandaEloquentRepository $repository)
    {
        parent::__construct($model, $repository);
    }

    /** 
     * PRECISA VALIDAR A REGRA DE NEGOCIO *
     * Função para preencher model de uma nova Venda
     * 
     * @param VendaDTO $vendaDTO - dados da venda
     * 
     * @return Venda $venda Retorna dados do registro na tabela de venda.          
     */
    public function salvaNovaVendaComanda(VendaDTO $vendaDTO)
    {
        $venda = new Venda;
        $venda->id_tipo_venda                = 0;
        $venda->id_cadastro                  = $this->_usuarioLogadoService->getIdCadastroLogado();
        $venda->id_usuario                   = $this->_usuarioLogadoService->getIdUsuarioLogado();
        $venda->id_usuario_fecha_venda       = 0; //Precisa validar
        $venda->id_usuario_orcamento         = 0; //Precisa validar
        $venda->id_usuario_extorno           = 0; //Precisa validar
        $venda->id_usuario_autoriza_desconto = 0; //Precisa validar
        $venda->id_usuario_exclusao          = 0; //Precisa validar
        $venda->id_funcionario               = $vendaDTO->getIdFuncionario();
        $venda->id_cliente                   = $vendaDTO->getIdCliente();
        $venda->id_venda_local               = 0; //Precisa validar *
        $venda->id_forma_pagamento           = 0; //Precisa validar *
        $venda->id_parcela                   = 0; //Precisa validar *
        $venda->id_nota_devolucao            = 0; //Precisa validar
        $venda->data_venda                   = date("Y-m-d H:i:s");
        $venda->hora_venda                   = date("H:i:s");
        $venda->situacao                     = Venda::SIT_COMANDA_AGRUPADA; //Precisa validar *
        $venda->tipo_pgto                    = Venda::TIPO_DINHEIRO; //Precisa validar *
        $venda->sessao_venda                 = "?"; //Precisa validar
        $venda->data_orcamento               = date("Y-m-d"); //Precisa validar 
        $venda->hora_orcamento               = date("H:i:s"); //Precisa validar 
        $venda->orcamento                    = 'N';
        $venda->data_validade                = date("Y-m-d"); //Precisa validar
        $venda->a_vista                      = Venda::VISTA; //Precisa validar * 
        $venda->origem_venda                 = Venda::ORIGEM_WEB_CONTROL; //Precisa validar *
        $venda->pago                         = 'S';
        $venda->valor_final_desconto         = 0;
        $venda->nfe_status                   = Venda::NFE_OK; //Precisa validar *
        $venda->tp_nf                        = 'NFE'; //Precisa validar *
        $venda->ambiente_nf                  = 2;
        $venda->id_abertura_caixa            = 0; //Precisa validar *
        $venda->id_comandas_agrupadas        = 0; //Precisa validar *
        $venda->id_venda_destino             = 0; //Precisa validar *
        $venda->valor_entrada                = 0; //Precisa validar *
        $venda->id_cupom_venda               = 0; //Precisa validar *
        $venda->id_objeto_cliente            = 0; //Precisa validar *
        $venda->id_placa                     = 0; //Precisa validar *
        $venda->save();
        return $venda;
    }

    public function vincularVendaComanda(CmHistoricoDTO $cmHistoricoDTO)
    {
        $comanda = DB::connection($this->model->getConnectionName())
            ->table("base_web_control.cm_historico")
            ->select('id', 'id_venda', 'num_cm')
            ->where([
                'id_cadastro' => $this->_usuarioLogadoService->getIdCadastroLogado(),
                $cmHistoricoDTO->getWhereIdMesaOrComanda(),
                'status' => 1
            ])->first();

        if (!$comanda) {
            throw new ApiWebControlException("Erro ao vincular a venda, comanda inválida", CodesApi::PARAMETROINVALIDO);
        }

        $venda = $this->find($comanda->id_venda);
        $venda->id_cliente     = $cmHistoricoDTO->getIdCliente();
        $venda->id_funcionario = $cmHistoricoDTO->getVenda()->getIdFuncionario();
        $venda->save();

        return $venda;
    }

    /**
     * Vincular um item de venda na venda
    */
    public function salvarItemVenda(VendaItemDTO $vendaItemDTO) {
        $produto = Produto::find($vendaItemDTO->getIdProduto());
        $vendaItem = new VendaItem();
        $vendaItem->qtd                 = $vendaItemDTO->getQtd(); //Precisa validar *
        $vendaItem->id_venda            = $vendaItemDTO->getIdVenda();
        $vendaItem->id_produto          = $vendaItemDTO->getIdProduto(); //Precisa validar *
        $vendaItem->nome_produto        = $vendaItemDTO->getNomeProduto(); //Precisa validar *
        $vendaItem->preco_tabela        = $vendaItemDTO->getPrecoTabela() ;  //Precisa validar *
        $vendaItem->nome_classificacao  = $produto->id_classificacao; //Precisa validar *
        $vendaItem->codigo_barra        = $vendaItemDTO->getCodigoBarra() ;  //Precisa validar *
        $vendaItem->preco_venda         = $vendaItemDTO->getPrecoTabela();  //Precisa validar *
        $vendaItem->desconto            = "N"; //Precisa validar *
        $vendaItem->percentual_desconto = 0 ; 
        $vendaItem->id_grade            = $vendaItemDTO->getIdGrade() ; 
        $vendaItem->id_cadastro         = $this->_usuarioLogadoService->getIdCadastroLogado();
        
        $vendaItem->save();
        return $vendaItem;
    }

    public function salvaTaxaItem(VendaItemDTO $vendaItemDTO){
        $vendaItem = new VendaItem();
        $vendaItem->qtd                 = $vendaItemDTO->getQtd(); //Precisa validar *
        $vendaItem->id_venda            = $vendaItemDTO->getIdVenda();
        $vendaItem->id_produto          = $vendaItemDTO->getIdProduto(); //Precisa validar *
        $vendaItem->nome_produto        = $vendaItemDTO->getNomeProduto(); //Precisa validar *
        $vendaItem->preco_tabela        = $vendaItemDTO->getPrecoTabela() ;  //Precisa validar *
        $vendaItem->nome_classificacao  = "TESTE"; //Precisa validar *
        $vendaItem->codigo_barra        = "TAXA" ;  //Precisa validar *
        $vendaItem->preco_venda         = $vendaItemDTO->getPrecoTabela();  //Precisa validar *
        $vendaItem->desconto            = "N"; //Precisa validar *
        $vendaItem->percentual_desconto = 0 ; 
        $vendaItem->id_grade            = $vendaItemDTO->getIdGrade() ; 
        $vendaItem->id_cadastro         = $this->_usuarioLogadoService->getIdCadastroLogado();
        $vendaItem->save();
        return $vendaItem;
    }

    public function vincularAnotacao(string $anotacao, int  $idItemVenda)
    {
        $sql = "UPDATE base_web_control.venda_itens
                    set  observacoes_cozinha = :observacoes_cozinha
                WHERE id = :id and id_cadastro = :id_cadastro";

        return DB::update($sql, [
            ":id"                  => $idItemVenda,
            ":id_cadastro"         => $this->_usuarioLogadoService->getIdCadastroLogado(),
            ":observacoes_cozinha" => $anotacao
        ]);
    }
    
}
