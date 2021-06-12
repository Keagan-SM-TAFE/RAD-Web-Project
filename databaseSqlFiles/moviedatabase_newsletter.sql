	-- phpMyAdmin SQL Dump
-- version 4.7.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 28, 2021 at 02:44 AM
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
CREATE DATABASE IF NOT EXISTS `moviedatabase`;
USE `moviedatabase`;
-- --------------------------------------------------------

--
-- Table structure for table `moviedatabase_newsletter`
--

DROP TABLE IF EXISTS `moviedatabase_newsletter`;
CREATE TABLE IF NOT EXISTS `moviedatabase_newsletter` (
	  `id` int(11) NOT NULL AUTO_INCREMENT,
	  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
	  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
	  `verification_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
	  `is_verified` int(1) NOT NULL DEFAULT 0,
	  `created_date` datetime NOT NULL,
	  `modified_date` datetime NOT NULL DEFAULT current_timestamp(),
	  `status` int(1) NOT NULL DEFAULT 1
	) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

	ALTER TABLE `moviedatabase_newsletter`
  		ADD PRIMARY KEY (`id`);

	ALTER TABLE `moviedatabase_newsletter`
  		MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;