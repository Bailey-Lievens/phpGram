-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 06, 2021 at 06:36 AM
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
-- Database: `testtest`
--

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
  `private` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `biography`, `profile_picture`, `private`) VALUES
(1, 'Bailey', 'Lievens', 'Email', 'Lowkey kinda sus', 'user_profilepictures/Bailey.jpg', 0),
(6, 'Bailey2', 'password', 'b@lievens.be', 'test bio Bailey', 'user_profilepictures/default.jpg', 1),
(11, 'ellen', '$2y$12$ZgHR/QaqzcruCktLjzhaB.cfSeLKSEiHjNLkM1rlOf63itxWq2YDi', 'ellen@ellen.ellen', 'test bio ellenaasdfsdf', 'user_profilepictures/Ellen.jpg', 0),
(12, 'test', '$2y$12$p5l.riMYDIRDZdQZYpZnf.tA6Bl338YdLPHxpw.5.lPCt3C2v25bG', 'test@test.be', 'test bio test', 'user_profilepictures/default.jpg', 0),
(13, 'elleeeeeeen2', '$2y$12$lW8p4dLcXGm2rW3HMQIRLeej60lGViKaJjszi1Ar/wfe4HKt/vtwC', 'ellen@gmail.be', NULL, 'user_profilepictures/default.jpg', 1),
(14, 'EllenTheVelo', '$2y$12$Dwbw.5MKeUHPQPdpZeA8Muh21Sh1mE6N7dK69V0T3qLv1WfNfDl6G', 'Ellen@gm.com', NULL, 'user_profilepictures/default.jpg', 1),
(23, 'ameliegosiau', '$2y$12$3k1CEUngV5m7ZQivtRYwveqyiBK7fNizRRNJFYOEqQ0zI4TYmuHo6', 'amelie.gosiau@hotmail.com', NULL, 'user_profilepictures/Amelie.jpg', 0),
(26, 'amelie', '$2y$12$lUc2pFwepVtlG1kmz/C8leUNR9pkS/0YamYLa9ZHMHC33J1XSzRP6', 'amelie.gosiau@hotmail.com2', 'testt', 'user_profilepictures/default.jpg', 0),
(27, 'ameliegosiau1', '$2y$12$ZWmH4Ct3Mg4E//.unYWLrejKNwDEmKlNJVwMZuKIld1c60S80uBFi', 'amelie.gosiau@hotmail.com1', NULL, 'user_profilepictures/default.jpg', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
