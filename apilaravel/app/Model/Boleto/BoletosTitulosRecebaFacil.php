<?php

namespace App\Model\Boleto;

use Illuminate\Database\Eloquent\Model;

class BoletosTitulosRecebaFacil extends Model
{
    protected $table = 'base_web_control.titulos_recebafacil';

    const UPDATED_AT = "emissao";
    const CREATED_AT = "data_alteracao";

    protected $fillable = [
        "numdoc",
        "codloja",
        "emissao",
        "vencimento",
        "valor",
        "valorpg",
        "datapg",
        "juros",
        "numboleto",
        "numboleto_itau",
        "numboleto_bradesco",
        "numboleto_hsbc",
        "cpfcnpj_devedor",
        "tp_notificacao",
        "data_repasse",
        "descricao_repasse",
        "tp_recebafacil",
        "chavebol",
        "bco",
        "tp_titulo",
        "contrato",
        "tx_adm",
        "exibir",
        "txjur",
        "automatico",
        "impresso",
        "data_impresso",
        "referencia",
        "cod_pedido_web_control",
        "radio_desconto",
        "vr_desconto",
        "radio_msg_boleto",
        "texto_msg_boleto",
        "id_usuariobaixa",
        "tipo_notificacao",
        "parcela",
        "vr_total_divida",
        "porcentagem_desconto_avista",
        "porcentagem_desconto_aprazo",
        "id_motivo_exclusao",
        "data_exclusao",
        "nome",
        "data_alteracao",
        "num_lote",
        "data_gravacao_lote",
        "banco_registro",
        "agencia_registro",
        "conta_registro",
        "cod_liquidacao",
        "data_registro",
        "id_abertura_caixa",
        "data_baixa_contabilidade",
        "expirado",
        "carteira",
    ];
}
