-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas wygenerowania: 07 Gru 2015, 12:06
-- Wersja serwera: 5.5.32
-- Wersja PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza danych: `projektsklep`
--
CREATE DATABASE IF NOT EXISTS `projektsklep` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `projektsklep`;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kategorie`
--

CREATE TABLE IF NOT EXISTS `kategorie` (
  `id_kategorii` int(11) NOT NULL AUTO_INCREMENT,
  `nazwa` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `opis` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`id_kategorii`),
  KEY `id_kategorii` (`id_kategorii`),
  KEY `id_kategorii_2` (`id_kategorii`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

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
(8, 'Mięsiwo', '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `logi`
--

CREATE TABLE IF NOT EXISTS `logi` (
  `id_logu` int(11) NOT NULL AUTO_INCREMENT,
  `id_usera` int(11) NOT NULL,
  `data` date NOT NULL,
  `a_co_to_to` text NOT NULL,
  `info` text NOT NULL,
  PRIMARY KEY (`id_logu`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Zrzut danych tabeli `logi`
--

INSERT INTO `logi` (`id_logu`, `id_usera`, `data`, `a_co_to_to`, `info`) VALUES
(5, 16, '2015-12-07', 'rejestracja panie dziejaszku', 'brak'),
(6, 16, '2015-12-07', 'sprzedaz panie kochany', 'nowy'),
(7, 10, '2015-12-07', 'edycja produktu, drogi userze', 'Soczek porzeczka malina cytryna'),
(8, 49, '2015-12-07', 'edycja produktu, drogi userze', 'Salceson');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `produkty`
--

CREATE TABLE IF NOT EXISTS `produkty` (
  `id_produktu` int(11) NOT NULL AUTO_INCREMENT,
  `nazwa` text COLLATE utf8_polish_ci NOT NULL,
  `cena` double NOT NULL,
  `obrazek` text COLLATE utf8_polish_ci NOT NULL,
  `ilosc` int(11) NOT NULL,
  `opis` text COLLATE utf8_polish_ci NOT NULL,
  `kategoria` int(11) NOT NULL,
  PRIMARY KEY (`id_produktu`),
  KEY `kategoria` (`kategoria`),
  KEY `kategoria_2` (`kategoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=50 ;

--
-- Zrzut danych tabeli `produkty`
--

