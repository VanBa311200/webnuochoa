-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2021 at 02:00 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webnuochoa`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `name`) VALUES
(1, 'carolina herrera'),
(2, 'montblanc'),
(3, 'MERCEDES-BENZ'),
(4, 'JIMMY CHOO'),
(5, 'JEAN PAUL'),
(13, 'HELLO');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `id_product`, `name`, `image`) VALUES
(1, 1, NULL, '/webnuochoa/public/image/product/product-1.1.jpg'),
(2, 1, NULL, '/webnuochoa/public/image/product/product-1.2.jpg'),
(3, 1, NULL, '/webnuochoa/public/image/product/product-1.3.jpg'),
(4, 2, NULL, '/webnuochoa/public/image/product/100ml-1_600x.jpg'),
(5, 2, NULL, '/webnuochoa/public/image/product/100ml-1_600x.2.jpg'),
(6, 2, NULL, '/webnuochoa/public/image/product/100ml-1_600x.3.jpg'),
(7, 3, NULL, '/webnuochoa/public/image/product/100ml_sg_600x.jpg'),
(8, 3, NULL, '/webnuochoa/public/image/product/100ml_sg_600x.2.jpg'),
(9, 3, NULL, '/webnuochoa/public/image/product/100ml_sg_600x.3.jpg'),
(10, 4, NULL, '/webnuochoa/public/image/product/100ml_80f591d0-0cc0-43fb-b4c7-c97cab05e3f8_400x.jpg'),
(11, 4, NULL, '/webnuochoa/public/image/product/100ml__400x.2.jpg'),
(12, 4, NULL, '/webnuochoa/public/image/product/100ml__400x.3.jpg'),
(13, 4, NULL, '/webnuochoa/public/image/product/100ml__400x.4.jpg'),
(14, 5, NULL, '/webnuochoa/public/image/product/90ml_heroes_400x.1.jpg'),
(15, 5, NULL, '/webnuochoa/public/image/product/90ml_heroes_400x.2.jpg'),
(16, 5, NULL, '/webnuochoa/public/image/product/90ml_heroes_400x.3.jpg'),
(17, 6, NULL, '/webnuochoa/public/image/product/100ml_Choo_600x.jpg'),
(18, 6, NULL, '/webnuochoa/public/image/product/100ml_Choo_600x.1.jpg'),
(19, 6, NULL, '/webnuochoa/public/image/product/100ml_Choo_600x.2.jpg'),
(20, 7, NULL, '/webnuochoa/public/image/product/LE-MALE_600x.1.jpg'),
(21, 7, NULL, '/webnuochoa/public/image/product/GWP_200ML_600x.2.jpg'),
(22, 7, NULL, '/webnuochoa/public/image/product/LE-MALE_600x.3.jpg'),
(23, 7, NULL, '/webnuochoa/public/image/product/LE-MALE_600x.4.jpg'),
(24, 8, NULL, '/webnuochoa/public/image/product/La-Belle-100ml_600x.jpg'),
(25, 8, NULL, '/webnuochoa/public/image/product/La-Belle-100ml_600x.1.jpg'),
(26, 8, NULL, '/webnuochoa/public/image/product/La-Belle-100ml_600x.2.jpg'),
(28, 8, NULL, '/webnuochoa/public/image/product/La-Belle-100ml_600x.3.1.jpg'),
(31, 9, 'Test', '/webnuochoa/public/image/6e2816f03cc167972398_115848557263387_4542276411567369846_n.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `order_bill`
--

CREATE TABLE `order_bill` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `create_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_bill`
--

INSERT INTO `order_bill` (`id`, `id_user`, `create_at`) VALUES
(17, 1, '2021-07-31 12:47:21'),
(18, 5, '2021-08-02 06:35:26');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `id_brand` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `price-sale` int(11) DEFAULT NULL,
  `percent-sale` int(11) DEFAULT NULL,
  `rating-number` float DEFAULT NULL,
  `update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `id_brand`, `name`, `description`, `price`, `price-sale`, `percent-sale`, `rating-number`, `update_at`) VALUES
