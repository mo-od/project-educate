-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 21 ก.พ. 2020 เมื่อ 10:39 PM
-- เวอร์ชันของเซิร์ฟเวอร์: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pro1`
--

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL,
  `topic` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- dump ตาราง `contact`
--

INSERT INTO `contact` (`contact_id`, `topic`, `description`) VALUES
(1, 'เว็บเรามีรับซื้อ รับไอเทมแล้ว จ้าาา', 'สามาดูเรทราคารับซื้อได้ ที่หน้า Rate Price');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `orders`
--

CREATE TABLE `orders` (
  `orders_id` int(10) NOT NULL,
  `order_namber` varchar(50) NOT NULL,
  `u_id` int(10) NOT NULL,
  `product` varchar(255) NOT NULL,
  `unit` float NOT NULL,
  `unit_price` float NOT NULL,
  `total_price` float NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- dump ตาราง `orders`
--

INSERT INTO `orders` (`orders_id`, `order_namber`, `u_id`, `product`, `unit`, `unit_price`, `total_price`, `date`) VALUES
(340, '68', 3, '1', 5, 400, 2000, '2020-02-17 05:32:46'),
(341, '68', 3, '2', 1, 1000, 1000, '2020-02-17 05:32:46'),
(342, '69', 3, '3', 1, 450, 450, '2020-02-17 06:01:44'),
(343, '69', 3, '2', 1, 1000, 1000, '2020-02-17 06:01:44'),
(344, '70', 9, '4', 1, 150, 150, '2020-02-17 06:02:05'),
(345, '70', 9, '6', 2, 180, 360, '2020-02-17 06:02:05'),
(346, '71', 3, '1', 2, 400, 800, '2020-02-21 21:52:38'),
(347, '71', 3, '2', 1, 1000, 1000, '2020-02-21 21:52:38'),
(348, '71', 3, '3', 2, 450, 900, '2020-02-21 21:52:38'),
(349, '72', 3, '1', 3, 450, 1350, '2020-02-21 21:59:00'),
(350, '72', 3, '5', 2, 150, 300, '2020-02-21 21:59:00');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `orders_run`
--

CREATE TABLE `orders_run` (
  `ordersid_run` int(10) NOT NULL,
  `u_id` int(10) NOT NULL,
  `ordersdate_run` datetime NOT NULL,
  `status` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- dump ตาราง `orders_run`
--

INSERT INTO `orders_run` (`ordersid_run`, `u_id`, `ordersdate_run`, `status`) VALUES
(68, 3, '2020-02-17 05:32:46', '2'),
(69, 3, '2020-02-17 06:01:44', '1'),
(70, 9, '2020-02-17 06:02:05', '2'),
(71, 3, '2020-02-21 21:52:38', '2'),
(72, 3, '2020-02-21 21:59:00', '2');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `product`
--

CREATE TABLE `product` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(100) NOT NULL,
  `p_description` varchar(250) NOT NULL,
  `p_image` text NOT NULL,
  `p_price` float NOT NULL,
  `p_type` varchar(3) NOT NULL,
  `p_rarity` varchar(100) NOT NULL,
  `p_amount` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- dump ตาราง `product`
--

INSERT INTO `product` (`p_id`, `p_name`, `p_description`, `p_image`, `p_price`, `p_type`, `p_rarity`, `p_amount`) VALUES
(1, 'Righteous Thunderbolt', 'zeus', 'p1.jpg', 400, '3', 'Imortal', '15'),
(2, 'The Magus Cypher', 'Rubick\'s', 'p2.jpg', 500, '3', 'arcana', '17'),
(3, 'Sylvan Cascade', 'Windranger ', 'p3.jpg', 450, '3', 'Imortal', '17'),
(4, 'Gravelmaw', 'Earthshaker ', 'gravelmaw.png', 150, '1', 'Immortal', '19'),
(5, 'Bindings', 'Earthshaker', 'bindings.png', 150, '1', 'Legendary', '18'),
(6, 'Auspice', 'Orge Magi', 'auspice.png', 180, '1', 'Immortal', '10'),
(7, 'Golden', '', 'golden.png', 150, '2', 'Immortal', '19'),
(8, 'Codicil', '', 'codicil.png', 350, '2', 'Immortal', '20'),
(9, 'Manifold', '', 'manifold.png', 700, '2', 'Arcana', '50');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `status_orders`
--

CREATE TABLE `status_orders` (
  `status_ordersid` int(11) NOT NULL,
  `status_ordersname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- dump ตาราง `status_orders`
--

INSERT INTO `status_orders` (`status_ordersid`, `status_ordersname`) VALUES
(1, 'Pending '),
(2, 'Confirm'),
(3, 'Failed');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `typeproduct`
--

