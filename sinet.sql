-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2015 at 08:25 AM
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
  `mgw_name` varchar(32) NOT NULL,
  `region` varchar(32) NOT NULL,
  `location` text NOT NULL,
  `status` varchar(50) DEFAULT NULL,
  `log_date` date NOT NULL,
  `remark` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bcu_id`
--

INSERT INTO `bcu_id` (`mgw_name`, `region`, `location`, `status`, `log_date`, `remark`) VALUES
('MGAC101', 'SUMATERA', 'Aceh Bierun', '', '2015-06-17', ''),
('MGAC102', 'SUMATERA', 'Aceh Bierun', '', '2015-06-17', ''),
('MGBK101', 'SUMATERA', 'PdgHarapan, Bengkulu', '', '2015-06-17', ''),
('MGBT101', 'SUMATERA', 'Batam Center', '', '2015-06-17', ''),
('MGBT102', 'SUMATERA', 'Batam Tiban', '', '2015-06-17', ''),
('MGJB101', 'SUMATERA', 'Jambi', '', '2015-06-17', ''),
('MGJB201', 'SUMATERA', 'Jambi Pandiarang', '', '2015-06-17', ''),
('MGJB202', 'SUMATERA', 'Pandiarang', '', '2015-06-17', ''),
('MGJKT01', 'TRIAL(dismantled)', 'Graha XL', '', '2015-06-16', ''),
('MGJKT02', 'TRIAL(dismantled)', 'Pancoran', '', '2015-06-16', ''),
('MGLK101', 'SUMATERA', 'Lubuk Karet', '', '2015-06-17', ''),
('MGLK102', 'SUMATERA', 'Lubuk Karet', '', '2015-06-17', ''),
('MGMD201', 'SUMATERA', 'Tanjung Morawa', '', '2015-06-17', 'Vmgw to MSMD5'),
('MGMD301', 'SUMATERA', 'Helvetia', '', '2015-06-16', ''),
('MGMD302', 'SUMATERA', 'Kisaran', '', '2015-06-16', ''),
('MGMD401', 'SUMATERA', 'Tanjung Morawa', '', '2015-06-17', ''),
('MGMD402', 'SUMATERA', 'Helvetia', '', '2015-06-17', ''),
('MGMD501', 'SUMATERA', 'Tanjung Morawa', '', '2015-06-17', ''),
('MGMD502', 'SUMATERA', 'Helvetia', '', '2015-06-17', ''),
('MGMD601', 'SUMATERA', 'Kisaran', '', '2015-06-17', ''),
('MGMD602', 'SUMATERA', 'Balige Medan', '', '2015-06-17', ''),
('MGNT101', 'SUMATERA', 'Natar, Lampung', '', '2015-06-17', ''),
('MGPB201', 'SUMATERA', 'Palembang', '', '2015-06-16', ''),
('MGPB202', 'SUMATERA', 'Kayuagung', '', '2015-06-16', ''),
('MGPB301', 'SUMATERA', 'Prabumulih', '', '2015-06-16', ''),
('MGPB401', 'SUMATERA', 'Palembang Office', '', '2015-06-16', ''),
('MGPB402', 'SUMATERA', 'Prabumulih', '', '2015-06-16', ''),
('MGPB501', 'SUMATERA', 'Kayuagung', '', '2015-06-16', ''),
('MGPB502', 'SUMATERA', 'Palembang Office', '', '2015-06-16', ''),
('MGPB601', 'SUMATERA', 'Palembang Office', '', '2015-06-16', ''),
('MGPB602', 'SUMATERA', 'Lahat', '', '2015-06-16', ''),
('MGPD101', 'SUMATERA', 'Padang Tabing', '', '2015-06-16', 'PLAN: Cutover GCP from MSPK1 to MSPD1'),
('MGPD301', 'SUMATERA', 'HUT Pd. Luar', '', '2015-06-16', ''),
('MGPD302', 'SUMATERA', 'HUT Lubuk Alung', '', '2015-06-16', ''),
('MGPD401', 'SUMATERA', 'HUT Pd. Luar', '', '2015-06-16', ''),
('MGPK101', 'SUMATERA', 'Pekanbaru Office', '', '2015-06-16', ''),
('MGPK102', 'SUMATERA', 'Pekanbaru Office', '', '2015-06-16', ''),
('MGPK201', 'SUMATERA', 'Pekanbaru Office', '', '2015-06-16', ''),
('MGPK202', 'SUMATERA', 'Pekanbaru Office', '', '2015-06-16', ''),
('MGSBY01', 'TRIAL(dismantled)', 'Surabaya Office', '', '2015-06-16', ''),
('MSAC1', 'SUMATERA', 'Aceh Bierun', '', '2015-06-17', ''),
('MSBK1', 'SUMATERA', 'PdgHarapan, Bengkulu', '', '2015-06-17', ''),
('MSBT1', 'SUMATERA', 'Batam Center', '', '2015-06-17', ''),
('MSJB1', 'SUMATERA', 'Jambi Pandiarang', '', '2015-06-17', ''),
('MSJB2', 'SUMATERA', 'Jambi Pandiarang', '', '2015-06-17', ''),
('MSJKT', 'TRIAL(dismantled)', 'Graha XL', '', '2015-06-16', ''),
('MSMD2', 'SUMATERA', 'Tanjung Morawa', '', '2015-06-16', ''),
('MSMD3', 'SUMATERA', 'Helvetia', '', '2015-06-16', ''),
('MSMD4', 'SUMATERA', 'Tanjung Morawa', '', '2015-06-16', ''),
('MSPB2', 'SUMATERA', 'Palembang', '', '2015-06-16', ''),
('MSPB4', 'SUMATERA', 'Palembang Office', '', '2015-06-16', ''),
('MSPB5', 'SUMATERA', 'Kayuagung', '', '2015-06-16', ''),
('MSPD1', 'SUMATERA', 'Padang Tabing', '', '2015-06-16', ''),
('MSPD3', 'SUMATERA', 'HUT Pd. Luar', '', '2015-06-16', ''),
('MSPK1', 'SUMATERA', 'Pekanbaru Office', '', '2015-06-16', ''),
('MSPK2', 'SUMATERA', 'Pekanbaru Office', '', '2015-06-16', '');

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
  `bcu_id` varchar(32) NOT NULL,
  `old_mss_connected` varchar(32) DEFAULT NULL,
  `new_mss_connected` varchar(32) DEFAULT NULL,
  `remark` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mgw_bcu_id`
