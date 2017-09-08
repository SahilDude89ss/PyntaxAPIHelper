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
}