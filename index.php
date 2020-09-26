<?php

require "vendor/autoload.php";

$app = new \Slim\App();

require_once("routes/person.php");
require_once("routes/product.php");

$app->run();

?>