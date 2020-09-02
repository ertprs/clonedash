<?php

namespace App\Model\Cs2;

use Illuminate\Database\Eloquent\Model;

class ControlesBoleto extends Model
{
    protected $table = 'cs2.controle_boletos';    

    const UPDATED_AT = null;
    const CREATED_AT = null;
    public $timestamps = false;
}