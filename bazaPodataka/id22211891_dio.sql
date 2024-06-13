-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 13, 2024 at 02:48 PM
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
-- Database: `id22211891_dio`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikli`
--

CREATE TABLE `artikli` (
  `id` int(11) NOT NULL,
  `ime_artikla` varchar(255) NOT NULL,
  `zalihe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `artikli`
--

INSERT INTO `artikli` (`id`, `ime_artikla`, `zalihe`) VALUES
(1, 'Artikal 1', 15),
(2, 'Artikal 2', 22),
(3, 'Artikal 3', 21),
(4, 'Artikal 4', 11),
(5, 'Artikal 5', 0);

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
  `korisnik` varchar(255) NOT NULL,
  `akcija` varchar(255) NOT NULL,
  `vrijeme` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `historija`
--

INSERT INTO `historija` (`id`, `korisnik`, `akcija`, `vrijeme`) VALUES
(1, 'Faris Brkić', 'Faris Brkić je dodao artikal Artikal 1 sa zalihama 30', '2024-06-13 14:43:56'),
(2, 'Faris Brkić', 'Faris Brkić je dodao artikal Artikal 2 sa zalihama 30', '2024-06-13 14:44:07'),
(3, 'Faris Brkić', 'Faris Brkić je dodao artikal Artikal 3 sa zalihama 34', '2024-06-13 14:44:12'),
(4, 'Faris Brkić', 'Faris Brkić je dodao artikal Artikal 4 sa zalihama 24', '2024-06-13 14:44:16'),
(5, 'Faris Brkić', 'Faris Brkić je dodao artikal Artikal 5 sa zalihama 15', '2024-06-13 14:44:23'),
(6, 'Faris Brkić', 'Faris Brkić je dodao kutiju sa ID: 1', '2024-06-13 14:44:29'),
(7, 'Faris Brkić', 'Faris Brkić je dodao kutiju sa ID: 2', '2024-06-13 14:44:29'),
(8, 'Faris Brkić', 'Faris Brkić je dodao kutiju sa ID: 3', '2024-06-13 14:44:29'),
(9, 'Faris Brkić', 'Faris Brkić je dodao kutiju sa ID: 4', '2024-06-13 14:44:29'),
(10, 'Faris Brkić', 'Faris Brkić je dodao kutiju sa ID: 5', '2024-06-13 14:44:29'),
(11, 'Faris Brkić', 'Faris Brkić premjestio artikal Artikal 1 u kutiju: 1.', '2024-06-13 14:44:35'),
(12, 'Faris Brkić', 'Faris Brkić premjestio artikal Artikal 2 u kutiju: 2.', '2024-06-13 14:44:41'),
(13, 'Faris Brkić', 'Faris Brkić premjestio artikal Artikal 3 u kutiju: 3.', '2024-06-13 14:44:45'),
(14, 'Faris Brkić', 'Faris Brkić premjestio artikal Artikal 4 u kutiju: 4.', '2024-06-13 14:44:51'),
(15, 'Faris Brkić', 'Faris Brkić premjestio artikal Artikal 5 u kutiju: 5.', '2024-06-13 14:44:56'),
(16, 'Faris Brkić', 'Faris Brkić premjestio artikal Artikal 1 u kutiju: 5.', '2024-06-13 14:45:01'),
(17, 'Faris Brkić', 'Faris Brkić premjestio artikal Artikal 2 u kutiju: 5.', '2024-06-13 14:45:05'),
(18, 'Faris Brkić', 'Faris Brkić premjestio artikal Artikal 3 u kutiju: 5.', '2024-06-13 14:45:12'),
(19, 'Faris Brkić', 'Izlaz dijela: Artikal 1 - Eldar Ćivić - lokacija', '2024-06-13 14:45:41'),
(20, 'Faris Brkić', 'Izlaz dijela: Artikal 1 - Eldar Ćivić - lokacija', '2024-06-13 14:45:49'),
(21, 'Faris Brkić', 'Izlaz dijela: Artikal 5 - Hamza Krkalić - lokacija', '2024-06-13 14:45:57'),
(22, 'Faris Brkić', 'Izlaz dijela: Artikal 2 - Eldar Ćivić - rona', '2024-06-13 14:46:03'),
(23, 'Faris Brkić', 'Izlaz dijela: Artikal 4 - Eldar Ćivić - lokacija 2', '2024-06-13 14:46:11'),
(24, 'Faris Brkić', 'Izlaz dijela: Artikal 3 - Hamza Krkalić - crnac', '2024-06-13 14:46:27');

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

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`id`, `ime`, `email`, `korisnicko_ime`, `sifra`, `uloga`) VALUES
(1, 'Faris Brkić', 'far.brkic@gmail.con', 'far', 'far', 'admin'),
(2, 'Eldar Ćivić', 'eldar@eldar.eldar', 'eldar', 'eldar', 'radnik'),
(3, 'Hamza Krkalić', 'hamza@hamza.com', 'ham', 'ham', 'radnik'),
(4, 'Analiza i Dizajn', 'ads@ads.com', 'ads', 'ads', 'radnik');

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

