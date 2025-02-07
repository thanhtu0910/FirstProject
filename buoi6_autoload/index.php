<?php
// khi sử dụng autoload ta se ko cần phải require các files model và controller nữa
require "vendor/autoload.php";

use App\Controllers\UserController;

// Route (Điều hướng)
$act = $_GET['act'] ?? '/';

match ($act) {
    // Nơi khai báo các đường dẫn
    '/' => (new HomeController())->index(),
    // Khai báo route
    'user' => (new UserController())->index(),
};
