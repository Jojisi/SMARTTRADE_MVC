-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2023 at 08:37 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `masquechozas`
--

-- --------------------------------------------------------

--
-- Table structure for table `households`
--

CREATE TABLE `households` (
  `id` int(10) UNSIGNED NOT NULL,
  `ref_id` varchar(6) NOT NULL,
  `h_type` varchar(100) NOT NULL,
  `price` int(6) NOT NULL,
  `m2` int(3) NOT NULL,
  `garage` varchar(100) NOT NULL,
  `rooms` int(10) NOT NULL,
  `heating` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `publication_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `households`
--

INSERT INTO `households` (`id`, `ref_id`, `h_type`, `price`, `m2`, `garage`, `rooms`, `heating`, `location`, `publication_date`) VALUES
(11, '123ABC', 'flat', 200000, 150, 'true', 10, 'electric', 'Madrid', '01/10/2023'),
(12, '456DEF', 'house', 800000, 550, 'true', 15, 'natural_gas', 'Barcelona', '02/10/2023'),
(13, '789GHI', 'country_house', 30000, 300, 'true', 6, 'gas', 'Valencia', '03/10/2023'),
(14, '321JKL', 'office', 60000, 200, 'false', 10, 'electric', 'Sevilla', '04/10/2023'),
(15, '654MNO', 'warehouse', 10000, 25, 'false', 3, 'none', 'Alicante', '05/10/2023');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `households`
--
ALTER TABLE `households`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `reference` (`ref_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `households`
--
ALTER TABLE `households`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
