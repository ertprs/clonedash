<?php

namespace App\Model\FrenteCaixa;

use Illuminate\Database\Eloquent\Model;

class ValorSangria extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'base_web_control.valor_sangria';

    const UPDATED_AT = "data_hora";
    const CREATED_AT = "data_alteracao";
}
