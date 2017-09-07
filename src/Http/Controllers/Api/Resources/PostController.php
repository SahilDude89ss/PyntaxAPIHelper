<?php

namespace Pyntax\Http\Controllers\Api\Resources;

/**
 * Class PutController
 * @package Pyntax\Http\Controllers\Api\Resources
 */

class PostController extends ResourceController
{
    /**
     * @param $resource
     */
    public function createResource($resource)
    {
        $service = $this->getResourceService($resource);

        if (!empty($service)) {
            // Form data
            $resourceData = request()->all();
            if (!empty($resourceData)) {
                return $service->create($resourceData);
            }
        }

        abort('404', $resource . ' not found');
    }
}