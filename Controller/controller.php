<?php
class Controller
{
    public $data;
    public function __construct()
    {
        $this->data = new Query();
    }

    public function add_category()
    {
        $category = new Categorys();
        $erro = "";
        $success = "";

        if (isset($_POST['sbm_add_cate'])) {
            $category = new Categorys();
            $category->category_name = $_POST['add_category'];
            $category->category_type = $_POST['category_type'] ?? "";

            if ($category->category_name == "") {
                $erro = "vui lòng nhập tên danh mục";
            }
            if ($category->category_type == "") {
                $erro = "vui lòng nhập chọn loại danh mục";
            }

            $checkCategory = $this->data->check_category_exists($category->category_name);
            if ($checkCategory) {
                $erro = "Danh mục này đã tồn tại!";
            }

            if ($erro == "") {
                $result = $this->data->add_category($category);
                if ($result == "success") {
                    $success = "thêm thành công";
                    $category = new Categorys();
                }
            }
        }
        include "../../view/admin/category/add.php";
    }
    public function all_category()
    {
        $list_Category = $this->data->all_category();
        include "../../view/admin/category/list.php";
    }
    public function all_category_on_main()
    {
        $list_Category = $this->data->all_category();
        $list_new_product = $this->data->new_product_main();
        $list_top_seller = $this->data->best_seller();
        include "view/client/base/header.php";
        include "view/client/base/main.php";
    }
    public function delete_category($id)
    {
        if ($id !== "") {
            $result = $this->data->delete_category($id);
            if ($result === "success") {
                header("Location: index.php?API=list_category");
            }
        } else {
            echo "<h1> Lỗi: Tham số id trống. Mời bạn kiểm tra tham số id trên đường dẫn url. </h1>";
        }
    }

