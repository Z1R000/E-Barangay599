-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2021 at 05:28 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

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
(27, 'asdasd', '2021-11-13 14:06:24', '2021-11-19 00:00:00', '2021-11-30 00:00:00', 1);

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
  `blotterType` varchar(50) NOT NULL,
  `incidentLocation` varchar(50) NOT NULL,
  `incidentDate` datetime NOT NULL,
  `respondent` varchar(500) NOT NULL,
  `complainant` varchar(500) NOT NULL,
  `blotterSummary` varchar(1000) NOT NULL,
  `blotterStatus` varchar(50) NOT NULL,
  `summonSchedule` datetime NOT NULL,
  `blotterCreationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `adminID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblblotter`
--

INSERT INTO `tblblotter` (`ID`, `blotterType`, `incidentLocation`, `incidentDate`, `respondent`, `complainant`, `blotterSummary`, `blotterStatus`, `summonSchedule`, `blotterCreationDate`, `adminID`) VALUES
(1, 'Property Damage', 'Tindahan ni aling nenas', '2021-04-22 13:29:00', 'Ledesma, Marithe Francois', 'Sallan, Arnold', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n\r\n', 'On-Going', '2021-04-22 13:51:00', '2021-04-29 13:04:00', 1),
(2, 'Property Damage', 'Tapat ni aling gloria', '2021-04-22 20:03:00', 'Kim delacruz', 'Juan delacruz', 'Nagwawala si kim', 'Fulfilled', '2021-04-22 09:05:00', '2021-04-22 12:04:20', 1),
(3, 'Robbery', 'Bahay ni natham', '2021-04-22 23:50:00', 'Sallan, Arnold', 'Nathan', 'Nagnakaw', 'On-Going', '2021-04-22 23:53:00', '2021-04-22 15:51:11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblblotterrequest`
--

