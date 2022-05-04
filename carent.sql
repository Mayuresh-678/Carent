-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 03, 2022 at 03:15 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carent`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE `admin_user` (
  `id` int(50) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`id`, `Name`, `username`, `password`) VALUES
(2, 'Staff', 'staff@staff', '$2y$10$GnEaGwdiNAaDd0EOq2Zd3e.pRecV6nZFow/abhFicJ16nPsmNyJkm'),
(3, 'Admin', 'admin@admin', '$2y$10$AtKKyHXMoK/2H8V3saUDJe34O0FuJl3t1DVr8h0mnVc8MSjGhM/y6'),
(12, 'Member ', 'member@member', '$2y$10$nuOSeQjuRcXBZpMDubBHY.oi3KfuBlmfBXxZxA4sd7xud/5KMVCLe'),
(31, 'priyanka', 'priya@priya', '$2y$10$dGLYs/OpQE.l5btuPVC3y.r9neeaaOB6W/JNcOEy9ialC6EISfYbK');

-- --------------------------------------------------------

--
-- Table structure for table `car_details`
--

CREATE TABLE `car_details` (
  `id` int(255) NOT NULL,
  `M_name` varchar(255) NOT NULL,
  `V_number` varchar(255) NOT NULL,
  `Seat` int(255) NOT NULL,
  `Rent` int(255) NOT NULL,
  `Images` varchar(400) DEFAULT NULL,
  `Days` int(255) NOT NULL DEFAULT 0,
  `st_date` date NOT NULL,
  `la_date` date NOT NULL,
  `username` varchar(200) NOT NULL,
  `F_name` text NOT NULL,
  `L_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `car_details`
--

INSERT INTO `car_details` (`id`, `M_name`, `V_number`, `Seat`, `Rent`, `Images`, `Days`, `st_date`, `la_date`, `username`, `F_name`, `L_name`) VALUES
(23, 'Model4', 'BH23HG89', 4, 23432, '4K Wallpapers 4.jpg', 23, '2022-05-05', '2022-05-28', 'anurag@gmail.com', 'Anurag', ''),
(33, 'Model9', 'MH07FG3', 5, 20000, 'IMG-1649514756.jpg', 12, '2022-05-13', '2022-05-25', 'mayuresh@gmail.com', 'Mayuresh', 'Gawade');

-- --------------------------------------------------------

--
-- Table structure for table `customer_login`
--

CREATE TABLE `customer_login` (
  `id` int(20) NOT NULL,
  `First_name` text NOT NULL,
  `Last_name` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_login`
--

INSERT INTO `customer_login` (`id`, `First_name`, `Last_name`, `email`, `password`) VALUES
(2, 'mayuresh', 'gawade', 'mayur@mayur', '$2y$10$rueWRxt5ufcdF9rPCv3SzuDqwsbLrVuS6xqFKKy2ndDDimC7hMfd2'),
(4, 'Mayuresh', 'Gawade', 'mayuresh@mayuresh', '$2y$10$OxCcbCrhy.ouEg.Y9gvG3.iyvRV/qk/l3y2RE/T5VJdOEsfp53Jz.'),
(19, 'Mayuresh', 'Gawade', 'mayuresh@gmail.com', '$2y$10$TbkOQZuSrAHzsVsILo2d6eu7gkIriWH5Vi9cFcVrvPq4HFB.sRLXS'),
(20, 'Anurag', 'Ranaware', 'anurag@gmail.com', '$2y$10$aMnEnWyMhploMDLTLpJHH.afH.FX1rERnB1DGIVF1KkKcqqTZHQ3.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_user`
--
ALTER TABLE `admin_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `car_details`
--
ALTER TABLE `car_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_login`
--
ALTER TABLE `customer_login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_user`
--
ALTER TABLE `admin_user`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `car_details`
--
ALTER TABLE `car_details`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `customer_login`
--
ALTER TABLE `customer_login`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
