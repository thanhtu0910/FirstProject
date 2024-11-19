-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 12, 2024 at 01:20 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `duan1`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `banner_id` int NOT NULL COMMENT 'id banner',
  `image_url` varchar(255) NOT NULL COMMENT 'url của hình ảnh banner ',
  `link` varchar(255) DEFAULT NULL COMMENT 'đường dẫn khi nhấp vào banner',
  `alt_text` varchar(255) DEFAULT NULL COMMENT 'văn bản thay thế cho hình ảnh',
  `display_order` int DEFAULT NULL COMMENT 'thứ tự hiển thị',
  `created_at` timestamp NULL DEFAULT NULL COMMENT 'ngày tạo banner',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT 'ngày cập nhật banner'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `cart_item_id` int NOT NULL COMMENT 'id của sản phẩm trong giỏ hàng',
  `user_id` int NOT NULL COMMENT 'id người dùng',
  `product_id` int NOT NULL COMMENT 'id sản phẩm',
  `quantity` int NOT NULL COMMENT 'số lượng sản phẩm ',
  `added_at` timestamp NOT NULL COMMENT 'ngày thêm sản phẩm',

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int NOT NULL COMMENT 'id danh mục',
  `name` varchar(255) NOT NULL COMMENT 'tên danh mục',
  `description` text NOT NULL COMMENT 'mô tả danh mục'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `discounts`
--