CREATE TABLE `tblblotterrequest` (
  `ID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `blotterType` varchar(50) NOT NULL,
  `incidentLocation` varchar(120) NOT NULL,
  `incidentDate` datetime NOT NULL,
  `respondent` varchar(500) NOT NULL,
  `complainant` varchar(500) NOT NULL,
  `blotterSummary` varchar(1000) NOT NULL,
  `requestStatus` varchar(50) NOT NULL,
  `requestDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblblotterrequest`
--

INSERT INTO `tblblotterrequest` (`ID`, `userID`, `blotterType`, `incidentLocation`, `incidentDate`, `respondent`, `complainant`, `blotterSummary`, `requestStatus`, `requestDate`) VALUES
(1, 2, 'Property Damage', 'Tapat nila Aling Lilia', '2021-04-22 05:44:51', 'Ledesma, Marithe Francois', 'Sallan, Arnold', 'Tinapon ang mga paninda', 'Pending', '2021-04-22 07:44:44'),
(2, 1, 'Violence', 'Tapat ng bahay ni chairman', '2021-04-24 21:45:00', 'Dela Cruz, Kim Renzo', 'Viray, Vergel', 'Alitan hanggang sa magkaroon na ng pisikalan', 'Pending', '2021-04-24 13:45:46');

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
  `CertText` varchar(500) NOT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcertificate`
--

INSERT INTO `tblcertificate` (`ID`, `Type`, `CertificateName`, `CertificatePrice`, `CertText`, `CreationDate`) VALUES
(1, 1, 'Barangay Certificate', '121.00', 'Text Sample', '2021-04-21 13:45:50'),
(2, 1, 'Barangay Clearance', '30.00', 'Text Sample', '2021-04-21 13:45:50'),
(3, 1, 'Barangay Permit', '150.00', 'Text Sample', '2021-04-21 13:45:50'),
(4, 1, 'Proof of Residency', '120.00', 'Text Sample', '2021-04-21 13:45:50'),
(6, 2, 'Business Clearance Capital - Php10,000 Below', '100.00', 'Text Sample', '2021-04-21 13:45:50'),
(7, 2, 'Business Clearance Capital - Php10,001 - Php100-000', '500.00', 'Text Sample', '2021-04-21 14:25:51'),
(8, 2, 'Business Clearance Capital - Php100,001 - Above', '1000.00', 'Text Sample', '2021-04-21 14:25:51'),
(9, 1, 'Certificate of Good Moral', '90.00', 'Text Sample', '2021-04-21 14:25:51'),
(10, 1, 'Lipat-bahay Clearance', '105.00', 'Text Sample', '2021-04-21 14:25:51'),
(11, 1, 'Certificate of Acceptance', '56.00', 'Text Sample', '2021-04-21 14:25:51'),
(12, 1, 'Certificate of Cohabitation', '113.00', 'Text Sample', '2021-04-21 14:25:51'),
(13, 1, 'Certificate of Indigency', '356.00', 'Text Sample', '2021-04-21 14:25:51'),
(14, 1, 'Certificate to File Action', '250.00', 'Text Sample', '2021-04-21 14:25:51'),
(15, 1, 'Barangay ID', '50.00', 'Text Sample', '2021-04-21 14:28:00'),
(17, 1, 'Referral Recommendation', '50.00', 'Text Sample', '2021-04-21 14:28:00');

-- --------------------------------------------------------

--
-- Table structure for table `tblcertificaterequest`
--

CREATE TABLE `tblcertificaterequest` (
  `ID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `certificateID` int(11) NOT NULL,
  `Purpose` varchar(100) NOT NULL,
  `other` varchar(100) NOT NULL,
  `pMode` varchar(20) NOT NULL,
  `bName` varchar(100) NOT NULL,
  `requestStatus` varchar(50) NOT NULL DEFAULT 'Pending',
  `requestDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcertificaterequest`
--

INSERT INTO `tblcertificaterequest` (`ID`, `userID`, `certificateID`, `Purpose`, `other`, `pMode`, `bName`, `requestStatus`, `requestDate`) VALUES
(1, 1, 4, '', '', '', '', 'Pending', '2021-04-22 07:20:19'),
(2, 3, 2, '', '', '', '', 'Pending', '2021-04-22 07:20:19'),
(3, 2, 11, '', '', '', '', 'Pending', '2021-04-22 07:20:19'),
(4, 1, 2, '', '', '', '', 'Pending', '2021-04-24 13:28:20'),
(6, 1, 15, '', '', '', '', 'Pending', '2021-04-24 14:51:42'),
(7, 1, 1, '', '', '', '', 'Pending', '2021-09-14 14:28:17'),
(8, 1, 9, 'OTHERS', 'SCHOOL', 'G-Cash', '', 'Pending', '2021-11-10 17:12:06'),
(9, 1, 7, 'EMPLOYMENT/WORK', '', 'G-Cash', 'Ledesma Store', 'Pending', '2021-11-10 17:20:22');

-- --------------------------------------------------------

--
-- Table structure for table `tblcreatecertificate`
--

CREATE TABLE `tblcreatecertificate` (
  `ID` int(10) NOT NULL,
  `Userid` varchar(120) DEFAULT NULL,
  `CertificateId` varchar(100) NOT NULL,
  `resDate` timestamp NULL DEFAULT current_timestamp(),
  `cAdmin` varchar(50) DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT '1',
  `pMode` varchar(10) NOT NULL,
  `Purpose` varchar(100) NOT NULL,
  `other` varchar(100) NOT NULL,
  `bName` varchar(50) NOT NULL DEFAULT 'N/A',
  `content` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcreatecertificate`
--

INSERT INTO `tblcreatecertificate` (`ID`, `Userid`, `CertificateId`, `resDate`, `cAdmin`, `status`, `pMode`, `Purpose`, `other`, `bName`, `content`) VALUES
(1, '2', '13', '2021-11-13 15:12:57', 'Chairperson Ledesma', '2', 'G-Cash', 'OTHERS', 'sad', '', ''),
(2, '1', '9', '2021-11-13 15:20:38', 'Chairperson Ledesma', '2', 'G-Cash', 'MEMBERSHIP/NEW ID', '', '', '<p>asdasd</p>\r\n'),
(3, '1', '13', '2021-11-13 16:03:46', 'Chairperson Ledesma', '2', 'G-Cash', 'MEMBERSHIP/NEW ID', '', '', ''),
(4, '2', '9', '2021-11-13 16:13:21', 'Chairperson Ledesma', '3', 'Cash', 'MEMBERSHIP/NEW ID', '', '', '');

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
  `payable` decimal(16,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 'BARANGAY 599, ZONE 59, DISTRICT VI', '4745 Peralta St. V. Mapa Sta. Mesa, Manila', 'OFFICE OF THE SANGGUNIANG BARANGAY', 'images/barangay.png', 'images/maynila.png', '09123456789', 'images/admin-logo.png', 'Barangay 599 has been one of the forerunning barangays along the streets of “Victorino Mapa” and as stated by a corresponding local of the barangay it has been established way before she was born which was during the early 1970’s and since then, not many integrations were made nor committed by the municipality. According to the barangay’s secretary, there are about 5,600 registered citizens. Barangay 599’s roster of officials is composed of the Barangay Chairman (Jose Milo L. Lacatan), Barangay Secretary (Maria Cecilia C. Dela Cruz),. SK Chairman and Kagawads (Erwin L. Sampaga, Florante V. Bonagua, Crisantro G. Lorica, Alexander S. Ceño, Nelson L. Labrador, Marivic Villareal). Supporting these leaders are the 20 barangay enforcers, 20 “lupontagapamayapa’s”, 3 advisers and being composed of 10 puroks, 10 purok leaders. However, mostly the secretary’s team and the chairman handle the processes, queries, and requests of their residents..', ' Barangay 599 E-barangay', 'Barangay 599', 'images/qr.png');

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
(8, '12:29:28', '00:00:00', 1, 1, '2021-11-13');

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
  `refNum` int(11) NOT NULL,
  `proof` varchar(1000) NOT NULL,
  `servicetype` int(11) NOT NULL,
  `request` int(11) NOT NULL,
  `payment` decimal(16,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblpaymentlogs`
--

INSERT INTO `tblpaymentlogs` (`ID`, `mode`, `payorName`, `refNum`, `proof`, `servicetype`, `request`, `payment`) VALUES
(1, 1, 1, 12134123, '/images/nirvanalogo.jpg', 2, 1, '230.00');

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
(1, 'OPEN ACCOUNT/LOAN', 'certification'),
(2, 'MEMBERSHIP/NEW ID', 'certification'),
(3, 'EMPLOYMENT/WORK', 'certification'),
(4, 'MEDICAL ASSISTANCE', 'certification'),
(5, 'BURIAL ASSISTANCE', 'certification'),
(6, 'FINANCIAL ASSISTANCE', 'certification'),
(7, 'SCHOLARSHIP/BOARD EXAM/EN', 'certification'),
(8, 'BIRTH CERTIFICATE/MARRIAGE', 'certification'),
(9, 'SEMINARS/MEETINGS', 'rental'),
(10, 'SOCIAL GATHERING', 'rental'),
(11, 'SPORTS', 'rental'),
(12, 'MEDICAL', 'rental');

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
(4, 'Barangay Hall', '250.00', '2');

-- --------------------------------------------------------

--
-- Table structure for table `tblrentalrequest`
--

CREATE TABLE `tblrentalrequest` (
  `ID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `rentalID` int(11) NOT NULL,
  `rentalStartDate` datetime NOT NULL,
  `rentalEndDate` datetime NOT NULL,
  `rentalStatus` varchar(50) NOT NULL,
  `requestDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblrentalrequest`
--

INSERT INTO `tblrentalrequest` (`ID`, `userID`, `rentalID`, `rentalStartDate`, `rentalEndDate`, `rentalStatus`, `requestDate`) VALUES
(1, 4, 2, '2021-04-22 15:00:00', '2021-04-22 18:00:00', 'Pending', '2021-04-22 07:02:07'),
(2, 3, 1, '2021-04-22 15:00:00', '2021-04-22 18:00:00', 'Pending', '2021-04-22 07:02:07'),
(3, 2, 4, '2021-04-22 15:00:00', '2021-04-22 18:00:00', 'Pending', '2021-04-22 07:02:07'),
(4, 1, 4, '2021-04-24 09:58:00', '2021-04-24 21:58:00', 'Pending', '2021-04-24 13:58:08'),
(5, 1, 2, '2021-04-25 16:20:00', '2021-04-25 18:20:00', 'Pending', '2021-04-25 07:19:56'),
(6, 1, 1, '2021-04-25 22:43:00', '2021-04-25 23:44:00', 'Pending', '2021-04-25 14:43:22');

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
-- Table structure for table `tblresidentrequest`
--

CREATE TABLE `tblresidentrequest` (
  `ID` int(11) NOT NULL,
  `Purok` int(11) NOT NULL,
  `houseUnit` int(11) NOT NULL,
  `streetName` varchar(200) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Suffix` varchar(50) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `MiddleName` varchar(50) NOT NULL,
  `BirthPlace` varchar(50) NOT NULL,
  `Gender` varchar(20) NOT NULL,
  `BirthDate` datetime NOT NULL,
  `CivilStatus` varchar(50) NOT NULL,
  `ResidentType` varchar(50) NOT NULL,
  `Cellphnumber` int(11) NOT NULL,
  `voter` varchar(3) NOT NULL,
  `vPrecinct` text NOT NULL,
  `sssNumber` int(50) NOT NULL,
  `tinNumber` int(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `HomeName` varchar(100) NOT NULL,
  `reqStatus` varchar(20) NOT NULL,
  `rejReason` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblresidentrequest`
--

INSERT INTO `tblresidentrequest` (`ID`, `Purok`, `houseUnit`, `streetName`, `LastName`, `Suffix`, `FirstName`, `MiddleName`, `BirthPlace`, `Gender`, `BirthDate`, `CivilStatus`, `ResidentType`, `Cellphnumber`, `voter`, `vPrecinct`, `sssNumber`, `tinNumber`, `Email`, `Password`, `CreationDate`, `HomeName`, `reqStatus`, `rejReason`) VALUES
(3, 2, 1231, 'Old Sta. Mesa', 'MA', 'Jr.', 'LE', 'DES', '', 'Male', '1965-05-16 00:00:00', 'Single', 'Rental/Boarder', 2147483647, 'Yes', '2a', 0, 0, 'v@gmail.com', 'Ledesma123', '2021-11-10 16:37:29', 'Vergel Sallan Viray Sr.', 'Rejected', ''),
(4, 3, 213, 'Old Sta. Mesa', 'Vi', 'Ray', 'Ver', 'Gel', 'Tondo Manila', 'Male', '1975-05-04 00:00:00', 'Single', 'House Owner', 2147483647, 'No', '', 0, 0, 'varay@gmail.com', 'Barangay599', '2021-11-06 15:17:08', '', 'Rejected', '');

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
-- Indexes for table `tblblotterrequest`
--
ALTER TABLE `tblblotterrequest`
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
-- Indexes for table `tblcertificaterequest`
--
ALTER TABLE `tblcertificaterequest`
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
-- Indexes for table `tblrentalrequest`
--
ALTER TABLE `tblrentalrequest`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblresident`
--
ALTER TABLE `tblresident`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblresidentrequest`
--
ALTER TABLE `tblresidentrequest`
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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

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
-- AUTO_INCREMENT for table `tblblotterrequest`
--
ALTER TABLE `tblblotterrequest`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- AUTO_INCREMENT for table `tblcertificaterequest`
--
ALTER TABLE `tblcertificaterequest`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tblcreatecertificate`
--
ALTER TABLE `tblcreatecertificate`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblcreaterental`
--
ALTER TABLE `tblcreaterental`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tblrental`
--
ALTER TABLE `tblrental`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblrentalrequest`
--
ALTER TABLE `tblrentalrequest`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblresident`
--
ALTER TABLE `tblresident`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tblresidentrequest`
--
ALTER TABLE `tblresidentrequest`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tblstreet`
--
ALTER TABLE `tblstreet`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
