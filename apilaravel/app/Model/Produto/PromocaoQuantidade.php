<?php

namespace App\Model\Produto;

use Illuminate\Database\Eloquent\Model;

class PromocaoQuantidade extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'base_web_control.promocao_quantidade';
    const UPDATED_AT = null;
    const CREATED_AT = 'data_alteracao';
}
