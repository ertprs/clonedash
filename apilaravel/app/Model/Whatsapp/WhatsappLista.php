<?php

namespace App\Model\Whatsapp;

use Illuminate\Database\Eloquent\Model;

class WhatsappLista extends Model
{
    protected $table = 'base_web_control.whatsapp_lista';
    
    const UPDATED_AT = null;
    const CREATED_AT = null;
    public $timestamps = false;

    public function telefones() 
    {
        return $this->hasMany('App\Model\Whatsapp\WhatsappListaTelefonesModel','id_lista','id');
    }
}
