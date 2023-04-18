-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2023 at 10:18 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vansalesdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `billingtb`
--

CREATE TABLE `billingtb` (
  `bill_id` int(10) NOT NULL,
  `bill_type` varchar(15) NOT NULL,
  `bill_no` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `order_date` date NOT NULL,
  `bill_date` date NOT NULL,
  `bill_time` time NOT NULL,
  `tax` float(10,2) NOT NULL,
  `tax_typ` varchar(20) NOT NULL,
  `discount` float(10,2) NOT NULL,
  `discount_type` varchar(20) NOT NULL,
  `other_cost` float(10,2) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `billingtb`
--

INSERT INTO `billingtb` (`bill_id`, `bill_type`, `bill_no`, `customer_id`, `order_date`, `bill_date`, `bill_time`, `tax`, `tax_typ`, `discount`, `discount_type`, `other_cost`, `status`) VALUES
(1, 'test', 456, 456, '2017-01-04', '2017-01-12', '16:23:00', 3.00, '56', 45.00, '78', 4554.00, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `categorytb`
--

CREATE TABLE `categorytb` (
  `category_id` int(10) NOT NULL,
  `main_catid` int(10) NOT NULL,
  `cat_name` varchar(25) NOT NULL,
  `cat_note` text NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categorytb`
--

INSERT INTO `categorytb` (`category_id`, `main_catid`, `cat_name`, `cat_note`, `status`) VALUES
(5, 0, 'Vegetarian', 'Veg', 'Active'),
(6, 0, 'Non Vegetarian', 'non', 'Active'),
(7, 5, 'Veg Fried rice', 'veg', 'Active'),
(8, 5, 'Rice', 'rice', 'Active'),
(9, 6, 'Chicken masala', 'chicken', 'Active'),
(10, 6, 'Fish masala', 'fish', 'Active'),
(11, 0, 'Chinese food', '', 'Active'),
(12, 11, 'Manchoori', '', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `citytb`
--

CREATE TABLE `citytb` (
  `city_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `city` varchar(25) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `citytb`
--

INSERT INTO `citytb` (`city_id`, `user_id`, `city`, `status`) VALUES
(6, 0, 'Mangalore', 'Active'),
(7, 0, 'ggg', ''),
(8, 0, 'eee', ''),
(9, 0, 'Udupi', 'Active'),
(10, 0, 'fdf', ''),
(11, 0, 'fdd', ''),
(12, 0, 'Manipal', 'Active'),
(13, 0, 'Bangalore', 'Active'),
(14, 0, '656', ''),
(15, 0, 'dg', ''),
(16, 0, '345', ''),
(17, 0, 'gh', ''),
(18, 0, 'dfg', '');

-- --------------------------------------------------------

--
-- Table structure for table `customertb`
--

CREATE TABLE `customertb` (
  `customer_id` int(10) NOT NULL,
  `customer_type` varchar(20) NOT NULL,
  `customer_name` varchar(25) NOT NULL,
  `login_id` varchar(25) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `city_id` int(10) NOT NULL,
  `shop_name` varchar(100) NOT NULL,
  `tin_no` varchar(15) NOT NULL,
  `mobile_no` varchar(15) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customertb`
--

INSERT INTO `customertb` (`customer_id`, `customer_type`, `customer_name`, `login_id`, `password`, `address`, `city_id`, `shop_name`, `tin_no`, `mobile_no`, `status`) VALUES
(2, 'One time', 'raj kiran', 'rajkiran', '123456789', '3rd floor, city light building, Balmatta cross', 13, 'abc shop', '5657', '998605542', 'Active'),
(3, 'Regular', '', 'rajkiran', '111', '3rd floor, city light building, Balmatta cross', 12, 'abc shop', '5657', '9986058114', 'Pending'),
(4, 'One time', 'Mahesh', 'mahesh', '789456', '3rd floor, city light building, Balmatta cross', 12, '', '', '9986005574', 'Active'),
(5, 'One time', 'Rupesh', 'rupeshkumar', '78956123', '3rd floor, city light building, Balmatta cross', 9, '', '', '9986058114', 'Deactivate'),
(6, 'One time', 'peter', 'peter', '123456789', '3rd floor, city light building, Balmatta cross', 9, '', '', '9986058114', 'Pending'),
(7, 'One time', 'Raj guru', 'rajguru', '123456', '3rd floor, city light building, Balmatta cross', 6, '', '', '9986058114', 'Pending'),
(8, 'Regular', '', 'samfaz', '123456789', '4th floor, city light building', 6, 'samfaz', '789456', '8123105698', 'Pending'),
(9, 'One time', 'Suresh', 'suresh', '25f9e794323b453885f5181f1b624d0b', '3rd floor, city light building, Balmatta cross', 6, '', '', '9986058114', 'Pending'),
(10, 'Regular', '', 'vaishakh', '25f9e794323b453885f5181f1b624d0b', '3rd floor, city light building, Balmatta cross', 6, 'vaishakh', '12545', '9986058114', 'Pending'),
(11, 'Regular', '', 'vaishakh', 'd41d8cd98f00b204e9800998ecf8427e', '3rd floor, city light building, Balmatta cross', 6, '', '', '9986058114', 'Pending'),
(15, 'One time', 'santhosh', 'santhosh', '25f9e794323b453885f5181f1b624d0b', '3rd floor, city light building, Balmatta cross', 6, '', '', '8896587441', 'Pending'),
(16, 'Regular', '', 'customer', '91ec1f9324753048c0096d036a694f86', '3rd floor, city light building, Balmatta cross', 6, 'customer', '7894', '9986058114', 'Active'),
(17, 'Regular', '', 'tech1', '32250170a0dca92d53ec9624f336ca24', '', 0, '', '', '', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `discounttb`
--

CREATE TABLE `discounttb` (
  `discount_id` int(10) NOT NULL,
  `discount_type` varchar(25) NOT NULL,
  `discount_amt` float(10,2) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `discounttb`
--

INSERT INTO `discounttb` (`discount_id`, `discount_type`, `discount_amt`, `status`) VALUES
(1, '', 500.00, '');

-- --------------------------------------------------------

--
-- Table structure for table `itemtb`
--

CREATE TABLE `itemtb` (
  `item_id` int(10) NOT NULL,
  `category_id` int(10) NOT NULL,
  `item_name` varchar(25) NOT NULL,
  `item_discription` text NOT NULL,
  `item_cost` float(10,2) NOT NULL,
  `item_img` varchar(100) NOT NULL,
  `discount_type` varchar(50) NOT NULL,
  `discount_amt` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `itemtb`
--

INSERT INTO `itemtb` (`item_id`, `category_id`, `item_name`, `item_discription`, `item_cost`, `item_img`, `discount_type`, `discount_amt`, `status`) VALUES
(1, 7, 'Chapathi', 'ghghgh', 89.00, 'sfsdf', '', '', 'Active'),
(2, 7, 'Special meals', 'test record', 50.00, '14700image2.JPG', '', '', 'Active'),
(3, 7, 'Ghee rice', 'etest record', 503.00, '14700image2.JPG', '', '', 'Active'),
(4, 5, 'sss', 'sss', 10.00, '1224984338340688355_1175559426462749_5201140764925775790_n.png', 'Flat', '10', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `mastertb`
--

CREATE TABLE `mastertb` (
  `line_no` int(10) NOT NULL,
  `line_type` varchar(10) NOT NULL,
  `line_text` text NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `recordstb`
--

CREATE TABLE `recordstb` (
  `bill_recid` int(10) NOT NULL,
  `bill_id` int(10) NOT NULL,
  `item_id` int(10) NOT NULL,
  `qty` float(10,2) NOT NULL,
  `item_cost` float(10,2) NOT NULL,
  `discount` float(10,2) NOT NULL,
  `discount_type` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stocktb`
--

CREATE TABLE `stocktb` (
  `stock_id` int(10) NOT NULL,
  `stock_type` varchar(20) NOT NULL,
  `item_id` int(10) NOT NULL,
  `date` date NOT NULL,
  `qty` float(10,2) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stocktb`
--

INSERT INTO `stocktb` (`stock_id`, `stock_type`, `item_id`, `date`, `qty`, `status`) VALUES
(26, 'Stock', 1, '2017-01-30', 58.00, 'Active'),
(27, 'Stock', 2, '2017-01-30', 66.00, 'Active'),
(28, 'Stock', 3, '2017-01-30', 77.00, 'Active'),
(29, 'Sales', 3, '2017-01-30', 10.00, 'Active'),
(33, 'Stock', 1, '2017-02-08', 2500.00, 'Active'),
(34, 'Stock', 2, '2017-02-08', 2000.00, 'Active'),
(35, 'Stock', 3, '2017-02-08', 1000.00, 'Active'),
(36, 'Sales', 3, '2017-02-08', 200.00, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `taxtb`
--

CREATE TABLE `taxtb` (
  `tax_id` int(10) NOT NULL,
  `tax` float(10,2) NOT NULL,
  `tax_type` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `taxtb`
--

INSERT INTO `taxtb` (`tax_id`, `tax`, `tax_type`, `status`) VALUES
(1, 10.00, 'Customer', 'Active'),
(4, 5.00, 'Regular', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `transactiontb`
--

CREATE TABLE `transactiontb` (
  `transaction_id` int(10) NOT NULL,
  `bill_id` int(10) NOT NULL,
  `trans_type` varchar(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `amt` float(10,2) NOT NULL,
  `payment_type` varchar(10) NOT NULL,
  `payment_details` text NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `usertb`
--

CREATE TABLE `usertb` (
  `user_id` int(11) NOT NULL,
  `user_type` varchar(15) NOT NULL,
  `name` varchar(25) NOT NULL,
  `login_id` varchar(25) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `mobile_no` varchar(15) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usertb`
--

INSERT INTO `usertb` (`user_id`, `user_type`, `name`, `login_id`, `password`, `email_id`, `mobile_no`, `status`) VALUES
(1, 'Admin', 'fgfg', 'admin', '0192023a7bbd73250516f069df18b500', 'fgfg', 't76878787878', 'Active'),
(3, 'Operator', 'raj kiran', 'rajkiran', '0192023a7bbd73250516f069df18b500', 'rajkiran@gmail.com', '9986058114', 'Active'),
(4, 'Operator', 'operator', 'operator1', '4b583376b2767b923c3e1da60d10de59', 'operator@gmial.com', '', 'Active'),
(5, 'Admin', 'Raj kiran', 'rajkiran1', '0f7e44a922df352c05c5f73cb40ba115', 'rajkiran@gmail.com', '9986058114', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `billingtb`
--
ALTER TABLE `billingtb`
  ADD PRIMARY KEY (`bill_id`);

--
-- Indexes for table `categorytb`
--
ALTER TABLE `categorytb`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `citytb`
--
ALTER TABLE `citytb`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `customertb`
--
ALTER TABLE `customertb`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `discounttb`
--
ALTER TABLE `discounttb`
  ADD PRIMARY KEY (`discount_id`);

--
-- Indexes for table `itemtb`
--
ALTER TABLE `itemtb`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `recordstb`
--
ALTER TABLE `recordstb`
  ADD PRIMARY KEY (`bill_recid`);

--
-- Indexes for table `stocktb`
--
ALTER TABLE `stocktb`
  ADD PRIMARY KEY (`stock_id`);

--
-- Indexes for table `taxtb`
--
ALTER TABLE `taxtb`
  ADD PRIMARY KEY (`tax_id`);

--
-- Indexes for table `transactiontb`
--
ALTER TABLE `transactiontb`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `usertb`
--
ALTER TABLE `usertb`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `billingtb`
--
ALTER TABLE `billingtb`
  MODIFY `bill_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categorytb`
--
ALTER TABLE `categorytb`
  MODIFY `category_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `citytb`
--
ALTER TABLE `citytb`
  MODIFY `city_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `customertb`
--
ALTER TABLE `customertb`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `discounttb`
--
ALTER TABLE `discounttb`
  MODIFY `discount_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `itemtb`
--
ALTER TABLE `itemtb`
  MODIFY `item_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `recordstb`
--
ALTER TABLE `recordstb`
  MODIFY `bill_recid` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stocktb`
--
ALTER TABLE `stocktb`
  MODIFY `stock_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `taxtb`
--
ALTER TABLE `taxtb`
  MODIFY `tax_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transactiontb`
--
ALTER TABLE `transactiontb`
  MODIFY `transaction_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usertb`
--
ALTER TABLE `usertb`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
