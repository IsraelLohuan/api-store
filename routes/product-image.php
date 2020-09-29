<?php

use Application\Controllers\ProductImageController;
use Application\Utilities;

$app->get("/produto/imagens", function($request, $response) {

    $productImageController = new ProductImageController();

    $data = $productImageController->getAll();

    return $response->withJson($data, Utilities::getStatusCode($data));
});

$app->post("/produto/imagem", function($request, $response) {

    $productImageController = new ProductImageController();

    $body = $request->getParsedBody();

    $data = $productImageController->insert($body ?? array());

    return $response->withJson($data, Utilities::getStatusCode($data));
});

$app->put("/produto/imagem", function($request, $response) {

    $productImageController = new ProductImageController();

    $body = $request->getParsedBody();

    $data = $productImageController->update($body ?? array());

    return $response->withJson($data, Utilities::getStatusCode($data));
});