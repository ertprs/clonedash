<?php

namespace App\Http\Controllers\Utils;

use App\Http\Controllers\Controller;
use App\Repository\Contracts\Model\Apoio\TipoLogRepositoryInterface;
use App\Repository\Contracts\Model\Fornecedor\FornecedorRepositoryInterface;
use App\Repository\Contracts\Model\Localizacao\EstadosRepositoryInterface;
use App\Repository\Contracts\Model\Produto\ClassificacaoRepositoryInterface;

class CombosController extends Controller
{
    public function fornecedores(FornecedorRepositoryInterface $fornecedorRepository)
    {
        return $this->send($fornecedorRepository->getFornecedoresCombo());
    }

    public function categorias(ClassificacaoRepositoryInterface $classificacaoRepository)
    {
        return $this->send($classificacaoRepository->getClassificacaoCombo());
    }

    public function tipoLogradouros(TipoLogRepositoryInterface $tipoLogRepository)
    {
        return $this->send($tipoLogRepository->getTipoLogradourosCombo());
    }

    public function siglasUF(EstadosRepositoryInterface $estadosRepository)
    {
        return $this->send($estadosRepository->getUF());
    }
}
