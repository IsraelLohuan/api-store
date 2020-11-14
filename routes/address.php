<?php

use Application\Controllers\AddressController;
use Application\Utilities;

$app->get("/endereco/{id}", function($request, $response) {

    $addressController = new AddressController();

    $id = $request->getAttribute('id');

    $data = $addressController->getById($id);

    return $response->withJson($data, Utilities::getStatusCode($data));
});

$app->get("/enderecos", function($request, $response) {

    $addressController = new AddressController();

    $data = $addressController->getAll();
    
    return $response->withJson($data, Utilities::getStatusCode($data));
});

$app->post("/endereco", function($request, $response) {

    $addressController = new AddressController();

    $body = $request->getParsedBody();

    $data = $addressController->insert($body ?? array());

    return $response->withJson($data, Utilities::getStatusCode($data));
});

$app->put("/endereco", function($request, $response) {

    $addressController = new AddressController();

    $body = $request->getParsedBody();

    $data = $addressController->update($body ?? array());

    return $response->withJson($data, Utilities::getStatusCode($data));
});