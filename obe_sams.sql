-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2015 at 03:54 PM
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
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `ID` int(3) NOT NULL AUTO_INCREMENT,
  `CourseCode` varchar(9) NOT NULL,
  `CourseDesc` varchar(255) NOT NULL,
  `yearlvl` enum('1st','2nd','3rd','4th') NOT NULL,
  `semester` enum('1st','2nd') NOT NULL,
  `programID` int(3) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `ID` (`ID`),
  KEY `programID` (`programID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `electives`
--

CREATE TABLE IF NOT EXISTS `electives` (
  `ID` int(3) NOT NULL AUTO_INCREMENT,
  `CourseCode` varchar(9) NOT NULL,
  `courseID` int(3) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `courseID` (`courseID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `equivalent`
--

CREATE TABLE IF NOT EXISTS `equivalent` (
  `ID` int(3) NOT NULL AUTO_INCREMENT,
  `CourseEquivalent` varchar(9) NOT NULL,
  `courseID` int(3) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `courseID` (`courseID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `po`
--

CREATE TABLE IF NOT EXISTS `po` (
  `ID` int(3) NOT NULL AUTO_INCREMENT,
  `attribute` varchar(100) NOT NULL,
  `poCode2` varchar(10) NOT NULL,
  `description` text NOT NULL,
  `status` enum('0','1') NOT NULL,
  `programID` int(3) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `ID` (`ID`),
  KEY `programID` (`programID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `po`
--

INSERT INTO `po` (`ID`, `attribute`, `poCode2`, `description`, `status`, `programID`) VALUES
(1, 'Analysis', 'CS01', 'test', '0', 1);

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE IF NOT EXISTS `program` (
  `ID` int(3) NOT NULL AUTO_INCREMENT,
  `programName` enum('BSICT','BSIT','BSCS') NOT NULL,
  `effective_year` year(4) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `ID` (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`ID`, `programName`, `effective_year`) VALUES
(1, 'BSCS', 2014),
(2, 'BSIT', 2014);

-- --------------------------------------------------------

--
-- Table structure for table `scorecard`
--

CREATE TABLE IF NOT EXISTS `scorecard` (
  `studentID` bigint(20) NOT NULL,
  `courseID` int(3) NOT NULL,
  `teacherID` varchar(15) NOT NULL,
  `score` float NOT NULL,
  `poID` int(3) NOT NULL,
  KEY `courseID` (`courseID`),
  KEY `teacherID` (`teacherID`),
  KEY `poID` (`poID`),
  KEY `studentID` (`studentID`),
  KEY `studentID_2` (`studentID`),
  KEY `courseID_2` (`courseID`),
  KEY `teacherID_2` (`teacherID`),
  KEY `poID_2` (`poID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `student_id` bigint(20) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `mname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `programID` int(3) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `ID` (`ID`),
  KEY `curriculumID` (`programID`),
  KEY `student_id` (`student_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`ID`, `student_id`, `fname`, `mname`, `lname`, `programID`) VALUES
(1, 11104551, 'Jovanne', 'Buque', 'Kjellberg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE IF NOT EXISTS `teacher` (
  `ID` int(3) NOT NULL AUTO_INCREMENT,
  `teacher_id` varchar(15) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `mname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `role` enum('admin','teacher') NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `teacher_id` (`teacher_id`),
  KEY `login_id` (`teacher_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`ID`, `teacher_id`, `fname`, `mname`, `lname`, `role`, `password`) VALUES
(1, 'admin10101', 'Admin', 'Admin', 'Admin', 'admin', 'vdFv6no4+7aTBUENnOVXT0TwNXQC2ZzWT9PfjapzFHvj9d1hSTovz927arTv+xY3MXru+B/3L5a6jcMTEPac4g=='),
(2, '11101091QA', 'A', 'A', 'A', 'teacher', 'vdFv6no4+7aTBUENnOVXT0TwNXQC2ZzWT9PfjapzFHvj9d1hSTovz927arTv+xY3MXru+B/3L5a6jcMTEPac4g=='),
(3, '11101091QS', 'Z', 'Z', 'Z', 'teacher', 'vdFv6no4+7aTBUENnOVXT0TwNXQC2ZzWT9PfjapzFHvj9d1hSTovz927arTv+xY3MXru+B/3L5a6jcMTEPac4g=='),
(4, '1111111111', 'Daniel', 'Jonathan', 'Steven', 'teacher', 'vdFv6no4+7aTBUENnOVXT0TwNXQC2ZzWT9PfjapzFHvj9d1hSTovz927arTv+xY3MXru+B/3L5a6jcMTEPac4g==');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`programID`) REFERENCES `program` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `electives`
--
ALTER TABLE `electives`
  ADD CONSTRAINT `electives_ibfk_1` FOREIGN KEY (`courseID`) REFERENCES `course` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `equivalent`
--
ALTER TABLE `equivalent`
  ADD CONSTRAINT `equivalent_ibfk_1` FOREIGN KEY (`courseID`) REFERENCES `course` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `po`
--
ALTER TABLE `po`
  ADD CONSTRAINT `po_ibfk_1` FOREIGN KEY (`programID`) REFERENCES `program` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `scorecard`
--
ALTER TABLE `scorecard`
  ADD CONSTRAINT `scorecard_ibfk_2` FOREIGN KEY (`courseID`) REFERENCES `course` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `scorecard_ibfk_3` FOREIGN KEY (`teacherID`) REFERENCES `teacher` (`teacher_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `scorecard_ibfk_4` FOREIGN KEY (`studentID`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `scorecard_ibfk_5` FOREIGN KEY (`poID`) REFERENCES `po` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`programID`) REFERENCES `program` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
