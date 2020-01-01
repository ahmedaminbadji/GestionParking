-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 01, 2020 at 11:49 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `parkmanager_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `fidelityPoints` int(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `phoneNumber` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `username`, `password`, `firstName`, `Name`, `fidelityPoints`, `Email`, `phoneNumber`) VALUES
(1, 'client12', 'client12', 'Ahmed Amin', 'Badji', 5, 'ahmedaminbadji@gmail.com', '0658334807'),
(2, 'ahmed99', 'aaaa', 'Nour El Houda', 'Amiar', 10, 'ahmedaminbadji@gmail.com', '0553962881'),
(3, 'ahmed999', 'aaaaaaaa', 'Nour El Houda', 'Amiar', 0, 'ahmedaminbadji@gmail.com', '0553962881');

-- --------------------------------------------------------

--
-- Table structure for table `gardiens`
--

CREATE TABLE `gardiens` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `matricule` int(50) NOT NULL,
  `salaire` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `parkingHistory`
--

CREATE TABLE `parkingHistory` (
  `ticket` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `carBrand` varchar(255) NOT NULL,
  `carModel` varchar(255) NOT NULL,
  `matricule` varchar(255) NOT NULL,
  `dateReserved` varchar(255) NOT NULL,
  `heurreA` varchar(255) NOT NULL,
  `slot` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `parkingSlots`
--

CREATE TABLE `parkingSlots` (
  `id` varchar(50) NOT NULL,
  `reserved` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `parkingSlots`
--

INSERT INTO `parkingSlots` (`id`, `reserved`) VALUES
('A1', 0),
('A2', 1),
('A3', 1),
('A4', 0),
('A5', 0),
('A6', 0),
('A7', 1),
('A8', 0),
('A9', 0),
('B1', 0),
('B2', 0);

-- --------------------------------------------------------

--
-- Table structure for table `reserved`
--

CREATE TABLE `reserved` (
  `ticket` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `carBrand` varchar(255) DEFAULT NULL,
  `carModel` varchar(255) DEFAULT NULL,
  `immatriculation` varchar(255) DEFAULT NULL,
  `heurreA` time DEFAULT NULL,
  `dateReserved` date DEFAULT NULL,
  `slot` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reserved`
--

INSERT INTO `reserved` (`ticket`, `username`, `carBrand`, `carModel`, `immatriculation`, `heurreA`, `dateReserved`, `slot`) VALUES
(1, 'ahmed99', 'Seat', 'Leon', '16-00-125512', '01:00:00', '2022-01-01', 'A3'),
(2, 'client12', 'VOLSWAGEN ', 'POLO', '24-109-00644', '01:00:00', '2022-01-01', 'A2'),
(3, 'ahmed99', 'Renault', 'clio 4 ', '24-119-001094', '01:00:00', '2021-02-01', 'A7');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gardiens`
--
ALTER TABLE `gardiens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parkingSlots`
--
ALTER TABLE `parkingSlots`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reserved`
--
ALTER TABLE `reserved`
  ADD PRIMARY KEY (`ticket`),
  ADD KEY `slot` (`slot`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gardiens`
--
ALTER TABLE `gardiens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reserved`
--
ALTER TABLE `reserved`
  MODIFY `ticket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reserved`
--
ALTER TABLE `reserved`
  ADD CONSTRAINT `reserved_ibfk_1` FOREIGN KEY (`slot`) REFERENCES `parkingSlots` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
