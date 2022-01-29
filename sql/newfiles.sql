-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2022 at 09:04 AM
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
-- Table structure for table `newfiles`
--

CREATE TABLE `newfiles` (
  `id` int(20) NOT NULL,
  `filename` varchar(200) NOT NULL,
  `type` varchar(200) NOT NULL,
  `desciption` varchar(200) NOT NULL,
  `disposition` varchar(200) NOT NULL,
  `expires` varchar(200) NOT NULL,
  `cache` varchar(200) NOT NULL,
  `pragma` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `newfiles`
--

INSERT INTO `newfiles` (`id`, `filename`, `type`, `desciption`, `disposition`, `expires`, `cache`, `pragma`) VALUES
(1, 'ระเบียบสำนักนายก สารบรรณฉบับที่1.pdf', 'application/octet-stream', 'File Transfer', 'attachment', '0', 'must-revalidate', 'public'),
(2, 'ระเบียบสำนักนายก สารบรรณฉบับที่2.pdf', 'application/octet-stream', 'File Transfer', 'attachment', '0', 'must-revalidate', 'public');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `newfiles`
--
ALTER TABLE `newfiles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `newfiles`
--
ALTER TABLE `newfiles`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
