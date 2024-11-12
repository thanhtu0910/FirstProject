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
    public function add($product_id, $name, $mota)
    {
        $sql = "INSERT INTO `products` VALUES (?,?,?)";
        $this->connect->setQuery($sql);
        return $this->connect->loadData([$product_id, $name, $mota]);
    }
    public function addvariants($img, $price)
    {
        $sql = "INSERT INTO `product_variants` VALUES (?,?)";
        $this->connect->setQuery($sql);
        return $this->connect->loadData([$img, $price]);
    }
}
