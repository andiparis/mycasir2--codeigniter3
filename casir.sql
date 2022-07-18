-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2022 at 02:43 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `casir`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `gender` enum('L','P') NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `p_category`
--

CREATE TABLE `p_category` (
  `category_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `p_category`
--

INSERT INTO `p_category` (`category_id`, `name`, `created`, `updated`) VALUES
(21, 'Peralatan Makan', '2020-04-30 16:41:12', '2022-05-14 06:18:10'),
(22, 'Pakaian', '2020-04-30 16:41:44', '2022-05-14 06:18:25'),
(23, 'Tas', '2020-04-30 16:41:59', '2022-05-14 06:19:40'),
(24, 'Perawatan', '2022-05-14 11:22:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `p_item`
--

CREATE TABLE `p_item` (
  `item_id` int(11) NOT NULL,
  `barcode` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `before_discount` int(11) DEFAULT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  `image` varchar(100) DEFAULT NULL,
  `created` int(11) NOT NULL DEFAULT current_timestamp(),
  `updated` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `p_item`
--

INSERT INTO `p_item` (`item_id`, `barcode`, `name`, `category_id`, `unit_id`, `price`, `discount`, `before_discount`, `stock`, `image`, `created`, `updated`) VALUES
(19, 'A0002', 'Paket Hadiah Bayi - JOHNSON\'S Baby Shower Gift Set', 24, 14, 120000, 0, 0, 0, NULL, 2147483647, 2022),
(20, 'A0006', 'Peralatan Makan Bayi Silikon', 21, 14, 330000, 0, 0, 19, NULL, 2147483647, 2022),
(21, 'A0007', 'Tas Ransel Ibu Botol Susu Bayi', 23, 16, 195000, 0, 0, 0, NULL, 2147483647, 2022),
(22, 'A0001', 'Alat Makan Bayi - Pigeon Feeding Set Mini', 21, 14, 80000, 0, 0, 50, NULL, 2147483647, 2022),
(23, 'A0008', 'Botol Classic Plus PP 260ml - Philips Avent SCF563', 21, 16, 35000, 0, 0, 0, NULL, 2147483647, 2022),
(25, 'A0003', 'Paket Baju Bayi Newborn', 22, 18, 118000, 0, 0, 0, NULL, 2147483647, 2022),
(26, 'A0004', 'Paket Perlengkapan Mandi  - PIGEON Toiletries Gift Set', 24, 14, 170000, 0, 0, 0, NULL, 2147483647, 2022),
(27, 'A0009', 'Bib Bayi - Royale Bebe Silicone', 21, 16, 45000, 0, 0, 0, NULL, 2147483647, 2022),
(28, 'A0010', 'Celemek Bayi Waterproof Animal Baby Bibs', 21, 16, 60000, 0, 0, 0, NULL, 2147483647, 2022),
(29, 'A0005', 'Celana panjang bayi newborn', 22, 16, 16000, 0, 0, 0, NULL, 2147483647, 2022);

-- --------------------------------------------------------

--
-- Table structure for table `p_unit`
--

CREATE TABLE `p_unit` (
  `unit_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `p_unit`
--

INSERT INTO `p_unit` (`unit_id`, `name`, `created`, `updated`) VALUES
(14, 'Set', '2020-04-30 16:43:18', '2022-05-14 06:16:29'),
(15, 'Pcs', '2020-04-30 16:43:57', '2022-05-14 06:16:50'),
(16, 'Item', '2020-04-30 16:44:08', '2022-05-14 06:17:38'),
(17, 'Pasang', '2022-05-14 11:17:47', NULL),
(18, 'Paket', '2022-05-14 11:23:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(200) NOT NULL,
  `description` text DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `name`, `phone`, `address`, `description`, `created`, `updated`) VALUES
(15, 'Toko Kencana', '034112345678', 'Jl. Mergosono V No. 90 Malang', 'Toko Perlengkapan Bayi', '2020-04-30 16:29:44', '2022-05-14 06:37:53');

-- --------------------------------------------------------

--
-- Table structure for table `t_cart`
--

CREATE TABLE `t_cart` (
  `cart_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(100) NOT NULL,
  `discount_item` int(11) NOT NULL DEFAULT 0,
  `total` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `t_sale`
--

CREATE TABLE `t_sale` (
  `sale_id` int(11) NOT NULL,
  `invoice` varchar(50) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `total_price` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `final_price` int(11) NOT NULL,
  `cash` int(11) NOT NULL,
  `remaining` int(11) NOT NULL,
  `note` text NOT NULL,
  `date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_sale`
--

INSERT INTO `t_sale` (`sale_id`, `invoice`, `customer_id`, `total_price`, `discount`, `final_price`, `cash`, `remaining`, `note`, `date`, `user_id`, `created`) VALUES
(51, 'MP2005080001', 17, 11000000, 1000000, 10000000, 100000000, 90000000, 'additional', '2020-05-07', 15, '2020-05-08 09:39:03'),
(52, 'MP2005080002', NULL, 50000, 0, 50000, 100000, 50000, '', '2020-05-08', 14, '2020-05-08 09:58:04'),
(53, 'MP2005080003', NULL, 30000, 0, 30000, 40000, 10000, '', '2020-05-08', 14, '2020-05-08 09:58:37'),
(54, 'MP2005080004', NULL, 50000, 0, 50000, 50000, 0, '', '2020-05-08', 14, '2020-05-08 10:15:52'),
(55, 'MP2005080005', NULL, 30000, 0, 30000, 40000, 10000, '', '2020-05-08', 14, '2020-05-08 10:20:49'),
(56, 'MP2005080006', NULL, 30000, 0, 30000, 30000, 0, '', '2020-05-08', 14, '2020-05-08 10:24:47'),
(57, 'MP2005090001', NULL, 1000000, 0, 1000000, 10000000, 9000000, '', '2020-05-09', 14, '2020-05-09 06:35:17'),
(58, 'MP2005090002', NULL, 910000, 10000, 900000, 1000000, 100000, '', '2020-05-09', 14, '2020-05-09 06:37:29'),
(59, 'MP2005090003', NULL, 910000, 10000, 900000, 1000000, 100000, '', '2020-05-09', 14, '2020-05-09 06:37:38'),
(60, 'MP2005090004', NULL, 1000000, 100000, 900000, 1000000, 100000, '', '2020-05-09', 14, '2020-05-09 06:38:18'),
(61, 'MP2005090005', NULL, 1000000, 0, 1000000, 10000000, 9000000, '', '2020-05-09', 14, '2020-05-09 06:39:10'),
(62, 'MP2005090006', NULL, 910000, 10000, 900000, 1000000, 100000, '', '2020-05-09', 14, '2020-05-09 06:40:11'),
(63, 'MP2005090007', NULL, 30000, 0, 30000, 30000, 0, '', '2020-05-09', 14, '2020-05-09 06:42:52'),
(64, 'MP2005090008', NULL, 3000000, 0, 3000000, 10000000, 7000000, 'Mboh', '2020-05-09', 14, '2020-05-09 19:19:34'),
(65, 'MP2005090009', NULL, 20000000, 10000000, 10000000, 10000000, 0, '', '2020-05-09', 15, '2020-05-09 19:33:32'),
(66, 'MP2005090010', NULL, 1100000, 100000, 1000000, 1000000, 0, '', '2020-05-09', 14, '2020-05-09 20:45:07'),
(67, 'MP2005090011', NULL, 1000000, 0, 1000000, 1000000, 0, '', '2020-05-09', 14, '2020-05-09 20:45:50'),
(68, 'MP2005090012', NULL, 1000000, 0, 1000000, 6000000, 5000000, '', '2020-05-09', 14, '2020-05-09 21:12:13'),
(69, 'MP2005090013', NULL, 1000000, 0, 1000000, 6000000, 5000000, '', '2020-05-09', 14, '2020-05-09 21:14:10'),
(70, 'MP2005090014', NULL, 1000000, 0, 1000000, 6000000, 5000000, '', '2020-05-09', 14, '2020-05-09 21:14:14'),
(71, 'MP2005090015', NULL, 30000, 0, 30000, 500000, 470000, '', '2020-05-09', 14, '2020-05-09 21:14:32'),
(72, 'MP2005090016', NULL, 30000, 0, 30000, 500000, 470000, '', '2020-05-09', 14, '2020-05-09 21:14:36'),
(73, 'MP2005090017', NULL, 30000, 0, 30000, 500000, 470000, '', '2020-05-09', 14, '2020-05-09 21:14:41'),
(74, 'MP2005090018', NULL, 30000, 0, 30000, 500000, 470000, '', '2020-05-09', 14, '2020-05-09 21:14:58'),
(75, 'MP2005090019', NULL, 75000, 0, 75000, 80000, 5000, '', '2020-05-09', 14, '2020-05-09 21:15:12'),
(76, 'MP2005090020', NULL, 30000, 0, 30000, 8081093, 8051093, '', '2020-05-09', 14, '2020-05-09 21:15:50'),
(77, 'MP2005090021', NULL, 30000, 0, 30000, 30000, 0, '', '2020-05-09', 14, '2020-05-09 21:38:58'),
(78, 'MP2005090022', NULL, 30000, 0, 30000, 30000, 0, '', '2020-05-09', 14, '2020-05-09 21:39:02'),
(79, 'MP2005090023', NULL, 2000000, 0, 2000000, 3000000, 1000000, '', '2020-05-09', 14, '2020-05-09 22:09:04'),
(80, 'MP2005090024', NULL, 2000000, 0, 2000000, 3000000, 1000000, '', '2020-05-09', 14, '2020-05-09 22:09:09'),
(81, 'MP2005090025', NULL, 2000000, 0, 2000000, 3000000, 1000000, '', '2020-05-09', 14, '2020-05-09 22:10:55'),
(82, 'MP2005090026', NULL, 2000000, 0, 2000000, 3000000, 1000000, '', '2020-05-09', 14, '2020-05-09 22:11:00'),
(83, 'MP2005090027', NULL, 1000000, 0, 1000000, 2000000, 1000000, '', '2020-05-09', 14, '2020-05-09 22:11:19'),
(84, 'MP2005090028', NULL, 30000, 0, 30000, 100000, 70000, '', '2020-05-09', 14, '2020-05-09 22:11:42'),
(85, 'MP2005090029', NULL, 30000, 0, 30000, 30000, 0, '', '2020-05-09', 14, '2020-05-09 22:21:40'),
(86, 'MP2005090030', NULL, 30000, 0, 30000, 30000, 0, '', '2020-05-09', 14, '2020-05-09 22:23:09'),
(87, 'MP2005090031', NULL, 1000000, 0, 1000000, 1000000, 0, '', '2020-05-09', 14, '2020-05-09 22:25:39'),
(88, 'MP2005090032', NULL, 30000, 0, 30000, 30000, 0, '', '2020-05-10', 14, '2020-05-09 22:31:12'),
(89, 'MP2005110001', 0, 29000, 0, 29000, 30000, 1000, '', '2020-05-11', 14, '2020-05-11 20:59:07'),
(90, 'MP2204190001', 0, 27000, 0, 27000, 30000, 3000, '', '2022-04-19', 14, '2022-04-19 09:17:21');

-- --------------------------------------------------------

--
-- Table structure for table `t_sale_detail`
--

CREATE TABLE `t_sale_detail` (
  `detail_id` int(11) NOT NULL,
  `sale_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(100) NOT NULL,
  `discount_item` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_sale_detail`
--

INSERT INTO `t_sale_detail` (`detail_id`, `sale_id`, `item_id`, `price`, `qty`, `discount_item`, `total`) VALUES
(28, 51, 22, 1000000, 11, 0, 11000000),
(29, 52, 19, 50000, 1, 0, 50000),
(30, 53, 20, 30000, 1, 0, 30000),
(31, 54, 19, 50000, 1, 0, 50000),
(32, 55, 20, 30000, 1, 0, 30000),
(33, 56, 20, 30000, 1, 0, 30000),
(34, 57, 22, 1000000, 1, 0, 1000000),
(35, 58, 22, 1000000, 1, 90000, 910000),
(36, 60, 22, 1000000, 1, 0, 1000000),
(37, 61, 22, 1000000, 1, 0, 1000000),
(38, 62, 22, 1000000, 1, 90000, 910000),
(39, 63, 20, 30000, 1, 0, 30000),
(40, 64, 22, 1000000, 3, 0, 3000000),
(41, 65, 22, 1000000, 20, 0, 20000000),
(42, 66, 22, 1000000, 11, 900000, 1100000),
(43, 67, 22, 1000000, 1, 0, 1000000),
(44, 68, 22, 1000000, 1, 0, 1000000),
(45, 69, 22, 1000000, 1, 0, 1000000),
(46, 71, 20, 30000, 1, 0, 30000),
(47, 75, 21, 75000, 1, 0, 75000),
(48, 76, 20, 30000, 1, 0, 30000),
(49, 77, 20, 30000, 1, 0, 30000),
(50, 79, 22, 1000000, 2, 0, 2000000),
(51, 83, 22, 1000000, 1, 0, 1000000),
(52, 84, 20, 30000, 1, 0, 30000),
(53, 85, 20, 30000, 1, 0, 30000),
(54, 86, 20, 30000, 1, 0, 30000),
(55, 87, 22, 1000000, 1, 0, 1000000),
(56, 88, 20, 30000, 1, 0, 30000),
(57, 89, 20, 29000, 1, 0, 29000),
(58, 90, 20, 27000, 1, 0, 27000);

--
-- Triggers `t_sale_detail`
--
DELIMITER $$
CREATE TRIGGER `stock_min` AFTER INSERT ON `t_sale_detail` FOR EACH ROW BEGIN
	UPDATE p_item SET stock = stock - NEW.qty
    WHERE item_id = NEW.item_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `t_stock`
--

CREATE TABLE `t_stock` (
  `stock_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `type` enum('In','Out') NOT NULL,
  `detail` varchar(200) NOT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `qty` int(100) NOT NULL,
  `date` date NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_stock`
--

INSERT INTO `t_stock` (`stock_id`, `item_id`, `type`, `detail`, `supplier_id`, `qty`, `date`, `created`, `user_id`) VALUES
(13, 19, 'In', 'Kulakan', 15, 10, '2020-04-30', '2020-04-30 16:51:07', 14),
(14, 19, 'In', 'Tambahan', 15, 5, '2020-04-30', '2020-04-30 16:51:51', 14),
(15, 21, 'In', 'Kulakan', NULL, 5, '2020-04-30', '2020-04-30 16:52:26', 14),
(16, 21, 'Out', 'Rusak', NULL, 1, '2020-04-30', '2020-04-30 16:53:06', 14),
(17, 19, 'Out', 'Kadaluwarsa', NULL, 5, '2020-04-30', '2020-04-30 16:53:49', 14),
(18, 20, 'In', 'Kulakan', NULL, 50, '2020-05-07', '2020-05-07 09:50:52', 14);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `name` varchar(50) NOT NULL,
  `level` int(1) NOT NULL COMMENT '1:admin, 2:kasir'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `name`, `level`) VALUES
(14, 'admin', 'admin', 'Super Administrator', 1),
(15, 'kasir', 'kasir', 'Super Kasir', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `p_category`
--
ALTER TABLE `p_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `p_item`
--
ALTER TABLE `p_item`
  ADD PRIMARY KEY (`item_id`),
  ADD UNIQUE KEY `barcode` (`barcode`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `unit_id` (`unit_id`);

--
-- Indexes for table `p_unit`
--
ALTER TABLE `p_unit`
  ADD PRIMARY KEY (`unit_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `t_cart`
--
ALTER TABLE `t_cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `t_sale`
--
ALTER TABLE `t_sale`
  ADD PRIMARY KEY (`sale_id`);

--
-- Indexes for table `t_sale_detail`
--
ALTER TABLE `t_sale_detail`
  ADD PRIMARY KEY (`detail_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `t_stock`
--
ALTER TABLE `t_stock`
  ADD PRIMARY KEY (`stock_id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `supplier_id` (`supplier_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `p_category`
--
ALTER TABLE `p_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `p_item`
--
ALTER TABLE `p_item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `p_unit`
--
ALTER TABLE `p_unit`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `t_sale`
--
ALTER TABLE `t_sale`
  MODIFY `sale_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `t_sale_detail`
--
ALTER TABLE `t_sale_detail`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `t_stock`
--
ALTER TABLE `t_stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `p_item`
--
ALTER TABLE `p_item`
  ADD CONSTRAINT `p_item_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `p_category` (`category_id`),
  ADD CONSTRAINT `p_item_ibfk_2` FOREIGN KEY (`unit_id`) REFERENCES `p_unit` (`unit_id`);

--
-- Constraints for table `t_cart`
--
ALTER TABLE `t_cart`
  ADD CONSTRAINT `t_cart_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `p_item` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_cart_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_sale_detail`
--
ALTER TABLE `t_sale_detail`
  ADD CONSTRAINT `t_sale_detail_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `p_item` (`item_id`);

--
-- Constraints for table `t_stock`
--
ALTER TABLE `t_stock`
  ADD CONSTRAINT `t_stock_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `p_item` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_stock_ibfk_2` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`supplier_id`),
  ADD CONSTRAINT `t_stock_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
