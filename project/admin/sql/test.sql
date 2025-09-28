-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2024 at 09:10 AM
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

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `add_manufacturer` (`name` VARCHAR(20), `contact` VARCHAR(20))   begin
  insert into manufacturer(name,contact)values(name,contact);
end$$

DELIMITER ;

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

-- --------------------------------------------------------

--
-- Table structure for table `core_booking_details`
--

CREATE TABLE `core_booking_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `booking_id` int(10) UNSIGNED NOT NULL,
  `room_id` int(10) UNSIGNED NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core_booking_details`
--

INSERT INTO `core_booking_details` (`id`, `booking_id`, `room_id`, `from_date`, `to_date`, `price`) VALUES
(1, 1, 1, '2024-02-10', '2024-02-11', 500),
(2, 6, 2, '2024-05-01', '2024-05-03', 500),
(3, 6, 1, '2024-05-01', '2024-05-03', 2000),
(4, 7, 2, '2024-05-29', '2024-05-30', 500),
(5, 7, 1, '2024-05-29', '2024-05-30', 2000);

-- --------------------------------------------------------

--
-- Table structure for table `core_cattles`
--

CREATE TABLE `core_cattles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL,
  `region` varchar(45) NOT NULL,
  `dob` date NOT NULL,
  `color` varchar(45) NOT NULL,
  `description` text DEFAULT NULL,
  `photo` varchar(45) DEFAULT NULL,
  `gender` tinyint(1) UNSIGNED DEFAULT NULL,
  `cattle_category_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core_cattles`
--

INSERT INTO `core_cattles` (`id`, `name`, `region`, `dob`, `color`, `description`, `photo`, `gender`, `cattle_category_id`) VALUES
(2, 'Black and White', 'Indian', '2021-05-07', 'White', '', '2.webp', 1, 2),
(3, 'BlackCow', 'Indian', '2021-05-07', 'Black', '', '3.jpeg', 1, 1),
(19, 'Goat 25', 'Deshi', '2024-05-01', 'Red', '', '19.png', 0, 1),
(24, 'Goat 25', 'Deshi', '2021-05-07', 'Red', 'Test', '1-925-webp.webp', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `core_cattle_categories`
--

CREATE TABLE `core_cattle_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core_cattle_categories`
--

INSERT INTO `core_cattle_categories` (`id`, `name`) VALUES
(1, 'Cow'),
(2, 'Goat');

-- --------------------------------------------------------

--
-- Table structure for table `core_contacts`
--

CREATE TABLE `core_contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL,
  `contact_category_id` int(10) UNSIGNED NOT NULL,
  `contact_no` varchar(45) NOT NULL,
  `email` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_contacts`
--

INSERT INTO `core_contacts` (`id`, `name`, `contact_category_id`, `contact_no`, `email`) VALUES
(1, 'Mehedi', 4, '01797993131', 'mehedihasandb0@gmail.com'),
(2, 'Jahid', 1, '3423423', 'jahid1@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `core_contact_categories`
--

CREATE TABLE `core_contact_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_contact_categories`
--

INSERT INTO `core_contact_categories` (`id`, `name`) VALUES
(1, 'Family'),
(2, 'Relative'),
(3, 'Friend'),
(4, 'Student');

-- --------------------------------------------------------

--
-- Table structure for table `core_customers`
--

CREATE TABLE `core_customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL,
  `mobile` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `address` text DEFAULT NULL,
  `photo` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_customers`
--

INSERT INTO `core_customers` (`id`, `name`, `mobile`, `email`, `created_at`, `updated_at`, `address`, `photo`) VALUES
(1, 'Md. Jahidul Islam', '999999999', 'jahid1@yahoo.com', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(2, 'Rejaul Karim', '4353445546', 'Reza@yahoo.com', '2023-12-05 10:27:02', '2023-12-05 10:27:02', '', '2.jpg'),
(3, 'Niyamot', '3434343', 'niyamot@yahoo.com', '2023-12-05 10:27:19', '2023-12-05 10:27:19', '', '3.png'),
(4, 'Kamrul', '23432432423', 'kamrul@gmail.com', '2023-12-05 10:43:37', '2023-12-05 10:43:37', '', '4.png'),
(5, 'Silvia', '34324232', 'silvia@gmail.com', '2023-12-05 10:43:49', '2023-12-05 10:43:49', '', '5.jpg'),
(6, 'Jahidul Islam', '34324324', 'mehedihasandb0@gmail.com', '2023-12-05 10:28:16', '2023-12-05 10:28:16', '333', 'beetroot-hummus-23bae4e-jpg.jpg'),
(7, 'Jahidul2', '34324324', 'mehedihasandb0@gmail.com', '2023-12-05 10:43:59', '2023-12-05 10:43:59', '343', '7.jpg'),
(8, 'Mehedi3', '34324324', 'mehedihasandb0@gmail.com', '2023-12-05 10:31:09', '2023-12-05 10:31:09', '', '34324324.jpg'),
(9, 'Sabbir Ahmed', '34343434', 'sabbir3@gmail.com', '2023-12-30 09:30:13', '2023-12-30 09:30:13', 'NA', NULL),
(10, 'Abdur Rahman', '35443434', 'abrahman@gmail.com', '2023-12-30 09:32:00', '2023-12-30 09:32:00', 'Rampua', NULL),
(11, 'Mahedi Hassan', '9433442', 'mahedi@gmail.com', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Testing Address', '11.jpeg'),
(12, 'Mahedi Hassanere', '9433442sfds', 'mah3edi@gmail.com', '2023-12-30 09:59:14', '2023-12-30 09:59:14', 'NA', NULL),
(15, 'Siam', '44444444', 'siam@yahoo.com', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `core_departments`
--

CREATE TABLE `core_departments` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_departments`
--

INSERT INTO `core_departments` (`id`, `code`, `name`) VALUES
(1, '10', 'Accounts'),
(2, '20', 'IT'),
(3, '30', 'HR'),
(4, '40', 'Sales and Marketing');

-- --------------------------------------------------------

--
-- Table structure for table `core_districts`
--

CREATE TABLE `core_districts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL,
  `division_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_districts`
--

INSERT INTO `core_districts` (`id`, `name`, `division_id`) VALUES
(1, 'Narayangang', 1),
(2, 'Nonakhali', 3),
(3, 'Feni', 3),
(4, 'Tingile', 1),
(5, 'Gajipur', 1),
(6, 'Potuakhali', 2),
(7, 'Dhaka', 1);

-- --------------------------------------------------------

--
-- Table structure for table `core_divisions`
--

CREATE TABLE `core_divisions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_divisions`
--

INSERT INTO `core_divisions` (`id`, `name`) VALUES
(1, 'Dhaka'),
(2, 'Borishal'),
(3, 'Chottrogram');

-- --------------------------------------------------------

--
-- Table structure for table `core_failed_jobs`
--

CREATE TABLE `core_failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `core_hms_consultants`
--

CREATE TABLE `core_hms_consultants` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL,
  `hms_department_id` int(10) UNSIGNED NOT NULL,
  `designation` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_hms_consultants`
--

INSERT INTO `core_hms_consultants` (`id`, `name`, `hms_department_id`, `designation`) VALUES
(1, 'Dr. Moshaidul Islam', 1, 'MBBS');

-- --------------------------------------------------------

--
-- Table structure for table `core_hms_departments`
--

CREATE TABLE `core_hms_departments` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_hms_departments`
--

INSERT INTO `core_hms_departments` (`id`, `name`) VALUES
(1, 'Medicine');

-- --------------------------------------------------------

--
-- Table structure for table `core_hms_medicines`
--

CREATE TABLE `core_hms_medicines` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL,
  `hms_medicine_category_id` int(10) UNSIGNED NOT NULL,
  `hms_medicine_type_id` int(10) UNSIGNED NOT NULL,
  `generic_name` varchar(45) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_hms_medicines`
--

INSERT INTO `core_hms_medicines` (`id`, `name`, `hms_medicine_category_id`, `hms_medicine_type_id`, `generic_name`, `description`) VALUES
(1, 'Napa 500mg', 4, 1, 'Paracitamal', 'Na'),
(2, 'Seclo 20mg', 3, 4, 'Antacid', 'Na');

-- --------------------------------------------------------

--
-- Table structure for table `core_hms_medicine_categories`
--

CREATE TABLE `core_hms_medicine_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_hms_medicine_categories`
--

INSERT INTO `core_hms_medicine_categories` (`id`, `name`) VALUES
(1, 'Antibiotic'),
(2, 'Vitamin'),
(3, 'Painkiller'),
(4, 'Antacids');

-- --------------------------------------------------------

--
-- Table structure for table `core_hms_medicine_types`
--

CREATE TABLE `core_hms_medicine_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_hms_medicine_types`
--

INSERT INTO `core_hms_medicine_types` (`id`, `name`) VALUES
(1, 'Tab'),
(2, 'Inj'),
(3, 'Syr'),
(4, 'Cap');

-- --------------------------------------------------------

--
-- Table structure for table `core_hms_patients`
--

CREATE TABLE `core_hms_patients` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL,
  `mobile` varchar(45) NOT NULL,
  `dob` date NOT NULL,
  `mob_ext` int(10) UNSIGNED NOT NULL,
  `gender` tinyint(3) UNSIGNED NOT NULL,
  `profession` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_hms_patients`
--

INSERT INTO `core_hms_patients` (`id`, `name`, `mobile`, `dob`, `mob_ext`, `gender`, `profession`) VALUES
(1, 'Jahidul Islam', '038403423', '2000-01-01', 1, 0, 'student'),
(2, 'Jamuna', '034343345', '2023-01-02', 1, 1, 'na');

-- --------------------------------------------------------

--
-- Table structure for table `core_hms_prescriptions`
--

