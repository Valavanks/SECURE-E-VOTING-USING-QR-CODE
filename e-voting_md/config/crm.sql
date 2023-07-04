-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 26, 2014 at 10:15 AM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `crm`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `aid` int(11) NOT NULL auto_increment,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `landline` bigint(20) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `fax` bigint(20) NOT NULL,
  `website` varchar(250) NOT NULL,
  `details` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY  (`aid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`aid`, `fname`, `lname`, `landline`, `mobile`, `email`, `address`, `fax`, `website`, `details`, `image`) VALUES
(1, 'gdg', 'gfdg', 0, 0, '', '', 0, '', 'details', ''),
(2, '', 'gfdg', 0, 0, '', '', 0, '', '', ''),
(3, '', '', 0, 0, '', '', 0, '', '', ''),
(4, '', '', 0, 0, '', '', 0, '', '', ''),
(5, 'guitar7.jpg', '', 0, 0, '', '', 0, '', '', 'guitar7.jpg'),
(6, 'guitar7.jpg', '', 0, 0, '', '', 0, '', '', 'guitar7.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `cid` int(11) NOT NULL auto_increment,
  `type` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `time` varchar(100) NOT NULL,
  `subject` bigint(100) NOT NULL,
  `message` varchar(250) NOT NULL,
  `reply` varchar(255) NOT NULL,
  PRIMARY KEY  (`cid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`cid`, `type`, `name`, `mobile`, `time`, `subject`, `message`, `reply`) VALUES
(1, 'incoming', 'gfg', 0, '', 0, '', ''),
(2, 'outgoing', '', 0, '', 0, '', ''),
(3, 'outgoing', 'ssa', 0, '11:30', 0, 'gsdfgs', 'gsdf');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `eid` int(11) NOT NULL auto_increment,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `landline` bigint(20) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `fax` bigint(20) NOT NULL,
  `edu` varchar(250) NOT NULL,
  `salary` int(11) NOT NULL,
  `remark` varchar(250) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY  (`eid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`eid`, `fname`, `lname`, `landline`, `mobile`, `email`, `address`, `fax`, `edu`, `salary`, `remark`, `image`) VALUES
(1, '', '', 0, 0, '', '', 0, '', 0, '', ''),
(2, '', '', 0, 0, '', '', 0, '', 0, '', ''),
(3, 'grdstgrest', '', 0, 0, '', '', 0, '', 0, '', ''),
(4, 'fdstrt', '', 0, 0, '', '', 0, '', 0, '', ''),
(5, '', '', 0, 0, '', '', 0, '', 0, '', 'guitar7.jpg'),
(6, '', '', 0, 0, '', '', 0, '', 0, '', 'guitar7.jpg'),
(7, '', '', 0, 0, '', '', 0, '', 0, '', 'guitar7.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

CREATE TABLE `material` (
  `mid` int(11) NOT NULL auto_increment,
  `image` varchar(255) NOT NULL,
  `proname` varchar(100) NOT NULL,
  `stock` int(11) NOT NULL,
  PRIMARY KEY  (`mid`),
  KEY `email` (`stock`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `material`
--

INSERT INTO `material` (`mid`, `image`, `proname`, `stock`) VALUES
(1, '', 'hhgh', 0),
(2, '', 'gg', 0),
(3, '', 'ttryr', 0),
(4, '', '', 5),
(5, 'Chrysanthemum.jpg', '', 0),
(6, 'Chrysanthemum.jpg', '', 0),
(7, '21.jpg', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `visitor`
--

CREATE TABLE `visitor` (
  `vid` int(11) NOT NULL auto_increment,
  `name` varchar(50) NOT NULL,
  `timein` varchar(200) NOT NULL,
  `timeout` varchar(200) NOT NULL,
  `purpose` varchar(150) NOT NULL,
  `detail` varchar(255) NOT NULL,
  PRIMARY KEY  (`vid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `visitor`
--

INSERT INTO `visitor` (`vid`, `name`, `timein`, `timeout`, `purpose`, `detail`) VALUES
(1, 'gfdsd', '', '', '', ''),
(2, 'd', '1:00', '2:00', 'Hai...', 'bhuh');
