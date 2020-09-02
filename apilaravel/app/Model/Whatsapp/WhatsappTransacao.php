<?php

namespace App\Model\Whatsapp;

use Illuminate\Database\Eloquent\Model;

class WhatsappTransacao extends Model
{
    protected $table = 'base_web_control.whatsapp_transacao';

    const UPDATED_AT = "dt_creation";
    const CREATED_AT = "dt_last_update";
}
