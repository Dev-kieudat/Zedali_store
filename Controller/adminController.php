<?php
class adminController
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
        foreach($Query as $key => $value){
            $this->$key = new $value();
        }
    }
// CATEGORY_AREA
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

            $checkCategory = $this->data_category->check_category_exists($category->category_name);
            if ($checkCategory) {
                $erro = "Danh mục này đã tồn tại!";
            }

            if ($erro == "") {
                $result = $this->data_category->add_category($category);
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
        $list_Category = $this->data_category->all_category();
        include "../../view/admin/category/list.php";
    }
    public function delete_category($id)
    {
        if ($id !== "") {
            $result = $this->data_category->delete_category($id);
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

            $category = $this->data_category->one_row_category($id);

            if (isset($_POST['sbm_update_cate'])) {
                $category = new Categorys();
                $category->category_name = $_POST['update_category'];
                $category->category_type = $_POST['update_category_type'] ?? "";


                if ($category->category_name == "") {
                    $erro = "vui lòng nhập tên danh mục";
                }

                if ($erro == "") {
                    $result = $this->data_category->update_category($id, $category);
                    if ($result == "success") {
                        $success = "sửa thành công";
                    }
                }
            }
            include "../../view/admin/category/update.php";
        }
    }
// PRODUCT_AREA
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
                $result = $this->data_product->add_product($product);
                if ($result == "success") {
                    $success = "Thêm thành công.";
                    $product = new ProductS();
                }
            }
        }
        $add_id_cate = $this->data_category->all_category();
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
        $add_id_cate = $this->data_category->all_category();
        $list_product = $this->data_product->all_product($id_cate);
        include "../../view/admin/product/list.php";
    }
    public function delete_product($id)
    {
        if ($id !== "") {
            $result = $this->data_product->delete_product($id);
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

            $product = $this->data_product->detail_product($id);
            $category = $this->data_category->one_row_category($product->category_id);

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
                    $result = $this->data_product->update_product($id, $product);
                    if ($result == "success") {
                        $success = "sửa thành công";
                        $product = $this->data_product->detail_product($id);
                        header("Refresh: 0");
                    }
                }
            }
            $update_id_cate = $this->data_category->all_category();
            include "../../view/admin/product/update.php";
        }
    }
    public function all_user(){
        $list_user = $this->data_user->all_user();
        include "../../view/admin/user/list.php";
    }
    public function delete_user($id){
        if ($id !== "") {
            $result = $this->data_user->delete_user($id);
            if ($result === "success") {
                header("Location: index.php?API=list_user");
                }
            } else {
            echo "<h1> Lỗi: Tham số id trống. Mời bạn kiểm tra tham số id trên đường dẫn url. </h1>";
            }
        }
        public function update_user($id)
        {
            $user = new Users();
            $errors = [];
            $success = "";
        
            if ($id) {
                // Lấy thông tin người dùng từ cơ sở dữ liệu
                $userData = $this->data_user->one_user($id);
        
                if (!$userData) {
                    $errors[] = "Người dùng không tồn tại.";
                }
            }
        
            if (isset($_POST['sbm_user_update'])) {
                // Các trường cần kiểm tra
                $fields = [
                    'username' => 'Tên người dùng',
                    'email' => 'Email',
                    'phone' => 'Số điện thoại',
                    'role' => 'Quyền',
                    'status' => 'Trạng thái'
                ];
        
                // Kiểm tra các trường có rỗng không
                foreach ($fields as $field => $label) {
                    if (empty($_POST['get_' . $field])) {
                        $errors[] = "$label không được để trống.";
                    }
                }
        
                // Gán dữ liệu người dùng từ form
                $user->user_id = $id;
                $user->username = $_POST['get_username'] ?? '';
                $user->email = $_POST['get_email'] ?? '';
                $user->phone = $_POST['get_phone'] ?? '';
                $user->role = $_POST['get_role'] ?? '';
                $user->status = $_POST['get_status'] ?? '';
        
                // Kiểm tra định dạng email
                if (!empty($user->email) && !filter_var($user->email, FILTER_VALIDATE_EMAIL)) {
                    $errors[] = "Định dạng email không hợp lệ.";
                }
        
                // Nếu có lỗi, không cập nhật
                if (empty($errors)) {
                    // Nếu người dùng không thay đổi mật khẩu, giữ nguyên mật khẩu cũ
                    if (!empty($_POST['get_password'])) {
                        $user->password = $_POST['get_password']; // Không mã hóa mật khẩu
                    } else {
                        // Nếu không thay đổi mật khẩu, giữ nguyên mật khẩu cũ
                        $user->password = $userData->password;
                    }
        
                    // Cập nhật thông tin người dùng
                    $result = $this->data_user->update_user($user);
                    if ($result == "success") {
                        $success = "Cập nhật thành công!";
                        header("Refresh: 0");
                    } 
                }
            }
        
            include "../../view/admin/user/update.php";
        }
        
        
}