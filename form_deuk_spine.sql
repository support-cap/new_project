-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 27, 2023 at 05:27 AM
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
-- Table structure for table `form_deuk_spine`
--

DROP TABLE IF EXISTS `form_deuk_spine`;
CREATE TABLE IF NOT EXISTS `form_deuk_spine` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pid` text NOT NULL,
  `enc` text NOT NULL,
  `lumbar` varchar(255) DEFAULT NULL,
  `dos` varchar(255) DEFAULT NULL,
  `room_no` varchar(255) DEFAULT NULL,
  `ins_num` text,
  `ma_ins` text,
  `last_visit` text,
  `cc` text,
  `hx` text,
  `Worst` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `Average` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `Best` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `bp1` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `bp2` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `hrs` text NOT NULL,
  `o2` text NOT NULL,
  `lbp` text NOT NULL,
  `lep` text NOT NULL,
  `right1` text NOT NULL,
  `right2` text NOT NULL,
  `right3` text NOT NULL,
  `right4` text NOT NULL,
  `right5` text NOT NULL,
  `left1` text NOT NULL,
  `left2` text NOT NULL,
  `left3` text NOT NULL,
  `left4` text NOT NULL,
  `left5` text NOT NULL,
  `right_s1` text NOT NULL,
  `right_s2` text NOT NULL,
  `right_s3` text NOT NULL,
  `right_s4` text NOT NULL,
  `right_s5` text NOT NULL,
  `left_s1` text NOT NULL,
  `left_s2` text NOT NULL,
  `left_s3` text NOT NULL,
  `left_s4` text NOT NULL,
  `left_s5` text NOT NULL,
  `ap1` text NOT NULL,
  `aps` text NOT NULL,
  `check1` text NOT NULL,
  `check2` text NOT NULL,
  `check3` text NOT NULL,
  `check4` text NOT NULL,
  `check5` text NOT NULL,
  `check6` text NOT NULL,
  `check7` text NOT NULL,
  `check8` text NOT NULL,
  `check9` text NOT NULL,
  `check10` text NOT NULL,
  `check11` text NOT NULL,
  `check12` text NOT NULL,
  `check13` text NOT NULL,
  `check14` text NOT NULL,
  `check15` text NOT NULL,
  `check16` text NOT NULL,
  `check17` text NOT NULL,
  `sign1` text NOT NULL,
  `sign2` text NOT NULL,
  `pat_label` text NOT NULL,
  `normal_gail` text,
  `antalgic_gail` text,
  `normal_hamstring` text,
  `contracture_hamstring` text,
  `normal_ischial` text,
  `tend_ischial` text,
  `normal_itb` text,
  `tend_itb` text,
  `normal_leg` text,
  `positive_leg` text,
  `normal_piriformise` text,
  `tend_piriformise` text,
  `normal_pulse` text,
  `tend_pulse` text,
  `normal_troch` text,
  `tend_troch` text,
  `normal_sl` text,
  `positive_sl` text,
  `normal_facet` text,
  `positive_facet` text,
  `normal_muscle` text,
  `positive_muscle` text,
  `Patella_right1` text,
  `Patella_right2` text,
  `Ankle_left1` text,
  `Ankle_left2` text,
  `hip_check` text,
  `knee_check` text,
  `shoulder_check` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `form_deuk_spine`
--

INSERT INTO `form_deuk_spine` (`id`, `pid`, `enc`, `lumbar`, `dos`, `room_no`, `ins_num`, `ma_ins`, `last_visit`, `cc`, `hx`, `Worst`, `Average`, `Best`, `bp1`, `bp2`, `hrs`, `o2`, `lbp`, `lep`, `right1`, `right2`, `right3`, `right4`, `right5`, `left1`, `left2`, `left3`, `left4`, `left5`, `right_s1`, `right_s2`, `right_s3`, `right_s4`, `right_s5`, `left_s1`, `left_s2`, `left_s3`, `left_s4`, `left_s5`, `ap1`, `aps`, `check1`, `check2`, `check3`, `check4`, `check5`, `check6`, `check7`, `check8`, `check9`, `check10`, `check11`, `check12`, `check13`, `check14`, `check15`, `check16`, `check17`, `sign1`, `sign2`, `pat_label`, `normal_gail`, `antalgic_gail`, `normal_hamstring`, `contracture_hamstring`, `normal_ischial`, `tend_ischial`, `normal_itb`, `tend_itb`, `normal_leg`, `positive_leg`, `normal_piriformise`, `tend_piriformise`, `normal_pulse`, `tend_pulse`, `normal_troch`, `tend_troch`, `normal_sl`, `positive_sl`, `normal_facet`, `positive_facet`, `normal_muscle`, `positive_muscle`, `Patella_right1`, `Patella_right2`, `Ankle_left1`, `Ankle_left2`, `hip_check`, `knee_check`, `shoulder_check`) VALUES
(1, '12', '17', 'dsfsd', '2023-08-29', '4', '', '', 'xcvx', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, '12', '17', '', '2023-08-28', '', '', '', '2023-09-15', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'on', 'on', 'on', 'on', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, '12', '17', 'deiva', '2023-08-29', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, '12', '17', '', '2023-09-22', '3', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, '12', '17', '', '2023-09-26', 'df', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, '2', '7', '', '2023-09-26', '1', '2', '3', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1', '1', '1', '1', '', '', 'sdf', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(7, '2', '7', '', '', '1', '2', '3', '', 'dfgdf', 'dfsd', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', '', '', 'sdf', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(8, '2', '7', '', '2023-09-19', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'sdf', '', '', '', '', 'ew', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
