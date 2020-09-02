<?php

namespace App\Repository\Eloquent\Model\Whatsapp;

use Illuminate\Support\Facades\DB;
use App\Model\Whatsapp\WhatsappCampanha;
use App\Repository\Eloquent\WebControlEloquentRepository;
use App\Repository\Contracts\Model\Whatsapp\WhatsappCampanhaRepositoryInterface;

/**
 * @author Tiago Franco
 * Repositorio para metodos de consultas dos clientes
 * Todas as consultas deverá ser realizadas passando
 * a conexao atraves do metodo ::connection(connection)
 */
class WhatsappCampanhaEloquentRepository extends WebControlEloquentRepository implements WhatsappCampanhaRepositoryInterface
{
    protected $model;
    /**
     * Instantiate reporitory
     * 
     * @param WhatsappCampanha $model
     */
    public function __construct(WhatsappCampanha $model)
    {
        parent::__construct($model);
    }

    public function getIdCampanhasComEnvioFonePendentes(int $qtdeDias = 6)
    {

        $sql = "SELECT c.id 
                FROM base_web_control.whatsapp_campanha c
                WHERE c.status_campanha = 'E'
                AND EXISTS( SELECT t.id
                            FROM base_web_control.whatsapp_transacao t
                            WHERE t.id_campanha = c.id
                            AND t.status_transmissao NOT IN (6,7,8,9)
                            LIMIT 1 
                          )
                AND DATE_ADD(c.dt_creation, INTERVAL $qtdeDias DAY) >= curdate()";

        return array_column(DB::connection($this->model->getConnectionName())->select($sql), "id");
    }

    public function getIdTransmissoesCampanhas(array $idCampanhas)
    {
        $in  = implode(",", $idCampanhas);
        $sql = "SELECT DISTINCT id_transmissao FROM base_web_control.whatsapp_log where id_campanha IN ($in) ";

        return array_column(DB::connection($this->model->getConnectionName())->select($sql), "id_transmissao");
    }
}
