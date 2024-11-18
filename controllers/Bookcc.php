<?php

class Bookcc
{
    public function listbook()
    {
        $mBook = new Book();
        $listbook = $mBook->getall();
        include_once "views/list.php";
    }
    // public function addbook()
    // {
    //     if (isset($_POST['btn_submit'])) {
    //         $book_name = $_POST['book_name'];
    //         $author = $_POST['author'];
    //         $publication_year = $_POST['publication_year'];
    //         $book_description = $_POST['book_description'];

    //         $target_dir = "images/";
    //         $name_img = time() . $_FILES['book_cover_image']['name'];
    //         $book_cover_image = $target_dir . $name_img;
    //         move_uploaded_file($_FILES['book_cover_image']['tmp_name'], $book_cover_image);

    //         $mBook = new Book();
    //         $addBook = $mBook->insert(null, $book_name, $book_cover_image, $author, $publication_year, $book_description);
    //         if (!$addBook) {
    //             header('location:index.php');
    //         }
    //     }
    //     include_once "views/add.php";
    // }

    public function deletebook()
    {
        if (isset($_GET['id'])) {
            $product_id = $_GET['product_id'];
            $mBook = new Book();
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
            $address = $_POST['address'];
            $role = $_POST['role'];

            // echo "<pre>";
            // print_r($_POST);
            // // print_r($_FILES);
            // die;

            $mBook = new Book();
            $addBook = $mBook->register(null, $username,
            $password, $email, $phone, $address, $role);
            if (!$addBook) {
                header('location:index.php');
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
        header('location: views/dangnhap.php');
    }


    public function binh()
    {
        if (isset($_POST['btn_submit'])) {

            $name = $_POST['name'];
            $description = $_POST['description'];

            $category_id = $_POST['category_id'];
            $price = $_POST['price'];
            $stock_quantity = $_POST['stock_quantity'];

            $target_dir = "images/";
            $name_img = time() . $_FILES['product_img']['name'];
            $product_img = $target_dir . $name_img;
            move_uploaded_file($_FILES['product_img']['tmp_name'], $product_img);

            // echo "<pre>";
            // print_r($_POST);
            // print_r($_FILES);
            // die;

            // Khởi tạo đối tượng
            $book = new Book();

            $product_id = $book->add($name, $description, $category_id);

            if ($product_id) {
                $abook = new Book();
                $ccc = $abook->addvariants($product_id, $price, $stock_quantity, $product_img);
                header('Location: index.php'); // Sau khi cập nhật, chuyển hướng về trang chủ

            }
        }
        $mBook = new Book();
        $ccc = $mBook->categories();
        include_once "views/binh.php";
        // include_once "views/edit.php";
    }

    public function editbook()
    {
        if (isset($_GET['id']) && isset($_GET['vid'])) {
            // Lấy product_id và variant_id từ URL
            $product_id = $_GET['id'];
            $variant_id = $_GET['vid'];

            // Lấy thông tin sản phẩm và biến thể từ CSDL
            $mBook = new Book();
            $idBook = $mBook->getid($product_id); // Lấy thông tin sản phẩm
            $iddBook = $mBook->getvid($variant_id); // Lấy thông tin biến thể

            // Lấy danh sách các danh mục
            $ccc = $mBook->categories();

            if (isset($_POST['btn_submit'])) {
                // Lấy thông tin từ form
                $name = $_POST['name'];
                $description = $_POST['description'];
                $category_id = $_POST['category_id'];
                $price = $_POST['price'];
                $stock_quantity = $_POST['stock_quantity'];

                // Xử lý ảnh sản phẩm
                if ($_FILES['product_img']['name'] != null) {
                    $target_dir = "images/";
                    $name_img = time() . $_FILES['product_img']['name'];
                    $product_img = $target_dir . $name_img;
                    move_uploaded_file($_FILES['product_img']['tmp_name'], $product_img);
                } else {
                    // Nếu không có ảnh mới, giữ lại ảnh cũ
                    $product_img = $iddBook->product_img;
                }

                // Gọi hàm update cho cả bảng products và product_variants
                $editBook = $mBook->update(
                    $name,
                    $description,
                    $category_id,
                    $price,
                    $stock_quantity,
                    $product_img,
                    $product_id,
                    $variant_id
                );

                // Kiểm tra nếu cập nhật thành công
                if ($editBook) {
                    header('Location: index.php'); // Sau khi cập nhật, chuyển hướng về trang chủ
                    exit;
                } else {
                    echo "Có lỗi xảy ra khi cập nhật sản phẩm!";
                }
            }
        } else {
            echo "Sản phẩm hoặc biến thể không hợp lệ.";
        }

        // Hiển thị form sửa sản phẩm
        include_once "views/edit.php";
    }

    public function binhluan() {
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
