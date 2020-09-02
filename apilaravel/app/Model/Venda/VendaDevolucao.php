<?php

namespace App\Model\Venda;

use Illuminate\Database\Eloquent\Model;

class VendaDevolucao extends Model
{
    protected $table = 'base_web_control.venda_devolucao';

    const UPDATED_AT = null;
    const CREATED_AT = null;
    public $timestamps = false;

    /**
     * Get itens da devolucao
     */
    public function itensDevolucao()
    {
        return $this->hasMany('App\Model\Venda\VendaItemDevolucao', 'id_venda_devol','id');
    }
}
