-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2024 at 09:12 AM
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
-- Database: `inventory_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(6, 'Alcoholic Beverages'),
(3, 'Bakery'),
(4, 'Flour'),
(9, 'Humans'),
(1, 'Juices'),
(2, 'Rice'),
(8, 'Stationery Items'),
(5, 'Wheat');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` int(11) UNSIGNED NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `file_name`, `file_type`) VALUES
(1, 'beer.png', 'image/png'),
(2, 'cake.png', 'image/jpeg'),
(3, 'Flour.png', 'image/jpeg'),
(4, 'Rice.png', 'image/webp'),
(5, 'stat.png', 'image/jpeg'),
(6, 'wheat.png', 'image/avif'),
(7, 'Real.png', 'image/jpeg'),
(8, 'barasinghecan.png', 'image/jpeg'),
(9, 'tuborgbottle.png', 'image/png'),
(10, 'tuborgcan.png', 'image/png'),
(11, 'kiba.png', 'image/png'),
(12, 'Pari.png', 'image/png'),
(13, 'Truffle.png', 'image/jpeg'),
(14, 'blackforest.png', 'image/jpeg'),
(15, 'vanilla.png', 'image/jpeg'),
(16, 'pen.png', 'image/webp');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `quantity` varchar(50) DEFAULT NULL,
  `buy_price` decimal(25,2) DEFAULT NULL,
  `sale_price` decimal(25,2) NOT NULL,
  `categorie_id` int(11) UNSIGNED NOT NULL,
  `media_id` int(11) DEFAULT 0,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `quantity`, `buy_price`, `sale_price`, `categorie_id`, `media_id`, `date`) VALUES
(15, 'Chocolate Cake', '25', 600.00, 750.00, 3, 2, '2024-11-17 05:58:55'),
(16, 'Books', '10', 70.00, 100.00, 8, 5, '2024-11-17 05:59:19'),
(17, 'Wheat', '50', 200.00, 250.00, 5, 6, '2024-11-17 05:59:35'),
(18, 'Flour', '13', 150.00, 200.00, 4, 3, '2024-11-17 05:59:50'),
(19, 'Rice', '25', 100.00, 145.00, 2, 4, '2024-11-17 06:01:51'),
(20, 'Real ', '55', 120.00, 150.00, 1, 7, '2024-11-17 06:10:05'),
(21, 'Barasinghe Beer', '179', 450.00, 550.00, 6, 1, '2024-11-17 06:22:22'),
(25, 'Barasinghe Can', '40', 300.00, 350.00, 6, 8, '2024-11-17 19:22:28'),
(26, 'Tuborg', '125', 540.00, 650.00, 6, 9, '2024-11-17 19:22:45'),
(27, 'Tuborg Can', '35', 220.00, 350.00, 6, 10, '2024-11-17 19:23:03'),
(28, 'Kiba Popol and Kupa', '1', 1.00, 2000.00, 9, 11, '2024-11-17 19:32:47'),
(29, 'Papa Ki Pari', '1', 2.00, 1.00, 9, 12, '2024-11-17 19:37:06'),
(30, 'Vanilla Cake', '15', 500.00, 600.00, 3, 15, '2024-11-18 05:30:55'),
(31, 'Blackforest Cake', '30', 650.00, 800.00, 3, 14, '2024-11-18 05:31:17'),
(32, 'Chocolate Truffle Cake', '30', 800.00, 950.00, 3, 13, '2024-11-18 05:31:39'),
(33, 'Pens', '60', 20.00, 30.00, 8, 16, '2024-11-18 13:41:08');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) UNSIGNED NOT NULL,
  `product_id` int(11) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `price` decimal(25,2) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `product_id`, `qty`, `price`, `date`) VALUES
(11, 21, 11, 6050.00, '2024-11-17'),
(12, 27, 15, 5250.00, '2024-11-17'),
(13, 25, 10, 3500.00, '2024-11-17'),
(14, 26, 25, 16250.00, '2024-11-17'),
(15, 32, 15, 14250.00, '2024-11-18'),
(16, 27, 10, 3500.00, '2024-11-18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(60) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_level` int(11) NOT NULL,
  `image` varchar(255) DEFAULT 'no_image.jpg',
  `status` int(1) NOT NULL,
  `last_login` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `user_level`, `image`, `status`, `last_login`) VALUES
(6, 'Roronoa Zoro', 'Zoro', 'b56f1b6dc92f3a8b55dcbd0cce733b07998f3012', 1, 'a8ruwrxy6.png', 1, '2024-11-18 08:57:30'),
(7, 'Pradeep Ghimire', 'Pradeep', '242965be986f5ea2ab681218fa56ecb35c8def1d', 3, 'tylvq5ut7.png', 1, '2024-11-18 06:14:46');

-- --------------------------------------------------------

--
-- Table structure for table `user_groups`
--

CREATE TABLE `user_groups` (
  `id` int(11) NOT NULL,
  `group_name` varchar(150) NOT NULL,
  `group_level` int(11) NOT NULL,
  `group_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user_groups`
--

INSERT INTO `user_groups` (`id`, `group_name`, `group_level`, `group_status`) VALUES
(1, 'Admin', 1, 1),
(3, 'User', 3, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `categorie_id` (`categorie_id`),
  ADD KEY `media_id` (`media_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_level` (`user_level`);

--
-- Indexes for table `user_groups`
--
ALTER TABLE `user_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `group_level` (`group_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_groups`
--
ALTER TABLE `user_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `FK_products` FOREIGN KEY (`categorie_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `SK` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_user` FOREIGN KEY (`user_level`) REFERENCES `user_groups` (`group_level`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
