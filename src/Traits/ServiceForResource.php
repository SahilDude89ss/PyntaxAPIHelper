<?php

namespace Pyntax\Traits;

use Pyntax\Contracts\Repositories\Repository;
use Pyntax\Contracts\Services\Service;

/**
 * Trait ServiceForResource
 * @package Pyntax\Traits
 */
trait ServiceForResource
{
    use ActiveResource, ConfigResource;

    /**
     * @param $resourceName
     * @return \Illuminate\Foundation\Application|mixed|null
     */
    protected function loadServiceForGivenResource($resourceName)
    {
        // Lets check if the config has a Service registered.
        if ($this->checkIfResourceIsActive($resourceName)) {
            // Load all the service config
            $serviceInConfig = $this->loadConfigForResource($resourceName);

            // The config has a Service registered and we will just to return that.
            if (!empty($serviceInConfig['service']) && !empty(app($serviceInConfig['service'])) && app($serviceInConfig['service']) instanceof Service) {
                // Before we return it we will check if the Sevice is actually the same our Service
                return app($serviceInConfig['service']);
            }

            // The resource is active but we don't have a Service registered in the config.

            // We need to load a Repository first as its is required to instantiate a Service.
            $repository = $this->loadRepositoryForGivenResource($resourceName);

            // If we have a valid repository lets return the Service.
            if (!empty($repository)) {
                return app('Pyntax\Services\\' . $resourceName);
            }
        }

        return null;
    }

    /**
     * @param $resourceName
     * @return \Illuminate\Foundation\Application|mixed|null
     */
    protected function loadRepositoryForGivenResource($resourceName)
    {
        // Lets check if the config has a Repository registered.
        if ($this->checkIfResourceIsActive($resourceName)) {
            // Load all the Repository config
            $resourceConfig = $this->loadConfigForResource($resourceName);

            // The config has a Repository registered and we will just to return that.
            if (!empty($resourceConfig['repository']) && !empty(app($resourceConfig['repository'])) && app($resourceConfig['repository']) instanceof Repository) {
                // Before we return it we will check if the Repository is actually the same our Repository
                return app($resourceConfig['repository']);
            }

            // The resource is active but we don't have a Repository registered in the config.
            return app('Pyntax\Repositories\\' . $resourceName);
        }

        return null;
    }
}