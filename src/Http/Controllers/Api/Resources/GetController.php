<?php

namespace Pyntax\Http\Controllers\Api\Resources;

/**
 * Class PutController
 * @package Pyntax\Http\Controllers\Api\Resources
 */
class GetController extends ResourceController
{
    /**
     * @param $resource
     * @param null $id
     *
     * @return mixed
     */
    public function getResource($resource, $id = null)
    {
        $service = $this->getResourceService($resource);

        if (!empty($service)) {
            if (is_null($id)) {
                // @ToDo: Implement pagination,
                return $service->find([]);
            }

            return $service->get($id);
        }

        abort(404, $resource . ' not found');
    }
}