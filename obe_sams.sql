-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2015 at 10:17 PM
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
  `year_level` enum('1','2','3','4') NOT NULL,
  `semester` enum('1','2') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=96 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`ID`, `CourseCode`, `CourseDesc`, `pyID`, `year_level`, `semester`) VALUES
(8, 'ICT110', 'Intro to Computer Science and Programming', 5, '1', '1'),
(9, 'ICT111', 'ICT Fundamentals', 5, '1', '1'),
(10, 'ICT116', 'Advanced Programming A', 5, '1', '2'),
(11, 'ICT117', 'Software Application', 5, '1', '2'),
(12, 'ICT118', 'Web Page Design', 5, '1', '2'),
(13, 'ICT121', 'Advanced Programming B', 5, '2', '1'),
(14, 'ICT122', 'Multimedia Basics with Image Processing', 5, '2', '1'),
(15, 'ICT123', 'Introduction to Management', 5, '2', '1'),
(16, 'ICT126', 'Multimedia Production', 5, '2', '2'),
(17, 'ICT127', 'Lab Technician''s Course', 5, '2', '2'),
(18, 'ICT128', 'Business Processes', 5, '2', '2'),
(19, 'ICT131', 'Database Systems I', 5, '3', '1'),
(20, 'ICT132', 'Data Communication and Networking', 5, '3', '1'),
(21, 'ICT133', 'Presentation Skills', 5, '3', '1'),
(22, 'ICT134', 'Oral Communications for ICT I', 5, '3', '1'),
(23, 'ICT135', 'Oral Communications for ICT II', 5, '3', '2'),
(24, 'ICT136', 'Database Systems II', 5, '3', '2'),
(25, 'ICT137', 'Quality Assurance', 5, '3', '2'),
(26, 'ICT138', 'Network Management and Security', 5, '3', '2'),
(27, 'ICT139', 'Professional Ethics for ICT', 5, '3', '2'),
(28, 'ICT141', 'Web Applications Development', 5, '4', '1'),
(29, 'ICT142', 'Internship/OJT/Practicum', 5, '4', '1'),
(30, 'ICT146', 'Capstone Project', 5, '4', '2'),
(31, 'IT110', 'Introduction to Computer Science and Programming', 6, '', ''),
(32, 'IT11', 'Computer Operations', 6, '', ''),
(33, 'IT116', 'Advanced Programming', 6, '', ''),
(34, 'IT121', 'Data Structures I', 6, '', ''),
(35, 'IT126', 'Data Structures II', 6, '', ''),
(36, 'IT127', 'File Org and Processing', 6, '', ''),
(37, 'IT128', 'Multimedia Systems', 6, '', ''),
(38, 'IT130', 'Database Management Systems I', 6, '', ''),
(39, 'IT131', 'Personal Computer Technology', 6, '', ''),
(40, 'IT132', 'Presentation Skills in IT', 6, '', ''),
(41, 'IT133', 'Introduction to Accounting for IT', 6, '', ''),
(42, 'IT134', 'Object-oriented Technology', 6, '', ''),
(43, 'IT135', 'Introduction to Management', 6, '', ''),
(44, 'IT136', 'Database Management Systems II', 6, '', ''),
(45, 'IT137', 'Comp. Sys. Org. with Assembly Language', 6, '', ''),
(46, 'IT138', 'Data Communication and Networking', 6, '', ''),
(47, 'IT139', 'Web Application Development', 6, '', ''),
(48, 'IT140', 'Software Engineering I', 6, '', ''),
(49, 'IT141', 'Operating Systems', 6, '', ''),
(50, 'IT142', 'Ethics for the IT Profession', 6, '', ''),
(51, 'IT143', 'Quality Consciousness, Habits and Processes', 6, '', ''),
(52, 'IT144', 'Systems Resource Management', 6, '', ''),
(53, 'IT145', 'Software Engineering II', 6, '', ''),
(54, 'IT146', 'Management Information System', 6, '', ''),
(55, 'IT147', 'Quality Management and Processes', 6, '', ''),
(62, 'CS110', 'Intro to Comp Sci and Programming', 10, '', ''),
(63, 'CS11', 'Computer Operations', 10, '', ''),
(64, 'CS116', 'Advanced Programming', 10, '', ''),
(65, 'CS121', 'Data Structures I', 10, '', ''),
(66, 'CS126', 'Data Structures II', 10, '', ''),
(67, 'CS127', 'File Org and Processing', 10, '', ''),
(68, 'CS130', 'Database Systems I', 10, '', ''),
(69, 'CS131', 'Object-oriented Concepts', 10, '', ''),
(70, 'CS132', 'Numerical Methods', 10, '', ''),
(71, 'CS133', 'Computer Systems Organization with Assembly Language', 10, '', ''),
(72, 'CS134', 'Database Systems II', 10, '', ''),
(73, 'CS135', 'Operating Systems', 10, '', ''),
(74, 'CS136', 'Data Communication and Networking', 10, '', ''),
(75, 'CS137', 'Research Methods', 10, '', ''),
(76, 'CS138', 'Web Applications Development', 10, '', ''),
(77, 'CS140', 'Software Engineering I', 10, '', ''),
(78, 'CS141', 'Automata and Formal Languages', 10, '', ''),
(79, 'CS142', 'Structure of Programming Language', 10, '', ''),
(80, 'CS143', 'Research Project', 10, '', ''),
(81, 'CS144', 'CS Practicum', 10, '', ''),
(82, 'CS145', 'Software Engineering II', 10, '', ''),
(83, 'CS146', 'Management Info System', 10, '', ''),
(84, 'CS147', 'Quality Management and Processes', 10, '', ''),
(85, 'CS148', 'Compiler Design', 10, '', ''),
(86, 'CS148A', 'Compiler Design Project', 10, '', ''),
(87, 'ICT110', 'Intro to Computer Science and Programming', 11, '', ''),
(88, 'ICT111', 'ICT Fundamentals', 11, '', ''),
(89, 'ICT116', 'Advanced Programming A', 11, '', ''),
(90, 'ICT117', 'Software Application', 11, '', ''),
(91, 'ICT118', 'Web Page Design', 11, '', ''),
(92, 'ICT121', 'Advanced Programming B', 11, '', ''),
(93, 'ICT122', 'Multimedia Basics with Image Processing', 11, '', ''),
(94, 'ICT123', 'Introduction to Management', 11, '', ''),
(95, 'ICT126', 'Multimedia Production', 11, '', '');

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
('', 86),
('', 95);

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
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

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
(42, 'Life-long Learning', 'CS09', '...', 10),
(43, 'Knowledge for Solving Computing Problems', 'ICT01', 'sdfsdfsdfsdfsdfsdf', 11),
(44, 'Problem Analysis', 'ICT02', 'sdfsdfsdfsdfsdfsdf', 11),
(45, 'Design/Development of Solutions', 'ICT03', 'sdfsdfsdfsdfsdfsdf', 11),
(46, 'Modern Tool Usage', 'ICT04', 'sdfsdfsdfsdfsdfsdf', 11),
(47, 'Individual and teamwork', 'ICT05', 'sdfsdfsdfsdfsdfsdf', 11),
(48, 'Communication', 'ICT06', 'sdfsdfsdfsdfsdfsdf', 11),
(49, 'Computing professionalism and society', 'ICT07', 'sdfsdfsdfsdfsdfsdf', 11),
(50, 'Ethics', 'ICT08', 'sdfsdfsdfsdfsdfsdf', 11),
(51, 'Life-long learning', 'ICT09', 'sdfsdfsdfsdfsdfsdf', 11);

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
('0', 10, 9),
('1', 10, 10),
('0', 10, 11),
('0', 10, 12),
('1', 10, 13),
('0', 10, 14),
('0', 10, 15),
('0', 10, 16),
('1', 10, 17),
('0', 10, 18),
('0', 10, 19),
('1', 10, 20),
('0', 10, 21),
('1', 10, 22),
('1', 10, 23),
('0', 10, 24),
('0', 10, 25),
('0', 10, 26),
('0', 10, 27),
('1', 10, 28),
('0', 10, 29),
('0', 10, 30),
('1', 11, 8),
('0', 11, 9),
('1', 11, 10),
('0', 11, 11),
('0', 11, 12),
('1', 11, 13),
('0', 11, 14),
('0', 11, 15),
('0', 11, 16),
('0', 11, 17),
('1', 11, 18),
('1', 11, 19),
('0', 11, 20),
('0', 11, 21),
('0', 11, 22),
('0', 11, 23),
('0', 11, 24),
('1', 11, 25),
('1', 11, 26),
('1', 11, 27),
('1', 11, 28),
('0', 11, 29),
('0', 11, 30),
('0', 12, 8),
('0', 12, 9),
('0', 12, 10),
('0', 12, 11),
('1', 12, 12),
('0', 12, 13),
('1', 12, 14),
('1', 12, 15),
('1', 12, 16),
('0', 12, 17),
('0', 12, 18),
('1', 12, 19),
('1', 12, 20),
('0', 12, 21),
('0', 12, 22),
('0', 12, 23),
('1', 12, 24),
('0', 12, 25),
('0', 12, 26),
('1', 12, 27),
('0', 12, 28),
('1', 12, 29),
('1', 12, 30),
('0', 13, 8),
('1', 13, 9),
('0', 13, 10),
('1', 13, 11),
('1', 13, 12),
('0', 13, 13),
('1', 13, 14),
('0', 13, 15),
('1', 13, 16),
('1', 13, 17),
('0', 13, 18),
('0', 13, 19),
('0', 13, 20),
('0', 13, 21),
('1', 13, 22),
('1', 13, 23),
('1', 13, 24),
('1', 13, 25),
('1', 13, 26),
('0', 13, 27),
('0', 13, 28),
('1', 13, 29),
('1', 13, 30),
('0', 14, 8),
('1', 14, 9),
('0', 14, 10),
('0', 14, 11),
('0', 14, 12),
('1', 14, 13),
('0', 14, 14),
('1', 14, 15),
('1', 14, 16),
('0', 14, 17),
('1', 14, 18),
('1', 14, 19),
('1', 14, 20),
('1', 14, 21),
('0', 14, 22),
('0', 14, 23),
('1', 14, 24),
('0', 14, 25),
('0', 14, 26),
('0', 14, 27),
('1', 14, 28),
('1', 14, 29),
('0', 14, 30),
('1', 15, 8),
('1', 15, 9),
('1', 15, 10),
('1', 15, 11),
('0', 15, 12),
('1', 15, 13),
('1', 15, 14),
('1', 15, 15),
('0', 15, 16),
('0', 15, 17),
('1', 15, 18),
('1', 15, 19),
('0', 15, 20),
('1', 15, 21),
('1', 15, 22),
('1', 15, 23),
('1', 15, 24),
('1', 15, 25),
('0', 15, 26),
('0', 15, 27),
('0', 15, 28),
('0', 15, 29),
('1', 15, 30),
('0', 16, 8),
('1', 16, 9),
('0', 16, 10),
('0', 16, 11),
('0', 16, 12),
('0', 16, 13),
('0', 16, 14),
('0', 16, 15),
('1', 16, 16),
('1', 16, 17),
('0', 16, 18),
('1', 16, 19),
('0', 16, 20),
('0', 16, 21),
('0', 16, 22),
('0', 16, 23),
('1', 16, 24),
('0', 16, 25),
('1', 16, 26),
('0', 16, 27),
('0', 16, 28),
('1', 16, 29),
('0', 16, 30),
('0', 17, 8),
('0', 17, 9),
('0', 17, 10),
('0', 17, 11),
('1', 17, 12),
('0', 17, 13),
('1', 17, 14),
('0', 17, 15),
('0', 17, 16),
('1', 17, 17),
('1', 17, 18),
('0', 17, 19),
('0', 17, 20),
('0', 17, 21),
('0', 17, 22),
('0', 17, 23),
('0', 17, 24),
('0', 17, 25),
('1', 17, 26),
('1', 17, 27),
('0', 17, 28),
('1', 17, 29),
('0', 17, 30),
('0', 18, 8),
('0', 18, 9),
('0', 18, 10),
('1', 18, 11),
('1', 18, 12),
('0', 18, 13),
('0', 18, 14),
('1', 18, 15),
('1', 18, 16),
('0', 18, 17),
('0', 18, 18),
('0', 18, 19),
('0', 18, 20),
('0', 18, 21),
('0', 18, 22),
('0', 18, 23),
('0', 18, 24),
('0', 18, 25),
('0', 18, 26),
('1', 18, 27),
('1', 18, 28),
('0', 18, 29),
('1', 18, 30),
('1', 19, 31),
('0', 19, 32),
('1', 19, 33),
('1', 19, 34),
('1', 19, 35),
('0', 19, 36),
('0', 19, 37),
('0', 19, 38),
('0', 19, 39),
('0', 19, 40),
('0', 19, 41),
('0', 19, 42),
('0', 19, 43),
('0', 19, 44),
('0', 19, 45),
('1', 19, 46),
('0', 19, 47),
('0', 19, 48),
('0', 19, 49),
('1', 19, 50),
('0', 19, 51),
('0', 19, 52),
('0', 19, 53),
('0', 19, 54),
('0', 19, 55),
('1', 20, 31),
('0', 20, 32),
('0', 20, 33),
('0', 20, 34),
('0', 20, 35),
('0', 20, 36),
('0', 20, 37),
('1', 20, 38),
('0', 20, 39),
('0', 20, 40),
('0', 20, 41),
('0', 20, 42),
('0', 20, 43),
('1', 20, 44),
('0', 20, 45),
('0', 20, 46),
('0', 20, 47),
('1', 20, 48),
('0', 20, 49),
('1', 20, 50),
('0', 20, 51),
('1', 20, 52),
('1', 20, 53),
('0', 20, 54),
('0', 20, 55),
('0', 21, 31),
('0', 21, 32),
('1', 21, 33),
('1', 21, 34),
('1', 21, 35),
('0', 21, 36),
('0', 21, 37),
('1', 21, 38),
('0', 21, 39),
('0', 21, 40),
('0', 21, 41),
('0', 21, 42),
('0', 21, 43),
('1', 21, 44),
('0', 21, 45),
('0', 21, 46),
('0', 21, 47),
('0', 21, 48),
('0', 21, 49),
('0', 21, 50),
('0', 21, 51),
('0', 21, 52),
('0', 21, 53),
('0', 21, 54),
('0', 21, 55),
('0', 22, 31),
('0', 22, 32),
('0', 22, 33),
('0', 22, 34),
('0', 22, 35),
('0', 22, 36),
('0', 22, 37),
('0', 22, 38),
('0', 22, 39),
('0', 22, 40),
('0', 22, 41),
('1', 22, 42),
('0', 22, 43),
('1', 22, 44),
('1', 22, 45),
('0', 22, 46),
('1', 22, 47),
('0', 22, 48),
('1', 22, 49),
('0', 22, 50),
('0', 22, 51),
('0', 22, 52),
('0', 22, 53),
('0', 22, 54),
('0', 22, 55),
('0', 23, 31),
('0', 23, 32),
('0', 23, 33),
('0', 23, 34),
('0', 23, 35),
('0', 23, 36),
('0', 23, 37),
('0', 23, 38),
('0', 23, 39),
('0', 23, 40),
('0', 23, 41),
('1', 23, 42),
('0', 23, 43),
('1', 23, 44),
('1', 23, 45),
('1', 23, 46),
('1', 23, 47),
('1', 23, 48),
('1', 23, 49),
('0', 23, 50),
('0', 23, 51),
('1', 23, 52),
('1', 23, 53),
('0', 23, 54),
('0', 23, 55),
('0', 24, 31),
('0', 24, 32),
('1', 24, 33),
('1', 24, 34),
('1', 24, 35),
('0', 24, 36),
('0', 24, 37),
('0', 24, 38),
('0', 24, 39),
('0', 24, 40),
('0', 24, 41),
('1', 24, 42),
('0', 24, 43),
('0', 24, 44),
('1', 24, 45),
('0', 24, 46),
('1', 24, 47),
('0', 24, 48),
('1', 24, 49),
('0', 24, 50),
('0', 24, 51),
('0', 24, 52),
('0', 24, 53),
('0', 24, 54),
('0', 24, 55),
('1', 25, 31),
('0', 25, 32),
('0', 25, 33),
('0', 25, 34),
('0', 25, 35),
('0', 25, 36),
('0', 25, 37),
('1', 25, 38),
('0', 25, 39),
('0', 25, 40),
('0', 25, 41),
('1', 25, 42),
('0', 25, 43),
('1', 25, 44),
('0', 25, 45),
('0', 25, 46),
('0', 25, 47),
('0', 25, 48),
('0', 25, 49),
('0', 25, 50),
('0', 25, 51),
('0', 25, 52),
('0', 25, 53),
('0', 25, 54),
('0', 25, 55),
('0', 26, 31),
('0', 26, 32),
('1', 26, 33),
('1', 26, 34),
('1', 26, 35),
('0', 26, 36),
('0', 26, 37),
('1', 26, 38),
('0', 26, 39),
('0', 26, 40),
('0', 26, 41),
('0', 26, 42),
('0', 26, 43),
('1', 26, 44),
('0', 26, 45),
('0', 26, 46),
('0', 26, 47),
('1', 26, 48),
('0', 26, 49),
('1', 26, 50),
('0', 26, 51),
('1', 26, 52),
('1', 26, 53),
('0', 26, 54),
('0', 26, 55),
('1', 27, 31),
('0', 27, 32),
('1', 27, 33),
('1', 27, 34),
('1', 27, 35),
('0', 27, 36),
('0', 27, 37),
('0', 27, 38),
('0', 27, 39),
('0', 27, 40),
('0', 27, 41),
('1', 27, 42),
('0', 27, 43),
('0', 27, 44),
('1', 27, 45),
('1', 27, 46),
('1', 27, 47),
('1', 27, 48),
('1', 27, 49),
('1', 27, 50),
('0', 27, 51),
('1', 27, 52),
('1', 27, 53),
('0', 27, 54),
('0', 27, 55),
('0', 28, 31),
('0', 28, 32),
('0', 28, 33),
('0', 28, 34),
('0', 28, 35),
('0', 28, 36),
('0', 28, 37),
('0', 28, 38),
('0', 28, 39),
('0', 28, 40),
('0', 28, 41),
('0', 28, 42),
('0', 28, 43),
('0', 28, 44),
('1', 28, 45),
('1', 28, 46),
('0', 28, 47),
('0', 28, 48),
('1', 28, 49),
('0', 28, 50),
('0', 28, 51),
('0', 28, 52),
('0', 28, 53),
('0', 28, 54),
('0', 28, 55),
('0', 34, 62),
('0', 34, 63),
('0', 34, 64),
('0', 34, 65),
('0', 34, 66),
('0', 34, 67),
('0', 34, 68),
('1', 34, 69),
('0', 34, 70),
('0', 34, 71),
('0', 34, 72),
('0', 34, 73),
('1', 34, 74),
('0', 34, 75),
('0', 34, 76),
('0', 34, 77),
('0', 34, 78),
('0', 34, 79),
('0', 34, 80),
('0', 34, 81),
('0', 34, 82),
('0', 34, 83),
('0', 34, 84),
('0', 34, 85),
('0', 34, 86),
('0', 35, 62),
('0', 35, 63),
('1', 35, 64),
('1', 35, 65),
('0', 35, 66),
('0', 35, 67),
('0', 35, 68),
('0', 35, 69),
('0', 35, 70),
('0', 35, 71),
('0', 35, 72),
('0', 35, 73),
('1', 35, 74),
('0', 35, 75),
('0', 35, 76),
('0', 35, 77),
('1', 35, 78),
('0', 35, 79),
('0', 35, 80),
('0', 35, 81),
('0', 35, 82),
('0', 35, 83),
('0', 35, 84),
('0', 35, 85),
('0', 35, 86),
('0', 36, 62),
('0', 36, 63),
('1', 36, 64),
('1', 36, 65),
('0', 36, 66),
('0', 36, 67),
('0', 36, 68),
('1', 36, 69),
('0', 36, 70),
('0', 36, 71),
('0', 36, 72),
('0', 36, 73),
('0', 36, 74),
('0', 36, 75),
('1', 36, 76),
('1', 36, 77),
('1', 36, 78),
('0', 36, 79),
('0', 36, 80),
('0', 36, 81),
('1', 36, 82),
('0', 36, 83),
('0', 36, 84),
('0', 36, 85),
('0', 36, 86),
('0', 37, 62),
('1', 37, 63),
('0', 37, 64),
('0', 37, 65),
('0', 37, 66),
('0', 37, 67),
('0', 37, 68),
('1', 37, 69),
('0', 37, 70),
('0', 37, 71),
('0', 37, 72),
('0', 37, 73),
('1', 37, 74),
('0', 37, 75),
('1', 37, 76),
('1', 37, 77),
('0', 37, 78),
('0', 37, 79),
('0', 37, 80),
('0', 37, 81),
('1', 37, 82),
('0', 37, 83),
('0', 37, 84),
('0', 37, 85),
('0', 37, 86),
('0', 38, 62),
('1', 38, 63),
('1', 38, 64),
('1', 38, 65),
('0', 38, 66),
('0', 38, 67),
('0', 38, 68),
('0', 38, 69),
('0', 38, 70),
('0', 38, 71),
('0', 38, 72),
('0', 38, 73),
('0', 38, 74),
('0', 38, 75),
('1', 38, 76),
('1', 38, 77),
('1', 38, 78),
('0', 38, 79),
('0', 38, 80),
('0', 38, 81),
('1', 38, 82),
('0', 38, 83),
('0', 38, 84),
('0', 38, 85),
('0', 38, 86),
('0', 39, 62),
('1', 39, 63),
('1', 39, 64),
('1', 39, 65),
('0', 39, 66),
('0', 39, 67),
('0', 39, 68),
('1', 39, 69),
('0', 39, 70),
('0', 39, 71),
('0', 39, 72),
('0', 39, 73),
('0', 39, 74),
('0', 39, 75),
('0', 39, 76),
('1', 39, 77),
('0', 39, 78),
('0', 39, 79),
('0', 39, 80),
('0', 39, 81),
('1', 39, 82),
('0', 39, 83),
('0', 39, 84),
('0', 39, 85),
('0', 39, 86),
('0', 40, 62),
('1', 40, 63),
('0', 40, 64),
('0', 40, 65),
('0', 40, 66),
('0', 40, 67),
('0', 40, 68),
('1', 40, 69),
('0', 40, 70),
('0', 40, 71),
('0', 40, 72),
('0', 40, 73),
('1', 40, 74),
('0', 40, 75),
('0', 40, 76),
('0', 40, 77),
('0', 40, 78),
('0', 40, 79),
('0', 40, 80),
('0', 40, 81),
('0', 40, 82),
('0', 40, 83),
('0', 40, 84),
('0', 40, 85),
('0', 40, 86),
('0', 41, 62),
('0', 41, 63),
('1', 41, 64),
('1', 41, 65),
('0', 41, 66),
('0', 41, 67),
('0', 41, 68),
('0', 41, 69),
('0', 41, 70),
('0', 41, 71),
('0', 41, 72),
('0', 41, 73),
('0', 41, 74),
('0', 41, 75),
('0', 41, 76),
('0', 41, 77),
('1', 41, 78),
('0', 41, 79),
('0', 41, 80),
('0', 41, 81),
('0', 41, 82),
('0', 41, 83),
('0', 41, 84),
('0', 41, 85),
('0', 41, 86),
('0', 42, 62),
('0', 42, 63),
('0', 42, 64),
('0', 42, 65),
('0', 42, 66),
('0', 42, 67),
('0', 42, 68),
('0', 42, 69),
('0', 42, 70),
('0', 42, 71),
('0', 42, 72),
('0', 42, 73),
('1', 42, 74),
('0', 42, 75),
('1', 42, 76),
('0', 42, 77),
('1', 42, 78),
('0', 42, 79),
('0', 42, 80),
('0', 42, 81),
('0', 42, 82),
('0', 42, 83),
('0', 42, 84),
('0', 42, 85),
('0', 42, 86),
('1', 43, 87),
('0', 43, 88),
('1', 43, 89),
('0', 43, 90),
('0', 43, 91),
('1', 43, 92),
('0', 43, 93),
('0', 43, 94),
('0', 43, 95),
('0', 44, 87),
('0', 44, 88),
('0', 44, 89),
('0', 44, 90),
('0', 44, 91),
('1', 44, 92),
('0', 44, 93),
('0', 44, 94),
('0', 44, 95),
('0', 45, 87),
('0', 45, 88),
('0', 45, 89),
('0', 45, 90),
('1', 45, 91),
('0', 45, 92),
('1', 45, 93),
('1', 45, 94),
('1', 45, 95),
('0', 46, 87),
('1', 46, 88),
('0', 46, 89),
('1', 46, 90),
('1', 46, 91),
('0', 46, 92),
('1', 46, 93),
('0', 46, 94),
('1', 46, 95),
('0', 47, 87),
('1', 47, 88),
('0', 47, 89),
('0', 47, 90),
('0', 47, 91),
('1', 47, 92),
('0', 47, 93),
('1', 47, 94),
('1', 47, 95),
('1', 48, 87),
('1', 48, 88),
('0', 48, 89),
('1', 48, 90),
('0', 48, 91),
('1', 48, 92),
('1', 48, 93),
('1', 48, 94),
('0', 48, 95),
('0', 49, 87),
('1', 49, 88),
('0', 49, 89),
('0', 49, 90),
('0', 49, 91),
('0', 49, 92),
('0', 49, 93),
('0', 49, 94),
('1', 49, 95),
('0', 50, 87),
('0', 50, 88),
('0', 50, 89),
('0', 50, 90),
('1', 50, 91),
('0', 50, 92),
('1', 50, 93),
('0', 50, 94),
('0', 50, 95),
('0', 51, 87),
('0', 51, 88),
('0', 51, 89),
('1', 51, 90),
('1', 51, 91),
('0', 51, 92),
('0', 51, 93),
('1', 51, 94),
('1', 51, 95);

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE IF NOT EXISTS `program` (
`ID` int(3) NOT NULL,
  `programName` char(8) NOT NULL,
  `programFullName` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`ID`, `programName`, `programFullName`) VALUES
