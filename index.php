<?php

require "vendor/autoload.php";

$app = new \Slim\App();

require_once("routes/person.php");

$app->run();

?>