    public function update_category($id)
    {
        if ($id !== "") {
            $category = new Categorys();
            $erro = "";
            $success = "";

            $category = $this->data->one_row_category($id);

            if (isset($_POST['sbm_update_cate'])) {
                $category = new Categorys();
                $category->category_name = $_POST['update_category'];
                $category->category_type = $_POST['update_category_type'] ?? "";


                if ($category->category_name == "") {
                    $erro = "vui lòng nhập tên danh mục";
                }

                if ($erro == "") {
                    $result = $this->data->update_category($id, $category);
                    if ($result == "success") {
                        $success = "sửa thành công";
                    }
                }
            }
            include "../../view/admin/category/update.php";
        }
    }
    // ==================================================================================================================================
    public function add_product()
    {
        $product = new Products();
        $erro = "";
        $success = "";
        $uploadNoti = "";

        if (isset($_POST['sbm_add_product'])) {
            $product = new Products();
            $product->category_id = $_POST['id_cate'];
            $product->name = $_POST['name_product'];
            $product->price = $_POST['price_product'];
            $product->description = $_POST['descrip_product'];

            if ($product->name == "" || $product->price == "" || $product->description == "") {
                $erro = "Vui lòng nhập đủ thông tin sản phẩm.";
            }

            if ($_FILES["img_src_product"]["name"] !== "") {
                $number1 = $_FILES["img_src_product"]["tmp_name"];
                $number2 = "../upload/" . $_FILES["img_src_product"]["name"];
                $uploadResult = move_uploaded_file($number1, $number2);
                if ($uploadResult) {
                    $product->image_url = $number2;
                } else {
                    $uploadNoti = "Upload file không thành công. Mời bạn thử lại.";
                }
            }

            if ($erro == "" && $uploadNoti == "") {
                $result = $this->data->add_product($product);
                if ($result == "success") {
                    $success = "Thêm thành công.";
                    $product = new ProductS();
                }
            }
        }
        $add_id_cate = $this->data->all_category();
        include "../../view/admin/product/add.php";
    }
    public function all_product()
    {
        if (isset($_POST['sbm_filler'])) {
            $search_prl = $_POST['search_prl'];
            $id_cate = $_POST['id_cate'];
        } else {
            $search_prl = "";
            $id_cate = 0;
        }
        $add_id_cate = $this->data->all_category();
        $list_product = $this->data->all_product($id_cate);
        include "../../view/admin/product/list.php";
    }
    // ==================================================================================================================================
    public function detail_product($id)
    {
        $detail = $this->data->detail_product($id);
        $view_coutn = $this->data->view_count($id);
        $list_all_product = $this->data->all_product_main();
        $list_Category = $this->data->all_category();
        include "view/client/base/header.php";
        include "view/client/detail.php";
    }
    public function categorry_product($id)
    {
        $list_Category = $this->data->all_category();
        $list_all_product = $this->data->all_product_main();
        $category = $this->data->one_row_category($id);
        include "view/client/base/header.php";
        include "view/client/category.php";
    }
    public function all_product_main()
    {
        $list_Category = $this->data->all_category();
        $list_all_product = $this->data->all_product_main();
        include "view/client/base/header.php";
        include "view/client/product.php";
    }
    public function delete_product($id)
    {
        if ($id !== "") {
            $result = $this->data->delete_product($id);
            if ($result === "success") {
                header("Location: index.php?act=listsp");
            }
        } else {
            echo "<h1> Lỗi: Tham số id trống. Mời bạn kiểm tra tham số id trên đường dẫn url. </h1>";
        }
    }
    public function update_product($id)
    {
        if ($id !== "") {
            $product = new Products();
            $erro = "";
            $success = "";
            $uploadNoti = "";

            $product = $this->data->detail_product($id);
            $category = $this->data->one_row_category($product->category_id);

            if (isset($_POST['sbm_update_product'])) {
                $product = new Products();
                $product->category_id = $_POST['Uid_cate'];
                $product->name = $_POST['Uname_product'];
                $product->price = $_POST['Uprice_product'];
                $product->description = $_POST['Udescrip_product'];
                $old_img = $_POST['old_img'];
                if ($product->name == "" || $product->price == "" || $product->description == "") {
                    $erro = "Vui lòng nhập đủ thông tin sản phẩm.";
                }

                if ($_FILES["Uimg_src_product"]["name"] !== "") {
                    $number1 = $_FILES["Uimg_src_product"]["tmp_name"];
                    $number2 = "../upload/" . $_FILES["Uimg_src_product"]["name"];
                    $uploadResult = move_uploaded_file($number1, $number2);
                    if ($uploadResult) {
                        $product->image_url = $number2;
                    } else {
                        $uploadNoti = "Upload file không thành công. Mời bạn1thử lại.";
                    }
                } else {
                    $product->image_url = $old_img;
                }

                if ($erro == "" && $uploadNoti == "") {
                    $result = $this->data->update_product($id, $product);
                    if ($result == "success") {
                        $success = "Thêm thành công.";
                        $product = new Products();
                    }
                }
            }
            $update_id_cate = $this->data->all_category();
            include "../../view/admin/product/update.php";
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
                $errors = "$label không được để trống.";
            }
        }
        $user->username = $_POST['get_username'] ?? '';
        $user->email = $_POST['get_email'] ?? '';
        $user->phone = $_POST['get_phone'] ?? '';
        $user->password = $_POST['get_password'] ?? '';
        $password_check = $_POST['get_check_password'] ?? '';
        if ($user->password !== $password_check) {
            $errors = "Nhập lại mật khẩu không trùng khớp.";
        }
        if (!empty($user->email) && !filter_var($user->email, FILTER_VALIDATE_EMAIL)) {
            $errors = "Định dạng email không hợp lệ.";
        }
        if (!empty($user->password) && strlen($user->password) < 6) {
            $errors = "Mật khẩu phải có ít nhất 6 ký tự.";
        }
        $checkUser = $this->data->checkUser($user->email);
        if ($checkUser) {
            $errors = "Người dùng này đã tồn tại.";
        }
        if (empty($errors)) {
            $result = $this->data->register($user);
            if ($result == "success") {
                $success = "Đăng ký thành công!";
            } else {
                $errors[] = "Có lỗi xảy ra trong quá trình đăng ký.";
            }
        }
    }
    include "view/client/register.php";
}
}
