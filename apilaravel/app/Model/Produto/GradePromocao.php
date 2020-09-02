<?php

namespace App\Model\Produto;

use Illuminate\Database\Eloquent\Model;

class GradePromocao extends Model
{
    protected $table = 'base_web_control.grade_promocao';

    const UPDATED_AT = "cadastro";
    const CREATED_AT = "data_alteracao";
}
