-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 07, 2021 at 07:17 AM
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
(2, 213, 'wow another cool picture!', '2021-05-01 15:00:01', 26),
(3, 214, 'wow super cool picture!', '2021-05-02 14:42:28', 11),
(4, 212, 'this is another comment', '2021-05-02 12:06:10', 11),
(92, 213, 'cool!', '2021-05-02 17:16:34', 11),
(93, 211, 'nice!', '2021-05-02 17:17:32', 11),
(94, 212, 'cool!', '2021-05-02 17:17:42', 11),
(95, 212, 'cool!', '2021-05-02 17:19:32', 11),
(96, 210, 'super cool!', '2021-05-02 17:19:58', 11),
(97, 214, 'wow', '2021-05-02 18:02:07', 11),
(98, 214, 'cool', '2021-05-02 18:03:18', 11),
(99, 213, 'test', '2021-05-02 18:14:37', 11),
(100, 213, 'test again', '2021-05-02 18:14:41', 11),
(101, 213, 'last test', '2021-05-02 18:14:47', 11),
(102, 213, 'sixth comment', '2021-05-02 18:14:56', 11),
(103, 212, 'test', '2021-05-03 12:03:49', 11),
(104, 214, 'Very dark ;-;', '2021-05-03 13:31:09', 11),
(105, 212, 'pwetty ', '2021-05-05 10:43:33', 11);

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
(53, 11, 12),
(54, 27, 23),
(55, 27, 11),
(56, 1, 11),
(57, 11, 23);

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
(14, 214, 11),
(15, 212, 11);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `description` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `filter` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `picture` text COLLATE utf8mb4_bin NOT NULL,
  `date` datetime NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `description`, `filter`, `picture`, `date`, `city`, `country`) VALUES
