
CREATE TABLE `districts` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `division_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `name`, `division_id`) VALUES
(1, 'Dhaka', 1),
(2, 'Munshiganj', 1),
(3, 'Gazipur', 1),
(4, 'Manikganj', 1),
(5, 'Rajbari', 1),
(6, 'Rajshahi', 2),
(7, 'Pabna', 2),
(8, 'Nator', 2),
(9, 'Chapai', 2),
(10, 'Naogaon', 2),
(11, 'Barishal', 3),
(12, 'Borguna', 3),
(13, 'Pirojpur', 3),
(14, 'Potuakhali', 3),
(15, 'Khulna', 4),
(16, 'Satkhira', 4),
(17, 'Bagherhat', 4),
(18, 'Sylhet', 5),
(19, 'SunamGanj', 5),
(20, 'Hobiganj', 5),
(21, 'Rangpur', 6),
(22, 'Niphamari', 6),
(23, 'Kurigram', 6),
(24, 'Mymensingh', 7),
(25, 'Sherpur', 7),
(26, 'Jamalpur', 7),
(27, 'Chattogram', 8),
(28, 'Rangamati', 8),
(29, 'Bandorban', 8),
(30, 'Coxbazar', 8);

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` int(11) NOT NULL  PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `name`) VALUES
(1, 'Dhaka'),
(2, 'Rajshahi'),
(3, 'Barishal'),
(4, 'Khulna'),
(5, 'Sylhet'),
(6, 'Rangpur'),
(7, 'Mymensingh'),
(8, 'Chattogram');