(1, 2, 'MONTBLANC EXPLORER ULTRA BLUE EDP', 'Người đàn ông Explorer Ultra Blue tự tin, quyết đoán và tinh thần phiêu lưu bất diệt.', 1650000, 1237500, 25, 4, '2021-08-02 12:53:00'),
(2, 3, '[New Arrival 2021] Mercedes-Benz Man Bright For Men EDP', 'Mercedes-Benz Man Bright mang đến một biến thể mới về chủ đề của sự thanh lịch hiện đại với các quy tắc hiện đại, đô thị và sự tinh tế vượt thời gian với kiểu dáng đặc trưng của Mercedes-Benz.', 2550000, 2167500, 15, 4.4, '2021-08-02 12:53:00'),
(3, 1, '[New Arrival 2021] Carolina Herrera Very Good Girl EDP', 'Vui vẻ, tuyệt vời và không sợ hãi, Very Good Girl là một màn trình diễn mới của mùi hương Good Girl biểu tượng.', 1250000, 1125000, 10, 3.9, '2021-08-02 12:53:00'),
(4, 1, '[New Arrival 2021] Carolina Herrera Bad Boy Le Parfum EDP', 'BAD BOY Le Parfum định nghĩa lại mùi hương mang tính biểu tượng của BAD BOY với một công thức mới táo bạo hơn bao giờ hết.', 2699000, 2429100, 10, 4.7, '2021-08-02 12:53:00'),
(5, 1, '[New Arrival 2021] Carolina Herrera 212 Heroes EDT', 'Lấy cảm hứng từ đô thị phồn hoa New York với nguồn năng lượng tươi trẻ, đầy nhiệt huyết không bao giờ ngừng chuyển động.', 3050000, 2196000, 18, 4.9, '2021-08-02 12:53:00'),
(6, 4, '[New Arrival 2021] Jimmy Choo I Want Choo EDP', 'Mở màn cho năm 2021 tráng lệ, Jimmy Choo ra mắt tuyệt tác nước hoa mới mang tên I WANT CHOO.', 1950000, 1657500, 15, 4.9, '2021-08-02 12:53:00'),
(7, 5, '[New Arrival 2021] Jean Paul Gautier Le Male Le Parfum EDP', 'Le Male Le Parfum được khoác lên mình đồng phục sĩ quan màu đen và tô điểm thêm bằng một màu vàng gold nổi bật.', 2650000, 2305500, 13, 3.5, '2021-08-02 12:53:00'),
(8, 5, '[New Arrival 2021] Jean Paul Gaultier La Belle Le Parfum EDP', 'Thiết kế màu xanh như hồ nước lấp loáng xanh mát, là nơi làm dịu mọi cơn khát và sự nóng bức. Khoác lên mình một chiếc áo kiêu xa lấp lánh bởi các tia nắng mặt trời chiếu rọi.', 2650000, 2305500, 13, 4, '2021-08-02 12:53:00'),
(9, 1, ' Test', ' sadasdas', 1988700, 1690395, 15, NULL, '2021-08-02 14:57:23');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `size` varchar(100) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `id_order`, `id_product`, `quantity`, `size`, `price`) VALUES
(15, 17, 3, 2, '30ml', 2250000),
(16, 17, 4, 2, '30ml', 4858200),
(17, 17, 2, 2, '30ml', 4335000),
(18, 17, 8, 3, '30ml', 6916500),
(19, 17, 7, 2, '30ml', 4611000),
(20, 18, 4, 1, '100ml', 9716400);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `state` tinyint(1) NOT NULL DEFAULT 0,
  `_token` varchar(200) DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT current_timestamp(),
  `create_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `address`, `email`, `password`, `fullname`, `phone`, `state`, `_token`, `update_at`, `create_at`) VALUES
(1, NULL, 'vanba311200@gmail.com', 'admin123', 'van ba', NULL, 1, '809986', '2021-07-31 14:04:15', '2021-07-31 14:04:47'),
(2, NULL, 'congdanh@gmail.com', 'congdanh', 'danh ngu', NULL, 0, NULL, '2021-07-31 14:04:15', '2021-07-31 14:04:47'),
(5, NULL, 'namle1356@gmail.com', 'Tk0968246516', 'nam nguyen', NULL, 0, '50784560', '2021-07-31 14:04:15', '2021-07-31 14:04:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_product` (`id_product`);

--
-- Indexes for table `order_bill`
--
ALTER TABLE `order_bill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_brand` (`id_brand`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`,`id_order`,`id_product`),
  ADD KEY `id_order` (`id_order`,`id_product`),
  ADD KEY `id_product` (`id_product`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `order_bill`
--
ALTER TABLE `order_bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`);

--
-- Constraints for table `order_bill`
--
ALTER TABLE `order_bill`
  ADD CONSTRAINT `order_bill_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`id_brand`) REFERENCES `brand` (`id`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `order_bill` (`id`),
  ADD CONSTRAINT `transactions_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
