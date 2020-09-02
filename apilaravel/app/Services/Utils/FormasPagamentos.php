<?php

namespace App\Services\Utils;

/**
 * @author Tiago Franco
 * Objeto para centralizacao dos codigos
 * da API
 */
class FormasPagamentos
{
    const DINHEIRO                     = 1;
    const CHEQUE                       = 2;
    const CARTAO_CREDITO_VISA          = 3;
    const BOLETO                       = 4;
    const CARTAO_CREDITO_MASTERCARD    = 5;
    const CARTAO_CREDITO_HIPERCARD     = 6;
    const CARTAO_CREDITO_AMEX          = 7;
    const CARTAO_CREDITO_AURA          = 8;
    const CARTAO_DEBITO_VISA_ELETRON   = 9;
    const TICKET_ALIMENTACAO           = 10;
    const TICKET_REFEICAO              = 11;
    const NOTA_DE_DEVOLUCAO            = 12;
    const BANESCARD                    = 13;
    const DACASA_FINANCEIRA            = 14;
    const CARTAO_CREDITO_A_VISTA       = 15;
    const CARTAO_DEBITO_MASTER         = 16;
    const CARTAO_CREDITO_SENFF         = 17;
    const CREDIARIO                    = 18;
    const BANRICOMPRAS_DEBITO          = 19;
    const FINANCEIRA                   = 20;
    const BANCO_CACIQUE                = 23;
    const CONSTRUCARD                  = 24;
    const CARTAO_DEBITO_REDESHOP       = 25;
    const CARTAO_DEBITO_MAESTRO        = 26;
    const DINERS                       = 27;
    const NOTA_PROMISSORIA             = 28;
    const PAG_SEGURO                   = 29;
    const CARTAO_CREDITO_ELO           = 30;
    const CARTAO_DEBITO_ELO            = 31;
    const DOC_TED                      = 32;
    const CARTAO_CREDITO_SOROCRED      = 33;
    const GREEN_CARD                   = 34;
    const GOOD_CARD_DEBITO             = 35;
    const BANRI_COMPRA_PRE_DATADAS     = 36;
    const NOTA_DE_CREDITO              = 37;
    const SODEXO_REFEICAO              = 38;
    const ALELO_REFEICAO               = 39;
    const CARTAO_FIDELIDADE            = 40;
    const CARTAO_CREDITO_QUERO_QUERO   = 41;
    const VR_REFEICAO                  = 44;
    const ABRAPETIT_REFEICAO           = 45;
    const BANRICOMPRAS_CREDITO         = 46;
    const ALELO_ALIMENTACAO            = 47;
    const BANRICOMPRAS_ALIMENTACAO     = 48;
    const ASVRE                        = 49;
    const VERDE_CARD_DEBITO            = 50;
    const VERDE_CARD_CREDITO           = 51;
    const SODEXO_ALIMENTACAO           = 52;
    const CARTAO_DEBITO_COOPERCRED_    = 53;
    const CARTAO_CREDITO_COOPERCRED_   = 54;
    const BOLETO_PROPRIO               = 55;
    const CARTAO_CREDITO_MAESTRO       = 56;
    const ABRAPETIT_ALIMENTACAO        = 57;
    const CARTAO_DEBITO_CABAL          = 58;
    const CARTAO_CREDITO_CABAL         = 59;
    const VALE_CULTURA                 = 60;
    const CARTAO_DEBITO_CRED_MAIS      = 61;
    const CARTAO_CREDITO_CRED_MAIS     = 62;
    const CREDITO_EM_CONTA_BANCARIA    = 63;
    const CARTAO_DEBITO_AMEX           = 64;
    const CARTAO_CREDITO_DDCRED        = 65;
    const CARTAO_DEBITO_DDCRED         = 66;
    const CARTAO_CREDITO_CONTROL_LIFE  = 67;
    const CARTAO_DEBITO_CONTROL_LIFE   = 68;
    const CARTAO_CREDITO_AGICARD       = 69;
    const CARTAO_DEBITO_AGICARD        = 70;
    const CARTAO_CREDITO_AVANCARD      = 71;
    const CARTAO_DEBITO_AVANCARD       = 72;
    const DEP_EM_CONTA_CORRENTE        = 73;
    const CARTAO_CREDITO_GOODCARD      = 74;
    const CARTAO_CREDITO_POLICARD      = 75;
    const CARTAO_DEBITO_POLICARD       = 76;
    const VALE_COMPRA_FUNCIONARIO      = 77;
    const CREDIARIO_SERVIPA            = 78;
    const CARTAO_CREDITO_TERCRED       = 79;
    const CARNE                        = 80;
    const CARTAO_CREDITO_NUBANK        = 81;
    const CONTA_CORRENTE_CLIENTE       = 82;
    const BITCOIN                      = 83;
    const CIELO                        = 84;
    const CARTAO_CREDITO_SYSTEM        = 85;
    const CARTAO_CREDITO_BIN           = 86;
    const CARTAO_DEBITO_BIN            = 87;
    const CARTAO_DEBITO_SISME          = 88;
    const CARTAO_CREDITO_LOSANGO       = 89;
    const CARTAO_CREDITO_CREDFLAMA     = 90;
    const CARTAO_CREDITO_OMNI          = 91;
    const CARTAO_CREDITO_AGORACRED     = 92;
    const CALCARD_CREDITO              = 93;
    const CARTAO_CREDITO_CREDSYSTEM    = 94;
    const VALE_PRESENTE                = 95;
    const CASCRED                      = 96;
    const FATURADO                     = 97;
    const MERCADO_PAGO                 = 98;
    const CARTAO_CREDITO_ASSEMAT       = 99;
    const CARTAO_DE_DEBITO_HIPER       = 100;
    const SINDPLUS_CARD                = 101;
    const COOPER_CARD_REFEICAO         = 102;
    const VALE_MASTER_CREDITO          = 103;
    const VALE_MASTER_DEBITO           = 104;
    const VR_ALIMENTACAO               = 105;
    const CARTAO_CREDITO_AUTEM         = 106;
    const CARTAO_CREDITO_CREDZ         = 107;
    const CREDITO_PAGUECOM             = 108;
    const GREENCARD_ALIMENTACAO        = 109;
    const OUTROS                       = 110;
    const ASSEMCO_CONVENIO             = 111;
    const BONUSCRED                    = 112;
    const NUTRICARD                    = 113;
    const HIPER_DEBITO                 = 114;
    const CARTAO_CREDITO_CDL           = 115;
    const CARTAO_CREDITO_PERSONAL_CARD = 116;
    const CARTAO_CREDITO_BRASILCARD    = 117;
    const CARTAO_DEBITO_BRASILCARD_    = 118;
    const UBER_EATS                    = 119;
    const SIMEC                        = 120;
    const BEN_VISA_VALE                = 121;
    const IFOOD                        = 122;
    const ROMCARD                      = 123;
    const RAPPI                        = 124;
    const JAMES                        = 125;
    const CREDIARIO_LOJA               = 126;
    const CARTAO_DEBITO_NUBANK         = 127;
    const DDA_BANCARIO                 = 128;
    const STONE_DEBITO                 = 129;
    const STONE_CREDITO                = 130;
    const RETIRADA_CAIXA               = 131;
    const IFOOD_CARTAO_CREDITO         = 132;
    const IFOOD_DINHEIRO               = 133;
    const N99_FOOD_DINHEIRO            = 134;
    const N99_FOOD_CARTAO_CREDITO      = 135;
    const PICPAY                       = 136;
    const INTERMEDIUM                  = 137;
    const CREDIPAR_FINANCEIRA          = 138;
    const QRCODE                       = 139;


