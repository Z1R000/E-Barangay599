-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2021 at 08:27 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

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
  `AdminRegdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `residentID`, `BarangayPosition`, `dutyTime`, `endDuty`, `Email`, `Password`, `AdminRegdate`) VALUES
(1, 1, 'Chairperson', '08:00:00', '12:00:00', 'ledes@gmail.com', '123', '2021-04-20 08:08:28'),
(2, 2, 'Secretary', '12:00:00', '14:00:00', 'kim@gmail.com', '123', '2021-04-20 08:09:00'),
(3, 3, 'Treasurer', '14:00:00', '18:00:00', 'viray@gmail.com', '123', '2021-04-20 08:09:21'),
(4, 4, 'Kagawad', '18:00:00', '02:00:00', 'sallan@gmail.com', '123', '2021-04-20 16:21:55'),
(5, 5, 'SK-Chairman', '02:00:00', '00:00:00', 'nathan@gmail.com', '123', '2021-04-20 16:23:13'),
(6, 3, 'Kagawad', '00:00:00', '04:00:00', 'email@gmail.com', '123', '2021-09-22 12:35:49');

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
(7, 'Welcome to Gmeet', '2021-05-08 00:00:00', '2021-10-05 00:00:00', 1);

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
(1, 'Property Damage', 'Tindahan ni aling nena', '2021-04-22 13:29:00', 'Ledesma, Marithe Francois', 'Sallan, Arnold', 'Nagwawala sinira yung paninda', 'On-Going', '2021-04-22 13:51:00', '2021-04-21 21:30:27', 1),
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
  `CertificateName` varchar(200) DEFAULT NULL,
  `CertificatePrice` varchar(200) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcertificate`
--

INSERT INTO `tblcertificate` (`ID`, `CertificateName`, `CertificatePrice`, `CreationDate`) VALUES
(1, 'Barangay Certificate', '121', '2021-04-21 13:45:50'),
(2, 'Barangay Clearance', '30', '2021-04-21 13:45:50'),
(3, 'Barangay Permit', '150', '2021-04-21 13:45:50'),
(4, 'Proof of Residency', '120', '2021-04-21 13:45:50'),
(5, 'Business Permit', '180', '2021-04-21 13:45:50'),
(6, 'Business Clearance Php10,000below', '100', '2021-04-21 13:45:50'),
(7, 'Business Clearance Php10,001-Php100-000', '500', '2021-04-21 14:25:51'),
(8, 'Business Clearance Php100,001-Above', '1000', '2021-04-21 14:25:51'),
(9, 'Certificate of Good Moral', '90', '2021-04-21 14:25:51'),
(10, 'Lipat-bahay Clearance', '105', '2021-04-21 14:25:51'),
(11, 'Certificate of Acceptance', '56', '2021-04-21 14:25:51'),
(12, 'Certificate of Cohabitation', '113', '2021-04-21 14:25:51'),
(13, 'Certificate of Indigency', '356', '2021-04-21 14:25:51'),
(14, 'Certificate to File Action', '250', '2021-04-21 14:25:51'),
(15, 'Barangay ID', '50', '2021-04-21 14:28:00'),
(16, 'Medical Assistance/Senior Citizen', '100', '2021-04-21 14:28:00'),
(17, 'Referral Recommendation', '50', '2021-04-21 14:28:00'),
(18, 'Filling Fee', '80', '2021-04-21 14:28:00');

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
  `adminID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcreatecertificate`
--

