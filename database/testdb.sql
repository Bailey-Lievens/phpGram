-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 18, 2021 at 09:38 AM
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
(166, 11, 'test', 'post_uploads/ellen_post_20210418091635.jpg', '2021-04-18 09:16:35'),
(167, 1, 'test1', 'post_uploads/ellen_post_20210418091803.jpg', '2021-04-18 09:18:03'),
(168, 6, 'test2', 'post_uploads/ellen_post_20210418091818.jpg', '2021-04-18 09:18:18'),
(169, 1, 'test1', 'post_uploads/ellen_post_20210418091803.jpg', '2021-04-18 09:18:03'),
(170, 1, 'test1', 'post_uploads/ellen_post_20210418091803.jpg', '2021-04-18 09:18:03'),
(171, 11, 'test', 'post_uploads/ellen_post_20210418091635.jpg', '2021-04-18 09:16:35'),
(172, 1, 'test1', 'post_uploads/ellen_post_20210418091803.jpg', '2021-04-18 09:18:03'),
(174, 11, 'test', 'post_uploads/ellen_post_20210418091635.jpg', '2021-04-18 09:16:35'),
(175, 6, 'test2', 'post_uploads/ellen_post_20210418091818.jpg', '2021-04-18 09:18:18'),
(176, 6, 'test2', 'post_uploads/ellen_post_20210418091818.jpg', '2021-04-18 09:18:18');

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
  `email` varchar(255) NOT NULL,
  `biography` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `biography`) VALUES
(1, 'Bailey', 'Lievens', 'Email', NULL),
(6, 'Bailey2', 'password', 'b@lievens.be', 'test bio Bailey'),
(11, 'ellen', '$2y$12$ZgHR/QaqzcruCktLjzhaB.cfSeLKSEiHjNLkM1rlOf63itxWq2YDi', 'ellen', 'test bio ellen'),
(12, 'test', '$2y$12$p5l.riMYDIRDZdQZYpZnf.tA6Bl338YdLPHxpw.5.lPCt3C2v25bG', 'test@test.be', 'test bio test'),
(13, 'elleeeeeeen2', '$2y$12$lW8p4dLcXGm2rW3HMQIRLeej60lGViKaJjszi1Ar/wfe4HKt/vtwC', 'ellen@gmail.be', NULL),
(14, 'EllenTheVelo', '$2y$12$Dwbw.5MKeUHPQPdpZeA8Muh21Sh1mE6N7dK69V0T3qLv1WfNfDl6G', 'Ellen@gm.com', NULL);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;

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
