-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 27, 2019 at 04:22 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `IRAPL`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` bigint(15) NOT NULL,
  `org_category` varchar(100) NOT NULL,
  `org_name` varchar(350) NOT NULL,
  `state` varchar(150) NOT NULL,
  `address` varchar(500) NOT NULL,
  `pincode` int(11) NOT NULL,
  `website` varchar(75) NOT NULL,
  `org_email` varchar(150) NOT NULL,
  `salutation` varchar(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `designation` varchar(150) NOT NULL,
  `mobile` bigint(15) NOT NULL,
  `email` varchar(150) NOT NULL,
  `email2` varchar(150) DEFAULT NULL,
  `country_code` varchar(5) DEFAULT NULL,
  `area_code` bigint(20) DEFAULT NULL,
  `landline` bigint(15) NOT NULL,
  `remarks` varchar(600) NOT NULL,
  `total_cash` bigint(15) NOT NULL,
  `payment_type` varchar(100) NOT NULL,
  `date_of_full_pay` date NOT NULL,
  `date_of_adv_pay` date NOT NULL,
  `adv_cash_paid` bigint(15) NOT NULL,
  `pending_pay` bigint(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `feedback`
--

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` bigint(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
