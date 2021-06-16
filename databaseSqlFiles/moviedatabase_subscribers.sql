-- phpMyAdmin SQL Dump
-- version 4.7.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 10, 2021 at 03:05 PM
-- Server version: 5.6.34
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moviedatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `moviedatabase_subscribers`
--

DROP TABLE IF EXISTS `moviedatabase_subscribers`;
CREATE TABLE `moviedatabase_subscribers` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `dateCreated` datetime NOT NULL DEFAULT current_timestamp(),
  `is_subscribed` int(2) NOT NULL DEFAULT 0,
  `newsletter` int(2) NOT NULL DEFAULT 0,
  `newsflash` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `moviedatabase_subscribers`
--

INSERT INTO `moviedatabase_subscribers` (`id`, `name`, `email`, `dateCreated`, `is_subscribed`, `newsletter`, `newsflash`) VALUES
(1, 'test', 'test@email.com', '2021-06-14 09:32:53', 1, 1, 1),
(2, 'test1', 'test1@email.com', '2021-06-14 09:33:18', 1, 1, 1),
(3, 'test2', 'test2@yahoo.com', '2021-06-14 09:33:38', 1, 1, 1),
(4, 'xxz', 'zxz@dd', '2021-06-15 08:10:31', 1, 1, 1),
(5, 'xxz', 'zxz@dds', '2021-06-15 08:13:55', 1, 1, 1),
(6, 'ds', 'zxz@dds', '2021-06-15 08:14:17', 1, 1, 1),
(7, 'daa', 'asazxc@email.com', '2021-06-15 13:35:56', 0, 1, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
