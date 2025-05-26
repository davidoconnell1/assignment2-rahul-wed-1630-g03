-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2025 at 01:11 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project2db`
--

-- --------------------------------------------------------

--
-- Table structure for table `eoi`
--

CREATE TABLE `eoi` (
  `EOInumber` int(11) NOT NULL AUTO_INCREMENT,
  `Job Reference Number` set('Select','10000','10001') NOT NULL DEFAULT 'Select',
  `First Name` varchar(20) NOT NULL,
  `Last Name` varchar(20) NOT NULL,
  `Street Address` varchar(40) NOT NULL,
  `Suburb/town` varchar(40) NOT NULL,
  `State` set('Select','VIC','NSW','QLD','NT','WA','SA','TAS','ACT') NOT NULL DEFAULT 'Select',
  `Postcode` int(11) NOT NULL,
  `Email Address` varchar(100) NOT NULL,
  `Phone number` int(11) NOT NULL,
  `Python experience` tinyint(1) NOT NULL,
  `SQL experience` tinyint(1) NOT NULL,
  `C/C++ experience` tinyint(1) NOT NULL,
  `PowerShell experience` tinyint(1) NOT NULL,
  `Other skills` text NOT NULL,
  `Status` set('New','Current','Final') NOT NULL DEFAULT 'New',
  PRIMARY KEY (`EOInumber`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci

--
-- Indexes for dumped tables
--

--
-- Indexes for table `eoi`
--
ALTER TABLE `eoi`
  ADD PRIMARY KEY (`EOInumber`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `eoi`
--
ALTER TABLE `eoi`
  MODIFY `EOInumber` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
