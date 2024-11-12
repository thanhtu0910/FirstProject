<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <a href="?act=add"><button>them</button></a>
    <a href="?act=register"><button>dangky</button></a>
    <a href="?act=binh"><button>sfsdgfdg</button></a>
    <table border="1">
        <tr>
            <td>id</td>
            <td>book_name</td>
            <td>book_cover_image</td>
            <td>author</td>
            <td>publication_year</td>
            <td>book_description</td>
            <td>hanh dong</td>

        </tr>
        <?php foreach ($listbook as $value) { ?>
            <tr>
                <td><?php echo $value->id ?></td>
                <td><?php echo $value->book_name ?></td>
                <td><img src="<?php echo $value->book_cover_image ?>" alt="" width="100px"></td>
                <td><?php echo $value->author ?></td>
                <td><?php echo $value->publication_year ?></td>
                <td><?php echo $value->book_description ?></td>
                <td>
                    <a href="?act=edit&id=<?php echo $value->id ?>"><button>sua</button></a>
                    <button onclick="confirmDeleteBook('?act=delete&id=<?php echo $value->id ?>')">xoa</button>
                </td>

            </tr>
        <?php }  ?>
    </table>
</body>
<script>
    function confirmDeleteBook(deleUrl) {
        if (confirm('Are you sure you want to delete')) {
            document.location = deleUrl;
        }
    }
</script>


</html>