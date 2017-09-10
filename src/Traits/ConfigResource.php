<?php

namespace Pyntax\Traits;

/**
 * Trait ConfigResource
 * @package Pyntax\Traits
 */
trait ConfigResource
{
    /**
     * @param $resourceName
     * @return array
     */
    protected function loadConfigForResource($resourceName)
    {
        // Lets check if we have this resource in the active_resource array in the config.
        $activeResources = $this->loadConfig();
        $activeResources = $activeResources['activeResources'];

        // We are loading all the active resource from the config and check if they can be returned.
        return !empty($activeResources) && in_array($resourceName, array_keys($activeResources)) ? $activeResources[$resourceName] : [];
    }

    /**
     * @return mixed
     */
    protected function loadConfig()
    {
        return config('pyntax-api-helper');
    }

    /**
     * @return string
     */
    protected function loadAuthProtectedForeignKey()
    {
        $allConfig = $this->loadConfig();

        return $allConfig['policies']['authProtectedForeignKey'] ?? 'users_id';
    }

    /**
     * This function returns isAuthProtected variable.
     *
     * @param $resourceName
     * @return bool
     */
    protected function isAuthorizationRequired($resourceName)
    {
        $resourceConfig = $this->loadConfigForResource($resourceName);

        return !empty($resourceConfig['isAuthProtected']) ? $resourceConfig['isAuthProtected'] : false;
    }

    /**
     * This function returns the config for a given model
     *
     * @param $resourceClass
     * @return array
     */
    protected function getResourceConfigByClass($resourceClass)
    {
        // Lets check if the Model is in the Config
        $allConfig = $this->loadConfig();

        // Lets load all the active resources.
        if (!empty($allConfig) && !empty($allConfig['activeResource'])) {
            // Loop through all the active resources.
            foreach ($allConfig['activeResource'] as $activeResource) {
                // If we have matched the active model resource lets return the config.
                if (!empty($activeResource['model']) && $activeResource['model'] == $resourceClass) {
                    return $activeResource;
                }
            }
        }

        return [];
    }
}