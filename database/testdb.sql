-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 13, 2021 at 10:47 AM
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
  `comment` varchar(150) NOT NULL,
  `date` datetime NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `comment`, `date`, `user_id`) VALUES
(120, 5, 'Such a cool painting!', '2021-05-13 09:39:23', 34),
(121, 5, 'Wow!', '2021-05-13 09:52:58', 11),
(122, 14, 'That\'s my painting!', '2021-05-13 10:03:20', 33),
(123, 13, 'This is a cool picture', '2021-05-13 10:07:40', 33),
(124, 1, 'Beautiful colors', '2021-05-13 10:18:35', 34),
(125, 3, 'Cool birds', '2021-05-13 10:26:16', 11);

-- --------------------------------------------------------

--
-- Table structure for table `followers`
--

CREATE TABLE `followers` (
  `id` int(255) NOT NULL,
  `userId` int(255) NOT NULL,
  `followingId` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `followers`
--

INSERT INTO `followers` (`id`, `userId`, `followingId`) VALUES
(3, 13, 11),
(4, 23, 11),
(6, 500, 500),
(7, 69, 80),
(53, 11, 12),
(54, 27, 23),
(55, 27, 11),
(56, 1, 11),
(57, 11, 23),
(59, 12, 11),
(61, 11, 1),
(62, 11, 32),
(63, 33, 1),
(64, 33, 23),
(65, 34, 33),
(66, 35, 33),
(67, 11, 33),
(68, 11, 36),
(69, 6, 11),
(71, 33, 28),
(72, 33, 11);

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `post_id` int(255) NOT NULL,
  `liked_by_user_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `post_id`, `liked_by_user_id`) VALUES
(21, 3, 34),
(23, 1, 34),
(24, 7, 35),
(25, 6, 35),
(26, 8, 35),
(27, 3, 35),
(28, 1, 35),
(30, 11, 33),
(39, 3, 11);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `description` varchar(100) NOT NULL,
  `filter` varchar(255) DEFAULT NULL,
  `picture` text NOT NULL,
  `date` datetime NOT NULL,
  `city` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `description`, `filter`, `picture`, `date`, `city`, `country`) VALUES
(1, 33, 'painting #paint', NULL, 'post_uploads/33_post_20210513093308.jpg', '2021-05-13 09:33:08', NULL, NULL),
(2, 33, 'again paint #cool', NULL, 'post_uploads/33_post_20210513093322.jpg', '2021-05-13 09:33:22', NULL, NULL),
(3, 33, 'birds #fly', NULL, 'post_uploads/33_post_20210513093332.jpg', '2021-05-13 09:33:32', NULL, NULL),
(5, 33, 'face #paint', NULL, 'post_uploads/33_post_20210513093441.jpg', '2021-05-13 09:34:41', NULL, NULL),
(6, 34, 'beautiful birds #birds #cool', 'brannan', 'post_uploads/34_post_20210513094209.jpg', '2021-05-13 09:42:09', NULL, NULL),
(7, 34, 'another picture, I stole them from Thomas6 haha #cool', NULL, 'post_uploads/34_post_20210513094245.jpg', '2021-05-13 09:42:45', NULL, NULL),
(8, 35, 'cool filter too #cool', 'xpro2', 'post_uploads/35_post_20210513094454.jpg', '2021-05-13 09:44:54', NULL, NULL),
(9, 35, 'so much birds #roekoe\r\n', '_1977', 'post_uploads/35_post_20210513094520.jpg', '2021-05-13 09:45:20', NULL, NULL),
(10, 35, 'I added my location too #verycool', 'xpro2', 'post_uploads/35_post_20210513094559.jpg', '2021-05-13 09:45:59', 'Dendermonde', 'Belgium'),
(11, 11, 'again the same painting', NULL, 'post_uploads/11_post_20210513095419.jpg', '2021-05-13 09:54:19', 'Dendermonde', 'Belgium'),
(13, 11, 'I added my location', NULL, 'post_uploads/11_post_20210513095533.jpg', '2021-05-13 09:55:33', 'Dendermonde', 'Belgium'),
(14, 11, 'again with location #cool', 'xpro2', 'post_uploads/11_post_20210513095550.jpg', '2021-05-13 09:55:50', 'Dendermonde', 'Belgium');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `requester_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `requester_id`, `receiver_id`) VALUES
(19, 14, 11),
(20, 13, 11),
(21, 23, 11),
(22, 26, 11),
(25, 35, 34),
(26, 11, 34),
(27, 33, 34);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `tag_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(35, '#'),
(36, '#cool'),
(37, '#againcool'),
(38, '#india'),
(39, '#vroom'),
(40, '#paint'),
(41, '#fly'),
(42, '#birds'),
(43, '#roekoe\r\n'),
(44, '#verycool'),
(45, '#notcool');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `biography`, `profile_picture`, `private`) VALUES
(1, 'Bailey', 'Lievens', 'Email', 'Lowkey kinda sus', 'user_profilepictures/Bailey.jpg', 0),
(6, 'Bailey2', 'password', 'b@lievens.be', 'test bio Bailey', 'user_profilepictures/default.jpg', 1),
(11, 'ellen', '$2y$12$ZgHR/QaqzcruCktLjzhaB.cfSeLKSEiHjNLkM1rlOf63itxWq2YDi', 'ellen@ellen.ee', 'test bio ellen', 'user_profilepictures/Ellen.jpg', 1),
(12, 'test', '$2y$12$p5l.riMYDIRDZdQZYpZnf.tA6Bl338YdLPHxpw.5.lPCt3C2v25bG', 'test@test.be', 'test bio test', 'user_profilepictures/default.jpg', 0),
(13, 'elleeeeeeen2', '$2y$12$lW8p4dLcXGm2rW3HMQIRLeej60lGViKaJjszi1Ar/wfe4HKt/vtwC', 'ellen@gmail.be', NULL, 'user_profilepictures/default.jpg', 1),
(14, 'EllenTheVelo', '$2y$12$Dwbw.5MKeUHPQPdpZeA8Muh21Sh1mE6N7dK69V0T3qLv1WfNfDl6G', 'Ellen@gm.com', NULL, 'user_profilepictures/default.jpg', 1),
(23, 'ameliegosiau', '$2y$12$3k1CEUngV5m7ZQivtRYwveqyiBK7fNizRRNJFYOEqQ0zI4TYmuHo6', 'amelie.gosiau@hotmail.com', NULL, 'user_profilepictures/Amelie.jpg', 0),
(26, 'amelie', '$2y$12$lUc2pFwepVtlG1kmz/C8leUNR9pkS/0YamYLa9ZHMHC33J1XSzRP6', 'amelie.gosiau@hotmail.com2', 'testt', 'user_profilepictures/default.jpg', 0),
(27, 'ameliegosiau1', '$2y$12$ZWmH4Ct3Mg4E//.unYWLrejKNwDEmKlNJVwMZuKIld1c60S80uBFi', 'amelie.gosiau@hotmail.com1', NULL, 'user_profilepictures/default.jpg', 0),
(28, 'kmfnskmjd', '$2y$12$.De6TkYIK/AZcnMSFh4vHe0DJ6yw1ieUda0k.9UtbG1C6Qpha3Weq', 'sdfsdf@.ksdf', NULL, 'user_profilepictures/default.jpg', 0),
(29, 'wachtwoordisellen', '$2y$12$ZgHR/QaqzcruCktLjzhaB.cfSeLKSEiHjNLkM1rlOf63itxWq2YDi', 'ellen@ellen.be', 'test bio ellen 2', 'user_profilepictures/Ellen.jpg', 1),
(32, 'ellen2', '$2y$12$Ma8f2myhiQX.twTizSYATeVuWJ.ZjRgsUE.WWRPZaUESVBx5qVfCO', 'hallo@ellen.be', NULL, 'user_profilepictures/default.jpg', 0),
(33, 'Thomas6', '$2y$12$5CDCkrt3D.Mo.lVzT2ye6uJDxq4xfX89e/aymqN2TVXcO.aBbO0R2', 'thomas@thomaas.be', 'Ik ben Thomas en ik schilder graag\r\n', 'user_profilepictures/33_profilePicture.jpg', 0),
(34, 'LaurenTheDinosaur', '$2y$12$oVhJR8..5Kgx8AKcc4S0deUOISthDxIud3BIVJVt1bG/piS.X/CJO', 'lauren@gmail.com', NULL, 'user_profilepictures/34_profilePicture.jpg', 1),
(35, 'SuperPainter2000', '$2y$12$yv.eeUTr9HNxeTpPwIqbjeqVcBWobQytTyOl79ai2enAZ8v7XfsMW', 'paint@hotmail.com', 'My name says it all', 'user_profilepictures/default.jpg', 0),
(36, 'NoPostsForMe', '$2y$12$r1LRr.Xz24oBuvK7gzh02Oyo7/BrDWfhOSzoNkstMWEp.48iAE0lO', 'f@f.f', NULL, 'user_profilepictures/default.jpg', 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `followers`
--
ALTER TABLE `followers`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
