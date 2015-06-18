-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2015 at 02:34 PM
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
-- Table structure for table `bcu_id`
--

CREATE TABLE IF NOT EXISTS `bcu_id` (
  `bcu_id` varchar(20) NOT NULL,
  `mgw_name` varchar(20) NOT NULL,
  `region` varchar(80) NOT NULL,
  `old_mss_connected` varchar(20) DEFAULT NULL,
  `new_mss_connected` varchar(20) DEFAULT NULL,
  `status` varchar(30) NOT NULL,
  `log_date` date DEFAULT NULL,
  `remark` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `bcu_id`:
--   `mgw_name`
--       `network_element` -> `network_id`
--

-- --------------------------------------------------------

--
-- Table structure for table `desc_network`
--

CREATE TABLE IF NOT EXISTS `desc_network` (
`id` int(11) NOT NULL,
  `network_id` varchar(20) NOT NULL,
  `opc_nat0` varchar(20) DEFAULT NULL,
  `opc_nat1` varchar(20) DEFAULT NULL,
  `desc_network` text,
  `inat0` varchar(20) DEFAULT NULL,
  `second_opc` varchar(20) DEFAULT NULL,
  `third_opc` varchar(20) DEFAULT NULL,
  `fourth_opc` varchar(20) DEFAULT NULL,
  `fifth_opc` varchar(20) DEFAULT NULL,
  `sixth_opc` varchar(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `desc_network`:
--   `network_id`
--       `network_element` -> `network_id`
--

-- --------------------------------------------------------

--
-- Table structure for table `msc`
--

CREATE TABLE IF NOT EXISTS `msc` (
  `msc_name` varchar(20) NOT NULL,
  `cnid` varchar(20) NOT NULL,
  `dummy_number` varchar(20) DEFAULT NULL,
  `pool` text NOT NULL,
  `non_broadcast_lai` varchar(20) DEFAULT NULL,
  `null_nri` varchar(20) DEFAULT NULL,
  `nri_msc` varchar(20) DEFAULT NULL,
  `spc_msc` varchar(20) NOT NULL,
  `cap_value` int(11) NOT NULL,
  `nb_lai` varchar(20) DEFAULT NULL,
  `msc_index` int(11) DEFAULT NULL,
  `msc_IP_sigtran1` varchar(60) DEFAULT NULL,
  `msc_IP_sigtran2` varchar(60) DEFAULT NULL,
  `mgw_proxyA_flex` tinyint(1) NOT NULL,
  `mgw_managerA_circuit` tinyint(1) NOT NULL,
  `status` varchar(30) NOT NULL,
  `log_date` date DEFAULT NULL,
  `remark` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `msc`:
--   `msc_name`
--       `network_element` -> `network_id`
--

-- --------------------------------------------------------

--
-- Table structure for table `network_element`
--

CREATE TABLE IF NOT EXISTS `network_element` (
  `network_id` varchar(100) NOT NULL,
  `sc_address` varchar(20) DEFAULT NULL,
  `location` text NOT NULL,
  `provinsi` varchar(40) NOT NULL,
  `vendor` varchar(20) NOT NULL,
  `gtt` varchar(20) DEFAULT NULL,
  `status` varchar(20) NOT NULL,
  `log_date` date DEFAULT NULL,
  `remark` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `network_element`
--

INSERT INTO `network_element` (`network_id`, `sc_address`, `location`, `provinsi`, `vendor`, `gtt`, `status`, `log_date`, `remark`) VALUES
('tes123', '621231231123', 'asd', 'Aceh', 'huawei', NULL, 'Plan', '2015-06-18', ''),
('tes345', '628122090083', 'asd', '0', 'huawei', NULL, 'Plan', '2015-06-18', '');

-- --------------------------------------------------------

--
-- Table structure for table `rnc_reference`
--

CREATE TABLE IF NOT EXISTS `rnc_reference` (
  `rnc_name` varchar(20) NOT NULL,
  `msc_name` varchar(20) NOT NULL,
  `mgw_name` varchar(20) NOT NULL,
  `vendor_rnc` varchar(100) NOT NULL,
  `spc_nat0` varchar(20) NOT NULL,
  `trunk_name` varchar(20) NOT NULL,
  `rnc_location` varchar(80) NOT NULL,
  `status` varchar(30) NOT NULL,
  `log_date` date DEFAULT NULL,
  `remark` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `rnc_reference`:
--   `msc_name`
--       `network_element` -> `network_id`
--   `mgw_name`
--       `network_element` -> `network_id`
--

--
-- Dumping data for table `rnc_reference`
--

INSERT INTO `rnc_reference` (`rnc_name`, `msc_name`, `mgw_name`, `vendor_rnc`, `spc_nat0`, `trunk_name`, `rnc_location`, `status`, `log_date`, `remark`) VALUES
('coba', 'tes123', 'tes345', 'huawei', '3113', 'asd1231', 'hatiku', 'Plan', '2015-06-18', '');

-- --------------------------------------------------------

--
-- Table structure for table `trunk_interkoneksi`
--

CREATE TABLE IF NOT EXISTS `trunk_interkoneksi` (
  `trunk_id` varchar(20) NOT NULL,
  `dummy_no` varchar(20) NOT NULL,
  `direction` varchar(20) NOT NULL,
  `vendor` varchar(20) NOT NULL,
  `opc` varchar(20) NOT NULL,
  `dpc` varchar(20) NOT NULL,
  `e1_capacity` int(11) NOT NULL,
  `POI` varchar(50) NOT NULL,
  `connection` text NOT NULL,
  `trunk_group` varchar(50) NOT NULL,
  `status` varchar(30) NOT NULL,
  `log_date` date DEFAULT NULL,
  `remark` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `trunk_interkoneksi`:
--   `dummy_no`
--       `msc` -> `dummy_number`
--

-- --------------------------------------------------------

--
-- Table structure for table `trunk_voip`
--

CREATE TABLE IF NOT EXISTS `trunk_voip` (
  `trunk_id` varchar(20) NOT NULL,
  `dummy_no` varchar(20) DEFAULT NULL,
  `mgw_name` varchar(20) DEFAULT NULL,
  `detaill` text,
  `direction` varchar(20) DEFAULT NULL,
  `konfigurasi` text,
  `partner` varchar(50) NOT NULL,
  `e1` int(11) DEFAULT NULL,
  `opc_mss` varchar(20) DEFAULT NULL,
  `dpc` varchar(20) DEFAULT NULL,
  `voip_gateway` varchar(80) NOT NULL,
  `status` varchar(20) NOT NULL,
  `log_date` date DEFAULT NULL,
  `remark` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `trunk_voip`:
--   `dummy_no`
--       `msc` -> `dummy_number`
--   `mgw_name`
--       `network_element` -> `network_id`
--

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bcu_id`
--
ALTER TABLE `bcu_id`
 ADD PRIMARY KEY (`bcu_id`), ADD KEY `mgw_name` (`mgw_name`);

--
-- Indexes for table `desc_network`
--
ALTER TABLE `desc_network`
 ADD PRIMARY KEY (`id`), ADD KEY `network_id` (`network_id`);

--
-- Indexes for table `msc`
--
ALTER TABLE `msc`
 ADD PRIMARY KEY (`msc_name`), ADD UNIQUE KEY `cnid` (`cnid`), ADD UNIQUE KEY `dummy_number_2` (`dummy_number`);

--
-- Indexes for table `network_element`
--
ALTER TABLE `network_element`
 ADD PRIMARY KEY (`network_id`), ADD UNIQUE KEY `sc-_address` (`sc_address`), ADD UNIQUE KEY `gtt` (`gtt`);

--
-- Indexes for table `rnc_reference`
--
ALTER TABLE `rnc_reference`
 ADD PRIMARY KEY (`rnc_name`,`mgw_name`), ADD KEY `msc_name` (`msc_name`), ADD KEY `mgw_name` (`mgw_name`);

--
-- Indexes for table `trunk_interkoneksi`
--
ALTER TABLE `trunk_interkoneksi`
 ADD PRIMARY KEY (`trunk_id`), ADD KEY `dummy_no` (`dummy_no`);

--
-- Indexes for table `trunk_voip`
--
ALTER TABLE `trunk_voip`
 ADD PRIMARY KEY (`trunk_id`), ADD KEY `dummy_no` (`dummy_no`), ADD KEY `mgw_name` (`mgw_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `desc_network`
--
ALTER TABLE `desc_network`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `bcu_id`
--
ALTER TABLE `bcu_id`
ADD CONSTRAINT `bcu_id_ibfk_1` FOREIGN KEY (`mgw_name`) REFERENCES `network_element` (`network_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `desc_network`
--
ALTER TABLE `desc_network`
ADD CONSTRAINT `desc_network_ibfk_1` FOREIGN KEY (`network_id`) REFERENCES `network_element` (`network_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `msc`
--
ALTER TABLE `msc`
ADD CONSTRAINT `msc_ibfk_1` FOREIGN KEY (`msc_name`) REFERENCES `network_element` (`network_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rnc_reference`
--
ALTER TABLE `rnc_reference`
ADD CONSTRAINT `rnc_reference_ibfk_1` FOREIGN KEY (`msc_name`) REFERENCES `network_element` (`network_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `rnc_reference_ibfk_2` FOREIGN KEY (`mgw_name`) REFERENCES `network_element` (`network_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trunk_interkoneksi`
--
ALTER TABLE `trunk_interkoneksi`
ADD CONSTRAINT `trunk_interkoneksi_ibfk_1` FOREIGN KEY (`dummy_no`) REFERENCES `msc` (`dummy_number`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trunk_voip`
--
ALTER TABLE `trunk_voip`
ADD CONSTRAINT `trunk_voip_ibfk_1` FOREIGN KEY (`dummy_no`) REFERENCES `msc` (`dummy_number`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `trunk_voip_ibfk_2` FOREIGN KEY (`mgw_name`) REFERENCES `network_element` (`network_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
