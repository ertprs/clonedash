<?php

namespace App\Model\Venda;

use Illuminate\Database\Eloquent\Model;

class VendaItem extends Model
{
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'base_web_control.venda_itens';
    
    const UPDATED_AT = null;
    const CREATED_AT = null;
    public $timestamps = false;

    public function produto() 
    {
        return $this->hasMany('App\Model\Produto\Produto','id','id_produto');
    }

    public function item_producao() 
    {
        return $this->hasOne('App\Model\Comanda\CmProducao','idvenda_item','id');
    }
}
