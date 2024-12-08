<?php
class Order
{
    public $pdo; // Biến lưu đối tượng PDO để làm việc với cơ sở dữ liệu

    // Hàm khởi tạo: Kết nối cơ sở dữ liệu thông qua lớp Database
    public function __construct()
    {
        $db = new Database(); // Tạo một đối tượng Database
        $this->pdo = $db->getConnection(); // Lấy kết nối PDO từ lớp Database
    }

    public function all()
    {
        $sql = "SELECT o.*, u.fullname, u.address, u.email, u.phone 
                FROM orders o
                JOIN users u 
                ON o.user_id = u.id 
                ORDER BY o.id DESC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function find($id)
    {
        $sql = "SELECT o.*, u.fullname, u.email, u.address, u.phone, 
                       od.price, od.quantity, p.name, p.image 
                FROM orders o 
                JOIN users u ON o.user_id = u.id 
                JOIN order_details od ON od.order_id = o.id 
                JOIN products p ON od.product_id = p.id 
                WHERE o.id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    public function create($data)
    {
        $sql = "INSERT INTO orders(user_id, status, payment_method, total_price)
                VALUES(:user_id, :status, :payment_method, :total_price)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
        return $this->pdo->lastInsertId();
    }

    public function updateStatus($id, $status)
    {
        $sql = "UPDATE orders SET status = :status WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id, 'status' => $status]);
    }

    public function createOrderDetail($data)
    {
        $sql = "INSERT INTO order_details(order_id, product_id, product_name, price, quantity) 
                VALUES(:order_id, :product_id, :product_name, :price, :quantity)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
    }

    public function allOrderDetail($orderId)
    {
        $sql = "SELECT od.product_id, p.name, od.price, od.quantity 
                FROM order_details od
                JOIN products p ON p.id = od.product_id
                WHERE od.order_id = :order_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':order_id', $orderId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    

    public function updateOrderStatus($orderId, $status)
    {
        $sql = "UPDATE orders SET status = :status WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':status', $status, PDO::PARAM_STR);
        $stmt->bindParam(':id', $orderId, PDO::PARAM_INT);
        $stmt->execute();
    }
    public function getOrdersByUserId($userId) {
        $sql = "SELECT * FROM orders WHERE user_id = :user_id ORDER BY created_at DESC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    

    public function cancelOrder($orderId)
{
    // SQL query để cập nhật trạng thái của đơn hàng thành 'canceled'
    $sql = "UPDATE orders SET status = :status WHERE id = :order_id";
    
    // Chuẩn bị câu lệnh
    $stmt = $this->pdo->prepare($sql);
    
    // Gán giá trị cho các tham số
    $status = 'canceled';
    $stmt->bindParam(':status', $status, PDO::PARAM_STR);
    $stmt->bindParam(':order_id', $orderId, PDO::PARAM_INT);
    
    // Thực thi câu lệnh
    if ($stmt->execute()) {
        return true; // Nếu cập nhật thành công
    } else {
        return false; // Nếu có lỗi
    }
}
}
