<?php

namespace Pyntax\Contracts\Services;

use Pyntax\Contracts\CRUD;
use Pyntax\Contracts\Repositories\Repository;

/**
 * Interface Service
 * @package Pyntax\Contracts\Services
 */
interface Service extends CRUD
{
    /**
     * Service constructor.
     * @param Repository $repository
     */
    function __construct(Repository $repository);

    /**
     * @return Repository
     */
    function getRepository();
}