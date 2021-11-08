-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2021 at 08:56 PM
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
  `dutyTime` time NOT NULL,
  `endDuty` time NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `AdminRegdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `resID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `residentID`, `BarangayPosition`, `dutyTime`, `endDuty`, `Email`, `Password`, `AdminRegdate`, `resID`) VALUES
(1, 1, '1', '08:00:00', '12:00:00', 'ledes@gmail.com', '123', '2021-04-20 08:08:28', 0),
(2, 2, '2', '12:00:00', '14:00:00', 'kim@gmail.com', '123', '2021-04-20 08:09:00', 0),
(3, 3, '4', '14:00:00', '18:00:00', 'viray@gmail.com', '123', '2021-04-20 08:09:21', 0),
(4, 4, '3', '18:00:00', '02:00:00', 'sallan@gmail.com', '123', '2021-04-20 16:21:55', 0),
(5, 5, '5', '02:00:00', '00:00:00', 'nathan@gmail.com', '123', '2021-04-20 16:23:13', 0),
(6, 3, '3', '00:00:00', '04:00:00', 'email@gmail.com', '123', '2021-09-22 12:35:49', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblannouncement`
--

CREATE TABLE `tblannouncement` (
  `ID` int(11) NOT NULL,
  `announcement` varchar(2000) NOT NULL,
  `announcementDate` datetime NOT NULL DEFAULT current_timestamp(),
  `endDate` datetime NOT NULL DEFAULT current_timestamp(),
  `adminID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblannouncement`
--

INSERT INTO `tblannouncement` (`ID`, `announcement`, `announcementDate`, `endDate`, `adminID`) VALUES
(1, 'Announcement Trial #1', '2021-04-22 00:00:00', '2021-10-05 00:00:00', 1),
(2, 'Announcement Trial #2', '2021-04-22 00:00:00', '2021-10-05 00:00:00', 1),
(3, 'Announcement Trial #3', '2021-04-22 00:00:00', '2021-10-05 00:00:00', 1),
(4, 'Announcement Trial #4', '2021-04-22 00:00:00', '2021-10-05 00:00:00', 1),
(5, 'I am ledesma marithess', '2021-04-29 00:00:00', '2021-10-05 00:00:00', 1),
(6, 'Sample', '2021-05-03 00:00:00', '2021-10-05 00:00:00', 1),
(7, 'Welcome to Gmeet', '2021-05-08 00:00:00', '2021-10-05 00:00:00', 1),
(8, 'asdasdasd', '2021-10-05 18:02:26', '2021-10-05 18:02:26', 1),
(9, 'Sample Announcement October 5 2021', '2021-10-05 18:03:36', '2021-10-05 18:03:36', 1);

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
(1, 'Property Damage', 'Tindahan ni aling nena', '2021-04-22 13:29:00', 'Ledesma, Marithe Francois', 'Sallan, Arnold', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n\r\n', 'On-Going', '2021-04-22 13:51:00', '2021-04-29 13:04:00', 1),
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
-- Table structure for table `tblcertificate`
--

CREATE TABLE `tblcertificate` (
  `ID` int(10) NOT NULL,
  `Type` int(11) NOT NULL,
  `CertificateName` varchar(200) DEFAULT NULL,
  `CertificatePrice` varchar(200) DEFAULT NULL,
  `CertText` varchar(500) NOT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcertificate`
--

INSERT INTO `tblcertificate` (`ID`, `Type`, `CertificateName`, `CertificatePrice`, `CertText`, `CreationDate`) VALUES
(1, 1, 'Barangay Certificate', '121', '<p>sad</p>\r\n', '2021-04-21 13:45:50'),
(2, 1, 'Barangay Clearance', '30', '', '2021-04-21 13:45:50'),
(3, 1, 'Barangay Permit', '150', '', '2021-04-21 13:45:50'),
(4, 1, 'Proof of Residency', '120', '', '2021-04-21 13:45:50'),
(5, 2, 'Business Permit', '180', '', '2021-04-21 13:45:50'),
(6, 2, 'Business Clearance Capital - Php10,000 Below', '100', '', '2021-04-21 13:45:50'),
(7, 2, 'Business Clearance Capital - Php10,001 - Php100-000', '500', '', '2021-04-21 14:25:51'),
(8, 2, 'Business Clearance Capital - Php100,001 - Above', '1000', '', '2021-04-21 14:25:51'),
(9, 1, 'Certificate of Good Moral', '90', '', '2021-04-21 14:25:51'),
(10, 1, 'Lipat-bahay Clearance', '105', '', '2021-04-21 14:25:51'),
(11, 1, 'Certificate of Acceptance', '56', '', '2021-04-21 14:25:51'),
(12, 1, 'Certificate of Cohabitation', '113', '', '2021-04-21 14:25:51'),
(13, 1, 'Certificate of Indigency', '356', '', '2021-04-21 14:25:51'),
(14, 1, 'Certificate to File Action', '250', '', '2021-04-21 14:25:51'),
(15, 1, 'Barangay ID', '50', '', '2021-04-21 14:28:00'),
(16, 1, 'Medical Assistance/Senior Citizen', '100', '', '2021-04-21 14:28:00'),
(17, 1, 'Referral Recommendation', '50', '', '2021-04-21 14:28:00'),
(18, 1, 'Filling Fee', '80', '', '2021-04-21 14:28:00');

-- --------------------------------------------------------

--
-- Table structure for table `tblcertificaterequest`
--

CREATE TABLE `tblcertificaterequest` (
  `ID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `certificateID` int(11) NOT NULL,
  `requestStatus` varchar(50) NOT NULL,
  `requestDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcertificaterequest`
--

INSERT INTO `tblcertificaterequest` (`ID`, `userID`, `certificateID`, `requestStatus`, `requestDate`) VALUES
(1, 1, 4, 'Pending', '2021-04-22 07:20:19'),
(2, 3, 2, 'Pending', '2021-04-22 07:20:19'),
(3, 2, 11, 'Pending', '2021-04-22 07:20:19'),
(4, 1, 2, 'Pending', '2021-04-24 13:28:20'),
(6, 1, 15, 'Pending', '2021-04-24 14:51:42'),
(7, 1, 1, 'Pending', '2021-09-14 14:28:17');

-- --------------------------------------------------------

--
-- Table structure for table `tblcreatecertificate`
--

CREATE TABLE `tblcreatecertificate` (
  `ID` int(10) NOT NULL,
  `Userid` varchar(120) DEFAULT NULL,
  `CertificateId` varchar(120) DEFAULT NULL,
  `CreationId` varchar(120) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  `adminID` int(11) DEFAULT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcreatecertificate`
--

INSERT INTO `tblcreatecertificate` (`ID`, `Userid`, `CertificateId`, `CreationId`, `CreationDate`, `adminID`, `status`) VALUES
(1, '2', '2', '135792633', '2021-04-15 03:51:43', 1, 'Settled'),
(2, '2', '2', '437472239', '2021-04-22 03:38:40', 1, 'Settled'),
(3, '4', '10', '637901206', '2021-04-22 03:39:22', 1, 'Settled'),
(4, '2', '15', '464157984', '2021-04-22 09:11:03', 1, 'Settled'),
(5, '4', '9', '171104214', '2021-04-22 12:02:07', 1, 'Unsettled'),
(6, '2', '10', '382660445', '2021-04-22 13:40:24', 1, 'Settled'),
(7, '2', '6', '722036110', '2021-05-03 17:09:45', 1, 'Unsettled'),
(8, '4', '14', '239149821', '2021-05-03 17:11:02', 1, 'Settled'),
(9, '1', '7', '575394333', '2021-05-03 17:11:16', 1, 'Unsettled'),
(10, '3', '4', '362984365', '2021-05-03 17:11:48', 1, 'Unsettled');

-- --------------------------------------------------------

--
-- Table structure for table `tblcreaterental`
--

CREATE TABLE `tblcreaterental` (
  `ID` int(11) NOT NULL,
  `status` varchar(25) NOT NULL,
  `userID` int(11) NOT NULL,
  `rentalID` int(11) NOT NULL,
  `adminID` int(11) NOT NULL,
  `rentalStartDate` datetime NOT NULL,
  `rentalEndDate` datetime NOT NULL,
  `creationDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcreaterental`
--

INSERT INTO `tblcreaterental` (`ID`, `status`, `userID`, `rentalID`, `adminID`, `rentalStartDate`, `rentalEndDate`, `creationDate`) VALUES
(1, 'On-going', 3, 1, 1, '2021-04-22 13:00:00', '2021-04-22 16:00:00', '2021-11-09 03:30:20'),
(2, 'Settled', 1, 2, 1, '2021-04-22 20:03:00', '2021-04-22 20:03:00', '2021-11-09 03:30:20'),
(3, 'Cancelled', 5, 4, 1, '2021-04-22 21:45:00', '2021-04-22 12:49:00', '2021-11-09 03:30:20'),
(4, 'On-going', 3, 2, 1, '2021-05-04 02:09:00', '2021-05-04 15:10:00', '2021-11-09 03:30:20');

-- --------------------------------------------------------

--
-- Table structure for table `tblinformation`
--

CREATE TABLE `tblinformation` (
  `ID` int(11) NOT NULL,
  `Baddress` text NOT NULL,
  `Btitle` text NOT NULL,
  `Blogoone` text NOT NULL,
  `Blogotwo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblinformation`
--

INSERT INTO `tblinformation` (`ID`, `Baddress`, `Btitle`, `Blogoone`, `Blogotwo`) VALUES
(1, 'BARANGAY 599, ZONE 59, DISTRICT VI', 'OFFICE OF THE SANGGUNIANG BARANGAY\r\n', 'images/barangay.png', 'images/maynila.png');

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
(10, '10'),
(13, '11');

-- --------------------------------------------------------

--
-- Table structure for table `tblrental`
--

CREATE TABLE `tblrental` (
  `ID` int(11) NOT NULL,
  `rentalName` varchar(100) NOT NULL,
  `rentalPrice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblrental`
--

INSERT INTO `tblrental` (`ID`, `rentalName`, `rentalPrice`) VALUES
(1, 'Basketball Court', 300),
(2, 'Parking', 100),
(3, 'Daycare', 150),
(4, 'Barangay Hall', 250);

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
(3, 2, 1231, 'Old Sta. Mesa', 'MA', 'Jr.', 'LE', 'DES', '', 'Male', '1965-05-16 00:00:00', 'Single', 'Rental/Boarder', 2147483647, 'Yes', '2a', 0, 0, 'v@gmail.com', 'Ledesma123', '2021-11-06 15:16:23', 'Vergel Sallan Viray Sr.', 'Pending', ''),
(4, 3, 213, 'Old Sta. Mesa', 'Vi', 'Ray', 'Ver', 'Gel', 'Tondo Manila', 'Male', '1975-05-04 00:00:00', 'Single', 'House Owner', 2147483647, 'No', '', 0, 0, 'varay@gmail.com', 'Barangay599', '2021-11-06 15:17:08', '', 'Rejected', '');

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblannouncement`
--
ALTER TABLE `tblannouncement`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
-- AUTO_INCREMENT for table `tblcertificate`
--
ALTER TABLE `tblcertificate`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tblcertificaterequest`
--
ALTER TABLE `tblcertificaterequest`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblcreatecertificate`
--
ALTER TABLE `tblcreatecertificate`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tblcreaterental`
--
ALTER TABLE `tblcreaterental`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tblresidentrequest`
--
ALTER TABLE `tblresidentrequest`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblstreet`
--
ALTER TABLE `tblstreet`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
