-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 05, 2023 at 05:12 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `htdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `towns`
--

CREATE TABLE `towns` (
  `town_id` int(11) NOT NULL,
  `town_name` varchar(255) NOT NULL,
  `region_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `towns`
--

INSERT INTO `towns` (`town_id`, `town_name`, `region_id`) VALUES
(1, 'Windhoek', 1),
(2, 'Khorixas', 2),
(3, 'Outjo', 2),
(4, 'Okahao', 3),
(5, 'Oshikuku', 3),
(6, 'Outapi', 3),
(7, 'Ruacana', 3),
(8, 'Oshakati', 4),
(9, 'Ongwediva', 4),
(10, 'Ondangwa', 4),
(11, 'Eenana', 5),
(12, 'Helao Nafidi', 5),
(13, 'Omuthiya', 6),
(14, 'Oniipa', 6),
(15, 'Tsumeb', 6),
(16, 'Rundu', 8),
(17, 'Katima Mulilo', 9),
(18, 'Arandis', 10),
(19, 'Karibib', 10),
(20, 'Usakos', 10),
(21, 'Walvis Bay', 10),
(22, 'Swakopmund', 10),
(23, 'Henties Bay', 10),
(24, 'Omaruru', 10),
(25, 'Otjiwarongo', 11),
(26, 'Okahandja', 11),
(27, 'Grootfontein', 11),
(28, 'Okakarara', 11),
(29, 'Otavi', 11),
(30, 'Gobabis', 12),
(31, 'Mariental', 13),
(32, 'Rehoboth', 13),
(33, 'Karasburg', 15),
(34, 'Luderits', 15),
(35, 'Oranjemund', 15),
(36, 'Keetmanshoop', 15),
(37, 'Nkurenkuru', 16);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `towns`
--
ALTER TABLE `towns`
  ADD PRIMARY KEY (`town_id`),
  ADD KEY `region_id` (`region_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `towns`
--
ALTER TABLE `towns`
  MODIFY `town_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `towns`
--
ALTER TABLE `towns`
  ADD CONSTRAINT `towns_ibfk_1` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
