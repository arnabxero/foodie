-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2022 at 06:41 AM
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
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `caption` varchar(500) NOT NULL,
  `photo_link` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post` varchar(10000) NOT NULL,
  `date_time` varchar(100) NOT NULL,
  `title` varchar(400) NOT NULL,
  `photo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `post`, `date_time`, `title`, `photo`) VALUES
(1, 2, 'Post 1 by user 2 - Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit exercitationem officia et debitis. Dolore, fugit a ea itaque dicta omnis accusantium reiciendis vitae, tempore atque explicabo fugiat quaerat enim deserunt? Lorem ipsum dolor, sit amet consectetur adipisicing elit. Impedit culpa nisi veritatis nesciunt aperiam dignissimos doloremque voluptatum cupiditate omnis, inventore ut alias consequatur velit! Nulla ea qui quod dolorum modi!Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit exercitationem officia et debitis. Dolore, fugit a ea itaque dicta omnis accusantium reiciendis vitae, tempore atque explicabo fugiat quaerat enim deserunt? Lorem ipsum dolor, sit amet consectetur adipisicing elit. Impedit culpa nisi veritatis nesciunt aperiam dignissimos doloremque voluptatum cupiditate omnis, inventore ut alias consequatur velit! Nulla ea qui quod dolorum modi!Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit exercitationem officia et debitis. Dolore, fugit a ea itaque dicta omnis accusantium reiciendis vitae, tempore atque explicabo fugiat quaerat enim deserunt? Lorem ipsum dolor, sit amet consectetur adipisicing elit. Impedit culpa nisi veritatis nesciunt aperiam dignissimos doloremque voluptatum cupiditate omnis, inventore ut alias consequatur velit! Nulla ea qui quod dolorum modi!', '12-12-1212 12:12AM', 'Post - 1 Hello hello hello hello hess Worl', ''),
(2, 2, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit exercitationem officia et debitis. Dolore, fugit a ea itaque dicta omnis accusantium reiciendis vitae, tempore atque explicabo fugiat quaerat enim deserunt? Lorem ipsum dolor, sit amet consectetur adipisicing elit. Impedit culpa nisi veritatis nesciunt aperiam dignissimos doloremque voluptatum cupiditate omnis, inventore ut alias consequatur velit! Nulla ea qui quod dolorum modi!Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit exercitationem officia et debitis. Dolore, fugit a ea itaque dicta omnis accusantium reiciendis vitae, tempore atque explicabo fugiat quaerat enim deserunt? Lorem ipsum dolor, sit amet consectetur adipisicing elit. Impedit culpa nisi veritatis nesciunt aperiam dignissimos doloremque voluptatum cupiditate omnis, inventore ut alias consequatur velit! Nulla ea qui quod dolorum modi!Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit exercitationem officia et debitis. Dolore, fugit a ea itaque dicta omnis accusantium reiciendis vitae, tempore atque explicabo fugiat quaerat enim deserunt? Lorem ipsum dolor, sit amet consectetur adipisicing elit. Impedit culpa nisi veritatis nesciunt aperiam dignissimos doloremque voluptatum cupiditate omnis, inventore ut alias consequatur velit! Nulla ea qui quod dolorum modi! abcdefgshek', '12-12-1212 12:12AM', 'Post - 2 Hello hello hello hello hess Worl', ''),
(3, 3, 'Post 3 by user 3 - Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit exercitationem officia et debitis. Dolore, fugit a ea itaque dicta omnis accusantium reiciendis vitae, tempore atque explicabo fugiat quaerat enim deserunt? Lorem ipsum dolor, sit amet consectetur adipisicing elit. Impedit culpa nisi veritatis nesciunt aperiam dignissimos doloremque voluptatum cupiditate omnis, inventore ut alias consequatur velit! Nulla ea qui quod dolorum modi!Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit exercitationem officia et debitis. Dolore, fugit a ea itaque dicta omnis accusantium reiciendis vitae, tempore atque explicabo fugiat quaerat enim deserunt? Lorem ipsum dolor, sit amet consectetur adipisicing elit. Impedit culpa nisi veritatis nesciunt aperiam dignissimos doloremque voluptatum cupiditate omnis, inventore ut alias consequatur velit! Nulla ea qui quod dolorum modi!Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit exercitationem officia et debitis. Dolore, fugit a ea itaque dicta omnis accusantium reiciendis vitae, tempore atque explicabo fugiat quaerat enim deserunt? Lorem ipsum dolor, sit amet consectetur adipisicing elit. Impedit culpa nisi veritatis nesciunt aperiam dignissimos doloremque voluptatum cupiditate omnis, inventore ut alias consequatur velit! Nulla ea qui quod dolorum modi!', '12-12-1212 | 12:12AM', 'Post 3 title Hello hello hello hello hess WorlHello hello hello hello hess Worl', ''),
(4, 2, 'Post 4 by user 2 - Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit exercitationem officia et debitis. Dolore, fugit a ea itaque dicta omnis accusantium reiciendis vitae, tempore atque explicabo fugiat quaerat enim deserunt? Lorem ipsum dolor, sit amet consectetur adipisicing elit. Impedit culpa nisi veritatis nesciunt aperiam dignissimos doloremque voluptatum cupiditate omnis, inventore ut alias consequatur velit! Nulla ea qui quod dolorum modi!Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit exercitationem officia et debitis. Dolore, fugit a ea itaque dicta omnis accusantium reiciendis vitae, tempore atque explicabo fugiat quaerat enim deserunt? Lorem ipsum dolor, sit amet consectetur adipisicing elit. Impedit culpa nisi veritatis nesciunt aperiam dignissimos doloremque voluptatum cupiditate omnis, inventore ut alias consequatur velit! Nulla ea qui quod dolorum modi!Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit exercitationem officia et debitis. Dolore, fugit a ea itaque dicta omnis accusantium reiciendis vitae, tempore atque explicabo fugiat quaerat enim deserunt? Lorem ipsum dolor, sit amet consectetur adipisicing elit. Impedit culpa nisi veritatis nesciunt aperiam dignissimos doloremque voluptatum cupiditate omnis, inventore ut alias consequatur velit! Nulla ea qui quod dolorum modi!', '12-12-1212 | 12:12AM', 'Post 4 title Hello hello hello hello hess WorlHello hello hello hello hess WorlHello hello hello hello hess WorlHello hello hello hello hess Worl', ''),
(5, 4, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit exercitationem officia et debitis. Dolore, fugit a ea itaque dicta omnis accusantium reiciendis vitae, tempore atque explicabo fugiat quaerat enim deserunt? Lorem ipsum dolor, sit amet consectetur adipisicing elit. Impedit culpa nisi veritatis nesciunt aperiam dignissimos doloremque voluptatum cupiditate omnis, inventore ut alias consequatur velit! Nulla ea qui quod dolorum modi!Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit exercitationem officia et debitis. Dolore, fugit a ea itaque dicta omnis accusantium reiciendis vitae, tempore atque explicabo fugiat quaerat enim deserunt? Lorem ipsum dolor, sit amet consectetur adipisicing elit. Impedit culpa nisi veritatis nesciunt aperiam dignissimos doloremque voluptatum cupiditate omnis, inventore ut alias consequatur velit! Nulla ea qui quod dolorum modi!Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit exercitationem officia et debitis. Dolore, fugit a ea itaque dicta omnis accusantium reiciendis vitae, tempore atque explicabo fugiat quaerat enim deserunt? Lorem ipsum dolor, sit amet consectetur adipisicing elit. Impedit culpa nisi veritatis nesciunt aperiam dignissimos doloremque voluptatum cupiditate omnis, inventore ut alias consequatur velit! Nulla ea qui quod dolorum modi!Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit exercitationem officia et debitis. Dolore, fugit a ea itaque dicta omnis accusantium reiciendis vitae, tempore atque explicabo fugiat quaerat enim deserunt? Lorem ipsum dolor, sit amet consectetur adipisicing elit. Impedit culpa nisi veritatis nesciunt aperiam dignissimos doloremque voluptatum cupiditate omnis, inventore ut alias consequatur velit! Nulla ea qui quod dolorum modi!Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit exercitationem officia et debitis. Dolore, fugit a ea itaque dicta omnis accusantium reiciendis vitae, tempore atque explicabo fugiat quaerat enim deserunt? Lorem ipsum dolor, sit amet consectetur adipisicing elit. Impedit culpa nisi veritatis nesciunt aperiam dignissimos doloremque voluptatum cupiditate omnis, inventore ut alias consequatur velit! Nulla ea qui quod dolorum modi!Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit exercitationem officia et debitis. Dolore, fugit a ea itaque dicta omnis accusantium reiciendis vitae, tempore atque explicabo fugiat quaerat enim deserunt? Lorem ipsum dolor, sit amet consectetur adipisicing elit. Impedit culpa nisi veritatis nesciunt aperiam dignissimos doloremque voluptatum cupiditate omnis, inventore ut alias consequatur velit! Nulla ea qui quod dolorum modi!', '12-12-1212 | 12:12AM', 'Hello hello hello hello hess WorlHello hello hello hello hess WorlHello hello hello hello hess Worl', ''),
(6, 3, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit exercitationem officia et debitis. Dolore, fugit a ea itaque dicta omnis accusantium reiciendis vitae, tempore atque explicabo fugiat quaerat enim deserunt? Lorem ipsum dolor, sit amet consectetur adipisicing elit. Impedit culpa nisi veritatis nesciunt aperiam dignissimos doloremque voluptatum cupiditate omnis, inventore ut alias consequatur velit! Nulla ea qui quod dolorum modi!Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit exercitationem officia et debitis. Dolore, fugit a ea itaque dicta omnis accusantium reiciendis vitae, tempore atque explicabo fugiat quaerat enim deserunt? Lorem ipsum dolor, sit amet consectetur adipisicing elit. Impedit culpa nisi veritatis nesciunt aperiam dignissimos doloremque voluptatum cupiditate omnis, inventore ut alias consequatur velit! Nulla ea qui quod dolorum modi!Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit exercitationem officia et debitis. Dolore, fugit a ea itaque dicta omnis accusantium reiciendis vitae, tempore atque explicabo fugiat quaerat enim deserunt? Lorem ipsum dolor, sit amet consectetur adipisicing elit. Impedit culpa nisi veritatis nesciunt aperiam dignissimos doloremque voluptatum cupiditate omnis, inventore ut alias consequatur velit! Nulla ea qui quod dolorum modi!Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit exercitationem officia et debitis. Dolore, fugit a ea itaque dicta omnis accusantium reiciendis vitae, tempore atque explicabo fugiat quaerat enim deserunt? Lorem ipsum dolor, sit amet consectetur adipisicing elit. Impedit culpa nisi veritatis nesciunt aperiam dignissimos doloremque voluptatum cupiditate omnis, inventore ut alias consequatur velit! Nulla ea qui quod dolorum modi!Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit exercitationem officia et debitis. Dolore, fugit a ea itaque dicta omnis accusantium reiciendis vitae, tempore atque explicabo fugiat quaerat enim deserunt? Lorem ipsum dolor, sit amet consectetur adipisicing elit. Impedit culpa nisi veritatis nesciunt aperiam dignissimos doloremque voluptatum cupiditate omnis, inventore ut alias consequatur velit! Nulla ea qui quod dolorum modi!Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit exercitationem officia et debitis. Dolore, fugit a ea itaque dicta omnis accusantium reiciendis vitae, tempore atque explicabo fugiat quaerat enim deserunt? Lorem ipsum dolor, sit amet consectetur adipisicing elit. Impedit culpa nisi veritatis nesciunt aperiam dignissimos doloremque voluptatum cupiditate omnis, inventore ut alias consequatur velit! Nulla ea qui quod dolorum modi!', '12-12-1212 | 12:12AM', 'Hello hello hello hello hess WorlHello hello hello hello hess Worl', ''),
(7, 2, '<p>test post 1test post 1test post 1test post 1test post 1test post 1test post 1test post 1test post 1test post 1test post 1test post 1test post 1test post 1test post 1test post 1test post 1test post 1test post 1test post 1test post 1test post 1test post 1test post 1test post 1test post 1test post 1test post 1test post 1test post 1test post 1test post 1test post 1test post 1test post 1</p>\r\n', '09:56 AM|2022/06/18', 'test post 1', '8SFFpr12TMrD7RL9qKjw2.jpg'),
(8, 2, '<p>test post 3test post 3test post 3test post 3</p>\r\n', '10:07 AM|2022/06/18', 'test post 3', 'SPwOarFRDwmIa5LtWmbk2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(6, 'Restaurant 6', 'Sylhet, Bangladesh', 'Restaurant 1 Restaurant 1Restaurant 1Restaurant 1Restaurant 1Restaurant 1Restaurant 1Restaurant 1', '123456789', 'Restaurant1@gmail.com', '', 'Restaurant6.jpg\r\n'),
(7, 'wqertyterwe', 'qwereqwsxdqsdxqwd', 'wqerfdweqfqedqedqwedqwdactiveactiveactivewqcfqedqewd', '1234565432', 'daqjnoa@gmail.com', '', 'Restaurant7.jpg\n');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `review` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(2, 'Arnabup', 'arnab', 'arnab.xero@gmail.com', 'arnab', '123456789up', 'YES', 'Sylhetup', 'Iftekhar', 'arnabxeroup', 'arnabxeroup', 'arnabxeroup', '2.jpg', '2022-06-12', 3, 2, 1),
(3, 'Swadhin', 'swadhin', 'swadhin@gmail.com', 'swadhin', '123211122', 'YES', 'wqertyrerwwsas', 'Ghosh', 'swadhin', 'swadhin', 'swadhin', '3.jpg', '12-12-1212', 1, 0, 0),
(4, 'Laboni', 'laboni', 'laboni@gmail.com', 'laboni', '213123123', 'YES', 'qwerttyrweqsadc', 'Jannat', 'laboni', 'laboni', 'laboni', '4.jpg', '12-12-1212', 1, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
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
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
