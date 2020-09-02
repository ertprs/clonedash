<?php

namespace App\Services\Repository\Eloquent\Model\Comanda;

use App\DTO\MesaDTO;
use App\DTO\CmHistoricoDTO;
use App\Model\Comanda\CmMesa;
use App\Services\Utils\CodesApi;
use App\Model\Comanda\CmHistorico;
use Illuminate\Support\Facades\DB;
use App\Repository\Eloquent\Model\Comanda\CmMesaEloquentRepository;
use App\Services\Repository\Eloquent\WebControlEloquentRepositoryService;
use App\Services\Repository\Contracts\Model\Comanda\CmMesaRepositoryServiceInterface;

/**
 * @author Tiago Franco
 * Servico de acesso ao repositorio de Model
 * Deverá possuir os metodos contendo operacoes de escrita 
 * do modelo implementando a interface do repositorio
 */
class CmMesaEloquentRepositoryService extends WebControlEloquentRepositoryService implements CmMesaRepositoryServiceInterface
{
    public function __construct(CmMesa $model, CmMesaEloquentRepository $repository)
    {
        parent::__construct($model, $repository);
    }

    /**
     * Função para preencher model e salvar no histórico a nova venda e comanda criada.
     * 
     * @param array $params Array com os dados para serem gravados na tabela.
     * 
     * @return CmHistorico $comanda Retorna a model com os dados do histórico;
     */
    public function salvarHistoricoMesa(CmHistoricoDTO $cmHistoricoDTO)
    {
        $historico = new CmHistorico;
        $historico->id_cadastro       = $this->_usuarioLogadoService->getIdCadastroLogado();
        $historico->id_venda          = $cmHistoricoDTO->getIdVenda();
        $historico->id_mesa           = $cmHistoricoDTO->getIdMesa();
        $historico->id_cliente        = $cmHistoricoDTO->getIdCliente();
        $historico->num_cm            = 0;
        $historico->status            = 1;
        $historico->datahora_abertura = date("Y-m-d H:i:s");
        $historico->last_id_impresso  = 0;
        $historico->id_reserva        = 0;
        $historico->num_pessoas       = 1;
        $historico->tipo_cm           = 'M';
        $historico->save();
        return $historico;
    }

    public function criarMesa(MesaDTO $mesaDTO)
    {
        $mesa = $this->repository->getMesa($mesaDTO->getNumMesa());

        if (!$mesa) {
            $mesa = new CmMesa();
            $mesa->id_cadastro  = $this->_usuarioLogadoService->getIdCadastroLogado();
            $mesa->num_mesa     = $mesaDTO->getNumMesa();
            $mesa->status       = 0;
            $mesa->qtde_pessoas = $mesaDTO->getQtdePessoas();
            $mesa->save();
        }

        return $mesa;
    }

    public function atualiarQtdePessoas(int $idMesa, int $qtdePessoa)
    {
        $sql = "update base_web_control.cm_mesa
                    set qtde_pessoas = :qtde_pessoas
                where id = :id
                    and id_cadastro = :id_cadastro
                    and status = 1";

        DB::update($sql, [
            ":id"           => $idMesa,
            ":id_cadastro"  => $this->_usuarioLogadoService->getIdCadastroLogado(),
            ":qtde_pessoas" => $qtdePessoa
        ]);
    }
}
