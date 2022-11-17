-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2022 at 07:52 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `ammount` float NOT NULL,
  `datepaid` datetime NOT NULL,
  `paymentstatus` enum('pending','cancelled','completed') NOT NULL,
  `paymentmode` enum('online','cash') NOT NULL,
  `trans_reference` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `user_id`, `product_id`, `ammount`, `datepaid`, `paymentstatus`, `paymentmode`, `trans_reference`, `created_at`, `updated_at`) VALUES
(3, 2, 1, 250000, '2022-11-17 07:29:36', 'pending', 'online', 'U16687097764524557411', '2022-11-17 18:29:36', '2022-11-17 18:29:36'),
(4, 2, 3, 650000, '2022-11-17 07:30:11', 'pending', 'online', 'U166870981116481554463', '2022-11-17 18:30:11', '2022-11-17 18:30:11'),
(5, 2, 2, 450000, '2022-11-17 07:31:54', 'pending', 'online', 'U166870991413585651122', '2022-11-17 18:31:54', '2022-11-17 18:31:54'),
(6, 1, 2, 450000, '2022-11-17 07:50:19', 'pending', 'online', 'U16687110196939669462', '2022-11-17 18:50:19', '2022-11-17 18:50:19');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(150) NOT NULL,
  `price` float NOT NULL,
  `qty` int(11) NOT NULL,
  `imageurl` varchar(150) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `price`, `qty`, `imageurl`, `created_at`) VALUES
(1, 'Rolex wrist-watch', 250000, 2, 'images/wristwatch.png', '2022-11-17 11:27:20'),
(2, 'MacBook Laptop', 450000, 1, 'images/laptop.png', '2022-11-17 11:27:20'),
(3, 'PlayStation', 650000, 1, 'images/playstation.png', '2022-11-17 11:30:03');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`) VALUES
(1, 'Super Administrator'),
(2, 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT 2,
  `lastname` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `profilename` varchar(255) DEFAULT NULL,
  `dateofbirth` date NOT NULL,
  `phonenumber` varchar(50) NOT NULL,
  `profiledesc` text NOT NULL,
  `profilephoto` varchar(255) DEFAULT NULL,
  `emailaddress` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `accountstatus` enum('active','inactive') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `role_id`, `lastname`, `firstname`, `profilename`, `dateofbirth`, `phonenumber`, `profiledesc`, `profilephoto`, `emailaddress`, `password`, `accountstatus`, `created_at`, `updated_at`) VALUES
(1, 1, 'Ekpo', 'Charles', '', '2012-11-06', '08084720229', 'A PHP Fullstack Web developer with vast experience in the use of technologies', NULL, 'cekpo56@gmail.com', '$2y$10$vljiGBVgByO9/8WVY/5ZG.UjRtqeXTewh1MMc1h2IjUsHDBah1B/S', 'active', '2022-11-17 10:43:30', '2022-11-17 11:14:01'),
(2, 2, 'charles', 'valeria', NULL, '2018-08-02', '08132383384', 'A super manager in the making', NULL, 'valeria@gmail.com', '$2y$10$YlAXAn4UlYAPw/qJ6No8m.Tw5O7bQsdViFqIzLu2qZAK8aXC2mJk2', 'active', '2022-11-17 10:49:10', '2022-11-17 11:15:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
