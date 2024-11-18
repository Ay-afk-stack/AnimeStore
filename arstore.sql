-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2024 at 10:50 AM
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
-- Database: `arstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(200) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(3, 'Admin', 'admin@gmail.com', '$2y$10$9Zk2Sn4pz.NtQq4FzGJOPec9lMkfp6bD0QkAH16NahfQsAwOVXBt6');

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE `cart_details` (
  `product_id` int(11) NOT NULL,
  `user_id` int(255) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_title`) VALUES
(6, 'Manga'),
(7, 'Stationary'),
(8, 'Collectibles');

-- --------------------------------------------------------

--
-- Table structure for table `contact_table`
--

CREATE TABLE `contact_table` (
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `message` varchar(25) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders_pending`
--

CREATE TABLE `orders_pending` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(255) NOT NULL,
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders_pending`
--

INSERT INTO `orders_pending` (`order_id`, `user_id`, `invoice_number`, `product_id`, `quantity`, `order_status`) VALUES
(4, 5, 2058198545, 13, 1, 'pending'),
(5, 4, 752470244, 9, 1, 'pending'),
(6, 4, 2104541318, 4, 5, 'pending'),
(7, 5, 1140658447, 3, 1, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_keywords` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_image1` varchar(255) NOT NULL,
  `product_image2` varchar(255) NOT NULL,
  `product_image3` varchar(255) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_description`, `product_keywords`, `category_id`, `product_image1`, `product_image2`, `product_image3`, `product_price`, `date`, `status`) VALUES
(15, 'Redo of Healer', '\"Redo of Healer\" (also known as \"Kaifuku Jutsushi no Yarinaoshi\") is a Japanese dark fantasy light novel series written by Rui Tsukiyo and illustrated by Shiokonbu. It has been adapted into manga and anime, gaining significant attention due to its controv', 'Redo of healer , Manga', 6, 'redoofhealer.jpg', 'redoofhealer.jpg', 'redoofhealer.jpg', '500', '2024-11-18 09:14:04', 'true'),
(16, 'Naruto', 't tells the story of Naruto Uzumaki, a young ninja who seeks recognition from his peers and dreams of becoming the Hokage, the leader of his village.', 'Naruto , Sasuke , Dattebayo', 6, 'Naruto.jpg', 'Naruto.jpg', 'Naruto.jpg', '699', '2024-11-18 09:17:51', 'true'),
(17, 'Hellsing', 'Hellsing is a manga series written and illustrated by Kouta Hirano, also adapted as the anime series Hellsing, the OVA Hellsing Ultimate, and the abridgement Hellsing Ultimate Abridged. It tells the story of a powerful vampire named Alucard and his battle', 'Hellsing , Alucard', 6, 'hellsing.jpg', 'hellsing.jpg', 'hellsing.jpg', '999', '2024-11-18 09:18:41', 'true'),
(18, 'One Piece', 'Kaizoku oni ore wa naru -Luffy', 'Luffy, Zoro, One piece , Nami-swann', 6, 'onepiece1.jpg', 'onepiece1.jpg', 'onepiece1.jpg', '1200', '2024-11-18 09:19:39', 'true'),
(19, 'Vagabond', 'A manga series written and illustrated by Takehiko Inoue centered around a lone warrior following the way of the sword through mortal martial art combat.', 'Vagabond , Manga , Musashi', 6, 'Vagabond.jpg', 'Vagabond.jpg', 'Vagabond.jpg', '499', '2024-11-18 09:20:44', 'true'),
(20, 'My Hero academia', 'Deku who is the weakest work hard to be the strongest.', 'Manga, Deku , My Hero academia, All Might', 6, 'myHero.jpg', 'myHero.jpg', 'myHero.jpg', '649', '2024-11-18 09:22:59', 'true'),
(21, 'Berserk', 'Berserk is a Japanese manga series written and illustrated by Kentaro Miura. Set in a medieval Europe-inspired dark fantasy world, the story centers on the characters of Guts, a lone swordsman.', 'Berserk , Manga', 6, 'berserk1.jpg', 'berserk1.jpg', 'berserk1.jpg', '700', '2024-11-18 09:23:45', 'true'),
(22, 'Death Note', 'Light Yagami is the antagonist of the death note trying to make a new world by killing every criminal.', 'Light Yagami , Kira , Manga , Kira', 6, 'deathnote1.jpg', 'deathnote1.jpg', 'deathnote1.jpg', '899', '2024-11-18 09:25:36', 'true'),
(24, 'Naruto Pen', 'Naruto Pen', 'Naruto Pen , Pen , Naruto', 7, 'NarutoPen.jpeg', 'NarutoPen.jpeg', 'NarutoPen.jpeg', '150', '2024-11-18 09:30:35', 'true'),
(25, 'One Piece Pen', 'One Piece Pen', 'one piece , Luffy , pen', 7, 'onepieceBallPen.jpg', 'onepieceBallPen.jpg', 'onepieceBallPen.jpg', '200', '2024-11-18 09:31:21', 'true'),
(26, 'Gojo Pen', 'Gojo Pen', 'Gojo , Pen', 7, 'penGojo.jpeg', 'penGojo.jpeg', 'penGojo.jpeg', '300', '2024-11-18 09:32:00', 'true'),
(27, 'JJK set', 'JJK set', 'JJk , Gojo , Pen', 7, 'JjkSet.jpg', 'JjkSet.jpg', 'JjkSet.jpg', '250', '2024-11-18 09:32:38', 'true'),
(28, 'Demon Slayer Pen', 'Demon Slayer Pen', 'Demon Slayer , Pen', 7, 'DemonslayerPen.jpg', 'DemonslayerPen.jpg', 'DemonslayerPen.jpg', '200', '2024-11-18 09:33:59', 'true'),
(29, 'Hello Kitty Set', 'Hello Kitty Set', 'Hello Kitty Set , Pen', 7, 'HelloKity.jpeg', 'HelloKity.jpeg', 'HelloKity.jpeg', '250', '2024-11-18 09:34:42', 'true'),
(30, 'Spy X Family Pen', 'Spy X Family Pen', 'Spy X Family , Anya , Pen', 7, 'spyxfam.jpg', 'spyxfam.jpg', 'spyxfam.jpg', '250', '2024-11-18 09:36:02', 'true'),
(32, 'MyMelody', 'MyMelody Pen', 'MyMelody Pen', 7, 'Mymelody.jpg', 'Mymelody.jpg', 'Mymelody.jpg', '200', '2024-11-18 09:37:49', 'true'),
(33, 'Demon Slayer Collectibles', 'Demon Slayer Collectibles', 'Demon Slayer Collectibles , Statues', 8, 'Demon Slayer Collectible.jpg', 'Demon Slayer Collectible.jpg', 'Demon Slayer Collectible.jpg', '1299', '2024-11-18 09:40:30', 'true'),
(34, 'My Hero Academia collectibles', 'My Hero Academia collectibles', 'My Hero Academia collectibles , Statues', 8, 'MyHeroACtion.jpg', 'MyHeroACtion.jpg', 'MyHeroACtion.jpg', '1500', '2024-11-18 09:41:20', 'true'),
(35, 'Naruto Collectibles', 'Naruto Collectibles', 'Naruto Collectibles  , Naruto', 8, 'NarutoColletibles.jpg', 'NarutoColletibles.jpg', 'NarutoColletibles.jpg', '1500', '2024-11-18 09:42:45', 'true'),
(36, 'One Piece Collectibles', 'One Piece Collectibles', 'One Piece Collectibles , Collectibles', 8, 'One Piece Collectibles.jpg', 'One Piece Collectibles.jpg', 'One Piece Collectibles.jpg', '1500', '2024-11-18 09:43:42', 'true'),
(37, 'Hell Paradise', 'Hell Paradise', 'Hell Paradise', 8, 'Hells-Paradise.jpeg', 'Hells-Paradise.jpeg', 'Hells-Paradise.jpeg', '2500', '2024-11-18 09:45:04', 'true'),
(38, 'Tokyo Manji Collectibles', 'Tokyo Manji Collectibles', 'Tokyo Manji Collectibles', 8, 'tokyoCollect.jpg', 'tokyoCollect.jpg', 'tokyoCollect.jpg', '2000', '2024-11-18 09:46:05', 'true'),
(39, 'Dazai Collectibles', 'Dazai Collectibles', 'Dazai Collectibles', 8, 'DazaiCollect.jpg', 'DazaiCollect.jpg', 'DazaiCollect.jpg', '3999', '2024-11-18 09:48:48', 'true'),
(40, 'Chichi Collectibles', 'Chichi Collectibles', 'Chichi Collectibles , Dragon Ball Z', 8, 'Chichi.jpeg', 'Chichi.jpeg', 'Chichi.jpeg', '1599', '2024-11-18 09:49:49', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` int(11) NOT NULL,
  `user_id` int(255) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `rating` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `user_id`, `product_id`, `rating`, `created_at`) VALUES
(28, 4, 8, 3, '2024-11-18 08:14:23'),
(29, 5, 8, 4, '2024-11-18 08:14:40'),
(30, 5, 7, 4, '2024-11-18 08:33:32'),
(31, 6, 22, 5, '2024-11-18 09:38:35');

-- --------------------------------------------------------

--
-- Table structure for table `user_orders`
--

CREATE TABLE `user_orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount_due` int(255) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `total_products` int(255) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_payments`
--

CREATE TABLE `user_payments` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `invoice_number` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `user_ip` varchar(255) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_mobile` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_id`, `username`, `user_email`, `user_password`, `user_image`, `user_ip`, `user_address`, `user_mobile`) VALUES
(6, 'Ayush', 'ayush@gmail.com', '$2y$10$fgkutwNktH9o6iqxPW0KpeeEA6m5GxbJzEQjv3iWSLzPTRGUdWMZe', 'head-logo.png ', '::1', 'Boudha', '9813493440');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `contact_table`
--
ALTER TABLE `contact_table`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `orders_pending`
--
ALTER TABLE `orders_pending`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_orders`
--
ALTER TABLE `user_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `user_payments`
--
ALTER TABLE `user_payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contact_table`
--
ALTER TABLE `contact_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders_pending`
--
ALTER TABLE `orders_pending`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `user_orders`
--
ALTER TABLE `user_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_payments`
--
ALTER TABLE `user_payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
