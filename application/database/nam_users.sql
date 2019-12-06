-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 06, 2019 at 02:52 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.2.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nam_users`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `name`, `password`) VALUES
(1, 'nam1@playnext.com', 'Nam1', '9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08'),
(2, 'nam2@playnext.com', 'Nam2', NULL),
(3, 'nam3@playnext.com', 'Nam 3', NULL),
(5, 'nam4@playnext.com', 'Nam 4', '9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08'),
(7, 'nam6@playnext.com', 'Nam 6', '9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08'),
(13, 'nam8@playnext.com', 'Nam8', NULL),
(14, 'nam9@playnext.com', 'Nam9', NULL),
(15, 'nam10@playnext.com', 'Nam 10', NULL),
(16, 'nam11@playnext.com', 'Nam 11', NULL),
(17, 'nam12@playnext.com', 'Nam 12', NULL),
(18, 'nam13@playnext.com', 'Nam13', NULL),
(19, 'nam14@playnext.com', 'Nam14', NULL),
(20, 'nam15@playnext.com', 'Nam 15', NULL),
(21, 'nam16@playnext.com', 'Nam 16', NULL),
(22, 'nam17@playnext.com', 'Nam 17', NULL),
(23, 'nam18@playnext.com', 'Nam18', NULL),
(24, 'nam19@playnext.com', 'Nam19', NULL),
(25, 'nam20@playnext.com', 'Nam 20', NULL),
(26, 'nam21@playnext.com', 'Nam 21', NULL),
(27, 'nam22@playnext.com', 'Nam 22', NULL),
(28, 'nam23@playnext.com', 'Nam 23', NULL),
(29, 'nam24@playnext.com', 'Nam 24', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
