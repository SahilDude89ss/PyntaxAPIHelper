<?php

namespace Pyntax\Contracts\Repositories;

use Pyntax\Contracts\CRUD;

/**
 * Interface Repository
 * @package Pyntax\Contracts\Repositories
 */
interface Repository extends CRUD
{
    /**
     * @param $resourceName
     * @return mixed
     */
    function setResourceName($resourceName);

    /**
     * @return string
     */
    function getResourceName();
}