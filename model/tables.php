<?php
class Categorys{
    public $category_id;
    public $category_name;
    public $category_type;
}
class Products{
    public $product_id;
    public $name;
    public $price;
    public $description;
    public $image_url;
    public $category_id ;
    public $created_at;
    public $view;
}
class Users{
    public $user_id;
    public $username;
    public $email;
    public $phone;
    public $password;
    public $created_at;
    public $role;
    public $status;
}