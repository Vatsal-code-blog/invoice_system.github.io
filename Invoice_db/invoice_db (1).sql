-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2020 at 10:18 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `invoice_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `order_item_tbl`
--

CREATE TABLE `order_item_tbl` (
  `order_item_id` int(11) NOT NULL,
  `bill_no` int(11) NOT NULL,
  `item_name` varchar(299) NOT NULL,
  `item_brand` varchar(299) NOT NULL,
  `item_price` decimal(10,4) NOT NULL,
  `item_quantity` int(11) NOT NULL,
  `item_total` decimal(10,4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_item_tbl`
--

INSERT INTO `order_item_tbl` (`order_item_id`, `bill_no`, `item_name`, `item_brand`, `item_price`, `item_quantity`, `item_total`) VALUES
(1, 1, 'tab', 'apple', '5000.0000', 2, '10000.0000');

-- --------------------------------------------------------

--
-- Table structure for table `order_tbl`
--

CREATE TABLE `order_tbl` (
  `order_id` int(11) NOT NULL,
  `bill_no` int(11) NOT NULL,
  `receiver_name` varchar(299) NOT NULL,
  `receiver_add` varchar(299) NOT NULL,
  `order_date` date NOT NULL,
  `order_sub_total` decimal(10,4) NOT NULL,
  `order_discount` decimal(10,4) NOT NULL,
  `order_grand_total` decimal(10,4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_tbl`
--

INSERT INTO `order_tbl` (`order_id`, `bill_no`, `receiver_name`, `receiver_add`, `order_date`, `order_sub_total`, `order_discount`, `order_grand_total`) VALUES
(1, 1, 'vatsal shah', 'Rajkot,', '2020-09-11', '10000.0000', '10.0000', '9000.0000');

-- --------------------------------------------------------

--
-- Table structure for table `register_tbl`
--

CREATE TABLE `register_tbl` (
  `register_id` int(11) NOT NULL,
  `username` varchar(299) NOT NULL,
  `email` varchar(299) NOT NULL,
  `password` varchar(299) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `order_item_tbl`
--
ALTER TABLE `order_item_tbl`
  ADD PRIMARY KEY (`order_item_id`);

--
-- Indexes for table `order_tbl`
--
ALTER TABLE `order_tbl`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `register_tbl`
--
ALTER TABLE `register_tbl`
  ADD PRIMARY KEY (`register_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `order_item_tbl`
--
ALTER TABLE `order_item_tbl`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_tbl`
--
ALTER TABLE `order_tbl`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `register_tbl`
--
ALTER TABLE `register_tbl`
  MODIFY `register_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
