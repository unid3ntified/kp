-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2015 at 04:16 PM
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
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
`id` int(11) NOT NULL,
  `title` text NOT NULL,
  `news_desc` text NOT NULL,
  `image_id` int(11) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `news_desc`, `image_id`, `username`, `timestamp`) VALUES
(3, 'Tes 2', 'Lorem ipsum dolor sit amet.\r\nLorem ipsum dolor sit amet.\r\nLorem ipsum dolor sit amet.\r\nLorem ipsum dolor sit amet.\r\nLorem ipsum dolor sit amet.\r\nLorem ipsum dolor sit amet.\r\nLorem ipsum dolor sit amet.\r\nLorem ipsum dolor sit amet.', 59, 'admin', '2015-07-14 03:51:42'),
(4, 'tes lagi', 'asdasdad', 31, 'admin', '2015-07-14 04:15:50'),
(5, 'tes 4', 'asdasdasd', NULL, 'admin', '2015-07-14 04:43:28'),
(12, 'TES', 'Lorem ipsum dolor sit amet.\r\nLorem ipsum dolor sit amet.\r\nLorem ipsum dolor sit amet.\r\nLorem ipsum dolor sit amet.\r\nLorem ipsum dolor sit amet.\r\nLorem ipsum dolor sit amet.\r\nLorem ipsum dolor sit amet.\r\nLorem ipsum dolor sit amet.', 57, 'admin', '2015-07-28 06:22:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `news`
--
ALTER TABLE `news`
 ADD PRIMARY KEY (`id`), ADD KEY `image_id` (`image_id`,`username`), ADD KEY `user_id` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `news`
--
ALTER TABLE `news`
ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`image_id`) REFERENCES `uploaded_file` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `news_ibfk_2` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
