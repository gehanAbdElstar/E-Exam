-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2020 at 07:45 AM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_exam`
--

-- --------------------------------------------------------

--
-- Table structure for table `chapters`
--

CREATE TABLE `chapters` (
  `id` int(11) NOT NULL,
  `name` text,
  `number` int(10) UNSIGNED DEFAULT NULL,
  `subj_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chapters`
--

INSERT INTO `chapters` (`id`, `name`, `number`, `subj_id`) VALUES
(1, 'introduction to mobile computing', 1, 1),
(2, 'server data dissemination and client cache management', 2, 1),
(3, 'mobile network layer', 3, 1),
(4, 'wireless application protocol (WAP)', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `choices`
--

CREATE TABLE `choices` (
  `id` int(11) NOT NULL,
  `choice` text,
  `que_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `choices`
--

INSERT INTO `choices` (`id`, `choice`, `que_id`) VALUES
(1, 'REPLACEMENT OF WIRED NETWORK ', 1),
(2, 'INFOTAINMENT', 1),
(3, 'EMERGENCIES ', 1),
(4, 'CREDIT CARD  ', 1),
(5, 'Network layer', 2),
(6, 'Physical layer', 2),
(7, 'Application layer', 2),
(8, 'Data link layer', 2),
(9, 'Network layer', 3),
(10, 'Physical layer', 3),
(11, 'Application layer', 3),
(12, 'Data link layer', 3),
(13, 'SDMA ', 4),
(14, 'CSMA/CD', 4),
(15, 'FDMA ', 4),
(16, 'TDMA', 4),
(17, 'true', 5),
(18, 'false', 5),
(19, 'true', 6),
(20, 'false', 6);

-- --------------------------------------------------------

--
-- Table structure for table `depts`
--

CREATE TABLE `depts` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `depts`
--

INSERT INTO `depts` (`id`, `name`) VALUES
(4, 'computer science'),
(5, 'general'),
(3, 'information systems'),
(2, 'information technology'),
(1, 'software engineering');

-- --------------------------------------------------------

--
-- Table structure for table `depts_levels`
--

