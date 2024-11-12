<form method="POST" enctype="multipart/form-data">
    <h2>Thêm Sản Phẩm</h2>

    <!-- Thông tin sản phẩm chính -->
    <input type="text" id="name" name="name" required>

    <textarea id="mota" name="mota"></textarea>

    <!-- <label for="category_id">Danh mục:</label>
    <select id="category_id" name="category_id">
        <option value="1">Áo khoác</option>
        <option value="2">Áo len</option>
  </select> -->

    <h3>Biến thể sản phẩm</h3>

    <div id="variants">
        <!-- Mẫu biến thể -->
        <div class="variant">

            <input type="text" name="price" placeholder="gia">

            <input type="file" name="img" placeholder="anh">
        </div>
    </div>

    <button type="button" onclick="addVariant()">Thêm biến thể</button>

    <button type="submit" name="btn_submit">Lưu sản phẩm</button>

</form>

<script>
    function addVariant() {
        const variants = document.getElementById('variants');
        const newVariant = document.querySelector('.variant').cloneNode(true);
        variants.appendChild(newVariant);
    }
</script>