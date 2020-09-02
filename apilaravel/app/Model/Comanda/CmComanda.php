<?php

namespace App\Model\Comanda;

use Illuminate\Database\Eloquent\Model;

class CmComanda extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'base_web_control.cm_comanda';
 
    const UPDATED_AT = null;
    const CREATED_AT = null;
    public $timestamps = false;

    protected $primaryKey = 'id';
}