-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2020 at 11:36 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `83825`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `ID` int(11) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Age` int(11) NOT NULL,
  `Phone` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`ID`, `Username`, `Password`, `Age`, `Phone`, `Email`, `isAdmin`) VALUES
(1, 'Administrator', 'JoCaMarteja8197', 12, '9495932688', 'growtopiafligamecollection@gmail.com', 1),
(9, 'Mayrose', ' Cayabyab', 22, '9495932688', 'mayrose@cayabyab.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `archived`
--

CREATE TABLE `archived` (
  `ID` int(11) NOT NULL,
  `Firstname` varchar(100) NOT NULL,
  `Middlename` varchar(100) NOT NULL,
  `Initial` varchar(100) NOT NULL,
  `Lastname` varchar(100) NOT NULL,
  `Age` int(11) NOT NULL,
  `Gender` varchar(100) NOT NULL,
  `Grade` int(11) NOT NULL,
  `Section` varchar(100) NOT NULL,
  `SY` int(11) NOT NULL,
  `LRN` bigint(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `ID` int(11) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Icon` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `ID` int(11) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Firstname` varchar(100) NOT NULL,
  `Middlename` varchar(100) NOT NULL,
  `Initial` varchar(100) NOT NULL,
  `Lastname` varchar(100) NOT NULL,
  `Age` int(11) NOT NULL,
  `Gender` varchar(100) NOT NULL,
  `Grade` int(11) NOT NULL,
  `Section` varchar(100) NOT NULL,
  `SY` int(11) NOT NULL,
  `LRN` bigint(20) NOT NULL,
  `Comment` text NOT NULL,
  `REQ_TITLE` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student_records`
--

CREATE TABLE `student_records` (
  `ID` int(11) NOT NULL,
  `Firstname` varchar(100) NOT NULL,
  `Middlename` varchar(100) NOT NULL,
  `Initial` varchar(100) NOT NULL,
  `Lastname` varchar(100) NOT NULL,
  `Age` int(11) NOT NULL,
  `Gender` varchar(100) NOT NULL,
  `Grade` int(11) NOT NULL,
  `Section` varchar(100) NOT NULL,
  `SY` int(11) NOT NULL,
  `LRN` bigint(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_records`
--

INSERT INTO `student_records` (`ID`, `Firstname`, `Middlename`, `Initial`, `Lastname`, `Age`, `Gender`, `Grade`, `Section`, `SY`, `LRN`) VALUES
(12, 'Jomari Carl', 'Boquiren', 'B', 'Marteja', 12, 'Male', 7, 'Newton', 2019, 102152120608);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `archived`
--
ALTER TABLE `archived`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `student_records`
--
ALTER TABLE `student_records`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `archived`
--
ALTER TABLE `archived`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `student_records`
--
ALTER TABLE `student_records`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
