<?php

namespace App\Model\FrenteCaixa;

use Illuminate\Database\Eloquent\Model;

class FcVenda extends Model
{
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'frente_caixa.fc_venda';

    const UPDATED_AT = "data_venda";
    const CREATED_AT = "data_alteracao";
}