CREATE TABLE `typeproduct` (
  `ID` int(11) NOT NULL,
  `name_pro` varchar(255) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- dump ตาราง `typeproduct`
--

INSERT INTO `typeproduct` (`ID`, `name_pro`, `type`) VALUES
(1, 'Strength', 1),
(2, 'Agility', 2),
(3, 'Intelligence', 3);

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `users`
--

CREATE TABLE `users` (
  `u_id` int(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `link` text NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT '0',
  `date` datetime NOT NULL,
  `point` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- dump ตาราง `users`
--

INSERT INTO `users` (`u_id`, `username`, `password`, `name`, `email`, `link`, `status`, `date`, `point`) VALUES
(3, 'root', '25d55ad283aa400af464c76d713c07ad', 'Frank', 'lisa@yg.com', 'https://steamcommunity.com/tradeoffer/new/?partner=441522523&token=TM91C-IV&fbclid=IwAR1USrt6Ga2XaMLmevepV9jIBjlQXjrg5lOYgvSFLXhE96pupDHfqmVbYIw', '1', '2019-12-04 00:00:00', '8870878'),
(9, 'root1', '25d55ad283aa400af464c76d713c07ad', 'Lisa', 'lisa@yg.com', 'https://steamcommunity.com/id/lisa', '', '2019-12-05 00:00:00', '878398'),
(23, 'root3', '25d55ad283aa400af464c76d713c07ad', 'jisoo', 'jisoo@yg.com', 'https://steamcommunity.com/id/lisa', '0', '2019-12-14 02:10:46', '868539'),
(48, 'root2', '25d55ad283aa400af464c76d713c07ad', 'rose', 'rose@yg.com', 'https://steamcommunity.com/id/rose', '0', '2019-12-18 06:03:16', '888888');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `user_history`
--

CREATE TABLE `user_history` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `point` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `uid` varchar(255) NOT NULL,
  `download` longtext NOT NULL,
  `status` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- dump ตาราง `user_history`
--

INSERT INTO `user_history` (`id`, `username`, `type`, `point`, `date`, `uid`, `download`, `status`) VALUES
(120, 'root', 'Truemoney Wallet', '2.00', '18/12/2019 03:54', '', '', '3'),
(121, 'root', 'Truemoney Wallet', '2.00', '18/12/2019 04:02', '', '', '3'),
(122, 'root', 'Truemoney Wallet', '2.00', '18/12/2019 04:04', '', '', '3'),
(123, 'root', 'Truemoney Wallet', '2.00', '18/12/2019 04:17', '', '', '3'),
(124, 'root', 'Truemoney Wallet', '2.00', '18/12/2019 04:18', '', '', '3'),
(125, 'root', 'Truemoney Wallet', '2.00', '18/12/2019 04:34', '', '', '3'),
(126, 'root', 'Truemoney Wallet', '2.00', '18/12/2019 04:39', '', '', '3'),
(127, 'root', 'Truemoney Wallet', '2.00', '18/12/2019 05:15', '', '', '3'),
(128, 'root', 'Truemoney Wallet', '2.00', '18/12/2019 05:16', '', '', '3'),
(129, 'root', 'Truemoney Wallet', '2.00', '18/12/2019 05:59', '', '', '3'),
(130, 'root2', 'Truemoney Wallet', '2.00', '18/12/2019 06:03', '', '', '3'),
(131, 'root', 'Truemoney Wallet', '2.00', '18/12/2019 18:54', '', '', '3');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `wallet_history`
--

CREATE TABLE `wallet_history` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `tranfer_id` varchar(255) NOT NULL,
  `point` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- dump ตาราง `wallet_history`
--

INSERT INTO `wallet_history` (`id`, `username`, `tranfer_id`, `point`, `date`) VALUES
(29, 'root', '50003293489202', '2.00', '18/12/2019 18:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orders_id`);

--
-- Indexes for table `orders_run`
--
ALTER TABLE `orders_run`
  ADD PRIMARY KEY (`ordersid_run`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `status_orders`
--
ALTER TABLE `status_orders`
  ADD PRIMARY KEY (`status_ordersid`);

--
-- Indexes for table `typeproduct`
--
ALTER TABLE `typeproduct`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `user_history`
--
ALTER TABLE `user_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wallet_history`
--
ALTER TABLE `wallet_history`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orders_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=351;

--
-- AUTO_INCREMENT for table `orders_run`
--
ALTER TABLE `orders_run`
  MODIFY `ordersid_run` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `status_orders`
--
ALTER TABLE `status_orders`
  MODIFY `status_ordersid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `typeproduct`
--
ALTER TABLE `typeproduct`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `user_history`
--
ALTER TABLE `user_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT for table `wallet_history`
--
ALTER TABLE `wallet_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
