-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2021 at 11:52 PM
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
('virayvergel10@gmail.com', 'v?xJ?????????GE6e0abc97b5', '2021-11-06 16:22:00'),
('ledes@gmail.com', 'v?xJ?????????GEef38972bd3', '2021-11-19 08:58:05'),
('virayvergel10@gmail.com', 'v?xJ?????????GE4232583c32', '2021-11-19 08:58:21');

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
(29, 'Check', '2021-11-17 03:41:41', '2021-11-17 03:40:00', '2021-11-17 03:41:00', 1),
(30, 'asdfasdf', '2021-11-18 21:01:22', '2021-11-18 21:00:00', '2021-11-19 21:00:00', 1);

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
  `other` varchar(100) NOT NULL,
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

INSERT INTO `tblblotter` (`ID`, `compStatus`, `blotterType`, `other`, `incidentLocation`, `incidentDate`, `numres`, `respondent`, `complainant`, `numpers`, `invPers`, `blotterSummary`, `blotterStatus`, `sumStatus`, `summonSchedule`, `blotterCreationDate`, `adminID`) VALUES
(1, 'Resident', '1', '', 'Near aling nenaasfasdf', '2021-11-18 01:27:00', '7', 'asdfasdf,2,3,4,5,6,7,', 'Ledesma Marithess', '11', 'Arnold Sallan,1,2,3,4,5,6,7,8,9,10,', 'This timel;dsjfgbhsk,ldfgj XD', 'PENDING', '', '0000-00-00 00:00:00', '2021-11-17 17:27:48', 1),
(2, 'Outsider', '1', '', 'Near aling nena', '2021-11-18 16:18:00', '4', 'Kagawad Sallan,Kagawad Ledesma,Kagawad Viray,Kagawad Kim,', 'Ledesma Marithess', '3', 'Arnold Sallan,Ledesma asd,Viray sad,', 'asdfasdf', 'PENDING', 'No', '0000-00-00 00:00:00', '2021-11-18 08:18:42', 1),
(3, 'Outsider', '0', 'adfasdfasdfasdfasdf', 'Near aling nena', '2021-11-18 20:57:00', '7', 'Kagawad Sallan,Kagawad Ledesma,Kagawad Viray,Kagawad Kim,Kagawad Nat,Kagawad dawagaK,7,', 'Ledesma Marithess', '11', 'Arnold Sallan,Ledesma asd,Viray sad,Kim das,Nathan dsa,345234523452x345,2x342x34552x34,afgadfg,asfdasdf,asdfadf,adfasdf,', 'Narrative sada', 'PENDING', '', '0000-00-00 00:00:00', '2021-11-18 12:57:37', 1);

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
(0, 'OTHERS'),
(1, 'PROPERTY DAMAGE'),
(2, 'VIOLENCE'),
(3, 'PUBLIC DISTURBANCE'),
(4, 'ROBBERY');

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
  `bName` varchar(50) NOT NULL DEFAULT 'N/A',
  `remarks` mediumtext DEFAULT NULL,
  `diff` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcreatecertificate`
--

INSERT INTO `tblcreatecertificate` (`ID`, `Userid`, `CertificateId`, `resDate`, `status`, `pMode`, `purpID`, `other`, `bName`, `remarks`, `diff`) VALUES
(1, '1', '4', '2021-11-20 14:43:12', '6', 'G-Cash', 2, '', '', 'asda', 'With change: 21,190.00'),
(2, '1', '4', '2021-11-20 20:59:49', '4', 'G-Cash', 3, '', '', NULL, NULL);

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
(1, 4, 1, 1, 0, '2021-11-20 22:58:00', '2021-11-20 23:58:00', '2021-11-20 22:58:29', 1, 9, '300.00', '', 0, '', '0.00');

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
  `qr` varchar(1000) NOT NULL,
  `reslogo` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblinformation`
--

