-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2019 at 08:49 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tvms`
--

-- --------------------------------------------------------

--
-- Table structure for table `agency`
--

CREATE TABLE `agency` (
  `agency_id` int(11) NOT NULL,
  `agency_name` varchar(100) NOT NULL,
  `agency_head` varchar(100) NOT NULL,
  `agency_email` varchar(100) NOT NULL,
  `agency_password` varchar(100) NOT NULL,
  `agency_address1` varchar(255) NOT NULL,
  `agency_address2` varchar(255) NOT NULL,
  `agency_tel1` char(11) NOT NULL,
  `agency_tel2` char(11) NOT NULL,
  `agency_status` varchar(20) NOT NULL,
  `agency_subStartDate` date NOT NULL,
  `agency_subExpiryDate` date NOT NULL,
  `agency_subFee` decimal(10,2) NOT NULL,
  `agency_subStatus` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agency`
--

INSERT INTO `agency` (`agency_id`, `agency_name`, `agency_head`, `agency_email`, `agency_password`, `agency_address1`, `agency_address2`, `agency_tel1`, `agency_tel2`, `agency_status`, `agency_subStartDate`, `agency_subExpiryDate`, `agency_subFee`, `agency_subStatus`) VALUES
(1, 'LTO', 'Jane Doe', 'lto@gmail.com', 'admin', 'Ramos', 'Ramos', '911', '911', 'Active', '2019-01-01', '2019-02-01', '1000.00', 'Active'),
(2, 'Macrotech', 'Warren M. Limpag', 'macrotech@gmail.com', 'admin', 'Cogon', 'Pardo', '911', '911', 'Active', '2018-12-20', '2019-01-12', '1000.00', 'Active'),
(3, 'Alliance', 'Warren M. Limpag', 'aliance@gmail.com', 'admin', 'ITPark', 'ITPark', '262-5189', '911', 'Active', '2018-12-12', '2019-01-20', '1000.00', 'Active'),
(4, 'CCTO', 'Bata', 'bata@gmail.com', 'admin', 'Cebu', 'Cebu', '09231827123', '09231829312', 'Active', '2018-09-20', '2019-09-20', '1000.00', 'Active'),
(5, 'ITPark', 'Ej Anton S. Potot', 'itpark@gmail.com', 'admin', 'ITPARK', 'ITPARK', '911', '911', 'Active', '2019-01-26', '2019-04-26', '500.00', 'Active'),
(6, 'Worldtech', 'Julie Pearl S. Polleros', 'juliepearl@gmail.com', 'admin', 'Balamban', 'Ramos', '911', '911', 'Active', '2019-01-29', '2019-04-29', '500.00', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `driver_id` int(11) NOT NULL,
  `license_id` int(11) NOT NULL,
  `driver_pincode` int(11) NOT NULL,
  `driver_lname` varchar(50) NOT NULL,
  `driver_fname` varchar(50) NOT NULL,
  `driver_mi` varchar(1) NOT NULL,
  `driver_gender` varchar(50) NOT NULL,
  `driver_birthdate` date NOT NULL,
  `driver_addressProv` varchar(255) NOT NULL,
  `driver_addressCity` varchar(255) NOT NULL,
  `driver_mobile` char(11) NOT NULL,
  `driver_tel` char(20) NOT NULL,
  `driver_type` varchar(20) NOT NULL,
  `driver_email` varchar(50) NOT NULL,
  `driver_password` varchar(50) NOT NULL,
  `driver_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `enforcer`
--

CREATE TABLE `enforcer` (
  `enforcer_id` int(11) NOT NULL,
  `enforcer_lname` varchar(100) NOT NULL,
  `enforcer_fname` varchar(100) NOT NULL,
  `enforcer_mi` varchar(100) NOT NULL,
  `enforcer_addressProv` varchar(255) NOT NULL,
  `enforcer_addressCity` varchar(255) NOT NULL,
  `enforcer_mobile` char(11) NOT NULL,
  `enforcer_tel` char(11) NOT NULL,
  `enforcer_gender` varchar(20) NOT NULL,
  `enforcer_email` varchar(100) NOT NULL,
  `enforcer_password` varchar(100) NOT NULL,
  `enforcer_status` varchar(20) NOT NULL,
  `enforcer_type` varchar(20) NOT NULL,
  `enforcer_birthdate` date NOT NULL,
  `agency_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enforcer`
--

INSERT INTO `enforcer` (`enforcer_id`, `enforcer_lname`, `enforcer_fname`, `enforcer_mi`, `enforcer_addressProv`, `enforcer_addressCity`, `enforcer_mobile`, `enforcer_tel`, `enforcer_gender`, `enforcer_email`, `enforcer_password`, `enforcer_status`, `enforcer_type`, `enforcer_birthdate`, `agency_id`) VALUES
(1, 'Limpag', 'Warren', 'M', 'Dalaguete, Cebu City', 'Cogon Pardo, Cebu City', '09082999825', '9111', 'Male', 'easymakerz@gmail.com', 'gwapo', 'Active', 'Traffic', '1998-09-26', 0),
(2, 'Potot', 'Ej Anton', 'S', 'Kalunasan', 'Guadalupe', '09334155452', '911', 'Male', 'ezio14@gmail.com', '', 'Active', 'Traffic', '1998-04-12', 0),
(8, 'Magdadaro', 'Alyn', 'A', 'Negros', 'Mandaue', '09321839218', '911', 'Female', 'alyn@gmail.com', '', 'Active', 'Parking', '1998-09-30', 0),
(10, 'Yu', 'Carrie', 'A', 'Bohol', 'Guadalupe', '09281273171', '911', 'Male', 'carrie@gmail.com', '', 'Active', 'Parking', '1998-10-30', 0),
(12, 'DelMar', 'Jos', 'Rabor', 'test ', 'test add', '09991081367', '1232232', 'Male', 'aliance@gmail.com', '', 'Active', 'Traffic', '2017-12-31', 0),
(13, 'Alvarez', 'Floyd', 'B', 'Cebu', 'Cebu', '09322912831', '911', 'Male', 'floyd@gmail.com', '', 'Active', 'Traffic', '1995-12-10', 3),
(15, 'Potot', '123seda', 'S', 'Kalunasan', 'Kalunasan', '09991083678', '26255189', 'Male', 'zuming1404@gmAIL.COM', '', 'Active', 'Traffic', '1996-01-01', 6);

-- --------------------------------------------------------

--
-- Table structure for table `license`
--

CREATE TABLE `license` (
  `license_id` int(11) NOT NULL,
  `license_type` varchar(50) NOT NULL,
  `license_restriction` varchar(50) NOT NULL,
  `license_issue_date` date NOT NULL,
  `license_exp_date` date NOT NULL,
  `license_nationality` varchar(50) NOT NULL,
  `license_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `license`
--

INSERT INTO `license` (`license_id`, `license_type`, `license_restriction`, `license_issue_date`, `license_exp_date`, `license_nationality`, `license_status`) VALUES
(1, 'Processional', '12421312312', '2018-12-20', '2019-02-20', 'Filipino', 'Active'),
(100, '1', '1', '2016-01-01', '2021-01-01', 'fil', 'Active'),
(123, '1', '123', '2018-01-01', '2021-12-31', 'Filipino', 'Active'),
(1231232, 'asd1', 'q12d`', '2019-01-01', '2019-01-01', 'FIL', 'Active'),
(15391881, 'Professional', '124', '2018-09-30', '2019-09-30', 'Filipino', 'Active'),
(15391882, 'Professional', '124', '2018-09-20', '2019-09-20', 'Filipino', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `vehicle_plateNo` varchar(10) NOT NULL,
  `vehicle_brand` varchar(100) NOT NULL,
  `vehicle_color` varchar(100) NOT NULL,
  `vehicle_lastRegisteredDate` date NOT NULL,
  `vehicle_expiryDate` date NOT NULL,
  `vehicle_status` varchar(100) NOT NULL,
  `vehicle_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`vehicle_plateNo`, `vehicle_brand`, `vehicle_color`, `vehicle_lastRegisteredDate`, `vehicle_expiryDate`, `vehicle_status`, `vehicle_type`) VALUES
('KCCS-DR33', 'Toyota', 'Black', '2018-12-12', '2019-12-12', '0', 'PUJ'),
('KJJD-KFC', 'Kia', 'Black', '2018-09-26', '2019-09-26', '0', 'Taxi'),
('POT-TOPPS', 'Lambo', 'Red', '2018-10-20', '2020-10-20', '0', 'Taxi');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_drivers`
--

CREATE TABLE `vehicle_drivers` (
  `vehicle_drivers_id` int(11) NOT NULL,
  `driver_id` int(11) NOT NULL,
  `vehicle_plateNo` varchar(20) NOT NULL,
  `vehicle_drivers_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `violation`
--

CREATE TABLE `violation` (
  `violation_id` int(11) NOT NULL,
  `ordinanceNo` varchar(100) NOT NULL,
  `articleNo` varchar(100) NOT NULL,
  `violation_desc` varchar(255) NOT NULL,
  `violation_penalty` decimal(10,2) NOT NULL,
  `agency_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `violation`
--

INSERT INTO `violation` (`violation_id`, `ordinanceNo`, `articleNo`, `violation_desc`, `violation_penalty`, `agency_id`) VALUES
(7, 'asdasd', 'asdads', 'asdasd', '123.00', 6),
(8, 'asdasd', 'asdads', 'asdasd', '123.00', 6),
(9, 'asdasd', 'asdads', 'asdasd', '123.00', 6),
(10, 'ORDINACE 801', 'Aritcle XII v2', 'Flowing Counterly', '1001.00', 6),
(11, '123s', 'asd12e werf', ' adsf ads', '12313545.00', 6),
(12, 'aeqwe qws das', 'asd sf ', 'asdff23 rfsd', '2323.00', 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agency`
--
ALTER TABLE `agency`
  ADD PRIMARY KEY (`agency_id`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`driver_id`);

--
-- Indexes for table `enforcer`
--
ALTER TABLE `enforcer`
  ADD PRIMARY KEY (`enforcer_id`);

--
-- Indexes for table `license`
--
ALTER TABLE `license`
  ADD PRIMARY KEY (`license_id`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`vehicle_plateNo`);

--
-- Indexes for table `vehicle_drivers`
--
ALTER TABLE `vehicle_drivers`
  ADD PRIMARY KEY (`vehicle_drivers_id`);

--
-- Indexes for table `violation`
--
ALTER TABLE `violation`
  ADD PRIMARY KEY (`violation_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agency`
--
ALTER TABLE `agency`
  MODIFY `agency_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `driver_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `enforcer`
--
ALTER TABLE `enforcer`
  MODIFY `enforcer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `vehicle_drivers`
--
ALTER TABLE `vehicle_drivers`
  MODIFY `vehicle_drivers_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `violation`
--
ALTER TABLE `violation`
  MODIFY `violation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
