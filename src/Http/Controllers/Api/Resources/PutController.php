<?php

namespace Pyntax\Http\Controllers\Api\Resources;

/**
 * Class PutController
 * @package Pyntax\Http\Controllers\Api\Resources
 */
class PutController extends ResourceController
{
    /**
     * @param $resource
     * @param $id
     *
     * @return mixed
     */
    public function updateResource($resource, $id)
    {
        $service = $this->getResourceService($resource);

        if (!empty($service)) {
            // Form data
            $resourceData = request()->all();
            if (!empty($resourceData)) {
                return $service->update($id, $resourceData);
            }
        }

        abort(404, $resource . ' not found');
    }
}