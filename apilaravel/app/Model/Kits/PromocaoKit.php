<?php

namespace App\Model\Kits;

use Illuminate\Database\Eloquent\Model;

class PromocaoKit extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'base_web_control.promocao_kit';
    const UPDATED_AT = null;
    const CREATED_AT = 'data_alteracao';
}
