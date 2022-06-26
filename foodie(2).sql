-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2022 at 11:43 AM
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
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `time` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `content`, `user_id`, `post_id`, `time`) VALUES
(1, 'this is the first comment of this site', 3, 7, '12:12:1212 | 12:12AM'),
(2, 'wfcqeqd😃😃😃😃', 2, 7, '08:32 PM|2022/06/23'),
(3, '😊😉😘🥰😚🤪', 2, 7, '08:51 PM|2022/06/23'),
(4, '😋😋😝😙', 2, 7, '08:52 PM | 2022/06/23'),
(5, 'hi👋👋👋🤚🖐👌️', 2, 6, '12:32 AM | 2022/06/24'),
(6, 'dcfqedqedqd🙂🙂🙂', 2, 6, '01:03 AM | 2022/06/24'),
(7, 'wqeretytuytrerweq', 2, 6, '01:03 AM | 2022/06/24');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `post_id`) VALUES
(2, 2, 6);

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
(7, 2, '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit exercitationem officia et debitis. Dolore, fugit a ea itaque dicta omnis accusantium reiciendis vitae, tempore atque explicabo fugiat quaerat enim deserunt? Lorem ipsum dolor, sit amet consectetur adipisicing elit. Impedit culpa nisi veritatis nesciunt aperiam dignissimos doloremque voluptatum cupiditate omnis, inventore ut alias consequatur velit! Nulla ea qui quod dolorum modi!Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit exercitationem officia et debitis. Dolore, fugit a ea itaque dicta omnis accusantium reiciendis vitae, tempore atque explicabo fugiat quaerat enim deserunt? Lorem ipsum dolor, sit amet consectetur adipisicing elit. Impedit culpa nisi veritatis nesciunt aperiam dignissimos doloremque voluptatum cupiditate omnis, inventore ut alias consequatur velit! Nulla ea qui quod dolorum modi!Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit exercitationem officia et debitis. Dolore, fugit a ea itaque dicta omnis accusantium reiciendis vitae, tempore atque explicabo fugiat quaerat enim deserunt? Lorem ipsum dolor, sit amet consectetur adipisicing elit. Impedit culpa nisi veritatis nesciunt aperiam dignissimos doloremque voluptatum cupiditate omnis, inventore ut alias consequatur velit! Nulla ea qui quod dolorum modi!Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit exercitationem officia et debitis. Dolore, fugit a ea itaque dicta omnis accusantium reiciendis vitae, tempore atque explicabo fugiat quaerat enim deserunt? Lorem ipsum dolor, sit amet consectetur adipisicing elit. Impedit culpa nisi veritatis nesciunt aperiam dignissimos doloremque voluptatum cupiditate omnis, inventore ut alias consequatur velit! Nulla ea qui quod dolorum modi!Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit exercitationem officia et debitis. Dolore, fugit a ea itaque dicta omnis accusantium reiciendis vitae, tempore atque explicabo fugiat quaerat enim deserunt? Lorem ipsum dolor, sit amet consectetur adipisicing elit. Impedit culpa nisi veritatis nesciunt aperiam dignissimos doloremque voluptatum cupiditate omnis, inventore ut alias consequatur velit! Nulla ea qui quod dolorum modi!Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit exercitationem officia et debitis. Dolore, fugit a ea itaque dicta omnis accusantium reiciendis vitae, tempore atque explicabo fugiat quaerat enim deserunt? Lorem ipsum dolor, sit amet consectetur adipisicing elit. Impedit culpa nisi veritatis nesciunt aperiam dignissimos doloremque voluptatum cupiditate omnis, inventore ut alias consequatur velit! Nulla ea qui quod dolorum modi!</p>\r\n', '09:56 AM|2022/06/18', 'test post 1', '8SFFpr12TMrD7RL9qKjw2.jpg');

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
  `map_lat` varchar(500) NOT NULL,
  `pro_pic` varchar(300) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `map_lng` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`id`, `name`, `address`, `details`, `phone`, `email`, `map_lat`, `pro_pic`, `owner_id`, `map_lng`) VALUES
