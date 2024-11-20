<form action="" method="post">
    <input type="text" name="username" placeholder="Tên tài khoản" required>
    <input type="password" name="password" placeholder="Mật khẩu" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="text" name="phone" placeholder="Số điện thoại" required>
    <textarea name="address" placeholder="Địa chỉ" required></textarea>
    <button type="submit" name="btn_submit">Đăng ký</button>
</form>




<?php
if (isset($_POST['btn_submit'])) {
    $username = isset($_POST['username']) ? trim($_POST['username']) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $phone = isset($_POST['phone']) ? trim($_POST['phone']) : '';
    $address = isset($_POST['address']) ? trim($_POST['address']) : '';

    // Kiểm tra dữ liệu đầu vào
    if (empty($username) || empty($password) || empty($email) || empty($phone) || empty($address)) {
        echo '<p style="color: red;">Vui lòng không để trống</p>';
    } elseif (strlen($username) < 6 || strlen($password) < 6) {
        echo '<p style="color: red;">Vui lòng nhập nhiều hơn 6 ký tự</p>';
    } else {
        // Kết nối cơ sở dữ liệu
        $conn = mysqli_connect("127.0.0.1", "root", "", "duan1");
        if (!$conn) {
            die('<p style="color: red;">Kết nối CSDL thất bại</p>');
        }

        // Kiểm tra tài khoản hoặc email đã tồn tại
        $username = mysqli_real_escape_string($conn, $username);
        $email = mysqli_real_escape_string($conn, $email);
        $sql = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";
        $query = mysqli_query($conn, $sql);

        if (mysqli_num_rows($query) > 0) {
            echo '<p style="color: red;">Tài khoản hoặc email đã tồn tại</p>';
        } else {
            // Mã hóa mật khẩu và thêm tài khoản
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $sql2 = "INSERT INTO users(username, password, email, phone, address) VALUES ('$username', '$hashed_password', '$email', '$phone', '$address')";
            $result = mysqli_query($conn, $sql2);

            if ($result) {
                // Hiển thị thông báo thành công và sau đó chuyển hướng
                echo '<p style="color: green;">Đăng ký thành công</p>';
                // JavaScript tự động chuyển hướng sau khi người dùng nhấn OK
                echo "<script>
                        alert('Đăng ký thành công!');
                        setTimeout(function() {
                            window.location.href = 'list.php'; // Chuyển hướng đến trang list.php
                        }, 500); // Delay 500ms
                      </script>";
            } else {
                echo '<p style="color: red;">Đăng ký thất bại</p>';
            }
        }

        // Đóng kết nối
        mysqli_close($conn);
    }
}
?>


