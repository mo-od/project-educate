-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 12 มี.ค. 2020 เมื่อ 11:57 AM
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
  `description` text NOT NULL,
  `status` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- dump ตาราง `contact`
--

INSERT INTO `contact` (`contact_id`, `topic`, `description`, `status`) VALUES
(1, 'เว็บเรามีรับซื้อ รับไอเทมแล้ว จ้าาาาา', '<font size=\"3\"color=\"#FFD700\" style=\"font-family: \'Kanit\', sans-serif;\">สามาดูเรทราคารับซื้อได้ที่ ></font>\r\n <a href=\"rateprice.php\" class=\"card-link\"><i class=\"fas fa-external-link-alt fa-fw \"></i>Rate Price</a>\r\n', '1');

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
(350, '72', 3, '5', 2, 150, 300, '2020-02-21 21:59:00'),
(351, '73', 3, '1', 1, 400, 400, '2020-02-29 19:22:39'),
(352, '74', 3, '19', 1, 21112.5, 21112.5, '2020-03-02 21:44:25'),
(353, '75', 3, '1', 1, 400, 400, '2020-03-05 09:59:44'),
(354, '75', 3, '3', 1, 450, 450, '2020-03-05 09:59:44'),
(355, '75', 3, '28', 1, 109, 109, '2020-03-05 09:59:44'),
(356, '75', 3, '19', 2, 21112.5, 42225, '2020-03-05 09:59:44');

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
(68, 3, '2020-02-17 05:32:46', '1'),
(69, 3, '2020-02-17 06:01:44', '2'),
(70, 9, '2020-02-17 06:02:05', '1'),
(71, 3, '2020-02-21 21:52:38', '3'),
(72, 3, '2020-02-21 21:59:00', '2'),
(73, 3, '2020-02-29 19:22:39', '2'),
(74, 3, '2020-03-02 21:44:25', '2'),
(75, 3, '2020-03-05 09:59:44', '2');

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
(1, 'Righteous Thunderbolt', 'zeus', 'p1.jpg', 400, '1', 'Imortal', '19'),
(2, 'The Magus Cypher', 'Rubick\'s', 'p2.jpg', 500, '1', 'arcana', '15'),
(3, 'Sylvan Cascade', 'Windranger ', 'p3.jpg', 450, '1', 'Imortal', '16'),
(4, 'Gravelmaw', 'Earthshaker ', 'gravelmaw.png', 150, '1', 'Immortal', '19'),
(5, 'Bindings', 'Earthshaker', 'bindings.png', 150, '1', 'Legendary', '18'),
(6, 'Auspice', 'Orge Magi', 'auspice.png', 180, '1', 'Immortal', '10'),
(7, 'Golden', 'juggernaut', 'golden.png', 150, '1', 'Immortal', '19'),
(8, 'Codicil', 'Phantom Assassin', 'codicil.png', 350, '1', 'Immortal', '20'),
(9, 'Manifold', 'Phantom Assassin', 'manifold.png', 700, '1', 'Arcana', '20'),
(20, 'Flip Knife (★)', 'Marble Fade', 'Flip.png', 9018, '2', 'Factory New', '5'),
(21, 'Butterfly (★)', 'Doppler', 'Butterfly.png', 19988, '2', 'Factory New', '6'),
(28, 'Rugged (Orange)', 'M416', 'Rugged.png', 109, '3', '', '15'),
(30, 'Karambit (★ StatTrak™)', 'Marble Fade', 'Karambit.png', 21112.5, '2', 'Factory New', '4');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `rateprice`
--

