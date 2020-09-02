<?php

namespace App\Model\Usuarios;

use Illuminate\Database\Eloquent\Model;

class WebcUsuario extends Model
{
    protected $table = 'base_web_control.webc_usuario';    

    const UPDATED_AT = null;
    const CREATED_AT = null;
    public $timestamps = false;
}
