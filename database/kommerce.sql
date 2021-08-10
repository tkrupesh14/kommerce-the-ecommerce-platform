-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2021 at 01:23 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin'),
(2, 'krupesh', 'krupesh');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `categories` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `categories`, `status`) VALUES
(11, 'Smartphone', 1),
(12, 'Shoes', 1),
(13, 'Fashion', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(75) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `comment` text NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address` varchar(2000) NOT NULL,
  `house` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `pincode` int(11) NOT NULL,
  `payment_type` varchar(255) NOT NULL,
  `total_price` float NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `payment_status` varchar(255) NOT NULL,
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders_details`
--

CREATE TABLE `orders_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` float NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`id`, `status`) VALUES
(1, 'pending'),
(2, 'processing'),
(3, 'shipped'),
(4, 'canceled'),
(5, 'complete');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `mrp` float NOT NULL,
  `price` float NOT NULL,
  `qty` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `short_desc` text NOT NULL,
  `description` text NOT NULL,
  `meta_title` text NOT NULL,
  `meta_desc` text NOT NULL,
  `meta_keyword` varchar(2000) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `categories_id`, `mrp`, `price`, `qty`, `image`, `short_desc`, `description`, `meta_title`, `meta_desc`, `meta_keyword`, `status`) VALUES
(9, 'Comfort Chair', 12, 3465, 343, 443, '986591936_product-furniture-8-2.jpg', 'rfrh', 'fhj', '', '', '', 1),
(16, 'Wooden Table', 13, 300, 500, 30, '737510980_product-furniture-4-3.jpg', 'sd', 'sdd', '', '', '', 1),
(17, 'Wood Watch', 11, 400, 300, 200, '935912404_product-accessories-8-1-430x491.jpg', 'short description', 'long description', '', '', '', 1),
(18, 'OSAKA 6 T-shirt', 13, 400, 499, 200, '868296660_538228-0286_1-786x1000.jpeg', 'hello this is osaka 6 tshirt', 'hello this is osaka 6 tshirthello this is osaka 6 tshirthello this is osaka 6 tshirthello this is osaka 6 tshirthello this is osaka 6 tshirthello this is osaka 6 tshirthello this is osaka 6 tshirthello this is osaka 6 tshirthello this is osaka 6 tshirthello this is osaka 6 tshirthello this is osaka 6 tshirthello this is osaka 6 tshirthello this is osaka 6 tshirthello this is osaka 6 tshirthello this is osaka 6 tshirthello this is osaka 6 tshirthello this is osaka 6 tshirthello this is osaka 6 tshirthello this is osaka 6 tshirthello this is osaka 6 tshirthello this is osaka 6 tshirthello this is osaka 6 tshirthello this is osaka 6 tshirthello this is osaka 6 tshirthello this is osaka 6 tshirthello this is osaka 6 tshirthello this is osaka 6 tshirthello this is osaka 6 tshirthello this is osaka 6 tshirthello this is osaka 6 tshirthello this is osaka 6 tshirthello this is osaka 6 tshirthello this is osaka 6 tshirthello this is osaka 6 tshirthello this is osaka 6 tshirthello this is osaka 6 tshirthello this is osaka 6 tshirthello this is osaka 6 tshirthello this is osaka 6 tshirthello this is osaka 6 tshirthello this is osaka 6 tshirthello this is osaka 6 tshirthello this is osaka 6 tshirthello this is osaka 6 tshirthello this is osaka 6 tshirthello this is osaka 6 tshirthello this is osaka 6 tshirthello this is osaka 6 tshirthello this is osaka 6 tshirthello this is osaka 6 tshirthello this is osaka 6 tshirthello this is osaka 6 tshirthello this is osaka 6 tshirthello this is osaka 6 tshirthello this is osaka 6 tshirthello this is osaka 6 tshirthello this is osaka 6 tshirthello this is osaka 6 tshirthello this is osaka 6 tshirthello this is osaka 6 tshirthello this is osaka 6 tshirthello this is osaka 6 tshirthello this is osaka 6 tshirthello this is osaka 6 tshirthello this is osaka 6 tshirthello this is osaka 6 tshirthello this is osaka 6 tshirthello this is osaka 6 tshirthello this is osaka 6 tshirthello this is osaka 6 tshirt', 'osaka 6', 'hello this is osaka 6 tshirthello this is osaka 6 tshirthello this is osaka 6 tshirthello this is osaka 6 tshirthello this is osaka 6 tshirthello this is osaka 6 tshirthello this is osaka 6 tshirthello this is osaka 6 tshirthello this is osaka 6 tshirthello this is osaka 6 tshirthello this is osaka 6 tshirthello this is osaka 6 tshirthello this is osaka 6 tshirthello this is osaka 6 tshirthello this is osaka 6 tshirthello this is osaka 6 tshirthello this is osaka 6 tshirthello this is osaka 6 tshirthello this is osaka 6 tshirthello this is osaka 6 tshirthello this is osaka 6 tshirthello this is osaka 6 tshirthello this is osaka 6 tshirthello this is osaka 6 tshirthello this is osaka 6 tshirthello this is osaka 6 tshirthello this is osaka 6 tshirthello this is osaka 6 tshirthello this is osaka 6 tshirthello this is osaka 6 tshirthello this is osaka 6 tshirthello this is osaka 6 tshirthello this is osaka 6 tshirt', 'osaka, tshirt', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_otp` int(11) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders_details`
--
ALTER TABLE `orders_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders_details`
--
ALTER TABLE `orders_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
