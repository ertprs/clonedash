<?php

namespace App\Model\Whatsapp;

use Illuminate\Database\Eloquent\Model;

class WhatsappListaTelefones extends Model
{
    protected $table = 'base_web_control.whatsapp_lista_telefones';
    
    const UPDATED_AT = null;
    const CREATED_AT = null;
    public $timestamps = false;  

    public function lista() 
    {
        return $this->hasMany('App\Model\Torpedos\WhatsappListaModel','id','id_lista');
    }
}