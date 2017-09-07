<?php

namespace Pyntax\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\UnauthorizedException;

/**
 * Class AuthProtectedResourceService
 * @package Pyntax\Services
 */
class AuthProtectedResourceService extends Service
{
    /**
     * @param $id
     * @return \Illuminate\Database\Eloquent\Model|mixed|null
     */
    function get($id)
    {
        if (Auth::check()) {
            return parent::get($id);
        }

        throw new UnauthorizedException();
    }

    /**
     * @param array $where
     * @param int $limit
     * @param int $offset
     *
     * @return \Illuminate\Database\Eloquent\Model|mixed|null
     */
    function find($where = [], $limit = 25, $offset = 0)
    {
        if (Auth::check()) {
            return parent::find($where, $limit, $offset);
        }

        throw new UnauthorizedException();
    }

    /**
     * @param array $data
     * @return mixed
     */
    function create(array $data)
    {
        if (Auth::check()) {
            return parent::create($data);
        }

        throw new UnauthorizedException();
    }

    /**
     * @param $id
     * @param array $data
     * @return mixed
     */
    function update($id, array $data)
    {
        if (Auth::check()) {
            return parent::update($id, $data);
        }

        throw new UnauthorizedException();
    }

    /**
     * @param $idOrWhere
     * @return mixed
     */
    function delete($idOrWhere)
    {
        if (Auth::check()) {
            return parent::delete($idOrWhere);
        }

        throw new UnauthorizedException();
    }

}