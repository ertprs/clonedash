<?php

namespace App\Services\FrenteCaixa\Clientes;

use App\Repository\Contracts\Model\Cliente\ClienteFrenteCaixaRepositoryInterface;

/**
 * @author Tiago Franco
 * Servico para gerenciamento das informacoes
 * de frente de caixa envolvendo clientes
 */
class ClientesService
{    
    /**
     * @var ClienteFrenteCaixaRepositoryInterface
     */
    private $_clienteFrenteCaixaRepository;

    public function __construct(ClienteFrenteCaixaRepositoryInterface $clienteFrenteCaixaRepository)
    {
        $this->_clienteFrenteCaixaRepository = $clienteFrenteCaixaRepository;
    }

    public function getInadimplencia(int $idCliente)
    {
        return [
            'nota_promissoria' => $this->__clienteFrenteCaixaRepository->getQtdeNotasPromissorias($idCliente),
            'boleto'           => $this->__clienteFrenteCaixaRepository->getQtdeBoletos($idCliente),
            'carne'            => $this->__clienteFrenteCaixaRepository->getQtdeCarnes($idCliente)
        ];
    }
}
