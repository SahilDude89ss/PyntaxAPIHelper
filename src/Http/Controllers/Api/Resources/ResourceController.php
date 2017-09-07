<?php

namespace Pyntax\Http\Controllers\Api\Resources;

use App\Http\Controllers\Controller;
use Pyntax\Traits\ActiveResource;
use Pyntax\Traits\ConfigResource;
use Pyntax\Traits\ServiceForResource;

/**
 * Class ResourceController
 * @package Pyntax\Http\Controllers\Api\Resources
 */
class ResourceController extends Controller
{
    use ServiceForResource;

    /**
     * @param null $resourceName
     * @return \Illuminate\Foundation\Application|mixed|null
     */
    protected function getResourceService($resourceName = null)
    {
        if (is_null($resourceName)) {
            // Les load the resource name
            $resourceName = request('resource');
        }

        // If we have a resource return the Service.
        if (!empty($resourceName)) {
            return $this->loadServiceForGivenResource($resourceName);
        }

        return null;
    }
}