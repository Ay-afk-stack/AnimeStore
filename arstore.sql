-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2024 at 05:37 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

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
(1, 'ayush', 'pakhrinayush56@gmail.com', '$2y$10$Jv0Xp/DH6QBMeL2EK/sov.LpLBG2VAvErhRhiKDVNSmaeRTueZm.2');

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE `cart_details` (
  `product_id` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
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
(1, 'Manga'),
(2, 'Stationary'),
(3, 'Bags'),
(4, 'Collectibles');

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
(1, 1, 1684834832, 4, 1, 'pending'),
(2, 2, 213492728, 14, 1, 'pending');

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
(1, 'One Piece Manga Series(vol 1.)', 'Read One Piece volume 1. A boy go on a journey to find One piece.', 'one piece, luffy', 1, 'manga1.jpg', 'manga1.jpg', 'manga1.jpg', '1000', '2024-01-08 16:25:20', 'true'),
(2, 'Detective Konan', 'A young detective hunts down Multiple Criminals', 'Detective konan', 1, 'manga5.jpg', 'manga5.jpg', '', '149', '2024-01-08 16:26:54', 'true'),
(3, 'Attack On Titan (Vol 1.)', 'Eren swears to destroy all the titan from the world.Mikasa and others are helping him.', 'AOT,attack on titan', 1, 'manga3.jpg', 'manga3.jpg', 'manga3.jpg', '200', '2024-01-08 16:28:21', 'true'),
(4, 'Doraemon (vol1)', 'A Futuristic robot comes to the another world to help his friend nobita.', 'doraemon,nobita', 1, 'manga2.jpg', 'manga2.jpg', '', '150', '2024-01-08 16:29:39', 'true'),
(5, 'Death Note', 'A young student finds a notebook where you can write the name of a person and the method to kill him.', 'death note,light yagami', 1, 'manga4.jpg', 'manga44.jpg', 'manga45.jpg', '200', '2024-01-08 16:32:33', 'true'),
(6, 'Rurouni Kenshin', 'Volume 5 of Rurouni Kenshin: The Hokkaido Arc (ã‚‹ã‚ã†ã«å‰£å¿ƒ â”€æ˜Žæ²»å‰£å®¢æµªæ¼«è­šãƒ»åŒ—æµ·é“ç·¨) a manga series written and illustrated by Nobuhiro Watsuki. It began in August of 2017 in Jump Square Magazine.   This manga series is the direct se', 'Samurai,Rurouni Kenshin', 1, 'manga6.jpg', 'manga6.2.jpg', 'manga6.1.jpg', '200', '2024-01-08 16:44:02', 'true'),
(7, 'Pencil', 'A 2B pencil used for bold drawing.', 'pencil', 2, 'pencil1.jpg', 'pencil2.jpg', 'pencil1.jpg', '50', '2024-01-08 16:46:03', 'true'),
(8, 'Pen', 'A Ball Black Pen', 'black pen,pen', 2, 'pen1.jpg', 'pen2.jpg', 'pen3.jpg', '100', '2024-01-08 16:46:54', 'true'),
(9, 'Woolen Bag', 'A cute and soft woolen bag, imprinted with a simple design.', 'bag,flower bag', 3, 'bag1.jpg', 'bag2.jpg', 'bag3.jpg', '599', '2024-01-08 16:50:53', 'true'),
(10, 'Eraser', 'Eraser', 'Eraser,Rubber', 2, 'eraser3.jpg', 'eraser1.jpg', 'eraser2.jpg', '120', '2024-01-08 16:51:38', 'true'),
(11, 'Senju Hashirama', 'Ninja from senju clan(one of the top clans of japan).', 'Ninja,Senju,naruto', 4, 'action1.jpeg', 'action1.2.jpeg', 'action1.1.jpeg', '5000', '2024-01-08 16:57:10', 'true'),
(12, 'Levi Ackerman', 'Levi,Attack on Titan', 'AOT,Levi', 4, 'actionfigure.png', 'actionfigure1.png', 'actionfigure2.png', '2800', '2024-01-08 17:00:47', 'true'),
(13, 'Death notebook', 'Death note', 'deathnote,note,stationary', 2, 'deathnote.png', 'deathnote.png', 'deathnote.png', '100', '2024-01-08 17:02:01', 'true'),
(14, 'Goku', 'KAAMMMEEEEHAAAAMEEEEEHAAA!', 'dragon ball, goku', 4, 'goku.png', 'goku.png', 'goku.png', '6000', '2024-01-08 17:06:23', 'true');

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

--
-- Dumping data for table `user_orders`
--

INSERT INTO `user_orders` (`order_id`, `user_id`, `amount_due`, `invoice_number`, `total_products`, `order_date`, `order_status`) VALUES
(1, 1, 150, 1684834832, 1, '2024-01-08 18:16:23', 'Complete'),
(2, 2, 11799, 213492728, 5, '2024-01-09 03:44:33', 'pending');

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

--
-- Dumping data for table `user_payments`
--

INSERT INTO `user_payments` (`payment_id`, `order_id`, `invoice_number`, `amount`, `payment_mode`, `date`) VALUES
(9, 1, 1684834832, 150, 'Mobile Banking', '2024-01-08 18:16:23');

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
(2, 'robina', 'ruby@gmail.com', '$2y$10$mfCBlIo4yPDdCqDlByZNL.Hxt.3UpQfrwHoO0mmo5pmFhmeFH5SkC', 'actionfigure.png ', '::1', 'Teku', '123456789'),
(3, 'shirshak', 'shirshak@gmail.com', '$2y$10$kMG50e9M1oqMb73ZFKDb3.qaJHa6VqjebibwKfvR2kpCMsbvkQ0rm', 'WIN_20231204_07_36_40_Pro.jpg ', '::1', 'kathmandu', '9813097968');

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
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contact_table`
--
ALTER TABLE `contact_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders_pending`
--
ALTER TABLE `orders_pending`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_orders`
--
ALTER TABLE `user_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_payments`
--
ALTER TABLE `user_payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
