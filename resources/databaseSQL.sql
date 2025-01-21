-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2025 at 10:46 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `openbook`
--
CREATE DATABASE IF NOT EXISTS `openbook` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `openbook`;

-- --------------------------------------------------------

--
-- Table structure for table `adminusers`
--

CREATE TABLE `adminusers` (
  `user_id` int(11) NOT NULL,
  `department` varchar(255) NOT NULL,
  `adminType` enum('Department','University','Super') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `appointmentID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `roomID` int(11) NOT NULL,
  `date` date NOT NULL,
  `timeSlot` time NOT NULL,
  `paid` tinyint(1) NOT NULL,
  `cancelled` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `board`
--

CREATE TABLE `board` (
  `whiteboardID` int(11) NOT NULL,
  `equipmentID` int(11) NOT NULL,
  `smart` tinyint(1) NOT NULL,
  `height` float NOT NULL,
  `width` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `buildings`
--

CREATE TABLE `buildings` (
  `buildingID` int(11) NOT NULL,
  `buildingName` varchar(255) NOT NULL,
  `buildingDesc` text DEFAULT NULL,
  `buildingImg` text DEFAULT NULL,
  `numbOfRooms` int(11) DEFAULT NULL,
  `levels` int(11) NOT NULL,
  `helpline` varchar(255) DEFAULT NULL,
  `streetName` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `postCode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `buildings`
--

INSERT INTO `buildings` (`buildingID`, `buildingName`, `buildingDesc`, `buildingImg`, `numbOfRooms`, `levels`, `helpline`, `streetName`, `city`, `postCode`) VALUES
(1, 'Millenium Point', 'Located in the heart of the city centre, this lively and bright building would be a great choice for those looking for a private and quiet place to meet with their team.', 'public_html/images/mp-exterior.jpeg', NULL, 4, '012148578289', 'Millennium Point, Curzon St', 'Birmingham', 'B4 7AP'),
(2, 'Parkside Building', 'The twin building of Millenium Point contains a lot of equipment for those studying or interested in the arts such as Music and painting.', 'public_html/images/parkside-gallery.jpeg', NULL, 4, '012148578289', 'Parkside, Cardigan St', 'Birmingham', 'B4 7RJ'),
(3, 'Curzon Building', 'This lively and cozy building would be a great choice for those looking for a private and quiet place to meet with their team. With access to a great library and many in-building services.', 'public_html/images/curson-slider.jpeg', NULL, 4, '012148578289', 'Millennium Point, Curzon St', 'Birmingham', 'B4 7AP'),
(4, 'Steam House', 'This cutting-edge building contains all the equipment a modern team would require to make the most out of their meetings.', 'public_html/images/steamhouse-exterior.jpeg', NULL, 4, '021489421738', 'Belmont Row', 'Birmingham', 'B4 7RQ');

-- --------------------------------------------------------

--
-- Table structure for table `computers`
--

CREATE TABLE `computers` (
  `computerID` int(11) NOT NULL,
  `equipmentID` int(11) NOT NULL,
  `dGPU` tinyint(1) NOT NULL,
  `VMcapable` tinyint(1) NOT NULL,
  `operatingSystem` enum('MacOS','Windows','Linux') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `computers`
--

INSERT INTO `computers` (`computerID`, `equipmentID`, `dGPU`, `VMcapable`, `operatingSystem`) VALUES
(1, 1, 1, 1, 'Windows'),
(2, 2, 1, 1, 'Windows'),
(3, 3, 1, 1, 'Windows'),
(4, 4, 1, 1, 'Windows'),
(5, 5, 1, 1, 'Windows'),
(6, 6, 1, 1, 'Windows'),
(7, 7, 0, 0, 'Windows');

-- --------------------------------------------------------

--
-- Table structure for table `computer_software`
--

CREATE TABLE `computer_software` (
  `computerID` int(11) NOT NULL,
  `softwareID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `computer_software`
--

INSERT INTO `computer_software` (`computerID`, `softwareID`) VALUES
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
(5, 2),
(5, 3),
(5, 4),
(6, 2),
(6, 3),
(6, 4);

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE `equipment` (
  `equipmentID` int(11) NOT NULL,
  `model` varchar(255) NOT NULL,
  `designatedRoom` int(11) NOT NULL,
  `status` enum('Operational','Maintenance','Non-Functional') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`equipmentID`, `model`, `designatedRoom`, `status`) VALUES
(1, 'Lenovo ThinkStation P620 Tower', 1, 'Operational'),
(2, 'Lenovo ThinkStation P620 Tower', 1, 'Operational'),
(3, 'Lenovo ThinkStation P620 Tower', 1, 'Operational'),
(4, 'Lenovo ThinkStation P620 Tower', 1, 'Operational'),
(5, 'Lenovo ThinkStation P620 Tower', 1, 'Operational'),
(6, 'Lenovo ThinkStation P620 Tower', 1, 'Operational'),
(7, 'Lenovo ThinkStation P720', 3, 'Operational');

-- --------------------------------------------------------

--
-- Table structure for table `externalusers`
--

CREATE TABLE `externalusers` (
  `user_id` int(11) NOT NULL,
  `paymentType` enum('Bank','Card','Credit') DEFAULT NULL,
  `externalType` enum('Private','Enterprise') NOT NULL,
  `paymentToken` varchar(255) DEFAULT NULL,
  `paymentIndentifier` varchar(8) DEFAULT NULL,
  `paymentDate` datetime DEFAULT NULL,
  `company` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `microphone`
--

CREATE TABLE `microphone` (
  `microphoneID` int(11) NOT NULL,
  `equipmentID` int(11) NOT NULL,
  `fixed` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `roomID` int(11) NOT NULL,
  `building` int(11) NOT NULL,
  `roomName` varchar(255) NOT NULL,
  `roomDesc` text DEFAULT NULL,
  `roomImg` text DEFAULT NULL,
  `floor` int(11) NOT NULL,
  `capacity` int(11) NOT NULL,
  `roomType` enum('Classroom','Hall','Lab') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`roomID`, `building`, `roomName`, `roomDesc`, `roomImg`, `floor`, `capacity`, `roomType`) VALUES
(1, 1, 'MP242', 'A practical classroom filled with workstations, suitable for teaching any tech-related classes or supervising an online activity.', 'public_html\\images\\Mp-classroom2.jpeg', 2, 30, 'Classroom'),
(2, 1, 'MP248', 'A bright, vibrant classroom suitable for computer labs and classes.', 'public_html/images/MP-classroom.jpeg', 2, 40, 'Classroom'),
(3, 2, 'PS350', 'A medium-sized lecture hall', 'public_html/images/parkside-gallery.jpeg', 3, 150, 'Hall'),
(4, 1, 'MP162', 'A modern classroom suitable for tech-related classes.', 'public_html/images/MP-classroom.jpeg', 1, 30, 'Classroom'),
(5, 1, 'MP163', 'A modern classroom suitable for tech-related classes.', 'public_html/images/MP-classroom.jpeg', 1, 30, 'Classroom'),
(6, 3, 'CCZ455', 'A professional and quiet room with great natural lighting', 'public_html/images/curzon-classroom.jpeg', 4, 25, 'Classroom'),
(7, 3, 'C087', 'A great large hall, perfect for deliverying powerful and impactful lessons', 'public_html/images/LectureHall4.webp', 0, 200, 'Hall'),
(8, 3, 'C125', 'A computer lab, perfect for technical classes which require specialist software.', 'public_html/images/Mp-classroom2.jpeg', 1, 30, 'Classroom'),
(9, 4, 'CST302', 'A modern, sleek and bright classroom, perfect for technology courses. Fit with many outlets and a strong connection to support BYOD classes', 'public_html/images/SH-classroom3.jpg', 3, 30, 'Classroom'),
(10, 1, 'MP052', 'An Engineering lab, with specialist equipment for mechanical and electrical engineering', 'public_html/images/Lab1.webp', 0, 25, 'Lab');

-- --------------------------------------------------------

--
-- Table structure for table `software`
--

CREATE TABLE `software` (
  `softwareID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `vendor` varchar(255) NOT NULL,
  `licenceType` enum('Educational','Commercial','Perpetual') DEFAULT NULL,
  `licenceExpire` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `software`
--

INSERT INTO `software` (`softwareID`, `name`, `vendor`, `licenceType`, `licenceExpire`) VALUES
(1, 'Eclipse IDE', 'Eclipse Foundation', 'Perpetual', NULL),
(2, 'VirtualBox', 'Oracle', 'Perpetual', NULL),
(3, 'MATLAB', 'MathWorks', 'Educational', '2026-05-15'),
(4, 'Fusion360', 'Autodesk', 'Educational', '2025-11-18'),
(5, 'Unity Pro', 'Unity Technologies', 'Commercial', '2026-10-20');

-- --------------------------------------------------------

--
-- Table structure for table `universitystaff`
--

CREATE TABLE `universitystaff` (
  `user_id` int(11) NOT NULL,
  `department` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `universitystudents`
--

CREATE TABLE `universitystudents` (
  `user_id` int(11) NOT NULL,
  `studentID` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `universitystudents`
--

INSERT INTO `universitystudents` (`user_id`, `studentID`, `course`) VALUES
(1, 'S214246', 'Computer Science');

-- --------------------------------------------------------

--
-- Table structure for table `universityusers`
--

CREATE TABLE `universityusers` (
  `user_id` int(11) NOT NULL,
  `university_name` varchar(255) NOT NULL,
  `faculty` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `universityusers`
--

INSERT INTO `universityusers` (`user_id`, `university_name`, `faculty`) VALUES
(1, 'Birmingham City University', 'CEBE');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `userType` enum('University','Admin','External') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `username`, `password`, `email`, `created_at`, `firstName`, `lastName`, `userType`) VALUES
(1, 'user1', '$2y$10$wJ4nFFuC8AYmDvFuj4dCC.OiJHCUfFwvwj.wk9/TZCStm3PUJvNAq', 'test@mail.com', '2025-01-19 23:32:09', 'John', 'Doe', 'University');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminusers`
--
ALTER TABLE `adminusers`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`appointmentID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `roomID` (`roomID`);

--
-- Indexes for table `board`
--
ALTER TABLE `board`
  ADD PRIMARY KEY (`whiteboardID`),
  ADD KEY `equipmentID` (`equipmentID`);

--
-- Indexes for table `buildings`
--
ALTER TABLE `buildings`
  ADD PRIMARY KEY (`buildingID`);

--
-- Indexes for table `computers`
--
ALTER TABLE `computers`
  ADD PRIMARY KEY (`computerID`),
  ADD KEY `equipmentID` (`equipmentID`);

--
-- Indexes for table `computer_software`
--
ALTER TABLE `computer_software`
  ADD PRIMARY KEY (`computerID`,`softwareID`),
  ADD KEY `softwareID` (`softwareID`);

--
-- Indexes for table `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`equipmentID`),
  ADD KEY `designatedRoom` (`designatedRoom`);

--
-- Indexes for table `externalusers`
--
ALTER TABLE `externalusers`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `microphone`
--
ALTER TABLE `microphone`
  ADD PRIMARY KEY (`microphoneID`),
  ADD KEY `equipmentID` (`equipmentID`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`roomID`);

--
-- Indexes for table `software`
--
ALTER TABLE `software`
  ADD PRIMARY KEY (`softwareID`);

--
-- Indexes for table `universitystaff`
--
ALTER TABLE `universitystaff`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `universitystudents`
--
ALTER TABLE `universitystudents`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `universityusers`
--
ALTER TABLE `universityusers`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `appointmentID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `board`
--
ALTER TABLE `board`
  MODIFY `whiteboardID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `buildings`
--
ALTER TABLE `buildings`
  MODIFY `buildingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `computers`
--
ALTER TABLE `computers`
  MODIFY `computerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `equipment`
--
ALTER TABLE `equipment`
  MODIFY `equipmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `microphone`
--
ALTER TABLE `microphone`
  MODIFY `microphoneID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `roomID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `software`
--
ALTER TABLE `software`
  MODIFY `softwareID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adminusers`
--
ALTER TABLE `adminusers`
  ADD CONSTRAINT `adminusers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`userID`);

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`),
  ADD CONSTRAINT `appointments_ibfk_2` FOREIGN KEY (`roomID`) REFERENCES `rooms` (`roomID`);

--
-- Constraints for table `board`
--
ALTER TABLE `board`
  ADD CONSTRAINT `board_ibfk_1` FOREIGN KEY (`equipmentID`) REFERENCES `equipment` (`equipmentID`);

--
-- Constraints for table `computers`
--
ALTER TABLE `computers`
  ADD CONSTRAINT `computers_ibfk_1` FOREIGN KEY (`equipmentID`) REFERENCES `equipment` (`equipmentID`);

--
-- Constraints for table `computer_software`
--
ALTER TABLE `computer_software`
  ADD CONSTRAINT `computer_software_ibfk_1` FOREIGN KEY (`computerID`) REFERENCES `computers` (`computerID`),
  ADD CONSTRAINT `computer_software_ibfk_2` FOREIGN KEY (`softwareID`) REFERENCES `software` (`softwareID`);

--
-- Constraints for table `equipment`
--
ALTER TABLE `equipment`
  ADD CONSTRAINT `equipment_ibfk_1` FOREIGN KEY (`designatedRoom`) REFERENCES `rooms` (`roomID`);

--
-- Constraints for table `externalusers`
--
ALTER TABLE `externalusers`
  ADD CONSTRAINT `externalusers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`userID`);

--
-- Constraints for table `microphone`
--
ALTER TABLE `microphone`
  ADD CONSTRAINT `microphone_ibfk_1` FOREIGN KEY (`equipmentID`) REFERENCES `equipment` (`equipmentID`);

--
-- Constraints for table `universitystaff`
--
ALTER TABLE `universitystaff`
  ADD CONSTRAINT `universitystaff_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `universityusers` (`user_id`);

--
-- Constraints for table `universitystudents`
--
ALTER TABLE `universitystudents`
  ADD CONSTRAINT `universitystudents_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `universityusers` (`user_id`);

--
-- Constraints for table `universityusers`
--
ALTER TABLE `universityusers`
  ADD CONSTRAINT `universityusers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`userID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
