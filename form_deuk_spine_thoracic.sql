-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 27, 2023 at 05:26 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oemr_custom`
--

-- --------------------------------------------------------

--
-- Table structure for table `form_deuk_spine_thoracic`
--

DROP TABLE IF EXISTS `form_deuk_spine_thoracic`;
CREATE TABLE IF NOT EXISTS `form_deuk_spine_thoracic` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pid` varchar(255) NOT NULL,
  `enc` varchar(255) NOT NULL,
  `dos` text,
  `room_no` text,
  `ins_num` text,
  `ma_ins` text,
  `last_visit` text,
  `cc` text,
  `hx` text,
  `shx` text,
  `Worst` text,
  `Average` text,
  `Best` text,
  `neck` text,
  `uep` text,
  `bp1` text,
  `bp2` text,
  `hrs` text,
  `right1` text,
  `right2` text,
  `right3` text,
  `right4` text,
  `right5` text,
  `right6` text,
  `right7` text,
  `right8` text,
  `right9` text,
  `right10` text,
  `left1` text,
  `left2` text,
  `left3` text,
  `left4` text,
  `left5` text,
  `left6` text,
  `left7` text,
  `left8` text,
  `left9` text,
  `left10` text,
  `right_s1` text,
  `right_s2` text,
  `right_s3` text,
  `right_s4` text,
  `right_s5` text,
  `right_s6` text,
  `right_s7` text,
  `right_s8` text,
  `right_s9` text,
  `right_s10` text,
  `left_s1` text,
  `left_s2` text,
  `left_s3` text,
  `left_s4` text,
  `left_s5` text,
  `left_s6` text,
  `left_s7` text,
  `left_s8` text,
  `left_s9` text,
  `left_s10` text,
  `n_Clonus` text,
  `p_Clonus` text,
  `n_Hoffman` text,
  `p_Hoffman` text,
  `n_Rhomberg` text,
  `p_Rhomberg` text,
  `n_Babinski` text,
  `p_Babinski` text,
  `n_Coordination` text,
  `nb_Coordination` text,
  `u_Coordination` text,
  `l_Coordination` text,
  `n_Facet` text,
  `p_Facet` text,
  `n_shoulder` text,
  `p_shoulder` text,
  `n_Spurlings` text,
  `p_Spurlings` text,
  `n_Tinnels` text,
  `p_Tinnels` text,
  `w_Tinnels` text,
  `e_Tinnels` text,
  `n_Muscle` text,
  `p_Muscle` text,
  `Patella_right1` text,
  `Patella_right2` text,
  `Patella_right3` text,
  `Patella_right4` text,
  `Ankle_left1` text,
  `Ankle_left2` text,
  `Ankle_left3` text,
  `Ankle_left4` text,
  `hip_check` text,
  `knee_check` text,
  `shoulder_check` text,
  `sign1` text,
  `sign2` text,
  `check1` text,
  `check2` text,
  `check3` text,
  `check4` text,
  `check5` text,
  `check6` text,
  `check7` text,
  `check8` text,
  `check9` text,
  `check10` text,
  `check11` text,
  `check12` text,
  `check13` text,
  `check14` text,
  `check15` text,
  `check16` text,
  `ap1` text,
  `ap2` text,
  `ap3` text,
  `ap4` text,
  `ap5` text,
  `pat_label` text,
  `o2` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `form_deuk_spine_thoracic`
--

INSERT INTO `form_deuk_spine_thoracic` (`id`, `pid`, `enc`, `dos`, `room_no`, `ins_num`, `ma_ins`, `last_visit`, `cc`, `hx`, `shx`, `Worst`, `Average`, `Best`, `neck`, `uep`, `bp1`, `bp2`, `hrs`, `right1`, `right2`, `right3`, `right4`, `right5`, `right6`, `right7`, `right8`, `right9`, `right10`, `left1`, `left2`, `left3`, `left4`, `left5`, `left6`, `left7`, `left8`, `left9`, `left10`, `right_s1`, `right_s2`, `right_s3`, `right_s4`, `right_s5`, `right_s6`, `right_s7`, `right_s8`, `right_s9`, `right_s10`, `left_s1`, `left_s2`, `left_s3`, `left_s4`, `left_s5`, `left_s6`, `left_s7`, `left_s8`, `left_s9`, `left_s10`, `n_Clonus`, `p_Clonus`, `n_Hoffman`, `p_Hoffman`, `n_Rhomberg`, `p_Rhomberg`, `n_Babinski`, `p_Babinski`, `n_Coordination`, `nb_Coordination`, `u_Coordination`, `l_Coordination`, `n_Facet`, `p_Facet`, `n_shoulder`, `p_shoulder`, `n_Spurlings`, `p_Spurlings`, `n_Tinnels`, `p_Tinnels`, `w_Tinnels`, `e_Tinnels`, `n_Muscle`, `p_Muscle`, `Patella_right1`, `Patella_right2`, `Patella_right3`, `Patella_right4`, `Ankle_left1`, `Ankle_left2`, `Ankle_left3`, `Ankle_left4`, `hip_check`, `knee_check`, `shoulder_check`, `sign1`, `sign2`, `check1`, `check2`, `check3`, `check4`, `check5`, `check6`, `check7`, `check8`, `check9`, `check10`, `check11`, `check12`, `check13`, `check14`, `check15`, `check16`, `ap1`, `ap2`, `ap3`, `ap4`, `ap5`, `pat_label`, `o2`) VALUES
(1, '12', '17', '2023-09-20', '4', '35345', '756', '2023-09-04', 'test', '53', NULL, '8', '8', '7', NULL, NULL, '', '', '', 's', '', 'd', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'on', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'on', 'on', 'on', 'on', 'on', 'on', NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, '', NULL),
(2, '12', '17', '2023-08-28', 'room', 'ins', 'ma', '2023-09-26', 'cc', 'sshx', NULL, '1', '2', '3', NULL, NULL, '87', '12', '32', '12', '22', '32', '34', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'on', NULL, NULL, NULL, NULL, 'on', 'on', 'on', 'on', NULL, NULL, 'on', NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', NULL, NULL, NULL, 'sign1', 's2 de', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ap1', 'ap2', '', '', NULL, 'label', NULL),
(3, '12', '17', '', '', '', '', '', '', '', NULL, '', '', '', NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '0', '0', '0', '0', '0', '0', '1', '0', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '', '', '', '', '', '', NULL, NULL, NULL, '', '', '1', '1', '1', '0', '0', '0', '0', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, '', NULL),
(4, '12', '17', '2023-09-26', '1', '3', '2', '2023-09-12', 'c', 's', '', '1', '22', '3', NULL, NULL, '3', '2', '2', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '1', '1', '0', '1', '0', '1', '0', '1', '0', '0', '0', '1', '0', '0', '1', '0', '1', '0', '1', '0', '0', '0', '0', '', '', '', '', '', '', '', '', NULL, NULL, NULL, 'dcfx', 'xzc', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '', '', '', 'qewr', NULL),
(5, '12', '17', '2023-09-26', '1', '3', '25', '2023-09-12', 'cc', 'hxx', '123', '1', '22', '3', NULL, NULL, '3', '2', '2', 's', '', '', '', '', '', '', '', '', '', '', 'd', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '', '', '', '', '', '', NULL, NULL, NULL, '544', '3', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '', '', '', '2', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
