<?php

require "vendor/autoload.php";

$app = new \Slim\App();

require_once("routes/person.php");
require_once("routes/product.php");
require_once("routes/product-category.php");
require_once("routes/user.php");
require_once("routes/order.php");
require_once("routes/order-status.php");
require_once("routes/product-image.php");
require_once("routes/address.php");

$app->run();

?>