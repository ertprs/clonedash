<?php

namespace App\Repository\Eloquent;

use Illuminate\Support\Str;
use App\Services\Auth\UsuarioLogadoService;
use App\Repository\Contracts\RepositoryInterface;

abstract class AbstractEloquentRepository implements RepositoryInterface
{
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
    
    /**
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model;

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function findAll()
    {
        return $this->model->all();
    }

    public function findBy(array $criteria, array $orderBy = array(), $limit = null, $offset = null)
    {
        $model = $this->model;

        foreach ($criteria as $c) {
            $model = $model->where($c[0], $c[1], $c[2]);
        }        
      
        foreach ($orderBy as $order) {
            $model = $model->orderBy($order[0], $order[1]);
        }

        if ($limit) {
            $model = $model->take((int)$limit);
        }

        if ($offset) {
            $model = $model->skip((int)$offset);
        }

        return $model->get();
    }

    public function findOneBy(array $criteria)
    {
        return $this->findBy($criteria)->first();
    }

    // from Doctrine
    public function __call($method, $arguments)
    {
        if (substr($method, 0, 6) == 'findBy') {
            $by = substr($method, 6, strlen($method));
            $method = 'findBy';
        } else {
            if (substr($method, 0, 9) == 'findOneBy') {
                $by = substr($method, 9, strlen($method));
                $method = 'findOneBy';
            } else {
                throw new \Exception(
                    "Método '$method' indefinido. Favor incluir o método de pesquisa no repositorio ou pesquisar um metodo com inicio findBy/findOneBy!"
                );
            }
        }
        if (!isset($arguments[0])) {
            // we dont even want to allow null at this point, because we cannot (yet) transform it into IS NULL.
            throw new \Exception('Deve ser passado ao menos um parametro para os métodos findBy/findOneBy do repositorio!');
        }
        
        $fieldName = Str::snake($by);

        return $this->$method([[$fieldName, '=', $arguments[0]]]);
    }


    public function paginate($pages)
    {
        return $this->model->paginate($pages);
    }
}
