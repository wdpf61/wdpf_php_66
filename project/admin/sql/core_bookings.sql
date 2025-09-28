-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2024 at 09:22 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `core_bookings`
--

CREATE TABLE `core_bookings` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL,
  `order_total` float NOT NULL,
  `paid_total` float NOT NULL,
  `remark` text DEFAULT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core_bookings`
--

INSERT INTO `core_bookings` (`id`, `created_at`, `order_total`, `paid_total`, `remark`, `customer_id`) VALUES
(1, '2024-05-22 00:00:00', 1000, 1000, 'Test', 7),
(2, '2024-05-24 00:00:00', 700, 700, 'Test Update Api', 3),
(3, '2024-05-25 00:00:00', 3544, 3544, 'Test', 2),
(4, '2024-05-23 00:00:00', 500, 500, 'Test Api', 3),
(5, '0000-00-00 00:00:00', 446, 446, 'Test', 2),
(6, '0000-00-00 00:00:00', 344, 455, 'test', 1),
(7, '0000-00-00 00:00:00', 5000, 2000, 'NT', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `core_bookings`
--
ALTER TABLE `core_bookings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `core_bookings`
--
ALTER TABLE `core_bookings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
