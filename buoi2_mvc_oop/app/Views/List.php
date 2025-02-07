<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./public/css/list.css">
</head>

<body>
    <h1>Danh sách book</h1>
    <a href="?act=create">Thêm sách mới</a>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên sách</th>
                <th>Hình ảnh</th>
                <th>Tác giả</th>
                <th>Nhà xuất bản</th>
                <th>Ngày xuất bản</th>
                <th>Trạng thái</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($books as $book): ?>
                <tr>
                    <td><?php echo $book['id']; ?></td>
                    <td><?php echo $book['title']; ?></td>
                    <td><img src="<?php echo $book['cover_image']; ?>" width="100px">
                    </td>
                    <td><?php echo $book['author']; ?></td>
                    <td><?php echo $book['publisher']; ?></td>
                    <td><?php echo $book['publish_date']; ?></td>
                    <td>
                        <!-- Sửa -->
                        <a href="?act=update&id=<?php echo $book['id']; ?>">Sửa</a>

                        <!-- Xóa -->
                        <a href="?act=delete&id=<?php echo $book['id']; ?>
                        " onclick="return confirm('Bạn có chắc chắn xóa không?');">Xóa</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>