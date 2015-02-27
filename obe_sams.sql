-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2015 at 05:34 PM
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

DELIMITER $$
--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `digits`( str CHAR(32) ) RETURNS char(32) CHARSET latin1
BEGIN
  DECLARE i, len SMALLINT DEFAULT 1;
  DECLARE ret CHAR(32) DEFAULT '';
  DECLARE c CHAR(1);
IF str IS NULL
  THEN 
    RETURN "";
  END IF;
SET len = CHAR_LENGTH( str );
  REPEAT
    BEGIN
      SET c = MID( str, i, 1 );
      IF c BETWEEN '0' AND '9' THEN 
        SET ret=CONCAT(ret,c);
      END IF;
      SET i = i + 1;
    END;
  UNTIL i > len END REPEAT;
  RETURN ret;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `coordinator`
--

CREATE TABLE IF NOT EXISTS `coordinator` (
  `coordinator_id` varchar(15) NOT NULL,
  `program_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coordinator`
--

INSERT INTO `coordinator` (`coordinator_id`, `program_id`) VALUES
('cscoordinator', 3),
('ictcoordinator', 1),
('iscoordinator', 4),
('itcoordinator', 2);

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
  `semester` enum('1','2','summer') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`ID`, `CourseCode`, `CourseDesc`, `pyID`, `year_level`, `semester`) VALUES
(1, 'ICT110', 'Intro to Computer Science and Programming', 1, '1', '1'),
(2, 'ICT111', 'ICT Fundamentals', 1, '1', '1'),
(3, 'ICT116', 'Advanced Programming A', 1, '1', '2'),
(4, 'ICT117', 'Software Application', 1, '1', '2'),
(5, 'ICT118', 'Web Page Design', 1, '1', '2'),
(6, 'ICT121', 'Advanced Programming B', 1, '2', '1'),
(7, 'ICT122', 'Multimedia Basics with Image Processing', 1, '2', '1'),
(8, 'ICT123', 'Introduction to Management', 1, '2', '1'),
(9, 'ICT126', 'Multimedia Production', 1, '2', '2'),
(10, 'ICT127', 'Lab Technician''s Course', 1, '2', '2'),
(11, 'ICT128', 'Business Processes', 1, '2', '2'),
(12, 'ICT131', 'Database Systems I', 1, '3', '1'),
(13, 'ICT132', 'Data Communication and Networking', 1, '3', '1'),
(14, 'ICT133', 'Presentation Skills', 1, '3', '1'),
(15, 'ICT134', 'Oral Communications for ICT I', 1, '3', '1'),
(16, 'ICT135', 'Oral Communications for ICT II', 1, '3', '2'),
(17, 'ICT136', 'Database Systems II', 1, '3', '2'),
(18, 'ICT137', 'Quality Assurance', 1, '3', '2'),
(19, 'ICT138', 'Network Management and Security', 1, '3', '2'),
(20, 'ICT139', 'Professional Ethics for ICT', 1, '3', '2'),
(21, 'ICT141', 'Web Applications Development', 1, '4', '1'),
(22, 'ICT142', 'Internship/OJT/Practicum', 1, '4', '1'),
(23, 'ICT146', 'Capstone Project', 1, '4', '2'),
(24, 'IT110', 'Introduction to Computer Science and Programming', 2, '1', '1'),
(25, 'IT11', 'Computer Operations', 2, '1', '1'),
(26, 'IT116', 'Advanced Programming', 2, '1', '2'),
(27, 'IT121', 'Data Structures I', 2, '2', '1'),
(28, 'IT126', 'Data Structures II', 2, '2', '2'),
(29, 'IT127', 'File Org and Processing', 2, '2', '2'),
(30, 'IT128', 'Multimedia Systems', 2, '2', '2'),
(31, 'IT130', 'Database Management Systems I', 2, '3', '1'),
(32, 'IT131', 'Personal Computer Technology', 2, '3', '1'),
(33, 'IT132', 'Presentation Skills in IT', 2, '3', '1'),
(34, 'IT133', 'Introduction to Accounting for IT', 2, '3', '1'),
(35, 'IT134', 'Object-oriented Technology', 2, '3', '1'),
(36, 'IT135', 'Introduction to Management', 2, '3', '1'),
(37, 'IT136', 'Database Management Systems II', 2, '3', '2'),
(38, 'IT137', 'Comp. Sys. Org. with Assembly Language', 2, '3', '2'),
(39, 'IT138', 'Data Communication and Networking', 2, '3', '2'),
(40, 'IT139', 'Web Application Development', 2, '3', '2'),
(41, 'IT140', 'Software Engineering I', 2, '4', '1'),
(42, 'IT141', 'Operating Systems', 2, '4', '1'),
(43, 'IT142', 'Ethics for the IT Profession', 2, '4', '1'),
(44, 'IT143', 'Quality Consciousness, Habits and Processes', 2, '4', '1'),
(45, 'IT144', 'Systems Resource Management', 2, '4', '1'),
(46, 'IT145', 'Software Engineering II', 2, '4', '2'),
(47, 'IT146', 'Management Information System', 2, '4', '2'),
(48, 'IT147', 'Quality Management and Processes', 2, '4', '2'),
(49, 'CS110', 'Intro to Comp Sci and Programming', 3, '1', '1'),
(50, 'CS11', 'Computer Operations', 3, '1', '1'),
(51, 'CS116', 'Advanced Programming', 3, '1', '2'),
(52, 'CS121', 'Data Structures I', 3, '2', '1'),
(53, 'CS126', 'Data Structures II', 3, '2', '2'),
(54, 'CS127', 'File Org and Processing', 3, '2', '2'),
(55, 'CS130', 'Database Systems I', 3, '3', '1'),
(56, 'CS131', 'Object-oriented Concepts', 3, '3', '1'),
(57, 'CS132', 'Numerical Methods', 3, '3', '1'),
(58, 'CS133', 'Computer Systems Organization with Assembly Language', 3, '3', '1'),
(59, 'CS134', 'Database Systems II', 3, '3', '2'),
(60, 'CS135', 'Operating Systems', 3, '3', '2'),
(61, 'CS136', 'Data Communication and Networking', 3, '3', '2'),
(62, 'CS137', 'Research Methods', 3, '3', '2'),
(63, 'CS138', 'Web Applications Development', 3, '3', '2'),
(64, 'CS140', 'Software Engineering I', 3, '4', '1'),
(65, 'CS141', 'Automata and Formal Languages', 3, '4', '1'),
(66, 'CS142', 'Structure of Programming Language', 3, '4', '1'),
(67, 'CS143', 'Research Project', 3, '4', '1'),
(68, 'CS144', 'CS Practicum', 3, '4', '1'),
(69, 'CS145', 'Software Engineering II', 3, '4', '2'),
(70, 'CS146', 'Management Info System', 3, '4', '2'),
(71, 'CS147', 'Quality Management and Processes', 3, '4', '2'),
(72, 'CS148', 'Compiler Design', 3, '4', '2'),
(73, 'CS148A', 'Compiler Design Project', 3, '4', '2'),
(74, 'IS110', 'IS Programming', 4, '1', '1'),
(75, 'IS11', 'Computer Operation', 4, '1', '2'),
(76, 'IS121', 'Advanced Programming', 4, '2', '1');

-- --------------------------------------------------------

--
-- Table structure for table `equivalent`
--

