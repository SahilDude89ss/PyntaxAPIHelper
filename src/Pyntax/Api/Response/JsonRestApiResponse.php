<?php
namespace Pyntax\Api\Response;

/**
 * Class JsonRestApiResponse
 * @package Pyntax\Api\Response
 */
class JsonRestApiResponse extends RestApiResponseAbstract
{
    /**
     * @param $data
     * @param array $params
     *
     * @return string
     */
    public function render($data, $params = array())
    {
        return json_encode($data);
    }
}