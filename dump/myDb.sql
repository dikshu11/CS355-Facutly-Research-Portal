-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Nov 13, 2019 at 06:25 PM
-- Server version: 8.0.18
-- PHP Version: 7.2.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myDb`
--

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `fid` int(11) NOT NULL,
  `pubid` int(11) NOT NULL,
  `ARank` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`fid`, `pubid`, `ARank`) VALUES
(1, 1001, 2),
(1, 1005, 3),
(2, 1001, 3),
(2, 1002, 2),
(2, 1004, 3),
(3, 1002, 4),
(3, 1003, 2),
(3, 1004, 2),
(4, 1004, 1),
(5, 1005, 1);

-- --------------------------------------------------------

--
-- Table structure for table `conference`
--

CREATE TABLE `conference` (
  `pubid` int(11) NOT NULL,
  `cname` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `conference`
--

INSERT INTO `conference` (`pubid`, `cname`) VALUES
(1001, 'ICACCI'),
(1003, 'ICONIP'),
(1005, 'ICML');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `fid` int(11) NOT NULL,
  `fname` varchar(40) DEFAULT NULL,
  `dept` varchar(40) DEFAULT NULL,
  `doj` date DEFAULT NULL,
  `designation` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`fid`, `fname`, `dept`, `doj`, `designation`) VALUES
(1, 'Samrat Mondal', 'CSE', '2015-08-01', 'Asst. Professor'),
(2, 'Jimson Mathew', 'CSE', '2014-07-07', 'HOD'),
(3, 'Sourav Dandapat', 'CSE', '2016-03-02', 'Professor'),
(4, 'AK Verma', 'MA', '2017-08-11', 'HOD'),
(5, 'Rishi Raj', 'ME', '2016-08-01', 'Professor'),
(6, 'Ahmad Ali', 'EE', '2014-08-07', 'HOD'),
(7, 'Dr Mohad', 'ME', '2017-08-07', 'HOD');

-- --------------------------------------------------------

--
-- Table structure for table `journal`
--

CREATE TABLE `journal` (
  `pubid` int(11) NOT NULL,
  `jname` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `journal`
--

INSERT INTO `journal` (`pubid`, `jname`) VALUES
(1002, 'IEEE Transactions'),
(1004, 'IEEE Intelligent Systems');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `pid` int(11) NOT NULL,
  `pname` varchar(100) DEFAULT NULL,
  `budget` int(11) DEFAULT NULL,
  `sponsor` varchar(100) DEFAULT NULL,
  `dos` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`pid`, `pname`, `budget`, `sponsor`, `dos`) VALUES
(1, 'A Platform for Cross-lingual and Multilingual Event Monitoring in Indian Languages', 12345, 'MEITY and MHRD, Govt. of India', '2014-07-07'),
(2, 'A Software Tool for the Planning and Design of Smart Micro Power Grids', 45000, 'MHRD', '2015-07-07'),
(3, 'Elsevier Center of Excellence for Natural Language Processing', 23467, 'Elsevier', '2016-07-07'),
(4, 'ICT For Satellite Communication', 34567, 'DEITY', '2014-08-07'),
(5, 'Analytical investigation of subthreshold behavior of SiNT FETs', 45678, 'DRDO', '2019-07-07');

-- --------------------------------------------------------

--
-- Table structure for table `publications`
--

CREATE TABLE `publications` (
  `pubid` int(11) NOT NULL,
  `pname` varchar(100) DEFAULT NULL,
  `dop` date DEFAULT NULL,
  `pages` varchar(20) DEFAULT NULL,
  `topic` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `publications`
--

INSERT INTO `publications` (`pubid`, `pname`, `dop`, `pages`, `topic`) VALUES
(1001, 'Query Expansion in Resource Scarce Languages', '2019-01-01', '1034-1050', 'ML'),
(1002, 'Feature selection and ensemble construction', '2017-05-15', '101-105', 'ML'),
(1003, 'A Multiobjective Optimization based Entity Matching Technique for Bibliographic Databases', '2018-12-14', '13-18', 'ML'),
(1004, 'Binary Decision Diagram Assisted Modeling of FPGA-based Physically Unclonable Function', '2016-11-29', '201-222', 'ML'),
(1005, 'Modified parallel cascade control strategy for stable, unstable and integrating processes', '2018-11-09', '231-240', 'Thermodynamics');

-- --------------------------------------------------------

--
-- Table structure for table `takes`
--

CREATE TABLE `takes` (
  `pid` int(11) NOT NULL,
  `fid` int(11) NOT NULL,
  `role` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `takes`
--

INSERT INTO `takes` (`pid`, `fid`, `role`) VALUES
(1, 1, 'President'),
(1, 2, 'VP'),
(1, 5, 'Fund Manager'),
(2, 3, 'Fund Manager'),
(2, 4, 'President'),
(2, 5, 'President'),
(3, 1, 'VP'),
(4, 2, 'VP'),
(4, 3, 'President'),
(5, 2, 'President');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`fid`,`pubid`),
  ADD KEY `pubid` (`pubid`);

--
-- Indexes for table `conference`
--
ALTER TABLE `conference`
  ADD PRIMARY KEY (`pubid`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `journal`
--
ALTER TABLE `journal`
  ADD PRIMARY KEY (`pubid`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `publications`
--
ALTER TABLE `publications`
  ADD PRIMARY KEY (`pubid`);

--
-- Indexes for table `takes`
--
ALTER TABLE `takes`
  ADD PRIMARY KEY (`pid`,`fid`),
  ADD KEY `fid` (`fid`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `author`
--
ALTER TABLE `author`
  ADD CONSTRAINT `author_ibfk_1` FOREIGN KEY (`pubid`) REFERENCES `publications` (`pubid`),
  ADD CONSTRAINT `author_ibfk_2` FOREIGN KEY (`fid`) REFERENCES `faculty` (`fid`);

--
-- Constraints for table `takes`
--
ALTER TABLE `takes`
  ADD CONSTRAINT `takes_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `project` (`pid`),
  ADD CONSTRAINT `takes_ibfk_2` FOREIGN KEY (`fid`) REFERENCES `faculty` (`fid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
