-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2022 at 09:14 AM
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
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(3) NOT NULL,
  `booking_date` date NOT NULL,
  `time_start` time NOT NULL,
  `time_end` time NOT NULL,
  `all_time` int(11) NOT NULL,
  `total` int(5) NOT NULL,
  `divistion_id` int(1) NOT NULL,
  `m_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_thai_520_w2;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `booking_date`, `time_start`, `time_end`, `all_time`, `total`, `divistion_id`, `m_id`) VALUES
(87, '2021-03-12', '19:00:00', '22:00:00', 3, 1500, 1, 107);

-- --------------------------------------------------------

--
-- Table structure for table `divistion`
--

CREATE TABLE `divistion` (
  `divistion_id` int(1) NOT NULL,
  `stadium_name` varchar(20) COLLATE utf8_thai_520_w2 NOT NULL,
  `divistion_number` varchar(10) COLLATE utf8_thai_520_w2 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_thai_520_w2;

--
-- Dumping data for table `divistion`
--

INSERT INTO `divistion` (`divistion_id`, `stadium_name`, `divistion_number`) VALUES
(1, 'สารณะสุข', '1150');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_id` int(3) NOT NULL,
  `emp_firstname` varchar(50) COLLATE utf8_thai_520_w2 NOT NULL,
  `emp_lastname` varchar(50) COLLATE utf8_thai_520_w2 NOT NULL,
  `emp_email` varchar(50) COLLATE utf8_thai_520_w2 NOT NULL,
  `emp_tel` varchar(10) COLLATE utf8_thai_520_w2 NOT NULL,
  `emp_addresss` text COLLATE utf8_thai_520_w2 NOT NULL,
  `emp_username` varchar(20) COLLATE utf8_thai_520_w2 NOT NULL,
  `emp_password` varchar(100) COLLATE utf8_thai_520_w2 NOT NULL,
  `divistion_id` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_thai_520_w2;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `emp_firstname`, `emp_lastname`, `emp_email`, `emp_tel`, `emp_addresss`, `emp_username`, `emp_password`, `divistion_id`) VALUES
(1, 'Thadphong', 'Noidam', '6310210710@email.psu.ac.th', '0805406397', 'Hatyai', 'tiee', 'tiee', 1);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `m_id` int(3) NOT NULL,
  `m_firstname` varchar(50) COLLATE utf8_thai_520_w2 NOT NULL,
  `m_lastname` varchar(50) COLLATE utf8_thai_520_w2 NOT NULL,
  `m_email` varchar(50) COLLATE utf8_thai_520_w2 NOT NULL,
  `m_tel` varchar(10) COLLATE utf8_thai_520_w2 NOT NULL,
  `m_address` text COLLATE utf8_thai_520_w2 NOT NULL,
  `m_password` varchar(100) COLLATE utf8_thai_520_w2 NOT NULL,
  `emp_id` varchar(20) COLLATE utf8_thai_520_w2 NOT NULL,
  `Position_id` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_thai_520_w2;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`m_id`, `m_firstname`, `m_lastname`, `m_email`, `m_tel`, `m_address`, `m_password`, `emp_id`, `Position_id`) VALUES
(116, 'Chantawan', 'Janroonsilp', 'love-za60@hotmail.com', '0980483301', '545156151', '1234', 'tiee', 2);

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `Position_id` int(6) NOT NULL,
  `Position_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`Position_id`, `Position_name`) VALUES
(1, 'พนักงาน'),
(2, 'หัวหน้างาน'),
(3, 'เลขานุการ');

-- --------------------------------------------------------

--
-- Table structure for table `stadium_type`
--

CREATE TABLE `stadium_type` (
  `type_id` int(1) NOT NULL,
  `type_st_name` varchar(20) COLLATE utf8_thai_520_w2 NOT NULL,
  `type_price` int(5) NOT NULL,
  `min_person` int(2) NOT NULL,
  `max_person` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_thai_520_w2;

--
-- Dumping data for table `stadium_type`
--

INSERT INTO `stadium_type` (`type_id`, `type_st_name`, `type_price`, `min_person`, `max_person`) VALUES
(1, 'เบอร์โทรศัพท์กอง', 300, 6, 12);

-- --------------------------------------------------------

--
-- Table structure for table `uploadfile`
--

CREATE TABLE `uploadfile` (
  `fileID` int(5) NOT NULL,
  `fileupload` varchar(200) CHARACTER SET utf8 NOT NULL,
  `dateup` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uploadfile`
--

INSERT INTO `uploadfile` (`fileID`, `fileupload`, `dateup`) VALUES
(5, '202201101689825035.pdf', '2022-01-10 08:28:06'),
(6, '202201131354647382.pdf', '2022-01-13 08:14:14'),
(7, '202201191841917085.pdf', '2022-01-19 03:53:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `divistion`
--
ALTER TABLE `divistion`
  ADD PRIMARY KEY (`divistion_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`Position_id`);

--
-- Indexes for table `stadium_type`
--
ALTER TABLE `stadium_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `uploadfile`
--
ALTER TABLE `uploadfile`
  ADD PRIMARY KEY (`fileID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `divistion`
--
ALTER TABLE `divistion`
  MODIFY `divistion_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `emp_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `m_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `stadium_type`
--
ALTER TABLE `stadium_type`
  MODIFY `type_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `uploadfile`
--
ALTER TABLE `uploadfile`
  MODIFY `fileID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
