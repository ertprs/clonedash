<?php

namespace App\Model\FrenteCaixa;

use Illuminate\Database\Eloquent\Model;

class FcVendaItem extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'frente_caixa.fc_venda_itens';

    const UPDATED_AT = NULL;
    const CREATED_AT = "data_alteracao";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "qtd",
        "id_venda",
        "id_produto",
        "nome_produto",
        "preco_tabela",
        "codigo_barra",
        "preco_venda",
        "id_unidade",
        "percentual_desconto",
        "valor_preco_custo",
        "id_grade",
        "id_promocao",
        "id_kit",
        "informacoes_item",
        "atacado_varejo",
        "data_alteracao",
        "id_cadastro"
    ];
}
