<?php

namespace Pyntax\Http\Controllers\Api\Resources;

use App\Http\Controllers\Controller;

/**
 * Class ResourceController
 * @package Pyntax\Http\Controllers\Api\Resources
 */
class ResourceController extends Controller
{
    /**
     * @return bool
     */
    protected function checkIfResourceIsActive()
    {
        // Lets get the resource name
        $resourceName = request('resource');

        // If no resource was found in the route just return false.
        if (empty($resourceName)) {
            return false;
        }

        // Lets check if we have this resource in the active_resource array in the config.
        $activeResources = config('pyntax-api-helper.active_resources');

        // We are loading all the active resource from the config and check if they can be returned.
        return !empty($activeResources) && in_array(array_keys($activeResources), $resourceName);
    }
}