(1, 'Restaurant 1', 'Sylhet, Bangladesh', 'Restaurant 1 Restaurant 1Restaurant 1Restaurant 1Restaurant 1Restaurant 1Restaurant 1Restaurant 1', '123456789', 'Restaurant1@gmail.com', '', '\nRestaurant1.jpg', 2, ''),
(2, 'Restaurant 2', 'Sylhet, Bangladesh', 'Restaurant 1 Restaurant 1Restaurant 1Restaurant 1Restaurant 1Restaurant 1Restaurant 1Restaurant 1', '123456789', 'Restaurant1@gmail.com', '', 'Restaurant2.jpg\r\n', 0, ''),
(3, 'Restaurant 3', 'Sylhet, Bangladesh', 'Restaurant 1 Restaurant 1Restaurant 1Restaurant 1Restaurant 1Restaurant 1Restaurant 1Restaurant 1', '123456789', 'Restaurant1@gmail.com', '', 'Restaurant3.jpg\r\n', 0, ''),
(4, 'Restaurant 4', 'Sylhet, Bangladesh', 'Restaurant 1 Restaurant 1Restaurant 1Restaurant 1Restaurant 1Restaurant 1Restaurant 1Restaurant 1', '123456789', 'Restaurant1@gmail.com', '', 'Restaurant4.jpg\r\n', 0, ''),
(5, 'Restaurant 5', 'Sylhet, Bangladesh', 'Restaurant 1 Restaurant 1Restaurant 1Restaurant 1Restaurant 1Restaurant 1Restaurant 1Restaurant 1', '123456789', 'Restaurant1@gmail.com', '', 'Restaurant5.jpg\r\n', 0, ''),
(6, 'Restaurant 6', 'Sylhet, Bangladesh', 'Restaurant 1 Restaurant 1Restaurant 1Restaurant 1Restaurant 1Restaurant 1Restaurant 1Restaurant 1', '123456789', 'Restaurant1@gmail.com', '', 'Restaurant6.jpg\r\n', 0, ''),
(7, 'wqertyterwe', 'qwereqwsxdqsdxqwd', 'wqerfdweqfqedqedqwedqwdactiveactiveactivewqcfqedqewd', '1234565432', 'daqjnoa@gmail.com', '', 'Restaurant7.jpg\n', 0, ''),
(8, 'testrest1', 'testrest1testrest1testrest1', 'testrest1testrest1testrest1testrest1testrest1testrest1testrest1testrest1testrest1', '123451212', 'testrest1@gmail.com', '', 'qtLrmnmcqHXMGk6XQjKb2.jpg', 2, ''),
(9, 'qwertrewq', 'wqewfcdqascqac', 'qdcqscqacdqdq', '1234342', 'asada@gmail.com', '24.90050186009483', '2k1KYyagP38WoyasHdBY2.jpg', 2, '91.84720054543244'),
(10, 'Restaurant 20', 'Housing Estate, Amberkhana, Sylhet Sadar', 'Details of Restaurant 20, Details of Restaurant 20, Details of Restaurant 20, Details of Restaurant 20, Details of Restaurant 20, Details of Restaurant 20, Details of Restaurant 20, Details of Restaurant 20, Details of Restaurant 20, Details of Restaurant 20, Details of Restaurant 20, Details of Restaurant 20, Details of Restaurant 20, Details of Restaurant 20, Details of Restaurant 20, Details of Restaurant 20, Details of Restaurant 20, Details of Restaurant 20, ', '123413121312', 'restaurant20@gmail.com', '24.909114114314008', '25wFsFBzj1i85X2mJlIM2.jpg', 2, '91.86620244546815');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `rest_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `review` varchar(1000) NOT NULL,
  `rate` int(11) NOT NULL DEFAULT 0,
  `time` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `rest_id`, `user_id`, `review`, `rate`, `time`) VALUES
(1, 10, 2, 'first review😃', 2, '03:02 PM|2022/06/26'),
(2, 10, 2, 'qdqdqdqwd🙂🙂🙂🙂', 4, '03:08 PM|2022/06/26'),
(3, 10, 2, 'wqweretryter😃😃', 1, '03:09 PM|2022/06/26'),
(4, 9, 2, 'dnqewodklq kdqedqwed😉😉😉', 3, '03:38 PM | 2022/06/26');

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
  `restaurants` int(11) NOT NULL,
  `rank` varchar(200) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `userName`, `email`, `pass`, `phone`, `verified`, `address`, `last_name`, `twitter`, `fb`, `instagram`, `pro_pic`, `join_date`, `posts`, `reviews`, `restaurants`, `rank`) VALUES
(2, 'Iftekhhar', 'arnab', 'arnab.xero@gmail.com', 'arnab', '123456789', 'YES', 'Sylhet', 'Arnab', 'arnab_xero', 'arnab.official', 'iftekhar_arnab', '2.jpg', '19/06/2022', 3, 2, 1, 'admin'),
(3, 'Swadhin', 'swadhin', 'swadhin@gmail.com', 'swadhin', '123211122', 'YES', 'wqertyrerwwsas', 'Ghosh', 'swadhin', 'swadhin', 'swadhin', '3.jpg', '12-12-1212', 1, 0, 0, 'user'),
(4, 'Laboni', 'laboni', 'laboni@gmail.com', 'laboni', '213123123', 'YES', 'qwerttyrweqsadc', 'Jannat', 'laboni', 'laboni', 'laboni', '4.jpg', '12-12-1212', 1, 0, 0, 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