--

INSERT INTO `mgw_bcu_id` (`mgw_name`, `bcu_id`, `old_mss_connected`, `new_mss_connected`, `remark`) VALUES
('MGPK101', '101', 'MSPK1', '', ''),
('MGBT101', '103', 'MSPK1', '', ''),
('MGPD101', '104', 'MSPK1', '', ''),
('MGMD301', '107', 'MSMD3', '', ''),
('MGAC101', '108', 'MSMD3', '', ''),
('MGBT102', '109', 'MSBT1', '', ''),
('MGPK102', '110', 'MSPK1', '', ''),
('MGLK101', '112', 'MSJB1', '', ''),
('MGBK101', '113', 'MSBK1', '', ''),
('MGMD302', '115', 'MSMD3', '', ''),
('MGMD401', '117', 'MSMD4', '', ''),
('MGPB301', '118', 'MSPB3', '', ''),
('MGPB401', '119', 'MSPB4', '', 'GCP Cutover from MSPB2 to MSPB3'),
('MGPB402', '120', 'MSPB4', '', ''),
('MGJB201', '121', 'MSJB2', '', ''),
('MGLK102', '125', 'MSJB2', '', ''),
('MGMD402', '127', 'MSMD4', '', ''),
('MGMD501', '128', 'MSMD5', '', ''),
('MGMD401', '129', 'MSPD1', '', 'CO BMDN13A/B'),
('MGMD502', '130', 'MSMD5', '', ''),
('MGMD201', '131', '', '', 'vmgw BMDN7A to MSPD1'),
('MGPK201', '132', 'MSPK2', '', ''),
('MGMD401', '133', 'MSBT1', '', 'vmgw BMDN13A/B'),
('MGPB502', '135', 'Pool', '', ''),
('MGMD601', '136', 'MSMD6', '', ''),
('MGMD601', '138', 'MSMD7', '', ''),
('MGPK202', '139', '', '', ''),
('MGPB601', '140', '', '', ''),
('MGPB602', '141', 'Pool', '', ''),
('MGPK101', '151', 'MSPK1', '', 'new BCUID for Virtual MGW to PSTN '),
('MGMD201', '152', '', 'MSMD2', 'Cutover GCP from MSPK1 to MSMD2'),
('MGPD101', '153', '', 'MSPD1', ''),
('MGBT101', '154', '', 'MSBT1', 'PLAN: Cutover GCP from MSPK1 to MSBT1'),
('MGJB101', '155', '', 'MSJB1', 'done : Cutover GCP from MSPB2 to MSJB1'),
('MGAC101', '157', '', 'MSAC1', 'PLAN: Cutover GCP from MSMD3 to MSAC1'),
('MGLK101', '158', 'MSJB1', 'MSPD1', 'TEMP: Cutover GCP from MSJB1 to MSPD1'),
('MGPB501', '159', 'MSPB5', '', ''),
('MGJB202', '162', '', '', ''),
('MGPD301', '170', '', '', ''),
('MGPD302', '171', '', '', ''),
('MGMD201', '172', '', '', 'MSAC1'),
('MGAC102', '173', '', '', ''),
('MGPD401', '174', '', '', ''),
('MGMD602', '176', '', '', ''),
('MGPB202', '199', 'MSPB2', '', ''),
('MGJKT01', '301', '', '', ''),
('MGJKT02', '302', '', '', ''),
('MGSBY01', '401', '', '', ''),
('MGNT101', 'not set', 'MSJB1', 'GPG CO', 'TEMP: Cutover GCP from MSLP3 to MSJB1');

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
-- Table structure for table `rnc_reference`
--