(4, 'BSICT', 'BACHELOR OF SCIENCE IN INFORMATION AND COMMUNICATIONS TECHNOLOGY'),
(5, 'BSIT', 'BACHELOR OF SCIENCE IN INFORMATION TECHNOLOGY'),
(7, 'BSCS', 'BACHELOR OF SCIENCE IN COMPUTER SCIENCE');

-- --------------------------------------------------------

--
-- Table structure for table `program_year`
--

CREATE TABLE IF NOT EXISTS `program_year` (
`ID` int(3) NOT NULL,
  `effective_year` year(4) NOT NULL,
  `programID` int(3) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `program_year`
--

INSERT INTO `program_year` (`ID`, `effective_year`, `programID`) VALUES
(5, 2015, 4),
(6, 2015, 5),
(10, 2016, 7),
(11, 2016, 4);

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
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`ID`, `student_id`, `fname`, `mname`, `lname`) VALUES
(45, 9304897, 'Glenn', 'A', 'Arcilla'),
(46, 7302661, 'Ralph', 'D', 'Arco'),
(47, 7306872, 'Ludwig Dan', 'F', 'Beltran'),
(48, 11102316, 'Jeah Ann', 'R', 'Bercede'),
(49, 11104305, 'Paul Jess', 'T', 'Bolotaolo'),
(50, 11102611, 'Lynnlie Faye', 'H', 'Borja'),
(51, 10305841, 'Christian', 'F', 'Bracero'),
(52, 10306267, 'Rhezzil Gay', 'V', 'Calinawan'),
(53, 11100533, 'Christine Rea', 'B', 'Carin'),
(54, 11104402, 'Crystal Jean', 'L', 'Cartalla');

