-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 21, 2020 at 12:06 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `allocate_party`
--

INSERT INTO `allocate_party` (`party_id`, `cid`, `party`, `symbol`) VALUES
(7, 7, 'All India Anna Dravida Munnetra Kazhagam (AIADMK)', 'tutorimg-02.jpg'),
(8, 10, 'Vivasayi Anbhu Katchi', 'vivasayee.png'),
(9, 8, 'Dravida Munnetra Kazhagam(DMK)', 'dmk.png');

-- --------------------------------------------------------

--
-- Table structure for table `block_status`
--

CREATE TABLE `block_status` (
  `id` int(11) NOT NULL auto_increment,
  `uid` int(11) NOT NULL,
  `stage1` int(11) NOT NULL,
  `stage2` int(11) NOT NULL,
  `stage3` int(11) NOT NULL,
  `stage4` int(11) NOT NULL,
  `stage5` int(11) NOT NULL,
  `stage6` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `block_status`
--


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
  `election` varchar(225) NOT NULL,
  PRIMARY KEY  (`cid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `condidate`
--

INSERT INTO `condidate` (`cid`, `name`, `fname`, `age`, `dob`, `gender`, `gname`, `qualification`, `pre_address`, `per_address`, `city`, `state`, `pincode`, `photo`, `status`, `mobile`, `election`) VALUES
(7, 'mani', 'kanagu', '23', '2020-03-12', 'male', 'cinnammal', 'msc', 'trichy', 'trichy', 'srirangam', 'Tamil Nadu', '43534', 'tutorpage2_img4.jpg', 1, '5345434567', 'thaluk'),
(8, 'vino', 'kanagu', '23', '2020-03-12', 'Choose...', 'cinnammal', 'msc', 'theni', 'theni', 'trichy', 'Manipur', '43534', 'tutorpage3_img5.jpg', 1, '5345434567', 'MLA'),
(10, 'vaishu', 'vaishu', '26', '1995-03-19', 'female', 'madhu', 'bsc', 'trichy', 'trichy', 'srirangam', 'Tamil Nadu', '43534', 'meena.jpg', 1, '5345434567', 'thaluk');

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
  `time` varchar(233) NOT NULL,
  PRIMARY KEY  (`ele_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `election`
--

INSERT INTO `election` (`ele_id`, `ename`, `date`, `eplace`, `state`, `time`) VALUES
(3, 'thaluk', '2020-03-19', 'srirangam', 'Tamil Nadu', ''),
(4, 'MLA', '2020-03-20', 'trichy', 'Tamil Nadu', ''),
(5, 'thaluk', '2020-03-07', 'salem', 'salem', '');

-- --------------------------------------------------------

--
-- Table structure for table `party`
--

CREATE TABLE `party` (
  `pid` int(11) NOT NULL auto_increment,
  `party_name` varchar(233) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY  (`pid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `party`
--

INSERT INTO `party` (`pid`, `party_name`, `status`) VALUES
(1, 'All India Anna Dravida Munnetra Kazhagam (AIADMK)', 1),
(2, 'bharatiya janata party', 0),
(3, 'Dravida Munnetra Kazhagam(DMK)', 1),
(4, 'Vivasayi Anbhu Katchi', 1),
(5, 'Kongunadu Makkal Desia Katchi', 0),
(6, 'Tamizhaga Murpokku Makkal Katchi', 0),
(7, 'Indian Uzhavar Uzhaippalar Katchi', 0),
(8, 'Kamarajar Adithanar Kazhagam', 0),
(9, 'All India Samathuva Makkal Katchi', 0),
(10, 'Anaithinthiya Thamizhaga Munnetra Kazhagam', 0);

-- --------------------------------------------------------

--
-- Table structure for table `qr_coin`
--

CREATE TABLE `qr_coin` (
  `qr_id` int(11) NOT NULL auto_increment,
  `uid` int(11) NOT NULL,
  `eid` int(11) NOT NULL,
  `otp` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY  (`qr_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `qr_coin`
--


-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(11) NOT NULL auto_increment,
  `name` varchar(233) NOT NULL,
  `pwd` varchar(233) NOT NULL,
  `email` varchar(233) NOT NULL,
  PRIMARY KEY  (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `name`, `pwd`, `email`) VALUES
(1, 'meena', '123', 'meena@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `vote`
--

CREATE TABLE `vote` (
  `vote_id` int(11) NOT NULL auto_increment,
  `vid` varchar(225) NOT NULL,
  `eid` varchar(225) NOT NULL,
  `cid` varchar(225) NOT NULL,
  PRIMARY KEY  (`vote_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `vote`
--


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
  `city` varchar(225) NOT NULL,
  `phone` varchar(20) NOT NULL,
  PRIMARY KEY  (`vid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `voter`
--

INSERT INTO `voter` (`vid`, `name`, `photo`, `father_name`, `gender`, `dob`, `address`, `voter_id`, `city`, `phone`) VALUES
(3, 'mani', 'tutorpage2_img4.jpg', 'sundharam', 'male', '2020-03-27', 'salem', 'upx9826', 'srirangam', '9865827578'),
(4, 'meena', 'tutorpage2_img1.jpg', 'sundharam', 'male', '2020-03-27', 'trichy', 'upx7516', 'trichy', '9655789024'),
(5, 'vaishu', 'meena.jpg', 'murugan', 'Female', '2020-03-27', 'trichy', 'upx8267', 'trichy', '');
