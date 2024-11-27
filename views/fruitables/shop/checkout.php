<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="post">
    <table border="1">
        <tr>
            <td>Tên sản phẩm</td>
            <td>Ảnh sản phẩm</td>
            <td>Số lượng</td>
            <td>Giá</td>
            <td>Tổng cộng</td>
        </tr>
        <tr>
            <td>
                <?php echo $aa['name']; ?>
                <input type="hidden" name="product_name" value="<?php echo $aa['name']; ?>">
            </td>
            <td>
                <img src="<?php echo $bb['product_img']; ?>" alt="" width="50">
                <input type="hidden" name="product_img" value="<?php echo $bb['product_img']; ?>">
            </td>
            <td>
                <?php echo $cc['quantity']; ?>
                <input type="hidden" name="quantity" value="<?php echo $cc['quantity']; ?>">
            </td>
            <td>
                <?php echo $bb['price']; ?>
                <input type="hidden" name="price" value="<?php echo $bb['price']; ?>">
            </td>
            <td>
                <?php echo $bb['price'] * $cc['quantity']; ?>
                <input type="hidden" name="total" value="<?php echo $bb['price'] * $cc['quantity']; ?>">
            </td>
        </tr>
    </table>
    <button type="submit">Thanh toán</button>
</form>
</body>
</html>