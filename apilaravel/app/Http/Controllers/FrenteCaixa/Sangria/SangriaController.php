<?php

namespace App\Http\Controllers\FrenteCaixa\Sangria;

use App\DTO\FrenteCaixa\SangriaDTO;
use App\Http\Controllers\Controller;
use App\Services\Extensions\RequestBodyConverter;
use App\Services\FrenteCaixa\Sangria\SangriasService;
use Symfony\Component\HttpFoundation\Response;

class SangriaController extends Controller
{
    /**
     * Servico para busca do limite total disponivel para a sangria
     */
    public function getLimite(SangriasService $sangriasService)
    {
        return $this->send($sangriasService->consultarLimite());
    }

    /**
     * Servico para efetuar as sangrias
     */
    public function efetuarSangria(SangriasService $sangriasService, RequestBodyConverter $requestBodyConverter)
    {
        $sangriaDTO = $requestBodyConverter->deserializer(new SangriaDTO());

        return $this->send($sangriasService->addSangria($sangriaDTO), Response::HTTP_CREATED);

    }
}
