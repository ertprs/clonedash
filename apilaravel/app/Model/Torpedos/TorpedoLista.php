<?php

namespace App\Model\Torpedos;

use Illuminate\Database\Eloquent\Model;

class TorpedoLista extends Model
{
    protected $table = 'base_web_control.torpedo_lista';
    
    const UPDATED_AT = null;
    const CREATED_AT = null;
    public $timestamps = false;

    public function telefones() 
    {
        return $this->hasMany('App\Model\Torpedos\TorpedoListaTelefonesModel','id_lista','id');
    }
}
