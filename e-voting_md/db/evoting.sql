-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 21, 2020 at 07:01 AM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `allocate_party`
--

INSERT INTO `allocate_party` (`party_id`, `cid`, `party`, `symbol`) VALUES
(7, 7, 'All India Anna Dravida Munnetra Kazhagam (AIADMK)', 'tutorimg-02.jpg'),
(8, 10, 'Vivasayi Anbhu Katchi', 'vivasayee.png'),
(9, 8, 'Dravida Munnetra Kazhagam(DMK)', 'dmk.png'),
(10, 11, 'bharatiya janata party', '11.JPG'),
(11, 15, 'MLA', 'WIN_20200919_12_05_29_Pro.jpg'),
(12, 16, 'Anaithinthiya Thamizhaga Munnetra Kazhagam', '4.jpg'),
(13, 17, 'Kongunadu Makkal Desia Katchi', '6.png'),
(14, 18, 'Indian Uzhavar Uzhaippalar Katchi', '12.JPG'),
(15, 18, 'All India Samathuva Makkal Katchi', '12.JPG'),
(16, 18, 'Tamizhaga Murpokku Makkal Katchi', '9.JPG'),
(17, 18, 'Kamarajar Adithanar Kazhagam', '4.jpg'),
(18, 18, 'Kamarajar Adithanar Kazhagam', '9.JPG'),
(19, 18, 'bjp', '9.JPG'),
(20, 22, 'bjp', '6.png'),
(21, 22, 'bjp', '9.JPG'),
(22, 18, 'bjp', '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `block_status`
--

INSERT INTO `block_status` (`id`, `uid`, `stage1`, `stage2`, `stage3`, `stage4`, `stage5`, `stage6`) VALUES
(1, 22, 1, 0, 1, 0, 0, 0),
(2, 23, 1, 0, 1, 0, 0, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `condidate`
--

INSERT INTO `condidate` (`cid`, `name`, `fname`, `age`, `dob`, `gender`, `gname`, `qualification`, `pre_address`, `per_address`, `city`, `state`, `pincode`, `photo`, `status`, `mobile`, `election`) VALUES
(7, 'mani', 'kanagu', '23', '2020-03-12', 'male', 'cinnammal', 'msc', 'trichy', 'trichy', 'srirangam', 'Tamil Nadu', '43534', 'tutorpage2_img4.jpg', 1, '5345434567', 'thaluk'),
(8, 'vino', 'kanagu', '23', '2020-03-12', 'Choose...', 'cinnammal', 'msc', 'theni', 'theni', 'trichy', 'Manipur', '43534', 'tutorpage3_img5.jpg', 1, '5345434567', 'MLA'),
(10, 'vaishu', 'vaishu', '26', '1995-03-19', 'female', 'madhu', 'bsc', 'trichy', 'trichy', 'srirangam', 'Tamil Nadu', '43534', 'meena.jpg', 1, '5345434567', 'thaluk'),
(11, 'aa', 'aa', '18', '2020-09-17', 'female', 'a', 'a', 'a', 'a', 'a', 'a', '630387', 'tutorpage2_img4.jpg', 1, '9715837535', ''),
(18, 'cand1', 'test', '22', '2020-09-20', 'male', 'cand1', 'ss', 'qq', 'a', 'karaikudi', 'karaikudi', '630307', '12.JPG', 1, '345687900-', '25'),
(22, 'cand3', 'test', '22', '2020-09-20', 'male', 's', 's', 's', 's', 'karaikudi', 'karaikudi', '620002', '9.JPG', 1, '9867845678', '25');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `election`
--

INSERT INTO `election` (`ele_id`, `ename`, `date`, `eplace`, `state`, `time`) VALUES
(3, 'thaluk', '2020-03-19', 'srirangam', 'Tamil Nadu', ''),
(4, 'MLA', '2020-03-20', 'trichy', 'Tamil Nadu', ''),
(5, 'thaluk', '2020-03-07', 'salem', 'salem', ''),
(14, 'MLA', '2020-09-19', 'Trichy', 'Trichy', '09.00 to 05.00'),
(15, 'MLA', '2020-09-19', 'Trichy', 'Trichy', '09.00 to 05.00'),
(16, 'test_elections', '2020-09-19', 'karaikudi', 'karaikudi', '09.00 to 05.00'),
(17, 'vidhya', '2020-09-15', 'karaikudi', 'sivagangai', '09.00 to 05.00'),
(20, 'menaka', '2020-05-16', 'coimbatore', 'coimbatore', '09.00 to 05.00'),
(22, 'MLA', '2020-09-21', 'coimbatore', 'coimbatore', ''),
(23, 'MLA', '2020-09-20', 'coimbatore', 'coimbatore', ''),
(24, 'vidhya', '2020-09-15', 'karaikudi', 'karaikudi', ''),
(25, 'MLA_test', '2020-09-20', 'karaikudi', 'karaikudi', '09.00 to 05.00');

-- --------------------------------------------------------

--
-- Table structure for table `party`
--

CREATE TABLE `party` (
  `pid` int(11) NOT NULL auto_increment,
  `party_name` varchar(233) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY  (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `party`
--


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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `qr_coin`
--

INSERT INTO `qr_coin` (`qr_id`, `uid`, `eid`, `otp`, `status`) VALUES
(16, 16, 16, 4, 0),
(17, 17, 0, 2, 0),
(18, 16, 17, 5, 0),
(19, 18, 17, 2, 0),
(20, 18, 18, 5, 0),
(21, 19, 19, 4, 0),
(22, 20, 20, 2, 0),
(23, 20, 21, 5, 0),
(24, 21, 16, 3, 0),
(25, 22, 25, 2, 0),
(26, 23, 25, 4, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `voter`
--

INSERT INTO `voter` (`vid`, `name`, `photo`, `father_name`, `gender`, `dob`, `address`, `voter_id`, `city`, `phone`) VALUES
(23, 'voter1', '9.JPG', 'demo', 'male', '2020-09-20', 's', 'upx5539', 'karaikudi', 'karaikudi');
