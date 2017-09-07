<?php

namespace Pyntax\Contracts\Repositories;

use Illuminate\Database\Eloquent\Model;

/**
 * Interface EloquentRepository
 * @package Pyntax\Contracts\Repositories
 */
interface EloquentRepository extends Repository
{
    /**
     * EloquentRepository constructor.
     * @param Model $model
     */
    function __construct(Model $model);

    /**
     * @return Model
     */
    function getModel(): Model;
}