    const CONTAS_PAGAR_IN = [
        2, 4, 12, 13, 15, 18, 20, 23, 24, 28, 32, 36, 37, 40, 49, 55, 63, 73, 77, 82, 95, 97, 110, 131,
        3, 5, 6, 7, 8, 14, 17, 27, 30, 33, 34, 39, 41, 46, 47, 51, 54, 56, 59, 62, 65, 67, 69, 71, 74, 75,
        78, 79, 80, 81, 84, 85, 86, 89, 90, 91, 92, 93, 94, 96, 98, 99, 103, 106, 107, 108, 112, 115, 116,
        117, 130, 132, 135
    ];

    const DEBITOS = [
        1, 9, 10, 11, 13, 16, 19,  23, 24, 25, 26, 30, 31, 35, 38, 39, 40, 44, 45, 47, 48, 49, 50, 52, 53, 55,
        56, 57, 58, 60, 61, 64, 66, 68, 70, 72, 76, 83, 84, 87, 88, 100, 101, 102,  104, 105, 109, 110, 111,
        112, 113, 114, 118, 119, 120, 121, 122, 123, 124, 125, 126, 127, 128, 129, 131,  133, 134, 135, 136, 139
    ];

    const USOCONTROLE = [3,6,7,17,103,106,107,108,115];

    public static function isContaPagar($idFormaPagamento)
    {
        return in_array($idFormaPagamento, self::CONTAS_PAGAR_IN);
    }

    public static function isDebito($idFormaPagamento)
    {
        return in_array($idFormaPagamento, self::DEBITOS);
    }

    public static function isUsoControle($idFormaPagamento)
    {
        return in_array($idFormaPagamento, self::USOCONTROLE);
    }
    
}
