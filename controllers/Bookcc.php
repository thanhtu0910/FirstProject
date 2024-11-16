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

}
