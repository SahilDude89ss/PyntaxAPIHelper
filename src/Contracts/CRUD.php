<?php

namespace Pyntax\Contracts;

use Illuminate\Database\Eloquent\Model;

/**
 * Interface CRUD
 * @package Pyntax\Contracts
 */
interface CRUD
{
    /**
     * @param $id
     * @return Model|null|mixed
     */
    function get($id);

    /**
     * @param array $where
     * @param int $limit
     * @param int $offset
     *
     * @return mixed
     */
    function find($where = [], $limit = 25, $offset = 0);

    /**
     * @param array $data
     * @return mixed
     */
    function create(array $data);

    /**
     * @param $id
     * @param array $data
     * @return mixed
     */
    function update($id, array $data);

    /**
     * @param $idOrWhere
     * @return mixed
     */
    function delete($idOrWhere);
}