CREATE TABLE IF NOT EXISTS `rnc_reference` (
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
-- Table structure for table `spc_address`
--

CREATE TABLE IF NOT EXISTS `spc_address` (
  `network_id` varchar(32) NOT NULL,
  `location` text NOT NULL,
  `provinsi` varchar(32) DEFAULT NULL,
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
 ADD PRIMARY KEY (`bcu_id`), ADD KEY `mgw_name` (`mgw_name`);

--
-- Indexes for table `mip_reference`
--
ALTER TABLE `mip_reference`
 ADD PRIMARY KEY (`mip_id`), ADD KEY `msc_name` (`msc_name`);

--
-- Indexes for table `rnc_reference`
--
ALTER TABLE `rnc_reference`
 ADD PRIMARY KEY (`rnc_id`), ADD KEY `mgw_name` (`mgw_name`), ADD KEY `msc_name` (`msc_name`);

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
-- AUTO_INCREMENT for table `rnc_reference`
--
ALTER TABLE `rnc_reference`
MODIFY `rnc_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

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
-- Constraints for table `rnc_reference`
--
ALTER TABLE `rnc_reference`
ADD CONSTRAINT `rnc_reference_ibfk_1` FOREIGN KEY (`msc_name`) REFERENCES `spc_address` (`network_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `rnc_reference_ibfk_2` FOREIGN KEY (`mgw_name`) REFERENCES `bcu_id` (`mgw_name`) ON DELETE CASCADE ON UPDATE CASCADE;

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
