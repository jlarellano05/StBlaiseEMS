-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2023 at 12:21 PM
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
-- Database: `st_blaise`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `email`, `password`) VALUES
(6, 'Gab', 'testing@gmail.com', '$2y$10$804xIg.M.9FGKVo7reei/eK7C9sh5QgNMvBiANE.LGM4Y/QrS11KO'),
(7, 'John Carlo', 'f@gmail.com', '$2y$10$Tctnu4TECo/jNXv90RpR5OekKR1/JzUtYkXFkzvdfHQpXs4B9WkRa'),
(8, 'John Lloyd', 'admin@gmail.com', '$2y$10$JTIKiqKVZIhbocbbgceQsODMyM4dpKC1dbtSjuipajn2XCoU7CFdq');

-- --------------------------------------------------------

--
-- Table structure for table `archive_table`
--

CREATE TABLE `archive_table` (
  `id` int(11) NOT NULL,
  `lrn` varchar(20) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlname` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact_number` varchar(15) NOT NULL,
  `age` int(11) NOT NULL,
  `birthdate` date NOT NULL,
  `birthplace` varchar(100) NOT NULL,
  `last_school_attended` varchar(255) NOT NULL,
  `school_year` varchar(10) NOT NULL,
  `parent_name` varchar(100) NOT NULL,
  `occupation` varchar(100) NOT NULL,
  `parent_address` varchar(255) NOT NULL,
  `parent_contact_number` varchar(15) NOT NULL,
  `card_138` varchar(255) NOT NULL,
  `good_moral` varchar(255) NOT NULL,
  `psa` varchar(255) NOT NULL,
  `grantee` varchar(255) NOT NULL,
  `other_specify` varchar(255) NOT NULL,
  `grade_level` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `archive_table2`
--

CREATE TABLE `archive_table2` (
  `id` int(11) NOT NULL DEFAULT 0,
  `LRN` varchar(20) DEFAULT NULL,
  `surname` varchar(50) DEFAULT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `middlename` varchar(50) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `contact_number` varchar(15) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `birthplace` varchar(100) DEFAULT NULL,
  `last_school_attended` varchar(255) DEFAULT NULL,
  `school_year` varchar(10) DEFAULT NULL,
  `parent_name` varchar(100) DEFAULT NULL,
  `occupation` varchar(100) DEFAULT NULL,
  `parent_address` varchar(255) DEFAULT NULL,
  `parent_contact_number` varchar(15) DEFAULT NULL,
  `card_138` varchar(255) DEFAULT NULL,
  `good_moral` varchar(255) DEFAULT NULL,
  `psa` varchar(255) DEFAULT NULL,
  `grantee` varchar(255) DEFAULT NULL,
  `other_specify` varchar(255) DEFAULT NULL,
  `grade_level` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `archive_table2`
--

INSERT INTO `archive_table2` (`id`, `LRN`, `surname`, `firstname`, `middlename`, `address`, `contact_number`, `age`, `birthdate`, `birthplace`, `last_school_attended`, `school_year`, `parent_name`, `occupation`, `parent_address`, `parent_contact_number`, `card_138`, `good_moral`, `psa`, `grantee`, `other_specify`, `grade_level`, `created_at`, `email`) VALUES
(112, '123456789101', 'Catalo', 'Francis', 'Apaya', 'Bangin, San Nicolas, Batangas', '09395619406', 21, '2023-11-02', 'Muntinlupa City', 'St. Blaise Community Academy, Inc', '2022-2023', 'Priscila Palo', 'N/A', 'Bangin, San Nicolas, Batangas', '09957800428', '', '', '', 'RBSL', '', 'JuniorHigh-Grade7', '2023-11-23 08:24:41', 'francis21catalo@gmail.com'),
(111, '12345670000', 'Hawak', 'Neil Allen', 'De Roxas', 'Bangin, San Nicolas, Batangas', '09052163992', 21, '2023-11-09', 'Laguna', 'St. Mary\'s Educational Institute', '2022-2023', 'Maricris Catalo', 'N/A', 'Dulangan, San Luis Batangas', '09957800428', '', '', '', '', '', 'JuniorHigh-Grade7', '2023-11-23 08:00:10', 'neilallen2121@gmail.com'),
(108, '107405080046', 'Hawak', 'Carl Jonel', 'Vibar', 'Nonong Casto, Lemery, Batangas', '09052163992', 20, '0000-00-00', 'Laguna', 'Lemery Colleges', '2022-2023', 'Maricris Catalo', 'N/A', 'Dulangan, San Luis Batangas', '09957800428', '', '', '', '', '', 'SeniorHigh-Grade11', '2023-11-22 09:05:56', 'carljonel99@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `enrollment_form`
--

CREATE TABLE `enrollment_form` (
  `id` int(11) NOT NULL,
  `LRN` varchar(20) DEFAULT NULL,
  `surname` varchar(50) DEFAULT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `middlename` varchar(50) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `contact_number` varchar(15) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `birthplace` varchar(100) DEFAULT NULL,
  `last_school_attended` varchar(255) DEFAULT NULL,
  `school_year` varchar(10) DEFAULT NULL,
  `parent_name` varchar(100) DEFAULT NULL,
  `occupation` varchar(100) DEFAULT NULL,
  `parent_address` varchar(255) DEFAULT NULL,
  `parent_contact_number` varchar(15) DEFAULT NULL,
  `card_138` varchar(255) DEFAULT NULL,
  `good_moral` varchar(255) DEFAULT NULL,
  `psa` varchar(255) DEFAULT NULL,
  `grantee` varchar(255) DEFAULT NULL,
  `other_specify` varchar(255) DEFAULT NULL,
  `grade_level` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enrollment_form`
--

INSERT INTO `enrollment_form` (`id`, `LRN`, `surname`, `firstname`, `middlename`, `address`, `contact_number`, `age`, `birthdate`, `birthplace`, `last_school_attended`, `school_year`, `parent_name`, `occupation`, `parent_address`, `parent_contact_number`, `card_138`, `good_moral`, `psa`, `grantee`, `other_specify`, `grade_level`, `created_at`, `email`) VALUES
(106, '107653140003', 'Catalo', 'Francis', 'Apaya', 'Dulangan, San Luis Batangas', '09395619406', 21, '2002-09-21', 'Muntinlupa City', 'St. Blaise Community Academy, Inc', '2022-2023', 'Maricris Catalo', 'N/A', 'Dulangan, San Luis Batangas', '09957800428', '', '', '', 'ESC, RBSL', '', 'SeniorHigh-Grade12', '2023-11-22 05:56:12', 'francis21catalo@gmail.com'),
(107, '1075112561717', 'Palo', 'Neil Allen', 'De Roxas', 'Bangin, San Nicolas, Batangas', '09395619406', 21, '2003-12-17', 'Muntinlupa City', 'St. Mary\'s Educational Institute', '2022-2023', 'Priscila Palo', 'N/A', 'Bangin, San Nicolas, Batangas', '09957800428', '', '', '', 'RBSL', '', 'JuniorHigh-Grade10', '2023-11-22 08:08:16', 'neilallen1717@gmail.com'),
(108, '107405080046', 'Hawak', 'Carl Jonel', 'Vibar', 'Nonong Casto, Lemery, Batangas', '09052163992', 20, '0000-00-00', 'Laguna', 'Lemery Colleges', '2022-2023', 'Maricris Catalo', 'N/A', 'Dulangan, San Luis Batangas', '09957800428', '', '', '', '', '', 'SeniorHigh-Grade11', '2023-11-22 09:05:56', 'carljonel99@gmail.com'),
(109, '107653140004', 'Catalo', 'Filmore', 'Apaya', 'Dulangan, San Luis Batangas', '0977854332', 22, '2001-08-29', 'Batangas City', 'St. Luis Academy', '2022-2023', 'Maricris Catalo', 'N/A', 'Dulangan, San Luis Batangas', '09886664278', '', '', '', 'ESC', '', 'SeniorHigh-Grade12', '2023-11-23 03:48:33', 'fcatalo@gmail.com'),
(110, '107653140004', 'Catalo', 'Filmore', 'Apaya', 'Dulangan, San Luis Batangas', '0977854332', 22, '2023-10-30', 'Batangas City', 'St. Luis Academy', '2022-2023', 'Maricris Catalo', 'N/A', 'Dulangan, San Luis Batangas', '09886664278', '', '', '', 'ESC, RBSL', '', 'JuniorHigh-Grade10', '2023-11-23 04:07:58', 'francis21catalo@gmail.com'),
(111, '12345670000', 'Hawak', 'Neil Allen', 'De Roxas', 'Bangin, San Nicolas, Batangas', '09052163992', 21, '2023-11-09', 'Laguna', 'St. Mary\'s Educational Institute', '2022-2023', 'Maricris Catalo', 'N/A', 'Dulangan, San Luis Batangas', '09957800428', '', '', '', '', '', 'JuniorHigh-Grade7', '2023-11-23 08:00:10', 'neilallen2121@gmail.com'),
(112, '123456789101', 'Catalo', 'Francis', 'Apaya', 'Bangin, San Nicolas, Batangas', '09395619406', 21, '2023-11-02', 'Muntinlupa City', 'St. Blaise Community Academy, Inc', '2022-2023', 'Priscila Palo', 'N/A', 'Bangin, San Nicolas, Batangas', '09957800428', '', '', '', 'RBSL', '', 'JuniorHigh-Grade7', '2023-11-23 08:24:41', 'francis21catalo@gmail.com'),
(115, '111111111111', 'Catalo', 'Pogi', 'Apaya', 'Dulangan, San Luis Batangas', '0977854332', 21, '2002-08-07', 'Batangas City', 'St. Luis Academy', '2022-2023', 'Maricris Catalo', 'N/A', 'Dulangan, San Luis Batangas', '09886664278', '', '', '', 'ESC, RBSL', '', 'SeniorHigh-Grade12', '2023-12-02 02:24:36', 'gg@gmail.com'),
(116, '212121212121', 'Jaz', 'Poke', 'Water', 'Dulangan, San Luis Batangas', '0977854332', 21, '2002-09-21', 'Batangas City', 'St. Luis Academy', '2022-2023', 'Maricris Catalo', 'N/A', 'Dulangan, San Luis Batangas', '09886664278', '', '', '', 'ESC, RBSL', '', 'SeniorHigh-Grade12', '2023-12-02 04:46:38', 'pokejaz@gmail.com'),
(117, '444444444444', 'Catalow', 'Francia', 'Papaya', 'Dulangan, San Luis Batangas', '0977854332', 12, '2011-02-02', 'Amin Batangas City', 'St Marys Educastional Institute', '2022-2023', 'Maricris Catalo', 'N/A', 'Dulangan, San Luis Batangas', '09886664278', '', '', '', '', '', 'JuniorHigh-Grade10', '2023-12-02 08:12:04', 'gggg@gmail.com'),
(118, '555555555555', 'Monkey', 'Luffy', 'Daks', 'Dulangan, San Luis Batangas', '0977854332', 14, '2009-02-06', 'Batangas City', 'St. Luis Academy', '2022-2023', 'Maricris Catalo', 'N/A', 'Dulangan, San Luis Batangas', '09886664278', '', '', '', 'ESC, RBSL', '', 'JuniorHigh-Grade8', '2023-12-02 09:05:34', 'francis21catalo@gmail.com'),
(119, '666666666666', 'Portgas', 'Ace', 'Daks', 'Buli Taal, Batangas', '0977854332', 9, '2014-02-02', 'Amin Batangas City', 'St. Luis Academy', '2021-2023', 'Paulino Lagunsing', 'N/A', 'Buli Taal, Batangas', '09032322323', '', '', '', '', '', 'JuniorHigh-Grade7', '2023-12-02 09:08:36', 'daks@gmail.com'),
(120, '888888888888', 'Samson', 'Karlo Renz', 'Gwapo', 'Nonong Casto Lemery Batangas', '0977854332', 12, '2011-02-02', 'Amin Batangas City', 'St Marys Educastional Institute', '2021-2023', 'Paulino Lagunsing', 'N/A', 'Dulangan, San Luis Batangas', '09886664278', '', '', '', '', '', 'JuniorHigh-Grade7', '2023-12-02 09:28:45', 'tite@gmail.com'),
(121, '787877777777', 'Arellano', 'John Lloyd', 'Malaluan', 'Buli Taal, Batangas', '0977854332', 15, '2008-02-02', 'Batangas City', 'St. Luis Academy', '2021-2023', 'Maricris Catalo', 'Accountant', 'Dulangan, San Luis Batangas', '09886664278', '', '', '', '', '', 'JuniorHigh-Grade7', '2023-12-02 09:30:46', 'egopka05@gmail.com'),
(122, '000000000000', 'Catalo', 'John Lloyd', 'Palo', 'Aguila, San Jose, Batangas, Philippines', '09611402074', 21, '2002-01-05', 'Batangas CIty', 'St. Blaise Community Academy, Inc.', '2021-2022', 'Neneth Arellano', 'N/A', 'Aguila, San Jose, Batangas, Philippines', '09611402074', 'jl-high-resolution-logo-white.png', 'marco__one_piece__minimalist_wallpaper_by_greenmapple17_daekeu9.png', 'portgas_d__ace_one_piece_minimalist_by_darkfate17_dbh82na.png', 'ESC, RBSL, Other', 'kshjdjkas', 'SeniorHigh-Grade11', '2023-12-02 23:28:59', 'jla@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(255) NOT NULL,
  `lrn` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `misc` varchar(255) NOT NULL,
  `tuition` varchar(255) NOT NULL,
  `others` varchar(255) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `lrn`, `name`, `misc`, `tuition`, `others`, `created_at`) VALUES
(15, '107653140003', 'Francis Catalo', 'Pending', 'Paid', 'Pending', '2023-11-22'),
(16, '1075112561717', 'Neil Allen Palo', 'Pending', 'Paid', 'Pending', '2023-11-22'),
(20, '12345670000', 'Neil Allen Hawak', 'Pending', 'Paid', 'Pending', '2023-11-23'),
(21, '123456789101', 'Francis Catalo', 'Pending', 'Paid', 'Pending', '2023-11-23'),
(24, '111111111111', 'Pogi Catalo', 'Pending', 'Pending', 'Pending', '2023-12-02'),
(25, '107405080046', 'Hawak Carl Jonel', '', '', '', '2023-12-02'),
(26, '107653140003', 'Catalo Francis', 'Pending', 'Paid', 'Pending', '2023-12-02'),
(28, '212121212121', 'Jaz Poke', '', '', '', '2023-12-02'),
(29, '444444444444', 'Francia Catalow', 'Pending', 'Pending', 'Pending', '2023-12-02'),
(30, '555555555555', 'Luffy Monkey', 'Pending', 'Pending', 'Pending', '2023-12-02'),
(31, '666666666666', 'Ace Portgas', 'Pending', 'Pending', 'Pending', '2023-12-02'),
(32, '888888888888', 'Karlo Renz Samson', 'Pending', 'Pending', 'Pending', '2023-12-02'),
(33, '787877777777', 'John Lloyd Arellano', 'Pending', 'Pending', 'Pending', '2023-12-02'),
(37, '000000000000', 'John Lloyd Catalo', 'Pending', 'Paid', 'Pending', '2023-12-03'),
(43, '107653140004', 'Catalo Filmore', '', '', '', '2023-12-04'),
(44, '107653140004', 'Catalo Filmore', '', '', '', '2023-12-04');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `lrn` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `lrn`, `name`, `email`, `password`, `user_type`) VALUES
(83, '107653140003', 'Francis', 'francis21catalo@gmail.com', '$2y$10$1BmQ0BLjJsUxWPyAPSOzoO9qlXvG9.wHVQCYUvCg2vTl5pHVhisFm', 'student'),
(84, '1075112561717', 'Neil Allen', 'neilallen1717@gmail.com', '$2y$10$4TVapLtP5HvMxCZ5uptgjOz6bK8Sm3FgJEu6X.61nVuVNzeF3ethq', 'student'),
(89, '12345670000', 'Neil Allen', 'neilallen2121@gmail.com', '$2y$10$5y2MFEgdT3jtlXkgMogchuYky.BstloKTADd5zWgJuB.9K6XGqBNe', 'student'),
(90, '123456789101', 'Francis', 'francis21catalo@gmail.com', '$2y$10$mzWR5znNP8PPpNi.uuzgDOxtjjdZdSMs.nGg0ZpD5.K3/i.I58M4u', 'student'),
(93, '111111111111', 'Pogi', 'gg@gmail.com', '$2y$10$MkaypuHpcF33kwmj3Ojyme9feMHTDMmOZzULtT8vpvQELGi6KOpai', 'admin'),
(94, '107405080046', 'Hawak Carl Jonel', 'carljonel99@gmail.com', '', ''),
(95, '107653140003', 'Catalo Francis', 'francis21catalo@gmail.com', '', ''),
(97, '212121212121', 'Jaz Poke', 'pokejaz@gmail.com', '', ''),
(98, '444444444444', 'Francia', 'gggg@gmail.com', '$2y$10$fjMek1qaHDiY3xLZKumlqO5KYX4LK/bGX2Ja16A0T5CyHsCM6bAZy', 'student'),
(99, '555555555555', 'Luffy', 'francis21catalo@gmail.com', '$2y$10$Hj0NsM/TGoufB/Hgkpy8Z.6OYnuHG2j30IMWMZiHHHAItBgjXDLhm', 'student'),
(100, '666666666666', 'Ace', 'daks@gmail.com', '$2y$10$TKkabSmVd6l8w9ORxMfyd.XCtmBwQe42xos2xin5KPbIyasVI3/Vm', 'student'),
(101, '888888888888', 'Karlo Renz', 'tite@gmail.com', '$2y$10$qQ6OnTXSbZR7gFmkEZ2qBOwaAIK89hakTu5dZmGwEQaKJ8j9BWAV2', 'student'),
(102, '787877777777', 'John Lloyd', 'egopka05@gmail.com', '$2y$10$2KvEGOdUd64zEK2MnFkjYOOgOtY/Bq9WJVLCrAzgdQiUQSgMPAhpW', 'student'),
(106, '000000000000', 'John Lloyd', 'jla@gmail.com', '$2y$10$R0j3VeqfPvrr57OA58fpXO8KmNIbAXm1MWvD4k8w4gD4zf1Dxa0qy', 'student'),
(112, '107653140004', 'Catalo Filmore', 'fcatalo@gmail.com', '', ''),
(113, '107653140004', 'Catalo Filmore', 'francis21catalo@gmail.com', '', ''),
(115, '', 'John Lloyd', 'admin@gmail.com', '$2y$10$JTIKiqKVZIhbocbbgceQsODMyM4dpKC1dbtSjuipajn2XCoU7CFdq', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `enrollment_form`
--
ALTER TABLE `enrollment_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `enrollment_form`
--
ALTER TABLE `enrollment_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