CREATE TABLE IF NOT EXISTS `equivalent` (
  `CourseEquivalent` varchar(30) NOT NULL,
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
  `pyID` int(3) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `po`
--

INSERT INTO `po` (`ID`, `attribute`, `poCode`, `description`, `pyID`) VALUES
(1, 'Knowledge for Solving Computing Problems', 'ICT01', 'Acquire, synergize and apply with excellence the computing fundamentals, various algorithmic principles, technical concepts and practices, best practices and standards in the application of core information technologies in numerous application environments, mathematics, science, and domain knowledge appropriate for the information technology practice to the abstraction and conceptualization of solution models from defined problems and requirements by deepening one’s insight to the full.', 1),
(2, 'Problem Analysis', 'ICT02', 'Fully determine, formulate, investigate related research works and analyze user or domain needs to solve multidisciplinary and communal information technology problems accomplishing practical software solutions that are applicable and beneficial to society using fundamentals principles of mathematics, computing fundamentals, technical concepts and practices in the core information technologies, and relevant domain disciplines.', 1),
(3, 'Design/Development of Solutions', 'ICT03', 'Design and evaluate with prudence optimum solutions for multidisciplinary and communal computing problems, and software systems, of varying levels of complexities, components, or computing processes that meet specified user needs taking into account design choices with appropriate consideration for public health and safety, cultural, societal, and environmental considerations.', 1),
(4, 'Modern Tool Usage', 'ICT04', 'Create, select, adapt, and apply effective and efficient techniques, resources, and suitable modern computing tools to complex computing activities, with an understanding of the limitations in service of humanity.', 1),
(5, 'Individual and Team Work', 'ICT05', 'Able to work independently and indiscriminately collaborate as a member or leader in diverse teams in computing activities, multidisciplinary settings, and “glocalized” communities.', 1),
(6, 'Communication', 'ICT06', 'Communication effectively and decently with the computing community and with society at large ( in a local and international scenes ) about complex computing activities by being able to comprehend and write effective reports, design documentation make and deliver effective presentations, and give and understand clear instructions.', 1),
(7, 'Computing Professionalism and Society', 'ICT07', 'Comprehend and assess thoroughly the impact of software solutions and computing to health, safety, cultural, legal, and environmental concerns within “glocalized” context, and develop, nurture and apply a sense of social responsibility.', 1),
(8, 'Ethics', 'ICT08', 'Understand, demonstrate and live an ethical and moral profession in the development, usage and presentation of theories, research and software solutions; and peer collaborations based on moral and professionals standards to benefit society.', 1),
(9, 'Life-long learning', 'ICT09', 'Recognize and appreciate the relevance of computing principles and theories in the cooperative life journey and apply current and emerging technologies to continuously evolve as a computing professional who can contribute to society’s development and progress.', 1),
(10, 'Knowledge for Solving Computing Problems', 'IT01', 'Acquire, synergize and apply with excellence the computing fundamentals, various algorithmic principles, technical concepts and practices, best practices and standards in the application of core information technologies in numerous application environments, mathematics, science, and domain knowledge appropriate for the information technology practice to the abstraction and conceptualization of solution models from defined problems and requirements by deepening one’s insight to the full.', 2),
(11, 'Problem Analysis', 'IT02', 'Fully determine, formulate, investigate related research works and analyze user or domain needs to solve multidisciplinary and communal information technology problems accomplishing practical software solutions that are applicable and beneficial to society using fundamentals principles of mathematics, computing fundamentals, technical concepts and practices in the core information technologies, and relevant domain disciplines.', 2),
(12, 'Design/Development of Solutions', 'IT03', 'Design and evaluate with prudence optimum solutions for multidisciplinary and communal computing problems, and software systems, of varying levels of complexities, components, or computing processes that meet specified user needs taking into account design choices with appropriate consideration for public health and safety, cultural, societal, and environmental considerations.', 2),
(13, 'Design/Development of Solutions', 'IT04', 'Able to diligently assist in the creation of an effective project plan and integrate efficient IT-based solutions that includes selection, creation, evaluation, and administration of IT Systems appropriate to the user environment.', 2),
(14, 'Modern Tool Usage', 'IT05', 'Create, select, adapt, and apply effective and efficient techniques, resources, and suitable modern computing tools to complex computing activities, with an understanding of the limitations in service of humanity.', 2),
(15, 'Individual and Teamwork', 'IT06', 'Able to work independently and indiscriminately collaborate as a member or leader in diverse teams in computing activities, multidisciplinary settings, and “glocalized” communities.', 2),
(16, 'Communication', 'IT07', 'Communicate effectively and decently with the computing community and with society at large (in local and international scenes) about complex computing activities by being able to comprehend and write effective reports, design documentation make and deliver effective presentations, and give and understand clear instructions.', 2),
(17, 'Computing Professionalism and Society', 'IT08', 'Comprehend and assess thoroughly the impact of software solutions and computing to health, safety, cultural, legal, and environmental concerns within “glocalized” context, and develop, nurture and apply a sense of social responsibility.', 2),
(18, 'Ethics', 'IT09', 'Understand, demonstrate and live an ethical and moral profession in the development, usage and presentation of theories, research and software solutions; and peer collaborations based on moral and professionals standards to benefit society.', 2),
(19, 'Life-long Learning', 'IT10', 'Recognize and appreciate the relevance of computing principles and theories in the cooperative life journey and apply current and emerging technologies to continuously evolve as a computing professional who can contribute to society’s development and progress.', 2),
(20, 'Knowledge for Solving Computing Problems', 'CS01', 'Acquire, synergize and apply with excellence the computing fundamentals, various algorithmic principles, technical concepts and practices, best practices and standards in the application of core information technologies in numerous application environments, mathematics, science, and domain knowledge appropriate for the information technology practice to the abstraction and conceptualization of solution models from defined problems and requirements by deepening one’s insight to the full.', 3),
(21, 'Problem Analysis', 'CS02', 'Fully determine, formulate, investigate related research works and analyze user or domain needs to solve multidisciplinary and communal information technology problems accomplishing practical software solutions that are applicable and beneficial to society using fundamentals principles of mathematics, computing fundamentals, technical concepts and practices in the core information technologies, and relevant domain disciplines.', 3),
(22, 'Design/Development of Solutions', 'CS03', 'Design and evaluate with prudence optimum solutions for multidisciplinary and communal computing problems, and software systems, of varying levels of complexities, components, or computing processes that meet specified user needs taking into account design choices with appropriate consideration for public health and safety, cultural, societal, and environmental considerations. Able to diligently assist in the creation of an effective project plan and integrate efficient IT-based solutions that includes selection, creation, evaluation, and administration of IT Systems appropriate to the user environment.', 3),
(23, 'Modern Tool Usage', 'CS04', 'Create, select, adapt, and apply effective and efficient techniques, resources, and suitable modern computing tools to complex computing activities, with an understanding of the limitations in service of humanity.', 3),
(24, 'Individual and Team Work', 'CS05', 'Able to work independently and indiscriminately collaborate as a member or leader in diverse teams in computing activities, multidisciplinary settings, and “glocalized” communities.', 3),
(25, 'Communication', 'CS06', 'Communicate effectively and decently with the computing community and with society at large (in local and international scenes) about complex computing activities by being able to comprehend and write effective reports, design documentation make and deliver effective presentations, and give and understand clear instructions.', 3),
(26, 'Computing Professionalism and Society', 'CS07', 'Comprehend and assess thoroughly the impact of software solutions and computing to health, safety, cultural, legal, and environmental concerns within “glocalized” context, and develop, nurture and apply a sense of social responsibility.', 3),
(27, 'Ethics', 'CS08', 'Understand, demonstrate and live an ethical and moral profession in the development, usage and presentation of theories, research and software solutions; and peer collaborations based on moral and professionals standards to benefit society.', 3),
(28, 'Life-long Learning', 'CS09', 'Recognize and appreciate the relevance of computing principles and theories in the cooperative life journey and apply current and emerging technologies to continuously evolve as a computing professional who can contribute to society’s development and progress.', 3),
(29, 'Ethics', 'IS01', 'Ethics', 4),
(30, 'Computing Professionalism and Society', 'IS02', 'Professionalism', 4);

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
('1', 1, 1),
('', 1, 2),
('1', 1, 3),
('', 1, 4),
('', 1, 5),
('1', 1, 6),
('', 1, 7),
('', 1, 8),
('', 1, 9),
('1', 1, 10),
('', 1, 11),
('', 1, 12),
('1', 1, 13),
('', 1, 14),
('1', 1, 15),
('', 1, 16),
('', 1, 17),
('', 1, 18),
('', 1, 19),
('', 1, 20),
('1', 1, 21),
('', 1, 22),
('', 1, 23),
('1', 2, 1),
('', 2, 2),
('1', 2, 3),
('', 2, 4),
('', 2, 5),
('1', 2, 6),
('', 2, 7),
('1', 2, 8),
('', 2, 9),
('', 2, 10),
('1', 2, 11),
('1', 2, 12),
('', 2, 13),
('', 2, 14),
('', 2, 15),
('', 2, 16),
('', 2, 17),
('1', 2, 18),
('1', 2, 19),
('1', 2, 20),
('1', 2, 21),
('', 2, 22),
('', 2, 23),
('', 3, 1),
('', 3, 2),
('', 3, 3),
('', 3, 4),
('1', 3, 5),
('', 3, 6),
('1', 3, 7),
('1', 3, 8),
('1', 3, 9),
('', 3, 10),
('', 3, 11),
('1', 3, 12),
('1', 3, 13),
('', 3, 14),
('', 3, 15),
('', 3, 16),
('1', 3, 17),
('', 3, 18),
('', 3, 19),
('1', 3, 20),
('', 3, 21),
('1', 3, 22),
('1', 3, 23),
('', 4, 1),
('1', 4, 2),
('', 4, 3),
('1', 4, 4),
('1', 4, 5),
('', 4, 6),
('1', 4, 7),
('', 4, 8),
('1', 4, 9),
('1', 4, 10),
('', 4, 11),
('', 4, 12),
('', 4, 13),
('', 4, 14),
('1', 4, 15),
('1', 4, 16),
('1', 4, 17),
('1', 4, 18),
('1', 4, 19),
('', 4, 20),
('', 4, 21),
('1', 4, 22),
('1', 4, 23),
('', 5, 1),
('1', 5, 2),
('', 5, 3),
('', 5, 4),
('', 5, 5),
('1', 5, 6),
('', 5, 7),
('1', 5, 8),
('1', 5, 9),
('', 5, 10),
('1', 5, 11),
('1', 5, 12),
('1', 5, 13),
('1', 5, 14),
('', 5, 15),
('', 5, 16),
('1', 5, 17),
('', 5, 18),
('', 5, 19),
('', 5, 20),
('1', 5, 21),
('1', 5, 22),
('', 5, 23),
('1', 6, 1),
('1', 6, 2),
('1', 6, 3),
('1', 6, 4),
('', 6, 5),
('1', 6, 6),
('1', 6, 7),
('', 6, 8),
('', 6, 9),
('', 6, 10),
('1', 6, 11),
('1', 6, 12),
('', 6, 13),
('1', 6, 14),
('1', 6, 15),
('1', 6, 16),
('1', 6, 17),
('1', 6, 18),
('', 6, 19),
('', 6, 20),
('', 6, 21),
('', 6, 22),
('1', 6, 23),
('', 7, 1),
('1', 7, 2),
('', 7, 3),
('', 7, 4),
('', 7, 5),
('', 7, 6),
('', 7, 7),
('', 7, 8),
('1', 7, 9),
('1', 7, 10),
('', 7, 11),
('1', 7, 12),
('', 7, 13),
('', 7, 14),
('', 7, 15),
('', 7, 16),
('1', 7, 17),
('', 7, 18),
('1', 7, 19),
('', 7, 20),
('', 7, 21),
('1', 7, 22),
('', 7, 23),
('', 8, 1),
('', 8, 2),
('', 8, 3),
('', 8, 4),
('1', 8, 5),
('', 8, 6),
('1', 8, 7),
('', 8, 8),
('', 8, 9),
('1', 8, 10),
('1', 8, 11),
('', 8, 12),
('', 8, 13),
('', 8, 14),
('', 8, 15),
('', 8, 16),
('', 8, 17),
('', 8, 18),
('1', 8, 19),
('1', 8, 20),
('', 8, 21),
('1', 8, 22),
('', 8, 23),
('', 9, 1),
('', 9, 2),
('', 9, 3),
('1', 9, 4),
('1', 9, 5),
('', 9, 6),
('', 9, 7),
('1', 9, 8),
('', 9, 9),
('', 9, 10),
('', 9, 11),
('', 9, 12),
('', 9, 13),
('', 9, 14),
('', 9, 15),
('', 9, 16),
('', 9, 17),
('', 9, 18),
('', 9, 19),
('1', 9, 20),
('1', 9, 21),
('', 9, 22),
('1', 9, 23),
('', 10, 24),
('1', 10, 25),
('1', 10, 26),
('1', 10, 27),
('1', 10, 28),
('', 10, 29),
('', 10, 30),
('', 10, 31),
('1', 10, 32),
('', 10, 33),
('1', 10, 34),
('', 10, 35),
('', 10, 36),
('', 10, 37),
('', 10, 38),
('1', 10, 39),
('', 10, 40),
('1', 10, 41),
('', 10, 42),
('1', 10, 43),
('', 10, 44),
('', 10, 45),
('', 10, 46),
('', 10, 47),
('', 10, 48),
('', 11, 24),
('1', 11, 25),
('', 11, 26),
('', 11, 27),
('', 11, 28),
('1', 11, 29),
('', 11, 30),
('1', 11, 31),
('', 11, 32),
('', 11, 33),
('1', 11, 34),
('', 11, 35),
('', 11, 36),
('1', 11, 37),
('', 11, 38),
('', 11, 39),
('', 11, 40),
('', 11, 41),
('', 11, 42),
('1', 11, 43),
('1', 11, 44),
('1', 11, 45),
('', 11, 46),
('1', 11, 47),
('1', 11, 48),
('', 12, 24),
('', 12, 25),
('1', 12, 26),
('1', 12, 27),
('1', 12, 28),
('1', 12, 29),
('1', 12, 30),
('1', 12, 31),
('1', 12, 32),
('', 12, 33),
('', 12, 34),
('', 12, 35),
('1', 12, 36),
('1', 12, 37),
('', 12, 38),
('', 12, 39),
('', 12, 40),
('1', 12, 41),
('', 12, 42),
('', 12, 43),
('1', 12, 44),
('', 12, 45),
('1', 12, 46),
('1', 12, 47),
('1', 12, 48),
('', 13, 24),
('', 13, 25),
('', 13, 26),
('', 13, 27),
('', 13, 28),
('', 13, 29),
('1', 13, 30),
('', 13, 31),
('', 13, 32),
('', 13, 33),
('', 13, 34),
('1', 13, 35),
('', 13, 36),
('', 13, 37),
('1', 13, 38),
('', 13, 39),
('1', 13, 40),
('', 13, 41),
('1', 13, 42),
('', 13, 43),
('', 13, 44),
('', 13, 45),
('1', 13, 46),
('', 13, 47),
('', 13, 48),
('1', 14, 24),
('', 14, 25),
('', 14, 26),
('', 14, 27),
('', 14, 28),
('', 14, 29),
('', 14, 30),
('', 14, 31),
('', 14, 32),
('', 14, 33),
('', 14, 34),
('1', 14, 35),
('', 14, 36),
('', 14, 37),
('1', 14, 38),
('1', 14, 39),
('1', 14, 40),
('', 14, 41),
('1', 14, 42),
('', 14, 43),
('', 14, 44),
('1', 14, 45),
('', 14, 46),
('', 14, 47),
('', 14, 48),
('1', 15, 24),
('', 15, 25),
('1', 15, 26),
('1', 15, 27),
('1', 15, 28),
('', 15, 29),
('1', 15, 30),
('', 15, 31),
('1', 15, 32),
('1', 15, 33),
('', 15, 34),
('1', 15, 35),
('1', 15, 36),
('', 15, 37),
('1', 15, 38),
('', 15, 39),
('1', 15, 40),
('1', 15, 41),
('', 15, 42),
('', 15, 43),
('', 15, 44),
('', 15, 45),
('1', 15, 46),
('', 15, 47),
('', 15, 48),
('1', 16, 24),
('1', 16, 25),
('', 16, 26),
('', 16, 27),
('', 16, 28),
('1', 16, 29),
('', 16, 30),
('1', 16, 31),
('', 16, 32),
('1', 16, 33),
('1', 16, 34),
('1', 16, 35),
('1', 16, 36),
('1', 16, 37),
('', 16, 38),
('', 16, 39),
('', 16, 40),
('1', 16, 41),
('1', 16, 42),
('', 16, 43),
('1', 16, 44),
('', 16, 45),
('1', 16, 46),
('1', 16, 47),
('1', 16, 48),
('1', 17, 24),
('', 17, 25),
('1', 17, 26),
('1', 17, 27),
('1', 17, 28),
('', 17, 29),
('1', 17, 30),
('1', 17, 31),
('1', 17, 32),
('', 17, 33),
('', 17, 34),
('', 17, 35),
('', 17, 36),
('1', 17, 37),
('', 17, 38),
('', 17, 39),
('', 17, 40),
('', 17, 41),
('', 17, 42),
('1', 17, 43),
('', 17, 44),
('1', 17, 45),
('', 17, 46),
('', 17, 47),
('', 17, 48),
('', 18, 24),
('1', 18, 25),
('1', 18, 26),
('1', 18, 27),
('1', 18, 28),
('', 18, 29),
('', 18, 30),
('', 18, 31),
('', 18, 32),
('', 18, 33),
('', 18, 34),
('1', 18, 35),
('', 18, 36),
('', 18, 37),
('1', 18, 38),
('1', 18, 39),
('1', 18, 40),
('', 18, 41),
('', 18, 42),
('1', 18, 43),
('1', 18, 44),
('1', 18, 45),
('', 18, 46),
('1', 18, 47),
('1', 18, 48),
('', 19, 24),
('', 19, 25),
('', 19, 26),
('', 19, 27),
('', 19, 28),
('', 19, 29),
('', 19, 30),
('', 19, 31),
('', 19, 32),
('', 19, 33),
('', 19, 34),
('', 19, 35),
('', 19, 36),
('', 19, 37),
('1', 19, 38),
('1', 19, 39),
('', 19, 40),
('', 19, 41),
('', 19, 42),
('', 19, 43),
('', 19, 44),
('', 19, 45),
('', 19, 46),
('', 19, 47),
('1', 19, 48),
('1', 20, 49),
('', 20, 50),
('', 20, 51),
('', 20, 52),
('', 20, 53),
('', 20, 54),
('', 20, 55),
('1', 20, 56),
('1', 20, 57),
('', 20, 58),
('', 20, 59),
('1', 20, 60),
('1', 20, 61),
('1', 20, 62),
('', 20, 63),
('1', 20, 64),
('', 20, 65),
('', 20, 66),
('', 20, 67),
('', 20, 68),
('', 20, 69),
('', 20, 70),
('', 20, 71),
('1', 20, 72),
('', 20, 73),
('1', 21, 49),
('', 21, 50),
('', 21, 51),
('', 21, 52),
('', 21, 53),
('1', 21, 54),
('1', 21, 55),
('', 21, 56),
('1', 21, 57),
('1', 21, 58),
('1', 21, 59),
('', 21, 60),
('', 21, 61),
('1', 21, 62),
('', 21, 63),
('', 21, 64),
('1', 21, 65),
('1', 21, 66),
('1', 21, 67),
('1', 21, 68),
('', 21, 69),
('1', 21, 70),
('', 21, 71),
('', 21, 72),
('1', 21, 73),
('', 22, 49),
('', 22, 50),
('1', 22, 51),
('1', 22, 52),
('1', 22, 53),
('', 22, 54),
('1', 22, 55),
('', 22, 56),
('', 22, 57),
('1', 22, 58),
('1', 22, 59),
('1', 22, 60),
('', 22, 61),
('', 22, 62),
('1', 22, 63),
('1', 22, 64),
('1', 22, 65),
('', 22, 66),
('1', 22, 67),
('1', 22, 68),
('1', 22, 69),
('1', 22, 70),
('1', 22, 71),
('', 22, 72),
('1', 22, 73),
('', 23, 49),
('1', 23, 50),
('1', 23, 51),
('1', 23, 52),
('1', 23, 53),
('1', 23, 54),
('', 23, 55),
('1', 23, 56),
('', 23, 57),
('', 23, 58),
('', 23, 59),
('', 23, 60),
('1', 23, 61),
('', 23, 62),
('1', 23, 63),
('', 23, 64),
('', 23, 65),
('1', 23, 66),
('', 23, 67),
('', 23, 68),
('1', 23, 69),
('', 23, 70),
('1', 23, 71),
('1', 23, 72),
('', 23, 73),
('1', 24, 49),
('1', 24, 50),
('1', 24, 51),
('', 24, 52),
('', 24, 53),
('', 24, 54),
('', 24, 55),
('', 24, 56),
('1', 24, 57),
('1', 24, 58),
('', 24, 59),
('1', 24, 60),
('', 24, 61),
('', 24, 62),
('1', 24, 63),
('1', 24, 64),
('1', 24, 65),
('', 24, 66),
('', 24, 67),
('', 24, 68),
('1', 24, 69),
('', 24, 70),
('1', 24, 71),
('1', 24, 72),
('', 24, 73),
('1', 25, 49),
('1', 25, 50),
('1', 25, 51),
('1', 25, 52),
('1', 25, 53),
('', 25, 54),
('1', 25, 55),
('', 25, 56),
('1', 25, 57),
('', 25, 58),
('1', 25, 59),
('', 25, 60),
('', 25, 61),
('1', 25, 62),
('', 25, 63),
('1', 25, 64),
('', 25, 65),
('', 25, 66),
('', 25, 67),
('', 25, 68),
('1', 25, 69),
('1', 25, 70),
('1', 25, 71),
('', 25, 72),
('', 25, 73),
('', 26, 49),
('1', 26, 50),
('1', 26, 51),
('', 26, 52),
('', 26, 53),
('1', 26, 54),
('', 26, 55),
('1', 26, 56),
('', 26, 57),
('1', 26, 58),
('', 26, 59),
('', 26, 60),
('1', 26, 61),
('1', 26, 62),
('', 26, 63),
('', 26, 64),
('', 26, 65),
('1', 26, 66),
('1', 26, 67),
('1', 26, 68),
('', 26, 69),
('1', 26, 70),
('', 26, 71),
('', 26, 72),
('1', 26, 73),
('1', 27, 49),
('', 27, 50),
('', 27, 51),
('1', 27, 52),
('1', 27, 53),
('1', 27, 54),
('1', 27, 55),
('', 27, 56),
('', 27, 57),
('1', 27, 58),
('1', 27, 59),
('1', 27, 60),
('', 27, 61),
('1', 27, 62),
('', 27, 63),
('', 27, 64),
('1', 27, 65),
('1', 27, 66),
('1', 27, 67),
('', 27, 68),
('', 27, 69),
('1', 27, 70),
('', 27, 71),
('', 27, 72),
('', 27, 73),
('', 28, 49),
('', 28, 50),
('', 28, 51),
('', 28, 52),
('', 28, 53),
('1', 28, 54),
('1', 28, 55),
('1', 28, 56),
('1', 28, 57),
('', 28, 58),
('1', 28, 59),
('1', 28, 60),
('1', 28, 61),
('', 28, 62),
('1', 28, 63),
('', 28, 64),
('1', 28, 65),
('1', 28, 66),
('1', 28, 67),
('', 28, 68),
('', 28, 69),
('', 28, 70),
('', 28, 71),
('1', 28, 72),
('1', 28, 73),
('1', 29, 74),
('', 29, 75),
('1', 29, 76),
('', 30, 74),
('1', 30, 75),
('1', 30, 76);

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE IF NOT EXISTS `program` (
`ID` int(3) NOT NULL,
  `programName` char(8) NOT NULL,
  `programFullName` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`ID`, `programName`, `programFullName`) VALUES
(1, 'BSICT', 'BACHELOR OF SCIENCE IN INFORMATION AND COMMUNICATIONS TECHNOLOGY'),
(2, 'BSIT', 'BACHELOR OF SCIENCE IN INFORMATION TECHNOLOGY'),
(3, 'BSCS', 'BACHELOR OF SCIENCE IN COMPUTER SCIENCE'),
(4, 'BSIS', 'BACHELOR OF SCIENCE IN Information System');

-- --------------------------------------------------------

--
-- Table structure for table `program_year`
--

CREATE TABLE IF NOT EXISTS `program_year` (
`ID` int(3) NOT NULL,
  `effective_year` year(4) NOT NULL,
  `programID` int(3) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `program_year`
--

INSERT INTO `program_year` (`ID`, `effective_year`, `programID`) VALUES
(1, 2009, 1),
(2, 2007, 2),
(3, 2007, 3),
(4, 2015, 4);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
`ID` int(10) NOT NULL,
  `student_id` int(10) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`ID`, `student_id`, `fname`, `lname`) VALUES
(1, 11104762, 'Eugenio', 'Arapan'),
(2, 11101500, 'Joseph', 'Cabayacruz'),
(3, 11101501, 'Theneelyn Claire', 'Haw'),
(4, 11101502, 'Mary Rose', 'Bacongga'),
(5, 11101503, 'Junalyn', 'Oberez'),
(6, 11101504, 'Lynnlie Faye', 'Borja'),
(7, 11101505, 'Christian', 'Bracero'),
(8, 11101506, 'Rhezzil Gay', 'Calinawan'),
(9, 11101507, 'Christine Rea', 'Carin'),
(10, 11101508, 'Aileen', 'Suarez'),
(11, 11103625, 'Jassem Jake', 'Poncardas'),
(12, 11100971, 'Mitzie Dane', 'Pono'),
(13, 11104516, 'Dan Jose', 'Quijano'),
(14, 11100258, 'Lalaine Dawn', 'Sabandal'),
(15, 11100252, 'Michelle Anne', 'Sanchez'),
(16, 11102574, 'Rose Ann', 'Sescon'),
(17, 11102070, 'Fritz Geraldine', 'Siembra'),
(18, 11104504, 'Karanvir', 'Singh'),
(19, 11102063, 'Marjo', 'Sobrecaray'),
(20, 11102064, 'Jesse Rhi', 'Pilota'),
(21, 11701434, 'Edward', 'Thomson'),
(22, 11701435, 'Tracey', 'Blake'),
(23, 11701436, 'Austin', 'North'),
(24, 11701437, 'Liam', 'Alsop'),
(25, 11701438, 'Claire', 'Manning'),
(26, 11701439, 'Jonathan', 'Grant'),
(27, 11701440, 'Adrian', 'Mills'),
(28, 11701441, 'Irene', 'McLean'),
(29, 11701442, 'Emily', 'Clarkson'),
(30, 11701443, 'Penelope', 'Roberts'),
(31, 11601434, 'Sally', 'Parr'),
(32, 11601435, 'Emily', 'Duncan'),
(33, 11601436, 'Rebecca', 'McGrath'),
(34, 11601437, 'Julia', 'Anderson'),
(35, 11601438, 'Jennifer', 'Carr'),
(36, 11601439, 'Blake', 'King'),
(37, 11601440, 'Stewart', 'Stewart'),
(38, 11601441, 'Joan', 'Vaughan'),
(39, 11601442, 'Jake', 'Turner'),
(40, 11601443, 'Adrian', 'King'),
(41, 11001434, 'Harrald', 'Rivera'),
(42, 11001435, 'Eduard Joseph', 'Jabines'),
(43, 11001436, 'Benedict', 'Cumberbatch'),
(44, 11001437, 'Sean', 'O''Pry'),
(45, 11001438, 'Logan', 'Lerman'),
(46, 11001439, 'Derek Dale', 'Sy'),
(47, 11001440, 'Ian', 'Duncan'),
(48, 11001441, 'Claire', 'Bond'),
(49, 11001442, 'Benjamin', 'Allan'),
(50, 11001443, 'Pippa', 'Mathis');

-- --------------------------------------------------------

--
-- Table structure for table `student_course`
--

CREATE TABLE IF NOT EXISTS `student_course` (
  `poID` int(3) NOT NULL,
  `courseID` int(3) NOT NULL,
  `studentID` int(10) NOT NULL,
  `classID` int(5) NOT NULL,
  `score` varchar(4) NOT NULL,
  `year_level` enum('1','2','3','4') NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_course`
--

INSERT INTO `student_course` (`poID`, `courseID`, `studentID`, `classID`, `score`, `year_level`, `date`) VALUES
(20, 49, 11701434, 18, '1', '1', '2015-02-27 13:12:54'),
(20, 49, 11701435, 18, '1.5', '1', '2015-02-27 13:12:54'),
(20, 49, 11701436, 18, '1.5', '1', '2015-02-27 13:12:54'),
(20, 49, 11701437, 18, '1', '1', '2015-02-27 13:12:54'),
(20, 49, 11701438, 18, '2', '1', '2015-02-27 13:12:54'),
(20, 49, 11701439, 18, '2.5', '1', '2015-02-27 13:12:54'),
(20, 49, 11701440, 18, '1', '1', '2015-02-27 13:12:54'),
(20, 49, 11701441, 18, '1.5', '1', '2015-02-27 13:12:54'),
(20, 49, 11701442, 18, '1', '1', '2015-02-27 13:12:54'),
(20, 49, 11701443, 18, '1', '1', '2015-02-27 13:12:54'),
(20, 50, 11701434, 19, '', '1', '2015-02-27 14:18:29'),
(20, 50, 11701435, 19, '', '1', '2015-02-27 14:18:29'),
(20, 50, 11701436, 19, '', '1', '2015-02-27 14:18:29'),
(20, 50, 11701437, 19, '', '1', '2015-02-27 14:18:29'),
(20, 50, 11701438, 19, '', '1', '2015-02-27 14:18:29'),
(20, 50, 11701439, 19, '', '1', '2015-02-27 14:18:29'),
(20, 50, 11701440, 19, '', '1', '2015-02-27 14:18:29'),
(20, 50, 11701441, 19, '', '1', '2015-02-27 14:18:29'),
(20, 50, 11701442, 19, '', '1', '2015-02-27 14:18:29'),
(20, 50, 11701443, 19, '', '1', '2015-02-27 14:18:29'),
(20, 51, 11701434, 25, '', '1', '2015-02-27 14:19:52'),
(20, 51, 11701435, 25, '', '1', '2015-02-27 14:19:52'),
(20, 51, 11701436, 25, '', '1', '2015-02-27 14:19:52'),
(20, 51, 11701437, 25, '', '1', '2015-02-27 14:19:52'),
(20, 51, 11701438, 25, '', '1', '2015-02-27 14:19:52'),
(20, 51, 11701439, 25, '', '1', '2015-02-27 14:19:52'),
(20, 51, 11701440, 25, '', '1', '2015-02-27 14:19:52'),
(20, 51, 11701441, 25, '', '1', '2015-02-27 14:19:52'),
(20, 51, 11701442, 25, '', '1', '2015-02-27 14:19:52'),
(20, 51, 11701443, 25, '', '1', '2015-02-27 14:19:52'),
(20, 52, 11701434, 20, '', '1', '2015-02-27 14:22:35'),
(20, 52, 11701435, 20, '', '1', '2015-02-27 14:22:35'),
(20, 52, 11701436, 20, '', '1', '2015-02-27 14:22:35'),
(20, 52, 11701437, 20, '', '1', '2015-02-27 14:22:35'),
(20, 52, 11701438, 20, '', '1', '2015-02-27 14:22:35'),
(20, 52, 11701439, 20, '', '1', '2015-02-27 14:22:35'),
(20, 52, 11701440, 20, '', '1', '2015-02-27 14:22:35'),
(20, 52, 11701441, 20, '', '1', '2015-02-27 14:22:35'),
(20, 52, 11701442, 20, '', '1', '2015-02-27 14:22:35'),
(20, 52, 11701443, 20, '', '1', '2015-02-27 14:22:35'),
(21, 49, 11701434, 18, '3', '1', '2015-02-27 13:12:54'),
(21, 49, 11701435, 18, '2.5', '1', '2015-02-27 13:12:54'),
(21, 49, 11701436, 18, '2', '1', '2015-02-27 13:12:54'),
(21, 49, 11701437, 18, '2', '1', '2015-02-27 13:12:54'),
(21, 49, 11701438, 18, '2.5', '1', '2015-02-27 13:12:54'),
(21, 49, 11701439, 18, '2.5', '1', '2015-02-27 13:12:54'),
(21, 49, 11701440, 18, '3', '1', '2015-02-27 13:12:54'),
(21, 49, 11701441, 18, '3', '1', '2015-02-27 13:12:54'),
(21, 49, 11701442, 18, '2.5', '1', '2015-02-27 13:12:54'),
(21, 49, 11701443, 18, '2', '1', '2015-02-27 13:12:54'),
(21, 50, 11701434, 19, '', '1', '2015-02-27 14:18:29'),
(21, 50, 11701435, 19, '', '1', '2015-02-27 14:18:29'),
(21, 50, 11701436, 19, '', '1', '2015-02-27 14:18:29'),
(21, 50, 11701437, 19, '', '1', '2015-02-27 14:18:29'),
(21, 50, 11701438, 19, '', '1', '2015-02-27 14:18:29'),
(21, 50, 11701439, 19, '', '1', '2015-02-27 14:18:29'),
(21, 50, 11701440, 19, '', '1', '2015-02-27 14:18:29'),
(21, 50, 11701441, 19, '', '1', '2015-02-27 14:18:29'),
(21, 50, 11701442, 19, '', '1', '2015-02-27 14:18:29'),
(21, 50, 11701443, 19, '', '1', '2015-02-27 14:18:29'),
(21, 51, 11701434, 25, '', '1', '2015-02-27 14:19:52'),
(21, 51, 11701435, 25, '', '1', '2015-02-27 14:19:52'),
(21, 51, 11701436, 25, '', '1', '2015-02-27 14:19:52'),
(21, 51, 11701437, 25, '', '1', '2015-02-27 14:19:52'),
(21, 51, 11701438, 25, '', '1', '2015-02-27 14:19:52'),
(21, 51, 11701439, 25, '', '1', '2015-02-27 14:19:52'),
(21, 51, 11701440, 25, '', '1', '2015-02-27 14:19:52'),
(21, 51, 11701441, 25, '', '1', '2015-02-27 14:19:52'),
(21, 51, 11701442, 25, '', '1', '2015-02-27 14:19:52'),
(21, 51, 11701443, 25, '', '1', '2015-02-27 14:19:52'),
(21, 52, 11701434, 20, '', '1', '2015-02-27 14:22:35'),
(21, 52, 11701435, 20, '', '1', '2015-02-27 14:22:35'),
(21, 52, 11701436, 20, '', '1', '2015-02-27 14:22:35'),
(21, 52, 11701437, 20, '', '1', '2015-02-27 14:22:35'),
(21, 52, 11701438, 20, '', '1', '2015-02-27 14:22:35'),
(21, 52, 11701439, 20, '', '1', '2015-02-27 14:22:35'),
(21, 52, 11701440, 20, '', '1', '2015-02-27 14:22:35'),
(21, 52, 11701441, 20, '', '1', '2015-02-27 14:22:35'),
(21, 52, 11701442, 20, '', '1', '2015-02-27 14:22:35'),
(21, 52, 11701443, 20, '', '1', '2015-02-27 14:22:35'),
(22, 49, 11701434, 18, '', '1', '2015-02-27 13:12:54'),
(22, 49, 11701435, 18, '', '1', '2015-02-27 13:12:54'),
(22, 49, 11701436, 18, '', '1', '2015-02-27 13:12:54'),
(22, 49, 11701437, 18, '', '1', '2015-02-27 13:12:54'),
(22, 49, 11701438, 18, '', '1', '2015-02-27 13:12:54'),
(22, 49, 11701439, 18, '', '1', '2015-02-27 13:12:54'),
(22, 49, 11701440, 18, '', '1', '2015-02-27 13:12:54'),
(22, 49, 11701441, 18, '', '1', '2015-02-27 13:12:54'),
(22, 49, 11701442, 18, '', '1', '2015-02-27 13:12:54'),
(22, 49, 11701443, 18, '', '1', '2015-02-27 13:12:54'),
(22, 50, 11701434, 19, '', '1', '2015-02-27 14:18:29'),
(22, 50, 11701435, 19, '', '1', '2015-02-27 14:18:29'),
(22, 50, 11701436, 19, '', '1', '2015-02-27 14:18:29'),
(22, 50, 11701437, 19, '', '1', '2015-02-27 14:18:29'),
(22, 50, 11701438, 19, '', '1', '2015-02-27 14:18:29'),
(22, 50, 11701439, 19, '', '1', '2015-02-27 14:18:29'),
(22, 50, 11701440, 19, '', '1', '2015-02-27 14:18:29'),
(22, 50, 11701441, 19, '', '1', '2015-02-27 14:18:29'),
(22, 50, 11701442, 19, '', '1', '2015-02-27 14:18:29'),
(22, 50, 11701443, 19, '', '1', '2015-02-27 14:18:29'),
(22, 51, 11701434, 25, '1', '1', '2015-02-27 14:19:52'),
(22, 51, 11701435, 25, '1.5', '1', '2015-02-27 14:19:52'),
(22, 51, 11701436, 25, '1.5', '1', '2015-02-27 14:19:52'),
(22, 51, 11701437, 25, '1', '1', '2015-02-27 14:19:52'),
(22, 51, 11701438, 25, '2', '1', '2015-02-27 14:19:52'),
(22, 51, 11701439, 25, '2.5', '1', '2015-02-27 14:19:52'),
(22, 51, 11701440, 25, 'NC', '1', '2015-02-27 14:19:52'),
(22, 51, 11701441, 25, 'W', '1', '2015-02-27 14:19:52'),
(22, 51, 11701442, 25, 'INC', '1', '2015-02-27 14:19:52'),
(22, 51, 11701443, 25, '1', '1', '2015-02-27 14:19:52'),
(22, 52, 11701434, 20, '3', '1', '2015-02-27 14:22:35'),
(22, 52, 11701435, 20, '2.5', '1', '2015-02-27 14:22:35'),
(22, 52, 11701436, 20, '2', '1', '2015-02-27 14:22:35'),
(22, 52, 11701437, 20, '2', '1', '2015-02-27 14:22:35'),
(22, 52, 11701438, 20, '2.5', '1', '2015-02-27 14:22:35'),
(22, 52, 11701439, 20, '2.5', '1', '2015-02-27 14:22:35'),
(22, 52, 11701440, 20, '3', '1', '2015-02-27 14:22:35'),
(22, 52, 11701441, 20, '3', '1', '2015-02-27 14:22:35'),
(22, 52, 11701442, 20, '2.5', '1', '2015-02-27 14:22:35'),
(22, 52, 11701443, 20, '2', '1', '2015-02-27 14:22:35'),
(23, 49, 11701434, 18, '', '1', '2015-02-27 13:12:54'),
(23, 49, 11701435, 18, '', '1', '2015-02-27 13:12:54'),
(23, 49, 11701436, 18, '', '1', '2015-02-27 13:12:54'),
(23, 49, 11701437, 18, '', '1', '2015-02-27 13:12:54'),
(23, 49, 11701438, 18, '', '1', '2015-02-27 13:12:54'),
(23, 49, 11701439, 18, '', '1', '2015-02-27 13:12:54'),
(23, 49, 11701440, 18, '', '1', '2015-02-27 13:12:54'),
(23, 49, 11701441, 18, '', '1', '2015-02-27 13:12:54'),
(23, 49, 11701442, 18, '', '1', '2015-02-27 13:12:54'),
(23, 49, 11701443, 18, '', '1', '2015-02-27 13:12:54'),
(23, 50, 11701434, 19, '1', '1', '2015-02-27 14:18:29'),
(23, 50, 11701435, 19, '1.5', '1', '2015-02-27 14:18:29'),
(23, 50, 11701436, 19, '1.5', '1', '2015-02-27 14:18:29'),
(23, 50, 11701437, 19, '1', '1', '2015-02-27 14:18:29'),
(23, 50, 11701438, 19, '2', '1', '2015-02-27 14:18:29'),
(23, 50, 11701439, 19, '2.5', '1', '2015-02-27 14:18:29'),
(23, 50, 11701440, 19, 'NC', '1', '2015-02-27 14:18:29'),
(23, 50, 11701441, 19, 'W', '1', '2015-02-27 14:18:29'),
(23, 50, 11701442, 19, 'INC', '1', '2015-02-27 14:18:29'),
(23, 50, 11701443, 19, '1', '1', '2015-02-27 14:18:29'),
(23, 51, 11701434, 25, '1', '1', '2015-02-27 14:19:52'),
(23, 51, 11701435, 25, '1.5', '1', '2015-02-27 14:19:52'),
(23, 51, 11701436, 25, '1.5', '1', '2015-02-27 14:19:52'),
(23, 51, 11701437, 25, '1', '1', '2015-02-27 14:19:52'),
(23, 51, 11701438, 25, '2', '1', '2015-02-27 14:19:52'),
(23, 51, 11701439, 25, '2.5', '1', '2015-02-27 14:19:52'),
(23, 51, 11701440, 25, 'NC', '1', '2015-02-27 14:19:52'),
(23, 51, 11701441, 25, 'W', '1', '2015-02-27 14:19:52'),
(23, 51, 11701442, 25, 'INC', '1', '2015-02-27 14:19:52'),
(23, 51, 11701443, 25, '1', '1', '2015-02-27 14:19:52'),
(23, 52, 11701434, 20, '3', '1', '2015-02-27 14:22:35'),
(23, 52, 11701435, 20, '2.5', '1', '2015-02-27 14:22:35'),
(23, 52, 11701436, 20, '2', '1', '2015-02-27 14:22:35'),
(23, 52, 11701437, 20, '2', '1', '2015-02-27 14:22:35'),
(23, 52, 11701438, 20, '2.5', '1', '2015-02-27 14:22:35'),
(23, 52, 11701439, 20, '2.5', '1', '2015-02-27 14:22:35'),
(23, 52, 11701440, 20, '3', '1', '2015-02-27 14:22:35'),
(23, 52, 11701441, 20, '3', '1', '2015-02-27 14:22:35'),
(23, 52, 11701442, 20, '2.5', '1', '2015-02-27 14:22:35'),
(23, 52, 11701443, 20, '2', '1', '2015-02-27 14:22:35'),
(24, 49, 11701434, 18, '1', '1', '2015-02-27 13:12:54'),
(24, 49, 11701435, 18, '1.5', '1', '2015-02-27 13:12:54'),
(24, 49, 11701436, 18, '1.5', '1', '2015-02-27 13:12:54'),
(24, 49, 11701437, 18, '1', '1', '2015-02-27 13:12:54'),
(24, 49, 11701438, 18, '2', '1', '2015-02-27 13:12:54'),
(24, 49, 11701439, 18, '2.5', '1', '2015-02-27 13:12:54'),
(24, 49, 11701440, 18, 'NC', '1', '2015-02-27 13:12:54'),
(24, 49, 11701441, 18, 'W', '1', '2015-02-27 13:12:54'),
(24, 49, 11701442, 18, 'INC', '1', '2015-02-27 13:12:54'),
(24, 49, 11701443, 18, '1', '1', '2015-02-27 13:12:54'),
(24, 50, 11701434, 19, '3', '1', '2015-02-27 14:18:29'),
(24, 50, 11701435, 19, '2.5', '1', '2015-02-27 14:18:29'),
(24, 50, 11701436, 19, '2', '1', '2015-02-27 14:18:29'),
(24, 50, 11701437, 19, '2', '1', '2015-02-27 14:18:29'),
(24, 50, 11701438, 19, '2.5', '1', '2015-02-27 14:18:29'),
(24, 50, 11701439, 19, '2.5', '1', '2015-02-27 14:18:29'),
(24, 50, 11701440, 19, '3', '1', '2015-02-27 14:18:29'),
(24, 50, 11701441, 19, '3', '1', '2015-02-27 14:18:29'),
(24, 50, 11701442, 19, '2.5', '1', '2015-02-27 14:18:29'),
(24, 50, 11701443, 19, '2', '1', '2015-02-27 14:18:29'),
(24, 51, 11701434, 25, '3', '1', '2015-02-27 14:19:52'),
(24, 51, 11701435, 25, '2.5', '1', '2015-02-27 14:19:52'),
(24, 51, 11701436, 25, '2', '1', '2015-02-27 14:19:52'),
(24, 51, 11701437, 25, '2', '1', '2015-02-27 14:19:52'),
(24, 51, 11701438, 25, '2.5', '1', '2015-02-27 14:19:52'),
(24, 51, 11701439, 25, '2.5', '1', '2015-02-27 14:19:52'),
(24, 51, 11701440, 25, '3', '1', '2015-02-27 14:19:52'),
(24, 51, 11701441, 25, '3', '1', '2015-02-27 14:19:52'),
(24, 51, 11701442, 25, '2.5', '1', '2015-02-27 14:19:52'),
(24, 51, 11701443, 25, '2', '1', '2015-02-27 14:19:52'),
(24, 52, 11701434, 20, '', '1', '2015-02-27 14:22:35'),
(24, 52, 11701435, 20, '', '1', '2015-02-27 14:22:35'),
(24, 52, 11701436, 20, '', '1', '2015-02-27 14:22:35'),
(24, 52, 11701437, 20, '', '1', '2015-02-27 14:22:35'),
(24, 52, 11701438, 20, '', '1', '2015-02-27 14:22:35'),
(24, 52, 11701439, 20, '', '1', '2015-02-27 14:22:35'),
(24, 52, 11701440, 20, '', '1', '2015-02-27 14:22:35'),
(24, 52, 11701441, 20, '', '1', '2015-02-27 14:22:35'),
(24, 52, 11701442, 20, '', '1', '2015-02-27 14:22:35'),
(24, 52, 11701443, 20, '', '1', '2015-02-27 14:22:35'),
(25, 49, 11701434, 18, '3', '1', '2015-02-27 13:12:54'),
(25, 49, 11701435, 18, '2.5', '1', '2015-02-27 13:12:54'),
(25, 49, 11701436, 18, '2', '1', '2015-02-27 13:12:54'),
(25, 49, 11701437, 18, '2', '1', '2015-02-27 13:12:54'),
(25, 49, 11701438, 18, '2.5', '1', '2015-02-27 13:12:54'),
(25, 49, 11701439, 18, '2.5', '1', '2015-02-27 13:12:54'),
(25, 49, 11701440, 18, '3', '1', '2015-02-27 13:12:54'),
(25, 49, 11701441, 18, '3', '1', '2015-02-27 13:12:54'),
(25, 49, 11701442, 18, '2.5', '1', '2015-02-27 13:12:54'),
(25, 49, 11701443, 18, '2', '1', '2015-02-27 13:12:54'),
(25, 50, 11701434, 19, '3', '1', '2015-02-27 14:18:29'),
(25, 50, 11701435, 19, '2.5', '1', '2015-02-27 14:18:29'),
(25, 50, 11701436, 19, '2', '1', '2015-02-27 14:18:29'),
(25, 50, 11701437, 19, '2', '1', '2015-02-27 14:18:29'),
(25, 50, 11701438, 19, '2.5', '1', '2015-02-27 14:18:29'),
(25, 50, 11701439, 19, '2.5', '1', '2015-02-27 14:18:29'),
(25, 50, 11701440, 19, '3', '1', '2015-02-27 14:18:29'),
(25, 50, 11701441, 19, '3', '1', '2015-02-27 14:18:29'),
(25, 50, 11701442, 19, '2.5', '1', '2015-02-27 14:18:29'),
(25, 50, 11701443, 19, '2', '1', '2015-02-27 14:18:29'),
(25, 51, 11701434, 25, '3', '1', '2015-02-27 14:19:52'),
(25, 51, 11701435, 25, '2.5', '1', '2015-02-27 14:19:52'),
(25, 51, 11701436, 25, '2', '1', '2015-02-27 14:19:52'),
(25, 51, 11701437, 25, '2', '1', '2015-02-27 14:19:52'),
(25, 51, 11701438, 25, '2.5', '1', '2015-02-27 14:19:52'),
(25, 51, 11701439, 25, '2.5', '1', '2015-02-27 14:19:52'),
(25, 51, 11701440, 25, '3', '1', '2015-02-27 14:19:52'),
(25, 51, 11701441, 25, '3', '1', '2015-02-27 14:19:52'),
(25, 51, 11701442, 25, '2.5', '1', '2015-02-27 14:19:52'),
(25, 51, 11701443, 25, '2', '1', '2015-02-27 14:19:52'),
(25, 52, 11701434, 20, '1.5', '1', '2015-02-27 14:22:35'),
(25, 52, 11701435, 20, 'NC', '1', '2015-02-27 14:22:35'),
(25, 52, 11701436, 20, 'W', '1', '2015-02-27 14:22:35'),
(25, 52, 11701437, 20, 'INC', '1', '2015-02-27 14:22:35'),
(25, 52, 11701438, 20, '2', '1', '2015-02-27 14:22:35'),
(25, 52, 11701439, 20, '1', '1', '2015-02-27 14:22:35'),
(25, 52, 11701440, 20, '1.5', '1', '2015-02-27 14:22:35'),
(25, 52, 11701441, 20, '1.5', '1', '2015-02-27 14:22:35'),
(25, 52, 11701442, 20, '2', '1', '2015-02-27 14:22:35'),
(25, 52, 11701443, 20, '1.5', '1', '2015-02-27 14:22:35'),
(26, 49, 11701434, 18, '', '1', '2015-02-27 13:12:54'),
(26, 49, 11701435, 18, '', '1', '2015-02-27 13:12:54'),
(26, 49, 11701436, 18, '', '1', '2015-02-27 13:12:54'),
(26, 49, 11701437, 18, '', '1', '2015-02-27 13:12:54'),
(26, 49, 11701438, 18, '', '1', '2015-02-27 13:12:54'),
(26, 49, 11701439, 18, '', '1', '2015-02-27 13:12:54'),
(26, 49, 11701440, 18, '', '1', '2015-02-27 13:12:54'),
(26, 49, 11701441, 18, '', '1', '2015-02-27 13:12:54'),
(26, 49, 11701442, 18, '', '1', '2015-02-27 13:12:54'),
(26, 49, 11701443, 18, '', '1', '2015-02-27 13:12:54'),
(26, 50, 11701434, 19, '1.5', '1', '2015-02-27 14:18:29'),
(26, 50, 11701435, 19, 'NC', '1', '2015-02-27 14:18:29'),
(26, 50, 11701436, 19, 'W', '1', '2015-02-27 14:18:29'),
(26, 50, 11701437, 19, 'INC', '1', '2015-02-27 14:18:29'),
(26, 50, 11701438, 19, '2', '1', '2015-02-27 14:18:29'),
(26, 50, 11701439, 19, '1', '1', '2015-02-27 14:18:29'),
(26, 50, 11701440, 19, '1.5', '1', '2015-02-27 14:18:29'),
(26, 50, 11701441, 19, '1.5', '1', '2015-02-27 14:18:29'),
(26, 50, 11701442, 19, '2', '1', '2015-02-27 14:18:29'),
(26, 50, 11701443, 19, '1.5', '1', '2015-02-27 14:18:29'),
(26, 51, 11701434, 25, '1.5', '1', '2015-02-27 14:19:52'),
(26, 51, 11701435, 25, 'NC', '1', '2015-02-27 14:19:52'),
(26, 51, 11701436, 25, 'W', '1', '2015-02-27 14:19:52'),
(26, 51, 11701437, 25, 'INC', '1', '2015-02-27 14:19:52'),
(26, 51, 11701438, 25, '2', '1', '2015-02-27 14:19:52'),
(26, 51, 11701439, 25, '1', '1', '2015-02-27 14:19:52'),
(26, 51, 11701440, 25, '1.5', '1', '2015-02-27 14:19:52'),
(26, 51, 11701441, 25, '1.5', '1', '2015-02-27 14:19:52'),
(26, 51, 11701442, 25, '2', '1', '2015-02-27 14:19:52'),
(26, 51, 11701443, 25, '1.5', '1', '2015-02-27 14:19:52'),
(26, 52, 11701434, 20, '', '1', '2015-02-27 14:22:35'),
(26, 52, 11701435, 20, '', '1', '2015-02-27 14:22:35'),
(26, 52, 11701436, 20, '', '1', '2015-02-27 14:22:35'),
(26, 52, 11701437, 20, '', '1', '2015-02-27 14:22:35'),
(26, 52, 11701438, 20, '', '1', '2015-02-27 14:22:35'),
(26, 52, 11701439, 20, '', '1', '2015-02-27 14:22:35'),
(26, 52, 11701440, 20, '', '1', '2015-02-27 14:22:35'),
(26, 52, 11701441, 20, '', '1', '2015-02-27 14:22:35'),
(26, 52, 11701442, 20, '', '1', '2015-02-27 14:22:35'),
(26, 52, 11701443, 20, '', '1', '2015-02-27 14:22:35'),
(27, 49, 11701434, 18, '1.5', '1', '2015-02-27 13:12:54'),
(27, 49, 11701435, 18, 'NC', '1', '2015-02-27 13:12:54'),
(27, 49, 11701436, 18, 'W', '1', '2015-02-27 13:12:54'),
(27, 49, 11701437, 18, 'INC', '1', '2015-02-27 13:12:54'),
(27, 49, 11701438, 18, '2', '1', '2015-02-27 13:12:54'),
(27, 49, 11701439, 18, '1', '1', '2015-02-27 13:12:54'),
(27, 49, 11701440, 18, '1.5', '1', '2015-02-27 13:12:54'),
(27, 49, 11701441, 18, '1.5', '1', '2015-02-27 13:12:54'),
(27, 49, 11701442, 18, '2', '1', '2015-02-27 13:12:54'),
(27, 49, 11701443, 18, '1.5', '1', '2015-02-27 13:12:54'),
(27, 50, 11701434, 19, '', '1', '2015-02-27 14:18:29'),
(27, 50, 11701435, 19, '', '1', '2015-02-27 14:18:29'),
(27, 50, 11701436, 19, '', '1', '2015-02-27 14:18:29'),
(27, 50, 11701437, 19, '', '1', '2015-02-27 14:18:29'),
(27, 50, 11701438, 19, '', '1', '2015-02-27 14:18:29'),
(27, 50, 11701439, 19, '', '1', '2015-02-27 14:18:29'),
(27, 50, 11701440, 19, '', '1', '2015-02-27 14:18:29'),
(27, 50, 11701441, 19, '', '1', '2015-02-27 14:18:29'),
(27, 50, 11701442, 19, '', '1', '2015-02-27 14:18:29'),
(27, 50, 11701443, 19, '', '1', '2015-02-27 14:18:29'),
(27, 51, 11701434, 25, '', '1', '2015-02-27 14:19:52'),
(27, 51, 11701435, 25, '', '1', '2015-02-27 14:19:52'),
(27, 51, 11701436, 25, '', '1', '2015-02-27 14:19:52'),
(27, 51, 11701437, 25, '', '1', '2015-02-27 14:19:52'),
(27, 51, 11701438, 25, '', '1', '2015-02-27 14:19:52'),
(27, 51, 11701439, 25, '', '1', '2015-02-27 14:19:52'),
(27, 51, 11701440, 25, '', '1', '2015-02-27 14:19:52'),
(27, 51, 11701441, 25, '', '1', '2015-02-27 14:19:52'),
(27, 51, 11701442, 25, '', '1', '2015-02-27 14:19:52'),
(27, 51, 11701443, 25, '', '1', '2015-02-27 14:19:52'),
(27, 52, 11701434, 20, '3', '1', '2015-02-27 14:22:35'),
(27, 52, 11701435, 20, '2.5', '1', '2015-02-27 14:22:35'),
(27, 52, 11701436, 20, '2', '1', '2015-02-27 14:22:35'),
(27, 52, 11701437, 20, '2', '1', '2015-02-27 14:22:35'),
(27, 52, 11701438, 20, '2.5', '1', '2015-02-27 14:22:35'),
(27, 52, 11701439, 20, '2.5', '1', '2015-02-27 14:22:35'),
(27, 52, 11701440, 20, '3', '1', '2015-02-27 14:22:35'),
(27, 52, 11701441, 20, '3', '1', '2015-02-27 14:22:35'),
(27, 52, 11701442, 20, '2.5', '1', '2015-02-27 14:22:35'),
(27, 52, 11701443, 20, '2', '1', '2015-02-27 14:22:35'),
(28, 49, 11701434, 18, '', '1', '2015-02-27 13:12:54'),
(28, 49, 11701435, 18, '', '1', '2015-02-27 13:12:54'),
(28, 49, 11701436, 18, '', '1', '2015-02-27 13:12:54'),
(28, 49, 11701437, 18, '', '1', '2015-02-27 13:12:54'),
(28, 49, 11701438, 18, '', '1', '2015-02-27 13:12:54'),
(28, 49, 11701439, 18, '', '1', '2015-02-27 13:12:54'),
(28, 49, 11701440, 18, '', '1', '2015-02-27 13:12:54'),
(28, 49, 11701441, 18, '', '1', '2015-02-27 13:12:54'),
(28, 49, 11701442, 18, '', '1', '2015-02-27 13:12:54'),
(28, 49, 11701443, 18, '', '1', '2015-02-27 13:12:54'),
(28, 50, 11701434, 19, '', '1', '2015-02-27 14:18:29'),
(28, 50, 11701435, 19, '', '1', '2015-02-27 14:18:29'),
(28, 50, 11701436, 19, '', '1', '2015-02-27 14:18:29'),
(28, 50, 11701437, 19, '', '1', '2015-02-27 14:18:29'),
(28, 50, 11701438, 19, '', '1', '2015-02-27 14:18:29'),
(28, 50, 11701439, 19, '', '1', '2015-02-27 14:18:29'),
(28, 50, 11701440, 19, '', '1', '2015-02-27 14:18:29'),
(28, 50, 11701441, 19, '', '1', '2015-02-27 14:18:29'),
(28, 50, 11701442, 19, '', '1', '2015-02-27 14:18:29'),
(28, 50, 11701443, 19, '', '1', '2015-02-27 14:18:29'),
(28, 51, 11701434, 25, '', '1', '2015-02-27 14:19:52'),
(28, 51, 11701435, 25, '', '1', '2015-02-27 14:19:52'),
(28, 51, 11701436, 25, '', '1', '2015-02-27 14:19:52'),
(28, 51, 11701437, 25, '', '1', '2015-02-27 14:19:52'),
(28, 51, 11701438, 25, '', '1', '2015-02-27 14:19:52'),
(28, 51, 11701439, 25, '', '1', '2015-02-27 14:19:52'),
(28, 51, 11701440, 25, '', '1', '2015-02-27 14:19:52'),
(28, 51, 11701441, 25, '', '1', '2015-02-27 14:19:52'),
(28, 51, 11701442, 25, '', '1', '2015-02-27 14:19:52'),
(28, 51, 11701443, 25, '', '1', '2015-02-27 14:19:52'),
(28, 52, 11701434, 20, '', '1', '2015-02-27 14:22:35'),
(28, 52, 11701435, 20, '', '1', '2015-02-27 14:22:35'),
(28, 52, 11701436, 20, '', '1', '2015-02-27 14:22:35'),
(28, 52, 11701437, 20, '', '1', '2015-02-27 14:22:35'),
(28, 52, 11701438, 20, '', '1', '2015-02-27 14:22:35'),
(28, 52, 11701439, 20, '', '1', '2015-02-27 14:22:35'),
(28, 52, 11701440, 20, '', '1', '2015-02-27 14:22:35'),
(28, 52, 11701441, 20, '', '1', '2015-02-27 14:22:35'),
(28, 52, 11701442, 20, '', '1', '2015-02-27 14:22:35'),
(28, 52, 11701443, 20, '', '1', '2015-02-27 14:22:35');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE IF NOT EXISTS `teacher` (
`ID` int(3) NOT NULL,
  `teacher_id` varchar(15) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`ID`, `teacher_id`, `fname`, `lname`) VALUES
(1, '1111111111', 'Joan', 'Tero'),
(2, '1111111112', 'Marilou', 'Iway'),
(3, '1111111113', 'John', 'Doe'),
(4, '1111111114', 'Mary', 'Smith'),
(5, '1111111115', 'Sarah', 'David'),
(6, '1111111116', 'Anthonette', 'Cantara'),
(7, '1111111117', 'Kris', 'Capao'),
(8, '1111111118', 'Angie', 'Ceniza'),
(9, '1111111119', 'Bashron', 'Dicol'),
(10, '1111111120', 'Annalie', 'Golo'),
(11, '1111111121', 'Ronilo', 'Olivar'),
(12, '1111111122', 'Mona lisa', 'Inso');

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
) ENGINE=InnoDB AUTO_INCREMENT=195 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_class`
--

INSERT INTO `teacher_class` (`ID`, `group_num`, `start_time`, `end_time`, `days`, `semester`, `school_year`, `courseCode`, `teacherID`, `date`) VALUES
(1, 1, '7:30 AM', '9:00 AM', 'TTH', '1', 2015, 'ICT110', '1111111111', '2015-02-19 09:46:32'),
(2, 2, '9:00 AM', '10:30 AM', 'TTH', '1', 2015, 'ICT111', '1111111111', '2015-02-19 09:46:32'),
(3, 3, '10:30 AM', '12:00 NN', 'TTH', '1', 2015, 'ICT121', '1111111111', '2015-02-19 09:46:32'),
(4, 4, '1:30 PM', '3:00 PM', 'TTH', '1', 2016, 'ICT122', '1111111111', '2015-02-19 09:46:32'),
(5, 5, '1:30 PM', '3:00 PM', 'MW', '1', 2016, 'ICT123', '1111111111', '2015-02-19 09:46:32'),
(6, 6, '3:00 PM', '4:30 PM', 'MW', '1', 2017, 'ICT131', '1111111111', '2015-02-19 09:46:32'),
(7, 7, '4:30 PM', '6:00 PM', 'MW', '1', 2017, 'ICT132', '1111111111', '2015-02-19 09:46:32'),
(8, 8, '9:00 AM', '10:30 AM', 'MW', '1', 2017, 'ICT133', '1111111111', '2015-02-19 09:46:32'),
(9, 1, '7:30 AM', '10:30 AM', 'MTWTHF', 'summer', 2015, 'ICT116', '1111111111', '2015-02-19 09:52:50'),
(10, 2, '9:00 AM', '10:30 AM', 'TTH', '2', 2015, 'ICT117', '1111111111', '2015-02-19 09:52:50'),
(11, 3, '10:30 AM', '12:00 NN', 'TTH', '2', 2015, 'ICT118', '1111111111', '2015-02-19 09:52:50'),
(12, 4, '1:30 PM', '3:00 PM', 'TTH', '2', 2016, 'ICT126', '1111111111', '2015-02-19 09:52:50'),
(13, 5, '1:30 PM', '3:00 PM', 'MW', '2', 2016, 'ICT127', '1111111111', '2015-02-19 09:52:50'),
(14, 6, '3:00 PM', '4:30 PM', 'MW', '2', 2016, 'ICT128', '1111111111', '2015-02-19 09:52:50'),
(15, 7, '4:30 PM', '6:00 PM', 'MW', '2', 2015, 'ICT135', '1111111111', '2015-02-19 09:52:50'),
(16, 8, '9:00 AM', '10:30 AM', 'MW', '2', 2015, 'ICT136', '1111111111', '2015-02-19 09:52:50'),
(18, 1, '7:30 AM', '9:00 AM', 'TTH', '1', 2015, 'CS110', '1111111113', '2015-02-19 10:24:05'),
(19, 2, '9:00 AM', '10:30 AM', 'TTH', '1', 2015, 'CS11', '1111111113', '2015-02-19 10:24:05'),
(20, 3, '10:30 AM', '12:00 NN', 'TTH', '1', 2016, 'CS121', '1111111113', '2015-02-19 10:24:05'),
(21, 4, '1:30 PM', '3:00 PM', 'TTH', '1', 2017, 'CS130', '1111111113', '2015-02-19 10:24:05'),
(22, 5, '1:30 PM', '3:00 PM', 'MW', '1', 2017, 'CS131', '1111111113', '2015-02-19 10:24:05'),
(23, 6, '3:00 PM', '4:30 PM', 'MW', '1', 2017, 'CS132', '1111111113', '2015-02-19 10:24:05'),
(24, 7, '4:30 PM', '6:00 PM', 'MW', '1', 2018, 'CS140', '1111111113', '2015-02-19 10:24:05'),
(25, 1, '9:00 AM', '10:30 AM', 'MW', '2', 2015, 'CS116', '1111111113', '2015-02-19 10:24:05'),
(26, 2, '7:30 AM', '9:00 AM', 'TTH', '2', 2016, 'CS126', '1111111113', '2015-02-19 10:24:05'),
(27, 3, '9:00 AM', '10:30 AM', 'TTH', '2', 2016, 'CS127', '1111111113', '2015-02-19 10:24:05'),
(28, 4, '10:30 AM', '12:00 NN', 'TTH', '2', 2017, 'CS134', '1111111113', '2015-02-19 10:24:05'),
(29, 5, '1:30 PM', '3:00 PM', 'TTH', '2', 2017, 'CS135', '1111111113', '2015-02-19 10:24:05'),
(30, 6, '1:30 PM', '3:00 PM', 'MW', '2', 2017, 'CS136', '1111111113', '2015-02-19 10:24:05'),
(31, 7, '3:00 PM', '4:30 PM', 'MW', '2', 2017, 'CS137', '1111111113', '2015-02-19 10:24:05'),
(32, 8, '4:30 PM', '6:00 PM', 'MW', '2', 2017, 'CS138', '1111111113', '2015-02-19 10:24:05'),
(33, 1, '9:00 AM', '10:30 AM', 'MW', '2', 2015, 'IT116', '1111111112', '2015-02-19 10:24:05'),
(34, 1, '7:30 AM', '9:00 AM', 'TTH', '1', 2015, 'IT110', '1111111112', '2015-02-19 10:30:04'),
(35, 2, '9:00 AM', '10:30 AM', 'TTH', '1', 2015, 'IT11', '1111111112', '2015-02-19 10:30:04'),
(36, 3, '10:30 AM', '12:00 NN', 'TTH', '1', 2016, 'IT121', '1111111112', '2015-02-19 10:30:04'),
(37, 4, '1:30 PM', '3:00 PM', 'TTH', '1', 2017, 'IT130', '1111111112', '2015-02-19 10:30:04'),
(38, 5, '1:30 PM', '3:00 PM', 'MW', '1', 2017, 'IT131', '1111111112', '2015-02-19 10:30:04'),
(39, 6, '3:00 PM', '4:30 PM', 'MW', '1', 2017, 'IT132', '1111111112', '2015-02-19 10:30:04'),
(40, 7, '4:30 PM', '6:00 PM', 'MW', '1', 2015, 'IT133', '1111111112', '2015-02-19 10:30:04'),
(41, 2, '7:30 AM', '9:00 AM', 'TTH', '2', 2016, 'IT126', '1111111112', '2015-02-19 10:30:04'),
(42, 3, '9:00 AM', '10:30 AM', 'TTH', '2', 2015, 'IT127', '1111111112', '2015-02-19 10:30:04'),
(43, 4, '10:30 AM', '12:00 NN', 'TTH', '2', 2016, 'IT128', '1111111112', '2015-02-19 10:30:04'),
(44, 5, '1:30 PM', '3:00 PM', 'TTH', '2', 2015, 'IT136', '1111111112', '2015-02-19 10:30:04'),
(45, 6, '1:30 PM', '3:00 PM', 'MW', '2', 2015, 'IT137', '1111111112', '2015-02-19 10:30:04'),
(46, 7, '3:00 PM', '4:30 PM', 'MW', '2', 2015, 'IT137', '1111111112', '2015-02-19 10:30:04'),
(47, 8, '4:30 PM', '6:00 PM', 'MW', '2', 2015, 'IT139', '1111111112', '2015-02-19 10:30:04'),
(48, 2, '12:00:00 N', '3:00 PM', 'MTWTHF', 'summer', 2015, 'IT116', '1111111112', '2015-02-19 10:30:04'),
(50, 2, '9:00 AM', '10:30 AM', 'TTH', '1', 2015, 'ICT110', '1111111114', '2015-02-19 11:45:23'),
(51, 3, '10:30 AM', '12:00 NN', 'TTH', '1', 2015, 'ICT110', '1111111114', '2015-02-19 11:45:23'),
(52, 3, '10:30 AM', '12:00 NN', 'MW', '2', 2015, 'ICT116', '1111111114', '2015-02-19 11:45:23'),
(53, 4, '1:30 PM', '3:00 PM', 'MW', '1', 2015, 'ICT111', '1111111114', '2015-02-19 11:45:23'),
(54, 2, '1:30 PM', '3:00 PM', 'TTH', '1', 2015, 'IT110', '1111111114', '2015-02-19 11:45:23'),
(55, 3, '3:00 PM', '4:30 PM', 'TTH', '1', 2015, 'IT110', '1111111114', '2015-02-19 11:45:23'),
(56, 1, '7:30 AM', '9:00 AM', 'TTH', '1', 2015, 'IT11', '1111111114', '2015-02-19 11:45:23'),
(57, 4, '10:30 AM', '12:00 NN', 'TTH', '1', 2015, 'IT11', '1111111114', '2015-02-19 11:45:23'),
(58, 1, '7:30 AM', '9:00 AM', 'TTH', '2', 2015, 'ICT117', '1111111114', '2015-02-19 11:45:23'),
(59, 3, '10:30 AM', '12:00 NN', 'TTH', '2', 2015, 'ICT117', '1111111114', '2015-02-19 11:45:23'),
(60, 2, '3:00 PM', '4:30 PM', 'MW', '2', 2015, 'ICT118', '1111111114', '2015-02-19 11:45:23'),
(61, 1, '1:30 PM', '3:00 PM', 'MW', '2', 2015, 'ICT118', '1111111114', '2015-02-19 11:45:23'),
(62, 4, '4:30 PM', '6:00 PM', 'MW', '2', 2015, 'ICT118', '1111111114', '2015-02-19 11:45:23'),
(63, 2, '9:00 AM', '10:30 AM', 'TTH', '2', 2015, 'CS116', '1111111114', '2015-02-19 11:45:23'),
(64, 4, '12:00 NN', '1:30 PM', 'TTH', '1', 2015, 'ICT110', '1111111115', '2015-02-19 11:45:23'),
(65, 5, '1:30 PM', '3:00 PM', 'TTH', '1', 2015, 'ICT110', '1111111115', '2015-02-19 11:45:23'),
(66, 5, '12:00 NN', '1:30 PM', 'MW', '1', 2015, 'ICT111', '1111111115', '2015-02-19 11:45:23'),
(67, 6, '3:00 PM', '4:30 PM', 'MW', '1', 2015, 'ICT111', '1111111115', '2015-02-19 11:45:23'),
(68, 5, '1:30 PM', '3:00 PM', 'MW', '1', 2015, 'IT11', '1111111115', '2015-02-19 11:45:23'),
(69, 1, '7:30 AM', '9:00 AM', 'MW', '1', 2016, 'ICT121', '1111111115', '2015-02-19 11:45:23'),
(70, 2, '9:00 AM', '10:30 AM', 'MW', '1', 2015, 'ICT121', '1111111115', '2015-02-19 11:45:23'),
(71, 4, '4:30 PM', '6:00 PM', 'MW', '1', 2015, 'ICT121', '1111111115', '2015-02-19 11:45:23'),
(72, 4, '1:30 PM', '3:00 PM', 'TTH', '2', 2015, 'ICT117', '1111111115', '2015-02-19 11:45:23'),
(73, 5, '3:00 PM', '4:30 PM', 'TTH', '2', 2015, 'ICT117', '1111111115', '2015-02-19 11:45:23'),
(74, 5, '7:30 AM', '9:00 AM', 'MW', '2', 2015, 'ICT118', '1111111115', '2015-02-19 11:45:23'),
(75, 6, '9:00 AM', '10:30 AM', 'MW', '2', 2015, 'ICT118', '1111111115', '2015-02-19 11:45:23'),
(131, 1, '7:30 AM', '9:00 AM', 'TTH', '2', 2016, 'ICT117', '1111111114', '2015-02-19 11:56:23'),
(132, 3, '10:30 AM', '12:00 NN', 'TTH', '2', 2016, 'ICT117', '1111111114', '2015-02-19 11:56:23'),
(133, 2, '3:00 PM', '4:30 PM', 'MW', '2', 2016, 'ICT118', '1111111114', '2015-02-19 11:56:23'),
(134, 1, '1:30 PM', '3:00 PM', 'MW', '2', 2016, 'ICT118', '1111111114', '2015-02-19 11:56:23'),
(135, 4, '4:30 PM', '6:00 PM', 'MW', '2', 2016, 'ICT118', '1111111114', '2015-02-19 11:56:23'),
(136, 2, '9:00 AM', '10:30 AM', 'TTH', '2', 2016, 'CS116', '1111111114', '2015-02-19 11:56:23'),
(137, 4, '12:00 NN', '1:30 PM', 'TTH', '1', 2016, 'ICT110', '1111111115', '2015-02-19 11:56:23'),
(138, 5, '1:30 PM', '3:00 PM', 'TTH', '1', 2016, 'ICT110', '1111111115', '2015-02-19 11:56:23'),
(139, 5, '12:00 NN', '1:30 PM', 'MW', '1', 2016, 'ICT111', '1111111115', '2015-02-19 11:56:23'),
(140, 6, '3:00 PM', '4:30 PM', 'MW', '1', 2016, 'ICT111', '1111111115', '2015-02-19 11:56:23'),
(141, 5, '1:30 PM', '3:00 PM', 'MW', '1', 2016, 'IT11', '1111111115', '2015-02-19 11:56:23'),
(145, 4, '1:30 PM', '3:00 PM', 'TTH', '2', 2016, 'ICT117', '1111111115', '2015-02-19 11:56:23'),
(146, 5, '3:00 PM', '4:30 PM', 'TTH', '2', 2016, 'ICT117', '1111111115', '2015-02-19 11:56:23'),
(147, 5, '7:30 AM', '9:00 AM', 'MW', '2', 2016, 'ICT118', '1111111115', '2015-02-19 11:56:23'),
(148, 6, '9:00 AM', '10:30 AM', 'MW', '2', 2016, 'ICT118', '1111111115', '2015-02-19 11:56:23'),
(149, 1, '7:30 AM', '9:00 AM', 'MW', '1', 2017, 'ICT134', '1111111116', '2015-02-20 06:00:23'),
(150, 2, '9:00 AM', '10:30 AM', 'MW', '1', 2015, 'ICT134', '1111111117', '2015-02-20 06:00:23'),
(151, 1, '10:30 AM', '12:00 NN', 'MW', '2', 2015, 'ICT135', '1111111120', '2015-02-20 06:00:23'),
(152, 2, '9:00 AM', '10:30 AM', 'MW', '2', 2017, 'ICT135', '1111111119', '2015-02-20 06:00:23'),
(153, 1, '7:30 AM', '9:00 AM', 'MW', '2', 2015, 'ICT136', '1111111116', '2015-02-20 06:00:23'),
(154, 2, '9:00 AM', '10:30 AM', 'MW', '2', 2017, 'ICT136', '1111111117', '2015-02-20 06:00:23'),
(155, 1, '10:30 AM', '12:00 NN', 'MW', '2', 2017, 'ICT137', '1111111118', '2015-02-20 06:00:23'),
(156, 2, '7:30 AM', '9:00 AM', 'MW', '2', 2015, 'ICT137', '1111111119', '2015-02-20 06:00:23'),
(157, 1, '9:00 AM', '10:30 AM', 'MW', '2', 2017, 'ICT138', '1111111120', '2015-02-20 06:00:23'),
(158, 2, '10:30 AM', '12:00 NN', 'MW', '2', 2015, 'ICT138', '1111111121', '2015-02-20 06:00:23'),
(159, 1, '9:00 AM', '10:30 AM', 'MW', '2', 2017, 'ICT139', '1111111116', '2015-02-20 06:00:23'),
(160, 2, '10:30 AM', '12:00 NN', 'MW', '2', 2015, 'ICT139', '1111111117', '2015-02-20 06:00:23'),
(161, 1, '1:30 PM', '3:00 PM', 'TTH', '1', 2018, 'ICT141', '1111111118', '2015-02-20 06:00:23'),
(162, 2, '3:00 PM', '4:30 PM', 'TTH', '1', 2015, 'ICT141', '1111111119', '2015-02-20 06:00:23'),
(163, 1, '4:30 PM', '6:00 PM', 'TTH', '1', 2018, 'ICT142', '1111111120', '2015-02-20 06:00:23'),
(164, 2, '10:30 PM', '12:00 NN', 'TTH', '2', 2018, 'ICT146', '1111111121', '2015-02-20 06:00:23'),
(166, 1, '7:30 AM', '9:00 AM', 'MW', '1', 2017, 'IT134', '1111111118', '2015-02-20 10:43:00'),
(167, 2, '10:30 AM', '12:00 NN', 'MW', '1', 2017, 'IT135', '1111111118', '2015-02-20 10:43:00'),
(168, 1, '10:30 AM', '12:00 NN', 'MW', '2', 2017, 'IT136', '1111111119', '2015-02-20 10:43:00'),
(169, 3, '4:30 PM', '6:00 PM', 'TTH', '2', 2017, 'IT137', '1111111119', '2015-02-20 10:43:00'),
(170, 1, '7:30 AM', '9:00 AM', 'MW', '2', 2017, 'IT138', '1111111122', '2015-02-20 10:43:00'),
(171, 2, '9:00 AM', '10:30 AM', 'MW', '2', 2017, 'IT139', '1111111122', '2015-02-20 10:43:00'),
(172, 3, '10:30 AM', '12:00 NN', 'MW', '1', 2018, 'IT140', '1111111122', '2015-02-20 10:43:00'),
(173, 4, '12:00:00 N', '1:30 PM', 'MW', '1', 2018, 'IT141', '1111111122', '2015-02-20 10:43:00'),
(174, 1, '3:00 PM', '4:30 PM', 'MW', '1', 2018, 'IT142', '1111111122', '2015-02-20 10:43:00'),
(175, 2, '4:30 PM', '6:00 PM', 'MW', '1', 2018, 'IT143', '1111111122', '2015-02-20 10:43:00'),
(176, 3, '9:00 AM', '10:30 AM', 'TTH', '1', 2018, 'IT144', '1111111122', '2015-02-20 10:43:00'),
(177, 4, '10:30 AM', '12:00 NN', 'TTH', '2', 2018, 'IT145', '1111111122', '2015-02-20 10:43:00'),
(178, 5, '3:00 PM', '4:30 PM', 'TTH', '2', 2018, 'IT146', '1111111122', '2015-02-20 10:43:00'),
(179, 6, '4:30 PM', '6:00 PM', 'TTH', '2', 2018, 'IT147', '1111111122', '2015-02-20 10:43:00'),
(180, 1, '7:30 AM', '9:00 AM', 'MW', '1', 2018, 'CS140', '1111111121', '2015-02-20 19:08:51'),
(181, 1, '10:30 AM', '12:00 AM', 'MW', '1', 2018, 'CS141', '1111111121', '2015-02-20 19:08:51'),
(182, 1, '10:30 AM', '12:00 AM', 'TTH', '1', 2018, 'CS142', '1111111121', '2015-02-20 19:08:51'),
(183, 1, '7:30 AM', '9:00 AM', 'TTH', '1', 2018, 'CS143', '1111111121', '2015-02-20 19:08:51'),
(184, 1, '1:30 PM', '3:00 PM', 'MW', '1', 2018, 'CS144', '1111111121', '2015-02-20 19:08:51'),
(185, 1, '4:30 PM', '6:00 PM', 'TTH', '1', 2018, 'CS145', '1111111121', '2015-02-20 19:08:51'),
(186, 1, '7:30 AM', '9:00 AM', 'MW', '2', 2018, 'CS146', '1111111121', '2015-02-20 19:08:51'),
(187, 1, '9:00 AM', '10:30 AM', 'MW', '2', 2018, 'CS147', '1111111121', '2015-02-20 19:08:51'),
(188, 1, '10:30 AM', '12:00:00 N', 'MW', '2', 2018, 'CS148', '1111111121', '2015-02-20 19:08:51'),
(189, 1, '10:30 AM', '12:00 AM', 'TTH', '2', 2018, 'CS148A', '1111111121', '2015-02-20 19:08:51'),
(190, 1, '9:00 AM', '10:30 AM', 'TTH', '1', 2017, 'CS133', '1111111113', '2015-02-21 01:24:40'),
(191, 1, '7:30 AM', '9:00 AM', 'TTh', '2', 2015, 'IS110', '1111111111', '2015-02-21 08:39:41'),
(192, 2, '9:00 AM', '10:30 AM', 'Tth', '2', 2015, 'IS110', '1111111111', '2015-02-21 08:39:41'),
(193, 1, '8:30 AM', '9:30 AM', 'MWF', '2', 2015, 'IS121', '1111111111', '2015-02-21 08:39:41'),
(194, 1, '7:30 AM', '9:00 AM', 'TTh', '2', 2015, 'IS11', '1111111111', '2015-02-21 09:01:23');

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE IF NOT EXISTS `user_account` (
`ID` int(5) NOT NULL,
  `idnum` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','teacher','student','coordinator') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`ID`, `idnum`, `password`, `role`) VALUES
(1, 'admin', 'dd94709528bb1c83d08f3088d4043f4742891f4f', 'admin'),
(2, '1111111111', 'e8248cbe79a288ffec75d7300ad2e07172f487f6', 'teacher'),
(3, '1111111112', 'e7b152194773c74ffe783cff215af766a937e1c2', 'teacher'),
(4, '1111111113', '90b67de48dc4751fb0e02e0e3be7dc3e668fc025', 'teacher'),
(5, '1111111114', 'e7a94c9ad1846513284b3a5394487f319167bc0f', 'teacher'),
(6, '1111111115', '5bb9db1537195cee8dd47146c8d4002b34366f97', 'teacher'),
(7, '11104762', '9f1536a55b57b59ffc2dafcdd21325586e12efe5', 'student'),
(8, '11101500', 'fc5c4e6bb23fc0b8053a70838f7be6a958017c9d', 'student'),
(9, '11101501', 'ed2908c34b6cf24fa231a59babb5b03f278e0da7', 'student'),
(10, '11101502', 'c8b5ff5948a4d1118fd95b80ac4b013e0d7363d0', 'student'),
(11, '11101503', 'a2f5a4383b95b958cf5bf6cd35faa11b7847fc50', 'student'),
(12, '11101504', '6d8b34eadad0652d9c72ba644e409b224f5620a4', 'student'),
(13, '11101505', 'dd778eca50b7f66402954bc32ff3385af1794a07', 'student'),
(14, '11101506', '38edfac51957b450d45c580cb6335220324d379b', 'student'),
(15, '11101507', '17d872d5c80a80fea9c52cc3e345dba8574e9e7a', 'student'),
(16, '11101508', '2cb5dcc91bdd5ed28a2c01e7fbfa7e805694504a', 'student'),
(17, '1111111116', '73785d92fe107697833e6e1dada1c434fd5eea1b', 'teacher'),
(18, '1111111117', '7f8c654c67719ceacca9b11db31e019f6064eb74', 'teacher'),
(19, '1111111118', 'af3f5ec3c82e368a231444633154f7a5a1340085', 'teacher'),
(20, '1111111119', 'cd979910b262f44c4b9e75c1e7c3c21c1efa262e', 'teacher'),
(21, '1111111120', '28723cc7a2c3bc8062efe7a2c696d6f93fa8bd37', 'teacher'),
(22, '1111111121', '3594fb37b8d2646c6cf5ad5a6b0b73fe5c8c0fc9', 'teacher'),
(23, '11103625', '46c769910b9cf2f7a82c87240ac1859a6ad3a305', 'student'),
(24, '11100971', '827dd872b8a77750214bccd41a5ff0122ac73ce3', 'student'),
(25, '11104516', 'df49d7304b4441a7d120e7ab51d9befa0701d127', 'student'),
(26, '11100258', '7f9d99a97a96d067ebf9bf8ae91c9d4ba9e4f42f', 'student'),
(27, '11100252', 'ed540c12be9a51044aebcb71434958ae97d0c8b4', 'student'),
(28, '11102574', 'ce46fa308831ff79255b6dd3b61ad4fdacdb3a37', 'student'),
(29, '11102070', '2f7ec34d0f02eabb130dcfa07316cefed9f87ba9', 'student'),
(30, '11104504', 'f85abc54119d6adc7e61d3dbb842dd9906a88a7c', 'student'),
(31, '11102063', 'eefd38d56bbb2759ef4c3456ada48e8935bcad89', 'student'),
(32, '11102064', '94500c34d16b5a35fad06cd0a649cafaff2acf17', 'student'),
(33, '1111111122', '6e88e8026cd1cdee134abc5386de46488deaa56d', 'teacher'),
(34, '11701434', '4266b056ce5ced0aaf6c80389e795f9adf676717', 'student'),
(35, '11701435', '52e324bdefdc5619e0f340cfbfb8b41756f4f344', 'student'),
(36, '11701436', '4d3b4173e135b3de14b19d24c8e7a0a498e3ecb7', 'student'),
(37, '11701437', '260d817c42b387a9f4e741a39610ce6911187c84', 'student'),
(38, '11701438', '39be0d6c0e1db87e2dbc5a04c27f6bfb7bb52106', 'student'),
(39, '11701439', '8ca92cc39bec436e9091de1135b06bae8c692556', 'student'),
(40, '11701440', '55c86cf5fdc1ea0417e3cf4bd1225960c3cfca90', 'student'),
(41, '11701441', '1241185f399132bed95df8023c27621a65041d09', 'student'),
(42, '11701442', 'fd99d755610f19c4fc6e5fe1c0cd2e244b15f833', 'student'),
(43, '11701443', '3ea4dfe0ca548f1d831d8bb6a5d7b1eeda4506a1', 'student'),
(44, '11601434', '9bcfba7cf944994b6517ff6718074d9d7d63edbd', 'student'),
(45, '11601435', '00dc964ce2273ed3df14e3713df08c5dff3d863d', 'student'),
(46, '11601436', 'c3dd2cb2f74bba986315d9da06223fdfda2755cb', 'student'),
(47, '11601437', 'a20115d7b4f7196f45b7405d50afdcc348b01197', 'student'),
(48, '11601438', 'cd397f8a9d3adf4b81e3dc335b52ec0b9a3b3280', 'student'),
(49, '11601439', '3782a4fd731471e9450b6db6911d88ad9f98b79d', 'student'),
(50, '11601440', '7f50b4d01da0636f17bf87744e9548c7d1be9f3d', 'student'),
(51, '11601441', '55a1241f7214796abfb0e0328f75aedfde2ca1fa', 'student'),
(52, '11601442', 'c6d870519ddf75ca716009ef9c7cbb66e55df178', 'student'),
(53, '11601443', 'd515c4b0ca9b375ac42a5ca3354052bb99eb75e6', 'student'),
(54, '11001434', '2e19bf161e35e291eacf131f52f12d62b9dc098a', 'student'),
(55, '11001435', 'e23a3f5f1c0a154c657e635c1a2b6567c06bbb10', 'student'),
(56, '11001436', '7181800b8e6c7202bf1b586ea3bb70fb36368eb2', 'student'),
(57, '11001437', '792544032a3ec8c0c11e5b578a04bb493c78fb44', 'student'),
(58, '11001438', '50f5edf3c414c21c3b4b79df91798042ba221b5b', 'student'),
(59, '11001439', '1964d7bd823fb8d432879173cab44d1de964d536', 'student'),
(60, '11001440', 'b669c75c2097be2c33c67bd4b78b9d982d3b284a', 'student'),
(61, '11001441', 'ae1958bc477b4ced8616ec8fdee3a8330b45cd33', 'student'),
(62, '11001442', '4318a0cd08e16947bc558aa0bde5089a624af2c3', 'student'),
(63, '11001443', '2db3b6c2aa6288afc8264548d212b16fd22f457f', 'student'),
(64, 'ictcoordinator', '84378786b570eb453b3926d4bb67ccdb723197a6', 'coordinator'),
(65, 'itcoordinator', '7278756d0258013e117d21f209599a10edc8d5a1', 'coordinator'),
(66, 'cscoordinator', '9414f96526be1d0c65e8023fbc6b86e8804d1ca8', 'coordinator');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `coordinator`
--
ALTER TABLE `coordinator`
 ADD KEY `coordinator_id` (`coordinator_id`,`program_id`), ADD KEY `program_id` (`program_id`);

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
 ADD PRIMARY KEY (`ID`), ADD UNIQUE KEY `unique_index` (`group_num`,`courseCode`,`school_year`), ADD KEY `courseID` (`courseCode`,`teacherID`), ADD KEY `teacherID` (`teacherID`), ADD KEY `courseCode` (`courseCode`);

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
MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=77;
--
-- AUTO_INCREMENT for table `po`
--
ALTER TABLE `po`
MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `program_year`
--
ALTER TABLE `program_year`
MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `teacher_class`
--
ALTER TABLE `teacher_class`
MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=195;
--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=67;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `coordinator`
--
ALTER TABLE `coordinator`
ADD CONSTRAINT `coordinator_ibfk_1` FOREIGN KEY (`program_id`) REFERENCES `program` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

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