-- --------------------------------------------------------

--
-- Table structure for table `student_course`
--

CREATE TABLE IF NOT EXISTS `student_course` (
  `poID` int(3) NOT NULL,
  `courseID` int(3) NOT NULL,
  `studentID` int(10) NOT NULL,
  `classID` int(5) NOT NULL,
  `score` float NOT NULL,
  `year_level` enum('1','2','3','4') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_course`
--

INSERT INTO `student_course` (`poID`, `courseID`, `studentID`, `classID`, `score`, `year_level`) VALUES
(10, 10, 7302661, 47, 1, '1'),
(10, 10, 7306872, 47, 2, '1'),
(10, 10, 9304897, 47, 1, '1'),
(10, 10, 10305841, 47, 1.5, '1'),
(10, 10, 10306267, 47, 1, '1'),
(10, 10, 11100533, 47, 2, '1'),
(10, 10, 11102316, 47, 3, '1'),
(10, 10, 11102611, 47, 2, '1'),
(10, 10, 11104305, 47, 5, '1'),
(10, 10, 11104402, 47, 3, '1'),
(11, 10, 7302661, 47, 1.5, '1'),
(11, 10, 7306872, 47, 3, '1'),
(11, 10, 9304897, 47, 2, '1'),
(11, 10, 10305841, 47, 2, '1'),
(11, 10, 10306267, 47, 1.5, '1'),
(11, 10, 11100533, 47, 3, '1'),
(11, 10, 11102316, 47, 2, '1'),
(11, 10, 11102611, 47, 3, '1'),
(11, 10, 11104305, 47, 3, '1'),
(11, 10, 11104402, 47, 2, '1'),
(12, 10, 7302661, 47, 0, '1'),
(12, 10, 7306872, 47, 0, '1'),
(12, 10, 9304897, 47, 0, '1'),
(12, 10, 10305841, 47, 0, '1'),
(12, 10, 10306267, 47, 0, '1'),
(12, 10, 11100533, 47, 0, '1'),
(12, 10, 11102316, 47, 0, '1'),
(12, 10, 11102611, 47, 0, '1'),
(12, 10, 11104305, 47, 0, '1'),
(12, 10, 11104402, 47, 0, '1'),
(13, 10, 7302661, 47, 0, '1'),
(13, 10, 7306872, 47, 0, '1'),
(13, 10, 9304897, 47, 0, '1'),
(13, 10, 10305841, 47, 0, '1'),
(13, 10, 10306267, 47, 0, '1'),
(13, 10, 11100533, 47, 0, '1'),
(13, 10, 11102316, 47, 0, '1'),
(13, 10, 11102611, 47, 0, '1'),
(13, 10, 11104305, 47, 0, '1'),
(13, 10, 11104402, 47, 0, '1'),
(14, 10, 7302661, 47, 0, '1'),
(14, 10, 7306872, 47, 0, '1'),
(14, 10, 9304897, 47, 0, '1'),
(14, 10, 10305841, 47, 0, '1'),
(14, 10, 10306267, 47, 0, '1'),
(14, 10, 11100533, 47, 0, '1'),
(14, 10, 11102316, 47, 0, '1'),
(14, 10, 11102611, 47, 0, '1'),
(14, 10, 11104305, 47, 0, '1'),
(14, 10, 11104402, 47, 0, '1'),
(15, 10, 7302661, 47, 2, '1'),
(15, 10, 7306872, 47, 1, '1'),
(15, 10, 9304897, 47, 3, '1'),
(15, 10, 10305841, 47, 3, '1'),
(15, 10, 10306267, 47, 2, '1'),
(15, 10, 11100533, 47, 1, '1'),
(15, 10, 11102316, 47, 1.5, '1'),
(15, 10, 11102611, 47, 5, '1'),
(15, 10, 11104305, 47, 3, '1'),
(15, 10, 11104402, 47, 1.5, '1'),
(16, 10, 7302661, 47, 0, '1'),
(16, 10, 7306872, 47, 0, '1'),
(16, 10, 9304897, 47, 0, '1'),
(16, 10, 10305841, 47, 0, '1'),
(16, 10, 10306267, 47, 0, '1'),
(16, 10, 11100533, 47, 0, '1'),
(16, 10, 11102316, 47, 0, '1'),
(16, 10, 11102611, 47, 0, '1'),
(16, 10, 11104305, 47, 0, '1'),
(16, 10, 11104402, 47, 0, '1'),
(17, 10, 7302661, 47, 0, '1'),
(17, 10, 7306872, 47, 0, '1'),
(17, 10, 9304897, 47, 0, '1'),
(17, 10, 10305841, 47, 0, '1'),
(17, 10, 10306267, 47, 0, '1'),
(17, 10, 11100533, 47, 0, '1'),
(17, 10, 11102316, 47, 0, '1'),
(17, 10, 11102611, 47, 0, '1'),
(17, 10, 11104305, 47, 0, '1'),
(17, 10, 11104402, 47, 0, '1'),
(18, 10, 7302661, 47, 0, '1'),
(18, 10, 7306872, 47, 0, '1'),
(18, 10, 9304897, 47, 0, '1'),
(18, 10, 10305841, 47, 0, '1'),
(18, 10, 10306267, 47, 0, '1'),
(18, 10, 11100533, 47, 0, '1'),
(18, 10, 11102316, 47, 0, '1'),
(18, 10, 11102611, 47, 0, '1'),
(18, 10, 11104305, 47, 0, '1'),
(18, 10, 11104402, 47, 0, '1');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE IF NOT EXISTS `teacher` (
`ID` int(3) NOT NULL,
  `teacher_id` varchar(15) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `mname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`ID`, `teacher_id`, `fname`, `mname`, `lname`) VALUES
