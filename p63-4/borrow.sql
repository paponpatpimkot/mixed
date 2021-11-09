-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2021 at 05:00 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `borrow`
--

-- --------------------------------------------------------

--
-- Table structure for table `approver`
--

CREATE TABLE `approver` (
  `Borrow_id` int(5) NOT NULL,
  `User_id` varchar(15) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `borrow`
--

CREATE TABLE `borrow` (
  `Borrow_id` int(5) NOT NULL,
  `User_id` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `Datetime_borrow` datetime NOT NULL,
  `Purpose` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Jobcard_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `borrowdetail`
--

CREATE TABLE `borrowdetail` (
  `Borrow_id` int(5) NOT NULL,
  `Barcode` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `Brand_id` varchar(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Brand_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`Brand_id`, `Brand_name`) VALUES
('B01', 'UNIOR LS'),
('B02', 'BLUEPOINT'),
('B03', 'HOBAYASHI'),
('B04', 'IMAX'),
('B05', 'MAKITA'),
('B06', 'BOSCH'),
('B07', 'META'),
('B08', 'STANLEY'),
('B09', 'Wichitech industries inc.'),
('B10', 'MFG'),
('B11', 'ETC'),
('B12', 'PITTSBURGH Automotive'),
('B13', 'MITO'),
('B14', 'Professional Portable Stand Alone'),
('B15', 'Olympus'),
('B16', 'hummer'),
('B17', 'Mitutoyo'),
('B18', 'HACHI'),
('B19', 'Sanwa'),
('B20', 'FLUKE'),
('B21', 'PROTO'),
('B22', 'FORCE'),
('B23', 'SNAPON'),
('B24', 'AFB'),
('B25', 'Kennedy'),
('B26', 'CRAB'),
('B27', 'MASADA'),
('B28', 'JACK'),
('B29', 'JADEVER'),
('B30', '3M'),
('B31', 'SAFE-FLEX'),
('B32', 'MALIN CO.'),
('B33', 'Aerospace');

-- --------------------------------------------------------

--
-- Table structure for table `device`
--

CREATE TABLE `device` (
  `Device_id` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `Device_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Type_id` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `Location_ID` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `Brand_id` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `QTY` int(3) NOT NULL,
  `Picture` varbinary(999) DEFAULT NULL,
  `Description` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `Mechanical_inf` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `Electrical_inf` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `device`
--

INSERT INTO `device` (`Device_id`, `Device_name`, `Type_id`, `Location_ID`, `Brand_id`, `QTY`, `Picture`, `Description`, `Mechanical_inf`, `Electrical_inf`) VALUES
('CMT0023', 'Chrome-Vanadium type in 1/4', 'T01', 'ST-AMT-SB', 'B01', 1, '', 'น๊อต', 'น๊อตๆ', 'น๊อตๆๆ');

-- --------------------------------------------------------

--
-- Table structure for table `deviceitem`
--

CREATE TABLE `deviceitem` (
  `Barcode` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Device_id` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `Date_in` datetime NOT NULL,
  `Status_item` int(1) NOT NULL,
  `Status_return` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE `document` (
  `Document_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Document_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `document`
--

INSERT INTO `document` (`Document_id`, `Document_name`) VALUES
('FR-QA-MM-06-M-01', 'Register Form'),
('FR-QA-MM-06-M-02', 'Repair Report'),
('FR-QA-MM-06-M-03', 'Information'),
('FR-QA-MM-06-TDV-01', 'Borrow-Return'),
('FR-QA-MM-06-TDV-02', 'Collection letter'),
('FR-QA-MM-06-TDV-05', 'Consumable control list');

-- --------------------------------------------------------

--
-- Table structure for table `jobcard`
--

CREATE TABLE `jobcard` (
  `Jobcard_id` int(10) NOT NULL,
  `Jobcard_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `Location_ID` varchar(15) NOT NULL,
  `Location_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`Location_ID`, `Location_name`) VALUES
('ST-AMT-SB', NULL),
('AMT-ST-A-A1-001', NULL),
('AMT-ST-A-A1-002', NULL),
('AMT-ST-A-A1-003', NULL),
('AMT-ST-A-A1-004', NULL),
('AMT-ST-G-G3-001', NULL),
('AMT-ST-G-G3-002', NULL),
('AMT-ST-G-G3-003', NULL),
('AMT-ST-G-G3-004', NULL),
('AMT-ST-G-G3-005', NULL),
('AMT-ST-G-G3-006', NULL),
('AMT-ST-G-G3-007', NULL),
('AMT-ST-G-G3-008', NULL),
('AMT-ST-G-G3-009', NULL),
('AMT-ST-G-G3-010', NULL),
('AMT-ST-G-G2-001', NULL),
('AMT-ST-G-G2-002', NULL),
('AMT-ST-C-C3-003', NULL),
('AMT-ST-C-C3-005', NULL),
('AMT-ST-F-F3-002', NULL),
('AMT-ST-F-F3-003', NULL),
('AMT-ST-C-C2-005', NULL),
('AMT-ST-C-C3-002', NULL),
('AMT-ST-C-C3-001', NULL),
('AMT-ST-C-C3-004', NULL),
('AMT-ST-F-F3-001', NULL),
('AMT-ST-F-F4-005', NULL),
('AMT-ST-F-F4-005', NULL),
('AMT-ST-F-F4-006', NULL),
('AMT-ST-F-F4-007', NULL),
('AMT-ST-F-F4-008', NULL),
('AMT-ST-F-F4-003', NULL),
('AMT-ST-F-F4-004', NULL),
('AMT-ST-C-C3-006', NULL),
('AMT-ST-F-F4-001', NULL),
('AMT-ST-F-F4-002', NULL),
('AMT-ST-F-F2-003', NULL),
('AMT-ST-F-F2-001', NULL),
('AMT-ST-F-F2-001', NULL),
('AMT-ST-F-F2-002', NULL),
('AMT-ST-F-F1-001', NULL),
('AMT-ST-B-B3-005', NULL),
('AMT-ST-B-B3-003', NULL),
('AMT-ST-B-B3-004', NULL),
('AMT-ST-B-B3-002', NULL),
('AMT-ST-B-B3-001', NULL),
('AMT-ST-B-B2-002', NULL),
('AMT-ST-B-B2-001', NULL),
('AMT-ST-B-B2-003', NULL),
('AMT-ST-B-B1-001', NULL),
('AMT-ST', NULL),
('ST-AMT-B-C2-005', NULL),
('AMT-ST-D-D3-003', NULL),
('AMT-ST-D-D3-004', NULL),
('AMT-ST-D-D3-001', NULL),
('AMT-ST-D-D2-002', NULL),
('AMT-ST-D-D1-001', NULL),
('AMT-ST-D-D2-003', NULL),
('AMT-ST-D-D2-004', NULL),
('AMT-ST-D-D2-001', NULL),
('AMT-ST-D-D2-005', NULL),
('AMT-ST-E-E2-009', NULL),
('AMT-ST-D-D1-003', NULL),
('AMT-ST-D-D1-004', NULL),
('AMT-ST-F-F3-001', NULL),
('AMT-ST-D-D3-002', NULL),
('AMT-ST-E-E3-001', NULL),
('AMT-ST-E-E3-002', NULL),
('AMT-ST-E-E3-003', NULL),
('AMT-ST-E-E3-004', NULL),
('AMT-ST-E-E3-005', NULL),
('AMT-ST-E-E3-006', NULL),
('AMT-ST-E-E3-007', NULL),
('AMT-ST-E-E3-011', NULL),
('AMT-ST-E-E3-012', NULL),
('AMT-ST-E-E3-008', NULL),
('AMT-ST-E-E3-009', NULL),
('AMT-ST-E-E3-010', NULL),
('AMT-ST-E-E3-010', NULL),
('AMT-ST-E-E2-001', NULL),
('AMT-ST-E-E2-002', NULL),
('AMT-ST-E-E2-003', NULL),
('AMT-ST-E-E2-004', NULL),
('AMT-ST-E-E2-005', NULL),
('AMT-ST-E-E2-006', NULL),
('AMT-ST-E-E2-007', NULL),
('AMT-ST-E-E2-008', NULL),
('AMT-ST-E-E1-001', NULL),
('AMT-ST-E-E1-002', NULL),
('AMT-ST-C-E1-003', NULL),
('AMT-ST-E-C1-001', NULL),
('AMT-ST-C-C1-004', NULL),
('AMT-ST-C-C1-003', NULL),
('AMT-ST-C-C1-002', NULL),
('AMT-ST-C-C2-001', NULL),
('AMT-ST-C-C2-002', NULL),
('AMT-ST-C-C2-003', NULL),
('AMT-ST-C-C2-004', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE `permission` (
  `Permission_id` int(2) NOT NULL,
  `Permission_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `permission`
--

INSERT INTO `permission` (`Permission_id`, `Permission_name`) VALUES
(1, 'Admin'),
(2, 'Staff'),
(3, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `purpose`
--

CREATE TABLE `purpose` (
  `PurID` varchar(5) NOT NULL,
  `PurName` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purpose`
--

INSERT INTO `purpose` (`PurID`, `PurName`) VALUES
('P01', 'For study'),
('P02', 'For other');

-- --------------------------------------------------------

--
-- Table structure for table `repair`
--

CREATE TABLE `repair` (
  `Repair_id` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `Tagging_code` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `Repair_date` datetime NOT NULL,
  `Repair_location` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Price` int(7) NOT NULL,
  `User_id` varchar(15) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `return`
--

CREATE TABLE `return` (
  `Return_id` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `Borrow_id` int(5) NOT NULL,
  `Datetime_return` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tooltype`
--

CREATE TABLE `tooltype` (
  `ToolType_id` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `ToolType_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tooltype`
--

INSERT INTO `tooltype` (`ToolType_id`, `ToolType_name`) VALUES
('T0001', 'Common Tools'),
('T0002', 'Lubrication Tools'),
('T0003', 'Precision Tools'),
('T0004', 'Measuring Tools'),
('T0005', 'Special Tools');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `Type_id` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `Type_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ToolType_id` varchar(5) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`Type_id`, `Type_name`, `ToolType_id`) VALUES
('C01', 'Consumable', ''),
('E01', 'Equipment', ''),
('T01', 'Tools', 'T0001'),
('T02', 'Tools', 'T0002'),
('T03', 'Tools', 'T0003'),
('T04', 'Tools', 'T0004'),
('T05', 'Tools', 'T0005');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `User_id` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `Username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Surname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Telephone` int(10) NOT NULL,
  `UserType_id` int(3) NOT NULL,
  `Permission_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User_id`, `Username`, `Password`, `Name`, `Surname`, `Telephone`, `UserType_id`, `Permission_id`) VALUES
('623901001x', 'staff', '123456', 'ppomn', 'ppju', 1234567890, 2, 2),
('admin', 'admin', '1234', 'pphp', 'pap', 123456789, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

CREATE TABLE `usertype` (
  `UserType_id` int(2) NOT NULL,
  `UserType_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `usertype`
--

INSERT INTO `usertype` (`UserType_id`, `UserType_name`) VALUES
(1, 'Teacher'),
(2, 'Student'),
(3, 'Expert'),
(9, 'werwqdada');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `approver`
--
ALTER TABLE `approver`
  ADD PRIMARY KEY (`Borrow_id`);

--
-- Indexes for table `borrow`
--
ALTER TABLE `borrow`
  ADD PRIMARY KEY (`Borrow_id`);

--
-- Indexes for table `borrowdetail`
--
ALTER TABLE `borrowdetail`
  ADD PRIMARY KEY (`Borrow_id`,`Barcode`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`Brand_id`);

--
-- Indexes for table `device`
--
ALTER TABLE `device`
  ADD PRIMARY KEY (`Device_id`);

--
-- Indexes for table `deviceitem`
--
ALTER TABLE `deviceitem`
  ADD PRIMARY KEY (`Barcode`,`Device_id`);

--
-- Indexes for table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`Document_id`);

--
-- Indexes for table `jobcard`
--
ALTER TABLE `jobcard`
  ADD PRIMARY KEY (`Jobcard_id`);

--
-- Indexes for table `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`Permission_id`);

--
-- Indexes for table `purpose`
--
ALTER TABLE `purpose`
  ADD PRIMARY KEY (`PurID`);

--
-- Indexes for table `repair`
--
ALTER TABLE `repair`
  ADD PRIMARY KEY (`Repair_id`);

--
-- Indexes for table `return`
--
ALTER TABLE `return`
  ADD PRIMARY KEY (`Return_id`);

--
-- Indexes for table `tooltype`
--
ALTER TABLE `tooltype`
  ADD PRIMARY KEY (`ToolType_id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`Type_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`User_id`);

--
-- Indexes for table `usertype`
--
ALTER TABLE `usertype`
  ADD PRIMARY KEY (`UserType_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `usertype`
--
ALTER TABLE `usertype`
  MODIFY `UserType_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
