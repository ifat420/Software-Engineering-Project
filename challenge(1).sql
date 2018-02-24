-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2018 at 11:11 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `challenge`
--

-- --------------------------------------------------------

--
-- Table structure for table `app`
--

CREATE TABLE `app` (
  `ID` int(11) NOT NULL,
  `Date` int(11) NOT NULL,
  `Des` text NOT NULL,
  `Status` int(11) NOT NULL,
  `StudentID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `app`
--

INSERT INTO `app` (`ID`, `Date`, `Des`, `Status`, `StudentID`) VALUES
(1, 20180225, 'I have the honor to state that I am a regular student of this university. I couldnâ€™t attend in my classes from 30th September 20.. to 17th October 20.. due to my sickness. I am attaching doctorâ€™s advice papers photocopy herewith.\r\nI, therefore, pray and hope that you will be kind enough to consider my problem & grant my application for the said classes and oblige thereby.', 0, 12),
(2, 20180225, 'I have the honor to state that I am a regular student of this university. I couldnâ€™t attend in my classes from 30th September 20.. to 17th October 20.. due to my sickness. I am attaching doctorâ€™s advice papers photocopy herewith.\r\nI, therefore, pray and hope that you will be kind enough to consider my problem & grant my application for the said classes and oblige thereby.', 0, 12);

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id` int(10) NOT NULL,
  `s_id` int(1) NOT NULL,
  `req_id` int(1) NOT NULL,
  `req_lib` int(1) NOT NULL,
  `req_wifi` int(1) NOT NULL,
  `req_ma` int(1) NOT NULL,
  `req_cer` int(1) NOT NULL,
  `req_trans` int(1) NOT NULL,
  `req_tm` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE `student_info` (
  `s_id` int(10) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `roll` varchar(15) NOT NULL,
  `dept` varchar(10) NOT NULL,
  `dob` varchar(15) NOT NULL,
  `f_name` varchar(30) NOT NULL,
  `m_name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `session` varchar(20) NOT NULL,
  `pre_add` varchar(30) NOT NULL,
  `par_add` varchar(30) NOT NULL,
  `img_name` varchar(30) NOT NULL,
  `sig_name` varchar(30) NOT NULL,
  `b_group` varchar(4) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`s_id`, `first_name`, `last_name`, `roll`, `dept`, `dob`, `f_name`, `m_name`, `email`, `session`, `pre_add`, `par_add`, `img_name`, `sig_name`, `b_group`, `username`, `password`) VALUES
(12, 'Iftakhar', 'Ahmed', '130129', 'CSE', '25-02-1996', 'Abul Kalam Azad', 'Mrs Jossna', 'ifa80@yahoo.com', '2013-14', 'Khulna', 'Magura', 'bamboo.jpg', 'wood.jpg', 'A+', 'ifat', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `t_id` int(10) NOT NULL,
  `name` varchar(11) NOT NULL,
  `position` varchar(11) NOT NULL,
  `un` varchar(15) NOT NULL,
  `pwd` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`t_id`, `name`, `position`, `un`, `pwd`) VALUES
(2, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `pwd` varchar(20) NOT NULL,
  `s_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wifi`
--

CREATE TABLE `wifi` (
  `id` int(10) NOT NULL,
  `pc_mac_add` varchar(20) NOT NULL,
  `mob_mac_add` varchar(20) NOT NULL,
  `s_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wifi`
--

INSERT INTO `wifi` (`id`, `pc_mac_add`, `mob_mac_add`, `s_id`) VALUES
(10, '1235656546', '52727524275', '12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `app`
--
ALTER TABLE `app`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wifi`
--
ALTER TABLE `wifi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `app`
--
ALTER TABLE `app`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `student_info`
--
ALTER TABLE `student_info`
  MODIFY `s_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `t_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wifi`
--
ALTER TABLE `wifi`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
