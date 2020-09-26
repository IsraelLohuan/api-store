<?php

use Application\Models\Person;
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

$app->post("/person", function($request, $response) {
   
    $personController = new PersonController();

    $body = $request->getParsedBody();

    $person = new Person(
        null,
        $body["name"],
        $body["document"],
        $body["cellphone"],
        $body["filenameimage"],
        $body["email"]
    );

    $data = $personController->insert($person);

    return $response->withJson($data, Utilities::getStatusCode($data));
});

$app->put("/person", function($request, $response) {
   
    $personController = new PersonController();

    $body = $request->getParsedBody();

    $person = new Person(
        null,
        $body["name"],
        $body["document"],
        $body["cellphone"],
        $body["filenameimage"],
        $body["email"]
    );

    $data = $personController->update($person, $body);

    return $response->withJson($data, Utilities::getStatusCode($data));
});