INSERT INTO `tblinformation` (`ID`, `Baddress`, `bFullAdd`, `Btitle`, `Blogoone`, `Blogotwo`, `bContact`, `blogo3`, `aboutus`, `eTitle`, `gName`, `qr`, `reslogo`) VALUES
(1, 'BARANGAY 599, ZONE 59, DISTRICT VI', '4745 Peralta St. V. Mapa Sta. Mesa, Manila', 'OFFICE OF THE SANGGUNIANG BARANGAY', '../../images/6196601977e9a4.10584123.png', '../../images/6197bee5a723e6.16409319.png', '09123456789', '../images/61954f98d32fd1.81087863.png', 'Barangay 599 has been one of the forerunning barangays along the streets of “Victorino Mapa” and as stated by a corresponding local of the barangay it has been established way before she was born which was during the early 1970’s and since then, not many integrations were made nor committed by the municipality. According to the barangay’s secretary, there are about 5,600 registered citizens. Barangay 599’s roster of officials is composed of the Barangay Chairman (Jose Milo L. Lacatan), Barangay Secretary (Maria Cecilia C. Dela Cruz),. SK Chairman and Kagawads (Erwin L. Sampaga, Florante V. Bonagua, Crisantro G. Lorica, Alexander S. Ceño, Nelson L. Labrador, Marivic Villareal). Supporting these leaders are the 20 barangay enforcers, 20 “lupontagapamayapa’s”, 3 advisers and being composed of 10 puroks, 10 purok leaders. However, mostly the secretary’s team and the chairman handle the processes, queries, and requests of their residents..', ' Barangay 599 E-barangay', 'Barangay 599', '../../images/6196647b7e5b65.95929099.png', '../../images/619660f9739845.24677801.png');

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
(34, '22:30:36', '00:00:00', 1, 1, '2021-11-17'),
(35, '16:02:12', '04:07:10', 1, 1, '2021-11-18'),
(36, '16:07:33', '00:00:00', 1, 1, '2021-11-18'),
(37, '16:07:53', '00:00:00', 1, 1, '2021-11-18'),
(38, '17:18:55', '06:11:48', 1, 1, '2021-11-18'),
(39, '18:25:48', '00:00:00', 1, 1, '2021-11-18'),
(40, '18:51:54', '00:00:00', 1, 1, '2021-11-18'),
(41, '20:35:24', '10:20:06', 1, 1, '2021-11-18'),
(42, '22:22:33', '00:00:00', 1, 1, '2021-11-18'),
(43, '23:10:35', '00:00:00', 1, 1, '2021-11-18'),
(44, '10:29:23', '00:00:00', 1, 1, '2021-11-19'),
(45, '20:06:44', '00:00:00', 1, 1, '2021-11-19'),
(46, '12:49:48', '00:00:00', 1, 1, '2021-11-20'),
(47, '17:45:23', '03:17:22', 1, 1, '2021-11-20'),
(48, '03:17:45', '03:29:17', 7, 4, '2021-11-21'),
(49, '03:29:39', '03:37:16', 7, 4, '2021-11-21'),
(50, '03:37:27', '04:55:32', 1, 1, '2021-11-21'),
(51, '04:56:04', '04:56:13', 2, 2, '2021-11-21'),
(52, '04:56:19', '00:00:00', 1, 1, '2021-11-21'),
(53, '05:28:57', '00:00:00', 1, 1, '2021-11-21'),
(54, '05:53:19', '05:55:57', 1, 1, '2021-11-21'),
(55, '05:56:46', '06:50:22', 1, 1, '2021-11-21');

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
  `creationID` int(11) NOT NULL,
  `refNum` int(11) DEFAULT NULL,
  `proof` varchar(1000) NOT NULL,
  `servicetype` int(11) NOT NULL,
  `paymentDate` datetime NOT NULL DEFAULT current_timestamp(),
  `payment` decimal(16,2) NOT NULL DEFAULT 0.00,
  `dateAccepted` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblpaymentlogs`
--

INSERT INTO `tblpaymentlogs` (`ID`, `mode`, `creationID`, `refNum`, `proof`, `servicetype`, `paymentDate`, `payment`, `dateAccepted`) VALUES
(1, 1, 1, 13214, '../../images/61990a172bafc9.05079001.png', 2, '2021-11-20 22:45:43', '120.00', '2021-11-20 10:46:00'),
(2, 1, 1, 2147483647, '../../images/61990d342b00c0.38426336.png', 1, '2021-11-20 22:59:00', '2500.00', '2021-11-20 11:19:00'),
(3, 1, 2, 12312312, '../../images/619961ef1866e4.06959408.png', 2, '2021-11-21 05:00:31', '211.00', '2021-11-21 05:00:00');

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
(4, 'Barangay Hallss', '250.00', '1'),
(5, 'Barangay Vanss', '30.00', '1');

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
  `resStatus` varchar(25) NOT NULL,
  `dateofRegistration` datetime NOT NULL DEFAULT current_timestamp(),
  `decreason` varchar(1000) DEFAULT NULL,
  `attachment` varchar(1000) DEFAULT NULL,
  `remarks` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblresident`
--

