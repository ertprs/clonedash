<?php

namespace App\Model\Whatsapp;

use Illuminate\Database\Eloquent\Model;

class WhatsappCampanha extends Model
{
    protected $table = 'base_web_control.whatsapp_campanha';
    
    const UPDATED_AT = "dt_creation";
    const CREATED_AT = "dt_last_update";
}
