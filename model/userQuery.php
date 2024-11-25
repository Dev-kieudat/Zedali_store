<?php
class userQuery
{
    private $pdo;
    public function __construct()
    {
        $db = new Database();
        $this->pdo = $db->getConnection();
    }

    public function register(Users $user)
    {
        $sql = "INSERT INTO users(username,email,phone,password) VALUES('$user->username','$user->email','$user->phone','$user->password')";
        $data = $this->pdo->exec($sql);
        if ($data === 1) {
            return "success";
        }
    }
    public function checkUser($email)
    {
        $sql = "SELECT COUNT(*) FROM users WHERE email = :email";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $count = $stmt->fetchColumn();
        return $count > 0;
    }
    public function all_user(){
        $sql = "SELECT * FROM users";
        $data = $this->pdo->query($sql)->fetchAll();

        $arrayUser=[];
        foreach($data as $value){
            $user = new Users();
            $user->user_id = $value['user_id'];
            $user->username = $value['username'];
            $user->email = $value['email'];
            $user->phone = $value['phone'];
            $user->password = $value['password'];
            $user->created_at = $value['created_at'];
            $user->role = $value['role'];
            $user->status = $value['status'];
            $arrayUser[]=$user;
        }
        return $arrayUser;
    }
    public function delete_user($id){
        $sql = "DELETE FROM users WHERE user_id = $id";
        $data = $this->pdo->exec($sql);
        if ($data == 1) {
            return "success";
        }
    }
    public function update_user(Users $user)
    {
        $sql = "UPDATE users SET username=:username, email=:email, phone=:phone, password=:password, role=:role, status=:status WHERE user_id=:user_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':username', $user->username);
        $stmt->bindParam(':email', $user->email);
        $stmt->bindParam(':phone', $user->phone);
        $stmt->bindParam(':password', $user->password);
        $stmt->bindParam(':role', $user->role);
        $stmt->bindParam(':status', $user->status);
        $stmt->bindParam(':user_id', $user->user_id);
    
        $stmt->execute();
        return $stmt->rowCount() > 0 ? "success" : "error";
    }
    
    public function one_user($id)
    {
        $sql = "SELECT * FROM users WHERE user_id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    
        return $stmt->fetch(PDO::FETCH_OBJ);
    }
    
    public function login($email, $password) {
        $sql = "SELECT * FROM users WHERE email = ? AND password = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$email, $password]);
        return $stmt->fetch();
    }
}