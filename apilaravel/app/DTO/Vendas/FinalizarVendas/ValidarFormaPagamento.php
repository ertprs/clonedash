<?php

namespace App\DTO\Vendas\FinalizarVendas;

use App\Exceptions\ApiWebControlException;
use App\Repository\Contracts\Model\Venda\NotaCreditoRepositoryInterface;
use App\DTO\Vendas\FinalizarVendas\FormasPagamentos\Parcelado\CartaoCreditoSorocredDTO;
use App\Services\Utils\CodesApi;

/**
 * @author Tiago Franco
 * trait contendo o metodo de validacao
 * de todas as informacoes obrigatorios
 * do tipo de pagamento
 * a ser utilizado para as DTO que implementaam a 
 * interface de forma de pagamentos
 */
trait ValidarFormaPagamento
{
    public function validar(array $formaPagamento)
    {
        if(method_exists($this, 'validarEspecifico')) {
            $this->validarEspecifico();
        }

        array_walk_recursive($formaPagamento, function ($value, $campo) {
            if (!is_numeric($value) && empty($value)) {
                throw new ApiWebControlException("Erro de validacao de dados. Campo $campo é obrigatório");
            }
        });
    }
}
