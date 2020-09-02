<?php

namespace App\Repository\Contracts\Model\Fornecedor;

use App\Repository\Contracts\RepositoryInterface;

/**
 * @author Tiago Franco
 * Interface basica referente a abstração
 * do padrao repository de consultas
 */
interface FornecedorRepositoryInterface extends RepositoryInterface
{
    public function getFornecedoresCombo(int $idCadastro = 0);
}
