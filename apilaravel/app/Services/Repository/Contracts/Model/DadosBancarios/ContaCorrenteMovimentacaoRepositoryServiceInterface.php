<?php

namespace App\Services\Repository\Contracts\Model\DadosBancarios;

use App\DTO\FrenteCaixa\MovimentacoesDTO;
use App\Entity\Model\DadosBancarios\ContaCorrenteInterface;
use App\Services\Repository\Contracts\RepositoryServiceInterface;

/**
 * @author Tiago Franco
 * Interface basica referente a abstração
 * do padrao repository service 
 */
interface ContaCorrenteMovimentacaoRepositoryServiceInterface extends RepositoryServiceInterface
{
    public function cadastrarCCCliente(int $idCliente);

    public function cadastrarCCMovimentacao(int $idContaCorrente, MovimentacoesDTO $movimentacoesDTO);
    
}