-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 12, 2021 at 05:22 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `description` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `picture` text COLLATE utf8mb4_bin NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `description`, `picture`, `date`) VALUES
(1, 11, 'this is a test description #foodporn', 'images/doggo.jpg', '2021-04-01 01:01:01'),
(4, 11, 'hallo #test #cool ', 'red-3580560_1920.jpg', '2021-04-04 18:17:12'),
(5, 11, 'jhvkgjv #ellen', 'image.png', '2021-04-05 14:38:36'),
(6, 11, ';jhbjhbljb', 'image.png', '2021-04-12 13:51:07'),
(7, 11, 'jhbjh #je', 'noun_food waste_2230294.png', '2021-04-12 13:51:19'),
(8, 11, 'jhbkjh #', 'image.png', '2021-04-12 13:54:45'),
(9, 11, 'jhbkjh #', 'image.png', '2021-04-12 13:55:50'),
(10, 11, 'khbjkh #he #kd', 'image.png', '2021-04-12 13:56:20'),
(11, 11, 'khbjkh #he #kd', 'image.png', '2021-04-12 13:56:46'),
(12, 11, 'jhvjk #hey', 'image.png', '2021-04-12 13:57:13'),
(13, 11, 'he he he he', 'image.png', '2021-04-12 13:57:36'),
(14, 11, 'kjsdbf #hee', 'image.png', '2021-04-12 13:58:01'),
(15, 11, 'hehe he he #hallo', 'image.png', '2021-04-12 13:58:44'),
(16, 11, 'he he he #ha ha ha #te', 'image.png', '2021-04-12 13:59:40'),
(17, 11, 'he he he #ha ha ha #te', 'image.png', '2021-04-12 14:00:20'),
(18, 11, 'he he he #ha ha ha #te', 'image.png', '2021-04-12 14:01:09'),
(19, 11, 'he he he #ha ha ha #te', 'image.png', '2021-04-12 14:02:08'),
(20, 11, 'he he he #ha ha ha #te', 'image.png', '2021-04-12 14:02:40'),
(21, 11, 'lkeznfmkjsn  jksnkf', 'image.png', '2021-04-12 14:13:40'),
(22, 11, 'lkeznfmkjsn  jksnkf', 'image.png', '2021-04-12 14:16:04'),
(23, 11, 'lkeznfmkjsn  jksnkf', 'image.png', '2021-04-12 14:16:34'),
(24, 11, 'dfdf #ed', 'noun_food waste_2230294.png', '2021-04-12 14:20:40'),
(25, 11, 'dfdf #ed', 'noun_food waste_2230294.png', '2021-04-12 14:21:02'),
(26, 11, 'sdfjnsd #kdjsf', 'image.png', '2021-04-12 14:21:12'),
(27, 11, 'sdfjnsd #kdjsf', 'image.png', '2021-04-12 14:21:19'),
(28, 11, 'sdfjnsd #kdjsf', 'image.png', '2021-04-12 14:21:20'),
(29, 11, 'sdfsdf', 'image.png', '2021-04-12 14:21:28'),
(30, 11, 'sdfsdf #kd', 'noun_food waste_2230294.png', '2021-04-12 14:21:50'),
(31, 11, 'sdf #d', 'alexander-schimmeck-2zJhA9RSkys-unsplash.jpg', '2021-04-12 14:22:00'),
(32, 11, 'ldnf #lsdkfsldkfnslkdnflskdnflksnd', 'image.png', '2021-04-12 14:22:42'),
(33, 11, 'ldnf #lsdkfsldkfnslkdnflskdnflksnd', 'image.png', '2021-04-12 14:23:05'),
(34, 11, 'kdsbjfklsjdbf #test', 'alexander-schimmeck-2zJhA9RSkys-unsplash.jpg', '2021-04-12 14:23:29'),
(35, 11, 'kdsbjfklsjdbf #test', 'alexander-schimmeck-2zJhA9RSkys-unsplash.jpg', '2021-04-12 14:23:52'),
(36, 11, 'kdsbjfklsjdbf #test', 'alexander-schimmeck-2zJhA9RSkys-unsplash.jpg', '2021-04-12 14:24:22'),
(37, 11, 'sdkjfs #dsljfns', 'image.png', '2021-04-12 14:24:57'),
(38, 11, 'skjdfnklqsj #ldsjfn #test', 'noun_food waste_2230294.png', '2021-04-12 14:25:56'),
(39, 11, 'skjdfnklqsj #ldsjfn #test', 'noun_food waste_2230294.png', '2021-04-12 14:28:25'),
(40, 11, 'skjdfnklqsj #ldsjfn #test', 'noun_food waste_2230294.png', '2021-04-12 14:30:32'),
(41, 11, 'skjdfnklqsj #ldsjfn #test', 'noun_food waste_2230294.png', '2021-04-12 14:32:19'),
(42, 11, 'skjdfnklqsj #ldsjfn #test', 'noun_food waste_2230294.png', '2021-04-12 14:32:52'),
(43, 11, 'skjdfnklqsj #ldsjfn #test', 'noun_food waste_2230294.png', '2021-04-12 14:33:41'),
(44, 11, 'skjdfnklqsj #ldsjfn #test', 'noun_food waste_2230294.png', '2021-04-12 14:34:42'),
(45, 11, 'slkdfn #help', 'image.png', '2021-04-12 15:56:16'),
(46, 11, 'sdf #heee', 'image.png', '2021-04-12 15:56:28'),
(47, 11, 'sdf', 'image.png', '2021-04-12 15:58:22'),
(48, 11, 'sdf', 'image.png', '2021-04-12 15:59:38'),
(49, 11, 'sdfsdf #sdf', 'image.png', '2021-04-12 15:59:57'),
(50, 11, 'sdfsdf #sdf', 'image.png', '2021-04-12 16:02:48'),
(51, 11, 'sdfsdf #sdf', 'image.png', '2021-04-12 16:03:08'),
(52, 11, 'sdfsdf #sdf', 'image.png', '2021-04-12 16:03:09'),
(53, 11, 'sdf #sdf', 'alexander-schimmeck-2zJhA9RSkys-unsplash.jpg', '2021-04-12 16:03:18'),
(54, 11, 'sdf #sdf', 'alexander-schimmeck-2zJhA9RSkys-unsplash.jpg', '2021-04-12 16:03:35'),
(55, 11, 'sdf #sdf', 'alexander-schimmeck-2zJhA9RSkys-unsplash.jpg', '2021-04-12 16:03:37'),
(56, 11, 'sdf #sdf', 'alexander-schimmeck-2zJhA9RSkys-unsplash.jpg', '2021-04-12 16:03:37'),
(57, 11, 'sdf #sdf', 'alexander-schimmeck-2zJhA9RSkys-unsplash.jpg', '2021-04-12 16:03:38'),
(58, 11, 'sdf #sdf', 'alexander-schimmeck-2zJhA9RSkys-unsplash.jpg', '2021-04-12 16:03:38'),
(59, 11, 'sdf #sdf', 'alexander-schimmeck-2zJhA9RSkys-unsplash.jpg', '2021-04-12 16:03:38'),
(60, 11, 'sdf #sdf', 'alexander-schimmeck-2zJhA9RSkys-unsplash.jpg', '2021-04-12 16:03:39'),
(61, 11, 'sdf #sdf', 'alexander-schimmeck-2zJhA9RSkys-unsplash.jpg', '2021-04-12 16:03:39'),
(62, 11, 'sdf #sdf', 'alexander-schimmeck-2zJhA9RSkys-unsplash.jpg', '2021-04-12 16:03:40'),
(63, 11, 'sdf #sdf', 'alexander-schimmeck-2zJhA9RSkys-unsplash.jpg', '2021-04-12 16:03:40'),
(64, 11, 'sdf #sdf', 'alexander-schimmeck-2zJhA9RSkys-unsplash.jpg', '2021-04-12 16:03:40'),
(65, 11, 'sdf #sdf', 'alexander-schimmeck-2zJhA9RSkys-unsplash.jpg', '2021-04-12 16:03:40'),
(66, 11, 'sdf #sdf', 'alexander-schimmeck-2zJhA9RSkys-unsplash.jpg', '2021-04-12 16:03:41'),
(67, 11, 'sdf #sdf', 'alexander-schimmeck-2zJhA9RSkys-unsplash.jpg', '2021-04-12 16:03:41'),
(68, 11, 'sdf #sdf', 'alexander-schimmeck-2zJhA9RSkys-unsplash.jpg', '2021-04-12 16:03:41'),
(69, 11, 'sdf #sdf', 'alexander-schimmeck-2zJhA9RSkys-unsplash.jpg', '2021-04-12 16:03:41'),
(70, 11, 'sdf #sdf', 'alexander-schimmeck-2zJhA9RSkys-unsplash.jpg', '2021-04-12 16:03:41'),
(71, 11, 'sdf #sdf', 'alexander-schimmeck-2zJhA9RSkys-unsplash.jpg', '2021-04-12 16:03:41'),
(72, 11, 'sdf #sdf', 'alexander-schimmeck-2zJhA9RSkys-unsplash.jpg', '2021-04-12 16:10:23'),
(73, 11, 'sdf #sdf', 'alexander-schimmeck-2zJhA9RSkys-unsplash.jpg', '2021-04-12 16:10:53'),
(74, 11, 'sdf #sdf', 'alexander-schimmeck-2zJhA9RSkys-unsplash.jpg', '2021-04-12 16:11:42'),
(75, 11, 'sdf #sdf', 'alexander-schimmeck-2zJhA9RSkys-unsplash.jpg', '2021-04-12 16:13:27'),
(76, 11, 'sdf #sdf', 'alexander-schimmeck-2zJhA9RSkys-unsplash.jpg', '2021-04-12 16:20:08'),
(77, 11, 'dsfsdf', 'noun_food waste_2230294.png', '2021-04-12 16:20:16'),
(78, 11, 'sdf', 'image.png', '2021-04-12 16:20:29'),
(79, 11, 'sdf', 'image.png', '2021-04-12 16:21:24'),
(80, 11, 'sdkfj #sd,f', 'noun_food waste_2230294.png', '2021-04-12 16:21:34'),
(81, 11, 'help #help', 'alexander-schimmeck-2zJhA9RSkys-unsplash.jpg', '2021-04-12 16:22:13'),
(82, 11, 'sdf', 'alexander-schimmeck-2zJhA9RSkys-unsplash.jpg', '2021-04-12 16:24:54'),
(83, 11, 'sdf', 'alexander-schimmeck-2zJhA9RSkys-unsplash.jpg', '2021-04-12 16:25:14'),
(84, 11, 'sdf', 'alexander-schimmeck-2zJhA9RSkys-unsplash.jpg', '2021-04-12 16:26:08'),
(85, 11, 'sdf', 'alexander-schimmeck-2zJhA9RSkys-unsplash.jpg', '2021-04-12 16:26:23'),
(86, 11, 'sdf', 'alexander-schimmeck-2zJhA9RSkys-unsplash.jpg', '2021-04-12 16:28:42'),
(87, 11, 'sdf', 'alexander-schimmeck-2zJhA9RSkys-unsplash.jpg', '2021-04-12 16:28:54'),
(88, 11, 'sdf', 'alexander-schimmeck-2zJhA9RSkys-unsplash.jpg', '2021-04-12 16:30:11'),
(89, 11, 'sdf', 'alexander-schimmeck-2zJhA9RSkys-unsplash.jpg', '2021-04-12 16:31:12'),
(90, 11, 'sdf', 'alexander-schimmeck-2zJhA9RSkys-unsplash.jpg', '2021-04-12 16:31:25'),
(91, 11, 'sdf', 'alexander-schimmeck-2zJhA9RSkys-unsplash.jpg', '2021-04-12 16:31:45'),
(92, 11, 'sdf', 'alexander-schimmeck-2zJhA9RSkys-unsplash.jpg', '2021-04-12 16:31:50'),
(93, 11, 'sdf', 'alexander-schimmeck-2zJhA9RSkys-unsplash.jpg', '2021-04-12 16:32:53'),
(94, 11, 'test test test goes the test', 'image.png', '2021-04-12 16:39:42'),
(95, 11, 'sldjfn #test', 'image.png', '2021-04-12 17:13:18');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `tag_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `tag_name`) VALUES
(1, '#foodporn'),
(2, '#test'),
(3, '#ellen'),
(4, '#housekeeping'),
(5, '#ldsjfn'),
(6, '#help'),
(7, '#heee'),
(8, '#sdf'),
(9, '#sd,f');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`) VALUES
(1, 'Bailey', 'Lievens', 'Email'),
(6, 'Bailey', 'password', 'b@lievens.be'),
(11, 'ellen', '$2y$12$ZgHR/QaqzcruCktLjzhaB.cfSeLKSEiHjNLkM1rlOf63itxWq2YDi', 'ellen'),
(12, 'test', '$2y$12$p5l.riMYDIRDZdQZYpZnf.tA6Bl338YdLPHxpw.5.lPCt3C2v25bG', 'test@test.be'),
(13, 'elleeeeeeen2', '$2y$12$lW8p4dLcXGm2rW3HMQIRLeej60lGViKaJjszi1Ar/wfe4HKt/vtwC', 'ellen@gmail.be'),
(14, 'EllenTheVelo', '$2y$12$Dwbw.5MKeUHPQPdpZeA8Muh21Sh1mE6N7dK69V0T3qLv1WfNfDl6G', 'Ellen@gm.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
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
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
