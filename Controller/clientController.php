<?php
class clientController
{
    public $data_category;
    public $data_product;
    public $data_user;
    public function __construct()
    {
        $Query = [
            "data_category" => "categoryQuery",
            "data_product" => "productQuery",
            "data_user" => "userQuery",
        ];
        foreach ($Query as $key => $value) {
            $this->$key = new $value();
        }
    }
    public function register()
    {
        $user = new Users();
        $errors = [];
        $success = "";

        if (isset($_POST['sbm_register'])) {
            $fields = [
                'username' => 'Tên người dùng',
                'email' => 'Email',
                'phone' => 'Số điện thoại',
                'password' => 'Mật khẩu',
                'check_password' => 'Nhập lại mật khẩu'
            ];
            foreach ($fields as $field => $label) {
                if (empty($_POST['get_' . $field])) {
                    $errors[] = "$label không được để trống.";
                }
            }
            $user->username = $_POST['get_username'] ?? '';
            $user->email = $_POST['get_email'] ?? '';
            $user->phone = $_POST['get_phone'] ?? '';
            $user->password = $_POST['get_password'] ?? '';
            $password_check = $_POST['get_check_password'] ?? '';
            if ($user->password !== $password_check) {
                $errors[] = "Nhập lại mật khẩu không trùng khớp.";
            }
            if (!empty($user->email) && !filter_var($user->email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Định dạng email không hợp lệ.";
            }
            if (!empty($user->password) && strlen($user->password) < 6) {
                $errors[] = "Mật khẩu phải có ít nhất 6 ký tự.";
            }
            $checkUser = $this->data_user->checkUser($user->email);
            if ($checkUser) {
                $errors[] = "Người dùng này đã tồn tại.";
            }
            if (empty($errors)) {
                $result = $this->data_user->register($user);
                if ($result == "success") {
                    $success = "Đăng ký thành công!";
                } else {
                    $errors[] = "Có lỗi xảy ra trong quá trình đăng ký.";
                }
            }
        }
        $list_Category = $this->data_category->all_category();
        include "view/client/base/header.php";
        include "view/client/register.php";
    }

    public function all_category_on_main()
    {
        $list_Category = $this->data_category->all_category();
        $list_new_product = $this->data_product->new_product_main();
        $list_top_seller = $this->data_product->best_seller();
        include "view/client/base/header.php";
        include "view/client/base/main.php";
    }
    public function detail_product($id)
    {
        $detail = $this->data_product->detail_product($id);
        $view_coutn = $this->data_product->view_count($id);
        $list_all_product = $this->data_product->all_product_main();
        $list_Category = $this->data_category->all_category();
        include "view/client/base/header.php";
        include "view/client/detail.php";
    }
    public function categorry_product($id)
    {
        $list_Category = $this->data_product->all_category();
        $list_all_product = $this->data_product->all_product_main();
        $category = $this->data_category->one_row_category($id);
        include "view/client/base/header.php";
        include "view/client/category.php";
    }
    public function all_product_main()
    {
        $list_Category = $this->data_category->all_category();
        $list_all_product = $this->data_product->all_product_main();
        include "view/client/base/header.php";
        include "view/client/product.php";
    }
    public function login() {
        $noti = "";
        if (isset($_POST['submit_login'])) {
            $email = $_POST['get_email_login'] ?? '';
            $password = $_POST['get_password_login'] ?? '';
        
            if (empty($email) || empty($password)) {
                $noti = "Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu.";
                include "view/client/login.php";
                exit();
            }
        
            $user = $this->data_user->login($email, $password);
        
            if ($user) {
                $_SESSION['user'] = $user;
                header("Location: index.php?API=home");
                exit();
            } else {
                $noti = "Tên đăng nhập hoặc mật khẩu không chính xác.";
                header("Location: index.php?API=login");
                exit();
            }
        }
        $list_Category = $this->data_category->all_category();
    include "view/client/base/header.php";
    include "view/client/login.php";
}
public function log_out(){
    session_unset();
    session_destroy();
    header("location: index.php?API=home");
}
public function information(){
    $list_Category = $this->data_category->all_category();
    include "view/client/base/header.php";
    include "view/client/information.php";
}
}
