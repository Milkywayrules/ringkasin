-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 13, 2019 at 10:01 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pendekin`
--

-- --------------------------------------------------------

--
-- Table structure for table `url`
--

CREATE TABLE `url` (
  `id` int(4) NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `ori_url` varchar(250) NOT NULL,
  `short_url` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `custom_url` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `hit` int(5) NOT NULL DEFAULT '0',
  `is_active` enum('0','1') NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `url`
--

INSERT INTO `url` (`id`, `created_by`, `ori_url`, `short_url`, `custom_url`, `hit`, `is_active`, `created_at`) VALUES
(38, '', '', '', '', 0, '1', '2019-02-13 19:45:53'),
(10, 'superadmin', 'http://', 'S', '', 0, '1', '2019-02-13 08:20:46'),
(18, 'daddy', 'http://asd', 'n', '', 0, '1', '2019-02-13 10:53:34'),
(34, 'daddy', 'http://asds', 'z', '', 0, '1', '2019-02-13 11:23:26'),
(31, 'daddy', 'http://cwecw', '2', '', 0, '1', '2019-02-13 11:21:42'),
(28, 'daddy', 'http://dqwd', '7', '', 0, '1', '2019-02-13 11:20:49'),
(36, 'daddy', 'http://dqwdq', '5', 'okeee', 0, '1', '2019-02-13 11:24:25'),
(16, 'daddy', 'http://google.co', 'j', '', 0, '1', '2019-02-13 10:51:14'),
(15, 'daddy', 'http://google.com', 'x', 'goo', 12, '1', '2019-02-13 10:50:24'),
(17, 'daddy', 'http://google.id', 'V', 'goo id', 0, '1', '2019-02-13 10:51:26'),
(1, 'superadmin', 'http://himaif.unikom.ac.id/', 'Z', '', 0, '1', '2019-02-13 08:07:34'),
(20, 'daddy', 'http://himaif.unikom.ac.id/dwq', 'b', '', 0, '1', '2019-02-13 10:57:28'),
(9, 'superadmin', 'http://himaif.unikom.ac.id/ifest', 'y', '', 0, '1', '2019-02-13 08:20:10'),
(24, 'daddy', 'http://himaif.unikom.ac.id/kodw', '-', 'opp', 0, '1', '2019-02-13 11:10:33'),
(22, 'daddy', 'http://himaif.unikom.ac.id/owqe', 'p', 'ok', 0, '1', '2019-02-13 11:08:27'),
(8, 'superadmin', 'http://himaif.unikom.ac.id/p2m', 'f', '', 0, '1', '2019-02-13 08:18:39'),
(19, 'daddy', 'http://himaif.unikom.ac.id/sa', 'G', '', 0, '1', '2019-02-13 10:54:58'),
(7, 'superadmin', 'http://himaif.unikom.ac.id/seminar', 's', '', 0, '1', '2019-02-13 08:18:17'),
(23, 'daddy', 'http://himaif.unikom.ac.id/xcsa', 'R', 'lo', 0, '1', '2019-02-13 11:09:49'),
(37, 'user1', 'http://instagram.com', '4', 'ig', 0, '1', '2019-02-13 11:58:11'),
(21, 'daddy', 'http://kokk', 'F', 'ko', 0, '1', '2019-02-13 11:04:43'),
(26, 'daddy', 'http://w', 'D', 'pplpl', 0, '1', '2019-02-13 11:20:06'),
(29, 'daddy', 'http://wq', 'd', 'wqdwq', 1, '1', '2019-02-13 11:21:15'),
(30, 'daddy', 'http://wqdqwd', 'K', '', 0, '1', '2019-02-13 11:21:24'),
(27, 'daddy', 'http://ww', 'M', 'weqw', 0, '1', '2019-02-13 11:20:34'),
(4, 'superadmin', 'https://drive.google.com/drive/u/0/folders/1-PiclwnSL2V7hkZun43Y-QBQmwXODU0-', 'B', '', 0, '1', '2019-02-13 08:15:19'),
(33, 'daddy', 'https://drive.google.com/drive/u/0/folders/1-PiclwnSL2V7hkZun43Y-QBQmwXODU0-3', 'N', '', 0, '1', '2019-02-13 11:23:21'),
(3, 'superadmin', 'https://drive.google.com/folderview?id=10iyxXlPMLx-g6bu78lgANwsycLRjT9tk', '8', '', 0, '1', '2019-02-13 08:14:34'),
(35, 'daddy', 'https://drive.google.com/folderview?id=10iyxXlPMLx-g6bu78lgANwsycLRjT9tkd', 'P', 'wqsqws', 0, '1', '2019-02-13 11:23:31'),
(32, 'daddy', 'https://drive.google.com/folderview?id=10iyxXlsPMLx-g6bu78lgANwsycLRjT9tk', 'W', '', 0, '1', '2019-02-13 11:22:15'),
(2, 'superadmin', 'https://drive.google.com/open?id=1TTlpEFi0TaY332xHV-b7LkLO6aawkY7b', 'X', '', 0, '1', '2019-02-13 08:10:37'),
(25, 'daddy', 'https://drive.google.com/open?id=1TTlpEFi0TaY332xHV-b7LkLOS6aawkY7b', 'v', '', 0, '1', '2019-02-13 11:16:24'),
(11, 'superadmin', 'https://undraw.co/', 'g', '', 0, '1', '2019-02-13 08:21:03'),
(0, 'superadmin', 'https://undraw.co/illustrations', 'undraw', '', 0, '1', '2019-02-13 14:56:02'),
(5, 'superadmin', 'https://undraw.co/illustrationshttps://www.codeigniter.com/user_guide/libraries/sessions.html#flashdata', 'H', '', 0, '1', '2019-02-13 08:16:40'),
(6, 'superadmin', 'https://www.codeigniter.com/user_guide/libraries/sessions.html#flashdata', 't', '', 0, '1', '2019-02-13 08:16:50'),
(12, 'daddy', 'https://www.youtube.com/watch?v=dISNgvVpWlo', '9', '213', 1, '1', '2019-02-13 10:14:22'),
(13, 'daddy', 'https://www.youtube.com/watch?v=dISNgvVpWlo2', 'C', 'teasdasds', 0, '1', '2019-02-13 10:14:30'),
(14, 'daddy', 'https://www.youtube.com/watch?v=dISNgvVpWlo3', 'm', '', 0, '1', '2019-02-13 10:14:37');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(4) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `gender` enum('M','F') NOT NULL,
  `password` varchar(250) NOT NULL,
  `privilege` varchar(2) NOT NULL,
  `is_active` enum('0','1') NOT NULL,
  `activation_code` varchar(250) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `email`, `phone`, `gender`, `password`, `privilege`, `is_active`, `activation_code`, `create_at`) VALUES
(2, 'admin 1', 'admin1', 'ad@m.in', '08123712325', 'M', 'admin', '2', '1', '', '2019-02-12 16:00:49'),
(5, 'daddy', 'daddy', 'daddy@daddy.com', '8391928', 'F', 'daddy', '5', '0', 'fa06daaf2415f8a4176a1759671fcb38', '2019-02-13 09:27:44'),
(4, 'demo', 'demo', 'demo@demo.com', '8986864', 'M', 'demo', '5', '0', '85325a795c1805e808164ab2de5845e3', '2019-02-13 09:17:11'),
(1, 'Superadmin', 'superadmin', 'super@adm.in', '08123987456', 'M', 'admin', '1', '1', '', '2019-02-12 10:57:04'),
(3, 'User 1', 'user1', 'us@e.r', '08147427149', 'F', 'admin', '5', '1', '', '2019-02-12 16:02:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `url`
--
ALTER TABLE `url`
  ADD PRIMARY KEY (`ori_url`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `id` (`id`,`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `url`
--
ALTER TABLE `url`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
