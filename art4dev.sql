-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 13, 2018 at 04:06 PM
-- Server version: 5.7.19
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `art4dev`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(60) NOT NULL,
  `userEmail` varchar(100) NOT NULL,
  `userPass` varchar(100) NOT NULL,
  `tokenCode` varchar(100) NOT NULL,
  `date_created` datetime NOT NULL,
  PRIMARY KEY (`userID`),
  UNIQUE KEY `userEmail` (`userEmail`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`userID`, `firstName`, `lastName`, `userEmail`, `userPass`, `tokenCode`, `date_created`) VALUES
(1, 'Action', 'Aid', 'actionaid@gmail.com', '$2y$10$p3JNXvE8vCteNgecO1UFKebSKRaodTKwoZK/50w8sFaB/.LEjBA/q', '2de01b9310e1c74db393059ffa282f57', '2018-04-10 18:34:56'),
(2, 'Temitope', 'Action', 'faluatemitopeo@gmail.com', '$2y$10$Ov6zxFTggmXAVIwJRsjUyO6H.Orl5qJXsOmUj4ZzXrttAr0Uwlh2O', '1f45847e8de5124c8d9f4d84301ebacf', '2018-04-17 12:35:28');

-- --------------------------------------------------------

--
-- Table structure for table `community`
--

DROP TABLE IF EXISTS `community`;
CREATE TABLE IF NOT EXISTS `community` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` varchar(200) NOT NULL,
  `organization` varchar(300) NOT NULL,
  `slug` varchar(300) NOT NULL,
  `photo` varchar(300) DEFAULT NULL,
  `contact_name` varchar(300) NOT NULL,
  `useremail` varchar(300) NOT NULL,
  `username` varchar(300) NOT NULL,
  `userpass` varchar(300) DEFAULT NULL,
  `phone_no` varchar(300) DEFAULT NULL,
  `gender` varchar(100) DEFAULT NULL,
  `interest` varchar(300) NOT NULL,
  `booth_allocation` varchar(300) NOT NULL,
  `no_of_booth` varchar(30) NOT NULL,
  `about_me` text NOT NULL,
  `art_work` text,
  `location` varchar(300) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `date_created` datetime NOT NULL,
  `activate_on` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `donators`
--

DROP TABLE IF EXISTS `donators`;
CREATE TABLE IF NOT EXISTS `donators` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` varchar(200) NOT NULL,
  `fullname` varchar(300) NOT NULL,
  `useremail` varchar(300) NOT NULL,
  `phone` varchar(300) NOT NULL,
  `location` varchar(300) NOT NULL,
  `other_info` varchar(300) NOT NULL,
  `art_work` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `date_created` datetime NOT NULL,
  `activate_on` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `exhibitors`
--

DROP TABLE IF EXISTS `exhibitors`;
CREATE TABLE IF NOT EXISTS `exhibitors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` varchar(200) NOT NULL,
  `organization` varchar(300) NOT NULL,
  `slug` varchar(300) NOT NULL,
  `photo` varchar(300) DEFAULT NULL,
  `contact_name` varchar(300) NOT NULL,
  `useremail` varchar(300) NOT NULL,
  `username` varchar(300) NOT NULL,
  `userpass` varchar(300) DEFAULT NULL,
  `phone_no` varchar(300) DEFAULT NULL,
  `gender` varchar(100) DEFAULT NULL,
  `interest` varchar(300) NOT NULL,
  `booth_allocation` varchar(300) NOT NULL,
  `no_of_booth` varchar(30) NOT NULL,
  `about_me` text NOT NULL,
  `skills` text,
  `resume_doc` varchar(300) DEFAULT NULL,
  `art_work` text,
  `payment` varchar(300) NOT NULL,
  `location` varchar(300) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `date_created` datetime NOT NULL,
  `activate_on` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exhibitors`
--

INSERT INTO `exhibitors` (`id`, `uid`, `organization`, `slug`, `photo`, `contact_name`, `useremail`, `username`, `userpass`, `phone_no`, `gender`, `interest`, `booth_allocation`, `no_of_booth`, `about_me`, `skills`, `resume_doc`, `art_work`, `payment`, `location`, `status`, `date_created`, `activate_on`) VALUES
(8, '1CUati', 'EMMATHEM MEDIA COMPANY', 'emmathem-media-company', NULL, 'Emmathem', 'faluatemitopeo@gmail.com', 'emmathem-37', '$2y$10$mdxcVO/ls0cBMJ6XBQyqw.Ud3liliWblcKtzbNWGmo1IJp1eJlm8m', '07068912907', NULL, 'Decorative Art (Wood works, Decorative chairs, Hides and Skin, Weaving, Baskets, etc)', '100000', '3', 'I am a good guy', NULL, NULL, '[\"emmathem-37-15275799360.jpg\",\"emmathem-37-152757993601....jpg\"]', '../artworks/exhibitors/payments/emmathem-media-company-payment-proof-1527527577.png', NULL, 1, '2018-05-28 18:12:57', '2018-05-28 19:42:34');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

DROP TABLE IF EXISTS `gallery`;
CREATE TABLE IF NOT EXISTS `gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `e_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `e_id` (`e_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `e_id`, `created_at`) VALUES
(3, 8, '2018-05-28 18:42:11');

-- --------------------------------------------------------

--
-- Table structure for table `participants`
--

DROP TABLE IF EXISTS `participants`;
CREATE TABLE IF NOT EXISTS `participants` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` varchar(300) NOT NULL,
  `fullname` varchar(300) NOT NULL,
  `useremail` varchar(300) NOT NULL,
  `userpass` varchar(300) NOT NULL,
  `phone` varchar(300) NOT NULL,
  `service_needed` varchar(300) NOT NULL,
  `other_info` text NOT NULL,
  `date_created` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gallery`
--
ALTER TABLE `gallery`
  ADD CONSTRAINT `gallery_ibfk_1` FOREIGN KEY (`e_id`) REFERENCES `exhibitors` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
