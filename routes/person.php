<?php

use Application\Controllers\PersonController;
use Application\Utilities;

$app->get("/persons", function($request, $response) {
   
    $personController = new PersonController();

    $data = $personController->getAll();

    return $response->withJson($data, Utilities::getStatusCode($data));
});

$app->get("/person/{email}", function($request, $response) {
   
    $personController = new PersonController();

    $email = $request->getAttribute('email');

    $data = $personController->getByEmail($email);

    return $response->withJson($data, Utilities::getStatusCode($data));
});