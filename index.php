<?php
session_start();
ob_start();
include_once "controller/clientController.php";
include_once "commons/database.php";
include_once "model/tables.php";
include_once "model/userQuery.php";
include_once "model/categoryQuery.php";
include_once "model/productQuery.php";
$api = $_GET['API'] ?? "";
$id = $_GET['id'] ?? "";
$clientController = new clientController();
match ($api) {
    'home' => $clientController->all_category_on_main(),
    'detail' => $clientController->detail_product($id),
    'category' => $clientController->categorry_product($id),
    'product' => $clientController->all_product_main(),
    'register' => [
        $clientController->register(),
    ],
    'login' => [
        $clientController->login(),
    ],
    'log_out' => [
        $clientController->log_out(),
    ],
    'information' => [
        $clientController->information(),
    ],
    'cart' => [
        include "view/client/base/header.php",
        include "view/client/cart.php"
    ],
    'about' => [
        include "view/client/base/header.php",
        include "view/client/about.php"
    ],
    'feedback' => [
        include "view/client/base/header.php",
        include "view/client/feedback.php"
    ],
    'guide' => [
        include "view/client/base/header.php",
        include "view/client/guide.php"
    ],
    default => $clientController->all_category_on_main(),
};


include "view/client/base/foot.php";
