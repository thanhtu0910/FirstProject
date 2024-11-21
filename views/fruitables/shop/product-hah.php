<script>
document.addEventListener("DOMContentLoaded", function () {
    const categoryItems = document.querySelectorAll(".category-item");
    const productList = document.getElementById("product-list");

    categoryItems.forEach(item => {
        item.addEventListener("click", function (e) {
            e.preventDefault();
            const categoryId = this.getAttribute("data-id");

            // Gửi yêu cầu AJAX
            fetch("index.php?act=fetchProducts", {
                method: "POST",
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded",
                },
                body: `category_id=${categoryId}`,
            })
                .then(response => response.json())
                .then(data => {
                    productList.innerHTML = ""; // Xóa danh sách hiện tại

                    data.products.forEach(product => {
                        productList.innerHTML += `
                            <div class="col-md-6 col-lg-6 col-xl-4">
                                <div class="rounded position-relative fruite-item">
                                    <div class="fruite-img">
                                        <img src="${product.product_img}" class="img-fluid w-100 rounded-top" alt="">
                                    </div>
                                    <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">
                                        <a href="index.php?act=productDetail&id=${product.product_id}">
                                            ${product.category_name}
                                        </a>
                                    </div>
                                    <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                        <a href="index.php?act=productDetail&id=${product.product_id}">
                                            <h4>${product.name}</h4>
                                        </a>
                                        <div class="d-flex justify-content-between flex-lg-wrap">
                                            <p class="text-dark fs-5 fw-bold mb-0">${new Intl.NumberFormat().format(product.price)} VND</p>
                                            <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary">
                                                <i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `;
                    });
                })
                .catch(error => console.error("Error fetching products:", error));
        });
    });
});
</script>
<?php foreach ($trangchu as $value) { ?>
        <div class="col-md-6 col-lg-6 col-xl-4">
            <div class="rounded position-relative fruite-item">
                <div class="fruite-img">
                    <img src="<?php echo $value->product_img; ?>" class="img-fluid w-100 rounded-top" alt="">
                </div>
                <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">
                    <a href="index.php?act=productDetail&id=<?php echo $value->product_id; ?>">
                        <?php echo $value->category_name; ?>
                    </a>
                </div>
                <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                    <a href="index.php?act=productDetail&id=<?php echo $value->product_id; ?>">
                        <h4><?php echo $value->name; ?></h4>
                    </a>
                    <div class="d-flex justify-content-between flex-lg-wrap">
                        <p class="text-dark fs-5 fw-bold mb-0"><?php echo number_format($value->price); ?> VND</p>
                        <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary">
                            <i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart
                        </a>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>