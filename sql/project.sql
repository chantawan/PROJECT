-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2022 at 02:47 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `divistion`
--

CREATE TABLE `divistion` (
  `Division_ID` int(50) NOT NULL,
  `Division_Name` varchar(50) DEFAULT NULL,
  `Division's phone number` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE `document` (
  `Document_ID` int(50) NOT NULL,
  `Document_name` varchar(50) DEFAULT NULL,
  `Document_Date` varchar(50) DEFAULT NULL,
  `Document_detail` varchar(50) DEFAULT NULL,
  `Document_Export` varchar(50) DEFAULT NULL,
  `Document_Import` varchar(50) DEFAULT NULL,
  `DocumentType_ID` int(50) DEFAULT NULL,
  `Division_ID` int(50) DEFAULT NULL,
  `Documentstatus_ID` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `documentobjective`
--

CREATE TABLE `documentobjective` (
  `Documentobjective_ID` int(50) NOT NULL,
  `Documentobjective_name` varchar(50) DEFAULT NULL,
  `Document_ID` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `documentstatus`
--

CREATE TABLE `documentstatus` (
  `Documentstatus_ID` int(50) NOT NULL,
  `Documentstatus_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `documentstype`
--

CREATE TABLE `documentstype` (
  `DocumentsType_ID` int(50) NOT NULL,
  `DocumentsType_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_id` int(50) NOT NULL,
  `emp_firstname` varchar(50) NOT NULL,
  `emp_lastname` varchar(50) NOT NULL,
  `emp_email` varchar(50) NOT NULL,
  `emp_tel` varchar(50) NOT NULL,
  `emp_addresss` varchar(50) NOT NULL,
  `emp_username` varchar(50) NOT NULL,
  `emp_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `emp_firstname`, `emp_lastname`, `emp_email`, `emp_tel`, `emp_addresss`, `emp_username`, `emp_password`) VALUES
(1, 'Thadphong', 'Noidam', 'nine.nun@hotmail.com', '0805406397', 'Hatyai', 'Cnine', 'Cnine');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `m_id` int(50) NOT NULL,
  `m_firstname` varchar(50) DEFAULT NULL,
  `m_lastname` varchar(50) DEFAULT NULL,
  `m_email` varchar(50) DEFAULT NULL,
  `m_tel` varchar(50) DEFAULT NULL,
  `m_address` varchar(50) DEFAULT NULL,
  `m_username` varchar(50) DEFAULT NULL,
  `m_password` varchar(50) DEFAULT NULL,
  `emp_id` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`m_id`, `m_firstname`, `m_lastname`, `m_email`, `m_tel`, `m_address`, `m_username`, `m_password`, `emp_id`) VALUES
(0, 'ทัตพงศ์', 'น้อยดำ', '6310210710@email.psu.ac.th', '0805406397', 'ศรีมณีอพาร์ทเม้นท์', 'Thadphong', '0805406397', 0);

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `Position_ID` int(50) NOT NULL,
  `Position_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `secretclass`
--

CREATE TABLE `secretclass` (
  `Secretclass_ID` int(50) NOT NULL,
  `Secretclass_name` varchar(50) DEFAULT NULL,
  `Document_ID` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sentdocument`
--

CREATE TABLE `sentdocument` (
  `SentDocument_ID` int(50) NOT NULL,
  `SentDocument_name` varchar(50) DEFAULT NULL,
  `Document_ID` int(50) DEFAULT NULL,
  `Employee_ID` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `speedclass`
--

CREATE TABLE `speedclass` (
  `Speedclass_ID` int(50) NOT NULL,
  `Speedclass_name` varchar(50) DEFAULT NULL,
  `Document_ID` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `divistion`
--
ALTER TABLE `divistion`
  ADD PRIMARY KEY (`Division_ID`);

--
-- Indexes for table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`Document_ID`);

--
-- Indexes for table `documentobjective`
--
ALTER TABLE `documentobjective`
  ADD PRIMARY KEY (`Documentobjective_ID`);

--
-- Indexes for table `documentstatus`
--
ALTER TABLE `documentstatus`
  ADD PRIMARY KEY (`Documentstatus_ID`);

--
-- Indexes for table `documentstype`
--
ALTER TABLE `documentstype`
  ADD PRIMARY KEY (`DocumentsType_ID`);

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
  ADD PRIMARY KEY (`Position_ID`);

--
-- Indexes for table `secretclass`
--
ALTER TABLE `secretclass`
  ADD PRIMARY KEY (`Secretclass_ID`);

--
-- Indexes for table `sentdocument`
--
ALTER TABLE `sentdocument`
  ADD PRIMARY KEY (`SentDocument_ID`);

--
-- Indexes for table `speedclass`
--
ALTER TABLE `speedclass`
  ADD PRIMARY KEY (`Speedclass_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
