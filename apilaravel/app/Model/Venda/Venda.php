<?php

namespace App\Model\Venda;

use App\Entity\Model\Venda\VendaInterface;
use Illuminate\Database\Eloquent\Model;

class Venda extends Model implements VendaInterface
{
    //Constantes situacao
    const SIT_AGUARDANDO_APROVACAO    = 'A';
    const SIT_ENCERRADA               = 'C';
    const SIT_CANCELADA               = 'E';
    const SIT_APROVADO                = 'X';
    const SIT_AGUARDANDO_PECAS        = 'Y';
    const SIT_PEDIDO_IMPRESSO_COZINHA = 'I';
    const SIT_COMANDA_AGRUPADA        = 'G';
    const SIT_NAO_APROVADO            = 'N';
    const SIT_FATURADO                = 'F';

    //Constantes tipo_pgto
    const TIPO_DINHEIRO = 1;
    const TIPO_BOLETO   = 2;
    const TIPO_CHEQUE   = 3;
    const TIPO_VISA     = 4;
    const TIPO_MASTER   = 5;

    //Constantes a_vista
    const VISTA     = 'V';
    const PARCELADO = 'P';

    //Constantes origem_venda
    const ORIGEM_WEB_CONTROL      = 'W';
    const ORIGEM_LOJA_VIRTUAL     = 'L';
    const ORIGEM_CUPOM_FISCAL     = 'CF';
    const ORIGEM_CUPOM_NAO_FISCAL = 'CNF';
    const ORIGEM_CATALOGO_ONLINE  = 'CAT';
    const ORIGEM_SINCRONIZACAO_OFF= 'OFF';

    //Constantes nfe_status
    const NFE_NAO_SOLICITADO = 0 ; 
    const NFE_SOLICITADA     = 1 ;
    const NFE_EM_ANDAMENTO   = 2 ;
    const NFE_CANCELADA      = 3 ; 
    const NFE_INUTILIZADA    = 4 ; 
    const NFE_OK             = 5 ; 
    const NFE_FALHA          = 6 ;
    const NFE_DENEGADA       = 7 ; 
    const NFE_REJEITADA      = 8 ;

    const UPDATED_AT = null;
    const CREATED_AT = null;
    public $timestamps = false;
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'base_web_control.venda';
 
}