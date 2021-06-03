-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2021 at 04:10 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `selectivetrade`
--

-- --------------------------------------------------------

--
-- Table structure for table `mailers`
--

CREATE TABLE `mailers` (
  `id` int(11) NOT NULL,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `birth` date NOT NULL DEFAULT current_timestamp(),
  `contactNumber` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `category_id` int(11) NOT NULL DEFAULT 3
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mailers`
--

INSERT INTO `mailers` (`id`, `firstName`, `lastName`, `email`, `birth`, `contactNumber`, `created_at`, `updated_at`, `category_id`) VALUES
(4, 'manpreet', '', 'manpreetsweden@protonmail.com', '2021-03-11', '23423432', '2021-05-28 12:45:17', '2021-05-28 12:45:17', 1),
(5, 'test', 'Tes', 'test@protonmail.com', '2021-03-11', '', '2021-05-28 12:45:17', '2021-05-28 12:45:17', 3),
(6, 'manpreet', '', 'manpreetswedish@protonmail.com', '2021-03-11', '23423432', '2021-05-29 18:02:58', '2021-05-29 18:02:58', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mailers`
--
ALTER TABLE `mailers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mailers`
--
ALTER TABLE `mailers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
