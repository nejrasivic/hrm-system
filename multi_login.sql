-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2021 at 10:40 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `multi_login`
--

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `task` text NOT NULL,
  `zavrsen` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `username`, `task`, `zavrsen`) VALUES
(26, 'Faris', 'Farise uradi zadacu', 1),
(27, 'Nejra', 'Workflow dijagran', 1),
(28, 'Adis', 'UML dijagram', 0),
(29, 'Anida', 'Buggovi', 0),
(30, 'nn', 'UML dijagram', 0),
(32, 'Anida', 'Popraviti dizajn strance', 0),
(33, 'Anida', 'Ispraviti grešku na liniji 334 (home.php) ', 0),
(34, 'Nejra', 'Završiti UML dijagrame', 1),
(35, 'Nejra', 'Prepraviti bazu podataka ', 1),
(36, 'Adis', 'Bussines plan', 0),
(37, 'Adis', 'Cost-benefit analiza ', 0),
(38, 'korisnik', 'pripremiti odbranu', 0),
(49, 'lejla', 'uradi', 0),
(50, 'aaa', 'df', 0),
(51, 'alem', 'ocijeniti zadatak', 0),
(53, 'alem', 'pregledati zadatak', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `user_type`, `password`, `description`) VALUES
(1, 'anidam', 'anidamujezin', 'admin', 'anida123', ''),
(2, 'nejras', 'nejrasivic@gmail.com', 'admin', 'nejra123', ''),
(3, 'adiss', 'adissehovic@gmail.com', 'admin', 'adis123', ''),
(7, 'Anida98', 'anida.mujezin@outlook.com', 'user', 'ee28e03a3f27e6645e031d2fe14ae87e', ''),
(9, 'nejra', 'nejra@gmail.com', 'admin', 'nejra123', 'new user'),
(10, 'nejra', 'nejra@gmail.com', 'admin', 'c9080509f4edb7024a6a42f54799c8a6', ''),
(11, 'korisnik', 'korisnik@gmail.com', 'user', 'xyz', ''),
(13, 'Alem', 'alem@fsk.unsa.ba', 'user', '923573b286120f2369312d76ff58a2a8', ''),
(14, 'nejrasivic', 'nejrasivic@gmail.com', 'user', 'e8d8cf435014ed70284cc1a2c452aee6', ''),
(15, 'lejla', 'lejla@gmail.com', 'user', 'df3c496edbd8121b6bb7149ad2b96fb0', ''),
(16, 'aaa', 'aaa@gmail.com', 'user', '47bce5c74f589f4867dbd57e9ca9f808', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
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
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