CREATE TABLE `rateprice` (
  `rp_id` int(11) NOT NULL,
  `rp_name` varchar(255) NOT NULL,
  `rp_price` float NOT NULL,
  `rp_hero` varchar(255) NOT NULL,
  `rp_status` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- dump ตาราง `rateprice`
--

INSERT INTO `rateprice` (`rp_id`, `rp_name`, `rp_price`, `rp_hero`, `rp_status`) VALUES
(1, 'Gimlek Decanter', 26.4, 'Ogre Magi  ', '1'),
(2, 'Exalted Frost Avalanche', 599, 'Crystal Maiden  ', '1'),
(6, 'Inscribed Offhand Basher of Mage Skulls', 23.2, 'Antimage', '1');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `sell`
--

CREATE TABLE `sell` (
  `sell_id` int(7) NOT NULL,
  `sell_uid` int(10) NOT NULL,
  `sell_steam` varchar(255) NOT NULL,
  `sell_bank` varchar(100) NOT NULL,
  `sell_bankacc` varchar(20) NOT NULL,
  `sell_date` date NOT NULL,
  `sell_time` time NOT NULL,
  `sell_remark` varchar(255) NOT NULL,
  `sell_status` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- dump ตาราง `sell`
--

INSERT INTO `sell` (`sell_id`, `sell_uid`, `sell_steam`, `sell_bank`, `sell_bankacc`, `sell_date`, `sell_time`, `sell_remark`, `sell_status`) VALUES
(1, 3, 'Frank', 'พร้อมเพย์', '0821338090', '2020-03-11', '20:52:00', 'Test', '1'),
(2, 3, 'Frank', 'พร้อมเพย์', '0821338090', '2020-03-11', '20:52:00', 'testt', '1');

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
-- โครงสร้างตาราง `topup`
--

CREATE TABLE `topup` (
  `topup_id` int(7) NOT NULL,
  `topup_uid` int(7) NOT NULL,
  `amount` float NOT NULL,
  `bank_transfer` varchar(255) NOT NULL,
  `topup_date` date NOT NULL,
  `time` time NOT NULL,
  `file` text NOT NULL,
  `remark` text NOT NULL,
  `topup_status` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- dump ตาราง `topup`
--

INSERT INTO `topup` (`topup_id`, `topup_uid`, `amount`, `bank_transfer`, `topup_date`, `time`, `file`, `remark`, `topup_status`) VALUES
(8, 3, 1300, 'กรุงไทย', '2020-03-05', '18:39:00', 'topup/krung-thai-bank-junceylon-300-300x200.jpg', '', '2'),
(9, 3, 8888, 'พร้อมเพย์', '2020-03-18', '01:13:00', 'topup/176b489f48a6b4d409c9def5ed586362.jpg', '', '2'),
(10, 3, 1300, '‎Krungthai', '2020-03-05', '01:13:00', 'topup/360fx360f.png', 'Test', '2'),
(11, 3, 1300, '‎Krungthai', '2020-03-13', '16:55:00', 'topup/krung-thai-bank-junceylon-300-300x200.jpeg', 'testttttt', '2');

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
(1, 'DOTA2', 1),
(2, 'CS:GO', 2),
(3, 'PUBG', 3);

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
(3, 'root', '25d55ad283aa400af464c76d713c07ad', 'Frank', 'lisa@yg.com', 'https://steamcommunity.com/tradeoffer/new/?partner=441522523&token=TM91C-IV&fbclid=IwAR1USrt6Ga2XaMLmevepV9jIBjlQXjrg5lOYgvSFLXhE96pupDHfqmVbYIw', '1', '2019-12-04 00:00:00', '12788'),
(9, 'root1', '25d55ad283aa400af464c76d713c07ad', 'Lisa', 'lisa@yg.com', 'https://steamcommunity.com/id/lisa', '1', '2019-12-05 00:00:00', '8888'),
(23, 'root3', '25d55ad283aa400af464c76d713c07ad', 'jisoo', 'jisoo@yg.com', 'https://steamcommunity.com/id/jisoo', '0', '2019-12-14 02:10:46', '8888'),
(48, 'root2', '25d55ad283aa400af464c76d713c07ad', 'rose', 'rose@yg.com', 'https://steamcommunity.com/id/rose', '0', '2019-12-18 06:03:16', '8888'),
(51, 'root123', '25d55ad283aa400af464c76d713c07ad', 'Jennie ', 'jennie@yg.com', 'https://steamcommunity.com/id/jennie', '0', '2020-02-24 09:47:30', '8888');

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
-- Indexes for table `rateprice`
--
ALTER TABLE `rateprice`
  ADD PRIMARY KEY (`rp_id`);

--
-- Indexes for table `sell`
--
ALTER TABLE `sell`
  ADD PRIMARY KEY (`sell_id`);

--
-- Indexes for table `status_orders`
--
ALTER TABLE `status_orders`
  ADD PRIMARY KEY (`status_ordersid`);

--
-- Indexes for table `topup`
--
ALTER TABLE `topup`
  ADD PRIMARY KEY (`topup_id`);

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
  MODIFY `orders_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=357;

--
-- AUTO_INCREMENT for table `orders_run`
--
ALTER TABLE `orders_run`
  MODIFY `ordersid_run` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `rateprice`
--
ALTER TABLE `rateprice`
  MODIFY `rp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `sell`
--
ALTER TABLE `sell`
  MODIFY `sell_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `status_orders`
--
ALTER TABLE `status_orders`
  MODIFY `status_ordersid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `topup`
--
ALTER TABLE `topup`
  MODIFY `topup_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `typeproduct`
--
ALTER TABLE `typeproduct`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
