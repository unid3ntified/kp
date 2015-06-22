-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2015 at 03:37 PM
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
-- Table structure for table `desc_network`
--

CREATE TABLE IF NOT EXISTS `desc_network` (
`id` int(11) NOT NULL,
  `network_element_id` varchar(100) NOT NULL,
  `opc_nat0` varchar(20) DEFAULT NULL,
  `opc_nat1` varchar(20) DEFAULT NULL,
  `desc_network` text,
  `inat0` varchar(20) DEFAULT NULL,
  `second_opc` varchar(20) DEFAULT NULL,
  `third_opc` varchar(20) DEFAULT NULL,
  `fourth_opc` varchar(20) DEFAULT NULL,
  `fifth_opc` varchar(20) DEFAULT NULL,
  `sixth_opc` varchar(20) DEFAULT NULL,
  `log_date` date DEFAULT NULL,
  `remark` text
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `desc_network`:
--   `network_element_id`
--       `network_element` -> `network_element_id`
--

-- --------------------------------------------------------

--
-- Table structure for table `mgw`
--

CREATE TABLE IF NOT EXISTS `mgw` (
  `bcu_id` varchar(20) NOT NULL,
  `mgw_name` varchar(100) NOT NULL,
  `region` varchar(80) NOT NULL,
  `old_mss_connected` varchar(20) DEFAULT NULL,
  `new_mss_connected` varchar(20) DEFAULT NULL,
  `status` varchar(30) NOT NULL,
  `log_date` date DEFAULT NULL,
  `remark` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `mgw`:
--   `mgw_name`
--       `network_element` -> `network_element_id`
--

-- --------------------------------------------------------

--
-- Table structure for table `msc`
--

CREATE TABLE IF NOT EXISTS `msc` (
  `msc_name` varchar(100) NOT NULL,
  `cnid` varchar(20) NOT NULL,
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
  `mgw_proxyA_flex` varchar(10) NOT NULL,
  `mgw_managerA_circuit` varchar(10) NOT NULL,
  `status` varchar(30) NOT NULL,
  `log_date` date DEFAULT NULL,
  `remark` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `msc`:
--   `msc_name`
--       `network_element` -> `network_element_id`
--

-- --------------------------------------------------------

--
-- Table structure for table `network_element`
--

CREATE TABLE IF NOT EXISTS `network_element` (
  `network_element_id` varchar(100) NOT NULL,
  `gt_address` varchar(20) DEFAULT NULL,
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

INSERT INTO `network_element` (`network_element_id`, `gt_address`, `location`, `provinsi`, `vendor`, `gtt`, `status`, `log_date`, `remark`) VALUES
('Application group SCP', NULL, 'not set', 'not set', 'not set', '62818445173', 'In Service', NULL, NULL),
('Application Group SCP Test MLR', '62818445153', 'not set', 'not set', 'not set', NULL, 'In Service', '0000-00-00', NULL),
('BTR-MMX11', '62818445762', 'not set', 'not set', 'not set', NULL, 'In Service', '0000-00-00', '25/08/2009 (changed from STP29)'),
('BTR-MMX12', NULL, 'not set', 'not set', 'not set', '62818445131', 'In Service', NULL, NULL),
('CMX-JKT-MMX01', '62818445057', 'graha XL', 'not set', 'not set', NULL, 'In Service', '0000-00-00', 'Mitha/GXL/12 April 2010'),
('CMX-JKT-MMX02', '62818445058', 'graha XL', 'not set', 'not set', NULL, 'In Service', '0000-00-00', 'Mitha/GXL/12 April 2010'),
('CMX-JKT-MMX03', '62818445081', 'graha XL', 'not set', 'not set', NULL, 'In Service', '0000-00-00', 'Mitha/GXL/12 April 2010'),
('CMX-JKT-MMX04', '62818445082', 'graha XL', 'not set', 'not set', NULL, 'In Service', '0000-00-00', 'Mitha/GXL/12 April 2010'),
('CMX-JKT-SCP01', '62818445049', 'graha XL', 'not set', 'not set', NULL, 'In Service', '0000-00-00', 'Mitha/GXL/12 April 2010'),
('CMX-JKT-SCP02', '62818445051', 'graha XL', 'not set', 'not set', NULL, 'In Service', '0000-00-00', 'Mitha/GXL/12 April 2010'),
('CMX-JKT-SCP03', '62818445052', 'graha XL', 'not set', 'not set', NULL, 'In Service', '0000-00-00', 'Mitha/GXL/12 April 2010'),
('CMX-JKT-SCP04', '62818445084', 'graha XL', 'not set', 'not set', NULL, 'In Service', '0000-00-00', 'Mitha/GXL/12 April 2010'),
('DRC-uipjkt01', '628184422539', 'not set', 'not set', 'not set', NULL, 'In Service', '0000-00-00', NULL),
('DRC-uipjkt02', NULL, 'not set', 'not set', 'not set', NULL, 'In Service', '0000-00-00', NULL),
('DRC-uipjkt03', NULL, 'not set', 'not set', 'not set', NULL, 'In Service', '0000-00-00', NULL),
('FNRJKT1', '628184422997', 'cibitung', 'not set', 'HUAWEI', NULL, 'In Service', NULL, 'tono'),
('FNRSBY1', '628184425997', 'SNB', 'not set', 'HUAWEI', NULL, 'In Service', NULL, 'tono'),
('HBDPS1', NULL, 'Sunset Road', 'BALI', 'HUAWEI', NULL, 'In Service', NULL, NULL),
('HBJKT1', '628184429900', 'Cibitung', 'JAKARTA', 'HUAWEI', NULL, 'In Service', NULL, 'old:  628184422902'),
('HBJKT2', '628184429903', 'Cibitung', 'JAKARTA', 'HUAWEI', NULL, 'In Service', NULL, NULL),
('HBMDN1', NULL, 'Tanjung Morawa', 'MEDAN', 'HUAWEI', NULL, 'In Service', NULL, NULL),
('HBMKS1', '628184429920', 'KIMA', 'SULAWESI SELATAN', 'HUAWEI', NULL, 'In Service', NULL, NULL),
('HBPLB1', '628184429910', 'Palembang Office', 'PALEMBANG', 'HUAWEI', NULL, 'In Service', NULL, 'old:628184421902'),
('HBSBY1', NULL, 'SNB', 'JAWA TIMUR', 'HUAWEI', NULL, 'In Service', NULL, 'old: 628184425902'),
('HBSBY2', '628184429906', 'SNB', 'JAWA TIMUR', 'HUAWEI', NULL, 'In Service', NULL, 'Temporary/TonoA), old: 628184429903,'),
('HFDPS1', '628184429922', 'Sunset Road', 'BALI', 'HUAWEI', NULL, 'In Service', NULL, 'old: 628184426901'),
('HFJKT1', '628184429901', 'Cibitung', 'JAKARTA', 'HUAWEI', NULL, 'In Service', NULL, 'old: 628184422901'),
('HFJKT2', '628184429904', 'Cibitung', 'JAKARTA', 'HUAWEI', NULL, 'In Service', NULL, NULL),
('HFMDN1', '628184429912', 'Tanjung Morawa', 'MEDAN', 'HUAWEI', NULL, 'In Service', NULL, 'old: 628184421901'),
('HFMKS1', '628184429921', 'KIMA', 'SULAWESI SELATAN', 'HUAWEI', NULL, 'In Service', NULL, 'old: 628184425903'),
('HFPLB1', '628184429911', 'Palembang Office', 'PALEMBANG', 'HUAWEI', NULL, 'In Service', NULL, 'old: 628184421901'),
('HFSBY1', '628184429902', 'SNB', 'JAWA TIMUR', 'HUAWEI', NULL, 'In Service', NULL, 'old: 628184425901'),
('HFSBY2', '628184429905', 'SNB', 'JAWA TIMUR', 'HUAWEI', NULL, 'In Service', NULL, NULL),
('HLR-M2Mcloud1', '628184429930', 'akala', 'not set', 'Ericsson', NULL, 'In Service', '0000-00-00', 'Tono'),
('HLR-M2Mcloud2', '628184429931', 'amsterdam', 'not set', 'Ericsson', NULL, 'In Service', NULL, NULL),
('HLR-M2Mcloud3', '628184429932', 'Virtual', 'not set', 'Ericsson', NULL, 'In Service', NULL, NULL),
('HLR10', '62818445112', 'not set', 'not set', 'ERICSSON', NULL, 'In Service', NULL, NULL),
('HLR11', '62818445094', 'not set', 'not set', 'ERICSSON', NULL, 'In Service', NULL, NULL),
('HLR12', '62818445095', 'not set', 'not set', 'ERICSSON', NULL, 'In Service', NULL, NULL),
('HLR13', '62818445093', 'not set', 'not set', 'ERICSSON', 'CANGT', 'In Service', NULL, NULL),
('HLR15', '62818445096', 'JOMBANG RAWA', 'JAKARTA', 'ERICSSON', NULL, 'In Service', NULL, NULL),
('HLR16', '62818445097', 'not set', 'not set', 'ERICSSON', NULL, 'In Service', NULL, NULL),
('HLR17', '62818445098', 'not set', 'not set', 'ERICSSON', NULL, 'In Service', NULL, NULL),
('HLR18', '62818445110', 'not set', 'not set', 'ERICSSON', NULL, 'In Service', NULL, NULL),
('HLR19', '62818445099', 'not set', 'not set', 'ERICSSON', NULL, 'In Service', NULL, NULL),
('HLR20', '62818445756', 'SANUR', 'BALI', 'ERICSSON', NULL, 'In Service', NULL, NULL),
('HLR21', '62818445757', 'Sumur Welut', 'JAWA TIMUR', 'ERICSSON', NULL, 'In Service', NULL, NULL),
('HLR22', '62818445758', 'Palembang', 'PALEMBANG', 'ERICSSON', NULL, 'In Service', NULL, NULL),
('HLR23', '62818445759', 'Pathok', 'YOGJAKARTA', 'ERICSSON', NULL, 'In Service', NULL, NULL),
('HLR24', '62818445855', 'Kediri', 'JAWA TIMUR', 'ERICSSON', NULL, 'In Service', NULL, NULL),
('HLR25', '62818445856', 'Cirebon', 'JAWA BARAT', 'ERICSSON', NULL, 'In Service', NULL, NULL),
('HLR26', '62818445857', 'Bintaro', 'JAKARTA', 'ERICSSON', NULL, 'In Service', NULL, NULL),
('HLR9', '62818445019', 'not set', 'not set', 'ERICSSON', NULL, 'In Service', NULL, NULL),
('HLRUDC', '62818445904', 'Jakarta', 'JAKARTA', 'ERICSSON', NULL, 'In Service', NULL, NULL),
('HostofHLR-S', '62818446022', 'not set', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('HSBD3', '62818446014', 'BNB', 'BANDUNG', 'ERICSSON', NULL, 'In Service', NULL, NULL),
('HSJK9', '62818446013', 'Bintaro', 'JAKARTA', 'ERICSSON', NULL, 'In Service', NULL, NULL),
('HSSB4', '62818444301', 'SNB', 'SURABAYA', 'ERICSSON', NULL, 'In Service', NULL, NULL),
('IDP USSD Collect Call', '62818446023', 'not set', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('IN Application eServ', '62818445173', 'not set', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('IN Application USSD Activation', NULL, 'not set', 'not set', 'not set', '62818445236', 'In Service', NULL, NULL),
('MGAB101', NULL, 'Ambon, MGAB101', 'not set', 'not set', NULL, 'In Service', NULL, '9358 (M3UA Agent NAT-1)'),
('MGAC101', NULL, 'Aceh, Bireuen', 'not set', 'not set', NULL, 'In Service', NULL, '9351 (NAT0 m3ua agent BSC)\r\n9577 (dual stack)\r\n114 (V-MSC MPP)\r\n 9896 (triple stack)'),
('MGAC102', NULL, 'Aceh, Bireuen', 'not set', 'not set', NULL, 'In Service', NULL, '9750 (stack1)\r\n9751 (m3ua agent) \r\n9752 (stack2)\r\n9897 (triple stack)\r\n115 (V-MSC MPP)'),
('MGAC201', NULL, 'Aceh Bireun', 'not set', 'not set', NULL, 'planned', '0000-00-00', '(PLANNED Ferry 24/12/2014)'),
('MGAC202', NULL, 'Aceh Bireun', 'not set', 'not set', NULL, 'planned', '0000-00-00', '(PLANNED Ferry 24/12/2014)'),
('MGBA101', NULL, 'Bangkalan', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MGBA102', NULL, 'Bangkalan', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MGBA201', NULL, 'Bangkalan', 'JAWA TIMUR', 'not set', NULL, 'In Service', NULL, NULL),
('MGBB201', NULL, 'Gabek,', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MGBB202', NULL, 'Gabek, MGBB202', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MGBB301', NULL, 'TanjungPandan', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MGBD201', NULL, 'Kiara Condong', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MGBD202', NULL, 'Bandung Office', 'not set', 'not set', NULL, 'In Service', NULL, '7376 (Dual Stack)'),
('MGBD301', NULL, 'Bandung Office', 'not set', 'not set', NULL, 'In Service', NULL, '5250 (for nat-1 M3UA agent)\r\n9354 (M3UA agent)\r\n9447 (new VMGW2 TSBD3)'),
('MGBD501', NULL, 'Bandung Office', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MGBD502', NULL, 'Bandung Office', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MGBD601', NULL, 'Bandung new office', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MGBD602', NULL, 'BNB', 'not set', 'not set', NULL, 'In Service', NULL, '7430 (dual stack)\r\n7431 (triple stack)'),
('MGBD701', NULL, 'BNB', 'not set', 'not set', NULL, 'In Service', NULL, '7510(dual stack)\r\n7511(triple stack)'),
('MGBD702', NULL, 'BNB', 'not set', 'not set', NULL, 'In Service', NULL, '7513 (dual stack)\r\n7514 (triple stack)'),
('MGBD801', NULL, 'BNB', 'JAWA BARAT', 'not set', NULL, 'In Service', NULL, NULL),
('MGBJ201', NULL, 'BJM Office, MGBJ201', 'not set', 'not set', NULL, 'In Service', NULL, '11394 (M3UA Agent)'),
('MGBJ202', NULL, 'Benua anyar,MGBJ202', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MGBK201', NULL, 'Pd. Harapan,', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MGBL101', NULL, 'Blitar', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MGBM101', NULL, 'Bulumakadae, MGBM101', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MGBP301', NULL, 'Balikpapan, MGBP301', 'not set', 'not set', NULL, 'In Service', NULL, '11393/M3UA Agent'),
('MGBP302', NULL, 'Balikpapan, MGBP302', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MGBR101', NULL, 'Brebes', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MGBT101', NULL, 'Batam', 'not set', 'not set', NULL, 'In Service', NULL, '9220 (NAT0 m3ua agent BSC)\r\n9658 (dual stack)\r\n9884 (triple stack)\r\n101 (V-MSC MPP)'),
('MGBT102', NULL, 'Batam Center', 'not set', 'not set', NULL, 'In Service', NULL, '9265  (nat-1 m3ua agent)\r\n9361 (NAT0 m3ua agent BSC)\r\n9659 (dual stack)\r\n9885 (triple stack)\r\n102 (V-MSC MPP)'),
('MGBT201', NULL, 'Batam Center', 'not set', 'not set', NULL, 'planned', '0000-00-00', 'PLANNED Ferry (24/12/2014)'),
('MGBT202', NULL, 'Batam Center', 'not set', 'not set', NULL, 'planned', '0000-00-00', 'PLANNED Ferry (24/12/2014)'),
('MGBY101', NULL, 'Banyuwangi', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MGCH101', NULL, 'Cimahi', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MGCH102', NULL, 'Cimahi/2011', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MGCH201', NULL, 'Cimahi HUT', 'JAWA BARAT', 'not set', NULL, 'In Service', NULL, NULL),
('MGCI101', NULL, 'Cirebon Pegambiran', 'not set', 'not set', NULL, 'In Service', NULL, '9534 (M3UA)'),
('MGCI102', NULL, 'HUT Cirebon/2011', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MGCJ101', NULL, 'Cianjur101 (Cianjur)', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MGCJ102', NULL, 'Cianjur', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MGCL101', NULL, 'Cilacap101', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MGCL102', NULL, 'Cilacap102', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MGCL201', NULL, 'Cilacap', 'JAWA TENGAH', 'not set', NULL, 'In Service', NULL, NULL),
('MGCM101', NULL, 'Ciamis', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MGDK101', NULL, 'Demak', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MGDP201', NULL, 'Denpasar Office', 'not set', 'not set', NULL, 'In Service', NULL, '7306 (for nat-1 M3UA agent)'),
('MGDP202', NULL, 'Pemecutan Klod', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MGDP301', NULL, 'Sanur', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MGDP302', NULL, 'Penatih', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MGDP401', NULL, 'Denpasar401 (Office)', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MGDP402', NULL, 'Denpasar402 (Sanur)', 'not set', 'not set', NULL, 'In Service', NULL, '7411 (dual stack)\r\n7412 (triple stack)'),
('MGDP501', NULL, 'Denpasar501 (Office)', 'not set', 'not set', NULL, 'In Service', NULL, '7471 (dual stack)\r\n7472 (triple stack)'),
('MGGO101', NULL, 'Tumba , MGGO101', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MGGU101', NULL, 'Garut/2011', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MGJ1001', NULL, 'Bintaro office', 'JAKARTA', 'not set', NULL, 'In Service', NULL, '7364 (for BSC Training Huawei)'),
('MGJ1002', NULL, 'Parung Panjang', 'JAKARTA', 'not set', NULL, 'In Service', NULL, NULL),
('MGJ1601', NULL, 'Serang', 'JAKARTA', 'not set', NULL, 'In Service', NULL, NULL),
('MGJ1901', NULL, 'MGJ1901', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MGJ1902', NULL, 'MGJ1902', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MGJ2001', NULL, 'MGJ2001', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MGJ2002', NULL, 'MGJ2002', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MGJ2101', NULL, 'Labuhan', 'JAKARTA', 'not set', NULL, 'In Service', NULL, NULL),
('MGJ2102', NULL, 'Labuhan', 'JAKARTA', 'not set', NULL, 'In Service', NULL, NULL),
('MGJ2301', NULL, 'Jakarta2301 (Kp. Koang)', 'JAKARTA', 'not set', NULL, 'In Service', NULL, NULL),
('MGJ2401', NULL, 'Jakarta2401 (Sukapura)', 'JAKARTA', 'not set', NULL, 'In Service', NULL, '9720  (dual stack=GCP\r\n9722         (dual stack=BSSAP/RANAP)'),
('MGJ2402', NULL, 'Jakarta2402 (Ancol)', 'JAKARTA', 'not set', NULL, 'In Service', NULL, '9933 (GCP)\r\n9934 (BSSAP/RANAP)\r\n9935 (BSSAP/RANAP)'),
('MGJ2501', NULL, 'Jakarta2501 (Raya Bitung)', 'JAKARTA', 'not set', NULL, 'In Service', NULL, '9819 (GCP)\r\n9820 (BSSAP/RANAP)\r\n9821 (BSSAP/RANAP)'),
('MGJ2502', NULL, 'Mampang/2011', 'JAKARTA', 'not set', NULL, 'In Service', NULL, NULL),
('MGJ2601', NULL, 'Jakarta2601(Cibitung)', 'JAKARTA', 'not set', NULL, 'In Service', NULL, '9927 (GCP)\r\n9928 (BSSAP/RANAP)\r\n9929 (BSSAP/RANAP)'),
('MGJ2602', NULL, 'Jakarta2602 (Cibitung)', 'JAKARTA', 'not set', NULL, 'In Service', NULL, '9930 (GCP)\r\n9931 (BSSAP/RANAP)\r\n9932 (BSSAP/RANAP)'),
('MGJ2701', NULL, 'MGJ2701', 'not set', 'not set', NULL, 'In Service', NULL, '5284 (M3UA Agent NAT-1)'),
('MGJ2802', NULL, 'Kemang/2011', 'JAKARTA', 'not set', NULL, 'In Service', NULL, NULL),
('MGJ2901', NULL, 'Jatinegara/2011', 'JAKARTA', 'not set', NULL, 'In Service', NULL, NULL),
('MGJ2902', NULL, 'Ampera/2011', 'JAKARTA', 'not set', NULL, 'In Service', NULL, NULL),
('MGJ3001', NULL, 'Cilegon/2011', 'JAKARTA', 'not set', NULL, 'In Service', NULL, NULL),
('MGJ3101', NULL, 'Anyer/2011', 'JAKARTA', 'not set', NULL, 'In Service', NULL, NULL),
('MGJ3102', NULL, 'Kalideres (Jabotabek)', 'JAKARTA', 'not set', NULL, 'In Service', NULL, NULL),
('MGJ3201', NULL, 'Cibitung', 'JAKARTA', 'not set', NULL, 'In Service', NULL, '7427 (dual stack)\r\n7428 (triple stack)'),
('MGJ3202', NULL, 'Cibitung', 'JAKARTA', 'not set', NULL, 'In Service', NULL, '7477 (dual stack)\r\n7481 (triple stack)'),
('MGJ3301', NULL, 'Serang', 'JAKARTA', 'not set', NULL, 'In Service', NULL, '7480 (dual stack)\r\n7484 (triple stack'),
('MGJ3302', NULL, 'Puspitek Serpong', 'JAKARTA', 'not set', NULL, 'In Service', NULL, '7483 (dual stack)\r\n7487 (triple stack)'),
('MGJ3401', NULL, 'Cempaka Putih', 'JAKARTA', 'not set', NULL, 'In Service', NULL, '7486 (dual stack)\r\n7490 (triple stack)'),
('MGJ3402', NULL, 'Cibitung', 'JAKARTA', 'not set', NULL, 'In Service', NULL, '7489 (dual stack)\r\n7493 (triple stack)'),
('MGJ3501', NULL, 'Supernode Kemang', 'JAKARTA', 'not set', NULL, 'In Service', NULL, '7492 (dual stack)\r\n7496 (triple stack)'),
('MGJB201', NULL, 'Pandearang,', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MGJB202', NULL, 'Pandearang, (2011)', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MGJE101', NULL, 'Jember', 'not set', 'not set', NULL, 'In Service', NULL, '9324 (for nat-1 M3UA agent)'),
('MGJE102', NULL, 'Puger-Jember', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MGJK1201', NULL, 'Pancoran', 'JAKARTA', 'not set', NULL, 'In Service', NULL, NULL),
('MGJK1202', NULL, 'Bantargebang', 'JAKARTA', 'not set', NULL, 'In Service', NULL, NULL),
('MGJK1301', NULL, 'Bintaro', 'JAKARTA', 'not set', NULL, 'In Service', NULL, '9430 (M3UA Agent'),
('MGJK1302', NULL, 'Anyer', 'JAKARTA', 'not set', NULL, 'In Service', NULL, '7368 (dual stack)'),
('MGJK1401', NULL, 'Kampongjoang', 'JAKARTA', 'not set', NULL, 'In Service', NULL, NULL),
('MGJK1402', NULL, 'Puspiptek Serpong', 'JAKARTA', 'not set', NULL, 'In Service', NULL, NULL),
('MGJK1501', NULL, 'Sukabumi', 'JAKARTA', 'not set', NULL, 'In Service', NULL, NULL),
('MGJK1502', NULL, 'Sukabumi', 'JAKARTA', 'not set', NULL, 'In Service', NULL, NULL),
('MGJK1701', NULL, 'Bintaro', 'JAKARTA', 'not set', NULL, 'In Service', NULL, '5268 (Nat-1 m3ua agent)'),
('MGJK1702', NULL, 'Bintaro', 'JAKARTA', 'not set', NULL, 'In Service', NULL, '5269 (Nat-1 m3ua agent)'),
('MGJK1801', NULL, 'Jakarta18 (Kby Lama)', 'JAKARTA', 'not set', NULL, 'In Service', NULL, '9346 (nat-1 m3ua agent)'),
('MGJK1802', NULL, 'Jakarta18 (Cempaka Putih)', 'JAKARTA', 'not set', NULL, 'In Service', NULL, NULL),
('MGJK501', NULL, 'Jombang Rawa', 'JAKARTA', 'not set', NULL, 'In Service', '0000-00-00', NULL),
('MGJK502', NULL, 'Pancoran', 'JAKARTA', 'not set', NULL, 'In Service', NULL, NULL),
('MGJK601', NULL, 'Jelambar', 'JAKARTA', 'not set', NULL, 'In Service', '0000-00-00', '7362 (dual stack'),
('MGJK602', NULL, 'Manggarai', 'JAKARTA', 'not set', NULL, 'In Service', NULL, '9205 (m3ua agent BSC TEST)\r\n7363 (dual stack)'),
('MGJK701', NULL, 'cibitung', 'JAKARTA', 'not set', NULL, 'In Service', NULL, '3212 (M3UA Agent Grha)\r\n3213 (M3UA Agent Grha)\r\n9490 (spc mgw for new VMGW TSJK7)'),
('MGJK702', NULL, 'Bintaro', 'JAKARTA', 'not set', NULL, 'In Service', NULL, '9348 (M3UA Agent Bintaro)'),
('MGJK801', NULL, 'Depok', 'JAKARTA', 'not set', NULL, 'In Service', NULL, NULL),
('MGJK802', NULL, 'Bogor', 'JAKARTA', 'not set', NULL, 'In Service', NULL, NULL),
('MGJK901', NULL, 'Bekasi', 'JAKARTA', 'not set', NULL, 'In Service', NULL, NULL),
('MGJK902', NULL, 'Ampera', 'JAKARTA', 'not set', NULL, 'In Service', NULL, NULL),
('MGJO101', NULL, 'Jombang', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MGJO102', NULL, 'Jombang', 'JAWA TIMUR', 'not set', NULL, 'In Service', NULL, NULL),
('MGJT101', NULL, 'Jatibarang', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MGJT102', NULL, 'Jatibarang/2011', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MGJT201', NULL, 'Jatibarang/2013', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MGJY101', NULL, 'Jayapura, MGJY101', 'not set', 'not set', NULL, 'In Service', NULL, '9357 (M3UA Agent NAT-1)'),
('MGKB101', NULL, 'Kebumen', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MGKB102', NULL, 'Kebumen Prembun', 'not set', 'not set', NULL, 'In Service', NULL, '7525 (dual stack)\r\n7526 (triple stack)'),
('MGKE102', NULL, 'Kendari, MGKE102', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MGKG102', NULL, 'mgbj', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MGKI101', NULL, 'Kediri', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MGKU201', NULL, 'Kupang, MGKU201', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MGLA101', NULL, 'Lamongan', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MGLP201', NULL, 'Kedaton,', 'not set', 'not set', NULL, 'In Service', NULL, '15499, 15495 (for NAT-1 M3UA Agent)\r\n9368   (for TDM connection)'),
('MGLP202', NULL, 'Lempuyang Bandar,', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MGLP401', NULL, 'Lempuyang Bandar,', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MGLP402', NULL, 'Natar, MGLP402 (2011)', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MGMA101', NULL, 'Madiun', 'not set', 'not set', NULL, 'In Service', NULL, '9241 (for nat-1 M3UA agent)'),
('MGMA102', NULL, 'Madiun', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MGMD201', NULL, 'Medan Tj Morawa', 'not set', 'not set', NULL, 'In Service', NULL, '13446 (for nat-1 M3UA agent), \r\n13440 (for NAT-1 NRS AXIS Medan)\r\n9221 (NAT0 m3ua agent BSC)\r\n9156 (NAT1 m3ua agent OLO), 9578 (dual stack)\r\n9157 (VMGW SPC)\r\n9890 (triple stack)\r\n106 (V-MSC MPP)'),
('MGMD301', NULL, 'Helvetia', 'not set', 'not set', NULL, 'In Service', NULL, '9263 (NAT0 m3ua agent BSC)\r\n9579 (dual stack)\r\n9891 (triple stack)\r\n107 (V-MSC MPP)'),
('MGMD302', NULL, 'Kisaran', 'not set', 'not set', NULL, 'In Service', NULL, '9264 (NAT0 m3ua agent BSC)\r\n9650 (dual stack)\r\n9892 (triple stack)\r\n108 (V-MSC MPP)'),
('MGMD401', NULL, 'Medan Tj. Morawa', 'not set', 'not set', NULL, 'In Service', NULL, '9456 (dual stack)\r\n9457 (m3ua agent)\r\n9893 (triple stack)\r\n109 (V-MSC MPP)'),
('MGMD402', NULL, 'Helvetia', 'not set', 'not set', NULL, 'In Service', NULL, '9773 (dual stack)\r\n9894 (triple stack)\r\n110 (V-MSC MPP)'),
('MGMD501', NULL, 'Tj. Morawa', 'not set', 'not set', NULL, 'In Service', NULL, '9651 (stack1, kearah MSC)\r\n9653 (m3ua agent, kearah BSC)\r\n9774 (stack2)\r\n111 (V-MSC MPP stack1) & 112 (V-MSC MPP stack2)'),
('MGMD502', NULL, 'Helvetia', 'not set', 'not set', NULL, 'In Service', NULL, '9657 (dual stack)\r\n9895 (triple stack)\r\n113 (V-MSC MPP)'),
('MGMD601', NULL, 'Kisaran', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MGMD602', NULL, 'Balige', 'not set', 'not set', NULL, 'In Service', NULL, '7516 (dual stack)\r\n7517 (triple stack)'),
('MGMD701', NULL, 'Medan Tjg Morawa', 'not set', 'not set', NULL, 'planned', '0000-00-00', 'PLANNED Ferry (24/12/2014)'),
('MGMD702', NULL, 'Medan Tjg Morawa', 'not set', 'not set', NULL, 'planned', '0000-00-00', 'PLANNED Ferry (24/12/2014)'),
('MGMD801', NULL, 'Medan Helvetia', 'not set', 'not set', NULL, 'planned', '0000-00-00', 'PLANNED Ferry (24/12/2014)'),
('MGMD802', NULL, 'Balige', 'not set', 'not set', NULL, 'planned', '0000-00-00', 'PLANNED Ferry (24/12/2014)'),
('MGMD901', NULL, 'Kisaran', 'not set', 'not set', NULL, 'planned', '0000-00-00', 'PLANNED Ferry (24/12/2014)'),
('MGMG101', NULL, 'Magelang', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MGMK301', NULL, 'Kima, MGMK301', 'not set', 'not set', NULL, 'In Service', NULL, '9347, 9345 (M3UA NAT1)\r\n9594 (for BSC MIP Sulawesi)'),
('MGMK302', NULL, 'Bulo2 , MGMK302', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MGML101', NULL, 'Malang', 'not set', 'not set', NULL, 'In Service', NULL, '7298 (for nat-1 M3UA agent)'),
('MGML102', NULL, 'Malang', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MGML201', NULL, 'Pagedangan (Malang)', 'not set', 'not set', NULL, 'In Service', NULL, '7424 (dual stack)\r\n7425 (triple stack)'),
('MGMO201', NULL, 'Manado, MGMO201', 'not set', 'not set', NULL, 'In Service', NULL, '9346(M3UA NAT1)'),
('MGOM101', NULL, 'Omben, Sampang', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MGPA101', NULL, 'Pamekasan Pamekasan', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MGPA102', NULL, 'Pamekasan Budaggan', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MGPA103', NULL, 'Pamekasan', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MGPA201', NULL, 'Budagan', 'not set', 'not set', NULL, 'In Service', NULL, '7398 (dual stack)\r\n7399 (triple stack)'),
('MGPA202', NULL, 'Budagan, Pamekasan', 'JAWA TIMUR', 'not set', NULL, 'In Service', NULL, NULL),
('MGPB401', NULL, 'Palembang Office,', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MGPB501', NULL, 'Kayu Agung,', 'not set', 'not set', NULL, 'In Service', NULL, '9465/VHE'),
('MGPB502', NULL, 'Palembang Office, MGPB502', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MGPB601', NULL, 'Palembang Office, MGPB601', 'not set', 'not set', NULL, 'In Service', NULL, '9964 (For RC100 to MSPB4)'),
('MGPB602', NULL, 'Lahat,MGPB602', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MGPD101', NULL, 'Padang', 'not set', 'not set', NULL, 'In Service', NULL, '9244 (for nat-1 M3UA agent)\r\n9222 (NAT0 m3ua agent BSC)\r\n9674 (dual stack)\r\n9675 (V-MSC MPP)'),
('MGPD301', NULL, 'Padang Luar,', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MGPD302', NULL, 'Lubuk Alung', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MGPD401', NULL, 'Padang Luar,', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MGPG101', NULL, 'Pemangkata MGPG101', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MGPK101', NULL, 'Pekanbaru Office', 'not set', 'not set', NULL, 'In Service', NULL, '15489 (for nat-1 M3UA agent)\r\n9225 (NAT0 m3ua agent BSC)\r\n9660 (dual stack)\r\n9886 (triple stack)\r\n103 (V-MSC MPP)'),
('MGPK102', NULL, 'Pekanbaru Office', 'not set', 'not set', NULL, 'In Service', NULL, '9266  (BSC m3ua agent)\r\n9661 (dual stack)\r\n9887 (triple stack)\r\n104 (V-MSC MPP)'),
('MGPK201', NULL, 'Pekanbaru Office', 'not set', 'not set', NULL, 'In Service', NULL, '9976 (stack1)\r\n9978 (m3ua agent)\r\n9979 (stack2)\r\n9889 (triple stack)\r\n105 (V-MSC MPP)'),
('MGPK202', NULL, 'Pekanbaru Office', 'not set', 'not set', NULL, 'In Service', NULL, '7442 (dual stack)\r\n7443 (triple stack)'),
('MGPK301', NULL, 'Pekanbaru \r\nNew Building', 'not set', 'not set', NULL, 'In Service', '0000-00-00', 'PLANNED Ferry'),
('MGPL101', NULL, 'Pekalongan', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MGPL102', NULL, 'Pekalongan', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MGPM101', NULL, 'Pemalang', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MGPO101', NULL, 'Purwodadi', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MGPR101', NULL, 'Purwokerto', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MGPR102', NULL, 'Purwokerto/2011', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MGPR201', NULL, 'Purwokerto', 'not set', 'not set', NULL, 'In Service', NULL, '7474 (dual stack)\r\n7475 (triple stack)'),
('MGPT102', NULL, 'Pontianak, MGPT102', 'not set', 'not set', NULL, 'In Service', NULL, '11395(M3UA NAT-1)'),
('MGPU102', NULL, 'Palu, MGPU102', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MGPW101', NULL, 'Purwakarta', 'not set', 'not set', NULL, 'In Service', NULL, '7366(dual stack)'),
('MGPW102', NULL, 'Purwakarta', 'not set', 'not set', NULL, 'In Service', NULL, '7389 (dual stack)\r\n7390 (triple stack)'),
('MGPY101', NULL, 'Palangkaraya Sebangau, MGPY101', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MGRK101', NULL, 'Rumak,Lombok Barat', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MGRK102', NULL, 'Rumak', 'not set', 'not set', NULL, 'In Service', NULL, '7436 (dual stack)\r\n7437 (triple stack)'),
('MGS1001', NULL, 'SNB', 'not set', 'not set', NULL, 'In Service', NULL, '7504 (dual stack)\r\n7505 (triple stack)'),
('MGSA101', NULL, 'Sampit, MGSA101', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MGSB301', NULL, 'SBY Office', 'not set', 'not set', NULL, 'In Service', NULL, '7304 (for nat-1 M3UA agent)'),
('MGSB302', NULL, 'Rungkut', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MGSB401', NULL, 'SBY Office', 'not set', 'not set', NULL, 'In Service', NULL, '7308 (for nat-1 M3UA agent), \r\n9128, 9243 (for nat-0 M3UA agent)\r\n9525 (New VMGW2-TSSB4)\r\n9715 (for nat-1 M3UA agent)'),
('MGSB501', NULL, 'Sumur Welut', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MGSB502', NULL, 'Surabaya502 (Smr. Welut)', 'not set', 'not set', NULL, 'In Service', NULL, '9529 (dual stack)'),
('MGSB601', NULL, 'Surabaya601 (SNB)', 'not set', 'not set', NULL, 'In Service', NULL, '9521 (dual stack)'),
('MGSB701', NULL, 'Surabaya701', 'not set', 'not set', NULL, 'In Service', NULL, '9541 (for nat-1 M3UA agent)\r\n9536 (GCP/Vmgw internal connection, terminasi GPB 6/7 dan GPB 10)\r\n9543 node yg belum support quasi-signalling dengan menggunakan M3UA agent (e.g. CRP, PRBT, IMGBUSOL, GOTN)\r\n9544 node yg support quasi-signalling (e.g. UIP, VMS)'),
('MGSB702', NULL, 'Surabaya702 (SNB)', 'not set', 'not set', NULL, 'In Service', NULL, '7315/Surabaya (for NAT-1 M3UA Agent; NRS Fadly 8 Nov''13)'),
('MGSB801', NULL, 'Surabaya801', 'not set', 'not set', NULL, 'In Service', NULL, '9539 Untuk GCP/Vmgw, terminasi GPB 6/7 dan (GPB 10 atau GPB 11)\r\n9540 (Untuk BSSAP/RANAP, terminasi di GPB 8/9)'),
('MGSB802', NULL, 'SNB/2011', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MGSB901', NULL, 'SNB', 'not set', 'not set', NULL, 'In Service', NULL, '7421 (dual stack)\r\n7422 (triple stack)'),
('MGSB902', NULL, 'SNB', 'not set', 'not set', NULL, 'In Service', NULL, '7501 (dual stack)\r\n7502 (triple stack)'),
('MGSD101', NULL, 'Situbondo', 'not set', 'not set', NULL, 'In Service', NULL, '7528 (dual stack)\r\n7529 (triple stack)'),
('MGSG102', NULL, 'Ampenan (Senggigi)', 'not set', 'not set', NULL, 'In Service', NULL, '7433 (dual stack)\r\n7434 (triple stack)'),
('MGSG201', '62818445647', 'Senggigi MGSG201', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MGSG202', NULL, 'Pengambengan', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MGSM101', NULL, 'Semarang', 'not set', 'not set', NULL, 'In Service', NULL, '5259 (for GCT),\r\n7367(Dual stack)\r\n 5265  (for nat-1 M3UA agent)'),
('MGSM102', NULL, 'Semarang, Poncol', 'not set', 'not set', NULL, 'In Service', NULL, '9349 (nat-1 m3ua agent)\r\n9491 (NAT0 m3ua agent BSC)'),
('MGSM201', NULL, 'Semarang, Alas Tuo', 'not set', 'not set', NULL, 'In Service', NULL, '7392 (dual stack)\r\n7393 (triple stack)'),
('MGSM202', NULL, 'GOMBEL SEMARANG', 'JAWA TENGAH', 'ERRICSON', NULL, 'In Service', NULL, NULL),
('MGSN101', NULL, 'Subang', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MGSN102', NULL, 'Subang/2011', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MGSO101', NULL, 'Solo', 'not set', 'not set', NULL, 'In Service', NULL, '5256 (for nat-1 M3UA agent)'),
('MGSO102', NULL, 'Solo/2011', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MGSP101', NULL, 'Sumenep', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MGST101', NULL, 'HUT Sangata, MGST101', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MGSU101', NULL, 'Sumbawa Besar MGSU101', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MGSU102', NULL, 'Sumbawa Besar MGSU102', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MGSU201', NULL, 'Sumbawa Besar', 'not set', 'not set', NULL, 'In Service', NULL, '7439 (dual stack)\r\n7440 (triple stack)'),
('MGSU202', NULL, 'Sumbawa Besar', 'not set', 'not set', NULL, 'In Service', NULL, '7507 (dual stack)\r\n7508 (triple stack)'),
('MGTE101', NULL, 'Terrara MGTE101', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MGTE102', NULL, 'Montongtangi MGTE102', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MGTE201', NULL, 'Montongtangi/2011', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MGTE202', NULL, 'Terara', 'not set', 'not set', NULL, 'In Service', NULL, '7408 (dual stack)\r\n7409 (triple stack)'),
('MGTG101', NULL, 'Tegal', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MGTG102', NULL, 'Tegal', 'not set', 'not set', NULL, 'In Service', NULL, '7395 (dual stack)\r\n7396 (triple stack)'),
('MGTS101', NULL, 'Tasikmalaya', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MGW1', NULL, 'not set', 'not set', 'not set', NULL, 'dismantled', NULL, NULL),
('MGW2', NULL, 'not set', 'not set', 'not set', NULL, 'dismantled', NULL, NULL),
('MGWL101', NULL, 'Weleri101', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MGWL102', NULL, 'Weleri102', 'not set', 'not set', NULL, 'In Service', NULL, '7418 (dual stack)\r\n7419 (triple stack)'),
('MGWN101', NULL, 'Wonosari101 (Wonosari)', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MGWTEST', NULL, 'MGWTEST (Graha XL 2F)', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MGYG201', NULL, 'Yogyakarta', 'not set', 'not set', NULL, 'In Service', NULL, '5252 (for nat-1 M3UA agent)\r\n9219 (nat-0 M3UA agent)\r\n7361 (dual stack)'),
('MGYG302', NULL, 'Yogyakarta Pathok', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MGYG401', NULL, 'Yogyakarta401 (Yogya Wates)', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MGYG402', NULL, 'Yogyakarta402 (Yogya Wates)', 'not set', 'not set', NULL, 'In Service', NULL, '7415 (dual stack)\r\n7416 (triple stack)'),
('MMGYG301', NULL, 'Yogyakarta Pathok', 'not set', 'not set', NULL, 'In Service', NULL, '9938 (for nat-1 M3UA agent)\r\n9716 (dual stack)\r\n9724 (second SPC for dual stack)'),
('MSAB1', '62818445852', 'Ambon, MSAB1', 'not set', 'not set', NULL, 'In Service', NULL, '9358/Jayapura\r\n9681 (VLR Backup)'),
('MSAB1 VHE', NULL, 'Ambon, MSAB1 VHE', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MSAC1', '62818445794', 'Aceh, Bireuen', 'not set', 'not set', NULL, 'In Service', NULL, '13447/Aceh'),
('MSAC2', NULL, 'Aceh, Bireuen', 'not set', 'not set', NULL, 'planned', '0000-00-00', '9975 (VLR Backup)\r\n(PLANNED Ferry 24/12/2014)'),
('MSB10', '628184425315', 'Surabaya10', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MSB11', '628184425316', 'SNB', 'JAWA TIMUR', 'not set', NULL, 'In Service', NULL, NULL),
('MSB12', '628184425317', 'SNB', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MSBB2', '62818440014', 'Gabek,', 'not set', 'not set', NULL, 'In Service', NULL, '9473/VHE\r\n98880(VLR backup)'),
('MSBB3', '628184420308', 'not set', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MSBD2', '628184423302', 'Bandung2 (Kiara Condong)', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MSBD4', '628184423301', 'Bandung4 (Bandung Office)', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MSBD5', '628184423300', 'Bandung5 (Bandung Office)', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MSBD6', '628184423303', 'Bandung6 (Bandung new office)', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MSBD7', '628184423309', 'BNB', 'JAWA BARAT', 'not set', NULL, 'In Service', NULL, NULL),
('MSBD8', '628184423310', 'BNB', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MSBD9', '628184423314', 'BNB', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MSBJ2', '62818445843', 'BJM Office, MSBJ2', 'not set', 'not set', NULL, 'In Service', NULL, '11394 (NAT1-BJM), 11400 (NAT-1 as STP)\r\n9583/VHE'),
('MSBK2', '62818440013', 'Pd. Harapan,', 'not set', 'not set', NULL, 'In Service', NULL, '9883(VLR backup)'),
('MSBM1', '62818445848', 'Bulumakadae, MSBM1', 'not set', 'not set', NULL, 'In Service', NULL, '9359 (M3UA Agent NAT-1) For NRS MAP\r\n9596 (VLR backup)'),
('MSBP3', '62818445845', 'Balikpapan, MSBP3', 'not set', 'not set', NULL, 'In Service', NULL, '11393/Balikpapan\r\n9582/VHE'),
('MSBT1', '62818445750', 'Batam Center', 'not set', 'not set', NULL, 'In Service', NULL, '15491 (Telkom Batam & others)\r\n5500 (NAT1 NRS Batam)'),
('MSBT2', NULL, 'SN Batam', 'not set', 'not set', NULL, 'planned', '0000-00-00', '9971 (VLR Backup)\r\nPLANNED Ferry (24/12/2014)'),
('MSC-S', '62818445053', 'Jakarta Temporary', 'JAKARTA', 'not set', NULL, 'dismantled', NULL, NULL),
('MSCH1', '628184423308', 'CIMAHI', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MSCI1', '628184423311', 'Cirebon Pegambiran', 'not set', 'not set', NULL, 'In Service', NULL, '5278/Cirebon POI Isat Cell&Fixed'),
('MSCI2', '628184423307', 'CIREBON', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MSCM1', '62818445935', 'Ciamis', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MSCTEST', '628184422299', 'MSCTEST (Graha XL 2F)', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MSDP2', '628184426301', 'Denpasar2 (Denpasar Office)', 'not set', 'not set', NULL, 'In Service', NULL, '7305/Denpasar \r\n7314 (NAT1 NRS Denpasar)'),
('MSDP3', '628184426302', 'Denpasar3 (Sanur)', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MSDP4', '628184426306', 'Denpasar4 (Office)', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MSDP5', '628184426307', 'DPS OFFICE', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MSDP6', '628184426309', 'DENPASAR OFFICE', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MSJ16', '628184422005', 'Jakarta16 (Anyer)', 'JAKARTA', 'not set', NULL, 'In Service', NULL, '5276/Serang'),
('MSJ18', '628184422004', 'Jakarta18 (Kby Lama)', 'JAKARTA', 'not set', NULL, 'In Service', NULL, NULL),
('MSJ21', '628184422016', 'Labuhan, Banten', 'JAKARTA', 'not set', NULL, 'In Service', NULL, NULL),
('MSJ23', '628184422012', 'Jakarta23 (KampongKoang)', 'JAKARTA', 'not set', NULL, 'In Service', NULL, NULL),
('MSJ24', '628184422011', 'BINTARO', 'JAKARTA', 'not set', NULL, 'In Service', NULL, NULL),
('MSJ25', '628184422602', 'CIBITUNG', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MSJ26', '628184422017', 'CIBITUNG', 'not set', 'not set', NULL, 'In Service', NULL, '7445 (NAT-0 VHE)'),
('MSJ28', '628184422018', 'CIBITUNG', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MSJ29', '628184422019', 'CIBITUNG', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MSJ30', '628184422020', 'CIBITUNG', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MSJB2', '62818440011', 'Pandearang,', 'not set', 'not set', NULL, 'In Service', NULL, '9267  (nat-1 m3ua agent), 15497 (POI)\r\n9460/VHE\r\n9878(VLR Backup)'),
('MSJE1', '628184425300', 'Jember', 'not set', 'not set', NULL, 'In Service', NULL, '7312/Jember'),
('MSJE2', '628184425319', 'Jember', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MSJK10', '628184422010', 'Jakarta10 (Bintaro office)', 'JAKARTA', 'not set', NULL, 'In Service', NULL, NULL),
('MSJK12', '628184422009', 'Pancoran', 'JAKARTA', 'not set', NULL, 'In Service', NULL, NULL),
('MSJK13', '628184422008', 'Jakarta13 (Bintaro office)', 'JAKARTA', 'not set', NULL, 'In Service', NULL, '3202 (NAT-0)'),
('MSJK14', '628184422007', 'Jakarta14 (Kampongkoang)', 'JAKARTA', 'not set', NULL, 'In Service', NULL, NULL),
('MSJK15', '628184423313', 'Jakarta15 (Sukabumi)', 'JAKARTA', 'not set', NULL, 'In Service', NULL, NULL),
('MSJK5', '628184422003', 'Jakarta5 (Jombang Rawa)', 'JAKARTA', 'not set', NULL, 'In Service', NULL, 'old: 62818445601'),
('MSJK8', '628184422001', 'Jakarta8  (Depok)', 'JAKARTA', 'not set', NULL, 'In Service', NULL, '5275/Bogor'),
('MSJK9', '628184422000', 'Jakarta9 (Bekasi)', 'JAKARTA', 'not set', NULL, 'In Service', NULL, NULL),
('MSJO1', '628184425301', 'Jombang', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MSJT1', '628184423306', 'Jatibarang', 'not set', 'not set', NULL, 'In Service', NULL, '5260/Cirebon For POI PSTN, Btel & Smart'),
('MSJY1', '62818445853', 'Jayapura, MSJY1', 'not set', 'not set', NULL, 'In Service', NULL, '9357/Jayapura\r\n9682 (VLR Backup)'),
('MSJY1 VHE', NULL, 'Jayapura, MSJY1 VHE', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MSKI1', '628184425302', 'Kediri', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MSKI2', '628184425310', 'Kediri', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MSKU2', '628184426000', 'Kupang, MSKU2', 'not set', 'not set', NULL, 'In Service', NULL, '9683 (VLR Backup)'),
('MSKU2 VHE', NULL, 'Kupang, MSKU2 VHE', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MSLP2', '62818445908', 'Kedaton,', 'not set', 'not set', NULL, 'In Service', NULL, '15499/STI & New GW Tsel, 15495/PSTN & Tsel\r\n9475/VHE\r\n9965 (VLR Backup)'),
('MSLP4', '62818440103', 'Lempuyang Bandar,', 'not set', 'not set', NULL, 'In Service', NULL, '9479/VHE\r\n9882(VLR backup)'),
('MSLP5', '628184421006', 'Kedaton, MSLP5 (2011)', 'not set', 'not set', NULL, 'In Service', NULL, '9852/VHE\r\n9967 (VLR backup)'),
('MSMA1', '628184425318', 'Madiun', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MSMD2', '62818445809', 'Medan Tj Morawa', 'not set', 'not set', NULL, 'In Service', NULL, '13445/MDN NAT 1,\r\n 13441/Isat IDD, Cellular, Fixed Medan & Fixed Batam NAT 1\r\n9350 (2nd NAT0)\r\n9776 & 9777 For SC CAMEL Loop'),
('MSMD3', '62818445749', 'Helvetia', 'not set', 'not set', NULL, 'In Service', NULL, '9274 (UIP Medan to MGAC1)'),
('MSMD4', '62818441106', 'Medan Tj. Morawa', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MSMD5', '628184420313', 'MDN TJ MORAWA', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MSMD6', '628184420307', 'HELVETIA', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MSMD7', '628184420312', 'Kisaran', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MSMD8', NULL, 'Medan Tj. Morawa', 'not set', 'not set', NULL, 'planned', '0000-00-00', '9969 (VLR Backup)\r\nPLANNED Ferry (24/12/2014)'),
('MSMK3', '62818445847', 'Kima, Makassar, MSMK3', 'not set', 'not set', NULL, 'In Service', NULL, '9347/POI Makassar, 9345/Indosat Cellular Makassar, 9400 (acting as STP)\r\n9500 (for ISUP over TDM)\r\n9595 (VLR backup)\r\n9684/VHE'),
('MSML1', '628184425303', 'Malang', 'not set', 'not set', NULL, 'In Service', NULL, '7302/Malang'),
('MSMO2', '62818445850', 'Manado, MSMO2', 'not set', 'not set', NULL, 'In Service', NULL, '9346/menado\r\n9499 (for ISUP over TDM)\r\n9598 (VLR Backup)'),
('MSPA1', '628184425304', 'Pamekasan Budaggan', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MSPB4', '62818440012', 'Palembang Office,', 'not set', 'not set', NULL, 'In Service', NULL, '15492/Palembang, 13444/POI Indosat Cellular Palembang Only\r\n9464/VHE\r\n9881(VLR backup)'),
('MSPB5', '62818440023', 'Kayu Agung, MSPB5', 'not set', 'not set', NULL, 'In Service', NULL, '9879(VLR backup)'),
('MSPB6', '628184421005', 'Prabumulih, MSPB6 (2011)', 'not set', 'not set', NULL, 'In Service', NULL, '9850/VHE\r\n9966 (VLR Backup)'),
('MSPD1', '62818445751', 'Tabing', 'not set', 'not set', NULL, 'in service', NULL, '13442/Padang'),
('MSPD3', '62818441003', 'Padang Luar,', 'not set', 'not set', NULL, 'In Service', NULL, '13448/Padang\r\n9476/VHE'),
('MSPK1', '62818445801', 'Pekanbaru Office', 'not set', 'not set', NULL, 'In Service', NULL, '15490 (POI Pekanbaru + POI Tsel Batam), \r\n9352 (2nd NAT0)'),
('MSPK2', '628184420311', 'PKB OFFICE', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MSPK3', '628184420310', 'Pekanbaru Office', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MSPK5', NULL, 'Pekanbaru New Building', 'not set', 'not set', NULL, 'In Service', '0000-00-00', '9973 (VLR Backup)\r\nPLANNED Ferry'),
('MSPL1', '628184424301', 'Pekalongan', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MSPO1', '628184424302', 'Purwodadi', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MSPO2', '628184424309', 'PURWODADI', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MSPR1', '628184424303', 'Purwokerto', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MSPR2', '628184424314', 'Purwoketo2', 'JAWA TENGAH', 'not set', NULL, 'In Service', NULL, NULL),
('MSPT1', '62818445846', 'Pontianak, MSPT1', 'not set', 'not set', NULL, 'In Service', NULL, '11395/Pontianak'),
('MSPU1', '62818445849', 'Palu, MSPU1', 'not set', 'not set', NULL, 'In Service', NULL, '9360 (M3UA Agent NAT-1) For NRS MAP\r\n9597 (VLR backup)'),
('MSPW1', '628184423305', 'Purwakarta', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MSPY1', '62818445851', 'Palangkaraya Sebangau, MSPY1', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MSRK1', '628184426303', 'Rumak,Lombok Barat', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MSSB3', '62818445612', 'Surabaya3 (SBY Office)', 'not set', 'not set', NULL, 'In Service', NULL, '7303/Surabaya,\r\n 7310/ NAT 1 Madiun'),
('MSSB5', '628184425306', 'Surabaya5', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MSSB6', '628184425308', 'Surabaya6 (SNB)', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MSSB8', '628184425312', 'Surabaya8', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MSSB9', '62818444006', 'SNB', 'JAWA TIMUR', 'not set', NULL, 'In Service', NULL, NULL),
('MSSG2', '628184426304', 'Senggigi MSSG2', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MSSG3', '628184426308', 'SENGGIGI', 'NTB', 'not set', NULL, 'In Service', NULL, NULL),
('MSSG4', NULL, 'SENGGIGI', 'NTB', 'not set', NULL, 'In Service', NULL, NULL),
('MSSG5', NULL, 'SENGGIGI', 'NTB', 'not set', NULL, 'In Service', NULL, NULL),
('MSSG6', NULL, 'SENGGIGI', 'NTB', 'not set', NULL, 'In Service', NULL, NULL),
('MSSG7', NULL, 'SENGGIGI', 'NTB', 'not set', NULL, 'In Service', NULL, NULL),
('MSSM1', '628184424304', 'Semarang', 'not set', 'not set', NULL, 'In Service', NULL, '5258/SMG\r\n5287 (NAT1 NRS Semarang)'),
('MSSM2', '628184424316', 'Semarang,', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MSSO1', '628184424305', 'Solo', 'not set', 'not set', NULL, 'In Service', NULL, '5257/SOLO,\r\n 5266/SOLO for Test Tksel only'),
('MSSO2', '628184424313', 'Solo2 (Sukoharjo) [eks MSJK6]', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MSSP1', '628184425307', 'Sumenep', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MSST1', '62818445844', 'HUT Sangata, MSST1', 'not set', 'not set', NULL, 'In Service', NULL, '9584/VHE'),
('MSSU1', '628184426300', 'Sumbawa Besar', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MSTE1', '62818440015', 'Montongtangi MSTE1', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MSTG1', '628184424306', 'Tegal', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MSTG2', '628184424310', 'TEGAL', 'JAWA TENGAH', 'not set', NULL, 'In Service', NULL, NULL),
('MSWL1', '628184424312', 'WELERI', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MSYG2', '628184424307', 'Yogyakarta', 'not set', 'not set', NULL, 'In Service', NULL, '5253/YGY'),
('MSYG3', '628184424300', 'Yogyakarta Pathok', 'not set', 'not set', NULL, 'In Service', NULL, '5283/YGY POI STI'),
('MSYG4', '628184424308', 'Yogyakarta4 (Office)', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MSYG5', '628184424311', 'YOGYA OFFICE', 'JOGJAKARTA', 'not set', NULL, 'In Service', NULL, NULL),
('MSYG6', '628184424315', 'WATES', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MSYG7', '628184424317', 'Yogya', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('MVMJ1', NULL, 'not set', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('prod-?UIP PLB1?', '62818445232', 'not set', 'not set', 'not set', NULL, 'In Service', '0000-00-00', 'Modified by Mita'),
('prod-?UIP PLB2?', '62818445233', 'not set', 'not set', 'not set', NULL, 'In Service', '0000-00-00', NULL),
('prod-?UIP PLB3?', '62818445234', 'not set', 'not set', 'not set', NULL, 'In Service', '0000-00-00', NULL),
('prod-?UIP PLB4?', '62818445235', 'not set', 'not set', 'not set', NULL, 'In Service', '0000-00-00', NULL),
('PROD-SCP10', NULL, 'not set', 'not set', 'not set', '62818445130', 'In Service', NULL, NULL),
('PROD-SCP12', NULL, 'not set', 'not set', 'not set', '62818445132', 'In Service', NULL, NULL),
('PROD-SCP14', '62818445231', 'not set', 'not set', 'not set', NULL, 'In Service', '0000-00-00', NULL),
('PROD-SCP24', '62818445719', 'not set', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('PROD-SCP25', '62818445720', 'not set', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('PROD-SCP26', '62818445721', 'not set', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('PROD-SCP27', '62818445722', 'not set', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('PROD-SCP28', '62818445723', 'not set', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('PROD-SCP8', NULL, 'not set', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('PROD-SCP9', NULL, 'not set', 'not set', 'not set', '62818445151', 'In Service', NULL, NULL),
('prod-uipbdg01', NULL, 'not set', 'not set', 'not set', NULL, 'In Service', '0000-00-00', 'Mitha'),
('prod-uipbdg02', NULL, 'not set', 'not set', 'not set', NULL, 'In Service', '0000-00-00', 'Mitha'),
('prod-uipbdg03', NULL, 'not set', 'not set', 'not set', NULL, 'In Service', '0000-00-00', 'Mitha'),
('prod-uipbdg04', NULL, 'not set', 'not set', 'not set', NULL, 'In Service', '0000-00-00', 'Mitha'),
('prod-uipdps1', NULL, 'not set', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('prod-uipdps2', NULL, 'not set', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('prod-uipdps3', NULL, 'not set', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('prod-uipdps4', NULL, 'not set', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('prod-uipjkt01', NULL, 'JAKARTA', 'not set', 'SUN', NULL, 'In Service', '0000-00-00', NULL),
('prod-uipjkt02', NULL, 'JAKARTA', 'not set', 'SUN', NULL, 'In Service', '0000-00-00', NULL),
('prod-uipjkt03', NULL, 'not set', 'not set', 'not set', NULL, 'In Service', '0000-00-00', NULL),
('prod-uipjkt04', NULL, 'not set', 'not set', 'not set', NULL, 'In Service', '0000-00-00', NULL),
('prod-uipmks01', '62818445835', 'not set', 'not set', 'not set', NULL, 'In Service', '0000-00-00', NULL),
('prod-uipmks02', '62818445836', 'not set', 'not set', 'not set', NULL, 'In Service', '0000-00-00', NULL),
('prod-uipmks03', '62818445837', 'not set', 'not set', 'not set', NULL, 'In Service', '0000-00-00', NULL),
('prod-uipmks04', '62818445838', 'not set', 'not set', 'not set', NULL, 'In Service', '0000-00-00', NULL),
('prod-uipplb01', '62818445831', 'not set', 'not set', 'not set', NULL, 'In Service', '0000-00-00', NULL),
('prod-uipplb02', '62818445832', 'not set', 'not set', 'not set', NULL, 'In Service', '0000-00-00', NULL),
('prod-uipplb03', '62818445833', 'not set', 'not set', 'not set', NULL, 'In Service', '0000-00-00', NULL),
('prod-uipplb04', '62818445834', 'not set', 'not set', 'not set', NULL, 'In Service', '0000-00-00', NULL),
('prod-uipSBY1', NULL, 'not set', 'not set', 'not set', NULL, 'In Service', '0000-00-00', NULL),
('prod-uipSBY2', NULL, 'not set', 'not set', 'not set', NULL, 'In Service', '0000-00-00', NULL),
('prod-uipSBY3', NULL, 'not set', 'not set', 'not set', NULL, 'In Service', '0000-00-00', NULL),
('prod-uipSBY4', NULL, 'not set', 'not set', 'not set', NULL, 'In Service', '0000-00-00', NULL),
('prod-uipSBY5', NULL, 'not set', 'not set', 'not set', NULL, 'In Service', '0000-00-00', NULL),
('SCM MiniHLRTrial', '628184422903', 'not set', 'not set', 'UMB/ Tono/ 5 May 201', NULL, 'In Service', NULL, NULL),
('SCP13', '62818445230', 'JAKARTA', 'not set', 'SUN', NULL, 'In Service', '0000-00-00', NULL),
('SPSBNB01', NULL, 'Bandung', 'not set', 'not set', NULL, 'In Service', NULL, '6443(Virtual PC)'),
('SPSBNB02', NULL, 'Bandung', 'not set', 'not set', NULL, 'In Service', NULL, '6443(Virtual PC)'),
('SPSBTR1', NULL, 'Bintaro', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('SPSBTR2', NULL, 'Bintaro', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('SPSCBT01', NULL, 'Cibitung', 'not set', 'not set', NULL, 'In Service', NULL, '6442(Virtual PC)'),
('SPSCBT02', NULL, 'Cibitung', 'not set', 'not set', NULL, 'In Service', NULL, '6442(Virtual PC)');
INSERT INTO `network_element` (`network_element_id`, `gt_address`, `location`, `provinsi`, `vendor`, `gtt`, `status`, `log_date`, `remark`) VALUES
('SPSDPS1', NULL, 'Denpasar', 'not set', 'not set', NULL, 'In Service', NULL, '6446( Virtual PC)'),
('SPSDPS2', NULL, 'Denpasar', 'not set', 'not set', NULL, 'In Service', NULL, '6446( Virtual PC)'),
('SPSKDN1', NULL, 'Kedaton', 'not set', 'not set', NULL, 'In Service', NULL, '6445( Virtual PC)'),
('SPSMDN01', NULL, 'Medan', 'not set', 'not set', NULL, 'In Service', NULL, '6441(Virtual PC)'),
('SPSPKB01', NULL, 'Pekanbaru', 'not set', 'not set', NULL, 'In Service', NULL, '6441(Virtual PC)'),
('SPSPLB1', NULL, 'Palembang', 'not set', 'not set', NULL, 'In Service', NULL, '6445( Virtual PC)'),
('SPSPOI1', NULL, 'Bintaro', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('SPSPOI2', NULL, 'Cibitung', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('SPSSBY01', NULL, 'Surabaya SNB', 'not set', 'not set', NULL, 'In Service', NULL, '6444( Virtual PC)'),
('SPSSBY02', NULL, 'Surabaya Sumur Welut', 'not set', 'not set', NULL, 'In Service', NULL, '6444( Virtual PC)'),
('STP Bintaro 3', NULL, 'Bintaro', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('STP Bintaro 4', NULL, 'Bintaro', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('STP Denpasar', '62818447000', 'Denpasar Office', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('STP Jkt 4', NULL, 'Grha XL STP2', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('STP Jkt 6', NULL, 'Bintaro STP1', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('STP JKT1', '62818445101', 'not set', 'not set', 'not set', NULL, 'In Service', NULL, '5271, 5273 (SMS MAP Isat)\r\n1103(TDM)\r\n1128(SIGTRAN)'),
('STP JKT2', '62818445063', 'not set', 'not set', 'not set', NULL, 'In Service', '0000-00-00', '5272, 5274 (SMS MAP Isat)\r\n1130(TDM)\r\n1132(SIGTRAN)'),
('STP Kedaton', '62818440002', 'Kedaton', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('STP Medan', '62818441000', 'Medan - Tj Morawa', 'not set', 'not set', NULL, 'In Service', NULL, '13531(NAT1)'),
('STP Palembang', '62818440000', 'Palembang Office', 'not set', 'not set', NULL, 'In Service', NULL, '15351(NAT1)'),
('STP Pekanbaru', '62818441001', 'Pekanbaru Office', 'not set', 'not set', NULL, 'In Service', NULL, '15551(NAT1)'),
('STP Sanur', '62818447100', 'Sanur', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('STP Sby 3', '62818444001', 'Sumur Welut', 'not set', 'not set', NULL, 'In Service', NULL, '7360 (NAT1)'),
('STP Sby 4', '62818444000', 'Sby Network Building', 'not set', 'not set', NULL, 'In Service', NULL, '7300 (NAT1)'),
('STP SBY2', '62818445064', 'not set', 'not set', 'not set', NULL, 'In Service', '0000-00-00', '1131(TDM)\r\n1133(SIGTRAN)'),
('TBD10', NULL, 'BNB (Ex HSBD3)', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('TBD11', NULL, 'Kiara Condong (Ex HBDG2)', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('TestMedia1', '62818445066', 'not set', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('TestMedia2', '62818445067', 'not set', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('TSB13', NULL, 'SNB (Ex HSSB4)', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('TSB14', NULL, 'Sumur Welut (Ex HSBY3)', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('TSBD3', '628184423304', 'Bandung3 (Bandung Office)', 'not set', 'not set', NULL, 'In Service', NULL, '5254/BDG\r\n9355/MGJ1701Bintaro\r\n9131 Nat0'),
('TSDP7', NULL, 'Sanur Denpasar (Ex HDPS2)', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('TSJ19', '62818445931', 'Bintaro, TSJ19', 'not set', 'not set', NULL, 'In Service', NULL, '5262/Bintaro\r\n9411, 9413 (M3UA NAT-0)'),
('TSJ20', '628184422301', 'Grha XL, TSJ20', 'not set', 'not set', NULL, 'In Service', NULL, '5261/Grha\r\n9415 (MG2001), 9453 (MGJ2002), 9716 (MGJ2002) For CAMEL_SC\r\n9532 & 9533 (Testing Trunk Loop CAMEL SC)'),
('TSJ27', '628184422302', 'Cibitung, TSJ27', 'not set', 'not set', NULL, 'In Service', NULL, '7444 (NAT-0 VHE/LRN)'),
('TSJ31', NULL, 'Binatro (Ex HSJK9)', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('TSJ32', NULL, 'Jombang Raw (Ex HJKT6)', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('TSJ33', NULL, 'Binatro (Ex HJKT7)', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('TSJ34', NULL, 'Binatro (Ex HJKT8)', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('TSJK17', '62818445797', 'Jakarta17', 'JAKARTA', 'not set', NULL, 'In Service', NULL, '5255/Bintaro\r\n5267 (Nat-1 m3ua agent)\r\n5277 (NAT1 MSS Huawei Bintaro'),
('TSJK7', '62818445624', 'Jakarta7  (GrahaXL)', 'JAKARTA', 'not set', NULL, 'In Service', NULL, '3211 (Graha),\r\n5248 (NAT1 Grha)\r\n5270 (NAT1 MSS Huawei Grha)\r\n9418 (testing Corelation ID)'),
('TSPB7', NULL, 'Palembang (Ex HPLB1)', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('TSPK4', NULL, 'Pekanbaru (Ex HPKB1)', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('TSSB4', '62818445627', 'Surabaya4 (SBY Office)', 'not set', 'not set', NULL, 'In Service', NULL, '7307/nat 1 Surabaya, \r\n7313/nat 1 Surabaya (For TSSB7)\r\n9530 & 9531 For SC CAMEL Loop'),
('TSSB7', '628184425311', 'Surabaya7', 'not set', 'not set', NULL, 'In Service', NULL, '7313/ NAT 1 Surabaya, \r\n7311 NAT 1  (NRS Fadly 1 Oct''13)'),
('TSSM2', NULL, 'Alas Tuo, Semarang (Ex HSMG1)', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('TSSU2', NULL, 'Sumbawa (Ex HKDI1)', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('TSYG7', NULL, 'Pathuk, Yogyakarta (Ex HYGY2)', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('UIPCBT5', '628184422541', 'CIBITUNG', 'not set', 'not set', NULL, 'In Service', '0000-00-00', NULL),
('UMS JKT11', '62818445156', 'not set', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('UMS JKT12', '62818445157', 'not set', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('UMS JKT13', '62818445158', 'not set', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('UMS JKT14', '62818445159', 'not set', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('UMS JKT15', '62818445160', 'not set', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('UMS JKT16', '62818445161', 'not set', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('UMS JKT17', '62818445142', 'not set', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('UMS JKT18', '62818445143', 'not set', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('UMS JKT19', '62818445144', 'not set', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('UMS JKT20', '62818445145', 'not set', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('UMS JKT21', '62818445146', 'not set', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('UMS JKT22', '62818445147', 'not set', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('UMS JKT23', '62818445148', 'not set', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('UMS JKT24', '62818445149', 'not set', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('UMS JKT25', '62818445150', 'not set', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('USSD Lettering TEST', NULL, 'not set', 'not set', 'not set', NULL, 'In Service', NULL, 'USSD Lettering TEST (Bintaro 3F)'),
('USSD Migration Bintaro', '62818445792', 'not set', 'not set', 'not set', NULL, 'In Service', '0000-00-00', NULL),
('VLR Backup', NULL, 'not set', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('VMGW Logical1', NULL, 'whole kalimantan huawei', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('VMGW Logical2', NULL, 'whole Sulawesi huawei', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('VMGW Logical3', NULL, 'Papua Ambon Kupang huawei', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('VMGW Logical4', NULL, 'whole sumatera3/4 huawei', 'not set', 'not set', NULL, 'In Service', NULL, NULL),
('VMGW Logical5', NULL, 'whole NORTHERN SUMATERA HUAWEI', 'not set', 'not set', NULL, 'In Service', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `poi`
--

CREATE TABLE IF NOT EXISTS `poi` (
  `poi` varchar(50) NOT NULL,
  `msc_name` varchar(20) NOT NULL,
  `address` text,
  `MSRN` varchar(30) DEFAULT NULL,
  `dummy_number` varchar(20) NOT NULL,
  `log_date` date DEFAULT NULL,
  `remark` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `poi`:
--   `msc_name`
--       `network_element` -> `network_element_id`
--

-- --------------------------------------------------------

--
-- Table structure for table `rnc_reference`
--

CREATE TABLE IF NOT EXISTS `rnc_reference` (
  `rnc_id` varchar(20) NOT NULL,
  `mgw_name` varchar(20) NOT NULL,
  `rnc_name` varchar(100) DEFAULT NULL,
  `pool` varchar(100) NOT NULL,
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
--   `mgw_name`
--       `network_element` -> `network_element_id`
--

-- --------------------------------------------------------

--
-- Table structure for table `trunk_interkoneksi`
--

CREATE TABLE IF NOT EXISTS `trunk_interkoneksi` (
  `trunk_id` varchar(20) NOT NULL,
  `POI` varchar(50) NOT NULL,
  `connection` text NOT NULL,
  `t_group` varchar(50) NOT NULL,
  `direction` varchar(20) NOT NULL,
  `vendor` varchar(20) NOT NULL,
  `dpc` varchar(20) DEFAULT NULL,
  `opc` varchar(20) DEFAULT NULL,
  `e1_capacity` int(11) DEFAULT NULL,
  `status` varchar(30) NOT NULL,
  `log_date` date DEFAULT NULL,
  `remark` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trunk_interkoneksi`
--

INSERT INTO `trunk_interkoneksi` (`trunk_id`, `POI`, `connection`, `t_group`, `direction`, `vendor`, `dpc`, `opc`, `e1_capacity`, `status`, `log_date`, `remark`) VALUES
('trunktes123', 'Jakarta', 'tes', 'tes', 'bothway', 'huawei', '', '', 12, 'Dismantle', '2015-06-22', '');

-- --------------------------------------------------------

--
-- Table structure for table `trunk_voip`
--

CREATE TABLE IF NOT EXISTS `trunk_voip` (
  `trunk_id` varchar(20) NOT NULL,
  `mss` varchar(20) NOT NULL,
  `mgw` varchar(20) DEFAULT NULL,
  `detail` text,
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
--   `mss`
--       `network_element` -> `network_element_id`
--   `mgw`
--       `network_element` -> `network_element_id`
--

--
-- Indexes for dumped tables
--

--
-- Indexes for table `desc_network`
--
ALTER TABLE `desc_network`
 ADD PRIMARY KEY (`id`), ADD KEY `network_id` (`network_element_id`);

--
-- Indexes for table `mgw`
--
ALTER TABLE `mgw`
 ADD PRIMARY KEY (`bcu_id`), ADD KEY `mgw_name` (`mgw_name`);

--
-- Indexes for table `msc`
--
ALTER TABLE `msc`
 ADD PRIMARY KEY (`msc_name`), ADD UNIQUE KEY `cnid` (`cnid`);

--
-- Indexes for table `network_element`
--
ALTER TABLE `network_element`
 ADD PRIMARY KEY (`network_element_id`), ADD UNIQUE KEY `sc-_address` (`gt_address`), ADD UNIQUE KEY `gtt` (`gtt`);

--
-- Indexes for table `poi`
--
ALTER TABLE `poi`
 ADD PRIMARY KEY (`poi`), ADD KEY `msc_name` (`msc_name`);

--
-- Indexes for table `rnc_reference`
--
ALTER TABLE `rnc_reference`
 ADD PRIMARY KEY (`rnc_id`,`mgw_name`), ADD KEY `msc_name` (`pool`), ADD KEY `mgw_name` (`mgw_name`);

--
-- Indexes for table `trunk_interkoneksi`
--
ALTER TABLE `trunk_interkoneksi`
 ADD PRIMARY KEY (`trunk_id`);

--
-- Indexes for table `trunk_voip`
--
ALTER TABLE `trunk_voip`
 ADD PRIMARY KEY (`trunk_id`), ADD KEY `mgw_name` (`mgw`), ADD KEY `mss` (`mss`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `desc_network`
--
ALTER TABLE `desc_network`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `desc_network`
--
ALTER TABLE `desc_network`
ADD CONSTRAINT `desc_network_ibfk_1` FOREIGN KEY (`network_element_id`) REFERENCES `network_element` (`network_element_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mgw`
--
ALTER TABLE `mgw`
ADD CONSTRAINT `mgw_ibfk_1` FOREIGN KEY (`mgw_name`) REFERENCES `network_element` (`network_element_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `msc`
--
ALTER TABLE `msc`
ADD CONSTRAINT `msc_ibfk_1` FOREIGN KEY (`msc_name`) REFERENCES `network_element` (`network_element_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `poi`
--
ALTER TABLE `poi`
ADD CONSTRAINT `poi_ibfk_1` FOREIGN KEY (`msc_name`) REFERENCES `network_element` (`network_element_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rnc_reference`
--
ALTER TABLE `rnc_reference`
ADD CONSTRAINT `rnc_reference_ibfk_2` FOREIGN KEY (`mgw_name`) REFERENCES `network_element` (`network_element_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trunk_voip`
--
ALTER TABLE `trunk_voip`
ADD CONSTRAINT `trunk_voip_ibfk_3` FOREIGN KEY (`mss`) REFERENCES `network_element` (`network_element_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `trunk_voip_ibfk_4` FOREIGN KEY (`mgw`) REFERENCES `network_element` (`network_element_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
