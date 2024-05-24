-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 24, 2024 at 03:34 PM
-- Server version: 10.5.20-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dio`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikli`
--

CREATE TABLE `artikli` (
  `id` int(11) NOT NULL,
  `ime_artikla` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hale`
--

CREATE TABLE `hale` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `historija`
--

CREATE TABLE `historija` (
  `id` int(11) NOT NULL,
  `id_artikla` int(11) NOT NULL,
  `korisnik` varchar(255) NOT NULL,
  `akcija` varchar(255) NOT NULL,
  `vrijeme` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `id` int(11) NOT NULL,
  `ime` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `korisnicko_ime` varchar(255) NOT NULL,
  `sifra` varchar(255) NOT NULL,
  `uloga` varchar(255) NOT NULL DEFAULT 'radnik'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kutije`
--

CREATE TABLE `kutije` (
  `id` int(11) NOT NULL,
  `id_palete` int(11) NOT NULL DEFAULT 0,
  `id_regala` int(11) NOT NULL DEFAULT 0,
  `id_hale` int(11) NOT NULL DEFAULT 0,
  `kolicina` int(11) NOT NULL DEFAULT 0,
  `kapacitet` int(11) NOT NULL DEFAULT 20
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `narudzbe`
--

CREATE TABLE `narudzbe` (
  `id` int(11) NOT NULL,
  `id_produkta` int(11) NOT NULL,
  `ime_produkta` varchar(255) NOT NULL,
  `id_korisnika` int(11) NOT NULL,
  `lokacija` varchar(255) NOT NULL,
  `vrijeme` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `palete`
--

CREATE TABLE `palete` (
  `id` int(11) NOT NULL,
  `id_regala` int(11) NOT NULL DEFAULT 0,
  `id_hale` int(11) NOT NULL DEFAULT 0,
  `kolicina` int(11) NOT NULL DEFAULT 0,
  `kapacitet` int(11) NOT NULL DEFAULT 20
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `premjestanje`
--

CREATE TABLE `premjestanje` (
  `id` int(11) NOT NULL,
  `id_produkta` int(11) NOT NULL,
  `id_kutije` int(11) NOT NULL,
  `id_palete` int(11) NOT NULL,
  `id_regala` int(11) NOT NULL,
  `id_hale` int(11) NOT NULL,
  `vrijeme` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `regali`
--

CREATE TABLE `regali` (
  `id` int(11) NOT NULL,
  `id_hale` int(11) NOT NULL DEFAULT 0,
  `kolicina` int(11) NOT NULL DEFAULT 0,
  `kapacitet` int(11) NOT NULL DEFAULT 5
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikli`
--
ALTER TABLE `artikli`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hale`
--
ALTER TABLE `hale`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `historija`
--
ALTER TABLE `historija`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kutije`
--
ALTER TABLE `kutije`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `narudzbe`
--
ALTER TABLE `narudzbe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `palete`
--
ALTER TABLE `palete`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `premjestanje`
--
ALTER TABLE `premjestanje`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_produkta` (`id_produkta`);

--
-- Indexes for table `regali`
--
ALTER TABLE `regali`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikli`
--
ALTER TABLE `artikli`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hale`
--
ALTER TABLE `hale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `historija`
--
ALTER TABLE `historija`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `korisnici`
--
ALTER TABLE `korisnici`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kutije`
--
ALTER TABLE `kutije`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `narudzbe`
--
ALTER TABLE `narudzbe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `palete`
--
ALTER TABLE `palete`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `premjestanje`
--
ALTER TABLE `premjestanje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `regali`
--
ALTER TABLE `regali`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