(2, '1111111111', 'Joan', 'K', 'Tero'),
(3, '1111111122', 'Marilou', 'K', 'Iway');

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
  `teacherID` varchar(15) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_class`
--

INSERT INTO `teacher_class` (`ID`, `group_num`, `start_time`, `end_time`, `days`, `semester`, `school_year`, `courseCode`, `teacherID`, `date`) VALUES
(46, 1, '7:30 AM', '9:00 AM', 'MW', '2', 2015, 'ICT110', '1111111111', '2015-02-13 15:52:32'),
(47, 1, '3:00 PM', '4:30 PM', 'TTh', '2', 2015, 'ICT116', '1111111111', '2015-02-13 15:52:32');

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE IF NOT EXISTS `user_account` (
`ID` int(5) NOT NULL,
  `idnum` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','teacher','student') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`ID`, `idnum`, `password`, `role`) VALUES
(1, '1111111111', 'ef4e42fa65a892169d1437e81a671095e02eb8f7', 'teacher'),
(2, '1111111122', '6e88e8026cd1cdee134abc5386de46488deaa56d', 'teacher'),
(3, 'admin', 'admin', 'admin'),
(7, '9304897', '430dc1e01ea31c2abd4a308f94b6869fb3be8d34', 'student'),
(8, '7302661', '56cf4a3083a2249c74c9e5d9f462ecbb7beb941c', 'student'),
(9, '7306872', '8f65c26136423132658f8bbf78886b6a627f1a1a', 'student'),
(10, '11102316', '7e782a73b25fbdde811179bcc42fe0e8706092b0', 'student'),
(11, '11104305', '169abb1cdec8dd35ec90a83e7ea3199a693bdb71', 'student'),
(12, '11102611', '0b81c13c50f3da69da203cbc66ecc236ec2beb40', 'student'),
(13, '10305841', '7e01c1819b17706a24f2100b7d0e5cb76d45ea76', 'student'),
(14, '10306267', '4966dbae0b9a6cf499c680490c37f3d14c6f0688', 'student'),
(15, '11100533', 'ddbd2abeca97e7b8769d6dd139228e1f8ddd93f5', 'student'),
(16, '11104402', '9e67861cbd2cdfba7a27a306a9b021e16975e78b', 'student');

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
 ADD UNIQUE KEY `unique_index` (`poID`,`courseID`), ADD KEY `poID` (`poID`,`courseID`), ADD KEY `courseID` (`courseID`);

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
 ADD UNIQUE KEY `unique_index` (`poID`,`courseID`,`studentID`,`classID`), ADD KEY `courseID` (`poID`,`studentID`), ADD KEY `studentID` (`studentID`), ADD KEY `classID` (`classID`), ADD KEY `pyID` (`courseID`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
 ADD PRIMARY KEY (`ID`), ADD UNIQUE KEY `teacher_id` (`teacher_id`), ADD KEY `login_id` (`teacher_id`);

--
-- Indexes for table `teacher_class`
--
ALTER TABLE `teacher_class`
 ADD PRIMARY KEY (`ID`), ADD UNIQUE KEY `unique_index` (`group_num`,`courseCode`), ADD KEY `courseID` (`courseCode`,`teacherID`), ADD KEY `teacherID` (`teacherID`), ADD KEY `courseCode` (`courseCode`);

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
 ADD PRIMARY KEY (`ID`), ADD KEY `userID` (`idnum`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=96;
--
-- AUTO_INCREMENT for table `po`
--
ALTER TABLE `po`
MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `program_year`
--
ALTER TABLE `program_year`
MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `teacher_class`
--
ALTER TABLE `teacher_class`
MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
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
