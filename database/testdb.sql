-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 15, 2021 at 10:06 AM
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
(157, 11, 'test', 'post_uploads/Knipsel.PNG', '2021-04-15 10:03:26'),
(158, 11, 'test2', 'post_uploads/163824013_179750463789456_6679605415306659869_n.png', '2021-04-15 10:03:33'),
(159, 11, 'test3', 'post_uploads/red-3580560_1920.jpg', '2021-04-15 10:03:42'),
(160, 6, 'test', 'post_uploads/Knipsel.PNG', '2021-04-15 10:03:26'),
(161, 6, 'test2', 'post_uploads/163824013_179750463789456_6679605415306659869_n.png', '2021-04-15 10:03:33'),
(162, 6, 'test3', 'post_uploads/red-3580560_1920.jpg', '2021-04-15 10:03:42'),
(163, 1, 'test', 'post_uploads/Knipsel.PNG', '2021-04-15 10:03:26'),
(164, 1, 'test2', 'post_uploads/163824013_179750463789456_6679605415306659869_n.png', '2021-04-15 10:03:33'),
(165, 1, 'test3', 'post_uploads/red-3580560_1920.jpg', '2021-04-15 10:03:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