CREATE TABLE `depts_levels` (
  `dep_id` tinyint(3) UNSIGNED NOT NULL,
  `level_id` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `depts_levels`
--

INSERT INTO `depts_levels` (`dep_id`, `level_id`) VALUES
(1, 2),
(1, 3),
(1, 4),
(2, 2),
(2, 3),
(2, 4),
(3, 2),
(3, 3),
(3, 4),
(4, 2),
(4, 3),
(4, 4),
(5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `depts_subjects`
--

CREATE TABLE `depts_subjects` (
  `dep_id` tinyint(3) UNSIGNED NOT NULL,
  `subj_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `depts_subjects`
--

INSERT INTO `depts_subjects` (`dep_id`, `subj_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 1),
(3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id` int(11) NOT NULL,
  `subj_id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `allowed_time` time DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `degree` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`id`, `subj_id`, `name`, `allowed_time`, `start_date`, `end_date`, `degree`) VALUES
(1, 1, 'exam 1', '01:00:00', '2020-08-07', '2021-01-01', 13);

-- --------------------------------------------------------

--
-- Table structure for table `exams_questions`
--

CREATE TABLE `exams_questions` (
  `exam_id` int(11) NOT NULL,
  `que_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `exams_questions`
--

INSERT INTO `exams_questions` (`exam_id`, `que_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `exams_students`
--

CREATE TABLE `exams_students` (
  `exam_id` int(11) NOT NULL,
  `stud_id` int(11) NOT NULL,
  `time_taken` time DEFAULT NULL,
  `degree` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `exams_students`
--

INSERT INTO `exams_students` (`exam_id`, `stud_id`, `time_taken`, `degree`) VALUES
(1, 4, NULL, '9 out of 13');

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE `levels` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`id`, `name`) VALUES
(1, 'level 1'),
(2, 'level 2'),
(3, 'level 3'),
(4, 'level 4');

-- --------------------------------------------------------

--
-- Table structure for table `professors`
--

CREATE TABLE `professors` (
  `id` int(11) NOT NULL,
  `fname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `dep_id` tinyint(3) UNSIGNED DEFAULT NULL,
  `password` text,
  `email` varchar(50) DEFAULT NULL,
  `role` enum('admin','general') DEFAULT 'general',
  `registeration_type` enum('approved','not approved') DEFAULT 'not approved'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `professors`
--

INSERT INTO `professors` (`id`, `fname`, `lname`, `dep_id`, `password`, `email`, `role`, `registeration_type`) VALUES
(1, 'salwa', 'mohammed', 1, '$2y$10$8hFVPQ8oSouUBu5Kg55TsuVlM9pp8j/jgLMTeXx8zSiZZnhy7EtvC', 'salwa@gmail.com', 'admin', 'approved'),
(2, 'mariam', 'ahmed', 1, '$2y$10$dJbojEMMY85Gd4VuT3pKqe0.Yx61/nmbhgo4NVEw3a1VVrRMoYSd6', 'mariam@gmail.com', 'general', 'not approved');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `question` text,
  `type` enum('MCQ','T&F') DEFAULT NULL,
  `category` enum('A','B','C') DEFAULT NULL,
  `correct_answer` text,
  `degree` int(11) DEFAULT NULL,
  `chap_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`, `type`, `category`, `correct_answer`, `degree`, `chap_id`) VALUES
(1, 'PLAYERUNKNOWN\'S BATTLEGROUNDS, BATTLEFIELD 4 AND DARK SOULS ARE EXAMPLES OF ', 'MCQ', 'A', 'INFOTAINMENT', 1, 1),
(2, 'SERVICE LOCATION , SUPPORT MULTIMEDIA APPLICATION AND HANDLE LARGE VARIATION IN TRANSIMISSION ARE LOCATED IN ', 'MCQ', 'B', 'Application layer', 2, 1),
(3, 'device location and handover between different networks are located in ', 'MCQ', 'B', 'Network layer', 2, 1),
(4, 'One of the most commonly used MAC schemes for Wired networks is', 'MCQ', 'B', 'CSMA/CD', 2, 2),
(5, 'A host cannot change its IP address without terminating on going sessions and restarting them after it acquires new address ', 'T&F', 'B', 'true', 2, 3),
(6, 'If a higher layer requests a service the WDP cannot fulfil .An Error Code is returned indicating the reason for the error to the higher layer ', 'T&F', 'B', 'true', 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `fName` varchar(50) DEFAULT NULL,
  `lName` varchar(50) DEFAULT NULL,
  `level_id` tinyint(3) UNSIGNED NOT NULL,
  `password` text,
  `email` varchar(50) DEFAULT NULL,
  `dep_id` tinyint(3) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `fName`, `lName`, `level_id`, `password`, `email`, `dep_id`) VALUES
(1, 'sawsan', 'hamdy', 1, '123', 'saw@mail.com', 5),
(2, 'fawzia', 'mohammed', 2, '1234', 'faw@mail.com', 1),
(3, 'sondos', 'salem', 2, '$2y$10$NEFQy/tbaRrfFIaQbPqgIePS3A4CRsmaQsPxm8.YlPYYvd/LvisBi', 'son@gmail.com', 2),
(4, 'soraia', 'samy', 4, '$2y$10$YSMzarSuIfPmsvR7qxLMBOSRz5OIjcPaZgCwAlNRH6Uy2UF6syIJO', 'soraia@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `level_id` tinyint(3) UNSIGNED DEFAULT NULL,
  `prof_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `level_id`, `prof_id`) VALUES
(1, 'mobile and wireless computing', 4, 2),
(2, 'human computer interaction', 4, NULL),
(3, 'software project management', 4, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chapters`
--
ALTER TABLE `chapters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subj_id` (`subj_id`);

--
-- Indexes for table `choices`
--
ALTER TABLE `choices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `que_id` (`que_id`);

--
-- Indexes for table `depts`
--
ALTER TABLE `depts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `name_2` (`name`);

--
-- Indexes for table `depts_levels`
--
ALTER TABLE `depts_levels`
  ADD PRIMARY KEY (`dep_id`,`level_id`),
  ADD KEY `level_id` (`level_id`);

--
-- Indexes for table `depts_subjects`
--
ALTER TABLE `depts_subjects`
  ADD PRIMARY KEY (`dep_id`,`subj_id`),
  ADD KEY `subj_id` (`subj_id`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subj_id` (`subj_id`);

--
-- Indexes for table `exams_questions`
--
ALTER TABLE `exams_questions`
  ADD PRIMARY KEY (`exam_id`,`que_id`),
  ADD KEY `que_id` (`que_id`);

--
-- Indexes for table `exams_students`
--
ALTER TABLE `exams_students`
  ADD PRIMARY KEY (`exam_id`,`stud_id`),
  ADD KEY `stud_id` (`stud_id`);

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `professors`
--
ALTER TABLE `professors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `dep_id` (`dep_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chap_id` (`chap_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `level_id` (`level_id`),
  ADD KEY `dep_id` (`dep_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `level_id` (`level_id`),
  ADD KEY `prof_id` (`prof_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chapters`
--
ALTER TABLE `chapters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `choices`
--
ALTER TABLE `choices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `depts`
--
ALTER TABLE `depts`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `professors`
--
ALTER TABLE `professors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `chapters`
--
ALTER TABLE `chapters`
  ADD CONSTRAINT `chapters_ibfk_1` FOREIGN KEY (`subj_id`) REFERENCES `subjects` (`id`);

--
-- Constraints for table `choices`
--
ALTER TABLE `choices`
  ADD CONSTRAINT `choices_ibfk_1` FOREIGN KEY (`que_id`) REFERENCES `questions` (`id`);

--
-- Constraints for table `depts_levels`
--
ALTER TABLE `depts_levels`
  ADD CONSTRAINT `depts_levels_ibfk_1` FOREIGN KEY (`dep_id`) REFERENCES `depts` (`id`),
  ADD CONSTRAINT `depts_levels_ibfk_2` FOREIGN KEY (`level_id`) REFERENCES `levels` (`id`);

--
-- Constraints for table `depts_subjects`
--
ALTER TABLE `depts_subjects`
  ADD CONSTRAINT `depts_subjects_ibfk_1` FOREIGN KEY (`dep_id`) REFERENCES `depts` (`id`),
  ADD CONSTRAINT `depts_subjects_ibfk_2` FOREIGN KEY (`subj_id`) REFERENCES `subjects` (`id`);

--
-- Constraints for table `exams`
--
ALTER TABLE `exams`
  ADD CONSTRAINT `exams_ibfk_1` FOREIGN KEY (`subj_id`) REFERENCES `subjects` (`id`);

--
-- Constraints for table `exams_questions`
--
ALTER TABLE `exams_questions`
  ADD CONSTRAINT `exams_questions_ibfk_1` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`id`),
  ADD CONSTRAINT `exams_questions_ibfk_2` FOREIGN KEY (`que_id`) REFERENCES `questions` (`id`);

--
-- Constraints for table `exams_students`
--
ALTER TABLE `exams_students`
  ADD CONSTRAINT `exams_students_ibfk_1` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`id`),
  ADD CONSTRAINT `exams_students_ibfk_2` FOREIGN KEY (`stud_id`) REFERENCES `students` (`id`);

--
-- Constraints for table `professors`
--
ALTER TABLE `professors`
  ADD CONSTRAINT `professors_ibfk_1` FOREIGN KEY (`dep_id`) REFERENCES `depts` (`id`);

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`chap_id`) REFERENCES `chapters` (`id`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`level_id`) REFERENCES `levels` (`id`),
  ADD CONSTRAINT `students_ibfk_2` FOREIGN KEY (`dep_id`) REFERENCES `depts` (`id`);

--
-- Constraints for table `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `subjects_ibfk_2` FOREIGN KEY (`level_id`) REFERENCES `levels` (`id`),
  ADD CONSTRAINT `subjects_ibfk_3` FOREIGN KEY (`prof_id`) REFERENCES `professors` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
