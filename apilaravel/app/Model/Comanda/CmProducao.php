<?php
namespace App\Model\Comanda;

use Illuminate\Database\Eloquent\Model;

class CmProducao extends Model
{
    const UPDATED_AT = null;
    const CREATED_AT = null;
    public $timestamps = false;

    protected $table = 'base_web_control.cm_producao';

    public function venda_item() 
    {
        return $this->belongsTo('App\Model\Venda\VendaItem','idvenda_item','id');
    }
}
