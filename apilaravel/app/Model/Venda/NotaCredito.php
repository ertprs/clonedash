<?php

namespace App\Model\Venda;

use Illuminate\Database\Eloquent\Model;

class NotaCredito extends Model
{


    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'base_web_control.nota_credito';
    const UPDATED_AT = 'data_cadastro';
    const CREATED_AT = 'data_alteracao';

    protected $fillable = [
        "id_venda_origem",
        "id_venda_devol",
        "id_cliente",
        "id_cadastro",
        "data_cadastro",
        "hora_cadastro",
        "valor_credito",
        "id_func_cadastro",
        "id_venda_resgate",
        "data_resgate",
        "hora_resgate",
        "valor_resgate",
        "id_func_resgate",
        "justificativa",
        "status",
        "id_usuario_exclusao",
        "data_alteracao",
        "data_sincronismo",
    ];
}
