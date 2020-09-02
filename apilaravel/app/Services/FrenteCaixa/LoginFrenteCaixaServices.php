<?php

namespace App\Services\FrenteCaixa;

use App\Services\Utils\CodesApi;
use Illuminate\Support\Facades\Crypt;
use App\Exceptions\ApiWebControlException;
use App\Services\Usuarios\UsuariosService;
use App\DTO\FrenteCaixa\LoginFrenteCaixaDTO;
use App\Repository\Contracts\Model\FrenteCaixa\ValorInicialCaixaRepositoryInterface;

/**
 * @author Tiago Franco
 * Servico para as operacoes envolvendo o login da frente de caixa
 */
class LoginFrenteCaixaServices
{

    /**
     * @var UsuariosService
     */
    private $_usuariosService;

    /**
     * @var ValorInicialCaixaRepositoryInterface
     */
    private $_valorInicialCaixaRepository;


    public function __construct(
        UsuariosService $usuariosService,
        ValorInicialCaixaRepositoryInterface $valorInicialCaixaRepository
    ) {
        $this->_valorInicialCaixaRepository = $valorInicialCaixaRepository;
        $this->_usuariosService             = $usuariosService;
    }

    public function consultaCaixaAberto(string $numeroCaixa)
    {
        return $this->_valorInicialCaixaRepository->consultarCaixaAberto($numeroCaixa);
    }

    public function getTokenCaixaAberto(LoginFrenteCaixaDTO $loginFrenteCaixaDTO)
    {
        $usuario = $this->_usuariosService->buscaUsuarioPorSenha($loginFrenteCaixaDTO->getSenhaDecrypt());

        if (!$usuario || $usuario->id != $loginFrenteCaixaDTO->getIdOperador()) {
            throw new ApiWebControlException("Senha do operador inválida", CodesApi::OPERACAOINVALIDA);
        }


        $caixaAberto = $this->consultaCaixaAberto($loginFrenteCaixaDTO->getNumeroCaixa());

        if ($caixaAberto && $caixaAberto->id_usuario != $loginFrenteCaixaDTO->getIdOperador()) {
            throw new ApiWebControlException("Caixa aberto para outro operador", CodesApi::OPERACAOINVALIDA);
        }

        return $this->gerarFcToken($caixaAberto);
        
    }

    private function gerarFcToken($caixaAberto) {
        $token = [
            "valor-inicial" => $caixaAberto->vlr_inicial,
            "num-caixa"     => $caixaAberto->num_caixa,
            "id"            => $caixaAberto->id
        ];

        $token = implode("_", $token);
        $token = Crypt::encrypt($token);
        
        return $token;            
    }
}
