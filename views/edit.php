<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form action="" method="post" enctype="multipart/form-data">

        <label for="">book_name</label>
        <input type="text" name="book_name" value="<?php echo $idBook->book_name ?>">

        <label for="">book_cover_image</label>
        <input type="file" name="book_cover_image">
        <img src=" <?php echo $idBook->book_cover_image ?>" alt="" width="100px">

        <label for="">author</label>
        <input type="text" name="author" value="<?php echo $idBook->author ?>">

        <label for="">publication_year</label>
        <input type="text" name="publication_year" value="<?php echo $idBook->publication_year ?>">

        <label for="">book_description</label>
        <input type="text" name="book_description" value="<?php echo $idBook->book_description ?>">

        <input type="submit" value="gui" name="btn_submit">
    </form>
</body>

</html>