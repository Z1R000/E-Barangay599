-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2021 at 04:34 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clientmsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblresident`
--

CREATE TABLE `tblresident` (
  `ID` int(10) NOT NULL,
  `Purok` int(11) NOT NULL,
  `houseUnit` int(11) NOT NULL,
  `streetName` varchar(200) NOT NULL,
  `Cellphnumber` int(11) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Password` varchar(50) NOT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  `voter` varchar(3) NOT NULL,
  `vPrecinct` text NOT NULL, 
  `ResidentType` varchar(50) NOT NULL,
  `LastName` varchar(50) DEFAULT NULL,
  `Suffix` varchar(50) NOT NULL,
  `FirstName` varchar(50) DEFAULT NULL,
  `MiddleName` varchar(50) DEFAULT NULL,
  `BirthPlace` varchar(50) DEFAULT NULL,
  `Gender` varchar(20) NOT NULL,
  `sssNumber` int(50) DEFAULT NULL,
  `tinNumber` int(50) DEFAULT NULL,
  `CivilStatus` varchar(50) DEFAULT NULL,
  `BirthDate` datetime DEFAULT NULL,
  `HomeName` varchar(100) NOT NULL,
  `PassReset` varchar(100) NOT NULL,
  `resStatus` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblresident`
--

INSERT INTO `tblresident` (`ID`, `Purok`, `houseUnit`, `streetName`, `Cellphnumber`, `Email`, `Password`, `CreationDate`, `voter`, `vPrecinct`, `ResidentType`, `LastName`, `Suffix`, `FirstName`, `MiddleName`, `BirthPlace`, `Gender`, `sssNumber`, `tinNumber`, `CivilStatus`, `BirthDate`, `HomeName`, `PassReset`, `resStatus`) VALUES
(1, 1, 534, 'Old Sta. Mesa', 2147483647, 'ledes@gmail.com', '123', '2021-04-12 19:36:11', 'Yes', '123', 'Rental/Boarder', 'Ledesma', '', 'Marithess', 'Cortez', 'Manila', 'Male', 123123123, 1231321, 'Single', '2012-04-05 00:00:00', '', '', 'Active'),
(3, 3, 323, 'Narra', 19823719, 'virayvergel10@gmail.com', '123', '2021-04-12 20:14:26', 'No', '', 'Care Taker', 'Viray', 'Sr.', 'Vergel', 'Sallan', 'Manila', 'Male', 123123123, 3212312, 'Single', '2015-04-01 00:00:00', '', '', 'Active'),
(4, 4, 543, 'Mangga', 21315123, 'sallan@gmail.com', '123', '2021-04-20 07:49:54', 'Yes', '123', 'Living with Relatives', 'Sallan', 'Jr.', 'Arnold', 'Clavio', 'Manila', 'Female', 12512312, 12315123, 'Married', '2011-04-01 00:00:00', '', '', 'Active'),
(5, 5, 124, 'Sarmiento', 123123, 'nathan@gmail.com', '123', '2021-04-20 08:22:54', 'Yes', '123', 'Rental/Boarder', 'Morales', 'Sr.', 'Nathan', 'Pacquiao', 'Manila', 'Male', 123123, 12315123, 'Married', '2008-02-20 00:00:00', '', '', 'Active'),
(7, 7, 722, 'Mangga Ext.', 1436245, 'uy@gmail.com', '123', '2021-05-07 08:42:16', 'No', '', 'Living with Relatives', 'Uy', '', 'Wilvin', 'Voltaire', 'Visayas', 'Female', 45145451, 61451451, 'Married', '2013-01-07 00:00:00', '', '', 'Active'),
(9, 9, 999, 'Narra', 134561, 'velasco@gmail.com', '123', '2021-05-07 08:51:28', 'Yes', '2147483647', 'House Owner', 'Velasco', '', 'Sheena', 'Marie', 'Manila', 'Female', 1641461346, 1435614, 'Married', '2011-01-07 00:00:00', '', '', 'Active'),
(10, 10, 100, 'Sampaloc', 1645612345, 'ligs@gmail.com', '123', '2021-05-07 08:52:28', 'Yes', '514512345', 'Living with Relatives', 'Ligutom', '', 'Zyra', 'Ligs', 'Manila', 'Female', 1451345134, 1451243513, 'Widow', '2014-01-07 00:00:00', '', '', 'Active'),
(11, 10, 891, 'Narra', 1243521345, 'demesa@gmail.com', '123', '2021-05-08 02:28:15', 'Yes', '21452435', 'House Owner', 'Demesa', '', 'Adrian', 'Villanueva', 'Macaraeg', 'Female', 1254125412, 12341234, 'Married', '2016-05-08 00:00:00', '', '', 'Inactive'),
(13, 2, 123, 'Old Sta. Mesa', 2147483647, 'bins@gmail.com', 'Bins123x', '2021-11-06 08:12:06', 'No', '', 'Rental/Boarder', 'sunhose', 'Sr.', 'Vinz', 'Dangkol', NULL, 'Male', 0, 0, 'Married', '1955-12-12 00:00:00', 'Jayvee Dragon Celestial ', '', 'Deceased'),
(14, 1, 222, 'V. Mapa', 2147483647, 'jim@gmail.com', '123x', '2021-11-06 13:45:50', 'Yes', '0212', 'Rental/Boarder', 'Ledes', 'Jr.', 'Sedel', 'Deles', NULL, 'Male', 123123123, 123123123, 'Single', '1991-05-26 00:00:00', 'Jayvee', '', 'Inactive');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblresident`
--
ALTER TABLE `tblresident`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblresident`
--
ALTER TABLE `tblresident`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
