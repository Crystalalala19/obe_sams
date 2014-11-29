-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2014 at 07:06 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `obe_sams`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `ID` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `username`, `password`) VALUES
(1, 'admin10101', '5f4dcc3b5aa765d61d8327deb882cf99');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `ID` int(7) NOT NULL AUTO_INCREMENT,
  `CourseCode` varchar(20) NOT NULL,
  `yearlvl` enum('1st','2nd','3rd','4th') NOT NULL,
  `semester` enum('1st','2nd','','') NOT NULL,
  KEY `ID` (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`ID`, `CourseCode`, `yearlvl`, `semester`) VALUES
(1, 'ICT110', '1st', '1st'),
(2, 'ICT111', '1st', '2nd');

-- --------------------------------------------------------

--
-- Table structure for table `curriculum`
--

CREATE TABLE IF NOT EXISTS `curriculum` (
  `programID` int(3) NOT NULL,
  `courseID` int(7) NOT NULL,
  KEY `curriculumID` (`programID`,`courseID`),
  KEY `courseID` (`courseID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `curriculum`
--

INSERT INTO `curriculum` (`programID`, `courseID`) VALUES
(1, 1),
(1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `po`
--

CREATE TABLE IF NOT EXISTS `po` (
  `ID` int(3) NOT NULL AUTO_INCREMENT,
  `attribute` varchar(100) NOT NULL,
  `poCode` varchar(10) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` enum('0','1','','') NOT NULL DEFAULT '1',
  KEY `ID` (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `po`
--

INSERT INTO `po` (`ID`, `attribute`, `poCode`, `description`, `status`) VALUES
(1, 'Ethics', 'IT09', 'Understand', '0'),
(2, 'Problem Analysis', 'ICT02', 'Fully determine', '0'),
(3, 'Modern Tool Usage', 'CS04', 'Create', '1');

-- --------------------------------------------------------

--
-- Table structure for table `po_program`
--

CREATE TABLE IF NOT EXISTS `po_program` (
  `programID` int(3) NOT NULL,
  `poID` int(7) NOT NULL,
  KEY `curriculumID` (`programID`),
  KEY `poID` (`poID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `po_program`
--

INSERT INTO `po_program` (`programID`, `poID`) VALUES
(1, 1),
(1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE IF NOT EXISTS `program` (
  `ID` int(3) NOT NULL AUTO_INCREMENT,
  `programName` enum('BSICT','BSIT','BSCS','') NOT NULL,
  `effective_year` year(4) NOT NULL,
  KEY `ID` (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`ID`, `programName`, `effective_year`) VALUES
(1, 'BSICT', 2009),
(2, 'BSIT', 2008);

-- --------------------------------------------------------

--
-- Table structure for table `scorecard`
--

CREATE TABLE IF NOT EXISTS `scorecard` (
  `studentID` int(10) NOT NULL,
  `courseID` int(7) NOT NULL,
  `teacherID` varchar(15) NOT NULL,
  `poID` int(7) NOT NULL,
  `score` float NOT NULL,
  KEY `courseID` (`courseID`),
  KEY `teacherID` (`teacherID`),
  KEY `poID` (`poID`),
  KEY `studentID` (`studentID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scorecard`
--

INSERT INTO `scorecard` (`studentID`, `courseID`, `teacherID`, `poID`, `score`) VALUES
(11101091, 1, '11101091QA', 3, 1.3),
(11101092, 2, '11101091QS', 3, 2.3);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `ID` int(10) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `mname` varchar(20) NOT NULL,
  `programID` int(3) NOT NULL,
  KEY `ID` (`ID`),
  KEY `curriculumID` (`programID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`ID`, `lname`, `fname`, `mname`, `programID`) VALUES
(11101091, 'test1', 'test1', 'test1', 1),
(11101092, 'test2', 'test2', 'test2', 2);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE IF NOT EXISTS `teacher` (
  `login_id` varchar(15) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `mname` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `courseID` int(7) NOT NULL,
  `email` varchar(255) NOT NULL,
  KEY `login_id` (`login_id`),
  KEY `courseID` (`courseID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`login_id`, `lname`, `fname`, `mname`, `password`, `courseID`, `email`) VALUES
('11101091QA', 'testfour', 'testfour', 'testfour', '5f4dcc3b5aa765d61d8327deb882cf99', 1, 'test4@gmail.com'),
('11101091QS', 'testfive', 'testfive', 'testfive', '5f4dcc3b5aa765d61d8327deb882cf99', 2, 'test5@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE IF NOT EXISTS `user_account` (
  `ID` int(5) NOT NULL AUTO_INCREMENT,
  `login_id` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','teacher','','') NOT NULL DEFAULT 'teacher',
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`ID`, `login_id`, `role`, `password`) VALUES
(1, 'admin10101', 'admin', '5f4dcc3b5aa765d61d8327deb882cf99'),
(2, '11101091QA', 'teacher', '5f4dcc3b5aa765d61d8327deb882cf99'),
(3, '11101091QS', 'teacher', '5f4dcc3b5aa765d61d8327deb882cf99');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `curriculum`
--
ALTER TABLE `curriculum`
  ADD CONSTRAINT `curriculum_ibfk_2` FOREIGN KEY (`courseID`) REFERENCES `course` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `curriculum_ibfk_1` FOREIGN KEY (`programID`) REFERENCES `program` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `po_program`
--
ALTER TABLE `po_program`
  ADD CONSTRAINT `po_program_ibfk_2` FOREIGN KEY (`programID`) REFERENCES `program` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `po_program_ibfk_1` FOREIGN KEY (`poID`) REFERENCES `po` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `scorecard`
--
ALTER TABLE `scorecard`
  ADD CONSTRAINT `scorecard_ibfk_4` FOREIGN KEY (`poID`) REFERENCES `po` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `scorecard_ibfk_1` FOREIGN KEY (`teacherID`) REFERENCES `teacher` (`login_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `scorecard_ibfk_2` FOREIGN KEY (`studentID`) REFERENCES `student` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `scorecard_ibfk_3` FOREIGN KEY (`courseID`) REFERENCES `course` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`programID`) REFERENCES `program` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `teacher_ibfk_1` FOREIGN KEY (`courseID`) REFERENCES `course` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
