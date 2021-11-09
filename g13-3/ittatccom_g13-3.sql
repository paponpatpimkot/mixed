-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 13, 2017 at 09:35 PM
-- Server version: 5.5.28
-- PHP Version: 5.4.41

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ittatccom_g13-3`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `cate_id` int(3) NOT NULL AUTO_INCREMENT,
  `cate_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`cate_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=16 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cate_id`, `cate_name`) VALUES
(1, 'PRINTER'),
(2, 'MAINBOARD'),
(3, 'MOUSE'),
(4, 'KEYBOARD'),
(5, 'HEADSET'),
(6, 'SSD'),
(7, 'RAM'),
(8, 'VGA'),
(9, 'CASE'),
(10, 'POWER SUPPLY'),
(11, 'DVD-RW'),
(14, 'casess'),
(13, 'HDD');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `emp_id` int(5) NOT NULL AUTO_INCREMENT,
  `emp_fname` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `emp_lname` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `emp_tel` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `emp_position` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `emp_user` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `emp_pass` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `emp_status` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`emp_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=16 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `emp_fname`, `emp_lname`, `emp_tel`, `emp_position`, `emp_user`, `emp_pass`, `emp_status`) VALUES
(1, 'พรหมวิวัฒน์', 'ปรีชล', '0827692392', 'ผู้จัดการ', 'manager', 'manager', 'ใช้งาน'),
(2, 'ชิณพัฒน์', 'ศุภวิชญ์', '0989876789', 'พนักงานขาย', 'sell', 'sell', 'ใช้งาน'),
(3, 'ชญานิน', 'เรืองเดช', '0181181188', 'พนักงานสต๊อค', 'stock', 'stock', 'ใช้งาน'),
(8, 'ทอรุ้ง', 'เอี่ยมทศ', '', 'พนักงานขาย', 'torroong', '1234', 'ยกเลิก'),
(9, 'กัญญา', 'ทิพย์นาค', '0918767898', 'พนักงานขาย', 'kanya', '1234', 'ใช้งาน'),
(10, 'กรรณสูตร', 'ด้วงกูล', '', 'ผู้จัดการ', 'kannasut', '1234', 'ยกเลิก'),
(11, 'นยสิทธิ์', 'สีสด', '0817143131', 'พนักงานสต๊อค', 'nayasit', '1234', 'ใช้งาน'),
(12, 'สุดารัตน์', 'วรรณศิลป์', '0827692392', 'ผู้จัดการ', 'sudarat', '1234', 'ใช้งาน'),
(13, 'สุรัตน์', 'พิชญ์พิเชฐญ์', '0962662222', 'ผู้จัดการ', 'surat', '1234', 'ยกเลิก'),
(14, 'เอกราช', 'เก่งทุกทาง', '', 'พนักงานสต๊อค', 'user01', 'ๅ/-ภ', 'ยกเลิก'),
(15, 'ชัยธวัช', 'ทรงกรานต์', '', 'พนักงานขาย', 'sell01', '1234', 'ใช้งาน');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE IF NOT EXISTS `inventory` (
  `inv_id` int(10) NOT NULL AUTO_INCREMENT,
  `inv_no` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `emp_id` int(5) NOT NULL,
  `inv_from` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `inv_total` double NOT NULL,
  `inv_note` text COLLATE utf8_unicode_ci NOT NULL,
  `inv_date` date NOT NULL,
  PRIMARY KEY (`inv_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`inv_id`, `inv_no`, `emp_id`, `inv_from`, `inv_total`, `inv_note`, `inv_date`) VALUES
(6, 'tatc1', 1, 'tatc', 0, '', '2017-03-06'),
(7, 'tatc2', 1, 'tatc', 0, '', '2017-03-06'),
(10, '10910887611', 1, 'Lotus', 146800, '', '2017-03-10');

-- --------------------------------------------------------

--
-- Table structure for table `inventory_list`
--

