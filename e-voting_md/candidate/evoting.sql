-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 15, 2020 at 10:34 AM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `evoting`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aid` int(11) NOT NULL auto_increment,
  `username` varchar(23) NOT NULL,
  `password` varchar(23) NOT NULL,
  PRIMARY KEY  (`aid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `allocate_party`
--

CREATE TABLE `allocate_party` (
  `party_id` int(11) NOT NULL auto_increment,
  `cid` int(11) NOT NULL,
  `party` varchar(233) NOT NULL,
  `symbol` varchar(255) NOT NULL,
  PRIMARY KEY  (`party_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `allocate_party`
--

INSERT INTO `allocate_party` (`party_id`, `cid`, `party`, `symbol`) VALUES
(3, 7, 'Dravida Munnetra Kazhagam(DMK)', 'bg-01.jpg'),
(4, 7, 'All India Anna Dravida Munnetra Kazhagam (AIADMK)', '21.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `condidate`
--

CREATE TABLE `condidate` (
  `cid` int(11) NOT NULL auto_increment,
  `name` varchar(233) NOT NULL,
  `fname` varchar(233) NOT NULL,
  `age` varchar(23) NOT NULL,
  `dob` varchar(233) NOT NULL,
  `gender` varchar(233) NOT NULL,
  `gname` varchar(233) NOT NULL,
  `qualification` varchar(233) NOT NULL,
  `pre_address` varchar(233) NOT NULL,
  `per_address` varchar(233) NOT NULL,
  `city` varchar(233) NOT NULL,
  `state` varchar(233) NOT NULL,
  `pincode` varchar(233) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `mobile` varchar(23) NOT NULL,
  PRIMARY KEY  (`cid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `condidate`
--

INSERT INTO `condidate` (`cid`, `name`, `fname`, `age`, `dob`, `gender`, `gname`, `qualification`, `pre_address`, `per_address`, `city`, `state`, `pincode`, `photo`, `status`, `mobile`) VALUES
(7, 'meena', 'kanagu', '23', '2020-03-13', 'male', 'cinnammal', 'bsc', 'dfds', 'sdf', 'sdf', 'Madya Pradesh', '43534', '11.JPG', 1, ''),
(8, 'dhoni', 'kanagu', '23', '2020-03-12', 'male', 'cinnammal', 'msc', 'fd', 'dsf', 'sdfsdf', 'Madya Pradesh', '43534', '21.jpg', 0, '5345434567');

-- --------------------------------------------------------

--
-- Table structure for table `election`
--

CREATE TABLE `election` (
  `ele_id` int(11) NOT NULL auto_increment,
  `ename` varchar(233) NOT NULL,
  `date` varchar(233) NOT NULL,
  `eplace` varchar(233) NOT NULL,
  `state` varchar(233) NOT NULL,
  PRIMARY KEY  (`ele_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `election`
--

INSERT INTO `election` (`ele_id`, `ename`, `date`, `eplace`, `state`) VALUES
(2, 'hkj', '2020-03-14', 'kjh', 'Meghalaya');

-- --------------------------------------------------------

--
-- Table structure for table `party`
--

CREATE TABLE `party` (
  `pid` int(11) NOT NULL auto_increment,
  `party_name` varchar(233) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY  (`pid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `party`
--

INSERT INTO `party` (`pid`, `party_name`, `status`) VALUES
(1, 'All India Anna Dravida Munnetra Kazhagam (AIADMK)', 1),
(2, 'Ahila India Naadalum Makkal Katchi(AIAMK)', 0),
(3, 'Dravida Munnetra Kazhagam(DMK)', 0),
(4, 'Vivasayi Anbhu Katchi', 0);

-- --------------------------------------------------------

--
-- Table structure for table `voter`
--

CREATE TABLE `voter` (
  `vid` int(11) NOT NULL auto_increment,
  `name` varchar(233) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `father_name` varchar(233) NOT NULL,
  `gender` varchar(233) NOT NULL,
  `dob` varchar(233) NOT NULL,
  `address` varchar(233) NOT NULL,
  `voter_id` varchar(233) NOT NULL,
  PRIMARY KEY  (`vid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `voter`
--

INSERT INTO `voter` (`vid`, `name`, `photo`, `father_name`, `gender`, `dob`, `address`, `voter_id`) VALUES
(3, 'meena', 'bg-01.jpg', 'sundharam', 'Female', '2020-03-27', 'trichy', 'upx9826');
