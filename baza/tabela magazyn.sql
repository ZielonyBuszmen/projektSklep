-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 07 Lis 2015, 18:37
-- Wersja serwera: 5.6.24
-- Wersja PHP: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza danych: `projektsklep`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `magazyn`
--

CREATE TABLE IF NOT EXISTS `magazyn` (
  `id_produktu` int(11) NOT NULL,
  `nazwa` text NOT NULL,
  `cena` text NOT NULL,
  `obrazek` text NOT NULL,
  `ilosc` int(11) NOT NULL,
  `opis` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `magazyn`
--

INSERT INTO `magazyn` (`id_produktu`, `nazwa`, `cena`, `obrazek`, `ilosc`, `opis`) VALUES
(1, 'Pumpernikiel', '20', 'pumpernikiel.jpeg', 5, 'Dobry chlebek, mniem mniem mniam'),
(2, 'Bleee', '20', '2.jpg', 2, 'Dobry chlebek, mniem mniem mniam'),
(3, 'asdasdasd', '20', '3.jpg', 11, 'Dobry chlebek, mniem mniem mniam'),
(4, 'Pumpernikiel', '20', 'pumpernikiel.jpeg', 70, 'Dobry chlebek, mniem mniem mniam');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `magazyn`
--
ALTER TABLE `magazyn`
  ADD PRIMARY KEY (`id_produktu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `magazyn`
--
ALTER TABLE `magazyn`
  MODIFY `id_produktu` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
