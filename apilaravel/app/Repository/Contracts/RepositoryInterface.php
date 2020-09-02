<?php

namespace App\Repository\Contracts;

/**
 * @author Tiago Franco
 * Interface basica referente a abstração
 * do padrao repository
 */
interface RepositoryInterface
{
    public function find($id);
    public function findAll();
    public function findBy(array $criteria, array $orderBy = array(), $limit = null, $offset = null);
    public function findOneBy(array $criteria);
    public function __call($method, $arguments);
    public function paginate($pages);
}
