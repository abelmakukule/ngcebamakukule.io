-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2014 at 05:20 PM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `iec_voting_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `parties`
--

CREATE TABLE IF NOT EXISTS `parties` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `EFF` varchar(50) NOT NULL,
  `IFP` varchar(50) NOT NULL,
  `DA` varchar(50) NOT NULL,
  `KISS` varchar(50) NOT NULL,
  `UDM` varchar(50) NOT NULL,
  `IPC` varchar(50) NOT NULL,
  `PAC` varchar(50) NOT NULL,
  `ANC` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `id_no` varchar(13) NOT NULL,
  `province` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `confirm_pass` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `first_name`, `last_name`, `age`, `id_no`, `province`, `email`, `password`, `confirm_pass`) VALUES
(1, 'lifa', 'devine', 24, '9512045912080', 'Gauteng', 'lifadevina@gmail.com', '123456', '123456'),
(2, 'mpo', 'kol', 24, '7894561236547', 'Gauteng', 'shaidahmasemol@ymail.com', '123456', '123456'),
(3, 'a', 'makukule', 24, '9005046169082', 'Gauteng', 'abelmakukule@gmail.com', '123456', '123456'),
(4, 'root@localhost', '', 0, '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `u_votes`
--

CREATE TABLE IF NOT EXISTS `u_votes` (
  `u_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_vote` varchar(50) NOT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
