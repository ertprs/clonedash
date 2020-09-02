<?php

namespace App\Model\FrenteCaixa;

use Illuminate\Database\Eloquent\Model;

/**
 * @author Tiago Franco
 * Model para os dados do valor inicial dos caixas
 */
class ValorInicialCaixa extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'base_web_control.valor_inicial_caixa';
    
    const UPDATED_AT = null;
    const CREATED_AT = null;
    public $timestamps = false;
}
