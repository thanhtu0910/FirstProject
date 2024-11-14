<?php

class Bookcc
{
    public function listbook()
    {
        $mBook = new Book();
        $listbook = $mBook->getall();
        include_once "views/list.php";
    }
    public function addbook()
    {
        if (isset($_POST['btn_submit'])) {
            $book_name = $_POST['book_name'];
            $author = $_POST['author'];
            $publication_year = $_POST['publication_year'];
            $book_description = $_POST['book_description'];

            $target_dir = "images/";
            $name_img = time() . $_FILES['book_cover_image']['name'];
            $book_cover_image = $target_dir . $name_img;
            move_uploaded_file($_FILES['book_cover_image']['tmp_name'], $book_cover_image);

            $mBook = new Book();
            $addBook = $mBook->insert(null, $book_name, $book_cover_image, $author, $publication_year, $book_description);
            if (!$addBook) {
                header('location:index.php');
            }
        }
        include_once "views/add.php";
    }
    public function editbook()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $mBook = new Book();
            $idBook = $mBook->getid($id);

            if (isset($_POST['btn_submit'])) {
                $book_name = $_POST['book_name'];
                $author = $_POST['author'];
                $publication_year = $_POST['publication_year'];
                $book_description = $_POST['book_description'];

                if ($_FILES['book_cover_image']['name'] != null) {
                    $target_dir = "images/";
                    $name_img = time() . $_FILES['book_cover_image']['name'];
                    $book_cover_image = $target_dir . $name_img;
                    move_uploaded_file($_FILES['book_cover_image']['tmp_name'], $book_cover_image);
                } else {
                    $book_cover_image = $idBook->book_cover_image;
                }
                $editBook = $mBook->update($book_name, $book_cover_image, $author, $publication_year, $book_description, $id);
                if (!$editBook) {
                    header('location:index.php');
                }
            }
        }
        include_once "views/edit.php";
    }
    public function deletebook()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $mBook = new Book();
            $delteBook = $mBook->delete($id);
            if (!$delteBook) {
                header('location:index.php');
            }
        }
    }
    public function register()
    {
        if (isset($_POST['btn_submit'])) {
            $user = $_POST['user'];
            $pass = $_POST['pass'];
            $email = $_POST['email'];

            // echo "<pre>";
            // print_r($_POST);
            // // print_r($_FILES);
            // die;






            $mBook = new Book();
            $addBook = $mBook->register(null, $user, $pass, $email);
            // if (!$addBook) {
            //     header('location:index.php');
            // }
        }
        include_once "views/dangli.php";
    }
    public function login()
    {

        $mBook = new Book();
        $login = $mBook->login();
        include_once "views/binh.php";
    }
    public function dangxuat()
    {
        header('location: views/dangnhap.php');
    }


    public function binh()
    {
        if (isset($_POST['btn_submit'])) {

            $name = $_POST['name'];
            $mota = $_POST['mota'];
            // $img = $_FILES['img'];
            $price = $_POST['price'];

            $target_dir = "images/";
            $name_img = time() . $_FILES['img']['name'];
            $img = $target_dir . $name_img;
            move_uploaded_file($_FILES['img']['tmp_name'], $img);

            // echo "<pre>";
            // print_r($_POST);
            // print_r($_FILES);
            // die;

            // Khởi tạo đối tượng
            $book = new Book();

            $product_id = $book->add($name, $mota);

            if ($product_id) {
                $abook = new Book();
                $ccc = $abook->addvariants($product_id, $img, $price);
            }
        }
        include_once "views/dangli.php";
    }
    public function xem()
    {
        $mBook = new Book();
        $ccc = $mBook->xem();
        include_once "views/xem.php";
    }
}
