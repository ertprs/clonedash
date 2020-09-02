<?php

namespace App\Model\Produto;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table = 'base_web_control.produto';

     /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'id_origem' => null,
        'vender_estoque_zerado' => null,
        'altura' => null,
        'largura' => null,
        'comprimento' => null,
        'fcp' => null,
        'glp' => null,
        'env_prod' => null,
        'peso_liquido' => null,
        'solicitar_vrtotal' => null,
        'infos_nutricionais' => null,
        'peso_bruto' => null,
        'estoque_lojavirtual' => null
    ];

    const UPDATED_AT = null;
    const CREATED_AT = null;
    public $timestamps = false;

    public function venda_item() 
    {
        return $this->belongsTo('App\Model\Venda\VendaItem','id_produto','id');
    }
    public function classificacao() 
    {
        return $this->belongsTo('App\Model\Produto\Classificacao','id_classificacao','id');
    }

    /**
     * Get the photos
     */
    public function fotos()
    {
        return $this->hasMany('App\Model\Produto\ProdutoFoto', 'id_produto','id');
    }
}
