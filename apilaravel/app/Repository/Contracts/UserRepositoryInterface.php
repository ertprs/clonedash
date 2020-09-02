<?php

namespace App\Repository\Contracts;

use App\Repository\Contracts\RepositoryInterface;

/**
 * @author Tiago Franco
 * Interface basica referente a abstração
 * do padrao repository de consultas
 */
interface UserRepositoryInterface extends RepositoryInterface
{
    public function getUserBySenha(string $senhaUsuario, int $master = 0);
    public function getUserBySenhaEncrypt(string $senhaUsuario, int $master = 0);
    public function getUsuarioLogin(string $login, string $senha);

}
