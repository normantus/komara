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
CREATE DATABASE `satitbdg` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `satitbdg`;

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

INSERT INTO `log_login_attempts` (`id`, `ip_address`, `login`, `date`, `time`) VALUES
(2, '10.234.78.207', '15011218', '2017-11-10', '00:00:00'),
(3, '10.234.78.207', '15011218', '2017-11-10', '00:00:00'),
(4, '10.234.78.207', '15011218', '2017-11-10', '00:00:00'),
(5, '10.234.78.185', '15044327', '2017-11-11', '00:00:00'),
(6, '10.234.78.185', '15044327', '2017-11-11', '00:00:00'),
(7, '10.234.78.241', '15011218', '2017-11-11', '00:00:00'),
(8, '10.234.78.185', '15044327', '2017-11-11', '00:00:00'),
(9, '33.33.34.185', '15011218', '2017-11-11', '00:00:00'),
(10, '10.234.78.123', '15011218', '2017-11-11', '00:00:00'),
(11, '10.234.78.123', '15011218', '2017-11-11', '00:00:00'),
(12, '10.234.78.123', '15011218', '2017-11-11', '00:00:00'),
(13, '10.234.78.123', '15011218', '2017-11-11', '00:00:00'),
(14, '10.234.78.226', '15011218', '2017-11-11', '00:00:00'),
(15, '10.234.78.226', '15011218', '2017-11-11', '00:00:00'),
(16, '10.234.78.226', '15011218', '2017-11-11', '00:00:00'),
(17, '10.234.78.185', '15044327', '2017-11-12', '00:00:00'),
(18, '10.234.78.185', '15044327', '2017-11-13', '00:00:00'),
(19, '10.234.78.223', '15011218', '2017-11-14', '00:00:00'),
(20, '10.234.78.223', '15011218', '2017-11-14', '00:00:00'),
(21, '10.234.78.223', '15011218', '2017-11-14', '00:00:00'),
(22, '10.234.78.223', '15011218', '2017-11-14', '00:00:00'),
(23, '10.234.78.223', '15011218', '2017-11-14', '00:00:00'),
(24, '10.234.78.223', '15011218', '2017-11-14', '00:00:00'),
(25, '10.234.78.185', '15044327', '2017-11-14', '00:00:00'),
(26, '10.234.78.223', '15044327', '2017-11-14', '00:00:00'),
(27, '10.234.78.223', '15011218', '2017-11-14', '00:00:00'),
(28, '10.234.78.223', '15011218', '2017-11-14', '00:00:00'),
(29, '10.234.78.228', '15011218', '2017-11-14', '00:00:00'),
(30, '10.234.78.223', '15011218', '2017-11-14', '00:00:00'),
(31, '10.234.78.185', '15011218', '2017-11-15', '00:00:00'),
(32, '10.234.78.223', '15044327', '2017-11-15', '00:00:00'),
(33, '10.234.78.223', '15044327', '2017-11-15', '00:00:00'),
(34, '10.234.78.185', '15011218', '2017-11-16', '00:00:00'),
(35, '10.234.78.185', '15011218', '2017-11-16', '00:00:00'),
(36, '10.234.78.226', '15011218', '2017-11-16', '00:00:00'),
(37, '10.234.78.185', '15044327', '2017-11-17', '00:00:00'),
(38, '10.234.78.226', '15011218', '2017-11-17', '00:00:00'),
(39, '10.234.78.185', '15011218', '2017-11-20', '00:00:00'),
(40, '10.234.78.185', '15011218', '2017-11-20', '00:00:00'),
(41, '10.234.78.185', '15011218', '2017-11-20', '00:00:00'),
(42, '10.234.78.185', '15011218', '2017-11-20', '00:00:00'),
(43, '10.234.78.185', '15011218', '2017-11-20', '00:00:00'),
(44, '10.234.78.185', '15011218', '2017-11-21', '00:00:00'),
(45, '10.234.78.53', '15011218', '2017-11-21', '00:00:00'),
(46, '10.234.78.242', '15011218', '2017-11-21', '00:00:00'),
(47, '10.234.78.242', '15011218', '2017-11-21', '00:00:00'),
(48, '10.234.78.185', '15011218', '2017-11-22', '11:19:51'),
(49, '10.234.78.185', '15011218', '2017-11-22', '11:25:21'),
(50, '10.234.78.185', '15011218', '2017-11-22', '14:44:06'),
(51, '10.234.78.185', '15011218', '2017-11-22', '15:05:03'),
(52, '10.234.78.228', '15011218', '2017-11-25', '09:27:14'),
(53, '10.234.78.185', '15044327', '2017-11-25', '17:46:35'),
(54, '10.234.78.223', '15011218', '2017-11-27', '22:05:23'),
(55, '10.234.78.185', '15011218', '2017-12-05', '11:16:40'),
(56, '10.234.78.185', '15011218', '2017-12-05', '15:26:49'),
(57, '10.234.78.223', '15044327', '2017-12-13', '02:57:50'),
(58, '10.234.78.185', '15011218', '2017-12-27', '14:24:00'),
(59, '10.234.78.228', '15044327', '2018-01-02', '13:43:55'),
(60, '10.234.78.240', '15011218', '2018-01-03', '00:47:39'),
(61, '10.234.78.240', '15011218', '2018-01-03', '00:51:16'),
(62, '10.234.78.223', '15044327', '2018-01-11', '11:45:36'),
(63, '10.234.78.223', '15011218', '2018-01-23', '09:14:35'),
(64, '10.234.78.123', '15011218', '2018-01-24', '15:03:28'),
(65, '10.234.78.123', '15011218', '2018-01-24', '15:03:37'),
(66, '10.234.78.226', '15011218', '2018-01-24', '15:04:32'),
(67, '10.234.78.185', '15044327', '2018-01-25', '15:45:55'),
(68, '10.234.78.223', '15011218', '2018-02-06', '08:41:49'),
(69, '10.234.78.223', '15011218', '2018-02-07', '09:32:22'),
(70, '10.234.78.223', '15011218', '2018-02-07', '09:34:01'),
(71, '10.234.78.223', '15011218', '2018-02-08', '11:34:33');

