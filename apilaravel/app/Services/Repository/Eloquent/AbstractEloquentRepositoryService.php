<?php

namespace App\Services\Repository\Eloquent;

use App\Services\Auth\UsuarioLogadoService;
use App\Services\Repository\Contracts\RepositoryServiceInterface;


abstract class AbstractEloquentRepositoryService implements RepositoryServiceInterface
{
    /**
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model;
    /**
     * @var \App\Repository\AbstractRepository
     * Repositorio para acessos aos metodos de consultas 
     * do model
     */
    protected $repository;

    /**
     * UsuarioLogadoService
     *
     * @var UsuarioLogadoService
     */
    protected $_usuarioLogadoService;

    public function __construct()
    {
        $this->_usuarioLogadoService = app(UsuarioLogadoService::class);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update(array $data, $id)
    {
        return $this->model->find($id)->update($data);
    }

    public function firstOrCreate(array $data)
    {
        return $this->model->firstOrCreate($data);
    }

    public function delete($id)
    {
        return $this->model->find($id)->delete();
    }

    // verifica se existe o metodo da consulta no repositorio
    public function __call($method, $arguments)
    {
        if (method_exists($this->repository, $method)) {
            return call_user_func_array(array($this->repository, $method), $arguments);
        }

        return $this->repository->__call($method, $arguments);
    }
}
