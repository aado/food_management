-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 18, 2023 at 03:30 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

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

DROP TABLE IF EXISTS `billingtb`;
CREATE TABLE IF NOT EXISTS `billingtb` (
  `bill_id` int(10) NOT NULL AUTO_INCREMENT,
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
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`bill_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `billingtb`
--

INSERT INTO `billingtb` (`bill_id`, `bill_type`, `bill_no`, `customer_id`, `order_date`, `bill_date`, `bill_time`, `tax`, `tax_typ`, `discount`, `discount_type`, `other_cost`, `status`) VALUES
(1, 'test', 456, 456, '2017-01-04', '2017-01-12', '16:23:00', 3.00, '56', 45.00, '78', 4554.00, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `categorytb`
--

DROP TABLE IF EXISTS `categorytb`;
CREATE TABLE IF NOT EXISTS `categorytb` (
  `category_id` int(10) NOT NULL AUTO_INCREMENT,
  `main_catid` int(10) NOT NULL,
  `cat_name` varchar(25) NOT NULL,
  `cat_note` text NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

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

DROP TABLE IF EXISTS `citytb`;
CREATE TABLE IF NOT EXISTS `citytb` (
  `city_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `city` varchar(25) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`city_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

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

DROP TABLE IF EXISTS `customertb`;
CREATE TABLE IF NOT EXISTS `customertb` (
  `customer_id` int(10) NOT NULL AUTO_INCREMENT,
  `customer_type` varchar(20) NOT NULL,
  `customer_name` varchar(25) NOT NULL,
  `login_id` varchar(25) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `city_id` int(10) NOT NULL,
  `shop_name` varchar(100) NOT NULL,
  `tin_no` varchar(15) NOT NULL,
  `mobile_no` varchar(15) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

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

DROP TABLE IF EXISTS `discounttb`;
CREATE TABLE IF NOT EXISTS `discounttb` (
  `discount_id` int(10) NOT NULL AUTO_INCREMENT,
  `discount_type` varchar(25) NOT NULL,
  `discount_amt` float(10,2) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`discount_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `discounttb`
--

INSERT INTO `discounttb` (`discount_id`, `discount_type`, `discount_amt`, `status`) VALUES
(1, '', 500.00, '');

-- --------------------------------------------------------

--
-- Table structure for table `itemtb`
--

DROP TABLE IF EXISTS `itemtb`;
CREATE TABLE IF NOT EXISTS `itemtb` (
  `item_id` int(10) NOT NULL AUTO_INCREMENT,
  `category_id` int(10) NOT NULL,
  `item_name` varchar(25) NOT NULL,
  `item_discription` text NOT NULL,
  `item_cost` float(10,2) NOT NULL,
  `item_img` varchar(100) NOT NULL,
  `discount_type` varchar(50) NOT NULL,
  `discount_amt` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

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

DROP TABLE IF EXISTS `mastertb`;
CREATE TABLE IF NOT EXISTS `mastertb` (
  `line_no` int(10) NOT NULL,
  `line_type` varchar(10) NOT NULL,
  `line_text` text NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `recordstb`
--

DROP TABLE IF EXISTS `recordstb`;
CREATE TABLE IF NOT EXISTS `recordstb` (
  `bill_recid` int(10) NOT NULL AUTO_INCREMENT,
  `bill_id` int(10) NOT NULL,
  `item_id` int(10) NOT NULL,
  `qty` float(10,2) NOT NULL,
  `item_cost` float(10,2) NOT NULL,
  `discount` float(10,2) NOT NULL,
  `discount_type` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`bill_recid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stocktb`
--

DROP TABLE IF EXISTS `stocktb`;
CREATE TABLE IF NOT EXISTS `stocktb` (
  `stock_id` int(10) NOT NULL AUTO_INCREMENT,
  `stock_type` varchar(20) NOT NULL,
  `item_id` int(10) NOT NULL,
  `date` date NOT NULL,
  `qty` float(10,2) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`stock_id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

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
(36, 'Sales', 3, '2017-02-08', 200.00, 'Active'),
(37, 'Stock', 1, '2023-04-17', 10.00, 'Active'),
(38, 'Stock', 2, '2023-04-17', 10.00, 'Active'),
(39, 'Stock', 3, '2023-04-17', 10.00, 'Active'),
(40, 'Stock', 4, '2023-04-17', 10.00, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `taxtb`
--

DROP TABLE IF EXISTS `taxtb`;
CREATE TABLE IF NOT EXISTS `taxtb` (
  `tax_id` int(10) NOT NULL AUTO_INCREMENT,
  `tax` float(10,2) NOT NULL,
  `tax_type` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`tax_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

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

DROP TABLE IF EXISTS `transactiontb`;
CREATE TABLE IF NOT EXISTS `transactiontb` (
  `transaction_id` int(10) NOT NULL AUTO_INCREMENT,
  `bill_id` int(10) NOT NULL,
  `trans_type` varchar(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `amt` float(10,2) NOT NULL,
  `payment_type` varchar(10) NOT NULL,
  `payment_details` text NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `usertb`
--

DROP TABLE IF EXISTS `usertb`;
CREATE TABLE IF NOT EXISTS `usertb` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_type` varchar(15) NOT NULL,
  `name` varchar(25) NOT NULL,
  `login_id` varchar(25) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `mobile_no` varchar(15) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usertb`
--

INSERT INTO `usertb` (`user_id`, `user_type`, `name`, `login_id`, `password`, `email_id`, `mobile_no`, `status`) VALUES
(1, 'Admin', 'fgfg', 'admin', '0192023a7bbd73250516f069df18b500', 'fgfg', 't76878787878', 'Active'),
(3, 'Operator', 'raj kiran', 'rajkiran', '0192023a7bbd73250516f069df18b500', 'rajkiran@gmail.com', '9986058114', 'Active'),
(4, 'Operator', 'operator', 'operator1', '0192023a7bbd73250516f069df18b500', 'operator@gmial.com', '', 'Active'),
(5, 'Admin', 'Raj kiran', 'rajkiran1', '0f7e44a922df352c05c5f73cb40ba115', 'rajkiran@gmail.com', '9986058114', 'Active');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
