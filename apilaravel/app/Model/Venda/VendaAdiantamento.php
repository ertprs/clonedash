<?php

namespace App\Model\Venda;

use Illuminate\Database\Eloquent\Model;

class VendaAdiantamento extends Model
{
    protected $table = 'base_web_control.venda_adiantamento';

    const UPDATED_AT = null;
    const CREATED_AT = null;
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "id_cadastro",
        "id_venda",
        "id_abertura_caixa",
        "id_forma_pagamento",
        "valor",
        "data_adiantamento",
        "data_alteracao",
        "data_sincronismo",
        "id_off"
    ];
}
