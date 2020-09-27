<?php

use Application\Controllers\SalesOrderController;
use Application\Utilities;

$app->get("/orders", function($request, $response) {

    $salesOrderController = new SalesOrderController();

    $data =  $salesOrderController->getAll();

    return $response->withJson($data, Utilities::getStatusCode($data));
});

$app->get("/order/{id}", function($request, $response) {

    $salesOrderController = new SalesOrderController();

    $id = $request->getAttribute('id');

    $data = $salesOrderController->getById($id);

    return $response->withJson($data, Utilities::getStatusCode($data));
});

$app->post("/order", function($request, $response) {

    $salesOrderController = new SalesOrderController();

    $body = $request->getParsedBody();

    $data =  $salesOrderController->insert($body ?? array());

    return $response->withJson($data, Utilities::getStatusCode($data));
});

$app->put("/order", function($request, $response) {

    $salesOrderController = new SalesOrderController();

    $body = $request->getParsedBody();

    $data = $salesOrderController->update($body ?? array());

    return $response->withJson($data, Utilities::getStatusCode($data));
});