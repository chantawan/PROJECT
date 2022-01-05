-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2022 at 10:54 AM
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
  `stadium_id` int(1) NOT NULL,
  `m_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_thai_520_w2;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `booking_date`, `time_start`, `time_end`, `all_time`, `total`, `stadium_id`, `m_id`) VALUES
(87, '2021-03-12', '19:00:00', '22:00:00', 3, 1500, 1, 107);

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
  `emp_password` varchar(100) COLLATE utf8_thai_520_w2 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_thai_520_w2;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `emp_firstname`, `emp_lastname`, `emp_email`, `emp_tel`, `emp_addresss`, `emp_username`, `emp_password`) VALUES
(1, 'Chanwit', 'Jitsuwan', 'kroekchanwitz@gmail.com', '0950420007', '341 Nipatsongkroe 5', 'kazper', 'kazper');

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
  `m_username` varchar(20) COLLATE utf8_thai_520_w2 NOT NULL,
  `m_password` varchar(100) COLLATE utf8_thai_520_w2 NOT NULL,
  `coin` int(5) NOT NULL DEFAULT 0,
  `emp_id` varchar(20) COLLATE utf8_thai_520_w2 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_thai_520_w2;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`m_id`, `m_firstname`, `m_lastname`, `m_email`, `m_tel`, `m_address`, `m_username`, `m_password`, `coin`, `emp_id`) VALUES
(107, 'asdasd', 'asdasdas', 'dasdasd@asdasd.com', '0950420007', 'asdasdasd', 'kroek', 'kroek', 9589, 'self');

-- --------------------------------------------------------

--
-- Table structure for table `stadium`
--

CREATE TABLE `stadium` (
  `stadium_id` int(1) NOT NULL,
  `stadium_name` varchar(20) COLLATE utf8_thai_520_w2 NOT NULL,
  `divistion_number` varchar(10) COLLATE utf8_thai_520_w2 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_thai_520_w2;

--
-- Dumping data for table `stadium`
--

INSERT INTO `stadium` (`stadium_id`, `stadium_name`, `divistion_number`) VALUES
(1, 'กองอำนวยการ', '0631699280');

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
(1, 'สนามเล็ก', 300, 6, 12),
(2, 'สนามใหญ่', 500, 10, 16);

-- --------------------------------------------------------

--
-- Table structure for table `topup`
--

CREATE TABLE `topup` (
  `topup_id` int(3) NOT NULL,
  `topup_amount` int(5) NOT NULL,
  `topup_date` date NOT NULL,
  `topup_time` time NOT NULL,
  `m_id` int(3) NOT NULL,
  `emp_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_thai_520_w2;

--
-- Dumping data for table `topup`
--

INSERT INTO `topup` (`topup_id`, `topup_amount`, `topup_date`, `topup_time`, `m_id`, `emp_id`) VALUES
(95, 500, '2021-03-12', '12:24:46', 88, 1),
(96, 777, '2021-03-12', '12:27:37', 94, 1),
(97, 5555, '2021-03-12', '00:00:00', 94, 1),
(98, 5555, '2021-03-12', '00:00:00', 94, 1),
(99, 5555, '2021-03-12', '00:00:00', 94, 1),
(100, 505, '2021-03-12', '00:00:00', 94, 1),
(101, 555, '2021-03-12', '00:00:00', 94, 1),
(102, 500, '2021-03-12', '00:00:00', 94, 1),
(103, 800, '2021-03-12', '12:34:57', 94, 1),
(104, 1, '2021-03-12', '12:37:52', 94, 1),
(105, 1, '2021-03-12', '12:40:01', 94, 1),
(106, 0, '2021-03-12', '12:40:36', 94, 1),
(107, 111, '2021-03-12', '14:22:40', 94, 1),
(108, 222, '2021-03-12', '14:22:40', 94, 1),
(109, 100, '2021-03-12', '14:22:40', 94, 1),
(110, 0, '2021-03-12', '14:22:40', 94, 1),
(111, 999, '2021-03-12', '14:22:40', 94, 1),
(112, 999, '2021-03-12', '14:25:55', 94, 1),
(113, 8000, '2021-03-12', '15:16:55', 106, 1),
(114, 9000, '2021-03-12', '16:33:52', 107, 1),
(115, 200, '2021-03-12', '16:37:51', 107, 1),
(116, 800, '2021-03-12', '16:37:51', 107, 1),
(117, 100, '2021-03-12', '16:45:47', 107, 1),
(118, 200, '2021-03-12', '16:45:55', 107, 1),
(119, 789, '2021-03-12', '16:46:19', 107, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`);

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
-- Indexes for table `stadium`
--
ALTER TABLE `stadium`
  ADD PRIMARY KEY (`stadium_id`);

--
-- Indexes for table `stadium_type`
--
ALTER TABLE `stadium_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `topup`
--
ALTER TABLE `topup`
  ADD PRIMARY KEY (`topup_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `emp_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `m_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `stadium`
--
ALTER TABLE `stadium`
  MODIFY `stadium_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `stadium_type`
--
ALTER TABLE `stadium_type`
  MODIFY `type_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `topup`
--
ALTER TABLE `topup`
  MODIFY `topup_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
