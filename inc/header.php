<?php
session_start();
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];  // Lấy thông tin người dùng từ session
}
?>
<div class="container-fluid fixed-top">
    <div class="container topbar bg-primary d-none d-lg-block">
        <div class="d-flex justify-content-between">
            <div class="top-info ps-2">
                <small class="me-3"><i class="fas fa-map-marker-alt me-2 text-secondary"></i> <a href="#" class="text-white">Cầu Giấy, Hà Nội</a></small>
                <small class="me-3"><i class="fas fa-envelope me-2 text-secondary"></i><a href="#" class="text-white">tuttph49773@gmail.com</a></small>
            </div>
            <div class="top-link pe-2">
                <?php
                if (isset($_SESSION['username'])) {
                ?>
                    <!-- Hiển thị khi đã đăng nhập -->
                    <a class="text-white mx-2">
                        Xin chào, <?php echo $username ?>
                    </a>
                    <a class="text-white mx-2">|</a>
                    <a href="?act=dangxuat" class="text-white"><small class="text-white mx-2">Đăng Xuất</small></a>
                <?php
                } else {
                ?>
                    <a href="?act=register" class="text-white"><small class="text-white mx-2">Đăng Ký</small></a> /
                    <a href="?act=login" class="text-white"><small class="text-white mx-2">Đăng Nhập</small></a>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="container px-0">
        <nav class="navbar navbar-light bg-white navbar-expand-xl">
            <a href="./index.php" class="navbar-brand">
                <h1 class="text-primary display-6">Clothes</h1>
            </a>
            <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars text-primary"></span>
            </button>
            <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                <div class="navbar-nav mx-auto">
                    <a href="index.php" class="nav-item nav-link active">Home</a>
                    <a href="shop.php" class="nav-item nav-link">Shop</a>
                    <a href="shop-detail.php" class="nav-item nav-link">Shop Detail</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                        <div class="dropdown-menu m-0 bg-secondary rounded-0">
                            <a href="cart.php" class="dropdown-item">Cart</a>
                            <a href="checkout.php" class="dropdown-item">Checkout</a>
                            <a href="testimonial.php" class="dropdown-item">Testimonial</a>
                            <a href="404.php" class="dropdown-item">404 Page</a>
                        </div>
                    </div>
                    <a href="contact.php" class="nav-item nav-link">Contact</a>
                </div>
                <div class="d-flex m-3 me-0">
                    <button class="btn-search btn border border-secondary btn-md-square rounded-circle bg-white me-4" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fas fa-search text-primary"></i></button>
                    <?php

                    $cartCount = isset($_SESSION['cart']) ? array_sum(array_column($_SESSION['cart'], 'quantity')) : 0;
                    ?>
                    <a href="index.php?act=cart" class="position-relative me-4 my-auto">
                        <i class="fa fa-shopping-bag fa-2x"></i>

                    </a>
                    <a href="#" class="my-auto">
                        <i class="fas fa-user fa-2x"></i>
                    </a>
                </div>
            </div>
        </nav>
    </div>
</div>