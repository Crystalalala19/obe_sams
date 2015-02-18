-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2015 at 09:59 AM
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
(16, 'ICT126', 'Multimedia Production', 5, '2', ''),
(17, 'ICT127', 'Lab Technician''s Course', 5, '', ''),
(18, 'ICT128', 'Business Processes', 5, '', ''),
(19, 'ICT131', 'Database Systems I', 5, '', ''),
(20, 'ICT132', 'Data Communication and Networking', 5, '', ''),
(21, 'ICT133', 'Presentation Skills', 5, '', ''),
(22, 'ICT134', 'Oral Communications for ICT I', 5, '', ''),
(23, 'ICT135', 'Oral Communications for ICT II', 5, '', ''),
(24, 'ICT136', 'Database Systems II', 5, '', ''),
(25, 'ICT137', 'Quality Assurance', 5, '', ''),
(26, 'ICT138', 'Network Management and Security', 5, '', ''),
(27, 'ICT139', 'Professional Ethics for ICT', 5, '', ''),
(28, 'ICT141', 'Web Applications Development', 5, '', ''),
(29, 'ICT142', 'Internship/OJT/Practicum', 5, '', ''),
(30, 'ICT146', 'Capstone Project', 5, '', ''),
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
(10, 'Knowledge for Solving Computing Problems', 'ICT01', 'Acquire, synergize and apply with excellence the computing fundamentals, various algorithmic principles, technical concepts and practices, best practices and standards in the application of core information technologies in numerous application environments, mathematics, science, and domain knowledge appropriate for the information technology practice to the abstraction and conceptualization of solution models from defined problems and requirements by deepening one’s insight to the full. ', 5),
(11, 'Problem Analysis', 'ICT02', 'Fully determine, formulate, investigate related research works and analyze user or domain needs to solve multidisciplinary and communal information technology problems accomplishing practical software solutions that are applicable and beneficial to society using fundamentals principles of mathematics, computing fundamentals, technical concepts and practices in the core information technologies, and relevant domain disciplines.', 5),
(12, 'Design/Development of Solutions', 'ICT03', 'Design and evaluate with prudence optimum solutions for multidisciplinary and communal computing problems, and software systems, of varying levels of complexities, components, or computing processes that meet specified user needs taking into account design choices with appropriate consideration for public health and safety, cultural, societal, and environmental considerations. ', 5),
(13, 'Modern Tool Usage', 'ICT04', 'Create, select, adapt, and apply effective and efficient techniques, resources, and suitable modern computing tools to complex computing activities, with an understanding of the limitations in service of humanity.', 5),
(14, 'Individual and teamwork', 'ICT05', 'Able to work independently and indiscriminately collaborate as a member or leader in diverse teams in computing activities, multidisciplinary settings, and “glocalized” communities.', 5),
(15, 'Communication', 'ICT06', 'Communicate effectively and...', 5),
(16, 'Computing professionalism and society', 'ICT07', 'Comprehend and assess thoroughly the impact of software solutions and computing to health, safety, cultural, legal, and environmental concerns within “glocalized” context, and develop, nurture and apply a sense of social responsibility.', 5),
(17, 'Ethics', 'ICT08', 'Understand, demonstrate and live an ethical and moral profession in the development, usage and presentation of theories, research and software solutions; and peer collaborations based on moral and professionals standards to benefit society.', 5),
(18, 'Life-long learning', 'ICT09', 'Recognize and appreciate the relevance of computing principles and theories in the cooperative life journey and apply current and emerging technologies to continuously evolve as a computing professional who can contribute to society’s development and progress.', 5),
(19, 'Knowledge for Solving Computing Problems', 'IT01', 'Acquire, synergize and apply with excellence the computing fundamentals, various algorithmic principles, technical concepts and practices, best practices and standards in the application of core information technologies in numerous application environments, mathematics, science, and domain knowledge appropriate for the information technology practice to the abstraction and conceptualization of solution models from defined problems and requirements by deepening one’s insight to the full.', 6),
(20, 'Problem Analysis', 'IT02', 'Fully determine, formulate, investigate related research works and analyze user or domain needs to solve multidisciplinary and communal information technology problems accomplishing practical software solutions that are applicable and beneficial to society using fundamentals principles of mathematics, computing fundamentals, technical concepts and practices in the core information technologies, and relevant domain disciplines.', 6),
(21, 'Design/Development of Solutions', 'IT03', 'Design and evaluate with prudence optimum solutions for multidisciplinary and communal computing problems, and software systems, of varying levels of complexities, components, or computing processes that meet specified user needs taking into account design choices with appropriate consideration for public health and safety, cultural, societal, and environmental considerations. ', 6),
(22, 'Design/Development of Solutions', 'IT04', 'Able to diligently assist in the creation of an effective project plan and integrate efficient IT-based solutions that includes selection, creation, evaluation, and administration of IT Systems appropriate to the user environment. ', 6),
(23, 'Modern Tool Usage', 'IT05', 'Create, select, adapt, and apply effective and efficient techniques, resources, and suitable modern computing tools to complex computing activities, with an understanding of the limitations in service of humanity.', 6),
(24, 'Individual and Teamwork', 'IT06', 'Able to work independently and indiscriminately collaborate as a member or leader in diverse teams in computing activities, multidisciplinary settings, and “glocalized” communities.', 6),
(25, 'Communication', 'IT07', 'Communicate effectively and decently with the computing community and with society at large (in local and international scenes) about complex computing activities by being able to comprehend and write effective reports, design documentation make and deliver effective presentations, and give and understand clear instructions.', 6),
(26, 'Computing Professionalism and Society', 'IT08', 'Comprehend and assess thoroughly the impact of software solutions and computing to health, safety, cultural, legal, and environmental concerns within “glocalized” context, and develop, nurture and apply a sense of social responsibility.', 6),
(27, 'Ethics', 'IT09', 'Understand, demonstrate and live an ethical and moral profession in the development, usage and presentation of theories, research and software solutions; and peer collaborations based on moral and professionals standards to benefit society.', 6),
(28, 'Life-long Learning', 'IT10', 'Recognize and appreciate the relevance of computing principles and theories in the cooperative life journey and apply current and emerging technologies to continuously evolve as a computing professional who can contribute to society’s development and progress.', 6),
(34, 'Knowledge for Solving Computing Problems', 'CS01', 'Acquire, synergize and apply with excellence the computing fundamentals, various algorithmic principles, technical concepts and practices, best practices and standards in the application of core information technologies in numerous application environments, mathematics, science, and domain knowledge appropriate for the information technology practice to the abstraction and conceptualization of solution models from defined problems and requirements by deepening one’s insight to the full.', 10),
(35, 'Problem Analysis', 'CS02', 'Fully determine, formulate, investigate related research works and analyze user or domain needs to solve multidisciplinary and communal information technology problems accomplishing practical software solutions that are applicable and beneficial to society using fundamentals principles of mathematics, computing fundamentals, technical concepts and practices in the core information technologies, and relevant domain disciplines.', 10),
(36, 'Design/Development of Solutions', 'CS03', 'Design and evaluate with prudence optimum solutions for multidisciplinary and communal computing problems, and software systems, of varying levels of complexities, components, or computing processes that meet specified user needs taking into account design choices with appropriate consideration for public health and safety, cultural, societal, and environmental considerations. Able to diligently assist in the creation of an effective project plan and integrate efficient IT-based solutions that includes selection, creation, evaluation, and administration of IT Systems appropriate to the user environment. ', 10),
(37, 'Modern Tool Usage', 'CS04', 'Create, select, adapt, and apply effective and efficient techniques, resources, and suitable modern computing tools to complex computing activities, with an understanding of the limitations in service of humanity.', 10),
(38, 'Individual and Team Work', 'CS05', 'Able to work independently and indiscriminately collaborate as a member or leader in diverse teams in computing activities, multidisciplinary settings, and “glocalized” communities.', 10),
(39, 'Communication', 'CS06', 'Communicate effectively and decently with the computing community and with society at large (in local and international scenes) about complex computing activities by being able to comprehend and write effective reports, design documentation make and deliver effective presentations, and give and understand clear instructions.', 10),
(40, 'Computing Professionalism and Society', 'CS07', 'Comprehend and assess thoroughly the impact of software solutions and computing to health, safety, cultural, legal, and environmental concerns within “glocalized” context, and develop, nurture and apply a sense of social responsibility.', 10),
(41, 'Ethics', 'CS08', 'Understand, demonstrate and live an ethical and moral profession in the development, usage and presentation of theories, research and software solutions; and peer collaborations based on moral and professionals standards to benefit society.', 10),
(42, 'Life-long Learning', 'CS09', 'Recognize and appreciate the relevance of computing principles and theories in the cooperative life journey and apply current and emerging technologies to continuously evolve as a computing professional who can contribute to society’s development and progress.', 10),
(43, 'Knowledge for Solving Computing Problems', 'ICT01', 'Acquire, synergize and apply with excellence the computing fundamentals, various algorithmic principles, technical concepts and practices, best practices and standards in the application of core information technologies in numerous application environments, mathematics, science, and domain knowledge appropriate for the information technology practice to the abstraction and conceptualization of solution models from defined problems and requirements by deepening one’s insight to the full.', 11),
(44, 'Problem Analysis', 'ICT02', 'Fully determine, formulate, investigate related research works and analyze user or domain needs to solve multidisciplinary and communal information technology problems accomplishing practical software solutions that are applicable and beneficial to society using fundamentals principles of mathematics, computing fundamentals, technical concepts and practices in the core information technologies, and relevant domain disciplines.', 11),
(45, 'Design/Development of Solutions', 'ICT03', 'Design and evaluate with prudence optimum solutions for multidisciplinary and communal computing problems, and software systems, of varying levels of complexities, components, or computing processes that meet specified user needs taking into account design choices with appropriate consideration for public health and safety, cultural, societal, and environmental considerations. Able to diligently assist in the creation of an effective project plan and integrate efficient IT-based solutions that includes selection, creation, evaluation, and administration of IT Systems appropriate to the user environment. ', 11),
(46, 'Modern Tool Usage', 'ICT04', 'Create, select, adapt, and apply effective and efficient techniques, resources, and suitable modern computing tools to complex computing activities, with an understanding of the limitations in service of humanity.', 11),
(47, 'Individual and teamwork', 'ICT05', 'Able to work independently and indiscriminately collaborate as a member or leader in diverse teams in computing activities, multidisciplinary settings, and “glocalized” communities.', 11),
(48, 'Communication', 'ICT06', 'Communicate effectively and decently with the computing community and with society at large (in local and international scenes) about complex computing activities by being able to comprehend and write effective reports, design documentation make and deliver effective presentations, and give and understand clear instructions.', 11),
(49, 'Computing professionalism and society', 'ICT07', 'Comprehend and assess thoroughly the impact of software solutions and computing to health, safety, cultural, legal, and environmental concerns within “glocalized” context, and develop, nurture and apply a sense of social responsibility.', 11),
(50, 'Ethics', 'ICT08', 'Understand, demonstrate and live an ethical and moral profession in the development, usage and presentation of theories, research and software solutions; and peer collaborations based on moral and professionals standards to benefit society.', 11),
(51, 'Life-long learning', 'ICT09', 'Recognize and appreciate the relevance of computing principles and theories in the cooperative life journey and apply current and emerging technologies to continuously evolve as a computing professional who can contribute to society’s development and progress.', 11);

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
('1', 19, 32),
('1', 19, 33),
('1', 19, 34),
('1', 19, 35),
('', 19, 36),
('', 19, 37),
('', 19, 38),
('', 19, 39),
('', 19, 40),
('', 19, 41),
('', 19, 42),
('', 19, 43),
('', 19, 44),
('', 19, 45),
('1', 19, 46),
('', 19, 47),
('', 19, 48),
('', 19, 49),
('1', 19, 50),
('', 19, 51),
('', 19, 52),
('', 19, 53),
('', 19, 54),
('', 19, 55),
('1', 20, 31),
('1', 20, 32),
('', 20, 33),
('', 20, 34),
('', 20, 35),
('', 20, 36),
('', 20, 37),
('1', 20, 38),
('', 20, 39),
('', 20, 40),
('', 20, 41),
('', 20, 42),
('', 20, 43),
('1', 20, 44),
('', 20, 45),
('', 20, 46),
('', 20, 47),
('1', 20, 48),
('', 20, 49),
('1', 20, 50),
('', 20, 51),
('1', 20, 52),
('1', 20, 53),
('', 20, 54),
('', 20, 55),
('', 21, 31),
('1', 21, 32),
('1', 21, 33),
('1', 21, 34),
('1', 21, 35),
('', 21, 36),
('', 21, 37),
('1', 21, 38),
('', 21, 39),
('', 21, 40),
('', 21, 41),
('', 21, 42),
('', 21, 43),
('1', 21, 44),
('', 21, 45),
('', 21, 46),
('', 21, 47),
('', 21, 48),
('', 21, 49),
('', 21, 50),
('', 21, 51),
('', 21, 52),
('', 21, 53),
('', 21, 54),
('', 21, 55),
('', 22, 31),
('', 22, 32),
('', 22, 33),
('', 22, 34),
('', 22, 35),
('', 22, 36),
('', 22, 37),
('', 22, 38),
('', 22, 39),
('', 22, 40),
('', 22, 41),
('1', 22, 42),
('', 22, 43),
('1', 22, 44),
('1', 22, 45),
('', 22, 46),
('1', 22, 47),
('', 22, 48),
('1', 22, 49),
('', 22, 50),
('', 22, 51),
('', 22, 52),
('', 22, 53),
('', 22, 54),
('', 22, 55),
('', 23, 31),
('', 23, 32),
('', 23, 33),
('', 23, 34),
('', 23, 35),
('', 23, 36),
('', 23, 37),
('', 23, 38),
('', 23, 39),
('', 23, 40),
('', 23, 41),
('1', 23, 42),
('', 23, 43),
('1', 23, 44),
('1', 23, 45),
('1', 23, 46),
('1', 23, 47),
('1', 23, 48),
('1', 23, 49),
('', 23, 50),
('', 23, 51),
('1', 23, 52),
('1', 23, 53),
('', 23, 54),
('', 23, 55),
('', 24, 31),
('', 24, 32),
('1', 24, 33),
('1', 24, 34),
('1', 24, 35),
('', 24, 36),
('', 24, 37),
('', 24, 38),
('', 24, 39),
('', 24, 40),
('', 24, 41),
('1', 24, 42),
('', 24, 43),
('', 24, 44),
('1', 24, 45),
('', 24, 46),
('1', 24, 47),
('', 24, 48),
('1', 24, 49),
('', 24, 50),
('', 24, 51),
('', 24, 52),
('', 24, 53),
('', 24, 54),
('', 24, 55),
('1', 25, 31),
('', 25, 32),
('', 25, 33),
('', 25, 34),
('', 25, 35),
('', 25, 36),
('', 25, 37),
('1', 25, 38),
('', 25, 39),
('', 25, 40),
('', 25, 41),
('1', 25, 42),
('', 25, 43),
('1', 25, 44),
('', 25, 45),
('', 25, 46),
('', 25, 47),
('', 25, 48),
('', 25, 49),
('', 25, 50),
('', 25, 51),
('', 25, 52),
('', 25, 53),
('', 25, 54),
('', 25, 55),
('', 26, 31),
('', 26, 32),
('1', 26, 33),
('1', 26, 34),
('1', 26, 35),
('', 26, 36),
('', 26, 37),
('1', 26, 38),
('', 26, 39),
('', 26, 40),
('', 26, 41),
('', 26, 42),
('', 26, 43),
('1', 26, 44),
('', 26, 45),
('', 26, 46),
('', 26, 47),
('1', 26, 48),
('', 26, 49),
('1', 26, 50),
('', 26, 51),
('1', 26, 52),
('1', 26, 53),
('', 26, 54),
('', 26, 55),
('1', 27, 31),
('', 27, 32),
('1', 27, 33),
('1', 27, 34),
('1', 27, 35),
('', 27, 36),
('', 27, 37),
('', 27, 38),
('', 27, 39),
('', 27, 40),
('', 27, 41),
('1', 27, 42),
('', 27, 43),
('', 27, 44),
('1', 27, 45),
('1', 27, 46),
('1', 27, 47),
('1', 27, 48),
('1', 27, 49),
('1', 27, 50),
('', 27, 51),
('1', 27, 52),
('1', 27, 53),
('', 27, 54),
('', 27, 55),
('', 28, 31),
('', 28, 32),
('', 28, 33),
('', 28, 34),
('', 28, 35),
('', 28, 36),
('', 28, 37),
('', 28, 38),
('', 28, 39),
('', 28, 40),
('', 28, 41),
('', 28, 42),
('', 28, 43),
('', 28, 44),
('1', 28, 45),
('1', 28, 46),
('', 28, 47),
('', 28, 48),
('1', 28, 49),
('', 28, 50),
('', 28, 51),
('', 28, 52),
('', 28, 53),
('', 28, 54),
('', 28, 55),
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

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
  `lname` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`ID`, `student_id`, `fname`, `lname`) VALUES
