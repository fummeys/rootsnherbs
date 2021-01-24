-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 24, 2021 at 02:33 PM
-- Server version: 8.0.21
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `castle`
--

-- --------------------------------------------------------

--
-- Table structure for table `bonuses`
--

DROP TABLE IF EXISTS `bonuses`;
CREATE TABLE IF NOT EXISTS `bonuses` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `userid` bigint NOT NULL,
  `bonusvalue` int NOT NULL,
  `transactionid` bigint NOT NULL,
  `description` varchar(100) NOT NULL,
  `bonustype` varchar(50) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `Bonuses link to transaction` (`transactionid`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `bonuses`
--

INSERT INTO `bonuses` (`id`, `name`, `userid`, `bonusvalue`, `transactionid`, `description`, `bonustype`, `time`) VALUES
(3, 'Haliru', 2, 0, 29, 'Gaari |', 'registration bonus', '2021-01-20 10:59:16'),
(4, 'Haliru', 1, 0, 31, 'Rice |', 'registration bonus', '2021-01-21 08:54:56'),
(5, 'Haliru', 1, 0, 32, 'Rice |', 'registration bonus', '2021-01-21 08:55:48'),
(6, 'Haliru', 1, 0, 33, 'Rice |', 'registration bonus', '2021-01-21 08:56:32'),
(7, 'Haliru', 1, 0, 34, 'Rice |', 'registration bonus', '2021-01-21 08:57:50'),
(8, 'Haliru', 1, 0, 35, 'Rice |', 'registration bonus', '2021-01-21 09:03:03'),
(9, 'Haliru', 1, 0, 36, 'Rice |', 'registration bonus', '2021-01-21 09:03:48'),
(21, 'Lateef Yusuf', 7, 1960, 12, 'Kareem', 'Not eligible for Pension', '2021-01-24 09:32:55'),
(22, 'Lateef Yusuf', 7, 1960, 12, 'Kareem', 'Not eligible for Pension', '2021-01-24 09:33:37'),
(23, 'Lateef Yusuf', 7, 1860, 12, 'Kareem', 'Pension deducted', '2021-01-24 09:34:47'),
(24, 'Lateef Yusuf', 7, 111, 12, 'Kareem', 'Pension', '2021-01-24 09:34:47'),
(25, 'Lateef Yusuf', 7, 1860, 12, 'Kareem\'s Registration', 'Pension deducted bonus', '2021-01-24 09:38:58'),
(26, 'Lateef Yusuf', 7, 111, 12, 'Kareem\'s Registration', 'Pension from registration bonus', '2021-01-24 09:38:58'),
(27, 'Lateef Yusuf', 7, 1860, 12, 'Kareem\'s Registration', 'Pension deducted bonus', '2021-01-24 09:39:00'),
(28, 'Lateef Yusuf', 7, 111, 12, 'Kareem\'s Registration', 'Pension from registration bonus', '2021-01-24 09:39:00'),
(29, 'Lateef Yusuf', 7, 1860, 12, 'Kareem\'s Registration', 'Pension deducted bonus', '2021-01-24 09:47:30'),
(30, 'Lateef Yusuf', 7, 111, 12, 'Kareem\'s Registration', 'Pension from registration bonus', '2021-01-24 09:47:30'),
(31, 'Lateef Yusuf', 7, 1860, 12, 'Kareem\'s Registration', 'Pension deducted bonus', '2021-01-24 09:57:00'),
(32, 'Lateef Yusuf', 7, 111, 12, 'Kareem\'s Registration', 'Pension from registration bonus', '2021-01-24 09:57:00'),
(33, 'Lateef Yusuf', 7, 1860, 12, 'Kareem\'s Registration', 'Pension deducted bonus', '2021-01-24 09:58:58'),
(34, 'Lateef Yusuf', 7, 111, 12, 'Kareem\'s Registration', 'Pension from registration bonus', '2021-01-24 09:58:58'),
(35, 'Lateef Yusuf', 7, 1860, 12, 'Kareem\'s Registration', 'Pension deducted bonus', '2021-01-24 09:59:12'),
(36, 'Lateef Yusuf', 7, 111, 12, 'Kareem\'s Registration', 'Pension from registration bonus', '2021-01-24 09:59:12'),
(37, 'Lateef Yusuf', 7, 1860, 12, 'Kareem\'s Registration', 'Pension deducted bonus', '2021-01-24 10:00:34'),
(38, 'Lateef Yusuf', 7, 111, 12, 'Kareem\'s Registration', 'Pension from registration bonus', '2021-01-24 10:00:34'),
(39, 'Lateef Yusuf', 7, 1860, 12, 'ABIOLA ISRAEL ENIOLA\'s Registration', 'Pension deducted bonus', '2021-01-24 10:03:38'),
(40, 'Lateef Yusuf', 7, 111, 12, 'ABIOLA ISRAEL ENIOLA\'s Registration', 'Pension from registration bonus', '2021-01-24 10:03:38'),
(41, 'Haliru', 1, 1960, 12, 'GAFAR YUSUF\'s Registration', 'Not eligible for Pension', '2021-01-24 10:06:37'),
(42, 'Haliru Yusuf', 5, -10, 10, 'See', 'Bonus Paid', '2021-01-24 12:11:07'),
(43, 'Haliru', 1, -2000, 10, 'Test Payment', 'Bonus Paid', '2021-01-24 12:12:35');

-- --------------------------------------------------------

--
-- Table structure for table `managers`
--

DROP TABLE IF EXISTS `managers`;
CREATE TABLE IF NOT EXISTS `managers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` int NOT NULL DEFAULT '1',
  `description` varchar(100) NOT NULL,
  `time_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `managers`
--

INSERT INTO `managers` (`id`, `username`, `name`, `password`, `role`, `description`, `time_created`) VALUES
(1, 'hallykola', 'Haliru', 'are', 2, 'This just a test', '2021-01-18 09:57:50'),
(3, 'admin', 'Haliru Yusuf', '$2y$10$5MMY3lLaClMn4uKkz3XrQemsR8ypl6F1bnQZvGRUDnJga219ceCa2', 2, 'Special', '2021-01-19 08:33:54'),
(4, 'hallykola', 'Haliru Yusuf', '$2y$10$q5MZbvroByb3rZwrbSpUfej4jffr3rQ/VJE6WgQggRFGWBbr4zbpW', 4, 'IT', '2021-01-21 21:23:23'),
(5, 'newadmin', 'ADEBISI DORCAS', '$2y$10$a8bs/WblLE0hx6t9oh6GJOTKGyoXCp7TyuKCqSyytffkxzCAf//Li', 4, 'test', '2021-01-22 07:59:59'),
(6, 'newadmin', 'Kareem', '$2y$10$g3PRiSr.Q6EEFb3jVN2i1uVfDIJSfIipKK0af5jFLocPzK8oQIkp.', 4, 'test', '2021-01-22 08:01:29'),
(7, 'yusuf', 'YUSUF AZEEZ OLAWALE', '$2y$10$tNqsdCro62/MJDLdZ8BFh.16n3tmFMiAj2VTVUcVWqqE5hfNqgN7a', 4, 'IT', '2021-01-23 18:50:24');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `productname` varchar(75) NOT NULL,
  `bronzevalue` int NOT NULL,
  `description` varchar(100) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `productname`, `bronzevalue`, `description`, `time`) VALUES
(1, 'Rice', 100, 'Special', '2021-01-19 14:05:27'),
(2, 'Beans', 150, 'Test product', '2021-01-19 14:07:33'),
(3, 'Beans', 150, 'Test product', '2021-01-19 14:09:21'),
(4, 'Beans', 150, 'Test product', '2021-01-19 14:09:43'),
(5, 'Gaari', 200, 'test', '2021-01-19 14:52:06'),
(6, 'Blood Tonic', 250, 'Test product', '2021-01-19 19:00:53'),
(7, 'Supplement Tablet', 150, 'Good tablets', '2021-01-23 19:20:37'),
(8, 'Sweet Kola', 50, 'Bitter Kola Drink', '2021-01-23 19:23:13'),
(9, 'Green Tea', 200, 'tea', '2021-01-23 19:25:06');

-- --------------------------------------------------------

--
-- Table structure for table `ranks`
--

DROP TABLE IF EXISTS `ranks`;
CREATE TABLE IF NOT EXISTS `ranks` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `userid` bigint NOT NULL,
  `oldrank` varchar(50) NOT NULL,
  `newrank` varchar(50) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ranks`
--

INSERT INTO `ranks` (`id`, `name`, `userid`, `oldrank`, `newrank`, `time`) VALUES
(1, '0', 1, 'ruby', 'general', '2021-01-20 10:44:12'),
(2, '0', 2, 'ruby', 'general', '2021-01-20 10:44:41'),
(3, '0', 2, 'ruby', 'general', '2021-01-20 10:49:41'),
(4, '0', 2, 'ruby', 'general', '2021-01-20 10:51:28'),
(5, '0', 2, 'ruby', 'general', '2021-01-20 10:59:16'),
(6, 'Haliru', 1, 'ruby', 'general', '2021-01-21 08:54:56'),
(7, 'Haliru', 1, 'ruby', 'general', '2021-01-21 08:55:48'),
(8, 'Haliru', 1, 'ruby', 'general', '2021-01-21 08:56:32'),
(9, 'Haliru', 1, 'ruby', 'general', '2021-01-21 08:57:50'),
(10, 'Haliru', 1, 'ruby', 'general', '2021-01-21 09:03:03'),
(11, 'Haliru', 1, 'ruby', 'general', '2021-01-21 09:03:48'),
(12, 'Haliru Yusuf', 5, 'none', 'none', '2021-01-21 13:21:01'),
(13, 'Haliru Kolawole Yusuf', 3, 'none', 'none', '2021-01-21 13:21:01'),
(14, 'Haliru', 2, 'none', 'none', '2021-01-21 13:21:01'),
(15, 'Lateef Yusuf', 7, 'none', 'none', '2021-01-21 13:21:01'),
(16, 'Haliru', 1, 'none', 'none', '2021-01-21 13:21:01'),
(17, 'Lateef Yusuf', 7, 'RUBY', 'none', '2021-01-24 10:20:11'),
(18, 'Haliru', 1, 'BRONZE', 'none', '2021-01-24 10:20:11'),
(19, 'Haliru Yusuf', 5, 'none', 'BRONZE', '2021-01-24 10:39:59'),
(20, 'Lateef Yusuf', 3, 'none', 'BRONZE', '2021-01-24 10:39:59'),
(21, 'Haliru', 2, 'none', 'BRONZE', '2021-01-24 10:39:59'),
(22, 'Haliru', 1, 'GENERAL', 'BRONZE', '2021-01-24 10:39:59');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
CREATE TABLE IF NOT EXISTS `transactions` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `issuer` int NOT NULL,
  `oldbv` int NOT NULL,
  `thisbv` int NOT NULL,
  `newbv` int NOT NULL,
  `description` varchar(150) NOT NULL,
  `transactiontime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userid` bigint NOT NULL,
  PRIMARY KEY (`id`),
  KEY `BV transaction link to manager` (`issuer`),
  KEY `BV transactions link to users` (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=110 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `name`, `issuer`, `oldbv`, `thisbv`, `newbv`, `description`, `transactiontime`, `userid`) VALUES
(10, '0', 1, 100, 100, 200, 'This just a test', '2021-01-18 10:12:26', 1),
(11, '0', 1, 100, 100, 200, 'This just a test', '2021-01-18 18:40:31', 1),
(12, '0', 3, 320, 100, 420, 'Rice |', '2021-01-20 07:17:53', 1),
(13, 'Haliru', 3, 320, 100, 420, 'Rice |', '2021-01-20 07:23:59', 1),
(14, 'Haliru', 3, 320, 100, 420, 'Rice |', '2021-01-20 07:25:46', 1),
(15, 'Haliru', 3, 320, 100, 420, 'Rice |', '2021-01-20 07:26:59', 1),
(16, 'Haliru', 3, 320, 100, 420, 'Rice |', '2021-01-20 07:27:53', 1),
(17, 'Haliru', 3, 320, 100, 420, 'Rice |', '2021-01-20 07:30:23', 1),
(18, 'Haliru', 3, 320, 100, 420, 'Rice |', '2021-01-20 07:30:57', 1),
(19, 'Haliru', 3, 320, 100, 420, 'Rice |', '2021-01-20 07:31:28', 1),
(20, 'Haliru', 3, 320, 100, 420, 'Rice |', '2021-01-20 07:32:17', 1),
(21, 'Haliru', 3, 420, 100, 520, 'Rice |', '2021-01-20 07:32:53', 1),
(22, 'Haliru', 3, 520, 750, 1270, 'Blood Tonic |Blood Tonic |Blood Tonic |', '2021-01-20 08:40:30', 1),
(23, 'Haliru', 3, 1270, 100, 1370, 'Rice |', '2021-01-20 10:42:21', 1),
(24, 'Haliru', 3, 1370, 100, 1470, 'Rice |', '2021-01-20 10:43:07', 1),
(25, 'Haliru', 3, 1470, 100, 1570, 'Rice |', '2021-01-20 10:44:12', 1),
(26, 'Haliru', 3, 320, 200, 520, 'Gaari |', '2021-01-20 10:44:41', 2),
(27, 'Haliru', 3, 520, 200, 720, 'Gaari |', '2021-01-20 10:49:41', 2),
(28, 'Haliru', 3, 720, 200, 920, 'Gaari |', '2021-01-20 10:51:28', 2),
(29, 'Haliru', 3, 920, 200, 1120, 'Gaari |', '2021-01-20 10:59:16', 2),
(30, 'Haliru', 3, 1570, 100, 1670, 'Rice |', '2021-01-21 08:51:51', 1),
(31, 'Haliru', 3, 1570, 100, 1670, 'Rice |', '2021-01-21 08:54:56', 1),
(32, 'Haliru', 3, 1670, 100, 1770, 'Rice |', '2021-01-21 08:55:48', 1),
(33, 'Haliru', 3, 1770, 100, 1870, 'Rice |', '2021-01-21 08:56:32', 1),
(34, 'Haliru', 3, 1870, 100, 1970, 'Rice |', '2021-01-21 08:57:50', 1),
(35, 'Haliru', 3, 1970, 100, 2070, 'Rice |', '2021-01-21 09:03:03', 1),
(36, 'Haliru', 3, 2070, 100, 2170, 'Rice |', '2021-01-21 09:03:48', 1),
(37, 'Haliru', 3, 2170, 100, 2270, 'Rice |', '2021-01-21 10:43:23', 1),
(38, 'Haliru', 3, 2170, 100, 2270, 'Rice |', '2021-01-21 10:45:08', 1),
(39, 'Haliru', 3, 2170, 100, 2270, 'Rice |', '2021-01-21 10:45:40', 1),
(40, 'Haliru', 3, 2170, 100, 2270, 'Rice |', '2021-01-21 11:02:39', 1),
(41, 'Haliru', 3, 2170, 100, 2270, 'Rice |', '2021-01-21 11:03:10', 1),
(42, 'Haliru', 3, 2170, 100, 2270, 'Rice |', '2021-01-21 11:12:06', 1),
(43, 'Haliru', 3, 2170, 100, 2270, 'Rice |', '2021-01-21 11:13:39', 1),
(44, 'Haliru', 3, 2170, 100, 2270, 'Rice |', '2021-01-21 11:15:47', 1),
(45, 'Haliru', 3, 2170, 100, 2270, 'Rice |', '2021-01-21 11:17:14', 1),
(46, 'Haliru', 3, 2170, 100, 2270, 'Rice |', '2021-01-21 11:18:31', 1),
(47, 'Haliru', 3, 2170, 100, 2270, 'Rice |', '2021-01-21 11:19:12', 1),
(48, 'Haliru', 3, 2170, 100, 2270, 'Rice |', '2021-01-21 11:21:06', 1),
(49, 'Haliru', 3, 2170, 100, 2270, 'Rice |', '2021-01-21 11:21:52', 1),
(50, 'Haliru', 3, 2170, 100, 2270, 'Rice |', '2021-01-21 11:30:16', 1),
(51, 'Haliru', 3, 2170, 100, 2270, 'Rice |', '2021-01-21 11:33:44', 1),
(52, 'Haliru', 3, 2170, 100, 2270, 'Rice |', '2021-01-21 11:38:01', 1),
(53, 'Haliru', 3, 2170, 100, 2270, 'Rice |', '2021-01-21 11:41:00', 1),
(54, 'Haliru', 3, 2170, 100, 2270, 'Rice |', '2021-01-21 11:42:28', 1),
(55, 'Haliru', 3, 2170, 100, 2270, 'Rice |', '2021-01-21 11:46:12', 1),
(56, 'Haliru', 3, 2170, 100, 2270, 'Rice |', '2021-01-21 11:46:31', 1),
(57, 'Haliru', 3, 2170, 100, 2270, 'Rice |', '2021-01-21 11:47:43', 1),
(58, 'Haliru', 3, 2170, 100, 2270, 'Rice |', '2021-01-21 11:48:41', 1),
(59, 'Haliru', 3, 2170, 100, 2270, 'Rice |', '2021-01-21 11:50:18', 1),
(60, 'Haliru', 3, 2170, 100, 2270, 'Rice |', '2021-01-21 11:55:41', 1),
(61, 'Haliru', 3, 2170, 3500, 5670, 'Blood Tonic |Blood Tonic |Blood Tonic |Blood Tonic |Blood Tonic |Blood Tonic |Blood Tonic |Blood Tonic |Blood Tonic |Blood Tonic |Blood Tonic |Blood T', '2021-01-21 16:35:05', 1),
(62, 'Haliru', 3, 2170, 150, 2320, 'Beans |', '2021-01-21 16:37:22', 1),
(63, 'Haliru', 3, 2170, 850, 3020, 'Rice |Blood Tonic |Blood Tonic |Blood Tonic |', '2021-01-21 16:45:00', 1),
(64, 'Haliru', 3, 2170, 850, 3020, 'Rice |Blood Tonic |Blood Tonic |Blood Tonic |', '2021-01-21 16:48:23', 1),
(65, 'Haliru', 3, 2170, 850, 3020, 'Rice |Blood Tonic |Blood Tonic |Blood Tonic |', '2021-01-21 16:49:03', 1),
(66, 'Haliru', 3, 3020, 150, 3170, 'Beans |', '2021-01-21 16:50:00', 1),
(67, 'Haliru', 3, 3170, 100, 3270, 'Rice |', '2021-01-21 16:50:12', 1),
(68, 'Haliru', 3, 1120, 150, 1270, 'Beans |', '2021-01-21 16:50:23', 2),
(69, 'Haliru', 3, 3270, 200, 3470, 'Gaari |', '2021-01-21 16:51:02', 1),
(70, 'Haliru', 3, 1270, 200, 1470, 'Gaari |', '2021-01-21 16:51:16', 2),
(71, 'Haliru', 3, 1470, 250, 1720, 'Blood Tonic |', '2021-01-21 16:52:02', 2),
(72, 'Haliru Kolawole Yusuf', 3, 320, 150, 470, 'Beans |', '2021-01-21 18:40:45', 3),
(73, 'Haliru', 3, 1720, 100, 1820, 'Rice |', '2021-01-21 18:45:45', 2),
(74, 'Haliru', 3, 1820, 350, 2170, 'Beans |Gaari |', '2021-01-21 18:47:08', 2),
(95, 'Haliru', 3, 2170, 100, 2270, 'Rice |', '2021-01-23 16:45:43', 2),
(96, 'Haliru Kolawole Yusuf', 3, 470, 100, 570, 'Rice |', '2021-01-23 16:45:57', 3),
(97, 'Haliru Yusuf', 3, 0, 100, 100, 'Rice |', '2021-01-23 16:46:08', 4),
(98, 'Haliru Yusuf', 3, 0, 100, 100, 'Rice |', '2021-01-23 16:50:19', 4),
(99, 'Haliru', 3, 3470, 350, 3820, 'Beans |Gaari |', '2021-01-23 16:50:46', 1),
(100, 'Haliru', 3, 2170, 250, 2420, 'Rice |Beans |', '2021-01-23 16:51:08', 2),
(101, 'Haliru', 3, 3470, 100, 3570, 'Rice |', '2021-01-23 17:02:49', 1),
(102, 'Haliru', 3, 3470, 100, 3570, 'Rice |', '2021-01-23 17:03:09', 1),
(103, 'Haliru', 3, 600, 100, 700, 'Rice |', '2021-01-23 17:12:19', 1),
(104, 'Haliru', 3, 2170, 350, 2520, 'Rice |Blood Tonic |', '2021-01-23 17:12:40', 2),
(105, 'Haliru', 3, 700, 100, 800, 'Rice |', '2021-01-23 17:12:53', 1),
(106, 'Haliru', 3, 800, 250, 1050, 'Rice |Beans |', '2021-01-23 17:13:18', 1),
(107, 'Lateef Yusuf', 7, 470, 250, 720, 'Green Tea |Sweet Kola |', '2021-01-23 19:26:58', 3),
(108, 'Haliru Yusuf', 7, 0, 100, 100, 'Rice |', '2021-01-24 10:39:59', 5),
(109, 'Haliru Yusuf', 7, 100, 100, 200, 'Rice |', '2021-01-24 10:40:12', 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `name` varchar(150) NOT NULL,
  `password` varchar(70) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `parent` bigint NOT NULL,
  `sponsor` bigint NOT NULL,
  `ancestors` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `descendants` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `bronzevalue` int NOT NULL DEFAULT '0',
  `bonusvalue` int NOT NULL DEFAULT '0',
  `rank` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'none',
  `phone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0000000000',
  `bankaccount` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0000000000',
  `dateregistered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `password`, `parent`, `sponsor`, `ancestors`, `descendants`, `bronzevalue`, `bonusvalue`, `rank`, `phone`, `bankaccount`, `dateregistered`) VALUES
(1, 'hallykola', 'Haliru', 'hally123', 0, 0, '', '0', 1050, -40, 'BRONZE', '35342422', '2343423535', '2021-01-18 07:54:39'),
(2, 'hallykola', 'Haliru', '$2y$10$1ueea65VAolalckrV7ZWBOOtLYuASmoqe8n89jyiXHQrVG22nuEaK', 7, 0, '', '0', 2520, 0, 'BRONZE', '35342422', '2343423535', '2021-01-18 08:01:47'),
(3, 'hallykola', 'Lateef Yusuf', '$2y$10$DUHdu6xb6oDiBiYJ/HbcO.dtOU3YQgUcWuee7JTOr54xUv5QUJSgy', 2, 0, '', '0', 720, 0, 'BRONZE', '', '1234', '2021-01-18 10:00:07'),
(4, 'hallykola', 'Haliru Yusuf', '$2y$10$GrpzR237saYi.6aC09H1dOEfs/Cmd/QQcbiuYO4f.CRkFV7zONHA6', 3, 0, '', '0', 0, 0, 'none', '08068858953', '12345', '2021-01-19 08:00:21'),
(5, 'admin', 'Haliru Yusuf', '$2y$10$7qZ1dTvFc4rlkw6fsephP.iBu8ad6SQ56XxiML7H39uNU0vJAwXS6', 3, 0, '', '0', 200, -10, 'BRONZE', '08068858953', '12345', '2021-01-19 08:00:59'),
(6, 'kreemzo', 'Kareem Yusuf', '$2y$10$KHzU9YencALa6LivcoGnrucNTarv1zpmTGsE3bMwNCvWkQ..KsEem', 1, 0, '', '0', 0, 0, 'SILVER', '08068858953', '12345', '2021-01-19 08:03:37'),
(7, 'lateef', 'Lateef Yusuf', '$2y$10$/HyrSATZ/RNd7ou4qGUCD.dPy5BglDnvJBDCS1B6O0IR6dfk3MXAu', 1, 0, '', '0', 0, 9860, 'BRONZE', '08068858953', '12345', '2021-01-19 08:07:39'),
(8, 'lateef', 'Lateef Yusuf', '$2y$10$Qod48nnEJyO8yIBqPy346eHDpRaX5WTxY8tdwwu52DyUNFRL6JTJq', 1, 0, '', '0', 0, 0, 'none', '08068858953', '12345', '2021-01-19 08:10:15'),
(9, 'hallykola1', 'Haliru Yusuf ', '$2y$10$5vd8ahvEd/2wqqL1y.lCYOgtyTpBKhyWmFLyOpM64e4jUryKhHk.a', 0, 1, NULL, NULL, 0, 0, 'none', '0806885834', '00191214523', '2021-01-21 21:33:01'),
(10, 'abiola', 'ABIOLA ISRAEL ENIOLA', '$2y$10$cGbU4EhA5KBnZdTr/wrpQeiYXBa/rQZuyLspTeWNOUKwFo2xF/Xy6', 0, 45, NULL, NULL, 0, 0, 'none', '070', '0', '2021-01-22 07:50:35'),
(11, 'dada', 'DADA STEPHEN OMOBOLAJI', '$2y$10$zi9mbyOYK5o0cQ7eba9Mt.OSHdtXRkCV6kH2TveQw0q36kZQ5kV1S', 0, 1, NULL, NULL, 0, 0, 'none', '08023434567', '00', '2021-01-23 18:46:39'),
(12, 'raheem', 'RAHEEM ABDULQUADIR OPEYEMI', '$2y$10$0BSy12jDmpSJ9t7O2448q.nrenM4gD31yX2rIUEGCVU/I2wFPZKNO', 0, 7, NULL, NULL, 0, 0, 'none', '', '0', '2021-01-23 19:50:48'),
(13, 'jamiu', 'YUSUF JAMIU AYODEJI', '$2y$10$6ExWdmZLESHDt9ih3BVJZeEBKAxwi3y78jmw770GB29dtMdbk0gK.', 0, 7, NULL, NULL, 0, 0, 'none', '', '0', '2021-01-23 20:03:14'),
(14, 'udoh', 'UDOH UKARABONG LERI', '$2y$10$DenzirrJd005AoPMHKvBHeo5o9Yw27YvxUsL6deL/xbp8Tw02AdqW', 0, 7, NULL, NULL, 0, 0, 'none', '', '0', '2021-01-23 20:11:17'),
(15, 'israel', 'ABIOLA ISRAEL ENIOLA', '$2y$10$WxY5fQxq46sV4eFNPXNiEOEqXIwJgyUkzw94a7hOWKoZGTJf0LL2C', 0, 7, NULL, NULL, 0, 0, 'none', '', '0', '2021-01-24 10:03:38'),
(16, 'gafar', 'GAFAR YUSUF', '$2y$10$7TrCQVM7/AidCAGMFQfJY.1NSNOBKScrY4ZIFUQaa.k6Aht72cwuy', 0, 1, NULL, NULL, 0, 0, 'none', '08023434567', '0019121524', '2021-01-24 10:06:37');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bonuses`
--
ALTER TABLE `bonuses`
  ADD CONSTRAINT `Bonuses link to transaction` FOREIGN KEY (`transactionid`) REFERENCES `transactions` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `BV transaction link to manager` FOREIGN KEY (`issuer`) REFERENCES `managers` (`id`),
  ADD CONSTRAINT `BV transactions link to users` FOREIGN KEY (`userid`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
