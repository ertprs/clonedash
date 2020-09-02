<?php

namespace App\Model\DadosBancarios;

use App\Entity\Model\DadosBancarios\ContaCorrenteMovimentacaoInterface;
use Illuminate\Database\Eloquent\Model;

class ContaCorrenteMovimentacao extends Model implements  ContaCorrenteMovimentacaoInterface
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'base_web_control.conta_corrente_movimentacao';

    const UPDATED_AT = "data_movimentacao";
    const CREATED_AT = "data_alteracao";
}
