-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 12 Lis 2015, 21:51
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
-- Struktura tabeli dla tabeli `kategorie`
--

CREATE TABLE IF NOT EXISTS `kategorie` (
  `id_kategorii` int(11) NOT NULL,
  `nazwa` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `opis` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `kategorie`
--

INSERT INTO `kategorie` (`id_kategorii`, `nazwa`, `opis`) VALUES
(1, 'Zapoje', 'Napoje bezalkoholowe do picia'),
(2, 'Wódeczki', 'Mocny amperaż, sporo volt'),
(3, 'Piwa', 'Przeważnie cieple i wygazowane'),
(4, 'Zagrychy', ''),
(5, 'Chleby', ''),
(6, 'Szampany', ''),
(7, 'Szampony', ''),
(8, 'Mięsiwo', ''),
(9, 'Ryby', ''),
(10, 'Wino', ''),
(11, 'Relikwie', ''),
(12, 'Samochody', ''),
(13, 'Narkotyki', ''),
(14, 'Karty', '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `produkty`
--

CREATE TABLE IF NOT EXISTS `produkty` (
  `id_produktu` int(11) NOT NULL,
  `nazwa` text COLLATE utf8_polish_ci NOT NULL,
  `cena` double NOT NULL,
  `obrazek` text COLLATE utf8_polish_ci NOT NULL,
  `ilosc` int(11) NOT NULL,
  `opis` text COLLATE utf8_polish_ci NOT NULL,
  `kategoria` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `produkty`
--

INSERT INTO `produkty` (`id_produktu`, `nazwa`, `cena`, `obrazek`, `ilosc`, `opis`, `kategoria`) VALUES
(10, 'Sok porzeczkowy', 5.99, '', 50, 'Dobry soczek porzeczkowy co daj? go krowy.', 1),
(11, 'Sok pomarańczowy', 4.2, '', 12, 'Soczek', 1),
(12, 'Sok grzybowy', 10, '', 3, 'Mocno kopie', 1),
(13, 'Sok z ogórków', 7.49, '', 120, 'Wspomaga leczenie kaca', 1),
(15, 'Finlandia 0.5L', 21.99, '', 500, 'Prosto ze Skandynawii', 2),
(16, 'Stock 0.5L', 20.99, '', 250, 'Tanie i kopie', 2),
(17, 'Żubrówka Biała 0.5L', 19.99, '', 300, 'Mocny woltaż', 2),
(18, 'Żołądkowa Gorzka 0.5L', 24.99, '', 120, 'Gorzka', 2),
(19, 'Bolls 1L', 41.99, '', 150, 'Cały litr do sponiewierania się', 2),
(20, 'Żubr', 2.29, '', 300, 'Tanie, gorzkie, chu***we', 3),
(21, 'Tyskie', 2.89, '', 100, 'Szkło bezzwrotne', 3),
(22, 'Harnaś', 1.89, '', 500, 'Tanie szczyny dla żulerki', 3),
(23, 'Tatra', 1.89, '', 400, 'Takie jak Harnaś', 3),
(24, 'Makaciowe', 1.29, '', 1, 'Nieobecne na żadnej imperezie', 3),
(25, 'Ogórek', 0.15, '', 1200, 'Dobrze wchodzi po wódeczce', 4),
(26, 'Śledzik', 0.39, '', 600, 'Śledzik lubi pływać', 4),
(27, 'Pumpernikiel', 0.89, '', 800, 'Czarny, jak Twoja mama', 4),
(28, 'Cebulka', 0.59, '', 500, 'Dobrze wchodzi', 4),
(29, 'Kinder Niespodzianka', 2.99, '', 400, 'Słodkie to i dobre', 4),
(30, 'Pumpernikiel', 2.99, '', 200, 'Czarny, i gryzie', 5),
(31, 'Razowy', 1.89, '', 200, 'Dobry na kanapki', 5),
(32, 'Słonecznikowy', 2.89, '', 120, 'Dobry chlebek, bo świeży', 5),
(33, 'Baltonowski', 1.29, '', 80, 'Harnaś wśród chlebów', 5),
(34, 'Bułka', 0.29, '', 500, 'Idealna do kanapki z chlebem', 5),
(36, 'Ruski 1.5L', 25.99, '', 25, 'Jak to ruski - klepie i nic poza tym', 6),
(37, 'Inny Ruski 1.5L', 28.99, '', 15, 'Jak każdy ruski szczyn', 6),
(38, 'Afgański 1L', 15.99, '', 12, 'Wybucha przy otwarciu', 6),
(39, 'Polski 2L', 32.99, '', 54, 'Pijesz, a potem nie pamiętasz co piłeś', 6),
(40, 'Meksykański 15L', 259.99, '', 5, 'Konkretny sagan szampana. Śpiewa po otwarciu.', 6),
(41, 'Hed&Szolders', 12.99, '', 56, 'Polisz maj Inglisz', 7),
(42, 'Szauma For Łumen', 15.99, '', 58, 'Dobrze myje ', 7),
(43, 'Szauma For Men', 13.99, '', 59, 'Myju, myju tu, i pucu, pucu tam.', 7),
(44, 'Żel do mycia Baby', 12.34, '', 69, 'hvdzdvdzfzsf', 7),
(45, 'Schab Gotowany 1kg', 14.99, '', 25, 'Dobry schabek', 8),
(46, 'Schab Wędzony', 16.99, '', 23, 'Dobły', 8),
(47, 'Schab Surowy', 8.99, '', 23, 'Nie jeść na surowo !', 8),
(48, 'Schab Pieczony', 19.99, '', 54, 'Dobrze piecze', 8),
(49, 'Salceson', 5.99, '', 54, 'Syf', 8);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sprzedaz`
--

CREATE TABLE IF NOT EXISTS `sprzedaz` (
  `id_sprzedazy` int(11) NOT NULL,
  `id_zamowienia` int(11) NOT NULL COMMENT 'Id jednego zamówienia. Kilka produktów może mieć takie samo id, bo moga byc zamawiane na raz',
  `id_uzytkownika` int(11) NOT NULL,
  `id_produktu` int(11) NOT NULL,
  `ilosc` int(11) NOT NULL,
  `data` date NOT NULL,
  `typ_wysylki` text NOT NULL,
  `potwierdzenie` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL COMMENT 'tak - potwierdzone, czeka - w trakcie przetwarzania, nowe - jeszcze nie potwierdzone, blocked - odrzucone',
  `id_pracownika_co_weryfikowal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE IF NOT EXISTS `uzytkownicy` (
  `id` int(11) NOT NULL,
  `login` text COLLATE utf8_polish_ci NOT NULL,
  `haslo` text COLLATE utf8_polish_ci NOT NULL,
  `imie` text COLLATE utf8_polish_ci NOT NULL,
  `nazwisko` text COLLATE utf8_polish_ci NOT NULL,
  `typ` text COLLATE utf8_polish_ci NOT NULL,
  `email` text COLLATE utf8_polish_ci NOT NULL,
  `adres` text COLLATE utf8_polish_ci NOT NULL,
  `miasto` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

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
  ADD PRIMARY KEY (`id_kategorii`), ADD KEY `id_kategorii` (`id_kategorii`), ADD KEY `id_kategorii_2` (`id_kategorii`);

--
-- Indexes for table `produkty`
--
ALTER TABLE `produkty`
  ADD PRIMARY KEY (`id_produktu`), ADD KEY `kategoria` (`kategoria`), ADD KEY `kategoria_2` (`kategoria`);

--
-- Indexes for table `sprzedaz`
--
ALTER TABLE `sprzedaz`
  ADD PRIMARY KEY (`id_sprzedazy`), ADD KEY `id_uzytkownika` (`id_uzytkownika`), ADD KEY `id_produktu` (`id_produktu`), ADD KEY `id_pracownika_co_weryfikowal` (`id_pracownika_co_weryfikowal`);

--
-- Indexes for table `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`id`), ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `kategorie`
--
ALTER TABLE `kategorie`
  MODIFY `id_kategorii` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT dla tabeli `produkty`
--
ALTER TABLE `produkty`
  MODIFY `id_produktu` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT dla tabeli `sprzedaz`
--
ALTER TABLE `sprzedaz`
  MODIFY `id_sprzedazy` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `produkty`
--
ALTER TABLE `produkty`
ADD CONSTRAINT `produkty_ibfk_1` FOREIGN KEY (`kategoria`) REFERENCES `kategorie` (`id_kategorii`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `sprzedaz`
--
ALTER TABLE `sprzedaz`
ADD CONSTRAINT `sprzedaz_ibfk_1` FOREIGN KEY (`id_uzytkownika`) REFERENCES `uzytkownicy` (`id`),
ADD CONSTRAINT `sprzedaz_ibfk_2` FOREIGN KEY (`id_pracownika_co_weryfikowal`) REFERENCES `uzytkownicy` (`id`),
ADD CONSTRAINT `sprzedaz_ibfk_3` FOREIGN KEY (`id_produktu`) REFERENCES `produkty` (`id_produktu`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
