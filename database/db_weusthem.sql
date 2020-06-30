-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 30, 2020 at 08:59 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_weusthem`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contacts`
--

DROP TABLE IF EXISTS `tbl_contacts`;
CREATE TABLE IF NOT EXISTS `tbl_contacts` (
  `contact_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `profile_pic` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(10) NOT NULL,
  PRIMARY KEY (`contact_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_contacts`
--

INSERT INTO `tbl_contacts` (`contact_id`, `user_id`, `profile_pic`, `first_name`, `last_name`, `email`, `phone`) VALUES
(15, 2, 'image001 (1).png', 'ddfvwsfvc', 'vdsavdsv', 'sadvsvd@fndejksnv', '00000'),
(10, 1, 'claudio-trigueros-gF7hhMIC3vo-unsplash.jpg', 'Guilherme', 'Da Silva', 'guilhermebueno6@gmail.com', '2263789190'),
(13, 2, 'WhatsApp Image 2020-06-12 at 9.48.57 PM.jpeg', 'arthur', 'bueno', 'arthur@arthur', '123456'),
(12, 2, 'B.jpg', 'gigi', '`gioejkw', 'fjdlkw@gmk', ';qbn;'),
(6, 1, 'WhatsApp Image 2020-06-12 at 9.48.57 PM.jpeg', 'Arthur', 'Da Silva', 'guilhermebueno6@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_ip` varchar(45) DEFAULT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_pass` varchar(15) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_ip`, `user_name`, `user_pass`) VALUES
(1, '::1', 'foo', 'bar'),
(2, '::1', 'gui', '123');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
