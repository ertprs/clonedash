<?php

namespace App\Http\Controllers\WhatsApp;

use App\Http\Controllers\Controller;
use App\Repository\Contracts\Model\Whatsapp\WhatsappListaRepositoryInterface;

class WhatsAppController extends Controller
{
    public function pesquisaListaTelefonePeloNome($nomeLista, WhatsappListaRepositoryInterface $whatsappListaRepository)
    {        
        $listas = $whatsappListaRepository->getPeloNome($nomeLista);
        
        return $this->send($listas);
    }

    public function pesquisaListaTelefonePeloFoneNome(int $idLista, $termoPesquisa, WhatsappListaRepositoryInterface $whatsappListaRepository)
    {
        return $this->send($whatsappListaRepository->getPeloFoneOrNomeLista($termoPesquisa, $idLista));
    }
}
