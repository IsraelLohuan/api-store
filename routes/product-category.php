<?php

use Application\Controllers\ProductCategoryController;
use Application\Utilities;

$app->get("/categories", function($request, $response) {

    $productCategoryController = new ProductCategoryController();

    $data = $productCategoryController->getAll();

    return $response->withJson($data, Utilities::getStatusCode($data));
});

$app->post("/category", function($request, $response) {

    $productController = new ProductCategoryController();

    $body = $request->getParsedBody();

    $data = $productController->insert($body ?? array());

    return $response->withJson($data, Utilities::getStatusCode($data));
});

$app->put("/category", function($request, $response) {

    $productController = new ProductCategoryController();

    $body = $request->getParsedBody();

    $data = $productController->update($body ?? array());

    return $response->withJson($data, Utilities::getStatusCode($data));
});