-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2015 at 07:28 AM
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
  `pyID` int(3) NOT NULL,
  `year_level` enum('1st year','2nd year','3rd year','4th year') NOT NULL,
  `semester` enum('1st semester','2nd semester') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`ID`, `CourseCode`, `CourseDesc`, `pyID`, `year_level`, `semester`) VALUES
(8, 'ICT110', 'Intro to Computer Science and Programming', 5, '1st year', '1st semester'),
(9, 'ICT111', 'ICT Fundamentals', 5, '1st year', '1st semester'),
(10, 'ICT116', 'Advanced Programming A', 5, '1st year', '1st semester'),
(11, 'ICT117', 'Software Application', 5, '1st year', '1st semester'),
(12, 'ICT118', 'Web Page Design', 5, '1st year', '1st semester'),
(13, 'ICT121', 'Advanced Programming B', 5, '1st year', '1st semester'),
(14, 'ICT122', 'Multimedia Basics with Image Processing', 5, '1st year', '1st semester'),
(15, 'ICT123', 'Introduction to Management', 5, '1st year', '1st semester'),
(16, 'ICT126', 'Multimedia Production', 5, '1st year', '1st semester'),
(17, 'ICT127', 'Lab Technician''s Course', 5, '1st year', '1st semester'),
(18, 'ICT128', 'Business Processes', 5, '1st year', '1st semester'),
(19, 'ICT131', 'Database Systems I', 5, '1st year', '1st semester'),
(20, 'ICT132', 'Data Communication and Networking', 5, '1st year', '1st semester'),
(21, 'ICT133', 'Presentation Skills', 5, '1st year', '1st semester'),
(22, 'ICT134', 'Oral Communications for ICT I', 5, '1st year', '1st semester'),
(23, 'ICT135', 'Oral Communications for ICT II', 5, '1st year', '1st semester'),
(24, 'ICT136', 'Database Systems II', 5, '1st year', '1st semester'),
(25, 'ICT137', 'Quality Assurance', 5, '1st year', '1st semester'),
(26, 'ICT138', 'Network Management and Security', 5, '1st year', '1st semester'),
(27, 'ICT139', 'Professional Ethics for ICT', 5, '1st year', '1st semester'),
(28, 'ICT141', 'Web Applications Development', 5, '1st year', '1st semester'),
(29, 'ICT142', 'Internship/OJT/Practicum', 5, '1st year', '1st semester'),
(30, 'ICT146', 'Capstone Project', 5, '1st year', '1st semester'),
(31, 'IT110', 'Introduction to Computer Science and Programming', 6, '1st year', '1st semester'),
(32, 'IT11', 'Computer Operations', 6, '1st year', '1st semester'),
(33, 'IT116', 'Advanced Programming', 6, '1st year', '1st semester'),
(34, 'IT121', 'Data Structures I', 6, '1st year', '1st semester'),
(35, 'IT126', 'Data Structures II', 6, '1st year', '1st semester'),
(36, 'IT127', 'File Org and Processing', 6, '1st year', '1st semester'),
(37, 'IT128', 'Multimedia Systems', 6, '1st year', '1st semester'),
(38, 'IT130', 'Database Management Systems I', 6, '1st year', '1st semester'),
(39, 'IT131', 'Personal Computer Technology', 6, '1st year', '1st semester'),
(40, 'IT132', 'Presentation Skills in IT', 6, '1st year', '1st semester'),
(41, 'IT133', 'Introduction to Accounting for IT', 6, '1st year', '1st semester'),
(42, 'IT134', 'Object-oriented Technology', 6, '1st year', '1st semester'),
(43, 'IT135', 'Introduction to Management', 6, '1st year', '1st semester'),
(44, 'IT136', 'Database Management Systems II', 6, '1st year', '1st semester'),
(45, 'IT137', 'Comp. Sys. Org. with Assembly Language', 6, '1st year', '1st semester'),
(46, 'IT138', 'Data Communication and Networking', 6, '1st year', '1st semester'),
(47, 'IT139', 'Web Application Development', 6, '1st year', '1st semester'),
(48, 'IT140', 'Software Engineering I', 6, '1st year', '1st semester'),
(49, 'IT141', 'Operating Systems', 6, '1st year', '1st semester'),
(50, 'IT142', 'Ethics for the IT Profession', 6, '1st year', '1st semester'),
(51, 'IT143', 'Quality Consciousness, Habits and Processes', 6, '1st year', '1st semester'),
(52, 'IT144', 'Systems Resource Management', 6, '1st year', '1st semester'),
(53, 'IT145', 'Software Engineering II', 6, '1st year', '1st semester'),
(54, 'IT146', 'Management Information System', 6, '1st year', '1st semester'),
(55, 'IT147', 'Quality Management and Processes', 6, '1st year', '1st semester'),
(62, 'CS110', 'Intro to Comp Sci and Programming', 10, '1st year', '1st semester'),
(63, 'CS11', 'Computer Operations', 10, '1st year', '1st semester'),
(64, 'CS116', 'Advanced Programming', 10, '1st year', '1st semester'),
(65, 'CS121', 'Data Structures I', 10, '1st year', '1st semester'),
(66, 'CS126', 'Data Structures II', 10, '1st year', '1st semester'),
(67, 'CS127', 'File Org and Processing', 10, '1st year', '1st semester'),
(68, 'CS130', 'Database Systems I', 10, '1st year', '1st semester'),
(69, 'CS131', 'Object-oriented Concepts', 10, '1st year', '1st semester'),
(70, 'CS132', 'Numerical Methods', 10, '1st year', '1st semester'),
(71, 'CS133', 'Computer Systems Organization with Assembly Language', 10, '1st year', '1st semester'),
(72, 'CS134', 'Database Systems II', 10, '1st year', '1st semester'),
(73, 'CS135', 'Operating Systems', 10, '1st year', '1st semester'),
(74, 'CS136', 'Data Communication and Networking', 10, '1st year', '1st semester'),
(75, 'CS137', 'Research Methods', 10, '1st year', '1st semester'),
(76, 'CS138', 'Web Applications Development', 10, '1st year', '1st semester'),
(77, 'CS140', 'Software Engineering I', 10, '1st year', '1st semester'),
(78, 'CS141', 'Automata and Formal Languages', 10, '1st year', '1st semester'),
(79, 'CS142', 'Structure of Programming Language', 10, '1st year', '1st semester'),
(80, 'CS143', 'Research Project', 10, '1st year', '1st semester'),
(81, 'CS144', 'CS Practicum', 10, '1st year', '1st semester'),
(82, 'CS145', 'Software Engineering II', 10, '1st year', '1st semester'),
(83, 'CS146', 'Management Info System', 10, '1st year', '1st semester'),
(84, 'CS147', 'Quality Management and Processes', 10, '1st year', '1st semester'),
(85, 'CS148', 'Compiler Design', 10, '1st year', '1st semester'),
(86, 'CS148A', 'Compiler Design Project', 10, '1st year', '1st semester');

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
('', 30),
('', 55),
('', 86);

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
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `po`
--

