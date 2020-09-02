<?php

namespace App\Model\Venda;

use Illuminate\Database\Eloquent\Model;

class NotaCreditoHistorico extends Model
{


    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'base_web_control.nota_credito_historico';

    const UPDATED_AT = "data_hora";
    const CREATED_AT = null;

    protected $fillable = [
        "id_cadastro",
        "idnota_credito",
        "data_hora",
        "id_venda",
        "valor_inicial",
        "valor_abatido",
    ];
}
