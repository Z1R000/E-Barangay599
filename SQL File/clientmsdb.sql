-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2021 at 08:02 PM
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
-- Table structure for table `password_reset_temp`
--

CREATE TABLE `password_reset_temp` (
  `email` varchar(250) NOT NULL,
  `key` varchar(250) NOT NULL,
  `expDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `password_reset_temp`
--

INSERT INTO `password_reset_temp` (`email`, `key`, `expDate`) VALUES
('virayvergel10@gmail.com', 'v?xJ?????????GE2fcbaf9385', '2021-11-06 15:54:44'),
('virayvergel10@gmail.com', 'v?xJ?????????GEeaf3ccd704', '2021-11-06 15:57:57'),
('virayvergel10@gmail.com', 'v?xJ?????????GEb24a86af3c', '2021-11-06 15:58:31'),
('virayvergel10@gmail.com', 'v?xJ?????????GE9bb4026f02', '2021-11-06 15:58:39'),
('virayvergel10@gmail.com', 'v?xJ?????????GE6e0abc97b5', '2021-11-06 16:22:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(11) NOT NULL,
  `residentID` int(11) NOT NULL,
  `BarangayPosition` varchar(50) NOT NULL,
  `dayDuty` varchar(15) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `AdminRegdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `residentID`, `BarangayPosition`, `dayDuty`, `Email`, `Password`, `AdminRegdate`) VALUES
(1, 1, '1', '1', 'ledes@gmail.com', '123', '2021-04-20 08:08:28'),
(2, 2, '2', '1', 'kim@gmail.com', '123', '2021-04-20 08:09:00'),
(4, 4, '3', '1', 'sallan@gmail.com', '123', '2021-04-20 16:21:55'),
(5, 5, '5', '1', 'nathan@gmail.com', '123', '2021-04-20 16:23:13'),
(7, 7, '4', '2', 'kagawad1@gmail.com', '123', '2021-11-10 06:42:29'),
(8, 9, '4', '3', 'kagawad2@gmail.com', '123', '2021-11-10 07:33:00'),
(9, 10, '4', '4', 'kagawad3@gmail.com', '123', '2021-11-10 07:37:38'),
(10, 11, '4', '5', 'kagawad4@gmail.com', '123', '2021-11-10 07:38:26'),
(11, 13, '4', '6', 'kagawad5@gmail.com', '123', '2021-11-10 07:39:43'),
(12, 14, '4', '7', 'kagawad6@gmail.com', '123', '2021-11-10 07:39:43'),
(13, 16, '4', '8', 'kagawad7@gmail.com', '123', '2021-11-10 07:39:43');

-- --------------------------------------------------------

--
-- Table structure for table `tblannouncement`
--

