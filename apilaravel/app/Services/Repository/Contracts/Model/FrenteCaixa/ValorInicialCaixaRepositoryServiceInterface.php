<?php

namespace App\Services\Repository\Contracts\Model\FrenteCaixa;

use App\User;
use App\DTO\FrenteCaixa\SangriaDTO;
use App\DTO\FrenteCaixa\MovimentacoesDTO;
use App\Services\Repository\Contracts\RepositoryServiceInterface;

/**
 * @author Tiago Franco
 * Interface basica referente a abstração
 * do padrao repository service 
 */
interface ValorInicialCaixaRepositoryServiceInterface extends RepositoryServiceInterface
{
    public function criarSangria(SangriaDTO $sangriaDTO, User $sacador, array $informacoesCaixa);

    public function addValorExtraCaixa(array $informacoesCaixa, MovimentacoesDTO $movimentacoesDTO);

    public function salvarEntradaExtraCaixa($informacoesCaixa, MovimentacoesDTO $movimentacoesDTO);
}