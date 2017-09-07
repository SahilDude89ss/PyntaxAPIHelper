<?php

namespace Pyntax\Http\Controllers\Api\Resources;

/**
 * Class DeleteController
 * @package Pyntax\Http\Controllers\Api\Resources
 */
class DeleteController extends ResourceController
{
    /**
     * @param $resource
     * @param $id
     *
     * @return mixed
     */
    public function deleteResource($resource, $id)
    {
        $service = $this->getResourceService($resource);

        if (!empty($service)) {
            // Form data
            $resourceData = request()->all();
            if (!empty($resourceData)) {
                return $service->delete($id);
            }
        }

        abort(404, $resource . ' not found');
    }
}