<form action="" method="post">

    <input type="text" name="user">
    <input type="password" name="pass">
    <button type="submit" name="btn_submit">Đăng nhập</button>

</form>


<?php
session_start();

if (isset($_POST["btn_submit"])) {
    $user = $_POST["user"];
    $pass = $_POST["pass"];

    $isLoginSuccessful = false; // Biến cờ để kiểm tra đăng nhập thành công

    foreach ($login as $value) {
        if ($user == $value->user && $pass == $value->pass) {
            $isLoginSuccessful = true;
            break; // Thoát khỏi vòng lặp khi đăng nhập thành công
        }
    }

    // Kiểm tra biến cờ sau vòng lặp
    if ($isLoginSuccessful) {
        echo "Đăng nhập thành công!";
        $_SESSION["user"] = $user;
        include_once "views/da.php";
    } else {
        echo "Tài khoản hoặc mật khẩu của bạn sai!";
    }
    if (isset($_SESSION["user"])) {
        unset($_SESSION["user"]);
    }
}
