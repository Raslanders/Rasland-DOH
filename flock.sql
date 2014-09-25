-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2014 at 02:11 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `flock`
--
CREATE DATABASE IF NOT EXISTS `flock` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `flock`;

-- --------------------------------------------------------

--
-- Table structure for table `flights`
--

CREATE TABLE IF NOT EXISTS `flights` (
  `FlightNumber` varchar(10) NOT NULL,
  `DepartureTime` varchar(30) NOT NULL,
  `GateNumber` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flights`
--

INSERT INTO `flights` (`FlightNumber`, `DepartureTime`, `GateNumber`) VALUES
('X', '11:54', 'D10'),
('A', '7:20', 'D65');

-- --------------------------------------------------------

--
-- Table structure for table `matches`
--

CREATE TABLE IF NOT EXISTS `matches` (
  `uid1` varchar(20) NOT NULL,
  `uid2` varchar(20) NOT NULL,
  `color` varchar(50) NOT NULL,
  `poleName` varchar(20) NOT NULL,
  `matchNumber` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matches`
--

INSERT INTO `matches` (`uid1`, `uid2`, `color`, `poleName`, `matchNumber`) VALUES
('54235c3cb4c2b', '54235c4d03bb5', 'orange', 'A', 571),
('54235c7dc9d00', '54235c86c0c01', 'red', 'A', 517);

-- --------------------------------------------------------

--
-- Table structure for table `persons`
--

CREATE TABLE IF NOT EXISTS `persons` (
  `id` varchar(20) NOT NULL,
  `Goal` int(11) NOT NULL,
  `Flightnumber` varchar(10) NOT NULL,
  `CheckedIn` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `persons`
--

INSERT INTO `persons` (`id`, `Goal`, `Flightnumber`, `CheckedIn`) VALUES
('54235c3cb4c2b', 0, 'X', 1),
('54235c4d03bb5', 0, 'X', 1),
('54235c7dc9d00', 2, 'A', 1),
('54235c86c0c01', 2, 'A', 1);

-- --------------------------------------------------------

--
-- Table structure for table `poles`
--

CREATE TABLE IF NOT EXISTS `poles` (
  `polename` varchar(11) NOT NULL,
  `color` varchar(20) NOT NULL,
  `matches` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `poles`
--

INSERT INTO `poles` (`polename`, `color`, `matches`) VALUES
('A', 'orange', 1),
('A', 'red', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
