-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2015 at 10:27 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

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
`ID` int(3) NOT NULL,
  `CourseCode` varchar(9) NOT NULL,
  `CourseDesc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `equivalent`
--

CREATE TABLE IF NOT EXISTS `equivalent` (
  `CourseEquivalent` varchar(9) NOT NULL,
  `courseID` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `po`
--

CREATE TABLE IF NOT EXISTS `po` (
`ID` int(3) NOT NULL,
  `attribute` varchar(100) NOT NULL,
  `poCode` varchar(10) NOT NULL,
  `description` text NOT NULL,
  `status` enum('0','1') NOT NULL,
  `programID` int(3) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `po`
--

INSERT INTO `po` (`ID`, `attribute`, `poCode`, `description`, `status`, `programID`) VALUES
(1, 'Analysis', 'CS01', 'test', '0', 1),
(2, 'test', 'CS123', 'test', '0', 3);

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE IF NOT EXISTS `program` (
`ID` int(3) NOT NULL,
  `programName` enum('BSICT','BSIT','BSCS') NOT NULL,
  `effective_year` year(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`ID`, `programName`, `effective_year`) VALUES
(1, 'BSCS', 2014),
(2, 'BSIT', 2014),
(3, 'BSIT', 2058);

-- --------------------------------------------------------

--
-- Table structure for table `scorecard`
--

CREATE TABLE IF NOT EXISTS `scorecard` (
  `score` float NOT NULL,
  `programID` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
`ID` int(10) NOT NULL,
  `student_id` int(10) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `mname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`ID`, `student_id`, `fname`, `mname`, `lname`) VALUES
(1, 11104551, 'Jovanne', 'Buque', 'Kjellberg');

-- --------------------------------------------------------

--
-- Table structure for table `student_course`
--

CREATE TABLE IF NOT EXISTS `student_course` (
  `courseID` int(3) NOT NULL,
  `studentID` int(10) NOT NULL,
  `programID` int(3) NOT NULL,
  `schoo_year` year(4) NOT NULL,
  `semester` enum('1','2','summer') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE IF NOT EXISTS `teacher` (
`ID` int(3) NOT NULL,
  `teacher_id` varchar(15) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `mname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `role` enum('admin','teacher') NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `teacher_class`
--

CREATE TABLE IF NOT EXISTS `teacher_class` (
  `ID` int(5) NOT NULL,
  `group_num` int(4) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `courseID` int(3) NOT NULL,
  `teacherID` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
 ADD PRIMARY KEY (`ID`), ADD KEY `ID` (`ID`);

--
-- Indexes for table `equivalent`
--
ALTER TABLE `equivalent`
 ADD PRIMARY KEY (`courseID`), ADD KEY `courseID` (`courseID`);

--
-- Indexes for table `po`
--
ALTER TABLE `po`
 ADD PRIMARY KEY (`ID`), ADD KEY `ID` (`ID`), ADD KEY `programID` (`programID`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
 ADD PRIMARY KEY (`ID`), ADD KEY `ID` (`ID`);

--
-- Indexes for table `scorecard`
--
ALTER TABLE `scorecard`
 ADD KEY `programID` (`programID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
 ADD PRIMARY KEY (`ID`), ADD KEY `ID` (`ID`), ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `student_course`
--
ALTER TABLE `student_course`
 ADD KEY `courseID` (`courseID`,`studentID`), ADD KEY `studentID` (`studentID`), ADD KEY `programID` (`programID`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
 ADD PRIMARY KEY (`ID`), ADD UNIQUE KEY `teacher_id` (`teacher_id`), ADD KEY `login_id` (`teacher_id`);

--
-- Indexes for table `teacher_class`
--
ALTER TABLE `teacher_class`
 ADD KEY `courseID` (`courseID`,`teacherID`), ADD KEY `teacherID` (`teacherID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `po`
--
ALTER TABLE `po`
MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

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
ADD CONSTRAINT `scorecard_ibfk_1` FOREIGN KEY (`programID`) REFERENCES `student_course` (`programID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_course`
--
ALTER TABLE `student_course`
ADD CONSTRAINT `student_course_ibfk_1` FOREIGN KEY (`studentID`) REFERENCES `student` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `student_course_ibfk_2` FOREIGN KEY (`courseID`) REFERENCES `course` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `student_course_ibfk_3` FOREIGN KEY (`programID`) REFERENCES `program` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teacher_class`
--
ALTER TABLE `teacher_class`
ADD CONSTRAINT `teacher_class_ibfk_1` FOREIGN KEY (`courseID`) REFERENCES `student_course` (`courseID`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `teacher_class_ibfk_2` FOREIGN KEY (`teacherID`) REFERENCES `teacher` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
