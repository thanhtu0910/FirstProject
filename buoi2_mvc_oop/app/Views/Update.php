<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa sách</title>
    <link rel="stylesheet" href="./public/css/edit.css">
</head>

<body>
    <div class="container">
        <h1>Chỉnh sửa thông tin sách</h1>
        <form method="POST">
            <input type="hidden" name="id" value="<?php echo $book['id']; ?>">

            <label for="title">Tên sách:</label><br>
            <input type="text" id="title" name="title" value="<?php echo ($book['title']); ?>" required><br><br>

            <label for="cover_image">Hình ảnh:</label><br>
            <input type="text" id="cover_image" name="cover_image" value="<?php echo ($book['cover_image']); ?>" required><br><br>

            <label for="author">Tác giả:</label><br>
            <input type="text" id="author" name="author" value="<?php echo ($book['author']); ?>" required><br><br>

            <label for="publisher">Nhà xuất bản:</label><br>
            <input type="text" id="publisher" name="publisher" value="<?php echo ($book['publisher']); ?>" required><br><br>

            <label for="publish_date">Ngày xuất bản:</label><br>
            <input type="date" id="publish_date" name="publish_date" value="<?php echo ($book['publish_date']); ?>" required><br><br>

            <button type="submit">Lưu thay đổi</button>
        </form>
    </div>
</body>

</html>