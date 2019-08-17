-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2019 at 05:23 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

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
  `custom_url` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_cs DEFAULT NULL,
  `hit` int(5) NOT NULL DEFAULT '0',
  `qrcode` varchar(100) NOT NULL,
  `is_active` enum('0','1') NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `url`
--

INSERT INTO `url` (`id`, `created_by`, `ori_url`, `short_url`, `custom_url`, `hit`, `qrcode`, `is_active`, `created_at`) VALUES
(1, 'daddy', 'http://himaif.unikom.ac.id/', 'Z', 'himaif', 0, 'qrcode_himaif.png', '1', '2019-02-19 04:30:18'),
(2, 'daddy', 'http://facebook.com', 'X', 'efbiy', 0, 'qrcode_efbiy.png', '1', '2019-02-19 04:31:34'),
(3, 'daddy', 'http://himaif.unikom.ac.id/?', '8', 'hmifokeoce', 0, 'qrcode_hmifokeoce.png', '1', '2019-02-19 04:34:51'),
(4, 'daddy', 'https://www.codeigniter.com/user_guide/libraries/sessions.html#flashdata', 'B', '_pndkn_cstm_xx_4', 0, 'qrcode_B.png', '1', '2019-02-19 04:35:27'),
(5, 'daddy', 'http://tralala', 'H', 'tr', 0, 'qrcode_tr.png', '1', '2019-02-19 04:44:21'),
(6, 'asipeng', 'http://youtube.com', 't', 'yt', 1, 'qrcode_yt.png', '0', '2019-02-23 07:37:20'),
(7, 'asipeng', 'http://dropbox.com', 's', '_pndkn_cstm_xx_7', 1, 'qrcode_s.png', '1', '2019-02-23 07:37:58'),
(8, 'asipeng', 'https://www.codeigniter.com/user_guide/libraries/sessions.html#flashdata', 'f', 'ci_flashdata', 2, 'qrcode_ci_flashdata.png', '1', '2019-02-23 07:38:10'),
(9, 'asipeng', 'http://localhost/phpmyadmin/sql.php?db=db_pendekin&table=user&pos=0', 'y', 'loooooooooooooo', 0, 'qrcode_loooooooooooooo.png', '0', '2019-02-25 05:30:17'),
(10, 'asipeng', 'http://localhost/php/', 'S', '_pndkn_cstm_xx_10', 0, 'qrcode_S.png', '1', '2019-02-25 05:33:36'),
(11, 'asipeng', 'http://localhost/php/qrcode1/mahasiswa', 'g', 'qrMahasiswa', 2, 'qrcode_g.png', '1', '2019-02-25 05:33:51'),
(12, 'asipeng', 'http://localhost/phpmyadmin/sql.php?server=1&db=db_pendekin&table=url&pos=0', '9', '', 0, 'qrcode_9.png', '0', '2019-02-25 05:38:25'),
(13, 'asipeng', 'http://www.kaskus.co.id/thread/000000000000000016759808/official-thread--pro-evolution-soccer-2013/', 'C', '', 0, 'pendekin_C_.png', '0', '2019-02-25 05:42:31'),
(14, 'asipeng', 'http://www.kaskus.co.id/show_post/000000000000000497526959/457', 'm', '', 0, 'pendekin_m_14.png', '0', '2019-02-25 05:43:06');

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
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `activation_code` varchar(250) NOT NULL,
  `reset_code` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `email`, `phone`, `gender`, `password`, `privilege`, `is_active`, `create_at`, `activation_code`, `reset_code`) VALUES