CREATE TABLE `discounts` (
  `discount_id` int NOT NULL COMMENT 'id khuyến mãi',
  `code` varchar(255) NOT NULL COMMENT 'mã khuyến mãi',
  `discount_type` enum('percentage','fixed') NOT NULL COMMENT 'loại giảm giá',
  `amount` decimal(10,0) NOT NULL COMMENT 'giá trị giảm giá',
  `start_date` date NOT NULL COMMENT 'ngày bắt đầu khuyến mãi',
  `end_date` date NOT NULL COMMENT 'ngày kết thúc khuyến mãi'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `featured_collections`
--

CREATE TABLE `featured_collections` (
  `collection_id` int NOT NULL COMMENT 'id bộ sưu tập',
  `name` varchar(255) NOT NULL COMMENT 'tên bộ sưu tập',
  `description` text COMMENT 'mô tả bộ sưu tập',
  `display_order` int DEFAULT NULL COMMENT 'thứ tự hiển thị',
  `created_at` timestamp NULL DEFAULT NULL COMMENT 'ngày tạo bộ sưu tập',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT 'ngày cập nhât bộ sưu tập'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int NOT NULL COMMENT 'id đơn hàng',
  `user_id` int NOT NULL COMMENT 'id người dùng đặt hàng',
  `total_amount` decimal(10,0) NOT NULL COMMENT 'tổng giá trị đơn hàng',
  `payment_status` enum('pending','paid','failed','refunded') NOT NULL COMMENT 'trạng thái thanh toán',
  `delivery_status` enum('pending','in_progress','shipped','delivered','returned') NOT NULL COMMENT 'trạng thái giao vận',
  `created_at` timestamp NOT NULL COMMENT 'ngày đặt hàng',
  `updated_at` timestamp NOT NULL COMMENT 'ngày cập nhật trạng thái',
  `discount_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `order_item_id` int NOT NULL COMMENT 'id chi tiết đơn hàng',
  `order_id` int NOT NULL COMMENT 'id của đơn hàng',
  `product_id` int NOT NULL COMMENT 'id của sản phẩm',
  `quantity` int NOT NULL COMMENT 'số lượng của sản phẩm trong đơn hàng',
  `price` decimal(10,0) NOT NULL COMMENT 'giá sản phẩm vào thời điểm đặt hàng'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int NOT NULL COMMENT 'ID sản phẩm',
  `name` varchar(255) NOT NULL COMMENT 'tên sp chung',
  `description` text COMMENT 'mô tả sp',
  `category_id` int NOT NULL COMMENT 'ID của danh mục sản phẩm',
  `created_at` timestamp NULL DEFAULT NULL COMMENT 'Ngày thêm sản phẩm',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT 'Ngày cập nhật sản phẩm'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_recommendations`
--

CREATE TABLE `product_recommendations` (
  `recommendation_id` int NOT NULL COMMENT 'id gợi ý sản phẩm',
  `product_id` int NOT NULL COMMENT 'id sản phẩm gợi ý',
  `display_order` int NOT NULL COMMENT 'thứ tự hiển thị',
  `created_at` timestamp NOT NULL COMMENT 'ngày tạo gợi ý',
  `updated_at` timestamp NOT NULL COMMENT 'ngày cập nhật gợi ý'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_variants`
--

CREATE TABLE `product_variants` (
  `variant_id` int NOT NULL COMMENT 'id biến thể',
  `product_id` int NOT NULL COMMENT 'id sản phẩm chung',
  `sku` varchar(255) NOT NULL COMMENT 'mã sku (ãm lưu kho cho biến thể',
  `price` decimal(10,0) NOT NULL COMMENT 'giá biến thể',
  `stock_quantity` int NOT NULL COMMENT 'số lượng tồn kho của biến thể',
  `created_at` timestamp NOT NULL COMMENT 'ngày tạo biến thể',
  `updated_at` timestamp NOT NULL COMMENT 'ngày cập nhật biến thể',
  `product_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int NOT NULL COMMENT 'id đánh giá',
  `product_id` int NOT NULL COMMENT 'id của sản phẩm',
  `user_id` int NOT NULL COMMENT 'id người dùng để lại đánh giá',
  `rating` int NOT NULL COMMENT 'đánh giá',
  `comment` int NOT NULL COMMENT 'nd đánh giá',
  `created_at` timestamp NOT NULL COMMENT 'ngày đánh giá'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `support_tickets`
--

CREATE TABLE `support_tickets` (
  `ticket_id` int NOT NULL COMMENT 'id yêu cầu hỗ trợ',
  `user_id` int NOT NULL COMMENT 'id của khách hàng',
  `subject` varchar(255) NOT NULL COMMENT 'tiêu đề hỗ trợ',
  `message` text NOT NULL COMMENT 'nội dung yêu cầu hỗ trợ',
  `status` enum('open','closed') NOT NULL COMMENT 'trạng thái hỗ trợ',
  `created_at` timestamp NOT NULL COMMENT 'ngày yêu cầu hỗ trợ',
  `updated_at` timestamp NOT NULL COMMENT 'ngày cập nhật trạng thái'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trangchu`
--

CREATE TABLE `trangchu` (
  `section_id` int NOT NULL COMMENT 'id của mục trên trang chủ',
  `section_type` enum('banner','featured_collection','product_recommendation','custom') NOT NULL COMMENT 'loại nội dung của mục',
  `title` varchar(255) NOT NULL COMMENT 'tiêu đề của mục',
  `description` text COMMENT 'mô tả cho mục',
  `position` int DEFAULT NULL COMMENT 'vị trí của mục trên trang chủ',
  `content_id` int NOT NULL COMMENT 'liên kết đến bảng tương ứng  (ví dụ, banners, products, collections)',
  `created_at` timestamp NOT NULL COMMENT 'ngày tạo mục',
  `updated_at` timestamp NOT NULL COMMENT 'ngày cập nhật mục'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL COMMENT 'id fuy nhất mỗi người dùng',
  `username` varchar(255) NOT NULL COMMENT 'tên đăng nhập',
  `password` varchar(255) NOT NULL COMMENT 'mật khẩu đã được mã hoá',
  `email` varchar(255) NOT NULL COMMENT 'địa chỉ email',
  `phone` varchar(255) NOT NULL COMMENT 'số điện thoại',
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci COMMENT 'địa chỉ',
  `role` enum('admin','customer') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL COMMENT 'phân quyền người dùng',
  `created_at` timestamp NULL DEFAULT NULL COMMENT 'ngày tạo tài khoản'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `variant_options`
--

CREATE TABLE `variant_options` (
  `option_id` int NOT NULL COMMENT 'id của lựa chọn biến thể',
  `variant_id` int NOT NULL COMMENT 'id biến thể',
  `option_name` varchar(255) NOT NULL COMMENT 'tên lựa chọn ( màu săc, kích thước)',
  `option_value` varchar(255) NOT NULL COMMENT 'giá trị lựa chọn (xanh, M,L)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `wishlist_id` int NOT NULL COMMENT 'id danh sách yêu thích',
  `user_id` int NOT NULL COMMENT 'id người dùng',
  `product_id` int NOT NULL COMMENT 'id sản phẩm',
  `added_at` timestamp NOT NULL COMMENT 'ngày thêm vào danh sách yêu thích'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`cart_item_id`),
  ADD KEY `lk_cart_items_users` (`user_id`),
  ADD KEY `variant_id` (`variant_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `discounts`
--
ALTER TABLE `discounts`
  ADD PRIMARY KEY (`discount_id`);

--
-- Indexes for table `featured_collections`
--
ALTER TABLE `featured_collections`
  ADD PRIMARY KEY (`collection_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `lk_orders_users` (`user_id`),
  ADD KEY `discount_id` (`discount_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`order_item_id`),
  ADD KEY `lk_order_items_orders` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `product_recommendations`
--
ALTER TABLE `product_recommendations`
  ADD PRIMARY KEY (`recommendation_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product_variants`
--
ALTER TABLE `product_variants`
  ADD PRIMARY KEY (`variant_id`),
  ADD KEY `lk_product_variants_products` (`product_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `lk_reviews_users` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `support_tickets`
--
ALTER TABLE `support_tickets`
  ADD PRIMARY KEY (`ticket_id`),
  ADD KEY `lk_support_tickets_users` (`user_id`);

--
-- Indexes for table `trangchu`
--
ALTER TABLE `trangchu`
  ADD PRIMARY KEY (`section_id`),
  ADD KEY `content_id` (`content_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `variant_options`
--
ALTER TABLE `variant_options`
  ADD PRIMARY KEY (`option_id`),
  ADD KEY `variant_id` (`variant_id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`wishlist_id`),
  ADD KEY `lk_wishlist_users` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `banner_id` int NOT NULL AUTO_INCREMENT COMMENT 'id banner';

--
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `cart_item_id` int NOT NULL AUTO_INCREMENT COMMENT 'id của sản phẩm trong giỏ hàng';

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int NOT NULL AUTO_INCREMENT COMMENT 'id danh mục';

--
-- AUTO_INCREMENT for table `discounts`
--
ALTER TABLE `discounts`
  MODIFY `discount_id` int NOT NULL AUTO_INCREMENT COMMENT 'id khuyến mãi';

--
-- AUTO_INCREMENT for table `featured_collections`
--
ALTER TABLE `featured_collections`
  MODIFY `collection_id` int NOT NULL AUTO_INCREMENT COMMENT 'id bộ sưu tập';

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int NOT NULL AUTO_INCREMENT COMMENT 'id đơn hàng';

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `order_item_id` int NOT NULL AUTO_INCREMENT COMMENT 'id chi tiết đơn hàng';

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int NOT NULL AUTO_INCREMENT COMMENT 'ID sản phẩm';

--
-- AUTO_INCREMENT for table `product_recommendations`
--
ALTER TABLE `product_recommendations`
  MODIFY `recommendation_id` int NOT NULL AUTO_INCREMENT COMMENT 'id gợi ý sản phẩm';

--
-- AUTO_INCREMENT for table `product_variants`
--
ALTER TABLE `product_variants`
  MODIFY `variant_id` int NOT NULL AUTO_INCREMENT COMMENT 'id biến thể';

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int NOT NULL AUTO_INCREMENT COMMENT 'id đánh giá';

--
-- AUTO_INCREMENT for table `support_tickets`
--
ALTER TABLE `support_tickets`
  MODIFY `ticket_id` int NOT NULL AUTO_INCREMENT COMMENT 'id yêu cầu hỗ trợ';

--
-- AUTO_INCREMENT for table `trangchu`
--
ALTER TABLE `trangchu`
  MODIFY `section_id` int NOT NULL AUTO_INCREMENT COMMENT 'id của mục trên trang chủ';

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT COMMENT 'id fuy nhất mỗi người dùng';

--
-- AUTO_INCREMENT for table `variant_options`
--
ALTER TABLE `variant_options`
  MODIFY `option_id` int NOT NULL AUTO_INCREMENT COMMENT 'id của lựa chọn biến thể';

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `wishlist_id` int NOT NULL AUTO_INCREMENT COMMENT 'id danh sách yêu thích';

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD CONSTRAINT `cart_items_ibfk_1` FOREIGN KEY (`variant_id`) REFERENCES `product_variants` (`variant_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `lk_cart_items_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `lk_orders_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`discount_id`) REFERENCES `discounts` (`discount_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `lk_order_items_orders` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `product_recommendations`
--
ALTER TABLE `product_recommendations`
  ADD CONSTRAINT `product_recommendations_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `product_variants`
--
ALTER TABLE `product_variants`
  ADD CONSTRAINT `lk_product_variants_products` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `lk_reviews_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `support_tickets`
--
ALTER TABLE `support_tickets`
  ADD CONSTRAINT `lk_support_tickets_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `trangchu`
--
ALTER TABLE `trangchu`
  ADD CONSTRAINT `trangchu_ibfk_1` FOREIGN KEY (`content_id`) REFERENCES `featured_collections` (`collection_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `trangchu_ibfk_2` FOREIGN KEY (`content_id`) REFERENCES `product_recommendations` (`recommendation_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `variant_options`
--
ALTER TABLE `variant_options`
  ADD CONSTRAINT `variant_options_ibfk_1` FOREIGN KEY (`variant_id`) REFERENCES `product_variants` (`variant_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `lk_wishlist_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
