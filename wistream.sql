-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2013 at 02:55 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `wistream`
--
CREATE DATABASE IF NOT EXISTS `wistream` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `wistream`;

-- --------------------------------------------------------

--
-- Table structure for table `accts`
--

CREATE TABLE IF NOT EXISTS `accts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uname` text NOT NULL,
  `pwd` text NOT NULL,
  `type` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `accts`
--

INSERT INTO `accts` (`id`, `uname`, `pwd`, `type`) VALUES
(3, 'admin', 'ewere', 0);

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE IF NOT EXISTS `content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `dnt` text NOT NULL,
  `category` text NOT NULL,
  `views` int(11) NOT NULL,
  `photo` text NOT NULL,
  `phototwo` text NOT NULL,
  `photothree` text NOT NULL,
  `shorturl` text NOT NULL,
  `uname` text NOT NULL,
  `dealer` text NOT NULL,
  `caruse` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `shrturl` (`shorturl`(30))
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1221 ;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`id`, `title`, `content`, `dnt`, `category`, `views`, `photo`, `phototwo`, `photothree`, `shorturl`, `uname`, `dealer`, `caruse`) VALUES
(1216, 'Koka Motors', '11, Ajingbolo Street, Surulere Lagos', '11-07-2013 01:35:19 pm', 'dealers', 0, '23531262551df17b5e401a.jpg', '', '', 'koka-motors', 'admin', '', ''),
(1214, 'Zappati Nigeria Limited', '5 Lakuna Street, Ugbowo Lagos Road\r\nPhone: 08076651231', '11-07-2013 01:16:53 pm', 'dealers', 0, '7461270151df14a01652c.jpg', '', '', 'zappati-nigeria-limited', 'admin', '', ''),
(1215, 'Coscharis Nigeria Limited', '11, Sakponba Road Benin City. Tel: 07060495588', '11-07-2013 01:32:06 pm', 'dealers', 0, '14991623551df1665effaf.jpg', '', '', 'coscharis-nigeria-limited', 'admin', '', ''),
(1220, '2006 Toyota Camry', 'This car is simply gbasky', '11-07-2013 02:29:11 pm', 'cars', 0, '109027451951df23d11da39.jpg', '92837076951df23d11da3e.jpg', '120114425351df23d11da42.jpg', '2006-toyota-camry', 'admin', 'zappati-nigeria-limited', 'new');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
