-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2024 at 02:54 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `biwta`
--

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `id_type` varchar(50) NOT NULL,
  `id_file` varchar(255) NOT NULL,
  `profession` varchar(255) NOT NULL,
  `institution` varchar(255) NOT NULL,
  `contact_no` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`full_name`, `email`, `id_type`, `id_file`, `profession`, `institution`, `contact_no`, `password`) VALUES
('Rufait Islam Nahin', 'rufaitislam@gmail.com', 'NID', 'uploads/arafat-1.png', 'army', 'Prothom Alo', '123', '$2y$10$lAMMIujEY5jKKyXet1MzSeMNytqS.nnYMaDCSLb9y.vJB9IVGxx2.');

-- --------------------------------------------------------

--
-- Table structure for table `tmp_info`
--

CREATE TABLE `tmp_info` (
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `id_type` varchar(50) NOT NULL,
  `id_file` varchar(255) NOT NULL,
  `id_file_tmp` varchar(255) NOT NULL,
  `id_file_folder` varchar(255) NOT NULL,
  `profession` varchar(255) NOT NULL,
  `institution` varchar(255) NOT NULL,
  `contact_no` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `tmp_info`
--
ALTER TABLE `tmp_info`
  ADD PRIMARY KEY (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
