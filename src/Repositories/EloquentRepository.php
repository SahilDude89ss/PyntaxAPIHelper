<?php

namespace Pyntax\Repositories;

use Illuminate\Database\Eloquent\Model;
use Pyntax\Contracts\Repositories\EloquentRepository as EloquentRepositoryContract;

/**
 * Class EloquentRepository
 * @package Pyntax\Repositories
 */
class EloquentRepository extends AbstractRepository implements EloquentRepositoryContract
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * EloquentRepository constructor.
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @return Model
     */
    function getModel()
    {
        return $this->model;
    }

    /**
     * @param $id
     * @return \Illuminate\Database\Eloquent\Collection|Model|null|static|static[]
     */
    function get($id)
    {
        return $this->getModel()->find($id);
    }

    /**
     * @param array $where
     * @param int $limit
     * @param int $offset
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    function find($where = [], $limit = 25, $offset = 0)
    {
        return $this->getModel()->where($where)->limit($limit)->offset($offset)->get();
    }

    /**
     * @param array $data
     * @return mixed
     * @throws \Exception
     */
    function create(array $data)
    {
        $resourceClassName = $this->getModelClassName();

        if (!empty($resourceClassName)) {
            $newResourceRecord = new $resourceClassName;
            $newResourceRecord->fill($data);

            return $newResourceRecord->save();
        }

        throw new \Exception('Failed to create model');
    }

    /**
     * @param $id
     * @param array $data
     * @return mixed
     *
     * @throws \Exception
     */
    function update($id, array $data)
    {
        $resourceRecord = $this->get($id);

        if (!empty($resourceRecord)) {
            return $resourceRecord->update($data);
        }

        throw new \Exception('Record not found');
    }

    /**
     *
     * @param $idOrWhere
     * @return mixed
     *
     * @throws \Exception
     */
    function delete($idOrWhere)
    {
        if (is_int($idOrWhere)) {
            $resourceRecord = $this->get($idOrWhere);
        } else {
            $resourceRecord = $this->find($idOrWhere);
        }

        if (!empty($resourceRecord)) {
            return $resourceRecord->delete();
        }

        throw new \Exception('Record not found');
    }

    /**
     * This function returns the name of the class for the given resource.
     *
     * @return string
     */
    protected function getModelClassName()
    {
        return get_class($this->getModel());
    }
}