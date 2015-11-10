-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 09 Lis 2015, 10:43
-- Wersja serwera: 5.6.26-log
-- Wersja PHP: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `projektsklep`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kategorie`
--

CREATE TABLE `kategorie` (
  `id_kategorii` int(11) NOT NULL,
  `nazwa` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `opis` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `kategorie`
--

INSERT INTO `kategorie` (`id_kategorii`, `nazwa`, `opis`) VALUES
(1, 'Napoje', 'Napoje bezalkoholowe do picia'),
(2, 'Wódeczka', 'Mocny amperaż, sporo volt'),
(3, 'Piwa', 'Przeważnie cieple i wygazowane'),
(4, 'Zagrychy', ''),
(5, 'Zakąski', ''),
(6, 'Zapitki', ''),
(7, 'Chleby', ''),
(8, 'Szampany', ''),
(9, 'Szampony', ''),
(10, 'Mięsiwo', ''),
(11, 'Trzoda Chlewna', ''),
(12, 'Ryby', ''),
(13, 'Raki', ''),
(14, 'Ptaki', ''),
(15, 'Orzechy', ''),
(16, 'Wino', ''),
(17, 'Relikwie', ''),
(23, 'Samochody', ''),
(24, 'Narkotyki', ''),
(25, 'Karty Graficzne', '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `produkty`
--

CREATE TABLE `produkty` (
  `id_produktu` int(11) NOT NULL,
  `nazwa` text CHARACTER SET latin1 NOT NULL,
  `cena` double NOT NULL,
  `obrazek` text CHARACTER SET latin1 NOT NULL,
  `ilosc` int(11) NOT NULL,
  `opis` text CHARACTER SET latin1 NOT NULL,
  `kategoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `produkty`
--

INSERT INTO `produkty` (`id_produktu`, `nazwa`, `cena`, `obrazek`, `ilosc`, `opis`, `kategoria`) VALUES
(1, 'Pumpernikiel', 20, 'pumpernikiel.jpeg', 5, 'Dobry chlebek, mniem mniem mniam', 2),
(2, 'Bleee', 20, '2.jpg', 2, 'Dobry chlebek, mniem mniem mniam', 2),
(3, 'asdasdasd', 20, '3.jpg', 11, 'Dobry chlebek, mniem mniem mniam', 3),
(4, 'Pumpernikiel', 20, 'pumpernikiel.jpeg', 70, 'Dobry chlebek, mniem mniem mniam', 4);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sprzedaz`
--

CREATE TABLE `sprzedaz` (
  `id_sprzedazy` int(11) NOT NULL,
  `id_zamowienia` int(11) NOT NULL COMMENT 'Id jednego zamówienia. Kilka produktów może mieć takie samo id, bo moga byc zamawiane na raz',
  `id_uzytkownika` int(11) NOT NULL,
  `id_produktu` int(11) NOT NULL,
  `ilosc` int(11) NOT NULL,
  `data` date NOT NULL,
  `typ_wysylki` text NOT NULL,
  `potwierdzenie` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL COMMENT 'tak - potwierdzone, nie - jeszcze nie potwierdzone, blocked - odrzucone',
  `id_pracownika_co_weryfikowal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `id` int(11) NOT NULL,
  `login` text COLLATE utf8_polish_ci NOT NULL,
  `haslo` text COLLATE utf8_polish_ci NOT NULL,
  `imie` text COLLATE utf8_polish_ci NOT NULL,
  `nazwisko` text COLLATE utf8_polish_ci NOT NULL,
  `typ` text COLLATE utf8_polish_ci NOT NULL,
  `email` text COLLATE utf8_polish_ci NOT NULL,
  `adres` text COLLATE utf8_polish_ci NOT NULL,
  `miasto` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`id`, `login`, `haslo`, `imie`, `nazwisko`, `typ`, `email`, `adres`, `miasto`) VALUES
(1, 'test', 'test', 'Ziemowit', 'Wielki', 'u', 'test@wp.pl', 'Belweder 20', 'Łękołody'),
(2, 'test2', 'test2', 'Jan', 'Kowalski', 'u', 'test2@wp.pl', 'Słoneczna 66', 'Warszawa'),
(3, 'test3', 'test3', 'Paweł', 'Kowalski', 'u', 'test3@wp.pl', 'Ble ble 11', 'Siedlce'),
(6, 'test4', 'test4', 'Czarny', 'Zawisza', 'p', 'test4@test.pl', 'Oddział zamknięty dla psychicznie nr 4', 'Łuków'),
(7, 'czerwony_zyd', 'zyd', 'Żyd', 'Żydowny', 'blocked', 'zydek@zyd.qp', 'Konwój żydków', 'Wszędzie');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `kategorie`
--
ALTER TABLE `kategorie`
  ADD PRIMARY KEY (`id_kategorii`);

--
-- Indexes for table `produkty`
--
ALTER TABLE `produkty`
  ADD PRIMARY KEY (`id_produktu`);

--
-- Indexes for table `sprzedaz`
--
ALTER TABLE `sprzedaz`
  ADD PRIMARY KEY (`id_sprzedazy`);

--
-- Indexes for table `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `kategorie`
--
ALTER TABLE `kategorie`
  MODIFY `id_kategorii` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT dla tabeli `produkty`
--
ALTER TABLE `produkty`
  MODIFY `id_produktu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT dla tabeli `sprzedaz`
--
ALTER TABLE `sprzedaz`
  MODIFY `id_sprzedazy` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
