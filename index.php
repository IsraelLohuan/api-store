<?php

require "vendor/autoload.php";

$app = new \Slim\App(['settings' => ['displayErrorDetails' => true]]);

require_once("routes/person.php");
require_once("routes/product.php");
require_once("routes/product-category.php");
require_once("routes/order.php");
require_once("routes/order-status.php");
require_once("routes/address.php");
require_once("routes/item-order.php");

$app->run();

?>