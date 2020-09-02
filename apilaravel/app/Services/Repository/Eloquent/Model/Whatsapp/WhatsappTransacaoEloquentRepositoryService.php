<?php

namespace App\Services\Repository\Eloquent\Model\Whatsapp;

use Illuminate\Support\Facades\DB;
use App\Model\Whatsapp\WhatsappTransacao;
use App\Services\Repository\Eloquent\WebControlEloquentRepositoryService;
use App\Repository\Eloquent\Model\Whatsapp\WhatsappTransacaoEloquentRepository;
use App\Services\Repository\Contracts\Model\Whatsapp\WhatsappTransacaoRepositoryServiceInterface;

/**
 * @author Tiago Franco
 * Servico de acesso ao repositorio de Model
 * Deverá possuir os metodos contendo operacoes de escrita 
 * do modelo implementando a interface do repositorio
 */
class WhatsappTransacaoEloquentRepositoryService extends WebControlEloquentRepositoryService implements WhatsappTransacaoRepositoryServiceInterface
{
    public function __construct(WhatsappTransacao $model, WhatsappTransacaoEloquentRepository $repository)
    {
        parent::__construct($model, $repository);
    }

    public function atualizarStatusPhoneCampanha(int $idTransmissao, string $telefone, int $status)
    {
        $sql = "UPDATE base_web_control.whatsapp_transacao SET status_transmissao = ?
                WHERE id_transmissao = ? AND telefone = ?";
        return DB::connection($this->model->getConnectionName())->update($sql, [
            $status, $idTransmissao, $telefone
        ]);
    }
}
