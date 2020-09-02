<?php

namespace App\Repository\Contracts\Model\Produto;

use App\Repository\Contracts\RepositoryInterface;

/**
 * @author Tiago Franco
 * Interface basica referente a abstração
 * do padrao repository de consultas
 */
interface ClassificacaoRepositoryInterface extends RepositoryInterface
{
    public function getClassificacaoCombo(int $idCadastro = 0);

    public function listarCategorias($ativas = 'A');
}
