<?php

namespace Pyntax\Services;

use Illuminate\Database\Eloquent\Model;
use Pyntax\Contracts\Repositories\Repository;
use Pyntax\Contracts\Services\Service;

/**
 * Class AbstractService
 * @package Pyntax\Services
 */
abstract class AbstractService implements Service
{
    /**
     * @var Repository
     */
    protected $repository;

    /**
     * AbstractService constructor.
     * @param Repository $repository
     */
    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return Repository
     */
    function getRepository()
    {
        return $this->repository;
    }

    /**
     * @param $id
     * @return Model|mixed|null
     */
    function get($id)
    {
        return $this->getRepository()->get($id);
    }

    /**
     * @param array $where
     * @param int $limit
     * @param int $offset
     *
     * @return Model|mixed|null
     */
    function find($where = [], $limit = 25, $offset = 0)
    {
        return $this->getRepository()->find($where, $limit, $offset);
    }

    /**
     * @param array $data
     * @return mixed
     */
    function create(array $data)
    {
        return $this->getRepository()->create($data);
    }

    /**
     * @param $id
     * @param array $data
     * @return mixed
     */
    function update($id, array $data)
    {
        return $this->getRepository()->update($id, $data);
    }

    /**
     * @param $idOrWhere
     * @return mixed
     */
    function delete($idOrWhere)
    {
        return $this->getRepository()->delete($idOrWhere);
    }
}