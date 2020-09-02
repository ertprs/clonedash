<?php

namespace App\Repository\Contracts\Model\FrenteCaixa;

use App\User;
use App\DTO\FrenteCaixa\SangriaDTO;
use App\Repository\Contracts\RepositoryInterface;

/**
 * @author Tiago Franco
 * Interface basica referente a abstração
 * do padrao repository de consultas
 */
interface ValorInicialCaixaRepositoryInterface extends RepositoryInterface
{
    public function getLimiteSangria(array $informacoesCaixa);

    public function vericaSangria(array $informacoesCaixa);
    
    public function consultarCaixaAberto(string $numeroCaixa);
}