INSERT INTO `tblresident` (`ID`, `Purok`, `houseUnit`, `streetName`, `Cellphnumber`, `Email`, `Password`, `CreationDate`, `voter`, `vPrecinct`, `ResidentType`, `LastName`, `Suffix`, `FirstName`, `MiddleName`, `BirthPlace`, `Gender`, `sssNumber`, `tinNumber`, `CivilStatus`, `BirthDate`, `HomeName`, `PassReset`, `resStatus`, `dateofRegistration`, `decreason`, `attachment`, `remarks`) VALUES
(1, 2, 323, 'Narra', '09178078237', 'virayvergel10@gmail.com', '123', '2021-04-12 20:14:26', 'No', '', 'Care Taker', 'Viray', 'Sr.', 'Vergel', 'Sallan', 'Manila', 'Male', '123123123', '3212312', 'Single', '2015-04-01 00:00:00', '', '', 'Active', '2021-11-21 02:54:53', NULL, NULL, NULL),
(4, 3, 543, 'Mangga', '09291581899', 'viray.vergel@ue.edu.ph', '123', '2021-04-20 07:49:54', 'Yes', '123', 'Living with Relatives', 'Sallan', 'Jr.', 'Arnold', 'Clavio', 'Manila', 'Female', '12512312', '12315123', 'Married', '2011-04-01 00:00:00', '', '', 'Active', '2021-11-21 02:54:53', NULL, NULL, NULL),
(5, 5, 124, 'Sarmiento', '09154708062', 'nathan@gmail.com', '123', '2021-04-20 08:22:54', 'Yes', '123', 'Rental/Boarder', 'Morales', 'Sr.', 'Nathan', 'Pacquiao', 'Manila', 'Male', '123123', '12315123', 'Married', '2008-02-20 00:00:00', '', '', 'Active', '2021-11-21 02:54:53', NULL, NULL, NULL),
(7, 7, 722, 'Mangga Ext.', '09776819795', 'uy@gmail.com', '123', '2021-05-07 08:42:16', 'No', '', 'Living with Relatives', 'Uy', '', 'Wilvin', 'Voltaire', 'Visayas', 'Female', '45145451', '61451451', 'Married', '2013-01-07 00:00:00', '', '', 'Active', '2021-11-21 02:54:53', NULL, NULL, NULL),
(9, 9, 999, 'Narra', '09704954526', 'velasco@gmail.com', '123', '2021-05-07 08:51:28', 'Yes', '2147483647', 'House Owner', 'Velasco', '', 'Sheena', 'Marie', 'Manila', 'Female', '1641461346', '1435614', 'Married', '2011-01-07 00:00:00', '', '', 'Active', '2021-11-21 02:54:53', NULL, NULL, NULL),
(10, 10, 100, 'Sampaloc', '09052420827', 'ligs@gmail.com', '123', '2021-05-07 08:52:28', 'Yes', '514512345', 'Living with Relatives', 'Ligutom', '', 'Zyra', 'Ligs', 'Manila', 'Female', '1451345134', '1451243513', 'Widow', '2014-01-07 00:00:00', '', '', 'Active', '2021-11-21 02:54:53', NULL, NULL, NULL),
(13, 2, 123, 'Old Sta. Mesa', '09154708062', 'bins@gmail.com', 'Bins123x', '2021-11-06 08:12:06', 'No', '', 'Rental/Boarder', 'sunhose', 'Sr.', 'Vinz', 'Dangkol', NULL, 'Male', '0', '0', 'Married', '1955-12-12 00:00:00', 'Jayvee Dragon Celestial ', '', 'Deceased', '2021-11-21 02:54:53', NULL, NULL, NULL),
(14, 1, 222, 'V. Mapa', '09052420827', 'jim@gmail.com', '123x', '2021-11-06 13:45:50', 'Yes', '0212', 'Rental/Boarder', 'Ledes', 'Jr.', 'Sedel', 'Deles', NULL, 'Male', '123123123', '123123123', 'Single', '1991-05-26 00:00:00', 'Jayvee', '', 'Inactive', '2021-11-21 02:54:53', NULL, NULL, NULL),
(16, 2, 23, 'Peralta 3', '09056602669', 'snow@gmail.com', '123', '2021-11-10 07:44:06', 'No', '', 'House Owner', 'Vi', 'Ray', 'Ver', 'Gel', 'Manila', 'Male', NULL, NULL, 'Single', '1961-10-19 15:42:11', '', '', 'Active', '2021-11-21 02:54:53', NULL, NULL, NULL),
(17, 6, 2222, 'Peralta Int.', '09154708062', 'virayvergel10@gmail.com', 'Barangay599', '2021-11-12 06:16:32', 'No', '', 'House Owner', 'XD', '', 'Personal', 'Information', 'Manila', 'Male', '0', '0', 'Single', '2008-01-12 00:00:00', '', '', 'Rejected', '2021-11-21 02:54:53', NULL, NULL, NULL),
(18, 6, 123, 'Peralta Int.', '09291581899', 'ledesma.francinevoltaire@ue.edu.ph', 'Barangay599', '2021-11-12 06:51:34', 'No', '', 'House Owner', 'Legaspi', 'Jr.', 'Zyra', 'Mae', NULL, 'Male', '0', '0', 'Single', '1974-12-09 00:00:00', '', '', 'Active', '2021-11-21 02:54:53', NULL, NULL, NULL),
(19, 4, 2313, 'Mangga', '09052420827', '', 'Barangay599', '2021-11-12 10:59:01', 'No', '', 'House Owner', 'Vert', '', 'Lil', 'Uzi', 'Manila', 'Male', '0', '0', 'Single', '1984-07-23 00:00:00', '', '', 'Rejected', '2021-11-21 02:54:53', NULL, NULL, NULL),
(12234, 1, 322, 'Old Sta. Mesa', '09291581899', 'vergel@gmail.com', 'Barangay599', '2021-11-18 12:38:24', 'No', '', 'House Owner', 'Sallan', '', 'vergel', 'Clavio', NULL, 'Male', '', '', 'Single', '1999-02-18 00:00:00', '', '', 'Active', '2021-11-21 02:54:53', NULL, NULL, NULL),
(12236, 4, 123124, 'Peralta 3', '09123456789', 'asdas@mail.com', 'dummy123AA', '2021-11-20 21:23:24', 'No', '', 'Care Taker', 'lastname', 'Jr.', 'pog', 'asdf', NULL, 'Female', '5555555', '5552222', 'Single', '2021-11-10 00:00:00', '', '', 'Active', '2021-11-21 05:23:24', NULL, 'images/6199674c544611.79855851.png', NULL),
(12237, 2, 1234567, 'Mulawins', '09123456789', 'delacruz@mail.com', 'dummy123AA', '2021-11-20 21:28:51', 'No', '', 'Care Taker', 'manong', '', 'super', 'asdf', 'bagumbayan', 'Male', '1234', '1221412', 'Married', '1993-07-15 00:00:00', '', '', 'Rejected', '2021-11-21 05:28:51', '', 'images/61996893a92e03.22836107.png', 'kgjh'),
(12238, 2, 1234567, 'Mulawins', '09123456789', 'kwe@gmail.com', 'dummy123AA', '2021-11-20 21:53:12', 'No', '', 'Care Taker', 'manong', 'asda', 'pog', 'Renzo', 'pinas', 'Female', '1234', '1234', 'Married', '2002-03-20 00:00:00', '', '', 'Pending', '2021-11-21 05:53:12', '', 'images/61996e483ccf29.25568471.png', ''),
(12239, 6, 1234567, 'Peralta Int.', '09123456789', 'asfasf.roc@mail.com', 'dummy123AA', '2021-11-20 21:56:37', 'No', '', 'House Owner', 'manong', 'asda', 'Kim', 'asdf', 'pinas', 'Female', '5555555', '5552222', 'Married', '2021-11-11 00:00:00', '', '', 'Rejected', '2021-11-21 05:56:37', 'ughjk', 'images/61996f15179520.34500526.png', 'hj'),
(12240, 7, 1234567, 'Mangga', '09123456789', 'asadfs@gmail.com', 'dummy123AA', '2021-11-20 22:49:40', 'No', '', 'Care Taker', 'manong', 'Jr.', 'pog', 'asdf', NULL, 'Male', '1234', '5552222', 'Married', '2021-11-20 00:00:00', '', '', 'Active', '2021-11-21 06:49:40', NULL, '../../images/61997b84aaca09.19094547.png', NULL),
(12241, 9, 123124, 'Dita', '09123456789', 'aasdasdas@gmail.com', 'dummy123AA', '2021-11-20 22:51:05', 'No', '', 'House Owner', 'Dela Cruz', '', 'pog', 'mname', 'bagumbayan', 'Male', '1234', '5552222', 'Separated', '2018-06-13 00:00:00', '', '', 'Pending', '2021-11-21 06:51:05', NULL, 'images/61997bd9e7ff50.71360137.png', NULL);

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
(1, 'Rental'),
(2, 'Certification'),
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
(1, 4, 'Old Sta. Mesas'),
(2, 1, 'V. Mapa'),
(3, 1, 'Peralta'),
(4, 5, 'Old Sta. Mesa'),
(5, 2, 'Mulawins'),
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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tblavailability`
--
ALTER TABLE `tblavailability`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblblotter`
--
ALTER TABLE `tblblotter`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblbtype`
--
ALTER TABLE `tblbtype`
  MODIFY `bID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblcertificate`
--
ALTER TABLE `tblcertificate`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tblcreatecertificate`
--
ALTER TABLE `tblcreatecertificate`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblcreaterental`
--
ALTER TABLE `tblcreaterental`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `tblmodes`
--
ALTER TABLE `tblmodes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblpaymentlogs`
--
ALTER TABLE `tblpaymentlogs`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12242;

--
-- AUTO_INCREMENT for table `tblrespondents`
--
ALTER TABLE `tblrespondents`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblservices`
--
ALTER TABLE `tblservices`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
