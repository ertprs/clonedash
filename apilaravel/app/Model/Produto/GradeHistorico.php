<?php

namespace App\Model\Produto;

use Illuminate\Database\Eloquent\Model;

class GradeHistorico extends Model
{
    protected $table = 'base_web_control.grade_historico';

    const UPDATED_AT = "data_hora_alteracao";
    const CREATED_AT = null;

    protected $fillable = [
        "id_grade",
        "id_cadastro",
        "id_usuario",
        "qtd_antigo",
        "qtd_atual",
        "codigo_barra_antigo",
        "codigo_barra",
        "valor_custo_antigo",
        "valor_custo",
        "valor_varejo_aprazo_antigo",
        "valor_varejo_aprazo",
        "valor_atacado_aprazo_antigo",
        "valor_atacado_aprazo",
        "ativo_antigo",
        "ativo",
        "data_hora_alteracao",
        "origem_alteracao"
    ];
}
