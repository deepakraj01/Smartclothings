-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2013 at 09:15 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `estore`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`) VALUES
(23, 'Bags'),
(26, 'clothing'),
(19, 'Kids'),
(17, 'Mens'),
(20, 'Sportswear'),
(18, 'Womens');

-- --------------------------------------------------------

--
-- Table structure for table `coments`
--

CREATE TABLE `coments` (
  `id` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `post_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `coment` text NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coments`
--

INSERT INTO `coments` (`id`, `date`, `name`, `username`, `post_id`, `email`, `image`, `coment`, `status`) VALUES
(3, 12121212, '', 'deepsa', 4, '', '', 'dejasadnakac jxbcckasbas', 'approved'),
(5, 1535356198, 'Deepak Raj', 'deepak1', 0, 'dee@mail.com', 'favicon.png', '123456789', 'approve'),
(6, 1535356459, 'Deepak Raj', 'deepak1', 0, 'dee@mail.com', 'favicon.png', '12334555', 'approve'),
(7, 1535356470, 'Deepak Raj', 'deepak1', 0, 'dee@mail.com', 'favicon.png', 'cja', 'approve'),
(8, 1535356542, 'Deepak Raj', 'deepak1', 0, 'dee@mail.com', 'favicon.png', 'asjhdajkdbja', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `prod_name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `cust_name` varchar(255) NOT NULL,
  `cust_addres` varchar(255) NOT NULL,
  `number` bigint(22) NOT NULL,
  `city` varchar(255) NOT NULL,
  `instruct` text NOT NULL,
  `date` int(11) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `prod_id`, `prod_name`, `price`, `cust_name`, `cust_addres`, `number`, `city`, `instruct`, `date`, `status`) VALUES
(1, 1, 'dee', 1234, 'deepak', 'dha', 3123456789, 'karachi', 'hhhhhhh', 0, 'confirm');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `detail` text NOT NULL,
  `price` int(11) NOT NULL,
  `cat_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `image`, `brand`, `size`, `detail`, `price`, `cat_id`) VALUES
(5, 'belt', 'logo.png', 'Levis', 'Large', 'Pure Leather.', 1500, 0),
(6, 'chain', 'favicon.png', 'D Jewlers', 'X-Samll', 'Aluminium', 15000, 0),
(7, 'shoes', 'images.jpg', 'Parlor', 'Medium', 'Lion leather', 25000, 0),
(8, 'bag', 'images.jpg', 'gucci', 'Small', 'leather with fine quality wheels', 14999, 0),
(9, 'belt', 'images (2).jpg', 'D&G', 'Small', 'fine leather', 5000, 0),
(10, 'belt', 'images (2).jpg', 'D&G', 'Small', 'fine leather', 5000, 0),
(11, 'GLASSES', 'BW-White-Lion-Wallpaper-HD.jpg', 'rayban', 'X-Samll', 'comfortable', 1599, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `salt` varchar(255) NOT NULL DEFAULT '$2y$10$quickbrownfoxjumpsover'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `date`, `first_name`, `last_name`, `username`, `email`, `image`, `password`, `role`, `details`, `salt`) VALUES
(8, 1533892730, 'Deepak', 'Raj', 'deepak1', 'dee@mail.com', 'favicon.png', '$2y$10$quickbrownfoxjumpsoveefXkylpKMwkYHIwNPw3s3ZpboG0tqpnO', 'admin', '      I am Admin.    ', '$2y$10$quickbrownfoxjumpsover'),
(10, 1534138281, 'Rohan', 'Raj', 'rohan', 'rohan@mail.com', 'logo.png', '$2y$10$quickbrownfoxjumpsoveeob1NkAIqYlnDNd6AAwE0Nv1BMtRiD26', 'author', '       Bro   ', '$2y$10$quickbrownfoxjumpsover'),
(12, 1534398219, 'faraz', 'kumar', 'faizu', 'faizu@mail.com', 'un.png', '$2y$10$quickbrownfoxjumpsovee2VSTnwk0PVLbOzNueOwLxjyiDighUXq', 'admin', ' Fakru', '$2y$10$quickbrownfoxjumpsover'),
(13, 12121234, 'deepak', 'dholia', 'dholia', 'dh@mail.co', 'un.png', '123', 'admin', 'qwertyuioplkjhgfdsazxcvbnm', '$2y$10$quickbrownfoxjumpsover');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`),
  ADD UNIQUE KEY `cat_name` (`cat_name`);

--
-- Indexes for table `coments`
--
ALTER TABLE `coments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `coments`
--
ALTER TABLE `coments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
