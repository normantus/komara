-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 08, 2018 at 12:07 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `satitbdg`
--
CREATE DATABASE `db_komara` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `db_komara`;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `nik` varchar(8) NOT NULL,
  `description` varchar(100) NOT NULL,
  KEY `nik` (`nik`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`nik`, `description`) VALUES
('', 'Administrator'),
('', 'General User');

-- --------------------------------------------------------

--
-- Table structure for table `log_login_attempts`
--

CREATE TABLE IF NOT EXISTS `log_login_attempts` (
  `id` int(15) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `date` date DEFAULT NULL,
  `time` time NOT NULL,
  PRIMARY KEY (`id`),
  KEY `login` (`login`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=72 ;

--
-- Dumping data for table `log_login_attempts`
--


CREATE TABLE IF NOT EXISTS `log_transaksi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nik` varchar(8) CHARACTER SET utf8 NOT NULL,
  `time` datetime NOT NULL,
  ` preliminary_data` text CHARACTER SET utf8 NOT NULL,
  `new_data` text CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`),
  KEY `nik` (`nik`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `log_transaksi`
--

-------------------------------------

--
-- Table structure for table `ms_user`
--

CREATE TABLE IF NOT EXISTS `ms_user` (
  `nik` varchar(8) CHARACTER SET utf8 NOT NULL,
  `first_name` varchar(20) CHARACTER SET utf8 NOT NULL,
  `last_name` varchar(20) CHARACTER SET utf8 NOT NULL,
  `pass` varchar(255) CHARACTER SET utf8 NOT NULL,
  `pin` varchar(255) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `jabatan` varchar(30) CHARACTER SET utf8 NOT NULL,
  `dept` varchar(75) CHARACTER SET utf8 NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `q1` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `a1` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `q2` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `a2` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `phone` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `photo` varchar(12) CHARACTER SET utf8 DEFAULT 'avatar.png',
  PRIMARY KEY (`nik`),
  UNIQUE KEY `nik` (`nik`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ms_user`
--

INSERT INTO `ms_user` (`nik`, `first_name`, `last_name`, `pass`, `pin`, `email`, `jabatan`, `dept`, `last_login`, `ip_address`, `active`, `q1`, `a1`, `q2`, `a2`, `phone`, `photo`) VALUES
('15044327', 'Adzie', 'Kusumah', '25d55ad283aa400af464c76d713c07ad', 'e10adc3949ba59abbe56e057f20f883e', 'sat_itbg1@sat.co.id', 'Officer', 'IT', '2018-01-25 15:45:55', '10.234.78.185', 1, NULL, NULL, NULL, NULL, NULL, '15044327.png'),
('15011218', 'Norman', 'Nurbahar', 'd27d320c27c3033b7883347d8beca317', 'bad233ec022d3a9cdd6f54aa09c3f3d4', 'normannurbahr@gmail.com', 'Officer', 'IT', '2018-02-08 11:34:33', '10.234.78.223', 1, NULL, NULL, NULL, NULL, NULL, 'avatar.png');

-- --------------------------------------------------------

--
-- Table structure for table `tx_problem_branch`
--

--
-- Dumping data for table `tx_problem_branch`
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