(167, 1, 'test1', NULL, 'post_uploads/ellen_post_20210418091803.jpg', '2021-04-18 09:18:03', NULL, NULL),
(168, 6, 'test2', NULL, 'post_uploads/ellen_post_20210418091818.jpg', '2021-04-18 09:18:18', NULL, NULL),
(169, 1, 'test1', NULL, 'post_uploads/ellen_post_20210418091803.jpg', '2021-04-18 09:18:03', NULL, NULL),
(170, 1, 'test1', NULL, 'post_uploads/ellen_post_20210418091803.jpg', '2021-04-18 09:18:03', 'Gent', 'Belgium'),
(172, 1, 'test1', NULL, 'post_uploads/ellen_post_20210418091803.jpg', '2021-04-18 09:18:03', NULL, NULL),
(175, 6, 'test2', NULL, 'post_uploads/ellen_post_20210418091818.jpg', '2021-04-18 09:18:18', NULL, NULL),
(176, 6, 'test2', NULL, 'post_uploads/ellen_post_20210418091818.jpg', '2021-04-18 09:18:18', NULL, NULL),
(177, 23, 'Wallflower #foodporn', NULL, 'post_uploads/23_post_20210420170323.jpg', '2021-04-20 17:03:23', NULL, NULL),
(178, 23, 'yellow', NULL, 'post_uploads/23_post_20210420170414.jpg', '2021-04-20 17:04:14', NULL, NULL),
(179, 23, 'citrus', NULL, 'post_uploads/23_post_20210420170443.jpg', '2021-04-20 17:04:43', NULL, NULL),
(180, 23, 'green yellow', NULL, 'post_uploads/23_post_20210420170509.jpg', '2021-04-20 17:05:09', NULL, NULL),
(181, 23, 'dancer', NULL, 'post_uploads/23_post_20210420170542.jpg', '2021-04-20 17:05:42', NULL, NULL),
(182, 23, 'paint', NULL, 'post_uploads/23_post_20210420170744.jpg', '2021-04-20 17:07:44', NULL, NULL),
(183, 23, 'foodie', NULL, 'post_uploads/23_post_20210420170803.jpg', '2021-04-20 17:08:03', NULL, NULL),
(184, 23, 'happy', NULL, 'post_uploads/23_post_20210420170832.jpg', '2021-04-20 17:08:32', 'Gent', 'Belgium'),
(185, 23, 'sport club\'s #photography ', NULL, 'post_uploads/23_post_20210420170904.jpg', '2021-04-20 17:09:04', NULL, NULL),
(186, 23, 'diner at 6 o\'clock #photography', NULL, 'post_uploads/23_post_20210420170934.jpg', '2021-04-20 17:09:34', NULL, NULL),
(187, 23, 'late night celebration #photography #art #colors #night', NULL, 'post_uploads/23_post_20210420171023.jpg', '2021-04-20 17:10:23', NULL, NULL),
(189, 23, 'arts an crafts', NULL, 'post_uploads/23_post_20210420171201.jpg', '2021-04-20 17:12:01', NULL, NULL),
(190, 11, 'Went skating with the lads #skate #kickflip', NULL, 'post_uploads/11_post_20210424192610.jpg', '2021-04-24 19:26:10', NULL, NULL),
(191, 11, 'This is crazy #crazy #life', NULL, 'post_uploads/11_post_20210428094416.jpg', '2021-04-28 09:44:16', NULL, NULL),
(200, 11, 'abstract flowers #modern #art #blue #yellow #earthtones', NULL, 'post_uploads/11_post_20210429190543.jpg', '2021-04-27 19:05:49', NULL, NULL),
(202, 11, 'Hallway #drawing #modern #art #yellow #black #white', NULL, 'post_uploads/11_post_20210429190928.jpg', '2021-04-27 19:09:31', NULL, NULL),
(203, 11, 'Girl face \r\n#modern #art #drawing #blue #pink #yellow', NULL, 'post_uploads/11_post_20210429191212.jpg', '2021-04-27 19:12:14', NULL, NULL),
(204, 23, 'Waves #blue #painting #black', NULL, 'post_uploads/23_post_20210429192712.jpg', '2021-04-27 19:27:14', NULL, NULL),
(205, 23, 'splashes of color #paint #movement', NULL, 'post_uploads/23_post_20210429192820.jpg', '2021-04-27 19:28:28', NULL, NULL),
(206, 23, 'rainbow on the wall \r\n#blue #pink #yellow #orange #purple #green #red', NULL, 'post_uploads/23_post_20210429192938.jpg', '2021-04-27 19:29:43', NULL, NULL),
(207, 23, 'pink and blue skies #blue #pink #splash', NULL, 'post_uploads/23_post_20210429193238.jpg', '2021-04-27 19:32:44', NULL, NULL),
(208, 23, 'brightest pink #splash #pink #bright', NULL, 'post_uploads/23_post_20210429193322.jpg', '2021-04-27 19:33:28', NULL, NULL),
(209, 23, 'pink and white swirl #splash #pink #white', NULL, 'post_uploads/23_post_20210429193624.jpg', '2021-04-27 19:36:29', NULL, NULL),
(210, 23, 'lava \r\n#painting #splash #red #black', NULL, 'post_uploads/23_post_20210429193726.jpg', '2021-04-27 19:37:32', NULL, NULL),
(211, 23, 'lava swirl #black #red ', NULL, 'post_uploads/23_post_20210429193806.jpg', '2021-04-27 19:38:13', NULL, NULL),
(212, 23, 'stripes #painting #red #white ', NULL, 'post_uploads/23_post_20210429193843.jpg', '2021-04-27 19:38:51', NULL, NULL),
(213, 23, 'decorative wall art #texture #art #wall #floor', NULL, 'post_uploads/23_post_20210429194153.jpg', '2021-04-27 19:41:57', NULL, NULL),
(214, 23, 'textures #wall #floor #grey #foodporn', 'moon', 'post_uploads/23_post_20210429194715.jpg', '2021-04-27 19:47:21', NULL, NULL),
(215, 11, 'test \'DROP DATABASE testdb\'', NULL, 'post_uploads/11_post_20210430075135.jpg', '2021-04-30 07:51:35', NULL, NULL),
(216, 11, 'd \'DROP DATABASE;\'', NULL, 'post_uploads/11_post_20210430075227.jpg', '2021-04-30 07:52:27', NULL, NULL),
(219, 11, 'Kawaii girl by meee #kawaii', NULL, 'post_uploads/11_post_20210501112456.jpg', '2021-05-01 11:24:57', NULL, NULL),
(226, 11, 'Yooooo als dit werkt tho #amongus #filters', NULL, 'post_uploads/11_post_20210501160935.jpg', '2021-05-01 16:09:35', NULL, NULL),
(244, 11, ';jhg', 'brannan', 'post_uploads/11_post_20210505103734.jpg', '2021-05-05 10:37:34', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `requester_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `requester_id`, `receiver_id`) VALUES
(15, 12, 11),
(16, 11, 6);

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
(29, '#texture'),
(30, '#kawaii'),
(31, '#drawing'),
(32, '#amongUs'),
(33, '#filters'),
(34, '#japan'),
(35, '#');

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
  `profile_picture` varchar(255) NOT NULL DEFAULT 'user_profilepictures/default.jpg',
  `private` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `biography`, `profile_picture`, `private`) VALUES
(1, 'Bailey', 'Lievens', 'Email', 'Lowkey kinda sus', 'user_profilepictures/Bailey.jpg', 0),
(6, 'Bailey2', 'password', 'b@lievens.be', 'test bio Bailey', 'user_profilepictures/default.jpg', 1),
(11, 'ellen', '$2y$12$ZgHR/QaqzcruCktLjzhaB.cfSeLKSEiHjNLkM1rlOf63itxWq2YDi', 'ellen@ellen.ellen', 'test bio ellen', 'user_profilepictures/Ellen.jpg', 1),
(12, 'test', '$2y$12$p5l.riMYDIRDZdQZYpZnf.tA6Bl338YdLPHxpw.5.lPCt3C2v25bG', 'test@test.be', 'test bio test', 'user_profilepictures/default.jpg', 0),
(13, 'elleeeeeeen2', '$2y$12$lW8p4dLcXGm2rW3HMQIRLeej60lGViKaJjszi1Ar/wfe4HKt/vtwC', 'ellen@gmail.be', NULL, 'user_profilepictures/default.jpg', 1),
(14, 'EllenTheVelo', '$2y$12$Dwbw.5MKeUHPQPdpZeA8Muh21Sh1mE6N7dK69V0T3qLv1WfNfDl6G', 'Ellen@gm.com', NULL, 'user_profilepictures/default.jpg', 1),
(23, 'ameliegosiau', '$2y$12$3k1CEUngV5m7ZQivtRYwveqyiBK7fNizRRNJFYOEqQ0zI4TYmuHo6', 'amelie.gosiau@hotmail.com', NULL, 'user_profilepictures/Amelie.jpg', 0),
(26, 'amelie', '$2y$12$lUc2pFwepVtlG1kmz/C8leUNR9pkS/0YamYLa9ZHMHC33J1XSzRP6', 'amelie.gosiau@hotmail.com2', 'testt', 'user_profilepictures/default.jpg', 0),
(27, 'ameliegosiau1', '$2y$12$ZWmH4Ct3Mg4E//.unYWLrejKNwDEmKlNJVwMZuKIld1c60S80uBFi', 'amelie.gosiau@hotmail.com1', NULL, 'user_profilepictures/default.jpg', 0),
(28, 'kmfnskmjd', '$2y$12$.De6TkYIK/AZcnMSFh4vHe0DJ6yw1ieUda0k.9UtbG1C6Qpha3Weq', 'sdfsdf@.ksdf', NULL, 'user_profilepictures/default.jpg', 0),
(29, 'wachtwoordisellen', '$2y$12$ZgHR/QaqzcruCktLjzhaB.cfSeLKSEiHjNLkM1rlOf63itxWq2YDi', 'ellen@ellen.be', 'test bio ellen 2', 'user_profilepictures/Ellen.jpg', 1);

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
-- Indexes for table `requests`
--
ALTER TABLE `requests`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `followers`
--
ALTER TABLE `followers`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=245;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
