-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2015 at 08:41 AM
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
  `type` varchar(32) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `uploaded_file`
--

INSERT INTO `uploaded_file` (`id`, `name`, `filename`, `size`, `type`) VALUES
(9, 'sinet.sql', 'C:\\xampp\\htdocs\\xl\\runtime/upload\\b1\\b1631225f3277cde083584cf8a3d134b_sinet.sql', 530778, NULL),
(10, 'selfie.jpg', 'C:\\xampp\\htdocs\\xl\\runtime/upload\\79\\7992a16a0e63a4f8bf9ffc883f3c98d3_selfie.jpg', 85165, NULL),
(11, 'selfie.jpg', 'C:\\xampp\\htdocs\\xl\\runtime/upload\\05\\050a9eadecdd59a22ca13db9d1d007ea_selfie.jpg', 85165, NULL),
(12, 'selfie.jpg', 'C:\\xampp\\htdocs\\xl\\runtime/upload\\40\\40c26271b3b0b89edb19d28eb3dd4834_selfie.jpg', 85165, NULL),
(13, 'selfie.jpg', 'C:\\xampp\\htdocs\\xl\\runtime/upload\\ab\\ab243997e8002603186a572f55a9c122_selfie.jpg', 85165, NULL),
(14, 'selfie.jpg', 'C:\\xampp\\htdocs\\xl\\runtime/upload\\85\\850c85b0521717844e68fcbb28fa6b29_selfie.jpg', 85165, NULL),
(15, 'crm.jpg', 'C:\\xampp\\htdocs\\xl\\runtime/upload\\8d\\8d1de4f35cfc8d9b880d696094ebd86f_crm.jpg', 244467, NULL),
(16, 'crm.jpg', 'C:\\xampp\\htdocs\\xl\\runtime/upload\\41\\41ba14efca38a730246f2898cac2afe6_crm.jpg', 244467, NULL),
(17, '10268231_764880793522464_1006929785_n.jpg', 'C:\\xampp\\htdocs\\xl\\runtime/upload\\ae\\ae50f5c9675926e50a86a79eb90ef426_10268231_764880793522464_1006929785_n.jpg', 116684, NULL),
(18, '10268231_764880793522464_1006929785_n.jpg', 'C:\\xampp\\htdocs\\xl\\runtime/upload\\c9\\c9673d4918e6d28f1ff0420fa6d4776e_10268231_764880793522464_1006929785_n.jpg', 116684, NULL),
(19, 'home.png', 'C:\\xampp\\htdocs\\xl\\runtime/upload\\39\\39fde4adef40d3433775c067d4c688ce_home.png', 546321, NULL),
(20, 'home.png', 'C:\\xampp\\htdocs\\xl\\runtime/upload\\df\\df40911fc95ba3a474915e02ce8ff9bc_home.png', 546321, NULL),
(21, 'index.jpg', 'C:\\xampp\\htdocs\\xl\\runtime/upload\\55\\55965f8db536d5cf4b2963001262771c_index.jpg', 4099, NULL),
(22, 'index.jpg', 'C:\\xampp\\htdocs\\xl\\runtime/upload\\cd\\cdefadd1f95330ec8482047bbc855649_index.jpg', 4099, NULL);

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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
