<?php
error_reporting(E_ALL);
ini_set('display_errors',1);

include_once("./vendor/autoload.php");

\Pyntax\Pyntax::start("./config");
$clientsRestApi = new \Pyntax\Api\RestApiHelper('clients');
$result = $clientsRestApi->getResource([
    'id' => 2
]);

echo $result;
die;
