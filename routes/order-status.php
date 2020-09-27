<?php

use Application\Controllers\StatusOrderController;
use Application\Utilities;

$app->get("/orderstatus", function($request, $response) {

    $statusOrderController = new StatusOrderController();

    $data =  $statusOrderController->getAll();

    return $response->withJson($data, Utilities::getStatusCode($data));
});

$app->post("/orderstatus", function($request, $response) {

    $statusOrderController = new StatusOrderController();

    $body = $request->getParsedBody();

    $data =  $statusOrderController->insert($body ?? array());

    return $response->withJson($data, Utilities::getStatusCode($data));
});

$app->put("/orderstatus", function($request, $response) {

    $statusOrderController = new StatusOrderController();

    $body = $request->getParsedBody();

    $data = $statusOrderController->update($body ?? array());

    return $response->withJson($data, Utilities::getStatusCode($data));
});