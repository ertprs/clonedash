<?php

namespace App\Model\FormaPagamento;

use Illuminate\Database\Eloquent\Model;

class FormaPagamento extends Model
{
    protected $table = 'base_web_control.forma_pagamento';

    const UPDATED_AT = null;
    const CREATED_AT = null;
    public $timestamps = false;
}