INSERT INTO `po` (`ID`, `attribute`, `poCode`, `description`, `pyID`) VALUES
(10, 'Knowledge for Solving Computing Problems', 'ICT01', 'Acquire, synergize and apply...', 5),
(11, 'Problem Analysis', 'ICT02', 'Fully determine, formulate,...', 5),
(12, 'Design/Development of Solutions', 'ICT03', 'Design and evaluate...', 5),
(13, 'Modern Tool Usage', 'ICT04', 'Create, select, adopt...', 5),
(14, 'Individual and teamwork', 'ICT05', 'Able to work independently...', 5),
(15, 'Communication', 'ICT06', 'Communicate effectively and...', 5),
(16, 'Computing professionalism and society', 'ICT07', 'Comprehend and assess...', 5),
(17, 'Ethics', 'ICT08', 'Understand, demonstrate and...', 5),
(18, 'Life-long learning', 'ICT09', 'Recognize and appreciate...', 5),
(19, 'Knowledge for Solving Computing Problems', 'IT01', 'Acquire, synergize...', 6),
(20, 'Problem Analysis', 'IT02', 'Fully determine...', 6),
(21, 'Design/Development of Solutions', 'IT03', 'Design and evaluate...', 6),
(22, 'Design/Development of Solutions', 'IT04', 'Able to...', 6),
(23, 'Modern Tool Usage', 'IT05', 'Create, select,...', 6),
(24, 'Individual and Teamwork', 'IT06', 'Able to work...', 6),
(25, 'Communication', 'IT07', 'Communicate effectively...', 6),
(26, 'Computing Professionalism and Society', 'IT08', 'Comprehend and...', 6),
(27, 'Ethics', 'IT09', 'Understand, demonstrate...', 6),
(28, 'Life-long Learning', 'IT10', 'Recognize and...', 6),
(34, 'Knowledge for Solving Computing Problems', 'CS01', '...', 10),
(35, 'Problem Analysis', 'CS02', '...', 10),
(36, 'Design/Development of Solutions', 'CS03', '...', 10),
(37, 'Modern Tool Usage', 'CS04', '...', 10),
(38, 'Individual and Team Work', 'CS05', '...', 10),
(39, 'Communication', 'CS06', '...', 10),
(40, 'Computing Professionalism and Society', 'CS07', '...', 10),
(41, 'Ethics', 'CS08', '...', 10),
(42, 'Life-long Learning', 'CS09', '...', 10);

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
('1', 10, 8),
('1', 11, 8),
('0', 12, 8),
('0', 13, 8),
('0', 14, 8),
('1', 15, 8),
('0', 16, 8),
('0', 17, 8),
('0', 18, 8),
('0', 10, 9),
('0', 11, 9),
('0', 12, 9),
('1', 13, 9),
('1', 14, 9),
('1', 15, 9),
('1', 16, 9),
('0', 17, 9),
('0', 18, 9),
('1', 10, 10),
('1', 11, 10),
('0', 12, 10),
('0', 13, 10),
('0', 14, 10),
('1', 15, 10),
('0', 16, 10),
('0', 17, 10),
('0', 18, 10),
('0', 10, 11),
('0', 11, 11),
('0', 12, 11),
('1', 13, 11),
('0', 14, 11),
('1', 15, 11),
('0', 16, 11),
('0', 17, 11),
('1', 18, 11),
('0', 10, 12),
('0', 11, 12),
('1', 12, 12),
('1', 13, 12),
('0', 14, 12),
('0', 15, 12),
('0', 16, 12),
('1', 17, 12),
('1', 18, 12),
('1', 10, 13),
('1', 11, 13),
('0', 12, 13),
('0', 13, 13),
('1', 14, 13),
('1', 15, 13),
('0', 16, 13),
('0', 17, 13),
('0', 18, 13),
('0', 10, 14),
('0', 11, 14),
('1', 12, 14),
('1', 13, 14),
('0', 14, 14),
('1', 15, 14),
('0', 16, 14),
('1', 17, 14),
('0', 18, 14),
('0', 10, 15),
('0', 11, 15),
('1', 12, 15),
('0', 13, 15),
('1', 14, 15),
('1', 15, 15),
('0', 16, 15),
('0', 17, 15),
('1', 18, 15),
('0', 10, 16),
('0', 11, 16),
('1', 12, 16),
('1', 13, 16),
('1', 14, 16),
('0', 15, 16),
('1', 16, 16),
('0', 17, 16),
('1', 18, 16),
('1', 10, 17),
('0', 11, 17),
('0', 12, 17),
('1', 13, 17),
('0', 14, 17),
('0', 15, 17),
('1', 16, 17),
('1', 17, 17),
('0', 18, 17),
('0', 10, 18),
('1', 11, 18),
('0', 12, 18),
('0', 13, 18),
('1', 14, 18),
('1', 15, 18),
('0', 16, 18),
('1', 17, 18),
('0', 18, 18),
('0', 10, 19),
('1', 11, 19),
('1', 12, 19),
('0', 13, 19),
('1', 14, 19),
('1', 15, 19),
('1', 16, 19),
('0', 17, 19),
('0', 18, 19),
('1', 10, 20),
('0', 11, 20),
('1', 12, 20),
('0', 13, 20),
('1', 14, 20),
('0', 15, 20),
('0', 16, 20),
('0', 17, 20),
('0', 18, 20),
('0', 10, 21),
('0', 11, 21),
('0', 12, 21),
('0', 13, 21),
('1', 14, 21),
('1', 15, 21),
('0', 16, 21),
('0', 17, 21),
('0', 18, 21),
('1', 10, 22),
('0', 11, 22),
('0', 12, 22),
('1', 13, 22),
('0', 14, 22),
('1', 15, 22),
('0', 16, 22),
('0', 17, 22),
('0', 18, 22),
('1', 10, 23),
('0', 11, 23),
('0', 12, 23),
('1', 13, 23),
('0', 14, 23),
('1', 15, 23),
('0', 16, 23),
('0', 17, 23),
('0', 18, 23),
('0', 10, 24),
('0', 11, 24),
('1', 12, 24),
('1', 13, 24),
('1', 14, 24),
('1', 15, 24),
('1', 16, 24),
('0', 17, 24),
('0', 18, 24),
('0', 10, 25),
('1', 11, 25),
('0', 12, 25),
('1', 13, 25),
('0', 14, 25),
('1', 15, 25),
('0', 16, 25),
('0', 17, 25),
('0', 18, 25),
('0', 10, 26),
('1', 11, 26),
('0', 12, 26),
('1', 13, 26),
('0', 14, 26),
('0', 15, 26),
('1', 16, 26),
('1', 17, 26),
('0', 18, 26),
('0', 10, 27),
('1', 11, 27),
('1', 12, 27),
('0', 13, 27),
('0', 14, 27),
('0', 15, 27),
('0', 16, 27),
('1', 17, 27),
('1', 18, 27),
('1', 10, 28),
('1', 11, 28),
('0', 12, 28),
('0', 13, 28),
('1', 14, 28),
('0', 15, 28),
('0', 16, 28),
('0', 17, 28),
('1', 18, 28),
('0', 10, 29),
('0', 11, 29),
('1', 12, 29),
('1', 13, 29),
('1', 14, 29),
('0', 15, 29),
('1', 16, 29),
('1', 17, 29),
('0', 18, 29),
('0', 10, 30),
('0', 11, 30),
('1', 12, 30),
('1', 13, 30),
('0', 14, 30),
('1', 15, 30),
('0', 16, 30),
('0', 17, 30),
('1', 18, 30),
('1', 19, 31),
('1', 20, 31),
('0', 21, 31),
('0', 22, 31),
('0', 23, 31),
('0', 24, 31),
('1', 25, 31),
('0', 26, 31),
('1', 27, 31),
('0', 28, 31),
('0', 19, 32),
('0', 20, 32),
('0', 21, 32),
('0', 22, 32),
('0', 23, 32),
('0', 24, 32),
('0', 25, 32),
('0', 26, 32),
('0', 27, 32),
('0', 28, 32),
('1', 19, 33),
('0', 20, 33),
('1', 21, 33),
('0', 22, 33),
('0', 23, 33),
('1', 24, 33),
('0', 25, 33),
('1', 26, 33),
('1', 27, 33),
('0', 28, 33),
('1', 19, 34),
('0', 20, 34),
('1', 21, 34),
('0', 22, 34),
('0', 23, 34),
('1', 24, 34),
('0', 25, 34),
('1', 26, 34),
('1', 27, 34),
('0', 28, 34),
('1', 19, 35),
('0', 20, 35),
('1', 21, 35),
('0', 22, 35),
('0', 23, 35),
('1', 24, 35),
('0', 25, 35),
('1', 26, 35),
('1', 27, 35),
('0', 28, 35),
('0', 19, 36),
('0', 20, 36),
('0', 21, 36),
('0', 22, 36),
('0', 23, 36),
('0', 24, 36),
('0', 25, 36),
('0', 26, 36),
('0', 27, 36),
('0', 28, 36),
('0', 19, 37),
('0', 20, 37),
('0', 21, 37),
('0', 22, 37),
('0', 23, 37),
('0', 24, 37),
('0', 25, 37),
('0', 26, 37),
('0', 27, 37),
('0', 28, 37),
('0', 19, 38),
('1', 20, 38),
('1', 21, 38),
('0', 22, 38),
('0', 23, 38),
('0', 24, 38),
('1', 25, 38),
('1', 26, 38),
('0', 27, 38),
('0', 28, 38),
('0', 19, 39),
('0', 20, 39),
('0', 21, 39),
('0', 22, 39),
('0', 23, 39),
('0', 24, 39),
('0', 25, 39),
('0', 26, 39),
('0', 27, 39),
('0', 28, 39),
('0', 19, 40),
('0', 20, 40),
('0', 21, 40),
('0', 22, 40),
('0', 23, 40),
('0', 24, 40),
('0', 25, 40),
('0', 26, 40),
('0', 27, 40),
('0', 28, 40),
('0', 19, 41),
('0', 20, 41),
('0', 21, 41),
('0', 22, 41),
('0', 23, 41),
('0', 24, 41),
('0', 25, 41),
('0', 26, 41),
('0', 27, 41),
('0', 28, 41),
('0', 19, 42),
('0', 20, 42),
('0', 21, 42),
('1', 22, 42),
('1', 23, 42),
('1', 24, 42),
('1', 25, 42),
('0', 26, 42),
('1', 27, 42),
('0', 28, 42),
('0', 19, 43),
('0', 20, 43),
('0', 21, 43),
('0', 22, 43),
('0', 23, 43),
('0', 24, 43),
('0', 25, 43),
('0', 26, 43),
('0', 27, 43),
('0', 28, 43),
('0', 19, 44),
('1', 20, 44),
('1', 21, 44),
('1', 22, 44),
('1', 23, 44),
('0', 24, 44),
('1', 25, 44),
('1', 26, 44),
('0', 27, 44),
('0', 28, 44),
('0', 19, 45),
('0', 20, 45),
('0', 21, 45),
('1', 22, 45),
('1', 23, 45),
('1', 24, 45),
('0', 25, 45),
('0', 26, 45),
('1', 27, 45),
('1', 28, 45),
('1', 19, 46),
('0', 20, 46),
('0', 21, 46),
('0', 22, 46),
('1', 23, 46),
('0', 24, 46),
('0', 25, 46),
('0', 26, 46),
('1', 27, 46),
('1', 28, 46),
('0', 19, 47),
('0', 20, 47),
('0', 21, 47),
('1', 22, 47),
('1', 23, 47),
('1', 24, 47),
('0', 25, 47),
('0', 26, 47),
('1', 27, 47),
('0', 28, 47),
('0', 19, 48),
('1', 20, 48),
('0', 21, 48),
('0', 22, 48),
('1', 23, 48),
('0', 24, 48),
('0', 25, 48),
('1', 26, 48),
('1', 27, 48),
('0', 28, 48),
('0', 19, 49),
('0', 20, 49),
('0', 21, 49),
('1', 22, 49),
('1', 23, 49),
('1', 24, 49),
('0', 25, 49),
('0', 26, 49),
('1', 27, 49),
('1', 28, 49),
('1', 19, 50),
('1', 20, 50),
('0', 21, 50),
('0', 22, 50),
('0', 23, 50),
('0', 24, 50),
('0', 25, 50),
('1', 26, 50),
('1', 27, 50),
('0', 28, 50),
('0', 19, 51),
('0', 20, 51),
('0', 21, 51),
('0', 22, 51),
('0', 23, 51),
('0', 24, 51),
('0', 25, 51),
('0', 26, 51),
('0', 27, 51),
('0', 28, 51),
('0', 19, 52),
('1', 20, 52),
('0', 21, 52),
('0', 22, 52),
('1', 23, 52),
('0', 24, 52),
('0', 25, 52),
('1', 26, 52),
('1', 27, 52),
('0', 28, 52),
('0', 19, 53),
('1', 20, 53),
('0', 21, 53),
('0', 22, 53),
('1', 23, 53),
('0', 24, 53),
('0', 25, 53),
('1', 26, 53),
('1', 27, 53),
('0', 28, 53),
('0', 19, 54),
('0', 20, 54),
('0', 21, 54),
('0', 22, 54),
('0', 23, 54),
('0', 24, 54),
('0', 25, 54),
('0', 26, 54),
('0', 27, 54),
('0', 28, 54),
('0', 19, 55),
('0', 20, 55),
('0', 21, 55),
('0', 22, 55),
('0', 23, 55),
('0', 24, 55),
('0', 25, 55),
('0', 26, 55),
('0', 27, 55),
('0', 28, 55),
('0', 34, 62),
('0', 35, 62),
('0', 36, 62),
('0', 37, 62),
('0', 38, 62),
('0', 39, 62),
('0', 40, 62),
('0', 41, 62),
('0', 42, 62),
('0', 34, 63),
('0', 35, 63),
('0', 36, 63),
('1', 37, 63),
('1', 38, 63),
('1', 39, 63),
('1', 40, 63),
('0', 41, 63),
('0', 42, 63),
('0', 34, 64),
('1', 35, 64),
('1', 36, 64),
('0', 37, 64),
('1', 38, 64),
('1', 39, 64),
('0', 40, 64),
('1', 41, 64),
('0', 42, 64),
('0', 34, 65),
('1', 35, 65),
('1', 36, 65),
('0', 37, 65),
('1', 38, 65),
('1', 39, 65),
('0', 40, 65),
('1', 41, 65),
('0', 42, 65),
('0', 34, 66),
('0', 35, 66),
('0', 36, 66),
('0', 37, 66),
('0', 38, 66),
('0', 39, 66),
('0', 40, 66),
('0', 41, 66),
('0', 42, 66),
('0', 34, 67),
('0', 35, 67),
('0', 36, 67),
('0', 37, 67),
('0', 38, 67),
('0', 39, 67),
('0', 40, 67),
('0', 41, 67),
('0', 42, 67),
('0', 34, 68),
('0', 35, 68),
('0', 36, 68),
('0', 37, 68),
('0', 38, 68),
('0', 39, 68),
('0', 40, 68),
('0', 41, 68),
('0', 42, 68),
('1', 34, 69),
('0', 35, 69),
('1', 36, 69),
('1', 37, 69),
('0', 38, 69),
('1', 39, 69),
('1', 40, 69),
('0', 41, 69),
('0', 42, 69),
('0', 34, 70),
('0', 35, 70),
('0', 36, 70),
('0', 37, 70),
('0', 38, 70),
('0', 39, 70),
('0', 40, 70),
('0', 41, 70),
('0', 42, 70),
('0', 34, 71),
('0', 35, 71),
('0', 36, 71),
('0', 37, 71),
('0', 38, 71),
('0', 39, 71),
('0', 40, 71),
('0', 41, 71),
('0', 42, 71),
('0', 34, 72),
('0', 35, 72),
('0', 36, 72),
('0', 37, 72),
('0', 38, 72),
('0', 39, 72),
('0', 40, 72),
('0', 41, 72),
('0', 42, 72),
('0', 34, 73),
('0', 35, 73),
('0', 36, 73),
('0', 37, 73),
('0', 38, 73),
('0', 39, 73),
('0', 40, 73),
('0', 41, 73),
('0', 42, 73),
('1', 34, 74),
('1', 35, 74),
('0', 36, 74),
('1', 37, 74),
('0', 38, 74),
('0', 39, 74),
('1', 40, 74),
('0', 41, 74),
('1', 42, 74),
('0', 34, 75),
('0', 35, 75),
('0', 36, 75),
('0', 37, 75),
('0', 38, 75),
('0', 39, 75),
('0', 40, 75),
('0', 41, 75),
('0', 42, 75),
('0', 34, 76),
('0', 35, 76),
('1', 36, 76),
('1', 37, 76),
('1', 38, 76),
('0', 39, 76),
('0', 40, 76),
('0', 41, 76),
('1', 42, 76),
('0', 34, 77),
('0', 35, 77),
('1', 36, 77),
('1', 37, 77),
('1', 38, 77),
('1', 39, 77),
('0', 40, 77),
('0', 41, 77),
('0', 42, 77),
('0', 34, 78),
('1', 35, 78),
('1', 36, 78),
('0', 37, 78),
('1', 38, 78),
('0', 39, 78),
('0', 40, 78),
('1', 41, 78),
('1', 42, 78),
('0', 34, 79),
('0', 35, 79),
('0', 36, 79),
('0', 37, 79),
('0', 38, 79),
('0', 39, 79),
('0', 40, 79),
('0', 41, 79),
('0', 42, 79),
('0', 34, 80),
('0', 35, 80),
('0', 36, 80),
('0', 37, 80),
('0', 38, 80),
('0', 39, 80),
('0', 40, 80),
('0', 41, 80),
('0', 42, 80),
('0', 34, 81),
('0', 35, 81),
('0', 36, 81),
('0', 37, 81),
('0', 38, 81),
('0', 39, 81),
('0', 40, 81),
('0', 41, 81),
('0', 42, 81),
('0', 34, 82),
('0', 35, 82),
('1', 36, 82),
('1', 37, 82),
('1', 38, 82),
('1', 39, 82),
('0', 40, 82),
('0', 41, 82),
('0', 42, 82),
('0', 34, 83),
('0', 35, 83),
('0', 36, 83),
('0', 37, 83),
('0', 38, 83),
('0', 39, 83),
('0', 40, 83),
('0', 41, 83),
('0', 42, 83),
('0', 34, 84),
('0', 35, 84),
('0', 36, 84),
('0', 37, 84),
('0', 38, 84),
('0', 39, 84),
('0', 40, 84),
('0', 41, 84),
('0', 42, 84),
('0', 34, 85),
('0', 35, 85),
('0', 36, 85),
('0', 37, 85),
('0', 38, 85),
('0', 39, 85),
('0', 40, 85),
('0', 41, 85),
('0', 42, 85),
('0', 34, 86),
('0', 35, 86),
('0', 36, 86),
('0', 37, 86),
('0', 38, 86),
('0', 39, 86),
('0', 40, 86),
('0', 41, 86),
('0', 42, 86);

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE IF NOT EXISTS `program` (
`ID` int(3) NOT NULL,
  `programName` char(8) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`ID`, `programName`) VALUES
