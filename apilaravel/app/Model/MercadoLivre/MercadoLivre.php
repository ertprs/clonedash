<?php

namespace App\Model\MercadoLivre;

use Illuminate\Database\Eloquent\Model;

class MercadoLivre extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'base_web_control.mercado_livre_produto';

    public function atualizaUltimaSincronizacao()
    {
        $this->updated_at = date('Y-m-d H:i:s');
        $this->save();
    }
}