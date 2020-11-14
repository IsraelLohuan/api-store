<?php

use Application\Controllers\ItemOrderController;
use Application\Utilities;

$app->get("/item", function($request, $response) {

    $itemOrderController = new ItemOrderController();

    $data = $itemOrderController->getAll();

    return $response->withJson($data, Utilities::getStatusCode($data));
});

$app->post("/item", function($request, $response) {

    $itemOrderController = new ItemOrderController();

    $body = $request->getParsedBody();

    $data =  $itemOrderController->insert($body ?? array());

    return $response->withJson($data, Utilities::getStatusCode($data));
});

$app->put("/item", function($request, $response) {

    $itemOrderController = new ItemOrderController();

    $body = $request->getParsedBody();

    $data = $itemOrderController->update($body ?? array());

    return $response->withJson($data, Utilities::getStatusCode($data));
});