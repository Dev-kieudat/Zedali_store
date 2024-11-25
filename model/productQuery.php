<?php
class productQuery {
    private $pdo;

    public function __construct() {
        $db = new Database();
        $this->pdo = $db->getConnection();
    }

    public function add_product(Products $product)
    {
        $sql = "INSERT INTO products(name, price, image_url, description, category_id, view) 
        VALUES('" . $product->name . "', '" . $product->price . "', '" . $product->image_url . "', '" . $product->description . "', '" . $product->category_id . "', 0)";
        $data = $this->pdo->exec($sql);
        if ($data === 1) {
            return "success";
        }
    }
    public function all_product($category_id)
    {
        $sql = "SELECT * FROM products WHERE 1";
        if ($category_id > 0) {
            $sql .= " and category_id ='" . $category_id . "'";
        };
        $sql .= " order by category_id desc";
        $data = $this->pdo->query($sql)->fetchAll();

        $arrayProduct = [];
        foreach ($data as $value) {
            $product = new Products();
            $product->product_id = $value['product_id'];
            $product->name = $value['name'];
            $product->price = $value['price'];
            $product->image_url = $value['image_url'];
            $product->description = $value['description'];
            $product->category_id = $value['category_id'];
            $product->created_at = $value['created_at'];
            $product->view = $value['view'];
            $arrayProduct[] = $product;
        }
        return $arrayProduct;
    }
 
    public function delete_product($id)
    {
        $sql = "DELETE FROM products WHERE product_id = $id";
        $data = $this->pdo->exec($sql);
        if ($data == 1) {
            return "success";
        }
    }
    public function detail_product($id)
    {
        $sql = "SELECT * FROM products WHERE product_id = $id";
        $data = $this->pdo->query($sql)->fetch();
        if ($data !== false) {
            $product = new Products();
            $product->product_id = $data['product_id'];
            $product->name = $data['name'];
            $product->price = $data['price'];
            $product->image_url = $data['image_url'];
            $product->description = $data['description'];
            $product->category_id = $data['category_id'];
            return $product;
        } else {
            echo "Lỗi: ID không tồn tại. Mời bạn kiểm tra lại.";
        }
    }
    public function update_product($id, Products $product)
    {
        $sql = "UPDATE `products` SET `name`='$product->name',`price`='$product->price',`image_url`='$product->image_url',`description`='$product->description',`category_id`='$product->category_id' WHERE product_id = $id";
        $data = $this->pdo->exec($sql);
        if ($data == 1 || $data == 0) {
            return "success";
        }
    }
    public function view_count($id)
    {
        $sql = "UPDATE products SET view = view + 1 WHERE product_id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $sql = "SELECT view FROM products WHERE product_id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result ? $result['view'] : 0;
    }
    public function new_product_main()
    {
        $sql = "SELECT * FROM products ORDER BY product_id DESC LIMIT 4";
        $data = $this->pdo->query($sql)->fetchAll();

        $arrayProduct = [];
        foreach ($data as $value) {
            $product = new Products();
            $product->product_id = $value['product_id'];
            $product->name = $value['name'];
            $product->price = $value['price'];
            $product->image_url = $value['image_url'];
            $product->description = $value['description'];
            $product->category_id = $value['category_id'];
            $arrayProduct[] = $product;
        }
        return $arrayProduct;
    }

    public function best_seller()
    {
        $sql = "SELECT * FROM products ORDER BY view DESC LIMIT 4";
        $data = $this->pdo->query($sql)->fetchAll();

        $arrayProduct = [];
        foreach ($data as $value) {
            $product = new Products();
            $product->product_id = $value['product_id'];
            $product->name = $value['name'];
            $product->price = $value['price'];
            $product->image_url = $value['image_url'];
            $product->description = $value['description'];
            $product->category_id = $value['category_id'];
            $arrayProduct[] = $product;
        }
        return $arrayProduct;
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
    public function all_product_main()
    {
        $sql = "SELECT * FROM products";
        $data = $this->pdo->query($sql)->fetchAll();

        $arrayProduct = [];
        foreach ($data as $value) {
            $product = new Products();
            $product->product_id = $value['product_id'];
            $product->name = $value['name'];
            $product->price = $value['price'];
            $product->image_url = $value['image_url'];
            $product->description = $value['description'];
            $product->category_id = $value['category_id'];
            $arrayProduct[] = $product;
        }
        return $arrayProduct;
    }
}
