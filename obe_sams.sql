-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2015 at 10:29 AM
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`ID`, `CourseCode`, `CourseDesc`, `pyID`) VALUES
(1, 'ICT110', 'Introduction to Computer Science and Programming', 1),
(2, 'ICT111', 'ICT Fundamentals', 1),
(3, 'ICT116', 'Advanced Programming A', 1),
(4, 'ICT117', 'Software Application A', 1),
(5, 'ICT118', 'Web Page Design', 1);

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
('IT118', 5),
('CS118', 5);

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `po`
--

INSERT INTO `po` (`ID`, `attribute`, `poCode`, `description`, `pyID`) VALUES
(1, 'Knowledge for Solving Computing Problems', 'ICT01', 'Acquire, synergize and apply with exellence.', 1),
(2, 'Problem Analysis', 'ICT02', 'Fully determine, formulate, investigate related research works', 1),
(3, 'Design / Development of Solutions', 'ICT03', 'Design and evaluate with prudence', 1),
(4, 'Modern Tool Usage', 'ICT04', 'Create, select, adapt and apply effective and efficient techniques.', 1),
(5, 'Individual and Teamwork', 'ICT05', 'Able to work independently and indiscriminately collaborate as a member or leader in diverse teams', 1),
(6, 'Communication', 'ICT06', 'Communicate effectively and decently with the computing community and with society', 1),
(7, 'Computing Professionalism and Society', 'ICT07', 'Comprehend and assess thoroughly the impact of software solutions', 1),
(8, 'Ethics', 'ICT08', 'Understand, demonstrate and live an ethical and moral profession in the development, usage and presentation.', 1),
(9, 'Life-long Learning', 'ICT09', 'Recognize and Appreciate the relevance of computing principles and theories.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `po_course`
--

CREATE TABLE IF NOT EXISTS `po_course` (
  `status` enum('1','0') NOT NULL,
  `poID` int(3) NOT NULL,
  `courseID` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `po_course`
--

INSERT INTO `po_course` (`status`, `poID`, `courseID`) VALUES
('0', 1, 1),
('0', 2, 1),
('0', 3, 1),
('0', 4, 1),
('0', 5, 1),
('0', 6, 1),
('0', 7, 1),
('0', 8, 1),
('0', 9, 1),
('0', 1, 2),
('0', 2, 2),
('0', 3, 2),
('0', 4, 2),
('0', 5, 2),
('0', 6, 2),
('0', 7, 2),
('0', 8, 2),
('0', 9, 2),
('0', 1, 3),
('0', 2, 3),
('0', 3, 3),
('0', 4, 3),
('0', 5, 3),
('0', 6, 3),
('0', 7, 3),
('0', 8, 3),
('0', 9, 3),
('0', 1, 4),
('0', 2, 4),
('0', 3, 4),
('0', 4, 4),
('0', 5, 4),
('0', 6, 4),
('0', 7, 4),
('0', 8, 4),
('0', 9, 4),
('0', 1, 5),
('0', 2, 5),
('0', 3, 5),
('0', 4, 5),
('0', 5, 5),
('0', 6, 5),
('0', 7, 5),
('0', 8, 5),
('0', 9, 5);

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `program_year`
--

INSERT INTO `program_year` (`ID`, `effective_year`, `programID`) VALUES
(1, 2015, 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_course`
--

CREATE TABLE IF NOT EXISTS `student_course` (
  `score` float NOT NULL,
  `studentID` int(10) NOT NULL,
  `classID` int(5) NOT NULL,
  `poID` int(3) NOT NULL,
  `courseID` int(3) NOT NULL
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`ID`, `teacher_id`, `fname`, `mname`, `lname`, `role`, `password`) VALUES
(1, 'admin', 'Admin', 'Admin', 'Admin', 'admin', 'e8248cbe79a288ffec75d7300ad2e07172f487f6'),
(2, '1111111111', 'Joan', 'Smith', 'Tero', 'teacher', 'e8248cbe79a288ffec75d7300ad2e07172f487f6');

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
 ADD KEY `poID` (`poID`,`courseID`), ADD KEY `courseID` (`courseID`);

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
-- Indexes for table `student`
--
ALTER TABLE `student`
 ADD PRIMARY KEY (`ID`), ADD KEY `ID` (`ID`), ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `student_course`
--
ALTER TABLE `student_course`
 ADD KEY `courseID` (`studentID`), ADD KEY `studentID` (`studentID`), ADD KEY `classID` (`classID`), ADD KEY `poID` (`poID`), ADD KEY `courseID_2` (`courseID`);

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
MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `po`
--
ALTER TABLE `po`
MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `program_year`
--
ALTER TABLE `program_year`
MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
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
-- Constraints for table `student_course`
--
ALTER TABLE `student_course`
ADD CONSTRAINT `student_course_ibfk_3` FOREIGN KEY (`studentID`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `student_course_ibfk_4` FOREIGN KEY (`classID`) REFERENCES `teacher_class` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `student_course_ibfk_5` FOREIGN KEY (`poID`) REFERENCES `po_course` (`poID`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `student_course_ibfk_6` FOREIGN KEY (`courseID`) REFERENCES `po_course` (`courseID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teacher_class`
--
ALTER TABLE `teacher_class`
ADD CONSTRAINT `teacher_class_ibfk_1` FOREIGN KEY (`teacherID`) REFERENCES `teacher` (`teacher_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `teacher_class_ibfk_2` FOREIGN KEY (`courseCode`) REFERENCES `course` (`CourseCode`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
