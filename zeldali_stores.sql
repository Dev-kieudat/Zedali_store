-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 25, 2024 at 01:46 AM
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
-- Database: `zeldali_stores`
--

-- --------------------------------------------------------

--
-- Table structure for table `categorys`
--

CREATE TABLE `categorys` (
  `category_id` int NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categorys`
--

INSERT INTO `categorys` (`category_id`, `category_name`, `category_type`) VALUES
(9, 'áo sơ mi', 'Áo'),
(10, 'Quần tây', 'Quần'),
(11, 'Đồ lót', 'Phụ Kiện');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int NOT NULL,
  `description` text,
  `image_url` varchar(255) DEFAULT NULL,
  `category_id` int DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `view` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `name`, `price`, `description`, `image_url`, `category_id`, `created_at`, `view`) VALUES
(3, 'Áo sơ mi - AR240102NT', 123, 'se2', '../upload/Screenshot 2024-11-08 125322.png', 9, '2024-11-15 17:02:46', 206),
(5, 'Quần lót - QLBW221084', 960000, 'kkkk', '../upload/Screenshot 2024-11-15 224226.png', 9, '2024-11-15 22:43:12', 8),
(6, 'Quần tây - QRT242827', 730000, '-da\r\ndadad\r\n-dadad-\r\nđấ\r\n', '../upload/Screenshot 2024-11-15 224647.png', 10, '2024-11-15 22:47:30', 69);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `role` enum('admin','user') DEFAULT 'user',
  `status` enum('active','inactive') DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `phone`, `password`, `created_at`, `role`, `status`) VALUES
(7, 'DEV ĐÂY NÈ BA', 'kieudat2k5@gmail.com', '0333470486', '1234567', '2024-11-20 07:14:28', 'admin', 'active'),
(8, 'DEV ĐÂY NÈ BA', 'kieudat25@gmail.com', '0333470486', '1234567', '2024-11-20 09:48:41', 'user', 'active'),
(9, 'kiều Văn Đạt', 'kieuvandat@gmail.com', '055505055501', 'kieudat123', '2024-11-23 02:35:36', 'user', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorys`
--
ALTER TABLE `categorys`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `category_name` (`category_name`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorys`
--
ALTER TABLE `categorys`
  MODIFY `category_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categorys` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
