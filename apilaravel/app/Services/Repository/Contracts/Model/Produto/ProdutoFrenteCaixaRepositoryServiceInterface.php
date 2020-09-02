<?php

namespace App\Services\Repository\Contracts\Model\Produto;

use App\DTO\FrenteCaixa\CadastroProdutoDTO;
use App\DTO\FrenteCaixa\CadastroServicoDTO;
use App\Services\Repository\Contracts\RepositoryServiceInterface;

/**
 * @author Tiago Franco
 * Interface basica referente a abstração
 * do padrao repository service 
 */
interface ProdutoFrenteCaixaRepositoryServiceInterface extends RepositoryServiceInterface
{
    public function novoProdutoFromFrenteCaixa(CadastroProdutoDTO $cadastroProdutoDTO);
    public function novoServicoFromFrenteCaixa(CadastroServicoDTO $cadastroServicoDTO);
}
