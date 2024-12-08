<?php
class OrdersController
{
    public function index(){
        $userId = $_SESSION['user']['id']; // Lấy ID người dùng từ session
         $order = (new Order)->getOrdersByUserId($userId);
        $categories = (new Category)->all();
        $orders = (new Order)->all();
        // Lấy chi tiết từng đơn hàng và thêm vào mảng orders
        foreach ($orders as &$order) {
            $order['details'] = (new Order)->allOrderDetail($order['id']);
        }

        return view('Client.Orders', compact('categories', 'orders', 'order'));
    }

    public function cancel($orderId) {
        // Kiểm tra quyền truy cập (nếu cần, kiểm tra người dùng đã đăng nhập hay chưa)
        if (!isset($_SESSION['user'])) {
            header('Location: login.php');
            exit;
        }

        // Kiểm tra xem đơn hàng có tồn tại không và người dùng có quyền hủy đơn hàng không
        $orderModel = new Order();
        $order = $orderModel->find($orderId);

        if ($order) {
            // Kiểm tra nếu đơn hàng thuộc về người dùng hiện tại
            if ($order['user_id'] == $_SESSION['user']['id']) {
                // Cập nhật trạng thái đơn hàng thành 'canceled'
                $orderModel->updateStatus($orderId, 'canceled');
                $_SESSION['message'] = 'Đơn hàng đã được hủy thành công.';
            } else {
                $_SESSION['message'] = 'Bạn không có quyền hủy đơn hàng này.';
            }
        } else {
            $_SESSION['message'] = 'Đơn hàng không tồn tại.';
        }

        // Chuyển hướng về trang danh sách đơn hàng
        header('Location: index.php?act=Order');
        exit;
    }
}
?>
