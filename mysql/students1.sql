-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2025 at 08:32 AM
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
-- Database: `batch66`
--

-- --------------------------------------------------------

--
-- Table structure for table `students1`
--

CREATE TABLE `students1` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `class` int(10) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `students1`
--

INSERT INTO `students1` (`id`, `name`, `age`, `class`, `email`) VALUES
(1, 'Rahim', 15, 9, 'rahim1@example.com'),
(2, 'Karim', 16, 9, 'karim2@example.com'),
(3, 'Sajid', 17, 10, 'sajid3@example.com'),
(4, 'Hasan', 18, 10, 'hasan4@example.com'),
(5, 'Nadia', 19, 11, 'nadia5@example.com'),
(6, 'Mitu', 20, 12, 'mitu6@example.com'),
(7, 'Sumon', 21, 12, 'sumon7@example.com'),
(8, 'Anika', 22, 11, 'anika8@example.com'),
(9, 'Rafi', 23, 10, 'rafi9@example.com'),
(10, 'Tanvir', 24, 9, 'tanvir10@example.com'),
(11, 'Rafi', 18, 10, 'rafi11@example.com'),
(12, 'Nadia', 20, 11, 'nadia12@example.com'),
(13, 'Hasan', 22, 12, 'hasan13@example.com'),
(14, 'Sajid', 19, 9, 'sajid14@example.com'),
(15, 'Anika', 21, 10, 'anika15@example.com'),
(16, 'Mitu', 23, 11, 'mitu16@example.com'),
(17, 'Sumon', 17, 12, 'sumon17@example.com'),
(18, 'Rahim', 25, 9, 'rahim18@example.com'),
(19, 'Karim', 20, 10, 'karim19@example.com'),
(20, 'Sharmin', 18, 11, 'sharmin20@example.com'),
(21, 'Shuvo', 22, 12, 'shuvo21@example.com'),
(22, 'Tania', 19, 9, 'tania22@example.com'),
(23, 'Faruk', 21, 10, 'faruk23@example.com'),
(24, 'Lamia', 23, 11, 'lamia24@example.com'),
(25, 'Nusrat', 20, 12, 'nusrat25@example.com'),
(26, 'Jamil', 24, 9, 'jamil26@example.com'),
(27, 'Fahim', 18, 10, 'fahim27@example.com'),
(28, 'Alif', 19, 11, 'alif28@example.com'),
(29, 'Shanta', 22, 12, 'shanta29@example.com'),
(30, 'Parvez', 21, 9, 'parvez30@example.com'),
(31, 'Mim', 23, 10, 'mim31@example.com'),
(32, 'Adnan', 20, 11, 'adnan32@example.com'),
(33, 'Bithi', 18, 12, 'bithi33@example.com'),
(34, 'Nayeem', 25, 9, 'nayeem34@example.com'),
(35, 'Ruma', 19, 10, 'ruma35@example.com'),
(36, 'Sabbir', 21, 11, 'sabbir36@example.com'),
(37, 'Shila', 22, 12, 'shila37@example.com'),
(38, 'Asif', 20, 9, 'asif38@example.com'),
(39, 'Nafisa', 18, 10, 'nafisa39@example.com'),
(40, 'Rashed', 24, 11, 'rashed40@example.com'),
(41, 'Salma', 23, 12, 'salma41@example.com'),
(42, 'Rony', 19, 9, 'rony42@example.com'),
(43, 'Tasnim', 21, 10, 'tasnim43@example.com'),
(44, 'Imran', 22, 11, 'imran44@example.com'),
(45, 'Priya', 20, 12, 'priya45@example.com'),
(46, 'Maruf', 18, 9, 'maruf46@example.com'),
(47, 'Shamim', 25, 10, 'shamim47@example.com'),
(48, 'Liza', 19, 11, 'liza48@example.com'),
(49, 'Arif', 21, 12, 'arif49@example.com'),
(50, 'Rupa', 22, 9, 'rupa50@example.com'),
(51, 'Tarek', 20, 10, 'tarek51@example.com'),
(52, 'Joya', 18, 11, 'joya52@example.com'),
(53, 'Mamun', 23, 12, 'mamun53@example.com'),
(54, 'Papia', 21, 9, 'papia54@example.com'),
(55, 'Niloy', 19, 10, 'niloy55@example.com'),
(56, 'Keya', 22, 11, 'keya56@example.com'),
(57, 'Ovi', 20, 12, 'ovi57@example.com'),
(58, 'Moni', 24, 9, 'moni58@example.com'),
(59, 'Shorna', 18, 10, 'shorna59@example.com'),
(60, 'Habib', 23, 11, 'habib60@example.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students1`
--
ALTER TABLE `students1`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `students1`
--
ALTER TABLE `students1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
