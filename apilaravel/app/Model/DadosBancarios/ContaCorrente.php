<?php

namespace App\Model\DadosBancarios;

use Illuminate\Database\Eloquent\Model;
use App\Entity\Model\DadosBancarios\ContaCorrenteInterface;

/**
 * @author Tiago Franco
 * Model para acesso aos dados de contas correntes
 */
class ContaCorrente extends Model implements ContaCorrenteInterface
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'base_web_control.conta_corrente';

    const UPDATED_AT = "data_abertura";
    const CREATED_AT = "data_alteracao";
}
