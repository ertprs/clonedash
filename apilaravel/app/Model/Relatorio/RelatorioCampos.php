<?php

namespace App\Model\Relatorio;

use Illuminate\Database\Eloquent\Model;

class RelatorioCampos extends Model
{
    protected $table = 'base_web_control.relatorios_campos';
    
    const UPDATED_AT = null;
    const CREATED_AT = null;
    public $timestamps = false;  
}
