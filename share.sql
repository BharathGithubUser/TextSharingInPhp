-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 22, 2018 at 11:05 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.0.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `share`
--

-- --------------------------------------------------------

--
-- Table structure for table `text_sharing`
--

CREATE TABLE `text_sharing` (
  `id` int(11) NOT NULL,
  `text` text NOT NULL,
  `created_at` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `text_sharing`
--

INSERT INTO `text_sharing` (`id`, `text`, `created_at`) VALUES
(1, 'hi', ''),
(2, 'how are you..', ''),
(3, 'fine ...how about you', ''),
(4, 'successfully shared the text', ''),
(5, 'https://www.milwaukeemitsubishi.com/dealership/staff.htm', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `text_sharing`
--
ALTER TABLE `text_sharing`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `text_sharing`
--
ALTER TABLE `text_sharing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