-- --------------------------------------------------------

--
-- Table structure for table `log_transaksi`
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


-- --------------------------------------------------------

--
-- Table structure for table `ms_hw_hdd`
--

CREATE TABLE IF NOT EXISTS `ms_hw_hdd` (
  `hdd_id` varchar(4) NOT NULL,
  `size` varchar(8) NOT NULL,
  PRIMARY KEY (`hdd_id`),
  UNIQUE KEY `size` (`size`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ms_hw_hdd`
--

INSERT INTO `ms_hw_hdd` (`hdd_id`, `size`) VALUES
('HD01', '40 GB'),
('HD02', '80 GB'),
('HD03', '150 GB'),
('HD04', '160 GB');

-- --------------------------------------------------------

--
-- Table structure for table `ms_hw_merk`
--

CREATE TABLE IF NOT EXISTS `ms_hw_merk` (
  `merk_id` varchar(3) NOT NULL,
  `merk` varchar(50) NOT NULL,
  `pc` tinyint(1) NOT NULL,
  `monitor` tinyint(1) NOT NULL,
  `scanner` tinyint(1) NOT NULL,
  `printer` tinyint(1) NOT NULL,
  `ups` tinyint(1) NOT NULL,
  `modem` tinyint(1) NOT NULL,
  PRIMARY KEY (`merk_id`),
  UNIQUE KEY `merk` (`merk`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ms_hw_merk`
--

INSERT INTO `ms_hw_merk` (`merk_id`, `merk`, `pc`, `monitor`, `scanner`, `printer`, `ups`, `modem`) VALUES
('M01', 'ACER', 1, 1, 0, 0, 0, 0),
('M02', 'WEARNES', 1, 1, 0, 0, 0, 0),
('M03', 'HP', 1, 1, 0, 1, 0, 0),
('M04', 'EPSON', 0, 0, 0, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ms_hw_model`
--

CREATE TABLE IF NOT EXISTS `ms_hw_model` (
  `id` varchar(8) NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ms_hw_model`
--

INSERT INTO `ms_hw_model` (`id`, `name`) VALUES
('M01-MD01', 'VERITON L480'),
('M01-MD03', 'VERITON L480'),
('M01-MD00', 'VERITON N4640G');

-- --------------------------------------------------------

--
-- Table structure for table `ms_hw_modem`
--

CREATE TABLE IF NOT EXISTS `ms_hw_modem` (
  `modem_id` varchar(4) NOT NULL,
  `modem_model` varchar(20) NOT NULL,
  PRIMARY KEY (`modem_id`),
  UNIQUE KEY `modem_model` (`modem_model`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ms_hw_modem`
--


-- --------------------------------------------------------

--
-- Table structure for table `ms_hw_monitor`
--

CREATE TABLE IF NOT EXISTS `ms_hw_monitor` (
  `monitor_id` varchar(8) NOT NULL,
  `monitor_model` varchar(50) NOT NULL,
  PRIMARY KEY (`monitor_id`),
  UNIQUE KEY `monitor_model` (`monitor_model`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ms_hw_monitor`
--

INSERT INTO `ms_hw_monitor` (`monitor_id`, `monitor_model`) VALUES
('M02-MT01', 'CMV 633A');

-- --------------------------------------------------------

--
-- Table structure for table `ms_hw_printer`
--

CREATE TABLE IF NOT EXISTS `ms_hw_printer` (
  `printer_id` varchar(8) NOT NULL,
  `printer_model` varchar(20) NOT NULL,
  PRIMARY KEY (`printer_id`),
  UNIQUE KEY `printer_model` (`printer_model`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ms_hw_printer`
--

INSERT INTO `ms_hw_printer` (`printer_id`, `printer_model`) VALUES
('M04-PR01', 'L310'),
('M03-PR01', 'LASERJET P1102');

-- --------------------------------------------------------

--
-- Table structure for table `ms_hw_processor`
--

CREATE TABLE IF NOT EXISTS `ms_hw_processor` (
  `proc_id` varchar(4) NOT NULL,
  `proc_model` varchar(50) NOT NULL,
  PRIMARY KEY (`proc_id`),
  UNIQUE KEY `proc_model` (`proc_model`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ms_hw_processor`
--

INSERT INTO `ms_hw_processor` (`proc_id`, `proc_model`) VALUES
('PC01', 'Pentium(R) Dual-Core CPU E5400 @ 2.70GHz'),
('PC02', '');

-- --------------------------------------------------------

--
-- Table structure for table `ms_hw_ram`
--

CREATE TABLE IF NOT EXISTS `ms_hw_ram` (
  `ram_id` varchar(4) NOT NULL,
  `size` varchar(5) NOT NULL,
  PRIMARY KEY (`ram_id`),
  UNIQUE KEY `size` (`size`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ms_hw_ram`
--


-- --------------------------------------------------------

--
-- Table structure for table `ms_hw_scanner`
--

CREATE TABLE IF NOT EXISTS `ms_hw_scanner` (
  `scanner_id` varchar(4) NOT NULL,
  `scanner_model` varchar(20) NOT NULL,
  PRIMARY KEY (`scanner_id`),
  UNIQUE KEY `scanner_model` (`scanner_model`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ms_hw_scanner`
--


-- --------------------------------------------------------

--
-- Table structure for table `ms_hw_ups`
--

CREATE TABLE IF NOT EXISTS `ms_hw_ups` (
  `ups_id` varchar(8) NOT NULL,
  `ups_model` varchar(20) NOT NULL,
  PRIMARY KEY (`ups_id`),
  UNIQUE KEY `ups_model` (`ups_model`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ms_hw_ups`
--


-- --------------------------------------------------------

--
-- Table structure for table `ms_sw_app`
--

CREATE TABLE IF NOT EXISTS `ms_sw_app` (
  `app_id` varchar(6) NOT NULL,
  `app_name` varchar(50) NOT NULL,
  PRIMARY KEY (`app_id`),
  UNIQUE KEY `app_name` (`app_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ms_sw_app`
--


-- --------------------------------------------------------

--
-- Table structure for table `ms_sw_os`
--

CREATE TABLE IF NOT EXISTS `ms_sw_os` (
  `os_id` varchar(4) NOT NULL,
  `os_name` varchar(50) NOT NULL,
  PRIMARY KEY (`os_id`),
  UNIQUE KEY `os_name` (`os_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ms_sw_os`
--


-- --------------------------------------------------------

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

CREATE TABLE IF NOT EXISTS `tx_problem_branch` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `problem_name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `problem_date` date NOT NULL,
  `pic` varchar(8) CHARACTER SET utf8 NOT NULL,
  `problem_descp` text CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`),
  KEY `problem_name` (`problem_name`),
  KEY `problem_date` (`problem_date`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tx_problem_branch`
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
