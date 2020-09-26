<?php

use Application\Controllers\PersonController;
use Application\Utilities;

$app->get("/persons", function($request, $response) {
   
    $personController = new PersonController();

    $data = $personController->getAll();

    return $response->withJson($data, Utilities::getStatusCode($data));
});