CREATE TABLE `core_hms_prescriptions` (
  `id` int(10) UNSIGNED NOT NULL,
  `patient_id` int(10) UNSIGNED NOT NULL,
  `consultant_id` int(10) UNSIGNED NOT NULL,
  `cc` text NOT NULL,
  `rf` text NOT NULL,
  `investigation` text NOT NULL,
  `advice` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `core_hms_prescription_details`
--

CREATE TABLE `core_hms_prescription_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `prescription_id` int(10) UNSIGNED NOT NULL,
  `medicine_id` int(10) UNSIGNED NOT NULL,
  `dose` varchar(20) NOT NULL,
  `days` double NOT NULL,
  `suggestion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `core_manufacturers`
--

CREATE TABLE `core_manufacturers` (
  `id` int(10) NOT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_manufacturers`
--

INSERT INTO `core_manufacturers` (`id`, `name`) VALUES
(1, 'APCL'),
(2, 'ISL'),
(3, 'IDB');

-- --------------------------------------------------------

--
-- Table structure for table `core_mfg_boms`
--

CREATE TABLE `core_mfg_boms` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `qty` varchar(45) NOT NULL,
  `labour_cost` float NOT NULL,
  `date` datetime DEFAULT NULL,
  `remark` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_mfg_boms`
--

INSERT INTO `core_mfg_boms` (`id`, `code`, `name`, `product_id`, `qty`, `labour_cost`, `date`, `remark`) VALUES
(1, '100', 'T-Shirt', 1, '100', 2000, NULL, NULL),
(2, '343', 'BM-3', 47, '3', 45, NULL, NULL),
(3, '3532', 'BM93', 47, '34', 432, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `core_mfg_bom_details`
--

CREATE TABLE `core_mfg_bom_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `bom_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `qty` float NOT NULL,
  `cost` float NOT NULL,
  `uom_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_mfg_bom_details`
--

INSERT INTO `core_mfg_bom_details` (`id`, `bom_id`, `product_id`, `qty`, `cost`, `uom_id`) VALUES
(1, 1, 400, 200, 100, 1),
(2, 1, 401, 100, 10, 2),
(3, 1, 402, 10, 50, 3),
(4, 3, 49, 13, 30, 1),
(5, 3, 17, 14, 2500, 1);

-- --------------------------------------------------------

--
-- Table structure for table `core_mfg_bom_secondary_products`
--

CREATE TABLE `core_mfg_bom_secondary_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `qty` float NOT NULL,
  `price` float NOT NULL,
  `uom` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_mfg_bom_secondary_products`
--

INSERT INTO `core_mfg_bom_secondary_products` (`id`, `product_id`, `qty`, `price`, `uom`) VALUES
(1, 500, 5, 400, 5);

-- --------------------------------------------------------

--
-- Table structure for table `core_mfg_productions`
--

CREATE TABLE `core_mfg_productions` (
  `id` int(10) UNSIGNED NOT NULL,
  `production_datetime` datetime NOT NULL,
  `bom_id` int(10) UNSIGNED NOT NULL,
  `qty` float NOT NULL,
  `labor_cost` float NOT NULL,
  `manager_id` int(10) UNSIGNED NOT NULL,
  `total_cost` float NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `uom_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `core_mfg_production_details`
--

CREATE TABLE `core_mfg_production_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `production_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `qty` float NOT NULL,
  `uom_id` int(10) UNSIGNED NOT NULL,
  `cost` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `core_migrations`
--

CREATE TABLE `core_migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `core_migrations`
--

INSERT INTO `core_migrations` (`id`, `migration`, `batch`) VALUES
(6, '2014_10_12_000000_create_users_table', 1),
(7, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(8, '2014_10_12_100000_create_password_resets_table', 1),
(9, '2019_08_19_000000_create_failed_jobs_table', 1),
(10, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `core_money_receipts`
--

CREATE TABLE `core_money_receipts` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `remark` text DEFAULT NULL,
  `receipt_total` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_money_receipts`
--

INSERT INTO `core_money_receipts` (`id`, `created_at`, `updated_at`, `customer_id`, `remark`, `receipt_total`) VALUES
(1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'Na', 100),
(2, '2023-12-27 13:57:23', '2023-12-27 13:57:23', 0, 'NA', 0),
(3, '2023-12-27 13:59:35', '2023-12-27 13:59:35', 0, 'NA', 0),
(4, '2023-12-27 14:00:07', '2023-12-27 14:00:07', 0, 'NA', 0),
(5, '2023-12-27 14:00:27', '2023-12-27 14:00:27', 0, 'NA', 0),
(6, '2023-12-27 14:02:47', '2023-12-27 14:02:47', 2, '', 3673.95),
(7, '2023-12-27 14:04:33', '2023-12-27 14:04:33', 3, '', 6487.95),
(8, '2023-12-27 14:06:11', '2023-12-27 14:06:11', 1, '', 2625),
(9, '2023-12-28 09:59:35', '2023-12-28 09:59:35', 0, 'NA', 0),
(10, '2023-12-28 10:00:38', '2023-12-28 10:00:38', 1, 'NA', 200),
(11, '2023-12-28 10:03:17', '2023-12-28 10:03:17', 0, 'NA', 0),
(12, '2023-12-28 10:14:49', '2023-12-28 10:14:49', 0, 'NA', 0),
(13, '2023-12-28 10:15:57', '2023-12-28 10:15:57', 0, 'NA', 0),
(14, '2023-12-28 10:21:16', '2023-12-28 10:21:16', 0, 'NA', 0),
(15, '2023-12-28 10:22:41', '2023-12-28 10:22:41', 0, 'NA', 0),
(16, '2023-12-28 10:25:03', '2023-12-28 10:25:03', 0, 'NA', 0),
(17, '2023-12-28 10:26:13', '2023-12-28 10:26:13', 0, 'NA', 0),
(18, '2023-12-28 10:26:23', '2023-12-28 10:26:23', 0, 'NA', 0),
(19, '2023-12-28 10:26:34', '2023-12-28 10:26:34', 0, 'NA', 0),
(20, '2023-12-28 10:31:35', '2023-12-28 10:31:35', 1, 'Test', 200),
(21, '2023-12-28 10:34:39', '2023-12-28 10:34:39', 1, 'NA', 200),
(22, '2023-12-28 10:34:48', '2023-12-28 10:34:48', 1, 'NA', 200),
(23, '2024-01-03 12:50:54', '2024-01-03 12:50:54', 0, '', 12304.95),
(24, '2024-01-03 12:53:38', '2024-01-03 12:53:38', 0, '', 1426.95),
(25, '2024-01-03 12:57:41', '2024-01-03 12:57:41', 0, '', 1426.95),
(26, '2024-01-03 13:01:07', '2024-01-03 13:01:07', 0, '', 1426.95),
(27, '2024-01-03 13:04:23', '2024-01-03 13:04:23', 1, '', 1426.95),
(28, '2024-01-03 13:07:18', '2024-01-03 13:07:18', 1, '', 1426.95),
(29, '2024-01-03 13:09:58', '2024-01-03 13:09:58', 1, '', 1426.95);

-- --------------------------------------------------------

--
-- Table structure for table `core_money_receipt_details`
--

CREATE TABLE `core_money_receipt_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `money_receipt_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `price` double NOT NULL,
  `qty` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_money_receipt_details`
--

INSERT INTO `core_money_receipt_details` (`id`, `money_receipt_id`, `product_id`, `price`, `qty`) VALUES
(1, 1, 36, 100, 1),
(2, 7, 0, 2500, 2),
(3, 7, 0, 180, 1),
(4, 7, 0, 999, 1),
(5, 8, 36, 2500, 1),
(6, 25, 0, 180, 2),
(7, 25, 0, 999, 1),
(8, 26, 46, 180, 2),
(9, 26, 47, 999, 1),
(10, 27, 46, 180, 2),
(11, 27, 47, 999, 1),
(12, 28, 46, 180, 2),
(13, 28, 47, 999, 1),
(14, 29, 46, 180, 2),
(15, 29, 47, 999, 1);

-- --------------------------------------------------------

--
-- Table structure for table `core_orders`
--

CREATE TABLE `core_orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `order_date` datetime NOT NULL,
  `delivery_date` datetime NOT NULL,
  `shipping_address` text DEFAULT NULL,
  `order_total` double NOT NULL DEFAULT 0,
  `paid_amount` double NOT NULL DEFAULT 0,
  `remark` text DEFAULT NULL,
  `status_id` int(10) UNSIGNED DEFAULT 1,
  `discount` float DEFAULT 0,
  `vat` float DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_orders`
--

INSERT INTO `core_orders` (`id`, `customer_id`, `order_date`, `delivery_date`, `shipping_address`, `order_total`, `paid_amount`, `remark`, `status_id`, `discount`, `vat`, `created_at`, `updated_at`) VALUES
(2, 1, '2021-12-13 00:00:00', '2021-12-13 00:00:00', 'na', 0, 0, 'Na', 1, 0, 0, '2021-12-14 06:40:41', '2021-12-14 06:40:41'),
(3, 1, '2021-12-13 00:00:00', '2021-12-13 00:00:00', 'na', 0, 0, 'Na', 1, 0, 0, '2021-12-14 06:40:41', '2021-12-14 06:40:41'),
(4, 2, '2021-12-13 00:00:00', '2021-12-13 00:00:00', 'na', 0, 0, 'Na', 1, 0, 0, '2021-12-14 06:40:41', '2021-12-14 06:40:41'),
(5, 1, '2021-12-13 00:00:00', '2021-12-13 00:00:00', 'na', 0, 0, 'Na', 1, 0, 0, '2021-12-14 06:40:41', '2021-12-14 06:40:41'),
(6, 1, '2021-12-14 00:00:00', '2021-12-14 00:00:00', 'Mirpur', 0, 0, '', 2, 0, 0, '2023-12-05 11:54:41', '2023-12-05 11:54:41'),
(7, 3, '2021-12-14 00:00:00', '2021-12-14 00:00:00', 'Mirpur', 0, 0, NULL, 1, NULL, NULL, '2021-12-14 01:02:07', '2021-12-14 01:02:07'),
(8, 2, '2021-12-14 00:00:00', '2021-12-14 00:00:00', 'Mirpur', 0, 0, NULL, 1, 0, 0, '2021-12-14 01:03:51', '2021-12-14 01:03:51'),
(9, 1, '2021-12-14 00:00:00', '2021-12-14 00:00:00', 'Mirpur', 0, 0, NULL, 1, 0, 0, '2021-12-14 01:05:32', '2021-12-14 01:05:32'),
(10, 1, '2021-12-14 00:00:00', '2021-12-14 00:00:00', 'Mirpur', 0, 0, NULL, 1, 0, 0, '2021-12-14 01:06:21', '2021-12-14 01:06:21'),
(11, 3, '2021-12-14 00:00:00', '2021-12-14 00:00:00', 'Mirpur', 0, 0, NULL, 1, 0, 0, '2021-12-14 01:07:13', '2021-12-14 01:07:13'),
(12, 2, '2021-12-14 00:00:00', '2021-12-14 00:00:00', 'Mirpur', 0, 0, NULL, 1, 0, 0, '2021-12-14 01:10:25', '2021-12-14 01:10:25'),
(13, 1, '2021-12-14 00:00:00', '2021-12-14 00:00:00', 'Mirpur', 0, 0, NULL, 1, 0, 0, '2021-12-14 01:13:06', '2021-12-14 01:13:06'),
(14, 1, '2021-12-14 00:00:00', '2021-12-14 00:00:00', 'Mirpur', 0, 0, NULL, 1, 0, 0, '2021-12-14 01:14:27', '2021-12-14 01:14:27'),
(15, 3, '2021-12-15 00:00:00', '2021-12-15 00:00:00', 'Rampura', 0, 0, 'Testing', 1, 0, 0, '2021-12-15 12:48:59', '2021-12-15 12:48:59'),
(16, 1, '2022-01-06 00:00:00', '2022-01-06 00:00:00', 'Rampura', 0, 0, 'NA', 1, 0, 0, '2022-01-06 06:39:11', '2022-01-06 06:39:11'),
(17, 1, '2022-01-06 00:00:00', '2022-01-06 00:00:00', 'Rampura', 0, 0, 'NA', 1, 0, 0, '2022-01-06 06:43:37', '2022-01-06 06:43:37'),
(18, 1, '2022-01-06 00:00:00', '2022-01-06 00:00:00', 'Rampura', 0, 0, 'NA', 1, 0, 0, '2022-01-06 09:14:42', '2022-01-06 09:14:42'),
(19, 1, '2022-01-08 00:00:00', '2022-01-08 00:00:00', 'Rampura', 0, 0, 'NA', 1, 0, 0, '2022-01-08 03:05:54', '2022-01-08 03:05:54'),
(20, 1, '2022-01-08 00:00:00', '2022-01-08 00:00:00', 'Rampura', 0, 0, 'NA', 3, 0, 0, '2023-12-05 12:07:44', '2023-12-05 12:07:44'),
(21, 1, '2022-01-08 00:00:00', '2022-01-08 00:00:00', 'Rampura', 0, 0, 'NA', 4, 0, 0, '2023-12-05 12:06:48', '2023-12-05 12:06:48'),
(22, 8, '2023-12-24 00:00:00', '2023-12-24 00:00:00', 'Mohammadpur', 1636.95, 0, '', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 1, '2023-12-27 00:00:00', '2023-12-27 00:00:00', 'Rampura, Banasree', 1426.95, 0, 'Na', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 4, '2024-01-03 00:00:00', '2024-01-03 00:00:00', 'Dhanmondi, Dhaka', 12304.95, 0, 'Test', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 1, '2024-03-13 00:00:00', '2024-03-13 00:00:00', 'na', 0, 0, NULL, 1, 0, 0, '2024-03-13 02:26:34', '2024-03-13 02:26:34'),
(26, 2, '2024-03-13 00:00:00', '2024-03-13 00:00:00', 'na', 0, 0, NULL, 1, 0, 0, '2024-03-13 02:40:15', '2024-03-13 02:40:15'),
(27, 23, '2024-03-21 00:00:00', '2024-03-24 00:00:00', 'Rampura', 0, 0, NULL, 1, 0, 0, '2024-05-12 05:46:43', '2024-05-12 05:46:43'),
(28, 23, '2024-03-21 00:00:00', '2024-03-24 00:00:00', 'Rampura', 100, 0, NULL, 1, 0, 0, '2024-05-12 05:48:18', '2024-05-12 05:48:18'),
(29, 23, '2024-03-21 00:00:00', '2024-03-24 00:00:00', 'Rampura', 100, 0, NULL, 1, 0, 0, '2024-05-12 05:48:50', '2024-05-12 05:48:50'),
(30, 23, '2024-03-21 00:00:00', '2024-03-24 00:00:00', 'Rampura', 100, 0, NULL, 1, 0, 0, '2024-05-12 05:48:54', '2024-05-12 05:48:54'),
(31, 23, '2024-03-21 00:00:00', '2024-03-24 00:00:00', 'Rampura', 100, 0, NULL, 1, 0, 0, '2024-05-12 05:48:57', '2024-05-12 05:48:57'),
(32, 1, '2024-05-14 00:00:00', '2024-05-14 00:00:00', 'Rampura', 100, 0, NULL, 1, 0, 0, '2024-05-12 06:40:03', '2024-05-12 06:40:03');

-- --------------------------------------------------------

--
-- Table structure for table `core_order_details`
--

CREATE TABLE `core_order_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `qty` float NOT NULL,
  `price` float NOT NULL,
  `vat` float NOT NULL DEFAULT 0,
  `discount` float NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_order_details`
--

INSERT INTO `core_order_details` (`id`, `order_id`, `product_id`, `qty`, `price`, `vat`, `discount`, `created_at`, `updated_at`) VALUES
(1, 1, 17, 1, 16, 0, 0, '2021-12-14 06:45:23', '2021-12-14 06:45:23'),
(2, 1, 18, 1, 40, 0, 0, '2021-12-14 06:45:23', '2021-12-14 06:45:23'),
(3, 2, 18, 4, 40, 0, 0, '2021-12-14 06:45:23', '2021-12-14 06:45:23'),
(4, 2, 17, 2, 16, 0, 0, '2021-12-14 06:45:23', '2021-12-14 06:45:23'),
(5, 3, 17, 2, 16, 0, 0, '2021-12-14 06:45:23', '2021-12-14 06:45:23'),
(6, 3, 18, 1, 40, 0, 0, '2021-12-14 06:45:23', '2021-12-14 06:45:23'),
(7, 4, 17, 1, 16, 0, 0, '2021-12-14 06:45:23', '2021-12-14 06:45:23'),
(8, 4, 18, 1, 40, 0, 0, '2021-12-14 06:45:23', '2021-12-14 06:45:23'),
(9, 5, 17, 1, 16, 0, 0, '2021-12-14 06:45:23', '2021-12-14 06:45:23'),
(10, 14, 18, 1, 30, 0, 0, '2021-12-14 01:14:27', '2021-12-14 01:14:27'),
(11, 14, 17, 1, 15, 0, 0, '2021-12-14 01:14:27', '2021-12-14 01:14:27'),
(12, 15, 18, 1, 40, 0, 0, '2021-12-15 12:48:59', '2021-12-15 12:48:59'),
(13, 15, 17, 2, 16, 0, 0, '2021-12-15 12:48:59', '2021-12-15 12:48:59'),
(14, 16, 28, 1, 5000, 0, 0, '2022-01-06 06:39:11', '2022-01-06 06:39:11'),
(15, 16, 29, 1, 342, 0, 0, '2022-01-06 06:39:11', '2022-01-06 06:39:11'),
(16, 17, 29, 1, 342, 0, 0, '2022-01-06 06:43:37', '2022-01-06 06:43:37'),
(17, 17, 28, 1, 5000, 0, 0, '2022-01-06 06:43:37', '2022-01-06 06:43:37'),
(18, 17, 20, 1, 110, 0, 0, '2022-01-06 06:43:37', '2022-01-06 06:43:37'),
(19, 18, 28, 10, 5000, 0, 0, '2022-01-06 09:14:42', '2022-01-06 09:14:42'),
(20, 19, 30, 1, 7999, 0, 0, '2022-01-08 03:05:54', '2022-01-08 03:05:54'),
(21, 19, 31, 1, 4444, 0, 0, '2022-01-08 03:05:54', '2022-01-08 03:05:54'),
(22, 19, 20, 1, 110, 0, 0, '2022-01-08 03:05:55', '2022-01-08 03:05:55'),
(23, 20, 29, 1, 342, 0, 0, '2022-01-08 03:06:58', '2022-01-08 03:06:58'),
(24, 20, 20, 1, 110, 0, 0, '2022-01-08 03:06:58', '2022-01-08 03:06:58'),
(25, 20, 30, 1, 7999, 0, 0, '2022-01-08 03:06:58', '2022-01-08 03:06:58'),
(26, 20, 32, 1, 5555, 0, 0, '2022-01-08 03:06:58', '2022-01-08 03:06:58'),
(27, 21, 29, 1, 342, 0, 0, '2022-01-08 03:07:27', '2022-01-08 03:07:27'),
(28, 21, 28, 1, 5000, 0, 0, '2022-01-08 03:07:27', '2022-01-08 03:07:27'),
(29, 21, 31, 1, 4444, 0, 0, '2022-01-08 03:07:27', '2022-01-08 03:07:27'),
(30, 21, 32, 2, 5555, 0, 0, '2022-01-08 03:07:27', '2022-01-08 03:07:27'),
(31, 21, 30, 1, 7999, 0, 0, '2022-01-08 03:07:27', '2022-01-08 03:07:27'),
(32, 21, 20, 1, 110, 0, 0, '2022-01-08 03:07:28', '2022-01-08 03:07:28'),
(40, 25, 18, 1, 180, 0, 0, '2024-03-13 02:26:34', '2024-03-13 02:26:34'),
(41, 25, 17, 1, 2500, 0, 0, '2024-03-13 02:26:34', '2024-03-13 02:26:34'),
(42, 26, 18, 1, 180, 0, 0, '2024-03-13 02:40:15', '2024-03-13 02:40:15'),
(43, 26, 17, 1, 2500, 0, 0, '2024-03-13 02:40:15', '2024-03-13 02:40:15'),
(44, 32, 17, 1, 100, 0, 0, '2024-05-12 06:40:03', '2024-05-12 06:40:03');

-- --------------------------------------------------------

--
-- Table structure for table `core_password_resets`
--

CREATE TABLE `core_password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `core_password_reset_tokens`
--

CREATE TABLE `core_password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `core_personal_access_tokens`
--

CREATE TABLE `core_personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `core_persons`
--

CREATE TABLE `core_persons` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL,
  `position_id` int(10) UNSIGNED NOT NULL,
  `sex` tinyint(1) NOT NULL,
  `dob` date NOT NULL,
  `doj` date NOT NULL,
  `mobile` varchar(45) NOT NULL,
  `address` varchar(45) DEFAULT NULL,
  `inactive` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_persons`
--

INSERT INTO `core_persons` (`id`, `name`, `position_id`, `sex`, `dob`, `doj`, `mobile`, `address`, `inactive`) VALUES
(1, 'Jahidul Islam', 1, 0, '2000-01-01', '2021-01-01', '677657657567', 'Rampura', 0);

-- --------------------------------------------------------

--
-- Table structure for table `core_positions`
--

CREATE TABLE `core_positions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL,
  `grade` int(10) UNSIGNED NOT NULL,
  `department_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_positions`
--

INSERT INTO `core_positions` (`id`, `name`, `grade`, `department_id`) VALUES
(1, 'Programmer', 6, 2),
(2, 'System Analyst', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `core_products`
--

CREATE TABLE `core_products` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `offer_price` double DEFAULT NULL,
  `manufacturer_id` int(10) NOT NULL,
  `regular_price` double NOT NULL,
  `description` text DEFAULT NULL,
  `photo` varchar(50) DEFAULT NULL,
  `product_category_id` int(10) UNSIGNED NOT NULL,
  `product_section_id` int(10) UNSIGNED NOT NULL,
  `is_featured` tinyint(1) DEFAULT 0,
  `star` int(10) UNSIGNED DEFAULT NULL,
  `is_brand` tinyint(1) DEFAULT 0,
  `offer_discount` float DEFAULT 0,
  `uom_id` int(10) UNSIGNED NOT NULL,
  `weight` float DEFAULT NULL,
  `barcode` varchar(45) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp(),
  `product_type_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_products`
--

INSERT INTO `core_products` (`id`, `name`, `offer_price`, `manufacturer_id`, `regular_price`, `description`, `photo`, `product_category_id`, `product_section_id`, `is_featured`, `star`, `is_brand`, `offer_discount`, `uom_id`, `weight`, `barcode`, `created_at`, `updated_at`, `product_type_id`) VALUES
(17, 'Brown Borka', 2500, 1, 4000, '', '36.jpg', 2, 1, 1, 0, 1, 0, 1, 0, '4456342342', '0000-00-00 00:00:00', '2024-03-07 11:43:46', 2),
(50, 'Apple', 345, 1, 400, 'NA', 'default.jpg', 1, 1, 0, 5, 1, 0, 1, 0, '1002', '2024-03-20 09:57:44', '2024-03-20 09:57:44', 1);

-- --------------------------------------------------------

--
-- Table structure for table `core_product_brands`
--

CREATE TABLE `core_product_brands` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_product_brands`
--

INSERT INTO `core_product_brands` (`id`, `name`) VALUES
(1, 'RFL'),
(2, 'Bengal');

-- --------------------------------------------------------

--
-- Table structure for table `core_product_categories`
--

CREATE TABLE `core_product_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL,
  `section_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_product_categories`
--

INSERT INTO `core_product_categories` (`id`, `name`, `section_id`, `created_at`, `updated_at`) VALUES
(2, 'Vegetables', 3, '2022-01-11 06:46:24', NULL),
(3, 'Fish', 3, '2022-01-11 06:46:24', NULL),
(4, 'Drugs', 3, '2022-01-11 06:46:24', NULL),
(5, 'Cameras', 1, '2022-01-11 06:46:24', NULL),
(6, 'Computers, Tablets & Laptops', 1, '2022-01-11 06:46:24', NULL),
(7, 'Mobile Phone', 1, '2022-01-11 06:46:24', NULL),
(8, 'Sound & Vision', 1, '2022-01-11 06:46:24', NULL),
(9, 'Women\'s', 2, '2022-01-11 06:46:24', NULL),
(10, 'Men\'s', 2, '2022-01-11 06:46:24', NULL),
(11, 'Kids', 2, '2022-01-11 06:46:24', NULL),
(12, 'Cosmatics', 4, '2022-01-11 06:46:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `core_product_sections`
--

CREATE TABLE `core_product_sections` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL,
  `unit_id` int(10) UNSIGNED DEFAULT NULL,
  `photo` varchar(145) DEFAULT NULL,
  `icon` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core_product_sections`
--

INSERT INTO `core_product_sections` (`id`, `name`, `unit_id`, `photo`, `icon`) VALUES
(1, 'Section1', 1, NULL, NULL),
(2, 'Section2', 1, NULL, NULL),
(3, 'Section3', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `core_product_units`
--

CREATE TABLE `core_product_units` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL,
  `photo` varchar(45) DEFAULT NULL,
  `icon` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core_product_units`
--

INSERT INTO `core_product_units` (`id`, `name`, `photo`, `icon`) VALUES
(1, 'Electronics', NULL, NULL),
(2, 'Grocery', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `core_purchases`
--

CREATE TABLE `core_purchases` (
  `id` int(10) UNSIGNED NOT NULL,
  `supplier_id` int(10) UNSIGNED NOT NULL,
  `purchase_date` datetime NOT NULL,
  `delivery_date` datetime NOT NULL,
  `shipping_address` text NOT NULL,
  `purchase_total` double NOT NULL,
  `paid_amount` double DEFAULT NULL,
  `remark` text DEFAULT NULL,
  `status_id` int(10) UNSIGNED NOT NULL,
  `discount` float DEFAULT 0,
  `vat` float DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_purchases`
--

INSERT INTO `core_purchases` (`id`, `supplier_id`, `purchase_date`, `delivery_date`, `shipping_address`, `purchase_total`, `paid_amount`, `remark`, `status_id`, `discount`, `vat`, `created_at`, `updated_at`) VALUES
(1, 1, '2023-12-24 00:00:00', '2023-12-24 00:00:00', 'Rangpur', 18375, 0, 'Na', 1, 0, 0, '2024-03-31 10:17:58', '2024-03-31 10:17:42'),
(2, 2, '2023-12-24 00:00:00', '2023-12-24 00:00:00', '', 22050, 0, '', 1, 0, 0, '2024-03-31 10:17:58', '2024-03-31 10:17:42'),
(3, 1, '2023-12-24 00:00:00', '2023-12-24 00:00:00', '', 2121, 0, '', 1, 0, 0, '2024-03-31 10:17:58', '2024-03-31 10:17:42'),
(4, 1, '2023-12-24 00:00:00', '2023-12-24 00:00:00', '', 9450, 0, '', 1, 0, 0, '2024-03-31 10:17:58', '2024-03-31 10:17:42'),
(5, 1, '2024-03-10 00:00:00', '2024-03-10 00:00:00', 'Rampura', 0, 0, NULL, 1, 0, 0, '2024-03-31 04:20:36', '2024-03-31 04:20:36'),
(6, 1, '2024-03-10 00:00:00', '2024-03-10 00:00:00', 'Rampura', 0, 0, NULL, 1, 0, 0, '2024-03-31 04:25:03', '2024-03-31 04:25:03'),
(7, 1, '2024-03-10 00:00:00', '2024-03-10 00:00:00', 'Rampura', 0, 0, NULL, 1, 0, 0, '2024-03-31 04:26:17', '2024-03-31 04:26:17'),
(8, 1, '2024-03-10 00:00:00', '2024-03-10 00:00:00', 'Rampura', 0, 0, NULL, 1, 0, 0, '2024-04-01 03:52:29', '2024-04-01 03:52:29'),
(9, 1, '2024-03-10 00:00:00', '2024-03-10 00:00:00', 'Rampura', 0, 0, NULL, 1, 0, 0, '2024-04-01 03:53:48', '2024-04-01 03:53:48'),
(10, 1, '2024-03-10 00:00:00', '2024-03-10 00:00:00', 'Rampura', 0, 0, NULL, 1, 0, 0, '2024-04-01 03:56:29', '2024-04-01 03:56:29'),
(11, 1, '2024-03-10 00:00:00', '2024-03-10 00:00:00', 'Rampura', 0, 0, NULL, 1, 0, 0, '2024-04-01 04:22:59', '2024-04-01 04:22:59'),
(12, 2, '2024-04-03 00:00:00', '2024-04-03 00:00:00', 'Test', 0, 0, NULL, 1, 0, 0, '2024-04-02 03:48:06', '2024-04-02 03:48:06'),
(13, 2, '2024-04-03 00:00:00', '2024-04-03 00:00:00', 'Test', 0, 0, NULL, 1, 0, 0, '2024-04-02 03:49:37', '2024-04-02 03:49:37'),
(14, 2, '2024-04-03 00:00:00', '2024-04-03 00:00:00', 'Test', 0, 0, NULL, 1, 0, 0, '2024-04-02 03:50:35', '2024-04-02 03:50:35'),
(15, 2, '2024-04-03 00:00:00', '2024-04-03 00:00:00', 'Test', 0, 0, NULL, 1, 0, 0, '2024-04-02 03:51:47', '2024-04-02 03:51:47'),
(16, 1, '2024-06-04 00:00:00', '2024-06-04 00:00:00', 'Test', 2987.25, 0, '  NA', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `core_purchase_details`
--

CREATE TABLE `core_purchase_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `purchase_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `qty` float NOT NULL,
  `price` float NOT NULL,
  `vat` float NOT NULL DEFAULT 0,
  `discount` float NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_purchase_details`
--

INSERT INTO `core_purchase_details` (`id`, `purchase_id`, `product_id`, `qty`, `price`, `vat`, `discount`) VALUES
(1, 1, 17, 50, 200, 0, 0),
(2, 1, 18, 30, 250, 0, 0),
(3, 2, 17, 20, 210, 0, 0),
(4, 2, 40, 70, 240, 0, 0),
(5, 3, 39, 10, 202, 0, 0),
(6, 4, 40, 30, 300, 0, 0),
(7, 10, 1, 4, 200, 0, 0),
(8, 15, 18, 1, 180, 0, 0),
(9, 15, 50, 1, 345, 0, 0),
(10, 15, 17, 1, 2500, 0, 0),
(11, 16, 50, 1, 345, 0, 0),
(12, 16, 17, 1, 2500, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `core_roles`
--

CREATE TABLE `core_roles` (
  `id` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_roles`
--

INSERT INTO `core_roles` (`id`, `name`, `updated_at`, `created_at`) VALUES
(1, 'Admin', '2024-03-02 04:59:14', '2024-03-02 04:59:14'),
(2, 'Manager', '2024-02-28 12:10:59', '2024-02-28 06:10:59'),
(4, 'Guest', '2024-03-07 10:24:21', '2024-03-07 04:24:21'),
(5, 'Manager', '2024-03-07 12:25:34', '2024-03-07 06:25:34'),
(6, 'Manager', '2024-03-07 12:25:53', '2024-03-07 06:25:53');

-- --------------------------------------------------------

--
-- Table structure for table `core_rooms`
--

CREATE TABLE `core_rooms` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL,
  `code` varchar(45) NOT NULL,
  `room_type_id` int(10) UNSIGNED NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core_rooms`
--

INSERT INTO `core_rooms` (`id`, `name`, `code`, `room_type_id`, `price`) VALUES
(1, 'Double South Side 200sft 2nd floor- 322', '322', 2, 2000),
(2, 'Single 100sft non ac -324', '324', 1, 500);

-- --------------------------------------------------------

--
-- Table structure for table `core_room_types`
--

CREATE TABLE `core_room_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core_room_types`
--

INSERT INTO `core_room_types` (`id`, `name`) VALUES
(1, 'Single'),
(2, 'Double');

-- --------------------------------------------------------

--
-- Table structure for table `core_sections`
--

CREATE TABLE `core_sections` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_sections`
--

INSERT INTO `core_sections` (`id`, `name`) VALUES
(1, 'Electronices'),
(2, 'Clothings'),
(3, 'Food and Beverages'),
(4, 'Health & Beauty'),
(5, 'Sports & Leisure'),
(6, 'Books & Entertainments');

-- --------------------------------------------------------

--
-- Table structure for table `core_site_albums`
--

CREATE TABLE `core_site_albums` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `description` text DEFAULT NULL,
  `photo` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core_site_albums`
--

INSERT INTO `core_site_albums` (`id`, `name`, `created_at`, `description`, `photo`) VALUES
(1, 'Main Slider', NULL, 'Na', NULL),
(2, 'INDUSTRY SECTORS', NULL, 'We cover different industry sectors, from food and beverage, chemical, retail, durable goods and more. Check the full list.', NULL),
(3, 'Screenshot - Home Page', NULL, NULL, NULL),
(4, 'POS', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `core_site_album_details`
--

CREATE TABLE `core_site_album_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `site_album_id` int(10) UNSIGNED NOT NULL,
  `photo` varchar(245) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `inactive` tinyint(3) UNSIGNED DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core_site_album_details`
--

INSERT INTO `core_site_album_details` (`id`, `site_album_id`, `photo`, `name`, `description`, `inactive`) VALUES
(1, 1, './uploads/posts/1548841158.jpg', 'Intellect Software Ltd', 'Leading Software Company', 0),
(2, 1, '1548843065.jpg', 'Intellect Cloud POS', 'Intellect Enterprise Resource Planning (ERP) is business management&#8230;', 0),
(3, 1, '1548841332.jpg', 'Education and Training', 'For many people, gaining new skills through accredited&#8230;', 0),
(4, 2, '1548867137.svg', 'Food and Beverage', NULL, 0),
(5, 2, '1548867301.svg', 'Retail Goods', NULL, 0),
(6, 2, '1548867424.svg', 'Energy, Oil and Gas', NULL, 0),
(7, 2, '1548867363.svg', 'Chemical Goods', NULL, 0),
(8, 2, '1548867453.svg', 'Consumer Packaged Goods', NULL, 0),
(9, 3, '15488786820.jpg', 'Screenshot1', NULL, 0),
(10, 3, '15488786821.jpg', 'Screenshot2', NULL, 0),
(11, 4, '15488797600.jpg', 'POS1', NULL, 0),
(12, 4, '15488797601.jpg', 'POS2', NULL, 0),
(13, 4, '15488797602.jpg', 'POS3', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `core_site_attributes`
--

CREATE TABLE `core_site_attributes` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL,
  `description` varchar(245) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `core_site_clients`
--

CREATE TABLE `core_site_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL,
  `photo` varchar(300) DEFAULT NULL,
  `review` text DEFAULT NULL,
  `website` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core_site_clients`
--

INSERT INTO `core_site_clients` (`id`, `name`, `photo`, `review`, `website`) VALUES
(1, 'Karnaphuli Group', '1548871087-png.png', 'Na', 'https://www.karnaphuli.com/'),
(2, 'Doreen', '1548871127-png.png', 'Na', 'https://doreen.com/');

-- --------------------------------------------------------

--
-- Table structure for table `core_site_menus`
--

CREATE TABLE `core_site_menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL,
  `link` varchar(45) NOT NULL,
  `has_child` tinyint(3) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core_site_menus`
--

INSERT INTO `core_site_menus` (`id`, `name`, `link`, `has_child`) VALUES
(1, 'Home', '/', 0),
(2, 'Software', './software.html', 1),
(3, 'Service', './service.html', 0),
(4, 'Partner', './partner.html', 0),
(5, 'Client', './client.html', 0),
(6, 'About', './about.html', 0),
(7, 'Contact', '/contact.html', 0),
(8, 'Blog', './blog.html', 1);

-- --------------------------------------------------------

--
-- Table structure for table `core_site_menu_subs`
--

CREATE TABLE `core_site_menu_subs` (
  `id` int(10) UNSIGNED NOT NULL,
  `site_menu_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL,
  `link` varchar(45) NOT NULL,
  `has_child` tinyint(3) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core_site_menu_subs`
--

INSERT INTO `core_site_menu_subs` (`id`, `site_menu_id`, `name`, `link`, `has_child`) VALUES
(1, 2, 'POS ERP', 'pos-erp', 0),
(2, 2, 'ERP-Garments', 'garment-erp', 0),
(3, 2, 'ERP-General Insurance', 'general-insurance-erp', 0),
(4, 2, 'ERP-Education', 'education-erp', 0),
(5, 2, 'ERP Manufacturing', 'manufacturing-erp', 0),
(6, 2, 'ERP Hospital', 'hospital-erp', 0),
(7, 2, 'ERP Texttile', 'texttile-erp', 0),
(8, 2, 'ERP Real Estate', 'real-estate-erp', 0),
(9, 8, 'Web publising', 'webpublishing', 0),
(10, 8, 'Javascript Library', 'javascript-library', 0),
(11, 8, 'Server Side', 'server-side', 0);

-- --------------------------------------------------------

--
-- Table structure for table `core_site_menu_sub_details`
--

CREATE TABLE `core_site_menu_sub_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL,
  `link` varchar(45) NOT NULL,
  `site_menu_sub_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `core_site_pages`
--

CREATE TABLE `core_site_pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `link` varchar(45) DEFAULT NULL,
  `inactive` tinyint(3) UNSIGNED DEFAULT 0,
  `slug` varchar(145) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `photo` varchar(245) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core_site_pages`
--

INSERT INTO `core_site_pages` (`id`, `name`, `link`, `inactive`, `slug`, `description`, `photo`) VALUES
(1, 'POS ERP', 'http', 0, NULL, 'Integrated solution from production to point of sale for any retials business including\r\n                                supershop, clothing, pharmacy, restaurant/food, electronics, library, jewellery,\r\n                                furniture, tiles &amp; sanitary etc', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `core_site_posts`
--

CREATE TABLE `core_site_posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `slug` varchar(245) DEFAULT NULL,
  `site_album_id` int(10) UNSIGNED DEFAULT NULL,
  `inactive` tinyint(3) UNSIGNED DEFAULT 0,
  `post_category_id` int(10) UNSIGNED DEFAULT NULL,
  `post_page_id` int(10) UNSIGNED DEFAULT NULL,
  `photo` varchar(245) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core_site_posts`
--

INSERT INTO `core_site_posts` (`id`, `name`, `description`, `slug`, `site_album_id`, `inactive`, `post_category_id`, `post_page_id`, `photo`) VALUES
(1, 'Explain why its best', 'There are several kind of information we have for why we are best. Some the best features\r\n                                we provide for you that are the world wide challenging features. Some best features are\r\n                                given below.', NULL, 3, 0, 1, 1, NULL),
(2, 'Great way to Include with POS', 'With integrated POS software, the following business software is listed together.', NULL, 4, 0, 1, 1, NULL),
(3, 'ERP - POS', 'Integrated solution from production to point of sale for any retials business including\r\n                                supershop, clothing, pharmacy, restaurant/food, electronics, library, jewellery,\r\n                                furniture, tiles &amp; sanitary etc', NULL, 5, 0, 1, 1, '1548843653.jpg'),
(4, 'Intellect Cloud POS Software - features', 'Responsive & optimized for mobile devices. Completely without coding skills!', NULL, NULL, 0, NULL, NULL, '15488780820.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `core_site_post_categories`
--

CREATE TABLE `core_site_post_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core_site_post_categories`
--

INSERT INTO `core_site_post_categories` (`id`, `name`) VALUES
(1, 'Business'),
(2, 'Software');

-- --------------------------------------------------------

--
-- Table structure for table `core_site_post_details`
--

CREATE TABLE `core_site_post_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `site_post_id` int(10) UNSIGNED NOT NULL,
  `description` text DEFAULT NULL,
  `photo` varchar(245) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core_site_post_details`
--

INSERT INTO `core_site_post_details` (`id`, `site_post_id`, `description`, `photo`, `name`) VALUES
(1, 1, 'Product multi-dimensional measurement unit', NULL, NULL),
(2, 1, 'Convenience of buying and selling products according to batch / lot\r\n                                        number', NULL, NULL),
(3, 1, 'Advantages of Product Metrics', NULL, NULL),
(4, 1, 'Business data will never be lost or ', NULL, NULL),
(5, 1, 'Buying from multiple branches can be sold through the same software', NULL, NULL),
(6, 1, 'The software will never slow down, if the data is high or even from the remote\r\n                                        location.', NULL, NULL),
(7, 2, 'Accounting Management', NULL, NULL),
(8, 2, 'Payroll Management', NULL, NULL),
(9, 2, ' Inventory Management', NULL, NULL),
(10, 2, 'Purchase Management', NULL, NULL),
(11, 2, 'Production & Distribution Management', NULL, NULL),
(12, 2, ' Human Resource Management', NULL, NULL),
(13, 2, ' Customer Relationship Management', NULL, NULL),
(14, 2, 'Sales Management', NULL, NULL),
(15, 2, 'Barcode Creator', NULL, NULL),
(16, 2, 'Cloud Backup Server', NULL, NULL),
(17, 4, 'Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos\r\n                                        himenaeos. Nulla nunc dui, tristique in semper vel.', NULL, 'Super Design Layout '),
(18, 4, 'Intellect Cloud pos software can be automated update after the release new\r\n                                        version of software. Update for the better performace and better userfriendly.', NULL, 'Regular Updates & Support'),
(19, 4, 'Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos\r\n                                        himenaeos nulla nunc dui.', NULL, 'Responsive Web Design');

-- --------------------------------------------------------

--
-- Table structure for table `core_site_products`
--

CREATE TABLE `core_site_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL,
  `site_product_category_id` int(10) UNSIGNED NOT NULL,
  `description` text DEFAULT NULL,
  `photo` varchar(345) DEFAULT NULL,
  `regular_price` float DEFAULT NULL,
  `offer_price` float DEFAULT NULL,
  `inactive` tinyint(3) UNSIGNED DEFAULT NULL,
  `current_stock` float DEFAULT NULL,
  `site_product_uom_id` int(10) UNSIGNED DEFAULT NULL,
  `slug` varchar(45) DEFAULT NULL,
  `icon` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core_site_products`
--

INSERT INTO `core_site_products` (`id`, `name`, `site_product_category_id`, `description`, `photo`, `regular_price`, `offer_price`, `inactive`, `current_stock`, `site_product_uom_id`, `slug`, `icon`) VALUES
(1, 'POS ERP', 1, ' Integrated solution from production to point of sale for any retials business including supershop, clothing, pharmacy, restaurant/food, electronics, library, jewellery, furniture, tiles & sanitary etc', '1548843653.jpg', 0, 0, 0, 0, 1, 'pos-erp', ''),
(2, 'ERP - GARMENTS', 1, 'Intellect Garments ERP is one of the leading ERP solution provider, especially for Garments industries which is integrated with different modules that cover all the…', '1548855465.jpg', 0, 0, 0, 0, 1, 'garments-erp', NULL),
(3, 'ERP - GENERAL INSURANCE', 1, 'Our Insurance software so flexible that you will reach your business goals in no time. Stop struggling with legacy systems! Our intellect software will help…', '1548855650.jpg', 0, 0, 0, 0, 1, 'genaral-insurance-erp', NULL),
(4, 'ERP - EDUCATION', 1, 'Intellect education management software is used by teachers, students, and school/college/university administrators for organization and collaboration, and to facilitate learning. School software is', '1548856590.jpg', 0, 0, 0, 0, 1, 'education-erp', NULL),
(5, 'ERP - MANUFACTURING', 1, 'Intellect ERP gives a company an integrated real-time view of its core business processes such as production, order processing, and inventory management, tied together by…', '1548856850.jpg', 0, 0, 0, 0, 1, 'manufacturing-erp', NULL),
(6, 'ERP - HOSPITAL', 1, 'Intellect Hospital Management Software is a comprehensive and integrated hospital management software, designed to manage all aspects of hospital operations.(i.e. Outpatient and Inpatient management, Patient…', '1548857774.jpg', 0, 0, 0, 0, 1, 'hospital-erp', NULL),
(7, 'ERP - MERCHANDISING', 1, 'Merchandising, CONTROL Retail Management System and POS also takes care of Retail CRM, Inventory Management, online trading, Sales & Profit Analysis, Order Entry & Invoicing,…', '1548858095.jpg', 0, 0, 0, 0, 1, 'merchandising-erp', NULL),
(8, 'ERP - TEXTILE', 1, 'The Intellect ERP (enterprise resource planning) software solutions - seek to integrate the business processes involving eight critical areas in the textile production planning which…', '1548858372.jpg', 0, 0, 0, 0, 1, 'texttile-erp', NULL),
(9, 'ERP - REAL ESTATE', 1, 'Backed by some of the biggest names in the industry, Firefox OS is an open platform that fosters greater', '1548858645.jpg', 0, 0, 0, 0, 1, 'real-estate-erp', NULL),
(10, 'Accounting', 2, 'Accounting Software includes general journal, creating bill & invoice, all financial reports (Trial Balance, Income Statement, Balance Sheet) and so on.', '<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"48\" height=\"48\" viewBox=\"0 0 24 24\" class=\"text-primary\" fill=\"currentColor\"><path d=\"M19 2H5c-1.103 0-2 .897-2 2v16c0 1.103.897 2 2 2h14c1.103 0 2-.897 2-2V4c0-1.103-.897-2-2-2zM5 20V4h14l.001 16H5z\"></path><path d=\"M7 12h2v2H7zm0 4h2v2H7zm4-4h2v2h-2zM7 6h10v4H7zm4 10h2v2h-2zm4-4h2v6h-2z\"></path>', 0, 0, 0, 0, 1, 'accounting', NULL),
(11, 'HR & Accounting', 2, 'Human Resource Management System includes person management, payroll, attendance, leave & holiday, shift & schedule, accounting and so on.', '<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"48\" height=\"48\" viewBox=\"0 0 24 24\" class=\"text-primary\" fill=\"currentColor\"><path d=\"M9.715 12c1.151 0 2-.849 2-2s-.849-2-2-2-2 .849-2 2 .848 2 2 2z\"></path><path d=\"M20 4H4c-1.103 0-2 .841-2 1.875v12.25C2 19.159 2.897 20 4 20h16c1.103 0 2-.841 2-1.875V5.875C22 4.841 21.103 4 20 4zm0 14-16-.011V6', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'Diagnostic Application', 2, 'Diagnostic Application includes pharmacy management, radioloy reporting management, sample collection and reporting management and so on', '<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"48\" height=\"48\" viewBox=\"0 0 24 24\" class=\"text-primary\" fill=\"currentColor\"><path d=\"M15.794 11.09c.332-.263.648-.542.947-.84l.136-.142c.283-.293.552-.598.801-.919l.062-.075c.255-.335.486-.688.702-1.049l.128-.22c.205-.364.395-.737.559-1.123.02-.047.035-.095.055-.142.147-.361.274-.731.383-1.109.02', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'Doctors Prescription', 2, 'Doctors Prescription Application includes appointment scheduling, visit fee collection, create and print prescription and so on..', '<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"48\" height=\"48\" viewBox=\"0 0 24 24\" class=\"text-primary\" fill=\"currentColor\"><path d=\"M8.434 20.566c1.335 0 2.591-.52 3.535-1.464l7.134-7.133a5.008 5.008 0 0 0-.001-7.072 4.969 4.969 0 0 0-3.536-1.463c-1.335 0-2.59.52-3.534 1.464l-7.134 7.133a5.01 5.01 0 0 0-.001 7.072 4.971 4.971 0 0 0 3.537 1.46', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 'Asset Management', 2, 'Asset Management System includes asset and components, operation schedule, material & service requisition and so on.', '<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"48\" height=\"48\" viewBox=\"0 0 24 24\" class=\"text-primary\" fill=\"currentColor\"><path d=\"m20.772 13.155-1.368-4.104A2.995 2.995 0 0 0 16.559 7H7.441a2.995 2.995 0 0 0-2.845 2.051l-1.368 4.104A2.001 2.001 0 0 0 2 15v3c0 .738.404 1.376 1 1.723V21a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1v-1h12v1a1 1 0 0 0 1 1h1a1 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'Inventory Management', 2, 'Inventory Management System includes stock management, warehouse management, stock adjustment, requisition management, stock reporting and so on.', '<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"48\" height=\"48\" viewBox=\"0 0 24 24\" class=\"text-primary\" fill=\"currentColor\"><path d=\"M21.993 7.95a.96.96 0 0 0-.029-.214c-.007-.025-.021-.049-.03-.074-.021-.057-.04-.113-.07-.165-.016-.027-.038-.049-.057-.075-.032-.045-.063-.091-.102-.13-.023-.022-.053-.04-.078-.061-.039-.032-.075-.067-.12-.094-.', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 'RealTime Attendance System', 2, 'Biometric System Application includes registration with finger print and webcam device, Bio-Metric verification, real time data storage, system & security and so on.', '<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"48\" height=\"48\" viewBox=\"0 0 24 24\" class=\"text-primary\" fill=\"currentColor\"><path d=\"M5.962 17.674C7 19.331 7 20.567 7 22h2c0-1.521 0-3.244-1.343-5.389l-1.695 1.063zM16.504 3.387C13.977 1.91 7.55.926 4.281 4.305c-3.368 3.481-2.249 9.072.001 11.392.118.122.244.229.369.333.072.061.146.116.205.184l1', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'Project Management', 2, 'Project Management Application includes person management, task & team management, asset management, costing, reporting and so o', '<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"48\" height=\"48\" viewBox=\"0 0 24 24\" class=\"text-primary\" fill=\"currentColor\"><path d=\"M5 22h14c1.103 0 2-.897 2-2V5c0-1.103-.897-2-2-2h-2a1 1 0 0 0-1-1H8a1 1 0 0 0-1 1H5c-1.103 0-2 .897-2 2v15c0 1.103.897 2 2 2zM5 5h2v2h10V5h2v15H5V5z\"></path><path d=\"m11 13.586-1.793-1.793-1.414 1.414L11 16.414l5', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 'Logistics Management', 2, 'Logistics Management System includes procurement & delivery management, transportation & route management, storage of goods & transportation flow, navigation, billing and so on.', '<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"48\" height=\"48\" viewBox=\"0 0 24 24\" class=\"text-primary\" fill=\"currentColor\"><path d=\"M14.844 20H6.5C5.121 20 4 18.879 4 17.5S5.121 15 6.5 15h7c1.93 0 3.5-1.57 3.5-3.5S15.43 8 13.5 8H8.639a9.812 9.812 0 0 1-1.354 2H13.5c.827 0 1.5.673 1.5 1.5s-.673 1.5-1.5 1.5h-7C4.019 13 2 15.019 2 17.5S4.019 22 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 'E-Commerce Solution', 2, 'E-Commerce Solution includes website, management of product, order, purchase, warehouse, customer, supplier, payment gateway and so on.', '<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"48\" height=\"48\" viewBox=\"0 0 24 24\" class=\"text-primary\" fill=\"currentColor\"><path d=\"M4 20h2V10a1 1 0 0 1 1-1h12V7a1 1 0 0 0-1-1h-3.051c-.252-2.244-2.139-4-4.449-4S6.303 3.756 6.051 6H3a1 1 0 0 0-1 1v11a2 2 0 0 0 2 2zm6.5-16c1.207 0 2.218.86 2.45 2h-4.9c.232-1.14 1.243-2 2.45-2z\"></path><path d=\"', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 'Visa Processing Software', 2, 'Our Visa Processing Software includes customer registration, deed and document management, visa & ticket processing step management, invoice & payment, status report and so on.', '<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"48\" height=\"48\" viewBox=\"0 0 24 24\" class=\"text-primary\" fill=\"currentColor\"><path d=\"M3 18h18v2H3zm18.509-9.473a1.61 1.61 0 0 0-2.036-1.019L15 9 7 6 5 7l6 4-4 2-4-2-1 1 4 4 14.547-5.455a1.611 1.611 0 0 0 .962-2.018z\"></path></svg>', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `core_site_product_categories`
--

CREATE TABLE `core_site_product_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core_site_product_categories`
--

INSERT INTO `core_site_product_categories` (`id`, `name`) VALUES
(1, 'ERP'),
(2, 'OTHER SOFTWARES');

-- --------------------------------------------------------

--
-- Table structure for table `core_site_product_uoms`
--

CREATE TABLE `core_site_product_uoms` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core_site_product_uoms`
--

INSERT INTO `core_site_product_uoms` (`id`, `name`) VALUES
(1, 'Piece');

-- --------------------------------------------------------

--
-- Table structure for table `core_site_routes`
--

CREATE TABLE `core_site_routes` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `src` varchar(45) DEFAULT NULL,
  `inactive` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `site_menu_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core_site_routes`
--

INSERT INTO `core_site_routes` (`id`, `name`, `src`, `inactive`, `site_menu_id`) VALUES
(1, 'pos-erp', 'views/pages/ERP-POS.php', 0, 2),
(2, 'garment-erp', 'views/pages/ERP-Garments.php', 0, 2),
(3, 'education-erp', 'views/pages/ERP-Education.php', 0, 2),
(4, 'general-insurance-erp', 'views/pages/ERP-General-Insurance.php', 0, 2),
(5, 'manufacturing-erp', 'views/pages/ERP-Manufacturing.php', 0, 2),
(6, 'hospital-erp', 'views/pages/ERP-Hospital.php', 0, 2),
(7, 'texttile-erp', 'views/pages/ERP-Textitle.php', 0, 2),
(8, 'real-estate-erp', 'views/pages/ERP-Real-Estate.php', 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `core_site_services`
--

CREATE TABLE `core_site_services` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `description` text DEFAULT NULL,
  `regular_price` float DEFAULT 0,
  `offer_price` float DEFAULT 0,
  `icon` varchar(45) DEFAULT NULL,
  `inactive` tinyint(3) UNSIGNED DEFAULT 0,
  `photo` varchar(145) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core_site_services`
--

INSERT INTO `core_site_services` (`id`, `name`, `category_id`, `description`, `regular_price`, `offer_price`, `icon`, `inactive`, `photo`) VALUES
(1, 'Software Quality Assurance', 1, 'Backed by some of the biggest names in the industry, Firefox OS is an open platform that fosters greater', 0, 0, NULL, 0, '1548863121.png'),
(2, 'Software forensic', 1, 'Backed by some of the biggest names in the industry, Firefox OS is an open platform that fosters greater', 0, 0, NULL, 0, '1548863180.png'),
(3, 'Database Migration', 1, 'Backed by some of the biggest names in the industry, Firefox OS is an open platform that fosters greater', 0, 0, NULL, 0, '1548863362.png'),
(4, 'Setup Own Hosting', 1, 'Backed by some of the biggest names in the industry, Firefox OS is an open platform that fosters greater', 0, 0, NULL, 0, '1548863484.png'),
(5, 'Cloud Backup Service', 1, 'Backed by some of the biggest names in the industry, Firefox OS is an open platform that fosters greate', 0, 0, NULL, 0, '1548862800.png'),
(6, 'Software Upgrade and Maintenance', 1, 'Backed by some of the biggest names in the industry, Firefox OS is an open platform that fosters greater', 0, 0, NULL, 0, '1548863512.png'),
(7, 'Incredibly Responsive', 2, 'Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nulla nunc dui, tristique in semper vel.', 0, 0, '<i class=\"fa fa-laptop v-icon\"></i>', 0, NULL),
(8, 'Fully Customizible', 2, 'Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nulla nunc dui, tristique in semper vel.', 0, 0, '<i class=\"fa fa-leaf v-icon\"></i>', 0, NULL),
(9, 'Interactive Elements', 2, 'Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nulla nunc dui, tristique in semper vel.', 0, 0, '<i class=\"fa fa-scissors v-icon\"></i>', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `core_site_service_categories`
--

CREATE TABLE `core_site_service_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core_site_service_categories`
--

INSERT INTO `core_site_service_categories` (`id`, `name`) VALUES
(1, 'Software Enable Service');

-- --------------------------------------------------------

--
-- Table structure for table `core_status`
--

CREATE TABLE `core_status` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_status`
--

INSERT INTO `core_status` (`id`, `name`) VALUES
(1, 'Processing'),
(2, 'Shifted'),
(3, 'Delivered'),
(4, 'Invoiced');

-- --------------------------------------------------------

--
-- Table structure for table `core_stocks`
--

CREATE TABLE `core_stocks` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `qty` float NOT NULL,
  `transaction_type_id` int(10) UNSIGNED NOT NULL,
  `remark` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `warehouse_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_stocks`
--

INSERT INTO `core_stocks` (`id`, `product_id`, `qty`, `transaction_type_id`, `remark`, `created_at`, `warehouse_id`) VALUES
(1, 39, 50, 3, 'Purchase', '2023-12-30 12:43:50', 1),
(2, 40, 30, 3, 'Purchase', '2023-12-30 12:43:50', 1),
(3, 39, 20, 3, 'Purchase', '2023-12-30 12:43:50', 1),
(4, 40, 70, 3, 'Purchase', '2023-12-30 12:43:50', 1),
(5, 39, 10, 3, 'Purchase', '0000-00-00 00:00:00', 3),
(6, 40, 30, 3, 'Purchase', '2023-12-24 06:10:47', 3),
(7, 39, -3, 1, 'Order', '2023-12-30 12:43:50', 2),
(8, 40, -2, 1, 'Order', '2023-12-30 12:43:50', 2),
(9, 46, -2, 1, 'Order', '2023-12-30 12:43:50', 2),
(10, 47, -1, 1, 'Order', '2023-12-30 12:43:50', 2),
(11, 36, -4, 1, 'Order', '0000-00-00 00:00:00', 0),
(12, 46, -4, 1, 'Order', '0000-00-00 00:00:00', 0),
(13, 47, -1, 1, 'Order', '0000-00-00 00:00:00', 0),
(14, 50, 1, 3, 'Purchase', '2024-06-04 06:47:19', 1),
(15, 17, 1, 3, 'Purchase', '2024-06-04 06:47:19', 1);

-- --------------------------------------------------------

--
-- Table structure for table `core_stock_adjustments`
--

CREATE TABLE `core_stock_adjustments` (
  `id` int(10) UNSIGNED NOT NULL,
  `adjustment_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_id` int(10) UNSIGNED NOT NULL,
  `remark` text NOT NULL,
  `adjustment_type_id` int(10) UNSIGNED NOT NULL,
  `werehouse_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_stock_adjustments`
--

INSERT INTO `core_stock_adjustments` (`id`, `adjustment_at`, `user_id`, `remark`, `adjustment_type_id`, `werehouse_id`) VALUES
(1, '2021-12-27 18:00:00', 1, 'ddd', 2, 1),
(2, '2021-12-27 18:00:00', 1, 'ddd', 2, 1),
(3, '2021-12-27 18:00:00', 1, 'ddddfd', 6, 1),
(4, '2021-12-27 18:00:00', 1, 'NA', 6, 2);

-- --------------------------------------------------------

--
-- Table structure for table `core_stock_adjustment_details`
--

CREATE TABLE `core_stock_adjustment_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `adjustment_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `qty` float NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_stock_adjustment_details`
--

INSERT INTO `core_stock_adjustment_details` (`id`, `adjustment_id`, `product_id`, `qty`, `price`) VALUES
(1, 2, 20, 5, 400),
(2, 3, 20, 50, 400),
(3, 4, 28, 70, 6650),
(4, 4, 20, 30, 300);

-- --------------------------------------------------------

--
-- Table structure for table `core_stock_adjustment_types`
--

CREATE TABLE `core_stock_adjustment_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL,
  `factor` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_stock_adjustment_types`
--

INSERT INTO `core_stock_adjustment_types` (`id`, `name`, `factor`) VALUES
(1, 'Is Outdated', -1),
(2, 'Is Damaged', -1),
(3, 'Material Missing', -1),
(4, 'Product Is Obsolete', -1),
(5, 'Existing Inventory', 1),
(6, 'Fixed/Found Inventory', 1);

-- --------------------------------------------------------

--
-- Table structure for table `core_students`
--

CREATE TABLE `core_students` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL,
  `fathers_name` varchar(45) NOT NULL,
  `mothers_name` varchar(45) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `contact_no` varchar(45) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `photo` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core_students`
--

INSERT INTO `core_students` (`id`, `name`, `fathers_name`, `mothers_name`, `dob`, `contact_no`, `address`, `photo`) VALUES
(1, 'Mahedi Hassan', 'Abdur Rahman', 'Amena Akter', '2024-01-19', '', 'Rampura ', '1.png');

-- --------------------------------------------------------

--
-- Table structure for table `core_suppliers`
--

CREATE TABLE `core_suppliers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL,
  `mobile` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_suppliers`
--

INSERT INTO `core_suppliers` (`id`, `name`, `mobile`, `email`) VALUES
(1, 'Md. Shahin', '34223423455444', 'shahin@yahoo.com'),
(2, 'Tauhid Imdad', '343254354235433', 'tauhid@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `core_tailor_dresses`
--

CREATE TABLE `core_tailor_dresses` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_tailor_dresses`
--

INSERT INTO `core_tailor_dresses` (`id`, `name`, `price`) VALUES
(1, 'Shirt', 1000),
(2, 'Kamiz', 1200),
(3, 'Pants', 1100),
(4, 'Borka', 2500),
(5, 'Panjabi', 1300);

-- --------------------------------------------------------

--
-- Table structure for table `core_tailor_dress_parameters`
--

CREATE TABLE `core_tailor_dress_parameters` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL,
  `dress_id` int(10) UNSIGNED NOT NULL,
  `default_size` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_tailor_dress_parameters`
--

INSERT INTO `core_tailor_dress_parameters` (`id`, `name`, `dress_id`, `default_size`) VALUES
(1, 'Chest', 1, NULL),
(2, 'Waist', 1, NULL),
(3, 'Seat', 1, NULL),
(4, 'Bicep', 1, NULL),
(5, 'Shirt Length', 1, NULL),
(6, 'Shoulder Width', 1, NULL),
(7, 'Sleeve Length', 1, NULL),
(8, 'Cuff Circumference', 1, NULL),
(9, 'Collar Size', 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `core_tailor_orders`
--

CREATE TABLE `core_tailor_orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_name` varchar(20) NOT NULL,
  `paid_amount` double DEFAULT NULL,
  `order_datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `delivery_datetime` datetime NOT NULL,
  `order_total` double DEFAULT NULL,
  `shipping_address` text DEFAULT NULL,
  `remark` text DEFAULT NULL,
  `mobile` varchar(45) DEFAULT NULL,
  `discount` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_tailor_orders`
--

INSERT INTO `core_tailor_orders` (`id`, `customer_name`, `paid_amount`, `order_datetime`, `delivery_datetime`, `order_total`, `shipping_address`, `remark`, `mobile`, `discount`) VALUES
(1, 'Jahidul Islam', 500, '0000-00-00 00:00:00', '2024-01-20 00:00:00', 950, 'Rampura', '', '3434343234', 50);

-- --------------------------------------------------------

--
-- Table structure for table `core_tailor_order_details`
--

CREATE TABLE `core_tailor_order_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `dress_id` int(10) UNSIGNED NOT NULL,
  `price` double NOT NULL,
  `qty` double NOT NULL,
  `discount` double NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_tailor_order_details`
--

INSERT INTO `core_tailor_order_details` (`id`, `dress_id`, `price`, `qty`, `discount`, `order_id`) VALUES
(1, 1, 1000, 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `core_tailor_order_measurements`
--

CREATE TABLE `core_tailor_order_measurements` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `measurement_id` int(10) UNSIGNED NOT NULL,
  `size` varchar(10) NOT NULL,
  `uom_id` int(10) UNSIGNED NOT NULL,
  `dress_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_tailor_order_measurements`
--

INSERT INTO `core_tailor_order_measurements` (`id`, `order_id`, `measurement_id`, `size`, `uom_id`, `dress_id`) VALUES
(1, 1, 1, '34', 1, 1),
(2, 1, 2, '33', 1, 1),
(3, 1, 5, '22', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `core_tailor_uoms`
--

CREATE TABLE `core_tailor_uoms` (
  `id` int(10) UNSIGNED NOT NULL,
  `abbr` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `inactive` tinyint(3) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_tailor_uoms`
--

INSERT INTO `core_tailor_uoms` (`id`, `abbr`, `name`, `inactive`) VALUES
(1, 'inc', 'Inch', 0),
(2, 'ft', 'Foot', 0),
(3, 'yd', 'yard', 0),
(4, 'piece', 'piece', 0);

-- --------------------------------------------------------

--
-- Table structure for table `core_thanas`
--

CREATE TABLE `core_thanas` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL,
  `district_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_thanas`
--

INSERT INTO `core_thanas` (`id`, `name`, `district_id`) VALUES
(1, 'Chatkhil', 2),
(2, 'Ramgonj', 2),
(3, 'Mijdi Sadar', 2),
(4, 'Begomganj', 2);

-- --------------------------------------------------------

--
-- Table structure for table `core_transaction_types`
--

CREATE TABLE `core_transaction_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_transaction_types`
--

INSERT INTO `core_transaction_types` (`id`, `name`) VALUES
(1, 'Sales Order'),
(2, 'Sales Return'),
(3, 'Purchase Order'),
(4, 'Purchase Return'),
(5, 'Positive Stock Adjustment'),
(6, 'Negative Stock Adjustment');

-- --------------------------------------------------------

--
-- Table structure for table `core_uoms`
--

CREATE TABLE `core_uoms` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_uoms`
--

INSERT INTO `core_uoms` (`id`, `name`) VALUES
(1, 'Piece'),
(2, 'Kg'),
(3, 'Pack'),
(4, 'Litter'),
(5, 'Gram'),
(6, 'Ton');

-- --------------------------------------------------------

--
-- Table structure for table `core_users`
--

CREATE TABLE `core_users` (
  `id` int(10) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `role_id` int(10) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `full_name` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `photo` varchar(50) DEFAULT NULL,
  `verify_code` varchar(50) DEFAULT NULL,
  `inactive` tinyint(1) UNSIGNED DEFAULT 0,
  `mobile` varchar(50) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `ip` varchar(45) DEFAULT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  `remember_token` varchar(145) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_users`
--

INSERT INTO `core_users` (`id`, `name`, `role_id`, `password`, `email`, `full_name`, `created_at`, `photo`, `verify_code`, `inactive`, `mobile`, `updated_at`, `ip`, `email_verified_at`, `remember_token`) VALUES
(192, 'admin', 2, '$2y$10$zeyUFTm0vqQ0uAUS04kl4ubY6.2Y0zQXqcFC70XvD.8Ot5s3Om5PG', 'naymur@gmail.com', 'Naymur Rahman', '2024-06-03 03:45:44', NULL, NULL, 0, '01800000000', NULL, '192.168.150.25', NULL, NULL),
(194, 'jakaria', 2, '$2y$10$Zyt3rgYgF9vnDBhNRN/8lO1BirJFCCNr3rhTRiI.7W1aVIuriBJiS', 'jkp.jakaria@gmail.com', 'jkp', '2024-04-15 04:53:54', NULL, NULL, 0, '01642527454', NULL, '192.168.150.47', NULL, NULL),
(196, 'Aminur', 2, '$2y$10$u1Wku9Uh61adCVAPm6ToSOp.8EgdXkiXo/DGp3oD.i/8o9I6a/Dai', 'amiur@gmail.com', 'Aminur Rahman', '2024-04-04 05:45:19', NULL, NULL, 0, '01800000000', NULL, '192.168.150.25', NULL, NULL),
(197, 'Tanim', 2, '$2y$10$NcNFqz1p2N76l4NH96f4Y.KTU8s/e.CqZB.lD7lewc4rcBvMstgaK', 'tanim@gmail.com', 'Rifat Ahammed Tanim', '2024-04-04 05:54:06', NULL, NULL, 0, '01900000000', NULL, '192.168.150.34', NULL, NULL),
(199, 'midul', 2, '$2y$10$sUhLutkkEUOUTWY2yWi.C.B55DFNOhUrbfFnrzcKM2FK7xdDF6Rby', 'midul@yahoo.com', 'Midul Islam', '2024-04-04 05:50:50', NULL, NULL, 0, '0198748343', NULL, '192.168.150.5', NULL, NULL),
(200, 'Jabed ', 2, '$2y$10$mgdw/E0HYncsz1wZaxygKerTF9VAfiPMnq4TSLsscA5CVHSih/RbS', 'olba@gmail.com', 'Javed ', '2024-04-04 05:59:27', NULL, NULL, 0, '01869546555', NULL, '192.168.150.22', NULL, NULL),
(201, 'omar', 2, '$2y$10$GnOgIBKPRsNIeM3OJExotuuBjGqzgcYGnfQeZpz4pug/GNqiLCWwS', 'omar@gmail.com', 'Omar Faruk', '2024-04-15 04:57:44', NULL, NULL, 0, '343434', NULL, '192.168.150.11', NULL, NULL),
(204, 'Anni', 2, '$2y$10$JWg5tGwzGUwnFT/PZBT4wuqIKAw3Vb6X7kWs9zC3ueLSi1RMzi87W', 'jannatulneasa464@gmail.com', 'Jannatul Neasa', '2024-04-04 05:54:32', NULL, NULL, 0, '3254436756', NULL, '192.168.150.29', NULL, NULL),
(265, 'Abdur2', 1, '$2y$10$JYbwcWZRAQwcly49LKut/uX2/Ammp.cGtczd/FjcPTpwIeUZpqK9u', 'abdur@gmail.com', 'Abdur Rahman', '0000-00-00 00:00:00', 'abdur2.webp', '', 0, '3432432', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(267, 'Rahim', 1, '$2y$10$EepVqdZwpuUGVHrWB/Q9iOZNpljnVMFx.Yr3nzqeHX9BM72eshEi6', 'abdur@yahoo.com', 'Abdur Rahim', '0000-00-00 00:00:00', 'rahim.jpeg', '', 0, '344323242', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `core_user_deposits`
--

CREATE TABLE `core_user_deposits` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `amount` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `transaction_at` datetime DEFAULT NULL,
  `note` varchar(45) DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_user_deposits`
--

INSERT INTO `core_user_deposits` (`id`, `user_id`, `amount`, `created_at`, `transaction_at`, `note`, `created_by`) VALUES
(1, 158, 100, '2024-04-04 05:22:32', '2024-04-04 00:00:00', 'NA', 127),
(2, 186, 10000, '2024-04-04 05:22:39', '1970-01-01 06:00:00', '', 186),
(3, 160, -5e17, '2024-04-04 05:23:50', '1970-01-01 06:00:00', '', 186),
(4, 194, 1009, '2024-04-04 05:44:18', '1970-01-01 06:00:00', 'NA', 194),
(5, 197, 10000, '2024-04-04 05:56:20', '1970-01-01 06:00:00', '', 197),
(6, 199, 1, '2024-04-04 05:56:29', '1970-01-01 06:00:00', 'Na', 199),
(7, 196, 1000, '2024-04-04 05:56:49', '1970-01-01 06:00:00', '', 196),
(8, 197, -1, '2024-04-04 05:57:17', '1970-01-01 06:00:00', '', 197),
(9, 196, 150, '2024-04-04 05:57:31', '1970-01-01 06:00:00', '', 127),
(10, 203, 5000, '2024-04-04 05:57:52', '2024-04-04 00:00:00', 'Eid Gift', 203),
(11, 204, 0, '2024-04-04 05:58:09', '2024-04-04 00:00:00', 'xero_xero', 91),
(12, 200, 9999, '2024-04-04 05:58:26', '1970-01-01 06:00:00', '', 200),
(13, 199, 4000, '2024-04-15 04:48:13', '2024-04-15 00:00:00', '', 127),
(14, 201, 3000, '2024-04-15 04:48:32', '1970-01-01 06:00:00', '', 127);

-- --------------------------------------------------------

--
-- Table structure for table `core_warehouses`
--

CREATE TABLE `core_warehouses` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL,
  `city` varchar(45) NOT NULL,
  `contact` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `core_warehouses`
--

INSERT INTO `core_warehouses` (`id`, `name`, `city`, `contact`) VALUES
(1, 'Tajgon', 'Dhaka', '4543534534'),
(2, 'Rangpur', 'Rangpur', '324242342'),
(3, 'Badda', 'Rampura', '3434334324');

-- --------------------------------------------------------

--
-- Table structure for table `manufacturer`
--

CREATE TABLE `manufacturer` (
  `id` int(10) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `contact` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `manufacturer`
--

INSERT INTO `manufacturer` (`id`, `name`, `contact`) VALUES
(1, 'APCL', '08340830'),
(2, 'ISL', '2345454'),
(3, 'IDB', '9390033'),
(4, 'Walton', '343434');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(10) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `manufacturer_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `manufacturer_id`) VALUES
(1, 'Camera', 5000, 1),
(2, 'PC', 20000, 1),
(3, 'HRM', 100000, 2),
(4, 'ERP', 3000000, 2),
(5, 'Car', 900000, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `core_bookings`
--
ALTER TABLE `core_bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_booking_details`
--
ALTER TABLE `core_booking_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_cattles`
--
ALTER TABLE `core_cattles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_cattle_categories`
--
ALTER TABLE `core_cattle_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_contacts`
--
ALTER TABLE `core_contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_contact_categories`
--
ALTER TABLE `core_contact_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_customers`
--
ALTER TABLE `core_customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_departments`
--
ALTER TABLE `core_departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_districts`
--
ALTER TABLE `core_districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_divisions`
--
ALTER TABLE `core_divisions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_failed_jobs`
--
ALTER TABLE `core_failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `core_failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `core_hms_consultants`
--
ALTER TABLE `core_hms_consultants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_hms_departments`
--
ALTER TABLE `core_hms_departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_hms_medicines`
--
ALTER TABLE `core_hms_medicines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_hms_medicine_categories`
--
ALTER TABLE `core_hms_medicine_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_hms_medicine_types`
--
ALTER TABLE `core_hms_medicine_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_hms_patients`
--
ALTER TABLE `core_hms_patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_hms_prescriptions`
--
ALTER TABLE `core_hms_prescriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_hms_prescription_details`
--
ALTER TABLE `core_hms_prescription_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_manufacturers`
--
ALTER TABLE `core_manufacturers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_mfg_boms`
--
ALTER TABLE `core_mfg_boms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_mfg_bom_details`
--
ALTER TABLE `core_mfg_bom_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_mfg_bom_secondary_products`
--
ALTER TABLE `core_mfg_bom_secondary_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_mfg_productions`
--
ALTER TABLE `core_mfg_productions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_mfg_production_details`
--
ALTER TABLE `core_mfg_production_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_migrations`
--
ALTER TABLE `core_migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_money_receipts`
--
ALTER TABLE `core_money_receipts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_money_receipt_details`
--
ALTER TABLE `core_money_receipt_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_orders`
--
ALTER TABLE `core_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_order_details`
--
ALTER TABLE `core_order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_password_resets`
--
ALTER TABLE `core_password_resets`
  ADD KEY `core_password_resets_email_index` (`email`);

--
-- Indexes for table `core_password_reset_tokens`
--
ALTER TABLE `core_password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `core_personal_access_tokens`
--
ALTER TABLE `core_personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `core_personal_access_tokens_token_unique` (`token`),
  ADD KEY `core_personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `core_persons`
--
ALTER TABLE `core_persons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_positions`
--
ALTER TABLE `core_positions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_products`
--
ALTER TABLE `core_products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uni_barcode` (`barcode`),
  ADD UNIQUE KEY `uni_name` (`name`);

--
-- Indexes for table `core_product_brands`
--
ALTER TABLE `core_product_brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_product_categories`
--
ALTER TABLE `core_product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_product_sections`
--
ALTER TABLE `core_product_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_product_units`
--
ALTER TABLE `core_product_units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_purchases`
--
ALTER TABLE `core_purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_purchase_details`
--
ALTER TABLE `core_purchase_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_roles`
--
ALTER TABLE `core_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_rooms`
--
ALTER TABLE `core_rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_room_types`
--
ALTER TABLE `core_room_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_sections`
--
ALTER TABLE `core_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_site_albums`
--
ALTER TABLE `core_site_albums`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_site_album_details`
--
ALTER TABLE `core_site_album_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_site_attributes`
--
ALTER TABLE `core_site_attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_site_clients`
--
ALTER TABLE `core_site_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_site_menus`
--
ALTER TABLE `core_site_menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_site_menu_subs`
--
ALTER TABLE `core_site_menu_subs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_site_menu_sub_details`
--
ALTER TABLE `core_site_menu_sub_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_site_pages`
--
ALTER TABLE `core_site_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_site_posts`
--
ALTER TABLE `core_site_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_site_post_categories`
--
ALTER TABLE `core_site_post_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_site_post_details`
--
ALTER TABLE `core_site_post_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_site_products`
--
ALTER TABLE `core_site_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_site_product_categories`
--
ALTER TABLE `core_site_product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_site_product_uoms`
--
ALTER TABLE `core_site_product_uoms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_site_routes`
--
ALTER TABLE `core_site_routes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uni_route` (`name`) USING BTREE;

--
-- Indexes for table `core_site_services`
--
ALTER TABLE `core_site_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_site_service_categories`
--
ALTER TABLE `core_site_service_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_status`
--
ALTER TABLE `core_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_stocks`
--
ALTER TABLE `core_stocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_stock_adjustments`
--
ALTER TABLE `core_stock_adjustments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_stock_adjustment_details`
--
ALTER TABLE `core_stock_adjustment_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_stock_adjustment_types`
--
ALTER TABLE `core_stock_adjustment_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_students`
--
ALTER TABLE `core_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_suppliers`
--
ALTER TABLE `core_suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_tailor_dresses`
--
ALTER TABLE `core_tailor_dresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_tailor_dress_parameters`
--
ALTER TABLE `core_tailor_dress_parameters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_tailor_orders`
--
ALTER TABLE `core_tailor_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_tailor_order_details`
--
ALTER TABLE `core_tailor_order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_tailor_order_measurements`
--
ALTER TABLE `core_tailor_order_measurements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_tailor_uoms`
--
ALTER TABLE `core_tailor_uoms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_thanas`
--
ALTER TABLE `core_thanas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_transaction_types`
--
ALTER TABLE `core_transaction_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_uoms`
--
ALTER TABLE `core_uoms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_users`
--
ALTER TABLE `core_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`name`) USING BTREE;

--
-- Indexes for table `core_user_deposits`
--
ALTER TABLE `core_user_deposits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_warehouses`
--
ALTER TABLE `core_warehouses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manufacturer`
--
ALTER TABLE `manufacturer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `core_bookings`
--
ALTER TABLE `core_bookings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `core_booking_details`
--
ALTER TABLE `core_booking_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `core_cattles`
--
ALTER TABLE `core_cattles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `core_cattle_categories`
--
ALTER TABLE `core_cattle_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `core_contacts`
--
ALTER TABLE `core_contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `core_contact_categories`
--
ALTER TABLE `core_contact_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `core_customers`
--
ALTER TABLE `core_customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `core_departments`
--
ALTER TABLE `core_departments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `core_districts`
--
ALTER TABLE `core_districts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `core_divisions`
--
ALTER TABLE `core_divisions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `core_failed_jobs`
--
ALTER TABLE `core_failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `core_hms_consultants`
--
ALTER TABLE `core_hms_consultants`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `core_hms_departments`
--
ALTER TABLE `core_hms_departments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `core_hms_medicines`
--
ALTER TABLE `core_hms_medicines`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `core_hms_medicine_categories`
--
ALTER TABLE `core_hms_medicine_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `core_hms_medicine_types`
--
ALTER TABLE `core_hms_medicine_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `core_hms_patients`
--
ALTER TABLE `core_hms_patients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `core_hms_prescriptions`
--
ALTER TABLE `core_hms_prescriptions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `core_hms_prescription_details`
--
ALTER TABLE `core_hms_prescription_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `core_manufacturers`
--
ALTER TABLE `core_manufacturers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `core_mfg_boms`
--
ALTER TABLE `core_mfg_boms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `core_mfg_bom_details`
--
ALTER TABLE `core_mfg_bom_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `core_mfg_bom_secondary_products`
--
ALTER TABLE `core_mfg_bom_secondary_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `core_mfg_productions`
--
ALTER TABLE `core_mfg_productions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `core_mfg_production_details`
--
ALTER TABLE `core_mfg_production_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `core_migrations`
--
ALTER TABLE `core_migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `core_money_receipts`
--
ALTER TABLE `core_money_receipts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `core_money_receipt_details`
--
ALTER TABLE `core_money_receipt_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `core_orders`
--
ALTER TABLE `core_orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `core_order_details`
--
ALTER TABLE `core_order_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `core_personal_access_tokens`
--
ALTER TABLE `core_personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `core_persons`
--
ALTER TABLE `core_persons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `core_positions`
--
ALTER TABLE `core_positions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `core_products`
--
ALTER TABLE `core_products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `core_product_brands`
--
ALTER TABLE `core_product_brands`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `core_product_categories`
--
ALTER TABLE `core_product_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `core_product_sections`
--
ALTER TABLE `core_product_sections`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `core_product_units`
--
ALTER TABLE `core_product_units`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `core_purchases`
--
ALTER TABLE `core_purchases`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `core_purchase_details`
--
ALTER TABLE `core_purchase_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `core_roles`
--
ALTER TABLE `core_roles`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `core_rooms`
--
ALTER TABLE `core_rooms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `core_room_types`
--
ALTER TABLE `core_room_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `core_sections`
--
ALTER TABLE `core_sections`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `core_site_albums`
--
ALTER TABLE `core_site_albums`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `core_site_album_details`
--
ALTER TABLE `core_site_album_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `core_site_attributes`
--
ALTER TABLE `core_site_attributes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `core_site_clients`
--
ALTER TABLE `core_site_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `core_site_menus`
--
ALTER TABLE `core_site_menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `core_site_menu_subs`
--
ALTER TABLE `core_site_menu_subs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `core_site_menu_sub_details`
--
ALTER TABLE `core_site_menu_sub_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `core_site_pages`
--
ALTER TABLE `core_site_pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `core_site_posts`
--
ALTER TABLE `core_site_posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `core_site_post_categories`
--
ALTER TABLE `core_site_post_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `core_site_post_details`
--
ALTER TABLE `core_site_post_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `core_site_products`
--
ALTER TABLE `core_site_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `core_site_product_categories`
--
ALTER TABLE `core_site_product_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `core_site_product_uoms`
--
ALTER TABLE `core_site_product_uoms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `core_site_routes`
--
ALTER TABLE `core_site_routes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `core_site_services`
--
ALTER TABLE `core_site_services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `core_site_service_categories`
--
ALTER TABLE `core_site_service_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `core_status`
--
ALTER TABLE `core_status`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `core_stocks`
--
ALTER TABLE `core_stocks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `core_stock_adjustments`
--
ALTER TABLE `core_stock_adjustments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `core_stock_adjustment_details`
--
ALTER TABLE `core_stock_adjustment_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `core_stock_adjustment_types`
--
ALTER TABLE `core_stock_adjustment_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `core_students`
--
ALTER TABLE `core_students`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `core_suppliers`
--
ALTER TABLE `core_suppliers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `core_tailor_dresses`
--
ALTER TABLE `core_tailor_dresses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `core_tailor_dress_parameters`
--
ALTER TABLE `core_tailor_dress_parameters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `core_tailor_orders`
--
ALTER TABLE `core_tailor_orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `core_tailor_order_details`
--
ALTER TABLE `core_tailor_order_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `core_tailor_order_measurements`
--
ALTER TABLE `core_tailor_order_measurements`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `core_tailor_uoms`
--
ALTER TABLE `core_tailor_uoms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `core_thanas`
--
ALTER TABLE `core_thanas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `core_transaction_types`
--
ALTER TABLE `core_transaction_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `core_uoms`
--
ALTER TABLE `core_uoms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `core_users`
--
ALTER TABLE `core_users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=268;

--
-- AUTO_INCREMENT for table `core_user_deposits`
--
ALTER TABLE `core_user_deposits`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `core_warehouses`
--
ALTER TABLE `core_warehouses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `manufacturer`
--
ALTER TABLE `manufacturer`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
