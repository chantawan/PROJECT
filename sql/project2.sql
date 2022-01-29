-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2022 at 09:02 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project2`
--

-- --------------------------------------------------------

--
-- Table structure for table `board`
--

CREATE TABLE `board` (
  `board_id` int(10) NOT NULL,
  `board_name` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `divistion`
--

CREATE TABLE `divistion` (
  `divistion_id` int(2) NOT NULL,
  `divistion_name` varchar(20) COLLATE utf8_thai_520_w2 NOT NULL,
  `divistion_number` varchar(10) COLLATE utf8_thai_520_w2 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_thai_520_w2;

--
-- Dumping data for table `divistion`
--

INSERT INTO `divistion` (`divistion_id`, `divistion_name`, `divistion_number`) VALUES
(1, 'กองร้อย', '15115'),
(2, 'กองร้อย2', '80880'),
(38, 'กองอำนวยการ', '25252');

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE `document` (
  `document_id` int(50) NOT NULL,
  `document_name` varchar(50) NOT NULL,
  `document_type` int(1) NOT NULL,
  `document_detail` varchar(50) NOT NULL,
  `emp_id` int(3) NOT NULL,
  `divistion_id` int(2) NOT NULL,
  `documenttype_id` int(1) NOT NULL,
  `documentstatus_id` int(1) NOT NULL,
  `fileupload` longtext NOT NULL,
  `document_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `document`
--

INSERT INTO `document` (`document_id`, `document_name`, `document_type`, `document_detail`, `emp_id`, `divistion_id`, `documenttype_id`, `documentstatus_id`, `fileupload`, `document_date`) VALUES
(0, '', 0, '', 0, 0, 0, 0, 'P20-Presentation.pdf', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `documenttype`
--

CREATE TABLE `documenttype` (
  `documenttype_id` int(2) NOT NULL,
  `documenttype_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `document_status`
--

CREATE TABLE `document_status` (
  `documentstatus_id` int(2) NOT NULL,
  `documentstatus_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_id` int(3) NOT NULL,
  `emp_firstname` varchar(50) COLLATE utf8_thai_520_w2 NOT NULL,
  `emp_lastname` varchar(50) COLLATE utf8_thai_520_w2 NOT NULL,
  `emp_cardid` varchar(50) COLLATE utf8_thai_520_w2 NOT NULL,
  `emp_email` varchar(50) COLLATE utf8_thai_520_w2 NOT NULL,
  `emp_tel` varchar(10) COLLATE utf8_thai_520_w2 NOT NULL,
  `emp_password` varchar(100) COLLATE utf8_thai_520_w2 NOT NULL,
  `divistion_id` int(2) NOT NULL,
  `Position_id` int(6) NOT NULL,
  `gender_id` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_thai_520_w2;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `emp_firstname`, `emp_lastname`, `emp_cardid`, `emp_email`, `emp_tel`, `emp_password`, `divistion_id`, `Position_id`, `gender_id`) VALUES
(1, 'chantawan2', 'jamroonsilp', '1969800222655', 'love-za60@hgotmail.com', '0980483301', '1234', 2, 2, 1),
(2, 'chantawan1', 'jamroonsilp', '1969800222658', 'love-za68@hgotmail.com', '0980483301', '1234', 2, 1, 1),
(3, 'chantawan3', 'jamroonsilp', '1969800222652', 'love-za69@hgotmail.com', '0920483301', '1234', 2, 3, 1),
(8, 'chantawan', 'jamroonsilp', '1969800222651', 'asdasd@hgotmail.com', '0980483302', '1234', 2, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE `gender` (
  `gender_id` int(1) NOT NULL,
  `gender_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`gender_id`, `gender_name`) VALUES
(1, 'ชาย'),
(2, 'หญิง');

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `Position_id` int(6) NOT NULL,
  `Position_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`Position_id`, `Position_name`) VALUES
(1, 'พนักงาน'),
(2, 'หัวหน้างาน'),
(3, 'เลขานุการ'),
(4, 'ผู้ดูแล(หน่วยสารบัญกลาง)');

-- --------------------------------------------------------

--
-- Table structure for table `speedclass`
--

CREATE TABLE `speedclass` (
  `speedclass_id` int(2) NOT NULL,
  `speedclass_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `board`
--
ALTER TABLE `board`
  ADD PRIMARY KEY (`board_id`);

--
-- Indexes for table `divistion`
--
ALTER TABLE `divistion`
  ADD PRIMARY KEY (`divistion_id`);

--
-- Indexes for table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`document_id`);

--
-- Indexes for table `documenttype`
--
ALTER TABLE `documenttype`
  ADD PRIMARY KEY (`documenttype_id`);

--
-- Indexes for table `document_status`
--
ALTER TABLE `document_status`
  ADD PRIMARY KEY (`documentstatus_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`gender_id`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`Position_id`);

--
-- Indexes for table `speedclass`
--
ALTER TABLE `speedclass`
  ADD PRIMARY KEY (`speedclass_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `board`
--
ALTER TABLE `board`
  MODIFY `board_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `divistion`
--
ALTER TABLE `divistion`
  MODIFY `divistion_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `emp_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