INSERT INTO `produkty` (`id_produktu`, `nazwa`, `cena`, `obrazek`, `ilosc`, `opis`, `kategoria`) VALUES
(10, 'Soczek porzeczka malina cytryna', 5.99, 'sok_porzeczkowy.jpg', 500, 'Dobry soczek porzeczkowy co daj? go krowy.', 1),
(11, 'Sok pomarańczowy', 4.2, 'sok_pomaranczowy.jpg', 12, 'Soczek', 1),
(12, 'Sok jabłkowy', 10, 'sok_jablkowy.jpg', 3, 'Mocno kopie', 1),
(13, 'Sok z ogórków', 7.49, 'sok_ogorkowy.jpg', 120, 'Wspomaga leczenie kaca', 1),
(15, 'Finlandia 0.5L', 21.99, 'finlandia.jpg', 500, 'Prosto ze Skandynawii<br><br>\r\nSuuri presidentti että onhapan kasvot<br>\r\nAvaa skyrznkę viinaa vahvempia<br>\r\nHän ei vielä tiedä , että hän tappaa<br>\r\nKoska Findlandia tekee jokaisesta durniejszym<br><br>\r\n\r\nWielki prezydent co kwaśną ma minę<br>\r\nOtwiera skyrznkę z trunkiem mocniejszym<br>\r\nNie wie jeszcze, że go to zabije<br>\r\nBo Findlandia czyni każdego durniejszym<br>\r\n', 2),
(16, 'Stock 0.5L', 20.99, 'stock.jpg', 248, 'Tanie i kopie', 2),
(17, 'Żubrówka Biała 0.5L', 19.99, 'zubrowka.jpg', 300, 'Mocny woltaż', 2),
(18, 'Żołądkowa Gorzka 0.5L', 24.99, 'zoladkowa.jpg', 120, 'Gorzka', 2),
(19, 'Bols 1L', 41.99, 'bols.jpg', 148, 'Cały litr do sponiewierania się', 2),
(20, 'Żubr', 2.29, 'zubr.jpg', 201, 'Tanie, gorzkie, kiepawe', 3),
(21, 'Tyskie', 2.89, 'tyskie.jpg', 100, 'Szkło bezzwrotne', 3),
(22, 'Harnaś', 1.89, 'harnas.jpg', 500, 'Tanie siki', 3),
(23, 'Tatra', 1.89, 'tatra.jpg', 400, 'Takie jak Harnaś', 3),
(24, 'Makaciowe', 1.29, 'makaciowe.png', 1, 'Nieobecne na żadnej imperezie', 3),
(25, 'Ogórek', 0.15, 'ogorek.jpg', 1200, 'Dobrze wchodzi po wódeczce', 4),
(26, 'Śledzik', 0.39, 'sledzik.jpg', 600, 'Śledzik lubi pływać', 4),
(27, 'Pumpernikiel', 0.89, 'pumpernikiel.jpeg', 800, 'Czarny, jak Twoja mama', 4),
(28, 'Cebulka', 0.59, 'cebulka.jpg', 500, 'Dobrze wchodzi', 4),
(29, 'Kinder Niespodzianka', 2.99, 'kinder.jpg', 400, 'Słodkie to i dobre', 4),
(30, 'Pumpernikiel', 2.99, 'pumpernikiel.jpg', 200, 'Czarny, i gryzie', 5),
(31, 'Razowy', 1.89, 'razowy.jpg', 200, 'Dobry na kanapki', 5),
(32, 'Słonecznikowy', 2.89, 'slonecznik.jpg', 120, 'Dobry chlebek, bo świeży', 5),
(33, 'Baltonowski', 1.29, 'baltonowski.jpg', 80, 'Harnaś wśród chlebów', 5),
(34, 'Bułka', 0.29, 'bulka.jpg', 500, 'Idealna do kanapki z chlebem', 5),
(36, 'Ruski 1.5L', 25.99, 'ruski.jpg', 25, 'Jak to ruski - klepie i nic poza tym.\r\n<br><br>Когда вы встаете по утрам формулы ,<br>\r\n русский покупает шампанское .<br>\r\nЭто открывает , как только вы можете<br>\r\nЧтобы жрать до следующего утра .<br><br><br>\r\nGdy poranne wstają wzorze,<br>\r\n każdy ruski kupuje szampana.<br>\r\nOtwiera go jak najszybciej może<br>\r\nBy chlać do następnego rana.<br>\r\n', 6),
(37, 'Inny Ruski 1.5L', 28.99, 'ruski.jpg', 15, 'Jak każdy ruski szczyn', 6),
(38, 'Afgański 1L', 15.99, 'ruski.jpg', 12, 'Wybucha przy otwarciu', 6),
(39, 'Polski 2L', 32.99, 'polski.jpeg', 54, 'Pijesz, a potem nie pamiętasz co piłeś', 6),
(40, 'Meksykański 15L', 259.99, 'polski.jpeg', 5, 'Konkretny sagan szampana. Śpiewa po otwarciu.', 6),
(41, 'Hed&Szolders', 12.99, 'hed.jpg', 56, 'Polisz maj Inglisz', 7),
(42, 'Szauma For Łumen', 15.99, 'hed.jpg', 58, 'Dobrze myje ', 7),
(43, 'Szauma For Men', 13.99, 'hed.jpg', 59, 'Myju, myju tu, i pucu, pucu tam.', 7),
(44, 'Żel do mycia Baby', 12.34, 'hed.jpg', 69, 'hvdzdvdzfzsf', 7),
(45, 'Schab Gotowany 1kg', 14.99, 'schab.jpg', 25, 'Dobry schabek', 8),
(46, 'Schab Wędzony', 16.99, 'schab.jpg', 23, 'Dobły', 8),
(47, 'Schab Surowy', 8.99, 'schab.jpg', 23, 'Nie jeść na surowo !', 8),
(48, 'Schab Pieczony', 19.99, 'schab.jpg', 54, 'Dobrze piecze', 8);

--
-- Wyzwalacze `produkty`
--
DROP TRIGGER IF EXISTS `edycja_produktu`;
DELIMITER //
CREATE TRIGGER `edycja_produktu` AFTER UPDATE ON `produkty`
 FOR EACH ROW INSERT INTO logi (id_usera, data, a_co_to_to, info)
VALUES (NEW.id_produktu, NOW(), 'edycja produktu, drogi userze', NEW.nazwa)
//
DELIMITER ;
DROP TRIGGER IF EXISTS `usun_z_magazynu`;
DELIMITER //
CREATE TRIGGER `usun_z_magazynu` AFTER DELETE ON `produkty`
 FOR EACH ROW INSERT INTO logi (id_usera, data, a_co_to_to, info)
