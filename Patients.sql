-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 01, 2017 at 10:58 PM
-- Server version: 5.7.19-0ubuntu0.17.04.1
-- PHP Version: 7.1.9-1+ubuntu17.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doctor_consultancy`
--

-- --------------------------------------------------------

--
-- Table structure for table `Patients`
--

CREATE TABLE `Patients` (
  `ID` int(10) NOT NULL,
  `fname` text NOT NULL,
  `mname` text NOT NULL,
  `lname` text NOT NULL,
  `phone_no` bigint(20) NOT NULL,
  `date` varchar(10) NOT NULL,
  `email` varchar(25) NOT NULL,
  `uname` varchar(16) NOT NULL,
  `password` varchar(15) NOT NULL,
  `gender` text NOT NULL,
  `medical_issue` longtext NOT NULL,
  `doctor_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Patients`
--

INSERT INTO `Patients` (`ID`, `fname`, `mname`, `lname`, `phone_no`, `date`, `email`, `uname`, `password`, `gender`, `medical_issue`, `doctor_id`) VALUES
(12, 'hrithik', 'Rakesh', 'roshan', 764353, '7/7/8', 'h.r@com', 'hrithik', 'hrithik', 'male', 'Diabetes', 17),
(13, 'Bhavit', 'Something', 'Shah', 88976557, '1997/02/12', 'n.s@kdf.com', 'bhavit', 'bhavit', 'male', 'Blood Pressure', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Patients`
--
ALTER TABLE `Patients`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `uname` (`uname`),
  ADD KEY `doctor_id` (`doctor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Patients`
--
ALTER TABLE `Patients`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `Patients`
--
ALTER TABLE `Patients`
  ADD CONSTRAINT `Patients_ibfk_1` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
