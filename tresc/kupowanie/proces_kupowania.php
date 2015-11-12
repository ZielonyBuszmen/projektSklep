<?php
// plik stand-alone. "robi kupowanie", następnie przekierowuje do strony z potwierdzeniem.

// Klient kupując tylko "rezerwuje" (ee?). Liczba na magazynie się nie zmienia, tylko jest dodawany wpis do kupowanych

// Sprawdzamy, czy istenieje koszyczek
if(!isset($_SESSION['koszyk']) || @$_SESSION['koszyk'][0]['id_produktu']=="")
{
    // koszyk pusty? Oooo! To tragedia. Przekierowywujemy na do potwierdzenia i wyświetlamy errory
    header("Location: index.php?v=tresc/kupowanie/rozrachunek&komunikat=pusty_koszyk");
    return;
}
// sprawedzamy, czy user na pewno zalogowany. Jeśli nie to "kopas w dupas and smile at face".
if (!zalogowany())
{
    header("Location: index.php?v=tresc/kupowanie/rozrachunek&komunikat=nie_zalogowano");
    return;
}

$id_zamowienia = time() + (7 * 24 * 60 * 60);  // numer zamówienia to timestamp
$data = date("Y-m-d"); // data do wpisania do bazy

// dodawanie wpisu do bazy danych
 for($i = 0; $i<sprawdz_liczbe_w_koszyku(); $i++)
{
    $przedmiot = $_SESSION['koszyk'][$i]; // przypisanie kawałka tablicy do zmiennej, by wygodniej operować
    // stworzenie długiego i skomplikowanego zapytania
    $zapytanie = "INSERT INTO `sprzedaz` (`id_zamowienia`, `id_uzytkownika`, `id_produktu`, `ilosc` , `data`, `typ_wysylki`, `potwierdzenie`, `id_pracownika_co_weryfikowal`) "
            . "VALUES ('{$id_zamowienia}', '{$_SESSION['id_usera']}', '{$przedmiot['id_produktu']}', '{$przedmiot['ilosc']}', '{$data}', 'poczta polska', 'nowy', NULL)";
    // dodanie zapytania do bazy
    $idzapytania = mysql_query($zapytanie) or die ("bleeee eeee");    
}
     
// usunięcie koszyka
usun_koszyk();
// przekierowanie do strony o potwiedzeniu
header("Location: index.php?v=tresc/kupowanie/rozrachunek&komunikat=ok");
    
// mała ściąga pomocnicza    
/*        
id_zamowienia - $id_zamowienia 
id_uzytkownika  - $_SESSION['id_usera'];
id_produktu - $przedmiot['id_produktu']
ilosc - $przedmiot['ilosc']
data - $data
typ_wysylki - "poczta polska"
potwierdzenie - "nowy"
id_pracownika_co_weryfikowal - NULL

 */