-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 19, 2023 at 06:07 AM
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categorytb`
--

INSERT INTO `categorytb` (`category_id`, `main_catid`, `cat_name`, `cat_note`, `status`) VALUES
(1, 0, 'Vegetables', '', 'Active'),
(2, 0, 'Salad', '', 'Active'),
(3, 0, 'Soup', '', 'Active'),
(4, 0, 'Pasta', '', 'Active'),
(5, 0, 'BBQ Food', '', 'Active'),
(6, 0, 'Sandwiches & wraps', '', 'Active'),
(7, 0, 'Cakes', '', 'Active'),
(8, 0, 'Pork', '', 'Active'),
(9, 0, 'Pies & Pastries', '', 'Active'),
(10, 0, 'Drinks', '', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
