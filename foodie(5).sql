-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2022 at 06:40 PM
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
(7, 'Updated Comment😃😃😃😃', 2, 6, '01:03 AM | 2022/06/24'),
(8, 'Nice post. thanks 🙂', 2, 1, '09:38 PM | 2022/06/27');

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
(3, 2, 1),
(5, 2, 6),
(6, 2, 7);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `rest_id` int(11) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `price` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `rest_id`, `name`, `price`) VALUES
(1, 10, 'Chicken Biriyani', '200 BDT'),
(2, 10, 'Kacchi Biriyani', '300 BDT'),
(3, 10, 'Plain Polao', '100 BDT'),
(4, 1, 'Biriyani', '257 BDT'),
(5, 12, 'Kacchi Biriyani', '240'),
(6, 12, 'Chicken Biriyani', '180'),
(7, 12, 'Rice + Fish + Daal', '150'),
(8, 11, 'Plain Polao', '100'),
(9, 11, 'Chicken Grill', '250 BDT');

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
  `map_lng` varchar(500) NOT NULL,
  `rate` varchar(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`id`, `name`, `address`, `details`, `phone`, `email`, `map_lat`, `pro_pic`, `owner_id`, `map_lng`, `rate`) VALUES
(1, 'Restaurant 1', 'Sylhet, Bangladesh', 'Restaurant 1 Restaurant 1Restaurant 1Restaurant 1Restaurant 1Restaurant 1Restaurant 1Restaurant 1', '123456789', 'Restaurant1@gmail.com', '24.907485620404067', '\nRestaurant1.jpg', 2, '91.83337971685833', '0'),
(2, 'Restaurant 2', 'Sylhet, Bangladesh', 'Restaurant 1 Restaurant 1Restaurant 1Restaurant 1Restaurant 1Restaurant 1Restaurant 1Restaurant 1', '123456789', 'Restaurant1@gmail.com', '', 'Restaurant2.jpg\r\n', 0, '', '0'),
(3, 'Restaurant 3', 'Sylhet, Bangladesh', 'Restaurant 1 Restaurant 1Restaurant 1Restaurant 1Restaurant 1Restaurant 1Restaurant 1Restaurant 1', '123456789', 'Restaurant1@gmail.com', '', 'Restaurant3.jpg\r\n', 0, '', '0'),
(4, 'Restaurant 4', 'Sylhet, Bangladesh', 'Restaurant 1 Restaurant 1Restaurant 1Restaurant 1Restaurant 1Restaurant 1Restaurant 1Restaurant 1', '123456789', 'Restaurant1@gmail.com', '', 'Restaurant4.jpg\r\n', 0, '', '0'),
(5, 'Restaurant 5', 'Sylhet, Bangladesh', 'Restaurant 1 Restaurant 1Restaurant 1Restaurant 1Restaurant 1Restaurant 1Restaurant 1Restaurant 1', '123456789', 'Restaurant1@gmail.com', '', 'Restaurant5.jpg\r\n', 0, '', '0'),
(6, 'Restaurant 6', 'Sylhet, Bangladesh', 'Restaurant 1 Restaurant 1Restaurant 1Restaurant 1Restaurant 1Restaurant 1Restaurant 1Restaurant 1', '123456789', 'Restaurant1@gmail.com', '', 'Restaurant6.jpg\r\n', 0, '', '0'),
(8, 'testrest1', 'testrest1testrest1testrest1', 'testrest1testrest1testrest1testrest1testrest1testrest1testrest1testrest1testrest1', '123451212', 'testrest1@gmail.com', '', 'qtLrmnmcqHXMGk6XQjKb2.jpg', 2, '', '0'),
(9, 'qwertrewq', 'wqewfcdqascqac', 'qdcqscqacdqdq', '1234342', 'asada@gmail.com', '24.90050186009483', '2k1KYyagP38WoyasHdBY2.jpg', 2, '91.84720054543244', '0'),
(10, 'Updated Restaurant 20', 'Updated Housing Estate, Amberkhana, Sylhet Sadar', 'Updated Details of Restaurant 20, Details of Restaurant 20, Details of Restaurant 20, Details of Restaurant 20, Details of Restaurant 20, Details of Restaurant 20, Details of Restaurant 20, Details of Restaurant 20, Details of Restaurant 20, Details of Restaurant 20, Details of Restaurant 20, Details of Restaurant 20, Details of Restaurant 20, Details of Restaurant 20, Details of Restaurant 20, Details of Restaurant 20, Details of Restaurant 20, Details of Restaurant 20, ', 'Updated 123413121312', 'Updatedrestaurant20@gmail.com', '57.384161908097916', '25wFsFBzj1i85X2mJlIM2.jpg', 2, '-789.1404178767158', '0'),
(11, 'Palki Restaurant', 'Level - 3, 34/C, Road - 6,  Amberkhana, Sylhet Sadar, Sylhet, Bangladesh', 'This is a renowned restaurant in sylhet. It has a great variety of authentic cuisines.  This is popular among tourists.', '21345442312', 'palki@gmail.com', '24.89533424068998', '4w6lBjS8YFN2nNKokOrA2.png', 2, '91.86814036827457', '0'),
(12, 'Panshi Restaurant', '57/C, Road - 13,  Lamabazar, Sylhet Sadar, Sylhet, Bangladesh', 'This is a renowned restaurant in sylhet. It has a great variety of authentic cuisines.  This is popular among tourists. They also provide online home delivery via Foodpanda or other local food delivery services. Please visit or contact us to know more.', '120398713812', 'panshi@gmail.com', '24.897307705053038', 'Lbc4bttJrdyXo7T69o793.jpg', 3, '91.86826819296952', '2.888888888');

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
(4, 9, 2, 'dnqewodklq kdqedqwed😉😉😉', 3, '03:38 PM | 2022/06/26'),
(7, 11, 3, 'Quite good but too much busy. 😐', 3, '01:25 PM | 2022/07/01'),
(8, 12, 3, 'Very Good Restaurant.😃', 4, '01:29 PM | 2022/07/01'),
(9, 12, 2, 'Very bad food', 1, '07:55 AM | 2022/07/02'),
(10, 1, 2, '', 1, '10:20 PM | 2022/07/02'),
(11, 12, 2, '', 4, '10:33 PM | 2022/07/02'),
(12, 12, 2, '', 0, '10:34 PM | 2022/07/02'),
(13, 12, 2, '', 2, '10:36 PM | 2022/07/02'),
(14, 12, 2, '', 4, '10:36 PM | 2022/07/02'),
(15, 12, 2, '', 5, '10:37 PM | 2022/07/02'),
(16, 12, 2, '', 4, '10:38 PM | 2022/07/02'),
(17, 12, 2, '', 2, '10:38 PM | 2022/07/02');

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
-- Indexes for table `menu`
--
ALTER TABLE `menu`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
