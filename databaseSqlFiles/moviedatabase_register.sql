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

-- --------------------------------------------------------

--
-- Table structure for table `moviedatabase_admin`
--

DROP TABLE IF EXISTS `moviedatabase_admin`;
CREATE TABLE IF NOT EXISTS `moviedatabase_admin` (
  `ID` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `Email` varchar(82) DEFAULT NULL,
  `Username` varchar(82) DEFAULT NULL,
  `PasswordHash` varchar(82) DEFAULT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Table structure for table `moviedatabase_user`
--

DROP TABLE IF EXISTS `moviedatabase_user`;
CREATE TABLE IF NOT EXISTS `moviedatabase_user` (
  `ID` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `Email` varchar(82) DEFAULT NULL,
  `Username` varchar(82) DEFAULT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8;