<?php

class Sach
{
    private $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getAllBook()
    {
        $sql = "SELECT * FROM books ";
        $stmt = $this->conn->prepare($sql); // chuẩn bị câu lệnh sql để thực thi
        $stmt->execute(); // Bắt đầu thực thi câu lệnh
        return $stmt->fetchAll();
    }
    public function create($data)
    {
        $sql = "INSERT INTO books (title, cover_image, author, publisher, publish_date)
                VALUES (:title, :cover_image, :author, :publisher, :publish_date)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
        return $this->conn->lastInsertId();
    }
    public function getById($id)
    {
        $sql = "SELECT * FROM books WHERE id =:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        $sach = $stmt->fetch();
        return $sach;
    }
    public function delete($id)
    {
        $sql = "DELETE FROM books WHERE id =:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
    }
    public function update($id, $data)
    {
        $sql = "UPDATE books SET
                title = :title,
                cover_image = :cover_image,
                author = :author,
                publisher = :publisher,
                publish_date = :publish_date
                WHERE id=:id
        ";

        $data['id'] = $id;
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);



    }

}