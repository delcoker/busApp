-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2014 at 11:38 PM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mobilebusapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `numofpsngers`
--

CREATE TABLE IF NOT EXISTS `numofpsngers` (
  `numofpsngersid` int(11) NOT NULL AUTO_INCREMENT,
  `onbus` int(11) NOT NULL,
  `reserved` int(11) NOT NULL,
  `totalseats` bigint(20) DEFAULT NULL,
  `lastModified` datetime NOT NULL,
  PRIMARY KEY (`numofpsngersid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `numofpsngers`
--

INSERT INTO `numofpsngers` (`numofpsngersid`, `onbus`, `reserved`, `totalseats`, `lastModified`) VALUES
(1, 15, 14, 30, '2014-09-14 21:20:48');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `role_id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `type` int(11) NOT NULL,
  `dateCreated` datetime NOT NULL,
  `lastModified` datetime NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(45) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `dob` date NOT NULL,
  `role_id` int(11) NOT NULL,
  `dateModified` varchar(45) NOT NULL,
  `dateCreated` varchar(45) NOT NULL,
  `role_role_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`role_role_id`),
  KEY `fk_user_role_idx` (`role_role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_role` FOREIGN KEY (`role_role_id`) REFERENCES `role` (`role_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
