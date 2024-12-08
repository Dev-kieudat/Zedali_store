<?php
class Account
{
    public $pdo; // Biến lưu đối tượng PDO để làm việc với cơ sở dữ liệu

    // Hàm khởi tạo: Kết nối cơ sở dữ liệu thông qua lớp Database
    public function __construct()
    {
        $db = new Database(); // Tạo một đối tượng Database
        $this->pdo = $db->getConnection(); // Lấy kết nối PDO từ lớp Database
    }

    // Lấy tất cả bản ghi từ bảng users
    public function all()
    {
        $sql = "SELECT * FROM users";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    // Kiểm tra email đã tồn tại trong cơ sở dữ liệu chưa
    public function checkEmailExist($email)
    {
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['email' => $email]);
        return $stmt->fetch(PDO::FETCH_ASSOC); // Nếu có kết quả, nghĩa là email đã tồn tại
    }

    // Thêm một bản ghi mới vào bảng users
    public function insert($data)
    {
        $sql = "INSERT INTO users (fullname, email, password, phone, role, address, status, created_at, updated_at) 
                VALUES (:fullname, :email, :password, :phone, :role, :address, :status, :created_at, :updated_at)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'fullname' => $data['fullname'],
            'email' => $data['email'],
            'password' => password_hash($data['password'], PASSWORD_DEFAULT), // Hash mật khẩu
            'phone' => $data['phone'],
            'role' => $data['role'],
            'address' => $data['address'],
            'status' => $data['status'],
            'created_at' => $data['created_at'],
            'updated_at' => $data['updated_at']
        ]);
    }

    // Tìm một bản ghi theo ID
    public function find($id)
    {
        $sql = "SELECT * FROM users WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);  // Đóng ngoặc ở đây
    }

    // Xóa một bản ghi theo ID
    public function delete($id)
    {
        $sql = "DELETE FROM users WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
    }

    // Kiểm tra thông tin đăng nhập của người dùng
    public function checkUser($email, $password)
    {
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Kiểm tra mật khẩu
        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }

    // Cập nhật một bản ghi
    public function update($id, $data)
    {
        // Nếu không có mật khẩu mới, giữ mật khẩu cũ
        if (empty($data['password'])) {
            unset($data['password']); // Không truyền mật khẩu nếu không thay đổi
        } else {
            // Mã hóa mật khẩu mới
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        }

        // Kiểm tra xem tất cả các trường bắt buộc có tồn tại trong $data hay không
        if (!isset($data['email'], $data['fullname'], $data['phone'], $data['role'], $data['status'])) {
            throw new Exception("Thiếu thông tin bắt buộc.");
        }

        // Chuẩn bị câu lệnh SQL để cập nhật thông tin người dùng
        $sql = "UPDATE users SET 
                    email = :email, 
                    fullname = :fullname, 
                    phone = :phone, 
                    role = :role,
                    address = :address, 
                    status = :status"
            . (isset($data['password']) ? ", password = :password" : "") .
            " WHERE id = :id";

        // Chuẩn bị câu lệnh SQL
        $stmt = $this->pdo->prepare($sql);

        // Liên kết các tham số với các giá trị tương ứng
        $stmt->bindValue(':email', $data['email']);  // Chắc chắn đúng tên trường
        $stmt->bindValue(':fullname', $data['fullname']);  // Chắc chắn đúng tên trường
        $stmt->bindValue(':phone', $data['phone']);
        $stmt->bindValue(':address', $data['address']);
        $stmt->bindValue(':role', $data['role']);
        $stmt->bindValue(':status', $data['status']);

        // Liên kết mật khẩu (nếu có thay đổi)
        if (isset($data['password'])) {
            $stmt->bindValue(':password', $data['password']);
        }

        // Liên kết ID người dùng cần cập nhật
        $stmt->bindValue(':id', $id);

        // Thực thi câu lệnh SQL và kiểm tra lỗi
        if ($stmt->execute()) {
            return true;
        } else {
            // In ra lỗi nếu có
            var_dump($stmt->errorInfo());  // Thêm dòng này để in thông tin lỗi
            return false;
        }
    }




    public function getUserByEmail($email)
    {
        try {
            $sql = "SELECT * FROM users WHERE email = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$email]);

            // Kiểm tra xem người dùng có tồn tại trong CSDL hay không
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            return $user ? $user : null; // Nếu không tìm thấy, trả về null
        } catch (PDOException $e) {
            // Nếu có lỗi khi truy vấn CSDL, in ra lỗi
            error_log("Database error: " . $e->getMessage());
            return null;
        }
    }

    // Phương thức đăng nhập
    public function login($email, $password)
    {
        // Lấy thông tin người dùng từ CSDL qua email
        $user = $this->getUserByEmail($email);

        // Kiểm tra nếu người dùng tồn tại
        if ($user) {
            // Nếu mật khẩu khớp, trả về thông tin người dùng
            if (password_verify($password, $user['password'])) {
                return $user;  // Mật khẩu đúng, trả về thông tin người dùng
            } else {
                // Nếu mật khẩu sai
                return null;  // Mật khẩu không đúng, trả về null
            }
        } else {
            // Nếu không tìm thấy người dùng với email này
            return null;  // Trả về null nếu không tìm thấy người dùng
        }
    }

    public function getUserByName($name)
    {
        $sql = "SELECT * FROM users WHERE fullname = :name LIMIT 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['name' => $name]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
