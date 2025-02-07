<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sách mới</title>
    <link rel="stylesheet" href="./public/css/create.css">
</head>

<body>
    <div class="container">
        <h1>Thêm sách mới</h1>
        <form action="?act=create" method="POST" enctype="multipart/form-data">
            <label for="title">Tên sách:</label><br>
            <input type="text" id="title" name="title" required><br><br>

            <label for="cover_image">Hình ảnh:</label><br>
            <input type="text" id="cover_image" name="cover_image" required><br><br>

            <label for="author">Tác giả:</label><br>
            <input type="text" id="author" name="author" required><br><br>

            <label for="publisher">Nhà xuất bản:</label><br>
            <input type="text" id="publisher" name="publisher" required><br><br>

            <label for="publish_date">Ngày xuất bản:</label><br>
            <input type="date" id="publish_date" name="publish_date" required><br><br>

            <button type="submit">Thêm sách</button>
        </form>

    </div>
</body>

</html>