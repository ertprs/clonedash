<?php

namespace App\Http\Controllers\ConvenioBancario;

use App\Http\Controllers\Controller;
use App\Repository\Contracts\Model\Convenio\ConvenioBancarioRepositoryInterface;

class ConvenioBancarioController extends Controller
{

    public function getConvenioBancario(ConvenioBancarioRepositoryInterface $convenioBancarioRepository)
    {
        return $this->send($convenioBancarioRepository->getConvenioBancario());
    }
}
