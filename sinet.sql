-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2015 at 02:37 PM
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
-- Table structure for table `3g_rnc_reference`
--

CREATE TABLE IF NOT EXISTS `3g_rnc_reference` (
`rnc_id` int(11) NOT NULL,
  `msc_name` varchar(32) NOT NULL,
  `mgw_name` varchar(32) NOT NULL,
  `rnc_name` varchar(32) NOT NULL,
  `vendor_rnc` varchar(32) DEFAULT NULL,
  `spc_nat0` varchar(5) NOT NULL,
  `trunk_name` varchar(12) NOT NULL,
  `rnc_location` text NOT NULL,
  `pool` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `log_date` date NOT NULL,
  `remark` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bcu_id`
--

CREATE TABLE IF NOT EXISTS `bcu_id` (
  `mgw_name` varchar(32) NOT NULL,
  `new_mss_connected` varchar(32) NOT NULL,
  `old_mss_connected` varchar(32) NOT NULL,
  `region` varchar(32) NOT NULL,
  `location` text NOT NULL,
  `status` varchar(50) NOT NULL,
  `log_date` date NOT NULL,
  `remark` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dummy_number`
--

CREATE TABLE IF NOT EXISTS `dummy_number` (
`dummy_id` int(11) NOT NULL,
  `name_msc` varchar(32) NOT NULL,
  `dummy_number` varchar(13) NOT NULL,
  `status` varchar(20) NOT NULL,
  `log_date` date NOT NULL,
  `remark` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mgw_bcu_id`
--

CREATE TABLE IF NOT EXISTS `mgw_bcu_id` (
  `mgw_name` varchar(32) NOT NULL,
  `bcu_id` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mip_reference`
--

CREATE TABLE IF NOT EXISTS `mip_reference` (
`mip_id` int(11) NOT NULL,
  `msc_name` varchar(32) NOT NULL,
  `nri_msc` varchar(32) NOT NULL,
  `vendor` varchar(64) NOT NULL,
  `pool` text NOT NULL,
  `null_nri` varchar(32) NOT NULL,
  `non_broadcastLAI` varchar(32) DEFAULT NULL,
  `spc_msc` varchar(64) NOT NULL,
  `cnid` varchar(32) NOT NULL,
  `cap_value` varchar(32) DEFAULT NULL,
  `NB_LAI` varchar(64) DEFAULT NULL,
  `msc_index` varchar(32) NOT NULL,
  `msc_ip_sigtran1` varchar(64) DEFAULT NULL,
  `msc_ip_sigtran2` varchar(64) DEFAULT NULL,
  `mgw_proxyA_flex` varchar(64) DEFAULT NULL,
  `mgw_managerA_circuit` varchar(64) DEFAULT NULL,
  `status` varchar(50) NOT NULL,
  `log_date` date NOT NULL,
  `remark` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `spc_address`
--

CREATE TABLE IF NOT EXISTS `spc_address` (
  `network_id` varchar(32) NOT NULL,
  `desc_network` text,
  `location` text NOT NULL,
  `provinsi` varchar(32) NOT NULL,
  `vendor` varchar(32) NOT NULL,
  `gtt` varchar(15) DEFAULT NULL,
  `second_OPC` varchar(5) DEFAULT NULL,
  `third_OPC` varchar(5) DEFAULT NULL,
  `fourth_OPC` varchar(5) DEFAULT NULL,
  `fifth_OPC` varchar(5) DEFAULT NULL,
  `sixth_OPC` varchar(5) DEFAULT NULL,
  `INAT0` varchar(5) DEFAULT NULL,
  `status` varchar(50) NOT NULL,
  `log_date` date NOT NULL,
  `remark` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `spc_address_detail`
--

CREATE TABLE IF NOT EXISTS `spc_address_detail` (
  `network_id` varchar(32) NOT NULL,
  `sc_address` varchar(15) NOT NULL,
  `opc_nat0` varchar(64) NOT NULL,
  `opc_nat1` varchar(64) NOT NULL,
  `desc_network` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trunk_interkoneksi`
--

CREATE TABLE IF NOT EXISTS `trunk_interkoneksi` (
  `trunk_id` varchar(8) NOT NULL,
  `dummy_id` int(11) NOT NULL,
  `trunk_group` varchar(64) NOT NULL,
  `poi` varchar(64) NOT NULL,
  `connection` text NOT NULL,
  `direction` varchar(15) NOT NULL,
  `vendor` varchar(32) NOT NULL,
  `opc` varchar(5) NOT NULL,
  `dpc` varchar(5) NOT NULL,
  `e1_capacity` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `log_date` date NOT NULL,
  `remark` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trunk_voip`
--

CREATE TABLE IF NOT EXISTS `trunk_voip` (
  `trunk_id` varchar(8) NOT NULL,
  `dummy_id` int(11) NOT NULL,
  `partner` text NOT NULL,
  `konfigurasi` varchar(255) DEFAULT NULL,
  `connection` varchar(255) NOT NULL,
  `direction` varchar(8) NOT NULL,
  `mgw_name` varchar(32) NOT NULL,
  `opc_mssH` varchar(32) DEFAULT NULL,
  `dpcH` varchar(32) DEFAULT NULL,
  `opc_mss` varchar(32) DEFAULT NULL,
  `dpcD` varchar(32) DEFAULT NULL,
  `voip_gateway` varchar(64) NOT NULL,
  `e1_capacity` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `log_date` date NOT NULL,
  `remark` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `3g_rnc_reference`
--
ALTER TABLE `3g_rnc_reference`
 ADD PRIMARY KEY (`rnc_id`), ADD KEY `mgw_name` (`mgw_name`), ADD KEY `msc_name` (`msc_name`);

--
-- Indexes for table `bcu_id`
--
ALTER TABLE `bcu_id`
 ADD PRIMARY KEY (`mgw_name`);

--
-- Indexes for table `dummy_number`
--
ALTER TABLE `dummy_number`
 ADD PRIMARY KEY (`dummy_id`), ADD UNIQUE KEY `name_msc` (`name_msc`);

--
-- Indexes for table `mgw_bcu_id`
--
ALTER TABLE `mgw_bcu_id`
 ADD PRIMARY KEY (`mgw_name`);

--
-- Indexes for table `mip_reference`
--
ALTER TABLE `mip_reference`
 ADD PRIMARY KEY (`mip_id`), ADD KEY `msc_name` (`msc_name`);

--
-- Indexes for table `spc_address`
--
ALTER TABLE `spc_address`
 ADD PRIMARY KEY (`network_id`);

--
-- Indexes for table `spc_address_detail`
--
ALTER TABLE `spc_address_detail`
 ADD PRIMARY KEY (`network_id`,`sc_address`,`opc_nat0`,`opc_nat1`,`desc_network`);

--
-- Indexes for table `trunk_interkoneksi`
--
ALTER TABLE `trunk_interkoneksi`
 ADD PRIMARY KEY (`trunk_id`), ADD KEY `dummy_id` (`dummy_id`);

--
-- Indexes for table `trunk_voip`
--
ALTER TABLE `trunk_voip`
 ADD PRIMARY KEY (`trunk_id`), ADD KEY `mgw` (`mgw_name`), ADD KEY `dummy_id` (`dummy_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `3g_rnc_reference`
--
ALTER TABLE `3g_rnc_reference`
MODIFY `rnc_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dummy_number`
--
ALTER TABLE `dummy_number`
MODIFY `dummy_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mip_reference`
--
ALTER TABLE `mip_reference`
MODIFY `mip_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `3g_rnc_reference`
--
ALTER TABLE `3g_rnc_reference`
ADD CONSTRAINT `3g_rnc_reference_ibfk_1` FOREIGN KEY (`msc_name`) REFERENCES `spc_address` (`network_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `3g_rnc_reference_ibfk_2` FOREIGN KEY (`mgw_name`) REFERENCES `bcu_id` (`mgw_name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dummy_number`
--
ALTER TABLE `dummy_number`
ADD CONSTRAINT `dummy_number_ibfk_1` FOREIGN KEY (`name_msc`) REFERENCES `spc_address` (`network_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mgw_bcu_id`
--
ALTER TABLE `mgw_bcu_id`
ADD CONSTRAINT `mgw_bcu_id_ibfk_1` FOREIGN KEY (`mgw_name`) REFERENCES `bcu_id` (`mgw_name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mip_reference`
--
ALTER TABLE `mip_reference`
ADD CONSTRAINT `mip_reference_ibfk_1` FOREIGN KEY (`msc_name`) REFERENCES `spc_address` (`network_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `spc_address_detail`
--
ALTER TABLE `spc_address_detail`
ADD CONSTRAINT `spc_address_detail_ibfk_1` FOREIGN KEY (`network_id`) REFERENCES `spc_address` (`network_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trunk_interkoneksi`
--
ALTER TABLE `trunk_interkoneksi`
ADD CONSTRAINT `trunk_interkoneksi_ibfk_1` FOREIGN KEY (`dummy_id`) REFERENCES `dummy_number` (`dummy_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trunk_voip`
--
ALTER TABLE `trunk_voip`
ADD CONSTRAINT `trunk_voip_ibfk_1` FOREIGN KEY (`dummy_id`) REFERENCES `dummy_number` (`dummy_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `trunk_voip_ibfk_2` FOREIGN KEY (`mgw_name`) REFERENCES `bcu_id` (`mgw_name`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