(1, 9304897, 'Glenn', 'Arcilla'),
(2, 7302661, 'Ralph', 'Arco'),
(3, 7306872, 'Ludwig Dan', 'Beltran'),
(4, 11102316, 'Jeah Ann', 'Bercede'),
(5, 11104305, 'Paul Jess', 'Bolotaolo'),
(6, 11102611, 'Lynnlie Faye', 'Borja'),
(7, 10305841, 'Christian', 'Bracero'),
(8, 10306267, 'Rhezzil Gay', 'Calinawan'),
(9, 11100533, 'Christine Rea', 'Carin'),
(10, 11104402, 'Crystal Jean', 'Cartalla'),
(11, 11103578, 'Rina', 'Da?o'),
(12, 7307923, 'Gellie Mae', 'De Guia'),
(13, 11102404, 'Tracy', 'Diagon'),
(14, 11104551, 'Jovanne', 'Erida'),
(15, 11102158, 'Shaira Mae', 'Estan'),
(16, 10304548, 'Mark', 'Galolo'),
(17, 6303058, 'Joseph Alan', 'Genson'),
(18, 11103450, 'Theneelyn Claire', 'Haw'),
(19, 11106976, 'Jay Anthony', 'Jamilo'),
(20, 11102210, 'Ken', 'Kudo'),
(21, 6302012, 'Alvin', 'Lanceta'),
(22, 10303145, 'Darryl', 'Menina'),
(23, 10303496, 'Kate', 'Miranda'),
(24, 10306807, 'Freo', 'Montecillo'),
(25, 9307082, 'Jose Enjamemar', 'Moraga'),
(26, 11106019, 'John Ray-An', 'Noel'),
(27, 11102951, 'Antonette', 'Ong'),
(28, 11101091, 'Mary Angeleque', 'Padon'),
(29, 11102306, 'Merry Charlene', 'Pastor'),
(30, 10302946, 'Jesse Rhi', 'Pilota'),
(31, 8305919, 'Hubert', 'Plasencia'),
(32, 11103625, 'Jassem Jake', 'Poncardas'),
(33, 11100971, 'Mitzie Dane', 'Pono'),
(34, 11104516, 'Dan Jose', 'Quijano'),
(35, 11100258, 'Lalaine Dawn', 'Sabandal'),
(36, 11100252, 'Michelle Anne', 'Sanchez'),
(37, 11102574, 'Rose Ann', 'Sescon'),
(38, 11102070, 'Fritz Geraldine', 'Siembra'),
(39, 11104504, 'Karanvir', 'Singh'),
(40, 11102063, 'Marjo', 'Sobrecaray'),
(41, 11104403, 'John', 'Doe'),
(42, 11104404, 'Mae', 'Doe'),
(43, 11104405, 'Smith', 'Doe'),
(44, 11106093, 'Aileen', 'Suarez'),
(45, 11104762, 'Eugenio', 'Arapan'),
(46, 11101500, 'Joseph', 'Cabayacruz'),
(47, 11101501, 'Theneelyn Claire', 'Haw'),
(48, 11101502, 'Mary Rose', 'Bacongga'),
(49, 11101503, 'Junalyn', 'Oberez'),
(50, 11101504, 'Lynnlie Faye', 'Borja'),
(51, 11101505, 'Christian', 'Bracero'),
(52, 11101506, 'Rhezzil Gay', 'Calinawan'),
(53, 11101507, 'Christine Rea', 'Carin'),
(54, 11101508, 'Aileen', 'Suarez'),
(55, 0, '', ''),
(56, 0, '', '');

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
  `year_level` enum('1','2','3','4') NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_course`
--

INSERT INTO `student_course` (`poID`, `courseID`, `studentID`, `classID`, `score`, `year_level`, `date`) VALUES
(10, 11, 7302661, 3, 0, '4', '2015-02-18 08:18:26'),
(10, 11, 7306872, 3, 0, '2', '2015-02-18 08:18:26'),
(10, 11, 9304897, 3, 0, '2', '2015-02-18 08:18:26'),
(10, 11, 10305841, 3, 0, '2', '2015-02-18 08:18:26'),
(10, 11, 10306267, 3, 0, '2', '2015-02-18 08:18:26'),
(10, 11, 11100533, 3, 0, '2', '2015-02-18 08:18:26'),
(10, 11, 11102316, 3, 0, '2', '2015-02-18 08:18:26'),
(10, 11, 11102611, 3, 0, '2', '2015-02-18 08:18:26'),
(10, 11, 11104305, 3, 0, '2', '2015-02-18 08:18:26'),
(10, 11, 11104402, 3, 0, '2', '2015-02-18 08:18:26'),
(10, 12, 11100533, 5, 0, '2', '2015-02-18 08:24:12'),
(11, 11, 7302661, 3, 0, '4', '2015-02-18 08:18:26'),
(11, 11, 7306872, 3, 0, '2', '2015-02-18 08:18:26'),
(11, 11, 9304897, 3, 0, '2', '2015-02-18 08:18:26'),
(11, 11, 10305841, 3, 0, '2', '2015-02-18 08:18:26'),
(11, 11, 10306267, 3, 0, '2', '2015-02-18 08:18:26'),
(11, 11, 11100533, 3, 0, '2', '2015-02-18 08:18:26'),
(11, 11, 11102316, 3, 0, '2', '2015-02-18 08:18:26'),
(11, 11, 11102611, 3, 0, '2', '2015-02-18 08:18:26'),
(11, 11, 11104305, 3, 0, '2', '2015-02-18 08:18:26'),
(11, 11, 11104402, 3, 0, '2', '2015-02-18 08:18:26'),
(11, 12, 11100533, 5, 0, '2', '2015-02-18 08:24:12'),
(12, 11, 7302661, 3, 0, '4', '2015-02-18 08:18:26'),
(12, 11, 7306872, 3, 0, '2', '2015-02-18 08:18:26'),
(12, 11, 9304897, 3, 0, '2', '2015-02-18 08:18:26'),
(12, 11, 10305841, 3, 0, '2', '2015-02-18 08:18:26'),
(12, 11, 10306267, 3, 0, '2', '2015-02-18 08:18:26'),
(12, 11, 11100533, 3, 0, '2', '2015-02-18 08:18:26'),
(12, 11, 11102316, 3, 0, '2', '2015-02-18 08:18:26'),
(12, 11, 11102611, 3, 0, '2', '2015-02-18 08:18:26'),
(12, 11, 11104305, 3, 0, '2', '2015-02-18 08:18:26'),
(12, 11, 11104402, 3, 0, '2', '2015-02-18 08:18:26'),
(12, 12, 11100533, 5, 1, '2', '2015-02-18 08:24:12'),
(13, 11, 7302661, 3, 1.5, '4', '2015-02-18 08:18:26'),
(13, 11, 7306872, 3, 3, '2', '2015-02-18 08:18:26'),
(13, 11, 9304897, 3, 2, '2', '2015-02-18 08:18:26'),
(13, 11, 10305841, 3, 1, '2', '2015-02-18 08:18:26'),
(13, 11, 10306267, 3, 1.5, '2', '2015-02-18 08:18:26'),
(13, 11, 11100533, 3, 3, '2', '2015-02-18 08:18:26'),
(13, 11, 11102316, 3, 2, '2', '2015-02-18 08:18:26'),
(13, 11, 11102611, 3, 3, '2', '2015-02-18 08:18:26'),
(13, 11, 11104305, 3, 3, '2', '2015-02-18 08:18:26'),
(13, 11, 11104402, 3, 2, '2', '2015-02-18 08:18:26'),
(13, 12, 11100533, 5, 1, '2', '2015-02-18 08:24:12'),
(14, 11, 7302661, 3, 0, '4', '2015-02-18 08:18:26'),
(14, 11, 7306872, 3, 0, '2', '2015-02-18 08:18:26'),
(14, 11, 9304897, 3, 0, '2', '2015-02-18 08:18:26'),
(14, 11, 10305841, 3, 0, '2', '2015-02-18 08:18:26'),
(14, 11, 10306267, 3, 0, '2', '2015-02-18 08:18:26'),
(14, 11, 11100533, 3, 0, '2', '2015-02-18 08:18:26'),
(14, 11, 11102316, 3, 0, '2', '2015-02-18 08:18:26'),
(14, 11, 11102611, 3, 0, '2', '2015-02-18 08:18:26'),
(14, 11, 11104305, 3, 0, '2', '2015-02-18 08:18:26'),
(14, 11, 11104402, 3, 0, '2', '2015-02-18 08:18:26'),
(14, 12, 11100533, 5, 0, '2', '2015-02-18 08:24:12'),
(15, 11, 7302661, 3, 2, '4', '2015-02-18 08:18:26'),
(15, 11, 7306872, 3, 1, '2', '2015-02-18 08:18:26'),
(15, 11, 9304897, 3, 3, '2', '2015-02-18 08:18:26'),
(15, 11, 10305841, 3, 3, '2', '2015-02-18 08:18:26'),
(15, 11, 10306267, 3, 2, '2', '2015-02-18 08:18:26'),
(15, 11, 11100533, 3, 1, '2', '2015-02-18 08:18:26'),
(15, 11, 11102316, 3, 1.5, '2', '2015-02-18 08:18:26'),
(15, 11, 11102611, 3, 5, '2', '2015-02-18 08:18:26'),
(15, 11, 11104305, 3, 3, '2', '2015-02-18 08:18:26'),
(15, 11, 11104402, 3, 1.5, '2', '2015-02-18 08:18:26'),
(15, 12, 11100533, 5, 0, '2', '2015-02-18 08:24:12'),
(16, 11, 7302661, 3, 0, '4', '2015-02-18 08:18:26'),
(16, 11, 7306872, 3, 0, '2', '2015-02-18 08:18:26'),
(16, 11, 9304897, 3, 0, '2', '2015-02-18 08:18:26'),
(16, 11, 10305841, 3, 0, '2', '2015-02-18 08:18:26'),
(16, 11, 10306267, 3, 0, '2', '2015-02-18 08:18:26'),
(16, 11, 11100533, 3, 0, '2', '2015-02-18 08:18:26'),
(16, 11, 11102316, 3, 0, '2', '2015-02-18 08:18:26'),
(16, 11, 11102611, 3, 0, '2', '2015-02-18 08:18:26'),
(16, 11, 11104305, 3, 0, '2', '2015-02-18 08:18:26'),
(16, 11, 11104402, 3, 0, '2', '2015-02-18 08:18:26'),
(16, 12, 11100533, 5, 0, '2', '2015-02-18 08:24:12'),
(17, 11, 7302661, 3, 0, '4', '2015-02-18 08:18:26'),
(17, 11, 7306872, 3, 0, '2', '2015-02-18 08:18:26'),
(17, 11, 9304897, 3, 0, '2', '2015-02-18 08:18:26'),
(17, 11, 10305841, 3, 0, '2', '2015-02-18 08:18:26'),
(17, 11, 10306267, 3, 0, '2', '2015-02-18 08:18:26'),
(17, 11, 11100533, 3, 0, '2', '2015-02-18 08:18:26'),
(17, 11, 11102316, 3, 0, '2', '2015-02-18 08:18:26'),
(17, 11, 11102611, 3, 0, '2', '2015-02-18 08:18:26'),
(17, 11, 11104305, 3, 0, '2', '2015-02-18 08:18:26'),
(17, 11, 11104402, 3, 0, '2', '2015-02-18 08:18:26'),
(17, 12, 11100533, 5, 1, '2', '2015-02-18 08:24:12'),
(18, 11, 7302661, 3, 1, '4', '2015-02-18 08:18:26'),
(18, 11, 7306872, 3, 2, '2', '2015-02-18 08:18:26'),
(18, 11, 9304897, 3, 1, '2', '2015-02-18 08:18:26'),
(18, 11, 10305841, 3, 1.5, '2', '2015-02-18 08:18:26'),
(18, 11, 10306267, 3, 1, '2', '2015-02-18 08:18:26'),
(18, 11, 11100533, 3, 2, '2', '2015-02-18 08:18:26'),
(18, 11, 11102316, 3, 3, '2', '2015-02-18 08:18:26'),
(18, 11, 11102611, 3, 2, '2', '2015-02-18 08:18:26'),
(18, 11, 11104305, 3, 5, '2', '2015-02-18 08:18:26'),
(18, 11, 11104402, 3, 3, '2', '2015-02-18 08:18:26'),
(18, 12, 11100533, 5, 1, '2', '2015-02-18 08:24:12');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE IF NOT EXISTS `teacher` (
`ID` int(3) NOT NULL,
  `teacher_id` varchar(15) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`ID`, `teacher_id`, `fname`, `lname`) VALUES
(2, '1111111111', 'Joan', 'Tero'),
(3, '1111111122', 'Marilou', 'Iway');

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
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_class`
--

