<?php

namespace App\Model\Venda;

use Illuminate\Database\Eloquent\Model;

class VendaPagamento extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'base_web_control.venda_pagamento';

    const UPDATED_AT = "data_cadastro";
    const CREATED_AT = "data_alteracao";

    protected $fillable = [
        "id_venda",
        "id_forma_pgto",
        "valor_pgto",
        "cmc7",
        "vencimento",
        "doc_cheque",
        "codigo_consulta",
        "qtd_parcela",
        "cod_aut_cartao",
        "id_credenciadora",
        "data_cadastro",
        "cnpj_credenciadora",
        "vlr_troco",
        "data_alteracao",
        "data_sincronismo",
        "id_off",
        "id_cadastro"
    ];
}
