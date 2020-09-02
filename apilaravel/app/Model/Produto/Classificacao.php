<?php

namespace App\Model\Produto;

use Illuminate\Database\Eloquent\Model;

class Classificacao extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'base_web_control.classificacao';
    
    const UPDATED_AT = null;
    const CREATED_AT = null;
    public $timestamps = false;
}