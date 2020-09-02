<?php

namespace App\Model\Controle;

use Illuminate\Database\Eloquent\Model;

class CadastroControles extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'base_web_control.cadastro_controles';
    
    const UPDATED_AT = null;
    const CREATED_AT = null;
    public $timestamps = false;

    protected $fillable = [
        "id_cadastro",
        "id_forma_pagamento",
        "numero"
    ];
}