(7, 'switch', 'account', 'sw@wow.waw', '085643422', 'M', '$2a$08$r5zGs4fPHHR75MsnxBK1zuASmVF56j7DWsrotq2gpaOrFZnMbZjhW', '5', '0', '2019-02-15 18:41:58', '41c63444c6ea96e5d949d73ebbb07d73', ''),
(2, 'admin 1', 'admin1', 'ad@m.in', '08123712325', 'M', '$2a$08$ITOAOhHT4N6Xbe0kARakveitiwhZzCi5A4IIAon/xq3NLiaqWObvq', '2', '1', '2019-02-12 16:00:49', '', ''),
(18, 'Dio', 'apajabole1', 'apajabole1@gmail.com2', '08771707199', 'F', '$2a$08$7VyoUbel9P.P83xjQIIb/ODweW5lvKyQIu92sJpLXJ6pITo1jgOBq', '5', '0', '2019-02-15 19:08:32', 'e09767892ea9999be0c2fb54994ace4f', ''),
(17, 'Dio', 'apajabole1g', 'apajabole1@gmail.cos', '0877170719984', 'F', '$2a$08$BGIRq/eHmHjsqq8Hg218IOZyY83BpHZ16zACgWhTodLQse2K7JxW6', '5', '0', '2019-02-15 19:07:52', 'a3fe6edb737b64bf5920a73805159329', ''),
(16, 'Dio', 'apajabole1gmai', 'apajabole1@gmail.co', '087717071998213', 'M', '$2a$08$.4.ZEngQ.EugSHC1ejzE.O6Fti0ivoY/XQejn590ARp.K7HZhUjNO', '5', '0', '2019-02-15 19:05:20', '77101b5d2c90244a8b6eae8996dc365f', ''),
(15, 'Dio', 'apajabole1gmail', 'apajabole1@gmail.co.id', '08771707199812', 'M', '$2a$08$MZnmD5Js5ZoMjEM6hNbHE.l/WRumEVyAxIFMUbS5NX2v/0uvIp12W', '5', '0', '2019-02-15 19:04:19', 'b07091dec695b80a3d2f9ba09f075fe0', ''),
(14, 'Dio', 'apajabole1gmailcom', 'apajabole1@gmail.com', '087717071998', 'M', '$2a$08$qIT7UtG.YS4Cnvu2q4X/Gu7hdigQi0HDigSoWEqmgAoktTzqtiBbO', '5', '0', '2019-02-15 19:03:12', '90c0535fa8421aaf005b6d5298ca4c87', 'f0764e3cbb10d3522fcb2aa5d3f00693'),
(19, 'Assifha Nurhadianisa', 'asipeng', 'asi@pe.ng', '085612328', 'F', '$2b$10$oYNZoMpRz.h0Sov2u1SineQpqL/inZ.mLzN3BmS4ywCQ9RTBiZccy', '5', '0', '2019-02-15 19:19:14', '1d839419ba58bf9cf0532c075f2f00f0', ''),
(5, 'daddy', 'daddy', 'daddy@daddy.com', '8391928', 'F', '$2a$08$ITOAOhHT4N6Xbe0kARakveitiwhZzCi5A4IIAon/xq3NLiaqWObvq', '5', '0', '2019-02-13 09:27:44', 'fa06daaf2415f8a4176a1759671fcb38', ''),
(20, 'dedi', 'daddys', 'apajabole1@gmail.coms', '0877170719983', 'M', '$2a$08$kzSFSQ8iV/62BWli4sUdU.9HwxkaUg6X//7iWMNtIU3n/dRLYB5hK', '5', '0', '2019-02-18 05:38:31', '012812bf4a4ef967a1a6b3a512af883d', ''),
(4, 'demo', 'demo', 'demo@demo.com', '8986864', 'M', '$2a$08$ITOAOhHT4N6Xbe0kARakveitiwhZzCi5A4IIAon/xq3NLiaqWObvq', '5', '0', '2019-02-13 09:17:11', '85325a795c1805e808164ab2de5845e3', ''),
(13, 'diri ku', 'diriku', 'diri@k.u', '02183979', 'F', '$2a$08$nhJBAveibEOjjA8W1KZZB.qVRhZZThaUQucMK41cz/nl1MddsRaLe', '5', '0', '2019-02-15 19:01:38', '41ffea345a551e8bc0343a32c4714bd8', ''),
(12, 'diri mu', 'dirimu', 'diri@m.u', '9021380192', 'M', '$2a$08$F2nKCzSlpAi61HSva2ghM.1goEQx.X.cZfq8sKA7ey9Osd06GFnU6', '5', '0', '2019-02-15 19:01:14', 'bc526f94e4c68b57a958f2314af59ca5', ''),
(1, 'Superadmin', 'superadmin', 'super@adm.in', '08123987456', 'M', '$2b$10$vmqau5Jb6uL88vxdUGvofudW/iGxGueGPEJiWVu021TWWcZLZxzmC', '1', '1', '2019-02-12 10:57:04', '', ''),
(8, 'tenang', 'surga', 'surga@disa.na', '0873232144', 'M', '$2a$08$1T2svBuAZcdqcwXT4M4wbO5ARFwaCBZbQxhBqWMqL7MWmnNVAiLj2', '5', '0', '2019-02-15 18:55:16', '212babe4ac06fe508eb735ffbab86b16', ''),
(9, 'tenang', 'surga2', 'surga2@disa.na', '08732321442', 'M', '$2a$08$N6W7djramBRGnhCx9YYCfeuchXDCnAfH7Ks1AoqnIapns4JMDKZZm', '5', '0', '2019-02-15 18:57:47', '8ebc1086c3898079fd334026f910a3d1', ''),
(10, 'tenang', 'surga3', 'surga3@disa.na', '087323214422', 'F', '$2a$08$aLOv2CFSz76sqJqgP1pUhO6Pv18S3XlsVIZf1MWyCHskR7idpuxmC', '5', '0', '2019-02-15 18:59:25', 'ff5b33148f4db51514ea8f14d507934b', ''),
(11, 'tenang', 'surga4', 'surga4@disa.na', '0873232144221', 'M', '$2a$08$4kSXGS9/stMKmixIRh2CUu/As4C2jNaHyao733aUiadg/syZSFyH2', '5', '0', '2019-02-15 19:00:24', '77bf3e9ee5e51e58f973544af8724825', ''),
(6, 'Michael', 'tes', 'tes@tes.sch.id', '08128312', 'M', '$2a$08$ITOAOhHT4N6Xbe0kARakveitiwhZzCi5A4IIAon/xq3NLiaqWObvq', '5', '0', '2019-02-15 09:41:47', '861887b4d359c40538c13ba8a7627894', ''),
(3, 'User 1', 'user1', 'us@e.r', '08147427149', 'F', '$2a$08$ITOAOhHT4N6Xbe0kARakveitiwhZzCi5A4IIAon/xq3NLiaqWObvq', '5', '1', '2019-02-12 16:02:41', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `url`
--
ALTER TABLE `url`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
