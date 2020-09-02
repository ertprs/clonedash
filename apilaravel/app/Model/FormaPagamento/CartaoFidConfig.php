<?php

namespace App\Model\FormaPagamento;

use Illuminate\Database\Eloquent\Model;

class CartaoFidConfig extends Model
{
    protected $table = 'base_web_control.cartaofid_config';

    const UPDATED_AT = "dt_creation";
    const CREATED_AT = "dt_last_update";
}
