-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 29, 2021 at 12:22 PM
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
-- Table structure for table `followers`
--

CREATE TABLE `followers` (
  `id` int(255) NOT NULL,
  `userId` int(255) NOT NULL,
  `followingId` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `followers`
--

INSERT INTO `followers` (`id`, `userId`, `followingId`) VALUES
(3, 13, 11),
(4, 23, 11),
(6, 500, 500),
(7, 69, 80),
(50, 11, 1),
(51, 11, 14),
(52, 11, 23),
(53, 11, 12);

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `post_id` int(255) NOT NULL,
  `liked_by_user_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `post_id`, `liked_by_user_id`) VALUES
(8, 187, 11),
(9, 185, 11),
(10, 184, 11),
(11, 183, 11),
(13, 189, 11);

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
(166, 11, 'test #foodporn', 'post_uploads/ellen_post_20210418091635.jpg', '2021-04-18 09:16:35'),
(167, 1, 'test1', 'post_uploads/ellen_post_20210418091803.jpg', '2021-04-18 09:18:03'),
(168, 6, 'test2', 'post_uploads/ellen_post_20210418091818.jpg', '2021-04-18 09:18:18'),
(169, 1, 'test1', 'post_uploads/ellen_post_20210418091803.jpg', '2021-04-18 09:18:03'),
(170, 1, 'test1', 'post_uploads/ellen_post_20210418091803.jpg', '2021-04-18 09:18:03'),
(171, 11, 'test', 'post_uploads/ellen_post_20210418091635.jpg', '2021-04-18 09:16:35'),
(172, 1, 'test1', 'post_uploads/ellen_post_20210418091803.jpg', '2021-04-18 09:18:03'),
(174, 11, 'test', 'post_uploads/ellen_post_20210418091635.jpg', '2021-04-18 09:16:35'),
(175, 6, 'test2', 'post_uploads/ellen_post_20210418091818.jpg', '2021-04-18 09:18:18'),
(176, 6, 'test2', 'post_uploads/ellen_post_20210418091818.jpg', '2021-04-18 09:18:18'),
(177, 23, 'Wallflower #foodporn', 'post_uploads/ameliegosiau_post_20210420170323.jpg', '2021-04-20 17:03:23'),
(178, 23, 'yellow', 'post_uploads/ameliegosiau_post_20210420170414.jpg', '2021-04-20 17:04:14'),
(179, 23, 'citrus', 'post_uploads/ameliegosiau_post_20210420170443.jpg', '2021-04-20 17:04:43'),
(180, 23, 'green yellow', 'post_uploads/ameliegosiau_post_20210420170509.jpg', '2021-04-20 17:05:09'),
(181, 23, 'dancer', 'post_uploads/ameliegosiau_post_20210420170542.jpg', '2021-04-20 17:05:42'),
(182, 23, 'paint', 'post_uploads/ameliegosiau_post_20210420170744.jpg', '2021-04-20 17:07:44'),
(183, 23, 'foodie', 'post_uploads/ameliegosiau_post_20210420170803.jpg', '2021-04-20 17:08:03'),
(184, 23, 'happy', 'post_uploads/ameliegosiau_post_20210420170832.jpg', '2021-04-20 17:08:32'),
(185, 23, 'sporty', 'post_uploads/ameliegosiau_post_20210420170904.jpg', '2021-04-20 17:09:04'),
(186, 23, 'diner', 'post_uploads/ameliegosiau_post_20210420170934.jpg', '2021-04-20 17:09:34'),
(187, 23, 'celebration', 'post_uploads/ameliegosiau_post_20210420171023.jpg', '2021-04-20 17:10:23'),
(189, 23, 'arts an crafts', 'post_uploads/ameliegosiau_post_20210420171201.jpg', '2021-04-20 17:12:01'),
(190, 11, 'Went skating with the lads #skate #kickflip', 'post_uploads/11_post_20210424192610.jpg', '2021-04-24 19:26:10'),
(191, 11, 'This is crazy #crazy #life', 'post_uploads/11_post_20210428094416.jpg', '2021-04-28 09:44:16');

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
(9, '#sd,f'),
(10, '#skate'),
(11, '#FlipKick'),
(12, '#kickflip'),
(13, '#crazy'),
(14, '#life');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `biography` varchar(255) DEFAULT NULL,
  `profile_picture` varchar(255) NOT NULL DEFAULT 'user_profilepictures/default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `biography`, `profile_picture`) VALUES
(1, 'Bailey', 'Lievens', 'Email', 'Lowkey kinda sus', 'user_profilepictures/Bailey.jpg'),
(6, 'Bailey2', 'password', 'b@lievens.be', 'test bio Bailey', 'user_profilepictures/default.jpg'),
(11, 'ellen', '$2y$12$ZgHR/QaqzcruCktLjzhaB.cfSeLKSEiHjNLkM1rlOf63itxWq2YDi', 'ellen@ellen.ellen', 'test bio ellenaasdfsdf', 'user_profilepictures/Ellen.jpg'),
(12, 'test', '$2y$12$p5l.riMYDIRDZdQZYpZnf.tA6Bl338YdLPHxpw.5.lPCt3C2v25bG', 'test@test.be', 'test bio test', 'user_profilepictures/default.jpg'),
(13, 'elleeeeeeen2', '$2y$12$lW8p4dLcXGm2rW3HMQIRLeej60lGViKaJjszi1Ar/wfe4HKt/vtwC', 'ellen@gmail.be', NULL, 'user_profilepictures/default.jpg'),
(14, 'EllenTheVelo', '$2y$12$Dwbw.5MKeUHPQPdpZeA8Muh21Sh1mE6N7dK69V0T3qLv1WfNfDl6G', 'Ellen@gm.com', NULL, 'user_profilepictures/default.jpg'),
(23, 'ameliegosiau', '$2y$12$3k1CEUngV5m7ZQivtRYwveqyiBK7fNizRRNJFYOEqQ0zI4TYmuHo6', 'amelie.gosiau@hotmail.com', NULL, 'user_profilepictures/Amelie.jpg'),
(26, 'amelie', '$2y$12$lUc2pFwepVtlG1kmz/C8leUNR9pkS/0YamYLa9ZHMHC33J1XSzRP6', 'amelie.gosiau@hotmail.com2', 'testt', 'user_profilepictures/default.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `followers`
--
ALTER TABLE `followers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `followers`
--
ALTER TABLE `followers`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=192;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