INSERT INTO `teacher_class` (`ID`, `group_num`, `start_time`, `end_time`, `days`, `semester`, `school_year`, `courseCode`, `teacherID`, `date`) VALUES
(3, 3, '1:30 PM', '3:00 PM', 'TTH', '2', 2015, 'ICT117', '1111111111', '2015-02-13 13:28:58'),
(4, 4, '3:00 PM', '4:30 PM', 'TTH', '2', 2015, 'ICT117', '1111111111', '2015-02-13 13:28:58'),
(5, 5, '9:00 AM', '10:30 AM', 'MW', '2', 2015, 'ICT118', '1111111111', '2015-02-13 13:28:58'),
(8, 1, '12:00 PM', '1:30 PM', 'TTH', '2', 2015, 'ICT117', '1111111122', '2015-02-13 13:28:58'),
(9, 2, '10:30 PM', '12:00 PM', 'TTH', '2', 2015, 'ICT117', '1111111122', '2015-02-13 13:28:58'),
(10, 3, '10:30 AM', '12:00 AM', 'MW', '2', 2015, 'ICT118', '1111111122', '2015-02-13 13:28:58'),
(22, 1, '7:30 AM', '9:30 AM', 'TTH', '2', 2015, 'ICT126', '1111111111', '2015-02-13 15:11:36'),
(23, 2, '10:30 AM', '12:00 AM', 'TTH', '2', 2015, 'ICT126', '1111111122', '2015-02-13 15:11:36');

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
(1, '1111111111', 'e8248cbe79a288ffec75d7300ad2e07172f487f6', 'teacher'),
(2, '1111111122', '6e88e8026cd1cdee134abc5386de46488deaa56d', 'teacher'),
(3, 'admin', 'admin', 'admin'),
(4, '9304897', '430dc1e01ea31c2abd4a308f94b6869fb3be8d34', 'student'),
(5, '7302661', '56cf4a3083a2249c74c9e5d9f462ecbb7beb941c', 'student'),
(6, '11106093', 'c710ec062f6ac9d26a74c2a48cacb4c358fec625', 'student'),
(7, '11104762', '9f1536a55b57b59ffc2dafcdd21325586e12efe5', 'student'),
(8, '11101500', 'fc5c4e6bb23fc0b8053a70838f7be6a958017c9d', 'student'),
(9, '11101501', 'ed2908c34b6cf24fa231a59babb5b03f278e0da7', 'student'),
(10, '11101502', 'c8b5ff5948a4d1118fd95b80ac4b013e0d7363d0', 'student'),
(11, '11101503', 'a2f5a4383b95b958cf5bf6cd35faa11b7847fc50', 'student'),
(12, '11101504', '6d8b34eadad0652d9c72ba644e409b224f5620a4', 'student'),
(13, '11101505', 'dd778eca50b7f66402954bc32ff3385af1794a07', 'student'),
(14, '11101506', '38edfac51957b450d45c580cb6335220324d379b', 'student'),
(15, '11101507', '17d872d5c80a80fea9c52cc3e345dba8574e9e7a', 'student'),
(16, '11101508', '2cb5dcc91bdd5ed28a2c01e7fbfa7e805694504a', 'student');

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
MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `program_year`
--
ALTER TABLE `program_year`
MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `teacher_class`
--
ALTER TABLE `teacher_class`
MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
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
