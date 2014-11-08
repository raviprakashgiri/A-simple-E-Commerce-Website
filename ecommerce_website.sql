-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 08, 2014 at 06:10 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ecommerce_website`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE IF NOT EXISTS `administrator` (
  `admin_user_name` varchar(25) NOT NULL,
  `admin_pass_word` varchar(15) NOT NULL,
  `admin_first_name` varchar(25) NOT NULL,
  `admin_last_name` varchar(25) NOT NULL,
  `admin_email` varchar(30) NOT NULL,
  `admin_gender` varchar(25) NOT NULL,
  `admin_resd_address` varchar(70) NOT NULL,
  `admin_par_address` varchar(100) NOT NULL,
  `admin_mobile` int(10) NOT NULL,
  `identy_proof` varchar(25) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `admin_image` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`admin_user_name`, `admin_pass_word`, `admin_first_name`, `admin_last_name`, `admin_email`, `admin_gender`, `admin_resd_address`, `admin_par_address`, `admin_mobile`, `identy_proof`, `date`, `admin_image`) VALUES
('sanju', 'sanju', 'hkk', 'njk', 'hjk', 'Male', 'hjkhk', 'hkj', 78, 'hhjk', '2014-08-18 03:30:41', 'msamsung_9.jpg'),
('sangesh645', 'QjlrGxpc', 'sangesh', 'yadav', 'rohit@gmail.com', 'Male', 'smvdu', 'smvdu', 2147483647, 'pan card', '2014-08-18 16:36:27', '1394441_519791084773775_731869699_n.jpg'),
('ff922', 'mqCIXsDf', 'ff', 'rr', 'frejgrtrfr', 'Male', 'rr', 'r', 2147483647, 'fr', '2014-08-18 17:52:38', '1497011_538332606264286_761953717_n.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE IF NOT EXISTS `brand` (
  `brand_id` int(15) NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(50) NOT NULL,
  PRIMARY KEY (`brand_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_id`, `brand_name`) VALUES
(2, 'Samsung'),
(3, 'Sony'),
(4, 'Micromax'),
(6, 'Spice'),
(7, 'Dell'),
(8, 'Hp'),
(9, 'Nokia'),
(10, 'zolo');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `p_id` int(10) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `quantity` int(10) NOT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--


-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `cat_id` int(15) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(50) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`) VALUES
(3, 'Tablates'),
(4, 'Computer'),
(7, 'Laptop'),
(8, 'Mobile'),
(9, 'Camera'),
(10, 'Bag'),
(11, 'lap cover');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `cus_id` int(20) NOT NULL AUTO_INCREMENT,
  `cust_user_name` varchar(25) NOT NULL,
  `cust_pass_word` varchar(15) NOT NULL,
  `cust_first_name` varchar(25) NOT NULL,
  `cus_last_name` varchar(30) NOT NULL,
  `cust_email` varchar(30) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `cust_resi_address` varchar(200) NOT NULL,
  `cus_par_add` varchar(200) NOT NULL,
  `cust_mobile` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`cus_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cus_id`, `cust_user_name`, `cust_pass_word`, `cust_first_name`, `cus_last_name`, `cust_email`, `gender`, `cust_resi_address`, `cus_par_add`, `cust_mobile`, `date`) VALUES
(10, 'sangesh33', 'Ieqjv1n4', 'sangesh', 'kumar', 'ysangesh@gmail.com', 'Male', 'deoria', 'deoria', 2147483647, '2014-08-13 03:38:17'),
(11, 'ankit', 'WabL8G2q', 'ankit', 'kumar', 'shikhay047@gmail.com', 'Male', 'smvdu', 'smvdu', 0, '2014-08-13 03:38:47');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(20) NOT NULL AUTO_INCREMENT,
  `cat_id` int(15) NOT NULL,
  `brand_id` int(20) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `product_title` varchar(15) NOT NULL,
  `img1` varchar(15) NOT NULL,
  `img2` varchar(16) NOT NULL,
  `img3` varchar(15) NOT NULL,
  `product_price` int(15) NOT NULL,
  `product_desc` text NOT NULL,
  `keyword` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `cat_id`, `brand_id`, `date`, `product_title`, `img1`, `img2`, `img3`, `product_price`, `product_desc`, `keyword`, `status`) VALUES
(2, 7, 0, '2014-08-15 05:05:30', 'Hp Pv5', 'hp_11.jpg', 'hp_10.jpg', 'hp_9.jpg', 40000, 'hp pv5 laptop', 'hp, pv5 , laptop', 'on'),
(3, 7, 0, '2014-08-15 05:08:17', 'Hp Probook', 'hp_8.jpg', 'hp_7.jpg', 'hp_5.jpg', 42000, 'hp probook laptop', 'hp', 'on'),
(4, 7, 0, '2014-08-15 05:10:14', 'Del promo', 'dell_2.jpeg', 'dell_3.jpg', 'dell_4.jpg', 35000, 'dell promo laptop', 'dell laptop', 'on'),
(5, 7, 0, '2014-08-15 05:11:53', 'Dell Axioo', 'dell_5.jpg', 'dell_6.jpg', 'dell_7.jpg', 38000, 'Dell Axioo laptop', 'Dell Axioo lapi', 'on'),
(6, 8, 0, '2014-08-15 16:56:03', 'Micromax H7', 'micro_2.jpg', 'images (52).jpg', '04micro.jpg', 7000, 'micromax H7 mobile', 'mobile,micromax,h7', 'on'),
(8, 8, 0, '2014-08-15 17:00:59', 'Nokia Opera Mob', 'nokia_12.jpg', 'nokia_1.jpg', 'nokia_6.jpg', 12000, 'Nokia Opera Mobile ', 'Nokia Opera Mobile, mobile,nokia', 'on'),
(9, 8, 0, '2014-08-15 17:02:53', 'Nokia ExtraZ', 'nokia_8.jpg', 'nokia_20.jpg', 'nokia_9.jpg', 6000, 'Nokia ExtraZ best nokia mobil', 'Nokia ExtraZ, mobile, nokia,', 'on'),
(10, 8, 0, '2014-08-15 17:04:43', 'Nokia 1200', 'nokia_19.jpg', 'nokia_2.jpg', 'nokia_10.jpg', 3000, 'nokia 1200 best mobile', 'nokia,mobile, nokia 1200', 'on'),
(11, 8, 0, '2014-08-15 17:07:20', 'Nokia 145', 'nokia_17.jpg', 'nokia_18.jpg', 'nokia_5.jpg', 4000, 'Nokia 145 best ever', 'nokia,mobile, nokia 145', 'on'),
(12, 8, 0, '2014-08-15 17:09:22', 'Sumsung Duos', 'msamsung_4.jpg', 'msamsung_8.jpg', 'msamsung_9.jpg', 12000, 'Sumsung Duos best Mobile', 'sumsung, dous,mobile', 'on'),
(13, 8, 0, '2014-08-15 17:10:41', 'Samsung 3410', 'samsung_10.jpg', 'samsung_9.jpg', 'n73.jpg', 7000, 'samsung 3410 ', 'samsung ,3410,mobile', 'on');
