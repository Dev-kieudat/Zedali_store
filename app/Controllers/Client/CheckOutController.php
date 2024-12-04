<?php
class CheckOutController
{
    public function index()
    {      
        if(!isset($_SESSION['user'])){
            return header("location: index.php?act=Login");
        }

        $user = $_SESSION['user'];
        $carts = $_SESSION['cart'] ?? [];
        $sumPrice = (new CartController)->sumPrice();

        $categories = (new Category)->all();
        return view('Client.checkOut', compact('categories', 'user', 'carts', 'sumPrice'));
    }

    public function checkOut()
{
    $user = [
        'id' => $_POST['id'],
        'fullname' => $_POST['fullname'],
        'phone' => $_POST['phone'],
        'email' => $_POST['email'],
        'address' => $_POST['address'],
        'role' => $_SESSION['user']['role'],
        'status' => $_SESSION['user']['status'],
    ];
    $sumPrice = (new CartController)->sumPrice();
    $order = [
        'user_id' => $_POST['id'],
        'status' => 'pending',
        'payment_method' => $_POST['payment_method'],
        'total_price' => $sumPrice,
    ];

    // Cập nhật thông tin người dùng
    (new Account)->update($user['id'], $user);

    // Tạo đơn hàng
    $orderId = (new Order)->create($order);

    // Xử lý chi tiết đơn hàng
    $carts = $_SESSION['cart'];
    foreach ($carts as $id => $cart) {
        $orderDetailData = [
            'order_id' => $orderId,
            'product_id' => $id,
            'price' => $cart['price'],
            'quantity' => $cart['quantity'],
        ];
        (new Order)->createOrderDetail($orderDetailData);
    }
    $this->clearCart();
    $_SESSION['message'] = "alert('Đặt hàng thành công!');";
    header("location: index.php?act=");
}

public function clearCart(){
    unset($_SESSION['cart']);
    unset($_SESSION['totalQuantity']);
}

}