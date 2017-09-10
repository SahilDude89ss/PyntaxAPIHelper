<?php

namespace Pyntax\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Gate;
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
        $record = $this->getRepository()->get($id);
        if (Gate::allows($this->getRepository()->getResourceName() . "-view", $record)) {
            return $record;
        }

        return false;
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
        $records = $this->getRepository()->find($where, $limit, $offset);

        // Lets check if we can view this record.
        if (sizeof($records) > 0) {
            if (Gate::allows($this->getRepository()->getResourceName() . "-view", $records[0])) {
                return $records;
            }
        }

        return [];
    }

    /**
     * @param array $data
     * @return mixed
     */
    function create(array $data)
    {
        if (Gate::allows($this->getRepository()->getResourceName() . "-create")) {
            return $this->getRepository()->create($data);
        }

        return false;
    }

    /**
     * @param $id
     * @param array $data
     * @return mixed
     */
    function update($id, array $data)
    {
        // Lets load the record first
        $record = $this->get($id);

        if (!empty($record)) {
            if (Gate::allows($this->getRepository()->getResourceName() . "-update", $record)) {
                return $this->getRepository()->update($id, $data);
            }
        }

        return false;
    }

    /**
     * @param $idOrWhere
     * @return bool|mixed
     */
    function delete($idOrWhere)
    {
        // Lets load the record first
        $record = $this->get($idOrWhere);

        if (!empty($record)) {
            if (Gate::allows($this->getRepository()->getResourceName() . "-delete", $record)) {
                return $this->getRepository()->delete($idOrWhere);
            }
        }

        return false;
    }
}