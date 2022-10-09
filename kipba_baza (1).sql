-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2022 at 09:27 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kipba_baza`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `naziv` varchar(255) NOT NULL,
  `cijena` int(255) NOT NULL,
  `datum-objave` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lokacija` varchar(255) NOT NULL,
  `kategorija` varchar(20) NOT NULL,
  `opis` varchar(255) NOT NULL,
  `kontakt` varchar(50) NOT NULL,
  `kreator` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `naziv`, `cijena`, `datum-objave`, `lokacija`, `kategorija`, `opis`, `kontakt`, `kreator`) VALUES
(107, 'Megane 1.9dci', 7350, '2022-10-05 21:42:40', 'Sarajevo', '', '', '', '0'),
(124, 'Stranica za prodaju raznih stvari', 100000, '2022-10-07 12:05:52', 'Sarajevo', '', '', '', '0'),
(125, 'Laptop (NOV! NOV! NOV!)', 1, '2022-10-07 21:42:33', 'Sarajevo', '', '', '', '0'),
(126, 'Logo dizajn', 100, '2022-10-09 19:18:46', 'Sarajevo', '', '', '', '0'),
(133, 'auto', 867875046, '2022-10-09 21:17:41', 'Zemlja', 'automobili', 'ovo je auto za prodaju', '122', 'harryridd'),
(134, 'Mobitel ZTE Blade V8 lite', 300, '2022-10-09 21:22:43', 'Vogosca', 'kategorija', 'U odlicnom stanju. Malo koristen, cijena je prava sitnica.', '065-336/811', 'mama');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `password`) VALUES
(20, 'harryridd', 'eaeaisis'),
(21, 'tata', '12345'),
(22, 'Alem', 'as'),
(23, 'mama', '151075');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