(4, 'BSICT'),
(5, 'BSIT'),
(7, 'BSCS');

-- --------------------------------------------------------

--
-- Table structure for table `program_year`
--

CREATE TABLE IF NOT EXISTS `program_year` (
`ID` int(3) NOT NULL,
  `effective_year` year(4) NOT NULL,
  `programID` int(3) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `program_year`
--

INSERT INTO `program_year` (`ID`, `effective_year`, `programID`) VALUES
(5, 2015, 4),
(6, 2015, 5),
(10, 2016, 7);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
`ID` int(10) NOT NULL,
  `student_id` int(10) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `mname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `year_level` char(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`ID`, `student_id`, `fname`, `mname`, `lname`, `year_level`, `password`) VALUES
(1, 9304897, 'Glenn', 'A', 'Arcilla', '1', '9304897'),
(2, 7302661, 'Ralph', 'D', 'Arco', '1', '7302661'),
(3, 7306872, 'Ludwig Dan', 'F', 'Beltran', '1', '7306872'),
(4, 11102316, 'Jeah Ann', 'R', 'Bercede', '1', '11102316'),
(5, 11104305, 'Paul Jess', 'T', 'Bolotaolo', '1', '11104305'),
(6, 11102611, 'Lynnlie Faye', 'H', 'Borja', '1', '11102611'),
(7, 10305841, 'Christian', 'F', 'Bracero', '1', '10305841'),
(8, 10306267, 'Rhezzil Gay', 'V', 'Calinawan', '1', '10306267'),
(9, 11100533, 'Christine Rea', 'B', 'Carin', '1', '11100533'),
(10, 11104402, 'Crystal Jean', 'L', 'Cartalla', '1', '11104402'),
(11, 11103578, 'Rina', 'B', 'Da?o', '2', '11103578'),
(12, 7307923, 'Gellie Mae', 'S', 'De Guia', '2', '7307923'),
(13, 11102404, 'Tracy', 'C', 'Diagon', '2', '11102404'),
(14, 11104551, 'Jovanne', 'V', 'Erida', '2', '11104551'),
(15, 11102158, 'Shaira Mae', 'B', 'Estan', '2', '11102158'),
(16, 10304548, 'Mark', 'R', 'Galolo', '2', '10304548'),
(17, 6303058, 'Joseph Alan', 'E', 'Genson', '2', '6303058'),
(18, 11103450, 'Theneelyn Claire', 'D', 'Haw', '2', '11103450'),
(19, 11106976, 'Jay Anthony', 'A', 'Jamilo', '2', '11106976'),
(20, 11102210, 'Ken', 'D', 'Kudo', '2', '11102210'),
(21, 6302012, 'Alvin', 'U', 'Lanceta', '3', '6302012'),
(22, 10303145, 'Darryl', 'H', 'Menina', '3', '10303145'),
(23, 10303496, 'Kate', 'A', 'Miranda', '3', '10303496'),
(24, 10306807, 'Freo', 'J', 'Montecillo', '3', '10306807'),
(25, 9307082, 'Jose Enjamemar', 'J', 'Moraga', '3', '9307082'),
(26, 11106019, 'John Ray-An', 'L', 'Noel', '3', '11106019'),
(27, 11102951, 'Antonette', 'Y', 'Ong', '3', '11102951'),
(28, 11101091, 'Mary Angeleque', 'Y', 'Padon', '3', '11101091'),
(29, 11102306, 'Merry Charlene', 'A', 'Pastor', '3', '11102306'),
(30, 10302946, 'Jesse Rhi', 'R', 'Pilota', '3', '10302946'),
(31, 8305919, 'Hubert', 'U', 'Plasencia', '4', '8305919'),
(32, 11103625, 'Jassem Jake', 'P', 'Poncardas', '4', '11103625'),
(33, 11100971, 'Mitzie Dane', 'Q', 'Pono', '4', '11100971'),
(34, 11104516, 'Dan Jose', 'E', 'Quijano', '4', '11104516'),
(35, 11100258, 'Lalaine Dawn', 'A', 'Sabandal', '4', '11100258'),
(36, 11100252, 'Michelle Anne', 'T', 'Sanchez', '4', '11100252'),
(37, 11102574, 'Rose Ann', 'T', 'Sescon', '4', '11102574'),
(38, 11102070, 'Fritz Geraldine', 'E', 'Siembra', '4', '11102070'),
(39, 11104504, 'Karanvir', 'A', 'Singh', '4', '11104504'),
(40, 11102063, 'Marjo', 'W', 'Sobrecaray', '4', '11102063');

-- --------------------------------------------------------

--
-- Table structure for table `student_course`
--

CREATE TABLE IF NOT EXISTS `student_course` (
  `poID` int(3) NOT NULL,
  `courseID` int(3) NOT NULL,
  `studentID` int(10) NOT NULL,
  `classID` int(5) NOT NULL,
  `score` float NOT NULL
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`ID`, `teacher_id`, `fname`, `mname`, `lname`, `role`, `password`) VALUES
(2, '1111111111', 'Joan', 'K', 'Tero', 'teacher', 'e8248cbe79a288ffec75d7300ad2e07172f487f6'),
(3, '1111111122', 'Marilou', 'K', 'Iway', 'teacher', '6e88e8026cd1cdee134abc5386de46488deaa56d'),
(4, 'admin', 'admin', 'a', 'admin', 'admin', 'admin');

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
 ADD KEY `courseID` (`poID`,`studentID`), ADD KEY `studentID` (`studentID`), ADD KEY `classID` (`classID`), ADD KEY `pyID` (`courseID`);

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
MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=87;
--
-- AUTO_INCREMENT for table `po`
--
ALTER TABLE `po`
MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `program_year`
--
ALTER TABLE `program_year`
MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
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
