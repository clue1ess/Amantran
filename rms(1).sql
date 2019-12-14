-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2019 at 04:32 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `a_id` int(11) NOT NULL,
  `a_fname` varchar(20) NOT NULL,
  `a_lname` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_no` varchar(10) NOT NULL,
  `passwd` varchar(50) NOT NULL,
  `street` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_id`, `a_fname`, `a_lname`, `email`, `phone_no`, `passwd`, `street`, `city`, `state`) VALUES
(1, 'Gouri', 'Nangliya', 'gmn@gmail.com', '7887483031', 'gmn7', 'coep', 'pune', 'Maharashtra'),
(6, 'swap', 'babar', 'swap@gmail.com', '7083255059', 'swap', 'coep', 'pune', 'maharashtra');

-- --------------------------------------------------------

--
-- Table structure for table `book_table`
--

CREATE TABLE `book_table` (
  `t_no` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time_slot` time NOT NULL,
  `no_persons` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book_table`
--

INSERT INTO `book_table` (`t_no`, `c_id`, `date`, `time_slot`, `no_persons`) VALUES
(1, 3, '2019-11-13', '19:00:00', 2),
(1, 3, '2019-11-14', '17:00:00', 4),
(3, 6, '2019-11-15', '19:00:00', 2),
(3, 7, '2019-11-21', '16:00:00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `c_id` int(11) NOT NULL,
  `c_fname` varchar(20) NOT NULL,
  `c_lname` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_no` varchar(10) NOT NULL,
  `passwd` varchar(50) NOT NULL,
  `street` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`c_id`, `c_fname`, `c_lname`, `email`, `phone_no`, `passwd`, `street`, `city`, `state`) VALUES
(3, 'shiwani', 'bayas', 'bayas@gmail.com', '4563217895', 'shiwani', 'coep', 'pune ', 'maharashtra'),
(4, 'ish', 'dhondge', 'dhondge@gmail.com', '7632541896', 'ish', 'coep', 'pune', 'maharashtra'),
(6, 'tanu', 'jirapure', 'jirapure@gmail.com', '4563289714', 'tanu', 'coep', 'pune ', 'maharashtra'),
(7, 'meeti', 'dixit', 'dixit@gmail.com', '7236541899', 'meeti', 'kakade city, karve nagar', 'pune', 'maharshtra'),
(8, 'riya', 'vidhale', 'vidhale@gmail.com', '7523641896', 'riya', 'coep', 'pune', 'maharashtra');

-- --------------------------------------------------------

--
-- Table structure for table `customer_visited`
--

CREATE TABLE `customer_visited` (
  `c_id` int(11) NOT NULL,
  `c_fname` varchar(20) NOT NULL,
  `c_lname` varchar(20) NOT NULL,
  `phone_no` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_visited`
--

INSERT INTO `customer_visited` (`c_id`, `c_fname`, `c_lname`, `phone_no`) VALUES
(55, 'sam', 'mirande', '7891236548'),
(56, 'khushbu', 'nangliya', '7412589638'),
(57, 'radha', 'nangliya', '7744008461');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `e_id` int(11) NOT NULL,
  `e_fname` varchar(20) NOT NULL,
  `e_lname` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_no` varchar(10) NOT NULL,
  `passwd` varchar(50) NOT NULL,
  `salary` int(11) NOT NULL,
  `street` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `role` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`e_id`, `e_fname`, `e_lname`, `email`, `phone_no`, `passwd`, `salary`, `street`, `city`, `state`, `role`) VALUES
(9, 'chandler ', 'bing', 'bing@gmail.com', '7894561235', 'chandler', 5000, 'viman nagar', 'Pune', 'Maharashtra', 'm'),
(10, 'monica', 'geller', 'geller@gmail.com', '7896325413', 'monica', 3000, 'pimpri chinchwad', 'pune', 'maharashtra', 'c'),
(11, 'rachel', 'green', 'green@gmail.com', '4563217895', 'rachel', 1000, 'kothrud', 'pune', 'maharashtra', 'w'),
(12, 'joey', 'tribianni', 'tribianni@gmail.com', '4569871234', 'joey', 500, 'karve nagar', 'pune ', 'maharahtra', 'd'),
(13, 'Arya', 'Stark', 'stark@gmail.com', '7536984123', 'arya', 5000, 'shivaji nagatr', 'pune', 'maharashtra', 'm'),
(14, 'Sansa', 'Stark', 'stark2@gmail.com', '7854123265', 'sansa', 1000, 'Katraj', 'Pune', 'Maharashtra', 'w');

-- --------------------------------------------------------

--
-- Table structure for table `food_item`
--

CREATE TABLE `food_item` (
  `f_id` int(11) NOT NULL,
  `f_name` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food_item`
--

INSERT INTO `food_item` (`f_id`, `f_name`, `category`, `price`) VALUES
(13, 'Cream of Tomato Soup', 'Soup', 100),
(14, 'Vegetable Soup', 'Soup', 100),
(15, 'Corn Soup', 'Soup', 110),
(16, 'Manchow Soup', 'Soup', 120),
(17, 'Hot n Sour Soup', 'Soup', 90),
(18, 'Veg Manchurian', 'Starter', 180),
(19, 'Veg Hara Bhara Kaba', 'Starter', 180),
(20, 'Paneer Tikka', 'Starter', 175),
(21, 'Veg Spring Roll', 'Starter', 190),
(22, 'Veg Cripsy', 'Starter', 185),
(23, 'Chapati', 'Roti', 10),
(24, 'Tandoori Roti', 'Roti', 20),
(25, 'Kulcha', 'Roti', 30),
(26, 'Naan', 'Roti', 25),
(27, 'Veg Handi', 'Punjabi Dishes', 180),
(28, 'Paneer Butter Masala', 'Punjabi Dishes', 150),
(29, 'Paneer Hyderabadi', 'Punjabi Dishes', 185),
(30, 'Malai Kofta', 'Punjabi Dishes', 175),
(31, 'Dal Fry', 'Punjabi Dishes', 140),
(32, 'Mastani', 'Dessert', 80),
(33, 'Falooda', 'Dessert', 120),
(34, 'Sizzling Brownie', 'Dessert', 110),
(35, 'Fruit Castard', 'Dessert', 100),
(36, 'Sundae ice-cream', 'Dessert', 90),
(37, 'Steam Rice', 'Rice', 80),
(38, 'Jeera Rice', 'Rice', 90),
(39, 'Veg Pulav', 'Rice', 110),
(40, 'Veg Biryani', 'Rice', 150);

-- --------------------------------------------------------

--
-- Table structure for table `offline_order`
--

CREATE TABLE `offline_order` (
  `order_no` int(11) NOT NULL,
  `c_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `offline_order`
--

INSERT INTO `offline_order` (`order_no`, `c_id`) VALUES
(64, 55),
(70, 56),
(71, 57);

-- --------------------------------------------------------

--
-- Table structure for table `online_order`
--

CREATE TABLE `online_order` (
  `order_no` int(11) NOT NULL,
  `c_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `online_order`
--

INSERT INTO `online_order` (`order_no`, `c_id`) VALUES
(65, 3),
(67, 6),
(66, 7),
(68, 7),
(69, 8);

-- --------------------------------------------------------

--
-- Table structure for table `order_food`
--

CREATE TABLE `order_food` (
  `order_no` int(11) NOT NULL,
  `f_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_food`
--

INSERT INTO `order_food` (`order_no`, `f_id`, `quantity`) VALUES
(64, 13, 1),
(67, 14, 3),
(65, 16, 2),
(66, 16, 1),
(71, 17, 1),
(64, 18, 1),
(68, 18, 4),
(67, 19, 2),
(65, 22, 2),
(66, 22, 1),
(67, 22, 2),
(64, 25, 2),
(64, 27, 1),
(70, 32, 3),
(69, 33, 6),
(64, 34, 1),
(66, 34, 1),
(70, 34, 3),
(65, 35, 4),
(64, 36, 4),
(70, 36, 2),
(64, 38, 1),
(66, 39, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_food_status`
--

CREATE TABLE `order_food_status` (
  `order_no` int(11) NOT NULL,
  `status` smallint(6) NOT NULL,
  `date` date NOT NULL,
  `time_slot` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_food_status`
--

INSERT INTO `order_food_status` (`order_no`, `status`, `date`, `time_slot`) VALUES
(64, 1, '2019-11-13', '10:08:00'),
(65, 1, '2019-11-13', '10:13:00'),
(66, 1, '2019-11-13', '06:28:00'),
(67, 2, '2019-11-14', '04:10:00'),
(68, 2, '2019-11-14', '04:11:00'),
(69, 2, '2019-11-14', '04:12:00'),
(70, 1, '2019-11-14', '04:13:00'),
(71, 1, '2019-11-14', '04:14:00');

-- --------------------------------------------------------

--
-- Table structure for table `payment_details`
--

CREATE TABLE `payment_details` (
  `b_no` int(11) NOT NULL,
  `order_no` int(11) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment_details`
--

INSERT INTO `payment_details` (`b_no`, `order_no`, `amount`) VALUES
(6, 64, 720),
(7, 65, 1010),
(8, 65, 1010),
(9, 66, 525),
(10, 70, 750),
(11, 71, 90);

-- --------------------------------------------------------

--
-- Table structure for table `table_`
--

CREATE TABLE `table_` (
  `t_no` int(11) NOT NULL,
  `capacity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_`
--

INSERT INTO `table_` (`t_no`, `capacity`) VALUES
(1, 10),
(2, 4),
(3, 2),
(4, 6),
(5, 2),
(6, 8);

-- --------------------------------------------------------

--
-- Table structure for table `table_details`
--

CREATE TABLE `table_details` (
  `t_no` int(11) NOT NULL,
  `e_id` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_details`
--

INSERT INTO `table_details` (`t_no`, `e_id`, `date`) VALUES
(1, 11, '2019-11-12'),
(1, 11, '2019-11-13'),
(2, 11, '2019-11-12'),
(2, 11, '2019-11-13'),
(3, 11, '2019-11-12'),
(3, 14, '2019-11-13'),
(4, 14, '2019-11-13'),
(5, 11, '2019-11-12'),
(5, 14, '2019-11-13'),
(6, 11, '2019-11-12'),
(6, 11, '2019-11-13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `book_table`
--
ALTER TABLE `book_table`
  ADD PRIMARY KEY (`t_no`,`c_id`,`date`,`time_slot`),
  ADD KEY `customer_no` (`c_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `customer_visited`
--
ALTER TABLE `customer_visited`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`e_id`);

--
-- Indexes for table `food_item`
--
ALTER TABLE `food_item`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `offline_order`
--
ALTER TABLE `offline_order`
  ADD PRIMARY KEY (`order_no`),
  ADD KEY `cc` (`c_id`);

--
-- Indexes for table `online_order`
--
ALTER TABLE `online_order`
  ADD PRIMARY KEY (`order_no`),
  ADD KEY `customer` (`c_id`);

--
-- Indexes for table `order_food`
--
ALTER TABLE `order_food`
  ADD PRIMARY KEY (`f_id`,`order_no`) USING BTREE,
  ADD KEY `ordernumber` (`order_no`);

--
-- Indexes for table `order_food_status`
--
ALTER TABLE `order_food_status`
  ADD PRIMARY KEY (`order_no`);

--
-- Indexes for table `payment_details`
--
ALTER TABLE `payment_details`
  ADD PRIMARY KEY (`b_no`),
  ADD KEY `order` (`order_no`);

--
-- Indexes for table `table_`
--
ALTER TABLE `table_`
  ADD PRIMARY KEY (`t_no`);

--
-- Indexes for table `table_details`
--
ALTER TABLE `table_details`
  ADD PRIMARY KEY (`t_no`,`e_id`,`date`) USING BTREE,
  ADD KEY `employee_on_table` (`e_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `customer_visited`
--
ALTER TABLE `customer_visited`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `e_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `food_item`
--
ALTER TABLE `food_item`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `order_food_status`
--
ALTER TABLE `order_food_status`
  MODIFY `order_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `payment_details`
--
ALTER TABLE `payment_details`
  MODIFY `b_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `table_`
--
ALTER TABLE `table_`
  MODIFY `t_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book_table`
--
ALTER TABLE `book_table`
  ADD CONSTRAINT `customer_no` FOREIGN KEY (`c_id`) REFERENCES `customer` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `table_no` FOREIGN KEY (`t_no`) REFERENCES `table_details` (`t_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `offline_order`
--
ALTER TABLE `offline_order`
  ADD CONSTRAINT `cc` FOREIGN KEY (`c_id`) REFERENCES `customer_visited` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `o` FOREIGN KEY (`order_no`) REFERENCES `order_food_status` (`order_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `online_order`
--
ALTER TABLE `online_order`
  ADD CONSTRAINT `customer` FOREIGN KEY (`c_id`) REFERENCES `customer` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_num` FOREIGN KEY (`order_no`) REFERENCES `order_food_status` (`order_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_food`
--
ALTER TABLE `order_food`
  ADD CONSTRAINT `food_no` FOREIGN KEY (`f_id`) REFERENCES `food_item` (`f_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ordernumber` FOREIGN KEY (`order_no`) REFERENCES `order_food_status` (`order_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment_details`
--
ALTER TABLE `payment_details`
  ADD CONSTRAINT `order` FOREIGN KEY (`order_no`) REFERENCES `order_food_status` (`order_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `table_details`
--
ALTER TABLE `table_details`
  ADD CONSTRAINT `employee_on_table` FOREIGN KEY (`e_id`) REFERENCES `employee` (`e_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `table_number` FOREIGN KEY (`t_no`) REFERENCES `table_` (`t_no`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
