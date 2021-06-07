-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 17 มี.ค. 2020 เมื่อ 10:25 AM
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
(357, '76', 52, '1', 1, 400, 400, '2020-03-12 18:13:28'),
(358, '76', 52, '2', 1, 500, 500, '2020-03-12 18:13:28'),
(359, '76', 52, '6', 2, 180, 360, '2020-03-12 18:13:28'),
(360, '76', 52, '20', 1, 9018, 9018, '2020-03-12 18:13:28'),
(361, '77', 9, '1', 3, 400, 1200, '2020-03-12 18:22:58'),
(362, '77', 9, '21', 1, 19988, 19988, '2020-03-12 18:22:58'),
(363, '77', 9, '4', 1, 150, 150, '2020-03-12 18:22:58'),
(364, '78', 9, '2', 1, 500, 500, '2020-03-12 18:24:51'),
(365, '78', 9, '1', 3, 400, 1200, '2020-03-12 18:24:51'),
(366, '78', 9, '20', 1, 9018, 9018, '2020-03-12 18:24:51'),
(367, '79', 3, '1', 1, 400, 400, '2020-03-16 15:31:53'),
(368, '79', 3, '3', 1, 450, 450, '2020-03-16 15:31:53'),
(369, '79', 3, '2', 1, 500, 500, '2020-03-16 15:31:53'),
(370, '80', 3, '2', 1, 500, 500, '2020-03-16 15:32:18'),
(371, '81', 3, '4', 3, 150, 450, '2020-03-16 15:32:35'),
(372, '81', 3, '6', 1, 180, 180, '2020-03-16 15:32:35');

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
(76, 52, '2020-03-12 18:13:28', '2'),
(77, 9, '2020-03-12 18:22:58', '2'),
(78, 9, '2020-03-12 18:24:51', '2'),
(79, 3, '2020-03-16 15:31:53', '1'),
(80, 3, '2020-03-16 15:32:18', '1'),
(81, 3, '2020-03-16 15:32:35', '1');

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
(1, 'Righteous Thunderbolt', 'zeus', 'p1.jpg', 400, '1', 'Imortal', '11'),
(2, 'The Magus Cypher', 'Rubick\'s', 'p2.jpg', 500, '1', 'arcana', '11'),
(3, 'Sylvan Cascade', 'Windranger ', 'p3.jpg', 450, '1', 'Imortal', '15'),
(4, 'Gravelmaw', 'Earthshaker ', 'gravelmaw.png', 150, '1', 'Immortal', '15'),
(5, 'Bindings', 'Earthshaker', 'bindings.png', 150, '1', 'Legendary', '18'),
(6, 'Auspice', 'Orge Magi', 'auspice.png', 180, '1', 'Immortal', '7'),
(7, 'Golden', 'juggernaut', 'golden.png', 150, '1', 'Immortal', '19'),
(8, 'Codicil', 'Phantom Assassin', 'codicil.png', 350, '1', 'Immortal', '20'),
(9, 'Manifold', 'Phantom Assassin', 'manifold.png', 700, '1', 'Arcana', '20'),
(20, 'Flip Knife (★)', 'Marble Fade', 'Flip.png', 9018, '2', 'Factory New', '3'),
(21, 'Butterfly (★)', 'Doppler', 'Butterfly.png', 19988, '2', 'Factory New', '5'),
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
(6, 'Inscribed Offhand Basher of Mage Skulls', 23.2, 'Antimage ', '2');

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
(12, 52, 8888, 'Promptpay', '2020-03-12', '18:10:00', 'topup/EEgmYqfU0AEoRhw.jpg', 'Test', '2');

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
(3, 'root', '25d55ad283aa400af464c76d713c07ad', 'Frank', 'lisa@yg.com', 'https://steamcommunity.com/tradeoffer/new/?partner=441522523&token=TM91C-IV&fbclid=IwAR1USrt6Ga2XaMLmevepV9jIBjlQXjrg5lOYgvSFLXhE96pupDHfqmVbYIw', '1', '2019-12-04 00:00:00', '10308'),
(9, 'root1', '25d55ad283aa400af464c76d713c07ad', 'Lisa', 'lisa@yg.com', 'https://steamcommunity.com/id/lisa', '1', '2019-12-05 00:00:00', '56832'),
(23, 'root3', '25d55ad283aa400af464c76d713c07ad', 'jisoo', 'jisoo@yg.com', 'https://steamcommunity.com/id/jisoo', '0', '2019-12-14 02:10:46', '8888'),
(48, 'root2', '25d55ad283aa400af464c76d713c07ad', 'rose', 'rose@yg.com', 'https://steamcommunity.com/id/rose', '0', '2019-12-18 06:03:16', '8888'),
(51, 'root123', '25d55ad283aa400af464c76d713c07ad', 'Jennie ', 'jennie@yg.com', 'https://steamcommunity.com/id/jennie', '0', '2020-02-24 09:47:30', '8888'),
(52, 'admin', '202cb962ac59075b964b07152d234b70', 'AdminFrank', 'AdminFrank@hotmail.com', 'AdminFrank/steam', '0', '2020-03-12 18:09:04', '878610');

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
  MODIFY `orders_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=373;

--
-- AUTO_INCREMENT for table `orders_run`
--
ALTER TABLE `orders_run`
  MODIFY `ordersid_run` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `rateprice`
--
ALTER TABLE `rateprice`
  MODIFY `rp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

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
  MODIFY `topup_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `typeproduct`
--
ALTER TABLE `typeproduct`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
