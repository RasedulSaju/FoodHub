-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 07, 2021 at 05:55 PM
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
  `item_rating` float DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `restaurant_name` varchar(26) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `order_type`, `order_placed`, `order_status`, `item_id`, `restaurant_name`) VALUES
(1, 2, 'onspot', '2021-04-17 17:20:00', 'pending', 1, 'Jira Pani'),
(2, 2, 'homedelivery', '2021-04-17 17:20:00', 'success', 2, 'Pabna Cafeteria'),
(3, 1, 'homedelivery', '2021-04-17 17:21:08', 'pending', 1, 'JFC'),
(4, 1, 'onspot', '2021-04-17 17:21:08', 'success', 2, 'KFC'),
(5, 2, 'homedelivery', '2021-04-18 00:07:11', 'pending', 3, 'EpicFC'),
(6, 2, 'onspot', '2021-04-18 00:10:10', 'success', 4, 'JFC');

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
(1, 'rasedul', 'rislam181007@bscse.uiu.ac.bd', '+8801735737037', '1234', 'admin', 'Motijheel'),
(2, 'abir', 'a@a.co', '+88017533', '1234', 'customer', 'Khilgaon'),
(3, 'naim', 'rogi@pabna.mental', '+80144555', '1234', 'manager', 'Pabna');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

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
  MODIFY `item_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `usertable`
--
ALTER TABLE `usertable`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