VALUES (OLD.id_produktu, NOW(), 'usuwanie drogi panie', OLD.nazwa)
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sprzedaz`
--

CREATE TABLE IF NOT EXISTS `sprzedaz` (
  `id_sprzedazy` int(11) NOT NULL AUTO_INCREMENT,
  `id_zamowienia` int(11) NOT NULL COMMENT 'Id jednego zamówienia. Kilka produktów może mieć takie samo id, bo moga byc zamawiane na raz',
  `id_uzytkownika` int(11) NOT NULL,
  `id_produktu` int(11) NOT NULL,
  `ilosc` int(11) NOT NULL,
  `data` date NOT NULL,
  `typ_wysylki` text NOT NULL,
  `potwierdzenie` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL COMMENT 'tak - potwierdzone, czeka - w trakcie przetwarzania, nowe - jeszcze nie potwierdzone, blocked - odrzucone',
  `id_pracownika_co_weryfikowal` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_sprzedazy`),
  KEY `id_uzytkownika` (`id_uzytkownika`),
  KEY `id_produktu` (`id_produktu`),
  KEY `id_pracownika_co_weryfikowal` (`id_pracownika_co_weryfikowal`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Zrzut danych tabeli `sprzedaz`
--

INSERT INTO `sprzedaz` (`id_sprzedazy`, `id_zamowienia`, `id_uzytkownika`, `id_produktu`, `ilosc`, `data`, `typ_wysylki`, `potwierdzenie`, `id_pracownika_co_weryfikowal`) VALUES
(1, 1448873526, 2, 16, 2, '2015-11-23', 'poczta polska', 'tak', 6),
(2, 1448873526, 2, 20, 99, '2015-11-23', 'poczta polska', 'tak', 6),
(3, 1448873700, 6, 11, 3, '2015-11-23', 'poczta polska', 'blocked', 6),
(4, 1448874451, 1, 19, 2, '2015-11-23', 'poczta polska', 'tak', 1),
(5, 1450090792, 16, 11, 1, '2015-12-07', 'poczta polska', 'nowy', NULL);

--
-- Wyzwalacze `sprzedaz`
--
DROP TRIGGER IF EXISTS `sprzedalem_cos`;
DELIMITER //
CREATE TRIGGER `sprzedalem_cos` AFTER INSERT ON `sprzedaz`
 FOR EACH ROW INSERT INTO logi (id_usera, data, a_co_to_to, info)
VALUES (NEW.id_uzytkownika, NOW(), 'sprzedaz panie kochany', NEW.potwierdzenie)
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE IF NOT EXISTS `uzytkownicy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` text COLLATE utf8_polish_ci NOT NULL,
  `haslo` text COLLATE utf8_polish_ci NOT NULL,
  `imie` text COLLATE utf8_polish_ci NOT NULL,
  `nazwisko` text COLLATE utf8_polish_ci NOT NULL,
  `typ` text COLLATE utf8_polish_ci NOT NULL,
  `email` text COLLATE utf8_polish_ci NOT NULL,
  `adres` text COLLATE utf8_polish_ci NOT NULL,
  `miasto` text COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=17 ;

--
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`id`, `login`, `haslo`, `imie`, `nazwisko`, `typ`, `email`, `adres`, `miasto`) VALUES
(1, 'test', 'test', 'Ziemowit', 'Wielki', 'p', 'test@wp.pl', 'Belweder 20', 'Łękołody'),
(2, 'test2', 'test2', 'Jan', 'Kowalski', 'u', 'test2@wp.pl', 'Słoneczna 66', 'Warszawa'),
(3, 'test3', 'test3', 'Paweł', 'Kowalski', 'u', 'test3@wp.pl', 'Ble ble 11', 'Siedlce'),
(6, 'test4', 'test4', 'Czarny', 'Zawisza', 'p', 'test4@test.pl', 'Oddział zamknięty dla psychicznie nr 4', 'Łuków'),
(7, 'czerwony_zyd', 'zyd', 'Żyd', 'Żydowny', 'blocked', 'zydek@zyd.qp', 'Konwój żydków', 'Wszędzie'),
(16, 'test322', 'test322', 'test322', 'test322', 'u', 'test322@test322.pl', '', '');

--
-- Wyzwalacze `uzytkownicy`
--
DROP TRIGGER IF EXISTS `dodaj_po_rejestracji`;
DELIMITER //
CREATE TRIGGER `dodaj_po_rejestracji` AFTER INSERT ON `uzytkownicy`
 FOR EACH ROW INSERT INTO logi (id_usera, data, a_co_to_to, info)
VALUES (NEW.id, NOW(), 'rejestracja panie dziejaszku', 'brak')
//
DELIMITER ;

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
