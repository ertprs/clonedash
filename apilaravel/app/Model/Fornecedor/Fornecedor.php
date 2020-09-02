<?php

namespace App\Model\Fornecedor;

use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'base_web_control.fornecedor';
    const UPDATED_AT = 'data_cadastro';
    const CREATED_AT = 'data_alteracao';
}