--
-- Dumping data for table `kutije`
--

INSERT INTO `kutije` (`id`, `id_palete`, `id_regala`, `id_hale`, `kolicina`, `kapacitet`) VALUES
(1, 0, 0, 0, 0, 20),
(2, 0, 0, 0, 3, 20),
(3, 0, 0, 0, 7, 20),
(4, 0, 0, 0, 3, 20),
(5, 0, 0, 0, 8, 20);

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
  `kolicina` int(11) NOT NULL,
  `vrijeme` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `narudzbe`
--

INSERT INTO `narudzbe` (`id`, `id_produkta`, `ime_produkta`, `id_korisnika`, `lokacija`, `kolicina`, `vrijeme`) VALUES
(1, 1, 'Artikal 1', 2, 'lokacija', 13, '2024-06-13 14:45:41'),
(2, 1, 'Artikal 1', 2, 'lokacija', 2, '2024-06-13 14:45:49'),
(3, 5, 'Artikal 5', 3, 'lokacija', 9, '2024-06-13 14:45:57'),
(4, 2, 'Artikal 2', 2, 'rona', 4, '2024-06-13 14:46:03'),
(5, 4, 'Artikal 4', 2, 'lokacija 2', 10, '2024-06-13 14:46:11'),
(6, 3, 'Artikal 3', 3, 'crnac', 5, '2024-06-13 14:46:27');

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
  `kolicina` int(11) NOT NULL,
  `vrijeme` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `premjestanje`
--

INSERT INTO `premjestanje` (`id`, `id_produkta`, `id_kutije`, `id_palete`, `id_regala`, `id_hale`, `kolicina`, `vrijeme`) VALUES
(2, 2, 2, 0, 0, 0, 3, '2024-06-13 14:44:41'),
(3, 3, 3, 0, 0, 0, 7, '2024-06-13 14:44:45'),
(4, 4, 4, 0, 0, 0, 3, '2024-06-13 14:44:51'),
(5, 5, 5, 0, 0, 0, 6, '2024-06-13 14:44:56'),
(7, 2, 5, 0, 0, 0, 1, '2024-06-13 14:45:05'),
(8, 3, 5, 0, 0, 0, 1, '2024-06-13 14:45:12');

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
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `hale`
--
ALTER TABLE `hale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `historija`
--
ALTER TABLE `historija`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `korisnici`
--
ALTER TABLE `korisnici`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kutije`
--
ALTER TABLE `kutije`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `narudzbe`
--
ALTER TABLE `narudzbe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `palete`
--
ALTER TABLE `palete`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `premjestanje`
--
ALTER TABLE `premjestanje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `regali`
--
ALTER TABLE `regali`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
