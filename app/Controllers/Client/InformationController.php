<?php
class InformationController
{
    // Hiển thị trang đăng nhập
    public function index()
    {
        if(isset($_SESSION['user'])){
            $information = $_SESSION['user'];
        }
        $categories = (new Category)->all();
        $message = session_flash('message');
        return view('Client.information', compact('information', 'categories', 'message')); // Trả về view login với danh mục và thông báo
    }
}