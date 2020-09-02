<?php

namespace App\Http\Controllers\Funcionario;

use App\Http\Controllers\Controller;
use App\Repository\Contracts\Model\Funcionario\FuncionarioRepositoryInterface;

class FuncionarioController extends Controller
{
    public function index(FuncionarioRepositoryInterface $funcionarioRepository)
    {
        return $this->send($funcionarioRepository->getFuncionarios());
    }
}
