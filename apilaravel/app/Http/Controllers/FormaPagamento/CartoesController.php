<?php

namespace App\Http\Controllers\FormaPagamento;

use App\Http\Controllers\Controller;
use App\Repository\Contracts\Model\FormaPagamento\CartaoFidConfigRepositoryInterface;

class CartoesController extends Controller
{
    public function getCartoesFidelidade(CartaoFidConfigRepositoryInterface $cartaoFidConfigRepository)
    {
        return $this->send($cartaoFidConfigRepository->cartoesFidelidades());
    }

    public function getPorTipo(string $tipoCartao, CartaoFidConfigRepositoryInterface $cartaoFidConfigRepository)
    {
        return $this->send($cartaoFidConfigRepository->getPorTipoCartao($tipoCartao));
    }
}
