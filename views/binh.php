<form method="POST" action="http://localhost/duan1/d-n-/?act=binh" enctype="multipart/form-data">
    <h2>Thêm Sản Phẩm</h2>

    <!-- Thông tin sản phẩm chính -->
    <input type="text" id="name" name="name" required>

    <input type="text" id="description" name="description" required>

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
            <input type="text" name="price" placeholder="gia">
            <input type="text" name="stock_quantity" placeholder="stock_quantity">
            <input type="file" name="product_img">
        </div>
    </div>

    <button type="button" onclick="addVariant()">Thêm biến thể</button>

    <button type="submit" name="btn_submit">Lưu sản phẩm</button>

</form>

<script>
    function addVariant() {
        const variants = document.getElementById('variants');

        let r = (Math.random() + 1).toString(36).substring(7);

        let html = `
             <div class="variant">
                <input type="text" name="variant[${r}][price]" placeholder="gia">
                <input type="file" name="variant[${r}][img]" placeholder="anh">
            </div>
        `;

        variants.innerHTML += html;
    }
</script>