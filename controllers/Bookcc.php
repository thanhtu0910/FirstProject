<?php

class Bookcc
{
    public function danhmuc(){
        $mDm = new Book();
        $danhmuc = $mDm->getDM();
        include_once "views/danhmuc.php";
    }
    public function shophtml(){
        $mBook = new Book();
        $shophtml = $mBook->getDM();
        require_once "views/fruitables/shop.php";
    }
    public function listbook()
    {
        $mBook = new Book();
        $listbook = $mBook->getall();
        include_once "views/list.php";
        // include_once "fruitables/shop.php";
    }

    public function listuser()
    {
        $mBook = new Book();
        $login = $mBook->login();
        include_once "views/user.php";
    }

    public function deletebook()
    {
        if (isset($_GET['id'])) {
            // $product_id = $_GET['product_id'];
            // $variant_id = $_GET['variant_id'];
            $product_id = $_GET['id'];
            $variant_id = $_GET['vid'];
            $mBook = new Book();
            $delteBook = $mBook->deletev($variant_id);
            $delteBook = $mBook->delete($product_id);

            if (!$delteBook) {
                header('location:index.php');
            }
        }
    }


    public function register()
    {
        if (isset($_POST['btn_submit'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];


            // echo "<pre>";
            // print_r($_POST);
            // print_r($_FILES);
            // die;

            $mBook = new Book();
            $addBook = $mBook->register(
                null,
                $username,
                $password,
                $email,
                $phone,
                $address,
                $role
            );
            if (!$addBook) {
                header('location:?act=dangnhap');
            }
        }
        include_once "views/dangli.php";
    }
    public function login()
    {
        $mBook = new Book();
        $login = $mBook->login();

        if (!$login) {
            header('location:index.php');
        }
        include_once "views/dangnhap.php";
    }
    public function dangxuat()
    {
        session_start();

        if (isset($_SESSION["user"])) {
            unset($_SESSION["user"]);
        }
        header('location: ?act=login');
    }


    public function binh()
    {
        if (isset($_POST['btn_submit'])) {
            // Dữ liệu sản phẩm chính
            $name = $_POST['name'];
            $description = $_POST['description'];
            $category_id = $_POST['category_id'];

            // Khởi tạo đối tượng
            $book = new Book();

            // Thêm sản phẩm chính vào bảng `products` và lấy `product_id` vừa tạo
            $product_id = $book->add($name, $description, $category_id);

            // Nếu thêm sản phẩm thành công
            if ($product_id) {
                // Dữ liệu các biến thể
                $variants = [];
                if (isset($_POST['variant']) && is_array($_POST['variant'])) {
                    foreach ($_POST['variant'] as $key => $variant) {
                        // Xử lý upload ảnh cho từng biến thể
                        $target_dir = "images/";
                        $name_img = time() . '_' . $_FILES['variant']['name'][$key]['product_img'];
                        $product_img = $target_dir . $name_img;

                        move_uploaded_file(
                            $_FILES['variant']['tmp_name'][$key]['product_img'],
                            $product_img
                        );

                        // Thêm biến thể vào mảng
                        $variants[] = [
                            'price' => $variant['price'],
                            'stock_quantity' => $variant['stock_quantity'],
                            'product_img' => $product_img
                        ];
                    }
                }

                // Gọi hàm thêm biến thể
                $book->addvariants($product_id, $variants);

                // Chuyển hướng sau khi thêm thành công
                header('Location: index.php');
                exit;
            }
        }

        // Lấy danh mục sản phẩm
        $mBook = new Book();
        $ccc = $mBook->categories();

        // Gọi giao diện
        include_once "views/binh.php";
    }
    public function addDM(){
        if(isset($_POST['btn_submit'])){
            $name = $_POST['name'];
          
            $mBook = new Book();
            $addDM = $mBook->addDM(null, $name);
            header('Location: index.php?act=danhmuc');
            exit();
        }
        include_once "views/add-category.php";
    }
    public function editDM() {
        if (isset($_GET['category_id'])) {
            $mBook = new Book();
            
            // Lấy thông tin danh mục theo category_id
            $category = $mBook->getIdDM($_GET['category_id']);
            
            if (!$category) {
                echo "Danh mục không tồn tại!";
                exit();
            }
    
            // Xử lý form submit
            if (isset($_POST['submit'])) {
                $name = $_POST['name'] ?? '';
    
                // Kiểm tra nếu `name` không được nhập
                if (empty($name)) {
                    $error = "Tên danh mục không được để trống!";
                } else {
                    // Thực hiện cập nhật danh mục
                    $editDM = $mBook->editDM($name, $_GET['category_id']);
                    if ($editDM) {
                        // Chuyển hướng nếu cập nhật thành công
                        header('Location: index.php?act=danhmuc');
                        exit();
                    } else {
                        $error = "Cập nhật danh mục thất bại!";
                    }
                }
            }
    
            // Hiển thị view với thông tin danh mục
            include_once 'views/edit-category.php';
        } else {
            echo "Thiếu ID danh mục để chỉnh sửa!";
            exit();
        }
    }
    
    public function deleteDM() {
        if (isset($_GET['category_id'])) {
            $category_id = $_GET['category_id'];
            $mBook = new Book();
    
            // Gọi hàm xóa danh mục
            $result = $mBook->deleteDM($category_id);
    
            // Kiểm tra kết quả và chuyển hướng
            if ($result) {
                header('Location: index.php?act=danhmuc'); // Thành công, quay về danh sách
                exit(); // Đảm bảo dừng thực thi
            } else {
                echo "Lỗi: Không thể xóa danh mục. Vui lòng thử lại!";
            }
        } else {
            echo "Lỗi: Không tìm thấy ID danh mục.";
        }
    }
    
    
    


    public function editbook()
    {
        // Lấy product_id và variant_id từ URL
        $product_id = $_GET['id'];
        $variant_id = $_GET['vid'];

        // Lấy thông tin sản phẩm và biến thể từ CSDL
        $mBook = new Book();
        $idBook = $mBook->getid($product_id); // Lấy thông tin sản phẩm
        $iddBook = $mBook->getvid($variant_id); // Lấy thông tin biến thể
        $ccc = $mBook->categories(); // Lấy danh sách danh mục

        // Kiểm tra xem thông tin sản phẩm và biến thể có hợp lệ không
        if (!$idBook || !$iddBook) {
            echo "Không tìm thấy sản phẩm hoặc biến thể với ID: $product_id và $variant_id.";
            return; // Dừng thực thi nếu không có thông tin hợp lệ
        }

        if (isset($_POST['btn_submit'])) {
            // Lấy thông tin từ form
            $name = $_POST['name'];
            $description = $_POST['description'];
            $category_id = $_POST['category_id'];
            $price = $_POST['price'];
            $stock_quantity = $_POST['stock_quantity'];

            // Kiểm tra và xử lý ảnh sản phẩm
            $product_img = $iddBook->product_img; // Giữ lại ảnh cũ nếu không có ảnh mới

            if ($_FILES['product_img']['name'] != '') {
                $target_dir = "images/";
                $name_img = time() . '_' . basename($_FILES['product_img']['name']);
                $product_img = $target_dir . $name_img;

                // Kiểm tra loại file trước khi tải lên
                $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
                if (in_array($_FILES['product_img']['type'], $allowed_types)) {
                    move_uploaded_file($_FILES['product_img']['tmp_name'], $product_img);
                } else {
                    echo "Chỉ chấp nhận các định dạng ảnh JPEG, PNG, GIF.";
                    exit;
                }
            }

            // Gọi hàm updatevariants để cập nhật bảng product_variants
            $updateVariant = $mBook->updatevariants(
                $variant_id,
                $product_id,
                $price,
                $stock_quantity,
                $product_img
            );

            // Gọi hàm updateProductByVariant để cập nhật bảng products
            $updateProduct = $mBook->update(
                $variant_id,
                $name,
                $description,
                $category_id
            );

            // Không kiểm tra kết quả cập nhật, trực tiếp chuyển hướng sau khi lưu
            header('Location: index.php');
            exit;
        }

        // Kiểm tra xem dữ liệu có hợp lệ trước khi truyền vào view
        if (isset($idBook) && isset($iddBook) && isset($ccc)) {
            $data = [
                'idBook' => $idBook,       // Thông tin sản phẩm
                'iddBook' => $iddBook,     // Thông tin biến thể
                'categories' => $ccc       // Danh sách danh mục
            ];
            extract($data); // Tách biến để sử dụng trực tiếp trong view
            include_once "views/edit.php";
        }
    }

    public function binhluan()
    {
        // Kiểm tra dữ liệu từ form và session
        if (!isset($_POST['product_id'], $_POST['comment_text'], $_POST['rating'], $_SESSION['user_id'])) {
            echo "Dữ liệu không hợp lệ hoặc bạn chưa đăng nhập!";
            return;
        }

        $mBook = new Book();

        // Nhận dữ liệu từ form
        $product_id = (int)$_POST['product_id']; // ID sản phẩm
        $comment_text = trim($_POST['comment_text']); // Nội dung bình luận
        $rating = (int)$_POST['rating']; // Đánh giá (rating)
        $user_id = (int)$_SESSION['user_id']; // Lấy user_id từ session (người dùng đã đăng nhập)

        // Kiểm tra dữ liệu đầu vào
        if (empty($comment_text) || strlen($comment_text) < 3) {
            echo "Bình luận phải có ít nhất 3 ký tự!";
            return;
        }
        if ($rating <= 0 || $rating > 5) {
            echo "Vui lòng nhập đánh giá hợp lệ (1 đến 5 sao)!";
            return;
        }

        // Thêm bình luận vào CSDL
        if ($mBook->addReview($product_id, $user_id, $rating, $comment_text)) {
            header("Location: product.php?id=$product_id"); // Chuyển hướng về trang chi tiết sản phẩm
            exit();
        } else {
            error_log("Lỗi khi thêm bình luận: product_id=$product_id, user_id=$user_id, rating=$rating");
            echo "Lỗi khi thêm bình luận!";
        }
        include_once "views/binhluan.php";
    }
}
