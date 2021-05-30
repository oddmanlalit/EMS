-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2021 at 05:01 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ems`
--

-- --------------------------------------------------------

--
-- Table structure for table `visitor_master`
--

CREATE TABLE `visitor_master` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `visit_type` int(100) NOT NULL,
  `person_to_visit` varchar(225) NOT NULL,
  `entry_time` datetime NOT NULL,
  `exit_time` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visitor_master`
--

INSERT INTO `visitor_master` (`id`, `name`, `email`, `visit_type`, `person_to_visit`, `entry_time`, `exit_time`, `created_at`, `updated_at`) VALUES
(1, 'mahesh', 'mahesh@gmail.com', 2, 'akashi', '2021-04-28 05:05:00', '2021-04-28 06:25:00', '2021-05-30 06:26:46', '0000-00-00 00:00:00'),
(2, 'abhishek ', 'abhishek@gmail.com', 1, 'naveen1', '2021-05-12 05:05:00', '2021-04-28 06:35:00', '2021-05-30 13:14:30', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `visitor_type`
--

CREATE TABLE `visitor_type` (
  `id` int(11) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visitor_type`
--

INSERT INTO `visitor_type` (`id`, `type`) VALUES
(1, 'meeting'),
(2, 'delivery'),
(3, 'personal');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `visitor_master`
--
ALTER TABLE `visitor_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visitor_type`
--
ALTER TABLE `visitor_type`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idof visitor_type` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `visitor_master`
--
ALTER TABLE `visitor_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `visitor_type`
--
ALTER TABLE `visitor_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
