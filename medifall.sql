-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2021 at 09:26 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
CREATE DATABASE medifall;
USE medifall;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medifall`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin_tb`
--

CREATE TABLE `adminlogin_tb` (
  `a_login_id` int(11) NOT NULL,
  `a_name` varchar(60) NOT NULL,
  `a_email` varchar(60) NOT NULL,
  `a_password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adminlogin_tb`
--

INSERT INTO `adminlogin_tb` (`a_login_id`, `a_name`, `a_email`, `a_password`) VALUES
(1, 'admin', 'admin@medifall.com', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `assign`
--

CREATE TABLE `assign` (
  `serial` int(11) NOT NULL,
  `donorID` int(11) NOT NULL,
  `donor` varchar(50) NOT NULL,
  `medicine` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `address` varchar(50) NOT NULL,
  `upzilla` varchar(50) NOT NULL,
  `district` varchar(50) NOT NULL,
  `ngo` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `daate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assign`
--

INSERT INTO `assign` (`serial`, `donorID`, `donor`, `medicine`, `quantity`, `address`, `upzilla`, `district`, `ngo`, `phone`, `daate`) VALUES
(7, 2, 'Shomon', 'Seclo', 44, 'Shia', 'Mohammodpur', 'Dhaka', 'brac', '01354879658', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `assign_indi`
--

CREATE TABLE `assign_indi` (
  `donorID` int(11) NOT NULL,
  `donor` varchar(50) NOT NULL,
  `medicine` varchar(50) NOT NULL,
  `quantity` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `upzilla` varchar(50) NOT NULL,
  `district` varchar(50) NOT NULL,
  `ngo` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(30) DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assign_indi`
--

INSERT INTO `assign_indi` (`donorID`, `donor`, `medicine`, `quantity`, `address`, `upzilla`, `district`, `ngo`, `phone`, `date`, `status`) VALUES
(4, 'Mehedi Hasan', 'multi vit', '30', 'Nill', 'test', 'Dhaka', 'JAGORANI CHAKRA FOUNDATION', '01400760755', '2021-10-28', 'Donation Accepted');

-- --------------------------------------------------------

--
-- Table structure for table `assign_org`
--

CREATE TABLE `assign_org` (
  `donorID` int(11) NOT NULL,
  `donor` varchar(50) NOT NULL,
  `medicine` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `address` varchar(50) NOT NULL,
  `upzilla` varchar(50) NOT NULL,
  `district` varchar(50) NOT NULL,
  `ngo` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(30) DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assign_org`
--

INSERT INTO `assign_org` (`donorID`, `donor`, `medicine`, `quantity`, `address`, `upzilla`, `district`, `ngo`, `phone`, `date`, `status`) VALUES
(2, 'UNICEF Bangladesh', 'BongoVax', 1000, 'Syed Mahbub Morshed Avenue, ', 'Mohammadpur', 'Dhaka', 'CARE BANGLADESH', '01178256972', '2021-10-28', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `assign_pharma`
--

CREATE TABLE `assign_pharma` (
  `donorID` int(11) NOT NULL,
  `donor` varchar(50) NOT NULL,
  `medicine` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `address` varchar(50) NOT NULL,
  `upzilla` varchar(50) NOT NULL,
  `district` varchar(50) NOT NULL,
  `ngo` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assign_pharma`
--

INSERT INTO `assign_pharma` (`donorID`, `donor`, `medicine`, `quantity`, `address`, `upzilla`, `district`, `ngo`, `phone`, `date`) VALUES
(5, ' Square Pharmaceuticals Ltd.', 'BongoVax', 50000, 'SQUARE Centre 48, Mohakhali C/A Dhaka 1212, Bangla', 'Banani', 'Dhaka', 'CARE BANGLADESH', '+88-02-8833047-', '2021-10-17'),
(6, 'Opsonin Pharmaceuticals Ltd.', 'BongoVax', 50000, 'Opsonin Building 30, New Eskaton Road Dhaka 1000, ', 'Ramna', 'Dhaka', 'JAGGO FOUNDATION', '880-2-9332262', '2021-10-17');

-- --------------------------------------------------------

--
-- Table structure for table `contact_tb`
--

CREATE TABLE `contact_tb` (
  `contact_id` int(11) NOT NULL,
  `contact_name` varchar(60) NOT NULL,
  `contact_email` varchar(60) NOT NULL,
  `contact_phone` varchar(15) NOT NULL,
  `contact_message` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_tb`
--

INSERT INTO `contact_tb` (`contact_id`, `contact_name`, `contact_email`, `contact_phone`, `contact_message`) VALUES
(9, 'Mehedi Hasan', 'mshumon172060@bscse.uiu.ac.bd', '01400760755', 'test'),
(10, 'gd', 'user@medifall.com', '01877523488', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `executivelogin_tb`
--

CREATE TABLE `executivelogin_tb` (
  `e_id` int(7) NOT NULL,
  `ngo_name` varchar(30) DEFAULT NULL,
  `e_name` varchar(30) DEFAULT NULL,
  `e_email` varchar(30) DEFAULT NULL,
  `e_pass` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `executivelogin_tb`
--

INSERT INTO `executivelogin_tb` (`e_id`, `ngo_name`, `e_name`, `e_email`, `e_pass`) VALUES
(1, 'JAGGO FOUNDATION', 'Robiul Islam ', 'robi123@gmail.com', '12345'),
(2, 'JAGORANI CHAKRA FOUNDATION', 'Shourav Sarker', 'shourav1234@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `executive_assign_indi`
--

CREATE TABLE `executive_assign_indi` (
  `donorID` int(7) NOT NULL,
  `donor` varchar(50) DEFAULT NULL,
  `medicine` varchar(50) DEFAULT NULL,
  `quantity` int(50) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `upzilla` varchar(50) DEFAULT NULL,
  `district` varchar(30) DEFAULT NULL,
  `executive` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `daate` date DEFAULT NULL,
  `status` varchar(30) DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `executive_assign_indi`
--

INSERT INTO `executive_assign_indi` (`donorID`, `donor`, `medicine`, `quantity`, `address`, `upzilla`, `district`, `executive`, `phone`, `daate`, `status`) VALUES
(4, 'Mehedi Hasan', 'multi', 30, 'Nill', 'test', 'Dhaka', 'shourav1234@gmail.com', '01400760755', '2021-10-28', 'Donation Accepted');

-- --------------------------------------------------------

--
-- Table structure for table `executive_assign_org`
--

CREATE TABLE `executive_assign_org` (
  `donorID` int(7) NOT NULL,
  `donor` varchar(50) DEFAULT NULL,
  `medicine` varchar(50) DEFAULT NULL,
  `quantity` int(50) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `upzilla` varchar(50) DEFAULT NULL,
  `district` varchar(30) DEFAULT NULL,
  `executive` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `daate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `executive_assign_pharma`
--

CREATE TABLE `executive_assign_pharma` (
  `donorID` int(7) NOT NULL,
  `donor` varchar(50) DEFAULT NULL,
  `medicine` varchar(50) DEFAULT NULL,
  `quantity` int(50) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `upzilla` varchar(50) DEFAULT NULL,
  `district` varchar(30) DEFAULT NULL,
  `executive` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `daate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `individualdonation`
--

CREATE TABLE `individualdonation` (
  `donorID` int(11) NOT NULL,
  `donorName` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `upzilla` varchar(50) NOT NULL,
  `district` varchar(50) NOT NULL,
  `medicine` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `daate` date NOT NULL,
  `status` varchar(30) DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `individualdonation`
--

INSERT INTO `individualdonation` (`donorID`, `donorName`, `email`, `address`, `upzilla`, `district`, `medicine`, `quantity`, `phone`, `daate`, `status`) VALUES
(3, 'tesst', 'test@gmail.com', 'test', 'test', 'test', 'napa', 50, '01400760755', '2021-09-09', 'Pending'),
(4, 'Mehedi Hasan', 'mehedihs9900@gmail.com', 'Nill', 'test', 'Dhaka', 'multi vit', 30, '01400760755', '2021-10-01', 'Donation Accepted'),
(5, 'Mehedi Hasan', 'test@gmail.com', 'Nill', 'test', 'Dhaka', 'Ocof', 20, '01400760755', '2021-09-09', 'Pending'),
(11, 'Shourav Sarker', 'shourav123@gmail.com', '1/12 Tazmahal Road, mohammadpur,Dhaka-1207', 'Mohammadpur', 'Dhaka', 'gastrolfet', 20, '01679178054', '2021-10-17', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `individuallogin_tb`
--

CREATE TABLE `individuallogin_tb` (
  `in_login_id` int(11) NOT NULL,
  `in_name` varchar(6) NOT NULL,
  `in_email` varchar(60) NOT NULL,
  `in_pass` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `individuallogin_tb`
--

INSERT INTO `individuallogin_tb` (`in_login_id`, `in_name`, `in_email`, `in_pass`) VALUES
(2, 'indivi', 'individual@medifall.com', '12345'),
(4, 'Shoura', 'shourav123@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `ngologin_tb`
--

CREATE TABLE `ngologin_tb` (
  `ngo_name` varchar(30) NOT NULL,
  `ngo_email` varchar(20) DEFAULT NULL,
  `ngo_pass` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ngologin_tb`
--

INSERT INTO `ngologin_tb` (`ngo_name`, `ngo_email`, `ngo_pass`) VALUES
('CARE BANGLADESH', 'carebd@gmail.com', '12345'),
('JAGGO FOUNDATION', 'info@jaago.com.bd', '12345'),
('JAGORANI CHAKRA FOUNDATION', 'jcjsr@ymail.com', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `organizationdonation`
--

CREATE TABLE `organizationdonation` (
  `orgID` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `location` varchar(50) NOT NULL,
  `upzilla` varchar(50) NOT NULL,
  `district` varchar(50) NOT NULL,
  `medicine` varchar(50) NOT NULL,
  `quantity` float NOT NULL,
  `phone` varchar(30) NOT NULL,
  `daate` datetime NOT NULL,
  `status` varchar(30) DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `organizationdonation`
--

INSERT INTO `organizationdonation` (`orgID`, `name`, `email`, `location`, `upzilla`, `district`, `medicine`, `quantity`, `phone`, `daate`, `status`) VALUES
(2, 'UNICEF Bangladesh', 'infobangladesh@unicef.org', 'Syed Mahbub Morshed Avenue, ', 'Mohammadpur', 'Dhaka', 'BongoVax', 1000, '01178256972', '2021-10-28 21:05:00', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `orglogin_tb`
--

CREATE TABLE `orglogin_tb` (
  `org_id` int(11) NOT NULL,
  `org_name` varchar(60) NOT NULL,
  `org_email` varchar(60) NOT NULL,
  `org_pass` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orglogin_tb`
--

INSERT INTO `orglogin_tb` (`org_id`, `org_name`, `org_email`, `org_pass`) VALUES
(1, 'UNICEF Bangladesh', 'infobangladesh@unicef.org', '12345'),
(2, 'Life Hope Medicare', 'lhopemedicare@gmail.com', '12345'),
(3, 'Brac', 'org@medifall.com', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `pharmadonation`
--

CREATE TABLE `pharmadonation` (
  `pharmaID` int(100) NOT NULL,
  `pharmaName` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `area` varchar(50) NOT NULL,
  `upzilla` varchar(50) NOT NULL,
  `district` varchar(50) NOT NULL,
  `medicine` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `daate` datetime NOT NULL,
  `status` varchar(30) DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pharmadonation`
--

INSERT INTO `pharmadonation` (`pharmaID`, `pharmaName`, `email`, `area`, `upzilla`, `district`, `medicine`, `quantity`, `phone`, `daate`, `status`) VALUES
(5, ' Square Pharmaceuticals Ltd.', 'squarepharma@gmail.com', 'SQUARE Centre 48, Mohakhali C/A Dhaka 1212, Bangla', 'Banani', 'Dhaka', 'BongoVax', 50000, '+88-02-8833047-', '2021-10-17 20:01:00', 'Pending'),
(6, 'Opsonin Pharmaceuticals Ltd.', 'opsoninbd@gmail.com', 'Opsonin Building 30, New Eskaton Road Dhaka 1000, ', 'Ramna', 'Dhaka', 'BongoVax', 50000, '880-2-9332262', '2021-10-17 20:29:00', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `pharmalogin_tb`
--

CREATE TABLE `pharmalogin_tb` (
  `pha_id` int(11) NOT NULL,
  `pha_name` varchar(60) NOT NULL,
  `pha_email` varchar(60) NOT NULL,
  `pha_pass` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pharmalogin_tb`
--

INSERT INTO `pharmalogin_tb` (`pha_id`, `pha_name`, `pha_email`, `pha_pass`) VALUES
(5, 'wellbeing', 'pharma@medifall.com', '12345'),
(6, ' Square Pharmaceuticals Ltd.', 'squarepharma@gmail.com', '12345'),
(7, 'Opsonin Pharmaceuticals Ltd.', 'opsoninbd@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `requestmedicine`
--

CREATE TABLE `requestmedicine` (
  `requestID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `area` varchar(50) NOT NULL,
  `upzilla` int(50) NOT NULL,
  `district` varchar(60) NOT NULL,
  `medicine` varchar(30) NOT NULL,
  `quantity` int(11) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `daatetimee` datetime NOT NULL,
  `files` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requestmedicine`
--

INSERT INTO `requestmedicine` (`requestID`, `name`, `email`, `area`, `upzilla`, `district`, `medicine`, `quantity`, `phone`, `daatetimee`, `files`) VALUES
(1, 'gd', 'user@medifall.com', 'test', 0, 'Dhaka', 'test', 20, '01877523488', '2021-10-05 20:17:00', 'R.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlogin_tb`
--
ALTER TABLE `adminlogin_tb`
  ADD PRIMARY KEY (`a_login_id`);

--
-- Indexes for table `assign`
--
ALTER TABLE `assign`
  ADD PRIMARY KEY (`serial`);

--
-- Indexes for table `assign_indi`
--
ALTER TABLE `assign_indi`
  ADD PRIMARY KEY (`donorID`);

--
-- Indexes for table `assign_org`
--
ALTER TABLE `assign_org`
  ADD PRIMARY KEY (`donorID`);

--
-- Indexes for table `assign_pharma`
--
ALTER TABLE `assign_pharma`
  ADD PRIMARY KEY (`donorID`);

--
-- Indexes for table `contact_tb`
--
ALTER TABLE `contact_tb`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `executivelogin_tb`
--
ALTER TABLE `executivelogin_tb`
  ADD PRIMARY KEY (`e_id`),
  ADD KEY `ngo_name` (`ngo_name`);

--
-- Indexes for table `executive_assign_indi`
--
ALTER TABLE `executive_assign_indi`
  ADD PRIMARY KEY (`donorID`);

--
-- Indexes for table `executive_assign_org`
--
ALTER TABLE `executive_assign_org`
  ADD PRIMARY KEY (`donorID`);

--
-- Indexes for table `executive_assign_pharma`
--
ALTER TABLE `executive_assign_pharma`
  ADD PRIMARY KEY (`donorID`);

--
-- Indexes for table `individualdonation`
--
ALTER TABLE `individualdonation`
  ADD PRIMARY KEY (`donorID`);

--
-- Indexes for table `individuallogin_tb`
--
ALTER TABLE `individuallogin_tb`
  ADD PRIMARY KEY (`in_login_id`);

--
-- Indexes for table `ngologin_tb`
--
ALTER TABLE `ngologin_tb`
  ADD PRIMARY KEY (`ngo_name`);

--
-- Indexes for table `organizationdonation`
--
ALTER TABLE `organizationdonation`
  ADD PRIMARY KEY (`orgID`);

--
-- Indexes for table `orglogin_tb`
--
ALTER TABLE `orglogin_tb`
  ADD PRIMARY KEY (`org_id`);

--
-- Indexes for table `pharmadonation`
--
ALTER TABLE `pharmadonation`
  ADD PRIMARY KEY (`pharmaID`);

--
-- Indexes for table `pharmalogin_tb`
--
ALTER TABLE `pharmalogin_tb`
  ADD PRIMARY KEY (`pha_id`);

--
-- Indexes for table `requestmedicine`
--
ALTER TABLE `requestmedicine`
  ADD PRIMARY KEY (`requestID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminlogin_tb`
--
ALTER TABLE `adminlogin_tb`
  MODIFY `a_login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `assign`
--
ALTER TABLE `assign`
  MODIFY `serial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `contact_tb`
--
ALTER TABLE `contact_tb`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `executivelogin_tb`
--
ALTER TABLE `executivelogin_tb`
  MODIFY `e_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `individuallogin_tb`
--
ALTER TABLE `individuallogin_tb`
  MODIFY `in_login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `organizationdonation`
--
ALTER TABLE `organizationdonation`
  MODIFY `orgID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pharmalogin_tb`
--
ALTER TABLE `pharmalogin_tb`
  MODIFY `pha_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `requestmedicine`
--
ALTER TABLE `requestmedicine`
  MODIFY `requestID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `executivelogin_tb`
--
ALTER TABLE `executivelogin_tb`
  ADD CONSTRAINT `executivelogin_tb_ibfk_1` FOREIGN KEY (`ngo_name`) REFERENCES `ngologin_tb` (`ngo_name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