INSERT INTO `tblcreatecertificate` (`ID`, `Userid`, `CertificateId`, `CreationId`, `CreationDate`, `adminID`) VALUES
(1, '2', '2', '135792633', '2021-04-15 03:51:43', 1),
(2, '2', '2', '437472239', '2021-04-22 03:38:40', 1),
(3, '4', '10', '637901206', '2021-04-22 03:39:22', 1),
(4, '2', '15', '464157984', '2021-04-22 09:11:03', 1),
(5, '4', '9', '171104214', '2021-04-22 12:02:07', 1),
(6, '2', '10', '382660445', '2021-04-22 13:40:24', 1),
(7, '2', '6', '722036110', '2021-05-03 17:09:45', 1),
(8, '4', '14', '239149821', '2021-05-03 17:11:02', 1),
(9, '1', '7', '575394333', '2021-05-03 17:11:16', 1),
(10, '3', '4', '362984365', '2021-05-03 17:11:48', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblcreaterental`
--

CREATE TABLE `tblcreaterental` (
  `ID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `rentalID` int(11) NOT NULL,
  `adminID` int(11) NOT NULL,
  `rentalStartDate` datetime NOT NULL,
  `rentalEndDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcreaterental`
--

INSERT INTO `tblcreaterental` (`ID`, `userID`, `rentalID`, `adminID`, `rentalStartDate`, `rentalEndDate`) VALUES
(1, 3, 1, 1, '2021-04-22 13:00:00', '2021-04-22 16:00:00'),
(2, 1, 2, 1, '2021-04-22 20:03:00', '2021-04-22 20:03:00'),
(3, 5, 4, 1, '2021-04-22 21:45:00', '2021-04-22 12:49:00'),
(4, 3, 2, 1, '2021-05-04 02:09:00', '2021-05-04 15:10:00');

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
  `Cellphnumber` bigint(10) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Password` varchar(200) NOT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  `voter` varchar(3) NOT NULL,
  `vPrecinct` int(11) NOT NULL,
  `ResidentType` varchar(50) NOT NULL,
  `LastName` varchar(50) DEFAULT NULL,
  `FirstName` varchar(50) DEFAULT NULL,
  `MiddleName` varchar(50) DEFAULT NULL,
  `BirthPlace` varchar(50) DEFAULT NULL,
  `Gender` varchar(20) NOT NULL,
  `sssNumber` int(50) DEFAULT NULL,
  `tinNumber` int(50) DEFAULT NULL,
  `CivilStatus` varchar(50) DEFAULT NULL,
  `BirthDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblresident`
--

INSERT INTO `tblresident` (`ID`, `Purok`, `houseUnit`, `streetName`, `Cellphnumber`, `Email`, `Password`, `CreationDate`, `voter`, `vPrecinct`, `ResidentType`, `LastName`, `FirstName`, `MiddleName`, `BirthPlace`, `Gender`, `sssNumber`, `tinNumber`, `CivilStatus`, `BirthDate`) VALUES
(1, 1, 534, 'Pitong Gatang', 4354354354, 'ledes@gmail.com', '123', '2021-04-12 19:36:11', 'YES', 0, 'Rental/Boarder', 'Ledesma', 'Marithess', 'Cortez', 'Manila', 'Male', 123123123, 1231321, 'Single', '2012-04-05 00:00:00'),
(2, 2, 213, 'Pacheco', 4354354354, 'kim@gmail.com', '123', '2021-04-12 19:36:11', 'YES', 0, 'House Owner', 'Dela Cruz', 'Kim', 'Renzo', 'Manila', 'Female', 312123321, 3123123, 'Married', '2012-04-18 00:00:00'),
(3, 3, 323, 'Peralta', 19823719, 'verg@gmail.com', '123', '2021-04-12 20:14:26', 'NO', 0, 'Care Taker', 'Viray', 'Vergel', 'Sallan', 'Manila', 'Male', 123123123, 3212312, 'Single', '2015-04-01 00:00:00'),
(4, 4, 543, 'Panday Pira', 21315123, 'sallan@gmail.com', '123', '2021-04-20 07:49:54', 'Yes', 0, 'Living W/Relatives', 'Sallan', 'Arnold', 'Clavio', 'Manila', 'Female', 12512312, 12315123, 'Married', '2011-04-01 00:00:00'),
(5, 5, 124, 'Perpekto', 123123, 'nathan@gmail.com', '123', '2021-04-20 08:22:54', 'Yes', 0, 'Rental/Boarder', 'Morales', 'Nathan', 'Pacquiao', 'Manila', 'Male', 123123, 12315123, 'Married', '2008-02-20 00:00:00'),
(6, 6, 622, 'Batasan', 6123124, 'villanueva@gmail.com', '1233', '2021-05-07 08:40:27', 'No', 0, 'Care Taker', 'Villanueva', 'John Carlo', 'Wanto', 'Mindanao', 'Male', 25723523, 16245, 'Married', '2013-02-07 00:00:00'),
(7, 7, 722, 'Maligaya', 1436245, 'uy@gmail.com', '123', '2021-05-07 08:42:16', 'No', 0, 'Living W/Relatives', 'Uy', 'Wilvin', 'Voltaire', 'Visayas', 'Female', 45145451, 61451451, 'Married', '2013-01-07 00:00:00'),
(8, 8, 888, 'Mandaluyong', 1245145124, 'celestial@gmail.com', '123', '2021-05-07 08:49:54', 'Yes', 8971248, 'Care Taker', 'Celestial', 'Jayvee', 'Dragon', 'Tondo', 'Male', 1451451345, 14561456, 'Separated', '2012-06-07 00:00:00'),
(9, 9, 999, 'Varona', 134561, 'velasco@gmail.com', '123', '2021-05-07 08:51:28', 'Yes', 2147483647, 'House Owner', 'Velasco', 'Sheena', 'Marie', 'Manila', 'Female', 1641461346, 1435614, 'Married', '2011-01-07 00:00:00'),
(10, 10, 100, 'Batangas', 1645612345, 'ligs@gmail.com', '123', '2021-05-07 08:52:28', 'Yes', 514512345, 'Living W/Relatives', 'Ligutom', 'Zyra', 'Ligs', 'Manila', 'Female', 1451345134, 1451243513, 'Widow', '2014-01-07 00:00:00'),
(11, 10, 891, 'Sobremonte', 1243521345, 'demesa@gmail.com', '123', '2021-05-08 02:28:15', 'Yes', 21452435, 'House Owner', 'Demesa', 'Adrian', 'Villanueva', 'Macaraeg', 'Female', 1254125412, 12341234, 'Married', '2016-05-08 00:00:00');

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
