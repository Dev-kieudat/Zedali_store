<?php
class categoryQuery
{
    private $pdo;
    public function __construct()
    {
        $db = new Database();
        $this->pdo = $db->getConnection();
    }
    //ADMIN-CATEGORY======================================================================================================================================================
    public function add_category(Categorys $category)
    {
        $sql = "INSERT INTO categorys(category_name,category_type) VALUES('$category->category_name','$category->category_type')";
        $data = $this->pdo->exec($sql);
        if ($data === 1) {
            return "success";
        }
    }
    public function check_category_exists($category_name)
    {
        $sql = "SELECT COUNT(*) FROM categorys WHERE category_name = :category_name";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':category_name', $category_name, PDO::PARAM_STR);
        $stmt->execute();

        $count = $stmt->fetchColumn();
        return $count > 0;
    }
    public function all_category()
    {
        $sql = "SELECT * FROM categorys";
        $data = $this->pdo->query($sql)->fetchAll();

        $arrayCategory = [];
        foreach ($data as $value) {
            $category = new Categorys();
            $category->category_id = $value['category_id'];
            $category->category_name = $value['category_name'];
            $category->category_type = $value['category_type'];
            $arrayCategory[] = $category;
        }
        return $arrayCategory;
    }
    public function delete_category($id)
    {
        $sql = "DELETE FROM categorys WHERE category_id = $id";
        $data = $this->pdo->exec($sql);
        if ($data == 1) {
            return "success";
        }
    }
    public function one_row_category($id)
    {
        $sql = "SELECT * FROM categorys WHERE category_id=$id";
        $data = $this->pdo->query($sql)->fetch();
        if ($data !== false) {
            $category = new Categorys();
            $category->category_id = $data["category_id"];
            $category->category_name = $data["category_name"];
            $category->category_type = $data["category_type"];
            return $category;
        } else {
            echo "Lỗi: ID không tồn tại. Mời bạn kiểm tra lại.";
        }
    }
    public function update_category($id, Categorys $category)
    {
        $sql = "UPDATE `categorys` SET `category_name`='$category->category_name',`category_type`='$category->category_type' WHERE category_id = $id";
        $data = $this->pdo->exec($sql);
        if ($data == 1 || $data == 0) {
            return "success";
        }
    }
}