<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once("./vendor/autoload.php");
\Pyntax\Pyntax::start("./config");

$resourceName = isset($_GET['resource']) ? $_GET['resource'] : 'clients';
if (isset($_GET['resource'])) {
    $clientsRestApi = new \Pyntax\Api\RestApiHelper($resourceName);

    $postData = json_decode(file_get_contents('php://input'), true);
    if (!empty($postData)) {
        $clientsRestApi->postResource($postData);
    } else {
        $resourceData['searchParams'] = $_GET;
        unset($resourceData['searchParams']['resource']);

        $clientsRestApi->getResource($resourceData);
    }
}