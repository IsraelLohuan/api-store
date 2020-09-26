<?php

use Application\Controllers\ProductController;
use Application\Utilities;

$app->get("/products", function($request, $response) {

    $productController = new ProductController();

    $data = $productController->getAll();

    return $response->withJson($data, Utilities::getStatusCode($data));
});

$app->get("/product/{id}", function($request, $response) {

    $productController = new ProductController();

    $id = $request->getAttribute('id');

    $data = $productController->getById($id);

    return $response->withJson($data, Utilities::getStatusCode($data));
});