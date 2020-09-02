<?php

namespace App\Model\FormaPagamento;

use Illuminate\Database\Eloquent\Model;

class ClienteFormaPagamento extends Model
{
    protected $table = 'base_web_control.cliente_forma_pagamento';

    const UPDATED_AT = null;
    const CREATED_AT = null;
    public $timestamps = false;

    public function formaPagamento()
    {
        return $this->belongsTo('App\Model\FormaPagamento\FormaPagamento', 'id_forma_pagamento', 'id');
    }
}
