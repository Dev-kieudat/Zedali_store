<?php
class Product
{
    public $pdo; // Đối tượng PDO để tương tác với cơ sở dữ liệu

    // Hàm khởi tạo: Kết nối cơ sở dữ liệu
    public function __construct()
    {
        $db = new Database(); // Giả sử có lớp Database để lấy kết nối
        $this->pdo = $db->getConnection(); // Lấy đối tượng PDO
    }

    // Lấy tất cả sản phẩm cùng với tên danh mục
    public function all()
    {
        $sql = "SELECT p.*, cate_name 
                FROM products p 
                JOIN categories c ON p.category_id = c.id"; // Kết hợp bảng `products` và `categories`
        $stmt = $this->pdo->prepare($sql); // Chuẩn bị câu lệnh SQL
        $stmt->execute(); // Thực thi câu lệnh
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Trả về tất cả dữ liệu dưới dạng mảng kết hợp
    }

    // Lấy danh sách sản phẩm thuộc một danh mục cụ thể
    public function ProductInCategory($id)
    {
        $sql = "SELECT p.*, cate_name 
                FROM products p 
                JOIN categories c ON p.category_id = c.id 
                WHERE c.id = :id"; // Lọc sản phẩm theo ID danh mục
        $stmt = $this->pdo->prepare($sql); // Chuẩn bị câu lệnh SQL
        $stmt->execute(['id' => $id]); // Thực thi với tham số ID danh mục
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Trả về danh sách sản phẩm
    }

    public function create($data)
    {
        $sql = "INSERT INTO products 
                    (name, image, price, description, content, type, category_id) 
                VALUES 
                    (:name, :image, :price, :description, :content, :type, :category_id)";  // Đảm bảo trường hợp này khớp với form

        // Chuẩn bị câu lệnh SQL
        $stmt = $this->pdo->prepare($sql);

        // Gán giá trị từ mảng dữ liệu vào câu lệnh SQL
        $executeData = [
            ':name' => $data['name'],
            ':image' => $data['image'],
            ':price' => $data['price'],
            ':description' => $data['description'],
            ':content' => $data['content'],
            ':type' => $data['type'],  // Bạn đã truyền 'type' từ form
            ':category_id' => $data['id_cate']  // Sử dụng 'id_cate' từ form
        ];

        return $stmt->execute($executeData); // Thực thi câu lệnh với dữ liệu
    }


    // Tìm một sản phẩm theo ID
    public function find($id)
    {
        $sql = "SELECT p.*, cate_name 
                FROM products p 
                JOIN categories c ON p.category_id = c.id 
                WHERE p.id = :id"; // Tìm sản phẩm theo ID
        $stmt = $this->pdo->prepare($sql); // Chuẩn bị câu lệnh SQL
        $stmt->execute(['id' => $id]); // Thực thi với tham số ID sản phẩm
        return $stmt->fetch(PDO::FETCH_ASSOC); // Trả về sản phẩm dưới dạng mảng kết hợp
    }

    // Cập nhật thông tin sản phẩm
    public function update($id, $data)
    {
        // Kiểm tra sự tồn tại của tham số cần thiết trong $data
        if (!isset($data['name'], $data['image'], $data['price'], $data['description'], $data['content'], $data['type'], $data['status'], $data['category_id'])) {
            throw new Exception("Thiếu thông tin cần thiết để cập nhật.");
        }

        // Câu lệnh SQL để cập nhật thông tin sản phẩm
        $sql = "UPDATE products 
            SET name = :name, 
                image = :image, 
                price = :price, 
                description = :description, 
                content = :content, 
                type = :type, 
                status = :status, 
                category_id = :category_id 
            WHERE id = :id";

        // Chuẩn bị câu lệnh SQL
        $stmt = $this->pdo->prepare($sql);

        // Liên kết các tham số với các biến tương ứng
        $stmt->bindParam(':name', $data['name']);
        $stmt->bindParam(':image', $data['image']);
        $stmt->bindParam(':price', $data['price']);
        $stmt->bindParam(':description', $data['description']);
        $stmt->bindParam(':content', $data['content']);
        $stmt->bindParam(':type', $data['type']);
        $stmt->bindParam(':status', $data['status']);
        $stmt->bindParam(':category_id', $data['category_id']);
        $stmt->bindParam(':id', $id);

        // Thực thi câu lệnh SQL và kiểm tra kết quả
        if ($stmt->execute()) {
            return true; // Cập nhật thành công
        }
    }



    // Xóa một sản phẩm theo ID
    public function delete($id)
    {
        $sql = "DELETE FROM products WHERE id = :id"; // Xóa sản phẩm theo ID
        $stmt = $this->pdo->prepare($sql); // Chuẩn bị câu lệnh SQL
        return $stmt->execute(['id' => $id]); // Thực thi với tham số ID sản phẩm
    }
    
    // Phương thức tăng số lượng view của một sản phẩm
    public function incrementView($id)
    {
        $sql = "UPDATE products SET views = views + 1 WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function topSell(){
        $sql = "SELECT * FROM products ORDER BY view DESC LIMIT 4";

        // Chuẩn bị câu lệnh
        $stmt = $this->pdo->prepare($sql);

        // Thực thi câu lệnh
        $stmt->execute();

        // Lấy dữ liệu và trả về
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function updateView($id) {
        try {
            // Tạo câu lệnh SQL để cập nhật số lượt xem
            $sql = "UPDATE products SET view = view + 1 WHERE id = :id";
            
            // Chuẩn bị truy vấn
            $stmt = $this->pdo->prepare($sql);
    
            // Gán giá trị cho tham số
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    
            // Thực thi truy vấn
            $stmt->execute();
    
            // Kiểm tra kết quả
            if ($stmt->rowCount() > 0) {
                return true; // Thành công
            } else {
                return false; // Không tìm thấy sản phẩm hoặc không cập nhật được
            }
        } catch (PDOException $e) {
            // Xử lý lỗi
            error_log("Error updating product view: " . $e->getMessage());
            return false;
        }
    }
}
