-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2015 at 04:07 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sinet`
--

-- --------------------------------------------------------

--
-- Table structure for table `uploaded_file`
--

CREATE TABLE IF NOT EXISTS `uploaded_file` (
`id` int(11) NOT NULL,
  `name` varchar(64) DEFAULT NULL,
  `filename` varchar(256) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `type` varchar(30) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `uploaded_file`
--

INSERT INTO `uploaded_file` (`id`, `name`, `filename`, `size`, `type`, `timestamp`) VALUES
(9, 'sinet.sql', 'C:\\xampp\\htdocs\\xl\\runtime/upload\\b1\\b1631225f3277cde083584cf8a3d134b_sinet.sql', 530778, 'sharing', NULL),
(29, 'home.png', 'C:\\xampp\\htdocs\\xl\\runtime/upload\\7f\\7fbbc32f8b6e0ec3689ac7f7b758b795_home.png', 546321, 'news', '2015-07-28 01:06:19'),
(31, 'dashboard.png', 'C:\\xampp\\htdocs\\xl\\runtime/upload\\13\\139598597a5b537d3735247bf5dad9ce_dashboard.png', 107577, 'news', '2015-07-28 01:10:59'),
(37, 'slider2.jpg', 'C:\\xampp\\htdocs\\xl\\runtime/upload\\f5\\f5256dd53937f06cadcb7e1577befa4e_slider2.jpg', 102773, 'slider', '2015-07-28 02:29:56'),
(38, 'slider3.jpg', 'C:\\xampp\\htdocs\\xl\\runtime/upload\\c1\\c119a8d4e8b37ddc1a59efec7ddc7cca_slider3.jpg', 198290, 'slider', '2015-07-28 02:30:01'),
(39, 'slider1.jpg', 'C:\\xampp\\htdocs\\xl\\runtime/upload\\f9\\f9172e370ea1cbff3dc1d4586aaae634_slider1.jpg', 77608, 'slider', '2015-07-28 02:30:07'),
(54, '1005665_560013057396229_1841222337_n.png', 'C:\\xampp\\htdocs\\xl\\runtime/upload\\7e\\7e707ead6ee8cb2a763f5e48393ecb59_1005665_560013057396229_1841222337_n.png', 521578, NULL, '2015-07-28 06:16:49'),
(57, 'selfie.jpg', 'C:\\xampp\\htdocs\\xl\\runtime/upload\\2d\\2d00530d988338467da17e6424d8926f_selfie.jpg', 85165, 'news', '2015-07-28 06:22:52'),
(58, 'home.png', 'C:\\xampp\\htdocs\\xl\\runtime/upload\\b8\\b8612804d385e2b2ac09b4b402d860ee_home.png', 546321, NULL, '2015-07-28 06:35:43'),
(59, 'home.png', 'C:\\xampp\\htdocs\\xl\\runtime/upload\\e2\\e22d955aa9b3439767982d2cc2ae0866_home.png', 546321, 'news', '2015-07-28 06:35:43'),
(60, 'crm.jpg', 'C:\\xampp\\htdocs\\xl\\runtime/upload\\b3\\b3cb2e2c382f29fb35d27c6647cf81b4_crm.jpg', 244467, NULL, '2015-07-28 06:37:38'),
(61, 'crm.jpg', 'C:\\xampp\\htdocs\\xl\\runtime/upload\\0f\\0f31bfde1c728d9092c00fb144beeceb_crm.jpg', 244467, 'news', '2015-07-28 06:37:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `uploaded_file`
--
ALTER TABLE `uploaded_file`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `uploaded_file`
--
ALTER TABLE `uploaded_file`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=62;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
