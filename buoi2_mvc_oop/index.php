<?php
session_start();
// Đây là file chạy chính (Là nơi chúng require các file)
require_once "./env.php";    // Chứa các biến môi trường
require_once "./common/connect.php";   // Chứa các hàm dùng chung

// require các controller mà route trỏ tới
require_once './app/Controllers/HomeController.php';
// require Các model mà controller muốn sử dụng
require_once './app/Models/HomeModels.php';

// Route (Điều hướng)
$act = $_GET['act'] ?? '/';

match ($act) {
    // Nơi khai báo các đường dẫn
    '/' => (new HomeController())->index(),
    'update' => (new HomeController())->update($_GET['id'] ?? 0),
    'delete' => (new HomeController())->delete($_GET['id'] ?? 0),
    'create' => (new HomeController())->create(),
    // Khai báo route
};
