<?php

namespace App\Services\Repository\Eloquent\Model\Cliente;

use App\DTO\ClienteDTO;
use App\Model\Cliente\Cliente;
use App\Repository\Eloquent\Model\Cliente\ClienteEloquentRepository;
use App\Services\Repository\Eloquent\WebControlEloquentRepositoryService;
use App\Services\Repository\Contracts\Model\Cliente\ClienteRepositoryServiceInterface;

/**
 * @author Tiago Franco
 * Servico de acesso ao repositorio de Model
 * Deverá possuir os metodos contendo operacoes de escrita 
 * do modelo implementando a interface do repositorio
 */
class ClienteEloquentRepositoryService extends WebControlEloquentRepositoryService implements ClienteRepositoryServiceInterface
{
    public function __construct(Cliente $model, ClienteEloquentRepository $repository)
    {
        parent::__construct($model, $repository);
    }

    public function salvarClientes(ClienteDTO $clienteDTO)
    {
        $cliente = new Cliente();
        $cliente->id_cadastro       = $this->_usuarioLogadoService->getIdCadastroLogado(); 
        $cliente->tipo_pessoa       = $clienteDTO->getTipoPessoa();
        $cliente->cnpj_cpf          = $clienteDTO->getCnpjCpf();
        $cliente->nome              = $clienteDTO->getNome();
        $cliente->razao_social      = $clienteDTO->getRazaoSocial();
        $cliente->id_tipo_log       = $clienteDTO->getIdTipoLog();
        $cliente->endereco          = $clienteDTO->getEndereco();
        $cliente->numero            = $clienteDTO->getNumero();
        $cliente->complemento       = $clienteDTO->getComplemento();
        $cliente->bairro            = $clienteDTO->getBairro();
        $cliente->cidade            = $clienteDTO->getCidade();
        $cliente->uf                = $clienteDTO->getUf();
        $cliente->cep               = $clienteDTO->getCep();
        $cliente->pais              = $clienteDTO->getPais();
        $cliente->email             = $clienteDTO->getEmail();
        $cliente->telefone          = $clienteDTO->getTelefone();
        $cliente->celular           = $clienteDTO->getCelular();
        $cliente->empresa_trabalha  = $clienteDTO->getEmpresaTrabalha();
        $cliente->socio2            = $clienteDTO->getSocio2();       
        $cliente->fax               = $clienteDTO->getFax();
        $cliente->id_usuario        = $this->_usuarioLogadoService->getIdUsuarioLogado(); 
        $cliente->endereco_empresa  = $clienteDTO->getEnderecoEmpresa();
        $cliente->save();

        return $cliente;
    }
}
