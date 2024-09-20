-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2024 at 07:52 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testpj`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `cart_id` int(11) UNSIGNED NOT NULL,
  `product_id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) UNSIGNED NOT NULL,
  `product_id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `DATE` date NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) UNSIGNED NOT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `product_description` text DEFAULT NULL,
  `product_img` text DEFAULT NULL,
  `product_price` decimal(10,2) DEFAULT NULL,
  `product_quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_description`, `product_img`, `product_price`, `product_quantity`) VALUES
(1, 'Dog Food', 'High-quality dry dog food', 'https://shopsuki.ph/cdn/shop/files/107999652_800x.png?v=1713925664', 350.00, 50),
(2, 'Cat Litter', 'Odor-free cat litter', 'https://shop.smallpetselect.com/cdn/shop/products/SPS-Pelleted-Paper-Cat-Litter-Image-1copy10LB_2000x.jpg?v=1690550934', 200.00, 80),
(3, 'Bird Cage', 'Spacious cage for small birds', 'https://t4.ftcdn.net/jpg/03/15/27/01/360_F_315270110_5NgiWpgbX8jsiorXFNlu07MoMx7wt0ko.jpg', 1200.00, 15),
(4, 'Fish Tank', 'Glass aquarium with filtration system', 'https://m.media-amazon.com/images/I/81bm603lC-L._AC_UF1000,1000_QL80_.jpg', 2500.00, 10),
(6, 'Hamster Wheel', 'Durable running wheel for hamsters', 'https://t4.ftcdn.net/jpg/02/31/90/35/360_F_231903533_GT3mULL0SGXJWDpqdRH2g6Pn7KytBuTI.jpg', 150.00, 30),
(7, 'Cat Toy', 'Interactive toy for cats', 'https://m.media-amazon.com/images/I/615Ccf+wziL._AC_SL1300_.jpg', 75.00, 100),
(8, 'Dog Collar', 'Adjustable collar with name tag', 'https://canadapooch.com/cdn/shop/products/WaterproofCollar_Black_Front.jpg?v=1718310258', 120.00, 60),
(9, 'Bird Seed', 'Nutrient-rich food for small birds', 'https://topflite.co.nz/wp-content/uploads/2015/07/Topflite_WB_WildBirdCoarse_Macro_LR.jpg', 50.00, 200),
(10, 'Fish Food', 'Pellet food for tropical fish', 'https://m.media-amazon.com/images/I/81YDlnpTUeL.jpg', 90.00, 150),
(11, 'Dog Food2', 'High-quality dry dog food', 'https://shopsuki.ph/cdn/shop/files/107999652_800x.png?v=1713925664', 350.00, 50),
(12, 'Cat Litter2', 'Odor-free cat litter', 'https://shop.smallpetselect.com/cdn/shop/products/SPS-Pelleted-Paper-Cat-Litter-Image-1copy10LB_2000x.jpg?v=1690550934', 200.00, 80),
(13, 'Bird Cage2', 'Spacious cage for small birds', 'https://t4.ftcdn.net/jpg/03/15/27/01/360_F_315270110_5NgiWpgbX8jsiorXFNlu07MoMx7wt0ko.jpg', 1200.00, 15),
(14, 'Fish Tank2', 'Glass aquarium with filtration system', 'https://m.media-amazon.com/images/I/81bm603lC-L._AC_UF1000,1000_QL80_.jpg', 2500.00, 10),
(15, 'Rabbit Hutch2', 'Outdoor wooden hutch for rabbits', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ6UxjoQQzyO3Aad1z_JTyS6nsKUFLB16GIcQ&s', 1800.00, 7);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `address` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `PASSWORD`, `first_name`, `last_name`, `phone_number`, `address`) VALUES
(7, 'test1', 'test1@gmail.com', '1234', 'test', '1', '0999999999', 'ABCDF');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `cart_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
