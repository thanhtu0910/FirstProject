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
        $sql = "SELECT 
                products.product_id,
                products.name AS name,
                products.description,
                categories.name AS category_name,
                product_variants.variant_id,
                product_variants.price,
                product_variants.stock_quantity,
                product_variants.product_img
            FROM products
            JOIN categories ON products.category_id = categories.category_id
            JOIN product_variants ON products.product_id = product_variants.product_id";

        $this->connect->setQuery($sql);
        return $this->connect->loadData();
    }


    public function getid($product_id)
    {
        $sql = "SELECT * FROM `products` WHERE product_id=?";
        $this->connect->setQuery($sql);
        return $this->connect->loadData([$product_id], false);
    }
    public function getvid($variant_id)
    {
        $sql = "SELECT * FROM `product_variants` WHERE variant_id=?";
        $this->connect->setQuery($sql);
        return $this->connect->loadData([$variant_id], false);
    }
    // Cập nhật sản phẩm
    public function updateProduct($name, $description, $category_id, $product_id)
    {
        // Cập nhật thông tin sản phẩm trong bảng products
        $sql = "UPDATE `products` SET `name`=?, `description`=?, `category_id`=? WHERE `product_id`=?";
        $this->connect->setQuery($sql);
        return $this->connect->loadData([$name, $description, $category_id, $product_id], false);
    }

    // Cập nhật biến thể sản phẩm
    public function updateVariant($price, $stock_quantity, $product_img, $variant_id)
    {
        // Cập nhật thông tin biến thể trong bảng product_variants
        $sql = "UPDATE `product_variants` SET `price`=?, `stock_quantity`=?, `product_img`=? WHERE `variant_id`=?";
        $this->connect->setQuery($sql);
        return $this->connect->loadData([$price, $stock_quantity, $product_img, $variant_id], false);
    }

    // Hàm cập nhật cả sản phẩm và biến thể
    public function update($name, $description, $category_id, $price, $stock_quantity, $product_img, $product_id, $variant_id)
    {
        // Cập nhật bảng products
        $this->updateProduct($name, $description, $category_id, $product_id);

        // Cập nhật bảng product_variants
        return $this->updateVariant($price, $stock_quantity, $product_img, $variant_id);
    }


    public function delete($product_id)
    {
        $sql = "DELETE FROM `products` WHERE product_id=?";
        $this->connect->setQuery($sql);
        return $this->connect->loadData([$product_id], false);
    }
    public function register($user_id, $username, $password, $email, $phone, $address, $role)
    {
        $sql = "INSERT INTO `users` VALUES (?,?,?,?,?,?,?)";
        $this->connect->setQuery($sql);
        return $this->connect->loadData([$user_id, $username, $password, $email, $phone, $address, $role]);
    }
    public function login()
    {
        $sql = "SELECT * FROM `users`";
        $this->connect->setQuery($sql);
        return $this->connect->loadData();
    }
    // Hàm thêm sản phẩm, trả về product_id vừa tạo
    public function add($name, $description, $category_id)
    {
        $sql = "INSERT INTO `products` (name, description, category_id) VALUES (?,?,?)";
        $this->connect->setQuery($sql);
        $this->connect->loadData([$name, $description, $category_id]);

        // Lấy product_id vừa được thêm
        return $this->connect->lastInsertId(); // Phương thức này trả về product_id vừa thêm
    }

    // Hàm thêm biến thể với product_id
    public function addvariants($product_id, $price, $stock_quantity, $product_img)
    {
        $sql = "INSERT INTO `product_variants` (product_id, price, stock_quantity, product_img) VALUES (?, ?, ?,?)";
        $this->connect->setQuery($sql);
        return $this->connect->loadData([$product_id, $price, $stock_quantity, $product_img]);
    }

    public function categories()
    {
        $sql = "SELECT * FROM `categories`";
        $this->connect->setQuery($sql);
        return $this->connect->loadData();
    }
    public function xem()
    {
        $sql = "SELECT * FROM `products`";
        $this->connect->setQuery($sql);
        return $this->connect->loadData();
    }
}
