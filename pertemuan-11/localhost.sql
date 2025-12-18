-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 14, 2025 at 09:17 PM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pwd2025`
--
CREATE DATABASE IF NOT EXISTS `db_pwd2025` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `db_pwd2025`;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tamu`
--

CREATE TABLE `tbl_tamu` (
  `cid` int(11) NOT NULL,
  `cnama` varchar(100) DEFAULT NULL,
  `cemail` varchar(100) DEFAULT NULL,
  `cpesan` text,
  `dcreated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_tamu`
--

INSERT INTO `tbl_tamu` (`cid`, `cnama`, `cemail`, `cpesan`, `dcreated_at`) VALUES
(1, 'Anjelita cahaya', 'anjelitacahaya@2007.ac.id', 'semangat', '2025-12-15 02:43:18'),
(2, 'je', 'enjel@gmail.com', 'ja', '2025-12-15 02:43:18'),
(3, 'je', 'Anjelita27@gmail.com', 'ja', '2025-12-15 02:43:18'),
(4, 'cya', 'cahya@77.com', 'hi', '2025-12-15 02:43:18'),
(5, 'grace laura', 'laura89@gmail.com', 'semangat mengerjakan tugas', '2025-12-15 02:43:18'),
(6, 'dinda rinda', 'rinda@gmail', 'belajar yang rajin selalu', '2025-12-15 02:43:18'),
(7, 'rani roseana', 'raniroseana@gmail.com', 'menjadi lebih baik dari hari kemarin', '2025-12-15 03:45:56'),
(8, 'alexa reminda resina', 'xaxa@gmail.com', 'belajar yang rajin dari sebelumnya, jadikan yg kemarin sebuah pelajaran', '2025-12-15 03:55:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_tamu`
--
ALTER TABLE `tbl_tamu`
  ADD PRIMARY KEY (`cid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_tamu`
--
ALTER TABLE `tbl_tamu`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
