<?php

namespace App\Services\Repository\Contracts;

/**
 * @author Tiago Franco
 * Interface basica referente a abstração
 * do padrao repository service 
 */
interface RepositoryServiceInterface
{
    public function create(array $data);
    public function update(array $data, $id);
    public function firstOrCreate(array $data);
    public function delete($id);
    public function __call($method, $arguments);
}
