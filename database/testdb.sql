-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 02, 2021 at 11:34 AM
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
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `comment` varchar(150) COLLATE utf8mb4_bin NOT NULL,
  `date` datetime NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `comment`, `date`, `user_id`) VALUES
(1, 214, 'wow cool picture!', '2021-05-02 14:42:28', 1),
(2, 213, 'wow another cool picture!', '2021-05-01 15:00:01', 26);

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
(53, 11, 12),
(54, 27, 23),
(55, 27, 11);

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
(13, 189, 11),
(14, 211, 11),
(61, 212, 11),
(92, 214, 11);

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
(177, 23, 'Wallflower #foodporn', 'post_uploads/23_post_20210420170323.jpg', '2021-04-20 17:03:23'),
(178, 23, 'yellow', 'post_uploads/23_post_20210420170414.jpg', '2021-04-20 17:04:14'),
(179, 23, 'citrus', 'post_uploads/23_post_20210420170443.jpg', '2021-04-20 17:04:43'),
(180, 23, 'green yellow', 'post_uploads/23_post_20210420170509.jpg', '2021-04-20 17:05:09'),
(181, 23, 'dancer', 'post_uploads/23_post_20210420170542.jpg', '2021-04-20 17:05:42'),
(182, 23, 'paint', 'post_uploads/23_post_20210420170744.jpg', '2021-04-20 17:07:44'),
(183, 23, 'foodie', 'post_uploads/23_post_20210420170803.jpg', '2021-04-20 17:08:03'),
(184, 23, 'happy', 'post_uploads/23_post_20210420170832.jpg', '2021-04-20 17:08:32'),
(185, 23, 'sport club\'s #photography ', 'post_uploads/23_post_20210420170904.jpg', '2021-04-20 17:09:04'),
(186, 23, 'diner at 6 o\'clock #photography', 'post_uploads/23_post_20210420170934.jpg', '2021-04-20 17:09:34'),
(187, 23, 'late night celebration #photography #art #colors #night', 'post_uploads/23_post_20210420171023.jpg', '2021-04-20 17:10:23'),
(189, 23, 'arts an crafts', 'post_uploads/23_post_20210420171201.jpg', '2021-04-20 17:12:01'),
(190, 11, 'Went skating with the lads #skate #kickflip', 'post_uploads/11_post_20210424192610.jpg', '2021-04-24 19:26:10'),
(191, 11, 'This is crazy #crazy #life', 'post_uploads/11_post_20210428094416.jpg', '2021-04-28 09:44:16'),
(200, 11, 'abstract flowers #modern #art #blue #yellow #earthtones', 'post_uploads/11_post_20210429190543.jpg', '2021-04-27 19:05:49'),
(202, 11, 'Hallway #drawing #modern #art #yellow #black #white', 'post_uploads/11_post_20210429190928.jpg', '2021-04-27 19:09:31'),
(203, 11, 'Girl face \r\n#modern #art #drawing #blue #pink #yellow', 'post_uploads/11_post_20210429191212.jpg', '2021-04-27 19:12:14'),
(204, 23, 'Waves #blue #painting #black', 'post_uploads/23_post_20210429192712.jpg', '2021-04-27 19:27:14'),
(205, 23, 'splashes of color #paint #movement', 'post_uploads/23_post_20210429192820.jpg', '2021-04-27 19:28:28'),
(206, 23, 'rainbow on the wall \r\n#blue #pink #yellow #orange #purple #green #red', 'post_uploads/23_post_20210429192938.jpg', '2021-04-27 19:29:43'),
(207, 23, 'pink and blue skies #blue #pink #splash', 'post_uploads/23_post_20210429193238.jpg', '2021-04-27 19:32:44'),
(208, 23, 'brightest pink #splash #pink #bright', 'post_uploads/23_post_20210429193322.jpg', '2021-04-27 19:33:28'),
(209, 23, 'pink and white swirl #splash #pink #white', 'post_uploads/23_post_20210429193624.jpg', '2021-04-27 19:36:29'),
(210, 23, 'lava \r\n#painting #splash #red #black', 'post_uploads/23_post_20210429193726.jpg', '2021-04-27 19:37:32'),
(211, 23, 'lava swirl #black #red ', 'post_uploads/23_post_20210429193806.jpg', '2021-04-27 19:38:13'),
(212, 23, 'stripes #painting #red #white ', 'post_uploads/23_post_20210429193843.jpg', '2021-04-27 19:38:51'),
(213, 23, 'decorative wall art #texture #art #wall #floor', 'post_uploads/23_post_20210429194153.jpg', '2021-04-27 19:41:57'),
(214, 23, 'textures #wall #floor #grey ', 'post_uploads/23_post_20210429194715.jpg', '2021-04-27 19:47:21'),
(215, 11, 'test \'DROP DATABASE testdb\'', 'post_uploads/11_post_20210430075135.jpg', '2021-04-30 07:51:35'),
(216, 11, 'd \'DROP DATABASE;\'', 'post_uploads/11_post_20210430075227.jpg', '2021-04-30 07:52:27'),
(217, 11, 'test \'DROP DATABASE testdb;\'', 'post_uploads/11_post_20210430075255.jpg', '2021-04-30 07:52:55');

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
(14, '#life'),
(15, '#modern'),
(16, '#art'),
(17, '#blue'),
(18, '#photography'),
(19, '#colors'),
(20, '#yellow'),
(21, '#green'),
(22, '#purple'),
(23, '#black'),
(24, '#white'),
(25, '#red'),
(26, '#pink'),
(27, '#orange'),
(28, '#splash'),
(29, '#texture');

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
(26, 'amelie', '$2y$12$lUc2pFwepVtlG1kmz/C8leUNR9pkS/0YamYLa9ZHMHC33J1XSzRP6', 'amelie.gosiau@hotmail.com2', 'testt', 'user_profilepictures/default.jpg'),
(27, 'ameliegosiau1', '$2y$12$ZWmH4Ct3Mg4E//.unYWLrejKNwDEmKlNJVwMZuKIld1c60S80uBFi', 'amelie.gosiau@hotmail.com1', NULL, 'user_profilepictures/default.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `followers`
--
ALTER TABLE `followers`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=218;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
