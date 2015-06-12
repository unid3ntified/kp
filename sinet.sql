-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2015 at 09:36 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+07:00";


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
  `msc_name` varchar(32) NOT NULL,
  `mgw_name` varchar(32) NOT NULL,
  `rnc_name` varchar(32) NOT NULL,
  `vendor_rnc` varchar(32) DEFAULT NULL,
  `spc_nat0` varchar(5) NOT NULL,
  `trunk_name` varchar(8) NOT NULL,
  `rnc_description` text NOT NULL,
  `rnc_location` text NOT NULL,
  `provinsi` varchar(32) NOT NULL,
  `status` varchar(15) NOT NULL,
  `log_date` date NOT NULL,
  `remark` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bcu_id`
--

CREATE TABLE IF NOT EXISTS `bcu_id` (
  `name_mgw` varchar(32) NOT NULL,
  `pool` text NOT NULL,
  `vendor` varchar(32) NOT NULL,
  `provinsi` varchar(32) NOT NULL,
  `location` text NOT NULL,
  `bcu_id` varchar(32) NOT NULL,
  `status` varchar(15) NOT NULL,
  `log_date` date NOT NULL,
  `remark` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dummy_number`
--

CREATE TABLE IF NOT EXISTS `dummy_number` (
  `name_msc` varchar(32) NOT NULL,
  `trunk_group` varchar(8) NOT NULL,
  `dummy_number` varchar(13) NOT NULL,
  `status` varchar(15) NOT NULL,
  `log_date` date NOT NULL,
  `remark` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mip_reference`
--

CREATE TABLE IF NOT EXISTS `mip_reference` (
  `name_msc` varchar(32) NOT NULL,
  `nri_msc` varchar(32) NOT NULL,
  `nri` varchar(6) NOT NULL,
  `null_nri` varchar(32) NOT NULL,
  `non_broadcastLAI` varchar(32) DEFAULT NULL,
  `cnid` varchar(32) NOT NULL,
  `cap_value` varchar(32) DEFAULT NULL,
  `status` varchar(15) NOT NULL,
  `log_date` date NOT NULL,
  `remark` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `spc_address`
--

CREATE TABLE IF NOT EXISTS `spc_address` (
  `network_element` varchar(32) NOT NULL,
  `pool` text,
  `location` text NOT NULL,
  `provinsi` varchar(32) NOT NULL,
  `vendor` varchar(32) NOT NULL,
  `sc_address` varchar(255) DEFAULT NULL,
  `gtt` varchar(15) DEFAULT NULL,
  `opc_nat1` varchar(5) NOT NULL,
  `opc_nat0` varchar(5) DEFAULT NULL,
  `second_OPC` varchar(5) DEFAULT NULL,
  `third_OPC` varchar(5) DEFAULT NULL,
  `fourth_OPC` varchar(5) DEFAULT NULL,
  `fifth_OPC` varchar(5) DEFAULT NULL,
  `sixth_OPC` varchar(5) DEFAULT NULL,
  `INAT0` varchar(5) DEFAULT NULL,
  `status` varchar(15) NOT NULL,
  `log_date` date NOT NULL,
  `remark` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trunk_interkoneksi`
--

CREATE TABLE IF NOT EXISTS `trunk_interkoneksi` (
  `trunk` varchar(8) NOT NULL,
  `partner` text NOT NULL,
  `poi` varchar(64) NOT NULL,
  `connection` text NOT NULL,
  `direction` varchar(8) NOT NULL,
  `vendor` varchar(32) NOT NULL,
  `mss` varchar(32) NOT NULL,
  `mgw` varchar(32) NOT NULL,
  `opc` varchar(5) NOT NULL,
  `dpc` varchar(5) NOT NULL,
  `e1_capacity` int(11) NOT NULL,
  `status` varchar(15) NOT NULL,
  `log_date` date NOT NULL,
  `remark` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trunk_voip`
--

CREATE TABLE IF NOT EXISTS `trunk_voip` (
  `trunk` varchar(8) NOT NULL,
  `partner` text NOT NULL,
  `voip_gateway` varchar(64) NOT NULL,
  `connection` varchar(32) NOT NULL,
  `direction` varchar(8) NOT NULL,
  `vendor` varchar(64) NOT NULL,
  `mss` varchar(32) NOT NULL,
  `mgw` varchar(32) NOT NULL,
  `ip_partner` varchar(5) NOT NULL,
  `ip_xl` varchar(5) NOT NULL,
  `ip_realm` int(11) NOT NULL,
  `sa_name` varchar(64) NOT NULL,
  `e1_capacity` int(11) NOT NULL,
  `status` varchar(15) NOT NULL,
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
 ADD PRIMARY KEY (`msc_name`), ADD KEY `trunk_name` (`trunk_name`), ADD KEY `mgw_name` (`mgw_name`);

--
-- Indexes for table `bcu_id`
--
ALTER TABLE `bcu_id`
 ADD PRIMARY KEY (`name_mgw`);

--
-- Indexes for table `dummy_number`
--
ALTER TABLE `dummy_number`
 ADD PRIMARY KEY (`name_msc`);

--
-- Indexes for table `mip_reference`
--
ALTER TABLE `mip_reference`
 ADD PRIMARY KEY (`name_msc`);

--
-- Indexes for table `spc_address`
--
ALTER TABLE `spc_address`
 ADD PRIMARY KEY (`network_element`), ADD UNIQUE KEY `opc_nat1` (`opc_nat1`), ADD UNIQUE KEY `sc_address` (`sc_address`);

--
-- Indexes for table `trunk_interkoneksi`
--
ALTER TABLE `trunk_interkoneksi`
 ADD PRIMARY KEY (`trunk`), ADD KEY `mgw` (`mgw`), ADD KEY `mss` (`mss`);

--
-- Indexes for table `trunk_voip`
--
ALTER TABLE `trunk_voip`
 ADD PRIMARY KEY (`trunk`), ADD KEY `mss` (`mss`), ADD KEY `mgw` (`mgw`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
