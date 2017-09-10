<?php

namespace Pyntax\Repositories;

use Pyntax\Contracts\Repositories\Repository;

/**
 * Class AbstractRepository
 * @package Pyntax\Repositories
 */
abstract class AbstractRepository implements Repository
{
    /**
     * @var string
     */
    protected $resourceName;

    /**
     * @param $resourceName
     */
    function setResourceName($resourceName)
    {
        $this->resourceName = $resourceName;
    }

    /**
     * @return string
     */
    function getResourceName()
    {
        return $this->resourceName;
    }
}