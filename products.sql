-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2023 at 09:02 AM
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
-- Database: `products`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ad_username` varchar(100) NOT NULL,
  `ID` int(10) NOT NULL,
  `name` varchar(250) NOT NULL,
  `category` varchar(100) NOT NULL,
  `image` varchar(250) NOT NULL,
  `descr` varchar(500) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'under review',
  `no_of_bids` int(100) NOT NULL,
  `min_bid_amount` int(100) NOT NULL,
  `latest_bid_amount` int(100) NOT NULL,
  `bid_time_remaining` int(100) NOT NULL,
  `added_time` datetime(6) NOT NULL DEFAULT current_timestamp(6),
  `high_bid_user` varchar(255) NOT NULL,
  `bid_status` varchar(255) NOT NULL DEFAULT 'open'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ad_username`, `ID`, `name`, `category`, `image`, `descr`, `status`, `no_of_bids`, `min_bid_amount`, `latest_bid_amount`, `bid_time_remaining`, `added_time`, `high_bid_user`, `bid_status`) VALUES
('test data', 10116, 'cycle', 'motors', 'cycle.jpg', 'cycle', 'approved', 7, 10000, 50000, 0, '2022-11-06 11:19:04.488375', 'new user', 'open'),
('test data', 10117, 'Jagga', 'real_estate', 'land3.jpg', 'land', 'approved', 2, 40000000, 60000000, 0, '2022-11-06 11:39:44.855305', 'new user', 'open'),
('test1', 10118, 'joystick', 'video_games', 'joystick.webp', 'game', 'approved', 1, 500, 5000, 0, '2022-11-06 11:48:18.047285', 'new user', 'open'),
('test1', 10119, 'TV', 'electronics', 'tv.webp', 'television', 'approved', 2, 30000, 200000, 0, '2022-11-06 14:19:57.286614', 'new user', 'open'),
('suraj gautam', 10120, 'Table', 'furnitures', 'table.jpg', 'table', 'approved', 5, 5000, 120000, 0, '2022-11-06 15:03:24.527529', 'nabin Bhatta', 'open'),
('nabin Bhatta', 10121, 'Hoodie', 'clothing', 'hoodie.webp', 'hoodie', 'approved', 8, 5000, 6500, 0, '2022-11-11 11:44:23.734926', 'new user', 'open'),
('sameer kahnla', 10122, 'Bike', 'motors', 'bike.jpg', 'bike ', 'approved', 0, 500000, 600000, 0, '2022-11-11 11:57:06.033275', 'new user', 'open'),
('Apil lama', 10124, 'vaccum', 'electronics', 'vaccum.png', 'babal vaccum', 'approved', 0, 5000, 5500, 0, '2022-11-11 12:19:35.095977', 'new', 'open'),
('new user', 10125, 'Bicycle', 'motors', 'cycle.jpg', 'bicycle in good condition', 'approved', 2, 30000, 45000, 0, '2022-11-11 14:30:41.938327', 'sameer gautam', 'open'),
('new user', 10126, 'House', 'real_estate', 'house1.jpg', 'house in ', 'approved', 0, 40000000, 0, 0, '2022-11-11 14:41:42.484689', '', 'open');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10127;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
