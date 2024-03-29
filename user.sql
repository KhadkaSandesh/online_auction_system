-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2023 at 09:08 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_data`
--

CREATE TABLE `account_data` (
  `id` int(100) NOT NULL,
  `username` varchar(40) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `user_balance` int(255) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account_data`
--

INSERT INTO `account_data` (`id`, `username`, `email`, `phone`, `password`, `token`, `status`, `user_balance`) VALUES
(51, 'new user', 'suraj@gmail.com', '981809999', '$2y$10$K/dUuACp1k67F3WDUxiMZO5DmlcTTu0QfwrRaHEt.ERVFZve/87Z2', '44d2d650c7f3af4865bf10ed35c6a4', 'active', 40000),
(52, 'test data', 'myryjy@cyclelove.cc', '98998989', '$2y$10$HyBYeSVAiJS3pRX8fgE.Eeitljp2Tijjr1bBVF0gsLtepNH/8fNFS', '78bbf103adb31ea5fe9c906d80eebb', 'active', 40000),
(53, 'name', 'liwaki6173@hempyl.com', '9818228822', '$2y$10$oBJt49sE1ge4bzysSRO0jOIsrqqT28fdhOQqE1IHjh1l/Vh04gfNO', 'c01670beacc12e725a090d0a0f97c8', 'active', 40000),
(54, 'suraj gautam', 'tivoxeba@mailo.icu', '9818087111', '$2y$10$A3eVF4oSppclFYxHi35m5OMr6TGuDxUWRrHPFQTA5zkqaZEzU1dxW', '0d9647c6a15e6bd846c2a23cf3c5c7', 'inactive', 40000),
(55, 'suraj', 'tivoxeba@mailo.icu', '9818888191', '$2y$10$6YRH3wkPy9jMYjMyD750LeMymjQngWSSkIkjXcXXNlvxwZ9CSorZe', 'f139239c1f424a4b9d767990e8ba13', 'active', 40000),
(56, 'nabin', 'pudaci@kellychibale-researchgroup-uct.com', '982839229', '$2y$10$p6qCgizgnJrhAV0Y1ckyqeIV9RBKZdralfys6T8rwTf/E15nb3cQ6', 'a416a9e076a64dd1dede25eb8881fb', 'active', 40000),
(57, 'suraj', 's@gmail.com', '8989898989', '$2y$10$/NnvRekWoG9XE3iFe5Fp4OZoV9EF6K.eZ7bnyR07RYZbD/3hfRJCu', '2e0a51158e09423a074608a3970115', 'inactive', 40000),
(58, 'suraj', 'jk@gmail.com', '9898989898', '$2y$10$QOrF.OnEcgLZzoCInR5nhOjNgzQYVOWO/SIjyn8vQfMdJMXMQC1Rm', '4e0673c3c45254b68f9a6e219ae21f', 'inactive', 40000),
(59, 'sailesh singh', 'tebazoxu@kellychibale-researchgroup-uct.com', '9818087999', '$2y$10$wu1LlaeehXCcTglcFgRtY.GXbC9AdLchWbMPgKYYuDAgZZ3B3zA7C', 'edf427490c867b46b63e20fcfb9e01', 'inactive', 40000),
(60, 'nabin Bhatta', 'jolubati@lyricspad.net', '9812345678', '$2y$10$IPOe7Uwc97nXw5gRT2VvBOJA0f1LB/lPxVhqLsf4T6KsWsbDP58N2', 'c93e206c2d0ce0bfe02c081d6d403e', 'active', 40000),
(61, 'sameer kahnla', 'voginegu@lyricspad.net', '9898989898', '$2y$10$s/HqfLpQYYY7EvvuMswKHeVhkwVI2pLoWTwsXhOAoIhVrnqasQy9m', '4bf3bbbd1af4353be1069a48be0380', 'active', 40000),
(62, 'Apil lama', 'huwyviny@lyricspad.net', '9818087119', '$2y$10$f3Ras9viSfts1TewmJbMHOz9gmI/UbYf1AlHbJ/4BXlYJNcPWRTba', '40148be6fef44057f43c2c1706be21', 'active', 40000),
(63, 'nabin sharma', 'lofiji@decabg.eu', '9818181818', '$2y$10$aMhy.sy9GVnf6q6mtMqTDe.htzsvYe.5Ndhmr1v15i.wXaouRQKmm', 'cbd852cf50560cbb1fc40a018800a9', 'active', 40000),
(64, 'sameer gautam', 'zosuhe@cyclelove.cc', '9818181818', '$2y$10$4QYvFdIXRDlEIncdUNw6lePeCeaAmM.jnY44l/MdS4AxAFDT7md4y', 'bae3ecf9884dfdc920616dfc2852c1', 'active', 40000),
(65, 'new', 'new@gmail.com', '9818111111', '$2y$10$JrYW4BbkseWzP.SBNz/AEOsY3Qn48WVio9.2V3RgE.2qPiPB1S99.', 'a35aea4f681257d7b6614eb53f3c22', 'active', 40000);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `SN` int(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'not_replied'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`SN`, `firstname`, `lastname`, `email`, `message`, `status`) VALUES
(1, 'sailesh', 'singh', 'sailesh@gmai.com', 'hello', 'replied'),
(2, 'suraj', 'gautam', 'suraj@gmail.com', 'i want to order jersey', 'replied'),
(3, 'new', 'user', 'new@gmail.com', 'hello sir. i want to order football boots and barcelona jersey how can i order that please reply me as soon as possible. i am in urgent need to jerset and boots so i need it as soon as possible. please reply how can i pay for it either by cash on delivery', 'replied'),
(4, 'hello', 'there', 'kjafkj@gmail.com', 'hwllo djfksdjfiknsnk', 'replied'),
(5, 'Sishir', 'Gautam', 'sishir@gmail.com', 'i want to order boots', 'not_replied'),
(6, 'suraj', 'gautam', 'koxedev956@vefblogg.com', 'i want to order football', 'replied'),
(7, 'Jharana', 'Gautam', 'jharana675@gmail.com', 'i want to order ball', 'replied'),
(8, 'niban', 'bhatta', 'niban@gmail.com', 'hello sir', 'replied'),
(9, 'niban', 'bhatta', 'niban@gmail.com', 'hello sir', 'replied'),
(10, 'new', 'name', 'newname@gmail.com', 'this is a test message', 'replied'),
(11, 'new ', 'project', 'kataxef484@decorbuz.com', 'i want to order boots', 'replied'),
(12, 'suraj', 'sharma', 'yrodipop688@vietkevin.com', 'i want to order football', 'replied'),
(13, 'new', 'user', 'jkfsjkjk@gmail.com', 'i am new user sir', 'replied'),
(14, 'suraj', 'gautam', 'rihehow276@fgvod.com', 'i didnt receive product', 'replied'),
(15, 'jasdkjk', 'jakj', 'jsdkjkj@gmail.com', 'jfakjk\r\n', 'not_replied'),
(16, 'demo', 'ncit', 'nudovyro@teleg.eu', 'i have a problem', 'replied'),
(17, 'nabin', '300000', 'myryjy@cyclelove.cc', 'hello', 'replied'),
(18, 'suraj ', 'gautam', 'jolubati@lyricspad.net', 'i want to knoiw', 'replied');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `product_id` int(100) NOT NULL,
  `product_price` int(100) NOT NULL,
  `order_date` date NOT NULL DEFAULT current_timestamp(),
  `payment` varchar(255) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'pending',
  `quantity` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `ship_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `username`, `product_id`, `product_price`, `order_date`, `payment`, `status`, `quantity`, `phone_number`, `ship_address`) VALUES
(0, 'first project', 10038, 4500, '2021-09-27', 'mastercard', 'pending', '1', '9812345678', 'baneshwor, nepal'),
(0, 'first project', 10037, 4000, '2021-09-27', 'mastercard', 'pending', '1', '9812345678', 'baneshwor, nepal'),
(0, 'Suraj Gautam', 10039, 3500, '2021-09-27', 'mastercard', 'pending', '1', '98112345667', 'new baneshwor'),
(0, 'suraj sharma', 10037, 8000, '2021-09-28', 'mastercard', 'pending', '2', '9812345678', 'baneshwor, kathmandu'),
(0, 'suraj sharma', 10040, 6500, '2021-09-28', 'mastercard', 'pending', '1', '9812345678', 'baneshwor, kathmandu');

-- --------------------------------------------------------

--
-- Table structure for table `placed_bids`
--

CREATE TABLE `placed_bids` (
  `username` varchar(255) NOT NULL,
  `product_id` int(255) NOT NULL,
  `bid_price` int(255) NOT NULL,
  `bid_datetime` datetime(6) NOT NULL DEFAULT current_timestamp(6),
  `status` varchar(100) NOT NULL DEFAULT 'open'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `placed_bids`
--

INSERT INTO `placed_bids` (`username`, `product_id`, `bid_price`, `bid_datetime`, `status`) VALUES
('newuser', 10037, 1100, '2022-11-03 19:24:06.047396', 'open'),
('newuser', 10038, 1700, '2022-11-03 19:24:15.260634', 'open'),
('newuser', 10039, 2000, '2022-11-03 19:24:22.417440', 'open'),
('suraj', 10040, 1500, '2022-11-03 19:24:40.545032', 'open'),
('suraj', 10038, 1300, '2022-11-03 19:25:10.837479', 'open'),
('newuser', 10068, 3400, '2022-11-03 21:37:47.216542', 'open'),
('newuser', 10069, 1300, '2022-11-03 21:38:18.041636', 'open'),
('suraj', 10069, 1400, '2022-11-03 21:38:51.891716', 'open'),
('suraj', 10068, 3500, '2022-11-03 21:39:29.087068', 'open'),
('newuser', 10071, 1300, '2022-11-03 22:45:39.799747', 'open'),
('newuser', 10072, 1008, '2022-11-03 23:03:33.787110', 'open'),
('newuser', 10074, 400, '2022-11-03 23:22:56.784086', 'open'),
('suraj', 10070, 3500, '2022-11-04 00:11:10.751926', 'open'),
('hello', 10068, 3600, '2022-11-05 11:18:15.941485', 'open'),
('hello', 10074, 600, '2022-11-05 11:29:35.232797', 'open'),
('new user', 10104, 4600, '2022-11-05 21:10:55.712579', 'open'),
('test1', 10106, 3100, '2022-11-06 01:07:22.191271', 'open'),
('test data', 10115, 30000, '2022-11-06 11:22:36.290476', 'open'),
('test1', 10117, 2147483647, '2022-11-06 12:13:25.575251', 'open'),
('test2', 10118, 700, '2022-11-06 12:13:45.328664', 'open'),
('test2', 10119, 32000, '2022-11-06 14:21:21.370398', 'open'),
('suraj gautam', 10119, 33000, '2022-11-06 14:55:11.550951', 'open'),
('new user', 10117, 60000000, '2022-11-11 14:48:34.529998', 'open'),
('nabin sharma', 10125, 35000, '2022-11-11 15:28:00.850087', 'open'),
('sameer gautam', 10125, 45000, '2022-11-11 15:37:26.413590', 'open');

-- --------------------------------------------------------

--
-- Table structure for table `user_cart`
--

CREATE TABLE `user_cart` (
  `id` int(100) NOT NULL,
  `username` varchar(40) NOT NULL,
  `product_id` int(100) NOT NULL,
  `no_of_items` int(100) NOT NULL DEFAULT 0,
  `total_price` int(100) NOT NULL DEFAULT 0,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_cart`
--

INSERT INTO `user_cart` (`id`, `username`, `product_id`, `no_of_items`, `total_price`, `date`) VALUES
(67, 'suraj new', 10039, 2, 7000, '2021-09-27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_data`
--
ALTER TABLE `account_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`SN`);

--
-- Indexes for table `user_cart`
--
ALTER TABLE `user_cart`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_data`
--
ALTER TABLE `account_data`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `SN` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user_cart`
--
ALTER TABLE `user_cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
