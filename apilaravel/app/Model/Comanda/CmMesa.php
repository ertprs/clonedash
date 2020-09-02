<?php

namespace App\Model\Comanda;

use Illuminate\Database\Eloquent\Model;

class CmMesa extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'base_web_control.cm_mesa';

    const UPDATED_AT = null;
    const CREATED_AT = null;
    public $timestamps = false;
}