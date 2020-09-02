<?php

namespace App\Model\Torpedos;

use Illuminate\Database\Eloquent\Model;

class TorpedoListaTelefones extends Model
{
    protected $table = 'base_web_control.torpedo_lista_telefones';
    
    const UPDATED_AT = null;
    const CREATED_AT = null;
    public $timestamps = false;  

    public function lista() 
    {
        return $this->hasMany('App\Model\Torpedos\TorpedoListaModel','id','id_lista');
    }
}