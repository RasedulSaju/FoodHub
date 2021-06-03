-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 03, 2021 at 07:49 PM
-- Server version: 8.0.23
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lab_foodhub`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` int NOT NULL,
  `item_name` varchar(26) NOT NULL,
  `item_price` float NOT NULL,
  `item_rating` float DEFAULT '0',
  `restaurant_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `item_name`, `item_price`, `item_rating`, `restaurant_id`) VALUES
(1, 'Burger', 2000, 1.2, 3),
(2, 'Pizza', 2500, 1.5, 3),
(3, 'Pasta', 500, 0, 2),
(4, 'BBQ Nachos', 450, 0, 1),
(5, 'Halim', 150, 0, 1),
(6, 'BBQ Chicken', 350, 0, 1),
(7, 'Subway Sandwiches', 700, 0, 6),
(8, 'Subway Sandwiches', 700, 0, 10),
(9, 'Mexican Nachos', 1100, 0, 5),
(10, 'Chicken pizza', 500, 0, 4),
(11, 'Mexican Nachos', 1100, 0, 2),
(12, 'BBQ Rice Bowl', 500, 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int NOT NULL,
  `user_id` int NOT NULL,
  `order_type` varchar(15) NOT NULL,
  `order_placed` datetime DEFAULT CURRENT_TIMESTAMP,
  `order_status` varchar(10) DEFAULT 'pending',
  `item_id` int NOT NULL,
  `quantity` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `order_type`, `order_placed`, `order_status`, `item_id`, `quantity`) VALUES
(1, 2, 'onspot', '2021-04-17 17:20:00', 'pending', 1, 1),
(2, 2, 'homedelivery', '2021-04-17 17:20:00', 'success', 2, 1),
(3, 2, 'homedelivery', '2021-04-17 17:21:08', 'pending', 1, 1),
(4, 2, 'onspot', '2021-04-17 17:21:08', 'success', 2, 1),
(5, 2, 'homedelivery', '2021-04-18 00:07:11', 'pending', 3, 1),
(6, 2, 'onspot', '2021-04-18 00:10:10', 'success', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `promotional`
--

CREATE TABLE `promotional` (
  `promo_id` int NOT NULL,
  `restaurant_id` int DEFAULT NULL,
  `discount` float DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `promotional`
--

INSERT INTO `promotional` (`promo_id`, `restaurant_id`, `discount`) VALUES
(1, 1, 10),
(2, 2, 12.8);

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE `restaurants` (
  `restaurant_id` int NOT NULL,
  `restaurant_name` varchar(26) NOT NULL,
  `restaurant_rating` float DEFAULT '0',
  `restaurant_address` varchar(50) DEFAULT NULL,
  `restaurant_logo` varchar(300) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT '../restaurants/default.jpg',
  `restaurant_contact` varchar(15) DEFAULT NULL,
  `restaurant_bg` varchar(300) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`restaurant_id`, `restaurant_name`, `restaurant_rating`, `restaurant_address`, `restaurant_logo`, `restaurant_contact`, `restaurant_bg`) VALUES
(1, 'EpicFC', 5, 'Jira', '../restaurants/epicfc.jpg', '+880123456789', '../restaurants/EpicBackground.jpg'),
(2, 'SAD Food Court', 1.5, 'White House, Vatara', '../restaurants/sadfc.jpg', '+880123456789', '../restaurants/sadfc_bg.jpg'),
(3, 'KFC', 4.5, 'Chefs Table', '../restaurants/kfc.png', '+880123456789', NULL),
(4, 'Pizza Hut', 4.8, 'Wari', '../restaurants/pizzahut.png', '+880123456789', NULL),
(5, 'KakoliCafe', 0, 'Dame kom Ave, R Plaza', 'https://i1.wp.com/brunchvirals.com/wp-content/uploads/2021/05/Kakoli-Furniture-Meme.png?w=1300&ssl=1', '+880123456789', NULL),
(6, 'Abir Corner', 0, 'Lalmatia, Malibag', 'https://esmart.com.bd/wp-content/uploads/2018/10/restaurant-interior-design-for-free-software-restaurants.jpg', '+88015266369', NULL),
(10, 'bfc', 0, 'Dhaka', 'https://media-eng.dhakatribune.com/uploads/2015/10/M-1.jpg', '+88012155154554', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `usertable`
--

CREATE TABLE `usertable` (
  `user_id` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_phone` varchar(16) DEFAULT NULL,
  `user_password` varchar(32) NOT NULL,
  `user_type` varchar(10) NOT NULL,
  `user_address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usertable`
--

INSERT INTO `usertable` (`user_id`, `username`, `user_email`, `user_phone`, `user_password`, `user_type`, `user_address`) VALUES
(1, 'rasedul', 'rislam181007@bscse.uiu.ac.bd', '+8801735', '1234', 'admin', 'Motijheel'),
(2, 'abir', 'a@a.c', '+880961255', '1234', 'customer', 'Khilgaon'),
(3, 'ashik', 'mir@ashik.ul', '+80144555', '1234', 'manager', 'Pabna');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `ifk` (`restaurant_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `oui` (`user_id`),
  ADD KEY `oii` (`item_id`);

--
-- Indexes for table `promotional`
--
ALTER TABLE `promotional`
  ADD PRIMARY KEY (`promo_id`),
  ADD KEY `pfk` (`restaurant_id`);

--
-- Indexes for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`restaurant_id`);

--
-- Indexes for table `usertable`
--
ALTER TABLE `usertable`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `promotional`
--
ALTER TABLE `promotional`
  MODIFY `promo_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `restaurant_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `usertable`
--
ALTER TABLE `usertable`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurants` (`restaurant_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `usertable` (`user_id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `items` (`item_id`);

--
-- Constraints for table `promotional`
--
ALTER TABLE `promotional`
  ADD CONSTRAINT `promotional_ibfk_1` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurants` (`restaurant_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