CREATE TABLE IF NOT EXISTS `inventory_list` (
  `inv_id` int(10) NOT NULL,
  `pro_id` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `inv_price` double NOT NULL,
  `inv_num` int(10) NOT NULL,
  `inv_total` double NOT NULL,
  PRIMARY KEY (`inv_id`,`pro_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `inventory_list`
--

INSERT INTO `inventory_list` (`inv_id`, `pro_id`, `inv_price`, `inv_num`, `inv_total`) VALUES
(10, '1', 5290, 10, 52900),
(10, '10', 9390, 10, 93900);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `pro_id` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `pro_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `pro_price` double NOT NULL,
  `pro_buy` double NOT NULL,
  `pro_stock` int(10) NOT NULL,
  `pro_stock_min` int(10) NOT NULL,
  `cate_id` int(3) NOT NULL,
  `unit_id` int(3) NOT NULL,
  `pro_status` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`pro_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pro_id`, `pro_name`, `pro_price`, `pro_buy`, `pro_stock`, `pro_stock_min`, `cate_id`, `unit_id`, `pro_status`) VALUES
('1', 'PRINTER EPSON M100', 5290, 3445, 40, 0, 1, 2, 'ใช้งาน'),
('CPU-0000010', 'MAINBOARD 1151 ASROCK H11', 1990, 1790, 30, 0, 2, 1, 'ใช้งาน'),
('CPU-0000001', 'MAINBOARD 1151 ASROCK H17', 3950, 3800, 30, 0, 2, 1, 'ใช้งาน'),
('CPU-00100100', 'MAINBOARD 1151 ASROCK Z17', 6590, 6000, 30, 0, 2, 1, 'ใช้งาน'),
('CPU-00000100', 'MAINBOARD 1150 ASUS MAXIM', 10200, 9820, 30, 0, 2, 1, 'ใช้งาน'),
('CPU-0000011', 'MAINBOARD 1151 Z170 S SAB', 9150, 8850, 30, 0, 2, 1, 'ใช้งาน'),
('CPU-00000000', 'MAINBOARD 1151 GIGABYTE H', 3850, 3520, 30, 0, 2, 1, 'ใช้งาน'),
('8', 'MAINBOARD 1151 GIGABYTE Z', 6290, 5950, 30, 0, 2, 1, 'ใช้งาน'),
('9', 'MAINBOARD 1151 GIGABYTE Z', 8550, 8150, 30, 0, 2, 1, 'ใช้งาน'),
('10', 'MAINBOARD 1151 MSI Z170A ', 9790, 9390, 40, 0, 2, 1, 'ใช้งาน'),
('11', 'MOUSE PAD ASUS ROG SHEATH', 1220, 890, 30, 0, 3, 1, 'ใช้งาน'),
('12', 'KEYBOARD CORSAIR STRAFE B', 4190, 3890, 30, 0, 4, 1, 'ใช้งาน'),
('13', 'KEYBOARD SIGNO GAMING MAC', 690, 590, 30, 0, 4, 1, 'ใช้งาน'),
('14', 'KEYBOARD SIGNO GAMING SEM', 890, 790, 30, 0, 4, 1, 'ใช้งาน'),
('15', 'KEYBOARD MSI GK-701 BROWN', 3990, 3790, 30, 0, 4, 1, 'ใช้งาน'),
('16', 'KEYBOARD CORSAIR K70 RGB ', 6490, 6090, 30, 0, 4, 1, 'ใช้งาน'),
('17', 'KEYBOARD CORSAIR K70 RGB ', 6290, 5890, 30, 0, 4, 1, 'ใช้งาน'),
('18', 'MOUSE STEELSERIES RIVAL 1', 1350, 1150, 30, 0, 3, 1, 'ใช้งาน'),
('19', 'MOUSE ASUS ROG GLADIUS', 1990, 1890, 30, 0, 3, 1, 'ใช้งาน'),
('20', 'MOUSE CORSAIR KATAR OPTIC', 1490, 1360, 30, 0, 3, 1, 'ใช้งาน'),
('21', 'MOUSE CORSAIR M65 RGB PRO', 2750, 2690, 30, 0, 3, 1, 'ใช้งาน'),
('22', 'MOUSE NEOLUTION E-SPORT C', 650, 590, 30, 0, 3, 1, 'ใช้งาน'),
('23', 'MOUSE NEOLUTION E-SPORT A', 240, 200, 30, 0, 3, 1, 'ใช้งาน'),
('24', 'MOUSE STEELSERIES RIVAL 9', 990, 950, 30, 0, 3, 1, 'ใช้งาน'),
('25', 'HEADSET OZONE EKHO H80 PR', 3950, 3690, 30, 0, 5, 1, 'ใช้งาน'),
('26', 'HEADSET ASUS STRIX 7.1', 6990, 6790, 30, 0, 5, 1, 'ใช้งาน'),
('27', 'HEADSET CORSAIR VOID SURR', 3390, 3000, 30, 0, 5, 1, 'ใช้งาน'),
('28', 'HEADSET RAZER MANO WAR WI', 6990, 6790, 30, 0, 5, 1, 'ใช้งาน'),
('29', 'HEADSET STEELSERIES SIBER', 3390, 3000, 30, 0, 5, 1, 'ใช้งาน'),
('30', 'HEADSET STEELSERIES SIBER', 4200, 3890, 30, 0, 5, 1, 'ใช้งาน'),
('RAM-10100100', '4 GB RAM PC DDR4/2400 COR', 1190, 980, 30, 0, 7, 1, 'ใช้งาน'),
('RAM-10100101', '8 GB RAM PC DDR4/2400 COR', 2140, 1990, 30, 0, 7, 1, 'ใช้งาน'),
('RAM-10100000', '16 GB RAM PC DDR4/2400 G.', 4490, 4290, 30, 0, 7, 1, 'ใช้งาน'),
('RAM-11100001', '16 GB RAM PC DDR3/1600 G.', 4120, 3900, 30, 0, 7, 1, 'ใช้งาน'),
('35', '16 GB RAM PC DDR3/1600 CO', 3890, 3690, 30, 0, 7, 1, 'ใช้งาน'),
('36', '16 GB RAM PC DDR3/1600 TE', 3190, 2990, 30, 0, 7, 1, 'ใช้งาน'),
('37', '8 GB RAM PC DDR3/1600 KIN', 4150, 3950, 30, 0, 7, 1, 'ใช้งาน'),
('38', '250 GB SSD SAMSUNG 850 EV', 3750, 3570, 30, 0, 6, 1, 'ใช้งาน'),
('39', '120 GB SSD INTEL 540 SERI', 1969, 1790, 30, 0, 6, 1, 'ใช้งาน'),
('40', '240 GB SSD ADATA XPG SX93', 4090, 3890, 30, 0, 6, 1, 'ใช้งาน'),
('41', '240 GB SSD KINGSTON HYPER', 3150, 3090, 30, 0, 6, 1, 'ใช้งาน'),
('42', '2.0 TB HDD WD SATA-3 64 M', 4590, 4460, 30, 0, 13, 1, 'ใช้งาน'),
('43', '500 GB HDD SEAGATE SATA-I', 1550, 1390, 30, 0, 13, 1, 'ใช้งาน'),
('44', 'DVD-RW ASUS 24D5MT/BLK/G/', 490, 450, 30, 0, 11, 1, 'ใช้งาน'),
('MONITOR-01100001', 'VGA GALAX GTX970 EXOC BLA', 8900, 8600, 30, 40, 8, 1, 'ใช้งาน'),
('MONITOR-11101011', 'VGA MSI GTX970 GAMING 4G ', 8900, 8600, 30, 0, 8, 1, 'ใช้งาน'),
('MONITOR-01100011', 'VGA GIGABYTE GTX1070 G1 G', 16900, 15800, 30, 0, 8, 1, 'ใช้งาน'),
('MONITOR-01101011', 'VGA GIGABYTE GTX1060 OC 3', 7990, 7590, 30, 0, 8, 1, 'ใช้งาน'),
('MONITOR-11101010', 'CASE THERMALTAKE SUPPRESS', 4950, 4590, 30, 0, 9, 1, 'ใช้งาน'),
('A5', 'MAINBOARD 1150 ASUS MAXIM', 10200, 0, 29, 0, 2, 1, 'ใช้งาน'),
('A3', 'MAINBOARD 1151 ASROCK H17', 3950, 0, 28, 0, 2, 1, 'ใช้งาน'),
('A4', 'MAINBOARD 1151 ASROCK Z17', 6590, 0, 28, 0, 2, 1, 'ใช้งาน'),
('A11', 'MOUSE PAD ASUS ROG SHEATH', 1220, 0, 30, 0, 3, 1, 'ใช้งาน'),
('A10', 'MAINBOARD 1151 MSI Z170A ', 9790, 0, 30, 0, 2, 1, 'ใช้งาน'),
('A9', 'MAINBOARD 1151 GIGABYTE Z', 8550, 0, 30, 0, 2, 1, 'ใช้งาน'),
('A8', 'MAINBOARD 1151 GIGABYTE Z', 6290, 0, 30, 0, 2, 1, 'ใช้งาน'),
('A7', 'MAINBOARD 1151 GIGABYTE H', 3850, 0, 30, 0, 2, 1, 'ใช้งาน'),
('A6', 'MAINBOARD 1151 Z170 S SAB', 9150, 0, 29, 0, 2, 1, 'ใช้งาน'),
('A2', 'MAINBOARD 1151 ASROCK H11', 1990, 0, 30, 0, 2, 1, 'ใช้งาน'),
('A1', 'PRINTER EPSON M100', 5290, 0, 28, 0, 1, 1, 'ใช้งาน'),
('', '', 0, 0, 0, 0, 0, 0, 'ใช้งาน'),
('Q001', '', 1200, 0, 10, 0, 1, 1, 'ใช้งาน'),
('Q002', '', 1200, 0, 10, 0, 1, 1, 'ใช้งาน');

-- --------------------------------------------------------

--
-- Table structure for table `selling`
--

CREATE TABLE IF NOT EXISTS `selling` (
  `sell_id` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `emp_id` int(5) NOT NULL,
  `sell_total` double NOT NULL,
  `sell_dis` double NOT NULL,
  `sell_cash` double NOT NULL,
  `sell_date` date NOT NULL,
  PRIMARY KEY (`sell_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=22 ;

--
-- Dumping data for table `selling`
--

INSERT INTO `selling` (`sell_id`, `emp_id`, `sell_total`, `sell_dis`, `sell_cash`, `sell_date`) VALUES
(0000000017, 1, 5290, 0, 6000, '2017-02-09'),
(0000000016, 2, 4950, 0, 5000, '2017-02-08'),
(0000000018, 1, 6590, 0, 7000, '2017-03-06'),
(0000000019, 2, 6590, 90, 7000, '2017-03-06'),
(0000000020, 2, 19350, 350, 20000, '2017-03-06'),
(0000000021, 9, 18480, 80, 18400, '2017-03-06');

-- --------------------------------------------------------

--
-- Table structure for table `selling_list`
--

CREATE TABLE IF NOT EXISTS `selling_list` (
  `sell_id` int(10) NOT NULL,
  `pro_id` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `sell_price` double NOT NULL,
  `sell_num` int(10) NOT NULL,
  `sell_total` double NOT NULL,
  PRIMARY KEY (`sell_id`,`pro_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `selling_list`
--

INSERT INTO `selling_list` (`sell_id`, `pro_id`, `sell_price`, `sell_num`, `sell_total`) VALUES
(16, 'MONITOR-11101010', 4950, 1, 4950),
(17, '1', 5290, 1, 5290),
(18, 'A4', 6590, 1, 6590),
(19, 'A4', 6590, 1, 6590),
(20, 'A5', 10200, 1, 10200),
(20, 'A6', 9150, 1, 9150),
(21, 'A1', 5290, 2, 10580),
(21, 'A3', 3950, 2, 7900);

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE IF NOT EXISTS `unit` (
  `unit_id` int(3) NOT NULL AUTO_INCREMENT,
  `unit_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`unit_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`unit_id`, `unit_name`) VALUES
(1, 'ชิ้น'),
(2, 'เครื่อง'),
(3, 'อัน'),
(4, 'ชช'),
(5, 'ชชฟ');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
