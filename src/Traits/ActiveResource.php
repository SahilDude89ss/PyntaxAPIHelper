<?php

namespace Pyntax\Traits;

/**
 * Trait ActiveResource
 * @package Pyntax\Traits
 */
trait ActiveResource
{
    use ConfigResource;

    /**
     * @param null $resourceName
     * @return bool
     */
    protected function checkIfResourceIsActive($resourceName = null)
    {
        if (is_null($resourceName)) {
            // Lets get the resource name
            $resourceName = request('resource');
        }

        // If no resource was found in the route just return false.
        if (empty($resourceName)) {
            return false;
        }

        // If we have any config of the service means its active.
        return !empty($this->loadConfigForResource($resourceName));
    }
}