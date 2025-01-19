-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2025 at 02:09 AM
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buildings`
--
ALTER TABLE `buildings`
  ADD PRIMARY KEY (`buildingID`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`roomID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buildings`
--
ALTER TABLE `buildings`
  MODIFY `buildingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `roomID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
