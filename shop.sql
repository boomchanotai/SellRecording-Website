-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2020 at 09:46 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `billrecords`
--

CREATE TABLE `billrecords` (
  `id` int(11) NOT NULL,
  `date` varchar(21) NOT NULL,
  `realprice` int(11) NOT NULL,
  `totalprice` double NOT NULL,
  `type` varchar(255) NOT NULL,
  `user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `billrecords`
--

INSERT INTO `billrecords` (`id`, `date`, `realprice`, `totalprice`, `type`, `user`) VALUES
(1, '2020-01-22 09:04:47pm', 27, 27, 'normal', 2),
(2, '2020-01-23 07:28:37am', 27, 27, 'normal', 2),
(3, '2020-01-23 07:29:03am', 20, 20, 'normal', 2),
(4, '2020-01-23 07:29:33am', 140, 140, 'normal', 2),
(5, '2020-01-23 07:31:44am', 157, 157, 'normal', 2),
(6, '2020-01-23 07:47:14am', 21, 21, 'normal', 2),
(7, '2020-01-23 07:48:03am', 367, 330.3, 'discount', 2),
(8, '2020-01-23 07:59:13am', 210, 210, 'normal', 2),
(9, '2020-01-23 08:12:03am', 7, 7, 'normal', 2),
(10, '2020-01-23 08:14:07am', 7, 7, 'normal', 2),
(11, '2020-01-23 08:21:28am', 150460, 150460, 'normal', 2),
(12, '2020-01-23 08:27:32am', 27, 27, 'normal', 2),
(13, '2020-01-23 08:57:47am', 300, 300, 'normal', 2),
(14, '2020-01-23 08:58:04am', 477, 477, 'normal', 2),
(15, '2020-01-23 09:17:18am', 27, 27, 'normal', 2),
(16, '2020-01-23 09:21:20am', 27, 27, 'normal', 2),
(17, '2020-01-23 09:25:27am', 600, 600, 'normal', 2),
(18, '2020-01-23 09:26:19am', 327, 327, 'normal', 2),
(19, '2020-01-23 10:06:51am', 320, 320, 'normal', 2),
(20, '2020-01-23 10:15:15am', 237, 237, 'normal', 2),
(21, '2020-01-23 10:30:55am', 157, 50, 'discount', 2),
(22, '2020-01-23 10:45:37am', 22087, 22087, 'normal', 2),
(23, '2020-01-23 10:52:14am', 20, 20, 'normal', 2),
(24, '2020-01-23 11:08:40am', 177, 177, 'normal', 2),
(25, '2020-01-23 11:21:50am', 707, 707, 'normal', 2),
(26, '2020-01-23 11:27:44am', 327, 327, 'normal', 2),
(27, '2020-01-23 11:42:38am', 61, 61, 'normal', 2),
(28, '2020-01-23 11:55:31am', 27, 27, 'normal', 2),
(29, '2020-01-23 12:04:47pm', 87, 87, 'normal', 2),
(30, '2020-01-23 12:11:02pm', 27, 27, 'normal', 2),
(31, '2020-01-23 12:31:19pm', 217, 217, 'normal', 2),
(32, '2020-01-23 01:25:17pm', 27, 27, 'normal', 2),
(33, '2020-01-23 01:44:00pm', 27, 27, 'normal', 2),
(34, '2020-01-23 01:45:28pm', 1200, 1200, 'normal', 2);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `sprice` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `sprice`) VALUES
(1, 'น้ำดื่ม', 7, ''),
(2, 'เลย์รสออริจินอล', 20, ''),
(3, 'กางเกงแฟชั่น', 150, ''),
(4, 'ฟันปลอมอาม่า', 300, '');

-- --------------------------------------------------------

--
-- Table structure for table `sellrecords`
--

CREATE TABLE `sellrecords` (
  `id` int(11) NOT NULL,
  `BillNo` int(11) NOT NULL,
  `date` varchar(21) NOT NULL,
  `productid` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `note` varchar(255) NOT NULL,
  `user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sellrecords`
--

INSERT INTO `sellrecords` (`id`, `BillNo`, `date`, `productid`, `amount`, `price`, `note`, `user`) VALUES
(1, 1, '2020-01-22 09:04:47pm', 1, 1, 7, '', 2),
(2, 1, '2020-01-22 09:04:47pm', 2, 1, 20, '', 2),
(3, 2, '2020-01-23 07:28:37am', 1, 1, 7, '', 2),
(4, 2, '2020-01-23 07:28:37am', 2, 1, 20, '', 2),
(5, 3, '2020-01-23 07:29:03am', 2, 1, 20, '', 2),
(6, 4, '2020-01-23 07:29:33am', 2, 1, 20, '', 2),
(7, 4, '2020-01-23 07:29:33am', 2, 1, 20, '', 2),
(8, 4, '2020-01-23 07:29:33am', 2, 5, 100, '', 2),
(9, 5, '2020-01-23 07:31:44am', 1, 1, 7, '', 2),
(10, 5, '2020-01-23 07:31:44am', 3, 1, 150, '', 2),
(11, 6, '2020-01-23 07:47:14am', 1, 3, 21, '', 2),
(12, 7, '2020-01-23 07:48:03am', 2, 3, 60, '', 2),
(13, 7, '2020-01-23 07:48:03am', 1, 1, 7, '', 2),
(14, 7, '2020-01-23 07:48:03am', 3, 1, 150, '', 2),
(15, 7, '2020-01-23 07:48:03am', 3, 1, 150, '', 2),
(16, 8, '2020-01-23 07:59:13am', 2, 3, 60, '', 2),
(17, 8, '2020-01-23 07:59:13am', 3, 1, 150, '', 2),
(18, 9, '2020-01-23 08:12:03am', 1, 1, 7, '', 2),
(19, 10, '2020-01-23 08:14:07am', 1, 1, 7, '', 2),
(20, 11, '2020-01-23 08:21:28am', 2, 1, 20, '', 2),
(21, 11, '2020-01-23 08:21:28am', 2, 7, 140, '', 2),
(22, 11, '2020-01-23 08:21:28am', 3, 1000, 150000, '', 2),
(23, 11, '2020-01-23 08:21:28am', 4, 1, 300, '', 2),
(24, 12, '2020-01-23 08:27:32am', 1, 1, 7, '', 2),
(25, 12, '2020-01-23 08:27:32am', 2, 1, 20, '', 2),
(26, 13, '2020-01-23 08:57:47am', 4, 1, 300, '', 2),
(27, 14, '2020-01-23 08:58:04am', 1, 1, 7, '', 2),
(28, 14, '2020-01-23 08:58:04am', 2, 1, 20, '', 2),
(29, 14, '2020-01-23 08:58:04am', 3, 1, 150, '', 2),
(30, 14, '2020-01-23 08:58:04am', 4, 1, 300, '', 2),
(31, 15, '2020-01-23 09:17:18am', 1, 1, 7, '', 2),
(32, 15, '2020-01-23 09:17:18am', 2, 1, 20, '', 2),
(33, 16, '2020-01-23 09:21:20am', 1, 1, 7, '', 2),
(34, 16, '2020-01-23 09:21:20am', 2, 1, 20, '', 2),
(35, 17, '2020-01-23 09:25:27am', 4, 1, 300, '', 2),
(36, 17, '2020-01-23 09:25:27am', 4, 1, 300, '', 2),
(37, 18, '2020-01-23 09:26:19am', 1, 1, 7, '', 2),
(38, 18, '2020-01-23 09:26:19am', 2, 1, 20, '', 2),
(39, 18, '2020-01-23 09:26:19am', 4, 1, 300, '', 2),
(40, 19, '2020-01-23 10:06:51am', 2, 1, 20, '', 2),
(41, 19, '2020-01-23 10:06:51am', 4, 1, 300, '', 2),
(42, 20, '2020-01-23 10:15:15am', 1, 1, 7, '', 2),
(43, 20, '2020-01-23 10:15:15am', 2, 4, 80, '', 2),
(44, 20, '2020-01-23 10:15:15am', 3, 1, 150, '', 2),
(45, 21, '2020-01-23 10:30:55am', 1, 1, 7, '', 2),
(46, 21, '2020-01-23 10:30:55am', 3, 1, 150, '', 2),
(47, 22, '2020-01-23 10:45:37am', 1, 1, 7, '', 2),
(48, 22, '2020-01-23 10:45:37am', 2, 1, 20, '', 2),
(49, 22, '2020-01-23 10:45:37am', 2, 3, 60, '', 2),
(50, 22, '2020-01-23 10:45:37am', 2, 1100, 22000, '', 2),
(51, 23, '2020-01-23 10:52:14am', 2, 1, 20, '', 2),
(52, 24, '2020-01-23 11:08:40am', 1, 1, 7, '', 2),
(53, 24, '2020-01-23 11:08:40am', 2, 1, 20, '', 2),
(54, 24, '2020-01-23 11:08:40am', 3, 1, 150, '', 2),
(55, 25, '2020-01-23 11:21:50am', 1, 1, 7, '', 2),
(56, 25, '2020-01-23 11:21:50am', 1, 100, 700, '', 2),
(57, 26, '2020-01-23 11:27:44am', 2, 1, 20, '', 2),
(58, 26, '2020-01-23 11:27:44am', 1, 1, 7, '', 2),
(59, 26, '2020-01-23 11:27:44am', 4, 1, 300, '', 2),
(60, 27, '2020-01-23 11:42:38am', 1, 3, 21, '', 2),
(61, 27, '2020-01-23 11:42:38am', 2, 2, 40, '', 2),
(62, 28, '2020-01-23 11:55:31am', 2, 1, 20, '', 2),
(63, 28, '2020-01-23 11:55:31am', 1, 1, 7, '', 2),
(64, 29, '2020-01-23 12:04:47pm', 1, 1, 7, '', 2),
(65, 29, '2020-01-23 12:04:47pm', 2, 1, 20, '', 2),
(66, 29, '2020-01-23 12:04:47pm', 2, 3, 60, '', 2),
(67, 30, '2020-01-23 12:11:02pm', 1, 1, 7, '', 2),
(68, 30, '2020-01-23 12:11:02pm', 2, 1, 20, '', 2),
(69, 31, '2020-01-23 12:31:19pm', 1, 1, 7, '', 2),
(70, 31, '2020-01-23 12:31:19pm', 1, 30, 210, '', 2),
(71, 32, '2020-01-23 01:25:17pm', 2, 1, 20, '', 2),
(72, 32, '2020-01-23 01:25:17pm', 1, 1, 7, '', 2),
(73, 33, '2020-01-23 01:44:00pm', 1, 1, 7, '', 2),
(74, 33, '2020-01-23 01:44:00pm', 2, 1, 20, '', 2),
(75, 34, '2020-01-23 01:45:28pm', 4, 4, 1200, '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `realname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `realname`, `lastname`, `email`, `role`) VALUES
(1, 'boom', '0fdfdd3b4bad88114734d860858ad9fc', 'Chanotai', 'Krajeam', 'boom9387@Hotmail.com', 'Admin'),
(2, 'boom2', '0fdfdd3b4bad88114734d860858ad9fc', 'Chanotai', 'Krajeam', 'boom9387@Hotmail.com', 'Owner'),
(3, 'o0KoonBoom0o', '0fdfdd3b4bad88114734d860858ad9fc', 'Chanotai', 'Krajeam', 'boom9387@hotmail.com', 'Owner');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `billrecords`
--
ALTER TABLE `billrecords`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uid` (`user`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sellrecords`
--
ALTER TABLE `sellrecords`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productid` (`productid`),
  ADD KEY `billno` (`BillNo`),
  ADD KEY `userid` (`user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `billrecords`
--
ALTER TABLE `billrecords`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sellrecords`
--
ALTER TABLE `sellrecords`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `billrecords`
--
ALTER TABLE `billrecords`
  ADD CONSTRAINT `uid` FOREIGN KEY (`user`) REFERENCES `user` (`id`);

--
-- Constraints for table `sellrecords`
--
ALTER TABLE `sellrecords`
  ADD CONSTRAINT `billno` FOREIGN KEY (`BillNo`) REFERENCES `billrecords` (`id`),
  ADD CONSTRAINT `productid` FOREIGN KEY (`productid`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `userid` FOREIGN KEY (`user`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
