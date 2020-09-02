<?php

namespace App\Model\Cs2;

use Illuminate\Database\Eloquent\Model;

class TitulosRecebaFacil extends Model
{
    protected $table = 'cs2.titulos_recebafacil';

    const UPDATED_AT = "emissao";
    const CREATED_AT = "data_alteracao";
}
