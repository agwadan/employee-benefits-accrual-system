-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2019 at 02:34 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `employee_benefits`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employees`
--

CREATE TABLE `tbl_employees` (
  `emp_id` int(1) NOT NULL COMMENT 'Employee id',
  `emp_points` float NOT NULL DEFAULT '0' COMMENT 'Number of points',
  `emp_points_used` float NOT NULL DEFAULT '0' COMMENT 'Total number of points used'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_employees`
--

INSERT INTO `tbl_employees` (`emp_id`, `emp_points`, `emp_points_used`) VALUES
(1, 960, 0),
(2, 787.5, 0),
(3, 0, 0),
(4, 960, 0),
(5, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_seniority`
--

CREATE TABLE `tbl_seniority` (
  `sn_seniority` varchar(1) NOT NULL COMMENT 'Seniority',
  `sn_points` int(2) NOT NULL COMMENT 'Number of points'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_seniority`
--

INSERT INTO `tbl_seniority` (`sn_seniority`, `sn_points`) VALUES
('A', 5),
('B', 10),
('C', 15),
('D', 20),
('E', 25);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_track`
--

CREATE TABLE `tbl_track` (
  `track_id` int(2) NOT NULL COMMENT 'Track id',
  `emp_id` int(2) NOT NULL COMMENT 'Employee id',
  `emp_startDate` date NOT NULL COMMENT 'Start Date for a given level of seniority',
  `emp_seniority` varchar(1) NOT NULL COMMENT 'Seniority of an employee in a given time'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_track`
--

INSERT INTO `tbl_track` (`track_id`, `emp_id`, `emp_startDate`, `emp_seniority`) VALUES
(1, 1, '2016-01-02', 'B'),
(2, 2, '2015-12-01', 'C'),
(3, 3, '2017-04-02', 'B'),
(6, 4, '2015-05-27', 'A'),
(9, 1, '2016-05-20', 'C'),
(10, 4, '2017-05-01', 'D'),
(11, 5, '2019-03-14', 'A'),
(12, 1, '2018-05-30', 'D'),
(13, 2, '2018-11-12', 'B');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_employees`
--
ALTER TABLE `tbl_employees`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `tbl_track`
--
ALTER TABLE `tbl_track`
  ADD PRIMARY KEY (`track_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_track`
--
ALTER TABLE `tbl_track`
  MODIFY `track_id` int(2) NOT NULL AUTO_INCREMENT COMMENT 'Track id', AUTO_INCREMENT=14;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
