<?php
session_start();
ob_start();
// database
include_once "app/Database/Database.php";
include_once "app/Database/Functions.php";

// model
include_once "app/Models/Category.php";
include_once "app/Models/Product.php";
include_once "app/Models/Account.php";
include_once "app/Models/Order.php";

// controller Admin
include_once  "app/Controllers/Admin/AdminUserController.php";
include_once  "app/Controllers/Admin/AdminCategoryController.php";
include_once  "app/Controllers/Admin/AdminProductController.php";
include_once  "app/Controllers/Admin/AdminOrderController.php";

// controller Client
include_once  "app/Controllers/Client/HomeController.php";
include_once  "app/Controllers/Client/RegisterController.php";
include_once  "app/Controllers/Client/LoginController.php";
include_once  "app/Controllers/Client/ProductController.php";
include_once  "app/Controllers/Client/ProductInCategoryController.php";
include_once  "app/Controllers/Client/InformationController.php";
include_once  "app/Controllers/Client/DetailController.php";
include_once  "app/Controllers/Client/CartController.php";
include_once  "app/Controllers/Client/CheckOutController.php";
include_once  "app/Controllers/Client/ChangeInformationController.php";

//router
include_once "Router/Web.php";