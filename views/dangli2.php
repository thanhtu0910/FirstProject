<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đăng ký</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background: #f5f5dc;
      /* Màu nền be nhạt */
      display: flex;
      flex-direction: column;
      align-items: center;
      color: #000;
      /* Màu chữ đen */
    }

    /* Header styles */
    .topbar {
      width: 100%;
      padding: 10px 0;
      background-color: #000;
      /* Màu nền đen */
      color: #fff;
      /* Chữ màu trắng */
      height: 20px;
      border-radius: 15px;
      margin: 0 5px; 
    }



    .topbar a {
      text-decoration: none;
      color: #d2b48c;
      /* Màu be tối */
      margin: 0 5px; 
    }

    .container {
      width: 90%;
      max-width: 1200px;
      margin: 0 auto;
    }

    .top-info,
    .top-link {
      font-size: 14px;
    }

    .d-flex {
      display: flex;
    }

    .justify-content-between {
      justify-content: space-between;
    }

    /* Form container */
    .form-container {
      margin: 30px auto;
      background: #fff;
      /* Màu nền trắng */
      padding: 25px;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 700px;
      box-sizing: border-box;
      margin-top: 120px;
    }

    h2 {
      text-align: center;
      color: #000;
      /* Tiêu đề màu đen */
    }

    .form-group {
      margin-bottom: 15px;
    }

    label {
      display: block;
      font-weight: bold;
      margin-bottom: 5px;
    }

    input {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }

    button {
      width: 100%;
      padding: 10px;
      border: none;
      border-radius: 4px;
      background-color: #000;
      /* Màu nền nút đen */
      color: #fff;
      /* Màu chữ trắng */
      font-size: 16px;
      cursor: pointer;
    }

    button:hover {
      background-color: #333;
      /* Màu nút đen nhạt khi hover */
    }

    .switch {
      text-align: center;
      margin-top: 10px;
    }

    .switch a {
      color: #d2b48c;
      /* Màu liên kết be tối */
      text-decoration: none;
    }

    .switch a:hover {
      text-decoration: underline;
    }

    /* Footer styles */
    .footer-item h4 {
      color: #000;
      /* Tiêu đề footer màu đen */
    }

    .footer-item p,
    .footer-item a {
      color: #000;
      /* Nội dung footer màu đen */
    }

    .footer-item a:hover {
      color: #d2b48c;
      /* Màu be tối khi hover */
    }

    textarea {
    width: 100%;                /* Đảm bảo chiều rộng của textarea là 100% của container */
    height: 150px;              /* Chiều cao của textarea */
    padding: 10px;              /* Khoảng cách giữa văn bản và viền của textarea */
    border: 1px solid #ccc;     /* Đường viền mảnh màu xám */
    border-radius: 5px;         /* Làm tròn các góc của textarea */
    font-size: 14px;            /* Kích thước chữ */
    font-family: Arial, sans-serif; /* Font chữ */
    resize: vertical;           /* Cho phép người dùng thay đổi chiều cao */
    box-sizing: border-box;     /* Đảm bảo padding và border không ảnh hưởng đến kích thước */
}


  </style>
</head>






<body>
  <!-- Header -->
  <div class="container topbar">
    <div class="d-flex justify-content-between">
      <div class="top-info ps-2">
        <small class="me-3"><i class="fas fa-map-marker-alt me-2"></i><a href="#">Cầu Giấy, Hà Nội</a></small>
        <small class="me-3"><i class="fas fa-envelope me-2"></i><a href="#">tuttph49773@gmail.com</a></small>
      </div>
      <div class="top-link pe-2">
        <a href="#"><small class="mx-2">Chính sách bảo mật</small>/</a>
        <a href="#"><small class="mx-2">Điều khoản sử dụng</small>/</a>
        <a href="#"><small class="ms-2">Bán hàng và hoàn tiền</small></a>
      </div>
    </div>
  </div>

  <h1>Clothes</h1>

  <!-- Form Đăng Ký -->
  <div class="form-container">
    <h2>Đăng ký</h2>

    <form action="" method="post" id="register-form">
      <div class="form-group">
        <label for="username">Họ và Tên</label>
        <input type="text" id="username" name="username" placeholder="Nhập tài khoản" required>
      </div>
      <div class="form-group">
        <label for="password">Mật khẩu</label>
        <input type="password" id="password" name="password" placeholder="Nhập mật khẩu" required>
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Nhập email" required>
      </div>
      <div class="form-group">
        <label for="phone">Số điện thoại</label>
        <input type="number" id="phone" name="phone" placeholder="Nhập số điện thoại" required>
      </div>
      <div class="form-group">
        <label for="address">Địa chỉ</label>
        <textarea id="address" name="address" placeholder="Nhập địa chỉ" required></textarea>
      </div>
      <button type="submit" name="btn_submit">Đăng ký</button>
    </form>

    <div class="switch">
      <p>Đã có tài khoản? <a href="dangnhap.php">Đăng nhập</a></p>
    </div>
  </div>
</body>


</html>

<?php
if (isset($_POST['btn_submit'])) {  // Kiểm tra khi người dùng đã nhấn nút submit
    // Lấy dữ liệu từ form và loại bỏ khoảng trắng thừa
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
            $sql2 = "INSERT INTO users(username, password, email, phone, address) 
                    VALUES ('$username', '$hashed_password', '$email', '$phone', '$address')";
            $result = mysqli_query($conn, $sql2);

            if ($result) {
              // Hiển thị thông báo thành công và sau đó chuyển hướng
              echo '<p style="color: green;">Đăng ký thành công</p>';
              // JavaScript tự động chuyển hướng sau khi người dùng nhấn OK
              echo "<script>
                      alert('Đăng ký thành công!');
                      setTimeout(function() {
                          window.location.href = 'list.php';
                      }, 500); // Delay 500ms
                    </script>";
            } else {
              echo "<script>alert('Đăng ký không thành công');</script>";
            }
        }

        // Đóng kết nối
        mysqli_close($conn);
    }
}
?>