<?php

namespace App\Services\Repository\Contracts\Model\Produto;

use App\DTO\FrenteCaixa\DevolucaoDTO;
use App\Services\Repository\Contracts\RepositoryServiceInterface;

/**
 * @author Tiago Franco
 * Interface basica referente a abstração
 * do padrao repository service 
 */
interface GradeRepositoryServiceInterface extends RepositoryServiceInterface
{
    public function salvarHistoricoGradeDevolucao(DevolucaoDTO $devolucaoDTO);
    public function atualizarQtdeEstoque(int $idGrade, int $qtdAtual);
}