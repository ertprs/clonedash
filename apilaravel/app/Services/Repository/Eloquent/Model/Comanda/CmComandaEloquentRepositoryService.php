<?php

namespace App\Services\Repository\Eloquent\Model\Comanda;

use App\DTO\CmHistoricoDTO;
use App\Model\Comanda\CmComanda;
use App\Services\Utils\CodesApi;
use App\Model\Comanda\CmProducao;
use App\Model\Comanda\CmHistorico;
use Illuminate\Support\Facades\DB;
use App\Exceptions\ApiWebControlException;
use App\Repository\Eloquent\Model\Comanda\CmComandaEloquentRepository;
use App\Services\Repository\Eloquent\WebControlEloquentRepositoryService;
use App\Services\Repository\Contracts\Model\Comanda\CmComandaRepositoryServiceInterface;

/**
 * @author Tiago Franco
 * Servico de acesso ao repositorio de Model
 * Deverá possuir os metodos contendo operacoes de escrita 
 * do modelo implementando a interface do repositorio
 */
class CmComandaEloquentRepositoryService extends WebControlEloquentRepositoryService implements CmComandaRepositoryServiceInterface
{
    public function __construct(CmComanda $model, CmComandaEloquentRepository $repository)
    {
        parent::__construct($model, $repository);
    }

    /**
     * Função resposável por preencher a Model da tabela cm_producao .
     * 
     * @param array $params Array com os dados para serem gravados na tabela.
     * 
     * @return CmProducao $producao Retorna a model com os dados do registro salvo.
     */
    public function salvaItemProducao(int $idVenda, int $idItemVenda)
    {
        $producao = new CmProducao();
        $producao->id_venda = $idVenda;
        $producao->idvenda_item = $idItemVenda;
        $producao->enviado_producao = 'S';
        $producao->save();
        return $producao;
    }

    /**
     * Função para preencher model e salvar no histórico a nova venda e comanda criada.
     * 
     * @param array $params Array com os dados para serem gravados na tabela.
     * 
     * @return CmHistorico $comanda Retorna a model com os dados do histórico;
     */
    public function salvarHistoricoComanda(CmHistoricoDTO $cmHistoricoDTO)
    {
        $historico = new CmHistorico;
        $historico->id_cadastro       = $this->_usuarioLogadoService->getIdCadastroLogado();
        $historico->id_venda          = $cmHistoricoDTO->getIdVenda();
        $historico->id_mesa           = 0;
        $historico->id_cliente        = $cmHistoricoDTO->getIdCliente();
        $historico->num_cm            = $cmHistoricoDTO->getNumCm();
        $historico->status            = 1;
        $historico->datahora_abertura = date("Y-m-d H:i:s");
        $historico->last_id_impresso  = 0;
        $historico->id_reserva        = 0;
        $historico->num_pessoas       = 1;
        $historico->tipo_cm           = 'C';
        $historico->save();
        return $historico;
    }

    /**
     * Função para preencher model e salvar uma nova comanda.
     * @return CmComanda $comanda Retorna a model com os dados da comanda salvada;
     */
    public function salvaNovaComanda(string $numeroComanda)
    {
        $comanda = new CmComanda();
        $comanda->id_cadastro = $this->_usuarioLogadoService->getIdCadastroLogado();
        $comanda->num_comanda = $numeroComanda;
        $comanda->status      = 1;
        $comanda->save();
        return $comanda;
    }

    public function vincularClienteComanda(CmHistoricoDTO $cmHistoricoDTO)
    {
        $filtros = $cmHistoricoDTO->getWhereIdMesaOrComanda();
        $cmHistorico = DB::connection($this->model->getConnectionName())
            ->table("base_web_control.cm_historico")
            ->where(["id_cadastro" => $this->_usuarioLogadoService->getIdCadastroLogado(), $filtros['coluna'] => $filtros["valor"]])
            ->orderBy('id', 'desc')
            ->first();

        if ($cmHistorico) {
            $sql = "UPDATE base_web_control.cm_historico SET id_cliente = ? where id = ?";
            DB::update($sql, [$cmHistoricoDTO->getIdCliente(), $cmHistorico->id]);
            $cmHistorico->id_cliente = $cmHistoricoDTO->getIdCliente();
            return $cmHistorico;
        }

        return null;
    }

    public function atualiarQtdePessoas($numeroComanda, int $qtdePessoa)
    {
        $comanda = $this->repository->getComanda($numeroComanda);
        if ($comanda) {
            $comanda->qtde_pessoas = $qtdePessoa;
            $comanda->status       = 1;
            $comanda->save();
            return  $comanda;
        }

        throw new ApiWebControlException("Número de comanda inválida", CodesApi::PARAMETROINVALIDO);
    }
}
