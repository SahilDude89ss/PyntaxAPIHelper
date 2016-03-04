<?php

namespace Pyntax\Api\Response;

/**
 * Class RestApiResponseAbstract
 * @package Pyntax\Api\Response
 */
abstract class RestApiResponseAbstract implements RestApiResponse
{
    /**
     * RestApiResponseAbstract constructor.
     */
    public function __construct()
    {
    }

    /**
     * @param $data
     * @param array $params
     * @return mixed
     */
    public function render($data, $params = array())
    {
        return $data;
    }
}