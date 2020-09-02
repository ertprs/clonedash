<?php

namespace App\Model\Cliente;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'base_web_control.cliente';
    const UPDATED_AT = 'data_cadastro';
    const CREATED_AT = 'data_alteracao';
}
