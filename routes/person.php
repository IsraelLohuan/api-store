<?php

use Application\Controllers\PersonController;

$app->get("/persons", function() {
    
    $personController = new PersonController();

    $personController->getAll();
});