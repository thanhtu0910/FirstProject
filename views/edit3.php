<form method="POST" enctype="multipart/form-data">
    <h2>Sửa Sản Phẩm</h2>

    <!-- Thông tin sản phẩm chính -->
    <input type="text" id="name" name="name" required value="<?php echo $idBook['name'] ?>">

    <input type="text" id="description" name="description" required value="<?php echo $idBook['description'] ?>">

    <br>

    <label for="category_id">Danh mục:</label>
    <select name="category_id">
        <?php foreach ($ccc as $value) { ?>
            <option value="<?php echo $value->category_id ?>">
                <?php echo $value->name ?>
            </option>
        <?php } ?>
    </select>

    <h3>Biến thể sản phẩm</h3>

    <div id="variants">
        <!-- Mẫu biến thể -->
        <div class="variant">
            <input type="text" name="price" required value="<?php echo $iddBook['price'] ?>">
            <input type="text" name="stock_quantity" required value="<?php echo $iddBook['stock_quantity'] ?>">
            <input type="file" name="product_img">
            <img src="<?php echo $iddBook['product_img'] ?>" alt="" width="100px">
        </div>
    </div>


    <button type="submit" name="btn_submit" >Lưu sản phẩm</button>

</form>