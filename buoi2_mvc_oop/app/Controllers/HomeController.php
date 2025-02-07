<?php

class HomeController
{
    private $sachModel;

    public function __construct()
    {
        $this->sachModel = new Sach();
    }
    public function index()
    {
        $books = $this->sachModel->getAllBook();
        require_once(__DIR__ . '/../Views/List.php');
    }
    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $imagePath = isset($_POST['cover_image']) ? $_POST['cover_image'] : null;
            $data = [
                'title' => $_POST['title'],
                'cover_image' => $imagePath ?? null,
                'author' => $_POST['author'],
                'publisher' => $_POST['publisher'],
                'publish_date' => $_POST['publish_date'],
            ];
            $imageId = $this->sachModel->create($data);
            header('Location: ?act=/');
        } else {
            require_once(__DIR__ . '/../Views/Create.php');
        }
    }
    public function delete($id)
    {
        $books = $this->sachModel->getById($id);
        $this->sachModel->delete($id);
        header('Location: ?act=/');
    }
    public function update($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $imagePath = isset($_POST['cover_image']) && !empty($_POST['cover_image']) ? $_POST['cover_image'] : $_POST['old_cover_image'];
            $data = [
                'title' => $_POST['title'],
                'cover_image' => $imagePath,
                'author' => $_POST['author'],
                'publisher' => $_POST['publisher'],
                'publish_date' => $_POST['publish_date'],
            ];
            // gọi phương thức update
            $this->sachModel->update($id, $data);
            header('Location: ?act=/');
        } else {
            $book = $this->sachModel->getById($id);
            require_once(__DIR__ . '/../Views/update.php');

        }
    }
}