CREATE TABLE `tblannouncement` (
  `ID` int(11) NOT NULL,
  `announcement` varchar(2000) NOT NULL,
  `announcementDate` datetime NOT NULL DEFAULT current_timestamp(),
  `startDate` datetime NOT NULL DEFAULT current_timestamp(),
  `endDate` datetime NOT NULL,
  `adminID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblannouncement`
--

INSERT INTO `tblannouncement` (`ID`, `announcement`, `announcementDate`, `startDate`, `endDate`, `adminID`) VALUES
(1, 'Announcement Trial #1', '2021-04-22 00:00:00', '2021-11-12 16:10:40', '2021-10-05 00:00:00', 1),
(2, 'Announcement Trial #2', '2021-04-22 00:00:00', '2021-11-12 16:10:40', '2021-10-05 00:00:00', 1),
(3, 'Announcement Trial #3', '2021-04-22 00:00:00', '2021-11-12 16:10:40', '2021-10-05 00:00:00', 1),
(4, 'Announcement Trial #4', '2021-04-22 00:00:00', '2021-11-12 16:10:40', '2021-10-05 00:00:00', 1),
(5, 'I am ledesma marithess', '2021-04-29 00:00:00', '2021-11-12 16:10:40', '2021-10-05 00:00:00', 1),
(6, 'Sample', '2021-05-03 00:00:00', '2021-11-12 16:10:40', '2021-10-05 00:00:00', 1),
(7, 'Welcome to Gmeet', '2021-05-08 00:00:00', '2021-11-12 16:10:40', '2021-10-05 00:00:00', 1),
(8, 'asdasdasd', '2021-10-05 18:02:26', '2021-11-12 16:10:40', '2021-10-05 18:02:26', 1),
(9, 'Sample Announcement October 5 2021', '2021-10-05 18:03:36', '2021-11-12 16:10:40', '2021-10-05 18:03:36', 1),
(10, 'Check announcement 1', '2021-11-12 16:14:19', '2021-11-12 00:00:00', '2021-11-17 00:00:00', 1),
(11, 'Check announcement 2', '2021-11-12 16:14:26', '2021-11-12 00:00:00', '2021-11-17 00:00:00', 1),
(12, 'Check announcement 3', '2021-11-12 16:14:32', '2021-11-12 00:00:00', '2021-11-17 00:00:00', 1),
(13, 'Check announcement 4', '2021-11-12 16:14:38', '2021-11-12 00:00:00', '2021-11-17 00:00:00', 1),
(14, 'Check announcement 5', '2021-11-12 16:14:43', '2021-11-12 00:00:00', '2021-11-17 00:00:00', 1),
(15, 'Check announcement 6', '2021-11-12 16:14:50', '2021-11-12 00:00:00', '2021-11-17 00:00:00', 1),
(16, 'Check announcement 7', '2021-11-12 16:14:56', '2021-11-12 00:00:00', '2021-11-17 00:00:00', 1),
(17, 'Check announcement 8', '2021-11-12 16:15:03', '2021-11-12 00:00:00', '2021-11-17 00:00:00', 1),
(18, 'Check announcement 9', '2021-11-12 16:15:09', '2021-11-12 00:00:00', '2021-11-17 00:00:00', 1),
(19, 'Check announcement 10', '2021-11-12 16:15:15', '2021-11-12 00:00:00', '2021-11-17 00:00:00', 1),
(20, 'Check announcement 11', '2021-11-12 16:15:27', '2021-11-12 00:00:00', '2021-11-17 00:00:00', 1),
(21, 'Check announcement 12', '2021-11-12 16:15:34', '2021-11-12 00:00:00', '2021-11-17 00:00:00', 1),
(22, 'Check announcement 13', '2021-11-12 16:15:39', '2021-11-12 00:00:00', '2021-11-17 00:00:00', 1),
(23, 'Sample announcement', '2021-11-12 16:24:21', '2021-11-12 00:00:00', '2021-11-26 00:00:00', 1),
(24, 'Last check announcement', '2021-11-12 16:26:21', '2021-11-13 00:00:00', '2021-11-25 00:00:00', 1),
(25, 'Last', '2021-11-12 16:28:43', '2021-11-12 00:00:00', '2021-11-25 00:00:00', 1),
(26, 'Ganito ba ledes', '2021-11-12 16:30:40', '2021-11-12 00:00:00', '2021-11-26 00:00:00', 1),
(27, 'asdasd', '2021-11-13 14:06:24', '2021-11-19 00:00:00', '2021-11-30 00:00:00', 1),
(28, 'asdasdasd', '2021-11-17 03:24:01', '2021-11-17 03:22:00', '2021-11-17 03:23:00', 1),
(29, 'Check', '2021-11-17 03:41:41', '2021-11-17 03:40:00', '2021-11-17 03:41:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblavailability`
--

CREATE TABLE `tblavailability` (
  `ID` int(11) NOT NULL,
  `ava` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblavailability`
--

INSERT INTO `tblavailability` (`ID`, `ava`) VALUES
(1, 'AVAILABLE'),
(2, 'NOT AVAILABLE');

-- --------------------------------------------------------

--
-- Table structure for table `tblblotter`
--

CREATE TABLE `tblblotter` (
  `ID` int(11) NOT NULL,
  `compStatus` varchar(20) NOT NULL,
  `blotterType` varchar(50) NOT NULL,
  `incidentLocation` varchar(200) NOT NULL,
  `incidentDate` datetime NOT NULL,
  `numres` varchar(10) NOT NULL,
  `respondent` varchar(1000) NOT NULL,
  `complainant` varchar(500) NOT NULL,
  `numpers` varchar(10) NOT NULL,
  `invPers` varchar(5000) NOT NULL,
  `blotterSummary` varchar(2000) NOT NULL,
  `blotterStatus` varchar(50) NOT NULL,
  `sumStatus` varchar(20) NOT NULL,
  `summonSchedule` datetime NOT NULL,
  `blotterCreationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `adminID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblblotter`
--

INSERT INTO `tblblotter` (`ID`, `compStatus`, `blotterType`, `incidentLocation`, `incidentDate`, `numres`, `respondent`, `complainant`, `numpers`, `invPers`, `blotterSummary`, `blotterStatus`, `sumStatus`, `summonSchedule`, `blotterCreationDate`, `adminID`) VALUES
(1, 'Resident', '1', 'Near aling nena', '2021-11-18 01:27:00', '3', 'Kagawad Sallan,Kagawad Ledesma,Kagawad Viray,', 'Ledesma Marithess', '2', 'Arnold Sallan,Ledesma asd,', 'This time', 'PENDING', 'No', '0000-00-00 00:00:00', '2021-11-17 17:27:48', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblbtype`
--

CREATE TABLE `tblbtype` (
  `bID` int(11) NOT NULL,
  `btype` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblbtype`
--

INSERT INTO `tblbtype` (`bID`, `btype`) VALUES
(1, 'Property Damage'),
(2, 'Violence'),
(3, 'Public Disturbance'),
(4, 'Robbery');

-- --------------------------------------------------------

--
-- Table structure for table `tblcertificate`
--

CREATE TABLE `tblcertificate` (
  `ID` int(10) NOT NULL,
  `Type` int(11) NOT NULL,
  `CertificateName` varchar(200) DEFAULT NULL,
  `CertificatePrice` decimal(16,2) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcertificate`
--

INSERT INTO `tblcertificate` (`ID`, `Type`, `CertificateName`, `CertificatePrice`, `CreationDate`) VALUES
(1, 1, 'Barangay Certificate', '121.00', '2021-04-21 13:45:50'),
(2, 1, 'Barangay Clearance', '30.00', '2021-04-21 13:45:50'),
(3, 1, 'Barangay Permit', '150.00', '2021-04-21 13:45:50'),
(4, 1, 'Proof of Residency', '120.00', '2021-04-21 13:45:50'),
(6, 2, 'Business Clearance Capital - Php10,000 Below', '100.00', '2021-04-21 13:45:50'),
(7, 2, 'Business Clearance Capital - Php10,001 - Php100-000', '500.00', '2021-04-21 14:25:51'),
(8, 2, 'Business Clearance Capital - Php100,001 - Above', '1000.00', '2021-04-21 14:25:51'),
(9, 1, 'Certificate of Good Moral', '90.00', '2021-04-21 14:25:51'),
(10, 1, 'Lipat-bahay Clearance', '105.00', '2021-04-21 14:25:51'),
(11, 1, 'Certificate of Acceptance', '56.00', '2021-04-21 14:25:51'),
(12, 1, 'Certificate of Cohabitation', '113.00', '2021-04-21 14:25:51'),
(13, 1, 'Certificate of Indigency', '356.00', '2021-04-21 14:25:51'),
(14, 1, 'Certificate to File Action', '250.00', '2021-04-21 14:25:51'),
(15, 1, 'Barangay ID', '50.00', '2021-04-21 14:28:00'),
(17, 1, 'Referral Recommendation', '50.00', '2021-04-21 14:28:00');

-- --------------------------------------------------------

--
-- Table structure for table `tblcreatecertificate`
--

CREATE TABLE `tblcreatecertificate` (
  `ID` int(10) NOT NULL,
  `Userid` varchar(120) DEFAULT NULL,
  `CertificateId` varchar(100) NOT NULL,
  `resDate` timestamp NULL DEFAULT current_timestamp(),
  `status` varchar(20) NOT NULL DEFAULT '1',
  `pMode` varchar(10) NOT NULL,
  `purpID` int(25) NOT NULL,
  `other` varchar(100) NOT NULL,
  `bName` varchar(50) NOT NULL DEFAULT 'N/A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcreatecertificate`
--

INSERT INTO `tblcreatecertificate` (`ID`, `Userid`, `CertificateId`, `resDate`, `status`, `pMode`, `purpID`, `other`, `bName`) VALUES
(1, '2', '13', '2021-11-13 07:12:57', '8', 'G-Cash', 13, 'SAD', ''),
(2, '1', '9', '2021-11-13 07:20:38', '6', 'G-Cash', 3, '', ''),
(3, '1', '13', '2021-11-13 08:03:46', '6', 'G-Cash', 3, '', ''),
(4, '2', '9', '2021-11-13 08:13:21', '3', 'Cash', 3, '', ''),
(5, '2', '1', '2021-11-13 09:17:41', '2', 'G-Cash', 3, '', ''),
(6, '1', '1', '2021-11-13 09:31:18', '6', 'Cash', 3, '', ''),
(7, '1', '9', '2021-11-13 09:41:43', '6', 'G-Cash', 3, '', ''),
(8, '1', '3', '2021-11-13 09:43:23', '6', 'Cash', 3, '', ''),
(9, '1', '2', '2021-11-13 09:44:39', '8', 'G-Cash', 2, '', ''),
(10, '1', '3', '2021-11-13 09:45:25', '8', 'Cash', 2, '', ''),
(11, '1', '6', '2021-11-15 14:35:55', '8', 'G-Cash', 13, 'BUSINESS', 'Ledesma Store'),
(12, '1', '6', '2021-11-15 14:54:57', '1', 'G-Cash', 13, 'BUSINESS', 'Ledesma Store'),
(13, '1', '10', '2021-11-15 15:04:28', '1', 'Cash', 13, 'LIPAT BAHAY', '');

-- --------------------------------------------------------

--
-- Table structure for table `tblcreaterental`
--

CREATE TABLE `tblcreaterental` (
  `ID` int(11) NOT NULL,
  `status` int(25) NOT NULL,
  `userID` int(11) NOT NULL,
  `rentalID` int(11) NOT NULL,
  `adminID` int(11) NOT NULL,
  `rentalStartDate` datetime NOT NULL,
  `rentalEndDate` datetime NOT NULL,
  `creationDate` datetime NOT NULL DEFAULT current_timestamp(),
  `modeOfPayment` int(11) NOT NULL,
  `purpID` int(25) NOT NULL,
  `payable` decimal(16,2) NOT NULL,
  `others` varchar(100) NOT NULL,
  `paymentID` int(11) NOT NULL,
  `proof` varchar(1000) NOT NULL,
  `payment` decimal(16,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcreaterental`
--

INSERT INTO `tblcreaterental` (`ID`, `status`, `userID`, `rentalID`, `adminID`, `rentalStartDate`, `rentalEndDate`, `creationDate`, `modeOfPayment`, `purpID`, `payable`, `others`, `paymentID`, `proof`, `payment`) VALUES
(1, 6, 10, 4, 0, '2021-11-15 03:17:00', '2021-11-15 08:17:00', '2021-11-15 01:18:10', 2, 9, '1250.00', '', 0, '1asd', '0.00'),
(2, 6, 5, 1, 0, '2021-11-15 02:30:00', '2021-11-15 04:30:00', '2021-11-15 02:30:18', 2, 9, '600.00', '', 0, '', '0.00'),
(3, 6, 4, 2, 0, '2021-11-15 02:45:00', '2021-11-15 03:45:00', '2021-11-15 02:45:33', 2, 10, '100.00', '', 0, '', '0.00'),
(4, 3, 1, 1, 0, '2021-11-15 11:12:00', '2021-11-15 01:12:00', '2021-11-15 11:31:30', 1, 11, '3000.00', '', 0, '', '0.00'),
(5, 2, 1, 2, 0, '2021-11-15 04:34:00', '2021-11-16 03:34:00', '2021-11-15 14:34:55', 1, 10, '2300.00', '', 0, '', '0.00'),
(6, 8, 1, 2, 0, '2021-11-15 16:51:00', '2021-11-16 16:51:00', '2021-11-15 16:51:09', 2, 10, '2400.00', '', 0, '', '0.00'),
(7, 2, 1, 2, 0, '2021-11-15 21:41:00', '2021-11-16 21:41:00', '2021-11-15 21:42:08', 1, 10, '2400.00', '', 0, '', '0.00'),
(8, 1, 1, 4, 0, '2021-11-15 22:29:00', '2021-11-16 22:29:00', '2021-11-15 22:29:47', 1, 10, '6000.00', '', 0, '', '0.00'),
(9, 1, 1, 1, 0, '2021-11-15 22:31:00', '2021-11-16 22:31:00', '2021-11-15 22:31:51', 2, 10, '7200.00', '', 0, '', '0.00'),
(10, 1, 1, 1, 0, '2021-11-15 22:51:00', '2021-11-16 22:51:00', '2021-11-15 22:51:56', 1, 0, '7200.00', 'SAD', 0, '', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `tblcredits`
--

CREATE TABLE `tblcredits` (
  `ID` int(11) NOT NULL,
  `ApiCode` varchar(50) NOT NULL,
  `ApiPassword` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcredits`
--

INSERT INTO `tblcredits` (`ID`, `ApiCode`, `ApiPassword`) VALUES
(1, 'ST-VERGE581899_QEUNZ', '1m1ba%321p');

-- --------------------------------------------------------

--
-- Table structure for table `tbldays`
--

CREATE TABLE `tbldays` (
  `ID` int(11) NOT NULL,
  `dDay` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbldays`
--

INSERT INTO `tbldays` (`ID`, `dDay`) VALUES
(1, 'EVERYDAY'),
(2, 'MONDAY'),
(3, 'TUESDAY'),
(4, 'WEDNESDAY'),
(5, 'THURSDAY'),
(6, 'FRIDAY'),
(7, 'SATURDAY'),
(8, 'SUNDAY');

-- --------------------------------------------------------

--
-- Table structure for table `tblinformation`
--

CREATE TABLE `tblinformation` (
  `ID` int(11) NOT NULL,
  `Baddress` varchar(100) NOT NULL,
  `bFullAdd` varchar(100) NOT NULL,
  `Btitle` text NOT NULL,
  `Blogoone` text NOT NULL,
  `Blogotwo` text NOT NULL,
  `bContact` varchar(11) NOT NULL,
  `blogo3` varchar(1000) NOT NULL,
  `aboutus` varchar(2000) NOT NULL,
  `eTitle` varchar(1000) NOT NULL,
  `gName` varchar(1000) NOT NULL,
  `qr` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblinformation`
--

INSERT INTO `tblinformation` (`ID`, `Baddress`, `bFullAdd`, `Btitle`, `Blogoone`, `Blogotwo`, `bContact`, `blogo3`, `aboutus`, `eTitle`, `gName`, `qr`) VALUES
(1, 'BARANGAY 599, ZONE 59, DISTRICT VI', '4745 Peralta St. V. Mapa Sta. Mesa, Manila', 'OFFICE OF THE SANGGUNIANG BARANGAY', '../images/61954f98d2c8f6.93313960.png', '../images/61954f98d42af4.78979474.png', '09123456789', '../images/61954f98d32fd1.81087863.png', 'Barangay 599 has been one of the forerunning barangays along the streets of “Victorino Mapa” and as stated by a corresponding local of the barangay it has been established way before she was born which was during the early 1970’s and since then, not many integrations were made nor committed by the municipality. According to the barangay’s secretary, there are about 5,600 registered citizens. Barangay 599’s roster of officials is composed of the Barangay Chairman (Jose Milo L. Lacatan), Barangay Secretary (Maria Cecilia C. Dela Cruz),. SK Chairman and Kagawads (Erwin L. Sampaga, Florante V. Bonagua, Crisantro G. Lorica, Alexander S. Ceño, Nelson L. Labrador, Marivic Villareal). Supporting these leaders are the 20 barangay enforcers, 20 “lupontagapamayapa’s”, 3 advisers and being composed of 10 puroks, 10 purok leaders. However, mostly the secretary’s team and the chairman handle the processes, queries, and requests of their residents..', ' Barangay 599 E-barangay', 'Barangay 599', '../images/61954d06658604.45345155.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbllistpurok`
--

CREATE TABLE `tbllistpurok` (
  `ID` int(11) NOT NULL,
  `pName` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbllistpurok`
--

INSERT INTO `tbllistpurok` (`ID`, `pName`) VALUES
(1, '1'),
(2, '2'),
(3, '3'),
(4, '4'),
(5, '5'),
(6, '6'),
(7, '7'),
(8, '8'),
(9, '9'),
(10, '10');

-- --------------------------------------------------------

--
-- Table structure for table `tblloginaudits`
--

CREATE TABLE `tblloginaudits` (
  `ID` int(11) NOT NULL,
  `timeIn` time NOT NULL DEFAULT current_timestamp(),
  `timeOut` time NOT NULL,
  `resId` int(11) NOT NULL,
  `position` int(11) NOT NULL,
  `datesignedin` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblloginaudits`
--

INSERT INTO `tblloginaudits` (`ID`, `timeIn`, `timeOut`, `resId`, `position`, `datesignedin`) VALUES
(1, '04:43:42', '04:44:08', 1, 1, '2021-11-12'),
(3, '13:33:42', '02:18:11', 1, 1, '2021-11-12'),
(6, '02:38:48', '02:39:37', 7, 4, '2021-11-13'),
(7, '02:39:42', '00:00:00', 1, 1, '2021-11-13'),
(8, '12:29:28', '00:00:00', 1, 1, '2021-11-13'),
(9, '04:25:07', '04:26:54', 1, 1, '2021-11-14'),
(10, '10:48:52', '00:00:00', 1, 1, '2021-11-14'),
(11, '12:29:49', '12:39:36', 1, 1, '2021-11-14'),
(12, '16:40:07', '09:56:20', 1, 1, '2021-11-14'),
(13, '21:59:22', '00:00:00', 1, 1, '2021-11-14'),
(14, '22:01:59', '10:06:19', 1, 1, '2021-11-14'),
(15, '22:26:12', '01:35:13', 1, 1, '2021-11-14'),
(16, '01:41:28', '00:00:00', 1, 1, '2021-11-15'),
(17, '08:33:17', '11:06:31', 1, 1, '2021-11-15'),
(18, '01:34:39', '00:00:00', 1, 1, '2021-11-16'),
(19, '13:41:20', '00:00:00', 1, 1, '2021-11-16'),
(20, '15:18:33', '00:00:00', 1, 1, '2021-11-16'),
(21, '15:19:30', '00:00:00', 1, 1, '2021-11-16'),
(22, '15:22:50', '03:29:08', 1, 1, '2021-11-16'),
(23, '15:31:12', '03:31:14', 1, 1, '2021-11-16'),
(24, '15:31:18', '03:31:20', 1, 1, '2021-11-16'),
(25, '15:31:44', '03:32:08', 1, 1, '2021-11-16'),
(26, '15:33:43', '03:33:46', 1, 1, '2021-11-16'),
(27, '15:37:56', '03:38:12', 1, 1, '2021-11-16'),
(28, '15:38:18', '03:38:32', 1, 1, '2021-11-16'),
(29, '15:40:02', '03:40:04', 1, 1, '2021-11-16'),
(30, '22:12:28', '00:00:00', 1, 1, '2021-11-16'),
(31, '22:37:07', '10:48:43', 1, 1, '2021-11-16'),
(32, '22:48:48', '00:00:00', 1, 1, '2021-11-16'),
(33, '00:13:56', '03:47:31', 1, 1, '2021-11-17'),
(34, '22:30:36', '00:00:00', 1, 1, '2021-11-17');

-- --------------------------------------------------------

--
-- Table structure for table `tblmodes`
--

CREATE TABLE `tblmodes` (
  `ID` int(11) NOT NULL,
  `mode` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblmodes`
--

INSERT INTO `tblmodes` (`ID`, `mode`) VALUES
(1, 'G-cash'),
(2, 'Cash');

-- --------------------------------------------------------

--
-- Table structure for table `tblpaymentlogs`
--

CREATE TABLE `tblpaymentlogs` (
  `ID` int(11) NOT NULL,
  `mode` int(11) NOT NULL,
  `payorName` int(11) NOT NULL,
  `fName` varchar(200) NOT NULL,
  `refNum` int(11) NOT NULL,
  `proof` varchar(1000) NOT NULL,
  `servicetype` int(11) NOT NULL,
  `request` int(11) NOT NULL,
  `payment` decimal(16,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblpaymentlogs`
--

INSERT INTO `tblpaymentlogs` (`ID`, `mode`, `payorName`, `fName`, `refNum`, `proof`, `servicetype`, `request`, `payment`) VALUES
(1, 1, 1, '', 12134123, '/images/nirvanalogo.jpg', 2, 1, '230.00');

-- --------------------------------------------------------

--
-- Table structure for table `tblpositions`
--

CREATE TABLE `tblpositions` (
  `ID` int(100) NOT NULL,
  `Position` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblpositions`
--

INSERT INTO `tblpositions` (`ID`, `Position`) VALUES
(1, 'Chairperson'),
(2, 'Secretary'),
(3, 'Treasurer'),
(4, 'Kagawad'),
(5, 'SK chairman');

-- --------------------------------------------------------

--
-- Table structure for table `tblpurposes`
--

CREATE TABLE `tblpurposes` (
  `ID` int(11) NOT NULL,
  `Purpose` varchar(50) NOT NULL,
  `serviceType` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblpurposes`
--

INSERT INTO `tblpurposes` (`ID`, `Purpose`, `serviceType`) VALUES
(1, 'OPEN ACCOUNT/LOAN', '1'),
(2, 'MEMBERSHIP/NEW ID', '1'),
(3, 'EMPLOYMENT/WORK', '1'),
(4, 'MEDICAL ASSISTANCE', '1'),
(5, 'BURIAL ASSISTANCE', '1'),
(6, 'FINANCIAL ASSISTANCE', '1'),
(7, 'SCHOLARSHIP/BOARD EXAM/EN', '1'),
(8, 'BIRTH CERTIFICATE/MARRIAGE', '1'),
(9, 'SEMINARS/MEETINGS', '2'),
(10, 'SOCIAL GATHERING', '2'),
(11, 'SPORTS', '2'),
(12, 'MEDICAL', '2'),
(13, 'OTHERS', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tblrental`
--

CREATE TABLE `tblrental` (
  `ID` int(11) NOT NULL,
  `rentalName` varchar(100) NOT NULL,
  `rentalPrice` decimal(16,2) NOT NULL,
  `availability` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblrental`
--

INSERT INTO `tblrental` (`ID`, `rentalName`, `rentalPrice`, `availability`) VALUES
(1, 'Basketball Court', '300.00', '1'),
(2, 'Parking', '100.00', '1'),
(3, 'Daycare', '150.00', '2'),
(4, 'Barangay Hall', '250.00', '1'),
(5, 'Barangay Van', '30.00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tblresident`
--

CREATE TABLE `tblresident` (
  `ID` int(10) NOT NULL,
  `Purok` int(11) NOT NULL,
  `houseUnit` int(11) NOT NULL,
  `streetName` varchar(200) NOT NULL,
  `Cellphnumber` varchar(12) DEFAULT NULL,
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
  `sssNumber` varchar(50) DEFAULT NULL,
  `tinNumber` varchar(50) DEFAULT NULL,
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
(1, 3, 534, 'Old Sta. Mesa', '09056602669', 'ledesma.francinevoltaire@ue.edu.ph', '123', '2021-04-12 19:36:11', 'Yes', '123', 'Rental/Boarder', 'Ledesma', '', 'Marithess', 'Cortez', 'Manila', 'Male', '123123123', '1231321', 'Single', '2012-04-05 00:00:00', '', '', 'Active'),
(2, 2, 323, 'Narra', '09178078237', 'virayvergel10@gmail.com', '123', '2021-04-12 20:14:26', 'No', '', 'Care Taker', 'Viray', 'Sr.', 'Vergel', 'Sallan', 'Manila', 'Male', '123123123', '3212312', 'Single', '2015-04-01 00:00:00', '', '', 'Active'),
(4, 3, 543, 'Mangga', '09291581899', 'viray.vergel@ue.edu.ph', '123', '2021-04-20 07:49:54', 'Yes', '123', 'Living with Relatives', 'Sallan', 'Jr.', 'Arnold', 'Clavio', 'Manila', 'Female', '12512312', '12315123', 'Married', '2011-04-01 00:00:00', '', '', 'Active'),
(5, 5, 124, 'Sarmiento', '09154708062', 'nathan@gmail.com', '123', '2021-04-20 08:22:54', 'Yes', '123', 'Rental/Boarder', 'Morales', 'Sr.', 'Nathan', 'Pacquiao', 'Manila', 'Male', '123123', '12315123', 'Married', '2008-02-20 00:00:00', '', '', 'Active'),
(7, 7, 722, 'Mangga Ext.', '09776819795', 'uy@gmail.com', '123', '2021-05-07 08:42:16', 'No', '', 'Living with Relatives', 'Uy', '', 'Wilvin', 'Voltaire', 'Visayas', 'Female', '45145451', '61451451', 'Married', '2013-01-07 00:00:00', '', '', 'Active'),
(9, 9, 999, 'Narra', '09704954526', 'velasco@gmail.com', '123', '2021-05-07 08:51:28', 'Yes', '2147483647', 'House Owner', 'Velasco', '', 'Sheena', 'Marie', 'Manila', 'Female', '1641461346', '1435614', 'Married', '2011-01-07 00:00:00', '', '', 'Active'),
(10, 10, 100, 'Sampaloc', '09052420827', 'ligs@gmail.com', '123', '2021-05-07 08:52:28', 'Yes', '514512345', 'Living with Relatives', 'Ligutom', '', 'Zyra', 'Ligs', 'Manila', 'Female', '1451345134', '1451243513', 'Widow', '2014-01-07 00:00:00', '', '', 'Active'),
(13, 2, 123, 'Old Sta. Mesa', '09154708062', 'bins@gmail.com', 'Bins123x', '2021-11-06 08:12:06', 'No', '', 'Rental/Boarder', 'sunhose', 'Sr.', 'Vinz', 'Dangkol', NULL, 'Male', '0', '0', 'Married', '1955-12-12 00:00:00', 'Jayvee Dragon Celestial ', '', 'Deceased'),
(14, 1, 222, 'V. Mapa', '09052420827', 'jim@gmail.com', '123x', '2021-11-06 13:45:50', 'Yes', '0212', 'Rental/Boarder', 'Ledes', 'Jr.', 'Sedel', 'Deles', NULL, 'Male', '123123123', '123123123', 'Single', '1991-05-26 00:00:00', 'Jayvee', '', 'Inactive'),
(16, 2, 23, 'Peralta 3', '09056602669', 'snow@gmail.com', '123', '2021-11-10 07:44:06', 'No', '', 'House Owner', 'Vi', 'Ray', 'Ver', 'Gel', 'Manila', 'Male', NULL, NULL, 'Single', '1961-10-19 15:42:11', '', '', 'Active'),
(17, 6, 2222, 'Peralta Int.', '09154708062', 'virayvergel10@gmail.com', 'Barangay599', '2021-11-12 06:16:32', 'No', '', 'House Owner', 'XD', '', 'Personal', 'Information', 'Manila', 'Male', '0', '0', 'Single', '2008-01-12 00:00:00', '', '', 'Rejected'),
(18, 6, 123, 'Peralta Int.', '09291581899', 'ledesma.francinevoltaire@ue.edu.ph', 'Barangay599', '2021-11-12 06:51:34', 'No', '', 'House Owner', 'Legaspi', 'Jr.', 'Zyra', 'Mae', NULL, 'Male', '0', '0', 'Single', '1974-12-09 00:00:00', '', '', 'Active'),
(19, 4, 2313, 'Mangga', '09052420827', '', 'Barangay599', '2021-11-12 10:59:01', 'No', '', 'House Owner', 'Vert', '', 'Lil', 'Uzi', 'Manila', 'Male', '0', '0', 'Single', '1984-07-23 00:00:00', '', '', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `tblrespondents`
--

CREATE TABLE `tblrespondents` (
  `ID` int(11) NOT NULL,
  `bID` int(11) NOT NULL,
  `Respondents` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblservices`
--

CREATE TABLE `tblservices` (
  `ID` int(11) NOT NULL,
  `sertype` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblservices`
--

INSERT INTO `tblservices` (`ID`, `sertype`) VALUES
(1, 'Certification'),
(2, 'Rental'),
(3, 'Blotter');

-- --------------------------------------------------------

--
-- Table structure for table `tblstatus`
--

CREATE TABLE `tblstatus` (
  `ID` int(11) NOT NULL,
  `statusName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblstatus`
--

INSERT INTO `tblstatus` (`ID`, `statusName`) VALUES
(1, 'PENDING'),
(2, 'APPROVED'),
(3, 'PAYMENT VERIFICATION'),
(4, 'PAYMENT VERIFIED'),
(5, 'FOR PICK-UP'),
(6, 'SETTLED'),
(7, 'PAYMENT REJECTED'),
(8, 'REJECTED/CANCELLED');

-- --------------------------------------------------------

--
-- Table structure for table `tblstreet`
--

CREATE TABLE `tblstreet` (
  `ID` int(11) NOT NULL,
  `Purok` int(11) NOT NULL,
  `streetName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblstreet`
--

INSERT INTO `tblstreet` (`ID`, `Purok`, `streetName`) VALUES
(1, 1, 'Old Sta. Mesa'),
(2, 1, 'V. Mapa'),
(3, 1, 'Peralta'),
(4, 2, 'Old Sta. Mesa'),
(5, 2, 'Peralta 2'),
(6, 2, 'Peralta 3'),
(7, 2, 'Mulawin'),
(8, 3, 'Old Sta. Mesa'),
(9, 3, 'Narra'),
(10, 3, 'Anahaw'),
(11, 3, 'Mulawin'),
(12, 4, 'Peralta 3'),
(13, 4, 'Mulawin'),
(14, 4, 'Mangga'),
(15, 4, 'Narra'),
(16, 5, 'V. Mapa'),
(17, 5, 'Sarmiento'),
(18, 5, 'Peralta Int.'),
(19, 6, 'Peralta Int.'),
(20, 6, 'Peralta Ext.'),
(21, 6, 'Sarmiento'),
(22, 7, 'Peralta Ext.'),
(23, 7, 'Mangga'),
(24, 7, 'Mangga Ext.'),
(25, 8, 'Mangga'),
(26, 8, 'Mangga Ext.'),
(27, 8, 'Dita'),
(28, 9, 'Mangga'),
(29, 9, 'Dita'),
(30, 9, 'Narra'),
(31, 10, 'Old Sta. Mesa'),
(32, 10, 'Narra'),
(33, 10, 'Sampaloc');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblannouncement`
--
ALTER TABLE `tblannouncement`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblavailability`
--
ALTER TABLE `tblavailability`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblblotter`
--
ALTER TABLE `tblblotter`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblbtype`
--
ALTER TABLE `tblbtype`
  ADD PRIMARY KEY (`bID`);

--
-- Indexes for table `tblcertificate`
--
ALTER TABLE `tblcertificate`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblcreatecertificate`
--
ALTER TABLE `tblcreatecertificate`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblcreaterental`
--
ALTER TABLE `tblcreaterental`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbldays`
--
ALTER TABLE `tbldays`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblinformation`
--
ALTER TABLE `tblinformation`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbllistpurok`
--
ALTER TABLE `tbllistpurok`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblloginaudits`
--
ALTER TABLE `tblloginaudits`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblmodes`
--
ALTER TABLE `tblmodes`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblpaymentlogs`
--
ALTER TABLE `tblpaymentlogs`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblpositions`
--
ALTER TABLE `tblpositions`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblpurposes`
--
ALTER TABLE `tblpurposes`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblrental`
--
ALTER TABLE `tblrental`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblresident`
--
ALTER TABLE `tblresident`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblrespondents`
--
ALTER TABLE `tblrespondents`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblservices`
--
ALTER TABLE `tblservices`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblstatus`
--
ALTER TABLE `tblstatus`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblstreet`
--
ALTER TABLE `tblstreet`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tblannouncement`
--
ALTER TABLE `tblannouncement`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tblavailability`
--
ALTER TABLE `tblavailability`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblblotter`
--
ALTER TABLE `tblblotter`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblbtype`
--
ALTER TABLE `tblbtype`
  MODIFY `bID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblcertificate`
--
ALTER TABLE `tblcertificate`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tblcreatecertificate`
--
ALTER TABLE `tblcreatecertificate`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tblcreaterental`
--
ALTER TABLE `tblcreaterental`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbldays`
--
ALTER TABLE `tbldays`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblinformation`
--
ALTER TABLE `tblinformation`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbllistpurok`
--
ALTER TABLE `tbllistpurok`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tblloginaudits`
--
ALTER TABLE `tblloginaudits`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tblmodes`
--
ALTER TABLE `tblmodes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblpaymentlogs`
--
ALTER TABLE `tblpaymentlogs`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblpositions`
--
ALTER TABLE `tblpositions`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblpurposes`
--
ALTER TABLE `tblpurposes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tblrental`
--
ALTER TABLE `tblrental`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblresident`
--
ALTER TABLE `tblresident`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tblrespondents`
--
ALTER TABLE `tblrespondents`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblservices`
--
ALTER TABLE `tblservices`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblstatus`
--
ALTER TABLE `tblstatus`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tblstreet`
--
ALTER TABLE `tblstreet`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
