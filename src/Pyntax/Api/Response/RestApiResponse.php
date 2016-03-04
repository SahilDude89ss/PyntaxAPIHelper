<?php

namespace Pyntax\Api\Response;

/**
 * Interface RestApiResponse
 * @package Pyntax\Api\Response
 */
interface RestApiResponse
{
    /**
     * @param $data
     * @param array $params
     *
     * @return mixed
     */
    public function render($data, $params = array());
}