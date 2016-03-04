<?php
namespace Pyntax\Api;

/**
 * Class RestApiInterface
 * @package Pyntax\Api
 */
interface RestApiHelperInterface
{
    /**
     * @param array $searchParameters
     * @return mixed
     */
    public function getResource($searchParameters = array());

    /**
     * @param array $params
     * @return mixed
     */
    public function postResource(array $params);

    /**
     * @param $id
     * @param array $data
     * @return mixed
     */
    public function putResource($id, array $data);

    /**
     * @param $id
     * @param array $data
     *
     * @return mixed
     */
    public function deleteResource($id, array $data = array());
}