-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 30, 2025 at 03:07 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attendance_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `acount`
--

CREATE TABLE `acount` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `acount`
--

INSERT INTO `acount` (`id`, `email`, `password`) VALUES
(1, 'kh@2', '$2y$10$MU4pYcWuvgsehFA8OJy/bOLlzImBmbh9fGAs00Txs/vgM5b2eqyAS'),
(2, 'kh@2025', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `c_name` varchar(250) NOT NULL,
  `s_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `c_name`, `s_name`) VALUES
(1, 'LINUX', 'LINUX'),
(2, 'WEB', 'WEB'),
(3, 'DE', 'DE'),
(4, 'DB', 'DB'),
(5, 'C++', 'C++'),
(6, 'OS', '');

-- --------------------------------------------------------

--
-- Table structure for table `group1`
--

CREATE TABLE `group1` (
  `id` int(11) NOT NULL,
  `name_g1` varchar(250) DEFAULT NULL,
  `id_g1` int(11) DEFAULT NULL,
  `loc_g1` int(11) DEFAULT NULL,
  `course_g1` varchar(50) DEFAULT NULL,
  `name_g1_c1` varchar(250) DEFAULT NULL,
  `id_g1_c1` int(11) DEFAULT NULL,
  `loc_g1_c1` int(11) DEFAULT NULL,
  `course_g1_c1` varchar(50) DEFAULT NULL,
  `name_g1_c2` varchar(250) DEFAULT NULL,
  `id_g1_c2` int(11) DEFAULT NULL,
  `loc_g1_c2` int(11) DEFAULT NULL,
  `course_g1_c2` varchar(50) DEFAULT NULL,
  `name_g1_c3` varchar(250) DEFAULT NULL,
  `id_g1_c3` int(11) DEFAULT NULL,
  `loc_g1_c3` int(11) DEFAULT NULL,
  `course_g1_c3` varchar(50) DEFAULT NULL,
  `name_g1_c4` varchar(250) DEFAULT NULL,
  `id_g1_c4` int(11) DEFAULT NULL,
  `loc_g1_c4` int(11) DEFAULT NULL,
  `course_g1_c4` varchar(50) DEFAULT NULL,
  `tim` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `group1`
--

INSERT INTO `group1` (`id`, `name_g1`, `id_g1`, `loc_g1`, `course_g1`, `name_g1_c1`, `id_g1_c1`, `loc_g1_c1`, `course_g1_c1`, `name_g1_c2`, `id_g1_c2`, `loc_g1_c2`, `course_g1_c2`, `name_g1_c3`, `id_g1_c3`, `loc_g1_c3`, `course_g1_c3`, `name_g1_c4`, `id_g1_c4`, `loc_g1_c4`, `course_g1_c4`, `tim`) VALUES
(44, 'gbgbgbgb', 969, 101, 'OS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-29 23:03:08'),
(45, 'gbgbgbgb', 969, 101, 'OS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-29 23:08:03'),
(46, 'gbgbgbgb', 969, 101, 'OS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-29 23:08:53'),
(47, 'gbgbgbgb', 969, 101, 'OS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-29 23:12:27'),
(48, 'gbgbgbgb', 969, 101, 'OS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-29 23:13:08'),
(49, 'gbgbgbgb', 969, 101, 'OS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-29 23:16:29'),
(50, NULL, NULL, NULL, NULL, 'gbgbgbgb', 969, 106, 'c++', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-29 23:43:10'),
(51, 'gbgbgbgb', 969, 101, 'OS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-29 23:50:48'),
(52, NULL, NULL, NULL, NULL, 'section1', 1, 106, 'c++', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-30 00:10:15'),
(53, NULL, NULL, NULL, NULL, 'section1', 1, 106, 'c++', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-30 00:11:54'),
(55, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'section3', 7575, 106, 'c++', NULL, NULL, NULL, NULL, '2025-11-30 00:33:41'),
(56, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'section4', 7575, 106, 'c++', '2025-11-30 00:34:58'),
(57, NULL, NULL, NULL, NULL, 'section444', 7575, 106, 'c++', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-30 00:39:45'),
(58, NULL, NULL, NULL, NULL, 'section444', 7575, 106, 'c++', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-30 00:59:50'),
(60, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'section444', 75, 106, 'c++', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-30 01:03:31'),
(61, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'section444', 752, 106, 'c++', NULL, NULL, NULL, NULL, '2025-11-30 01:06:31'),
(62, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'section444', 7521, 106, 'c++', '2025-11-30 01:09:07');

-- --------------------------------------------------------

--
-- Table structure for table `group2`
--

CREATE TABLE `group2` (
  `id` int(11) NOT NULL,
  `name_g2` varchar(250) DEFAULT NULL,
  `id_g2` int(11) DEFAULT NULL,
  `loc_g2` int(11) DEFAULT NULL,
  `course_g2` varchar(50) DEFAULT NULL,
  `name_g2_c1` varchar(250) DEFAULT NULL,
  `id_g2_c1` int(11) DEFAULT NULL,
  `loc_g2_c1` int(11) DEFAULT NULL,
  `course_g2_c1` varchar(50) DEFAULT NULL,
  `name_g2_c2` varchar(250) DEFAULT NULL,
  `id_g2_c2` int(11) DEFAULT NULL,
  `loc_g2_c2` int(11) DEFAULT NULL,
  `course_g2_c2` varchar(50) DEFAULT NULL,
  `name_g2_c3` varchar(250) DEFAULT NULL,
  `id_g2_c3` int(11) DEFAULT NULL,
  `loc_g2_c3` int(11) DEFAULT NULL,
  `course_g2_c3` varchar(50) DEFAULT NULL,
  `name_g2_c4` varchar(250) DEFAULT NULL,
  `id_g2_c4` int(11) DEFAULT NULL,
  `loc_g2_c4` int(11) DEFAULT NULL,
  `course_g2_c4` varchar(50) DEFAULT NULL,
  `tim` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `group2`
--

INSERT INTO `group2` (`id`, `name_g2`, `id_g2`, `loc_g2`, `course_g2`, `name_g2_c1`, `id_g2_c1`, `loc_g2_c1`, `course_g2_c1`, `name_g2_c2`, `id_g2_c2`, `loc_g2_c2`, `course_g2_c2`, `name_g2_c3`, `id_g2_c3`, `loc_g2_c3`, `course_g2_c3`, `name_g2_c4`, `id_g2_c4`, `loc_g2_c4`, `course_g2_c4`, `tim`) VALUES
(11, 'group 2', 222, 101, 'DE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-29 23:56:01'),
(12, NULL, NULL, NULL, NULL, 'خالد', 444, 106, 'c++', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-30 01:14:59'),
(13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'khalid', 969, 106, 'c++', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-30 01:16:47');

-- --------------------------------------------------------

--
-- Table structure for table `group3`
--

CREATE TABLE `group3` (
  `id` int(11) NOT NULL,
  `name_g3` varchar(250) DEFAULT NULL,
  `id_g3` int(11) DEFAULT NULL,
  `loc_g3` int(11) DEFAULT NULL,
  `course_g3` varchar(50) DEFAULT NULL,
  `name_g3_c1` varchar(250) DEFAULT NULL,
  `id_g3_c1` int(11) DEFAULT NULL,
  `loc_g3_c1` int(11) DEFAULT NULL,
  `course_g3_c1` varchar(50) DEFAULT NULL,
  `name_g3_c2` varchar(250) DEFAULT NULL,
  `id_g3_c2` int(11) DEFAULT NULL,
  `loc_g3_c2` int(11) DEFAULT NULL,
  `course_g3_c2` varchar(50) DEFAULT NULL,
  `name_g3_c3` varchar(250) DEFAULT NULL,
  `id_g3_c3` int(11) DEFAULT NULL,
  `loc_g3_c3` int(11) DEFAULT NULL,
  `course_g3_c3` varchar(50) DEFAULT NULL,
  `name_g3_c4` varchar(250) DEFAULT NULL,
  `id_g3_c4` int(11) DEFAULT NULL,
  `loc_g3_c4` int(11) DEFAULT NULL,
  `course_g3_c4` varchar(50) DEFAULT NULL,
  `tim` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `group3`
--

INSERT INTO `group3` (`id`, `name_g3`, `id_g3`, `loc_g3`, `course_g3`, `name_g3_c1`, `id_g3_c1`, `loc_g3_c1`, `course_g3_c1`, `name_g3_c2`, `id_g3_c2`, `loc_g3_c2`, `course_g3_c2`, `name_g3_c3`, `id_g3_c3`, `loc_g3_c3`, `course_g3_c3`, `name_g3_c4`, `id_g3_c4`, `loc_g3_c4`, `course_g3_c4`, `tim`) VALUES
(10, 'group 3', 222, 101, 'DB', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-29 23:58:51'),
(11, NULL, NULL, NULL, NULL, 'khalid', 9694, 106, 'c++', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-30 01:20:10');

-- --------------------------------------------------------

--
-- Table structure for table `group4`
--

CREATE TABLE `group4` (
  `id` int(11) NOT NULL,
  `name_g4` varchar(250) DEFAULT NULL,
  `id_g4` int(11) DEFAULT NULL,
  `loc_g4` int(11) DEFAULT NULL,
  `course_g4` varchar(50) DEFAULT NULL,
  `name_g4_c1` varchar(250) DEFAULT NULL,
  `id_g4_c1` int(11) DEFAULT NULL,
  `loc_g4_c1` int(11) DEFAULT NULL,
  `course_g4_c1` varchar(50) DEFAULT NULL,
  `name_g4_c2` varchar(250) DEFAULT NULL,
  `id_g4_c2` int(11) DEFAULT NULL,
  `loc_g4_c2` int(11) DEFAULT NULL,
  `course_g4_c2` varchar(50) DEFAULT NULL,
  `name_g4_c3` varchar(250) DEFAULT NULL,
  `id_g4_c3` int(11) DEFAULT NULL,
  `loc_g4_c3` int(11) DEFAULT NULL,
  `course_g4_c3` varchar(50) DEFAULT NULL,
  `name_g4_c4` varchar(250) DEFAULT NULL,
  `id_g4_c4` int(11) DEFAULT NULL,
  `loc_g4_c4` int(11) DEFAULT NULL,
  `course_g4_c4` varchar(50) DEFAULT NULL,
  `tim` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `group4`
--

INSERT INTO `group4` (`id`, `name_g4`, `id_g4`, `loc_g4`, `course_g4`, `name_g4_c1`, `id_g4_c1`, `loc_g4_c1`, `course_g4_c1`, `name_g4_c2`, `id_g4_c2`, `loc_g4_c2`, `course_g4_c2`, `name_g4_c3`, `id_g4_c3`, `loc_g4_c3`, `course_g4_c3`, `name_g4_c4`, `id_g4_c4`, `loc_g4_c4`, `course_g4_c4`, `tim`) VALUES
(10, 'group 4', 222, 101, 'LINUX', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-30 00:01:50'),
(11, NULL, NULL, NULL, NULL, 'gbgbgbgb', 555, 106, 'c++', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-30 01:24:47'),
(12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'خالد', 1111111, 106, 'c++', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-30 01:26:52'),
(13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'خالد', 444, 106, 'c++', '2025-11-30 01:28:26'),
(14, 'خالد', 444, 101, 'LINUX', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-30 02:05:05');

-- --------------------------------------------------------

--
-- Table structure for table `location_b`
--

CREATE TABLE `location_b` (
  `id` int(11) NOT NULL,
  `loc1_101` decimal(9,7) NOT NULL,
  `loc2_101` decimal(9,7) NOT NULL,
  `loc1_118` decimal(9,7) NOT NULL,
  `loc2_118` decimal(9,7) NOT NULL,
  `loc1_301` decimal(9,7) NOT NULL,
  `loc2_301` decimal(9,7) NOT NULL,
  `loc1_318` decimal(9,7) NOT NULL,
  `loc2_318` decimal(9,7) NOT NULL,
  `loc1_106` decimal(9,7) NOT NULL,
  `loc2_106` decimal(9,7) NOT NULL,
  `loc1_202` decimal(9,7) NOT NULL,
  `loc2_202` decimal(9,7) NOT NULL,
  `loc1_203` decimal(9,7) NOT NULL,
  `loc2_203` decimal(9,7) NOT NULL,
  `loc1_205` decimal(9,7) NOT NULL,
  `loc2_205` decimal(9,7) NOT NULL,
  `loc1_207` decimal(9,7) NOT NULL,
  `loc2_207` decimal(9,7) NOT NULL,
  `loc1_216` decimal(9,7) NOT NULL,
  `loc2_216` decimal(9,7) NOT NULL,
  `loc1_304` decimal(9,7) NOT NULL,
  `loc2_304` decimal(9,7) NOT NULL,
  `loc1_315` decimal(9,7) NOT NULL,
  `loc2_315` decimal(9,7) NOT NULL,
  `loc1_316` decimal(9,7) NOT NULL,
  `loc2_316` decimal(9,7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `location_b`
--

INSERT INTO `location_b` (`id`, `loc1_101`, `loc2_101`, `loc1_118`, `loc2_118`, `loc1_301`, `loc2_301`, `loc1_318`, `loc2_318`, `loc1_106`, `loc2_106`, `loc1_202`, `loc2_202`, `loc1_203`, `loc2_203`, `loc1_205`, `loc2_205`, `loc1_207`, `loc2_207`, `loc1_216`, `loc2_216`, `loc1_304`, `loc2_304`, `loc1_315`, `loc2_315`, `loc1_316`, `loc2_316`) VALUES
(1, 31.1977000, 29.8925000, 1.0000000, 1.0000000, 1.0000000, 1.0000000, 1.0000000, 1.0000000, 31.1977000, 29.8925000, 1.0000000, 1.0000000, 1.0000000, 1.0000000, 1.0000000, 1.0000000, 1.0000000, 1.0000000, 1.0000000, 1.0000000, 1.0000000, 1.0000000, 1.0000000, 1.0000000, 1.0000000, 1.0000000);

-- --------------------------------------------------------

--
-- Table structure for table `state_g1`
--

CREATE TABLE `state_g1` (
  `id` int(11) NOT NULL,
  `state_g1` int(11) DEFAULT NULL,
  `loc_g1` int(11) DEFAULT NULL,
  `course_g1` varchar(50) DEFAULT NULL,
  `state_g1_c1` int(11) DEFAULT NULL,
  `loc_g1_c1` int(11) DEFAULT NULL,
  `course_g1_c1` varchar(50) DEFAULT NULL,
  `state_g1_c2` int(11) DEFAULT NULL,
  `loc_g1_c2` int(11) DEFAULT NULL,
  `course_g1_c2` varchar(50) DEFAULT NULL,
  `state_g1_c3` int(11) DEFAULT NULL,
  `loc_g1_c3` int(11) DEFAULT NULL,
  `course_g1_c3` varchar(50) NOT NULL,
  `state_g1_c4` int(11) NOT NULL,
  `loc_g1_c4` int(11) NOT NULL,
  `course_g1_c4` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `state_g1`
--

INSERT INTO `state_g1` (`id`, `state_g1`, `loc_g1`, `course_g1`, `state_g1_c1`, `loc_g1_c1`, `course_g1_c1`, `state_g1_c2`, `loc_g1_c2`, `course_g1_c2`, `state_g1_c3`, `loc_g1_c3`, `course_g1_c3`, `state_g1_c4`, `loc_g1_c4`, `course_g1_c4`) VALUES
(1, 0, 118, 'OS', 1, 202, 'c++', 1, 106, 'c++', 0, 106, 'c++', 1, 106, 'c++');

-- --------------------------------------------------------

--
-- Table structure for table `state_g2`
--

CREATE TABLE `state_g2` (
  `id` int(11) NOT NULL,
  `state_g2` int(11) DEFAULT NULL,
  `loc_g2` int(11) DEFAULT NULL,
  `course_g2` varchar(50) DEFAULT NULL,
  `state_g2_c1` int(11) DEFAULT NULL,
  `loc_g2_c1` int(11) DEFAULT NULL,
  `course_g2_c1` varchar(50) DEFAULT NULL,
  `state_g2_c2` int(11) DEFAULT NULL,
  `loc_g2_c2` int(11) DEFAULT NULL,
  `course_g2_c2` varchar(50) DEFAULT NULL,
  `state_g2_c3` int(11) DEFAULT NULL,
  `loc_g2_c3` int(11) DEFAULT NULL,
  `course_g2_c3` varchar(50) NOT NULL,
  `state_g2_c4` int(11) NOT NULL,
  `loc_g2_c4` int(11) NOT NULL,
  `course_g2_c4` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `state_g2`
--

INSERT INTO `state_g2` (`id`, `state_g2`, `loc_g2`, `course_g2`, `state_g2_c1`, `loc_g2_c1`, `course_g2_c1`, `state_g2_c2`, `loc_g2_c2`, `course_g2_c2`, `state_g2_c3`, `loc_g2_c3`, `course_g2_c3`, `state_g2_c4`, `loc_g2_c4`, `course_g2_c4`) VALUES
(1, 0, 118, 'DE', 1, 106, 'c++', 1, 106, 'c++', 1, 316, 'c++', 1, 316, 'c++');

-- --------------------------------------------------------

--
-- Table structure for table `state_g3`
--

CREATE TABLE `state_g3` (
  `id` int(11) NOT NULL,
  `state_g3` int(11) DEFAULT NULL,
  `loc_g3` int(11) DEFAULT NULL,
  `course_g3` varchar(50) DEFAULT NULL,
  `state_g3_c1` int(11) DEFAULT NULL,
  `loc_g3_c1` int(11) DEFAULT NULL,
  `course_g3_c1` varchar(50) DEFAULT NULL,
  `state_g3_c2` int(11) DEFAULT NULL,
  `loc_g3_c2` int(11) DEFAULT NULL,
  `course_g3_c2` varchar(50) DEFAULT NULL,
  `state_g3_c3` int(11) DEFAULT NULL,
  `loc_g3_c3` int(11) DEFAULT NULL,
  `course_g3_c3` varchar(50) NOT NULL,
  `state_g3_c4` int(11) NOT NULL,
  `loc_g3_c4` int(11) NOT NULL,
  `course_g3_c4` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `state_g3`
--

INSERT INTO `state_g3` (`id`, `state_g3`, `loc_g3`, `course_g3`, `state_g3_c1`, `loc_g3_c1`, `course_g3_c1`, `state_g3_c2`, `loc_g3_c2`, `course_g3_c2`, `state_g3_c3`, `loc_g3_c3`, `course_g3_c3`, `state_g3_c4`, `loc_g3_c4`, `course_g3_c4`) VALUES
(1, 0, 118, 'DB', 1, 106, 'c++', 1, 316, 'LINUX', 1, 316, 'c++', 1, 316, 'c++');

-- --------------------------------------------------------

--
-- Table structure for table `state_g4`
--

CREATE TABLE `state_g4` (
  `id` int(11) NOT NULL,
  `state_g4` int(11) DEFAULT NULL,
  `loc_g4` int(11) DEFAULT NULL,
  `course_g4` varchar(50) DEFAULT NULL,
  `state_g4_c1` int(11) DEFAULT NULL,
  `loc_g4_c1` int(11) DEFAULT NULL,
  `course_g4_c1` varchar(50) DEFAULT NULL,
  `state_g4_c2` int(11) DEFAULT NULL,
  `loc_g4_c2` int(11) DEFAULT NULL,
  `course_g4_c2` varchar(50) DEFAULT NULL,
  `state_g4_c3` int(11) DEFAULT NULL,
  `loc_g4_c3` int(11) DEFAULT NULL,
  `course_g4_c3` varchar(50) NOT NULL,
  `state_g4_c4` int(11) NOT NULL,
  `loc_g4_c4` int(11) NOT NULL,
  `course_g4_c4` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `state_g4`
--

INSERT INTO `state_g4` (`id`, `state_g4`, `loc_g4`, `course_g4`, `state_g4_c1`, `loc_g4_c1`, `course_g4_c1`, `state_g4_c2`, `loc_g4_c2`, `course_g4_c2`, `state_g4_c3`, `loc_g4_c3`, `course_g4_c3`, `state_g4_c4`, `loc_g4_c4`, `course_g4_c4`) VALUES
(1, 1, 101, 'LINUX', 1, 106, 'c++', 1, 106, 'c++', 1, 316, 'c++', 1, 106, 'c++');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acount`
--
ALTER TABLE `acount`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group1`
--
ALTER TABLE `group1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group2`
--
ALTER TABLE `group2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group3`
--
ALTER TABLE `group3`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group4`
--
ALTER TABLE `group4`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location_b`
--
ALTER TABLE `location_b`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `state_g1`
--
ALTER TABLE `state_g1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `state_g2`
--
ALTER TABLE `state_g2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `state_g3`
--
ALTER TABLE `state_g3`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `state_g4`
--
ALTER TABLE `state_g4`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acount`
--
ALTER TABLE `acount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `group1`
--
ALTER TABLE `group1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `group2`
--
ALTER TABLE `group2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `group3`
--
ALTER TABLE `group3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `group4`
--
ALTER TABLE `group4`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `location_b`
--
ALTER TABLE `location_b`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `state_g1`
--
ALTER TABLE `state_g1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `state_g2`
--
ALTER TABLE `state_g2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `state_g3`
--
ALTER TABLE `state_g3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `state_g4`
--
ALTER TABLE `state_g4`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
