-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2015 at 06:53 AM
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
  `CourseDesc` varchar(255) NOT NULL,
  `pyID` int(3) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`ID`, `CourseCode`, `CourseDesc`, `pyID`) VALUES
(3, 'ICT110', 'asd', 2),
(4, 'ICT116', 'asd', 2);

-- --------------------------------------------------------

--
-- Table structure for table `equivalent`
--

CREATE TABLE IF NOT EXISTS `equivalent` (
  `CourseEquivalent` varchar(30) NOT NULL,
  `courseID` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `equivalent`
--

INSERT INTO `equivalent` (`CourseEquivalent`, `courseID`) VALUES
('IT116', 4),
('CS116', 4),
('ACT100', 3);

-- --------------------------------------------------------

--
-- Table structure for table `po`
--

CREATE TABLE IF NOT EXISTS `po` (
`ID` int(3) NOT NULL,
  `attribute` varchar(100) NOT NULL,
  `poCode` varchar(10) NOT NULL,
  `description` text NOT NULL,
  `pyID` int(3) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `po`
--

INSERT INTO `po` (`ID`, `attribute`, `poCode`, `description`, `pyID`) VALUES
(5, 'asd', 'ICT01', 'asd', 2),
(6, 'asd', 'ICT02', 'asd', 2),
(7, 'asd', 'ICT03', 'asd', 2),
(8, 'asd', 'ICT04', 'asd', 2);

-- --------------------------------------------------------

--
-- Table structure for table `po_course`
--

CREATE TABLE IF NOT EXISTS `po_course` (
  `status` enum('0','1') NOT NULL,
  `poID` int(3) NOT NULL,
  `courseID` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `po_course`
--

INSERT INTO `po_course` (`status`, `poID`, `courseID`) VALUES
('1', 5, 3),
('0', 6, 3),
('0', 7, 3),
('0', 8, 3),
('1', 5, 4),
('1', 6, 4),
('0', 7, 4),
('1', 8, 4);

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE IF NOT EXISTS `program` (
`ID` int(3) NOT NULL,
  `programName` char(8) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`ID`, `programName`) VALUES
(1, 'BSICT');

-- --------------------------------------------------------

--
-- Table structure for table `program_year`
--

CREATE TABLE IF NOT EXISTS `program_year` (
`ID` int(3) NOT NULL,
  `effective_year` year(4) NOT NULL,
  `programID` int(3) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `program_year`
--

INSERT INTO `program_year` (`ID`, `effective_year`, `programID`) VALUES
(2, 2015, 1);

-- --------------------------------------------------------

--
-- Table structure for table `scorecard`
--

CREATE TABLE IF NOT EXISTS `scorecard` (
  `score` float NOT NULL,
  `pyID` int(3) NOT NULL
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
  `pyID` int(3) NOT NULL,
  `classID` int(5) NOT NULL
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
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`ID`, `teacher_id`, `fname`, `mname`, `lname`, `role`, `password`) VALUES
(1, '1111111111', 'Test', 'Test', 'Test', 'teacher', 'e8248cbe79a288ffec75d7300ad2e07172f487f6');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_class`
--

CREATE TABLE IF NOT EXISTS `teacher_class` (
`ID` int(5) NOT NULL,
  `group_num` int(4) NOT NULL,
  `start_time` char(10) NOT NULL,
  `end_time` char(10) NOT NULL,
  `days` char(7) NOT NULL,
  `semester` enum('1','2','summer') NOT NULL,
  `school_year` year(4) NOT NULL,
  `courseCode` varchar(9) NOT NULL,
  `teacherID` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
 ADD PRIMARY KEY (`ID`), ADD KEY `programID` (`pyID`), ADD KEY `CourseCode` (`CourseCode`);

--
-- Indexes for table `equivalent`
--
ALTER TABLE `equivalent`
 ADD KEY `courseID` (`courseID`);

--
-- Indexes for table `po`
--
ALTER TABLE `po`
 ADD PRIMARY KEY (`ID`), ADD KEY `ID` (`ID`), ADD KEY `pyID` (`pyID`);

--
-- Indexes for table `po_course`
--
ALTER TABLE `po_course`
 ADD KEY `poID` (`poID`), ADD KEY `courseID` (`courseID`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
 ADD PRIMARY KEY (`ID`), ADD KEY `ID` (`ID`);

--
-- Indexes for table `program_year`
--
ALTER TABLE `program_year`
 ADD PRIMARY KEY (`ID`), ADD KEY `programID` (`programID`), ADD KEY `programID_2` (`programID`);

--
-- Indexes for table `scorecard`
--
ALTER TABLE `scorecard`
 ADD KEY `programID` (`pyID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
 ADD PRIMARY KEY (`ID`), ADD KEY `ID` (`ID`), ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `student_course`
--
ALTER TABLE `student_course`
 ADD KEY `courseID` (`courseID`,`studentID`), ADD KEY `studentID` (`studentID`), ADD KEY `programID` (`pyID`), ADD KEY `classID` (`classID`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
 ADD PRIMARY KEY (`ID`), ADD UNIQUE KEY `teacher_id` (`teacher_id`), ADD KEY `login_id` (`teacher_id`);

--
-- Indexes for table `teacher_class`
--
ALTER TABLE `teacher_class`
 ADD PRIMARY KEY (`ID`), ADD KEY `courseID` (`courseCode`,`teacherID`), ADD KEY `teacherID` (`teacherID`), ADD KEY `courseCode` (`courseCode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `po`
--
ALTER TABLE `po`
MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `program_year`
--
ALTER TABLE `program_year`
MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
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
-- AUTO_INCREMENT for table `teacher_class`
--
ALTER TABLE `teacher_class`
MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `course`
--
ALTER TABLE `course`
ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`pyID`) REFERENCES `program_year` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `equivalent`
--
ALTER TABLE `equivalent`
ADD CONSTRAINT `equivalent_ibfk_1` FOREIGN KEY (`courseID`) REFERENCES `course` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `po`
--
ALTER TABLE `po`
ADD CONSTRAINT `po_ibfk_1` FOREIGN KEY (`pyID`) REFERENCES `program_year` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `po_course`
--
ALTER TABLE `po_course`
ADD CONSTRAINT `po_course_ibfk_1` FOREIGN KEY (`poID`) REFERENCES `po` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `po_course_ibfk_2` FOREIGN KEY (`courseID`) REFERENCES `course` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `program_year`
--
ALTER TABLE `program_year`
ADD CONSTRAINT `program_year_ibfk_1` FOREIGN KEY (`programID`) REFERENCES `program` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `scorecard`
--
ALTER TABLE `scorecard`
ADD CONSTRAINT `scorecard_ibfk_1` FOREIGN KEY (`pyID`) REFERENCES `student_course` (`pyID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_course`
--
ALTER TABLE `student_course`
ADD CONSTRAINT `student_course_ibfk_2` FOREIGN KEY (`courseID`) REFERENCES `course` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `student_course_ibfk_3` FOREIGN KEY (`studentID`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `student_course_ibfk_4` FOREIGN KEY (`classID`) REFERENCES `teacher_class` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `student_course_ibfk_5` FOREIGN KEY (`pyID`) REFERENCES `program_year` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teacher_class`
--
ALTER TABLE `teacher_class`
ADD CONSTRAINT `teacher_class_ibfk_1` FOREIGN KEY (`teacherID`) REFERENCES `teacher` (`teacher_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `teacher_class_ibfk_2` FOREIGN KEY (`courseCode`) REFERENCES `course` (`CourseCode`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
