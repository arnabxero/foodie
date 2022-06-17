-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2022 at 07:01 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodie`
--

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE `restaurants` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `address` varchar(700) NOT NULL,
  `details` varchar(1000) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `map` varchar(500) NOT NULL,
  `pro_pic` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`id`, `name`, `address`, `details`, `phone`, `email`, `map`, `pro_pic`) VALUES
(1, 'Restaurant 1', 'Sylhet, Bangladesh', 'Restaurant 1 Restaurant 1Restaurant 1Restaurant 1Restaurant 1Restaurant 1Restaurant 1Restaurant 1', '123456789', 'Restaurant1@gmail.com', '', '\nRestaurant1.jpg'),
(2, 'Restaurant 2', 'Sylhet, Bangladesh', 'Restaurant 1 Restaurant 1Restaurant 1Restaurant 1Restaurant 1Restaurant 1Restaurant 1Restaurant 1', '123456789', 'Restaurant1@gmail.com', '', 'Restaurant2.jpg\r\n'),
(3, 'Restaurant 3', 'Sylhet, Bangladesh', 'Restaurant 1 Restaurant 1Restaurant 1Restaurant 1Restaurant 1Restaurant 1Restaurant 1Restaurant 1', '123456789', 'Restaurant1@gmail.com', '', 'Restaurant3.jpg\r\n'),
(4, 'Restaurant 4', 'Sylhet, Bangladesh', 'Restaurant 1 Restaurant 1Restaurant 1Restaurant 1Restaurant 1Restaurant 1Restaurant 1Restaurant 1', '123456789', 'Restaurant1@gmail.com', '', 'Restaurant4.jpg\r\n'),
(5, 'Restaurant 5', 'Sylhet, Bangladesh', 'Restaurant 1 Restaurant 1Restaurant 1Restaurant 1Restaurant 1Restaurant 1Restaurant 1Restaurant 1', '123456789', 'Restaurant1@gmail.com', '', 'Restaurant5.jpg\r\n'),
(6, 'Restaurant 6', 'Sylhet, Bangladesh', 'Restaurant 1 Restaurant 1Restaurant 1Restaurant 1Restaurant 1Restaurant 1Restaurant 1Restaurant 1', '123456789', 'Restaurant1@gmail.com', '', 'Restaurant6.jpg\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(300) NOT NULL,
  `userName` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `pass` varchar(300) NOT NULL,
  `phone` varchar(300) NOT NULL,
  `verified` varchar(30) NOT NULL DEFAULT 'N',
  `address` varchar(400) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `twitter` varchar(100) NOT NULL,
  `fb` varchar(100) NOT NULL,
  `instagram` varchar(100) NOT NULL,
  `pro_pic` varchar(200) NOT NULL,
  `join_date` varchar(100) NOT NULL,
  `posts` int(11) NOT NULL,
  `reviews` int(11) NOT NULL,
  `restaurants` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `userName`, `email`, `pass`, `phone`, `verified`, `address`, `last_name`, `twitter`, `fb`, `instagram`, `pro_pic`, `join_date`, `posts`, `reviews`, `restaurants`) VALUES
(2, 'Arnab', 'arnab', 'arnab.xero@gmail.com', 'arnab', '123456789', 'YES', 'Sylhet', 'Iftekhar', 'arnabxero', 'arnabxero', 'arnabxero', '2.jpg', '2022-06-12', 3, 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userName` (`userName`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
