-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2022 at 03:09 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `k1`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblalbum`
--

CREATE TABLE `tblalbum` (
  `id` int(100) NOT NULL,
  `albumcat` int(100) DEFAULT NULL,
  `albumname` varchar(60) DEFAULT NULL,
  `albumsinger` varchar(100) DEFAULT NULL,
  `albumwriter` varchar(100) DEFAULT NULL,
  `albumdesc` varchar(250) DEFAULT NULL,
  `albumimage` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `id` int(10) NOT NULL,
  `catname` varchar(50) DEFAULT NULL,
  `catdesc` varchar(250) DEFAULT NULL,
  `catimage` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`id`, `catname`, `catdesc`, `catimage`) VALUES
(34, 'TELUGU', 'the one of the best', 'alternative.jpg'),
(33, 'TAMIL', 'the rap', 'RAP.jpg'),
(32, 'HINDI', 'the hiphop', 'HIPHOP.jpg'),
(28, 'KANNADA', 'The best to rnb', 'RNB.jpg'),
(29, 'ENGLISH', 'the rock', 'ROCK.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tblsongs`
--

CREATE TABLE `tblsongs` (
  `id` int(100) NOT NULL,
  `songcat` varchar(10) DEFAULT NULL,
  `songalbum` varchar(50) DEFAULT NULL,
  `songsinger` varchar(100) DEFAULT NULL,
  `songdesc` varchar(250) DEFAULT NULL,
  `songfile` varchar(50) DEFAULT NULL,
  `songwriter` varchar(100) NOT NULL,
  `songpoints` int(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblalbum`
--
ALTER TABLE `tblalbum`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblsongs`
--
ALTER TABLE `tblsongs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblalbum`
--
ALTER TABLE `tblalbum`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `tblsongs`
--
ALTER TABLE `tblsongs`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
