<?php
require "models/ConnectDatabase.php";
class Book
{
    public $connect;
    public function __construct()
    {
        $this->connect = new ConnectDatabase();
    }
    public function getall()
    {
        $sql = "SELECT * FROM `books`";
        $this->connect->setQuery($sql);
        return $this->connect->loadData();
    }
    public function insert($id, $book_name, $book_cover_image, $author, $publication_year, $book_description)
    {
        $sql = "INSERT INTO `books` VALUES (?,?,?,?,?,?)";
        $this->connect->setQuery($sql);
        return $this->connect->loadData([$id, $book_name, $book_cover_image, $author, $publication_year, $book_description]);
    }
    public function getid($id)
    {
        $sql = "SELECT * FROM `books` WHERE id=?";
        $this->connect->setQuery($sql);
        return $this->connect->loadData([$id], false);
    }
    public function update($book_name, $book_cover_image, $author, $publication_year, $book_description, $id)
    {
        $sql = "UPDATE `books` SET `book_name`=?,`book_cover_image`=?,`author`=?,`publication_year`=?,`book_description`=? WHERE `id`=?";
        $this->connect->setQuery($sql);
        return $this->connect->loadData([$book_name, $book_cover_image, $author, $publication_year, $book_description, $id], false);
    }
    public function delete($id)
    {
        $sql = "DELETE FROM `books` WHERE id=?";
        $this->connect->setQuery($sql);
        return $this->connect->loadData([$id], false);
    }
    public function register($user_id, $user, $pass, $email)
    {
        $sql = "INSERT INTO `users` VALUES (?,?,?,?)";
        $this->connect->setQuery($sql);
        return $this->connect->loadData([$user_id, $user, $pass, $email]);
    }
    public function login()
    {
        $sql = "SELECT * FROM `users`";
        $this->connect->setQuery($sql);
        return $this->connect->loadData();
    }
    // Hàm thêm sản phẩm, trả về product_id vừa tạo
    public function add($name, $mota)
    {
        $sql = "INSERT INTO `products` (name, mota) VALUES (?, ?)";
        $this->connect->setQuery($sql);
        $this->connect->loadData([$name, $mota]);

        // Lấy product_id vừa được thêm
        return $this->connect->lastInsertId(); // Phương thức này trả về product_id vừa thêm
    }

    // Hàm thêm biến thể với product_id
    public function addvariants($product_id, $img, $price)
    {
        $sql = "INSERT INTO `product_variants` (product_id, img, price) VALUES (?, ?, ?)";
        $this->connect->setQuery($sql);
        return $this->connect->loadData([$product_id, $img, $price]);
    }

    public function xem()
    {
        $sql = "SELECT * FROM `product_variants`";
        $this->connect->setQuery($sql);
        return $this->connect->loadData();
    }
}
