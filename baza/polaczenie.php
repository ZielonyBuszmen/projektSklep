<?php
// połączenie z bazą danych MySQL
// lokalnie jest to baza: projektsklep

    $adres = '127.0.0.1';
    $uzytkownik = 'root';
    $haslo = '';
    $nazwa_bazy = 'projektsklep';

    // ustanawiamy połączenie z bazą, jak się nie łączy, wyświetlamy błąd
    $connection = @mysql_connect($adres, $uzytkownik, $haslo)
    or die('Brak polaczenia z serwerem MySQL.<br />Blad: '.mysql_error().'<hr><hr><a href="baza/baza_nie_dziala.php">Przejdz do strony z instrukcjami</a>');

    // wybieramy odpowiednią bazę danych
    $db = @mysql_select_db($nazwa_bazy, $connection)
    or die('Nie moge polaczyc sie z baza danych<br />Blad: '.mysql_error().'<hr><hr><a href="baza/baza_nie_dziala.php">Przejdz do strony z instrukcjami</a>');

    // ustawiamy kodowanie na utf8
    mysql_query("SET NAMES utf8");
?>