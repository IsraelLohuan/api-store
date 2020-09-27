<?php

use Application\Controllers\UserController;
use Application\Utilities;

$app->get("/users", function($request, $response) {

    $userController = new UserController();

    $data = $userController->getAll();

    return $response->withJson($data, Utilities::getStatusCode($data));
});

$app->get("/user/{id}", function($request, $response) {

    $userController = new UserController();

    $id = $request->getAttribute('id');

    $data = $userController->getById($id);

    return $response->withJson($data, Utilities::getStatusCode($data));
});

$app->post("/user", function($request, $response) {

    $userController = new UserController();

    $body = $request->getParsedBody();

    $data = $userController->insert($body ?? array());

    return $response->withJson($data, Utilities::getStatusCode($data));
});

$app->put("/user", function($request, $response) {

    $userController = new UserController();

    $body = $request->getParsedBody();

    $data = $userController->update($body ?? array());

    return $response->withJson($data, Utilities::getStatusCode($data));
});