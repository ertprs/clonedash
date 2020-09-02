<?php

namespace App\Http\Controllers\Torpedo;

use App\Http\Controllers\Controller;
use App\Repository\Contracts\Model\Torpedo\TorpedoListaRepositoryInterface;

class TorpedoController extends Controller
{
    public function pesquisaListaTelefonePeloNome($nomeLista, TorpedoListaRepositoryInterface $torpedoListaRepository)
    {
        $listas = $torpedoListaRepository->getPeloNome($nomeLista);

        return $this->send($listas);
    }

    public function pesquisaListaTelefonePeloFoneNome(int $idLista, $termoPesquisa, TorpedoListaRepositoryInterface $torpedoListaRepository)
    {
        return $this->send($torpedoListaRepository->getPeloFoneOrNomeLista($termoPesquisa, $idLista));
    }
}
