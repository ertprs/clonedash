<?php

namespace App\Model\ContasPagar;

use Illuminate\Database\Eloquent\Model;

class ContasPagar extends Model
{
    protected $table = 'base_web_control.contas_pagar';

    const UPDATED_AT = "data_cadastro";
    const CREATED_AT = "data_alteracao";

    protected $fillable = [
        "id_cliente",
        "id_cadastro",
        "id_usuario_cadastro",
        "id_descricao_conta_pagar",
        "data_vencimento",
        "valor",
        "data_cadastro",
        "informacoes_adicionais",
        "situacao",
        "valor_baixa",
        "data_baixa",
        "id_usuario_baixa",
        "informacaoes_adicionais_baixa",
        "data_cadastro_baixa",
        "extornada",
        "tp_conta",
        "origem",
        "id_os_orcamento",
        "id_venda",
        "codigo_barra",
        "numero_documento",
        "id_formapgto",
        "id_classificacao",
        "id_fornecedor",
        "qtd_parcela",
        "chave",
        "parcela",
        "id_tipo_documento",
        "nome_devedor",
        "cod_banco",
        "id_contas_pagar_pai",
        "multa_atraso",
        "baixa_automatica",
        "id_abertura_caixa",
        "data_alteracao",
        "data_sincronismo",
        "id_off",
        "juros_parcelamento",
    ];
}
