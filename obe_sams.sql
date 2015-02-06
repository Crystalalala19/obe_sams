-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2015 at 10:57 AM
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
  `semester` enum('1st semester','2nd semester','','') NOT NULL
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
`ID` int(5) NOT NULL,
  `status` enum('1','0') NOT NULL,
  `poID` int(3) NOT NULL,
  `courseID` int(3) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=695 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `po_course`
--

INSERT INTO `po_course` (`ID`, `status`, `poID`, `courseID`) VALUES
(2, '1', 10, 8),
(3, '1', 11, 8),
(4, '0', 12, 8),
(5, '0', 13, 8),
(6, '0', 14, 8),
(7, '1', 15, 8),
(8, '0', 16, 8),
(9, '0', 17, 8),
(10, '0', 18, 8),
(11, '0', 10, 9),
(12, '0', 11, 9),
(13, '0', 12, 9),
(14, '1', 13, 9),
(15, '1', 14, 9),
(16, '1', 15, 9),
(17, '1', 16, 9),
(18, '0', 17, 9),
(19, '0', 18, 9),
(20, '1', 10, 10),
(21, '1', 11, 10),
(22, '0', 12, 10),
(23, '0', 13, 10),
(24, '0', 14, 10),
(25, '1', 15, 10),
(26, '0', 16, 10),
(27, '0', 17, 10),
(28, '0', 18, 10),
(29, '0', 10, 11),
(30, '0', 11, 11),
(31, '0', 12, 11),
(32, '1', 13, 11),
(33, '0', 14, 11),
(34, '1', 15, 11),
(35, '0', 16, 11),
(36, '0', 17, 11),
(37, '1', 18, 11),
(38, '0', 10, 12),
(39, '0', 11, 12),
(40, '1', 12, 12),
(41, '1', 13, 12),
(42, '0', 14, 12),
(43, '0', 15, 12),
(44, '0', 16, 12),
(45, '1', 17, 12),
(46, '1', 18, 12),
(47, '1', 10, 13),
(48, '1', 11, 13),
(49, '0', 12, 13),
(50, '0', 13, 13),
(51, '1', 14, 13),
(52, '1', 15, 13),
(53, '0', 16, 13),
(54, '0', 17, 13),
(55, '0', 18, 13),
(56, '0', 10, 14),
(57, '0', 11, 14),
(58, '1', 12, 14),
(59, '1', 13, 14),
(60, '0', 14, 14),
(61, '1', 15, 14),
(62, '0', 16, 14),
(63, '1', 17, 14),
(64, '0', 18, 14),
(65, '0', 10, 15),
(66, '0', 11, 15),
(67, '1', 12, 15),
(68, '0', 13, 15),
(69, '1', 14, 15),
(70, '1', 15, 15),
(71, '0', 16, 15),
(72, '0', 17, 15),
(73, '1', 18, 15),
(74, '0', 10, 16),
(75, '0', 11, 16),
(76, '1', 12, 16),
(77, '1', 13, 16),
(78, '1', 14, 16),
(79, '0', 15, 16),
(80, '1', 16, 16),
(81, '0', 17, 16),
(82, '1', 18, 16),
(83, '1', 10, 17),
(84, '0', 11, 17),
(85, '0', 12, 17),
(86, '1', 13, 17),
(87, '0', 14, 17),
(88, '0', 15, 17),
(89, '1', 16, 17),
(90, '1', 17, 17),
(91, '0', 18, 17),
(92, '0', 10, 18),
(93, '1', 11, 18),
(94, '0', 12, 18),
(95, '0', 13, 18),
(96, '1', 14, 18),
(97, '1', 15, 18),
(98, '0', 16, 18),
(99, '1', 17, 18),
(100, '0', 18, 18),
(101, '0', 10, 19),
(102, '1', 11, 19),
(103, '1', 12, 19),
(104, '0', 13, 19),
(105, '1', 14, 19),
(106, '1', 15, 19),
(107, '1', 16, 19),
(108, '0', 17, 19),
(109, '0', 18, 19),
(110, '1', 10, 20),
(111, '0', 11, 20),
(112, '1', 12, 20),
(113, '0', 13, 20),
(114, '1', 14, 20),
(115, '0', 15, 20),
(116, '0', 16, 20),
(117, '0', 17, 20),
(118, '0', 18, 20),
(119, '0', 10, 21),
(120, '0', 11, 21),
(121, '0', 12, 21),
(122, '0', 13, 21),
(123, '1', 14, 21),
(124, '1', 15, 21),
(125, '0', 16, 21),
(126, '0', 17, 21),
(127, '0', 18, 21),
(128, '1', 10, 22),
(129, '0', 11, 22),
(130, '0', 12, 22),
(131, '1', 13, 22),
(132, '0', 14, 22),
(133, '1', 15, 22),
(134, '0', 16, 22),
(135, '0', 17, 22),
(136, '0', 18, 22),
(137, '1', 10, 23),
(138, '0', 11, 23),
(139, '0', 12, 23),
(140, '1', 13, 23),
(141, '0', 14, 23),
(142, '1', 15, 23),
(143, '0', 16, 23),
(144, '0', 17, 23),
(145, '0', 18, 23),
(146, '0', 10, 24),
(147, '0', 11, 24),
(148, '1', 12, 24),
(149, '1', 13, 24),
(150, '1', 14, 24),
(151, '1', 15, 24),
(152, '1', 16, 24),
(153, '0', 17, 24),
(154, '0', 18, 24),
(155, '0', 10, 25),
(156, '1', 11, 25),
(157, '0', 12, 25),
(158, '1', 13, 25),
(159, '0', 14, 25),
(160, '1', 15, 25),
(161, '0', 16, 25),
(162, '0', 17, 25),
(163, '0', 18, 25),
(164, '0', 10, 26),
(165, '1', 11, 26),
(166, '0', 12, 26),
(167, '1', 13, 26),
(168, '0', 14, 26),
(169, '0', 15, 26),
(170, '1', 16, 26),
(171, '1', 17, 26),
(172, '0', 18, 26),
(173, '0', 10, 27),
(174, '1', 11, 27),
(175, '1', 12, 27),
(176, '0', 13, 27),
(177, '0', 14, 27),
(178, '0', 15, 27),
(179, '0', 16, 27),
(180, '1', 17, 27),
(181, '1', 18, 27),
(182, '1', 10, 28),
(183, '1', 11, 28),
(184, '0', 12, 28),
(185, '0', 13, 28),
(186, '1', 14, 28),
(187, '0', 15, 28),
(188, '0', 16, 28),
(189, '0', 17, 28),
(190, '1', 18, 28),
(191, '0', 10, 29),
(192, '0', 11, 29),
(193, '1', 12, 29),
(194, '1', 13, 29),
(195, '1', 14, 29),
(196, '0', 15, 29),
(197, '1', 16, 29),
(198, '1', 17, 29),
(199, '0', 18, 29),
(200, '0', 10, 30),
(201, '0', 11, 30),
(202, '1', 12, 30),
(203, '1', 13, 30),
(204, '0', 14, 30),
(205, '1', 15, 30),
(206, '0', 16, 30),
(207, '0', 17, 30),
(208, '1', 18, 30),
(209, '1', 19, 31),
(210, '1', 20, 31),
(211, '0', 21, 31),
(212, '0', 22, 31),
(213, '0', 23, 31),
(214, '0', 24, 31),
(215, '1', 25, 31),
(216, '0', 26, 31),
(217, '1', 27, 31),
(218, '0', 28, 31),
(219, '0', 19, 32),
(220, '0', 20, 32),
(221, '0', 21, 32),
(222, '0', 22, 32),
(223, '0', 23, 32),
(224, '0', 24, 32),
(225, '0', 25, 32),
(226, '0', 26, 32),
(227, '0', 27, 32),
(228, '0', 28, 32),
(229, '1', 19, 33),
(230, '0', 20, 33),
(231, '1', 21, 33),
(232, '0', 22, 33),
(233, '0', 23, 33),
(234, '1', 24, 33),
(235, '0', 25, 33),
(236, '1', 26, 33),
(237, '1', 27, 33),
(238, '0', 28, 33),
(239, '1', 19, 34),
(240, '0', 20, 34),
(241, '1', 21, 34),
(242, '0', 22, 34),
(243, '0', 23, 34),
(244, '1', 24, 34),
(245, '0', 25, 34),
(246, '1', 26, 34),
(247, '1', 27, 34),
(248, '0', 28, 34),
(249, '1', 19, 35),
(250, '0', 20, 35),
(251, '1', 21, 35),
(252, '0', 22, 35),
(253, '0', 23, 35),
(254, '1', 24, 35),
(255, '0', 25, 35),
(256, '1', 26, 35),
(257, '1', 27, 35),
(258, '0', 28, 35),
(259, '0', 19, 36),
(260, '0', 20, 36),
(261, '0', 21, 36),
(262, '0', 22, 36),
(263, '0', 23, 36),
(264, '0', 24, 36),
(265, '0', 25, 36),
(266, '0', 26, 36),
(267, '0', 27, 36),
(268, '0', 28, 36),
(269, '0', 19, 37),
(270, '0', 20, 37),
(271, '0', 21, 37),
(272, '0', 22, 37),
(273, '0', 23, 37),
(274, '0', 24, 37),
(275, '0', 25, 37),
(276, '0', 26, 37),
(277, '0', 27, 37),
(278, '0', 28, 37),
(279, '0', 19, 38),
(280, '1', 20, 38),
(281, '1', 21, 38),
(282, '0', 22, 38),
(283, '0', 23, 38),
(284, '0', 24, 38),
(285, '1', 25, 38),
(286, '1', 26, 38),
(287, '0', 27, 38),
(288, '0', 28, 38),
(289, '0', 19, 39),
(290, '0', 20, 39),
(291, '0', 21, 39),
(292, '0', 22, 39),
(293, '0', 23, 39),
(294, '0', 24, 39),
(295, '0', 25, 39),
(296, '0', 26, 39),
(297, '0', 27, 39),
(298, '0', 28, 39),
(299, '0', 19, 40),
(300, '0', 20, 40),
(301, '0', 21, 40),
(302, '0', 22, 40),
(303, '0', 23, 40),
(304, '0', 24, 40),
(305, '0', 25, 40),
(306, '0', 26, 40),
(307, '0', 27, 40),
(308, '0', 28, 40),
(309, '0', 19, 41),
(310, '0', 20, 41),
(311, '0', 21, 41),
(312, '0', 22, 41),
(313, '0', 23, 41),
(314, '0', 24, 41),
(315, '0', 25, 41),
(316, '0', 26, 41),
(317, '0', 27, 41),
(318, '0', 28, 41),
(319, '0', 19, 42),
(320, '0', 20, 42),
(321, '0', 21, 42),
(322, '1', 22, 42),
(323, '1', 23, 42),
(324, '1', 24, 42),
(325, '1', 25, 42),
(326, '0', 26, 42),
(327, '1', 27, 42),
(328, '0', 28, 42),
(329, '0', 19, 43),
(330, '0', 20, 43),
(331, '0', 21, 43),
(332, '0', 22, 43),
(333, '0', 23, 43),
(334, '0', 24, 43),
(335, '0', 25, 43),
(336, '0', 26, 43),
(337, '0', 27, 43),
(338, '0', 28, 43),
(339, '0', 19, 44),
(340, '1', 20, 44),
(341, '1', 21, 44),
(342, '1', 22, 44),
(343, '1', 23, 44),
(344, '0', 24, 44),
(345, '1', 25, 44),
(346, '1', 26, 44),
(347, '0', 27, 44),
(348, '0', 28, 44),
(349, '0', 19, 45),
(350, '0', 20, 45),
(351, '0', 21, 45),
(352, '1', 22, 45),
(353, '1', 23, 45),
(354, '1', 24, 45),
(355, '0', 25, 45),
(356, '0', 26, 45),
(357, '1', 27, 45),
(358, '1', 28, 45),
(359, '1', 19, 46),
(360, '0', 20, 46),
(361, '0', 21, 46),
(362, '0', 22, 46),
(363, '1', 23, 46),
(364, '0', 24, 46),
(365, '0', 25, 46),
(366, '0', 26, 46),
(367, '1', 27, 46),
(368, '1', 28, 46),
(369, '0', 19, 47),
(370, '0', 20, 47),
(371, '0', 21, 47),
(372, '1', 22, 47),
(373, '1', 23, 47),
(374, '1', 24, 47),
(375, '0', 25, 47),
(376, '0', 26, 47),
(377, '1', 27, 47),
(378, '0', 28, 47),
(379, '0', 19, 48),
(380, '1', 20, 48),
(381, '0', 21, 48),
(382, '0', 22, 48),
(383, '1', 23, 48),
(384, '0', 24, 48),
(385, '0', 25, 48),
(386, '1', 26, 48),
(387, '1', 27, 48),
(388, '0', 28, 48),
(389, '0', 19, 49),
(390, '0', 20, 49),
(391, '0', 21, 49),
(392, '1', 22, 49),
(393, '1', 23, 49),
(394, '1', 24, 49),
(395, '0', 25, 49),
(396, '0', 26, 49),
(397, '1', 27, 49),
(398, '1', 28, 49),
(399, '1', 19, 50),
(400, '1', 20, 50),
(401, '0', 21, 50),
(402, '0', 22, 50),
(403, '0', 23, 50),
(404, '0', 24, 50),
(405, '0', 25, 50),
(406, '1', 26, 50),
(407, '1', 27, 50),
(408, '0', 28, 50),
(409, '0', 19, 51),
(410, '0', 20, 51),
(411, '0', 21, 51),
(412, '0', 22, 51),
(413, '0', 23, 51),
(414, '0', 24, 51),
(415, '0', 25, 51),
(416, '0', 26, 51),
(417, '0', 27, 51),
(418, '0', 28, 51),
(419, '0', 19, 52),
(420, '1', 20, 52),
(421, '0', 21, 52),
(422, '0', 22, 52),
(423, '1', 23, 52),
(424, '0', 24, 52),
(425, '0', 25, 52),
(426, '1', 26, 52),
(427, '1', 27, 52),
(428, '0', 28, 52),
(429, '0', 19, 53),
(430, '1', 20, 53),
(431, '0', 21, 53),
(432, '0', 22, 53),
(433, '1', 23, 53),
(434, '0', 24, 53),
(435, '0', 25, 53),
(436, '1', 26, 53),
(437, '1', 27, 53),
(438, '0', 28, 53),
(439, '0', 19, 54),
(440, '0', 20, 54),
(441, '0', 21, 54),
(442, '0', 22, 54),
(443, '0', 23, 54),
(444, '0', 24, 54),
(445, '0', 25, 54),
(446, '0', 26, 54),
(447, '0', 27, 54),
(448, '0', 28, 54),
(449, '0', 19, 55),
(450, '0', 20, 55),
(451, '0', 21, 55),
(452, '0', 22, 55),
(453, '0', 23, 55),
(454, '0', 24, 55),
(455, '0', 25, 55),
(456, '0', 26, 55),
(457, '0', 27, 55),
(458, '0', 28, 55),
(470, '0', 34, 62),
(471, '0', 35, 62),
(472, '0', 36, 62),
(473, '0', 37, 62),
(474, '0', 38, 62),
(475, '0', 39, 62),
(476, '0', 40, 62),
(477, '0', 41, 62),
(478, '0', 42, 62),
(479, '0', 34, 63),
(480, '0', 35, 63),
(481, '0', 36, 63),
(482, '1', 37, 63),
(483, '1', 38, 63),
(484, '1', 39, 63),
(485, '1', 40, 63),
(486, '0', 41, 63),
(487, '0', 42, 63),
(488, '0', 34, 64),
(489, '1', 35, 64),
(490, '1', 36, 64),
(491, '0', 37, 64),
(492, '1', 38, 64),
(493, '1', 39, 64),
(494, '0', 40, 64),
(495, '1', 41, 64),
(496, '0', 42, 64),
(497, '0', 34, 65),
(498, '1', 35, 65),
(499, '1', 36, 65),
(500, '0', 37, 65),
(501, '1', 38, 65),
(502, '1', 39, 65),
(503, '0', 40, 65),
(504, '1', 41, 65),
(505, '0', 42, 65),
(506, '0', 34, 66),
(507, '0', 35, 66),
(508, '0', 36, 66),
(509, '0', 37, 66),
(510, '0', 38, 66),
(511, '0', 39, 66),
(512, '0', 40, 66),
(513, '0', 41, 66),
(514, '0', 42, 66),
(515, '0', 34, 67),
(516, '0', 35, 67),
(517, '0', 36, 67),
(518, '0', 37, 67),
(519, '0', 38, 67),
(520, '0', 39, 67),
(521, '0', 40, 67),
(522, '0', 41, 67),
(523, '0', 42, 67),
(524, '0', 34, 68),
(525, '0', 35, 68),
(526, '0', 36, 68),
(527, '0', 37, 68),
(528, '0', 38, 68),
(529, '0', 39, 68),
(530, '0', 40, 68),
(531, '0', 41, 68),
(532, '0', 42, 68),
(533, '1', 34, 69),
(534, '0', 35, 69),
(535, '1', 36, 69),
(536, '1', 37, 69),
(537, '0', 38, 69),
(538, '1', 39, 69),
(539, '1', 40, 69),
(540, '0', 41, 69),
(541, '0', 42, 69),
(542, '0', 34, 70),
(543, '0', 35, 70),
(544, '0', 36, 70),
(545, '0', 37, 70),
(546, '0', 38, 70),
(547, '0', 39, 70),
(548, '0', 40, 70),
(549, '0', 41, 70),
(550, '0', 42, 70),
(551, '0', 34, 71),
(552, '0', 35, 71),
(553, '0', 36, 71),
(554, '0', 37, 71),
(555, '0', 38, 71),
(556, '0', 39, 71),
(557, '0', 40, 71),
(558, '0', 41, 71),
(559, '0', 42, 71),
(560, '0', 34, 72),
(561, '0', 35, 72),
(562, '0', 36, 72),
(563, '0', 37, 72),
(564, '0', 38, 72),
(565, '0', 39, 72),
(566, '0', 40, 72),
(567, '0', 41, 72),
(568, '0', 42, 72),
(569, '0', 34, 73),
(570, '0', 35, 73),
(571, '0', 36, 73),
(572, '0', 37, 73),
(573, '0', 38, 73),
(574, '0', 39, 73),
(575, '0', 40, 73),
(576, '0', 41, 73),
(577, '0', 42, 73),
(578, '1', 34, 74),
(579, '1', 35, 74),
(580, '0', 36, 74),
(581, '1', 37, 74),
(582, '0', 38, 74),
(583, '0', 39, 74),
(584, '1', 40, 74),
(585, '0', 41, 74),
(586, '1', 42, 74),
(587, '0', 34, 75),
(588, '0', 35, 75),
(589, '0', 36, 75),
(590, '0', 37, 75),
(591, '0', 38, 75),
(592, '0', 39, 75),
(593, '0', 40, 75),
(594, '0', 41, 75),
(595, '0', 42, 75),
(596, '0', 34, 76),
(597, '0', 35, 76),
(598, '1', 36, 76),
(599, '1', 37, 76),
(600, '1', 38, 76),
(601, '0', 39, 76),
(602, '0', 40, 76),
(603, '0', 41, 76),
(604, '1', 42, 76),
(605, '0', 34, 77),
(606, '0', 35, 77),
(607, '1', 36, 77),
(608, '1', 37, 77),
(609, '1', 38, 77),
(610, '1', 39, 77),
(611, '0', 40, 77),
(612, '0', 41, 77),
(613, '0', 42, 77),
(614, '0', 34, 78),
(615, '1', 35, 78),
(616, '1', 36, 78),
(617, '0', 37, 78),
(618, '1', 38, 78),
(619, '0', 39, 78),
(620, '0', 40, 78),
(621, '1', 41, 78),
(622, '1', 42, 78),
(623, '0', 34, 79),
(624, '0', 35, 79),
(625, '0', 36, 79),
(626, '0', 37, 79),
(627, '0', 38, 79),
(628, '0', 39, 79),
(629, '0', 40, 79),
(630, '0', 41, 79),
(631, '0', 42, 79),
(632, '0', 34, 80),
(633, '0', 35, 80),
(634, '0', 36, 80),
(635, '0', 37, 80),
(636, '0', 38, 80),
(637, '0', 39, 80),
(638, '0', 40, 80),
(639, '0', 41, 80),
(640, '0', 42, 80),
(641, '0', 34, 81),
(642, '0', 35, 81),
(643, '0', 36, 81),
(644, '0', 37, 81),
(645, '0', 38, 81),
(646, '0', 39, 81),
(647, '0', 40, 81),
(648, '0', 41, 81),
(649, '0', 42, 81),
(650, '0', 34, 82),
(651, '0', 35, 82),
(652, '1', 36, 82),
(653, '1', 37, 82),
(654, '1', 38, 82),
(655, '1', 39, 82),
(656, '0', 40, 82),
(657, '0', 41, 82),
(658, '0', 42, 82),
(659, '0', 34, 83),
(660, '0', 35, 83),
(661, '0', 36, 83),
(662, '0', 37, 83),
(663, '0', 38, 83),
(664, '0', 39, 83),
(665, '0', 40, 83),
(666, '0', 41, 83),
(667, '0', 42, 83),
(668, '0', 34, 84),
(669, '0', 35, 84),
(670, '0', 36, 84),
(671, '0', 37, 84),
(672, '0', 38, 84),
(673, '0', 39, 84),
(674, '0', 40, 84),
(675, '0', 41, 84),
(676, '0', 42, 84),
(677, '0', 34, 85),
(678, '0', 35, 85),
(679, '0', 36, 85),
(680, '0', 37, 85),
(681, '0', 38, 85),
(682, '0', 39, 85),
(683, '0', 40, 85),
(684, '0', 41, 85),
(685, '0', 42, 85),
(686, '0', 34, 86),
(687, '0', 35, 86),
(688, '0', 36, 86),
(689, '0', 37, 86),
(690, '0', 38, 86),
(691, '0', 39, 86),
(692, '0', 40, 86),
(693, '0', 41, 86),
(694, '0', 42, 86);

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
  `year_level` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_course`
--

CREATE TABLE IF NOT EXISTS `student_course` (
  `po_courseID` int(5) NOT NULL,
  `pyID` int(3) NOT NULL,
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
 ADD PRIMARY KEY (`ID`), ADD KEY `poID` (`poID`,`courseID`), ADD KEY `courseID` (`courseID`);

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
 ADD KEY `courseID` (`po_courseID`,`studentID`), ADD KEY `studentID` (`studentID`), ADD KEY `classID` (`classID`), ADD KEY `pyID` (`pyID`);

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
-- AUTO_INCREMENT for table `po_course`
--
ALTER TABLE `po_course`
MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=695;
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
MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT;
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
ADD CONSTRAINT `student_course_ibfk_1` FOREIGN KEY (`pyID`) REFERENCES `program_year` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `student_course_ibfk_2` FOREIGN KEY (`po_courseID`) REFERENCES `po_course` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `student_course_ibfk_3` FOREIGN KEY (`studentID`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `student_course_ibfk_4` FOREIGN KEY (`classID`) REFERENCES `teacher_class` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teacher_class`
--
ALTER TABLE `teacher_class`
ADD CONSTRAINT `teacher_class_ibfk_1` FOREIGN KEY (`teacherID`) REFERENCES `teacher` (`teacher_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `teacher_class_ibfk_2` FOREIGN KEY (`courseCode`) REFERENCES `course` (`CourseCode`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
