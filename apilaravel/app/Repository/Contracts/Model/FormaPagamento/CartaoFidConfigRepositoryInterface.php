<?php

namespace App\Repository\Contracts\Model\FormaPagamento;

use App\Repository\Contracts\RepositoryInterface;

/**
 * @author Tiago Franco
 * Interface basica referente a abstração
 * do padrao repository de consultas
 */
interface CartaoFidConfigRepositoryInterface extends RepositoryInterface
{
    public function cartoesFidelidades();
    public function getPorTipoCartao(string $tipoCartao);
}
