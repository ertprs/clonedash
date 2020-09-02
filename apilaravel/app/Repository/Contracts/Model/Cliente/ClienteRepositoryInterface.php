<?php

namespace App\Repository\Contracts\Model\Cliente;

use App\DTO\Relatorios\RelatorioClienteDTO;
use App\Repository\Contracts\RepositoryInterface;

/**
 * @author Tiago Franco
 * Interface basica referente a abstração
 * do padrao repository de consultas
 */
interface ClienteRepositoryInterface extends RepositoryInterface
{
    public function getCliente(int $idCliente);
    public function getClientes();
    public function pesquisarClientesPeloNome(string $nomeCliente);
    public function relatorioClientes(RelatorioClienteDTO $relatorioClienteDTO);
    public function getClienteBalcao();

    public function getClientesCadastrosNoDia();
}
