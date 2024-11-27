<?php
include_once "../../Controller/adminController.php";
include_once "../../commons/database.php";
include_once "../../model/tables.php";
include_once "../../model/categoryQuery.php";
include_once "../../model/productQuery.php";
include_once "../../model/userQuery.php";
include "header.php";
$adminController = new adminController();
$api = $_GET['API'] ?? "";
$id = $_GET['id'] ?? "";
match ($api) {
    "add_category" => $adminController->add_category(),
    "list_category" => $adminController->all_category(),
    "delete_category" => $adminController->delete_category($id),
    "update_category" => $adminController->update_category($id),
    "add_product" => $adminController->add_product(),
    "list_product" => $adminController->all_product(),
    "delete_product" => $adminController->delete_product($id),
    "update_product" => $adminController->update_product($id),
    "list_user" => $adminController->all_user(),
    "delete_user" => $adminController->delete_user($id),
    "update_user" => $adminController->update_user($id),
    "type" => include "product/type.php",
    default => $adminController->all_category(),
};
include "footer.php";
