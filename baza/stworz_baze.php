<?php
// skrypt tworzy bazę danych, tworzy tabele i wrzuca do nich dane
    $adres = '127.0.0.1';
    $uzytkownik = 'root';
    $haslo = '';
    
    $plik = 'projektsklep9.sql'; // plik z zrzutem bazy danych z SQL
    $nazwa_bazy = "projektsklep"; // nazwa bazy danych

   
    
// ustanawiamy połączenie z bazą, jak się nie łączy, wyświetlamy błąd
$connection = @mysql_connect($adres, $uzytkownik, $haslo);
// tworzymy baze
mysql_query("drop database if exists {$nazwa_bazy}");
mysql_query("CREATE DATABASE {$nazwa_bazy}");
// wybieramy baze
$db = @mysql_select_db($nazwa_bazy, $connection);
mysql_query("SET NAMES utf8");
// otwieramy plik z skryptem SQL i dodajemy go do bazy
function importSQL($sqlFileHandle) 
{
    $query = '';
    while(!feof($sqlFileHandle)) 
    {
        $row = trim(fgets($sqlFileHandle));
        if(substr($row, 0, 1) == '#' or empty($row)) continue;
        $query .= $row;
        if(substr($row, -1, 1) == ';') 
        {
            mysql_query($query);
            $query = '';
        }
    }
}
$handle = fopen($plik, 'r');
importSQL($handle);

// wszystko sie udalo, przekierowanie na stronę z info
header("Location: baza_nie_dziala.php?stworzono=tak");