-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2024 at 08:14 AM
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
-- Database: `web_tech`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `Password`, `role`) VALUES
('abrar', 'abrar@123', 'user'),
('ayh', 'Demo@123', 'host'),
('farzana', 'farzana@1', 'user'),
('musta', 'musta@123', 'user'),
('mustakim', 'Demo@123', 'host'),
('nadia', 'nadia123', 'host'),
('nadim', 'nad62346', 'admin'),
('nadim1', 'nadim123', 'user'),
('nila', 'nila@123', 'user'),
('redwan', 'redwan@1', 'user'),
('saba', 'saba@123', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `Card_Number` varchar(100) NOT NULL,
  `CVV_Number` varchar(100) NOT NULL,
  `Amount` bigint(100) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `username`, `Card_Number`, `CVV_Number`, `Amount`, `Date`) VALUES
('10001', 'sabu', '1231456878634521', '673', 25000, '2024-05-05');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(100) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `DOB` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `Name`, `Email`, `Gender`, `DOB`) VALUES
('abrar', 'Abrar Anan', 'abrar.anan@gmail.com', 'Male', '2000-02-01'),
('ayh', 'mahim ah', 'ah@gmail', 'Male', '0000-00-00'),
('farzana', 'FARZANA AFRIN', 'farzana.sdc28@gmail.com', 'female', '2024-03-17'),
('musta', 'Mustakim ahmed', 'musta@gmail.com', 'male', '1999-02-01'),
('mustakim', 'Mustakim ahmed', 'mustakim@gmail.com', 'male', '0000-00-00'),
('nadia', 'Nadia Sultana', 'Nadia@gmail.com', 'female', '2024-03-20'),
('nadim', 'MD Nure Alam Nadim', 'hello@abdullahnadim.com', 'male', '2003-10-08'),
('nadim1', 'MD NURE ALAM NADIM', 'nadim.soft.111@gmail.com', 'male', '2024-03-05'),
('nila', 'Afsana NIla', 'nila@gmail.com', 'female', '1999-02-01'),
('redwan', 'Md Redwan Kazi', 'redwan.kazi@gmail.com', 'Male', '2008-02-14'),
('saba', 'Nure Saba', 'nuresaba686@gmail.com', 'female', '2002-10-20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
