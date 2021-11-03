-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 03 nov 2021 om 10:46
-- Serverversie: 10.4.20-MariaDB
-- PHP-versie: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bier`
--
CREATE DATABASE IF NOT EXISTS `bier` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `bier`;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `Name` varchar(100) NOT NULL,
  `Adres` varchar(50) NOT NULL,
  `Number` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `orders`
--

INSERT INTO `orders` (`Name`, `Adres`, `Number`) VALUES
('George Washington', 'Straat 24', '23'),
('Henk Spermatank', 'Anderestraat 12', '13');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `Bedrijfsnaam` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Adres` varchar(100) NOT NULL,
  `Postcode` varchar(100) NOT NULL,
  `Factuuradres` varchar(100) NOT NULL,
  `Wachtwoord` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`Bedrijfsnaam`, `Email`, `Adres`, `Postcode`, `Factuuradres`, `Wachtwoord`) VALUES
('', '', '', '', '', ''),
('', '', '', '', '', ''),
('SC Heereveen', 'scheereveen@gmail.com', 'straat 24', '8567 LO', '3635 GA', 'Leuk'),
('FC Ajax', 'Ajax@gmail.com', 'anderestraat 24', '1626 AY', '3474 KL', 'HeelLeuk');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
