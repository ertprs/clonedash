<?php

namespace App\Model\Venda;

use Illuminate\Database\Eloquent\Model;

class Carne extends Model
{


    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'base_web_control.carne';

    const UPDATED_AT = "data_emissao";
    const CREATED_AT = "data_alteracao";

    protected $fillable = [
        "id_cadastro",
        "data_emissao",
        "num_contrato",
        "valor",
        "vencimento",
        "parcela",
        "multa_atraso",
        "id_venda",
        "id_cliente",
        "observacoes",
        "id_usuario",
        "data_baixa",
        "valor_baixa",
        "id_usuario_baixa",
        "situacao",
        "id_abertura_caixa",
        "data_alteracao",
        "data_sincronismo",
        "id_off",
        "taxa_juros",
    ];
}
