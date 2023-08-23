-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 06, 2022 at 11:16 PM
-- Server version: 5.7.40
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rhamberg_projectdb`
--
CREATE DATABASE IF NOT EXISTS `rhamberg_projectdb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `rhamberg_projectdb`;

-- --------------------------------------------------------

--
-- Table structure for table `Answers`
--

CREATE TABLE `Answers` (
  `answerID` tinyint(4) NOT NULL,
  `answerBody` varchar(150) NOT NULL,
  `tutorid` varchar(50) DEFAULT NULL,
  `questionbody` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Answers`
--

INSERT INTO `Answers` (`answerID`, `answerBody`, `tutorid`, `questionbody`) VALUES
(12, 'jackson', NULL, 'What is your name?'),
(14, 'its working now', NULL, 'please work'),
(15, 'nothing much how was class', NULL, 'whats up zuude?'),
(16, 'Hello people', NULL, 'Hi jackson'),
(18, 'Yes its a very good website', NULL, 'Do you use W3schools?');

-- --------------------------------------------------------

--
-- Table structure for table `Appointments`
--

CREATE TABLE `Appointments` (
  `appointmentID` int(10) NOT NULL,
  `tutoremail` varchar(50) DEFAULT NULL,
  `studentemail` varchar(50) DEFAULT NULL,
  `scheduledtime` datetime DEFAULT NULL,
  `studentconfirmation` tinyint(4) DEFAULT NULL,
  `tutorconfirmation` tinyint(4) DEFAULT NULL,
  `appointmentsdescription` varchar(1000) DEFAULT NULL,
  `classid` smallint(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Appointments`
--

INSERT INTO `Appointments` (`appointmentID`, `tutoremail`, `studentemail`, `scheduledtime`, `studentconfirmation`, `tutorconfirmation`, `appointmentsdescription`, `classid`) VALUES
(1, 'gregt@vt.edu', 'jolyear@vt.edu', '2023-04-02 08:30:00', 0, 0, 'HW Review', 3),
(2, 'juliay@vt.edu', 'lchelena@vt.edu', '2023-02-18 17:00:00', 0, 0, 'Setting up MySQL', 6);

-- --------------------------------------------------------

--
-- Table structure for table `Classes`
--

CREATE TABLE `Classes` (
  `classID` smallint(5) NOT NULL,
  `department` varchar(5) NOT NULL,
  `courseNumber` smallint(4) NOT NULL,
  `teacher` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Classes`
--

INSERT INTO `Classes` (`classID`, `department`, `courseNumber`, `teacher`) VALUES
(1, 'BIT', 4444, 'Wang'),
(2, 'BIT', 3444, 'Raman'),
(3, 'MKTG', 3104, 'Hurly'),
(4, 'MKTG', 3164, 'James'),
(5, 'MKTG', 3504, 'Ruth'),
(6, 'BIT', 3524, 'Aljafari'),
(7, 'MGT', 3604, 'Kemp'),
(8, 'MGT', 3614, 'Simpson'),
(9, 'MGT', 2104, 'Bluey');

-- --------------------------------------------------------

--
-- Table structure for table `Questions`
--

CREATE TABLE `Questions` (
  `questionbody` varchar(150) NOT NULL,
  `questionid` varchar(50) NOT NULL,
  `studentid` varchar(50) DEFAULT NULL,
  `numberofupvotes` mediumint(45) DEFAULT '0',
  `inappropriate` tinyint(4) DEFAULT NULL,
  `whyinappropriate` varchar(150) DEFAULT NULL,
  `coursenumber` smallint(4) DEFAULT NULL,
  `numberofdownvotes` mediumint(45) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Questions`
--

INSERT INTO `Questions` (`questionbody`, `questionid`, `studentid`, `numberofupvotes`, `inappropriate`, `whyinappropriate`, `coursenumber`, `numberofdownvotes`) VALUES
('Do you use W3schools?', 'coding', NULL, 7, NULL, NULL, 4444, 0),
('Hi jackson', 'Its me', NULL, 11, NULL, NULL, 3104, -4),
('please work', 'Questions', NULL, 2, NULL, NULL, 4444, 0),
('What is your name?', 'name', NULL, 3, NULL, NULL, 4444, 0),
('whats up zuude?', 'lol', NULL, 3, NULL, NULL, 3504, -2);

-- --------------------------------------------------------

--
-- Table structure for table `Student`
--

CREATE TABLE `Student` (
  `studentemail` varchar(50) NOT NULL,
  `studentname` varchar(100) DEFAULT NULL,
  `studentpwrd` varchar(8) DEFAULT NULL,
  `class1` smallint(5) DEFAULT NULL,
  `class2` smallint(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Student`
--

INSERT INTO `Student` (`studentemail`, `studentname`, `studentpwrd`, `class1`, `class2`) VALUES
('ibh@vt.edu', 'Ipshita Bhatnagar', 'tyui', 1, 2),
('ibhatnagar@vt.edu', 'Ipshita', 'tyui', 7, 4),
('joleyar@vt.edu', NULL, NULL, NULL, NULL),
('jolyear@vt.edu', 'Jackson', 'ghjk', 1, 3),
('lchelena@vt.edu', 'Lauren', 'qwer', 6, 5),
('rmhamberger@vt.edu', 'Robbie', 'zxcv', 8, 2);

-- --------------------------------------------------------

--
-- Table structure for table `Tutor`
--

CREATE TABLE `Tutor` (
  `tutoremail` varchar(50) NOT NULL,
  `tutorname` varchar(100) DEFAULT NULL,
  `tutorpwd` varchar(8) DEFAULT NULL,
  `tutorrating` int(10) DEFAULT NULL,
  `class1` smallint(5) DEFAULT NULL,
  `class2` smallint(5) DEFAULT NULL,
  `numberofmeetings` mediumint(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Tutor`
--

INSERT INTO `Tutor` (`tutoremail`, `tutorname`, `tutorpwd`, `tutorrating`, `class1`, `class2`, `numberofmeetings`) VALUES
('frankb@vt.edu', 'Frank', '12as', 79, 5, 7, 0),
('gregt@vt.edu', 'Greg', '12qw', 93, 2, 3, 1),
('ibhat@vt.edu', 'Ips', 'tyui', 0, 2, 8, 0),
('ibhatt@vt.edu', 'Ipsh', 'tyui', 0, 8, 7, 0),
('jdoe@vt.edu', 'Jane', 'asdf', 80, 1, 8, 0),
('juliay@vt.edu', 'Julia', '12zx', 100, 6, 4, 1),
('samb@vt.edu', 'Sam', '12er', 85, 9, 2, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Answers`
--
ALTER TABLE `Answers`
  ADD PRIMARY KEY (`answerID`),
  ADD KEY `tutoremailid_idx` (`tutorid`),
  ADD KEY `question_idx` (`questionbody`);

--
-- Indexes for table `Appointments`
--
ALTER TABLE `Appointments`
  ADD PRIMARY KEY (`appointmentID`),
  ADD KEY `tutoremail_idx` (`tutoremail`),
  ADD KEY `studentemail_idx` (`studentemail`),
  ADD KEY `class_idx` (`classid`);

--
-- Indexes for table `Classes`
--
ALTER TABLE `Classes`
  ADD PRIMARY KEY (`classID`,`courseNumber`);

--
-- Indexes for table `Questions`
--
ALTER TABLE `Questions`
  ADD PRIMARY KEY (`questionbody`,`questionid`),
  ADD KEY `course_idx` (`coursenumber`),
  ADD KEY `studentid_idx` (`studentid`);

--
-- Indexes for table `Student`
--
ALTER TABLE `Student`
  ADD PRIMARY KEY (`studentemail`),
  ADD KEY `class1_idx` (`class1`),
  ADD KEY `class2_idx` (`class2`),
  ADD KEY `classid1_idx` (`class1`);

--
-- Indexes for table `Tutor`
--
ALTER TABLE `Tutor`
  ADD PRIMARY KEY (`tutoremail`),
  ADD KEY `class1_idx` (`class1`),
  ADD KEY `class2_idx` (`class2`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Answers`
--
ALTER TABLE `Answers`
  MODIFY `answerID` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Answers`
--
ALTER TABLE `Answers`
  ADD CONSTRAINT `question` FOREIGN KEY (`questionbody`) REFERENCES `Questions` (`questionbody`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tutoremailid` FOREIGN KEY (`tutorid`) REFERENCES `Tutor` (`tutoremail`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Appointments`
--
ALTER TABLE `Appointments`
  ADD CONSTRAINT `class` FOREIGN KEY (`classid`) REFERENCES `Classes` (`classID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `studentemail` FOREIGN KEY (`studentemail`) REFERENCES `Student` (`studentemail`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tutoremail` FOREIGN KEY (`tutoremail`) REFERENCES `Tutor` (`tutoremail`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Questions`
--
ALTER TABLE `Questions`
  ADD CONSTRAINT `studentid` FOREIGN KEY (`studentid`) REFERENCES `Student` (`studentemail`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Student`
--
ALTER TABLE `Student`
  ADD CONSTRAINT `classid1` FOREIGN KEY (`class1`) REFERENCES `Classes` (`classID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `classid2` FOREIGN KEY (`class2`) REFERENCES `Classes` (`classID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Tutor`
--
ALTER TABLE `Tutor`
  ADD CONSTRAINT `class1` FOREIGN KEY (`class1`) REFERENCES `Classes` (`classID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `class2` FOREIGN KEY (`class2`) REFERENCES `Classes` (`classID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
