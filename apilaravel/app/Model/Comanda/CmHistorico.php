<?php
namespace App\Model\Comanda;

use Illuminate\Database\Eloquent\Model;

class CmHistorico extends Model
{   
    const UPDATED_AT = null;
    const CREATED_AT = null;
    public $timestamps = false;
    
    protected $table = 'base_web_control.cm_historico';
}
